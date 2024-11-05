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
        
            $consultar = "SELECT * FROM usuarios WHERE idUsuario = :idUsuario";
            $result = $conexion->prepare($consultar);
        
            $result->bindParam(":idUsuario", $idUsuario);
            $result->execute();
        
            // Se valida si el usuario existe en la base de datos
            if ($buscar = $result->fetch()) {
                // Validamos la clave
                if ($clave == $buscar['claveUsuario']) {
                    // Inicio de sesión
                    session_start();  // Es importante llamar session_start() aquí también.
        
                    // Creamos variables de sesión
                    $_SESSION['id'] = $buscar['idUsuario'];  // El idUsuario debería ser el valor correcto.
                    $_SESSION['rol'] = $buscar['idRolUsuario'];  // Asegúrate de que 'idRolUsuario' es el nombre correcto.
                    $_SESSION['estado'] = $buscar['idEstadoUsuario'];  // Similar a lo anterior.
        
                    // Validamos el rol para redireccionamiento
                    if ($buscar['idRolUsuario'] == 1 && $buscar['idEstadoUsuario'] == 1) {
                        echo "<script> alert ('Bienvenido Administrador')</script>";
                        echo "<script>location.href='../Views/Administrador.php'</script>"; // Redirige al Administrador
                    }
                    if ($buscar['idRolUsuario'] == 2 && $buscar['idEstadoUsuario'] == 1) {
                        echo "<script> alert ('Bienvenido Motorizado')</script>";
                        echo "<script>location.href='../Views/InmoDashboard.html'</script>"; // Redirige al Motorizado
                    }
                    if ($buscar['idRolUsuario'] == 3 && $buscar['idEstadoUsuario'] == 1) {
                        echo "<script> alert ('Bienvenido Bioanalista')</script>";
                        echo "<script>location.href='../Views/InmoDashboard.html'</script>"; // Redirige al Bioanalista
                    }
                } else {
                    // Si la contraseña no coincide
                    echo "<script> alert ('Contraseña incorrecta, vuelva a intentarlo')</script>";
                    echo "<script>location.href='../Views/Login.html'</script>";
                }
            } else {
                // Si el usuario no existe o no está activo
                echo "<script> alert ('El usuario ingresado no se encuentra registrado o no se encuentra activo')</script>";
                echo "<script>location.href='../Views/Login.html'</script>";
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


        
    }


?>