<?php
session_start();

require_once '../Model/Usuario.php';

if (isset($_SESSION['usuario'])) {
  $idIntroducido = $_POST['idUsuario'];
  $nombreIntroducido = $_POST['nombre'];
  $claveIntroducido = $_POST['clave'];
  $permisoIntroducido = $_POST['permisoAdmin'];

  $nuevoUsuario = new Usuario($idIntroducido, $nombreIntroducido, $claveIntroducido, $permisoIntroducido);
  $nuevoUsuario->insert();

  header("Location: gestorContenido.php");

} else {
  header("Location: ../View/accesoFormulario.php");
  
}