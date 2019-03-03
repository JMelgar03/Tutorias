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
						'SELECT c.NOMBRECIUDAD FROM Departamento d INNER JOIN Ciudad c ON d.CODIGODEPARTAMENTO = c.CODIGODEPARTAMENTO
						INNER JOIN CentroEstudio ce ON c.CODIGOCIUDAD = ce.CODIGOCIUDAD
						WHERE ce.CODIGOCENTROESTUDIO ='.$codigoCentro
					);

		
			while (($fila= $conexion->obtenerFila($resultado))) {
				
				echo $fila['NOMBRECIUDAD'];
			}
				
		}
	}
?>