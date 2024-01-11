<?php 

include './classes/class-user.php';

// Example usage
$dbConnection = new Database("localhost", "username", "password", "your_database");
$users = new User($dbConnection);

// Example data
$newUsername = "new_user";
$newEmail = "new_user@example.com";
$newPassword = password_hash("password123", PASSWORD_DEFAULT);

// Add a new user
$result = $users->addUser($newUsername, $newEmail, $newPassword);

if ($result) {
  echo "User added successfully!";
} else {
  echo "Error adding user.";
}

?>