<?php

	include_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

	$title = elgg_echo('Muro Facebook');
	$area2 = elgg_view_title($title);
	$area2 .= elgg_view('facebook/facebook');
	

	$body = elgg_view_layout("two_column_left_sidebar", $area1, $area2);

	page_draw($title, $body);
?>
