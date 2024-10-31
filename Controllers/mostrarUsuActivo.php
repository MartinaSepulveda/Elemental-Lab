<?php

    function cargarUsuarioActivo(){
        //creamos el objeto a partir de la clase conexion
        $objConsultas = new Consultas();
        $resultados = $objConsultas->consultarUsuariosActivos();

        // Cargar usuarios
        $usuariosAc = $resultados['usuarios'];
        $veterinariasAc = $resultados['veterinarias'];

        // Se verifica si $usuarioActivo esta vacia con empty
        if(empty($usuariosAc)){
            echo "<h3> No hay empleados activos <h3/>";
        }
        else{
            foreach ($usuariosAc as $datosUsuarioActivo ){
                //pintar o maquetar la informacion de la tabla 
                echo'
                <tr>
                    <td>'.$datosUsuarioActivo['nombreCompleto'].'</td>
                    <td>'.$datosUsuarioActivo['idUsuario'].'</td>
                    <td>'.$datosUsuarioActivo['telefonoUsuario'].'</td>
                    <td>'.$datosUsuarioActivo['descripcionRol'].'</td>
                    <td>'.$datosUsuarioActivo['correoUsuario'].'</td>
                    <td>'.$datosUsuarioActivo['descripcionEstado'].'</td>
                    <td>
                        <form method="POST" action="../Controllers/asignarEstadoUsuarios.php">
                            <input type="hidden" name="idUsuario" value="'.$datosUsuarioActivo['idUsuario'].'">
                            <select name="estado">
                                <option value="2">Inactivo</option>
                            </select>
                            <button type="submit">Guardar</button>
                        </form>
                    </td>
                </tr>
                ';
            }
        }


            // Mostrar veterinarias
        if (empty($veterinariasAc)) {
            echo "<h3>No hay veterinarias activas</h2>";
        } else {
            foreach ($veterinariasAc as $datosVeterinaria) {
                echo '
                <tr>
                    <td>' . $datosVeterinaria['nombreVeterinaria'] . '</td>
                    <td>' . $datosVeterinaria['nitVeterinaria'] . '</td>
                    <td>' . $datosVeterinaria['telefonoVeterinaria'] . '</td>
                    <td> Veterinaria </td>
                    <td>' . $datosVeterinaria['correoVeterinaria'] . '</td>
                    <td>' . $datosVeterinaria['descripcionEstado'] . '</td>
                    <td>
                        <form method="POST" action="../Controllers/asignarEstadoVeterinaria.php">
                            <input type="hidden" name="nit" value="'.$datosVeterinaria['nitVeterinaria'].'">
                            <select name="estado">
                                <option value="2">Inactivo</option>
                            </select>
                            <button type="submit">Guardar</button>
                        </form>
                    </td>
                </tr>';
            }
        }
    }

?>