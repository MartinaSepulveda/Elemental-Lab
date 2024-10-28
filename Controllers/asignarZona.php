<?php
    // Importamos las dependencias necesarias 
    require_once("../Models/conexion_db.php");
    require_once("../Models/registros_db.php");
    require_once("../Models/actualizaciones_db.php"); 


    $zona = $_POST['zona'];
    $idUsuario = $_POST['idUsuario'];

    $objetoRegistros = new Actualizaciones();
    $resultado = $objetoRegistros -> actualizacionZona($zona, $idUsuario);

?>