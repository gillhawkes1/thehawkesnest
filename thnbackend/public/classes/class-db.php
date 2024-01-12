<?php

class DatabaseConnection
{
  private $host;
  private $username;
  private $password;
  private $database;
  private $conn;

  public function __construct($host, $username, $password, $database)
  {
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->database = $database;
  }

  public function connect()
  {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }

    return $this->conn;
  }

  public function closeConnection()
  {
    if ($this->conn) {
      $this->conn->close();
    }
  }
}


?>