<?php
require_once '../Model/Usuario.php';

$usuario = Usuario::getUsuarioByNombre($_POST['nombre']);

// En caso de que vengan los valores del formulario vacios, este condicionante fallaria ya que:
// tanto en la base de datos como el campo vacio del formulario son "==", es decir, vacios.
// Por eso utilizamos "===", porque aunque ambos son vacios, no son el mismo tipo.
if (isset($_POST['nombre']) && $usuario->getNombre() === $_POST['nombre']
                            && $usuario->getClave() === $_POST['clave']) {
  if ($usuario->getAdministrador()) {
    $data['usuarios'] = Usuario::getTodosUsuarios();
    include '../View/muestraTodo.php';
    
  } else {
    include '../View/muestraEscritorio.php';
    
  }
  
} else {
  $codigoError = "accesoDenegado";
  
  include '../View/accesoFormulario.php';

}
