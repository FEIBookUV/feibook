<?php

	function facebook_inside_init() 
	{
		extend_view('css', 'facebook/css');
		
		register_page_handler('facebook_inside','facebook_inside_page_handler');
	}


	function facebook_inside_page_handler($page) 
	{
		
		if ($page[0])
		{
			switch ($page[0])
			{
				case "facebook":
					include(dirname(__FILE__) . "/facebook.php");
					break;
				default: 
					break;
			}
		}
	}

	register_elgg_event_handler('init','system','facebook_inside_plugin_init');
?>