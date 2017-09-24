<?php
require_once 'config.php';
/**
 * Connect to database
 * @param $dbUserName
 * @param $dbPassword
 * @param $dbName
 * @param $dbHost
 * @param $dbPort
 * @return mysqli
 */
function dbConnect($dbUserName, $dbPassword, $dbName, $dbHost, $dbPort){
    $db = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName, $dbPort);
    if($db->connect_errno){
        die("Cannot connect to the database \n".
            "Error: ". $db->connect_error
        );
    }
    return $db;
}
