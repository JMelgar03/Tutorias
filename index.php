
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Estudiante - UNAH</title>
    <link rel="icon" href="img/imgunah/logo.png" sizes="24x24" type="image/svg">


  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> 
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <script src="js/misFunciones.js"></script>

  </head>

  <body>

    <!--unahtutorias2019@gmail.com Navigation -->
    
    <!-- <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
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
              <a class="dropdown-item" href="portfolio-3-col.html"></a>
                <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a> 
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
    </nav> -->
<body>
  
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar Cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Correo de su cuenta:</label>
            <input type="text" class="form-control" id="recipient-correo">
            <div id="div-pregunta" style="display:none" >
            <label>Primero Responde la siguiente pregunta:</label>
								<label class="form-control" id="label-pregunta"></label>
								<input type="text" id="txt-respuesta2" class="form-control">
								<button id="btn-verificar-respuesta" class="btn btn-primary">Enviar Respuesta</button>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-verificar-correo">Verificar</button>
      </div>
    </div>
  </div>
</div>





  <!--FIN MODAL--------------------------------------------------------------------- -->
 <div style="margin-left: 150px">
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt> 
          <img src="img/imgunah/logo2.png" alt="IMG"> 
        </div>

       <!-- <form class="login100-form validate-form">-->
          <span class="login100-form-title">
            Inicio de sesión | Tutorias
          </span>

          <div class="wrap-input100 validate-input login" data-validate = "Cuenta requerida">
            <input class="input100 " type="text" id="txt-correo" name="cuenta" placeholder="Correo">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user-circle-o" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input login" data-validate = "Contraseña requerida">
            <input class="input100" type="password" id="txt-password" name="contraseña" placeholder="Contraseña">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="">
            <button  class="login100-form-btn login" id="btn-iniciar-sesion-estudiante">
              Iniciar sesión
              </button>
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">
              Olvidaste
            </span>
            <a class="txt2" href="#"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
              ¿Tu Cuenta / Contraseña?
            </a>
          </div>

          <div class="text-center p-t-136">
            <a class="txt2" href="registro.html">
              Registrarse
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        <!--</form>-->
      </div>
    </div>
  </div>
</div>
        <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Ingenieria del software &copy; Proyecto  2019</p>
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
<!--===============================================================================================-->
  <script src="js/main.js"></script>
  <script src="js/jmfunciones.js"></script>
</body>
</html>
