<?php
session_start();  // Esto es necesario para iniciar la sesión

include('../Models/autenticacion.php');  // Incluir el archivo de autenticación
verificarSesion();  // Verificar que esté logueado
verificarRol(3);    // Verificar que tenga el rol adecuado
?>

<?php
    require_once("../Models/conexion_db.php");
    require_once("../Models/consultas_db.php");
    require_once("../Controllers/fechaActual.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bienvenido Bioanalista</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Elemental Lab</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav text-center col-7">
      <ul class="d-flex justify-content-center align-items-center">
          <h3>¡Bienvenido!, <?php echo htmlspecialchars(obtenerNombreUsuario()); ?></h3>
      </ul>
    </nav>


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo htmlspecialchars(obtenerNombreUsuario()); ?></span>
          </a><!-- End Profile Iamge Icon -->
          
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo htmlspecialchars(obtenerNombreUsuario()); ?></h6>
              <span>Bioanalista</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Mi Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../Models/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar Sesión</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav>
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="bioanalista.php">
          <i class="bi bi-house"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="../Models/logout.php">
          <i class="bi bi-box-arrow-right"></i>
          <span>Cerrar Sesión</span>
        </a>
      </li><!-- End cerrar sesión Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Home</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section" id="home">
      <form id="resultadoForm" method="POST" enctype="multipart/form-data" action="../Controllers/subirResultado.php">
        <div class="mb-3">
            <label for="Nit" class="form-label">NIT Veterinaria</label>
            <input type="text" class="form-control" id="Nit" name="Nit" required onchange="obtenerSolicitudes()">
        </div>
        <div class="mb-3">
            <label for="solicitud" class="form-label">Seleccionar Solicitud</label>
            <select class="form-control" id="solicitud" name="solicitud" required>
                <option value="">Seleccione una solicitud</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="fechaSubidaBio" class="form-label">Fecha de Subida</label>
            <input type="date" class="form-control" id="fechaSubidaBio" name="fechaSubidaBio" value="<?php echo date('Y-m-d'); ?>" required>
        </div>
        <div class="mb-3">
            <label for="resultadoDoc" class="form-label">Adjuntar Resultado</label>
            <input type="file" class="form-control" id="resultadoDoc" name="resultadoDoc" required>
        </div>
        <button type="submit" class="btn btn-primary">Subir Resultado</button>
      </form>
    </section>

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <script>
    async function obtenerSolicitudes() {
      const nit = document.getElementById('Nit').value;
      const solicitudSelect = document.getElementById('solicitud');

      // Limpiar las opciones previas
      solicitudSelect.innerHTML = '<option value="">Cargando solicitudes...</option>';

      // Realizar la petición al backend
      const response = await fetch(`../Controllers/obtenerSolicitudes.php?nit=${nit}`);
      const data = await response.json();

      // Verificar si se obtuvieron resultados
      if (data.success) {
          solicitudSelect.innerHTML = '<option value="">Seleccione una solicitud</option>';
          data.solicitudes.forEach(solicitud => {
              const option = document.createElement('option');
              option.value = solicitud.idSolicitud;
              option.textContent = `Nombre Vet: ${solicitud.nombreVeterinaria}, Exámenes: ${solicitud.examenes}`;
              solicitudSelect.appendChild(option);
          });
      } else {
          solicitudSelect.innerHTML = '<option value="">No hay solicitudes para este NIT</option>';
      }
    }
</script>

</body>

</html>