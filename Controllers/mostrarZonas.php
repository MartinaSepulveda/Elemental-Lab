<?php

function cargarZonas(){
    //creamos el objeto a partir de la clase conexion
    $objConsultas = new Consultas();
    $zonas = $objConsultas -> consultarZonas();

    // Se verifica si $zonas esta vacia con empty
    if(empty($zonas)){
        echo "<h2> No hay zonas registradas <h2/>";
    }
    else{
        foreach ($zonas as $datosZonas ){
            //pintar o maquetar la informacion de la tabla 
            echo'
                <tr>
                    <td>'.$datosZonas['idZonas'].'</td>
                    <td>'.$datosZonas['descripcionZonas'].'</td>
                    <td>           
                        <a href="">
                            <button class="btn btn-primary btn-sm" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </a>
                        <a href="">
                            <button class="btn btn-danger btn-sm" title="Borrar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </a>
                    </td>
                <tr>
            ';
        }
    }
}



?>