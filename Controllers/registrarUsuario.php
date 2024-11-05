<?php

require_once("../Models/conexion_db.php");
require_once("../Models/registros_db.php");

// Obtener datos de entrada 
$idUsuario = $_POST['idUsuario'];
$nombresUsuario = $_POST['nombresUsuario'];
$apellidosUsuario = $_POST['apellidosUsuario'];
$correoUsuario = $_POST['correoUsuario'];
$telefonoUsuario = $_POST['telefonoUsuario'];
$claveUsuario = $_POST['claveUsuario'];

// Comprovar si el archivo se ha cargado
if (isset($_FILES['fotoUsuario']) && $_FILES['fotoUsuario']['error'] === UPLOAD_ERR_OK) {
    // Definir el directorio de carga
    $uploadDir = "../assets/img/";
    // Crear la ruta completa para el archivo cargado
    $ruta = $uploadDir . basename($_FILES['fotoUsuario']['name']);
    
}

// Crear una instancia de la clase Registros
$objetoRegistros = new Registros();

// Validar las entradas y registrar al usuario
if ($objetoRegistros->registrarUsuario($idUsuario, $nombresUsuario, $apellidosUsuario, $correoUsuario, $telefonoUsuario, $ruta ?? null, $claveUsuario)) {
    echo "Usuario Registrado satisfactoriamente!";
} else {
    echo "Error al registrar el usuario.";
}
?>