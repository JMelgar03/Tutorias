<?php

	class Estudiante{

		private $pNOmbre;
		private $sNombre;
		private $pApellido;
		private $sApellido;
		private $cuenta;
		private $correoElectronico;
		private $direccion;
		private $telefono;
		private $contrasena;
		private $fechaNacimiento;
		private $centroEstudio;
		private $fechaIngreso;
		private $carrera;

		public function __construct($pNOmbre,
					$sNombre,
					$pApellido,
					$sApellido,
					$cuenta,
					$correoElectronico,
					$direccion,
					$telefono,
					$contrasena,
					$fechaNacimiento,
					$centroEstudio,
					$fechaIngreso,$carrera){
			$this->pNOmbre = $pNOmbre;
			$this->sNombre = $sNombre;
			$this->pApellido = $pApellido;
			$this->sApellido = $sApellido;
			$this->cuenta = $cuenta;
			$this->correoElectronico = $correoElectronico;
			$this->direccion = $direccion;
			$this->telefono = $telefono;
			$this->contrasena = $contrasena;
			$this->fechaNacimiento = $fechaNacimiento;
			$this->centroEstudio = $centroEstudio;
			$this->fechaIngreso = $fechaIngreso;
			$this->carrera = $carrera;
		}
		public function getPNOmbre(){
			return $this->pNOmbre;
		}
		public function setPNOmbre($pNOmbre){
			$this->pNOmbre = $pNOmbre;
		}
		public function getSNombre(){
			return $this->sNombre;
		}
		public function setSNombre($sNombre){
			$this->sNombre = $sNombre;
		}
		public function getPApellido(){
			return $this->pApellido;
		}
		public function setPApellido($pApellido){
			$this->pApellido = $pApellido;
		}
		public function getSApellido(){
			return $this->sApellido;
		}
		public function setSApellido($sApellido){
			$this->sApellido = $sApellido;
		}
		public function getCuenta(){
			return $this->cuenta;
		}
		public function setCuenta($cuenta){
			$this->cuenta = $cuenta;
		}
		public function getCorreoElectronico(){
			return $this->correoElectronico;
		}
		public function setCorreoElectronico($correoElectronico){
			$this->correoElectronico = $correoElectronico;
		}
		public function getDireccion(){
			return $this->direccion;
		}
		public function setDireccion($direccion){
			$this->direccion = $direccion;
		}
		public function getTelefono(){
			return $this->telefono;
		}
		public function setTelefono($telefono){
			$this->telefono = $telefono;
		}
		public function getContrasena(){
			return $this->contrasena;
		}
		public function setContrasena($contrasena){
			$this->contrasena = $contrasena;
		}
		public function getFechaNacimiento(){
			return $this->fechaNacimiento;
		}
		public function setFechaNacimiento($fechaNacimiento){
			$this->fechaNacimiento = $fechaNacimiento;
		}
		public function getCentroEstudio(){
			return $this->centroEstudio;
		}
		public function setCentroEstudio($centroEstudio){
			$this->centroEstudio = $centroEstudio;
		}
		public function getFechaIngreso(){
			return $this->fechaIngreso;
		}
		public function setFechaIngreso($fechaIngreso){
			$this->fechaIngreso = $fechaIngreso;
		}
		public function __toString(){
			return "PNOmbre: " . $this->pNOmbre . 
				" SNombre: " . $this->sNombre . 
				" PApellido: " . $this->pApellido . 
				" SApellido: " . $this->sApellido . 
				" Cuenta: " . $this->cuenta . 
				" CorreoElectronico: " . $this->correoElectronico . 
				" Direccion: " . $this->direccion . 
				" Telefono: " . $this->telefono . 
				" Contrasena: " . $this->contrasena . 
				" FechaNacimiento: " . $this->fechaNacimiento . 
				" CentroEstudio: " . $this->centroEstudio . 
				" FechaIngreso: " . $this->fechaIngreso;
		}


		public function guardarEstudiante($conexion){
			$sql = sprintf(
				" declare
					mensaje varchar2(2000);
					begin
					SP_REGISTRO_DE_ESTUDIANTE(
   					PNCODIGOPERSONA => '',
    				PCPNOMBRE => '".$this->pNOmbre."',
    				PCSNOMBRE => '".$this->sNombre."',
    				PCPAPELLIDO => '".$this->pApellido."',
    				PCSAPELLIDO => '".$this->sApellido."',
    				PCDIRECCION => '',
    				PCGENERO => '',
    				PDFECHANACIMIENTO => TO_DATE('".$this->fechaNacimiento."', 'YYYY-MM-DD HH24:MI:SS'),
    				PNCODIGOESTUDIANTE => '',
    				PNNUMEROCUENTA => '".$this->cuenta."',
    				PDFECHAINGRESO => TO_DATE('".$this->fechaIngreso."', 'YYYY-MM-DD HH24:MI:SS'),
    				PNCODIGOCENTROESTUDIO => '".$this->centroEstudio."',
    				PNACCION => '',
    				PNCODIGOCARRERA => '".$this->carrera."',
            		PCCONTRASENA => '".$this->contrasena."',
            		PNCODIGOUSUARIO => '',
    				MENSAJEERROR => Mensaje
  					);
					end;

				  ");
            
			$resultado = $conexion->ejecutarConsulta($sql);
			echo "Almacenado con éxito";
		}

}

?>