<!--@arodriguez0605 -->
<?php
session_start();

if(!(isset($_SESSION["PNOMBRE"])))
   {
     header('location: index.php');
   }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Adicionar asignatura - UNAH</title>
    <link rel="icon" href="img/imgunah/logo.png" sizes="24x24" type="image/svg">


  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> 
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <script src="js/misFunciones.js"></script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">

        <a class="navbar-brand" href="index.php"><img src="img/imgunah/logo.png">Universidad Nacional Autónoma de Honduras</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="index.php">Página Principal</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="about.php">Planes de Estudio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registro.php">Registrarse</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ingresar
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="loginestudiante.php">Estudiante</a>
                <a class="dropdown-item" href="logincatedratico.php">Catedrático</a>

              </div>
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Descargar
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="manualUsuario.pdf">Manual de usuario</a>
              </div>

              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<body>
    <div class="container-login100">

<body>
 <div>    
          <span class="login100-form-title">
              Adicionar Asignaturas<br>
          </span>  
          <span class="selectAsignaturas">
            <select class="selectpicker" id="slc-departamento" >
                <option>Seleccione el area de la asignatura</option>
            </select>
          </span>

          <span class="selectAsignaturas" >
            <select class="selectpicker" id="slc-asignatura">
                <option>Seleccione la asignatura</option>
                
            </select>
          </span>

          <span class="selectAsignaturas">
            <select class="selectpicker" id="slc-seccion">
                <option>Seleccione la sección</option>
            </select>

          </span>
          <span class="selectAsignaturas"><button id="btn-agregar-asignatura" class="login100-form-btn">Agregar</button></span>
        </div>
      </div>
    </div>
  </div>
  
      <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Base de Datos I &copy; Proyecto final 2018</p>
      </div>
      <!-- /.container -->
    </footer>

  
<!--===============================================================================================-->  
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <script src="js/main.js"></script>
  <script src="js/jmfunciones.js"></script>
</body>
</html>
