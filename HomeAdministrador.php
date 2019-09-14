<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-Tutorias</title>
    <link rel="icon" href="img/imgunah/logo.png" sizes="24x24" type="image/svg">


  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> 
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/homeTutor.css">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <script src="js/misFunciones.js"></script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top" id="navbar1">
      <div class="container">

        <a class="navbar-brand" 
        <?php if($_SESSION['idTipoUsuario']==3){
            echo 'href="HomeAdministrador.php"';
        }else{
          echo 'href="index.php.php"';
        } ?>><img src="img/imgunah/logo.png">UNAH</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="index.php">Salir</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


<br>
<br>
<br>

 <div class="container" id="contenedor">
  <div class="row">   
 <div class="card" style="width: 18rem;">
  <img src="img/tutor.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"> Administrar Tutores</h5>
    <p class="card-text">Administre los tutores, elimine, edite o agregue mas</p>
    <a href="listaTutores.php" class="btn btn-primary">Ver Lista</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="img/mapa.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Centro de estudios</h5>
    <p class="card-text">Administre los centros de estudio, elimine, edite o agregue mas</p>
    <a href="listaTutores.php" class="btn btn-primary">Ver Lista</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="img/reportes.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Reportes</h5>
    <p class="card-text">Revise aqui los reportes que los alumnos hacen de los docentes</p>
    <a href="reportes.php" class="btn btn-primary">Revisar</a>
  </div>
</div>
 </div>
  
 </div>
      

    <!-- Footer -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Ingenieria del software &copy; Proyecto  2019</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/HomeAdministrador.js"></script>
  </body>

</html>