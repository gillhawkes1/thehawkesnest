<?php 
require_once('class-db.php');
$_SERVER['SERVER_ADDR'] === '127.0.0.1' ? include('../../config/config.php') : include('/var/www/config.php');

class User {
  private $db;

  public function __construct(DatabaseConnection $db) {
      $this->db = $db;
  }

  public function addUser($username, $pass_hash, $salt, $email, $fname, $lname) {
      $connection = $this->db->connect();

      $sql = "INSERT INTO users (username, hashed_password, salt, email, fname, lname) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $connection->prepare($sql);

      $stmt->bind_param("ssssss", $username, $pass_hash, $salt, $email, $fname, $lname);
      $result = $stmt->execute();

      $stmt->close();
      $this->db->closeConnection();

      return $result;
  }

  public function validateLoginAttempt($username, $enteredPassword) {
    try {
      $connection = $this->db->connect();

      $sql = "SELECT hashed_password, salt FROM users WHERE username = ?";
      $stmt = $connection->prepare($sql);
      $stmt->bind_param('s', $username);
      $result = $stmt->execute();
      if($result) {
        $stmt->store_result();
        if($stmt->num_rows > 0) {
          $stmt->bind_result($dbHashedPassword, $dbSalt);
          $stmt->fetch();
          $stmt->close();
  
          if($dbHashedPassword && $dbSalt) {
            $enteredPasswordVerified = password_verify($enteredPassword . $dbSalt, $dbHashedPassword);
  
            if ($enteredPasswordVerified) {
              echo json_encode(['success'=> true, 'message'=> 'You will now be redirected to your homepage.']);
              return true;
            } else {
              echo json_encode(['success'=> false, 'message'=> 'Invalid password.']);
              return false;
            }
          }
        } else {
          echo json_encode(['success'=> false, 'message'=> 'Username not found.']);
          return false;
        }
      }
    } catch (\Throwable $th) {
      echo json_encode(['success'=> false, 'message'=> 'An error occurred: '. $th->getMessage()]);
    }
  }

}