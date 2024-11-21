<?php
    require_once("../Models/conexion_db.php");
    require_once("../Models/registros_db.php");  
    require_once("../Models/actualizaciones_db.php"); 

    $idSolicitud = $_POST ['idSolicitud'];
    $nuevaFechaRecoleccion = $_POST ['fechaRecoleccion'];

    $objetoRegistros = new Actualizaciones();
    $nuevoExamen = $objetoRegistros -> reprogramarSolicitud($idSolicitud, $nuevaFechaRecoleccion);
?>