<?php
    require_once("../Models/conexion_db.php");
    require_once("../Models/generarClaveModel.php");

    $identificacion = $_POST['numDoc'];
    $email = $_POST['email'];

    $objClave = new GenerarClave();
    $result = $objClave->enviarNuevaClave($identificacion, $email);
    
?>