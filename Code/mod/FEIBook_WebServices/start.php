<?php
/*Funciones para las acciones de las publicaciones.*/
function createPublication($text) {
	$text = substr($text, 0, 140);
	$acceso = ACCESS_PUBLIC;
	$response = thewire_save_post($text, $acceso, "api");
	return $response;
}

expose_function("create.Publication","createPublication",
		array("publication" => array('type' => 'string')),
		'Crear una nueva publicación',
		'POST',
		false,
		true);


function getPublications($limit, $offset, $usernameclient) {
	$params = array('types' => 'object','subtypes' => 'thewire','limit' => $limit,'offset' => $offset);	
	$latest_wire = elgg_get_entities($params);

	foreach($latest_wire as $single ) 
	{
		$timePublication = $single->time_created;
		$timePublication = date("Y-m-d H:i:s",$timePublication);
		$timeActual = time();
		$timeActual = date("Y-m-d H:i:s",$timeActual);
		$datePublication = $timePublication; 
		$dateActual = $timeActual;
		$user = $single->getOwnerEntity()->username;
		$difference = get_time($datePublication, $dateActual);
		$like = likes($single->guid, $usernameclient);
		$likes = count_annotations($single->guid, '', '', 'like', '', '','');
		
		$icon = get_usericon($single->getOwnerEntity()->username);

		$amountCommets = 0;
		$wire[$single->guid]['time_created'] = $difference;
		$wire[$single->guid]['description'] = $single->description;						
		$wire[$single->guid]['username'] = $single->getOwnerEntity()->name;
		$wire[$single->guid]['user'] = $user;
		$wire[$single->guid]['guid'] = $single->guid;
		$wire[$single->guid]['owner_guid'] = $single->owner_guid;
		$wire[$single->guid]['access_id'] = $single->access_id;
		$wire[$single->guid]['avatar_url'] = utf8_encode($icon);
		$comments = get_annotations($single->guid, "", "", 'generic_comment', "", "", 10000, 0);
		foreach($comments as $comment)
		{
			$amountCommets = $amountCommets + 1;
		}
		$wire[$single->guid]['num_comments'] = $amountCommets;
		$wire[$single->guid]['num_likes'] = $likes;
		$wire[$single->guid]['like'] = $like;

		$response[] = $wire[$single->guid];
	}
	return $response;
}

expose_function('get.Publications',"getPublications",
		array('limit' => array ('type' => 'string', 'required' => false),'offset' => array ('type' => 'string', 'required' => false), 'usernameclient' => array ('type' => 'string', 'required' => true)),
		"Obtiene una arreglo de publicaciones",
		'POST',
		false,
		true);


function GetPublication($guid, $username) {
	$params = array(
	'types' => 'object',
	'subtypes' => 'thewire',		
	'limit' => $limit,
	'offset' => $offset,);
	
	$latest_wire = elgg_get_entities($params);
	foreach($latest_wire as $single ) {
		
		$amountCommets = 0;
		if($single->guid == $guid) {
			
			$timePublication = $single->time_created;
			$timePublication = date("Y-m-d H:i:s",$timePublication);
			$timeActual = time();
			$timeActual = date("Y-m-d H:i:s",$timeActual);
			$datePublication = $timePublication; 
			$dateActual = $timeActual; 
			$difference = get_time($datePublication, $dateActual);
			$like = likes($single->guid, $username);
			$likes = count_annotations($single->guid, '', '', 'like', '', '','');
			
			$icon = get_usericon($single->getOwnerEntity()->username);
						
			$wire[$single->guid]['time_created'] = $difference;
			$wire[$single->guid]['description'] = $single->description;						
			$wire[$single->guid]['username'] = $single->getOwnerEntity()->name;
			$wire[$single->guid]['user'] = $single->getOwnerEntity()->username;
			$wire[$single->guid]['guid'] = $single->guid;
			$wire[$single->guid]['owner_guid'] = $single->owner_guid;
			$wire[$single->guid]['access_id'] = $single->access_id;
			$wire[$single->guid]['avatar_url'] = utf8_encode($icon);
			$comments = get_annotations($single->guid, "", "", 'generic_comment', "", "", 10000, 0);
			foreach($comments as $comment)
			{
				$amountCommets = $amountCommets + 1;
			}
			$wire[$single->guid]['num_comments'] = $amountCommets;
			$wire[$single->guid]['num_likes'] = $likes;
			$wire[$single->guid]['like'] = $like;
	
			$response[] = $wire[$single->guid];
			
		}
	}

	return $response;
}
				
