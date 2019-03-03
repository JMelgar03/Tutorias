<?php

	class Facultad{

		private $codigoFacultad;
		private $nombreFacultad;

		public function __construct($codigoFacultad,
					$nombreFacultad){
			$this->codigoFacultad = $codigoFacultad;
			$this->nombreFacultad = $nombreFacultad;
		}
		public function getCodigoFacultad(){
			return $this->codigoFacultad;
		}
		public function setCodigoFacultad($codigoFacultad){
			$this->codigoFacultad = $codigoFacultad;
		}
		public function getNombreFacultad(){
			return $this->nombreFacultad;
		}
		public function setNombreFacultad($nombreFacultad){
			$this->nombreFacultad = $nombreFacultad;
		}
		public function __toString(){
			return "CodigoFacultad: " . $this->codigoFacultad . 
				" NombreFacultad: " . $this->nombreFacultad;
		}


		public static function obtenerFacultad($conexion,$codigoCarrera){
			$resultado = $conexion->ejecutarConsulta(
						'SELECT nombreFacultad FROM Facultad f
						inner join Carrera ca on f.CODIGOFACULTAD = ca.CODIGOFACULTAD
						where ca.CODIGOCARRERA ='.$codigoCarrera
					);

		
			while (($fila= $conexion->obtenerFila($resultado))) {
				
				echo $fila['NOMBREFACULTAD'];
			}
				
		}

	}
?>