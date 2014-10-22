<?php
	/**
	 * Elgg groups plugin language pack
	 *
	 * @package ElggGroups
	 */

	$english = array(

		/**
		 * Menu items and titles
		 */

			'groups' => "Grupos",
			'groups:owned' => "Grupos propios",
			'groups:yours' => "Tus grupos",
			'groups:user' => "grupos de %s",
			'groups:all' => "Todos los grupos",
			'groups:new' => "Crear nuevo grupo",
			'groups:edit' => "Editar grupo",
			'groups:delete' => 'borrar grupo',
			'groups:membershiprequests' => 'Organizar peticiones de miembros',
			'groups:invitations' => 'Invitaciones a grupos',

			'groups:icon' => 'Icono de grupo (dejar en blanco para no realizar cambios)',
			'groups:name' => 'Nombre del grupo',
			'groups:username' => 'Nombre corto (aparecera en la URL, unicamente alfanuméricos)',
			'groups:description' => 'Descripción',
			'groups:briefdescription' => 'Breve descripción',
			'groups:interests' => 'Etiquetas',
			'groups:website' => 'Sitio Web',
			'groups:members' => 'Miembros del Grupos',
			'groups:membership' => "Permisos de los miembros del grupo",
			'groups:access' => "Permisos de acesso",
			'groups:owner' => "Propietario",
			'groups:widget:num_display' => 'Número de grupos a mostrar',
			'groups:widget:membership' => 'Miembros de grupo',
			'groups:widgets:description' => 'Mostrar en tu perfil, los grupos a los que perteneces',
			'groups:noaccess' => 'No tiene acesso a este grupo',
			'groups:cantedit' => 'No puede editar este grupo',
			'groups:saved' => 'Grupo creado',
			'groups:featured' => 'Características de los grupos',
			'groups:makeunfeatured' => 'sin resaltar',
			'groups:makefeatured' => 'resaltar',
			'groups:featuredon' => 'Has resaltado el grupo y sus caracteristicas',
			'groups:unfeature' => 'El grupo ha dejado de estar resaltado',
			'groups:joinrequest' => 'Solicitud de entrada en grupo',
			'groups:join' => 'Entrar en el grupo',
			'groups:leave' => 'Abandonar grupo',
			'groups:invite' => 'Invitar amigos',
			'groups:inviteto' => "Invitar amigos a '%s'",
			'groups:nofriends' => "No tienes amigos aún que no hayan sido invitados a este grupo.",
			'groups:viagroups' => "via grupos",
			'groups:group' => "Grupo",
			'groups:search:tags' => "etiqueta",

			'groups:memberlist' => "Miembros del grupo",
			'groups:membersof' => "Miembros de %s",
			'groups:members:more' => "Ver más miembros",

			'groups:notfound' => "Grupo no encontrado",
			'groups:notfound:details' => "La petición de acceso a grupo no existe o no tienes permisos para acceder",

			'groups:requests:none' => 'No existen peticiones entrantes de miembros de momento',

			'groups:invitations:none' => 'No hay invitaciones pendientes por el momento',

			'item:object:groupforumtopic' => "Títulos de las discusiones",

			'groupforumtopic:new' => "Nueva discusión",

			'groups:count' => "grupos creados",
			'groups:open' => "grupo abierto",
			'groups:closed' => "grupo cerrado",
			'groups:member' => "miembro",
			'groups:searchtag' => "Burcar grupo por etiqueta",


			/*
			 * Access
			 */
			'groups:access:private' => 'Privado - Unicamente usuarios invitados',
			'groups:access:public' => 'Abierto - Cualquier usuario puede pertenecer',
			'groups:closedgroup' => 'Grupo cerrado por algún miembro',
			'groups:closedgroup:request' => 'Solicite ser miembro.',
			'groups:visibility' => 'Quién puede ver este grupo?',

			/*
			Group tools
			*/
			'groups:enablepages' => 'Habilitar páginas de grupo',
			'groups:enableforum' => 'Habilitar discusiones de grupo',
			'groups:enablefiles' => 'Habilitar archivos de grupo',
			'groups:yes' => 'Sí',
			'groups:no' => 'No',

			'group:created' => 'Creado %s, tiene %d entradas',
			'groups:lastupdated' => 'Última actualización %s por %s',
			'groups:lastcomment' => 'Ultimo comentario %s por %s',
			'groups:pages' => 'Páginas de grupo',
			'groups:files' => 'Archivos del grupo',

			/*
			Group forum strings
			*/

			'group:replies' => 'Respuestas',
			'groups:forum' => 'Discusión del grupo',
			'groups:addtopic' => 'Agregar tema',
			'groups:forumlatest' => 'Última entrada en el foro',
			'groups:latestdiscussion' => 'Últimos comentarios',
			'groups:newest' => 'Nuevo',
			'groups:popular' => 'Popular',
			'groupspost:success' => 'Su comentario ha sido publicado',
			'groups:alldiscussion' => 'Ultima discusión',
			'groups:edittopic' => 'Editar terma',
			'groups:topicmessage' => 'Mensaje del tema',
			'groups:topicstatus' => 'Estado del tema',
			'groups:reply' => 'Publicar comentario',
			'groups:topic' => 'Tema',
			'groups:posts' => 'Publicación',
			'groups:lastperson' => 'Ultima persona',
			'groups:when' => 'Cuando',
			'grouptopic:notcreated' => 'No hay termas creados.',
			'groups:topicopen' => 'Abierto',
			'groups:topicclosed' => 'Cerrado',
			'groups:topicresolved' => 'Resuelto',
			'grouptopic:created' => 'Su tema ha sido creado.',
			'groupstopic:deleted' => 'Su tema ha sido eliminado.',
			'groups:topicsticky' => 'Sticky',
			'groups:topicisclosed' => 'Tema cerrado.',
			'groups:topiccloseddesc' => 'El tema ha sido cerrado y no acepta nuevos comentarios.',
			'grouptopic:error' => 'El título de tú grupo no puede ser creado. Intenta de nuevo o habla con el administrador del sistema.',
			'groups:forumpost:edited' => "Has editado con éxito la entrada en el foro.",
			'groups:forumpost:error' => "Existe algún tipo de problema en la edición de la entrada.",
			'groups:privategroup' => 'Este grupo es privado, solicita ser miembro.',
			'groups:notitle' => 'Los grupos deben tener un título obligatoriamente',
			'groups:cantjoin' => 'No puedes entrar al grupo',
			'groups:cantleave' => 'No puedes dejar el grupo',
			'groups:addedtogroup' => 'Añadido de forma correcta el usuario al grupo',
			'groups:joinrequestnotmade' => 'La petición de entrada al grupo no puede ser enviada',
			'groups:joinrequestmade' => 'Solicita unirte al grupo',
			'groups:joined' => 'Te has unido al grupo con éxito!',
			'groups:left' => 'Ha salido del grupo',
			'groups:notowner' => 'Perdona!, tú no eres el propietario de este grupo',
			'groups:notmember' => 'Ya eres miembro de este grupo!',
			'groups:alreadymember' => 'Ya eres miembro del grupo!',
			'groups:userinvited' => 'El usuario ha sido invitado.',
			'groups:usernotinvited' => 'El usuario no puede ser invitado.',
			'groups:useralreadyinvited' => 'El usuario ya ha sido invitado',
			'groups:updated' => "último comentario",
			'groups:invite:subject' => "%s has sido invitado a pertener al grupo %s!",
			'groups:started' => "Abierto pot",
			'groups:joinrequest:remove:check' => 'Seguro que quieres borrar esta petición de entrada?',
			'groups:invite:remove:check' => 'Seguro que quieres borrar esta invitación de entrada?',
			'groups:invite:body' => "Hola %s,

%s esta invitado a unirse al grupo  '%s'. Click abajo para aceptar:

%s",

			'groups:welcome:subject' => "El grupo %s te da la bienvenida!",
			'groups:welcome:body' => "Hola %s!

Ahora eres miembro del grupo '%s'! Click abajo para comentar!

%s",

			'groups:request:subject' => "%s ha solicitado unirse %s",
			'groups:request:body' => "Hola %s,

%s ha solicitado unirse al grupo '%s'. Click abajo para ver su perfil:

%s

o haz click aquí debajo para confirmar su petición directamente:

%s",

			/*
				Forum river items
			*/

			'groups:river:member' => '%s es ahora miembro de',
			'groups:river:create' => '%s ha creado el grupo',
			'groupforum:river:updated' => '%s ha actualizado',
			'groupforum:river:update' => 'Actualizar título de la discusión',
			'groupforum:river:created' => '%s ha realizado',
			'groupforum:river:create' => 'un nuevo tema de discusión',
			'groupforum:river:posted' => '%s ha publicado un nuevo comentario',
			'groupforum:river:annotate:create' => 'en éste tema',
			'groupforum:river:postedtopic' => '%s ha creado un nuevo tema',
			'groups:river:togroup' => 'para el grupo',

			'groups:nowidgets' => 'No se han definido widgets para este grupo.',


			'groups:widgets:members:title' => 'Miembros del grupo',
			'groups:widgets:members:description' => 'Lista de los miembros.',
			'groups:widgets:members:label:displaynum' => 'Lista de miembros del grupo.',
			'groups:widgets:members:label:pleaseedit' => 'Por favor, configura éste Widget.',

			'groups:widgets:entities:title' => "Objecto en este grupo",
			'groups:widgets:entities:description' => "Lista de objetos guardados en este grupo",
			'groups:widgets:entities:label:displaynum' => 'Lista de objetos salvados en este grupo.',
			'groups:widgets:entities:label:pleaseedit' => 'Por favor, configura éste widget.',

			'groups:forumtopic:edited' => 'Tema del foro editado correctamente.',

			'groups:allowhiddengroups' => 'Quieres permitir grupos privados (invisibles)?',

			/**
			 * Action messages
			 */
			'group:deleted' => 'Él grupos y sus contenidos han sido borrados',
			'group:notdeleted' => 'Él grupo no puede ser borrado',

			'grouppost:deleted' => 'Las publicaciones del grupo han sido borradas',
			'grouppost:notdeleted' => 'Las publicaciones no han podido ser borradas',
			'groupstopic:deleted' => 'Tema borrado',
			'groupstopic:notdeleted' => 'El tema no ha podido ser borrado',
			'grouptopic:blank' => 'No hay título',
			'grouptopic:notfound' => 'No se ha encontrado el tema',
			'grouppost:nopost' => 'No hay publicaciones',
			'groups:deletewarning' => "Seguro que quieres borrar el grupo?. Luego no hay marcha atrás...!",

			'groups:invitekilled' => 'La invitación ha sido borrada.',
			'groups:joinrequestkilled' => 'Las solicitudes han sido borradas.',
	);

	add_translation("en",$english);
?>
