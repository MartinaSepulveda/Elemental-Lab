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
                    <span style="text-align: center;">Exámen actualizado satisfactoriamente </span>
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
                    <span style="text-align: center;">Zona asignada satisfactoriamente</span>
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
                    <span style="text-align: center;">Zona actualizada satisfactoriamente </span>
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

        public function confirmacionFaseVeterinaria($idSolicitud, $faseVeterinario) {
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
        
            // Actualizar la fase seleccionada por la veterinaria
            $consulta = "
                UPDATE solicitudes 
                SET faseVeterinario = :faseVeterinario
                WHERE idSolicitud = :idSolicitud
            ";
            $resultado = $conexion->prepare($consulta);
            $resultado->bindParam(':faseVeterinario', $faseVeterinario);
            $resultado->bindParam(':idSolicitud', $idSolicitud);
        
            if ($resultado->execute()) {
                return $this->actualizarFaseSiAmbosConfirmaron($idSolicitud);
            }
            return "error";
        }
        
        public function confirmarFaseMotorizado($idSolicitud, $faseMotorizado) {
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
        
            // Actualizar la fase seleccionada por el motorizado
            $consulta = "
                UPDATE solicitudes 
                SET faseMotorizado = :faseMotorizado
                WHERE idSolicitud = :idSolicitud
            ";
            $resultado = $conexion->prepare($consulta);
            $resultado->bindParam(':faseMotorizado', $faseMotorizado);
            $resultado->bindParam(':idSolicitud', $idSolicitud);
        
            if ($resultado->execute()) {
                return $this->actualizarFaseSiAmbosConfirmaron($idSolicitud);
            }
            return "error";
        }
        
        public function actualizarFaseSiAmbosConfirmaron($idSolicitud) {
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
        
            // Consultar las fases seleccionadas por ambos roles
            $consultaVerificar = "
                SELECT faseVeterinario, faseMotorizado
                FROM solicitudes
                WHERE idSolicitud = :idSolicitud
            ";
            $resultadoVerificar = $conexion->prepare($consultaVerificar);
            $resultadoVerificar->bindParam(':idSolicitud', $idSolicitud);
            $resultadoVerificar->execute();
        
            $confirmaciones = $resultadoVerificar->fetch();
        
            if (!$confirmaciones) {
                return "error";
            }
        
            $faseVeterinario = $confirmaciones['faseVeterinario'];
            $faseMotorizado = $confirmaciones['faseMotorizado'];
        
            // Validar estado
            if (!is_null($faseVeterinario) && !is_null($faseMotorizado)) {
                if ($faseVeterinario == $faseMotorizado) {
                    // Ambos roles confirmaron y las fases coinciden: actualizar la fase de la solicitud
                    $consultaActualizarFase = "
                        UPDATE solicitudes 
                        SET idFaseSolicitud = :fase
                        WHERE idSolicitud = :idSolicitud
                    ";
                    $resultadoActualizarFase = $conexion->prepare($consultaActualizarFase);
                    $resultadoActualizarFase->bindParam(':fase', $faseVeterinario); // Puede ser cualquiera, ya que coinciden
                    $resultadoActualizarFase->bindParam(':idSolicitud', $idSolicitud);
        
                    if ($resultadoActualizarFase->execute()) {
                        return "actualizado";
                    }
                } else {
                    // Ambos confirmaron, pero las fases no coinciden
                    return "inconsistencia";
                }
            }
        
            // Si falta la confirmación de uno de los roles
            return "pendiente";
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
                    <span style="text-align: center;">Solicitud cancelada satisfactoriamente </span>
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
                    <span style="text-align: center;">Solicitud reprogramada satisfactoriamente </span>
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

        

        public function actualizarClave($claveUsuario, $idUsuario){

            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            // Consulta para actualizar la contraseña
            $actualizarClave = "UPDATE usuarios SET claveUsuario = :claveUsuario WHERE idUsuario = :idUsuario";
            $result = $conexion->prepare($actualizarClave);
        
            // Asignación de parámetros
            $result->bindParam(":claveUsuario", $claveUsuario);
            $result->bindParam(":idUsuario", $idUsuario);
        
            $result->execute();
        
            // Verificación de filas afectadas
            if ($result->rowCount() > 0) {
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
                    <span style="text-align: center;">Su contraseña se actualizó correctamente. </span>
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
                        location.href = "../Views/Login.html";
                    }
                    // Cierra la alerta 
                    setTimeout(function() {
                        closeAlert();
                        // Redirige automáticamente después de 5 segundos
                        location.href = "../Views/Login.html";
                    }, 3000);
                </script>
                ';
            } else {
                echo '
                <div id="alert" style="
                display: flex;
                flex-direction: column; /* Apilar los elementos verticalmente */
                justify-content: center;
                align-items: center;
                background-color: #f8d7da; 
                color: #721c24; 
                border: 1px solid #f5c6cb; 
                padding: 20px; 
                margin: 0 auto; /* Centra el div en la página */
                font-family: Arial, sans-serif;
                font-size: 16px; /* Reduce el tamaño de la fuente */
                max-width: 400px; /* Disminuye el ancho máximo */
                width: 80%; /* Reduce el ancho relativo al tamaño de la pantalla */
                position: fixed; /* Posición fija en la pantalla */
                top: 50%; /* Centra verticalmente */
                left: 50%; /* Centra horizontalmente */
                transform: translate(-50%, -50%); /* Ajusta el div para que esté centrado */
                z-index: 9999; /* Asegura que el mensaje quede por encima de otros elementos */
                height: 200px; /* Altura fija */
                border-radius: 15px; /* Bordes redondeados */
            ">
                <img src="../Views/assets/img/cancelar.png" alt="Icono de alerta" style="margin-bottom: 25px; margin-top: -10px; width: 40px; height: 40px;"> <!-- Ajustar imagen y márgenes -->
                <span style="text-align: center;">La contraseña no se pudo actualizar <br> Intente nuevamente. <br> </span>
                <button onclick="closeAlert()" style="
                    background: none;
                    border: none;
                    color: #721c24; /* Color de la X igual que el texto */
                    font-size: 24px; /* Tamaño más grande de la X */
                    position: absolute;
                    right: 10px;
                    top: 10px;
                    cursor: pointer;
                ">✖</button>
            </div>
                
            <script>
                function closeAlert() {
                    document.getElementById("alert").style.display = "none";
                    // Redirige después de cerrar o puedes comentar esta línea si no deseas redirigir
                    history.back();
                }

                // Cierra la alerta automáticamente después de 10 segundos
                setTimeout(function() {
                    closeAlert();
                    // Redirige automáticamente después de 10 segundos
                    history.back();
                }, 10000);
            </script>';
            }
        }
         
        public function actualizarPerfilUsuario($idUsuario, $fotoUsuario, $nombresUsuario, $apellidosUsuario, $correoUsuario, $telefonoUsuario){
            
            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            $editarPerfil = "UPDATE usuarios SET fotoUsuario = :fotoUsuario, nombresUsuario = :nombresUsuario, apellidosUsuario = :apellidosUsuario, correoUsuario = :correoUsuario, telefonoUsuario = :telefonoUsuario WHERE idUsuario = :idUsuario"; 

            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($editarPerfil);
            // Convertimos los argumentos $ en parametros : con bindParam
            $result -> bindParam(":idUsuario", $idUsuario);
            $result -> bindParam(":fotoUsuario", $fotoUsuario);
            $result -> bindParam(":nombresUsuario", $nombresUsuario);
            $result -> bindParam(":apellidosUsuario", $apellidosUsuario);
            $result -> bindParam(":correoUsuario", $correoUsuario);
            $result -> bindParam(":telefonoUsuario", $telefonoUsuario);

            $result->execute();

            if ($result->rowCount() > 0) {
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
                <span style="text-align: center;">Sus datos se actualizaron correctamente. </span>
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
                // Redirige después de cerrar a la página anterior
                history.back();
            }
            // Cierra la alerta y redirige automáticamente después de 3 segundos
            setTimeout(function() {
                closeAlert();
            }, 3000);
        </script>
            ';

            } else {
                echo '
                <div id="alert" style="
                display: flex;
                flex-direction: column; /* Apilar los elementos verticalmente */
                justify-content: center;
                align-items: center;
                background-color: #f8d7da; 
                color: #721c24; 
                border: 1px solid #f5c6cb; 
                padding: 20px; 
                margin: 0 auto; /* Centra el div en la página */
                font-family: Arial, sans-serif;
                font-size: 16px; /* Reduce el tamaño de la fuente */
                max-width: 400px; /* Disminuye el ancho máximo */
                width: 80%; /* Reduce el ancho relativo al tamaño de la pantalla */
                position: fixed; /* Posición fija en la pantalla */
                top: 50%; /* Centra verticalmente */
                left: 50%; /* Centra horizontalmente */
                transform: translate(-50%, -50%); /* Ajusta el div para que esté centrado */
                z-index: 9999; /* Asegura que el mensaje quede por encima de otros elementos */
                height: 200px; /* Altura fija */
                border-radius: 15px; /* Bordes redondeados */
            ">
                <img src="../Views/assets/img/cancelar.png" alt="Icono de alerta" style="margin-bottom: 25px; margin-top: -10px; width: 40px; height: 40px;"> <!-- Ajustar imagen y márgenes -->
                <span style="text-align: center;">No se pudo actualizar los datos <br> Intente nuevamente. <br> En caso de estar inactivo comuníquese con el administrador.</span>
                <button onclick="closeAlert()" style="
                    background: none;
                    border: none;
                    color: #721c24; /* Color de la X igual que el texto */
                    font-size: 24px; /* Tamaño más grande de la X */
                    position: absolute;
                    right: 10px;
                    top: 10px;
                    cursor: pointer;
                ">✖</button>
            </div>
                
            <script>
                function closeAlert() {
                    document.getElementById("alert").style.display = "none";
                    // Redirige después de cerrar o puedes comentar esta línea si no deseas redirigir
                    history.back();
                }

                // Cierra la alerta automáticamente después de 10 segundos
                setTimeout(function() {
                    closeAlert();
                    // Redirige automáticamente después de 10 segundos
                }, 10000);
            </script>';
            }

        }

}


?>