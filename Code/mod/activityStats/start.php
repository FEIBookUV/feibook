<?php
global $CONFIG;
function activity_stats_page_handler($page) {
    global $CONFIG;    
    if ($page[0] == 'pages' && $page[1] == 'export') {
        include($CONFIG->pluginspath . "activityStats/pages/export.php");
    } else if ($page[0]=='ajax'){
        include($CONFIG->pluginspath . "activityStats/views/default/activityStats/ajax/getData.php");
    }else {
        include($CONFIG->pluginspath . "activityStats/page_render.php");
    }
}

function activity_stats_pagesetup(){
    global $CONFIG;
    if (get_context() == 'admin' && isadminloggedin()) {
        add_submenu_item('Activity stats', $CONFIG->url . 'pg/activityStats');
    }
}

function activity_stats_init() {
    register_page_handler('activityStats', 'activity_stats_page_handler');
    register_elgg_event_handler('pagesetup', 'system', 'activity_stats_pagesetup');
}

//init function
register_elgg_event_handler('init', 'system', 'activity_stats_init');
?>