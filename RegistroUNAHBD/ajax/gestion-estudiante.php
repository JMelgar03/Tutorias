<?php  

	include("../class/class-conexion.php");
	$conexion = new Conexion();
	
	switch($_GET["accion1"]) {
		
		case'guardar':
			include("../class/class-estudiante.php");
			$contrasena = sha1($_POST["txt-password"]);
			$Estudiante = new Estudiante($_POST["txt-pnombre"],$_POST["txt-snombre"],
										 $_POST["txt-papellido"],$_POST["txt-sapellido"],
										 $_POST["txt-cuenta"],$_POST["txt-correoelectronico"],
										 $_POST["txt-direccion"],$_POST["txt-telefono"],
										 $contrasena,$_POST["txt-fechanacimiento"],
										 $_POST["slc-centroEstudio"],$_POST["txt-fechaingreso"],$_POST["slc-carreras"]);
		
			$Estudiante->guardarEstudiante($conexion);
			break;

			default:
			 	echo 'Opcion invalida.';
			 break;
		}

?>