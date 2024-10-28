<?php

// instrucción de PHP para importar una clase de un namespace
use FTP\Connection;

    class Registros{

        // funcion de MySql para registrar los examenes en la base de datos

        public function registrarExamen($codigo, $nombre, $muestraTubo, $tipo){
            // Creamos el objeto a partir de la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion-> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable

            $ingresarExamen = "INSERT INTO examen (idExamen, nombreExamen, muestraTubo, tipoExamen) VALUES ( :codigo, :nombre, :muestraTubo, :tipo )";

            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($ingresarExamen);
            // Convertimos los argumentos $ en parametros : con bindParam
            $result -> bindParam(":codigo", $codigo);
            $result -> bindParam(":nombre", $nombre);
            $result -> bindParam(":muestraTubo", $muestraTubo);
            $result -> bindParam(":tipo", $tipo);

            $result->execute();

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
                    <span>Exámen registrado satisfactoriamente.</span>
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

        // funcion de MySql para registrar las zonas en la base de datos

        public function registrarZona($nombreZ){
            // Creamos el objeto a partir de la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion-> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable

            $ingresarZona = "INSERT INTO zonas (descripcionZonas) VALUES ( :nombreZ)";

            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($ingresarZona);
            // Convertimos los argumentos $ en parametros : con bindParam
            $result -> bindParam(":nombreZ", $nombreZ);

            $result->execute();

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
                    <span>Zona registrada satisfactoriamente.</span>
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
                    <span>No se pudo registrar la zona.</span>
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

        public function registrarUsuario($idUsuario, $nombresUsuario, $apellidosUsuario, $correoUsuario, $telefonoUsuario, $ruta, $claveUsuario) {
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();
    
            // Verificar si el usuario ya existe
            $checkUser = "SELECT COUNT(*) FROM usuarios WHERE idUsuario = :idUsuario";
            $stmt = $conexion->prepare($checkUser);
            $stmt->bindParam(":idUsuario", $idUsuario);
            $stmt->execute();
    
            // Comprobar el resultado
            if ($stmt->fetchColumn() > 0) {
                // Alerta si el usuario ya existe
                echo '<script>alert("El usuario ya se encuentra registrado.");</script>';
                echo "<script>location.href='../Registro-usuarios.html'</script>";
                 // Salir del método
            }
    
            // Si el usuario no existe, proceder a registrar
            $registrarUsuario = "INSERT INTO usuarios (idUsuario, nombresUsuario, apellidosUsuario, correoUsuario, telefonoUsuario, fotoUsuario, claveUsuario) VALUES (:idUsuario, :nombresUsuario, :apellidosUsuario, :correoUsuario, :telefonoUsuario, :fotoUsuario, :claveUsuario)";
            
            $result = $conexion->prepare($registrarUsuario);
    
            // Vincular parámetros
            $result->bindParam(":idUsuario", $idUsuario);
            $result->bindParam(":nombresUsuario", $nombresUsuario);
            $result->bindParam(":apellidosUsuario", $apellidosUsuario);
            $result->bindParam(":correoUsuario", $correoUsuario);
            $result->bindParam(":telefonoUsuario", $telefonoUsuario);
            $result->bindParam(":fotoUsuario", $ruta);
            $result->bindParam(":claveUsuario", $claveUsuario);
    
            // Ejecutar la consulta
            $result->execute();
    
            // Mensaje de éxito
            echo '<script>alert("Su cuenta ha sido creada.");</script>';
            echo "<script>location.href='../Views/Login.html';</script>";
        }


        public function ingresarEstadoUsuario($idUsuario, $estado) {
            
            // Creamos el objeto a partir de la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion-> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable

            $ingresarEstado = "UPDATE usuarios SET idEstadoUsuario = :estado WHERE idUsuario = :idUsuario";

            $result = $conexion -> prepare($ingresarEstado);

            // Convertimos los argumentos $ en parametros : con bindParam
            
            $result -> bindParam(":estado", $estado);
            $result -> bindParam(":idUsuario", $idUsuario);


            $result->execute();

            
            if ($result) {
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
                    <span>Estado actualizado satisfactoriamente.</span>
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
                        location.href = "../Views/administrador.php";
                    }
            
                    // Cierra la alerta 
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 5 segundos
                        location.href = "../Views/administrador.php";
                    }, 3000);
                </script>
                ';
            } else {
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
                    <span>No se pudo actualizar el estado del usuario.</span>
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
                        location.href = "../Views/administrador.php";
                    }

                    // Cierra la alerta automáticamente después de 10 segundos
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 10 segundos
                        location.href = "../Views/administrador.php";
                    }, 10000);
                </script>
            ';
            }
        }
        
        

    }

?>