expose_function('get.Publication',"getPublication",
		array('guid' => array ('type' => 'int'),),
		"Obtiene una publicación por número GUID",
		'POST',
		false,
		true);
		

function getPublicationsUser($username, $limit, $offset) {
	$user = get_user_by_username($username);
	if (!$user) {
		throw new InvalidParameterException('registration:usernamenotvalid');
	}
		$params = array(
		'types' => 'object',
		'subtypes' => 'thewire',
		'owner_guid' => $user->guid,
		'limit' => $limit,
		'offset' => $offset,
	);
	$latest_wire = elgg_get_entities($params);
	
	foreach($latest_wire as $single ) {
		
		$timePublication = $single->time_created;
		$timePublication = date("Y-m-d H:i:s",$timePublication);
		$timeActual = time();
		$timeActual = date("Y-m-d H:i:s",$timeActual);
		$datePublication = $timePublication; 
		$dateActual = $timeActual; 
		$difference = get_time($datePublication, $dateActual);
		$like = likes($single->guid, $username);
		$likes = count_annotations($single->guid, '', '', 'like', '', '','');
		
		$icon = get_usericon($single->getOwnerEntity()->username);

		$amountCommets = 0;
		$wire[$single->guid]['time_created'] = $difference;
		$wire[$single->guid]['description'] = $single->description;						
		$wire[$single->guid]['username'] = $single->getOwnerEntity()->name;
		$wire[$single->guid]['user'] = $single->getOwnerEntity()->username;
		$wire[$single->guid]['guid'] = $single->guid;
		$wire[$single->guid]['owner_guid'] = $single->owner_guid;
		$wire[$single->guid]['access_id'] = $single->access_id;
		$wire[$single->guid]['avatar_url'] = utf8_encode($icon);
		$comments = get_annotations($single->guid, "", "", 'generic_comment', "", "", 10000, 0);
		foreach($comments as $comment) {
			$amountCommets = $amountCommets + 1;
		}
		$wire[$single->guid]['num_comments'] = $amountCommets;
		$wire[$single->guid]['num_likes'] = $likes;
		$wire[$single->guid]['like'] = $like;

		$response[] = $wire[$single->guid];
	}
	
	return $response;
}
				
expose_function('get.PublicationsUser',"getPublicationsUser",
		array('username' => array ('type' => 'string'),
		'limit' => array ('type' => 'int', 'required' => false),
		'offset' => array ('type' => 'int', 'required' => false),),
		"Obtiene un arreglo de publicaciones de un usuario",
		'POST',
		false,
		true);


function deletePublication($guid){
	$publication = get_entity($guid);
	if ($publication->getSubtype() == "thewire" && $publication->canEdit()) {
			$owner = get_entity($publication->getOwner());
			$rowsaffected = $publication->delete();
			return true;
	}
	else {
		return false;
	}	
}
				
expose_function("delete.Publication","deletePublication",
                array("guid" => array('type' => 'string')),
                'Elimina una publicación',
                'POST',
                false,
                true);	

/*Funciones para las acciones de los comentarios*/

function createComments($guid, $text){
	$annotation = create_annotation($guid, 'generic_comment',$text,"","" , 2);
	return $annotation;
}

expose_function('create.Comments',"createComments",
		array('guid' => array ('type' => 'int'),'text' => array ('type' => 'String')),
		"Read lates wire post",
		'POST',
		false,
		true);

function deleteComment($guid){
	$annotation_id = (int) $guid;
	if ($comment = get_annotation($annotation_id)) 
	{
		$entity = get_entity($comment->entity_guid);
		if ($comment->canEdit()) 
		{
			$comment->delete();
			return true;
		}
		else
		{
			return false;
		}
	
	} 
	else 
	{		
		return false;
	}
}

expose_function('delete.Comment',"deleteComment",
		array('guid' => array('type' => 'int'),),
		"Eliminar un comentario",
		'POST',
		false,
		true);


function getComments($guid){
	$comments = get_annotations($guid, "", "", 'generic_comment', "", "", 10000, 0);
	foreach($comments as $comment) 
	{
		$timePublication = $comment->time_created;
		$timePublication = date("Y-m-d H:i:s",$timePublication);
		$timeActual = time();
		$timeActual = date("Y-m-d H:i:s",$timeActual);
		$datePublication = $timePublication; 
		$dateActual = $timeActual;
		$difference = get_time($datePublication, $dateActual);
		
		$commenta[$comment->id]['value'] = $comment->value;
		$commenta[$comment->id]['guid'] = $comment->id;
		$commenta[$comment->id]['time_created'] = $difference;
		$commenta[$comment->id]['access_id'] = $comment->access_id;
		$commenta[$comment->id]['username'] = $comment->getOwnerEntity()->username;
		$commenta[$comment->id]['user'] = $comment->getOwnerEntity()->name;
		$icon = get_usericon($comment->getOwnerEntity()->username);
		$commenta[$comment->id]['avatar_url'] = utf8_encode($icon);
		
		$response[] = $commenta[$comment->id];
	}
	return $response;
}

