<?php
// Importamos las dependencias necesarias 
require_once("../Models/conexion_db.php");
require_once("../Models/consultas_db.php");

// Capturamos en variables los datos enviados desde el formulario a traves del metodo method POST y los name de los campos
$idUsuario= $_POST['numDoc'];
$clave = $_POST['claveUsu'];

//crear el objeto
$objConsultas = new Consultas();
$result = $objConsultas -> validarSesion ($idUsuario, $clave);



?>