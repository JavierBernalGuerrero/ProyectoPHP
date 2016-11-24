<?php

require_once 'ConexionDB.php';
  
class Escritorio {
  private $idEscritorio;
  private $titulo;
  private $descripcion;
  private $imagen01;
  private $imagen02;
  private $imagen03;
  private $imagen04;
  private $imagen05;
  private $imagen06;
  private $idUsuario;

  function __construct($idEscritorio, $titulo, $descripcion, $idUsuario,
                            $imagen01, $imagen02, $imagen03, $imagen04, $imagen05, $imagen06) {
    $this->idEscritorio = $idEscritorio;
    $this->titulo = $titulo;
    $this->descripcion = $descripcion;
    $this->idUsuario = $idUsuario;
    $this->imagen01 = $imagen01;
    $this->imagen02 = $imagen02;
    $this->imagen03 = $imagen03;
    $this->imagen04 = $imagen04;
    $this->imagen05 = $imagen05;
    $this->imagen06 = $imagen06;
  }
  
  function getIdEscritorio() {
    return $this->idEscritorio;
  }

  function getTitulo() {
    return $this->titulo;
  }

  function getDescripcion() {
    return $this->descripcion;
  }

  function getIdUsuario() {
    return $this->idUsuario;
  }
  
  function getImagen01() {
    return $this->imagen01;
  }

  function getImagen02() {
    return $this->imagen02;
  }

  function getImagen03() {
    return $this->imagen03;
  }

  function getImagen04() {
    return $this->imagen04;
  }

  function getImagen05() {
    return $this->imagen05;
  }

  function getImagen06() {
    return $this->imagen06;
  }
  
  public static function generarEscritorioById($idUsuario) {
    $conexion = ConexionDB::conectar();
    $insert = 'INSERT INTO escritorio (idEscritorio, descripcion, idUsuario) '
            . "VALUES ('$idUsuario', '','$idUsuario')";
    echo $insert;
    $conexion->exec($insert);
  }

  public function insert() {
    $conexion = ConexionDB::conectar();
    $insert = 'INSERT INTO escritorio (idEscritorio, titulo, descripcion, idUsuario) '
            . "VALUES ('$this->idEscritorio', '$this->titulo', '$this->descripcion', $this->idUsuario)";

    $conexion->exec($insert);
  }
  
  public function update($escritorioActualizado) {
    $conexion = ConexionDB::conectar();
    
    // La variable $updateOriginal la utilizo para saber si es el primer valor que se ha modificado.
    $updateOriginal = 'UPDATE escritorio SET ';
    $update = $updateOriginal;
    
    if ($this->idEscritorio != $escritorioActualizado->idEscritorio) {
      $update .= "idEscritorio = '$escritorioActualizado->idEscritorio'";
    }
    
    if ($this->titulo != $escritorioActualizado->titulo) {
      if ($update != $updateOriginal) {
        $update .= ", ";
      }
      
      $update .= "titulo = '$escritorioActualizado->titulo'";
    }
    
    if ($this->descripcion != $escritorioActualizado->descripcion) {
      if ($update != $updateOriginal) {
        $update .= ", ";
      }
      
      $update .= "descripcion = '$escritorioActualizado->descripcion'";
    }
    
    if ($this->idUsuario != $escritorioActualizado->idUsuario) {
      if ($update != $updateOriginal) {
        $update .= ", ";
      }
      
      $update .= "idUsuario = '$escritorioActualizado->idUsuario'";
    }
    
    if ($update != 'UPDATE escritorio SET ') {
      $update .= " WHERE escritorio.idEscritorio = '$this->idEscritorio'";
    }
        
    $conexion->exec($update);
  }
  
  public function updateImagen($idImagen, $nombreImagen) {
    $conexion = ConexionDB::conectar();
    $update = "UPDATE escritorio SET $idImagen = '$nombreImagen'"
               . " WHERE escritorio.idEscritorio = '$this->idEscritorio'";
    
    $conexion->exec($update);
  }

    public static function getEscritorioByIdUsuario($idUsuario) {
    $conexion = ConexionDB::conectar();
    $sentencia = 'SELECT * FROM escritorio WHERE idUsuario="' . $idUsuario . '"';
    $consulta = $conexion->query($sentencia);
    $escritorio = $consulta->fetchObject();
    $escritorioResultado = new Escritorio($escritorio->idEscritorio, $escritorio->titulo, 
                                            $escritorio->descripcion, $escritorio->idUsuario,
                                            $escritorio->imagen01, $escritorio->imagen02, 
                                            $escritorio->imagen03, $escritorio->imagen04, 
                                            $escritorio->imagen05, $escritorio->imagen06);
        
    return $escritorioResultado;
  }
}
