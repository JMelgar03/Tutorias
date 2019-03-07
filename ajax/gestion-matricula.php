<?php
session_start();
include("../class/class-conexion.php");
	$conexion = new Conexion();

	switch ($_GET["accion"]) {
   	case 'agregar':
   		include('../class/class-detalle-matricula.php');
   		 $matricula = new DetalleMatricula(
   		 '',
		 'N/A',
		 $_SESSION["CODIGOHISTORIAL"],
		 $_POST["slc-seccion"],
		 '');

		 $matricula->agregarSeccion($conexion);
			
	   break;
	   
	case'eliminarSeccion':
	include('../class/class-seccion.php');
	Seccion::eliminarSeccion($conexion,$_POST['idSeccion']);
	break;
   	
   	default:
   	   echo 'opcion invalida';
   	   break;
   	}

   	$conexion->cerrarConexion();
?>