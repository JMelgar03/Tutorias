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

		static public function obtenerEdificiosAdmin($conexion,$idCentroEstudio){

          $resultado = $conexion->ejecutarConsulta('SELECT A.idEdificio As idEdificio, A.Nombre_edificio As nombreEdificio, A.NumerodeAulas As numeroAulas
			FROM edificio A
			Where A.idEdificioCE = '. $idCentroEstudio);
            $i = 1;
            while (($fila= $conexion->obtenerFila($resultado))) {
				echo  	'<tr>
						<th scope="row">'.$i.'</th>
						<td>'.$fila['nombreEdificio'].'</td>
						<td>'.$fila['numeroAulas'].'</td>
						<td><button class="btn btn-danger" onclick="eliminarEdificio('.$fila['idEdificio'].')"><i class="fa fa-trash"></i></button> </td>
						<td><button class="btn btn-info" onclick="verAulas('.$fila['idEdificio'].')"><i class="fa fa-sort"></i></button> </td>
						</tr>
						<tr>
							<td colspan="4"><table class="table col-xs-12" id="aulas'.$fila['idEdificio'].'" style="display:none;">
					          <thead class="thead">
					            <tr>
					              <th scope="col">#</th>
					              <th scope="col">Aula</th>
					              <th scope="col">Capacidad</th>
					              <th scope="col"></th>
					            </tr>
					          </thead>
					          <tbody id="listaAulas'. $fila['idEdificio'] .'">
					          </tbody>
					      	</table></td>
				      	</tr>';
				$i++;
			}
			echo '<tr>
				<td></td>
				<td><input class="form-control" id="nombreEdificio'. $idCentroEstudio .'"></td>
				<td><input class="form-control" id="numeroAulas'.$idCentroEstudio.'"></td>
				<td><button class="btn btn-success" onclick="guardarEdificio('.$idCentroEstudio.')"><i class="fa fa-plus"></i></button></td>
			</tr>';

		}

		static public function eliminarEdificio($conexion, $idEdificio){

          	$resultado = $conexion->ejecutarConsulta('DELETE FROM edificio WHERE idEdificio='. $idEdificio );
         	echo $conexion->getError();
			echo 'Edificio Eliminado';

		}

		static public function guardarEdificio($conexion, $nombreEdificio, $numeroAulas,$idCentro){

          	$resultado = $conexion->ejecutarConsulta('INSERT INTO edificio(Nombre_edificio,idEdificioCE,NumerodeAulas) VALUES ("'. $nombreEdificio.'",' . $idCentro .','. $numeroAulas .')' );
         	echo $conexion->getError();
			echo 'Centro Creado';

		}
	}
?>