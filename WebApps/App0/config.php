<?php
// Throw errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define db credentials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', '******');
define('DB_PASSWORD', '*******');
define('DB_NAME', 'app0_auth');

// Attempt to connect to db
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);  

// Check the connection
if ($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>