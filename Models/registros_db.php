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

        public function registrarUsuario($idUsuario, $nombresUsuario, $apellidosUsuario, $correoUsuario, $telefonoUsuario, $idRolUsuario, $ruta, $claveUsuario) {
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();
    
            // Verificar si el usuario ya existe
            $checkUser = "SELECT COUNT(*) FROM usuarios WHERE idUsuario = :idUsuario";
            $stmt = $conexion->prepare($checkUser);
            $stmt->bindParam(":idUsuario", $idUsuario);
            $stmt->execute();
    
            // Comprobar el resultado
            if ($stmt->fetchColumn() > 0) {
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
                    <span><center>El usuario ya se encuentra registrado.</center> <br> En caso de estar inactivo comuniquese con el administrador.</span>
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
                        location.href = "../Views/Registro-veterinaria.php";
                    }

                    // Cierra la alerta automáticamente después de 10 segundos
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 10 segundos
                        location.href = "../Views/Registro-veterinaria.php";
                    }, 10000);
                </script>
            ';
                exit;
            }
    
            // Si el usuario no existe, proceder a registrar
            $registrarUsuario = "INSERT INTO usuarios (idUsuario, nombresUsuario, apellidosUsuario, correoUsuario, telefonoUsuario, idRolUsuario, fotoUsuario, claveUsuario) VALUES (:idUsuario, :nombresUsuario, :apellidosUsuario, :correoUsuario, :telefonoUsuario, :idRolUsuario, :fotoUsuario, :claveUsuario)";
            
            $result = $conexion->prepare($registrarUsuario);
    
            // Vincular parámetros
            $result->bindParam(":idUsuario", $idUsuario);
            $result->bindParam(":nombresUsuario", $nombresUsuario);
            $result->bindParam(":apellidosUsuario", $apellidosUsuario);
            $result->bindParam(":correoUsuario", $correoUsuario);
            $result->bindParam(":telefonoUsuario", $telefonoUsuario);
            $result->bindParam(":idRolUsuario", $idRolUsuario);
            $result->bindParam(":fotoUsuario", $ruta);
            $result->bindParam(":claveUsuario", $claveUsuario);
    
            // Ejecutar la consulta
            $result->execute();
    
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
                    <span>Su cuenta ha sido registrada exitosamente. <br> Espere la autorización del adminitrador.</span>
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
                        location.href = "../Views/login.html";
                    }
            
                    // Cierra la alerta 
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 5 segundos
                        location.href = "../Views/login.html";
                    }, 3000);
                </script>
            ';
        }

        public function registrarVeterinaria($nitVeterinaria, $nombreVeterinaria, $propietarioVeterinaria, $direccionVeterinaria, $correoVeterinaria, $telefonoVeterinaria, $idZonaVeterinaria, $ruta, $claveVeterinaria) {
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();
        
            // Verificar si el usuario ya existe
            $checkUser = "SELECT COUNT(*) FROM veterinaria WHERE nitVeterinaria = :nitVeterinaria";
            $stmt = $conexion->prepare($checkUser);
            $stmt->bindParam(":nitVeterinaria", $nitVeterinaria);
            $stmt->execute();
        
            if ($stmt->fetchColumn() > 0) {
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
                    <span><center>El usuario ya se encuentra registrado.</center> <br> En caso de estar inactivo comuniquese con el administrador.</span>
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
                        location.href = "../Views/Registro-veterinaria.php";
                    }

                    // Cierra la alerta automáticamente después de 10 segundos
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 10 segundos
                        location.href = "../Views/Registro-veterinaria.php";
                    }, 10000);
                </script>
            ';
                exit;
            }
            
                
            // Si el usuario no existe y la zona es válida, proceder a registrar
            $registrarUsuario = "INSERT INTO veterinaria (nitVeterinaria, nombreVeterinaria, propietarioVeterinaria, direccionVeterinaria, correoVeterinaria, telefonoVeterinaria, idZonaVeterinaria, fotoVeterinaria, claveVeterinaria) VALUES (:nitVeterinaria, :nombreVeterinaria, :propietarioVeterinaria, :direccionVeterinaria, :correoVeterinaria, :telefonoVeterinaria, :idZonaVeterinaria, :fotoVeterinaria, :claveVeterinaria)";
            
            $result = $conexion->prepare($registrarUsuario);
        
            // Vincular parámetros
            $result->bindParam(":nitVeterinaria", $nitVeterinaria);
            $result->bindParam(":nombreVeterinaria", $nombreVeterinaria);
            $result->bindParam(":propietarioVeterinaria", $propietarioVeterinaria);
            $result->bindParam(":direccionVeterinaria", $direccionVeterinaria);
            $result->bindParam(":correoVeterinaria", $correoVeterinaria);
            $result->bindParam(":telefonoVeterinaria", $telefonoVeterinaria);
            $result->bindParam(":idZonaVeterinaria", $idZonaVeterinaria);
            $result->bindParam(":fotoVeterinaria", $ruta);
            $result->bindParam(":claveVeterinaria", $claveVeterinaria);
        
            // Ejecutar la consulta
            $result->execute();
        
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
                    <span>Su cuenta ha sido registrada exitosamente. <br> Espere la autorización del adminitrador.</span>
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
                        location.href = "../Views/login.html";
                    }
            
                    // Cierra la alerta 
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 5 segundos
                        location.href = "../Views/login.html";
                    }, 3000);
                </script>
            ';
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
                        location.href = "../Views/administrador-usuariosActivos.php";
                    }
            
                    // Cierra la alerta 
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 5 segundos
                        location.href = "../Views/administrador-usuariosActivos.php";
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
                        location.href = "../Views/administrador-usuariosActivos.php";
                    }

                    // Cierra la alerta automáticamente después de 10 segundos
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 10 segundos
                        location.href = "../Views/administrador-usuariosActivos.php";
                    }, 10000);
                </script>
            ';
            }
        }

        public function ingresarEstadoVeterinaria($nitVeterinaria, $estado) {
            
            // Creamos el objeto a partir de la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion-> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable

            $ingresarEstado = "UPDATE veterinaria SET idEstadoVeterinaria = :estado WHERE nitVeterinaria = :nitVeterinaria";

            $result = $conexion -> prepare($ingresarEstado);

            // Convertimos los argumentos $ en parametros : con bindParam
            
            $result -> bindParam(":estado", $estado);
            $result -> bindParam(":nitVeterinaria", $nitVeterinaria);


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

        public function registrarSolicitud($fechaSolicitud, $fechaRecoleccion, $nitVet, $tipoExamenes, $urgencia, $fase) {
            // Crear el objeto de conexión
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();
        
            try {
                // Iniciar una transacción
                $conexion->beginTransaction();
        
                // Inserción en la tabla solicitudes
                $sqlSolicitud = "INSERT INTO solicitudes (fechaSolicitud, fechaRecoleccion, nitVeterinariaSolicitud, idUrgenciaSolicitud, idFaseSolicitud) 
                VALUES (:fechaSolicitud, :fechaRecoleccion, :nitVet, :urgencia, :fase)";
                $stmtSolicitud = $conexion->prepare($sqlSolicitud);
                $stmtSolicitud->bindParam(":fechaSolicitud", $fechaSolicitud);
                $stmtSolicitud->bindParam(":fechaRecoleccion", $fechaRecoleccion);
                $stmtSolicitud->bindParam(":nitVet", $nitVet);
                $stmtSolicitud->bindParam(":urgencia", $urgencia);
                $stmtSolicitud->bindParam(":fase", $fase);
                $stmtSolicitud->execute();
        
                // Obtener el ID de la solicitud recién insertada
                $idSolicitud = $conexion->lastInsertId();
        
                // Inserción en la tabla intermedia solicitudes_examenes
                $sqlExamenes = "INSERT INTO solicitudes_examenes (idSolicitud, idExamen) VALUES (:idSolicitud, :idExamen)";
                $stmtExamenes = $conexion->prepare($sqlExamenes);
        
                // Insertar cada examen asociado
                foreach ($tipoExamenes as $idExamen) {
                    $stmtExamenes->bindParam(":idSolicitud", $idSolicitud);
                    $stmtExamenes->bindParam(":idExamen", $idExamen);
                    $stmtExamenes->execute();
                }
        
                // Confirmar la transacción
                $conexion->commit();
        
                // Mensaje de éxito
                return true;
            } catch (Exception $e) {
                // Revertir la transacción en caso de error
                $conexion->rollBack();
                // Manejo del error (puedes registrar o mostrar el error si es necesario)
                error_log("Error al registrar la solicitud: " . $e->getMessage());
                return false;
            }
        }
        
        
        

    }

?>