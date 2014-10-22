<?php
/*Este codigo aparece cuando el usuario esta loggeado en FB o en Twitter y también se encarga de llamar al botón de login*/
global $CONFIG;
$plugin_name = "fbconnect";
//primero se obtienen los datos de la aplicacion en FB y en Twitter
$consumer_key = get_plugin_setting('consumer_key', $plugin_name);
$consumer_secret = get_plugin_setting('consumer_secret', $plugin_name);
$appapikey = get_plugin_setting('api_key', $plugin_name);
$appsecret = get_plugin_setting('api_secret', $plugin_name);
$appid = get_plugin_setting('api_id', $plugin_name);
$perms = get_plugin_setting('perms', $plugin_name);
$facebook=get_plugin_setting('facebook', $plugin_name);
$twitter=get_plugin_setting('twitter', $plugin_name);

if ($facebook=="yes"){
//verifica si es usuario de elgg y si esta registrado
$cookie = get_facebook_cookie($appid, $appsecret);
if ($cookie) {
    if (!isloggedin()) {
        $uid = $cookie['uid'];
        $CONFIG->uid = $uid;
        $elgg_user = get_entities_from_metadata('uid', $uid);
        $elgg_user = $elgg_user[0];
        if ($elgg_user->guid) {
            $elgg_user = get_user($elgg_user->guid);
            login($elgg_user);
        } else {
//si no lo redirigio el formulario entonces plab B que el usuario de clic o bien cancele 
?>

            <h3>Bienvenido  <? echo $uid; ?><br>
            <a href="pg/register"> Clic aqui para registrarte </a><br>
            <a href="javascript:FB.logout();"> Salir  </h3> </a>

<?
        }
    }
?>


<?
} else {
?>
<?
?>

<?
}
}
if ($twitter=="yes"){
session_start();
$tok = $_SESSION['tok'];
$sec = $_SESSION['sec'];

if ((isset($tok)) and (isset($sec))) {


    $twitterObj = new EpiTwitter($consumer_key, $consumer_secret, $tok, $sec);

    $twitterInfo = $twitterObj->get_accountVerify_credentials();
    $twitterInfo->response;
    $user = $twitterInfo->screen_name;

    echo $user;
    if (!isloggedin()) {
        $CONFIG->twitter = $sec;
        $elgg_user = get_entities_from_metadata('twitter', $sec);
        $elgg_user = $elgg_user[0];
        if ($elgg_user->guid) {
// hace el login
            $elgg_user = get_user($elgg_user->guid);
            login($elgg_user);
        } else {
?>

            <h3> Bienvenido <? echo $user; ?><br>
            <a href="pg/register"> Clic aqui para registrarte</h3></a> 
<?
        }
    }




} else {

//obtiene los tokens de acceso para Twitter
    $oauth_token = $_GET['oauth_token'];
    $twitterObj = new EpiTwitter($consumer_key, $consumer_secret);

    if (isset($oauth_token)) {

        $twitterObj->setToken($oauth_token);
        $token = $twitterObj->getAccessToken();
        $twitterObj->setToken($token->oauth_token, $token->oauth_token_secret);
        $twitterInfo = $twitterObj->get_accountVerify_credentials();
        $twitterInfo->response;
        $_SESSION['tok'] = $token->oauth_token;
        $_SESSION['sec'] = $token->oauth_token_secret;
?>
        <script>
            window.top.location.reload();
        </script>
<?
    } else {

        $params = array("oauth_callback" => $CONFIG->wwwroot);
        $twitterObj = new EpiTwitter($consumer_key, $consumer_secret);
?>

<?
//muestra el boton Twitter login
        include('twitterlogin.php');
    }
}
}
//muestra el boton FB login
if ($facebook=="yes"){
include('fblogin.php');
}

?>

<script>
    FB.init({appId: '<? echo $appid ?>', status: true,
        cookie: true, xfbml: true});
    FB.Event.subscribe('auth.login', function(response) {
 
        window.top.location.href = "<? echo $CONFIG->wwwroot ?>pg/register/";
    });
    FB.Event.subscribe('auth.logout', function(response) {
 
        window.top.location.reload();
    });
</script>
