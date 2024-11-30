
<?php
session_start();  // Esto es necesario para iniciar la sesión

include('../Models/autenticacion.php');  // Incluir el archivo de autenticación
verificarSesion();  // Verificar que esté logueado
verificarRol(2);    // Verificar que tenga el rol adecuado
?>
<!-- Cargar las dependencias necesarias -->

<!-- <?php
    require_once("../Models/conexion_db.php");
    require_once("../Models/consultas_db.php");

?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Elemental_lab-perfil</title>
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
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

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
        <span class="d-none d-lg-block">Elemental_lab</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- icono de foto-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo $_SESSION['foto']; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo htmlspecialchars(obtenerNombreUsuario()); ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> <?php echo htmlspecialchars(obtenerNombreUsuario()); ?></h6>
              <span><?php echo $_SESSION['rol']; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="Perfil.html">
                <i class="bi bi-person"></i>
                <span>Mi perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../Models/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar sesión</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#solicitudes-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal"></i><span>Solicitudes</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="solicitudes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="motorizado-solicitudes.php" >
          <i class="bi bi-circle"></i><span>Solicitudes recibidas</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Solicitudes Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#zonas-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-map"></i><span>Fase solicitud</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="zonas-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="motorizado-proceso.php">
          <i class="bi bi-circle"></i><span>En Proceso</span>
        </a>
      </li>
      <li>
        <a href="motorizado-realizada.php" >
          <i class="bi bi-circle"></i><span>Realizada</span>
        </a>
      </li>
      <li>
        <a href="motorizado-noRealizada.php">
          <i class="bi bi-circle"></i><span>No Realizada</span>
        </a>
      </li>
    </ul>
  </li><!-- End Zonas Nav -->

    <li class="nav-item">
      <a class="nav-link " href="../Models/logout.php">
        <i class="bi bi-box-arrow-right"></i>
        <span>Cerrar Sesión</span>
      </a>
    </li><!-- Cerrar Sesión -->

  </ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>perfil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">perfil</li>
          <li class="breadcrumb-item active">Perfil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="<?php echo $_SESSION['foto']; ?>" alt="Profile" class="rounded-circle">
              <h2> <?php echo htmlspecialchars(obtenerNombreUsuario()); ?></h2>
              <h3><?php echo $_SESSION['rol']; ?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Perfil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar perfil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Editar contraseña</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <!-- Detalles del perfil -->
                <div class="tab-pane fade show active profile-overview" id="profile-overview"> 
                  
                  <h5 class="card-title">Detalles del perfil</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Cedula</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['id']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nombres</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['nombre']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Apellidos</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['apellido']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Correo</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['correo']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Telefono</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['telefono']; ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Rollll</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['rol']; ?></div>
                  </div>

                  

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <!-- End Detalles del perfil -->
                   
                  <!-- Editar perfil -->
                  <form>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="<?php echo $_SESSION['foto']; ?>" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Cargar nueva imagen"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Eliminar imagen"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Cédula</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $_SESSION['id']; ?>" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nombres</label>
                      <div class="col-md-8 col-lg-9">
                      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $_SESSION['nombre']; ?>" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Apellidos</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Correo</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Telefono</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Rol</label>
                      <div class="col-md-8 col-lg-9">
                      <input type="text" class="form-control" id="rol" name="rol" value="<?php echo $_SESSION['rol']; ?>" disabled>
                      </div>
                    </div>
                    <!-- End Editar perfil -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Cambiar Contraseña -->
                  <form  id="cambiarClave" action="../Controllers/cambiarClave.php" method="POST">


                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="claveUsuario" type="password" class="form-control" id="newPassword" required minlength="8" 
                        pattern="^(?=.*[A-Z])(?=.*\d).{8,}$">
                        <div class="invalid-feedback">
                          La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.
                      </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="yourPassword" class="col-md-4 col-lg-3 col-form-label">Confirmar contraseña</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="yourPassword" required >
                        <div class="invalid-feedback">Las contraseñas no coinciden!</div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" >Cambiar contraseña</button>
                    </div>
                  </form><!-- End Cambiar contraseña -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits"> -->
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer> -->
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    // Simple password confirmation validation
    document.getElementById('cambiarClave').onsubmit = function() {
      const password = document.getElementById('claveUsuario').value;
      const confirmPassword = document.getElementById('yourPassword').value;

      if (password !== confirmPassword) {
        alert("Las contraseñas no coinciden. Por favor intenta de nuevo.");
        return false;
      }
      return true;
    };
  </script>

</body>

</html>