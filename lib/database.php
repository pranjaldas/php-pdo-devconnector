<?php
/**
 * iTech Empires Tutorial Script : PHP Login Registration system with PDO Connection
 *
 * File: Database Configuration
 */
// database Connection variables
define('HOST', 'localhost'); // Database host name ex. localhost
define('USER', 'root'); // Database user. ex. root ( if your on local server)
define('PASSWORD', ''); // user password  (if password is not set for user then keep it empty )
define('DATABASE', 'devconnector'); // Database Database name

function DB()
{
    try {
        $db = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);
    
        return $db;
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage();
        die();
    }
}

?>