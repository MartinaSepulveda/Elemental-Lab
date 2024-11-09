<?php
    // Inicia la sesión para verificar si el usuario es veterinario
    session_start();
    include('../Models/autenticacion.php');  // Incluir el archivo de autenticación
    verificarSesion();  // Verificar que esté logueado

    require_once("../Models/conexion_db.php");
    require_once("../Models/registros_db.php");  
    require_once("../Models/actualizaciones_db.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener los datos enviados
        $idSolicitud = $_POST['idSolicitud'];
        $fase = $_POST['fase']; 


        // Verificar que el valor de la fase sea válido
        if ($fase == 2 || $fase == 3) {
            // Incluir el modelo
            require_once("../Models/actualizaciones_db.php");

            // Crear una instancia del modelo
            $solicitudesModel = new Actualizaciones ();

            // Llamar al método para marcar la solicitud como realizada o no realizada
            $actualizacionExitosa = $solicitudesModel->confirmacionFaseVeterinaria($idSolicitud, $fase);

            if ($actualizacionExitosa) {
                echo "<script>alert('Haz confirmado la solicitud exitosamente'); window.location.href='../Views/veterinaria-confirmarSolicitud.php';</script>";
            } else {
                echo "<script>alert('Error al confirmar la solicitud'); window.location.href='../Views/veterinaria-confirmarSolicitud.php';</script>";
            }
        }
    }

?>
