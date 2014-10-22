<?php

		 
	 // Load Elgg engine
	 	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	 
	 // Get the current page's owner
		$page_owner = page_owner_entity();
		if ($page_owner === false || is_null($page_owner)) {
			$page_owner = $_SESSION['user'];
			set_page_owner($_SESSION['guid']);
		}
	
	// Display table
		$area2 = elgg_view_title(elgg_echo('memorama')); // set the title	
		$area2 .= elgg_view("memorama/start"); //Get the table	
		
	// Draw page
		page_draw(elgg_echo('memorama'),elgg_view_layout("two_column_left_sidebar", $area1, $area2));
	
?>