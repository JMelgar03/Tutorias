<?php

	class Alumno{

		private $idAlumno;
		private $nombre1;
		private $nombre2;
		private $apellido1;
		private $apellido2;
		private $numeroCuenta;
		private $telefono;
		private $idUsuario;
		private $idCarrera;

		public function __construct($idAlumno,
					$nombre1,
					$nombre2,
					$apellido1,
					$apellido2,
					$numeroCuenta,
					$telefono,
					$idUsuario,
					$idCarrera){
			$this->idAlumno = $idAlumno;
			$this->nombre1 = $nombre1;
			$this->nombre2 = $nombre2;
			$this->apellido1 = $apellido1;
			$this->apellido2 = $apellido2;
			$this->numeroCuenta = $numeroCuenta;
			$this->telefono = $telefono;
			$this->idUsuario = $idUsuario;
			$this->idCarrera = $idCarrera;
		}
		public function getIdAlumno(){
			return $this->idAlumno;
		}
		public function setIdAlumno($idAlumno){
			$this->idAlumno = $idAlumno;
		}
		public function getNombre1(){
			return $this->nombre1;
		}
		public function setNombre1($nombre1){
			$this->nombre1 = $nombre1;
		}
		public function getNombre2(){
			return $this->nombre2;
		}
		public function setNombre2($nombre2){
			$this->nombre2 = $nombre2;
		}
		public function getApellido1(){
			return $this->apellido1;
		}
		public function setApellido1($apellido1){
			$this->apellido1 = $apellido1;
		}
		public function getApellido2(){
			return $this->apellido2;
		}
		public function setApellido2($apellido2){
			$this->apellido2 = $apellido2;
		}
		public function getNumeroCuenta(){
			return $this->numeroCuenta;
		}
		public function setNumeroCuenta($numeroCuenta){
			$this->numeroCuenta = $numeroCuenta;
		}
		public function getTelefono(){
			return $this->telefono;
		}
		public function setTelefono($telefono){
			$this->telefono = $telefono;
		}
		public function getIdUsuario(){
			return $this->idUsuario;
		}
		public function setIdUsuario($idUsuario){
			$this->idUsuario = $idUsuario;
		}
		public function getIdCarrera(){
			return $this->idCarrera;
		}
		public function setIdCarrera($idCarrera){
			$this->idCarrera = $idCarrera;
		}
		public function __toString(){
			return "IdAlumno: " . $this->idAlumno . 
				" Nombre1: " . $this->nombre1 . 
				" Nombre2: " . $this->nombre2 . 
				" Apellido1: " . $this->apellido1 . 
				" Apellido2: " . $this->apellido2 . 
				" NumeroCuenta: " . $this->numeroCuenta . 
				" Telefono: " . $this->telefono . 
				" IdUsuario: " . $this->idUsuario . 
				" IdCarrera: " . $this->idCarrera;
		}
	



	public function insertarAlumno($conexion){

		$sql = $conexion->ejecutarConsulta("Select MAX(idUsuario)'idUsuario' from usuario");
		$idUsuario =  $conexion->obtenerFila($sql);

		$sql = 
	
				sprintf(
				   "INSERT INTO alumno(Nombre1,Nombre2,Apellido1,Apellido2,NumeroCuenta,Telefono,idUsuario,idCarrera) 
					VALUES ('%s','%s','%s','%s','%s',%s,%s,%s)",
					
					$conexion->antiInyeccion($this->nombre1),
					$conexion->antiInyeccion($this->nombre2),
					$conexion->antiInyeccion($this->apellido1),
					$conexion->antiInyeccion($this->apellido2),   
					$conexion->antiInyeccion($this->numeroCuenta),
					$conexion->antiInyeccion($this->telefono),
					$conexion->antiInyeccion($idUsuario["idUsuario"]),
					$conexion->antiInyeccion($this->idCarrera)
				   );
	
			echo 'Codigo del ultimo usuario:'.$idUsuario["idUsuario"];
			echo $sql;
			$resultado = $conexion->ejecutarConsulta($sql);
			
			
			
			$consulta = $conexion->ejecutarConsulta('SELECT idTipoUsuario from usuario WHERE idUsuario ='.$idUsuario["idUsuario"]);
			$idTipoUsuario = $conexion->obtenerFila($consulta);
			
			if($idTipoUsuario["idTipoUsuario"] == 2){
			$sql3 = $conexion->ejecutarConsulta("Select MAX(idAlumno)'idAlumno' from alumno");
			$idAlumno2 =  $conexion->obtenerFila($sql3);
			$sql3 = 'INSERT INTO Tutor (idAlumno,valoracion) VALUES ('.$idAlumno2['idAlumno'].',0.0)';
			$conexion->ejecutarConsulta($sql3);
			echo $conexion->getError();
			}

	  }



	  public static function editarAlumno($conexion,$primerNombre,$segundoNombre,$primerApellido,$segundoApellido,$cuenta,$telefono,$idAlumno){

		$sql = "UPDATE alumno SET Nombre1='".$primerNombre."',Nombre2='".$segundoNombre."',Apellido1='".$primerApellido."',Apellido2='".$segundoApellido."',NumeroCuenta=".$cuenta.",Telefono=".$telefono." WHERE NumeroCuenta=".$idAlumno;
		echo $sql;
		$consulta = $conexion->ejecutarConsulta($sql);
		echo $conexion->getError();
	  }
}
?>