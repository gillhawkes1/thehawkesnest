<?php 

require_once('../classes/class-user.php');
require_once('../classes/class-db.php');

$jsondata = file_get_contents("php://input");
$postdata = json_decode($jsondata, true);

//connect and add user
$dbConnection = new DatabaseConnection(THN_HOST,THN_USER,THN_PASSWORD,THN_DB_NAME);
$user = new User($dbConnection);
$salt = bin2hex(random_bytes(16));
$newuser = $user->addUser($postdata['username'], $salt, password_hash($salt . $postdata['password'], PASSWORD_BCRYPT), $postdata['email'], $postdata['fname'], $postdata['lname']);

//return message
if($newuser) {
  echo json_encode(['status'=> 'success', 'message'=> 'User added successfully. The page will now refresh and you may login.']);
} else {
  echo json_encode(['status'=> 'error','message'=> 'Error occurred, please try again.']);
}

?>