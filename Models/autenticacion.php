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
?>
