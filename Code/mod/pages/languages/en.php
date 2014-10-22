<?php
	/**
	 * Elgg pages plugin language pack
	 * 
	 * @package ElggPages
	 */

	$english = array(
	
		/**
		 * Menu items and titles
		 */
			
			'pages' => "Páginas",
			'pages:yours' => "Tús páginas",
			'pages:user' => "Páginas personales",
			'pages:group' => "Páginas del grupo",
			'pages:all' => "Todas las páginas",
			'pages:new' => "Nueva página",
			'pages:groupprofile' => "Páginas del grupo",
			'pages:edit' => "Editar esta página",
			'pages:delete' => "Borrar esta página",
			'pages:history' => "Historial de esta página",
			'pages:view' => "Ver página",
			'pages:welcome' => "Editar mensaje de bienvenida",
			'pages:welcomemessage' => "Plugin para mostrar páginas de Elgg. Este modulo te permite crear paginas o cualquier topic y seleccionar quien puede verlo y editarlo",
			'pages:welcomeerror' => "Existe un problema al salvar tu mensaje de bienvenida. Intentalo de nuevo o ponte en contacto con el administrador",
			'pages:welcomeposted' => "Tú mensaje de bienvenida ha sido publicado",
			'pages:navigation' => "Página de navegación",
	        'pages:via' => "vía páginas",
			'item:object:page_top' => 'Páginas iniciales',
			'item:object:page' => 'Páginas',
			'item:object:pages_welcome' => 'Páginas de bienvenida bloquedas',
			'pages:nogroup' => 'Este grupo no ha creado páginas aún',
			'pages:more' => 'Más páginas',
			
		/**
		* River
		**/
		
		    'pages:river:annotate' => "un comentario en esta página",
		    'pages:river:created' => "%s escribio",
	        'pages:river:updated' => "%s actualizo",
	        'pages:river:posted' => "%s publico",
			'pages:river:create' => "una nueva página con el título",
	        'pages:river:update' => "un título para la página",
	        'page:river:annotate' => "un comentario en la página",
	        'page_top:river:annotate' => "un comentario en esta página",
	
		/**
		 * Form fields
		 */
	
			'pages:title' => 'Título de las páginas',
			'pages:description' => 'Descripción de la entrada',
			'pages:tags' => 'Etiquetas',	
			'pages:access_id' => 'Acceso',
			'pages:write_access_id' => 'Acceso de escritura',
		
		/**
		 * Status and error messages
		 */
			'pages:noaccess' => 'Sin acceso a la página',
			'pages:cantedit' => 'No puedes editar esta página',
			'pages:saved' => 'Página guarda',
			'pages:notsaved' => 'La página no puede ser guardada',
			'pages:notitle' => 'Debe darle un título a la página.',
			'pages:delete:success' => 'La página ha sido borrada.',
			'pages:delete:failure' => 'La página no ha podido ser borrada',
	
		/**
		 * Page
		 */
			'pages:strapline' => 'Última actualización %s por %s',
	
		/**
		 * History
		 */
			'pages:revision' => 'Revisión realizada %s por %s',
			
		/**
		 * Widget
		 **/
		 
		    'pages:num' => 'Número de páginas a mostrar',
			'pages:widget:description' => "Ésta es la lista de todas sus páginas.",
	
		/**
		 * Submenu items
		 */
			'pages:label:view' => "Ver página",
			'pages:label:edit' => "Editar página",
			'pages:label:history' => "Historial de la página",
	
		/**
		 * Sidebar items
		 */
			'pages:sidebar:this' => "Ésta página",
			'pages:sidebar:children' => "Sub-páginas",
			'pages:sidebar:parent' => "Principal",
	
			'pages:newchild' => "Crear sub-página",
			'pages:backtoparent' => "Volver a '%s'",
	);
					
	add_translation("en",$english);
?>
