<?php 
	$edit_mode = false;

	if(isadminloggedin() &&	$_SESSION["menu_builder_edit_mode"]){
		$edit_mode = true;
	}
	$menu_items = menu_builder_get_menu_items();
?>
<div id="menu_builder_menu">

	<ul id="menu_builder_menu_0">
		<?php
		 
		if(!empty($menu_items)){
			
			$selected = array();
			
			foreach($menu_items as $main_item){
				$selected[$main_item["menu_item"]->getGUID()] = menu_builder_menu_item_is_selected($main_item["menu_item"]);
			
				if(!empty($main_item["children"])){
					foreach($main_item["children"] as $sub_item){
						$selected[$sub_item["menu_item"]->getGUID()] = menu_builder_menu_item_is_selected($sub_item["menu_item"]);
					}
				}
			}
			
			arsort($selected);
			
			$i = 0;
			
			foreach($selected as $guid => $key){
				if($key != 0){
					
					if($key != 100){
						break;
					}
					$i++;
				} else {
					break;
				}
			}
			
			if(!empty($i)){
				$selected = array_slice($selected, 0, $i, true);
			} else {
				unset($selected);
			}
			
			foreach($menu_items as $main_item){
				$child_menu_selected = false;
				$child_menu = "";
				
				if(!empty($main_item["children"]) || $edit_mode){
					$child_menu .= "<ul id='menu_builder_menu_" . $main_item["menu_item"]->guid . "'>";
					
					if(!empty($main_item["children"])){
						foreach($main_item["children"] as $sub_item){
							
							if(!empty($selected[$sub_item["menu_item"]->getGUID()])){
								$sub_selected = " menu_builder_menu_selected";
								$child_menu_selected = true;
							} else {
								$sub_selected = "";
							}
							
							$child_menu .= "<li id='" . $sub_item["menu_item"]->guid . "' class='menu_builder_menu_sub" . $sub_selected . "'>";
							
							if($edit_mode){
								$child_menu .= "<a class='menu_builder_menu_edit' href='" . $vars["url"] . "pg/menu_builder/edit/" . $sub_item["menu_item"]->guid  . "'><span class='menu_builder_action menu_builder_action_edit'></span></a>";
							}
							
							$child_menu .= "<a href='" . $sub_item["menu_item"]->getURL() . "'>" . $sub_item["menu_item"]->title . "</a>";
							
							$child_menu .= "</li>";
						}
					}
					
					if($edit_mode){
						$child_menu .= "<li class='menu_builder_menu_add' title='" . elgg_echo("menu_builder:edit_mode:add") . "'>";
						$child_menu .= "<a href='" .$vars["url"] . "pg/menu_builder/edit?parent_guid=" . $main_item["menu_item"]->guid . "'><span class='menu_builder_action menu_builder_action_add'></span></a>";
						$child_menu .= "</li>";
					}
					$child_menu .= "</ul>";
				}
				
				
				if(menu_builder_menu_item_is_selected($main_item["menu_item"]) || $child_menu_selected){
					$main_selected = " menu_builder_menu_selected";
				} else {
					$main_selected = "";
				}
				
				$menu .= "<li id='" . $main_item["menu_item"]->guid . "' class='menu_builder_menu_main" . $main_selected . "'>";
				
				if($edit_mode){
					$menu .= "<a class='menu_builder_menu_edit' href='" . $vars["url"] . "pg/menu_builder/edit/" . $main_item["menu_item"]->guid  . "'><span class='menu_builder_action menu_builder_action_edit'></span></a>";
				}
								
				$menu .= "<a href='" . $main_item["menu_item"]->getURL() . "'>" . $main_item["menu_item"]->title . "</a>";
				
				$menu .= $child_menu;
				
				$menu .= "</li>";
			}
		}
		
		echo $menu;
		
		?>
		
		<?php if($edit_mode){?>
		<li class="menu_builder_menu_add" title="<?php echo elgg_echo("menu_builder:edit_mode:add");?>">
			<a href="<?php echo $vars["url"];?>pg/menu_builder/edit">
				<span class="menu_builder_action menu_builder_action_add"></span>	
			</a>
		</li>
		<?php } ?>		
	</ul>
	<?php if($edit_mode){?>
		<a id="menu_builder_edit_mode" href="?menu_builder_edit_mode=off"><?php echo elgg_echo("menu_builder:edit_mode:off"); ?></a>
	<?php } elseif(isadminloggedin()) {?>
		<a id="menu_builder_edit_mode" href="?menu_builder_edit_mode=on"><?php echo elgg_echo("menu_builder:edit_mode:on"); ?></a>
	<?php } ?>
	<div class="clearfloat"></div>
</div>
<script type="text/javascript">
var window_title = "<?php echo $vars["title"]; ?>";

$(function() {
	$("#menu_builder_menu ul").elgg_topbardropdownmenu();
	<?php if($edit_mode){ ?>
	$("#menu_builder_menu>ul").sortable({
		revert: true,
		placeholder: "menu_builder_menu_main_placeholder",
		items: "li.menu_builder_menu_main",
		handle: ">a",
		forcePlaceholderSize: true,
		opacity: 0.8,
		update: function(event, ui) {
			menu_builder_reorder_menu(this);
		}
	});

	$("#menu_builder_menu>ul ul").sortable({
		items: "li.menu_builder_menu_sub",
		placeholder: "menu_builder_menu_sub_placeholder",
		forcePlaceholderSize: true,
		opacity: 0.8,
		tolerance: "pointer",
		update: function(event, ui) {
			menu_builder_reorder_menu(this);
		}
	});

	$("#menu_builder_menu li.menu_builder_menu_add a, #menu_builder_menu a.menu_builder_menu_edit").fancybox({
		hideOnContentClick: false,
		frameWidth: 400,
		frameHeight: 260,
		enableEscapeButton: true			
	});

	function menu_builder_reorder_menu(menu){
		var parent_guid = $(menu).attr("id").replace("menu_builder_menu_", "");
		var order = $(menu).find(">li").makeDelimitedList("id");

		$.post("<?php echo $vars["url"];?>pg/menu_builder/reorder", {parent_guid: parent_guid, order: order});
	}
	
	<?php } ?>
});
</script>