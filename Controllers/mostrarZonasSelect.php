<?php

function cargarZonasSelect(){
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
                <option value="'.$datosZonas['idZonas'].'">'.$datosZonas['descripcionZonas'].'</option>
            ';
        }
    }
}



?>