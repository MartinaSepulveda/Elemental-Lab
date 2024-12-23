<?php
  require_once("../Models/conexion_db.php");
  require_once("../Models/consultas_db.php");
  require_once("../Controllers/mostrarRolSelect.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Registro Empleados</title>
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
                  <a href="seleccionarRegistro.html" class="position-absolute top-0 start-0 ms-3 mt-3 text-decoration-none">
                    <i class="bi bi-arrow-left" style="font-size: 1.5rem; color: #000;"></i>
                  </a>
                </div>

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Crear cuenta</h5>
                    <p class="text-center small">Ingresa tus datos personales para crear tu cuenta</p>
                  </div>

                  <form id="crearCuenta" action="../Controllers/registrarUsuario.php" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                    <div class="col-6">
                      <label for="idUsuario" class="form-label">Cédula</label>
                      <input type="number" name="idUsuario" class="form-control" id="idUsuario" min="1000000" max="9999999999" required>
                      <div class="invalid-feedback">Ingrese un valor entre 7 y 10 caracteres.</div>
                    </div>

                    <div class="col-6">
                      <label for="nombresUsuario" class="form-label">Nombres</label>
                      <input type="text" name="nombresUsuario" class="form-control" id="nombresUsuario" minlength="3" maxlength="40" required>
                      <div class="invalid-feedback">Ingrese un valor entre 3 y 40 caracteres.</div>
                    </div>

                    <div class="col-6">
                      <label for="apellidosUsuario" class="form-label">Apellidos</label>
                      <input type="text" name="apellidosUsuario" class="form-control" id="apellidosUsuario" minlength="3" maxlength="40" required>
                      <div class="invalid-feedback">Ingrese un valor entre 3 y 40 caracteres.</div>
                    </div>

                    <div class="col-6">
                      <label for="correoUsuario" class="form-label">Correo Electrónico</label>
                      <input type="email" name="correoUsuario" class="form-control" id="correoUsuario" minlength="8" maxlength="50" required>
                      <div class="invalid-feedback">Ingrese un correo válido.</div>
                    </div>

                    <div class="col-6">
                        <label for="telefonoUsuario" class="form-label">Teléfono</label>
                        <input type="text" name="telefonoUsuario" class="form-control" id="telefonoUsuario" minlength="10" maxlength="12" required>
                        <div class="invalid-feedback">Ingrese un valor entre 10 y 12 caracteres.</div>
                    </div>
                    
                    <div class="col-6">
                      <label for="idRolUsuario" class="form-label">Rol</label>
                      <select name="idRolUsuario" class="form-control" id="idRolUsuario" required>
                        <option value="" disabled selected > Seleccione su rol:</option>
                        <?php
                        cargarRolSelect();
                        ?>
                      </select>
                      <div class="invalid-feedback">Por favor seleccione su rol!</div>
                    </div>


                    <center>
                      <div class="col-6">
                      <label for="fotoUsuario" class="form-label">Foto de perfil</label>
                      <input type="file" accept=".jpg, .png, .gif, .jpeg" name="fotoUsuario" class="form-control" id="fotoUsuario" >
                    </div>
                    </center>

                    <div class="col-12 col-md-6 position-relative">
                      <label for="claveUsuario" class="form-label">Contraseña</label>
                      <input type="password" name="claveUsuario" class="form-control" id="claveUsuario" required minlength="8" 
                      pattern="^(?=.*[A-Z])(?=.*\d).{8,}$">
                      <span id="togglePassword1" required  
                        class="position-absolute" 
                        style="right: 20px; top: 76%; transform: translateY(-50%); cursor: pointer; z-index: 10;">
                        <i class="bi bi-eye" id="eyeIcon1"></i>
                      </span>
                      <div class="invalid-feedback">
                          La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.
                      </div>
                    </div>


                    <div class="col-12 col-md-6 position-relative">
                        <label for="yourPassword" class="form-label">Confirmar contraseña</label>
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <span id="togglePassword2" required  
                          class="position-absolute" 
                          style="right: 20px; top: 76%; transform: translateY(-50%); cursor: pointer; z-index: 10;">
                          <i class="bi bi-eye" id="eyeIcon2"></i>
                        </span>
                        <div class="invalid-feedback">Las contraseñas no coinciden!</div>
                    </div>

                    <div class="col-12 ">
                      <center>
                        <button class="btn" type="submit">Crear Cuenta</button>
                      </center>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">¿Ya tienes una cuenta? <a href="Login.html">Iniciar sesión</a></p>
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
    // Simple password confirmation validation
    document.getElementById('crearCuenta').onsubmit = function() {
      const password = document.getElementById('claveUsuario').value;
      const confirmPassword = document.getElementById('yourPassword').value;

      if (password !== confirmPassword) {
        alert("Las contraseñas no coinciden. Por favor intenta de nuevo.");
        return false;
      }
      return true;
    };
  </script>

  <!-- Scrip para ocultar/mostrar la contraseña -->
  <script>
const togglePassword1 = document.querySelector('#togglePassword1');
const passwordInput1 = document.querySelector('#claveUsuario');
const eyeIcon1 = document.querySelector('#eyeIcon1');

const togglePassword2 = document.querySelector('#togglePassword2');
const passwordInput2 = document.querySelector('#yourPassword');
const eyeIcon2 = document.querySelector('#eyeIcon2');

// Alternar visibilidad de la contraseña (claveVeterinaria)
togglePassword1.addEventListener('click', function () {
  const type = passwordInput1.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordInput1.setAttribute('type', type);
  eyeIcon1.classList.toggle('bi-eye');
  eyeIcon1.classList.toggle('bi-eye-slash');
});

// Alternar visibilidad de la contraseña (yourPassword)
togglePassword2.addEventListener('click', function () {
  const type = passwordInput2.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordInput2.setAttribute('type', type);
  eyeIcon2.classList.toggle('bi-eye');
  eyeIcon2.classList.toggle('bi-eye-slash');
});

</script>

</body>

</html>