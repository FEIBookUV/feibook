<?php

	$english = array(
	
		/**
		 * Menu items and titles
		 */
	
			'messages' => "Mensajes",
            'messages:back' => "volver a mensajes",
			'messages:user' => "Buzón de correo",
			'messages:sentMessages' => "enviar mensaje",
			'messages:posttitle' => "mensaje de %s: %s",
			'messages:inbox' => "Buzón",
			'messages:send' => "Enviar un mensaje",
			'messages:sent' => "Mensaje enviado",
			'messages:message' => "Mensaje",
			'messages:title' => "Título",
			'messages:to' => "Para",
            'messages:from' => "De",
			'messages:fly' => "Enviar",
			'messages:replying' => "Mensaje respondido a",
			'messages:inbox' => "Buzón",
			'messages:sendmessage' => "Enviar un mensaje",
			'messages:compose' => "Escribir un mensaje",
			'messages:sentmessages' => "Mensaje enviados",
			'messages:recent' => "Mensajes recientes",
            'messages:original' => "Mensaje Original",
            'messages:yours' => "Tu mensaje",
            'messages:answer' => "Responder",
			'messages:toggle' => 'Seleccionar todos',
			'messages:markread' => 'Marcar como leido',
			
			'messages:new' => 'Nuevo mensaje',
	
			'notification:method:site' => 'Sitio',
	
			'messages:error' => 'Ha ocurrido un problema, porfavor intenta de nuevo.',
	
			'item:object:messages' => 'Mensajes',
	
		/**
		 * Status messages
		 */
	
			'messages:posted' => "Tu mensaje ha sido enviado.",
			'messages:deleted' => "Tus mensajes han sido borrados.",
			'messages:markedread' => "Tus mensajes han sido marcados como leidos.",
	
		/**
		 * Email messages
		 */
	
			'messages:email:subject' => 'Tienes un nuevo mensaje!',
			'messages:email:body' => "Tienes un mensaje de %s. Dice:

			
%s


Para ver tus mensajes, clic aqui:

	%s

Para enviar un mensaje a %s haz click aqui:

	%s

Por favor no responda este mensaje.",
	
		/**
		 * Error messages
		 */
	
			'messages:blank' => "No has escrito el mensaje. Tienes que poner algo en el cuerpo del mensaje antes de que podamos enviarlo.",
			'messages:notfound' => "Vaya!, no hemos podido encontrar el mensaje solicitado. Intentalo de nuevo o ponte en contacto con el administrador",
			'messages:notdeleted' => "ops!, no hemos podido eliminar el mensaje. Intentalo de nuevo o ponte en contacto con el administrador",
			'messages:nopermission' => "Tu no tienes permisos para modificar este mensaje.",
			'messages:nomessages' => "No hay ningún mensaje que mostrar",
			'messages:user:nonexist' => "No hemos podido encontrar el destinatario en la base de datos de usuarios. Intentalo de nuevo o ponte en contacto con el administrador",
			'messages:user:blank' => "No has seleccionado a nadie para enviarle tu mensaje :)",
	
	);
					
	add_translation("en",$english);

?>
