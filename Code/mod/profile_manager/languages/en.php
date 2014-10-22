<?php 
	/**
	* Profile Manager
	* 
	* English language
	* 
	* @package profile_manager
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	*/

	$english = array(
		'profile_manager' => "Administrador de perfil",
		'custom_profile_fields' => "Campos personalizados de perfil",
		'item:object:custom_profile_field' => 'Perfil personalizado',
		'item:object:custom_profile_field_category' => 'Categoría personalizada de perfil',
		'item:object:custom_profile_type' => 'Custom Profile Type',
		'item:object:custom_group_field' => 'Custom Group Field',
		
		// admin
		'profile_manager:admin:metadata_name' => 'Nombre',	
		'profile_manager:admin:metadata_label' => 'Campo',
		'profile_manager:admin:metadata_hint' => 'Ayuda',
		'profile_manager:admin:metadata_description' => 'Descripción',
		'profile_manager:admin:metadata_label_translated' => 'Campo (traducido)',
		'profile_manager:admin:metadata_label_untranslated' => 'Campo (sin traducción)',
		'profile_manager:admin:metadata_options' => 'Opciones (separar por coma)',
		'profile_manager:admin:field_type' => "Tipo de campo",
		'profile_manager:admin:options:datepicker' => 'Calendario',
		'profile_manager:admin:options:pm_datepicker' => 'Calendario (Estilo Profile Manager)',
		'profile_manager:admin:options:pulldown' => 'Desplegable',
		'profile_manager:admin:options:radio' => 'Radio',
		'profile_manager:admin:options:multiselect' => 'Selección múltiple',
		'profile_manager:admin:options:file' => 'Archivo',
		'profile_manager:admin:show_on_members' => "Mostrar filtro de 'miembros' de la página",
		
		'profile_manager:admin:additional_options' => 'Opciones adicionales',
		'profile_manager:admin:show_on_register' => 'Mostrar en el formulario de registro',	
		'profile_manager:admin:mandatory' => 'Obligatorio',
		'profile_manager:admin:user_editable' => 'Usuario puede editar este campo',
		'profile_manager:admin:output_as_tags' => 'Mostrar en el perfil como etiquetas',
		'profile_manager:admin:admin_only' => 'Campo sólo para el adminitrador',
		'profile_manager:admin:simple_search' => 'Mostrar en el formulario de búsqueda simple',	
		'profile_manager:admin:advanced_search' => 'Mostrar en el formulario de búsqueda avanzada',
		'profile_manager:admin:blank_available' => 'Campo con opción en blanco',		
		'profile_manager:admin:option_unavailable' => 'Opción no disponible',
	
		'profile_manager:admin:profile_icon_on_register' => 'Añadir icono de perfil obligatorio en el formulario de registro',
		'profile_manager:admin:simple_access_control' => 'Mostrar sólo un desplegable de control de acceso en el formulario de edición de perfil',
		
		'profile_manager:admin:hide_non_editables' => 'Ocultar los campos no editables del perfil',
	
		'profile_manager:admin:edit_profile_mode' => "Cómo mostrar la pantalla de 'editar perfil'",
		'profile_manager:admin:edit_profile_mode:list' => "Lista",
		'profile_manager:admin:edit_profile_mode:tabbed' => "Pestaña",
	
		'profile_manager:admin:show_full_profile_link' => 'Mostrar un enlace a la página de perfil completo',
	
		'profile_manager:admin:display_categories' => 'Seleccione las diferentes categorías que se mostraran en su perfil',
		'profile_manager:admin:display_categories:option:plain' => 'Plano',
		'profile_manager:admin:display_categories:option:accordion' => 'Acordeón',
	
		'profile_manager:admin:display_system_category' => 'Mostrar una categoría adicional en el perfil con SystemData (sólo para administradores)',
	
		'profile_manager:admin:profile_type_selection' => 'Quién puede cambiar el tipo?',
		'profile_manager:admin:profile_type_selection:option:user' => 'Usuario',
		'profile_manager:admin:profile_type_selection:option:admin' => 'Únicamente administrador',
	
		'profile_manager:admin:show_admin_stats' => "Mostrar estadísticas de administración",
		'profile_manager:admin:show_members_search' => "Mostrar la página 'Miembros' del gestor de perfiles de búsqueda",
	
		'profile_manager:admin:warning:profile' => "ADVERTENCIA: Este plugin debe estar por debajo del plugin perfil",
	
		// profile field additionals description
		'profile_manager:admin:show_on_register:description' => "Desea mostrar este campo en el formulario de registro.",	
		'profile_manager:admin:mandatory:description' => "Si usted desea que este campo sea obligatorio (sólo se aplica al registro).",
		'profile_manager:admin:user_editable:description' => "Si se establece en 'No' los usuarios no podrán editar este campo (muy útil cuando los datos se administran en un sistema externo).",
		'profile_manager:admin:output_as_tags:description' => "La salida de datos se manejan como etiquetas (sólo se aplica en el perfil de usuario).",
		'profile_manager:admin:admin_only:description' => "Seleccione 'Sí' si el campo sólo está disponible para los administradores.",
		'profile_manager:admin:simple_search:description' => "Seleccione 'Sí' si el campo se puede buscar en el formulario de perfil de búsqueda simple.",	
		'profile_manager:admin:advanced_search:description' => "Seleccione 'Sí' si el campo se puede buscar en el formulario de perfil de búsqueda avanzada",
		'profile_manager:admin:blank_available:description' => "Seleccione 'Sí' si la opción en blanco debe ser añadida a las opciones de campo",	
	
		// non_editable
		'profile_manager:non_editable:info' => 'Éste campo no puede ser editado',
	
		// profile user links
		'profile_manager:show_full_profile' => 'Perfil completo',
	
		// datepicker
		'profile_manager:datepicker:output:dateformat' => '%a %d %b %Y', // For available notations see http://nl.php.net/manual/en/function.strftime.php
		'profile_manager:datepicker:input:localisation' => '', // change it to the available localized js files in custom_profile_fields/vendors/jquery.datepick.package-3.5.2 (e.g. jquery.datepick-nl.js), leave blank for default 
		'profile_manager:datepicker:input:dateformat' => '%m/%d/%Y', // Notation is based on strftime, but must result in output like http://keith-wood.name/datepick.html#format
		'profile_manager:datepicker:input:dateformat_js' => 'mm/dd/yy', // Notation is based on strftime, but must result in output like http://keith-wood.name/datepick.html#format
		
		// register form mandatory notice
		'profile_manager:register:mandatory' => "Las secciones con * son obligatorias",	
	
		// register profile icon
		'profile_manager:register:profile_icon' => 'Cargar una imagen de perfil',
		
		// simple access control
		'profile_manager:simple_access_control' => 'Seleccionar quién puede ver tu información de perfil',
	
		// register pre check
		'profile_manager:register_pre_check:missing' => 'El siguiente campo debe ser llenado: %s',
		'profile_manager:register_pre_check:profile_icon:error' => 'Error al cargar el icono de su perfil (probablemente excedio el tamaño del archivo)',
		'profile_manager:register_pre_check:profile_icon:nosupportedimage' => 'El icono cargado no es de tipo(jpg, gif, png)',
	
		// actions
		// new
		'profile_manager:actions:new:success' => 'Se ha agregado correctamente el nuevo campo',	
		'profile_manager:actions:new:error:metadata_name_missing' => 'No se ha dado nombre al metadato',	
		'profile_manager:actions:new:error:metadata_name_invalid' => 'El nombre del metadato no es válido',	
		'profile_manager:actions:new:error:metadata_options' => 'Es necesario introducir opciones cuando se utiliza esta opción',	
		'profile_manager:actions:new:error:unknown' => 'Error desconocido al guardar un campo nuevo perfil',
		'profile_manager:action:new:error:type' => 'Tipo de campo perfil incorrecto (Perfil o Grupo)',
		
		// edit
		'profile_manager:actions:edit:error:unknown' => 'Error al recuperar los datos del perfil',
	
		//reset
		'profile_manager:actions:reset' => 'Borrar',
		'profile_manager:actions:reset:description' => 'Eliminar todos los campos personalizados.',
		'profile_manager:actions:reset:confirm' => 'Seguro que desea restablecer todos los campos del perfil?',
		'profile_manager:actions:reset:error:unknown' => 'Error desconocido al restablecer todos los campos del perfil',
		'profile_manager:actions:reset:error:wrong_type' => 'Tipo equivocado (Perfil o grupo)',
		'profile_manager:actions:reset:success' => 'Borrado satisfactorio',
	
		//delete
		'profile_manager:actions:delete:confirm' => 'Está seguro que desea eliminar este campo?',
		'profile_manager:actions:delete:error:unknown' => 'Error desconocido al eliminar',

		// toggle option
		'profile_manager:actions:toggle_option:error:unknown' => 'Error desconocido al cambiar la opción',

		// actions
		'profile_manager:actions:title' => 'Acciones',
	
		// import from custom
		'profile_manager:actions:import:from_custom' => 'Importar campos personalizados',
		'profile_manager:actions:import:from_custom:description' => 'Importar campos anteriormente definidos',
		'profile_manager:actions:import:from_custom:confirm' => 'Está seguro que desea importar los campos personalizados?',
		'profile_manager:actions:import:from_custom:no_fields' => 'No hay campos disponibles para importar',
		'profile_manager:actions:import:from_custom:new_fields' => 'se han importado <b>%s</b> nuevos campos',
	
		// import from default
		'profile_manager:actions:import:from_default' => 'Importar campos por default',
		'profile_manager:actions:import:from_default:description' => "Importar campos por defaul de Elgg.",
				
		'profile_manager:actions:import:from_default:confirm' => 'Está seguro que desea importar los campos por defecto?',
		'profile_manager:actions:import:from_default:no_fields' => 'NO hay campos por defecto para importar',
		'profile_manager:actions:import:from_default:new_fields' => 'Se han importado <b>%s</b> nuevos campos',
		'profile_manager:actions:import:from_default:error:wrong_type' => 'Tipo de campo erroneo',
	
		// category to field
		'profile_manager:actions:change_category:error:unknown' => "Ha ocurrido un error mientras cambiaba la categoría",
	
		// add category
		'profile_manager:action:category:add:error:name' => "Nombre invalido para la categoría",
		'profile_manager:action:category:add:error:object' => "Error mientras se creaba la categoría",
		'profile_manager:action:category:add:error:save' => "Error mientras se guardaba la categoría",
		'profile_manager:action:category:add:succes' => "La nueva categoría se ha creado",
	
		// delete category
		'profile_manager:action:category:delete:error:guid' => "No se ha provisto un GUID ",
		'profile_manager:action:category:delete:error:type' => "El provisto GUID no es un campo de la categoría",
		'profile_manager:action:category:delete:error:delete' => "Error mientras se almacenaba la categoría",
		'profile_manager:action:category:delete:succes' => "Se ha eliminado la categoría",
	
		// add profile type
		'profile_manager:action:profile_types:add:error:name' => "El nombre no es valido para el campo personalizado",
		'profile_manager:action:profile_types:add:error:object' => "Error mientras se creaba el campo personalizado",
		'profile_manager:action:profile_types:add:error:save' => "Error mientras se almacenaba el campo",
		'profile_manager:action:profile_types:add:succes' => "Ha sido creado el nuevo campo personalizado",
		
		// delete profile type
		'profile_manager:action:profile_types:delete:error:guid' => "No GUID provided",
		'profile_manager:action:profile_types:delete:error:type' => "The provided GUID is not an Custom Profile Type",
		'profile_manager:action:profile_types:delete:error:delete' => "An unknown error occured while deleting the Custom Profile Type",
		'profile_manager:action:profile_types:delete:succes' => "The Custom Profile Type was deleted succesfully",
		
		// Custom Group Fields
		'profile_manager:group_fields' => "Reemplazar los campos de grupos",
		'profile_manager:group_fields:title' => "Vuelva a colocar los campos de perfil",
		
		'profile_manager:group_fields:add:description' => "Aquí puede editar los campos que se muestran en una página de perfil de grupo",
		'profile_manager:group_fields:add:link' => "Agregar un campo de grupo nuevo perfil",
		
		'profile_manager:profile_fields:no_fields' => "Actualmente no hay campos configurados usando el plugin de gestor de perfiles. Añade tu propia o de importación con una de las siguientes acciones.",
		'profile_manager:profile_fields:add:description' => "Aquí puede editar los campos que el usuario puede editar en su perfil",
		'profile_manager:profile_fields:add:link' => "Agregar nuevo tipo de perfil",
	
		// Custom fields categories
		'profile_manager:categories:add:link' => "Agregar nueva categoría",
		
		'profile_manager:categories:list:title' => "Categorías",
		'profile_manager:categories:list:default' => "Default",
		'profile_manager:categories:list:system' => "Administrador",	
		'profile_manager:categories:list:view_all' => "Ver toda la lista",
		'profile_manager:categories:list:no_categories' => "Categoría no definida",
		
		'profile_manager:categories:delete:confirm' => "Está seguro que desea eliminar esta categoría?",
		
		// Custom Profile Types
		'profile_manager:profile_types:add:link' => "Agregar nuevo tipo de perfil",
		
		'profile_manager:profile_types:list:title' => "Tipos de Perfil",
		'profile_manager:profile_types:list:no_types' => "No hay tipos de perfil definidos",
	
		'profile_manager:profile_types:delete:confirm' => "Está seguro de que desea borrar el tipo de perfil?",
		
		// Export
		'profile_manager:actions:export' => "Exportar Datos de Perfil",
		'profile_manager:actions:export:description' => "Exportar datos a archivo CSV",
		'profile_manager:export:title' => "Exportar Datos de Perfil",
		'profile_manager:export:description:custom_profile_field' => "Esta función exporta todos los <b>Usuarios</b> de los metadatos.",
		'profile_manager:export:description:custom_group_field' => "Esta función exporta todos los metadatos de los <b>grupos</b>.",
		'profile_manager:export:list:title' => "Selecciona los campos que deseas exportar",
		'profile_manager:export:nofields' => "No hay campos para exportar",
	
		// Configuration Backup and Restore
		'profile_manager:actions:configuration:backup' => "Respaldo de los campos",
		'profile_manager:actions:configuration:backup:description' => "Copia de la configuración de los campos (<b>las categorias y tipos no se incluyen</b>)",
		'profile_manager:actions:configuration:restore' => "Restaurar campos de configuración",
		'profile_manager:actions:configuration:restore:description' => "Restaurar una copia de configuración anterior (<b>Se perderan las relaciones entre los campos y las categorias</b>)",
		
		'profile_manager:actions:configuration:restore:upload' => "Restaurar",
	
		'profile_manager:actions:restore:success' => "Restauración correcta",
		'profile_manager:actions:restore:error:deleting' => "Error al restaurar: No se han podido eliminar los datos",	
		'profile_manager:actions:restore:error:fieldtype' => "Error al restaurar: Los tipos de campos no coinciden",
		'profile_manager:actions:restore:error:corrupt' => "Error al restaurar: La copia puede estar dañada o hay campos faltantes",
		'profile_manager:actions:restore:error:json' => "Error al restaurar: Archivo JSON no válido",
		'profile_manager:actions:restore:error:nofile' => "Error al restaurar: El archivo no ha sido cargado",
	
		// Tooltips
		'profile_manager:tooltips:profile_field' => "
			<b>Campo de perfil</b><br />
			Aquí puedes agregar un nuevo campo de perfil.<br /><br />
			Si deja la etiqueta vacía, puede internacionalizar la etiqueta del campo perfil (<i>profile:[name]</i>).<br /><br />
			Utilice los campos 'hint' para facilitar el llenado de los formularios.<br /><br />
			Las opciones son obligatorias en los tipos de campos <i>Desplegable, radio y multiselección</i>.
		",
		'profile_manager:tooltips:profile_field_additional' => "
			<b>Mostrar en registro</b><br />
			Sí deseas que se muestre en el formulario de registro.<br /><br />
			
			<b>Obligatorio</b><br />
			Si deseas que el campo sea obligatorio sólo aplica para el registro.<br /><br />
			
			<b>Editable por el usuario</b><br />
			Si se establece en 'NO' los usuarios pueden editar este campo(útil si se maneja un sistema externo ).<br /><br />
			
			<b>Mostrar como etiquetas</b><br />
			La salida de los datos se manejan como etiquetas sólo aplica en el perfil.<br /><br />
			
			<b>Campo editable por administrador</b><br />
			Seleccione sí para que sólo editable por él.
		",
		'profile_manager:tooltips:category' => "
			<b>Categoría</b><br />
			Aquí puedes agregar una nueva categoría.<br /><br />
			Sí deja la etiqueta vacia de puede internacionalizar (<i>profile:categories:[name]</i>).<br /><br />
			
			Si existen tipos de perfil UD puede definir que tipos se encuentran en cada categoría. Si no la categoría se aplica a todo tipo de perfil.
		",
		'profile_manager:tooltips:category_list' => "
			<b>Categorías</b><br />
			Muestra la lista de las categorias definidas.<br /><br />
			
			<i>Defecto</i> Esta categoría se aplica a todos los perfiles.<br /><br />
			
			Agregar campos a estas categorías, colocándolos en cada categoría.<br /><br />
			
			Haga clic en la etiqueta de categoría de filtro de los campos visibles. Al hacer clic en ver todos los campos muestra todos los 			campos.<br /><br />
			
			También puede cambiar el orden de las categorías arrastrándolas (<i>Default can't be dragged</i>. <br /><br />
			
			Haga clic en el icono de edición para editar la categoría.
		",
		'profile_manager:tooltips:profile_type' => "
			<b>Tipo Perfil</b><br />
			Aquí puede agregar un nuevo tipo de perfil.<br /><br />
			Si deja la etiqueta vacía, se puede internacionalizar la etiqueta de tipo de perfil (<i>profile:types:[name]</i>).<br /><br />
			Escriba una descripción que los usuarios pueden ver al seleccionar este tipo de perfil o dejar en blanco para internacionalizar (<i>profile:types:[name]:description</i>).<br /><br />
			Usted puede añadir este tipo de perfil que puede aplicar un filtro a la página de búsqueda de los miembros<br /><br />
			
			Usted puede elegir qué categorías se aplican a este tipo de perfil.
		",
		'profile_manager:tooltips:profile_type_list' => "
			<b>Tipos de Perfil</b><br />
			Mostrar una lista de los tipos de perfil.<br /><br />
			Click para editar el icono o tipo de perfil.
		",
		'profile_manager:tooltips:actions' => "
			<b>Acciones</b><br />
			Existen varias acciones relacionadas con el tipo de perfil.
		",
		
		// Edit profile => profile type selector
		'profile_manager:profile:edit:custom_profile_type:label' => "Selecciona un tipo de perfil",
		'profile_manager:profile:edit:custom_profile_type:description' => "Descripción del tipo de perfil",
		'profile_manager:profile:edit:custom_profile_type:default' => "Defecto",
	
		// Admin Stats
		'profile_manager:admin_stats:title'=> "Estadísticas del perfil administrador",
		'profile_manager:admin_stats:total'=> "Total de usuarios",
		'profile_manager:admin_stats:profile_types'=> "Cantidad de usuarios con tipos de perfil",
	
		// Members
		'profile_manager:members:menu' => "Miembros",
		'profile_manager:members:submenu' => "Búsqueda de miembros",
		'profile_manager:members:searchform:title' => "Búsqueda por nombre",
		'profile_manager:members:searchform:simple:title' => "Búsqueda simple",
		'profile_manager:members:searchform:advanced:title' => "Búsqueda avanzada",
		'profile_manager:members:searchform:sorting' => "Clasificación",
		'profile_manager:members:searchform:sorting:alphabetic' => "Alfabéticamente",
		'profile_manager:members:searchform:sorting:newest' => "Reciente",
		'profile_manager:members:searchform:sorting:popular' => "Popular",
		'profile_manager:members:searchform:sorting:online' => "En linea",
		'profile_manager:members:searchform:date:from' => "de",
		'profile_manager:members:searchform:date:to' => "para",
		'profile_manager:members:searchresults:title' => "Resultados de búsqueda",
		'profile_manager:members:searchresults:query' => "Pregunta",
		'profile_manager:members:searchresults:noresults' => "No se encontró ninguna coincidencia",
		'profile_manager:members:searchform:reset' => "Borrar",
	
		// Admin add user form
		'profile_manager:admin:adduser:notify' => "Notificar usuario",
		'profile_manager:admin:adduser:use_default_access' => "Metadatos adicionales creados en función del nivel de acceso al sitio por defecto",
		'profile_manager:admin:adduser:extra_metadata' => "Agregar datos extra",
		'profile_manager:admin:adduser:mark_as_validated' => "Marcar como usuario válido",
	
	);
	
	add_translation("en", $english);
?>
