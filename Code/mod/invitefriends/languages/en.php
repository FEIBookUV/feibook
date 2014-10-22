<?php

/**
 * Elgg invite language file
 * 
 * @package ElggInviteFriends
 */

$english = array(

	'friends:invite' => 'Invitar amigos',
	'invitefriends:introduction' => 'Para invitar amigos a que se unan a FEIBook, ingresa la direccion de correo electronico (uno por linea):',
	'invitefriends:message' => 'Ingresa el mensaje que incluira tu invitacion:',
	'invitefriends:subject' => 'Invitacion para unirse a %s',

	'invitefriends:success' => 'Tus amigos han sido invitados.',
	'invitefriends:invitations_sent' => 'Invitaciones enviadas: %s. Surgieron los siguientes problemas:',
	'invitefriends:email_error' => 'Las direcciones de correo electronico son invalidas: %s',
	'invitefriends:already_members' => 'Los siguientes correos ya estan registrados en FEIBook: %s',
	'invitefriends:noemails' => 'No se ha ingresado ningun correo electronico.',
	
	'invitefriends:message:default' => '
Hola!,

Quiero invitarte a unirte a %s.',

	'invitefriends:email' => '
Has sido invitado a unirte a %s por %s. La invitacion incluye el siguiente mensaje:

%s

Para unirte a FEIBook, da clic en el siguiente enlace:

%s

.',
	
	);
					
add_translation("en", $english);