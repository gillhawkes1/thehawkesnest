<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('/var/www/config.php');
echo 'included config.php successfully';

$sqlconn = new mysqli(THN_HOST,THN_USER,THN_PASSWORD,THN_DB_NAME);

if($sqlconn->connect_error) {
  echo 'connection failed';
  die("connection failure " . $conn->connect_error);
}
echo "connected to db";
$sqlconn->close();
?> 