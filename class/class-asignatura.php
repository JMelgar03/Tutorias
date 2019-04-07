<?php

	class Asignatura{

		private $codigoAsignatura;
		private $nombreAsignatura;
		private $codigoDepartamento;

		public function __construct($codigoAsignatura,
					$nombreAsignatura,
					$codigoDepartamento){
			$this->codigoAsignatura = $codigoAsignatura;
			$this->nombreAsignatura = $nombreAsignatura;
			$this->codigoDepartamento = $codigoDepartamento;
		}
		public function getCodigoAsignatura(){
			return $this->codigoAsignatura;
		}
		public function setCodigoAsignatura($codigoAsignatura){
			$this->codigoAsignatura = $codigoAsignatura;
		}
		public function getNombreAsignatura(){
			return $this->nombreAsignatura;
		}
		public function setNombreAsignatura($nombreAsignatura){
			$this->nombreAsignatura = $nombreAsignatura;
		}
		public function getCodigoDepartamento(){
			return $this->codigoDepartamento;
		}
		public function setCodigoDepartamento($codigoDepartamento){
			$this->codigoDepartamento = $codigoDepartamento;
		}
		public function __toString(){
			return "CodigoAsignatura: " . $this->codigoAsignatura . 
				" NombreAsignatura: " . $this->nombreAsignatura . 
				" CodigoDepartamento: " . $this->codigoDepartamento;
		}
	


		static public function obtenerAsignaturas($conexion,$codigoDepartamento){

          $resultado = $conexion->ejecutarConsulta('SELECT * FROM clase where idDepartamentoxCarrera ='.$codigoDepartamento);
		  $respuesta= array();
		  while (($fila= $conexion->obtenerFila($resultado))) {
		
				echo 
				'<div class="col-sm-6 mt-4">
					<div class="card">
				  		<div class="card-body">
						<h5 class="card-title">'.$fila['CodigoClase'].' '.$fila['NombreClase'].'</h5>
						<p class="card-text">Consulte la disponibilidad de las tutorias.</p>
						<input type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn btn-primary" onclick="obtenerSecciones('.$fila['id_Clase'].')" value="Ver Disponibilidad">
						  <input type="button" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo" class="btn btn-warning" value="Solicitar Seccion" onclick="crearBoton('.$fila['id_Clase'].')">
					</div>
				</div>
			  </div>';
			}

		}



		static public function obtenerAsignaturasT($conexion){

			$resultado = $conexion->ejecutarConsulta('SELECT * FROM clase');
			  while (($fila= $conexion->obtenerFila($resultado))) {
				  echo 
				  '<option value="'.$fila['id_Clase'].'">'.$fila['NombreClase'].' </option>';
			  }
  
		  }


		  static public function crearSolicitud($conexion,$horaInicio,$horaFin,$dias,$idClase){

				$sql="Insert into solicitud (Hora_Inicio,Hora_Fin,Dias,id_Clase) VALUES (".$horaInicio.",".$horaFin.",'".$dias."',".$idClase.")";	
				$conexion->ejecutarConsulta($sql);
				echo $conexion->getError();
		  }


		  static public function obtenerSolicitudes($conexion){
			$sql = 'SELECT *
			FROM  solicitud s
			INNER JOIN clase c on s.id_Clase = c.id_Clase';
		
			$resultado = $conexion->ejecutarConsulta($sql);
			$i=1;
			while( ($fila = $conexion->obtenerFila($resultado)))
			{
				echo  '<tr id="fila-'.$fila['idSolicitud'].'">
						<th scope="row">'.$i.'</th>
						<td>'.$fila['Hora_Inicio'].'</td>
						<td>'.$fila['Hora_Fin'].'</td>
						<td>'.$fila['Dias'].'</td>
						<td>'.$fila['NombreClase'].'</td>
						<td><input type="button" class="btn btn-danger" value="X" onclick="eliminarSolicitud('.$fila['idSolicitud'].')"> </td>
						<td><a class="btn btn-success" href="NuevaSeccion.html" >Crear </a></td>
						</tr>';
					$i++;
			}
		echo $conexion->getError();
		
		}

		static public function eliminarSolicitud($conexion,$idSolicitud){

			$sql="DELETE FROM solicitud where idSolicitud=".$idSolicitud;
			echo $sql;	
			$conexion->ejecutarConsulta($sql);
			echo $conexion->getError();
			echo'<td><label Style="color: red">ELIMINADA</label></td>';
	  }

	  static public function obtenerNotificacion($conexion){

		$sql="SELECT * FROM solicitud";
		$resultado = $conexion->ejecutarConsulta($sql);
		$cantidadRegistros = $conexion->cantidadRegistros($resultado);
		echo $conexion->getError();
		if($cantidadRegistros >= 1){
			echo'<a class="nav-link" href="solicitudes.php">solicitudes <span><i class="fas fa-bell" style="color:red;"></i></span></a>';
		}
		else{
			echo'<a class="nav-link" href="solicitudes.php">solicitudes</a>';
		}
  }


	}


?>