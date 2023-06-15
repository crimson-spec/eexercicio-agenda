<?php

// namespace DAO;
// namespace Database;
require_once('../database/connect.php');

class UserDAO extends DbConnection
{
  public function create($fullname, $username, $password)
  {
    $id = null;
    $db = $this->getConnection();

    $hash_pass = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $db->prepare("INSERT INTO users VALUES (:id, :fullname, :username, :hashpass)");
    $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
    $stmt->bindParam(":fullname", $fullname, \PDO::PARAM_STR);
    $stmt->bindParam(":username", $username, \PDO::PARAM_STR);
    $stmt->bindParam(":hashpass", $hash_pass, \PDO::PARAM_STR);
    $stmt->execute();
    return $db->lastInsertId();
  }

  public function findByUsername($username)
  {
    $db = $this->getConnection();

    $stmt = $db->prepare("SELECT * FROM users WHERE username LIKE :username");
    $stmt->bindParam(":username", $username, \PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $data;
  }
}
