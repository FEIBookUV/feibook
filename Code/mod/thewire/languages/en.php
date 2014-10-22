<?php

	$english = array(

		/**
		 * Menu items and titles
		 */

			'thewire' => "El muro",
			'thewire:user' => "Red de %s",
			'thewire:posttitle' => "Notas de %s en la red: %s",
			'thewire:everyone' => "Todos los mensajes de la red",
			'thewire:friends:title' => "%s amigos del muro",
			'thewire:friends' => "Mensajes de tus amigos",

			'thewire:yours' => "Tus mensajes publicados",
			'thewire:theirs' => "%s sus mensajes publicados",

			'thewire:strapline' => "%s",

			'thewire:add' => "Enviar mensaje a la red",
			'thewire:text' => "Dejar una nota en la red",
			'thewire:reply' => "Responder",
			'thewire:via_method' => "a través de %s",
			'thewire:wired' => "Enviado a la red",
			'thewire:charleft' => "caracteres por usar",
			'item:object:thewire' => "Envíos de la red",
			'thewire:notedeleted' => "nota borrada",
			'thewire:doing' => "Qué haces? Compartelo a todos:",
			'thewire:newpost' => 'Nuevo mensaje',
			'thewire:addpost' => 'Enviar a la red',
			'thewire:by' => "Publicado por %s",
			'thewire:update' => 'actualizar',


		/**
		 * The wire river
		 **/

			//generic terms to use
			'thewire:river:created' => "%s ha dicho",

			//these get inserted into the river links to take the user to the entity
			'thewire:river:create' => "a la red.",

		/**
		 * Wire widget
		 **/

			'thewire:sitedesc' => 'This widget shows the latest site notes posted to the wire',
			'thewire:yourdesc' => 'This widget displays your latest wire posts',
			'thewire:friendsdesc' => 'This widget will show the latest from your friends on the wire',
			'thewire:num' => 'Número de publicaciones',
			'thewire:moreposts' => 'Maś mensajes publicados',


		/**
		 * Status messages
		 */

			'thewire:posted' => "Tu mensaje ha sido compartido a toda la red.",
			'thewire:deleted' => "Tu mensaje ha sido borrado.",

		/**
		 * Error messages
		 */

			'thewire:blank' => "Necesitas rellenar el cuadro de texto para poder guardarlo",
			'thewire:notfound' => "No encontramos el mensaje que buscas. Intentalo de nuevo o ponte en contacto con el administrador",
			'thewire:notdeleted' => "No podemos borrar el mensaje!. Intentalo de nuevo o ponte en contacto con el administrador",


		/**
		 * Settings
		 */
			'thewire:smsnumber' => "El número SMS es diferente del número de móvil que tienes en el sistema. Recuerda que debes especificar el formato internacional.",
			'thewire:channelsms' => "El número para enviar mensajes SMS es <b>%s</b>",

		// twitter
			'thewire:twitterservice:desc' => 'Todos los mensajes hechos en Twitter.',

	);

	add_translation("en",$english);

?>
