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

    <title>Registro Usuario - Tutorias</title>
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

        <a class="navbar-brand" 
        <?php if($_SESSION['idTipoUsuario']==2){
            echo 'href="HomeTutor.php"';
        }else{
          echo 'href="HomeEstudiante.php"';
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
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <br><br> <h1 class="mt-4 mb-3"> Perfil
        <small id ="nombreUsuario"><?php echo $_SESSION['nombreCompleto'] ?></small>
      </h1>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-4"></div>
        <div class="col-lg-4 mb-4" style="text-align: center;">
          <!-- Embedded Google Map -->
          <img src="img/imgunah/noprofile.png" width="50%" height="175px"> 
          <div class="col-lg-4"></div>  
        </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 mb-4">
          <h3 style="text-align: center;"> <strong>Datos Personales</strong></h3>
          <br>
          <br>
            <!--Formulario -->
          <div class="form-group row">
            <label for="example-text-input" class="col-6 col-form-label"><p>Numero de Cuenta</p></label>
            <label for="example-text-input" class="col-6 col-form-label" id="numeroCuenta">
              <?php echo $_SESSION['numeroCuenta'] ?>
          </label>
          </div>
          <br>

          <div class="form-group row">
            <label for="example-text-input" class="col-6 col-form-label"><p>Correo</p></label>
            <label for="example-text-input" class="col-6 col-form-label" id="correo">
            <?php echo $_SESSION['email'] ?>
            </label>
          </div>
          <br>

          <div class="form-group row">
            <label for="example-text-input" class="col-6 col-form-label"><p>telefono</p></label>
            <label for="example-text-input" class="col-6 col-form-label" id="telefono">
            <?php echo $_SESSION['telefono'] ?>

            </label>
          </div>
          <br>

          <div class="form-group row">
            <label for="example-text-input" class="col-6 col-form-label"><p>carrera</p></label>
            <label for="example-text-input" class="col-6 col-form-label" id="carrera">
            <?php echo $_SESSION['carrera'] ?>
            </label>
          </div>
          <br>

              <!-- For success/fail messages -->
          <div class="container-login100-form-btn">
              
              <a class="txt2" href="#"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
              <button id="btn-editar" class="login100-form-btn">
                Editar
              </button>
            </a>
          </div>
        </div>
      </div>
      <!-- /.row -->
    <div class="col-lg-2"></div>
    </div>
    <!-- /.container -->



    <!----------ventana Modal--------------------->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
                                    <div class="form-group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Primer Nombre</label>
                                      <div class="col-10">
                                        <input class="form-control" type="text" id="txt-pnombre" value="" name="pnombre" example-text-input">
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Segundo Nombre</label>
                                      <div class="col-10">
                                        <input class="form-control" type="text" value="" id="txt-snombre" name="snombre" example-text-input">
                                      </div>
                                  </div>

                                          <div class="form-group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Primer Apellido</label>
                                      <div class="col-10">
                                        <input class="form-control" type="text" value="" id="txt-papellido" name="papellido" example-text-input">
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Segundo Apellido</label>
                                      <div class="col-10">
                                        <input class="form-control" type="text" value="" id="txt-sapellido" name="sapellido" example-text-input">
                                      </div>
                                  </div>

                                <div class="form-group row">
                                  <label for="example-search-input" class="col-2 col-form-label">Cuenta</label>
                                <div class="col-10">
                                  <input class="form-control" type="" value=" " id="txt-cuenta" name="cuenta">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="example-tel-input" class="col-2 col-form-label">Teléfono</label>
                            <div class="col-10">
                              <input class="form-control" type="tel" value="" id="txt-telefono" name="telefono">
                            </div>
                          </div>

          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-guardar">Guardar</button>
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

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/Perfil.js"></script>
  </body>

</html>