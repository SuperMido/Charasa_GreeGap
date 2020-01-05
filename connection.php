<?php
class DB
{
    private static $instance = NULl;
    public static function getInstance() {
      if (!isset(self::$instance)) {
        try {
          $username = "root";
          $password = "";
          self::$instance = new PDO("mysql:host=localhost;dbname=charasa", $username, $password);
        } catch (PDOException $ex) {
          die($ex->getMessage());
        }
      }
      return self::$instance;
    }
}