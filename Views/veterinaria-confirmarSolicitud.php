<?php
session_start();  // Esto es necesario para iniciar la sesión

include('../Models/autenticacion.php');  // Incluir el archivo de autenticación
verificarSesion();  // Verificar que esté logueado

?>
<!-- Cargar las dependencias necesarias -->

  <?php
    require_once("../Models/conexion_db.php");
    require_once("../Models/consultas_db.php");
    require_once("../Controllers/mostrarSolicitudes.php");

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
              <a class="dropdown-item d-flex align-items-center" href="../index.html">
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
            <a href="veterinaria-hacerSolicitud.php">
              <i class="bi bi-circle"></i><span>Hacer Solicitudes</span>
            </a>
          </li>
          <li>
            <a href="veterinaria-cancelarReprogramar.php" >
              <i class="bi bi-circle"></i><span>Cancelar/Reprogramar</span>
            </a>
          </li>
          <li>
            <a href="veterinaria-confirmarSolicitud.php" class="active">
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
        <a class="nav-link " href="../index.html">
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
          <li class="breadcrumb-item active">Confirmar Solicitudes</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section" >

      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-3">
          <label for="registrosxPag">Registros por página:</label> 
            <select id="registrosxPag">
                <option value="5" selected>5</option>
                <option value="10" >10</option>
            </select>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-4">
          <label for="buscar">Buscar:</label> 
          <input type="text" id="buscar" >
          <span id="limpiarOrden" style="cursor: pointer; display: none;">✖</span>
        </div>
        
      </div>
      <br>
      <hr>
      <div class="row card">
        <div class="col-lg-12">
          <table id="miTabla" class="table">
            <thead>
                <tr>
                  <th>Id</th>
                  <th>Fecha Solicitud</th>
                  <th>Fecha Recoleccion</th>
                  <th>Nombre Exámen/es</th>
                  <th>Urgencia</th>
                  <th>Fase Actual</th>
                  <th>Acciones</th> <!-- Realizda no realizada -->
                </tr>
            </thead>
            <tbody id="tbody">
              

              <?php
                cargarSolicitudesProcesoVeterinaria();
              ?>

            </tbody>
        </table>


        <div id="paginacion" class="d-flex align-items-center">
          <button id="prevButton" title="Anterior" class="btn btn-outline-secondary me-2">
              <i class="bi bi-arrow-left"></i>
          </button>
          <button id="nextButton" title="Siguiente" class="btn btn-outline-secondary me-2">
              <i class="bi bi-arrow-right"></i>
          </button>
          <span id="pageInfo"></span>
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

  <!-- Script Excel -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

  <!-- Biblioteca jsPDF -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    $(document).ready(function() {
    let currentPage = 0;
    let recordsPerPage = parseInt($('#registrosxPag').val());
    const rows = $('#tbody tr'); // Filas de la tabla
    let filteredRows = rows; // Para manejar las filas filtradas por búsqueda o no
    let totalRows = rows.length;

    // Función para mostrar la tabla con paginación
    function displayTable() {
        // Oculta todas las filas
        rows.hide();

        if (filteredRows.length === 0) {
            // Si no hay filas filtradas, muestra un mensaje
            $('#pageInfo').text('No se encontraron registros.');
        } else {
            // Calcula el rango de filas a mostrar
            const start = currentPage * recordsPerPage;
            const end = start + recordsPerPage;

            // Muestra solo las filas de la página actual
            filteredRows.slice(start, end).show();

            // Actualiza la información de la página
            $('#pageInfo').text(`Mostrando ${start + 1} a ${Math.min(end, filteredRows.length)} de ${filteredRows.length} registros`);
        }
    }

    // Cambia el número de registros por página
    $('#registrosxPag').on('change', function() {
        recordsPerPage = parseInt(this.value);
        currentPage = 0; // Reinicia a la primera página
        displayTable();
    });

    // Función de búsqueda
    $('#buscar').on('keyup', function() {
        const searchValue = $(this).val().toLowerCase(); // Obtiene el valor de búsqueda

        // Filtra las filas de acuerdo al valor de búsqueda
        filteredRows = rows.filter(function() {
            return $(this).text().toLowerCase().indexOf(searchValue) !== -1;
        });

        totalRows = filteredRows.length; // Actualiza el total de filas visibles
        currentPage = 0; // Reinicia a la primera página
        displayTable(); // Actualiza la tabla según los resultados filtrados

        // Oculta o muestra el botón de limpiar según haya búsqueda
        $('#limpiarOrden').toggle(searchValue.length > 0);
    });

    // Mantén la funcionalidad original de limpiar búsqueda
    $('#limpiarOrden').on('click', function() {
        $('#buscar').val('');
        filteredRows = rows; // Restablece todas las filas
        displayTable(); // Muestra las filas según la paginación
        $(this).hide(); // Oculta el botón de limpiar
    });

    // Paginación - Botón siguiente
    $('#nextButton').on('click', function() {
        if ((currentPage + 1) * recordsPerPage < filteredRows.length) {
            currentPage++;
            displayTable();
        }
    });

    // Paginación - Botón anterior
    $('#prevButton').on('click', function() {
        if (currentPage > 0) {
            currentPage--;
            displayTable();
        }
    });

    // Inicializa la tabla al cargar
    displayTable();
    });


    //JS PARA DESCARGAR EN EXCEL Y PDF


    //Función para descargar la tabla como excel
    document.getElementById('descargarExcel').addEventListener('click', function() {
        // Obtener datos de la tabla
        const table = document.querySelector('table'); // Asegúrate de tener tu tabla
        const workbook = XLSX.utils.table_to_book(table, { sheet: 'Datos' });
        XLSX.writeFile(workbook, 'Solicitudes en proceso.xlsx');
    });


    // Función para descargar la tabla como PDF
    document.getElementById('descargarPdf').addEventListener('click', () => {
        const { jsPDF } = window.jspdf; // Acceder a jsPDF

        const doc = new jsPDF();

        // Agregar título
        doc.setFontSize(18);
        doc.text("Solicitudes en proceso", 14, 20);

        // Configurar la posición inicial para los datos de la tabla
        let ejeY = 30;
        doc.setFontSize(12);

        // Agregar encabezados de la tabla
        doc.text("Nombre", 14, ejeY);
        doc.text("Dirección", 70, ejeY);
        doc.text("Celular", 140, ejeY);
        doc.text("Muestras", 180, ejeY);
        doc.text("Urgencia", 210, ejeY);
        doc.text("Fase", 250, ejeY);
        ejeY += 10; // Espacio adicional después de los encabezados

        // Obtener las filas de la tabla
        const rows = document.querySelectorAll('#miTabla tbody tr');

        // Agregar los datos de cada fila
        rows.forEach(row => {
            const columnas = row.querySelectorAll('td');
            const data = Array.from(columnas).map(col => col.innerText);
            
            ejeY += 10; // Espacio entre filas
            doc.text(data[0], 14, ejeY);   // Nombre
            doc.text(data[1], 70, ejeY);   // Dirección
            doc.text(data[2], 140, ejeY);  // Celular
            doc.text(data[3], 180, ejeY);  // Muestras
            doc.text(data[4], 210, ejeY);  // Urgencia
            doc.text(data[5], 250, ejeY);  // Fase
        });

        // Guardar el archivo PDF
        doc.save("Solicitudes en proceso.pdf");
    });

  </script>

</body>

</html>