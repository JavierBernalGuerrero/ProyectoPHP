<?php

abstract class ConexionDB {
  private static $server = 'localhost';
  private static $db = 'proyecto';
  private static $user = 'root';
  private static $password = 'root';
  
  public static function conectar() {
    try {
      
      $conexion = new PDO("mysql:host=" . self::$server . ";dbname=" . self::$db
              . ";charset=utf8", self::$user, self::$password);
      
    } catch (PDOException $e) {
      echo "<br>No se ha podido establecer conexión con el servidor de bases de datos.<br>";
      echo ("Error: " . $e->getMessage());
    }
      
    return $conexion;
  }
}
