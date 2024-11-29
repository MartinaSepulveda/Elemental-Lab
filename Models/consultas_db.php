<?php

    // instrucción de PHP para importar una clase de un namespace
    use FTP\Connection;

    class Consultas{

        // Función para consultar los examenes que hay en la base de datos
        public function consultarExamenes(){
            // Variable que va a almacenar el fetch
            $datosExamenes=null;

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable
            
            $consultarExamen = "SELECT * FROM examen";
            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($consultarExamen);

            $result -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $result->fetch()){
                $datosExamenes[] = $resultado;
            }
            return $datosExamenes;
        }

        // Función para mostrar los datos de los examenes en el formulario para editarlos
        public function consultarExamenEditar($id){
            $datosExamenes = null;

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar en donde se compara el id del examen que llevamos en la url con el de la db
            $consultarExamen = "SELECT * FROM examen WHERE idExamen=:id";

            $result = $conexion -> prepare($consultarExamen);
            $result -> bindParam(':id', $id);

            $result -> execute();

            while ($resultado = $result->fetch()){
                $datosExamenes[] = $resultado;
            }
            return $datosExamenes;
        }


        // Función para consultar las solicitudes en proceso que hay en la base de datos
        public function consultarSolicitudesProceso(){
            // Variable que va a almacenar el fetch
            $datosSolicitud=null;

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable
            
            $consultarExamen = "SELECT nombreVeterinaria, direccionVeterinaria, telefonoVeterinaria, nombreExamen, descripcionUrgencia, descripcionFase, descripcionEstadoSolicitud FROM solicitudes INNER JOIN veterinaria ON nitVeterinariaSolicitud=nitVeterinaria INNER JOIN examen ON idExamenSolicitud=idExamen INNER JOIN nivelurgencia ON idUrgenciaSolicitud = idUrgencia INNER JOIN fase ON idFaseSolicitud =idFase INNER JOIN estadosolicitud ON idEstadoSolicitudSoli = idEstadoSolicitud WHERE descripcionFase = 'En proceso' ";
            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($consultarExamen);

            $result -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $result->fetch()){
                $datosSolicitud[] = $resultado;
            }
            return $datosSolicitud;
        }

        // Función para consultar las solicitudes realizadas que hay en la base de datos
        public function consultarSolicitudesRealizadas(){
            // Variable que va a almacenar el fetch
            $datosSolicitud=null;

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable
            
            $consultarExamen = "SELECT nombreVeterinaria, direccionVeterinaria, telefonoVeterinaria, nombreExamen, descripcionUrgencia, descripcionFase, descripcionEstadoSolicitud FROM solicitudes INNER JOIN veterinaria ON nitVeterinariaSolicitud=nitVeterinaria INNER JOIN examen ON idExamenSolicitud=idExamen INNER JOIN nivelurgencia ON idUrgenciaSolicitud = idUrgencia INNER JOIN fase ON idFaseSolicitud =idFase INNER JOIN estadosolicitud ON idEstadoSolicitudSoli = idEstadoSolicitud WHERE descripcionFase = 'Realizada' ";
            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($consultarExamen);

            $result -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $result->fetch()){
                $datosSolicitud[] = $resultado;
            }
            return $datosSolicitud;
        }

        // Función para consultar las solicitudes NO realizadas que hay en la base de datos
        public function consultarSolicitudesNoRealizadas(){
            // Variable que va a almacenar el fetch
            $datosSolicitud=null;

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable
            
            $consultarExamen = "SELECT nombreVeterinaria, direccionVeterinaria, telefonoVeterinaria, nombreExamen, descripcionUrgencia, descripcionFase, descripcionEstadoSolicitud FROM solicitudes INNER JOIN veterinaria ON nitVeterinariaSolicitud=nitVeterinaria INNER JOIN examen ON idExamenSolicitud=idExamen INNER JOIN nivelurgencia ON idUrgenciaSolicitud = idUrgencia INNER JOIN fase ON idFaseSolicitud =idFase INNER JOIN estadosolicitud ON idEstadoSolicitudSoli = idEstadoSolicitud WHERE descripcionFase = 'No realizada' ";
            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($consultarExamen);

            $result -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $result->fetch()){
                $datosSolicitud[] = $resultado;
            }
            return $datosSolicitud;
        }

        public function consultarUsuarios(){
            // Variable que va a almacenar el fetch
            $usuarios=null;
            $veterinarias=null;


            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable
            
            $consultarUsuarios = "SELECT CONCAT(nombresUsuario, ' ', apellidosUsuario) AS nombreCompleto, idUsuario, telefonoUsuario, correoUsuario, descripcionRol FROM usuarios INNER JOIN rol ON idRolUsuario = idRol  WHERE idEstadoUsuario IS NULL ";

            $consultarVeterinarias="SELECT nombreVeterinaria, nitVeterinaria, telefonoVeterinaria , correoVeterinaria FROM veterinaria WHERE idEstadoVeterinaria IS NULL";


            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $resultUsuarios = $conexion -> prepare($consultarUsuarios);

            $resultUsuarios -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $resultUsuarios->fetch()){
                $usuarios[] = $resultado;
            }

            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $resultVeterinarias = $conexion -> prepare($consultarVeterinarias);

            $resultVeterinarias -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $resultVeterinarias->fetch()){
                $veterinarias[] = $resultado;
            }

            // Retornamos ambos resultados
            return [
                'usuarios' => $usuarios,
                'veterinarias' => $veterinarias,
            ];
        }

        public function consultarUsuariosActivos(){
            // Variable que va a almacenar el fetch
            $usuarioActivo=null;
            $veterinariaActiva=null;

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable
            
            $consultarUsuActivo = "SELECT CONCAT (nombresUsuario, ' ', apellidosUsuario) AS nombreCompleto, idUsuario ,telefonoUsuario, descripcionRol, correoUsuario, descripcionEstado FROM usuarios INNER JOIN rol ON idRolUsuario=idRol INNER JOIN estado ON idEstadoUsuario=IdEstado WHERE idEstadoUsuario = 1 ";

            $consultarVetActiva="SELECT nombreVeterinaria, nitVeterinaria, telefonoVeterinaria , correoVeterinaria, descripcionEstado FROM veterinaria INNER JOIN estado ON idEstadoVeterinaria=IdEstado WHERE idEstadoVeterinaria = 1";

            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $resultUsu = $conexion -> prepare($consultarUsuActivo);

            $resultUsu -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $resultUsu->fetch()){
                $usuarioActivo[] = $resultado;
            }

            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $resultVet = $conexion -> prepare($consultarVetActiva);

            $resultVet -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $resultVet->fetch()){
                $veterinariaActiva[] = $resultado;
            }

            // Retornamos ambos resultados
            return [
                'usuarios' => $usuarioActivo,
                'veterinarias' => $veterinariaActiva,
            ];
        }

        public function consultarUsuariosInactivos(){
            // Variable que va a almacenar el fetch
            $usuarioInactivo=null;
            $veterinariaInactiva=null;

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable
            
            $consultarUsuActivo = "SELECT CONCAT (nombresUsuario, ' ', apellidosUsuario) AS nombreCompleto, idUsuario ,telefonoUsuario, descripcionRol, correoUsuario, descripcionEstado FROM usuarios INNER JOIN rol ON idRolUsuario=idRol INNER JOIN estado ON idEstadoUsuario=IdEstado WHERE idEstadoUsuario = 2 ";

            $consultarVetActiva="SELECT nombreVeterinaria, nitVeterinaria, telefonoVeterinaria , correoVeterinaria, descripcionEstado FROM veterinaria INNER JOIN estado ON idEstadoVeterinaria=IdEstado WHERE idEstadoVeterinaria = 2";

            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $resultUsu = $conexion -> prepare($consultarUsuActivo);

            $resultUsu -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $resultUsu->fetch()){
                $usuarioInactivo[] = $resultado;
            }

            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $resultVet = $conexion -> prepare($consultarVetActiva);

            $resultVet -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $resultVet->fetch()){
                $veterinariaInactiva[] = $resultado;
            }

            // Retornamos ambos resultados
            return [
                'usuarios' => $usuarioInactivo,
                'veterinarias' => $veterinariaInactiva,
            ];
        }

        public function consultarZonas(){
            // Variable que va a almacenar el fetch
            $datosZona=null;

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable
            
            $consultarZona = "SELECT * FROM zonas";
            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($consultarZona);

            $result -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $result->fetch()){
                $datosZona[] = $resultado;
            }
            return $datosZona;
        }

        public function consultarMotorizados(){
                // Variable que va a almacenar el fetch
                $motorizado=null;

                //creamos el objeto a partir de la clase conexion
                $objConexion = new Conexion();
                $conexion =$objConexion -> get_conexion();
    
                // Definimos la consulta SQL a ejecutar y la guardamos en una variable
                
                $consultarMotorizado = "SELECT idUsuario, CONCAT (nombresUsuario, ' ', apellidosUsuario) AS nombreCompleto, correoUsuario, telefonoUsuario, idRolUsuario, idZonaUsuario FROM usuarios WHERE idEstadoUsuario = 1 AND idRolUsuario = 2 AND idZonaUsuario IS NULL";
                // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
                $result = $conexion -> prepare($consultarMotorizado);
    
                $result -> execute();
    
                //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)
    
                while ($resultado = $result->fetch()){
                    $motorizado[] = $resultado;
                }
                return $motorizado;
        }

        public function consultarMotorizadosZona(){
            // Variable que va a almacenar el fetch
            $motorizado=null;

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable
            
            $consultarMotorizado = "SELECT idUsuario, CONCAT (nombresUsuario, ' ', apellidosUsuario) AS nombreCompleto, correoUsuario, telefonoUsuario, idRolUsuario, descripcionZonas FROM usuarios INNER JOIN zonas ON idZonaUsuario=idZonas WHERE idEstadoUsuario = 1 AND idRolUsuario = 2 AND idZonaUsuario IS NOT NULL";
            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($consultarMotorizado);

            $result -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $result->fetch()){
                $motorizado[] = $resultado;
            }
            return $motorizado;
        }

        
        public function validarSesion($idUsuario, $clave) {
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
        
            // Consulta en la tabla de usuarios
            $consultarUsuario = "SELECT * FROM usuarios WHERE idUsuario = :idUsuario";
            $resultUsuario = $conexion->prepare($consultarUsuario);
            $resultUsuario->bindParam(":idUsuario", $idUsuario);
            $resultUsuario->execute();
        
            // Verifica si el usuario existe en la tabla de usuarios
            if ($buscarUsuario = $resultUsuario->fetch()) {
                // Validación de la clave
                if ($clave == $buscarUsuario['claveUsuario']) {
                    session_start();
        
                    // **Limpieza de variables de sesión previas**
                    unset($_SESSION['nit']);
                    unset($_SESSION['estado']);
                    unset($_SESSION['nombre']);
                    unset($_SESSION['direccion']);
                    unset($_SESSION['telefono']);
        
                    // Asignar las variables de sesión específicas del usuario
                    $_SESSION['id'] = $buscarUsuario['idUsuario'];
                    $_SESSION['rol'] = $buscarUsuario['idRolUsuario'];
                    $_SESSION['estado'] = $buscarUsuario['idEstadoUsuario'];
                    $_SESSION['nombre'] = $buscarUsuario['nombresUsuario'];
        
                    // Validación de rol y estado activo
                    if ($buscarUsuario['idEstadoUsuario'] == 1) {  // Usuario activo
                        if ($buscarUsuario['idRolUsuario'] == 1) {
                            echo "<script>
                                alert('Bienvenido Administrador');
                                window.location.href='../Views/administrador.php';
                            </script>";
                        } elseif ($buscarUsuario['idRolUsuario'] == 2) {
                            echo "<script>
                                alert('Bienvenido Motorizado');
                                window.location.href='../Views/motorizado-solicitudes.php';
                            </script>";
                        } elseif ($buscarUsuario['idRolUsuario'] == 3) {
                            echo "<script>
                                alert('Bienvenido Bioanalista');
                                window.location.href='../Views/InmoDashboard.html';
                            </script>";
                        }
                    } else { // Usuario inactivo
                        echo "<script>
                            alert('Su cuenta está inactiva. Por favor, contacte al administrador.');
                            window.location.href='../Views/Login.html';
                        </script>";
                    }
                } else { // Clave incorrecta
                    echo "<script>
                        alert('Contraseña incorrecta, vuelva a intentarlo.');
                        window.location.href='../Views/Login.html';
                    </script>";
                }
            } else {
                // Consulta en la tabla de veterinarias
                $consultarVeterinaria = "SELECT * FROM veterinaria WHERE nitVeterinaria = :idUsuario";
                $resultVeterinaria = $conexion->prepare($consultarVeterinaria);
                $resultVeterinaria->bindParam(":idUsuario", $idUsuario);
                $resultVeterinaria->execute();
        
                // Verifica si el usuario existe en la tabla de veterinarias
                if ($buscarVeterinaria = $resultVeterinaria->fetch()) {
                    // Validación de la clave
                    if ($clave == $buscarVeterinaria['claveVeterinaria']) {
                        session_start();
        
                        // **Limpieza de variables de sesión previas**
                        unset($_SESSION['id']);
                        unset($_SESSION['rol']);
                        unset($_SESSION['estado']);
                        unset($_SESSION['nombre']);
        
                        // Asignar las variables de sesión específicas de veterinarias
                        $_SESSION['id'] = $buscarVeterinaria['nitVeterinaria'];
                        $_SESSION['estado'] = $buscarVeterinaria['idEstadoVeterinaria'];
                        $_SESSION['nit'] = $buscarVeterinaria['nitVeterinaria'];
                        $_SESSION['nombre'] = $buscarVeterinaria['nombreVeterinaria'];
                        $_SESSION['direccion'] = $buscarVeterinaria['direccionVeterinaria'];
                        $_SESSION['telefono'] = $buscarVeterinaria['telefonoVeterinaria'];
        
                        if ($buscarVeterinaria['idEstadoVeterinaria'] == 1) { // Veterinaria activa
                            echo "<script>
                                alert('Bienvenido Veterinario');
                                window.location.href='../Views/veterinaria.php';
                            </script>";
                        } else { // Veterinaria inactiva
                            echo "<script>
                                alert('Su cuenta está inactiva. Por favor, contacte al administrador.');
                                window.location.href='../Views/Login.html';
                            </script>";
                        }
                    } else { // Clave incorrecta
                        echo "<script>
                            alert('Contraseña incorrecta, vuelva a intentarlo.');
                            window.location.href='../Views/Login.html';
                        </script>";
                    }
                } else {
                    // Si el usuario no está registrado ni en la tabla de usuarios ni en la tabla de veterinarias
                    echo "<script>
                        alert('El usuario ingresado no se encuentra registrado.');
                        window.location.href='../Views/Login.html';
                    </script>";
                }
            }
        }                       
        

        // Función para mostrar los datos de las zonas en el formulario para editarlos
        public function consultarZonaEditar($id){
            $datosZonas = null;

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar en donde se compara el id de la zona que llevamos en la url con el de la db
            $consultarZona = "SELECT * FROM zonas WHERE idZonas=:id";

            $result = $conexion -> prepare($consultarZona);
            $result -> bindParam(':id', $id);

            $result -> execute();

            while ($resultado = $result->fetch()){
                $datosZonas[] = $resultado;
            }
            return $datosZonas;
        }

        public function consultarRol(){
            // Variable que va a almacenar el fetch
            $datoRol=null;

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable
            
            $consultarRol = "SELECT * FROM rol";
            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($consultarRol);

            $result -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $result->fetch()){
                $datoRol[] = $resultado;
            }
            return $datoRol;
        }

        public function consultarSolicitudesProcesoVeterinaria($nitVeterinaria) {
            // Variable que va a almacenar el fetch
            $datosSolicitud = null;

            // Creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            // Definimos la consulta SQL para traer solo las solicitudes en proceso de la veterinaria
            $consultarExamen = "SELECT 
                                    idSolicitud, 
                                    fechaSolicitud,
                                    fechaRecoleccion,  
                                    nombreExamen, 
                                    descripcionUrgencia,
                                    descripcionFase 
                                FROM solicitudes 
                                INNER JOIN veterinaria ON nitVeterinariaSolicitud = nitVeterinaria 
                                INNER JOIN examen ON idExamenSolicitud = idExamen 
                                INNER JOIN nivelurgencia ON idUrgenciaSolicitud = idUrgencia 
                                INNER JOIN fase ON idFaseSolicitud = idFase  
                                WHERE descripcionFase = 'En proceso' 
                                AND nitVeterinariaSolicitud = :nitVeterinaria  "; // Filtramos por el NIT de la veterinaria

            // Preparamos la consulta
            $result = $conexion->prepare($consultarExamen);

            // Enlazamos el parámetro :nitVeterinaria con el valor de la veterinaria de la sesión
            $result->bindParam(":nitVeterinaria", $nitVeterinaria);

            // Ejecutamos la consulta
            $result->execute();

            // Utilizamos un bucle while para almacenar los registros que coinciden con la consulta
            while ($resultado = $result->fetch()) {
                $datosSolicitud[] = $resultado;
            }

            // Devolvemos los resultados
            return $datosSolicitud;
        }

        public function consultarSolicitudesVeterinaria($nitVeterinaria) {
            // Variable que va a almacenar el resultado
            $datosSolicitud = [];
        
            // Creamos el objeto a partir de la clase conexión
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
        
            // Consulta SQL para traer las solicitudes junto con los exámenes asociados
            $consultarExamen = "
                SELECT 
                    solicitudes.idSolicitud, 
                    solicitudes.fechaSolicitud,
                    solicitudes.fechaRecoleccion,
                    GROUP_CONCAT(examen.nombreExamen SEPARATOR ' , ') AS examenes, -- Agrupa los nombres de los exámenes
                    nivelurgencia.descripcionUrgencia,
                    estadosolicitud.descripcionEstadoSolicitud,
                    fase.descripcionFase
                FROM solicitudes
                LEFT JOIN veterinaria ON solicitudes.nitVeterinariaSolicitud = veterinaria.nitVeterinaria
                LEFT JOIN solicitudes_examenes ON solicitudes.idSolicitud = solicitudes_examenes.idSolicitud
                LEFT JOIN examen ON solicitudes_examenes.idExamen = examen.idExamen
                LEFT JOIN nivelurgencia ON solicitudes.idUrgenciaSolicitud = nivelurgencia.idUrgencia
                LEFT JOIN estadosolicitud ON solicitudes.idEstadoSolicitudSoli = estadosolicitud.idEstadoSolicitud
                LEFT JOIN fase ON solicitudes.idFaseSolicitud = fase.idFase
                WHERE solicitudes.nitVeterinariaSolicitud = :nitVeterinaria
                GROUP BY solicitudes.idSolicitud, solicitudes.fechaSolicitud, solicitudes.fechaRecoleccion, 
                nivelurgencia.descripcionUrgencia, estadosolicitud.descripcionEstadoSolicitud, fase.descripcionFase
                ORDER BY solicitudes.fechaSolicitud DESC"; 
        
            // Preparamos la consulta
            $result = $conexion->prepare($consultarExamen);
        
            // Enlazamos el parámetro :nitVeterinaria con el valor proporcionado
            $result->bindParam(":nitVeterinaria", $nitVeterinaria);
        
            // Ejecutamos la consulta
            $result->execute();
        
            // Utilizamos un bucle while para almacenar los registros que coinciden con la consulta
            while ($resultado = $result->fetch(PDO::FETCH_ASSOC)) {
                $datosSolicitud[] = $resultado;
            }
        
            // Devolvemos los resultados
            return $datosSolicitud;
        }
        

        public function consultarSolicitudesVeterinariaEstado($nitVeterinaria) {
            // Variable que va a almacenar el fetch
            $datosSolicitud = null;

            // Creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            // Definimos la consulta SQL para traer solo las solicitudes en proceso de la veterinaria
            $consultarExamen = "SELECT 
                                    idSolicitud, 
                                    fechaSolicitud,
                                    fechaRecoleccion,  
                                    nombreExamen, 
                                    descripcionUrgencia,
                                    descripcionFase 
                                FROM solicitudes 
                                LEFT JOIN veterinaria ON nitVeterinariaSolicitud = nitVeterinaria 
                                LEFT JOIN examen ON idExamenSolicitud = idExamen 
                                LEFT JOIN nivelurgencia ON idUrgenciaSolicitud = idUrgencia
                                LEFT JOIN estadoSolicitud ON idEstadoSolicitudSoli = idEstadoSolicitud
                                LEFT JOIN fase ON idFaseSolicitud = idFase  
                                WHERE nitVeterinariaSolicitud = :nitVeterinaria AND idEstadoSolicitudSoli IS NULL
                                ";

            // Preparamos la consulta
            $result = $conexion->prepare($consultarExamen);

            // Enlazamos el parámetro :nitVeterinaria con el valor de la veterinaria de la sesión
            $result->bindParam(":nitVeterinaria", $nitVeterinaria);

            // Ejecutamos la consulta
            $result->execute();

            // Utilizamos un bucle while para almacenar los registros que coinciden con la consulta
            while ($resultado = $result->fetch()) {
                $datosSolicitud[] = $resultado;
            }

            // Devolvemos los resultados
            return $datosSolicitud;
        }

        public function consultarSolicitudesMotorizado() { 
            // Variable que va a almacenar el fetch
            $datosSolicitud = null;
        
            // Creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
        
            // Definimos la consulta SQL para traer solo las solicitudes en proceso de la veterinaria
            $consultarExamen = "SELECT idSolicitud, fechaSolicitud, fechaRecoleccion, nombreVeterinaria, direccionVeterinaria, telefonoVeterinaria, nombreExamen, descripcionUrgencia, 
                descripcionEstadoSolicitud, descripcionFase 
                FROM solicitudes 
                LEFT JOIN examen ON idExamenSolicitud = idExamen 
                LEFT JOIN nivelurgencia ON idUrgenciaSolicitud = idUrgencia 
                LEFT JOIN Fase ON idFaseSolicitud = idFase 
                LEFT JOIN estadoSolicitud ON idEstadoSolicitudSoli = idEstadoSolicitud 
                LEFT JOIN veterinaria ON nitVeterinariaSolicitud = nitVeterinaria 
                LEFT JOIN zonas ON idZonaVeterinaria = idZonas 
                LEFT JOIN usuarios ON idZonaUsuario = idZonas 
                WHERE idUsuario = :idUsuario AND idZonaUsuario = idZonaVeterinaria AND idFaseSolicitud = 1";
        
            // Preparamos la consulta
            $result = $conexion->prepare($consultarExamen);
        
            // Enlazamos el parámetro :idUsuario con el valor de la sesión del usuario
            $result->bindParam(':idUsuario', $_SESSION['id']);
        
            // Ejecutamos la consulta
            $result->execute();
        
            // Utilizamos un bucle while para almacenar los registros que coinciden con la consulta
            while ($resultado = $result->fetch()) {
                $datosSolicitud[] = $resultado;
            }
        
            // Devolvemos los resultados
            return $datosSolicitud;
        }
        

        public function consultarSolicitudesProcesoMotorizado() {
            // Variable que va a almacenar el fetch
            $datosSolicitud = null;

            // Creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            // Definimos la consulta SQL para traer solo las solicitudes en proceso de la veterinaria
            $consultarExamen = "SELECT idSolicitud, fechaSolicitud, fechaRecoleccion, nombreVeterinaria, direccionVeterinaria, telefonoVeterinaria, nombreExamen, descripcionUrgencia, descripcionEstadoSolicitud, descripcionFase FROM solicitudes LEFT JOIN examen ON idExamenSolicitud = idExamen LEFT JOIN nivelurgencia ON idUrgenciaSolicitud = idUrgencia LEFT JOIN Fase ON idFaseSolicitud = idFase LEFT JOIN estadoSolicitud ON idEstadoSolicitudSoli = idEstadoSolicitud LEFT JOIN veterinaria ON nitVeterinariaSolicitud = nitVeterinaria LEFT JOIN zonas ON idZonaVeterinaria = idZonas LEFT JOIN usuarios ON idZonaUsuario = idZonas WHERE idUsuario = :idUsuario AND idFaseSolicitud = 1 AND idZonaUsuario = idZonaVeterinaria "; // Filtramos por el NIT de la veterinaria

            // Preparamos la consulta
            $result = $conexion->prepare($consultarExamen);

            // Enlazamos el parámetro :idUsuario con el valor de la veterinaria de la sesión
            $result->bindParam(':idUsuario', $_SESSION['id']);
            // $result->bindParam(":idUsuario", $idUsuario);

            // Ejecutamos la consulta
            $result->execute();

            // Utilizamos un bucle while para almacenar los registros que coinciden con la consulta
            while ($resultado = $result->fetch()) {
                $datosSolicitud[] = $resultado;
            }

            // Devolvemos los resultados
            return $datosSolicitud;
        }

        public function consultarSolicitudesRealizadasMotorizado() {
            // Variable que va a almacenar el fetch
            $datosSolicitud = null;

            // Creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            // Definimos la consulta SQL para traer solo las solicitudes en proceso de la veterinaria
            $consultarExamen = "SELECT idSolicitud, fechaSolicitud, fechaRecoleccion, nombreVeterinaria, direccionVeterinaria, telefonoVeterinaria, nombreExamen, descripcionUrgencia, descripcionEstadoSolicitud, descripcionFase FROM solicitudes LEFT JOIN examen ON idExamenSolicitud = idExamen LEFT JOIN nivelurgencia ON idUrgenciaSolicitud = idUrgencia LEFT JOIN Fase ON idFaseSolicitud = idFase LEFT JOIN estadoSolicitud ON idEstadoSolicitudSoli = idEstadoSolicitud LEFT JOIN veterinaria ON nitVeterinariaSolicitud = nitVeterinaria LEFT JOIN zonas ON idZonaVeterinaria = idZonas LEFT JOIN usuarios ON idZonaUsuario = idZonas WHERE idUsuario = :idUsuario AND idFaseSolicitud = 2 AND idZonaUsuario = idZonaVeterinaria "; // Filtramos por el NIT de la veterinaria

            // Preparamos la consulta
            $result = $conexion->prepare($consultarExamen);

            // Enlazamos el parámetro :idUsuario con el valor de la veterinaria de la sesión
            $result->bindParam(':idUsuario', $_SESSION['id']);
            // $result->bindParam(":idUsuario", $idUsuario);

            // Ejecutamos la consulta
            $result->execute();

            // Utilizamos un bucle while para almacenar los registros que coinciden con la consulta
            while ($resultado = $result->fetch()) {
                $datosSolicitud[] = $resultado;
            }

            // Devolvemos los resultados
            return $datosSolicitud;
        }

        public function consultarSolicitudesNoRealizadasMotorizado() {
            // Variable que va a almacenar el fetch
            $datosSolicitud = null;

            // Creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            // Definimos la consulta SQL para traer solo las solicitudes en proceso de la veterinaria
            $consultarExamen = "SELECT idSolicitud, fechaSolicitud, fechaRecoleccion, nombreVeterinaria, direccionVeterinaria, telefonoVeterinaria, nombreExamen, descripcionUrgencia, descripcionEstadoSolicitud, descripcionFase FROM solicitudes LEFT JOIN examen ON idExamenSolicitud = idExamen LEFT JOIN nivelurgencia ON idUrgenciaSolicitud = idUrgencia LEFT JOIN Fase ON idFaseSolicitud = idFase LEFT JOIN estadoSolicitud ON idEstadoSolicitudSoli = idEstadoSolicitud LEFT JOIN veterinaria ON nitVeterinariaSolicitud = nitVeterinaria LEFT JOIN zonas ON idZonaVeterinaria = idZonas LEFT JOIN usuarios ON idZonaUsuario = idZonas WHERE idUsuario = :idUsuario AND idFaseSolicitud = 3 AND idZonaUsuario = idZonaVeterinaria "; // Filtramos por el NIT de la veterinaria

            // Preparamos la consulta
            $result = $conexion->prepare($consultarExamen);

            // Enlazamos el parámetro :idUsuario con el valor de la veterinaria de la sesión
            $result->bindParam(':idUsuario', $_SESSION['id']);
            // $result->bindParam(":idUsuario", $idUsuario);

            // Ejecutamos la consulta
            $result->execute();

            // Utilizamos un bucle while para almacenar los registros que coinciden con la consulta
            while ($resultado = $result->fetch()) {
                $datosSolicitud[] = $resultado;
            }

            // Devolvemos los resultados
            return $datosSolicitud;
        }

        public function consultarResultadosVeterinaria(){
            // Variable que va a almacenar el fetch
            $datos = null;

            // Creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            // Definimos la consulta SQL para traer solo las solicitudes en proceso de la veterinaria
            $consultarResultado = "SELECT  fechaResultado, archivo, idSolicitudResultado, idExamenSolicitud, nombreExamen FROM resultados LEFT JOIN solicitudes ON idSolicitudResultado = idSolicitud LEFT JOIN examen ON idExamenSolicitud = idExamen WHERE nitVeterinariaSolicitud = :nitVet  "; 

            // Preparamos la consulta
            $result = $conexion->prepare($consultarResultado);

            // Enlazamos el parámetro :nitVet 
            $result->bindParam(':nitVet', $_SESSION['nit']);
            

            // Ejecutamos la consulta
            $result->execute();

            // Utilizamos un bucle while para almacenar los registros que coinciden con la consulta
            while ($resultado = $result->fetch()) {
                $datos[] = $resultado;
            }

            // Devolvemos los resultados
            return $datos;
        }

        
    }


?>