<?php
session_start();  // Esto es necesario para iniciar la sesión

include('../Models/autenticacion.php');  // Incluir el archivo de autenticación
verificarSesion();  // Verificar que esté logueado
verificarVeterinaria();
?>
<!-- Cargar las dependencias necesarias -->

<!-- <?php
    require_once("../Models/conexion_db.php");
    require_once("../Models/consultas_db.php");
    require_once("../Controllers/mostrarExamenVetSelect.php");

?> -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bienvenido Veterinario</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- multiselect -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-multiselect@1.1.0/dist/css/bootstrap-multiselect.css">


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
      <a href="veterinaria.php" class="logo d-flex align-items-center">
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
            <img src="<?php echo $_SESSION['foto']; ?>" alt="" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo htmlspecialchars(obtenerNombreUsuario()); ?></span>
          </a><!-- End Profile Iamge Icon -->
          
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo htmlspecialchars(obtenerNombreUsuario()); ?></h6>
              <span>Veterinaria</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="veterinaria-perfil.php">
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
        <a class="nav-link collapsed" href="veterinaria.php">
          <i class="bi bi-house"></i>
          <span>Home</span>
        </a>
      </li><!-- End Home Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#solicitudes-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal"></i><span>Solicitudes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="solicitudes-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="veterinaria-hacerSolicitud.php" class="active">
              <i class="bi bi-circle"></i><span>Hacer Solicitudes</span>
            </a>
          </li>
          <li>
            <a href="veterinaria-cancelarReprogramar.php" >
              <i class="bi bi-circle"></i><span>Cancelar/Reprogramar</span>
            </a>
          </li>
          <li>
            <a href="veterinaria-confirmarSolicitud.php">
              <i class="bi bi-circle"></i><span>Confirmar Solicitud</span>
            </a>
          </li>
        </ul>
      </li><!-- End Solicitudes Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#zonas-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-map"></i><span>Resultados</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="zonas-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="veterinaria-resultados.php">
              <i class="bi bi-circle"></i><span>Ver resultados</span>
            </a>
          </li>
        </ul>
      </li><!-- End Zonas Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#examenes-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-file-earmark-text"></i><span>Historial</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="examenes-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="veterinaria-historialSolicitudes.php">
                    <i class="bi bi-circle"></i><span>H. Solicitudes</span>
                </a>
            </li>
        </ul>
    </li>

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
      <h1>Solicitudes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Solicitudes</li>
          <li class="breadcrumb-item active">Hacer solicitudes</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <br>

    <section class="section" id="formSolicitud">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="container d-flex justify-content-center align-items-center">

            <form class="w-100" action="../Controllers/registrarSolicitud.php" method="POST">
              <div class="row mb-3">
                <!-- Fecha de recolección -->
                <div class="form-group col-lg-6 col-md-12 mb-3">
                    <label for="fechaRecoleccion">Fecha de recolección programada</label>
                    <input  type="date" class="form-control" id="fechaRecoleccion" name="fechaRecoleccion" required style="border: 1px solid black" >
                </div>

            
                <!-- NIT de la veterinaria -->
                <div class="form-group col-lg-6 col-md-12 mb-3">
                    <label for="nit">NIT de la veterinaria</label>
                    <input type="text" class="form-control" id="nit" name="nit" value="<?php echo $_SESSION['nit']; ?>" readonly>
                </div>
              </div>
            
              <div class="row mb-3">
                <!-- Nombre de la veterinaria -->
                <div class="form-group col-lg-6 col-md-12 mb-3">
                    <label for="nombre">Nombre de la veterinaria</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $_SESSION['nombre']; ?>" readonly>
                </div>
            
                <!-- Dirección de la veterinaria -->
                <div class="form-group col-lg-6 col-md-12 mb-3">
                    <label for="direccion">Dirección de la veterinaria</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $_SESSION['direccion']; ?>" readonly>
                </div>

              </div>
            
              <div class="row mb-3">
                <!-- Teléfono de la veterinaria -->
                <div class="form-group col-lg-6 col-md-12 mb-3">
                    <label for="telefono">Teléfono de la veterinaria</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $_SESSION['telefono']; ?>" readonly>
                </div>

                <div class="form-group col-lg-6 col-md-12 mb-3" >
                  <!-- Tipo de exames a recoger (selección múltiple) -->
                  <label for="tipoMuestras" >Tipo de exámes a hacer</label>
                  <select class="form-control" id="tipoMuestras" name="tipoMuestras[]" multiple required style="border: 1px solid black">
                      <?php
                      
                        cargarExamenesVetSelect();
                      ?>
                      
                  </select>
                </div>
              </div>
            
              <div class="row mb-3">
                <!-- Nivel de urgencia de la solicitud -->
                <div class="form-group col-lg-6 col-md-12 mb-3">
                  <label for="urgencia">Nivel de urgencia de la solicitud</label>
                  <select class="form-control" id="urgencia" name="urgencia" required style="border: 1px solid black">
                  <option value="" disabled selected>Selecciona el nivel de urgencia</option>
                    <option value="1">Baja</option>
                    <option value="2">Media</option>
                    <option value="3">Alta</option>
                  </select>
                </div>
            
                <!-- Fase actual de la solicitud -->
                <div class="form-group col-lg-6 col-md-12 mb-3">
                    <label for="fase">Fase actual de la solicitud</label>
                    
                    <!-- Campo visible que muestra el texto "En proceso" -->
                    <input type="text" class="form-control" id="fase" name="fase_text" value="En proceso" readonly>

                    <!-- Campo oculto que enviará el valor 1 en lugar de "En proceso" -->
                    <input type="hidden" id="fase" name="fase" value="1">
                </div>

              </div>
            
              <!-- Botón de envío -->
              <button type="submit" class="btn btn-primary btn-block w-100 mt-3">Enviar solicitud</button>
            </form>
          
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> <!-- Add Popper.js here -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-multiselect@1.1.0/dist/js/bootstrap-multiselect.min.js"></script>
  <script>
      $(document).ready(function() {
          $('#tipoMuestras').multiselect({
              nonSelectedText: 'Selecciona los tipos de exámenes',
              nSelectedText: 'seleccionados',
              allSelectedText: 'Todos seleccionados',
              buttonWidth: '100%',
              enableFiltering: false,
              includeSelectAllOption: true
          });
      });
  </script>

</body>

</html>