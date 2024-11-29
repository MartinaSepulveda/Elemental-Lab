<?php

require_once("../Models/conexion_db.php");
require_once("../Models/registros_db.php");  
require_once("../Models/actualizaciones_db.php"); 

    $claveUsuario= $_POST ['claveUsuario'];
    $claveUsuarios = md5($_POST ['claveUsuarios']);

    $objetoRegistros = new Actualizaciones();
    $nuevoExamen = $objetoRegistros -> actualizarClave($claveUsuario, $claveUsuarios);

?>