<?php
    $host = 'localhost';
    $user = 'jacob';
    $password = 'jacob';
    $database = 'assignment1';

    // create a new mysqli object
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        die('Failed to connect to MySQL: ' . $mysqli->connect_error);
    }
    
?>