<?php
require_once("../Models/conexion_db.php");
require_once("../Models/registros_db.php");

// Establecer zona horaria
date_default_timezone_set('America/Bogota');

// Obtener datos del formulario
$fechaSolicitud = date('Y-m-d H:i:s');
$fechaRecoleccion = $_POST['fechaRecoleccion'];
$nitVet = $_POST['nit'];
$tipoExamenes = $_POST['tipoMuestras']; // Arreglo de IDs de exámenes
$urgencia = $_POST['urgencia'];
$fase = $_POST['fase'];

// Crear instancia de la clase Registros
$objetoRegistros = new Registros();
$resultado = $objetoRegistros->registrarSolicitud($fechaSolicitud, $fechaRecoleccion, $nitVet, $tipoExamenes, $urgencia, $fase);

// Verificar el resultado y mostrar mensajes
if ($resultado) {
    echo '
        <div id="alert" style="
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            margin: 20px auto; 
            border-radius: 5px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            max-width: 600px; 
            position: relative; 
        ">
            <img src="../Views/assets/img/comprobado.png" alt="Icono de alerta" style="margin-right: 10px; width: 24px; height: 24px;">
            <span>Solicitud realizada satisfactoriamente, esperamos darle respuesta a ella pronto</span>
            <button onclick="closeAlert()" style="
                background: none;
                border: none;
                color: #155724;
                font-size: 16px;
                position: absolute;
                right: 10px;
                cursor: pointer;
            ">✖</button>
        </div>
        
        <script>
            function closeAlert() {
                document.getElementById("alert").style.display = "none";
                // Redirige después de cerrar
                location.href = "../veterinaria-historialSolicitudes.php";
            }
    
            // Cierra la alerta 
            setTimeout(function() {
                closeAlert();
                // Redirige automáticamente después de 5 segundos
                location.href = "../veterinaria-historialSolicitudes.php";
            }, 3000);
        </script>
    ';
} else {
    echo "<script>alert('Error al registrar la solicitud. Inténtalo de nuevo.'); window.location.href='../Views/veterinaria-hacerSolicitud.php';</script>";
}
?>
