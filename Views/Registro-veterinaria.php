<?php
  require_once("../Models/conexion_db.php");
  require_once("../Models/consultas_db.php");
  require_once("../Controllers/mostrarZonasSelect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Registro Veterinaria</title>
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

  <main id="login">
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 col-md-6 d-flex flex-column align-items-center justify-content-center">

          
              <div class="card mb-3" id="Registro">

              <div class="d-flex justify-content-center ">
                  <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <img src="assets/img/NombreLogoTransparente.png" alt="logo Elemental" height="200px">
                  </a>
                </div>

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Crear cuenta</h5>
                    <p class="text-center small">Introduzca sus datos personales para crear su cuenta</p>
                  </div>

                  <form id="crearCuenta" action="../Controllers/registrarVeterinaria.php" method="post" enctype="multipart/form-data" class="row g-3 needs-validation"  novalidate>
                    <div class="col-6">
                      <label for="nitVeterinaria" class="form-label">NIT Veterinaria</label>
                      <input type="text" name="nitVeterinaria" class="form-control" id="nitVeterinaria" required>
                      <div class="invalid-feedback">Por favor introduzca el NIT de su veterinaria!</div>
                    </div>

                    <div class="col-6">
                        <label for="nombreVeterinaria" class="form-label">Nombre Veterinaria</label>
                        <input type="text" name="nombreVeterinaria" class="form-control" id="nombreVeterinaria" required>
                        <div class="invalid-feedback">Por favor introduzca el nombre de su Veterinaria!</div>
                    </div>

                    <div class="col-6">
                        <label for="propietarioVeterinaria" class="form-label">Nombre del Propietario</label>                      
                        <input type="text" name="propietarioVeterinaria" class="form-control" id="propietarioVeterinaria" required>
                        <div class="invalid-feedback">Por favor introduzca su nombre!.</div>
                    </div>

                    <div class="col-6">
                      <label for="direccionVeterinaria" class="form-label">Dirección</label>                      
                      <input type="text" name="direccionVeterinaria" class="form-control" id="direccionVeterinaria" required>
                      <div class="invalid-feedback">Por favor introduzca su nombre!.</div>
                    </div>

                    <div class="col-6">
                        <label for="correoVeterinaria" class="form-label">Correo Electrónico</label>
                        <input type="email" name="correoVeterinaria" class="form-control" id="correoVeterinaria" required>
                        <div class="invalid-feedback">Por favor ingrese su correo electrónico!</div>
                    </div>

                    <div class="col-6">
                        <label for="telefonoVeterinaria" class="form-label">Teléfono</label>
                        <input type="int" name="telefonoVeterinaria" class="form-control" id="telefonoVeterinaria" required>
                        <div class="invalid-feedback">Por favor ingrese su teléfono!</div>
                    </div>
                    
                    <div class="col-6">
                      <label for="idZonaVeterinaria" class="form-label">Zona</label>
                      <select name="idZonaVeterinaria" class="form-control" id="idZonaVeterinaria" required>
                          <option value="" disabled selected>Seleccione una zona</option>
                          <?php
                            cargarZonasSelect();
                          ?>
                        </select>
                      <div class="invalid-feedback">Por favor seleccione una zona!</div>
                    </div>

                    <div class="col-6">
                      <label for="fotoVeterinaria" class="form-label">Foto de perfil</label>
                      <input type="file" accept="image/*" name="fotoVeterinaria" class="form-control" id="fotoVeterinaria" >
                    </div>
                  
                    <div class="col-6">
                        <label for="claveVeterinaria" class="form-label">Contraseña</label>
                        <input type="password" name="claveVeterinaria" class="form-control" id="claveVeterinaria" required>
                        <div class="invalid-feedback">Por favor eliga su contraseña!</div>
                    </div>

                    <div class="col-6">
                        <label for="yourPassword" class="form-label">Confirmar contraseña</label>
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Por favor confirme su contraseña!</div>
                    </div>
  
                    <div class="col-12">
                      <center>
                        <button class="btn " type="submit">Crear Cuenta</button>
                      </center>
                    </div>

                    <div class="col-12">
                        <p class="small mb-0">¿Ya tienes una cuenta? <a href="../Views/Login.html">Iniciar sesión</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->

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
    // Validación de contraseña
    document.getElementById('crearCuenta').onsubmit = function() {
      const password = document.getElementById('claveVeterinaria').value;
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