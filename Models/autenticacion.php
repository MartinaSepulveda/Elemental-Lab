<?php
// Verificar si el usuario está logueado
function verificarSesion() {
    if (!isset($_SESSION['id']) || $_SESSION['id'] == '') {
        echo "<script> alert ('Debe iniciar sesión para acceder a esta página.'); </script>";
        echo "<script>location.href='../Views/Login.html';</script>";
        exit();
    }
}

// Verificar si el usuario tiene el rol adecuado
function verificarRol($rolRequerido) {
    if ($_SESSION['rol'] != $rolRequerido) {
        echo "<script> alert ('Acceso denegado. Solo los roles especificos pueden acceder.'); </script>";
        echo "<script>location.href='../Views/Login.html';</script>";
        exit();
    }
}

function verificarVeterinaria() {
    // Verifica si la sesión tiene el NIT de veterinaria configurado
    if (!isset($_SESSION['nit']) || empty($_SESSION['nit'])) {
        echo "<script>
            alert('Acceso denegado. Solo las veterinarias pueden acceder a esta página.');
            window.location.href = '../Views/Login.html';
        </script>";
        exit();
    }
}


function obtenerNombreUsuario() {
    // Verificamos si la sesión está iniciada
    if (!isset($_SESSION['id']) || $_SESSION['id'] == '') {
        return "Invitado"; // Retorno por defecto si no hay sesión activa
    }

    if (isset($_SESSION['nombre']) && !empty($_SESSION['nombre'])) {
        return $_SESSION['nombre'];
    }
    return "Usuario"; // Valor por defecto si no hay nombre

    // Si es una veterinaria
    if (isset($_SESSION['nombre'])) {
        return $_SESSION['nombre']; // Devuelve el nombre de la veterinaria
    }

    return "Veterinaria"; // Valor por defecto
}



?>
