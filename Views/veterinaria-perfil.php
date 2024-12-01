<?php
session_start();  // Esto es necesario para iniciar la sesión

include('../Models/autenticacion.php');  // Incluir el archivo de autenticación
verificarSesion();  // Verificar que esté logueado
verificarVeterinaria();   // Verificar que tenga el rol adecuado
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

  <title>Veterinaria Perfil</title>
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
      <a href="veterinaria.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Elemental lab</span>
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
            <img src="<?php echo $_SESSION['foto']; ?>" alt="" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo htmlspecialchars(obtenerNombreUsuario()); ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> <?php echo htmlspecialchars(obtenerNombreUsuario()); ?></h6>
              <span>Veterinaria</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="veterinaria-perfil.php">
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
    <a class="nav-link collapsed" href="veterinaria.php">
      <i class="bi bi-house"></i>
      <span>Home</span>
    </a>
  </li><!-- End Home Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#solicitudes-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal"></i><span>Solicitudes</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="solicitudes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
              <img src="<?php echo $_SESSION['foto']; ?>" alt="" class="rounded-circle">
              <h2> <?php echo htmlspecialchars(obtenerNombreUsuario()); ?></h2>
              <h3>Veterinaria</h3>
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
                    <div class="col-lg-3 col-md-4 label ">NIT Veterinaria</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['nit']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Veterinaria</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['nombre']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Propietario</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['propietario']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Dirección</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['direccion']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Correo</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['correo']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Telefono</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['telefono']; ?></div>
                  </div>

                  

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <!-- End Detalles del perfil -->
                   
                  <!-- Editar perfil -->
                  <form  action="../Controllers/editarPerfil.php" method="POST" enctype="multipart/form-data">

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto</label>
                      <div class="col-md-8 col-lg-9">
                      <input type="file" accept=".jpg, .png, .gif, .jpeg" name="fotoUsuario" class="form-control" id="fotoUsuario" > 
                      </div>
                    </div>

            
      
                    <div class="row mb-3">
                      <label for="id" class="col-md-4 col-lg-3 col-form-label">NIT</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="id" name="idUsuario" value="<?php echo $_SESSION['nit']; ?>" disabled>
                        <div class="invalid-feedback">Ingrese un valor entre 10 y 15 caracteres.</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nombre" class="col-md-4 col-lg-3 col-form-label">Veterinaria</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="nombre" name="nombresUsuario" value="<?php echo $_SESSION['nombre']; ?>" minlength="3" maxlength="40" >
                        <div class="invalid-feedback">Ingrese un valor entre 3 y 40 caracteres.</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="apellido" class="col-md-4 col-lg-3 col-form-label">Propietario</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="apellido" name="apellidosUsuario" value="<?php echo $_SESSION['propietario']; ?>" minlength="3" maxlength="40">
                        <div class="invalid-feedback">Ingrese un valor entre 6 y 40 caracteres.</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="correo" class="col-md-4 col-lg-3 col-form-label">Dirección</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="correo" name="correoUsuario" value="<?php echo $_SESSION['direccion']; ?>" minlength="8" maxlength="50">
                        <div class="invalid-feedback">Ingrese una dirección válida.</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="correo" class="col-md-4 col-lg-3 col-form-label">Correo</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="correo" name="correoUsuario" value="<?php echo $_SESSION['correo']; ?>" minlength="8" maxlength="50">
                        <div class="invalid-feedback">Ingrese un correo válido.</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="telefono" class="col-md-4 col-lg-3 col-form-label">Telefono</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="telefono" name="telefonoUsuario" value="<?php echo $_SESSION['telefono']; ?>" minlength="10" maxlength="12">
                        <div class="invalid-feedback">Ingrese un valor entre 10 y 12 caracteres.</div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                    <!-- End Editar perfil -->

                </div>
                </form>

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
                  <form  id="cambiarClave" action="../Controllers/editarClave.php" method="POST">


                  <div class="row mb-3">
                    <label for="claveVeterinaria" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
                    <div class="col-md-8 col-lg-9 position-relative"> <!-- Añadimos "position-relative" -->
                      <input name="claveVeterinaria" type="password" class="form-control" id="claveVeterinaria" required minlength="8" 
                      pattern="^(?=.*[A-Z])(?=.*\d).{8,}$">
                      <span id="togglePassword1" class="position-absolute" style="right: 20px; top: 32%; transform: translateY(-50%); cursor: pointer;">
                        <i class="bi bi-eye" id="eyeIcon1"></i>
                      </span>
                      <div class="invalid-feedback">
                        La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="yourPassword" class="col-md-4 col-lg-3 col-form-label">Confirmar contraseña</label>
                    <div class="col-md-8 col-lg-9 position-relative"> <!-- Añadimos "position-relative" -->
                      <input name="password" type="password" class="form-control" id="password" required>
                      <span id="togglePassword2" class="position-absolute" style="right: 20px; top: 32%; transform: translateY(-50%); cursor: pointer;">
                        <i class="bi bi-eye" id="eyeIcon2"></i>
                      </span>
                      <div class="invalid-feedback">Las contraseñas no coinciden!</div>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
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

  <!-- Script para confirmar contraseña antes de enviar -->
  <script>
  // Simple password confirmation validation
  document.getElementById('cambiarClave').onsubmit = function(event) {
    const password = document.getElementById('claveVeterinaria').value;  // Corregir el id a 'newPassword'
    const confirmPassword = document.getElementById('password').value; // Corregir el id a 'yourPassword'

    if (password !== confirmPassword) {
      alert("Las contraseñas no coinciden. Por favor intenta de nuevo.");
      event.preventDefault(); // Detiene el envío del formulario
    }
  };
  </script>



  <!-- Script para el funcionamiento del ícono del ojo -->
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Selector para los campos de contraseña
    const togglePassword1 = document.querySelector('#togglePassword1');
    const passwordInput1 = document.querySelector('#claveVeterinaria');
    const eyeIcon1 = document.querySelector('#eyeIcon1');

    const togglePassword2 = document.querySelector('#togglePassword2');
    const passwordInput2 = document.querySelector('#password');
    const eyeIcon2 = document.querySelector('#eyeIcon2');

    // Evento para el primer campo de contraseña (Nueva contraseña)
    togglePassword1.addEventListener('click', function () {
      const type = passwordInput1.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput1.setAttribute('type', type);
      eyeIcon1.classList.toggle('bi-eye');
      eyeIcon1.classList.toggle('bi-eye-slash');
    });

    // Evento para el segundo campo de contraseña (Confirmar contraseña)
    togglePassword2.addEventListener('click', function () {
      const type = passwordInput2.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput2.setAttribute('type', type);
      eyeIcon2.classList.toggle('bi-eye');
      eyeIcon2.classList.toggle('bi-eye-slash');
    });
  });
  </script>


</body>

</html>