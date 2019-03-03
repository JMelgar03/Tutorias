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
						'SELECT NombreDepartamento
						FROM ciudad c
						inner join centrodeestudio ce on ce.ciudad_idCiudad = c.idCiudad
						inner join departamento d on c.idDepartamento = d.idDepartamento
						WHERE idCentrodeEstudio ='.$codigoCentro
					);

		
			while (($fila= $conexion->obtenerFila($resultado))) {
				
				echo $fila['NombreDepartamento'];
			}
				
		}


	}
?>