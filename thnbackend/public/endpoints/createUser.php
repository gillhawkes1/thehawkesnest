<?php 

include './classes/class-user.php';
include './classes/class-db.php';
include('/var/www/config.php');


// Example usage
$dbConnection = new Database(THN_HOST,THN_USER,THN_PASSWORD,THN_DB_NAME);
$user = new User($dbConnection);

// Example data
$newUsername = "new_user";
$newEmail = "new_user@example.com";
$newPassword = password_hash("password123", PASSWORD_DEFAULT);

// Add a new user
$result = $user->addUser($newUsername, $newEmail, $newPassword);

if ($result) {
  echo "User added successfully!";
} else {
  echo "Error adding user.";
}

?>