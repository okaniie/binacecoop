<?php

@define('DB_SERVER', 'localhost');
@define('DB_USERNAME', 'smartwealthfront_user');
@define('DB_PASSWORD', 'smartwealthfront_db');
@define('DB_NAME', 'smartwealthfront_db');

 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>

