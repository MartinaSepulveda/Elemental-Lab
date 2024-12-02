<?php
if (isset($_GET['archivo'])) {
    // Decodificar el nombre del archivo y sanitizar la entrada
    $archivo = urldecode($_GET['archivo']);
    $rutaArchivo = "../uploads/Resultados/" . basename($archivo); // Ruta esperada

    // Verificar si el archivo existe
    if (file_exists($rutaArchivo)) {
        // Enviar los encabezados necesarios para la descarga
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');  // Tipo de archivo genérico, puedes cambiarlo si sabes el tipo específico
        header('Content-Disposition: attachment; filename="' . basename($rutaArchivo) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($rutaArchivo));
        
        // Limpiar cualquier salida previa (si existe) para evitar corrupción del archivo
        ob_clean();
        flush(); 

        // Leer el archivo y enviarlo al navegador
        readfile($rutaArchivo);
        exit;  // Asegurarse de que no haya más salida
    } else {
        // El archivo no existe
        echo "El archivo no existe.";
    }
} else {
    // No se ha especificado el archivo
    echo "Archivo no especificado.";
}
?>
