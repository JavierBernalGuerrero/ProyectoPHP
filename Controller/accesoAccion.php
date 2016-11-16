<?php
require_once '../Model/Manejador.php';

$usuario = Manejador::getUsuarioByNombre($_POST['nombre']);

// En caso de que vengan los valores del formulario vacios, este condicionante fallaria ya que:
// tanto en la base de datos como el campo vacio del formulario son "==", es decir, vacios.
// Por eso utilizamos "===", porque aunque ambos son vacios, no son el mismo tipo.
if (isset($_POST['nombre']) && $usuario->getNombre() === $_POST['nombre']
                            && $usuario->getClave() === $_POST['clave']) {
  $data['usuarios'] = Manejador::getTodosUsuarios();
  include '../View/muestraTodo.php';
  
} else {
  $codigoError = "accesoDenegado";
//  header("Location: ../View/accesoFormulario.php?codigoError=accesoDenegado");
  // Al realizar el include, no se llega cargar el formulario. Sospecho que son las rutas.
  include '../View/accesoFormulario.php';

}
