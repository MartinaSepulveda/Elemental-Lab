<?php

    function cargarUsuarioInactivo(){
        //creamos el objeto a partir de la clase conexion
        $objConsultas = new Consultas();
        $usuarioInactivo = $objConsultas -> consultarUsuariosInactivos();

        // Se verifica si $usuarioInactivo esta vacia con empty
        if(empty($usuarioInactivo)){
            echo "<h2> No hay usuarios inactivos registrados <h2/>";
        }
        else{
            foreach ($usuarioInactivo as $datosUsuarioInactivo ){
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
    }

?>