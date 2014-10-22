<?php

// Get the Elgg engine
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
set_context('admin');
admin_gatekeeper();

$content = elgg_view('activityStats/admin_stats');

$title = "Activity statistics";
$body = elgg_view_layout('two_column_left_sidebar', '', elgg_view_title($title) . $content);
page_draw($title, $body);
?>
