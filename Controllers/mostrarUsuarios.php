<?php

    function cargarUsuarios(){
        $objConsultas = new Consultas();
        $usuarios = $objConsultas -> consultarUsuarios();

        if(empty($usuarios)){
            echo "<h2>No hay usuarios registrados</h2>";
        }
        else{
            foreach ($usuarios as $datosUsuarios ){
                echo '
                <tr>
                    <td>'.$datosUsuarios['nombreCompleto'].'</td>
                    <td>'.$datosUsuarios['idUsuario'].'</td>
                    <td>'.$datosUsuarios['telefonoUsuario'].'</td>
                    <td>'.$datosUsuarios['descripcionRol'].'</td>
                    <td>'.$datosUsuarios['correoUsuario'].'</td>
                    <td>
                        <form method="POST" action="../Controllers/asignarEstadoUsuarios.php">
                            <input type="hidden" name="idUsuario" value="'.$datosUsuarios['idUsuario'].'">
                            <select name="estado">
                                <option value="1">Activo</option>
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