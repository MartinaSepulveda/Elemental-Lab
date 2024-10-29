<?php

    function cargarMotorizadosZonas(){
        $objConsultas = new Consultas();
        $motorizado = $objConsultas -> consultarMotorizadosZona();

        if(empty($motorizado)){
            echo "<h2>No hay motorizados activos por asignar zona</h2>";
        }
        else{
            foreach ($motorizado as $datosMotorizado ){
                echo '
                <tr>
                    <td>'.$datosMotorizado['nombreCompleto'].'</td>
                    <td>'.$datosMotorizado['idUsuario'].'</td>
                    <td>'.$datosMotorizado['telefonoUsuario'].'</td>
                    <td>'.$datosMotorizado['descripcionZonas'].'</td>
                    <td>
                    <a href="administrador-editarZonasAsignadas.php">
                        <button class="btn btn-primary btn-sm" title="Editar">
                        <i class="bi bi-pencil"></i>
                        </button>
                    </a>
                    <a href="../Controllers/eliminarZonaAsignada.php?id='.$datosMotorizado['idUsuario'].'">
                        <button class="btn btn-danger btn-sm" title="Borrar">
                        <i class="bi bi-trash"></i>
                        </button>
                    </a>
                    </td>
                </tr>
                ';
            }
        }
    }

?>