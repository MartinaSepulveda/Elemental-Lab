<?php

session_start(); 

require_once("../Models/conexion_db.php");
require_once("../Models/actualizaciones_db.php");
require_once("../Models/autenticacion.php");

    $claveUsuario = md5($_POST['claveUsuario']);
    $idUsuario = $_SESSION['id'];

    $objetoRegistros = new Actualizaciones();
    $objetoRegistros->actualizarClave($claveUsuario, $idUsuario);

?>