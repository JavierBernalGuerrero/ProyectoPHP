<?php
session_start();

require_once '../Model/Usuario.php';
require_once '../Model/Escritorio.php';
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
  
  } else {
    $data['escritorio'] = Escritorio::getEscritorioByIdUsuario($data['usuarioLogueado']->getIdUsuario());
    
    if ($_GET['accion'] == "home") {
      echo $twig->render('homeEscritorio.html.twig', $data);
      
    } else if ($_GET['accion'] == "editar") {
      echo $twig->render('escritorioUsuarioEditarFormulario.html.twig', $data);
      
    } else if ($_GET['accion'] == "galeria") {
      echo $twig->render('escritorioUsuarioGaleria.html.twig', $data);
      
    }

  }
  
} else {
  header("Location: ../View/accesoFormulario.php");
  
}