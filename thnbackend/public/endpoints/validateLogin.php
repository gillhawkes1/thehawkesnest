<?php 
require_once('../classes/class-user.php');
require_once('../classes/class-db.php');

// Example usage
$dbConnection = new DatabaseConnection(THN_HOST,THN_USER,THN_PASSWORD,THN_DB_NAME);
$users = new User($dbConnection);

$jsondata = file_get_contents("php://input");
$postdata = json_decode($jsondata, true);

// Add a new user
$result = $users->validateLoginAttempt($postdata['username'], $postdata['password']);
