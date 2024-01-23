<?php

require_once '../classes/class-user.php';
$username = $_GET['username'];
$dbConnection = new DatabaseConnection(THN_HOST,THN_USER,THN_PASSWORD,THN_DB_NAME);
$user = new User($dbConnection);

$userdata = $user->getUserData($username);
echo json_encode($userdata);