<?php

    // instrucción de PHP para importar una clase de un namespace
    use FTP\Connection;
    require_once("../Models/registros_db.php");
    

    class Actualizaciones{

        //Función para guardar los datos del examen editado en la base de datos
        public function actualizacionExamen($codigo, $nombre, $muestraTubo, $tipo){
            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            $actualizarExamen = "UPDATE examen SET idExamen=:codigo ,nombreExamen=:nombre ,muestraTubo=:muestraTubo ,tipoExamen=:tipo WHERE idExamen=:codigo"; 

            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($actualizarExamen);
            // Convertimos los argumentos $ en parametros : con bindParam
            $result -> bindParam(":codigo", $codigo);
            $result -> bindParam(":nombre", $nombre);
            $result -> bindParam(":muestraTubo", $muestraTubo);
            $result -> bindParam(":tipo", $tipo);

            $result->execute();

            // Verificamos si se actualizó alguna fila
            if ($result->rowCount() > 0) {
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
                    <span>Exámen actualizado satisfactoriamente.</span>
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
                    <span>No se encontraron examenes para actualizar.</span>
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

        // Funcion para asignarle  la zona del motorizado, por primera vez y si tiene el campo vacio y cuando se quiera editar
        public function actualizacionZona($zona, $idUsuario){
            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            $actualizarZona = "UPDATE usuarios SET idZonaUsuario=:zona  WHERE idUsuario=:idUsuario"; 

            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($actualizarZona);
            // Convertimos los argumentos $ en parametros : con bindParam
            $result -> bindParam(":zona", $zona);
            $result -> bindParam(":idUsuario", $idUsuario);

            $result->execute();

            // Verificamos si se actualizó alguna fila
            if ($result->rowCount() > 0) {
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
                    <span>Zona asignada satisfactoriamente.</span>
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
                    <span>No se encontraron examenes para actualizar.</span>
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

        //Función para guardar los datos de la zona editada en la base de datos (La que se neceita para asignar)
        public function actualizacionZonaAdmi($id,$nombreZ){
            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            $actualizarZonaA = "UPDATE zonas SET descripcionZonas=:nombreZ WHERE idZonas=:id"; 

            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($actualizarZonaA);
            // Convertimos los argumentos $ en parametros : con bindParam
            $result -> bindParam(":id", $id);
            $result -> bindParam(":nombreZ", $nombreZ);


            $result->execute();

            // Verificamos si se actualizó alguna fila
            if ($result->rowCount() > 0) {
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
                    <span>Exámen actualizado satisfactoriamente.</span>
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
                    <span>No se encontraron examenes para actualizar.</span>
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

        public function confirmacionFaseVeterinaria($idSolicitud, $fase) {
            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
        
            // Actualizar la confirmación del veterinario sin cambiar la fase
            $consulta = "UPDATE solicitudes SET confirmadoPorVeterinario = 1 WHERE idSolicitud = :idSolicitud";
            $resultado = $conexion->prepare($consulta);
            $resultado->bindParam(':idSolicitud', $idSolicitud);
            $confirmacionExitosa = $resultado->execute();
        
            // Si la confirmación del veterinario es exitosa, verificamos si ambos confirmaron
            if ($confirmacionExitosa) {
                return $this->actualizarFaseSiAmbosConfirmaron($idSolicitud, $fase);
            }
        
            return false;
        }        

    
        public function confirmarFaseMotorizado($idSolicitud) {
            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
        
            // Actualizar solo la confirmación del motorizado
            $consulta = "UPDATE solicitudes SET confirmadoPorMotorizado = 1 WHERE idSolicitud = :idSolicitud";
            $resultado = $conexion->prepare($consulta);
            $resultado->bindParam(':idSolicitud', $idSolicitud);
            $confirmacionExitosa = $resultado->execute();
        
            // Si la confirmación del motorizado es exitosa, verificamos si ambos confirmaron
            if ($confirmacionExitosa) {
                // Consultamos la fase actual de la solicitud
                $consultaFase = "SELECT idFaseSolicitud FROM solicitudes WHERE idSolicitud = :idSolicitud";
                $resultadoFase = $conexion->prepare($consultaFase);
                $resultadoFase->bindParam(':idSolicitud', $idSolicitud);
                $resultadoFase->execute();
        
                $faseActual = $resultadoFase->fetchColumn();
        
                // Llamar a la función para verificar si ambos han confirmado y actualizar la fase
                return $this->actualizarFaseSiAmbosConfirmaron($idSolicitud, $faseActual);
            }
        
            return false;
        }


        private function actualizarFaseSiAmbosConfirmaron($idSolicitud, $fase) {
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
        
            // Verificar si tanto el veterinario como el motorizado han confirmado
            $consultaVerificar = "SELECT confirmadoPorVeterinario, confirmadoPorMotorizado FROM solicitudes WHERE idSolicitud = :idSolicitud";
            $resultadoVerificar = $conexion->prepare($consultaVerificar);
            $resultadoVerificar->bindParam(':idSolicitud', $idSolicitud);
            $resultadoVerificar->execute();
        
            $confirmaciones = $resultadoVerificar->fetch();
        
            if ($confirmaciones['confirmadoPorVeterinario'] == 1 && $confirmaciones['confirmadoPorMotorizado'] == 1) {
                // Si ambos han confirmado, actualizamos la fase
                $consultaActualizarFase = "UPDATE solicitudes SET idFaseSolicitud = :fase WHERE idSolicitud = :idSolicitud";
                $resultadoActualizarFase = $conexion->prepare($consultaActualizarFase);
                $resultadoActualizarFase->bindParam(':fase', $fase);
                $resultadoActualizarFase->bindParam(':idSolicitud', $idSolicitud);
                
                return $resultadoActualizarFase->execute();
            }
        
            return false;
        }
        
        public function cancelarSolicitud($idSolicitud){
            
            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            $cancelarSolicitud = "UPDATE solicitudes SET idEstadoSolicitudSoli= 1 WHERE idSolicitud=:idSolicitud"; 

            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($cancelarSolicitud);
            // Convertimos los argumentos $ en parametros : con bindParam
            $result -> bindParam(":idSolicitud", $idSolicitud);

            $result->execute();

            // Verificamos si se actualizó alguna fila
            if ($result->rowCount() > 0) {
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
                    <span>Solicitud cancelada satisfactoriamente.</span>
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
                        location.href = "../Views/veterinaria-cancelarReprogramar.php";
                    }
            
                    // Cierra la alerta 
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 5 segundos
                        location.href = "../Views/veterinaria-cancelarReprogramar.php";
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
                    <span>No se pudo cancelar su solicitud :( </span>
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
                        location.href = "../Views/veterinaria-cancelarReprogramar.php";
                    }

                    // Cierra la alerta automáticamente después de 10 segundos
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 10 segundos
                        location.href = "../Views/veterinaria-cancelarReprogramar.php";
                    }, 10000);
                </script>
            ';
            }
        }

        public function reprogramarSolicitud($idSolicitud, $nuevaFechaRecoleccion){
            
            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            $cancelarSolicitud = "UPDATE solicitudes SET idEstadoSolicitudSoli = 2, fechaRecoleccion = :nuevaFechaRecoleccion WHERE idSolicitud = :idSolicitud"; 

            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($cancelarSolicitud);
            // Convertimos los argumentos $ en parametros : con bindParam
            $result -> bindParam(":idSolicitud", $idSolicitud);
            $result -> bindParam(":nuevaFechaRecoleccion", $nuevaFechaRecoleccion);

            $result->execute();

            // Verificamos si se actualizó alguna fila
            if ($result->rowCount() > 0) {
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
                    <span>Solicitud reprogramada satisfactoriamente.</span>
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
                    <span>No se pudo reprogramar su solicitud :( </span>
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
                        location.href = "../Views/veterinaria-historialSolicitudes.php";
                    }

                    // Cierra la alerta automáticamente después de 10 segundos
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 10 segundos
                        location.href = "../Views/veterinaria-historialSolicitudes.php";
                    }, 10000);
                </script>
            ';
            }
        }

        
    

    }



?>