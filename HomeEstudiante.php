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

      <title>Tutorias</title>
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

        <a class="navbar-brand" href="HomeEstudiante.php"><img src="img/imgunah/logo.png">Universidad Nacional Autónoma de Honduras</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="HomeEstudiante.php">Página Principal</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="misCursos.php">Mis Cursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Perfil.php">
                <?php 
                  echo '<label>'.$_SESSION["email"].'</label>'
                ?>
              </a>
            </li>
            <!--<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ingresar
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="index.php">Login</a>
              --> 
        <!--        <a class="dropdown-item" href="portfolio-3-col.html"></a>
                <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a> -->
              </div>
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Descargar
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="manualUsuario.pdf">Manual de usuario</a>
              </div>
            

           <!-- </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Blog
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
                <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
                <a class="dropdown-item" href="blog-post.html">Blog Post</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Other Pages
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="full-width.html">Full Width Page</a>
                <a class="dropdown-item" href="sidebar.html">Sidebar Page</a>
                <a class="dropdown-item" href="faq.html">FAQ</a>
                <a class="dropdown-item" href="404.html">404</a>
                <a class="dropdown-item" href="pricing.html">Pricing Table</a> -->
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <br>
    <br>
    <!-- Page Content -->
    <div class="container" >
      <h1>Departamentos</h1>
      <div class="row" id="div-contenedor">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src=".../100px180/" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
    </div>







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
  <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="js/jmfunciones.js"></script>

    </body>
  </html>