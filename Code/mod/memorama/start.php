<?php
		function memorama_init() 
		{
		global $CONFIG;
		add_menu(elgg_echo('FEIMorama'), $CONFIG->wwwroot . "mod/memorama");
		}
		
	register_elgg_event_handler('init','system','memorama_init');

?>
