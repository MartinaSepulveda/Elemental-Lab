<?php

session_start(); 

require_once("../Models/conexion_db.php");
require_once("../Models/actualizaciones_db.php");
require_once("../Models/autenticacion.php");

$idUsuario = $_SESSION['id'];
$fotoUsuario = $_POST['fotoUsuario'];
$nombresUsuario = $_POST['nombresUsuario'];
$apellidosUsuario = $_POST['apellidosUsuario'];
$correoUsuario = $_POST['correoUsuario'];
$telefonoUsuario = $_POST['telefonoUsuario'];


$objetoRegistros = new Actualizaciones();
$objetoRegistros->actualizarPerfilUsuario($idUsuario, $fotoUsuario, $nombresUsuario, $apellidosUsuario, $correoUsuario, $telefonoUsuario);

?>