<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('/var/www/config.php');
$sqlconn = new mysqli(THN_HOST,THN_USER,THN_PASSWORD,THN_DB_NAME);

if($sqlconn->connect_error) {
  echo 'connection failed';
  die("connection failure " . $conn->connect_error);
}

$sql = "SELECT * from links;";
$result = $sqlconn->query($sql);
if($result) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
  $sqlconn->close();
  echo json_encode($data);
} else {
  echo json_encode(['error' => 'Query failed']);
  $sqlconn->close();
}

?>