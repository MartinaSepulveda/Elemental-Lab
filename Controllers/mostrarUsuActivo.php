<?php

    function cargarUsuarioActivo(){
        //creamos el objeto a partir de la clase conexion
        $objConsultas = new Consultas();
        $usuarioActivo = $objConsultas -> consultarUsuariosActivos();

        // Se verifica si $usuarioActivo esta vacia con empty
        if(empty($usuarioActivo)){
            echo "<h2> No hay usuarios registrados <h2/>";
        }
        else{
            foreach ($usuarioActivo as $datosUsuarioActivo ){
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
    }

?>