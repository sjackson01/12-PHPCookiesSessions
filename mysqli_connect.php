<?php # Script 16.1- mysqli_oop_connect.php
// This file contains the databse access information. 
// This file also establishes a connection to MySQL,
// selects the databse, and sets the encoding. 
// The MySQL interactions use OOP!

// Set the database access information
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'tiger');
DEFINE('DB_HOST', 'mysql:3306');
DEFINe('DB_NAME', 'sitename');

// Make connection
$mysqli = new MySQLi(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Verify the connection 
if($mysqli->connect_error) {
    echo $mysqli->connect_error;
}else{ // Establish encoding. 
    $mysqli->set_charset('utf8');
}

/*
// Use print are to debug objects in PHP code 
echo '<pre>' . print_r($mysqli, 1) . '</pre>';


mysqli Object
(
    [affected_rows] => 0
    [client_info] => mysqlnd 5.0.12-dev - 20150407 - $Id: 3591daad22de08524295e1bd073aceeff11e6579 $
    [client_version] => 50012
    [connect_errno] => 0
    [connect_error] => 
    [errno] => 0
    [error] => 
    [error_list] => Array
        (
        )

    [field_count] => 0
    [host_info] => mysql:3306 via TCP/IP
    [info] => 
    [insert_id] => 0
    [server_info] => 8.0.19
    [server_version] => 80019
    [stat] => Uptime: 44227  Threads: 2  Questions: 76  Slow queries: 0  Opens: 164  Flush tables: 3  Open tables: 84  Queries per second avg: 0.001
    [sqlstate] => 00000
    [protocol_version] => 10
    [thread_id] => 27
    [warning_count] => 1
)
*/ 