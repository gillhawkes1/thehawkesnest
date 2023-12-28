<?php
include_once('config.php');
$sqlconn = new mysqli($THN_HOST,$THN_USER,$THN_PASSWORD,$THN_DB_NAME);

if($sqlconn->connect_error) {
  die("connection failure " . $conn->connect_error);
}
echo "connected to db";
$sqlconn->close();
?>