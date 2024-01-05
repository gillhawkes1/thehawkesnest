<?php 

class User {
  public $id;
  public $fname;
  public $lname;
  private $username;
  private $email;
  private $password;

  public function __construct($username, $password, $newUser=false, $id=null, $fname=null, $lname=null, $email=null) {
    if($newUser === false) {
      $this->attemptLogin($username, $password);
    } else {
      $this->validateUsername($username);
      $this->validatePassword($password);
    }
  }

  protected function attemptLogin($username, $password) {

    return password_verify($password, $this->password);
  }

  protected function validateUsername($username) {
    $this->username = $username;

  }

  protected function validatePassword($password) {
    $this->password = $password;
    $this->id = $id;
    $this->fname = $fname;
    $this->lname = $lname;
    $this->email = $email;
    $this->createUser();
    return true;
  }

  private function createUser() {
    //add all constructor params to db record
  }
  
}

?>