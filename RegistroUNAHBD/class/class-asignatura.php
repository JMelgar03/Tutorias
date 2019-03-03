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

          $resultado = $conexion->ejecutarConsulta("SELECT * FROM Asignatura where codigoDepartamento=".$codigoDepartamento."");
            while (($fila= $conexion->obtenerFila($resultado))) {
				
				echo '<option value='.$fila['CODIGOASIGNATURA'].'>'.$fila['NOMBREASIGNATURA'].' </option>';
			}

		}


	}


?>