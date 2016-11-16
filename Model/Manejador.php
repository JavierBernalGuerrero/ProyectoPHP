<?php

require_once 'ConexionDB.php';
  
class Manejador {
  private $idUsuario;
  private $nombre;
  private $clave;
  
  function __construct($idUsuario, $nombre, $clave) {
    $this->idUsuario = $idUsuario;
    $this->nombre = $nombre;
    $this->clave = $clave;
  }
  
  public function getIdUsuario() {
    return $this->idUsuario;
  }
  
  public function getNombre() {
    return $this->nombre;
  }
  
  public function getClave() {
    return $this->clave;
  }
  
  public function insert() {
    $conexion = ConexionDB::conectar();
    $insert = 'INSERT INTO usuario (idUsuario, nombre, clave) '
            . 'VALUES (' . $this->idUsuario . ', ' . $this->nombre . ', ' . $this->clave . ')';
  
    $conexion->exec($insert);
  }
  
  public function delete() {
    $conexion = ConexionDB::conectar();
    $delete = 'DELETE FROM usuario WHERE idUsuario="' . $this->idUsuario . '"';
    
    $conexion->exec($delete);
  }
  
  // FALTA -> EL UPDATE Y OTRAS CONSULTAS
  public static function getTodosUsuarios() {
    $conexion = ConexionDB::conectar();
    $sentencia = 'SELECT * FROM usuario';
    $consulta = $conexion->query($sentencia);
    
    $usuarios = [];
    while ($usuario = $consulta->fetchObject()) {
      $usuarios[] = new Manejador($usuario->idUsuario, $usuario->nombre, $usuario->clave);
      
    }
    
    return $usuarios;
  }
  
  public static function getUsuarioByNombre ($nombre) {
    $conexion = ConexionDB::conectar();
    $sentencia = 'SELECT * FROM usuario WHERE nombre="' . $nombre.'"';
    $consulta = $conexion->query($sentencia);
    $usuario = $consulta->fetchObject();
    $usuarioResultado = new Manejador($usuario->idUsuario, $usuario->nombre, $usuario->clave);
        
    return $usuarioResultado;
  }
}
