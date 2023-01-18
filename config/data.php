<?php
    // Base 1
    $host = "localhost";
    $user1 = 'grupo1';
    $password1 = 'grupo1';
    $db_name1 = 'grupo1e3';
    // Base 2
    $user2 = 'grupo2';
    $password2 = 'grupo2';
    $db_name2 = 'grupo2e3';
    $con = pg_connect("host=$host dbname=$db_name1 user=$user1 password=$password1");
    
    if (!$con) {
        die('Connection failed.');
     }
    
?>