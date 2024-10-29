<?php
    require_once("../Models/conexion_db.php");
    require_once("../Models/registros_db.php");  
    require_once("../Models/eliminar_db.php");

    $id = $_GET ['id'];

    $objEliminar = new Eliminar();
    $nuevaEliminacion = $objEliminar ->eliminarZonaAsignada($id);

?>