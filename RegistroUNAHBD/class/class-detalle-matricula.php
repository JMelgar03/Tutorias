<?php
	class DetalleMatricula{

		private $codigoMatricula;
		private $notaFinal;
		private $codigoHistorial;
		private $codigoSeccion;
		private $obs;

		public function __construct($codigoMatricula,
					$notaFinal,
					$codigoHistorial,
					$codigoSeccion,
					$obs){
			$this->codigoMatricula = $codigoMatricula;
			$this->notaFinal = $notaFinal;
			$this->codigoHistorial = $codigoHistorial;
			$this->codigoSeccion = $codigoSeccion;
			$this->obs = $obs;
		}
		public function getCodigoMatricula(){
			return $this->codigoMatricula;
		}
		public function setCodigoMatricula($codigoMatricula){
			$this->codigoMatricula = $codigoMatricula;
		}
		public function getNotaFinal(){
			return $this->notaFinal;
		}
		public function setNotaFinal($notaFinal){
			$this->notaFinal = $notaFinal;
		}
		public function getCodigoHistorial(){
			return $this->codigoHistorial;
		}
		public function setCodigoHistorial($codigoHistorial){
			$this->codigoHistorial = $codigoHistorial;
		}
		public function getCodigoSeccion(){
			return $this->codigoSeccion;
		}
		public function setCodigoSeccion($codigoSeccion){
			$this->codigoSeccion = $codigoSeccion;
		}
		public function getObs(){
			return $this->obs;
		}
		public function setObs($obs){
			$this->obs = $obs;
		}
		public function __toString(){
			return "CodigoMatricula: " . $this->codigoMatricula . 
				" NotaFinal: " . $this->notaFinal . 
				" CodigoHistorial: " . $this->codigoHistorial . 
				" CodigoSeccion: " . $this->codigoSeccion . 
				" Obs: " . $this->obs;
		}


		public function agregarSeccion($conexion)
		{

				$sql = sprintf("
			DECLARE
            mensajeError VARCHAR2(1000);
            begin
            SP_DETALLEMATRICULA('',".$_SESSION["CODESTUDIANTE"].",'',".$_SESSION["CODIGOHISTORIAL"].",".$this->codigoSeccion.",'','',mensajeError);
            end;")
				;

			$conexion->ejecutarConsulta($sql);
			echo 'Agregada con Exito.';
		}


		static public function obtenerDetalleMatricula($conexion){

			$sql = sprintf(" SELECT a.codigoAsignatura, A.NOMBREASIGNATURA,s.nombreSeccion,s.horaInicio,s.HORAFIN,au.aula,ed.nombre Edificio  FROM DETALLEMATRICULA dm
            inner join Matricula m on dm.CODIGOMATRICULA=m.CODIGOMATRICULA
            inner join Seccion s on dm.CODIGOSECCION = s.CODIGOSECCION
            inner join Asignatura a on s.codigoAsignatura = a.codigoAsignatura
            inner join Aula au on s.codigoAula = au.codigoAula
            inner join Edificio ed on au.codigoEdifcio = ed.codigoEdifcio
            where m.codigoEstudiante =".$_SESSION["CODESTUDIANTE"]."");
            $contador=1;
          $resultado = $conexion->ejecutarConsulta($sql);
            while (($fila= $conexion->obtenerFila($resultado))) {
				
				echo '  <tr>
      					<th scope="row">'.$contador.'</th>
      					<td>'.$fila["CODIGOASIGNATURA"].'</td>
      					<td>'.$fila["NOMBREASIGNATURA"].'</td>
      					<td>'.$fila["NOMBRESECCION"].'</td>
      					<td>'.$fila["HORAINICIO"].'</td>
      					<td>'.$fila["HORAFIN"].'</td>
      					<td>'.$fila["AULA"].'</td>
      					<td>'.$fila["EDIFICIO"].'</td>
      				
    					</tr>';
    				$contador = $contador+1;
			}

		}

	}
?>