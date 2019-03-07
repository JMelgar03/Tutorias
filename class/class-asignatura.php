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
            while (($fila= $conexion->obtenerFila($resultado))) {
				echo 
				'<div class="col-sm-6">
					<div class="card">
				  		<div class="card-body">
						<h5 class="card-title">'.$fila['CodigoClase'].' '.$fila['NombreClase'].'</h5>
						<p class="card-text">Consulte la disponibilidad de las tutorias.</p>
						<input type="button" class="btn btn-primary" onclick="obtenerSecciones('.$fila['id_Clase'].')" value="Ver Disponibilidad">
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


	}


?>