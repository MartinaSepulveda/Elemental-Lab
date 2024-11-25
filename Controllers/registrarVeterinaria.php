<?php

require_once("../Models/conexion_db.php");
require_once("../Models/registros_db.php");

// Obtener datos de entrada 
$nitVeterinaria = $_POST['nitVeterinaria'];
$nombreVeterinaria = $_POST['nombreVeterinaria'];
$propietarioVeterinaria = $_POST['propietarioVeterinaria'];
$direccionVeterinaria = $_POST['direccionVeterinaria'];
$correoVeterinaria = $_POST['correoVeterinaria'];
$telefonoVeterinaria = $_POST['telefonoVeterinaria'];
$idZonaVeterinaria = $_POST['idZonaVeterinaria'];
$claveVeterinaria = $_POST['claveVeterinaria'];



// Comprovar si el archivo se ha cargado
if (isset($_FILES['fotoVeterinaria']) && $_FILES['fotoVeterinaria']['error'] === UPLOAD_ERR_OK) {
    // Definir el directorio de carga
    $uploadDir = "../assets/img/";
    // Crear la ruta completa para el archivo cargado
    $ruta = $uploadDir . basename($_FILES['fotoVeterinaria']['name']);
    
}

// Crear una instancia de la clase Registros
$objetoRegistros = new Registros();
$nuevaVeterinaria = $objetoRegistros -> registrarVeterinaria($nitVeterinaria, $nombreVeterinaria, $propietarioVeterinaria, $direccionVeterinaria,$correoVeterinaria, $telefonoVeterinaria, $idZonaVeterinaria, $ruta ?? null, $claveVeterinaria);


// Validar las entradas y registrar al usuario
// if ($objetoRegistros->registrarVeterinaria($nitVeterinaria, $nombreVeterinaria, $propietarioVeterinaria, $direccionVeterinaria,$correoVeterinaria, $telefonoVeterinaria, $idZonaVeterinaria ?? null, $ruta ?? null, $claveVeterinaria)) {
//     echo "Usuario registrado correctamente!";
// } else {
//     echo "Error al registrar usuario.";
// }
?>