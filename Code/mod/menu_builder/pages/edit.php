<?php 

	global $CONFIG;

	$guid = get_input("guid");
	
	if(isadminloggedin() &&	$_SESSION["menu_builder_edit_mode"]){

		if($guid && $menu_item = get_entity($guid)){
			$title = $menu_item->title;
			$url = $menu_item->url;
			$parent_guid = $menu_item->parent_guid;
			$access_id = $menu_item->access_id;
		} else {
			$guid = "";
			
			$parent_guid = get_input("parent_guid");
			
			if($parent_guid && ($parent = get_entity($parent_guid))){
				$access_id = $parent->access_id;
			} else {
				$access_id = ACCESS_LOGGED_IN;
			}
			
		}
		
		$form_body = "";
		$form_body .= elgg_view("input/hidden", array("internalname" => "guid", "value" => $guid));
		$form_body .= "<table><tr><td>";
		$form_body .= elgg_echo("menu_builder:add:form:title");
		$form_body .= "</td><td>";
		$form_body .= elgg_view("input/text", array("internalname" => "title", "value" => $title));
		$form_body .= "</td></tr><tr><td>";
		$form_body .= elgg_echo("menu_builder:add:form:url");
		$form_body .= "</td><td>";
		$form_body .= elgg_view("input/url", array("internalname" => "url", "value" => $url));
		$form_body .= "</td></tr></table>";
		
		if($main_items = menu_builder_get_toplevel_menu_items()){
			
			if(!empty($guid)){
				unset($main_items[$guid]);
			}
			
			if(!empty($main_items)){
			
				$form_body .= "<div>";
				$form_body .= elgg_echo("menu_builder:add:form:parent") . "<br />";
				$form_body .= elgg_view("input/pulldown", array("internalname" => "parent_guid", "value" => $parent_guid, "options_values" => array("0" => elgg_echo("menu_builder:add:form:parent:toplevel")) + $main_items));
				$form_body .= "</div>";
			}	
		}
					
		$form_body .= "<div>";
		$form_body .= elgg_echo("menu_builder:add:form:access") . "<br />";
		$form_body .= elgg_view("input/access", array("internalname" => "access_id", "value" => $access_id, "options" => array(ACCESS_PUBLIC => elgg_echo("PUBLIC"), ACCESS_LOGGED_IN => elgg_echo("LOGGED_IN"), ACCESS_PRIVATE => elgg_echo("menu_builder:add:access:admin_only"))));
		$form_body .= "</div>";
		$form_body .= elgg_view("input/submit", array("value" => elgg_echo("save")));
		if(!empty($guid)){
			$delete_js = "onclick='if(confirm(\"" . elgg_echo("question:areyousure") . "\")){ menu_builder_menu_item_delete(); }'";
			
			$form_body .= " ";
			$form_body .= elgg_view("input/button", array("type" => "button","value" => elgg_echo("delete"), "js" => $delete_js));
		}
		
		$form = elgg_view("input/form", array("action" => $CONFIG->wwwroot . "action/menu_builder/edit", "body" => $form_body, "internalid" => "menu_builder_add_form"));
			
	?>
	<h3 class="settings"><?php echo elgg_echo("menu_builder:add:title"); ?></h3>
		<?php 
		echo $form; 
		
		?>
		<script type="text/javascript">
			
			<?php if(empty($guid)){?>		

			var url_path = window.location.pathname;
			url_path = "[wwwroot]" + url_path.substr(1).replace("<?php echo get_loggedin_user()->username;?>", "[username]")<?php if(page_owner_entity()){ ?>.replace("<?php echo page_owner_entity()->username; ?>", "[username]")<?php } ?>;
		
			$("#menu_builder_add_form input[name='title']").val(window_title).focus();
			$("#menu_builder_add_form input[name='url']").val(url_path);
			
			<?php } else { ?>

			function menu_builder_menu_item_delete(){
				$("#menu_builder_add_form").attr("action", "<?php echo $CONFIG->wwwroot; ?>action/menu_builder/delete").submit();
			}

			<?php } ?>
		</script>
		<?php 
	} else {
		exit();
	}
?>