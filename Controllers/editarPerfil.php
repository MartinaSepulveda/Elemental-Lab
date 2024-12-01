<?php

session_start();

require_once("../Models/conexion_db.php");
require_once("../Models/actualizaciones_db.php");
require_once("../Models/autenticacion.php");

$objetoRegistros = new Actualizaciones();

// Verificar si la sesión tiene un ID o un NIT para determinar el tipo
if (isset($_POST['correoUsuario'])) {
    // Proceso para usuario
    $idUsuario = $_SESSION['id'];
    $nombresUsuario = $_POST['nombresUsuario'];
    $apellidosUsuario = $_POST['apellidosUsuario'];
    $correoUsuario = $_POST['correoUsuario'];
    $telefonoUsuario = $_POST['telefonoUsuario'];

    // Manejo de la foto del usuario
    $fotoUsuario = "../Uploads/Usuarios/" . $_FILES['fotoUsuario']['name'];
    $mover = move_uploaded_file($_FILES['fotoUsuario']['tmp_name'], $fotoUsuario);

    // Actualización de perfil de usuario
    $objetoRegistros->actualizarPerfilUsuario($idUsuario, $fotoUsuario, $nombresUsuario, $apellidosUsuario, $correoUsuario, $telefonoUsuario);

} elseif (isset($_POST['correoVeterinaria'])) {
    // Proceso para veterinaria
    $nitVeterinaria = $_SESSION['nit'];
    $nombreVeterinaria = $_POST['nombreVeterinaria'];
    $propietarioVeterinaria = $_POST['propietarioVeterinaria'];
    $direccionVeterinaria = $_POST['direccionVeterinaria'];
    $correoVeterinaria = $_POST['correoVeterinaria'];
    $telefonoVeterinaria = $_POST['telefonoVeterinaria'];

    // Manejo de la foto de la veterinaria
    $fotoVeterinaria = "../Uploads/Veterinaria/" . $_FILES['fotoVeterinaria']['name'];
    $mover = move_uploaded_file($_FILES['fotoVeterinaria']['tmp_name'], $fotoVeterinaria);

    // Actualización de perfil de veterinaria
    $objetoRegistros->actualizarPerfilVeterinaria($nitVeterinaria, $fotoVeterinaria, $nombreVeterinaria, $propietarioVeterinaria, $direccionVeterinaria, $correoVeterinaria, $telefonoVeterinaria);

} else {
    // Manejo de error: ningún dato válido encontrado
    die("Error: No se pudo determinar el tipo de perfil a actualizar.");
}

?>