<?php

session_start(); 

require_once("../Models/conexion_db.php");
require_once("../Models/actualizaciones_db.php");
require_once("../Models/autenticacion.php");

$idUsuario = $_SESSION['id'];
// $fotoUsuario = $_POST['fotoUsuario'];
$nombresUsuario = $_POST['nombresUsuario'];
$apellidosUsuario = $_POST['apellidosUsuario'];
$correoUsuario = $_POST['correoUsuario'];
$telefonoUsuario = $_POST['telefonoUsuario'];


    // CREAMOS UNA VARIABLE PARA DEFINIR LA RUTA DONDE QUEDARA ALOJADA LA IMAGEN
    $fotoUsuario = "../Uploads/Usuarios/".$_FILES['fotoUsuario']['name'];
    // MOVEMOS EL ARCHIVO A LA CARPETA UPLOADS Y LA CARPETA USUARIOS
    $mover = move_uploaded_file($_FILES['fotoUsuario']['tmp_name'], $fotoUsuario);


$objetoRegistros = new Actualizaciones();
$objetoRegistros->actualizarPerfilUsuario($idUsuario, $fotoUsuario, $nombresUsuario, $apellidosUsuario, $correoUsuario, $telefonoUsuario);

?>