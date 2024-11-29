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
$claveVeterinaria = md5($_POST['claveVeterinaria']);

 // CREAMOS UNA VARIABLE PARA DEFINIR LA RUTA DONDE QUEDARA ALOJADA LA IMAGEN
 $ruta = "../Uploads/Veterinaria/".$_FILES['fotoVeterinaria']['name'];
 // MOVEMOS EL ARCHIVO A LA CARPETA UPLOADS Y LA CARPETA USUARIOS
 $mover = move_uploaded_file($_FILES['fotoVeterinaria']['tmp_name'], $ruta);

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