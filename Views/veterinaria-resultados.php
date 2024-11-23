<?php
session_start();  // Esto es necesario para iniciar la sesión

include('../Models/autenticacion.php');  // Incluir el archivo de autenticación
verificarSesion();  // Verificar que esté logueado
verificarVeterinaria();
?>
<!-- Cargar las dependencias necesarias -->

<?php
    require_once("../Models/conexion_db.php");
    require_once("../Models/consultas_db.php");
    require_once("../Controllers/mostrarResultados.php");

?>

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
              <span>Veterinaria</span>
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
          <a class="nav-link collapsed" href="veterinaria.php">
            <i class="bi bi-house"></i>
            <span>Home</span>
          </a>
        </li><!-- End Home Nav -->
  
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#solicitudes-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal"></i><span>Solicitudes</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="solicitudes-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="veterinaria-hacerSolicitud.php">
                <i class="bi bi-circle"></i><span>Hacer Solicitudes</span>
              </a>
            </li>
            <li>
              <a href="veterinaria-cancelarReprogramar.php">
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
          <ul id="zonas-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
              <a href="veterinaria-resultados.php"  class="active">
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
                  <a href="veterinaria-historialSolicitudes.php" >
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
      <h1>Resultados</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Resultados</li>
          <li class="breadcrumb-item active">Ver Resultados</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section" id="resultados">
      <div class="row">
        <div class="col-lg-12 col-md-6">
          <div class="container">
            <div class="row">
              <!-- Contenedor para alinear los campos de búsqueda y fecha -->
              <div class="col-lg-12">
                <div class="d-flex align-items-center">
                  <!-- Campo de búsqueda por texto -->
                  <div class="col-lg-5 col-md-5 col-sm-4 buscarResul">
                    <label for="buscar">Buscar:</label> 
                    <input type="text" id="buscar" class="form-control">
                  </div>

                  <!-- Campo de búsqueda por fecha -->
                  <div class="col-lg-5 col-md-5 col-sm-4 mr-4 buscarResul">
                    <label for="fecha">Filtrar por fecha:</label> 
                    <input type="date" id="fecha" class="form-control">
                  </div>

                  <!-- Botón de limpiar -->
                  <span id="limpiarOrden" style="cursor: pointer; display: none;">✖</span>
                </div>
              </div>
            </div>

            <br><br>

            <!-- Resultados (tarjetas) -->
            <div class="row" id="resultados-lista">
              <?php
                cargarResultadosVeterinaria();
              ?>
            </div>

          </div>
        </div>
      </div>
    </section>


  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <script>
    $(document).ready(function() {
    let filteredCards = $('.result-card'); // Todas las tarjetas de prueba

    // Función de búsqueda por texto
    $('#buscar').on('keyup', function() {
        filterCards();
    });

    // Función de búsqueda por fecha
    $('#fecha').on('change', function() {
        filterCards();
    });

    // Función para limpiar la búsqueda
    $('#limpiarOrden').on('click', function() {
        $('#buscar').val(''); // Borra el valor de búsqueda
        $('#fecha').val(''); // Borra el valor de fecha
        filterCards(); // Restablece las tarjetas y muestra todas
        $(this).hide(); // Oculta el botón de limpiar
    });

    // Función que filtra las tarjetas de acuerdo con el texto y la fecha
    function filterCards() {
        const searchValue = $('#buscar').val().toLowerCase(); // Obtiene el valor de búsqueda
        const selectedDate = $('#fecha').val(); // Obtiene la fecha seleccionada

        // Filtra las tarjetas de acuerdo al texto
        filteredCards = $('.result-card').filter(function() {
            const cardText = $(this).text().toLowerCase();
            const cardDate = $(this).find('.text-muted').data('fecha');

            // Verifica si el texto y la fecha coinciden
            const matchesText = cardText.indexOf(searchValue) !== -1;
            const matchesDate = selectedDate ? cardDate === selectedDate : true; // Si no hay fecha seleccionada, pasa

            return matchesText && matchesDate; // Ambas condiciones deben ser verdaderas
        });

        // Muestra las tarjetas filtradas
        displayCards();
    }

    // Función para mostrar solo las tarjetas filtradas
    function displayCards() {
        // Primero, oculta todas las tarjetas
        $('.result-card').hide();
        
        // Luego, muestra solo las tarjetas filtradas
        filteredCards.show();

        // Mostrar el botón de limpiar si hay algo en los campos
        const searchValue = $('#buscar').val();
        $('#limpiarOrden').toggle(searchValue.length > 0 || $('#fecha').val() !== '');
    }

    // Inicializa la visualización de las tarjetas al cargar
    displayCards();
  });

  </script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>