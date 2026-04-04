<?php

/* Database credentials for Aiven MySQL */
$DB_SERVER   = 'mysql-26385193-personalproject.d.aivencloud.com';
$DB_USERNAME = 'avnadmin';
$DB_PASSWORD = 'AVNS_vimyxWGk84pMCXPvGcU';
$DB_NAME     = 'defaultdb';
$DB_PORT     = '28320';

/* Attempt to connect to MySQL database */
$link = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $DB_PORT);

// Check connection
if($link === false){
    die("ERROR: Could not connect to Aiven MySQL. " . mysqli_connect_error());
}

?>
