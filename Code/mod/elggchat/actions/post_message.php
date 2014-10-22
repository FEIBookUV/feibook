<?php
gatekeeper();
	$sessionId = (int) get_input("chatsession");
	$userId = get_loggedin_userid();
	
	if(check_entity_relationship($sessionId, ELGGCHAT_MEMBER, $userId)){
		$chat_message = get_input("chatmessage");
		
		if(!empty($chat_message)){
			$session = get_entity($sessionId);
			$session->annotate(ELGGCHAT_MESSAGE, $chat_message, ACCESS_LOGGED_IN, $userId);
			$session->save();
		}
	}
exit(); 
?>
