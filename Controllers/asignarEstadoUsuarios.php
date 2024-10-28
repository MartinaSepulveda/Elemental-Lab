<?php
    // Importamos las dependencias necesarias 
    require_once("../Models/conexion_db.php");
    require_once("../Models/registros_db.php"); 


    $idUsuario = $_POST['idUsuario'];
    $estado = $_POST['estado'];


    $objetoRegistros = new Registros();
    $resultado = $objetoRegistros -> ingresarEstadoUsuario($idUsuario, $estado);

?>