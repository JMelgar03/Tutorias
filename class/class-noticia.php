<?php

	class Noticia{

		private $idNoticia;
		private $asunto;
		private $descripcion;
		private $idSeccion;

		public function __construct($idNoticia,
					$asunto,
					$descripcion,
					$idSeccion){
			$this->idNoticia = $idNoticia;
			$this->asunto = $asunto;
			$this->descripcion = $descripcion;
			$this->idSeccion = $idSeccion;
		}
		public function getIdNoticia(){
			return $this->idNoticia;
		}
		public function setIdNoticia($idNoticia){
			$this->idNoticia = $idNoticia;
		}
		public function getAsunto(){
			return $this->asunto;
		}
		public function setAsunto($asunto){
			$this->asunto = $asunto;
		}
		public function getDescripcion(){
			return $this->descripcion;
		}
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
		public function getIdSeccion(){
			return $this->idSeccion;
		}
		public function setIdSeccion($idSeccion){
			$this->idSeccion = $idSeccion;
		}
		public function __toString(){
			return "IdNoticia: " . $this->idNoticia . 
				" Asunto: " . $this->asunto . 
				" Descripcion: " . $this->descripcion . 
				" IdSeccion: " . $this->idSeccion;
        }
     
        
        public function publicarNoticia($conexion){
		$sql = 
	
				sprintf(
				   "INSERT INTO noticias(asunto,descripcion,idSeccion) 
					VALUES ('%s','%s',%s)",
					
					$conexion->antiInyeccion($this->asunto),
					$conexion->antiInyeccion($this->descripcion),
					$conexion->antiInyeccion($this->idSeccion)
					
                   );
                   
            echo $sql;
            $resultado = $conexion->ejecutarConsulta($sql);	
			echo $conexion->getError();
        
	}
	
	 static public function ObtenerNoticias($conexion,$idSeccion){
		$resultado = $conexion->ejecutarConsulta('SELECT * 
		FROM noticias
		WHERE idSeccion ='.$idSeccion);
            while (($fila= $conexion->obtenerFila($resultado))) {
				

			echo '<div class="media div_noticia">';
				if($_SESSION['idTipoUsuario']==2){
				echo'<input type="button" class="btn btn-danger" style="color: white;" value="X" onClick="eliminarNoticia('.$fila['idNoticia'].')">';
			}else{
				echo'';
			}
				echo'<img src="img/perfil-vacio.jpg" class="mr-3" alt="Smiley face" width="40" height="40">
				<div class="media-body">
				  <h5 class="mt-0 asunto">'.$fila['asunto'].'</h5>
					<label clas="descripcion">
					'.$fila['descripcion'].'
					</label>
					<div id="div-comentario-'.$fila['idNoticia'].'">';
						$resultado2 = $conexion->ejecutarConsulta('SELECT * FROM Comentario cm INNER JOIN alumno al ON cm.idAlumno = al.idAlumno WHERE idNoticia='.$fila['idNoticia']);
				  		while (($fila2=$conexion->obtenerFila($resultado2))) {
							echo'<div class="media mt-3 div_comentario">
							<a class="mr-3" href="#">
							  <img src="img/perfil-vacio.jpg" class="mr-3" alt="Smiley face"width="25" height="25">
							</a>
							<div class="media-body">
								<h5 class="mt-0">'.$fila2['Nombre1'].' '.$fila2['Apellido1'].'</h5>
								 '.$fila2['comentario'].'
							</div>';
							if($_SESSION['idTipoUsuario']==2){
								echo'<input type="button" class="btn btn-danger" style="color: white;" value="X" onClick="eliminarComentario('.$fila2['idComentario'].')">';
							}else{
								echo'';
							}
						  echo'</div>';
						  }
				 echo '</div>
				 </div>
				</div>
				<textArea class="form-control" id="txt-noticia-'.$fila['idNoticia'].'" placeHolder="Escribe un comentario."></textArea>
				  <input type="button" class="btn" value="Comentar" onclick="comentarNoticia('.$fila['idNoticia'].',\''.$_SESSION['nombreYApellido'].'\','.$_SESSION['idAlumno'].')" >
				  <br>
				  <br>';

			}

		}
		static public function comentarNoticia($conexion,$idNoticia,$idAlumno,$comentario){
		 $sql = 'INSERT INTO comentario(comentario,idNoticia,idAlumno) VALUES ("'.$comentario.'",'.$idNoticia.','.$idAlumno.')';
		 echo $sql;
		 $conexion->ejecutarConsulta($sql);
		 echo $conexion->getError();
		 
		}	


		static public function eliminarNoticia($conexion,$idNoticia){
			$sql= ('Delete from Comentario where idNoticia='.$idNoticia);
			$sql2 = ('Delete from noticias where idNoticia='.$idNoticia);
			$conexion->ejecutarConsulta($sql);
			$conexion->ejecutarConsulta($sql2);
			echo $conexion->getError();
		}

		static public function eliminarComentario($conexion,$idComentario){

			$sql = ('Delete from Comentario where idComentario='.$idComentario);
			$conexion->ejecutarConsulta($sql);
			echo $conexion->getError();
		}
}
?>

