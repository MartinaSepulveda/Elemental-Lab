<?php
    require_once("../Models/conexion_db.php");

    $nit = $_GET['nit'];

    $objetoConexion = new Conexion();
    $conexion = $objetoConexion->get_conexion();

    // Consulta para obtener solicitudes sin resultados asociados
    $query = "
        SELECT 
        solicitudes.idSolicitud, 
        solicitudes.fechaSolicitud, 
        solicitudes.fechaRecoleccion, 
        GROUP_CONCAT(DISTINCT examen.nombreExamen SEPARATOR ', ') AS examenes, -- Agrupa los nombres de los exámenes
        veterinaria.nombreVeterinaria,
        solicitudes.idFaseSolicitud
        FROM 
            solicitudes
        LEFT JOIN 
            veterinaria ON solicitudes.nitVeterinariaSolicitud = veterinaria.nitVeterinaria
        LEFT JOIN 
            solicitudes_examenes ON solicitudes.idSolicitud = solicitudes_examenes.idSolicitud
        LEFT JOIN 
            examen ON solicitudes_examenes.idExamen = examen.idExamen
        LEFT JOIN 
            resultados ON solicitudes.idSolicitud = resultados.idSolicitudResultado
        WHERE 
            solicitudes.nitVeterinariaSolicitud = :nit 
            AND solicitudes.idFaseSolicitud = 2 
            AND resultados.idSolicitudResultado IS NULL
        GROUP BY 
            solicitudes.idSolicitud, 
            solicitudes.fechaSolicitud, 
            solicitudes.fechaRecoleccion, 
            veterinaria.nombreVeterinaria, 
            solicitudes.idFaseSolicitud
        ORDER BY 
            solicitudes.idSolicitud DESC;
            ";  // Solo solicitudes sin resultado

    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':nit', $nit);
    $stmt->execute();

    $solicitudes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($solicitudes) {
        echo json_encode(['success' => true, 'solicitudes' => $solicitudes]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No se encontraron solicitudes']);
    }
?>
