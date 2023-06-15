<?php

// namespace Database;

abstract class DbConnection
{
  public function getConnection()
  {
    // try {
    //   $connection = new \PDO(
    //     "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
    //     DB_USER,
    //     DB_PASS
    //   );

    //   return $connection;
    // } catch (PDOException $exception) {
    //   print_r($exception->getMessage());
    //   return null;
    // }

    $connection = new \PDO(
      "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
      DB_USER,
      DB_PASS
    );

    return $connection;
  }
}
