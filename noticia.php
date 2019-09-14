<?php
 session_start();
 $_SESSION['idSeccion'] = $_GET['sec'];
?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <link rel="icon" href="img/imgunah/logo.png" sizes="24x24" type="image/svg">
    
    <title>NotificacionesUnah  </title>     

  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> 
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/homeTutor.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 

    <!-- Custom styles for this template -->
      <link href="css/modern-business.css" rel="stylesheet">
     
     <link href="css/starter-template.css" rel="stylesheet">

     <link href="css/estilos.css" rel="stylesheet">
     <script src="js/misFunciones.js"></script>

  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" id="navbar1">
     
     <a class="navbar-brand" href="index.php"><img src="img/imgunah/logo.png">UNAH</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        

        <?php
          //  include("php/conexion.php");
        ?>                        

          <!--<div class="demo-content">
            <div id="notification-header">
              <div style="position:relative">
                 <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn">
                  <span id="notification-count">
                    
                </span>
                <img src="img/icono.png" /></button> 
                <div id="notification-latest"></div> 
              </div>          
            </div>
          </div> -->

           <?php /*if(isset($message)) { ?> <div class="error"><?php echo $message; ?></div> <?php } ?>
          <?php if(isset($success)) { ?> <div class="success"><?php echo $success;?></div> <?php } */?>

        

      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
          <h1> Notificaciones  </h1>

          <p class="lead">

              <!--<form name="frmNotification" id="frmNotification" action="php/agregarnotificacion.php" method="post" > -->
                <div class="form-group">
                 <!-- <label for="autor">Autor de la Notificacion </label> -->
                  <input type="text" class="form-control" name="autor" id="txt-asunto" placeholder="Ingresar Asunto" required>
                </div>
                <div class="form-group">
                 <!-- <label for="mensaje">Mensaje a Notificar </label>-->
                  <textarea class="form-control" name="mensaje" id="txt-mensaje" rows="3" placeholder="Mensaje" required></textarea>
                </div>
                <div class="form-group">
                  <input type="button" name="add" id="btn-publicar" value="Agregar Publicacion" onclick="publicar()">
                </div>

              <!--</form> -->           

          </p>

        </div>

    </div><!-- /.container -->

    <section class="credito">
      <div align="center">
          Desarrollado por <a href="" target="_blank">Industria de software</a>
      </div> 
    </section>


    <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/jmfunciones.js"></script>

    

    
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/noticia.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <script type="text/javascript">
      function myFunction() {
        $.ajax({
          url: "php/notificaciones.php",
          type: "POST",
          processData:false,
          success: function(data){
            $("#notification-count").remove();                  
            $("#notification-latest").show();$("#notification-latest").html(data);
          },
          error: function(){}           
        });
      }
                                 
      $(document).ready(function() {
        $('body').click(function(e){
          if ( e.target.id != 'notification-icon'){
            $("#notification-latest").hide();
          }
        });
      });                                     
    </script>

  </body>
</html>
