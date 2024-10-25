<?php
    require_once("../Models/conexion_db.php");
    require_once("../Models/registros_db.php");  
    require_once("../Models/actualizaciones_db.php"); 

    $codigo = $_POST ['codigoExam'];
    $nombre = $_POST ['nombreExam'];
    $muestraTubo = $_POST ['muestraTubo'];
    $tipo = $_POST ['tipoExam'];

    $objetoRegistros = new Actualizaciones();
    $nuevoExamen = $objetoRegistros -> actualizacionExamen($codigo, $nombre, $muestraTubo, $tipo);
?>