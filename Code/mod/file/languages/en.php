<?php
	/**
	 * Elgg file plugin language pack
	 * 
	 * @package ElggFile
	 */

	$english = array(
	
		/**
		 * Menu items and titles
		 */
	
			'file' => "Archivos",
			'files' => "Archivos",
			'file:yours' => "Tus archivos",
			'file:yours:friends' => "Archivos de tus amigos",
			'file:user' => "Archivos de %s ",
			'file:friends' => "Archivos de los amigos de %s ",
			'file:all' => "Todos los archivos",
			'file:edit' => "Editar archivo",
			'file:list' => "Ver lista",
			'file:gallery' => "Ver galeria",
			'file:gallery_list' => "Ver galeria o lista",
			'file:num_files' => "Numero de archivos a mostrar",
			'file:user:gallery'=>'Ver la galeria de %s',
	        'file:via' => 'A traves de archivos',
			'file:upload' => "Subir un archivo",
			'file:replace' => 'Reemplazar el contenido del archivo',
	
			'file:group' => "Archivos del grupo",
			'groups:enablefiles' => 'Permitir los archivos de grupo',
			'file:newupload' => 'Nuevo archivo',
			'file:more' => "Mas archivos",

			'file:nogroup' => 'Este grupo aun no tiene ningun archivo',
			
			'file:file' => "Archivo",
			'file:title' => "Titulo",
			'file:desc' => "Descripcion",
			'file:tags' => "Tags",
	
			'file:types' => "Cargado los tipos de archivos",
	
			'file:type:all' => "Todos los archivos",
			'file:type:video' => "Videos",
			'file:type:document' => "Documentos",
			'file:type:audio' => "Audio",
			'file:type:image' => "Imagenes",
			'file:type:general' => "General",
	
			'file:user:type:video' => "Videos de %s",
			'file:user:type:document' => "Documentos de %s's",
			'file:user:type:audio' => "Audios de %s",
			'file:user:type:image' => "Imagenes de %s",
			'file:user:type:general' => "Archivos en general de %s's",
	
			'file:friends:type:video' => "Videos de tus amigos",
			'file:friends:type:document' => "Documentos de tus amigos",
			'file:friends:type:audio' => "Audios de tus amigos",
			'file:friends:type:image' => "Imagenes de tus amigos",
			'file:friends:type:general' => "Archivos en general de tus amigos",
	
			'file:widget' => "Archivo widget",
			'file:widget:description' => "Mostrar archivos mas recientes",
	
			'file:download' => "Descargar esto",
	
			'file:delete:confirm' => "Estas seguro que quieres eliminar este archivo",
			
			'file:tagcloud' => "Nube de etiquetas",
	
			'file:display:number' => "Numero de archivos a mostrar",
	
			'file:river:created' => "%s ha cargado",
			'file:river:item' => "el siguiente archivo",
			'file:river:annotate' => "Un comentario sobre este archivo",

			'item:object:file' => 'Archivos',
			
	    /**
		 * Embed media
		 **/
		 
		    'file:embed' => "Embed media",
		    'file:embedall' => "All",
	
		/**
		 * Status messages
		 */
	
			'file:saved' => "Tu archivo se ha guardado correctamente",
			'file:deleted' => "Tu archivo ha sido eliminado correctamente.",
	
		/**
		 * Error messages
		 */
	
			'file:none' => "No hay archivos.",
			'file:uploadfailed' => "Lo sentimos, no hemos podido guardar el archivo.",
			'file:downloadfailed' => "Lo sentimos, este archivo no esta disponible en este momento.",
			'file:deletefailed' => "El archivo no se ha podido eliminar.",
			'file:noaccess' => "No tienes permisos para modificar este archivo",
			'file:cannotload' => "Hubo un error al cargar el archivo",
			'file:nofile' => "Debes seleccionar un archivo",
	);
					
	add_translation("en",$english);
?>
