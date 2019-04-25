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

        static public function obtenerAulaAdmin($conexion,$idEdificio){

          $resultado = $conexion->ejecutarConsulta('Select A.idAula As idAula, A.NumerodeAula As numeroAula, A.Capacidad As capacidad
			From aula A
			Where A.idEdificio ='. $idEdificio);
            $i = 1;
            while (($fila= $conexion->obtenerFila($resultado))) {
				echo  	'<tr>
						<th scope="row">'.$i.'</th>
						<td>'.$fila['numeroAula'].'</td>
						<td>'.$fila['capacidad'].'</td>
						<td><button class="btn btn-danger" onclick="eliminarAula('.$fila['idAula'].')"><i class="fa fa-trash"></i></button> </td>
						</tr>';
				$i++;
			}
			echo '<tr>
				<td></td>
				<td><input class="form-control" id="numeroAula'. $idEdificio .'"></td>
				<td><input class="form-control" id="capacidad'.$idEdificio.'"></td>
				<td><button class="btn btn-success" onclick="guardarAula('.$idEdificio.')"><i class="fa fa-plus"></i></button></td>
			</tr>';

		}

		static public function eliminarAula($conexion, $idAula){

          	$resultado = $conexion->ejecutarConsulta('DELETE FROM aula WHERE idAula='. $idAula );
         	echo $conexion->getError();
			echo 'Aula Eliminada';

		}

		static public function guardarAula($conexion, $numeroAula, $capacidad,$idEdificio){

          	$resultado = $conexion->ejecutarConsulta('INSERT INTO aula(NumerodeAula,Capacidad,idEdificio) VALUES ("'. $numeroAula.'",' . $capacidad .','. $idEdificio .')' );
         	echo $conexion->getError();
			echo 'Aula Creada';

		}
	}
?>