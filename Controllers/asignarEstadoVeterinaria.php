<?php
    // Importamos las dependencias necesarias 
    require_once("../Models/conexion_db.php");
    require_once("../Models/registros_db.php"); 


    $nitVeterinaria = $_POST['nit'];
    $estado = $_POST['estado'];


    $objetoRegistros = new Registros();
    $resultado = $objetoRegistros -> ingresarEstadoVeterinaria($nitVeterinaria, $estado);

?>