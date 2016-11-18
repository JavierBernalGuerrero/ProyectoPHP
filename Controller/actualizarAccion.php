<?php
session_start();

require_once '../Model/Usuario.php';

if (isset($_SESSION['usuario'])) {
  // NO SE HA COMPROBADO
  $idIntroducido = $_POST['idUsuario'];
  $nombreIntroducido = $_POST['nombre'];
  $claveIntroducida = $_POST['clave'];
  $permisoIntroducido = $_POST['permiso'];
  
  $usuarioActualizado = Usuario::getUsuarioById($idIntroducido);
  $usuarioActualizado->update($idUsuario, $nombreIntroducido, $claveIntroducida, $permisoIntroducido);
  
  //header("Location: ../Controller/gestorContenido.php");
  
} else {
  header("Location: ../View/accesoFormulario.php");
  
}
