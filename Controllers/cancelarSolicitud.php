<?php
    require_once("../Models/conexion_db.php");
    require_once("../Models/registros_db.php");  
    require_once("../Models/actualizaciones_db.php");

    $idSolicitud = $_GET ['idSolicitud'];

    $objEliminar = new Actualizaciones();
    $nuevaEliminacion = $objEliminar ->cancelarSolicitud($idSolicitud);

?>