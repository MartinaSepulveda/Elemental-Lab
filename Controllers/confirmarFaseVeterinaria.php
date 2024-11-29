<?php
    // Inicia la sesión para verificar si el usuario es veterinario
    session_start();
    include('../Models/autenticacion.php');  // Incluir el archivo de autenticación
    verificarSesion();  // Verificar que esté logueado

    require_once("../Models/conexion_db.php");
    require_once("../Models/registros_db.php");  
    require_once("../Models/actualizaciones_db.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idSolicitud = $_POST['idSolicitud'];
        $fase = $_POST['fase'];
    
        $solicitudesModel = new Actualizaciones();
        $resultado = $solicitudesModel->confirmacionFaseVeterinaria($idSolicitud, $fase);
    
        switch ($resultado) {
            case "actualizado":
                echo "<script>alert('Haz confirmado la solicitud exitosamente.'); window.location.href='../Views/veterinaria-confirmarSolicitud.php';</script>";
                break;
            case "inconsistencia":
                echo "<script>alert('Las respuestas no coinciden. Comuníquese con el motorizado para resolver la inconsistencia.'); window.location.href='../Views/veterinaria-confirmarSolicitud.php';</script>";
                break;
            case "pendiente":
                echo "<script>alert('Haz confirmado la solicitud. Esperando confirmación del motorizado.'); window.location.href='../Views/veterinaria-confirmarSolicitud.php';</script>";
                break;
            default:
                echo "<script>alert('Hubo un error. Inténtelo nuevamente.'); window.location.href='../Views/veterinaria-confirmarSolicitud.php';</script>";
        }
    }
    

?>
