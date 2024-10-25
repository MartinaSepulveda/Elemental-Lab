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


        public function consultarUsuariosActivos(){
            // Variable que va a almacenar el fetch
            $usuarioActivo=null;

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable
            
            $consultarUsuActivo = "SELECT CONCAT (nombresUsuario, ' ', apellidosUsuario) AS nombreCompleto, idUsuario ,telefonoUsuario, descripcionRol, correoUsuario, descripcionEstado FROM usuarios INNER JOIN rol ON idRolUsuario=idRol INNER JOIN estado ON idEstadoUsuario=IdEstado WHERE idEstadoUsuario = 1 ";
            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($consultarUsuActivo);

            $result -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $result->fetch()){
                $usuarioActivo[] = $resultado;
            }
            return $usuarioActivo;
        }

        public function consultarUsuariosInactivos(){
            // Variable que va a almacenar el fetch
            $usuarioInactivo=null;

            //creamos el objeto a partir de la clase conexion
            $objConexion = new Conexion();
            $conexion =$objConexion -> get_conexion();

            // Definimos la consulta SQL a ejecutar y la guardamos en una variable
            
            $consultarUsuInactivo = "SELECT CONCAT (nombresUsuario, ' ', apellidosUsuario) AS nombreCompleto, idUsuario ,telefonoUsuario, descripcionRol, correoUsuario, descripcionEstado FROM usuarios INNER JOIN rol ON idRolUsuario=idRol INNER JOIN estado ON idEstadoUsuario=IdEstado WHERE idEstadoUsuario = 2 ";
            // Preparamos lo necesario para ejecutar la consulta de SQL guardada en la anterior variable
            $result = $conexion -> prepare($consultarUsuInactivo);

            $result -> execute();

            //Utilizamos un bucle while para mostrar los registros que existan en la base de datos(DB)

            while ($resultado = $result->fetch()){
                $usuarioInactivo[] = $resultado;
            }
            return $usuarioInactivo;
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



        
    }


?>