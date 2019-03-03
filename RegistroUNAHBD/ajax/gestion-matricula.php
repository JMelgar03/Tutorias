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
   	
   	default:
   	   echo 'opcion invalida';
   	   break;
   	}

   	$conexion->cerrarConexion();
?>