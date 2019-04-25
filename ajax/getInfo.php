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

		case'centroEstudioAdmin':
		 include("../class/class-centroEstudio.php");
		 CentroEstudio::obtenerCentrosAdmin($conexion);
		break;	

		case'Edificio':
		 include("../class/class-edificio.php");
		 Edificio::obtenerEdificiosT($conexion);
		break;

		case'edificioAdmin':
		 include("../class/class-edificio.php");
		 Edificio::obtenerEdificiosAdmin($conexion,$_POST['idCentroEstudio']);
		break;	
		
		case 'ciudades':
		include('../class/class-ciudad.php');
		Ciudad::obtenerCiudades($conexion,$_POST["slc-centroEstudio"]);
		break;

		case 'ciudadesAdmin':
		include('../class/class-ciudad.php');
		Ciudad::obtenerCiudadesAdmin($conexion);
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
			Asignatura::obtenerAsignaturas($conexion,$_SESSION['idDepto']);
		break;
		
		case 'asignaturasT':
        
        	include('../class/class-asignatura.php');       
			Asignatura::obtenerAsignaturasT($conexion);
		break;
		
		case 'aula':
        
        	include('../class/class-aula.php');       
			Aula::obtenerAula($conexion,$_POST['codigoEdificio']);
        break;

        case 'aulaAdmin':
        
        	include('../class/class-aula.php');       
			Aula::obtenerAulaAdmin($conexion,$_POST['idEdificio']);
        break;

        case'secciones':
        	include('../class/class-seccion.php');
        	Seccion::obtenerSecciones($conexion,$_POST["slc-asignatura"]);
			break;
		
			case'seccionesT':
        	include('../class/class-seccion.php');
			Seccion::obtenerSeccionesT($conexion,$_SESSION["idTutor"]);
			break;

			case'seccionesE':
        	include('../class/class-seccion.php');
			Seccion::obtenerSeccionesE($conexion,$_SESSION["idAlumno"]);
			break;
			
			case'ObtenerSeccionesE':
        	include('../class/class-seccion.php');
			Seccion::obtenerSeccionesEM($conexion,$_POST['idClase']);
			break;


        case'detallematricula':
        	include('../class/class-detalle-matricula.php');
        	DetalleMatricula:: obtenerDetalleMatricula($conexion);
		break;
		
		case'obtenerEstudiantes':
        	include('../class/class-seccion.php');
			Seccion::obtenerEstudiantes($conexion,$_SESSION["idSecEstudiantes"]);
			break;

			case'solicitudesNot':
        	include('../class/class-asignatura.php');
			Asignatura::obtenerNotificacion($conexion);
			break;

		default:
			echo "Acción inválida";
			break;
	}
	$conexion->cerrarConexion();
?>