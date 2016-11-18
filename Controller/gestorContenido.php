<?php
session_start();

require_once '../Model/Usuario.php';
require_once 'Twig/lib/Twig/Autoloader.php';

if (isset($_SESSION['usuario'])) {
  
  Twig_Autoloader::register();
  $loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
  $twig = new Twig_Environment($loader);
  
  $usuario = unserialize($_SESSION['usuario']);
  // Le pasamos el usuario logueado.
  $data['usuarioLogueado'] = $usuario;
  
  if ($usuario->getAdministrador()) {
    $data['usuarios'] = Usuario::getTodosUsuarios();
    echo $twig->render('escritorioAdmin.html.twig', $data);
//    include '../View/escritorioAdmin.php';
  
  } else {
    echo $twig->render('escritorioUsuario.html.twig', $data);
//    include '../View/escritorioUsuario.php';

  }
  
} else {
  header("Location: ../View/accesoFormulario.php");
  
}