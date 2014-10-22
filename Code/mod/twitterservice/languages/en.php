<?php
/**
 * An english language definition file
 */

$english = array(
	'twitterservice' => 'Twitter Services',

	'twitterservice:consumer_key' => 'Consumer Key',
	'twitterservice:consumer_secret' => 'Consumer Secret',

	'twitterservice:usersettings:description' => "Enlazar tu cuenta de {$CONFIG->site->name} con Twitter.",
	'twitterservice:usersettings:request' => "Primero debes <a href=\"%s\">AUTORIZAR a</a> {$CONFIG->site->name} para acceder a tu cuenta de Twitter.",
	'twitterservice:authorize:error' => 'No se puedo autorizar a Twitter.',
	'twitterservice:authorize:success' => 'El acceso a Twitter ha sido autorizado.',

	'twitterservice:usersettings:authorized' => "Has autorizado a {$CONFIG->site->name} el acceso a tu cuenta de Twitter: Si los Tweets no aparecen, puede que tengas que volver a autorizar. Para esto primero debes revocar el acceso, dirigete a <a href=\"http://twitter.com/settings/connections\">TWITTER. CONFIGURACION DE LA CONEXION</a> y revoca el acceso para %s.  Luego regresa a esta pagina y autoriza nuevamente.",
	'twitterservice:usersettings:revoke' => 'Click <a href="%s">AQUI</a> para revocar el acceso.',
	'twitterservice:revoke:success' => 'El acceso a Twitter ha sido revocado.',

	'twitterservice:usersettings:allowed_plugins' => 'Selecciona los Plugins',
);

add_translation('en', $english);
