<?php

    function cargarExamenesVet(){
        //creamos el objeto a partir de la clase conexion
        $objConsultas = new Consultas();
        $examenes = $objConsultas -> consultarExamenes();

        // Se verifica si $examenes esta vacia con empty
        if(empty($examenes)){
            echo "<h3> No hay exámenes registrados <h3/>";
        }
        else{
            foreach ($examenes as $datosExamenes ){
                //pintar o maquetar la informacion de la tabla 
                echo'
                
                ';
            }
        }
    }


?>