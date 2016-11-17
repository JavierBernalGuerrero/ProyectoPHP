<?php
session_start();

require_once '../Model/Usuario.php';

if (isset($_SESSION['usuario'])) {
  
  $usuario = Usuario::getUsuarioByNombre($_SESSION['usuario']);
  
  if ($usuario->getAdministrador()) {
    $data['usuarios'] = Usuario::getTodosUsuarios();
    include '../View/escritorioAdmin.php';
  
  } else {
    include '../View/escritorioUsuario.php';

  }
  
} else {
  header("Location: ../View/accesoFormulario.php");
  
}