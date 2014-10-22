<?php
		function estudiante_init() 
		{
		global $CONFIG;
		add_menu(elgg_echo('Ahorcado FEI'), $CONFIG->wwwroot . "mod/estudiante");
		}
		
	register_elgg_event_handler('init','system','estudiante_init');

?>
