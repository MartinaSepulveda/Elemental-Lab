<?php
// Importamos las dependencias necesarias 
require_once("../Models/conexion_db.php");
require_once("../Models/actualizaciones_db.php"); 

$id= $_POST['id'];
$nombreZ = $_POST ['nombreZona'];


$objetoRegistros = new Actualizaciones();
$nuevaZona = $objetoRegistros -> actualizacionZonaAdmi($id,$nombreZ);