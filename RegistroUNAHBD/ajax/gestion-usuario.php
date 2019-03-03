<?php

 session_start();
 
?>
 <?php 

  include ('../class/class-conexion.php');
   $conexion  = new Conexion();
   switch ($_GET["accion"]) {
   	case 'crear-usuario':
   		include ('../class/class-usuario.php');
         $contrasena = sha1($_POST["txt-password"]);

         $usuario = new Usuario(null,
                                $_POST["txt-nombre-completo"],
                              $_POST["txt-nombre-completo"],
                              $contrasena,
                              $_POST["txt-correo"],
                              null,
                              $_POST["txt-fecha"],
                              null,
                              null,
                              null,
                              null,
                              $_POST["rbt-genero"],
                              null
                           );
         $usuario->guardarUsuario($conexion);
   		break;
   

   case 'login':
   		include ('../class/class-usuario.php');
         $contrasena = sha1($_POST["txt-password"]);
         //Usuario::consultar($conexion,$_POST["txt-cuenta"],$_POST["txt-password"]);

   		Usuario::verificarUsuario($conexion,$_POST["txt-cuenta"],$contrasena);
   		break;
   	default:
   		# code...
   		break;
   }
?>