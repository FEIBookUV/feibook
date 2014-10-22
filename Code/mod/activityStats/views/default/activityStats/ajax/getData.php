<?php

global $CONFIG;
header('Content-type: application/json');
$mode = $_GET['mode'];
$type = $_GET['type'];


$now = time();
$fromDate = 0;
switch ($mode) {
    case 'week':
        $fromDate = $now - (24 * 60 * 60 * 7);
        break;
    case 'month':
        $fromDate = $now - (24 * 60 * 60 * 30);
        break;
    default:
        $fromDate = 0;
}

if ($type == 0) {//individual activity

    $sql = "select subject_guid,count(*) as freq,eue.name " .
            "from elgg_river as er inner join elgg_users_entity as eue " .
            "where er.subject_guid = eue.guid AND " .
            "er.posted > " . $fromDate . " " .
            "group by subject_guid " .
            "having freq > 4 " .
            "order by freq desc";

    $items = get_data($sql);
    if (!empty($items)) {
        $num_rows = count($items);
    } else {
        $num_rows = 0;
    }
    $out = "{\"total_results\": " . $num_rows . "\n";
    
    //$out .= "fromDate:".$fromDate;
    
    echo $num_of_rows;
    if ($num_rows > 0) {
        $out.= ",    \"labels\": [";
        foreach ($items as $item) {
            $out.= "\"" . $item->name . "\",";
        }
        $out = substr($out, 0, -1); //remove trailing comma 
        $out.="],\n";
        $out.="\"freq\":[";
        foreach ($items as $item) {
            $out.= "" . $item->freq . ",";
        }
        $out = substr($out, 0, -1); //remove trailing comma 
        $out.="]\n";
        $out.="}";
    } else {
        $out = substr($out, 0, -1); //remove trailing comma 
        $out.="\n}";
    }
    echo $out;
    
    
} else if ($type == 1) {//summation of friends activity   

    $sql = "SELECT user.name, user.username, counter, u1 FROM " .
            " ( SELECT rel.guid_one AS u1, SUM(1) AS counter FROM elgg_entity_relationships AS rel " .
            " LEFT JOIN elgg_river AS river ON ( rel.guid_two = river.subject_guid ) " .
            " WHERE (rel.relationship = 'friend') AND (river.posted > " . $fromDate . ") " .
            " GROUP BY u1 " .
            " ORDER BY counter DESC " .
            " ) AS table1 " .
            " LEFT JOIN elgg_users_entity AS user ON (u1 = user.guid) ";

    $user_friend_activity_array = array();
    $user_friend_activity_array = get_data($sql);

    //print_r($user_friend_activity_array);
    // - - - - - - OUT as JSON

    if (!empty($user_friend_activity_array)) {
        $num_rows = count($user_friend_activity_array);
    } else {
        $num_rows = 0;
    }
    $out = "{\"total_results\": " . $num_rows . "\n";

    //echo $num_of_rows;
    if ($num_rows > 0) {

        $out.= ",    \"labels\": [";
        foreach ($user_friend_activity_array as $item) {
            $out.= "\"" . $item->name . "\",";
        }

        $out = substr($out, 0, -1); //remove trailing comma 
        $out.="],\n";
        $out.="\"freq\":[";
        foreach ($user_friend_activity_array as $item) {
            $out.= "" . $item->counter . ",";
        }
        $out = substr($out, 0, -1); //remove trailing comma 
        $out.="]\n";
        $out.="}";
    } else {
        $out = substr($out, 0, -1); //remove trailing comma 
        $out.="\n}";
    }
    echo $out;
} else
    echo 'invalid type';
?>