<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* English language file
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/

	$english = array(
		'elggchat' => "ElggChat",
		'elggchat:title' => "ElggChat",
		'elggchat:chat:profile:invite' => "Invitar al chat",
		'elggchat:chat:send' => "Enviar",
		
		'elggchat:friendspicker:info' => "Amigos en linea",
		'elggchat:friendspicker:online' => "Conectados",
		'elggchat:friendspicker:offline' => "Desconectados",
	
		'elggchat:chat:invite' => "Invitar",
		'elggchat:chat:leave' => "Salir",
		'elggchat:chat:leave:confirm' => "Seguro que desea salir de la sesion?",
		
		'elggchat:action:invite' => "<b>%s</b> Invitar <b>%s</b>",
		'elggchat:action:leave' => "<b>%s</b> salio de la sesion",
		'elggchat:action:join' => "<b>%s</b> se unio a la sesion",
		
		'elggchat:session:name:default' => "Sesion terminada",
		'elggchat:session:onlinestatus' => "Ultima accion: %s",
		
		// Plugin settings
		'elggchat:admin:settings:hours' => "%s hora(s)",
	
		'elggchat:admin:settings:maxsessionage' => "Tiempo maximo que una sesion puede permanecer inactiva antes de la limpieza",
		
		'elggchat:admin:settings:chatupdateinterval' => "Intervalo de segundos de la ventana de chat",
		'elggchat:admin:settings:maxchatupdateinterval' => "Cada 10 tiempos sin datos devueltos el intervalo de segundos de la ventana del chat se multiplicara hasta alcanzar este maximo (segundos) ",
		'elggchat:admin:settings:monitorupdateinterval' => "Intervalo de segundos de monitoreo de sesion de chat, que comprueba las solicitudes de chat nuevos ",
		'elggchat:admin:settings:enable_sounds' => "Habilitar sonidos",
		'elggchat:admin:settings:enable_flashing' => "Habilitar el parpadeo si hay mensajes nuevos",
		'elggchat:admin:settings:enable_extensions' => "Habilitar extenciones",

		'elggchat:admin:settings:online_status:active' => "Numero maximo de segundos antes de que el usuario se muestre inactivo",
		'elggchat:admin:settings:online_status:inactive' => "Numero maximo de segundos antes que el usuario estara inactivo",
		
		// User settings
		'elggchat:usersettings:enable_chat' => "Habilitar chat?",
		'elggchat:usersettings:allow_contact_from' => "Quienes pueden contactarme por el chat",
		'elggchat:usersettings:allow_contact_from:all' => "Cualquier usuario de FEIBook puede contactarme",
		'elggchat:usersettings:allow_contact_from:friends' => "Solo mis amigos pueden contactarme",
		'elggchat:usersettings:allow_contact_from:none' => "Nadie puede contactarme",
		'elggchat:usersettings:show_offline_user' => "Mostrar usuarios sin conexion",

		// Toolbar actions
		'elggchat:toolbar:minimize' => "Minimizar chat",
		'elggchat:toolbar:maximize' => "Maximizar chat",
	);
					
	add_translation("en", $english);

?>
