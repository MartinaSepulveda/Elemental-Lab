<?php

    function cargarSolicitudesProceso(){
        //creamos el objeto a partir de la clase conexion
        $objConsultas = new Consultas();
        $solicitudes = $objConsultas -> consultarSolicitudesProceso();

        // Se verifica si $solicitudes esta vacia con empty
        if(empty($solicitudes)){
            echo "<h3> No hay solicitudes registradas <h3/>";
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
            echo "<h3> No hay solicitudes registradas <h3/>";
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
            echo "<h3> No hay solicitudes registradas <h3/>";
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

    function cargarSolicitudesProcesoVeterinaria() {
        // Verificamos que la veterinaria esté autenticada y que su NIT esté en la sesión
        if (isset($_SESSION['nit'])) {
            $nitVeterinaria = $_SESSION['nit']; // Obtenemos el NIT de la veterinaria desde la sesión
    
            // Creamos el objeto a partir de la clase Consultas
            $objConsultas = new Consultas();
    
            // Llamamos al método y pasamos el NIT de la veterinaria para filtrar las solicitudes
            $solicitudes = $objConsultas->consultarSolicitudesProcesoVeterinaria($nitVeterinaria);
    
            // Verificamos si $solicitudes está vacía
            if (empty($solicitudes)) {
                echo "<h3>No hay solicitudes registradas para esta veterinaria.</h3>";
            } else {
                // Mostramos las solicitudes en la tabla
                foreach ($solicitudes as $datossolicitudes) {
                    echo '
                    <tr>
                        <td>' . $datossolicitudes['idSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaRecoleccion'] . '</td>
                        <td>' . $datossolicitudes['nombreExamen'] . '</td>
                        <td>' . $datossolicitudes['descripcionUrgencia'] . '</td>
                        <td>' . $datossolicitudes['descripcionFase'] . '</td>
                        <td>
                            <!-- Botones de acción -->
                            <form method="POST" action="../Controllers/confirmarFaseVeterinaria.php">
                                <input type="hidden" name="idSolicitud" value="' . $datossolicitudes['idSolicitud'] . '">
                                <button type="submit" name="fase" value="2" class="btn btn-success">Realizada</button>
                                <button type="submit" name="fase" value="3" class="btn btn-danger">No Realizada</button>
                            </form>
                        </td>
                    </tr>
                    ';
                }
            }
        } else {
            // Si no hay una sesión activa para la veterinaria, mostramos un mensaje de error
            echo "<h3>Debe iniciar sesión para ver las solicitudes.</h3>";
        }
    }

    function cargarSolicitudesVeterinaria() {
        // Verificamos que la veterinaria esté autenticada y que su NIT esté en la sesión
        if (isset($_SESSION['nit'])) {
            $nitVeterinaria = $_SESSION['nit']; // Obtenemos el NIT de la veterinaria desde la sesión
    
            // Creamos el objeto a partir de la clase Consultas
            $objConsultas = new Consultas();
    
            // Llamamos al método y pasamos el NIT de la veterinaria para filtrar las solicitudes
            $solicitudes = $objConsultas->consultarSolicitudesVeterinaria($nitVeterinaria);
    
            // Verificamos si $solicitudes está vacía
            if (empty($solicitudes)) {
                echo "<h3>No hay solicitudes registradas para esta veterinaria.</h3>";
            } else {
                // Mostramos las solicitudes en la tabla
                foreach ($solicitudes as $datossolicitudes) {
                    echo '
                    <tr>
                        <td>' . $datossolicitudes['idSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaRecoleccion'] . '</td>
                        <td>' . $datossolicitudes['examenes'] . '</td>
                        <td>' . $datossolicitudes['descripcionUrgencia'] . '</td>
                        <td>' . $datossolicitudes['descripcionEstadoSolicitud'] . '</td>
                        <td>' . $datossolicitudes['descripcionFase'] . '</td>
                    </tr>
                    ';
                }
            }
        } else {
            // Si no hay una sesión activa para la veterinaria, mostramos un mensaje de error
            echo "<h3>Debe iniciar sesión para ver las solicitudes.</h3>";
        }
    }

    function cargarSolicitudesVeterinariaEstado() {
        // Verificamos que la veterinaria esté autenticada y que su NIT esté en la sesión
        if (isset($_SESSION['nit'])) {
            $nitVeterinaria = $_SESSION['nit']; // Obtenemos el NIT de la veterinaria desde la sesión
    
            // Creamos el objeto a partir de la clase Consultas
            $objConsultas = new Consultas();
    
            // Llamamos al método y pasamos el NIT de la veterinaria para filtrar las solicitudes
            $solicitudes = $objConsultas->consultarSolicitudesVeterinariaEstado($nitVeterinaria);
    
            // Verificamos si $solicitudes está vacía
            if (empty($solicitudes)) {
                echo "<h3>No hay solicitudes registradas para esta veterinaria.</h3>";
            } else {
                // Mostramos las solicitudes en la tabla
                foreach ($solicitudes as $datossolicitudes) {
                    echo '
                    <tr>
                        <td>' . $datossolicitudes['idSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaRecoleccion'] . '</td>
                        <td>' . $datossolicitudes['nombreExamen'] . '</td>
                        <td>' . $datossolicitudes['descripcionUrgencia'] . '</td>
                        <td>
                            <!-- Botón Cancelar -->
                            <button class="table-button cancelar" onclick="cancelarSolicitud('.$datossolicitudes['idSolicitud'].')">
                                Cancelar
                            </button>

                            <!-- Botón Reprogramar -->
                            <button class="table-button reprogramar" onclick="reprogramarSolicitud('.$datossolicitudes['idSolicitud'].')">
                                Reprogramar solicitud
                            </button>
                        </td>

                    </tr>
                    ';
                }
            }
        } else {
            // Si no hay una sesión activa para la veterinaria, mostramos un mensaje de error
            echo "<h3>Debe iniciar sesión para ver las solicitudes.</h3>";
        }
    }

    function cargarSolicitudesMotorizado() { //Motorizado Solicitudes
        // Verificamos que la veterinaria esté autenticada y que su NIT esté en la sesión
        if (isset($_SESSION['id'])) {
            $idUsuario = $_SESSION['id'];  // Obtenemos el id del usuario desde la sesión
    
            // Creamos el objeto a partir de la clase Consultas
            $objConsultas = new Consultas();
    
            // Llamamos al método y pasamos el NIT de la veterinaria para filtrar las solicitudes
            $solicitudes = $objConsultas->consultarSolicitudesMotorizado($idUsuario);
    
            // Verificamos si $solicitudes está vacía
            if (empty($solicitudes)) {
                echo "<h3>No hay solicitudes registradas por mostrar.</h3>";
            } else {
                // Mostramos las solicitudes en la tabla
                foreach ($solicitudes as $datossolicitudes) {

                    $estadoSolicitud = empty($datossolicitudes['descripcionEstadoSolicitud']) ? '--' : $datossolicitudes['descripcionEstadoSolicitud'];

                    echo '
                    <tr>
                        <td>' . $datossolicitudes['idSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaRecoleccion'] . '</td>
                        <td>' . $datossolicitudes['nombreVeterinaria'] . '</td>
                        <td>' . $datossolicitudes['direccionVeterinaria'] . '</td>
                        <td>' . $datossolicitudes['telefonoVeterinaria'] . '</td>
                        <td>' . $datossolicitudes['nombreExamen'] . '</td>
                        <td>' . $datossolicitudes['descripcionUrgencia'] . '</td>
                        <td>' . $estadoSolicitud . '</td>
                        <td>' . $datossolicitudes['descripcionFase'] . '</td>
                    </tr>
                    ';
                }
            }
        } else {
            // Si no hay una sesión activa para la veterinaria, mostramos un mensaje de error
            echo "<h3>Debe iniciar sesión para ver las solicitudes.</h3>";
        }
    }

    function cargarSolicitudesProcesoMotorizado() { 
        
        if (isset($_SESSION['id'])) {
            $idUsuario = $_SESSION['id']; 
    
            // Creamos el objeto a partir de la clase Consultas
            $objConsultas = new Consultas();
    
            // Llamamos al método y pasamos el NIT de la veterinaria para filtrar las solicitudes
            $solicitudes = $objConsultas->consultarSolicitudesProcesoMotorizado($idUsuario);
    
            // Verificamos si $solicitudes está vacía
            if (empty($solicitudes)) {
                echo "<h3>No hay solicitudes registradas por mostrar.</h3>";
            } else {
                // Mostramos las solicitudes en la tabla
                foreach ($solicitudes as $datossolicitudes) {
                    $estadoSolicitud = empty($datossolicitudes['descripcionEstadoSolicitud']) ? '--' : $datossolicitudes['descripcionEstadoSolicitud'];
                    echo '
                    <tr>
                        <td>' . $datossolicitudes['idSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaRecoleccion'] . '</td>
                        <td>' . $datossolicitudes['nombreVeterinaria'] . '</td>
                        <td>' . $datossolicitudes['direccionVeterinaria'] . '</td>
                        <td>' . $datossolicitudes['telefonoVeterinaria'] . '</td>
                        <td>' . $datossolicitudes['nombreExamen'] . '</td>
                        <td>' . $datossolicitudes['descripcionUrgencia'] . '</td>
                        <td>' . $estadoSolicitud . '</td>
                        
                        <td>
                            <!-- Botones de acción -->
                            <form method="POST" action="../Controllers/confirmarFaseMotorizado.php">
                                <input type="hidden" name="idSolicitud" value="' . $datossolicitudes['idSolicitud'] . '">
                                <button type="submit" name="fase" value="2" class="btn btn-success">Realizada</button>
                                <button type="submit" name="fase" value="3" class="btn btn-danger">No Realizada</button>
                            </form>
                        </td>
                    </tr>
                    ';
                }
            }
        } else {
            // Si no hay una sesión activa para la veterinaria, mostramos un mensaje de error
            echo "<h3>Debe iniciar sesión para ver las solicitudes.</h3>";
        }
    }

    function cargarSolicitudesRealizadasMotorizado() { 
        
        if (isset($_SESSION['id'])) {
            $idUsuario = $_SESSION['id']; 
    
            // Creamos el objeto a partir de la clase Consultas
            $objConsultas = new Consultas();
    
            // Llamamos al método y pasamos el NIT de la veterinaria para filtrar las solicitudes
            $solicitudes = $objConsultas->consultarSolicitudesRealizadasMotorizado($idUsuario);
    
            // Verificamos si $solicitudes está vacía
            if (empty($solicitudes)) {
                echo "<h3>No hay solicitudes registradas por mostrar..</h3>";
            } else {
                // Mostramos las solicitudes en la tabla
                foreach ($solicitudes as $datossolicitudes) {
                    $estadoSolicitud = empty($datossolicitudes['descripcionEstadoSolicitud']) ? '--' : $datossolicitudes['descripcionEstadoSolicitud'];
                    echo '
                    <tr>
                        <td>' . $datossolicitudes['idSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaRecoleccion'] . '</td>
                        <td>' . $datossolicitudes['nombreVeterinaria'] . '</td>
                        <td>' . $datossolicitudes['direccionVeterinaria'] . '</td>
                        <td>' . $datossolicitudes['telefonoVeterinaria'] . '</td>
                        <td>' . $datossolicitudes['nombreExamen'] . '</td>
                        <td>' . $datossolicitudes['descripcionUrgencia'] . '</td>
                        <td>' . $estadoSolicitud . '</td>
                        <td>' . $datossolicitudes['descripcionFase'] . '</td>
                    </tr>
                    ';
                }
            }
        } else {
            // Si no hay una sesión activa para la veterinaria, mostramos un mensaje de error
            echo "<h3>Debe iniciar sesión para ver las solicitudes.</h3>";
        }
    }

    function cargarSolicitudesNoRealizadasMotorizado() { 
        
        if (isset($_SESSION['id'])) {
            $idUsuario = $_SESSION['id']; 
    
            // Creamos el objeto a partir de la clase Consultas
            $objConsultas = new Consultas();
    
            // Llamamos al método y pasamos el NIT de la veterinaria para filtrar las solicitudes
            $solicitudes = $objConsultas->consultarSolicitudesNoRealizadasMotorizado($idUsuario);
    
            // Verificamos si $solicitudes está vacía
            if (empty($solicitudes)) {
                echo "<h3>No hay solicitudes registradas por mostrar.</h3>";
            } else {
                // Mostramos las solicitudes en la tabla
                foreach ($solicitudes as $datossolicitudes) {
                    $estadoSolicitud = empty($datossolicitudes['descripcionEstadoSolicitud']) ? '--' : $datossolicitudes['descripcionEstadoSolicitud'];
                    echo '
                    <tr>
                        <td>' . $datossolicitudes['idSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaSolicitud'] . '</td>
                        <td>' . $datossolicitudes['fechaRecoleccion'] . '</td>
                        <td>' . $datossolicitudes['nombreVeterinaria'] . '</td>
                        <td>' . $datossolicitudes['direccionVeterinaria'] . '</td>
                        <td>' . $datossolicitudes['telefonoVeterinaria'] . '</td>
                        <td>' . $datossolicitudes['nombreExamen'] . '</td>
                        <td>' . $datossolicitudes['descripcionUrgencia'] . '</td>
                        <td>' . $estadoSolicitud . '</td>
                        <td>' . $datossolicitudes['descripcionFase'] . '</td>
                    </tr>
                    ';
                }
            }
        } else {
            // Si no hay una sesión activa para la veterinaria, mostramos un mensaje de error
            echo "<h3>Debe iniciar sesión para ver las solicitudes.</h3>";
        }
    }


    

?>
<script>
function cancelarSolicitud(idSolicitud) {
    if (confirm("¿Estás seguro de que deseas cancelar esta solicitud?")) {
        // Redirige a un archivo PHP que maneje la cancelación
        window.location.href = "../Controllers/cancelarSolicitud.php?idSolicitud=" + idSolicitud;
    }
}

function reprogramarSolicitud(idSolicitud) {
    // Aquí podrías redirigir a un formulario para reprogramar la solicitud
    window.location.href = "reprogramar_solicitud.php?idSolicitud=" + idSolicitud;
}
</script>
