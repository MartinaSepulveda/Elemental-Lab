<?php

    function cargarUsuarioInactivo(){
        //creamos el objeto a partir de la clase conexion
        $objConsultas = new Consultas();
        $resultados = $objConsultas -> consultarUsuariosInactivos();

        // Cargar usuarios
        $usuariosIna = $resultados['usuarios'];
        $veterinariasIna = $resultados['veterinarias'];

        // Se verifica si $usuarioInactivo esta vacia con empty
        if(empty($usuariosIna)){
            echo "<h3> No hay usuarios inactivos registrados <h3/>";
        }
        else{
            foreach ($usuariosIna as $datosUsuarioInactivo ){
                //pintar o maquetar la informacion de la tabla 
                echo'
                <tr>
                    <td>'.$datosUsuarioInactivo['nombreCompleto'].'</td>
                    <td>'.$datosUsuarioInactivo['idUsuario'].'</td>
                    <td>'.$datosUsuarioInactivo['telefonoUsuario'].'</td>
                    <td>'.$datosUsuarioInactivo['descripcionRol'].'</td>
                    <td>'.$datosUsuarioInactivo['correoUsuario'].'</td>
                    <td>'.$datosUsuarioInactivo['descripcionEstado'].'</td>
                    <td>
                        <form method="POST" action="../Controllers/asignarEstadoUsuarios.php">
                            <input type="hidden" name="idUsuario" value="'.$datosUsuarioInactivo['idUsuario'].'">
                            <select name="estado">
                                <option value="1">Activo</option>
                            </select>
                            <button type="submit">Guardar</button>
                        </form>
                    </td>
                </tr>
                ';
            }
        }

        // Mostrar veterinarias
        if (empty($veterinariasIna)) {
            echo "<h3>No hay veterinarias Inactivas</h2>";
        } else {
            foreach ($veterinariasIna as $datosVeterinaria) {
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
                                <option value="1">Activo</option>
                            </select>
                            <button type="submit">Guardar</button>
                        </form>
                    </td>
                </tr>';
            }
        }
    }

?>