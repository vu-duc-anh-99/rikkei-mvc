<?php

class DBConnect
{

  private $conn = NULL;
  public function connect()
  {
    $username = "root";
    $password =  "123456";
    $dbname = "user_management";
    $servername = "localhost";
    try {
      $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection failed";
    }
    return $this->conn;
  }
}
