<?php
//llamar a todas las librerias
require "facebook-platform/facebook-php-sdk/src/facebook.php";
require "twitter/EpiCurl.php";
require "twitter/EpiOAuth.php";
require "twitter/EpiTwitter.php";
$plugin_name = "fbconnect";
//registrar las acciones para el controlador
register_elgg_event_handler('init', 'system', 'fbconnect_init');
register_elgg_event_handler('pagesetup','system','fbconnect_forms');

function fbconnect_init() {
    global $CONFIG;
    register_action('fbconnect/condividi', true, $CONFIG->pluginspath . 'fbconnect/actions/condividi.php');
    register_translations($CONFIG->pluginspath . "fbconnect/languages/");
   //envia la vista del boton al formulario del registro y al de login inicio
    extend_view("account/forms/login", "fbconnect/login");
    extend_view("profile/edit", "fbconnect/loginp");	
  }

//abrir conexión con facebook
function get_facebook_cookie($app_id, $application_secret) {
    global $CONFIG;
    $args = array();
    parse_str(trim($_COOKIE['fbs_' . $app_id], '\\"'), $args);
    ksort($args);
    $payload = '';
    foreach ($args as $key => $value) {
        if ($key != 'sig') {
            $payload .= $key . '=' . $value;
        }
    }
    if (md5($payload . $application_secret) != $args['sig']) {
        return null;
    }
    return $args;
    $CONFIG->uid = $cookie['uid'];
}
/*Crear la instancia de la aplicación con Facebook*/
function fbconnect_client() {
	global $CONFIG;
	static $fb = NULL;
	if (!$fb instanceof Facebook) {
		include_once($CONFIG->pluginspath.'fbconnect/facebook-platform/facebook-php-sdk/src/facebook.php');
		$fb = new Facebook(array(
			'appId' => get_plugin_setting('api_id', 'fbconnect'),
			'secret' => get_plugin_setting('api_secret', 'fbconnect'),
			'cookie' => true,
		));
	}
	return $fb;
}
/*Permite enviar la vista del codigo que muestra los datos de Facebook en el formulario de edición y registro*/
function fbconnect_forms(){
	//primero verifica sí el usuario se logeo
	$facebook = fbconnect_client();
	$session = $facebook->getSession();
	if($session) { 
	extend_view('account/forms/register', 'fbconnect/register'); 
	extend_view('profile/edit', 'fbconnect/edit'); 
	}
}

/*Obtener datos Legacy Api, nombre, correo, foto*/
function fbconnect_get_info_from_fb($fields) {  
	    $facebook = fbconnect_client();
	    $fbuid = $facebook->getUser();   
	if ($facebook && $fields) {
        try {
	include_once($CONFIG->pluginspath.'fbconnect/facebook-platform/facebook-php-sdk/src/facebook.php');	
            $result = $facebook->api(array(
  		 'method'  => 'users.getinfo',
  		 'uids'       => $fbuid,
  		 'fields'     => $fields,
  		 'callback'  => ''
            ));
            return $result[0];
        } catch (Exception $e) {
            error_log('Legacy Api Calling Error!' . $e->getMessage());
        }
    }
}
/*Obtener datos de ubicación actual*/
function get_info_location(){
 	$facebook = fbconnect_client();
	include_once($CONFIG->pluginspath.'fbconnect/facebook-platform/facebook-php-sdk/src/facebook.php');
        $fbme = $facebook->api('/me'); 
 	return $result = $fbme['location']['name'];

}
/*Obtener datos de empleo*/
function get_info_work($delim = ' ', $partDelim = ' | '){
        $info       =   "";
        $flag           =   false;
	$facebook = fbconnect_client();
	$fbme = $facebook->api('/me');
        if (empty($fbme['work'])) return '';
 
        foreach($fbme['work'] as $item){
            if ($flag)
                $info .= $partDelim;
            $flag   =   true;
            $info   .=  (isset($item['employer']['name']) ? $item['employer']['name'] : '' ). $delim .
                        (isset($item['location']['name']) ? $item['location']['name'] : '' ). $delim .
                        (isset($item['position'])         ? $item['position']['name'] : '' ). $delim .
                        (isset($item['start_date'])       ? $item['start_date']       : '' ). $delim .
                        (isset($item['end_date'])         ? $item['end_date']         : '' );
        }
        return $info;
}
/*Obtener datos de educación*/
function get_info_education($delim = ' ', $partDelim = ' | '){
        $info       =   "";
        $flag           =   false;
	$facebook = fbconnect_client();
	$fbme = $facebook->api('/me');
        if (empty($fbme['education'])) return '';
 
        foreach($fbme['education'] as $item){
            if ($flag)
                $info .= $partDelim;
            $flag    =   true;
            $info   .=  (isset($item['school']['name']) ? $item['school']['name'] : '' ). $delim .
                        (isset($item['year']['name'])   ? $item['year']['name']   : '');
        }
        return $info;
    }
/*Reemplazar caracteres especiales*/

function limpiar_caracteres($String) {
$String = str_replace(array('á','à','â','ã','ª','ä'),"a",$String);
$String = str_replace(array('Á','À','Â','Ã','Ä'),"A",$String);
$String = str_replace(array('Í','Ì','Î','Ï'),"I",$String);
$String = str_replace(array('í','ì','î','ï'),"i",$String);
$String = str_replace(array('é','è','ê','ë'),"e",$String);
$String = str_replace(array('É','È','Ê','Ë'),"E",$String);
$String = str_replace(array('ó','ò','ô','õ','ö','º'),"o",$String);
$String = str_replace(array('Ó','Ò','Ô','Õ','Ö'),"O",$String);
$String = str_replace(array('ú','ù','û','ü'),"u",$String);
$String = str_replace(array('Ú','Ù','Û','Ü'),"U",$String);
$String = str_replace(array('[','^','´','`','¨','~',']'),"",$String);
$String = str_replace("ç","c",$String);
$String = str_replace("Ç","C",$String);
$String = str_replace("ñ","n",$String);
$String = str_replace("Ñ","N",$String);
$String = str_replace("Ý","Y",$String);
$String = str_replace("ý","y",$String);
return strtoupper($String);
}

?>
