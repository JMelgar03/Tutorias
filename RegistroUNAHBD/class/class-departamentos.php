<?php

	class Departamento{

		private $codigoDepartamento;
		private $nombre;

		public function __construct($codigoDepartamento,
					$nombre){
			$this->codigoDepartamento = $codigoDepartamento;
			$this->nombre = $nombre;
		}
		public function getCodigoDepartamento(){
			return $this->codigoDepartamento;
		}
		public function setCodigoDepartamento($codigoDepartamento){
			$this->codigoDepartamento = $codigoDepartamento;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function __toString(){
			return "CodigoDepartamento: " . $this->codigoDepartamento . 
				" Nombre: " . $this->nombre;
		}


     	

     	public static function obtenerDepartamentos($conexion,$codigoCentro){
			$resultado = $conexion->ejecutarConsulta(
						'SELECT d.NOMBREDEPARTAMENTO FROM Departamento d INNER JOIN Ciudad c ON d.CODIGODEPARTAMENTO = c.CODIGODEPARTAMENTO
						INNER JOIN CentroEstudio ce ON c.CODIGOCIUDAD = ce.CODIGOCIUDAD
						WHERE ce.CODIGOCENTROESTUDIO ='.$codigoCentro
					);

		
			while (($fila= $conexion->obtenerFila($resultado))) {
				
				echo $fila['NOMBREDEPARTAMENTO'];
			}
				
		}


	}
?>