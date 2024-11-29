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
        $idSolicitud = $_POST['idSolicitud'];
        $fase = $_POST['fase'];
    
        $solicitudesModel = new Actualizaciones();
        $resultado = $solicitudesModel->confirmarFaseMotorizado($idSolicitud, $fase);
    
        switch ($resultado) {
            case "actualizado":
                echo "<script>alert('Haz confirmado la solicitud exitosamente.'); window.location.href='../Views/motorizado-solicitudes.php';</script>";
                break;
            case "inconsistencia":
                echo "<script>alert('Las respuestas no coinciden. Comuníquese con la veterinaria para resolver la inconsistencia.'); window.location.href='../Views/motorizado-solicitudes.php';</script>";
                break;
            case "pendiente":
                echo "<script>alert('Haz confirmado la solicitud. Esperando confirmación de la veterinaria.'); window.location.href='../Views/motorizado-solicitudes.php';</script>";
                break;
            default:
                echo "<script>alert('Hubo un error. Inténtelo nuevamente.'); window.location.href='../Views/motorizado-solicitudes.php';</script>";
        }
    }
    
?>

