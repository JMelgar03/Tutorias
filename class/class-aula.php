<?php

	class Aula{

		private $idAula;
		private $NumerodeAula;
		private $Capacidad;
		private $idEdificio;

		public function __construct($idAula,
					$NumerodeAula,
					$Capacidad,
					$idEdificio){
			$this->idAula = $idAula;
			$this->NumerodeAula = $NumerodeAula;
			$this->Capacidad = $Capacidad;
			$this->idEdificio = $idEdificio;
		}
		public function getIdAula(){
			return $this->idAula;
		}
		public function setIdAula($idAula){
			$this->idAula = $idAula;
		}
		public function getNumerodeAula(){
			return $this->NumerodeAula;
		}
		public function setNumerodeAula($NumerodeAula){
			$this->NumerodeAula = $NumerodeAula;
		}
		public function getCapacidad(){
			return $this->Capacidad;
		}
		public function setCapacidad($Capacidad){
			$this->Capacidad = $Capacidad;
		}
		public function getIdEdificio(){
			return $this->idEdificio;
		}
		public function setIdEdificio($idEdificio){
			$this->idEdificio = $idEdificio;
		}
		public function __toString(){
			return "IdAula: " . $this->idAula . 
				" NumerodeAula: " . $this->NumerodeAula . 
				" Capacidad: " . $this->Capacidad . 
				" IdEdificio: " . $this->idEdificio;
        }
        
        static public function obtenerAula($conexion,$codigoEdificio){

                $sql = 'SELECT * FROM aula WHERE idEdificio='.$codigoEdificio;
                $resultado = $conexion->ejecutarConsulta($sql);
                while(($fila = $conexion->obtenerFila($resultado)))
                   {
                    echo 
                    '<option value="'.$fila['idAula'].'">'.$fila['NumerodeAula'].' </option>';
                   }

        }
	}
?>