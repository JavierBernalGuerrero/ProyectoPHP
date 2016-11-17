<?php
require_once '../Model/Usuario.php';

$idIntroducido = $_POST['idUsuario'];
$nombreIntroducido = $_POST['nombre'];
$claveIntroducido = $_POST['clave'];
$permisoIntroducido = $_POST['permisoAdmin'];

$nuevoUsuario = new Usuario($idIntroducido, $nombreIntroducido, $claveIntroducido, $permisoIntroducido);
$nuevoUsuario->insert();

header("Location: ../Controller/mostrarContenidoPrincipal.php");

