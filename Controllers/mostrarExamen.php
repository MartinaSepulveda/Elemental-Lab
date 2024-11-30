<?php

    function cargarExamenes(){
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
                <tr>
                    <td>'.$datosExamenes['idExamen'].'</td>
                    <td>'.$datosExamenes['nombreExamen'].'</td>
                    <td>'.$datosExamenes['muestraTubo'].'</td>
                    <td>'.$datosExamenes['tipoExamen'].'</td>
                    <td class="action-buttons">           
                        <a href="administrador-editarExamen.php?id='.$datosExamenes['idExamen'].'">
                            <button class="btn btn-primary btn-sm" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </a>
                        <a href="../Controllers/eliminarExamen.php?id='.$datosExamenes['idExamen'].'">
                            <button class="btn btn-danger btn-sm" title="Borrar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </a>
                    </td>
                </tr>
                ';
            }
        }
    }

    function cargarExamenesEditados(){
        //Aterrizamos y enviamos por la url el id 
        $id = $_GET['id'];
        $objConsultas = new Consultas();
        //funcion a donde se envia
        $examenEditar = $objConsultas ->consultarExamenEditar($id);

        // recorre cada elemento del fecth
        foreach($examenEditar as $datosExamenes){
            echo '
            <form class="row" action="../Controllers/editarExamen.php" method="POST">
                <div class="col-md-6 mb-3">
                <label for="codigoExam" class="col-form-label"  required >Codigo Exámen</label>
                <div>
                    <input type="text" class="form-control" id="codigoExam" name="codigoExam" value="'.$datosExamenes['idExamen'].'">
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="nombreExam" class="col-form-label"  required >Nombre Exámen</label>
                <div>
                    <textarea type="text" class="form-control" id="nombreExam" name="nombreExam">'.$datosExamenes['nombreExamen'].'</textarea>
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="muestraTubo" class="col-form-label"  required >Muestra / Tubo</label>
                <div>
                    <input type="text" class="form-control" id="muestraTubo" name="muestraTubo" value="'.$datosExamenes['muestraTubo'].'">
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="tipoExam" class="col-form-label"  required >Tipo de Exámen</label>
                <div>
                    <input type="text" class="form-control" id="tipoExam" name="tipoExam" value="'.$datosExamenes['tipoExamen'].'">
                </div>
                </div>
                
                <div class="text-center">
                <button type="submit" class="btn enviar">Enviar</button>
                </div>

            </form>
            
            ';
        }
    }


?>