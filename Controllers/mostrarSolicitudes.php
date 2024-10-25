<?php

    function cargarSolicitudesProceso(){
        //creamos el objeto a partir de la clase conexion
        $objConsultas = new Consultas();
        $solicitudes = $objConsultas -> consultarSolicitudesProceso();

        // Se verifica si $solicitudes esta vacia con empty
        if(empty($solicitudes)){
            echo "<h2> No hay solicitudes registradas <h2/>";
        }
        else{
            foreach ($solicitudes as $datossolicitudes ){
                //pintar o maquetar la informacion de la tabla 
                echo'

                <tr>
                    <td>'.$datossolicitudes['nombreVeterinaria'].'</td>
                    <td>'.$datossolicitudes['direccionVeterinaria'].'</td>
                    <td>'.$datossolicitudes['telefonoVeterinaria'].'</td>
                    <td>'.$datossolicitudes['nombreExamen'].'</td>
                    <td>'.$datossolicitudes['descripcionUrgencia'].'</td>
                    <td>'.$datossolicitudes['descripcionFase'].'</td>
                    <td>'.$datossolicitudes['descripcionEstadoSolicitud'].'</td>
                </tr>
                ';
            }
        }
    }

    function cargarSolicitudesRealizadas(){
        //creamos el objeto a partir de la clase conexion
        $objConsultas = new Consultas();
        $solicitudes = $objConsultas -> consultarSolicitudesRealizadas();

        // Se verifica si $solicitudes esta vacia con empty
        if(empty($solicitudes)){
            echo "<h2> No hay solicitudes registradas <h2/>";
        }
        else{
            foreach ($solicitudes as $datossolicitudes ){
                //pintar o maquetar la informacion de la tabla 
                echo'

                <tr>
                    <td>'.$datossolicitudes['nombreVeterinaria'].'</td>
                    <td>'.$datossolicitudes['direccionVeterinaria'].'</td>
                    <td>'.$datossolicitudes['telefonoVeterinaria'].'</td>
                    <td>'.$datossolicitudes['nombreExamen'].'</td>
                    <td>'.$datossolicitudes['descripcionUrgencia'].'</td>
                    <td>'.$datossolicitudes['descripcionFase'].'</td>
                    <td>'.$datossolicitudes['descripcionEstadoSolicitud'].'</td>
                </tr>
                ';
            }
        }
    }

    function cargarSolicitudesNoRealizadas(){
        //creamos el objeto a partir de la clase conexion
        $objConsultas = new Consultas();
        $solicitudes = $objConsultas -> consultarSolicitudesNoRealizadas();

        // Se verifica si $solicitudes esta vacia con empty
        if(empty($solicitudes)){
            echo "<h2> No hay solicitudes registradas <h2/>";
        }
        else{
            foreach ($solicitudes as $datossolicitudes ){
                //pintar o maquetar la informacion de la tabla 
                echo'

                <tr>
                    <td>'.$datossolicitudes['nombreVeterinaria'].'</td>
                    <td>'.$datossolicitudes['direccionVeterinaria'].'</td>
                    <td>'.$datossolicitudes['telefonoVeterinaria'].'</td>
                    <td>'.$datossolicitudes['nombreExamen'].'</td>
                    <td>'.$datossolicitudes['descripcionUrgencia'].'</td>
                    <td>'.$datossolicitudes['descripcionFase'].'</td>
                    <td>'.$datossolicitudes['descripcionEstadoSolicitud'].'</td>
                </tr>
                ';
            }
        }
    }


?>