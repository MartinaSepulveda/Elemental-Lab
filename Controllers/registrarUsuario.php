<?php

require_once("../Models/conexion_db.php");
require_once("../Models/registros_db.php");

// Obtener datos de entrada 
$idUsuario = $_POST['idUsuario'];
$nombresUsuario = $_POST['nombresUsuario'];
$apellidosUsuario = $_POST['apellidosUsuario'];
$correoUsuario = $_POST['correoUsuario'];
$telefonoUsuario = $_POST['telefonoUsuario'];
$idRolUsuario = $_POST['idRolUsuario'];
$claveUsuario = md5($_POST['claveUsuario']);

    // CREAMOS UNA VARIABLE PARA DEFINIR LA RUTA DONDE QUEDARA ALOJADA LA IMAGEN
    $ruta = "../Uploads/Usuarios/".$_FILES['fotoUsuario']['name'];
    // MOVEMOS EL ARCHIVO A LA CARPETA UPLOADS Y LA CARPETA USUARIOS
    $mover = move_uploaded_file($_FILES['fotoUsuario']['tmp_name'], $ruta);

// Crear una instancia de la clase Registros
$objetoRegistros = new Registros();
$nuevoUsuario = $objetoRegistros -> registrarUsuario($idUsuario, $nombresUsuario, $apellidosUsuario, $correoUsuario, $telefonoUsuario, $idRolUsuario, $ruta ?? null, $claveUsuario);

// Validar las entradas y registrar al usuario
// if ($objetoRegistros->registrarUsuario($idUsuario, $nombresUsuario, $apellidosUsuario, $correoUsuario, $telefonoUsuario, $ruta ?? null, $claveUsuario)) {
//     echo "User registered successfully!";
// } else {
//     echo "Error registering user.";
// }
?>