expose_function('get.Comments',"getComments",
		array('guid' => array('type' => 'string'),
		'limit' => array ('type' => 'int', 'required' => false),
		'offset' => array ('type' => 'int', 'required' => false),),
		"Obtiene los comentarios de una publicación",
		'POST',
		false,
		true);

/*Funciones para las acciones del perfil.*/
function getProfileFields () {
	$user_fields = get_config('profile');
	foreach($user_fields as $key => $type) {
		$profile_labels[$key]['label'] = elgg_echo('profile '.$key);
		$profile_labels[$key]['type'] = $type;
	}
	return $profile_labels;
}

expose_function('get.ProfileFields',"getProfileFields",
		array(),
		"get fields",
		'GET',
		false,
		false );

function getProfile($username, $myuser){
	$user = get_user_by_username($username);
	$myuser = get_user_by_username($myuser);
	if(!user){
		return ("Not user");
	}
	$user_fields = get_config('profile');
	foreach($user_fields as $key => $type){
		$user_fields[$key] = $user->$key;
	}

	if($user->isFriendOf($myuser->guid)){
		$user_fields['isFriend'] = elgg_echo('true');
	} else {
		$user_fields['isFriend'] = elgg_echo('false');
	}

	$user_fields['avatar_url'] = get_entity_icon_url($user,'medium');
	$user_fields['user'] = $user->name;
	$user_profile[] = $user_fields;
	return $user_profile;
}

expose_function('get.Profile',"getProfile",
	array('username' => array ('type' => 'string', 'required' => true),
		'myuser' => array ('type' => 'string', 'required' => true)),
	"Obtener el perfil de usuario",
	 'POST',
	 false,
	true);

/*Funciones para las acciones de las amistades.*/

function getFriends($username, $limit = 9999, $offset = 0) 
{
	if($username) {
		$user = get_user_by_username($username);
	}

	if (!$user) {
		return false;
	}

	$friends = get_user_friends($user->guid, '' , $limit, $offset);
	
	if($friends) {
		foreach($friends as $single) {
			$friend['guid'] = $single->guid;
			$friend['username'] = $single->username;
			$friend['name'] = $single->name;			
			$friend['avatar_url'] = get_entity_icon_url($single,'small');
			$response[] = $friend;
		}
	}
	else {
		return false;
	}

	return $response;
}

expose_function('get.Friends',"getFriends",
		array('username' => array ('type' => 'string', 'required' => true),
		'limit' => array ('type' => 'int', 'required' => false),
		'offset' => array ('type' => 'int', 'required' => false)),
		"Register user",
		'POST',
		false,
		true);


function getMembers($username) 
{
	$entities = get_entities('user', "", 0, "", $limit, $offset);
	$strlen = strlen($username);
	$media = $strlen/2;
	foreach ($entities as $entity) 
	{
		$indice = similar_text($username, $entity->username);
		if($indice > $media)
		{
			$member['guid'] = $entity->guid;
			$member['username'] = $entity->username;
			$member['name'] = $entity->name;
			$member['avatar_url'] = get_entity_icon_url($entity,'small');
			$result[] = $member;
		}
	}

	return $result;
}

expose_function('get.Members',"getMembers",
		array('username' => array ('type' => 'string', 'required' => true)),
		"Register user",
		'POST',
		false,
		true);

function addFriend($username, $friend) {
	$user = get_user_by_username($username);
	$return['access'] = false;
	
	if(!user){
		$return['message'] = elgg_echo('Usuario no valido');
	}
	
	$friend_user = get_user_by_username($friend);
	if(!friend_user){
		$return['message'] = elgg_echo('Amigo no registrado');
	}

	if($friend_user->isFriendOf($user->guid)){
		$return['message'] = elgg_echo('Amigo ya agregado');
	}

	try{
		if(!$user->addFriend($friend_user->guid)){
			$errors = true;
		}
	}catch (Exception $e){
		$errors = true;
	}

	if(!errors){
		add_to_river('river/relationship/friend/create', 'friend', $user->guid, $friend_user->guid);
		$return['success'] = true;
	}

	return $return;
}
	
expose_function('add.Friend',"addFriend",
		array('username' => array ('type' => 'string', 'required' => true),
			'friend' => array ('type' => 'string', 'required' => true)),
		"Read a sigle message",
		'POST',
		false,
		true);	

