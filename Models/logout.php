<?php
session_start();  // Iniciar la sesión

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al login
echo "<script>
    alert('Has cerrado sesión correctamente.');
    window.location.href = '../Views/Login.html';
</script>";
exit();
