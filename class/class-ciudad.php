<?php

	class Ciudad{

		private $codigoCiudad;
		private $nombreCiudad;
		private $codigoDepartamento;

		public function __construct($codigoCiudad,
					$nombreCiudad,
					$codigoDepartamento){
			$this->codigoCiudad = $codigoCiudad;
			$this->nombreCiudad = $nombreCiudad;
			$this->codigoDepartamento = $codigoDepartamento;
		}
		public function getCodigoCiudad(){
			return $this->codigoCiudad;
		}
		public function setCodigoCiudad($codigoCiudad){
			$this->codigoCiudad = $codigoCiudad;
		}
		public function getNombreCiudad(){
			return $this->nombreCiudad;
		}
		public function setNombreCiudad($nombreCiudad){
			$this->nombreCiudad = $nombreCiudad;
		}
		public function getCodigoDepartamento(){
			return $this->codigoDepartamento;
		}
		public function setCodigoDepartamento($codigoDepartamento){
			$this->codigoDepartamento = $codigoDepartamento;
		}
		public function __toString(){
			return "CodigoCiudad: " . $this->codigoCiudad . 
				" NombreCiudad: " . $this->nombreCiudad . 
				" CodigoDepartamento: " . $this->codigoDepartamento;
		}


		public static function obtenerCiudades($conexion,$codigoCentro){
			$resultado = $conexion->ejecutarConsulta(
						'SELECT NombreCiudad
						FROM ciudad c
						inner join centrodeestudio ce on ce.ciudad_idCiudad = c.idCiudad
						WHERE idCentrodeEstudio ='.$codigoCentro
					);

		
			while (($fila= $conexion->obtenerFila($resultado))) {
				
				echo $fila['NombreCiudad'];
			}
				
		}
	}
?>