<?php
// Importamos las dependencias necesarias 
require_once("../Models/conexion_db.php");
require_once("../Models/registros_db.php"); 


$nombreZ = $_POST ['nombreZona'];


$objetoRegistros = new Registros();
$nuevaZona = $objetoRegistros -> registrarZona($nombreZ);