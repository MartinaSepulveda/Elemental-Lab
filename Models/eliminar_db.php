<?php

    // instrucción de PHP para importar una clase de un namespace
    use FTP\Connection;
    require_once("../Models/registros_db.php");

    class Eliminar{
        
        //Función para eliminar los datos del exámen en la base de datos
        public function eliminarExamen($codigo){

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion = $objConexion -> get_conexion();

            //definir consulta sql para eliminar después del where va el campo de la tabla 
            $eliminarExamen = "DELETE FROM examen WHERE idExamen = :codigo ";

            $result = $conexion -> prepare($eliminarExamen);

            $result -> bindParam(':codigo', $codigo);

            $result -> execute();

            if ($result->rowCount() > 0) {
                // Mensaje de éxito
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
                    <span style="text-align: center;">Exámen eliminado satisfactoriamente </span>
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
                        location.href = "../Views/administrador-verExamen.php";
                    }
                    // Cierra la alerta 
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 5 segundos
                        location.href = "../Views/administrador-verExamen.php";
                    }, 3000);
                </script>

            ';
            } else {
                // Mensaje de error
                echo '
                <div id="alert" style="
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background-color: #f8d7da;
                    color: #721c24;
                    border: 1px solid #f5c6cb;
                    padding: 15px;
                    margin: 20px auto; /* Centra el div en la página */
                    border-radius: 5px;
                    font-family: Arial, sans-serif;
                    font-size: 14px;
                    max-width: 600px; 
                    position: relative; /* Necesario para posicionar el botón de cerrar */
                ">
                    <img src="../Views/assets/img/cancelar.png" alt="Icono de alerta" style="margin-right: 10px; width: 24px; height: 24px;">
                    <span>No se encontró el exámen para eliminar.</span>
                    <button onclick="closeAlert()" style="
                        background: none;
                        border: none;
                        color: #721c24;
                        font-size: 16px;
                        position: absolute;
                        right: 10px;
                        cursor: pointer;
                    ">✖</button>
                </div>
                
                <script>
                    function closeAlert() {
                        document.getElementById("alert").style.display = "none";
                        // Redirige después de cerrar o puedes comentar esta línea si no deseas redirigir
                        location.href = "../Views/administrador-verExamen.php";
                    }

                    // Cierra la alerta automáticamente después de 10 segundos
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 10 segundos
                        location.href = "../Views/administrador-verExamen.php";
                    }, 10000);
                </script>
            ';
            }

        }


        // Funcion para eliminar la zona asignada al motorizado
        public function eliminarZonaAsignada($id){

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion = $objConexion -> get_conexion();

            //definir consulta sql para eliminar después del where va el campo de la tabla 
            $eliminarZonaA = "UPDATE usuarios SET idZonaUsuario = NULL WHERE idUsuario = :id ";

            $result = $conexion -> prepare($eliminarZonaA);

            $result -> bindParam(':id', $id);

            $result -> execute();

            if ($result->rowCount() > 0) {
                // Mensaje de éxito
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
                    <span style="text-align: center;">La zona se borro del motorizado satisfactoriamente </span>
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
                        location.href = "../Views/administrador-zonasAsignadas.php";
                    }
                    // Cierra la alerta 
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 5 segundos
                        location.href = "../Views/administrador-zonasAsignadas.php";
                    }, 3000);
                </script>

            ';
            } else {
                // Mensaje de error
                echo '
                <div id="alert" style="
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background-color: #f8d7da;
                    color: #721c24;
                    border: 1px solid #f5c6cb;
                    padding: 15px;
                    margin: 20px auto; /* Centra el div en la página */
                    border-radius: 5px;
                    font-family: Arial, sans-serif;
                    font-size: 14px;
                    max-width: 600px; 
                    position: relative; /* Necesario para posicionar el botón de cerrar */
                ">
                    <img src="../Views/assets/img/cancelar.png" alt="Icono de alerta" style="margin-right: 10px; width: 24px; height: 24px;">
                    <span>No se pudo eliminar la zona asignada.</span>
                    <button onclick="closeAlert()" style="
                        background: none;
                        border: none;
                        color: #721c24;
                        font-size: 16px;
                        position: absolute;
                        right: 10px;
                        cursor: pointer;
                    ">✖</button>
                </div>
                
                <script>
                    function closeAlert() {
                        document.getElementById("alert").style.display = "none";
                        // Redirige después de cerrar o puedes comentar esta línea si no deseas redirigir
                        location.href = "../Views/administrador-zonasAsignadas.php";
                    }

                    // Cierra la alerta automáticamente después de 10 segundos
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 10 segundos
                        location.href = "../Views/administrador-zonasAsignadas.php";
                    }, 10000);
                </script>
            ';
            }

        }

        //Función para eliminar los datos de la zona en la base de datos
        public function eliminarZona($id){

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion = $objConexion -> get_conexion();

            //definir consulta sql para eliminar después del where va el campo de la tabla 
            $eliminarExamen = "DELETE FROM zonas WHERE IdZonas = :id ";

            $result = $conexion -> prepare($eliminarExamen);

            $result -> bindParam(':id', $id);

            $result -> execute();

            if ($result->rowCount() > 0) {
                // Mensaje de éxito
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
                    <span style="text-align: center;">Zona eliminada satisfactoriamente </span>
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
                        location.href = "../Views/administrador-ingresarZona.php";
                    }
                    // Cierra la alerta 
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 5 segundos
                        location.href = "../Views/administrador-ingresarZona.php";
                    }, 3000);
                </script>
            ';
            } else {
                // Mensaje de error
                echo '
                <div id="alert" style="
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background-color: #f8d7da;
                    color: #721c24;
                    border: 1px solid #f5c6cb;
                    padding: 15px;
                    margin: 20px auto; /* Centra el div en la página */
                    border-radius: 5px;
                    font-family: Arial, sans-serif;
                    font-size: 14px;
                    max-width: 600px; 
                    position: relative; /* Necesario para posicionar el botón de cerrar */
                ">
                    <img src="../Views/assets/img/cancelar.png" alt="Icono de alerta" style="margin-right: 10px; width: 24px; height: 24px;">
                    <span>No se encontró el exámen para eliminar.</span>
                    <button onclick="closeAlert()" style="
                        background: none;
                        border: none;
                        color: #721c24;
                        font-size: 16px;
                        position: absolute;
                        right: 10px;
                        cursor: pointer;
                    ">✖</button>
                </div>
                
                <script>
                    function closeAlert() {
                        document.getElementById("alert").style.display = "none";
                        // Redirige después de cerrar o puedes comentar esta línea si no deseas redirigir
                        location.href = "../Views/administrador-ingresarZona.php";
                    }

                    // Cierra la alerta automáticamente después de 10 segundos
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 10 segundos
                        location.href = "../Views/administrador-ingresarZona.php";
                    }, 10000);
                </script>
            ';
            }

        }


    }

?>