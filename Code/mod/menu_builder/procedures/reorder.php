<?php 

	/**
	 * jQuery call to reorder menu items
	 */

	if(isadminloggedin()){
		$parent_guid = (int) get_input("parent_guid", 0);
		$order = str_replace("::", ",", get_input("order"));
		
		// check if parent is valid subtype
		if(!empty($parent_guid)){
			if($parent = get_entity($parent_guid)){
				if($parent->getSubtype() != MENU_BUILDER_SUBTYPE){
					unset($parent_guid);
				}
			} else {
				unset($parent_guid);
			}
		}
		
		// reorder
		$order = string_to_tag_array($order);
		if(!empty($order) && !is_array($order)){
			$order = array($order);
		}
		
		if(!empty($order) && !is_null($parent_guid)){
			foreach($order as $index => $order_guid){
				if($item = get_entity($order_guid)){
					if(($item->getSubtype() == MENU_BUILDER_SUBTYPE)){
						if($item->parent_guid == $parent_guid){
							$item->order = $index;
							$item->save();
						}
					}
				}
			}
		}
	}
	
?>