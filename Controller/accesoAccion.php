<?php
session_start();

require_once '../Model/Usuario.php';

if (isset($_POST['nombre'])) {

  $usuario = Usuario::getUsuarioByNombre($_POST['nombre']);

  // En caso de que vengan los valores del formulario vacios, este condicionante fallaria ya que:
  // tanto en la base de datos como el campo vacio del formulario son "==", es decir, vacios.
  // Por eso utilizamos "===", porque aunque ambos son vacios, no son el mismo tipo.
  if ($usuario->getNombre() === $_POST['nombre'] && $usuario->getClave() === $_POST['clave']) {
    $_SESSION['usuario'] = serialize($usuario);
    header("Location: ../Controller/gestorContenido.php?accion=home");

  } else {
    $codigoError = "accesoDenegado";

    include '../View/accesoFormulario.php';

  }

  
} else {
  header("Location: ../View/accesoFormulario.php");
  
}
