<?php

// We'll be outputting a CSV
header("Content-Type: text/plain; charset: UTF-8");

// It will be called export.csv
//header('Content-Disposition: attachment; filename="export.csv"');

$mode = $_GET['mode'];
$type = $_GET['type'];
if ($type == 0) {
    header('Content-Disposition: attachment; filename="export_' . $mode . '_individual.csv"');
} else if ($type == 1) {
    header('Content-Disposition: attachment; filename="export_' . $mode . '_friend.csv"');
}

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

$sql = "select subject_guid, count(*) as freq, eue.name, eue.username ,eue.guid " .
            "from elgg_river as er inner join elgg_users_entity as eue " .
            "where er.subject_guid = eue.guid AND " .
            "er.posted > " . $fromDate . " " .
            "group by subject_guid " .
            "having freq>2 " .
            "order by freq desc";
//echo $sql;
    $items = get_data($sql);

if ($type == 0) {
    
    if (!empty($items)) {
        $num_rows = count($items);
    } else {
        $num_rows = 0;
    }
    echo "\"username\",\"displayname\",\"freq\"" . PHP_EOL;
    foreach ($items as $item) {
        echo "\"" . $item->username . "\",\"" . $item->name . "\",\"" . $item->freq . "\"" . PHP_EOL;
    }

    exit();
} else if ($type == 1) {
    //$users_sql = "SELECT * FROM elgg_users_entity";
    //$users_entities = get_data($users_sql);

    $user_friend_activity_array = array();
    
    $counter = 0;
    foreach ($items as $user_entity) {

        $friend_activity_sql = "select sum(freqs) as summation from (" .
                "select count(*) as freqs " .
                "from elgg_river as er " .
                "where er.subject_guid IN " .
                "( " .
                "SELECT guid_two " .
                "FROM elgg_entity_relationships " .
                "WHERE (relationship='friend' AND  guid_one=" . $user_entity->guid . ") " .
                ") AND er.posted > " . $fromDate . " " .
                "group by er.subject_guid " .
                ") AS Table1";

        $user_friend_activity = get_data($friend_activity_sql);
        if (isset($user_friend_activity[0]->summation)) {
            array_push($user_friend_activity_array, array($user_entity->name, $user_entity->username, $user_friend_activity[0]->summation));
        } else {
            array_push($user_friend_activity_array, array($user_entity->name, $user_entity->username, 0));
        }
        unset($user_friend_activity);
        
        $counter++;
        if ($counter>111) break;
    }

    function comparing_function($a, $b) {
        if (isset($a[2]) && isset($b[2])) {
            return ($a[2] >= $b[2]) ? -1 : 1;
        }else
            return 0;
    }

    usort($user_friend_activity_array, "comparing_function");
    echo "\"username\",\"displayname\",\"freq\"" . PHP_EOL;
    foreach ($user_friend_activity_array as $item) {
        echo "\"" . $item[0] . "\",\"" . $item[1] . "\",\"" . $item[2] . "\"" . PHP_EOL;
    }

    exit();
}
?>
