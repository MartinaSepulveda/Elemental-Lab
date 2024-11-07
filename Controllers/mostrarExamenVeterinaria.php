<?php

function cargarExamenesVet(){
    // Creamos el objeto a partir de la clase conexion
    $objConsultas = new Consultas();
    $examenes = $objConsultas->consultarExamenes();

    // Verificamos si $examenes está vacío con empty
    if (empty($examenes)) {
        echo "<h3> No hay exámenes registrados </h3>";
    } else {
        // Creamos un array para agrupar los exámenes por tipo
        $examenesPorCategoria = [];

        // Agrupamos los exámenes por tipo de categoría
        foreach ($examenes as $datosExamenes) {
            $categoriaExamen = $datosExamenes['tipoExamen'];  // Obtenemos la categoría (tipo de examen)
            $examenesPorCategoria[$categoriaExamen][] = $datosExamenes;  // Agrupamos los exámenes por categoría
        }

        // Ahora recorremos las categorías de exámenes
        foreach ($examenesPorCategoria as $categoria => $examenesDeCategoria) {
            // Creamos un ID único basado en la categoría (eliminamos espacios y convertimos a minúsculas)
            $uniqueId = 'collapse-' . preg_replace('/\s+/', '-', strtolower($categoria)); // Reemplazamos los espacios por guiones y convertimos a minúsculas

            // Comprobamos si hay exámenes en la categoría
            if (!empty($examenesDeCategoria)) {
                // Comenzamos el bloque HTML para cada categoría
                echo '
                    <div class="card category-card">
                        <div class="card-header '.$categoria.' text-white" data-bs-toggle="collapse" data-bs-target="#'.$uniqueId.'" aria-expanded="false" aria-controls="'.$uniqueId.'">
                            <h5>'.$categoria.'</h5>
                        </div>
                        <div id="'.$uniqueId.'" class="collapse">
                            <div class="card-body">
                                <br>
                                <div class="table-responsive"> <!-- Agregamos la clase table-responsive aquí -->
                                    <table class="table table-bordered table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Código</th>
                                                <th>Examen</th>
                                                <th>Requiere</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
            
                // Ahora mostramos los exámenes de esa categoría en la tabla
                foreach ($examenesDeCategoria as $examen) {
                    echo '
                        <tr>
                            <td>'.$examen['idExamen'].'</td>
                            <td>'.$examen['nombreExamen'].'</td>
                            <td>'.$examen['muestraTubo'].'</td>
                        </tr>';
                }
            
                // Cerramos la tabla y el bloque HTML
                echo '    </tbody>
                                </table>
                            </div> <!-- Cierre del contenedor .table-responsive -->
                        </div>
                    </div>
                </div>';
            }
        }
    }
}


?>
