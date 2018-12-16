<?php

    $host = "localhost" ; // Host name
    $username = "jgerrity"; // Mysql username
    $password = "jgerrity"; // Mysql password
    $db_name = "dyn_com"; // Database name

    // Connect to server and select database.
    $sql = new MySQLI($host, $username, $password)
        or die("Cannot connect to server.");
    $sql->select_db($db_name)
        or die("Cannot connect to database.");

?>
