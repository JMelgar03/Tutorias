
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
			"SELECT  idUsuario, email, idTipoUsuario FROM usuario WHERE password = '%s' AND email = '%s'",
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
		if( $fila["idTipoUsuario"] == 2)
		   {
               $consulta = $conexion->ejecutarConsulta("SELECT * FROM alumno a
			   inner join tutor t on a.idAlumno = t.idAlumno
			   inner join usuario u on a.idUsuario = u.idUsuario
			   WHERE u.idUsuario =".$fila['idUsuario']);
			   $datos2 = $conexion->obtenerFila($consulta);
			   $_SESSION['idTutor'] = $datos2['idTutor'];
			   if($datos2['estado']=='I'){
				$respuesta["estatus2"]=3;
			   }
		  
			}

			$consultaDatos = "SELECT * FROM alumno a INNER JOIN carrera c ON a.idCarrera = c.idCarrera WHERE a.idUsuario=".$fila['idUsuario'];
			$res2 = $conexion->ejecutarConsulta($consultaDatos);
			$datos = $conexion->obtenerFila($res2);
			$_SESSION['nombreCompleto'] = $datos['Nombre1'].' '.$datos['Nombre2'].' '.$datos['Apellido1'].' '
			.$datos['Apellido2'];
			$_SESSION['numeroCuenta'] = $datos['NumeroCuenta'];
			$_SESSION['carrera'] = $datos['NombreCarrera'];	
			$_SESSION['telefono'] = $datos['Telefono'];
			$_SESSION['nombreYApellido'] =  $datos['Nombre1'].$datos['Apellido1'];
			$_SESSION['idAlumno'] = $datos['idAlumno'];

		$respuesta["idTipoUsuario"]=$fila["idTipoUsuario"];
		$respuesta["estado"]= $datos["estado"]; 
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


static public function obtenerTutores($conexion){
	$sql = 'SELECT a.idAlumno, Nombre1, Apellido1, NumeroCuenta, email, estado
	FROM alumno a
	INNER JOIN usuario u ON a.idUsuario = u.idUsuario
	INNER JOIN tipousuario tu ON u.idTipoUsuario = tu.idTipoUsuario
	WHERE u.idTipoUsuario = 2';

	$resultado = $conexion->ejecutarConsulta($sql);
	$i=1;
	while( ($fila = $conexion->obtenerFila($resultado)))
	{
		echo  '<tr>
				<th scope="row">'.$i.'</th>
				<td>'.$fila['Nombre1'].'</td>
				<td>'.$fila['Apellido1'].'</td>
				<td>'.$fila['NumeroCuenta'].'</td>
				<td>'.$fila['email'].'</td>
				<td>'.$fila['estado'].'</td>
				<td><input type="button" class="btn btn-danger" value="X" onclick="desactivarTutor('.$fila['idAlumno'].',\''.$fila['email'].'\')"> </td>
				<td><input type="button" class="btn btn-success" value="A" onclick="activarTutor('.$fila['idAlumno'].')"> </td>
				</tr>';
			$i++;
	}
echo $conexion->getError();

}

static public function desactivarTutor($conexion,$idAlumno,$email){
	$sql='UPDATE alumno SET estado = "I" where idAlumno='.$idAlumno;
	$conexion->ejecutarConsulta($sql);
	if($conexion->getError())
	{
		Echo 'No se pudo desactivar';
		echo $conexion->getError();
	}else{
		
		
			//correo
	 

				$destino = $email;
				$desde='from:'.'tutoriasnah2019';
				$asunto='Cuenta Desactivada';
				$mensaje='Estimado Usuario Su cuenta ha sido desactiva si cree que estamos en un error responder este correo.';
	
				mail($destino,$asunto,$mensaje,$desde);
				echo 'Desactivado con exito!.';
				//fin correo
	}
}

static public function activarTutor($conexion,$idAlumno){
	$sql='UPDATE alumno SET estado = "A" where idAlumno='.$idAlumno;
	$conexion->ejecutarConsulta($sql);
	if($conexion->getError())
	{
		Echo 'No se pudo activar';
		echo $conexion->getError();
	}else{
		echo 'activado con exito!.';
	}
}

}
?>