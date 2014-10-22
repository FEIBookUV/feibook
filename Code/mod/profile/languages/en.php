<?php
	/**
	 * Elgg profile plugin language pack
	 *
	 * @package ElggProfile
	 */

	$english = array(

	/**
	 * Profile
	 */

		'profile' => "Perfil",
		'profile:edit:default' => 'Llenar tu perfil',
		'profile:preview' => 'Previsualizar',

	/**
	 * Profile menu items and titles
	 */

		'profile:yours' => "Tu perfil",
		'profile:user' => "%s perfil",

		'profile:edit' => "Editar perfil",
		'profile:profilepictureinstructions' => "La foto de perfil es la imagen que se muestra en tu página de perfil. Puedes cambiarla tan a menudo como quieras. (Formatos aceptados: GIF, JPG o PNG)",
		'profile:icon' => "Foto de perfil",
		'profile:createicon' => "Crear su icono",
		'profile:currentavatar' => "Icono actual",
		'profile:createicon:header' => "Foto de perfil",
		'profile:profilepicturecroppingtool' => "Herramienta para recortar tu foto",
		'profile:createicon:instructions' => "Selecciona y arrastra un cuadrado abajo para seleccionar la parte de tu foto que quieres recortar. Una vista previa de tu recorte aparecerá en la caja de la derecha. Cuando estés satisfecho, pulsa en 'Crear tu icono'. Esta imagen recortada será usada a través del sitio como tu icono personal.",

		'profile:editdetails' => "Editar detalles",
		'profile:editicon' => "Editar icono de perfil",

		'profile:aboutme' => "Acerca de mí",
		'profile:description' => "Acerca de mí",
		'profile:briefdescription' => "Escribe una breve descripcion de tu sitio web",
		'profile:location' => "Ubicación",
		'profile:skills' => "Habilidades",
		'profile:interests' => "Intereses",
		'profile:contactemail' => "Email de contacto",
		'profile:phone' => "Telefono",
		'profile:mobile' => "Telefono Celular",
		'profile:website' => "Sitio Web",

		'profile:banned' => 'Esta cuenta ha sido suspendida.',
		'profile:deleteduser' => 'Borrar usuario',

		'profile:river:update' => "%s Actualizo su perfil",
		'profile:river:iconupdate' => "%s Actualizo su imagen de perfil",

		'profile:label' => "Etiqueta de perfil",
		'profile:type' => "Tipo de perfil",

		'profile:editdefault:fail' => 'Tu perfil no ha podido ser guardado',
		'profile:editdefault:success' => 'Ha sido almacenado satisfacctoriamente',


		'profile:editdefault:delete:fail' => 'Removed default profile item field failed',
		'profile:editdefault:delete:success' => '¡Elemento por defecto de perfil borrado!',

		'profile:defaultprofile:reset' => 'Perfil por defecto del sistema reseteado',

		'profile:resetdefault' => 'Resetear el perfil por defecto',
		'profile:explainchangefields' => 'Puedes sustituir los campos de perfil existentes con los tuyos propios usando el formulario de abajo. Primero dale una etiqueta al nuevo campo de perfil; por ejemplo "Equipo favorito". Después necesitas seleccionar el tipo de campo; por ejemplo, etiquetas, url, texto, etc. En cualquier momento puedes volver a la configuración por defecto del perfil.',


	/**
	 * Profile status messages
	 */

		'profile:saved' => "Tu perfil ha sido guardado correctamente.",
		'profile:icon:uploaded' => "Tu foto ha sido subida correctamente.",

	/**
	 * Profile error messages
	 */

		'profile:noaccess' => "No tienes permisos para editar el perfil.",
		'profile:notfound' => "No es posible encontrar el perfil.",
		'profile:icon:notfound' => "No ha sido posible cargar su foto de perfil.",
		'profile:icon:noaccess' => 'No es posible cambiar la imagen',
		'profile:field_too_long' => 'No se puede salvar tu información de perfil porque la sección \"%s\" es demasiado larga.',

	);

	add_translation("en",$english);
