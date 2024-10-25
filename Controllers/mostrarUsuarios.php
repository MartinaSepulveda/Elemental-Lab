<?php

    function cargarUsuarios(){
        //creamos el objeto a partir de la clase conexion
        $objConsultas = new Consultas();
        $usuarios = $objConsultas -> consultarUsuarios();

        // Se verifica si $usuarios esta vacia con empty
        if(empty($usuarios)){
            echo "<h2> No hay usuarios registrados <h2/>";
        }
        else{
            foreach ($usuarios as $datosUsuarios ){
                //pintar o maquetar la informacion de la tabla 
                echo'
                <tr>
                    <td>'.$datosUsuarios['nombreCompleto'].'</td>
                    <td>'.$datosUsuarios['idUsuario'].'</td>
                    <td>'.$datosUsuarios['telefonoUsuario'].'</td>
                    <td>'.$datosUsuarios['descripcionRol'].'</td>
                    <td>'.$datosUsuarios['correoUsuario'].'</td>
                    <td>'.$datosUsuarios['descripcionEstado'].'</td>
                    <td>
                        <select>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </td>
                </tr>

                ';
            }
        }
    }

?>