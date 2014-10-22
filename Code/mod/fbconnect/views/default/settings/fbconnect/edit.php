<?php
//Este codigo es para mostrar las opciones en la herramienta de administración
$body = '';
$plugin_name = "fbconnect";
$consumer_key = get_plugin_setting('consumer_key', $plugin_name);
$consumer_secret = get_plugin_setting('consumer_secret', $plugin_name);
$appapikey = get_plugin_setting('api_key', $plugin_name);
$appsecret = get_plugin_setting('api_secret', $plugin_name);
$appid = get_plugin_setting('api_id', $plugin_name);
$perms = get_plugin_setting('perms', $plugin_name);
if(!($perms)) $perms="user_birthday,friends_birthday,offline_access,email,publish_stream,status_update,user_birthday,user_location,user_work_history,user_photos, user_photo_video_tags";

$body .= 'activar facebook connect?';
$facebook = $vars['entity']->facebook;
$twitter = $vars['entity']->twitter;
	if (!$facebook) $facebook = 'no';
if (!$twitter) $twitter = 'no';
$body .= elgg_view('input/pulldown', array(
			'internalname' => 'params[facebook]',
			'options_values' => array(
				'no' => "no",
				'yes' => "yes"
			),
			'value' => $facebook
		));

$body .= "<br /> activar Twitter connect?";
$body .= elgg_view('input/pulldown', array(
			'internalname' => 'params[twitter]',
			'options_values' => array(
				'no' => "no",
				'yes' => "yes"
			),
			'value' => $twitter
		));


$body .= "<br />TWITTER CONSUMER KEY<br />";
$body .= elgg_view('input/text',array('internalname'=>'params[consumer_key]','value'=>$consumer_key));
$body .= "TWITTER CONSUMER SECRET KEY<br />";
$body .= elgg_view('input/text',array('internalname'=>'params[consumer_secret]','value'=>$consumer_secret));
$body .= "FACEBOOK API KEY<br />";
$body .= elgg_view('input/text',array('internalname'=>'params[api_key]','value'=>$appapikey));
$body .= "FACEBOOK API SECRET<br />";
$body .= elgg_view('input/text',array('internalname'=>'params[api_secret]','value'=>$appsecret));
$body .= "FACEBOOK API_ID<br />";
$body .= elgg_view('input/text',array('internalname'=>'params[api_id]','value'=>$appid));
$body .= "FACEBOOK PERMISOS<br />";
$body .= elgg_view('input/text',array('internalname'=>'params[perms]','value'=>$perms));
echo $body;

?>
