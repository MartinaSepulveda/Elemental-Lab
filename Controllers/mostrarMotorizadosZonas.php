<?php

    function cargarMotorizadosZonas(){
        $objConsultas = new Consultas();
        $motorizado = $objConsultas -> consultarMotorizadosZona();

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
                    <td>'.$datosMotorizado['descripcionZonas'].'</td>
                    <td class="action-buttons">
                    <a href="administrador-editarZonasAsignadas.php">
                        <button class="btn btn-primary btn-sm" title="Editar">
                        <i class="bi bi-pencil"></i>
                        </button>
                    </a>
                    <!-- Botón Eliminar -->
                    <button class="btn btn-danger btn-sm table-button eliminar" 
                            title="Borrar" 
                            onclick="eliminarZonaAsignada('. $datosMotorizado['idUsuario'].')">
                        <i class="bi bi-trash"></i>
                    </button>
                    
                    </td>
                </tr>
                ';
            }
        }
    }

    
?>
<script>
    function eliminarZonaAsignada(idUsuario) {
        // Mostrar confirmación antes de eliminar
        if (confirm("¿Estás seguro de que deseas eliminar esta zona asignada?")) {
            // Hacer la llamada al backend para realizar la eliminación
            window.location.href = '../Controllers/eliminarZonaAsignada.php?id=' + idUsuario;
        }
    }

</script>