function removeFriend($username, $friend) {
	
	$user = get_user_by_username($username);
	$return['success'] = false;
	if (!$user) {
		$return['message'] = elgg_echo('usuario no valido');
	}
	
	$friend_user = get_user_by_username($friend);
	if (!$friend_user) {
		$return['message'] = elgg_echo("Error");
	}
	
	if(!$friend_user->isFriendOf($user->guid)) {
		$return['message'] = elgg_echo('Error');
	}
	
	try {
		if (!$user->removeFriend($friend_user->guid)) {
			$errors = true;
		}
	} catch (Exception $e) {
		$errors = true;
		$return['message'] = elgg_echo("Error");
	}

	if (!$errors) {
		$return['message'] = elgg_echo("Amigo eliminado");
		$return['success'] = true;
	}
	return $return;
}
	
expose_function('remove.Friend',"removeFriend",
		array('username' => array ('type' => 'string', 'required' => true),
			'friend' => array ('type' => 'string', 'required' => true)),
		"Read a sigle message",
		'POST',
		false,
		true);

/*Funciones para las acciones de los mensajes privados.*/

function sendMessage($title, $message, $username, $reply)
{
	/*El reply es el numero guid del mensaje enviado, si se
	envia de regreso este número se podria decir que esto respondiendo
	a este mismo mensaje, por defecto es 0 ya que no responde a ningun
	mensaje, solo inicia una conversación*/	
	$user = get_user_by_username($username);
	$user = $user->guid;
	$result = messages_send($title, $message, $user, 0, $reply);
	return $result;
}
expose_function('send.Message',"sendMessage",
		array('title' => array('type' => 'string'),'message' =>array('type' => 'string'),'username' =>array('type' => 'string'),'reply' =>array('type' => 'string')),
		"Enviar un mensaje privado a un amigo",
		'POST',
		false,
		true);


function getMessages($limit) 
{	
	$user = get_loggedin_user();

	$params = array(
	'type' => 'object',
	'subtype' => 'messages',
	'metadata_name' => 'toId',
	'metadata_value' => $user->guid,
	'owner_guid' => $user->guid,
	'full_view' => false,
	'limit' => 100,
	'offset' => '0');
	
	$list = elgg_get_entities_from_metadata($params);
	if($list) 
	{
		foreach($list as $single ) 
		{
			
			$time = $single->time_created;
			$time = date("d-M-Y", $time);
			$message['guid'] = $single->guid;
			$message['subject'] = $single->title;
			$user = get_entity($single->fromId);
			$message['guid_username'] = $user->guid;
			$message['name'] = $user->name;
			$message['username'] = $user->username;
			$message['time_created'] = $time;
			$message['description'] = $single->description;
			$icon = get_usericon($user->username);
			$message['url_avatar'] = utf8_encode($icon);
			
			if($single->readYet) {
				$message['read'] = "true";
			}
			else {
				$message['read'] = "false";
			}
			$return[] = $message;
		}
	}
	else 
	{
	 	$msg = elgg_echo('messages:sin mensajes');
		throw new InvalidParameterException($msg);
	}

	return $return;
}
	
expose_function('get.Messages',"getMessages",
		array('limit' => array ('type' => 'string', 'required' => false)),
		"Obtener  la bandeja de entrada de mensajes privados",
		'POST',
		false,
		true);


function readMessage($guid) {
	
		$single = get_entity($guid);
		if(!$single) {
			return false;
		}
	
		$user = get_entity($single->fromId);
		$single->readYet = 1;

		$message['guid'] = $single->guid;
		$message[$single->guid]['subject'] = $single->title;
		$message['user']['guid'] = $user->guid;
		$message['user']['name'] = $user->name;
		$message['user']['username'] = $user->username;
		$message['user']['avatar_url'] = get_entity_icon_url($user,'small');
		$message['time_created'] = $single->time_created;
		$message['description'] = $single->description;
		$message['read'] = "yes";
		
		return true;
}
	
expose_function('read.Message',"readMessage",
		array('guid' => array ('type' => 'string', 'required' => true)),
		"Leer un mensaje privado",
		'POST',
		false,
		true);


function deleteMessage($guid) {
	$message = get_entity($guid);
	if ($message->delete()) 
	{
		$success = true;
	} 
	else
	{
		$success = false;
	}

	return $success;
}
	
expose_function('delete.Message',"deleteMessage",
		array('guid' => array ('type' => 'string', 'required' => true)),
		"Eliminar un mensaje de la bandeja de entrada",
		'POST',
		false,
		true);

/*Funciones para las acciones de los like.*/

