<?php

	$english = array(
	
		/**
		 * Menu items and titles
		 */
	
			'blog' => "Blog",
			'blogs' => "Blogs",
			'blog:user' => "Blog de %s",
			'blog:user:friends' => "Blog de los amigos de %s",
			'blog:your' => "Tu blog",
			'blog:posttitle' => "Blog de %s: %s",
			'blog:friends' => "Blogs de tus amigos",
			'blog:yourfriends' => "Blogs mas recientes de tus amigos",
			'blog:everyone' => "Todos los blogs de la red",
			'blog:newpost' => "Nuevo entrada del blog",
			'blog:via' => "via blog",
			'blog:read' => "Leer blog",
	
			'blog:addpost' => "Escribir una entrada de blog",
			'blog:editpost' => "Editar una entrada de blog",
	
			'blog:text' => "Texto del blog",
	
			'blog:strapline' => "%s",
			
			'item:object:blog' => 'Publicaciones del Blog',
	
			'blog:never' => 'Nunca',
			'blog:preview' => 'Vista previa',
	
			'blog:draft:save' => 'Guardar proyecto',
			'blog:draft:saved' => 'Ultimo proyecto guardado',
			'blog:comments:allow' => 'Todos los comentarios',
			'blog:conversation' => 'Conversacion',
	
			'blog:preview:description' => 'Esta es una vista previa de su entrada en el blog.',
			'blog:preview:description:link' => 'Para continuar con la edicion o guardar el mensaje, haga clic aqui.',
	
			'groups:enableblog' => 'Habilitar el blog del grupo',
			'blog:group' => 'Blog del grupo',
			'blog:nogroup' => 'Este grupo no tiene ningun tipo de publicaciones en el blog todavia',
			'blog:more' => 'Mas publicaciones en el blog',
	
			'blog:read_more' => 'Leer publicacion completa',

		/**
		 * Blog widget
		 */
		'blog:widget:description' => 'Este widget muestra las ultimas entradas del blog.',
		'blog:moreblogs' => 'Mas publicaciones en el blog',
		'blog:numbertodisplay' => 'Numero de publicaciones en el blog para mostrar',
		
         /**
	     * Blog river
	     **/
	        
	        //generic terms to use
	        'blog:river:created' => "%s escribio",
	        'blog:river:updated' => "%s actualizo",
	        'blog:river:posted' => "%s publico",
	        
	        //these get inserted into the river links to take the user to the entity
	        'blog:river:create' => "un nuevo blog titulado",
	        'blog:river:update' => "una entrada de blog titulada",
	        'blog:river:annotate' => "un comentario sobre esta entrada del blog",
			
	
		/**
		 * Status messages
		 */
	
			'blog:posted' => "Su entrada en el blog fue publicada con exito.",
			'blog:deleted' => "Su entrada en el blog fue borrada con exito.",
	
		/**
		 * Error messages
		 */
	
			'blog:error' => 'Algo salio mal. Por favor, inténtelo de nuevo.',
			'blog:save:failure' => "Su entrada en el blog no se pudo guardar. Por favor, intentelo de nuevo.",
			'blog:blank' => "Lo sentimos; Es necesario poner tanto el título como el contenido antes de poder hacer una publicacion.",
			'blog:notfound' => "Lo sentimos; no hemos podido encontrar la entrada del blog que especifico.",
			'blog:notdeleted' => "Lo sentimos; no pudimos eliminar esta entrada del blog.",
	
	);
					
	add_translation("en",$english);

?>