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
                    $_SESSION['id'] = $buscarUsuario['idUsuario'];
                    $_SESSION['rol'] = $buscarUsuario['idRolUsuario'];
                    $_SESSION['estado'] = $buscarUsuario['idEstadoUsuario'];
                    
                    // Validación de rol y estado activo
                    if ($buscarUsuario['idEstadoUsuario'] == 1) {  // Si el usuario está activo
                        if ($buscarUsuario['idRolUsuario'] == 1) {
                            echo "<script> alert('Bienvenido Administrador')</script>";
                            echo "<script>location.href='../Views/Administrador.php'</script>";
                        } elseif ($buscarUsuario['idRolUsuario'] == 2) {
                            echo "<script> alert('Bienvenido Motorizado')</script>";
                            echo "<script>location.href='../Views/motorizado-solicitudes.php'</script>";
                        } elseif ($buscarUsuario['idRolUsuario'] == 3) {
                            echo "<script> alert('Bienvenido Bioanalista')</script>";
                            echo "<script>location.href='../Views/InmoDashboard.html'</script>";
                        }
                    } elseif ($buscarUsuario['idEstadoUsuario'] == 2) {
                        // Si el usuario está inactivo
                        echo "<script> alert('Su cuenta está inactiva. Por favor, contacte al administrador.')</script>";
                        echo "<script>location.href='../Views/Login.html'</script>";
                    }
                } else {
                    echo "<script> alert('Contraseña incorrecta, vuelva a intentarlo')</script>";
                    echo "<script>location.href='../Views/Login.html'</script>";
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
                        $_SESSION['id'] = $buscarVeterinaria['nitVeterinaria'];
                        $_SESSION['estado'] = $buscarVeterinaria['idEstadoVeterinaria'];
                        // Guardar los datos de la veterinaria en la sesión
                        $_SESSION['nit'] = $buscarVeterinaria['nitVeterinaria'];
                        $_SESSION['nombre'] = $buscarVeterinaria['nombreVeterinaria'];
                        $_SESSION['direccion'] = $buscarVeterinaria['direccionVeterinaria'];
                        $_SESSION['telefono'] = $buscarVeterinaria['telefonoVeterinaria'];

                        // Redirección para la veterinaria activa
                        if ($buscarVeterinaria['idEstadoVeterinaria'] == 1) {
                            echo "<script> alert ('Bienvenido Veterinario')</script>";
                            echo "<script>location.href='../Views/veterinaria.php'</script>";
                        }
                    } else {
                        echo "<script> alert ('Contraseña incorrecta, vuelva a intentarlo')</script>";
                        echo "<script>location.href='../Views/Login.html'</script>";
                    }
                } else {
                    echo "<script> alert ('El usuario ingresado no se encuentra registrado o no se encuentra activo')</script>";
                    echo "<script>location.href='../Views/Login.html'</script>";
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
                                AND nitVeterinariaSolicitud = :nitVeterinaria AND confirmadoPorVeterinario IS NULL "; // Filtramos por el NIT de la veterinaria

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

        public function consultarSolicitudesProcesoMotorizado($idUsuario) {
            // Variable que va a almacenar el fetch
            $datosSolicitud = null;

            // Creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            // Definimos la consulta SQL para traer solo las solicitudes en proceso de la veterinaria
            $consultarExamen = " poner consulta xd"; // Filtramos por el NIT de la veterinaria

            // Preparamos la consulta
            $result = $conexion->prepare($consultarExamen);

            // Enlazamos el parámetro :idUsuario con el valor de la veterinaria de la sesión
            $result->bindParam(":idUsuario", $idUsuario);

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
                                    descripcionEstadoSolicitud, 
                                    descripcionFase 
                                FROM solicitudes 
                                LEFT JOIN veterinaria ON nitVeterinariaSolicitud = nitVeterinaria 
                                LEFT JOIN examen ON idExamenSolicitud = idExamen 
                                LEFT JOIN nivelurgencia ON idUrgenciaSolicitud = idUrgencia
                                LEFT JOIN estadoSolicitud ON idEstadoSolicitudSoli = idEstadoSolicitud
                                LEFT JOIN fase ON idFaseSolicitud = idFase  
                                WHERE nitVeterinariaSolicitud = :nitVeterinaria
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
        
    }


?>