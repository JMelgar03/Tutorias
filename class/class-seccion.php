<?php

	class Seccion{

		private $codigoSeccion;
		private $horaInicio;
		private $horaFin;
		private $descripcion;
		private $nombreSeccion;
		private $cupos;
		private $codigoAula;
		private $codigoLaboratorio;
		private $codigoAsignatura;
		private $codigoDetalleMatricula;
		private $codigoCatedratico;

		public function __construct($codigoSeccion,
					$horaInicio,
					$horaFin,
					$descripcion,
					$nombreSeccion,
					$cupos,
					$codigoAula,
					$codigoLaboratorio,
					$codigoAsignatura,
					$codigoDetalleMatricula,
					$codigoCatedratico){
			$this->codigoSeccion = $codigoSeccion;
			$this->horaInicio = $horaInicio;
			$this->horaFin = $horaFin;
			$this->descripcion = $descripcion;
			$this->nombreSeccion = $nombreSeccion;
			$this->cupos = $cupos;
			$this->codigoAula = $codigoAula;
			$this->codigoLaboratorio = $codigoLaboratorio;
			$this->codigoAsignatura = $codigoAsignatura;
			$this->codigoDetalleMatricula = $codigoDetalleMatricula;
			$this->codigoCatedratico = $codigoCatedratico;
		}
		public function getCodigoSeccion(){
			return $this->codigoSeccion;
		}
		public function setCodigoSeccion($codigoSeccion){
			$this->codigoSeccion = $codigoSeccion;
		}
		public function getHoraInicio(){
			return $this->horaInicio;
		}
		public function setHoraInicio($horaInicio){
			$this->horaInicio = $horaInicio;
		}
		public function getHoraFin(){
			return $this->horaFin;
		}
		public function setHoraFin($horaFin){
			$this->horaFin = $horaFin;
		}
		public function getDescripcion(){
			return $this->descripcion;
		}
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
		public function getNombreSeccion(){
			return $this->nombreSeccion;
		}
		public function setNombreSeccion($nombreSeccion){
			$this->nombreSeccion = $nombreSeccion;
		}
		public function getCupos(){
			return $this->cupos;
		}
		public function setCupos($cupos){
			$this->cupos = $cupos;
		}
		public function getCodigoAula(){
			return $this->codigoAula;
		}
		public function setCodigoAula($codigoAula){
			$this->codigoAula = $codigoAula;
		}
		public function getCodigoLaboratorio(){
			return $this->codigoLaboratorio;
		}
		public function setCodigoLaboratorio($codigoLaboratorio){
			$this->codigoLaboratorio = $codigoLaboratorio;
		}
		public function getCodigoAsignatura(){
			return $this->codigoAsignatura;
		}
		public function setCodigoAsignatura($codigoAsignatura){
			$this->codigoAsignatura = $codigoAsignatura;
		}
		public function getCodigoDetalleMatricula(){
			return $this->codigoDetalleMatricula;
		}
		public function setCodigoDetalleMatricula($codigoDetalleMatricula){
			$this->codigoDetalleMatricula = $codigoDetalleMatricula;
		}
		public function getCodigoCatedratico(){
			return $this->codigoCatedratico;
		}
		public function setCodigoCatedratico($codigoCatedratico){
			$this->codigoCatedratico = $codigoCatedratico;
		}
		public function __toString(){
			return "CodigoSeccion: " . $this->codigoSeccion . 
				" HoraInicio: " . $this->horaInicio . 
				" HoraFin: " . $this->horaFin . 
				" Descripcion: " . $this->descripcion . 
				" NombreSeccion: " . $this->nombreSeccion . 
				" Cupos: " . $this->cupos . 
				" CodigoAula: " . $this->codigoAula . 
				" CodigoLaboratorio: " . $this->codigoLaboratorio . 
				" CodigoAsignatura: " . $this->codigoAsignatura . 
				" CodigoDetalleMatricula: " . $this->codigoDetalleMatricula . 
				" CodigoCatedratico: " . $this->codigoCatedratico;
		}




		static public function obtenerSecciones($conexion,$codigoAsignatura){
			

			$sql = "select* from seccion where CODIGOASIGNATURA =".$codigoAsignatura.""; 

          $resultado = $conexion->ejecutarConsulta($sql);
            while (($fila= $conexion->obtenerFila($resultado))) {
				
				$sql2="select count(*) Matriculas from DETALLEMATRICULA dm where codigoSeccion=".$fila["CODIGOSECCION"]."";
				$resultado2 = $conexion->ejecutarConsulta($sql2);
				$fila2 = $conexion->obtenerFila($resultado2);
				$cuposDisponibles = $fila["CUPOS"] - $fila2["MATRICULAS"];
				echo '<option value='.$fila['CODIGOSECCION'].'>Hora Inicio'.$fila['HORAINICIO'].' Hora FIN'.$fila['HORAFIN'].' Cupos:'.$cuposDisponibles.'</option>';
			}

		}




		
		static public function obtenerSeccionesT($conexion,$codigoTutor){
			

			$sql = "select* from seccion s
			inner join clase c on id_Clase = s.idClase 
			where idTutor =".$codigoTutor; 

		  $resultado = $conexion->ejecutarConsulta($sql);
		  $respuesta=array();
            while (($fila= $conexion->obtenerFila($resultado))) {
				
				$sql2="select count(*) Matriculas from seccionxalumno sxa where id_Seccion=".$fila["id_Seccion"]."";
				$resultado2 = $conexion->ejecutarConsulta($sql2);
				$fila2 = $conexion->obtenerFila($resultado2);
				$cuposDisponibles = $fila["Cupos"] - $fila2["Matriculas"];
				/*$respuesta['nombreSeccion'] = $fila['NombreSeccion'];
				$respuesta['horaInicial'] = $fila['Hora_Inicio'];
				$respuesta['horaFinal'] = $fila['Hora_Fin'];
				$respuesta['nombreMateria'] = $fila['NombreClase'];
				$respuesta['dias'] = $fila['Dias'];
				$respuesta['cupos'] = $cuposDisponibles;*/

				echo '<div class="card">'
				.'<div class="card-body">'
					.'<h5 class="card-title">'.$fila['NombreSeccion'].'</h5>'
					.'<div class="row">'
						.'<div class = "col-10">'
							.'<p class="card-text"> Materia: '.$fila['NombreClase'].'</p>'
								.'<div class="row">'
									.'<div class="col-6">'
										.'<p class="card-text"> Hora Inicial: '.$fila['Hora_Inicio'].'</p>'
									.'</div>'
									.'<div class="col-6">'
										.'<p class="card-text"> Hora Final: '.$fila['Hora_Fin'].'</p>'
									.'</div><br><br>'
								.'</div>'
							.'<p class="card-text"> Dias: '.$fila['Dias'].'</p>'
							.'<p class="card-text"> Cupos Disponibles: '.$cuposDisponibles.'</p>'
						.'</div>'
						.'<div class = "col-2">'
							.'<div class="img-container"><img src="img/imgunah/cropped-logo-2.png" class="logo-seccion"></div>'
							.'<p class="card-text card-calificacion"> Calificación: </p>'
						.'</div>'
					.'</div>'
				.'</div>'
				.'<div>'
					.'<input type="button" class="btn btn-danger" style=" height:40px;" onclick="eliminarSeccion('.$fila['id_Seccion'].')" value="Elimar Seccion">'
					.'<input type="button" class="btn btn-primary" style="color: white;" value="Agregar Comunicado" onclick="agregarNoticia('.$fila['id_Seccion'].')">'
					.'<a class="btn btn-success" href="#"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="mostrarNoticia('.$fila['id_Seccion'].')">
					Ver Comunicado
				  </a>'
	            .'</div>'		
			.'</div>
			<br>
			<br>';
				
			}

		}


		static public function eliminarSeccion($conexion,$codigoSeccion){
			$sql = "delete from seccion  
			where id_Seccion =".$codigoSeccion; 
			$resultado = $conexion->ejecutarConsulta($sql);
			echo $conexion->getError();
			echo '<h3>Seccion Eliminada</h3>';
		
		
		}


		static public function crearSeccionT($conexion,$Hora_Inicio,$Hora_Fin,$Dias,$idClase,$NombreSeccion,$Cupos,$idAula,$idTutor){
				$sql = 'INSERT INTO seccion (Hora_Inicio,Hora_Fin,Dias,idClase,NombreSeccion,Cupos,idAula,idTutor) 
									Values ('.$Hora_Inicio.','.$Hora_Fin.',"'.$Dias.'",'.$idClase.','.$NombreSeccion.','.$Cupos.','.$idAula.','.$idTutor.')';
				echo $sql;
				echo'----------------';
				$resultado = $conexion->ejecutarConsulta($sql);
				
				echo $conexion->getError();

		}


		static public function obtenerSeccionesE($conexion,$codigoEstudiante){
			$sql = "select* from seccion s
			inner join clase c on id_Clase = s.idClase
			inner join seccionxalumno sxa on s.id_Seccion = sxa.id_Seccion
			where sxa.idAlumno =".$codigoEstudiante; 

		  $resultado = $conexion->ejecutarConsulta($sql);
		  $respuesta=array();
            while (($fila= $conexion->obtenerFila($resultado))) {
				$sql2 = 'SELECT a.estado FROM alumno a 
				INNER JOIN tutor t on a.idAlumno = t.idAlumno
				INNER JOIN seccion s on t.idTutor = s.idTutor
				WHERE s.id_Seccion = '.$fila['id_Seccion'];
				$resultado2 = $conexion->ejecutarConsulta($sql2);
				$fila2 = $conexion->obtenerFila($resultado2);
				if($fila2['estado'] == 'A')
				{
						echo '<div class="card" id="\'div'.$fila['id_Seccion'].'\'">'
						.'<div class="card-body">'
							.'<h5 class="card-title">'.$fila['NombreSeccion'].'</h5>'
							.'<div class="row">'
								.'<div class = "col-10">'
									.'<p class="card-text"> Materia: '.$fila['NombreClase'].'</p>'
										.'<div class="row">'
											.'<div class="col-6">'
												.'<p class="card-text"> Hora Inicial: '.$fila['Hora_Inicio'].'</p>'
											.'</div>'
											.'<div class="col-6">'
												.'<p class="card-text"> Hora Final: '.$fila['Hora_Fin'].'</p>'
											.'</div><br><br>'
										.'</div>'
									.'<p class="card-text"> Dias: '.$fila['Dias'].'</p>'
								.'</div>'
								.'<div class = "col-2">'
									.'<div class="img-container"><img src="img/imgunah/cropped-logo-2.png" class="logo-seccion"></div>'
									.'<p class="card-text card-calificacion"> Calificación: </p>'
								.'</div>'
							.'</div>'
						.'</div>'
						.'<div>'
							.'<a class="btn btn-success" href="#"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="mostrarNoticia('.$fila['id_Seccion'].')">
							Ver Comunicado
						</a>
						<input type="button" class="btn btn-danger" value="Abandonar" onclick="abandonarSeccion('.$fila['id_Seccion'].')"'
						.'</div>'		
					.'</div>
					<br>
					<br>';
				}else{
					echo '<label>Seccion No Disponible por el momento.</label>
					<br>';
				}
			}
		}


	static public function obtenerSeccionesEM($conexion,$codigoClase){


		$sql = "select* from seccion s
		inner join clase c on id_Clase = s.idClase 
		where id_Clase =".$codigoClase; 

	  $resultado = $conexion->ejecutarConsulta($sql);
	  $respuesta=array();
		while (($fila= $conexion->obtenerFila($resultado))) {
			
			$sql2="select count(*) Matriculas from seccionxalumno sxa where id_Seccion=".$fila["id_Seccion"]."";
			$resultado2 = $conexion->ejecutarConsulta($sql2);
			$fila2 = $conexion->obtenerFila($resultado2);
			$cuposDisponibles = $fila["Cupos"] - $fila2["Matriculas"];
			echo 
				'<option value="'.$fila['id_Seccion'].'">Cupos:'.$cuposDisponibles.' HoraInicio: '.$fila['Hora_Inicio'].' HoraFinal: '.$fila['Hora_Fin'].'</option>';
				
		}


		}


		static public function matricularSeccion($conexion,$idSeccion,$idAlumno){
			$sql = 'INSERT INTO seccionxalumno (id_Seccion,idAlumno) VALUES ('.$idSeccion.','.$idAlumno.')';
			$resultado = $conexion->ejecutarConsulta($sql);
			echo  $conexion->getError();
			echo 'Matriculada con exito!';
		}


		static public function seccionMatriculada($conexion,$idSeccion,$idAlumno){
			$sql = 'SELECT * FROM seccionxalumno where id_Seccion='.$idSeccion.' AND idAlumno='.$idAlumno;
			$resultado = $conexion->ejecutarConsulta($sql);
			$cantidadRegistros = $conexion->cantidadRegistros($resultado);
			if($cantidadRegistros == 1){
				echo 1;
			}else{
				echo 0;
			}
			echo  $conexion->getError();
		}


		static public function abandonarSeccion($conexion,$idSeccion,$idAlumno){
			$sql='Delete from seccionxalumno where id_Seccion = '.$idSeccion.' And idAlumno= '.$idAlumno;
			$conexion->ejecutarConsulta($sql);
			echo $conexion->getError();
		}
	}
?>