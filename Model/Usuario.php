<?php

require_once 'ConexionDB.php';
require_once 'Escritorio.php';
  
class Usuario {
  private $idUsuario;
  private $nombre;
  private $clave;
  private $administrador;
          
  function __construct($idUsuario, $nombre, $clave, $administrador) {
    $this->idUsuario = $idUsuario;
    $this->nombre = $nombre;
    $this->clave = $clave;
    
    if ($administrador) {
      $administrador = 1;

    } else {
      $administrador = 0;

    }
    
    $this->administrador = $administrador;
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
  
  public function getAdministrador() {
    return $this->administrador;
  }
  
  public function insert() {
    $conexion = ConexionDB::conectar();
    $insert = 'INSERT INTO usuario (idUsuario, nombre, clave, administrador) '
            . "VALUES ('$this->idUsuario', '$this->nombre', '$this->clave', $this->administrador)";
    
    // Inserta al nuevo usuario
    $conexion->exec($insert);
    
    // Crea su escritorio
    Escritorio::generarEscritorioById($this->idUsuario);
  }
  
  public function update($usuarioActualizado) {
    $conexion = ConexionDB::conectar();
    
    // La variable $updateOriginal la utilizo para saber si es el primer valor que se ha modificado.
    $updateOriginal = 'UPDATE usuario SET ';
    $update = $updateOriginal;
    
    if ($this->idUsuario != $usuarioActualizado->idUsuario) {
      $update .= "idUsuario = '$usuarioActualizado->idUsuario'";
    }
    
    if ($this->nombre != $usuarioActualizado->nombre) {
      if ($update != $updateOriginal) {
        $update .= ", ";
      }
      
      $update .= "nombre = '$usuarioActualizado->nombre'";
    }
    
    if ($this->clave != $usuarioActualizado->clave) {
      if ($update != $updateOriginal) {
        $update .= ", ";
      }
      
      $update .= "clave = '$usuarioActualizado->clave'";
    }
    
    if ($this->administrador != $usuarioActualizado->administrador) {
      if ($update != $updateOriginal) {
        $update .= ", ";
      }
      
      $update .= "administrador = $usuarioActualizado->administrador";
    }
    
    // Controla si ningun parametro se modifico
    if ($update != 'UPDATE usuario SET ') {
      $update .= " WHERE usuario.idUsuario = '$this->idUsuario'";
    }
    
    $conexion->exec($update);
  }
  
  public static function deleteById($idUsuario) {
    $conexion = ConexionDB::conectar();
    $delete = 'DELETE FROM usuario WHERE idUsuario="' . $idUsuario . '"';

    $conexion->exec($delete);
  }
  
  public static function getTodosUsuarios() {
    $conexion = ConexionDB::conectar();
    $sentencia = 'SELECT * FROM usuario';
    $consulta = $conexion->query($sentencia);
    
    $usuarios = [];
    while ($usuario = $consulta->fetchObject()) {
      $usuarios[] = new Usuario($usuario->idUsuario, $usuario->nombre, 
                                $usuario->clave, $usuario->administrador);
      
    }
    
    return $usuarios;
  }
  
  public static function getUsuarioByNombre($nombre) {
    $conexion = ConexionDB::conectar();
    $sentencia = 'SELECT * FROM usuario WHERE nombre="' . $nombre . '"';
    $consulta = $conexion->query($sentencia);
    $usuario = $consulta->fetchObject();
    $usuarioResultado = new Usuario($usuario->idUsuario, $usuario->nombre, $usuario->clave, $usuario->administrador);
        
    return $usuarioResultado;
  }
  
  public static function getUsuarioById($idUsuario) {
    $conexion = ConexionDB::conectar();
    $sentencia = 'SELECT * FROM usuario WHERE idUsuario="' . $idUsuario . '"';
    $consulta = $conexion->query($sentencia);
    $usuario = $consulta->fetchObject();
    $usuarioResultado = new Usuario($usuario->idUsuario, $usuario->nombre, $usuario->clave, $usuario->administrador);
        
    return $usuarioResultado;
  }
}
