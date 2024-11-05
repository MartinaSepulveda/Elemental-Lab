<?php
session_start();  // Esto es necesario para iniciar la sesión

include('../Models/autenticacion.php');  // Incluir el archivo de autenticación
verificarSesion();  // Verificar que esté logueado
verificarRol(1);    // Verificar que tenga el rol adecuado (1 = Administrador)
?>

<!-- Cargar las dependencias necesarias -->

<?php
    require_once("../Models/conexion_db.php");
    require_once("../Models/consultas_db.php");
    require_once("../Controllers/mostrarExamen.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bienvenido Administrador</title>
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
  
      <nav class="header-nav ">
        <ul class="d-flex align-items-center">
          <h3>Bienvenido Usuario </h3>
        </ul>
      </nav><!-- End Icons Navigation -->
  
      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span class="badge bg-primary badge-number">3</span>
            </a><!-- End Notification Icon -->
  
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
              <li class="dropdown-header">
                Tienes 3 notificaciones nuevas
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Ver todas</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
  
              <li class="notification-item">
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                  <h4>Lorem Ipsum</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>30 min. ago</p>
                </div>
              </li>
              <li>
                  <hr class="dropdown-divider">
              </li>
              
              <li class="notification-item">
                <i class="bi bi-x-circle text-danger"></i>
                <div>
                  <h4>Atque rerum nesciunt</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>1 hr. ago</p>
                </div>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
  
              <li class="notification-item">
                <i class="bi bi-check-circle text-success"></i>
                <div>
                  <h4>Sit rerum fuga</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>2 hrs. ago</p>
                </div>
              </li>
              
              <!-- <li class="dropdown-footer">
                  <a href="#">Show all notifications</a>
              </li> -->
  
            </ul> <!-- End Notification Dropdown Items -->
          </li>
  
          <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2"> Julian Pérez</span>
            </a><!-- End Profile Iamge Icon -->
            
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>Julian Pérez</h6>
                <span>Motorizado</span>
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
                <a class="dropdown-item d-flex align-items-center" href="#">
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
        <a class="nav-link collapsed" href="Administrador.php">
          <i class="bi bi-house"></i>
          <span>Home</span>
        </a>
      </li><!-- End Home Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#usuarios-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="usuarios-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="administrador-usuariosActivos.php">
              <i class="bi bi-circle"></i><span>Activos</span>
            </a>
          </li>
          <li>
            <a href="administrador-usuariosInactivos.php">
              <i class="bi bi-circle"></i><span>Inactivos</span>
            </a>
          </li>
        </ul>
      </li><!-- End Usuarios Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#solicitudes-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal"></i><span>Solicitudes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="solicitudes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="administrador-solicitudProceso.php">
              <i class="bi bi-circle"></i><span>En proceso</span>
            </a>
          </li>
          <li>
            <a href="administrador-solicitudRealizada.php">
              <i class="bi bi-circle"></i><span>Realizadas</span>
            </a>
          </li>
          <li>
            <a href="administrador-solicitudNoRealizada.php">
              <i class="bi bi-circle"></i><span>No realizadas</span>
            </a>
          </li>
        </ul>
      </li><!-- End Solcitudes Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#zonas-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-map"></i><span>Zonas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="zonas-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="administrador-asignarZonas.php">
              <i class="bi bi-circle"></i><span>Asignar Zona</span>
            </a>
          </li>
          <li>
            <a href="administrador-zonasAsignadas.php">
              <i class="bi bi-circle"></i><span>Zonas Asignadas</span>
            </a>
          </li>
          <li>
            <a href="administrador-ingresarZona.php">
              <i class="bi bi-circle"></i><span>Ingresar Zonas</span>
            </a>
          </li>
        </ul>
      </li><!-- End Zonas Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#examenes-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-file-earmark-text"></i><span>Exámenes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="examenes-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
                <a href="administrador-ingresarExamen.php" >
                    <i class="bi bi-circle"></i><span>Ingresar Exámenes</span>
                </a>
            </li>
            <li>
                <a href="administrador-verExamen.php" class="active">
                    <i class="bi bi-circle"></i><span>Ver Exámenes</span>
                </a>
            </li>
        </ul>
    </li>    

      <li class="nav-item">
        <a class="nav-link collapsed" href="AdmiResultados.html">
          <i class="bi bi-check-circle"></i>
          <span>Resultados enviados</span>
        </a>
      </li><!-- End Resultados Nav -->

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-box-arrow-right"></i>
          <span>Cerrar Sesión</span>
        </a>
      </li><!-- End cerrar sesión Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Exámenes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Exámenes</li>
          <li class="breadcrumb-item active">Editar Exámen</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <!-- Horizontal Form -->
          <?php
            cargarExamenesEditados();
          ?>
          <!-- End Horizontal Form -->

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Js JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>