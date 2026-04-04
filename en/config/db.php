<?php

@define('DBSERVER', 'mysql-26385193-personalproject.d.aivencloud.com');
@define('DBUSERNAME', 'avnadmin');
@define('DBPASSWORD', 'AVNS_vimyxWGk84pMCXPvGcU');
@define('DBNAME', 'defaultdb');
@define('DBPORT', '28320');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME, DBPORT);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect to Aiven MySQL. " . mysqli_connect_error());
}


date_default_timezone_set("Africa/Lagos");



//EMAIL CONFIGURATION

$host = "karamelhub.com.ng";

$mail_username = "mail@karamelhub.com.ng";

$mail_password = "@@mailpass##";

 

?>

