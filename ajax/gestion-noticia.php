<?php 
    session_start();

	include("../class/class-conexion.php");
	$conexion = new Conexion();
	switch ($_GET["accion"]) {
		
		case 'publicar':
			include("../class/class-noticia.php");
            $noticia = new Noticia(''
            ,$_POST['txt-asunto']
            ,$_POST['txt-mensaje']
            ,$_SESSION['idSeccion']
    );
            $noticia->publicarNoticia($conexion);
            break;

            case 'mostrar':
			include("../class/class-noticia.php");
            Noticia::ObtenerNoticias($conexion,$_POST['idSeccion']);
            break;


            case 'comentar':
			include("../class/class-noticia.php");
            Noticia::comentarNoticia($conexion,$_POST['idNoticia'],$_POST['idAlumno'],$_POST['txt-comentario']);
            break;

            case 'eliminarNoticia':
			include("../class/class-noticia.php");
            Noticia::eliminarNoticia($conexion,$_POST['idNoticia']);
            break;

            case 'eliminarComentario':
			include("../class/class-noticia.php");
            Noticia::eliminarComentario($conexion,$_POST['idComentario']);
            break;
            
        default:
            echo'Opcion invalida.';
        break;

       
    }
    $conexion->cerrarConexion();
?>