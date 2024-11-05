<?php

function cargarRolSelect(){
    //creamos el objeto a partir de la clase conexion
    $objConsultas = new Consultas();
    $rol = $objConsultas -> consultarRol();

    // Se verifica si $rol esta vacia con empty
    if(empty($rol)){
        echo "<h3> No hay roles registrados <h3/>";
    }
    else{
        foreach ($rol as $datoRol ){
            if($datoRol['idRol'] == 2 || $datoRol ['idRol'] == 3) {
                //pintar o maquetar la informacion de la tabla 
            echo'
            <option value="'.$datoRol['idRol'].'">'.$datoRol['descripcionRol'].'</option>
        ';
    }
            }
            
    }
}



?>