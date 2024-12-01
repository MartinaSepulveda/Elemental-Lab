<?php
require_once("../Models/conexion_db.php");
require_once("../Models/registros_db.php");    

// Capturamos los datos del formulario
$idSolicitud = $_POST['solicitud'];
$fecha = $_POST['fechaSubidaBio'];
$doc = $_FILES['resultadoDoc'];

$objetoRegistros = new Registros();
$objetoRegistros->subirResultado($idSolicitud, $fecha, $doc);
?>
