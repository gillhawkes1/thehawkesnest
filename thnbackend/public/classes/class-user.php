<?php 
require_once('class-db.php');
include('/var/www/config.php');

class User {
  private $db;

  public function __construct(Database $db) {
      $this->db = $db;
  }

  public function addUser($username, $email, $password) {
      $connection = $this->db->connect();

      // Perform the user insertion query
      $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
      $stmt = $connection->prepare($sql);

      // Bind parameters
      $stmt->bind_param("sss", $username, $email, $password);

      // Execute the query
      $result = $stmt->execute();

      // Close the statement and connection when done
      $stmt->close();
      $this->db->closeConnection();

      return $result;
  }
}




?>