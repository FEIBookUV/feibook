<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'fbconnect');
define('DB_PASSWORD', 'S49J36cn');
define('DB_DATABASE', 'registro');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
mysql_query ("SET NAMES 'utf8'");
?>
