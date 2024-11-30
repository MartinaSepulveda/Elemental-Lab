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
            flex-direction: column; /* Apila los elementos en una columna */
            justify-content: center;
            align-items: center;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 20px; /* Ajusta el padding para que el contenido esté bien distribuido */
            margin: 0 auto; /* Centra el div en la página */
            font-family: Arial, sans-serif;
            font-size: 16px; /* Reduce el tamaño de la fuente */
            max-width: 400px; /* Disminuye el ancho máximo */
            width: 80%; /* Reduce el ancho relativo al tamaño de la pantalla */
            position: fixed; /* Lo posiciona de manera fija en la pantalla */
            top: 50%; /* Lo coloca verticalmente en el medio de la pantalla */
            left: 50%; /* Lo coloca horizontalmente en el medio de la pantalla */
            transform: translate(-50%, -50%); /* Ajusta el div para que esté centrado */
            z-index: 9999; /* Asegura que el mensaje quede por encima de otros elementos */
            height: 200px; /* Altura fija para hacer el cuadro cuadrado */
            border-radius: 15px; /* Bordes redondeados */
        ">
            <img src="../Views/assets/img/comprobado.png" alt="Icono de alerta" style="margin-bottom: 25px; margin-top: -10px; width: 40px; height: 40px;"> <!-- Se ajustan los márgenes -->
            <span style="text-align: center;">Solicitud realizada satisfactoriamente, esperamos darle respuesta a ella pronto </span>
            <button onclick="closeAlert()" style="
                background: none;
                border: none;
                color: #155724;
                font-size: 24px; /* Tamaño de la X */
                position: absolute;
                right: 10px;
                top: 10px;
                cursor: pointer;
            ">✖</button>
        </div>

        <script>
            function closeAlert() {
                document.getElementById("alert").style.display = "none";
                // Redirige después de cerrar
                location.href = "../Views/veterinaria-historialSolicitudes.php";
            }
            // Cierra la alerta 
            setTimeout(function() {
                closeAlert();
                // Redirige automáticamente después de 5 segundos
                location.href = "../Views/veterinaria-historialSolicitudes.php";
            }, 3000);
        </script>
    ';
} else {
    echo "<script>alert('Error al registrar la solicitud. Inténtalo de nuevo.'); window.location.href='../Views/veterinaria-hacerSolicitud.php';</script>";
}
?>
