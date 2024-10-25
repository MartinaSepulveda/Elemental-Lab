<?php
// Importamos las dependencias necesarias 
require_once("../Models/conexion_db.php");
require_once("../Models/registros_db.php");    

// Capturamos en variables los datos enviados desde el formulario a traves del metodo method POST y los name de los campos

$codigo = $_POST ['codigoExam'];
$nombre = $_POST ['nombreExam'];
$muestraTubo = $_POST ['muestraTubo'];
$tipo = $_POST ['tipoExam'];


$objetoRegistros = new Registros();
$nuevoExamen = $objetoRegistros -> registrarExamen($codigo, $nombre, $muestraTubo, $tipo);

?>