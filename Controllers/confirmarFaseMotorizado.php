<?php
// Inicia la sesión para verificar si el usuario es motorizado
session_start();

include('../Models/autenticacion.php');  // Incluir el archivo de autenticación
verificarSesion();  // Verificar que esté logueado
verificarRol(2);    // Verificar que tenga el rol adecuado

require_once("../Models/conexion_db.php");
require_once("../Models/registros_db.php");  
require_once("../Models/actualizaciones_db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el ID de la solicitud
    $idSolicitud = $_POST['idSolicitud'];

    // Crear una instancia del modelo
    $solicitudesModel = new Actualizaciones();

    // Llamar al método para confirmar la solicitud del motorizado
    $confirmacionExitosa = $solicitudesModel->confirmarFaseMotorizado($idSolicitud);

    if ($confirmacionExitosa) {
        echo "<script>alert('Has confirmado la solicitud como Realizada'); window.location.href='../Views/motorizado-solicitudes.php';</script>";
    } else {
        echo "<script>alert('El veterinario aún no ha marcado esta solicitud'); window.location.href='../Views/motorizado-solicitudes.php';</script>";
    }
}
?>

