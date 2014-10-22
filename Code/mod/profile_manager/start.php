<?php 
	/**
	* Profile Manager
	* 
	* @package profile_manager
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	*/
	
	require_once(dirname(__FILE__) . "/lib/classes.php");

	define("CUSTOM_PROFILE_FIELDS_CATEGORY_SUBTYPE", "custom_profile_field_category");
	define("CUSTOM_PROFILE_FIELDS_PROFILE_TYPE_SUBTYPE", "custom_profile_type");
	define("CUSTOM_PROFILE_FIELDS_PROFILE_SUBTYPE", "custom_profile_field");
	define("CUSTOM_PROFILE_FIELDS_GROUP_SUBTYPE", "custom_group_field");
	
	define("CUSTOM_PROFILE_FIELDS_PROFILE_TYPE_CATEGORY_RELATIONSHIP", "custom_profile_type_category_relationship");

	/**
	 * initialization of plugin
	 * 
	 * @return unknown_type
	 */
	function profile_manager_init(){
		global $CONFIG;

		// Extend CSS
		extend_view("css", "profile_manager/css");
		extend_view("css", "members/css");
		extend_view("js/initialise_elgg", "profile_manager/global_js");
		
		// add custom profile fields to register page
		extend_view("register/extend", "profile_manager/register");
		
		// extend the user profile view
		extend_view("profile/userdetails", "profile_manager/profile/userdetails");
		
		// link to full profile
		if(get_plugin_setting("show_full_profile_link") == "yes"){
			extend_view("profile/menu/actions", "profile_manager/profile/userlinks");
		}
		
		// Extend the admin statistics
		if(get_plugin_setting("show_admin_stats") == "yes"){
			extend_view("admin/statistics", "profile_manager/admin_stats");
		}
		
		// Register a page handler, so we can have nice URLs
		register_page_handler('defaultprofile', 'profile_manager_edit_defaults_page_handler');
		
		// Register Page handler for Custom Profile Fields
		register_page_handler("profile_manager", "profile_manager_page_handler");
		
		// Register Page handler for Members listing
		if(get_plugin_setting("show_members_search") == "yes"){
			register_page_handler("members", "profile_manager_members_page_handler");
			add_menu(elgg_echo("profile_manager:members:menu"), $CONFIG->wwwroot . "pg/members");
		}
		
		// admin user add, registered here to overrule default action
		register_action("useradd", false, $CONFIG->pluginspath . "profile_manager/actions/admin/useradd.php", true);
		
		// Register all custom field types
		register_custom_field_types();
		
		// Run once function to configure this plugin
		run_function_once('profile_manager_run_once', 1287964800); // 2010-10-25
		
	}
	
	function profile_manager_run_once(){
		global $CONFIG; 
		
		// upgrade class names for subtypes
		$profile_field_class_name = "ProfileManagerCustomProfileField";
		$group_field_class_name = "ProfileManagerCustomGroupField";
		$field_type_class_name = "ProfileManagerCustomProfileType";
		$field_category_class_name = "ProfileManagerCustomFieldCategory";
		
		if($id = get_subtype_id('object', ProfileManagerCustomProfileField::SUBTYPE)){
			update_data("UPDATE {$CONFIG->dbprefix}entity_subtypes set class='$profile_field_class_name' WHERE id=$id");
		} else {
			add_subtype('object', ProfileManagerCustomProfileField::SUBTYPE, $profile_field_class_name);	
		}
		
		if($id = get_subtype_id('object', ProfileManagerCustomGroupField::SUBTYPE)){
			update_data("UPDATE {$CONFIG->dbprefix}entity_subtypes set class='$group_field_class_name' WHERE id=$id");
		} else {
			add_subtype('object', ProfileManagerCustomGroupField::SUBTYPE, $group_field_class_name);	
		}
		
		if($id = get_subtype_id('object', ProfileManagerCustomProfileType::SUBTYPE)){
			update_data("UPDATE {$CONFIG->dbprefix}entity_subtypes set class='$field_type_class_name' WHERE id=$id");
		} else {
			add_subtype('object', ProfileManagerCustomProfileType::SUBTYPE, $field_type_class_name);	
		}
		
		if($id = get_subtype_id('object', ProfileManagerCustomFieldCategory::SUBTYPE)){
			update_data("UPDATE {$CONFIG->dbprefix}entity_subtypes set class='$field_category_class_name' WHERE id=$id");
		} else {
			add_subtype('object', ProfileManagerCustomFieldCategory::SUBTYPE, $field_category_class_name);	
		}
		
		// update ownerships of profile manager field configuration
		// owner should be site instead of a user (prevents problems when upgrading)
		// Added in Profile Manager v5.6
		
		$options = array(
				"type" => "object",
				"subtypes" => array(
						ProfileManagerCustomProfileField::SUBTYPE,
						ProfileManagerCustomGroupField::SUBTYPE,
						ProfileManagerCustomProfileType::SUBTYPE,
						ProfileManagerCustomFieldCategory::SUBTYPE
					),
				"limit" => 0
			);
		$entities = elgg_get_entities($options);
		foreach($entities as $entity){
			$entity->owner_guid = $entity->site_guid;
			$entity->container_guid = $entity->site_guid;
			$entity->save();
		}
	}
	
	/**
	 * function to handle the 'old' replace profile fields url
	 * 
	 * @param $page
	 * @return unknown_type
	 */
	function profile_manager_edit_defaults_page_handler($page){
		global $CONFIG;
		
		// Forward to new form url
		if($page[0] == "edit"){
			forward($CONFIG->wwwroot . "pg/profile_manager/profile_fields");
		} 
	}
	
	/**
	 * function to handle the nice urls for Custom Profile Fields
	 * 
	 * @param $page
	 * @return unknown_type
	 */
	function profile_manager_page_handler($page){
		global $CONFIG;
		
		switch($page[0]){
			case "group_fields":
				include(dirname(__FILE__) . "/pages/group_fields.php");
				break;
			case "profile_fields":
				include(dirname(__FILE__) . "/pages/profile_fields.php");
				break;
			case "full_profile":
				set_input("profile_guid", $page[1]);
				include(dirname(__FILE__) . "/pages/full_profile.php");
				break;
			case "export":
				set_input("fieldtype", $page[1]);
				include(dirname(__FILE__) . "/pages/export.php");
				break;
			case "file_download":
				set_input("file_guid", $page[1]);
				include(dirname(__FILE__) . "/pages/file_download.php");
				break;
		}
	}
	
	function profile_manager_members_page_handler($page){
		
		switch($page[0]){
			case "search":
				include(dirname(__FILE__) . "/procedures/members/search.php");
				break;
			default:
				include(dirname(__FILE__) . "/pages/members.php");
				break;
		}
	}
	
	/**
	 * Function to add menu items to the pages
	 * 
	 * @return unknown_type
	 */
	function profile_manager_pagesetup(){
		global $CONFIG;
		
		if(get_context() == "admin" && isadminloggedin()){
			if(is_plugin_enabled("profile")){
				// Remake admin submenu
				$subA = &$CONFIG->submenu["a"];
				
				foreach($subA as $index => $item){
					if($item->name == elgg_echo("profile:edit:default")){
						unset($subA[$index]);
					}
				}
			
				add_submenu_item(elgg_echo("profile:edit:default"), $CONFIG->wwwroot . "pg/profile_manager/profile_fields", "b");
			}
			
			if(is_plugin_enabled("groups")){
				add_submenu_item(elgg_echo("profile_manager:group_fields"), $CONFIG->wwwroot . "pg/profile_manager/group_fields", "b");
			}
		}
		if(get_plugin_setting("show_members_search") == "yes" && (get_input("handler") == "search" || strpos($_SERVER["REQUEST_URI"], "/search/") === 0)){
			add_submenu_item(elgg_echo('profile_manager:members:submenu'), $CONFIG->wwwroot . "pg/members", "b");
		}
	}
	
	/**
	 * Registes all custom field types
	 */
	function register_custom_field_types(){
		// registering profile field types
		$profile_options = array(
				"show_on_register" => true,
				"mandatory" => true,
				"user_editable" => true,
				"output_as_tags" => true,
				"admin_only" => true,
				"simple_search" => true,
				"advanced_search" => true
			);		
			
			global $CONFIG;
			
		$calendar_options = $profile_options;
		unset($calendar_options["simple_search"]);
		unset($calendar_options["advanced_search"]);
		
		$pm_datepicker_options = $profile_options;
		unset($pm_datepicker_options["output_as_tags"]);
		
		$pulldown_options = $profile_options;
		$pulldown_options["blank_available"] = true;
		
		$radio_options = $profile_options;
		$radio_options["blank_available"] = true;
		
		$file_options = array(
			"user_editable" => true,
			"admin_only" => true
		);
		
		add_custom_field_type("custom_profile_field_types", 'text', elgg_echo('text'), $profile_options);
		add_custom_field_type("custom_profile_field_types", 'longtext', elgg_echo('longtext'), $profile_options);
		add_custom_field_type("custom_profile_field_types", 'tags', elgg_echo('tags'), $profile_options);
		add_custom_field_type("custom_profile_field_types", 'url', elgg_echo('url'), $profile_options);
		add_custom_field_type("custom_profile_field_types", 'email', elgg_echo('email'), $profile_options);
		add_custom_field_type("custom_profile_field_types", 'calendar', elgg_echo('calendar'), $calendar_options);
		add_custom_field_type("custom_profile_field_types", 'pm_datepicker', elgg_echo('profile_manager:admin:options:pm_datepicker'), $pm_datepicker_options);
		add_custom_field_type("custom_profile_field_types", 'pulldown', elgg_echo('profile_manager:admin:options:pulldown'), $pulldown_options);
		add_custom_field_type("custom_profile_field_types", 'radio', elgg_echo('profile_manager:admin:options:radio'), $radio_options);
		add_custom_field_type("custom_profile_field_types", 'multiselect', elgg_echo('profile_manager:admin:options:multiselect'), $profile_options);
		add_custom_field_type("custom_profile_field_types", 'pm_file', elgg_echo('profile_manager:admin:options:file'), $file_options);
		
		if(elgg_view_exists("output/datepicker") && elgg_view_exists("input/datepicker")){
			$datepicker_options = $profile_options;
			unset($datepicker_options["output_as_tags"]);
			unset($datepicker_options["simple_search"]);
			unset($datepicker_options["advanced_search"]);
			
			add_custom_field_type("custom_profile_field_types", 'datepicker', elgg_echo('profile_manager:admin:options:datepicker'), $datepicker_options);
		} else {
			register_plugin_hook('display', 'view', 'profile_manager_display_view_hook');
		}
		
		
		
		// registering group field types		
		$group_options = array(
				"output_as_tags" => true,
				"admin_only" => true
			);	
		
		$datepicker_options = $group_options;
		unset($datepicker_options["output_as_tags"]);
		
		$pulldown_options = $group_options;
		$pulldown_options["blank_available"] = true;
		
		$radio_options = $group_options;
		$radio_options["blank_available"] = true;
		
		add_custom_field_type("custom_group_field_types", 'text', elgg_echo('text'), $group_options);
		add_custom_field_type("custom_group_field_types", 'longtext', elgg_echo('longtext'), $group_options);
		add_custom_field_type("custom_group_field_types", 'tags', elgg_echo('tags'), $group_options);
		add_custom_field_type("custom_group_field_types", 'url', elgg_echo('url'), $group_options);
		add_custom_field_type("custom_group_field_types", 'email', elgg_echo('email'), $group_options);
		add_custom_field_type("custom_group_field_types", 'calendar', elgg_echo('calendar'), $group_options);
		add_custom_field_type("custom_group_field_types", 'datepicker', elgg_echo('profile_manager:admin:options:datepicker'), $datepicker_options);
		add_custom_field_type("custom_group_field_types", 'pulldown', elgg_echo('profile_manager:admin:options:pulldown'), $pulldown_options);
		add_custom_field_type("custom_group_field_types", 'radio', elgg_echo('profile_manager:admin:options:radio'), $radio_options);
		add_custom_field_type("custom_group_field_types", 'multiselect', elgg_echo('profile_manager:admin:options:multiselect'), $group_options);
	}
	
	/**
	 * Function to add a custom field type to a register
	 */
	function add_custom_field_type($register_name, $field_type, $field_display_name, $options){
		add_to_register($register_name, $field_type, $field_display_name, $options);
	}
	
	/**
	 * Hook to replace the profile fields
	 * 
	 * @param $hook_name
	 * @param $entity_type
	 * @param $return_value
	 * @param $parameters
	 * @return unknown_type
	 */
	function profile_manager_profile_override($hook_name, $entity_type, $return_value, $parameters){
		global $CONFIG;

		// Get all the custom profile fields
		$options = array(
				"type" => "object",
				"subtype" => CUSTOM_PROFILE_FIELDS_PROFILE_SUBTYPE,
				"limit" => 0,
				"owner_guid" => $CONFIG->site_guid
			);

		$entities = elgg_get_entities($options);
	    
		if($entities ){
			$result = array();
			
		    // Make new result
		    foreach($entities as $entity){
		    	if($entity->admin_only != "yes" || isadminloggedin()){

		    		$result[$entity->metadata_name] = $entity->metadata_type;
		    		
		    		// should it be handled as tags? TODO: is this still needed? Yes it is, it handles presentation of these fields in listing mode
		    		if(get_context() == "search" && ($entity->output_as_tags == "yes" || $entity->metadata_type == "multiselect")){
		    			$result[$entity->metadata_name] = "tags";
		    		}	    		
		    	}
	    		
		    	add_translation(get_current_language(), array("profile:" . $entity->metadata_name => $entity->getTitle()));
		    }
			
			if(count($result)>0){
				$result["custom_profile_type"] = "non_editable";
			}
		}
		
		return $result;
	}
	
	/**
	 * function to replace group profile fields
	 * 
	 * @param $hook_name
	 * @param $entity_type
	 * @param $return_value
	 * @param $parameters
	 * @return unknown_type
	 */
	function profile_manager_group_override($hook_name, $entity_type, $return_value, $parameters){
		global $CONFIG;
		$result = $return_value;
		
		// Get all custom group fields
		$options = array(
				"type" => "object",
				"subtype" => CUSTOM_PROFILE_FIELDS_GROUP_SUBTYPE,
				"limit" => 0,
				"owner_guid" => $CONFIG->site_guid
			);
		
		$group_fields = elgg_get_entities($options);
		
		if($group_fields){
			$result = array();
			$ordered = array();
			
			// Order the group fields and filter some types out
			foreach($group_fields as $group_field){
				if($group_field->admin_only != "yes" || isadminloggedin()){
					$ordered[$group_field->order] = $group_field;
				}				
			}
			ksort($ordered);
			
			// build the correct list
			$result["name"] = "text";
			foreach($ordered as $group_field){
				$result[$group_field->metadata_name] = $group_field->metadata_type;
			}
		}
		
		return $result;
	}
	
	/**
	 * function to check if custom fields on register have been filled (if required)
	 * 
	 * @param $hook_name
	 * @param $entity_type
	 * @param $return_value
	 * @param $parameters
	 * @return unknown_type
	 */
	function profile_manager_register_precheck($hook_name, $entity_type, $return_value, $parameters){
		// validate mandatory profile fields
		$options = array(
				"type" => "object",
				"subtype" => CUSTOM_PROFILE_FIELDS_PROFILE_SUBTYPE,
				"limit" => 0,
				"owner_guid" => $CONFIG->site_guid,
				"metadata_name_value_pairs" => array(
							array("name" => "show_on_register", "value" =>  "yes"),
							array("name" => "mandatory", "value" =>  "yes")
							)
			);
		
		$entities = elgg_get_entities_from_metadata($options);
		$profile_icon = get_plugin_setting("profile_icon_on_register");
		
		if($entities || $profile_icon == "yes"){
		    
		    $custom_profile_fields = array();
		    
		    foreach($_POST as $key => $value){
		    	if(strpos($key, "custom_profile_fields_") == 0){
		    		$key = substr($key, 22);
		    		$custom_profile_fields[$key] = $value;
		    	}
		    }
		    
		    $_SESSION["custom_profile_fields"] = $custom_profile_fields;
		    
		    foreach($entities as $entity){
		    	if($entity->admin_only != "yes"){
			    	$passed_value = $custom_profile_fields[$entity->metadata_name];
			    	
					if(empty($passed_value)){
						register_error(sprintf(elgg_echo("profile_manager:register_pre_check:missing"), $entity->getTitle()));
						forward_precheck_error($custom_profile_fields);					
					}
		    	}
		    }
		    
		    if($profile_icon == "yes"){
		    	$profile_icon = $_FILES["profile_icon"];
		    	
		    	$error = false;
		    	if(empty($profile_icon["name"])){
			    	register_error(sprintf(elgg_echo("profile_manager:register_pre_check:missing"), "profile_icon"));
			    	$error = true;
		    	} elseif($profile_icon["error"] != 0){
		    		register_error(elgg_echo("profile_manager:register_pre_check:profile_icon:error"));
		    		$error = true;
		    	} elseif(!in_array(strtolower(substr($profile_icon["name"], -3)), array("jpg","png","gif"))){
		    		register_error(elgg_echo("profile_manager:register_pre_check:profile_icon:nosupportedimage"));
		    		$error = true;
		    	}	
		    		   
		    	if($error){
		    		forward_precheck_error($custom_profile_fields);
		    	}
		    }
		}
	}
	
	/**
	 * function to forward back to registerpage on custom profile error
	 * 
	 * @param $custom_profile_fields
	 * @return unknown_type
	 */
	function forward_precheck_error($custom_profile_fields){
		$username = get_input('username');
		$email = get_input('email');
		$name = get_input('name');
		$friend_guid = (int) get_input('friend_guid',0);
		
		$qs = explode('?',$_SERVER['HTTP_REFERER']);
		$qs = $qs[0];
		$qs .= "?u=" . urlencode($username) . "&e=" . urlencode($email) . "&n=" . urlencode($name) . "&friend_guid=" . $friend_guid;
				
		forward($qs . $qspost);
	}
	
	/**
	 * function to add custom profile fields to user on register
	 * 
	 * @param $event
	 * @param $object_type
	 * @param $object
	 * @return unknown_type
	 */
	function profile_manager_create_user($event, $object_type, $object){
		global $CONFIG;
		
		$custom_profile_fields = array();
		
		// retrieve all field that were on the register page
		foreach($_POST as $key=>$value){
	    	if(strpos($key, "custom_profile_fields_") == 0){
	    		$key = substr($key,22);
	    		$custom_profile_fields[$key] = $value;
	    	}
	    }
	    
		if(count($custom_profile_fields) > 0 ){
			foreach($custom_profile_fields as $shortname => $value){
				$options = array(
						"type" => "object",
						"subtype" => CUSTOM_PROFILE_FIELDS_PROFILE_SUBTYPE,
						"limit" => 0,
						"owner_guid" => $CONFIG->site_guid,
						"metadata_name_value_pairs" => array("name" => "show_on_register", "value" =>  "yes")
					);
				
				$configured_fields = elgg_get_entities_from_metadata($options);
				
				// determine if $value should be an array
				if(!is_array($value) && !empty($configured_fields)){
					// only do something if it not is already an array
					foreach($configured_fields as $configured_field){
						if($configured_field->metadata_name == $shortname){
							if($configured_field->metadata_type == "tags" || $configured_field->output_as_tags == "yes"){
								$value = string_to_tag_array($value);
								// no need to continue this foreach
								break;
							}
						}
					}
				}
				
				// use create_metadata to listen to ACCESS_DEFAULT
				if (is_array($value)) {
					$i = 0;
					foreach($value as $interval) {
						$i++;
						if ($i == 1) { $multiple = false; } else { $multiple = true; }
						create_metadata($object->guid, $shortname, $interval, 'text', $object->guid, ACCESS_DEFAULT, $multiple);
					}
				} else {
					create_metadata($object->guid, $shortname, $value, 'text', $object->guid, ACCESS_DEFAULT);
				}
			}
		}
		
		if($profile_icon = $_FILES["profile_icon"]){
			add_profile_icon($object);
		}
	}
	
	function profile_manager_all_object_event($event, $object_type, $object){
		
		if($object instanceof ElggObject && $object->getSubtype() == CUSTOM_PROFILE_FIELDS_PROFILE_SUBTYPE){
			$count = elgg_get_entities_from_metadata(array(
					"type" => "object",
					"subtype" => CUSTOM_PROFILE_FIELDS_PROFILE_SUBTYPE,
					"count" => true,
					"metadata_name_value_pairs" => array("name" => "metadata_name", "value" => "description", "operand" => "=", "case_sensitive" => TRUE)
				)); 
			if(!empty($count)){
			   	// used for showing description in profile box (profile/userdetails)
				set_plugin_setting('user_defined_fields', false, 'profile');
			} else {
				set_plugin_setting('user_defined_fields', true, 'profile');
			}
		}
	}
	
	function profileupdate_user_event($event, $object_type, $user){
		
		if($user instanceof ElggUser){
			$accesslevel = get_input('accesslevel');
			if (!is_array($accesslevel)) {
				$accesslevel = array();
			}
			
			$options = array(
					"type" => "object",
					"subtype" => CUSTOM_PROFILE_FIELDS_PROFILE_SUBTYPE,
					"limit" => false,
					"metadata_name_value_pairs" => array("name" => "metadata_type", "value" =>  "pm_file")
				);
			
			if($configured_fields = elgg_get_entities_from_metadata($options)){
				foreach($configured_fields as $field){
					// check for uploaded files
					$metadata_name = $field->metadata_name;
					$current_file_guid = $user->$metadata_name;
					
					if (isset($accesslevel[$metadata_name])) {
						$access_id = (int) $accesslevel[$metadata_name];
					} else {
						// this should never be executed since the access level should always be set
						$access_id = ACCESS_PRIVATE;
					}
					
					if (isset($_FILES[$metadata_name]) && $_FILES[$metadata_name]['error'] == 0) {
						// uploaded file exists so, save it to an ElggFile object
						// use current_file_guid to overwrite previously uploaded files
						$filehandler = new ElggFile($current_file_guid);
						$filehandler->owner_guid = $user->getGUID();
						$filehandler->container_guid = $user->getGUID();
						$filehandler->subtype = "file";
						$filehandler->access_id = $access_id;
						$filehandler->title = $field->getTitle();
						
						$filehandler->setFilename("profile_manager/" .  $_FILES[$metadata_name]["name"]);
						$filehandler->setMimeType($_FILES[$metadata_name]["type"]);
						
						$filehandler->open("write");
						$filehandler->write(get_uploaded_file($metadata_name));
						$filehandler->close();
						
						if($filehandler->save()){
							$filehandler->profile_manager_metadata_name = $metadata_name; // used to retrieve user file when deleting
							$filehandler->originalfilename = $_FILES[$metadata_name]["name"];
						
							create_metadata($user->guid, $metadata_name, $filehandler->getGUID(), 'text', $user->guid, $access_id);
						}
					} else {
						// if file not uploaded should it be deleted???
						if(empty($current_file_guid)){
							// find the previously uploaded file and if exists... delete it
							
							$options = array(
								"type" => "object",
								"subtype" => "file",
								"owner_guid" => $user->getGUID(),
								"limit" => 1,
								"metadata_name_value_pairs" => array("name" => "profile_manager_metadata_name", "value" =>  $metadata_name)
							);
							
							if($files = elgg_get_entities_from_metadata($options)){
								$file = $files[0];
								$file->delete();
							}
							
														
						} else {
							if($file = get_entity($current_file_guid)){
								// maybe we need to update the access id
								$file->access_id = $access_id;
								$file->save();								
							}
						}
					}
				}
			}
			
		}
	}
	
	
	/**
	 * function to upload a profile icon on register of a user
	 * 
	 * @param $user
	 * @return unknown_type
	 */
	function add_profile_icon($user){
		$topbar = get_resized_image_from_uploaded_file('profile_icon',16,16, true);
		$tiny = get_resized_image_from_uploaded_file('profile_icon',25,25, true);
		$small = get_resized_image_from_uploaded_file('profile_icon',40,40, true);
		$medium = get_resized_image_from_uploaded_file('profile_icon',100,100, true);
		$large = get_resized_image_from_uploaded_file('profile_icon',200,200);
		$master = get_resized_image_from_uploaded_file('profile_icon',550,550);
		
		
		$prefix = $user->guid;
		$cur_version = get_version();
		if($cur_version < 2010071002){
			$prefix = $user->name;
		}
		
		if ($small !== false
			&& $medium !== false
			&& $large !== false
			&& $tiny !== false) {
		
			$filehandler = new ElggFile();
			$filehandler->owner_guid = $user->getGUID();
			$filehandler->setFilename("profile/" . $prefix . "large.jpg");
			$filehandler->open("write");
			$filehandler->write($large);
			$filehandler->close();
			$filehandler->setFilename("profile/" . $prefix . "medium.jpg");
			$filehandler->open("write");
			$filehandler->write($medium);
			$filehandler->close();
			$filehandler->setFilename("profile/" . $prefix . "small.jpg");
			$filehandler->open("write");
			$filehandler->write($small);
			$filehandler->close();
			$filehandler->setFilename("profile/" . $prefix . "tiny.jpg");
			$filehandler->open("write");
			$filehandler->write($tiny);
			$filehandler->close();
			$filehandler->setFilename("profile/" . $prefix . "topbar.jpg");
			$filehandler->open("write");
			$filehandler->write($topbar);
			$filehandler->close();
			$filehandler->setFilename("profile/" . $prefix . "master.jpg");
			$filehandler->open("write");
            $filehandler->write($master);
			$filehandler->close();
			
			$user->icontime = time();
		}
	}
	
	/**
	 * returns an array containing the categories and the fields ordered by category and field order
	 */ 
	function profile_manager_get_categorized_fields($user = null, $edit = false, $register = false){
		global $CONFIG;
		
		$result = array();
		$profile_type = null;
		
		if($register == true){
			// failsafe for edit
			$edit = true;
		}
		
		if(!empty($user) && $user instanceof ElggUser){
			$profile_type_guid = $user->custom_profile_type;
			
			if(!empty($profile_type_guid)){
				$profile_type = get_entity($profile_type_guid);
				
				// check if profile type is a REAL profile type
				if(!empty($profile_type) && $profile_type instanceof ProfileManagerCustomProfileType){
					if($profile_type->getSubtype() != CUSTOM_PROFILE_FIELDS_PROFILE_TYPE_SUBTYPE){
						$profile_type = null;
					}
				}
			}
		}
		
		$result["categories"] = array();
		$result["categories"][0] = array();
		$result["fields"] = array();
		$ordered_cats = array();
		
		$options = array(
				"type" => "object",
				"subtype" => CUSTOM_PROFILE_FIELDS_CATEGORY_SUBTYPE,
				"limit" => 0,
				"owner_guid" => $CONFIG->site_guid
			); 
			
		$cats = elgg_get_entities($options);
		
		// get ordered categories
		if($cats){
			foreach($cats as $cat){
				$ordered_cats[$cat->order] = $cat;
			}
			ksort($ordered_cats);
		}
		
		// get filtered categories			
		$filtered_ordered_cats = array();
		// default category at index 0
		$filtered_ordered_cats[0] = array();
		
		if(!empty($ordered_cats)){
			foreach($ordered_cats as $key => $cat){
				
				if(!$edit){

					$options = array(
							"type" => "object",
							"subtype" => CUSTOM_PROFILE_FIELDS_PROFILE_TYPE_SUBTYPE,
							"count" => true,
							"owner_guid" => $CONFIG->site_guid,
							"relationship" => CUSTOM_PROFILE_FIELDS_PROFILE_TYPE_CATEGORY_RELATIONSHIP,
							"relationship_guid" => $cat->guid,
							"inverse_relationship" => true
						); 
					
					$rel_count = elgg_get_entities_from_relationship($options);
					
					if($rel_count == 0){
						$filtered_ordered_cats[$cat->guid] = array();
						$result["categories"][$cat->guid] = $cat;
					} elseif(!empty($profile_type) && check_entity_relationship($profile_type->guid, CUSTOM_PROFILE_FIELDS_PROFILE_TYPE_CATEGORY_RELATIONSHIP, $cat->guid)){
						$filtered_ordered_cats[$cat->guid] = array();
						$result["categories"][$cat->guid] = $cat;
					}
				} else {
					$filtered_ordered_cats[$cat->guid] = array();
					$result["categories"][$cat->guid] = $cat;
				}
			}
		}
		
		$options = array(
				"type" => "object",
				"subtype" => CUSTOM_PROFILE_FIELDS_PROFILE_SUBTYPE,
				"limit" => 0,
				"owner_guid" => $CONFIG->site_guid
			); 
			
		$fields = elgg_get_entities($options);
		
		// adding fields to categories
		if($fields){
			foreach($fields as $field){
				if(!($cat_guid = $field->category_guid)){
					$cat_guid = 0; // 0 is default
				}
				$admin_only = $field->admin_only;
				if($admin_only != "yes" || isadminloggedin()){
					if($edit){
						if(!$register || $field->show_on_register == "yes"){
							$filtered_ordered_cats[$cat_guid][$field->order] = $field;
						}
					} else {
						// only add if value exists
						$metadata_name = $field->metadata_name;

						if(!empty($user->$metadata_name) || $user->$metadata_name === 0){
							$filtered_ordered_cats[$cat_guid][$field->order] = $field;
						}
					}
				}
			}
		}
		
		// sorting fields and filtering empty categories
		foreach($filtered_ordered_cats as $cat_guid => $fields){
			if(!empty($fields)){
				ksort($fields);
				$result["fields"][$cat_guid] = $fields;
			} else {
				unset($result["categories"][$cat_guid]);
			} 
		}
		
		// optionally add the system fields for admins
		if(isadminloggedin() && (get_plugin_setting("display_system_category", "profile_manager") == "yes") && !$edit && !$register){
			$result["categories"][-1] = "";
			$result["fields"][-1] = array();
			
			$system_fields = array(
					"guid" => "text",
					"owner_guid" => "text",
					"container_guid" => "text",
					
					"time_created" => "pm_datepicker",
					"time_updated" => "pm_datepicker",
					"last_action" => "pm_datepicker",
					"prev_last_login" => "pm_datepicker",
			 		"last_login" => "pm_datepicker",
					
					"username" => "text",
					"email" => "text",
					"language" => "text"
					
				);
			
			foreach($system_fields as $metadata_name => $metadata_type){
				$system_field = new ProfileManagerCustomProfileField();
				
				$system_field->metadata_name = $metadata_name;
				$system_field->metadata_type = $metadata_type;
				
				$result["fields"][-1][] = $system_field;
			}
		}

		return $result;
	}
	
	/**
	 * Function just now only ordered (name is prepped for future release)
	 */
	function profile_manager_get_categorized_group_fields($group = null){
		$result = array();
		$result["fields"] = array();
		
		// Get all custom group fields
		$options = array(
				"type" => "object",
				"subtype" => CUSTOM_PROFILE_FIELDS_GROUP_SUBTYPE,
				"limit" => 0,
				"owner_guid" => $CONFIG->site_guid
			);
			
		$fields = elgg_get_entities($options);

		if($fields){
			foreach($fields as $field){
				$admin_only = $field->admin_only;
				if($admin_only != "yes" || isadminloggedin()){
					$result["fields"][$field->order] = $field;
				}
			}
			ksort($result["fields"]);
		}
		return $result;			
	}
	
	function profile_manager_display_view_hook($hook_name, $entity_type, $return_value, $parameters){
		$view = $parameters["view"];
		
		if(($view == "output/datepicker" || $view == "input/datepicker") && !elgg_view_exists($view)){
			
			if($view == "output/datepicker"){
				$new_view = "output/pm_datepicker";
			} else {
				$new_view = "input/pm_datepicker";
			}
			 
			return elgg_view($new_view, $parameters["vars"]);
		}
	}
	
	// Initialization functions
	register_elgg_event_handler('init', 'system', 'profile_manager_init');
	register_elgg_event_handler('pagesetup', 'system', 'profile_manager_pagesetup');
	
	register_elgg_event_handler('create', 'user', 'profile_manager_create_user');
	register_elgg_event_handler('all', 'object', 'profile_manager_all_object_event');
	register_elgg_event_handler('profileupdate','user', 'profileupdate_user_event');
	
	register_plugin_hook('profile:fields', 'profile', 'profile_manager_profile_override');
	register_plugin_hook('profile:fields', 'group', 'profile_manager_group_override');
	
	register_plugin_hook('action', 'register', 'profile_manager_register_precheck');
	
	// actions
	register_action("profile_manager/new", false, $CONFIG->pluginspath . "profile_manager/actions/new.php", true);
	register_action("profile_manager/get_field_data", false, $CONFIG->pluginspath . "profile_manager/actions/get_field_data.php", true);
	register_action("profile_manager/reset", false, $CONFIG->pluginspath . "profile_manager/actions/reset.php", true);
	register_action("profile_manager/reorder", false, $CONFIG->pluginspath . "profile_manager/actions/reorder.php", true);
	register_action("profile_manager/delete", false, $CONFIG->pluginspath . "profile_manager/actions/delete.php", true);
	register_action("profile_manager/toggleOption", false, $CONFIG->pluginspath . "profile_manager/actions/toggleOption.php", true);
	register_action("profile_manager/changeCategory", false, $CONFIG->pluginspath . "profile_manager/actions/changeCategory.php", true);
	register_action("profile_manager/importFromCustom", false, $CONFIG->pluginspath . "profile_manager/actions/importFromCustom.php", true);
	register_action("profile_manager/importFromDefault", false, $CONFIG->pluginspath . "profile_manager/actions/importFromDefault.php", true);
	register_action("profile_manager/export", false, $CONFIG->pluginspath . "profile_manager/actions/export.php", true);
	register_action("profile_manager/configuration/backup", false, $CONFIG->pluginspath . "profile_manager/actions/configuration/backup.php", true);
	register_action("profile_manager/configuration/restore", false, $CONFIG->pluginspath . "profile_manager/actions/configuration/restore.php", true);
	
	register_action("profile_manager/categories/add", false, $CONFIG->pluginspath . "profile_manager/actions/categories/add.php", true);
	register_action("profile_manager/categories/reorder", false, $CONFIG->pluginspath . "profile_manager/actions/categories/reorder.php", true);
	register_action("profile_manager/categories/delete", false, $CONFIG->pluginspath . "profile_manager/actions/categories/delete.php", true);
	
	register_action("profile_manager/profile_types/add", false, $CONFIG->pluginspath . "profile_manager/actions/profile_types/add.php", true);
	register_action("profile_manager/profile_types/delete", false, $CONFIG->pluginspath . "profile_manager/actions/profile_types/delete.php", true);
	register_action("profile_manager/profile_types/get_description", false, $CONFIG->pluginspath . "profile_manager/actions/profile_types/get_description.php", true);
	
	// members
	register_action("profile_manager/members/search", true, $CONFIG->pluginspath . "profile_manager/actions/members/search.php"); // can be executed publically
		
?>
