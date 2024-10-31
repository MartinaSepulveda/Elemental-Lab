<?php

function cargarZonas(){
    //creamos el objeto a partir de la clase conexion
    $objConsultas = new Consultas();
    $zonas = $objConsultas -> consultarZonas();

    // Se verifica si $zonas esta vacia con empty
    if(empty($zonas)){
        echo "<h3> No hay zonas registradas <h3/>";
    }
    else{
        foreach ($zonas as $datosZonas ){
            //pintar o maquetar la informacion de la tabla 
            echo'
                <tr>
                    <td>'.$datosZonas['idZonas'].'</td>
                    <td>'.$datosZonas['descripcionZonas'].'</td>
                    <td>           
                        <a href="../Views/administrador-editarZonaAdmi.php?id='.$datosZonas['idZonas'].'">
                            <button class="btn btn-primary btn-sm" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </a>
                        <a href="../Controllers/eliminarZona.php?id='.$datosZonas['idZonas'].'">
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
    function cargarZonasEditadas(){
        //Aterrizamos y enviamos por la url el id 
        $id = $_GET['id'];
        $objConsultas = new Consultas();
        //funcion a donde se envia
        $zonaEditar = $objConsultas ->consultarZonaEditar($id);

        // recorre cada elemento del fecth
        foreach($zonaEditar as $datosZonas){
            echo '

            <form class="row" action="../Controllers/editarZona.php" method="post">
                <div class="col-md-12 mb-12 text-center">
                    <label for="nombre" class="col-form-label"  required >Nombre de la Zona</label>
                    <div>
                    <input type="text" class="form-control" id="nombreZona" name="nombreZona"value="'.$datosZonas['descripcionZonas'].'">
                    <input type="hidden" name="id" value="'. $datosZonas['idZonas'].'">
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