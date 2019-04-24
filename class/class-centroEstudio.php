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

          $resultado = $conexion->ejecutarConsulta('SELECT * FROM centrodeestudio');
            while (($fila= $conexion->obtenerFila($resultado))) {
				
				echo '<option value='.$fila['idCentrodeEstudio'].'>'.$fila['NombreCentro'].' </option>';
			}

		}

		static public function obtenerCentrosAdmin($conexion){

          $resultado = $conexion->ejecutarConsulta('SELECT A.idCentrodeEstudio As idCentro, A.NombreCentro As nombreCentro, B.NombreCiudad AS nombreCiudad
			FROM centrodeestudio A
			Inner Join ciudad B
			Where A.ciudad_idCiudad = B.idCiudad');
            $i = 1;
            while (($fila= $conexion->obtenerFila($resultado))) {
				echo  	'<tr>
						<th scope="row">'.$i.'</th>
						<td>'.$fila['nombreCentro'].'</td>
						<td>'.$fila['nombreCiudad'].'</td>
						<td><button class="btn btn-danger" onclick="eliminarCentro('.$fila['idCentro'].')"><i class="fa fa-trash"></i></button> </td>
						<td><button class="btn btn-info" onclick="verEdificios('.$fila['idCentro'].')"><i class="fa fa-sort"></i></button> </td>
						</tr>';
				$i++;
			}

		}
	}
?>