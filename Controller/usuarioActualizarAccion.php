<?php
session_start();

require_once '../Model/Usuario.php';
require_once '../Model/Escritorio.php';

if (isset($_SESSION['usuario'])) {
  // 1º Recogemos algunos valores del usuario actual.
  $usuarioActual = unserialize($_SESSION['usuario']);
  $idUsuarioActual = $usuarioActual->getidUsuario();
  $permisoUsuarioActual = $usuarioActual->getAdministrador();
  
  // 2º Recogemos todos los datos del escritorio actual de la base de datos.
  $escritorioAntiguo = Escritorio::getEscritorioByIdUsuario($idUsuarioActual);
          
  // 3º Preparamos los datos para la actualizacion.
  $idEscritorio = $escritorioAntiguo->getIdEscritorio();
  $nombreIntroducido = $_POST['nombre'];
  $claveIntroducida = $_POST['clave'];
  $tituloIntroducido = $_POST['titulo'];
  $descripcionIntroducida = $_POST['descripcion'];
  $idImagen = $_POST['idImagen'];
  $nombreImagen = $_FILES["imagen"]["name"];
  
  // 4º Imagenes
  move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/images/" . $nombreImagen);
  
  
  // 5º Actualizamos el usuario y la sesion.
  $usuarioActualizado = new Usuario($idUsuarioActual, $nombreIntroducido, 
                                      $claveIntroducida, $permisoUsuarioActual);
  $usuarioActual->update($usuarioActualizado);
  
  $_SESSION['usuario'] = serialize($usuarioActualizado);
  
  // 6º Actualizamos el escritorio.
  $escritorioActualizado = new Escritorio($idEscritorio, $tituloIntroducido, 
                                            $descripcionIntroducida, $idUsuarioActual);
  $escritorioAntiguo->update($escritorioActualizado);
  $escritorioAntiguo->updateImagen($idImagen, $nombreImagen);
  
  header("Location: ../Controller/gestorContenido.php?accion=home");
  
} else {
  header("Location: ../View/accesoFormulario.php");
  
}
