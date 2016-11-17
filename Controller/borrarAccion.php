<?php
session_start();

require_once '../Model/Usuario.php';

if (isset($_SESSION['usuario'])) {
  // SEGUIR
  $idIntroducido = $_POST['idUsuario'];
  Usuario::deleteById($idIntroducido);
  
  header("Location: ../Controller/gestorContenido.php");
  
} else {
  header("Location: ../View/accesoFormulario.php");
  
}
