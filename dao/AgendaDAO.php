<?php

// namespace DAO;
// namespace Database;
require_once('../database/connect.php');

class AgendaDAO extends DbConnection
{
  private int $user_id;

  public function __construct()
  {
    $this->user_id = $_SESSION['user']['id'];
  }

  public function create($name, $phone)
  {
    $id = null;
    $db = $this->getConnection();


    // if ($db === null) return false;

    $upper_name = strtoupper($name);

    $stmt = $db->prepare("INSERT INTO agenda VALUES (:id, :userid, :name, :phone)");
    $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
    $stmt->bindParam(":userid", $this->user_id, \PDO::PARAM_INT);
    $stmt->bindParam(":name", $upper_name, \PDO::PARAM_STR);
    $stmt->bindParam(":phone", $phone, \PDO::PARAM_STR);
    $stmt->execute();
    return $db->lastInsertId();
  }

  public function update($id, $name, $phone)
  {
    $db = $this->getConnection();

    $upper_name = strtoupper($name);

    $stmt = $db->prepare("UPDATE agenda SET name = :name, phone = :phone WHERE id = :id");
    $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
    $stmt->bindParam(":name", $upper_name, \PDO::PARAM_STR);
    $stmt->bindParam(":phone", $phone, \PDO::PARAM_STR);
    $stmt->execute();
    return $db->lastInsertId();
  }

  public function getAll()
  {
    $db = $this->getConnection();

    $stmt = $db->prepare("SELECT * FROM agenda WHERE user_id = :user_id");
    $stmt->bindParam(":user_id", $this->user_id, \PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $data;
  }

  public function find($key, $value)
  {
    $db = $this->getConnection();
    $value = '%' . $value . '%';

    $stmt = $db->prepare("SELECT * FROM agenda WHERE user_id = :user_id AND $key like :value");
    $stmt->bindParam(":user_id", $this->user_id, \PDO::PARAM_INT);
    $stmt->bindParam(":value", $value, \PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $data;
  }

  public function findById($id)
  {
    $db = $this->getConnection();

    $stmt = $db->prepare("SELECT * FROM agenda WHERE user_id = :user_id AND id = :id");
    $stmt->bindParam(":user_id", $this->user_id, \PDO::PARAM_INT);
    $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $data;
  }

  public function findByName($name)
  {
    $db = $this->getConnection();

    $stmt = $db->prepare("SELECT * FROM agenda WHERE name = :name");
    $stmt->bindParam(":name", $name, \PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $data;
  }

  public function delete($id)
  {
    $db = $this->getConnection();

    $stmt = $db->prepare("DELETE FROM agenda WHERE id = :id");
    $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
  }
}
