<?php  
	session_start();
	include("../class/class-conexion.php");
	$conexion = new Conexion();
	
	switch($_GET["accion1"]) {
		
		case'guardar':
			include("../class/class-usuario1.php");
			include("../class/class-alumno1.php");

			$contrasena = sha1($_POST["txt-password"]);
			$usuario = new Usuario('',
			$_POST["txt-correoelectronico"],
			$contrasena,
			$_POST["slc-preguntas"],
			$_POST["txt-respuesta"],
			$_POST["slc-tipo-usuario"]);
		
			
			$alumno = new Alumno('',
			$_POST["txt-pnombre"],
			$_POST["txt-snombre"],
			$_POST["txt-papellido"],
			$_POST["txt-sapellido"],
			$_POST["txt-cuenta"],
			$_POST["txt-telefono"],
			'',
			$_POST["slc-carreras"]);
			
			$usuario->insertarUsuario($conexion);
			$alumno->insertarAlumno($conexion);
			break;
		case 'guardarSeccion':
		include("../class/class-seccion.php");
			Seccion::crearSeccionT($conexion,$_POST['slc-horaInicial'],$_POST['slc-horaFinal'],$_POST['dias'],$_POST['slc-materia'],$_POST['nombreSeccion'],$_POST['txt-numeroCupos'],$_POST['slc-aula'],$_SESSION['idTutor']);
			break;

		case 'guardarSolicitud':
			include("../class/class-asignatura.php");
				Asignatura::crearSolicitud($conexion,$_POST['slc-horaInicial2'],$_POST['slc-horaFinal2'],$_POST['dias'],$_POST['txt-idClase']);
				break;
	
		case 'eliminarSolicitud':
				include("../class/class-asignatura.php");
					Asignatura::eliminarSolicitud($conexion,$_POST['idSolicitud']);
					break;

		case 'obtenerSolicitudes':
				include("../class/class-asignatura.php");
					Asignatura::obtenerSolicitudes($conexion);
					break;

		case'editarAlumno':
			include("../class/class-alumno1.php");
			Alumno::editarAlumno($conexion,$_POST["pNombre"],$_POST['sNombre'],$_POST['pApellido'],$_POST['sApellido'],$_POST['cuenta'],$_POST['telefono'],$_SESSION['numeroCuenta']);
		break;
			default:
			 	echo 'Opcion invalida.';
			 break;
		}
		$conexion->cerrarConexion();

?>