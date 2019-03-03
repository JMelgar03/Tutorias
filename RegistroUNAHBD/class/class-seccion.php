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




	}
?>