<?php 
require_once('class-db.php');
include('/var/www/config.php');

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
}



?>