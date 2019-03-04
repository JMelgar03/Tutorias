
<?php

class Usuario{

	private $idUsuario;
	private $email;
	private $password;
	private $preguntaSeguridad;
	private $respuestaSeguridad;
	private $idTipoUsuario;

	public function __construct($idUsuario,
				$email,
				$password,
				$preguntaSeguridad,
				$respuestaSeguridad,
				$idTipoUsuario){
		$this->idUsuario = $idUsuario;
		$this->email = $email;
		$this->password = $password;
		$this->preguntaSeguridad = $preguntaSeguridad;
		$this->respuestaSeguridad = $respuestaSeguridad;
		$this->idTipoUsuario = $idTipoUsuario;
	}
	public function getIdUsuario(){
		return $this->idUsuario;
	}
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function getPassword(){
		return $this->password;
	}
	public function setPassword($password){
		$this->password = $password;
	}
	public function getPreguntaSeguridad(){
		return $this->preguntaSeguridad;
	}
	public function setPreguntaSeguridad($preguntaSeguridad){
		$this->preguntaSeguridad = $preguntaSeguridad;
	}
	public function getRespuestaSeguridad(){
		return $this->respuestaSeguridad;
	}
	public function setRespuestaSeguridad($respuestaSeguridad){
		$this->respuestaSeguridad = $respuestaSeguridad;
	}
	public function getIdTipoUsuario(){
		return $this->idTipoUsuario;
	}
	public function setIdTipoUsuario($idTipoUsuario){
		$this->idTipoUsuario = $idTipoUsuario;
	}
	public function __toString(){
		return "IdUsuario: " . $this->idUsuario . 
			" Email: " . $this->email . 
			" Password: " . $this->password . 
			" PreguntaSeguridad: " . $this->preguntaSeguridad . 
			" RespuestaSeguridad: " . $this->respuestaSeguridad . 
			" IdTipoUsuario: " . $this->idTipoUsuario;
	}



	public function insertarUsuario($conexion){

	
		$sql = 

			sprintf(
			   "INSERT INTO usuario(email,password,PreguntaSeguridad,RespuestaSeguridad,idTipoUsuario) 
				VALUES ('%s','%s','%s','%s',%s)",
				
				$conexion->antiInyeccion($this->email),
				$conexion->antiInyeccion($this->password),   
				$conexion->antiInyeccion($this->preguntaSeguridad),
				$conexion->antiInyeccion($this->respuestaSeguridad),
				$conexion->antiInyeccion($this->idTipoUsuario)
			   );

		$resultado = $conexion->ejecutarConsulta($sql);
		echo $conexion->getError();
  }


  public static function verificarUsuario($conexion,$email,$contra){
	$sql = sprintf(
			"SELECT  email, idTipoUsuario FROM usuario WHERE password = '%s' AND email = '%s'",
			$contra,
			$email

		);
	//echo ($sql);

	$resultado = $conexion->ejecutarConsulta($sql);
	$cantidadRegistros = $conexion->cantidadRegistros($resultado);
	$respuesta=array();
	if ($cantidadRegistros==1){
		$fila = $conexion->obtenerFila($resultado);
		$respuesta["estatus"]=1;
		$_SESSION["email"] = $fila["email"];
		$_SESSION["idTipoUsuario"] = $fila["idTipoUsuario"];
		$respuesta["idTipoUsuario"]=$fila["idTipoUsuario"];
	}else{
		$respuesta["estatus"]=0;
	}

	echo json_encode($respuesta);

}

public static function verificarCorreo($conexion,$email)
{
	$sql = sprintf(
		"SELECT  PreguntaSeguridad FROM usuario WHERE email = '%s'",
		$email

	);
//echo ($sql);

$resultado = $conexion->ejecutarConsulta($sql);
$cantidadRegistros = $conexion->cantidadRegistros($resultado);
$respuesta=array();
if ($cantidadRegistros==1){
	$fila = $conexion->obtenerFila($resultado);
	$respuesta["estatus"]=1;
	$respuesta["respuesta1"] = $fila["PreguntaSeguridad"];
}else{
	$respuesta["estatus"]=0;
}

echo json_encode($respuesta);


}



public static function verificarRespuesta($conexion,$email,$res)
{
	$sql = sprintf(
		"SELECT  * FROM usuario WHERE email = '%s'and RespuestaSeguridad='%s'",
		$email,
		$res

	);
//echo ($sql);

$resultado = $conexion->ejecutarConsulta($sql);
$cantidadRegistros = $conexion->cantidadRegistros($resultado);
$respuesta=array();
if ($cantidadRegistros==1){
	$fila = $conexion->obtenerFila($resultado);
	
	//cambiar la contrasena
	$nuevoPass = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0,8);
	$nuevoPass2 = sha1($nuevoPass);

	$sql2 = "UPDATE usuario SET password='".$nuevoPass2."'  WHERE idUsuario=".$fila["idUsuario"];

		if ($conexion->ejecutarConsulta($sql2) === TRUE) {
			//correo
	 

				$destino = $email;
				$desde='from:'.'tutoriasnah2019';
				$asunto='Restablecimiento de password';
				$mensaje='tu nuevo password es ****:'.$nuevoPass.'**** RECUERDA QUE PUEDES CAMBIARLO DESPUES DESDE TU PERFIL';
	
				mail($destino,$asunto,$mensaje,$desde);
				//fin correo

    			$respuesta["respuesta1"] = " Se envio el nuevo password al correo de la cuenta.";
			} else {
    			$respuesta["respuesta1"]= "Error al cambiar contrasena: " . $conn->error;
			}
	$respuesta["estatus"]=1;
}else{
	$respuesta["estatus"]=0;
}
echo $conexion->getError();
echo json_encode($respuesta);


}

}
?>