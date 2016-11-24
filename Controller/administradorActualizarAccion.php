<?php
session_start();

require_once '../Model/Usuario.php';

if (isset($_SESSION['usuario'])) {
  
  $idAntiguo = $_POST['idUsuarioAntiguo'];
  $idIntroducido = $_POST['idUsuario'];
  $nombreIntroducido = $_POST['nombre'];
  $claveIntroducida = $_POST['clave'];
  $permisoIntroducido = $_POST['permiso'];
  
  $usuarioActualizado = new Usuario($idIntroducido, $nombreIntroducido, $claveIntroducida, $permisoIntroducido);
  $usuarioAntiguo = Usuario::getUsuarioById($idAntiguo);
  
  $usuarioAntiguo->update($usuarioActualizado);
  
  header("Location: ../Controller/gestorContenido.php");
  
} else {
  header("Location: ../View/accesoFormulario.php");
  
}
