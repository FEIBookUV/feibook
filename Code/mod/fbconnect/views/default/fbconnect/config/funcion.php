<?php
//llamar al codigo para conectar ala BD
require_once('dbconfig.php');

class User {
	//función para revisar si el usuario existe o no
    function checkUser($uid, $oauth_provider, $username, $lastname, $email, $work, $location) 
	{
        $query = mysql_query("SELECT * FROM `users` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'") or die(mysql_error());      
	$result = mysql_fetch_array($query);
        if (!empty($result)) {//sí usuario existe entonces actualiza sus datos
	$query = mysql_query("UPDATE `users` SET username='$username', lastname='$lastname', email='$email', work='$work', location='$location' WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'") or die(mysql_error()); 
	$query = mysql_query("SELECT * FROM `users` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'");
	$result = mysql_fetch_array($query);
            # USUARIO EXISTENTE
        } else {//sí el usuario no existe entonces inserta al nuevo usuario
            #NUEVO USUARIO
            $query = mysql_query("INSERT INTO `users` (oauth_provider, oauth_uid, username, lastname, email, work, location) VALUES ('$oauth_provider', $uid, '$username', '$lastname', '$email', '$work', '$location')") or die(mysql_error());
            $query = mysql_query("SELECT * FROM `users` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'");
            $result = mysql_fetch_array($query);
            return $result;
        } 
	
        return $result;
    }
    

}

?>
