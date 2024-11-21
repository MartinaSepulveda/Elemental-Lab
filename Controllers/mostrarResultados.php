<?php
    function cargarResultadosVeterinaria(){
        //creamos el objeto a partir de la clase conexion
        $objConsultas = new Consultas();
        $Resultados = $objConsultas -> consultarResultadosVeterinaria();

        // Se verifica si $Resultados esta vacia con empty
        if(empty($Resultados)){
            echo "<h3> No hay resultados registrados <h3/>";
        }
        else{
            foreach ($Resultados as $datosResultados ){
                //pintar o maquetar la informacion  
                echo'
                <div class="col-md-4 result-card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">'.$datosResultados['nombreExamen'].'</h5>
                            <p class="text-muted" data-fecha="'.$datosResultados['fechaResultado'].'">Fecha de la prueba: '.$datosResultados['fechaResultado'].'</p>
                            <a href="#" class="btn btn-primary">Descargar Resultado</a>
                        </div>
                    </div>
                </div>
                ';
            }
        }
    }

?>
