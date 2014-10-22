<?php


 
    function FEIBook_Theme_init()
    {
			extend_view('metatags','FEIBook_Theme/metatags');
    }
 
    register_elgg_event_handler('init','system','FEIBook_Theme_init');
 
?>
