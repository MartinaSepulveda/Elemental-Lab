<?php

require_once("../Models/conexion_db.php");
require_once("../Models/registros_db.php");

// Establecer zona Horaria
date_default_timezone_set('America/Bogota'); 
// Obtener datos de entrada 
$fechaSolicitud = date('Y-m-d H:i:s'); 
$fechaRecoleccion = $_POST['fechaRecoleccion'];
$nitVet = $_POST['nit'];
$tipoExamen = implode(",", $_POST['tipoMuestras']); // Convierte el array a un string separado por comas
$urgencia = $_POST['urgencia'];
$fase = $_POST['fase'];


// Crear una instancia de la clase Registros
$objetoRegistros = new Registros();
$nuevoUsuario = $objetoRegistros -> registrarSolictud($fechaSolicitud,$fechaRecoleccion, $nitVet, $tipoExamen, $urgencia, $fase);


?>