<?php 
session_start();
	include("../class/class-conexion.php");
	$conexion = new Conexion();
	switch ($_GET["accion"]) {
		
		case 'departamentos':
			include("../class/class-departamentos.php");
			Departamento::obtenerDepartamentos($conexion,$_POST["slc-centroEstudio"]);
			break;	
		
		case'centroEstudio':
		 include("../class/class-centroEstudio.php");
		 CentroEstudio::obtenerCentros($conexion);
		break;	
		
		case 'ciudades':
		include('../class/class-ciudad.php');
		Ciudad::obtenerCiudades($conexion,$_POST["slc-centroEstudio"]);
		break;

		case 'carreras':
		include('../class/class-carrera.php');
		Carrera::obtenerCarreras($conexion,$_POST["slc-centroEstudio"]);
		break;

		case 'facultades':
			include('../class/class-facultad.php');
			Facultad::obtenerFacultad($conexion,$_POST["slc-carreras"]);
			break;

		case'departamentoclase':
				include('../class/class-departamento-carrera.php');
				DepartamentoCarrera::obtenerDepartamentoCarrera($conexion);	
               break;

        case 'asignaturas':
        
        	include('../class/class-asignatura.php');       
        	Asignatura::obtenerAsignaturas($conexion,$_POST["slc-departamento"]);
        break;

        case'seccion':
        	include('../class/class-seccion.php');
        	Seccion::obtenerSecciones($conexion,$_POST["slc-asignatura"]);


        case'detallematricula':
        	include('../class/class-detalle-matricula.php');
        	DetalleMatricula:: obtenerDetalleMatricula($conexion);
        break;
		default:
			echo "Acción inválida";
			break;
	}
	$conexion->cerrarConexion();
?>