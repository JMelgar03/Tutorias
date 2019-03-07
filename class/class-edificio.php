<?php

	class Edificio{

		private $idEdificio;
		private $Nombre_edificio;
		private $idEdificioCE;
		private $NumerodeAulas;

		public function __construct($idEdificio,
					$Nombre_edificio,
					$idEdificioCE,
					$NumerodeAulas){
			$this->idEdificio = $idEdificio;
			$this->Nombre_edificio = $Nombre_edificio;
			$this->idEdificioCE = $idEdificioCE;
			$this->NumerodeAulas = $NumerodeAulas;
		}
		public function getIdEdificio(){
			return $this->idEdificio;
		}
		public function setIdEdificio($idEdificio){
			$this->idEdificio = $idEdificio;
		}
		public function getNombre_edificio(){
			return $this->Nombre_edificio;
		}
		public function setNombre_edificio($Nombre_edificio){
			$this->Nombre_edificio = $Nombre_edificio;
		}
		public function getIdEdificioCE(){
			return $this->idEdificioCE;
		}
		public function setIdEdificioCE($idEdificioCE){
			$this->idEdificioCE = $idEdificioCE;
		}
		public function getNumerodeAulas(){
			return $this->NumerodeAulas;
		}
		public function setNumerodeAulas($NumerodeAulas){
			$this->NumerodeAulas = $NumerodeAulas;
		}
		public function __toString(){
			return "IdEdificio: " . $this->idEdificio . 
				" Nombre_edificio: " . $this->Nombre_edificio . 
				" IdEdificioCE: " . $this->idEdificioCE . 
				" NumerodeAulas: " . $this->NumerodeAulas;
        }
        
        static public function obtenerEdificiosT($conexion){

			$resultado = $conexion->ejecutarConsulta('SELECT * FROM edificio');
			  while (($fila= $conexion->obtenerFila($resultado))) {
				  echo 
				  '<option value="'.$fila['idEdificio'].'">'.$fila['Nombre_edificio'].' </option>';
			  }
  
		  }
	}
?>