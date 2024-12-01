<?php
require_once("../Models/conexion_db.php");

$nit = $_GET['nit'];

$objetoConexion = new Conexion();
$conexion = $objetoConexion->get_conexion();

$query = "SELECT nombreVeterinaria FROM veterinaria WHERE nitVeterinaria = :nit";
$stmt = $conexion->prepare($query);
$stmt->bindParam(':nit', $nit);
$stmt->execute();

$veterinaria = $stmt->fetch(PDO::FETCH_ASSOC);

if ($veterinaria) {
    echo json_encode(['success' => true, 'nombreVeterinaria' => $veterinaria['nombreVeterinaria']]);
} else {
    echo json_encode(['success' => false]);
}
?>
