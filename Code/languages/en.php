<?php
/**
 * Core language file
 *
 * @package Elgg
 * @subpackage Core
 */

$english = array(

/**
 * Sites
 */

	'item:site' => 'Lugares',

/**
 * Sessions
 */

	'login' => "Acceder",
	'loginok' => "Bienvenido, a la red social de seguimiento de egresados, agredecemos tu participación.",
	'loginerror' => "Usted no ha podido iniciar sesión, debido a que los datos no son los correctos, asegúrese que los datos son correctos.",

	'logout' => "Salir",
	'logoutok' => "Se ha cerrado la sesiòn.",
	'logouterror' => "No se ha podido cerrar su sesión. Porfavor inténtalo de nuevo.",

	'loggedinrequired' => "Debe estar registrado para ver esta pagina.",
	'adminrequired' => "Se necesita permiso de administrador.",
	'membershiprequired' => "Debes ser miembro de este grupo para entrar a esta pagina.",


/**
 * Errors
 */
	'exception:title' => "Bienvenido.",

	'InstallationException:CantCreateSite' => "No se puede crear el siguiente sitio Name:%s, Url: %s",

	'actionundefined' => "La acción solicitada (%s) no se ha definido en el sistema.",
	'actionloggedout' => "Lo sentimos, no se puede realizar esta acción sin acceder a tu sesión.",
	'actionunauthorized' => 'Usted no esta autorizado para realizar esta acción',

	'SecurityException:Codeblock' => "Acceso denegado para ejecutar bloque de código con privilegios",
	'DatabaseException:WrongCredentials' => "Elgg no puede conectarse a la base de datos utilizando las credenciales suministradas.",
	'DatabaseException:NoConnect' => "Elgg no puede seleccionar la base de datos '%s', por favor, revisa si existe tal base de datos y si tienes acceso a ella.",
	'SecurityException:FunctionDenied' => "acceso denegado a la función con privilegios '%s'",
	'DatabaseException:DBSetupIssues' => "Existe una serie de problemas: ",
	'DatabaseException:ScriptNotFound' => "Elgg no encuentra el script de la base de datos que solicitas en %s.",

	'IOException:FailedToLoadGUID' => "Error al cargar un nuevo %s desde GUID:%d",
	'InvalidParameterException:NonElggObject' => "Pasando un no-ElggObject al constructor de ElggObjects!",
	'InvalidParameterException:UnrecognisedValue' => "Valor no válido para el constructor de objetos!.",

	'InvalidClassException:NotValidElggStar' => "GUID:%d no es un %s válido",

	'PluginException:MisconfiguredPlugin' => "%s es un plugin mal configurado. Por favor busca las causas posibles en (http://docs.elgg.org/wiki/).",

	'InvalidParameterException:NonElggUser' => "Pasando un no-ElggUser al constructor de ElggUsers!",

	'InvalidParameterException:NonElggSite' => "Passing a non-ElggSite to an ElggSite constructor!",

	'InvalidParameterException:NonElggGroup' => "Pasando un no-ElggGroup al constructor de ElggGroups!",

	'IOException:UnableToSaveNew' => "Imposible guardar %s",

	'InvalidParameterException:GUIDNotForExport' => "El GUID no ha sido especificado en la exportación, no deberia ocurrir.",
	'InvalidParameterException:NonArrayReturnValue' => "Entity serialisation function ha pasado un parametro non-array returnvalue",

	'ConfigurationException:NoCachePath' => "Cache path sin configurar!",
	'IOException:NotDirectory' => "%s no es un directorio.",

	'IOException:BaseEntitySaveFailed' => "Imposible guardar una nueva base de entidades de información!",
	'InvalidParameterException:UnexpectedODDClass' => "import() passed an unexpected ODD class",
	'InvalidParameterException:EntityTypeNotSet' => "Entity type must be set.",

	'ClassException:ClassnameNotClass' => "%s no es un %s.",
	'ClassNotFoundException:MissingClass' => "Clase no encontrada '%s', plugin fallido?",
	'InstallationException:TypeNotSupported' => "Type %s is not supported. This indicates an error in your installation, most likely caused by an incomplete upgrade.",

	'ImportException:ImportFailed' => "Could not import element %d",
	'ImportException:ProblemSaving' => "There was a problem saving %s",
	'ImportException:NoGUID' => "New entity created but has no GUID, this should not happen.",

	'ImportException:GUIDNotFound' => "Entity '%d' could not be found.",
	'ImportException:ProblemUpdatingMeta' => "There was a problem updating '%s' on entity '%d'",

	'ExportException:NoSuchEntity' => "No such entity GUID:%d",

	'ImportException:NoODDElements' => "No OpenDD elements found in import data, import failed.",
	'ImportException:NotAllImported' => "Not all elements were imported.",

	'InvalidParameterException:UnrecognisedFileMode' => "Unrecognised file mode '%s'",
	'InvalidParameterException:MissingOwner' => "File %s (file guid:%d) (owner guid:%d) is missing an owner!",
	'IOException:CouldNotMake' => "Could not make %s",
	'IOException:MissingFileName' => "You must specify a name before opening a file.",
	'ClassNotFoundException:NotFoundNotSavedWithFile' => "Unable to load filestore class %s for file %u",
	'NotificationException:NoNotificationMethod' => "No notification method specified.",
	'NotificationException:NoHandlerFound' => "No handler found for '%s' or it was not callable.",
	'NotificationException:ErrorNotifyingGuid' => "There was an error while notifying %d",
	'NotificationException:NoEmailAddress' => "Could not get the email address for GUID:%d",
	'NotificationException:MissingParameter' => "Missing a required parameter, '%s'",

	'DatabaseException:WhereSetNonQuery' => "Where set contains non WhereQueryComponent",
	'DatabaseException:SelectFieldsMissing' => "Fields missing on a select style query",
	'DatabaseException:UnspecifiedQueryType' => "Unrecognised or unspecified query type.",
	'DatabaseException:NoTablesSpecified' => "No tables specified for query.",
	'DatabaseException:NoACL' => "No access control was provided on query",

	'InvalidParameterException:NoEntityFound' => "No entity found, it either doesn't exist or you don't have access to it.",

	'InvalidParameterException:GUIDNotFound' => "GUID:%s could not be found, or you can not access it.",
	'InvalidParameterException:IdNotExistForGUID' => "Sorry, '%s' does not exist for guid:%d",
	'InvalidParameterException:CanNotExportType' => "Sorry, I don't know how to export '%s'",
	'InvalidParameterException:NoDataFound' => "Could not find any data.",
	'InvalidParameterException:DoesNotBelong' => "Does not belong to entity.",
	'InvalidParameterException:DoesNotBelongOrRefer' => "Does not belong to entity or refer to entity.",
	'InvalidParameterException:MissingParameter' => "Missing parameter, you need to provide a GUID.",

	'APIException:ApiResultUnknown' => "API Result is of an unknown type, this should never happen.",
	'ConfigurationException:NoSiteID' => "No site ID has been specified.",
	'SecurityException:APIAccessDenied' => "Sorry, API access has been disabled by the administrator.",
	'SecurityException:NoAuthMethods' => "No authentication methods were found that could authenticate this API request.",
	'InvalidParameterException:APIMethodOrFunctionNotSet' => "Method or function not set in call in expose_method()",
	'InvalidParameterException:APIParametersArrayStructure' => "Parameters array structure is incorrect for call to expose method '%s'",
	'InvalidParameterException:UnrecognisedHttpMethod' => "Unrecognised http method %s for api method '%s'",
	'APIException:MissingParameterInMethod' => "Missing parameter %s in method %s",
	'APIException:ParameterNotArray' => "%s does not appear to be an array.",
	'APIException:UnrecognisedTypeCast' => "Unrecognised type in cast %s for variable '%s' in method '%s'",
	'APIException:InvalidParameter' => "Invalid parameter found for '%s' in method '%s'.",
	'APIException:FunctionParseError' => "%s(%s) has a parsing error.",
	'APIException:FunctionNoReturn' => "%s(%s) returned no value.",
	'APIException:APIAuthenticationFailed' => "Method call failed the API Authentication",
	'APIException:UserAuthenticationFailed' => "Method call failed the User Authentication",
	'SecurityException:AuthTokenExpired' => "Authentication token either missing, invalid or expired.",
	'CallException:InvalidCallMethod' => "%s must be called using '%s'",
	'APIException:MethodCallNotImplemented' => "Method call '%s' has not been implemented.",
	'APIException:FunctionDoesNotExist' => "Function for method '%s' is not callable",
	'APIException:AlgorithmNotSupported' => "Algorithm '%s' is not supported or has been disabled.",
	'ConfigurationException:CacheDirNotSet' => "Cache directory 'cache_path' not set.",
	'APIException:NotGetOrPost' => "Request method must be GET or POST",
	'APIException:MissingAPIKey' => "Missing API key",
	'APIException:BadAPIKey' => "Bad API key",
	'APIException:MissingHmac' => "Missing X-Elgg-hmac header",
	'APIException:MissingHmacAlgo' => "Missing X-Elgg-hmac-algo header",
	'APIException:MissingTime' => "Missing X-Elgg-time header",
	'APIException:MissingNonce' => "Missing X-Elgg-nonce header",
	'APIException:TemporalDrift' => "X-Elgg-time is too far in the past or future. Epoch fail.",
	'APIException:NoQueryString' => "No data on the query string",
	'APIException:MissingPOSTHash' => "Missing X-Elgg-posthash header",
	'APIException:MissingPOSTAlgo' => "Missing X-Elgg-posthash_algo header",
	'APIException:MissingContentType' => "Missing content type for post data",
	'SecurityException:InvalidPostHash' => "POST data hash is invalid - Expected %s but got %s.",
	'SecurityException:DupePacket' => "Packet signature already seen.",
	'SecurityException:InvalidAPIKey' => "Invalid or missing API Key.",
	'NotImplementedException:CallMethodNotImplemented' => "Call method '%s' is currently not supported.",

	'NotImplementedException:XMLRPCMethodNotImplemented' => "XML-RPC method call '%s' not implemented.",
	'InvalidParameterException:UnexpectedReturnFormat' => "Call to method '%s' returned an unexpected result.",
	'CallException:NotRPCCall' => "Call does not appear to be a valid XML-RPC call",

	'PluginException:NoPluginName' => "The plugin name could not be found",

	'ConfigurationException:BadDatabaseVersion' => "The database backend you have installed doesn't meet the basic requirements to run Elgg. Please consult your documentation.",
	'ConfigurationException:BadPHPVersion' => "You need at least PHP version 5.2 to run Elgg.",
	'configurationwarning:phpversion' => "Elgg requires at least PHP version 5.2, you can install it on 5.1.6 but some features may not work. Use at your own risk.",


	'InstallationException:DatarootNotWritable' => "Your data directory %s is not writable.",
	'InstallationException:DatarootUnderPath' => "Your data directory %s must be outside of your install path.",
	'InstallationException:DatarootBlank' => "You have not specified a data directory.",

	'SecurityException:authenticationfailed' => "User could not be authenticated",

	'CronException:unknownperiod' => '%s is not a recognised period.',

	'SecurityException:deletedisablecurrentsite' => 'You can not delete or disable the site you are currently viewing!',

	'RegistrationException:EmptyPassword' => 'The password fields cannot be empty',
	'RegistrationException:PasswordMismatch' => 'Passwords must match',

	'memcache:notinstalled' => 'PHP memcache module not installed, you must install php5-memcache',
	'memcache:noservers' => 'No memcache servers defined, please populate the $CONFIG->memcache_servers variable',
	'memcache:versiontoolow' => 'Memcache needs at least version %s to run, you are running %s',
	'memcache:noaddserver' => 'Multiple server support disabled, you may need to upgrade your PECL memcache library',

	'deprecatedfunction' => 'Warning: This code uses the deprecated function \'%s\' and is not compatible with this version of Elgg',

	'pageownerunavailable' => 'Warning: The page owner %d is not accessible!',
	'changebookmark' => 'Please change your bookmark for this page',
/**
 * API
 */
	'system.api.list' => "List all available API calls on the system.",
	'auth.gettoken' => "This API call lets a user obtain a user authentication token which can be used for authenticating future API calls. Pass it as the parameter auth_token",

/**
 * User details
 */

	'name' => "Nombre completo",
	'email' => "Dirección de correo/ Email",
	'username' => "Usuario",
	'password' => "Contraseña",
	'passwordagain' => "Contraseña (para verificación)",
	'admin_option' => "Hacer este usuario administrador?",

/**
 * Access
 */

	'PRIVATE' => "Privado",
	'LOGGED_IN' => "Usuarios registrados",
	'PUBLIC' => "Publico",
	'access:friends:label' => "Amigos",
	'access' => "Acesso",

/**
 * Dashboard and widgets
 */

	'dashboard' => "Escritorio",
	'dashboard:configure' => "Configurar página",
	'dashboard:nowidgets' => "De click en 'Configurar página' para añadir los componentes y actualizar su información.",

	'widgets:add' => 'Agregar componentes a tu página',
	'widgets:add:description' => "Elija las características que usted desee agregar a su página arrastrándolos desde la <b>Galería de componentes</b> a la derecha, a cualquiera de las tres areas abajo, en la posición donde quieras que aparezcan.

Para eliminar un componente arrastre de nuevo a la <b>Galería de componentes</b>.",
	'widgets:position:fixed' => '(Posición fija en la página)',

	'widgets' => "Componentes",
	'widget' => "Componente",
	'item:object:widget' => "Componentes",
	'layout:customise' => "Personalizar diseño",
	'widgets:gallery' => "Galería de componentes",
	'widgets:leftcolumn' => "Componentes de la izquierda",
	'widgets:fixed' => "Posición fijada",
	'widgets:middlecolumn' => "Componentes del centro",
	'widgets:rightcolumn' => "Componentes de la derecha",
	'widgets:profilebox' => "Cuadro de perfiles",
	'widgets:panel:save:success' => "Tus componentes han sido guardados.",
	'widgets:panel:save:failure' => "Ha habido un problema. Porfavor intentalo de nuevo.",
	'widgets:save:success' => "El componentes fue guardado con éxito.",
	'widgets:save:failure' => "Ha habido un problema. Porfavor intentalo de nuevo.",
	'widgets:handlernotfound' => 'Este componente puede haber fallado o el administrador lo ha deshabilitado.',

/**
 * Groups
 */

	'group' => "Grupo",
	'item:group' => "Grupos",

/**
 * Users
 */

	'user' => "Usuario",
	'item:user' => "Usuarios",

/**
 * Friends
 */

	'friends' => "Amigos",
	'friends:yours' => "Tus amigos",
	'friends:owned' => "Amigos de %s",
	'friend:add' => "Agregar como amigo",
	'friend:remove' => "Eliminar amigo",

	'friends:add:successful' => "Ha agregado %s como un amigo.",
	'friends:add:failure' => "No pudo agregar %s como amigo. Porfavor intenta de nuevo.",

	'friends:remove:successful' => "Ha eliminado %s como su amigo.",
	'friends:remove:failure' => "NO se ha podido borrar  %s como tu amigo. Intatalo de nuevo.",

	'friends:none' => "Este usuario no ha sido añadido por un amigo.",
	'friends:none:you' => "Nadie te ha añadido como amigo! busca a tus posibles amigos.",

	'friends:none:found' => "No se han encontrado amigos.",

	'friends:of:none' => "Nadie ha añadido a este usuario como amigo.",
	'friends:of:none:you' => "Nadie lo ha añadido como amigo!",

	'friends:of:owned' => "Lo han agregado  %s como amigo",

	'friends:of' => "Sus amigos",
	'friends:collections' => "Grupo de amigos",
	'friends:collections:add' => "Nuevo grupo de amigos",
	'friends:addfriends' => "Agregar amigos",
	'friends:collectionname' => "Nombre del grupo",
	'friends:collectionfriends' => "Amigos en el grupo",
	'friends:collectionedit' => "Editar este grupo",
	'friends:nocollections' => "No tienen ningún grupo.",
	'friends:collectiondeleted' => "Tu grupo ha sido borrado.",
	'friends:collectiondeletefailed' => "Ha sido imposible eliminar la lista. No tienes permisos, o algún otro problema ha ocurrido.",
	'friends:collectionadded' => "Tu grupo se ha creado",
	'friends:nocollectionname' => "Necesita asignar un nombre a su lista antes de ser creada.",
	'friends:collections:members' => "Collection members",
	'friends:collections:edit' => "Edit collection",

	'friends:river:add' => "%s es amigo de",

	'friendspicker:chararray' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',


/**
 * Feeds
 */
	'feed:rss' => 'Subscribirse al RSS',
	'feed:odd' => 'Unirse con OpenDD',

/**
 * links
 **/

	'link:view' => 'ver enlace',


/**
 * River
 */
	'river' => "Relaciones",
	'river:relationship:friend' => 'es ahora amigo de',
	'river:noaccess' => 'No tienen permiso para ver el perfil.',
	'river:posted:generic' => '%s deja',
	'riveritem:single:user' => 'un usuario',
	'riveritem:plural:user' => 'varios usuarios',

/**
 * Plugins
 */
	'plugins:settings:save:ok' => "La configuración del plugin %s ha sido guardada satisfactoriamente.",
	'plugins:settings:save:fail' => "Se ha dado un problema al guardar la configuración del plugin %s.",
	'plugins:usersettings:save:ok' => "La configuración del usuario para el plugin %s ha sido correctamente guardada.",
	'plugins:usersettings:save:fail' => "Ha habido un problema al guardar la configuración del plugin %s.",
	'admin:plugins:label:version' => "Versión",
	'item:object:plugin' => 'Configuración de plugin',

/**
 * Notifications
 */
	'notifications:usersettings' => "Configuración de notificaciones",
	'notifications:methods' => "Por favor, especifique qué métodos quiere permitir.",

	'notifications:usersettings:save:ok' => "La configuración de  notificaciones ha sido guardada correctamente.",
	'notifications:usersettings:save:fail' => "No se ha podido guardar la configuración de la notifiación.",

	'user.notification.get' => 'Devolver la configuración de un usuario dado.',
	'user.notification.set' => 'Set the notification settings for a given user.',
/**
 * Search
 */

	'search' => "Buscar",
	'searchtitle' => "Buscar: %s",
	'users:searchtitle' => "Busqueda por usuario: %s",
	'groups:searchtitle' => "Busqueda por grupo: %s",
	'advancedsearchtitle' => "%s resultados que coincidan %s",
	'notfound' => "Sin resultados.",
	'next' => "Siguiente",
	'previous' => "Anterior",

	'viewtype:change' => "Cambiar el tipo de listado",
	'viewtype:list' => "Ver lista",
	'viewtype:gallery' => "Galeria",

	'tag:search:startblurb' => "Coinciden los siguientes '%s':",

	'user:search:startblurb' => "Usuarios que coinciden '%s':",
	'user:search:finishblurb' => "Para ver mas, click aqui.",

	'group:search:startblurb' => "Grupos que coinciden '%s':",
	'group:search:finishblurb' => "Para ver mas, click aqui.",
	'search:go' => 'Ir',
	'userpicker:only_friends' => 'Unicamente amigos',

/**
 * Account
 */


	'account' => "Cuenta",
	'settings' => "Configuración",
	'tools' => "Herramientas",
	'tools:yours' => "Tus herramientas",

	'register' => "Registro",
	'registerok' => "Te has registrado en %s con éxito.",
	'registerbad' => "El registro no es válido. Puede ser que el nombre de usuario ya exista, la clave repetida no coincida o hayas utilizado un nombre de usuario y/o clave demasiado cortos.",
	'registerdisabled' => "El registro ha sido desabilitado por el administrador del sistema",

	'firstadminlogininstructions' => 'Tu nueva red social Elgg se ha instalado con éxito y tu cuenta de administrador ha sido creada. Puedes comenzar a configurar tu sitio habilitando varios plugins ya instalados.',

	'registration:notemail' => 'El email que has introducido no parece ser válido.',
	'registration:userexists' => 'Ese nombre de usuario ya existe',
	'registration:usernametooshort' => 'El nombre de usuario debe tener un mínimo de 4 caracteres.',
	'registration:passwordtooshort' => 'La clave debe tener un mínimo de 6 caracteres.',
	'registration:dupeemail' => 'El Email ya esta registrado.',
	'registration:invalidchars' => 'Lo siento, el nombre de usuario contiene caracteres inválidos: %s. Todos estos caracteres son validos: %s',
	'registration:emailnotvalid' => 'Lo siento, el Email que has introducido es inválido.',
	'registration:passwordnotvalid' => 'Lo siento, el Password que has introducido es inválido en este sistema',
	'registration:usernamenotvalid' => 'Lo siento, el Usuario que has introducido es inválido en este sistema',

	'adduser' => "Agregar usuario",
	'adduser:ok' => "Acabas de añadir un nuevo usuario.",
	'adduser:bad' => "El usuario nuevo no pudo ser creado.",

	'item:object:reported_content' => "Reportar contenido",

	'user:set:name' => "Nombre del usuario",
	'user:name:label' => "Tu nombre",
	'user:name:success' => "Se ha cambiado tu nombre en el sistema.",
	'user:name:fail' => "No se ha podido cambiar tu nombre en el sistema. Por favor, asegúrate de que tu nombre no es demasiado largo e inténtalo de nuevo.",

	'user:set:password' => "Contraseña de la cuenta",
	'user:current_password:label' => 'Contraseña actual',
	'user:password:label' => "Nueva contraseña",
	'user:password2:label' => "De nuevo la nueva contraseña",
	'user:password:success' => "Contraseña actualizada",
	'user:password:fail' => "No se ha podido actualizar tu contraseña.",
	'user:password:fail:notsame' => "La contraseña no coincide!",
	'user:password:fail:tooshort' => "La contraseña es muy corta!",
	'user:password:fail:incorrect_current_password' => 'Quizá el password sea invalido.',
	'user:resetpassword:unknown_user' => 'Usuario invalido.',
	'user:resetpassword:reset_password_confirm' => 'Cambiar tu clave generará un email con una clave nueva a tu dirección de correo.',

	'user:set:language' => "Configuración de idioma",
	'user:language:label' => "Tu idioma",
	'user:language:success' => "Tu idioma ha sido actualizado.",
	'user:language:fail' => "Tu idioma NO ha podido ser actualizado.",

	'user:username:notfound' => 'El usuario %s no ha sido encontrado.',

	'user:password:lost' => 'Contraseña olvidada',
	'user:password:resetreq:success' => 'La nueva clave ha sido enviada a su correo',
	'user:password:resetreq:fail' => 'No se ha podido solicitar una nueva contraseña.',

	'user:password:text' => 'Para generar una nueva clave, introduzca su nombre de usuario debajo. Le enviaremos a su email la dirección de una página de verificación única. Pulse el enlace en el cuerpo del mensaje y una nueva clave te será enviada.',

	'user:persistent' => 'Recordarme',
/**
 * Administration
 */
	'admin:configuration:success' => "Tu configuración ha sido guardada.",
	'admin:configuration:fail' => "Tu configuración no ha podido ser guardada.",

	'admin' => "Administración",
	'admin:description' => "El panel de administración permite el control de todos los aspectos del sistema, desde la gestión de usuarios hasta como se comporta los plugins. Elija la opción de abajo para comenzar.",

	'admin:user' => "Administrador de usuario",
	'admin:user:description' => "Este panel de administración permite el control de la configuraci&oacute;n de suario de su red social. Elija la opción adecuada abajo para comenzar..",
	'admin:user:adduser:label' => "Click Aquí para agregar un nuevo usuario...",
	'admin:user:opt:linktext' => "Configuración de usuarios...",
	'admin:user:opt:description' => "Configurar información de usuarios. ",

	'admin:site' => "Administración del sitio",
	'admin:site:description' => "Este panel de administración permite controlar la configuración global de la red social. Elija una opción adecuada para comenzar.",
	'admin:site:opt:linktext' => "Configuración del sitio...",
	'admin:site:opt:description' => "Configuraciones técnicas y no técnicas del sitio. ",
	'admin:site:access:warning' => "Cambiar las configuraciones de acceso solo afecta a los permisos del contenido que se vaya a crear en el futuro.",

	'admin:plugins' => "Herramienta de administración",
	'admin:plugins:description' => "El panel de admin  te permite controlar configurar las herramientas instaladas en tu sitio.",
	'admin:plugins:opt:linktext' => "Herramientas de configuración...",
	'admin:plugins:opt:description' => "Configura los plugins installados en tu sitio. ",
	'admin:plugins:label:author' => "Autor",
	'admin:plugins:label:copyright' => "Copyright",
	'admin:plugins:label:licence' => "Licencia",
	'admin:plugins:label:website' => "URL",
	'admin:plugins:label:moreinfo' => 'Maś información',
	'admin:plugins:label:version' => 'Versión',
	'admin:plugins:warning:elggversionunknown' => 'Atención: Este plugin no especifica una versión compatible de Elgg.',
	'admin:plugins:warning:elggtoolow' => 'Atención: ¡Este plugin requiere una versión superior de Elgg!',
	'admin:plugins:reorder:yes' => "El plugin %s se ha reordenado correctamente.",
	'admin:plugins:reorder:no' => "El plugin %s no se ha podido reordenar.",
	'admin:plugins:disable:yes' => "Plugin %s se ha deshabilitado correctamente.",
	'admin:plugins:disable:no' => "Plugin %s no puede ser deshabilitado.",
	'admin:plugins:enable:yes' => "Plugin %s ha sido habilitado correctamente.",
	'admin:plugins:enable:no' => "Plugin %s no ha podido habilitarse.",

	'admin:statistics' => "Estadísticas",
	'admin:statistics:description' => "Ésta es una visión previa de las estadísticas de su red social. Si necesita estadísticas más detalladas, hay disponible una característica de administración profesional.",
	'admin:statistics:opt:description' => "Ver información estadística sobre los usuarios y los objetos del sistema.",
	'admin:statistics:opt:linktext' => "Ver Estadísticas",
	'admin:statistics:label:basic' => "Estadísticas básicas del sitio",
	'admin:statistics:label:numentities' => "Entidades del sitio",
	'admin:statistics:label:numusers' => "Número de usuarios",
	'admin:statistics:label:numonline' => "Números de usuarios en linea",
	'admin:statistics:label:onlineusers' => "Usuarios en linea ahora",
	'admin:statistics:label:version' => "Versión de Elgg",
	'admin:statistics:label:version:release' => "Lanzamiento",
	'admin:statistics:label:version:version' => "Versión",

	'admin:user:label:search' => "Buscar usuario:",
	'admin:user:label:searchbutton' => "Búsqueda",

	'admin:user:ban:no' => "No puede excluir al usuario",
	'admin:user:ban:yes' => "Usuario excluido.",
	'admin:user:unban:no' => "No puede liberar al usuario",
	'admin:user:unban:yes' => "Usuario liberado.",
	'admin:user:delete:no' => "No puede borrar usuario",
	'admin:user:delete:yes' => "El usuario %s ha sido borrado",

	'admin:user:resetpassword:yes' => "Clave cambiada y notificada al usuario.",
	'admin:user:resetpassword:no' => "La clave no pudo ser cambiada.",

	'admin:user:makeadmin:yes' => "El usuario ahora es administrador.",
	'admin:user:makeadmin:no' => "No se ha podido convertir en administrador.",

	'admin:user:removeadmin:yes' => "El usuario ya no es administrador.",
	'admin:user:removeadmin:no' => "No podemos eliminar los privilegios de administración de este usuario.",

/**
 * User settings
 */
	'usersettings:description' => "La configuración del panel de usuario permite el control de su espacio, desde la gestión de usuarios hasta cómo se comporta los plugins. Elija una opción de abajo para comenzar.",

	'usersettings:statistics' => "Tus estadísticas",
	'usersettings:statistics:opt:description' => "Ver la información estadística acerca de los usuarios y objetos del lugar.",
	'usersettings:statistics:opt:linktext' => "Estadísticas de la cuenta",

	'usersettings:user' => "Tu configuración",
	'usersettings:user:opt:description' => "Le permite controlar su configuración.",
	'usersettings:user:opt:linktext' => "Cambia tu configuración",

	'usersettings:plugins' => "Herramientas",
	'usersettings:plugins:opt:description' => "Configura tus herramientas activas.",
	'usersettings:plugins:opt:linktext' => "Configurar tus herramientas",

	'usersettings:plugins:description' => "Este panel te permite controlar y configurar las herramientas que tienes instaladas.",
	'usersettings:statistics:label:numentities' => "Su contenido",

	'usersettings:statistics:yourdetails' => "Tus datos",
	'usersettings:statistics:label:name' => "Nombre completo",
	'usersettings:statistics:label:email' => "Correo electronico",
	'usersettings:statistics:label:membersince' => "Miembro desde",
	'usersettings:statistics:label:lastlogin' => "Última vez que accedio",




/**
 * Generic action words
 */

	'save' => "Enviar",
	'publish' => "Publicar",
	'cancel' => "Cancelar",
	'saving' => "Guardando...",
	'update' => "Actualizar",
	'edit' => "Editar",
	'delete' => "Borrar",
	'accept' => "Aceptar",
	'load' => "Cargando",
	'upload' => "Subir",
	'ban' => "Prohibido",
	'unban' => "Eliminar prohibición",
	'enable' => "Habilitar",
	'disable' => "Desabilitar",
	'request' => "Solicitar",
	'complete' => "Completar",
	'open' => 'Abrir',
	'close' => 'Cerrar',
	'reply' => "Responder",
	'more' => 'Más',
	'comments' => 'Comentarios',
	'import' => 'Importar',
	'export' => 'Exportar',
	'untitled' => 'Sin Título',
	'help' => 'Ayuda',
	'send' => 'Enviar',
	'post' => 'Publicar',
	'submit' => 'Presentar',
	'site' => 'ReSoSE',

	'up' => 'Subir',
	'down' => 'Bajar',
	'top' => 'Arriba',
	'bottom' => 'Abajo',

	'invite' => "Invitar",

	'resetpassword' => "Resetear clave",
	'makeadmin' => "Hacer admin",
	'removeadmin' => "Eliminar admin",

	'option:yes' => "Si",
	'option:no' => "No",

	'unknown' => 'Desconocido',

	'active' => 'Activar',
	'total' => 'Total',

	'learnmore' => "Click aquí para leer más.",

	'content' => "contenido",
	'content:latest' => 'Actividad reciente',
	'content:latest:blurb' => 'Alternativamente, pulse aquí para ver los últimos contenidos del lugar.',

	'link:text' => 'ver link',

	'enableall' => 'Habilitar Todo',
	'disableall' => 'Desabilitar Todo',

/**
 * Generic questions
 */

	'question:areyousure' => 'Esta seguro?',

/**
 * Generic data words
 */

	'title' => "Título",
	'description' => "Descripción",
	'tags' => "Etiquetas",
	'spotlight' => "Noticias",
	'all' => "Todo",

	'by' => 'por',

	'annotations' => "Anotaciones",
	'relationships' => "Relaciones",
	'metadata' => "Metadatos",

/**
 * Input / output strings
 */

	'deleteconfirm' => "Esta seguro de borrar?",
	'fileexists' => "El fichero ha sido subido...para reemplazarlo selecciona abajo:",

/**
 * User add
 */

	'useradd:subject' => 'Cuenta de usuario creada',
	'useradd:body' => '
%s,
Se ha creado una cuenta de usuario en %s. Para entrar, visite:

	%s

Y para poder participar debe usar las siguientes credenciales:

	Username: %s
	Clave: %s

Una vez que se haya logeado, le recomendamos que cambie su clave.
',


/**
 * System messages
 **/

	'systemmessages:dismiss' => "click para minimizar",


/**
 * Import / export
 */
	'importsuccess' => "La importación de datos fue correcta",
	'importfail' => "La importación OpenDD de datos ha fallado.",

/**
 * Time
 */

	'friendlytime:justnow' => "en este momento",
	'friendlytime:minutes' => "Hace unos %s minutos",
	'friendlytime:minutes:singular' => "hace un minuto",
	'friendlytime:hours' => "%s Horas",
	'friendlytime:hours:singular' => "hace una hora",
	'friendlytime:days' => "Hace unos %s días",
	'friendlytime:days:singular' => "ayer",
	'friendlytime:date_format' => 'j F Y @ g:ia',

	'date:month:01' => 'Enero %s',
	'date:month:02' => 'Febrero %s',
	'date:month:03' => 'Marzo %s',
	'date:month:04' => 'Abril %s',
	'date:month:05' => 'Mayo %s',
	'date:month:06' => 'Junio %s',
	'date:month:07' => 'Julio %s',
	'date:month:08' => 'Agosto %s',
	'date:month:09' => 'Septiembre %s',
	'date:month:10' => 'Octubre %s',
	'date:month:11' => 'Noviembre %s',
	'date:month:12' => 'Diciembre %s',

/**
 * Installation and system settings
 */

	'installation:error:htaccess' => "Elgg requires a file called .htaccess to be set in the root directory of its installation. We tried to create it for you, but Elgg doesn't have permission to write to that directory.

Creating this is easy. Copy the contents of the textbox below into a text editor and save it as .htaccess

",
	'installation:error:settings' => "Elgg couldn't find its settings file. Most of Elgg's settings will be handled for you, but we need you to supply your database details. To do this:

1. Rename engine/settings.example.php to settings.php in your Elgg installation.

2. Open it with a text editor and enter your MySQL database details. If you don't know these, ask your system administrator or technical support for help.

Alternatively, you can enter your database settings below and we will try and do this for you...",

	'installation:error:db:title' => "Database settings error",
	'installation:error:db:text' => "Check your database settings again as Elgg could not connect and access the database.",
	'installation:error:configuration' => "Once you've corrected any configuration issues, press reload to try again.",

	'installation' => "Installation",
	'installation:success' => "Elgg's database was installed successfully.",
	'installation:configuration:success' => "Your initial configuration settings have been saved. Now register your initial user; this will be your first system administrator.",

	'installation:settings' => "System settings",
	'installation:settings:description' => "Now that the Elgg database has been successfully installed, you need to enter a couple of pieces of information to get your site fully up and running. We've tried to guess where we could, but <b>you should check these details.</b>",

	'installation:settings:dbwizard:prompt' => "Enter your database settings below and hit save:",
	'installation:settings:dbwizard:label:user' => "Database user",
	'installation:settings:dbwizard:label:pass' => "Database password",
	'installation:settings:dbwizard:label:dbname' => "Elgg database",
	'installation:settings:dbwizard:label:host' => "Database hostname (usually 'localhost')",
	'installation:settings:dbwizard:label:prefix' => "Database table prefix (usually 'elgg_')",

	'installation:settings:dbwizard:savefail' => "We were unable to save the new settings.php. Please save the following file as engine/settings.php using a text editor.",

	'installation:sitename' => "The name of your site (eg \"My social networking site\"):",
	'installation:sitedescription' => "Short description of your site (optional)",
	'installation:wwwroot' => "The site URL, followed by a trailing slash:",
	'installation:path' => "The full path to your site root on your disk, followed by a trailing slash:",
	'installation:dataroot' => "The full path to the directory where uploaded files will be stored, followed by a trailing slash:",
	'installation:dataroot:warning' => "You must create this directory manually. It should sit in a different directory to your Elgg installation.",
	'installation:sitepermissions' => "The default access permissions:",
	'installation:language' => "The default language for your site:",
	'installation:debug' => "Debug mode provides extra information which can be used to diagnose faults. However, it can slow your system down so should only be used if you are having problems:",
	'installation:debug:none' => 'Turn off debug mode (recommended)',
	'installation:debug:error' => 'Display only critical errors',
	'installation:debug:warning' => 'Display errors and warnings',
	'installation:debug:notice' => 'Log all errors, warnings and notices',
	'installation:httpslogin' => "Enable this to have user logins performed over HTTPS. You will need to have https enabled on your server for this to work.",
	'installation:httpslogin:label' => "Enable HTTPS logins",
	'installation:view' => "Enter the view which will be used as the default for your site or leave this blank for the default view (if in doubt, leave as default):",

	'installation:siteemail' => "Site email address (used when sending system emails)",

	'installation:disableapi' => "The RESTful API is a flexible and extensible interface that enables applications to use certain Elgg features remotely.",
	'installation:disableapi:label' => "Enable the RESTful API",

	'installation:allow_user_default_access:description' => "If checked, individual users will be allowed to set their own default access level that can over-ride the system default access level.",
	'installation:allow_user_default_access:label' => "Allow user default access",

	'installation:simplecache:description' => "The simple cache increases performance by caching static content including some CSS and JavaScript files. Normally you will want this on.",
	'installation:simplecache:label' => "Use simple cache (recommended)",

	'installation:viewpathcache:description' => "The view filepath cache decreases the loading times of plugins by caching the location of their views.",
	'installation:viewpathcache:label' => "Use view filepath cache (recommended)",

	'upgrading' => 'Upgrading...',
	'upgrade:db' => 'Your database was upgraded.',
	'upgrade:core' => 'Your elgg installation was upgraded.',

/**
 * Welcome
 */

	'welcome' => "Bienvenido",
	'welcome:user' => 'Bienvenido %s',
	'welcome_message' => "Welcome to this Elgg installation.",

/**
 * Emails
 */
	'email:settings' => "Ajustes de cuenta de correo",
	'email:address:label' => "Tu Email",

	'email:save:success' => "New email address saved, verification requested.",
	'email:save:fail' => "Your new email address could not be saved.",

	'friend:newfriend:subject' => "%s ha hecho un amigo!",
	'friend:newfriend:body' => "%s es ahora su amigo!

Para ver su perfil, click aquí:

%s

Usted no puede responder este mensaje.",



	'email:resetpassword:subject' => "Contraseña restablecida!",
	'email:resetpassword:body' => "Hola %s,

Tu contraseña nueva es: %s",


	'email:resetreq:subject' => "Solicitud de nueva contraseña.",
	'email:resetreq:body' => "Hola %s,

Alguien (de la dirección IP  %s) ha solicitado una nueva contraseña para esta cuenta.

Si usted lo ha solicitado click abajo, de lo contrario haga caso omiso de este mensaje.

%s
",

/**
 * user default access
 */

'default_access:settings' => "Your default access level",
'default_access:label' => "Default access",
'user:default_access:success' => "Your new default access level was saved.",
'user:default_access:failure' => "Your new default access level could not be saved.",

/**
 * XML-RPC
 */
	'xmlrpc:noinputdata'	=>	"Datos faltantes",

/**
 * Comments
 */

	'comments:count' => "%s comentarios",

	'riveraction:annotation:generic_comment' => '%s comento en %s',

	'generic_comments:add' => "Agregar comentatio",
	'generic_comments:text' => "Comentario",
	'generic_comment:posted' => "Tú comentario ha sido guardado.",
	'generic_comment:deleted' => "Tú comentario ha sido eliminado.",
	'generic_comment:blank' => "Lo sentimos, no ha sido guardado.",
	'generic_comment:notfound' => "Lo sentimos no se encontraron resultados.",
	'generic_comment:notdeleted' => "Lo sentimos no se pudo eliminar.",
	'generic_comment:failure' => "Un error ha ocurrido, porfavor vuelve a intentarlo.",

	'generic_comment:email:subject' => 'Tiene un nuevo comentario!',
	'generic_comment:email:body' => "Tiene un nuevo comentario en \"%s\" de %s. Puede leerlo:


%s


Para responder o ver, haga clic aquí:

%s

Para ver %s perfil, clic aquí:

%s

Usted no puede responder a este correo.",

/**
 * Entities
 */
	'entity:default:strapline' => 'Creada %s por %s',
	'entity:default:missingsupport:popup' => 'Esta entindad no puede ser desplegada correctamente. Puede ser por que requiere soporte de un plugin que no ha sido instalado',

	'entity:delete:success' => '%s entidades han sido eliminadas',
	'entity:delete:fail' => '%s entidades no han podido ser eliminadas',


/**
 * Action gatekeeper
 */
	'actiongatekeeper:missingfields' => 'El formulario ha perdido __token o __ts',
	'actiongatekeeper:tokeninvalid' => "We encountered an error (token mismatch). This probably means that the page you were using expired. Please try again.",
	'actiongatekeeper:timeerror' => 'La página en la que te encuentras ha expirado!. Es necesario que refresques de nuevo',
	'actiongatekeeper:pluginprevents' => 'Una extensión ha sido retenida por este formulario.',

/**
 * Action gatekeeper
 */
	'actiongatekeeper:missingfields' => 'Form is missing __token or __ts fields',
	'actiongatekeeper:tokeninvalid' => "We encountered an error (token mismatch). This probably means that the page you were using expired. Please try again.",
	'actiongatekeeper:timeerror' => 'The page you were using has expired. Please refresh and try again.',
	'actiongatekeeper:pluginprevents' => 'A extension has prevented this form from being submitted.',

/**
 * Word blacklists
 */
	'word:blacklist' => 'and, the, then, but, she, his, her, him, one, not, also, about, now, hence, however, still, likewise, otherwise, therefore, conversely, rather, consequently, furthermore, nevertheless, instead, meanwhile, accordingly, this, seems, what, whom, whose, whoever, whomever',

/**
 * Tag labels
 */

	'tag_names:tags' => 'Etiquetas',

/**
 * Languages according to ISO 639-1
 */
	"aa" => "Afar",
	"ab" => "Abkhazian",
	"af" => "Afrikaans",
	"am" => "Amharic",
	"ar" => "Arabic",
	"as" => "Assamese",
	"ay" => "Aymara",
	"az" => "Azerbaijani",
	"ba" => "Bashkir",
	"be" => "Byelorussian",
	"bg" => "Bulgarian",
	"bh" => "Bihari",
	"bi" => "Bislama",
	"bn" => "Bengali; Bangla",
	"bo" => "Tibetan",
	"br" => "Breton",
	"ca" => "Catalan",
	"co" => "Corsican",
	"cs" => "Czech",
	"cy" => "Welsh",
	"da" => "Danish",
	"de" => "German",
	"dz" => "Bhutani",
	"el" => "Greek",
	"en" => "English",
	"eo" => "Esperanto",
	"es" => "Spanish",
	"et" => "Estonian",
	"eu" => "Basque",
	"fa" => "Persian",
	"fi" => "Finnish",
	"fj" => "Fiji",
	"fo" => "Faeroese",
	"fr" => "French",
	"fy" => "Frisian",
	"ga" => "Irish",
	"gd" => "Scots / Gaelic",
	"gl" => "Galician",
	"gn" => "Guarani",
	"gu" => "Gujarati",
	"he" => "Hebrew",
	"ha" => "Hausa",
	"hi" => "Hindi",
	"hr" => "Croatian",
	"hu" => "Hungarian",
	"hy" => "Armenian",
	"ia" => "Interlingua",
	"id" => "Indonesian",
	"ie" => "Interlingue",
	"ik" => "Inupiak",
	//"in" => "Indonesian",
	"is" => "Icelandic",
	"it" => "Italian",
	"iu" => "Inuktitut",
	"iw" => "Hebrew (obsolete)",
	"ja" => "Japanese",
	"ji" => "Yiddish (obsolete)",
	"jw" => "Javanese",
	"ka" => "Georgian",
	"kk" => "Kazakh",
	"kl" => "Greenlandic",
	"km" => "Cambodian",
	"kn" => "Kannada",
	"ko" => "Korean",
	"ks" => "Kashmiri",
	"ku" => "Kurdish",
	"ky" => "Kirghiz",
	"la" => "Latin",
	"ln" => "Lingala",
	"lo" => "Laothian",
	"lt" => "Lithuanian",
	"lv" => "Latvian/Lettish",
	"mg" => "Malagasy",
	"mi" => "Maori",
	"mk" => "Macedonian",
	"ml" => "Malayalam",
	"mn" => "Mongolian",
	"mo" => "Moldavian",
	"mr" => "Marathi",
	"ms" => "Malay",
	"mt" => "Maltese",
	"my" => "Burmese",
	"na" => "Nauru",
	"ne" => "Nepali",
	"nl" => "Dutch",
	"no" => "Norwegian",
	"oc" => "Occitan",
	"om" => "(Afan) Oromo",
	"or" => "Oriya",
	"pa" => "Punjabi",
	"pl" => "Polish",
	"ps" => "Pashto / Pushto",
	"pt" => "Portuguese",
	"qu" => "Quechua",
	"rm" => "Rhaeto-Romance",
	"rn" => "Kirundi",
	"ro" => "Romanian",
	"ru" => "Russian",
	"rw" => "Kinyarwanda",
	"sa" => "Sanskrit",
	"sd" => "Sindhi",
	"sg" => "Sangro",
	"sh" => "Serbo-Croatian",
	"si" => "Singhalese",
	"sk" => "Slovak",
	"sl" => "Slovenian",
	"sm" => "Samoan",
	"sn" => "Shona",
	"so" => "Somali",
	"sq" => "Albanian",
	"sr" => "Serbian",
	"ss" => "Siswati",
	"st" => "Sesotho",
	"su" => "Sundanese",
	"sv" => "Swedish",
	"sw" => "Swahili",
	"ta" => "Tamil",
	"te" => "Tegulu",
	"tg" => "Tajik",
	"th" => "Thai",
	"ti" => "Tigrinya",
	"tk" => "Turkmen",
	"tl" => "Tagalog",
	"tn" => "Setswana",
	"to" => "Tonga",
	"tr" => "Turkish",
	"ts" => "Tsonga",
	"tt" => "Tatar",
	"tw" => "Twi",
	"ug" => "Uigur",
	"uk" => "Ukrainian",
	"ur" => "Urdu",
	"uz" => "Uzbek",
	"vi" => "Vietnamese",
	"vo" => "Volapuk",
	"wo" => "Wolof",
	"xh" => "Xhosa",
	//"y" => "Yiddish",
	"yi" => "Yiddish",
	"yo" => "Yoruba",
	"za" => "Zuang",
	"zh" => "Chinese",
	"zu" => "Zulu",
);

add_translation("en",$english);
