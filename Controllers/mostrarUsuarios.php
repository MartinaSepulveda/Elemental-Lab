<?php

    function cargarUsuarios() {
        $objConsultas = new Consultas();
        $resultados = $objConsultas->consultarUsuarios();
        // Cargar usuarios
        $usuarios = $resultados['usuarios'];
        $veterinarias = $resultados['veterinarias'];

        // Mostrar usuarios
        if (empty($usuarios)) {
            echo "<h3>No hay empleados sin asignar estado</h3>";
        } else {
            foreach ($usuarios as $datosUsuarios) {
                echo '
                <tr>
                    <td>' . $datosUsuarios['nombreCompleto'] . '</td>
                    <td>' . $datosUsuarios['idUsuario'] . '</td>
                    <td>' . $datosUsuarios['telefonoUsuario'] . '</td>
                    <td>' . $datosUsuarios['descripcionRol'] . '</td>
                    <td>' . $datosUsuarios['correoUsuario'] . '</td>
                    <td>
                        <form method="POST" action="../Controllers/asignarEstadoUsuarios.php">
                            <input type="hidden" name="idUsuario" value="' . $datosUsuarios['idUsuario'] . '">
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

        // Mostrar veterinarias
        if (empty($veterinarias)) {
            echo "<h3>No hay veterinarias sin asignar estado</h3>";
        } else {
            foreach ($veterinarias as $datosVeterinaria) {
                echo '
                <tr>
                    <td>' . $datosVeterinaria['nombreVeterinaria'] . '</td>
                    <td>' . $datosVeterinaria['nitVeterinaria'] . '</td>
                    <td>' . $datosVeterinaria['telefonoVeterinaria'] . '</td>
                    <td> Veterinaria </td>
                    <td>' . $datosVeterinaria['correoVeterinaria'] . '</td>
                    <td>
                        <form method="POST" action="../Controllers/asignarEstadoVeterinaria.php">
                            <input type="hidden" name="nit" value="' . $datosVeterinaria['nitVeterinaria'] . '">
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