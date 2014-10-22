<?php 
	global $CONFIG;
	
	define("MENU_BUILDER_SUBTYPE", "menu_builder_menu_item");
	
	require_once(dirname(__FILE__) . "/lib/functions.php");
		
	function menu_builder_init(){
		
		// extend the CSS with plugin CSS
		elgg_extend_view("css", "menu_builder/css");
		
		if(isadminloggedin()){
			elgg_extend_view("metatags", "menu_builder/metatags");
		}
		
		if(get_plugin_setting("extend_header", "menu_builder") == "yes"){
			elgg_extend_view("page_elements/header_contents", "menu_builder/menu");
		}
		
		// register pagehandler for nice URL's
		register_page_handler("menu_builder", "menu_builder_page_handler");
		
		// switch mode
		if(get_input("menu_builder_edit_mode") == "on"){
			$_SESSION["menu_builder_edit_mode"] = true;
		} elseif(get_input("menu_builder_edit_mode") == "off"){
			unset($_SESSION["menu_builder_edit_mode"]);
		}
		
		// register url handler for menu_builder objects
		register_entity_url_handler("menu_builder_menu_item_url_handler", "object", MENU_BUILDER_SUBTYPE);
		
	}
	
	function menu_builder_page_handler($page){
		
		switch($page[0]){
			case "edit":
				if(!empty($page[1])){
					set_input("guid", $page[1]);
				}
				
				include(dirname(__FILE__) . "/pages/edit.php");
				break;
			case "reorder":
				include(dirname(__FILE__) . "/procedures/reorder.php");
				break;
			default:
				return false;
				break;
		}
	}
	
	function menu_builder_menu_item_url_handler($entity){
		global $CONFIG;
		
		$result = false;
		
		if($url = $entity->url){
			// fill in site url
			$url = str_replace("[wwwroot]", $CONFIG->wwwroot, $url);
			
			// fill in username
			if($user = get_loggedin_user()){
				$url = str_replace("[username]", $user->username, $url);
			} else {
				list($url) = explode("[username]", $url);
			}
			
			$result = $url;
		}
		
		return $result;
	}
	
	function menu_builder_delete_event_handler($event, $entity_type, $object){
		
		if(!empty($object) && isadminloggedin()){
			if($object->getSubtype() == MENU_BUILDER_SUBTYPE){
				$options = array(
					"type" => "object",
					"subtype" => MENU_BUILDER_SUBTYPE,
					"limit" => false,
					"metadata_name" => "parent_guid",
					"metadata_value" => $object->getGUID()
				);
				
				if($children = elgg_get_entities_from_metadata($options)){
					foreach($children as $child){
						$child->delete();
					}
				}
			}
		}
	}

	// register default Elgg events
	register_elgg_event_handler("init", "system", "menu_builder_init");
	
	// register on events
	register_elgg_event_handler("delete", "object", "menu_builder_delete_event_handler");
	
	// register actions
	register_action("menu_builder/edit", false, dirname(__FILE__) . "/actions/edit.php", true);
	register_action("menu_builder/delete", false, dirname(__FILE__) . "/actions/delete.php", true);
?>