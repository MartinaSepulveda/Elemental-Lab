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
                    justify-content: center;
                    align-items: center;
                    background-color: #d4edda;
                    color: #155724;
                    border: 1px solid #c3e6cb;
                    padding: 15px;
                    margin: 20px auto; /* Centra el div en la página */
                    border-radius: 5px;
                    font-family: Arial, sans-serif;
                    font-size: 14px;
                    max-width: 600px; 
                    position: relative; /* Necesario para posicionar el botón de cerrar */
                ">
                    <img src="../Views/assets/img/comprobado.png" alt="Icono de alerta" style="margin-right: 10px; width: 24px; height: 24px;">
                    <span>Exámen eliminado satisfactoriamente.</span>
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


    }

?>