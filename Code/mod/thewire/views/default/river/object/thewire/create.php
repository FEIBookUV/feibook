<?php

	$performed_by = get_entity($vars['item']->subject_guid);
	$object = get_entity($vars['item']->object_guid);
	$url = $object->getURL();

	$string = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}:</a> ";
	$desc .= $object->description;
	$desc = preg_replace('/\@([A-Za-z0-9\_\.\-]*)/i','@<a href="' . $vars['url'] . 'pg/thewire/owner/$1">$1</a>',$desc);
	$string .= parse_urls($desc);

	$string .= " <span class=\"river_item_time\"><a href=\"{$vars['url']}pg/thewire/reply/{$object->getOwnerEntity()->username}\" class=\"reply\">" . elgg_echo('thewire:reply') . "</a></span>";
?>

<?php 
	echo $string; 
?>