function Like($guid, $username) {
	$entity = get_entity($guid);
	$guid= $entity->getGUID();
	$user = get_user_by_username($username);
	$owner_guid = $user->guid;
	$likes = count_annotations($guid, '', '', 'like', '', '', $owner_guid);
	
	if($likes == 0) {
		$like = create_annotation($guid, 'like','like',"",$owner_guid,2);
	}
	else {
		$like = '0';
	}

	return $like;
} 
				
expose_function('add.Like',"Like",
		array('guid' => array ('type' => 'int', 'required' => true),
		'username' => array ('type' => 'string', 'required' => true)),
		"Agrega un like a una publicación",
		'POST',
		false,
		true);

function dislike($entity_guid, $username) {
	$user = get_user_by_username($username);
	$owner_guid = $user->guid;
	$likes = get_annotations($entity_guid, "", "", 'like', "",$owner_guid, 1000, 0);

	foreach($likes as $like)
	{
		$likes['guid'] = $like->id;
		$likes['name'] = $like->name;
	}
	if ($likes)
	{
		if ($likes[0]->canEdit()) 
		{
			$likes[0]->delete();
			return elgg_echo("true");
		}
		else{
		return elgg_echo("error");
		}
	}
	return elgg_echo("false");
} 
				
expose_function('dis.like',"dislike",
		array('entity_guid' => array ('type' => 'string'), 'username' => array ('type' => 'string')),
		"Quita el like a una publicación",
		'POST',
		false,
		true);

/*Funciones para las acciones del usuario.*/

function changeUsername($newname, $username) {	
	$name = $newname;	
	$user = get_user_by_username($username);
	$user = $user->guid;
	$user = get_entity($user);
	$message;
	
	if (elgg_strlen($name) > 50) 
	{
		$message = "El nombre es demaciado largo";
	}

	if (($user) && ($user->canEdit()) && ($name))
	{
		if ($name != $user->name) 
		{
			$user->name = $name;
			if ($user->save()) 
			{
				$message = "Se ha cambiado tu nombre";
			} 
			else 
			{
				$message = "Error al cambiar el nombre de usuario";
			}
		}
		else
		{
			$message = "false";
		}
	}
	else 
	{
		$message = "Error al cambiar el nombre de usuario";
	}
	return $message;
}

expose_function('change.Username',"changeUsername",
		array('newname' => array ('type' => 'string', 'required' => true),
		'username' => array ('type' => 'string', 'required' => true),),
		"Register user",
		'POST',
		false,
		true);

/*Función para las notificaciones*/
function getNotification() {
	$count = 0;
	$params = array('types' => 'object','subtypes' => 'thewire','limit' => $limit,'offset' => $offset,);	
	$latest_wire = elgg_get_entities($params);
	
	foreach($latest_wire as $single ) {
		$wire[$single->guid] = $single->guid;
	}
	$return = reset($wire);
	return $return;
}

expose_function('get.Notification',"getNotification",
		array(),
		"Register user",
		'POST',
		false,
		true);

/*Función para convertir la hora de creación en formato normal*/

function get_time($time_inicial, $time_final)
{
	$diff = abs(strtotime($time_inicial) - strtotime($time_final)); 
	$years   = floor($diff / (365*60*60*24)); 
	$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
	$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 		
	$minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
	if($years >  0)
	{		
		return ($years." años y ".$months." meses");
	}
	else
	{
		if($months > 0)
		{
			return ($months." meses y ".$days." días." );
		}
		else 
		{
			if($days > 0)
			{
				return ($days." días y ".$hours." hrs." );
			}
			else
			{
				if($hours > 0)
				{
					return ($hours." hrs y ".$minuts." min." );
				}
				else
				{
					return ($minuts." min. ");
				}
			}
		}
	}
}

/*Función para obtener la imagen avatar de un usuario*/
function get_usericon($username) {	
	global $CONFIG;
	if(!$username){
		$user = get_loggedin_user();
	} 
	else {
		$user = get_user_by_username($username);
	}
	if (!$user) {
		throw new InvalidParameterException('registration:usernamenotvalid');
	}
	$icon = get_entity_icon_url($user,'medium');
	return $icon;
}

/*Función para conocer si  una publicación tiene like su usuario.*/
function likes($guid, $username) {
	$entity = get_entity($guid);
	$guid = $entity->getGUID();

	$user = get_user_by_username($username);
	$owner_guid = $user->guid;

	$likes = count_annotations($guid, '', '', 'like', '', '', $owner_guid);

	if($likes == 0) {
		$response = false;
	}
	else {
		$response = true;
	}

	return $response;
}


?>
