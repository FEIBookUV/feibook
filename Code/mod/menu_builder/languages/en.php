<?php

	$english = array(
	
		/**
		 * Menu items and titles
		 */
	
		'menu_builder' => "Constructor de menu",
	
		// item
		'item:object:menu_builder_menu_item' => "Menu Builder item",
	
		// views
		// edit
		'menu_builder:edit_mode:off' => "Modo de visualizacion",
		'menu_builder:edit_mode:on' => "Modo de edicion",
		'menu_builder:edit_mode:add' => "Haga clic para añadir un nuevo elemento",
	
		// add
		'menu_builder:add:title' => "Añadir un nuevo elemento",
		'menu_builder:add:form:title' => "Titulo",
		'menu_builder:add:form:url' => "URL",
		'menu_builder:add:form:parent' => "Elemento padre del menu",
		'menu_builder:add:form:parent:toplevel' => "Elemento de nivel superior",
		'menu_builder:add:form:access' => "¿Quien puede ver este elemento del menu?",
		'menu_builder:add:access:admin_only' => "Solo administracion",
	
		// actions
		'menu_builder:actions:edit:error:input' => "Entrada incorrecta para crear/editar un elemento del menu",
		'menu_builder:actions:edit:error:entity' => "El GUID dado no se pudo encontrar",
		'menu_builder:actions:edit:error:subtype' => "El GUID givern no es un elemento del menu",
		'menu_builder:actions:edit:error:create' => "Ha ocurrido un error al crear el elemento de menu, por favor, inténtelo de nuevo",
		'menu_builder:actions:edit:error:parent' => "No puede mover este elemento de menu, ya que tiene elementos de submenu. Por favor, mueva los elementos de submenú en primer lugar.",
		'menu_builder:actions:edit:error:save' => "Error desconocido al guardar el elemento de menú, por favor, inténtelo de nuevo",
		'menu_builder:actions:edit:success' => "El elemento del menu fue creado / editado correctamente",
		
		// settings
		'menu_builder:settings:extend_header' => "Extienda el encabezado predeterminado con el Creador de Menu",
	);
					
	add_translation("en",$english);

?>
