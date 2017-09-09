<?php
require_once 'config.php';
/**
 * Connect to database
 * @param $dbUserName
 * @param $dbPassword
 * @param $dbName
 * @param $dbHost
 * @throws Exception Cannot connect
 * @return mysqli
 */
function dbConnect($dbUserName, $dbPassword, $dbName, $dbHost){
    $db = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName);
    if($db->connect_errno){
        throw new Exception('Cannot connect to the database');
    }
    return $db;
}
