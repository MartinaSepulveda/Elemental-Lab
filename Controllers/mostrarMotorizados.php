<?php
    require_once("mostrarZonasSelect.php");

    function cargarMotorizados(){
        $objConsultas = new Consultas();
        $motorizado = $objConsultas -> consultarMotorizados();

        if(empty($motorizado)){
            echo "<h3>No hay motorizados activos por asignar zona</h2>";
        }
        else{
            foreach ($motorizado as $datosMotorizado ){
                echo '
                <tr>
                    <td>'.$datosMotorizado['nombreCompleto'].'</td>
                    <td>'.$datosMotorizado['idUsuario'].'</td>
                    <td>'.$datosMotorizado['telefonoUsuario'].'</td>
                    <td>'.$datosMotorizado['correoUsuario'].'</td>
                    <td>
                    <form method="POST" action="../Controllers/asignarZona.php"> 
                        <select name="zona" id="zona">
                            <option value="">Seleccione una zona</option>';
                            
                            cargarZonasSelect(); 
                echo '
                        </select>
                        <input type="hidden" name="idUsuario" value="'. $datosMotorizado['idUsuario'].'">
                        <button type="submit">Guardar Zona</button>
                    </form>
                </td>
                </tr>
                ';
            }
        }
    }

?>