<?php

	/**
	 * Elgg estudiante plugin
	 * This is a classic estudiante for your elgg site
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author oscar from ibantu
	 */
	 
	 // Load Elgg engine
	 	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	 
	 // Get the current page's owner
		$page_owner = page_owner_entity();
		if ($page_owner === false || is_null($page_owner)) {
			$page_owner = $_SESSION['user'];
			set_page_owner($_SESSION['guid']);
		}
	
	// Display table
		$area2 = elgg_view_title(elgg_echo('estudiante')); // set the title	
		$area2 .= elgg_view("estudiante/start"); //Get the table	
		
	// Draw page
		page_draw(elgg_echo('estudiante'),elgg_view_layout("two_column_left_sidebar", $area1, $area2));
	
?>