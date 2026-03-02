// Link between my code and the MySQL server
<?php
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