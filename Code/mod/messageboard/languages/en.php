<?php

$english = array(

	/**
	 * Menu items and titles
	 */

	'messageboard:board' => "Muro",
	'messageboard:messageboard' => "muro",
	'messageboard:viewall' => "Ver todo",
	'messageboard:postit' => "Post",
	'messageboard:history:title' => "Historial",
	'messageboard:none' => "No hay nada aun en este muro",
	'messageboard:num_display' => "Numero de mensajes a mostrar",
	'messageboard:desc' => "Este es un muro de mensajes que puedes poner en tu perfil, donde otros usuarios podran comentar.",

	'messageboard:user' => "Muro de %s",

	'messageboard:replyon' => 'respuesta en',
	'messageboard:history' => "historial",

	/**
	 * Message board widget river
	 **/

	'messageboard:river:annotate' => "%s tiene un nuevo comentario en su muro",
	'messageboard:river:create' => "%s agrego el widget a su muro.",
	'messageboard:river:update' => "%s actualizo el mensaje de su muro.",
	'messageboard:river:added' => "%s publico en el muro de ",
	'messageboard:river:messageboard' => "",


	/**
	 * Status messages
	 */

	'messageboard:posted' => "Has publicado correctamente en el muro.",
	'messageboard:deleted' => "Tu mensaje ha sido eliminado correctamente.",

	/**
	 * Email messages
	 */

	'messageboard:email:subject' => 'Tienes un nuevo mensaje en tu muro!',
	'messageboard:email:body' => "Tienes un nuevo mensaje de %s en tu muro. Dice asi:

			
%s


Para ver los comentarios de tu muro, haz clic aqui:

	%s

Para ver el perfil de %s, haz clic aqui:

	%s

No puedes responder a este mensaje.",

	/**
	 * Error messages
	 */

	'messageboard:blank' => "Lo sentimos, pero tienes que publicar algo en tu muro antes de guardar.",
	'messageboard:notfound' => "Lo sentimos, no pudimos encontrar el elemento especificado.",
	'messageboard:notdeleted' => "Lo sentimos, no podemos borrar este mensaje.",
	'messageboard:somethingwentwrong' => "Ocurrio un error al intentar guardar el mensaje, asegurate de que en realidad hayas escrito el mensaje.",

	'messageboard:failure' => "Ocurrió un error inesperado al agregar tu mensaje. Por favor, inténtalo de nuevo.",

);

add_translation("en",$english);
