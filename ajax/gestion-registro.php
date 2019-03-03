<?php  

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

			default:
			 	echo 'Opcion invalida.';
			 break;
		}
		$conexion->cerrarConexion();

?>