<?php

	class CentroEstudio{

		private $codigoCentroEstudio;
		private $nombreCentro;
		private $codigoCiudad;

		public function __construct($codigoCentroEstudio,
					$nombreCentro,
					$codigoCiudad){
			$this->codigoCentroEstudio = $codigoCentroEstudio;
			$this->nombreCentro = $nombreCentro;
			$this->codigoCiudad = $codigoCiudad;
		}
		public function getCodigoCentroEstudio(){
			return $this->codigoCentroEstudio;
		}
		public function setCodigoCentroEstudio($codigoCentroEstudio){
			$this->codigoCentroEstudio = $codigoCentroEstudio;
		}
		public function getNombreCentro(){
			return $this->nombreCentro;
		}
		public function setNombreCentro($nombreCentro){
			$this->nombreCentro = $nombreCentro;
		}
		public function getCodigoCiudad(){
			return $this->codigoCiudad;
		}
		public function setCodigoCiudad($codigoCiudad){
			$this->codigoCiudad = $codigoCiudad;
		}
		public function __toString(){
			return "CodigoCentroEstudio: " . $this->codigoCentroEstudio . 
				" NombreCentro: " . $this->nombreCentro . 
				" CodigoCiudad: " . $this->codigoCiudad;
		}



		static public function obtenerCentros($conexion){

          $resultado = $conexion->ejecutarConsulta('SELECT * FROM CentroEstudio');
            while (($fila= $conexion->obtenerFila($resultado))) {
				
				echo '<option value='.$fila['CODIGOCENTROESTUDIO'].'>'.$fila['NOMBRECENTRO'].' </option>';
			}

		}
	}
?>