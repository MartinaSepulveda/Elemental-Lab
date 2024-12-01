<?php

session_start(); 

require_once("../Models/conexion_db.php");
require_once("../Models/actualizaciones_db.php");
require_once("../Models/autenticacion.php");

$objetoRegistros = new Actualizaciones();

// Verificar si es un usuario o una veterinaria basado en el campo presente en el formulario
if (isset($_POST['claveUsuario'])) {
    // Proceso para usuario
    $claveUsuario = md5($_POST['claveUsuario']);
    $idUsuario = $_SESSION['id'];

    $objetoRegistros->actualizarClaveUsuario($claveUsuario, $idUsuario);

} elseif (isset($_POST['claveVeterinaria'])) {
    // Proceso para veterinaria
    $claveVeterinaria = md5($_POST['claveVeterinaria']);
    $nitVeterinaria = $_SESSION['id']; // Este dato debe venir desde el formulario

    $objetoRegistros->actualizarClaveVeterinaria($claveVeterinaria, $nitVeterinaria);

} else {
    // Manejo de error: ningún campo válido encontrado
    die("Error: No se recibió una contraseña válida.");
}

?>
