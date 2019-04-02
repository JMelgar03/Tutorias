<?php

	class DepartamentoCarrera{

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


		static public function obtenerDepartamentoCarrera($conexion){

          $resultado = $conexion->ejecutarConsulta("SELECT * FROM departamentoxcarrera");
            while (($fila= $conexion->obtenerFila($resultado))) {
				/*echo '
				<div class="col-sm-6">
				  <div class="card">
					<div class="card-body">
					  <h5 class="card-title">'.$fila['NombreDepartamento'].'</h5>
					  <input type="text"  style="display:none" id="txt-id-departamento-clase" value="'.$fila['idDepartamentoxCarrera'].'">
					  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
					  <a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				  </div>
				</div> ';*/

				echo'<div class="col-sm-4 mt-4">
				<div class="card" style="width: 18rem;">
				<img src="'.$fila['imagen'].'" class="card-img-top" width="200" height="200" alt="...">
				<div class="card-body">
				  <h5 class="card-title">'.$fila['NombreDepartamento'].'</h5>
				  <p class="card-text">Aqui se encuentran todas las clases que pertenecen al departamento de '.$fila['NombreDepartamento'].'</p>
				  <input  type="button" onclick="verClases('.$fila['idDepartamentoxCarrera'].')" class="btn btn-primary" value="Ver clases">
				</div>
			  </div>
			  </div>';
			}

		}


	}
?>