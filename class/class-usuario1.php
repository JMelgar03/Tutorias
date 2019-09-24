
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
	$sql = 'SELECT a.idAlumno, Nombre1, Apellido1, NumeroCuenta, email, estado, t.reportes
	FROM alumno a
	INNER JOIN usuario u ON a.idUsuario = u.idUsuario
	INNER JOIN tipousuario tu ON u.idTipoUsuario = tu.idTipoUsuario
	INNER JOIN tutor t on a.idAlumno =  t.idAlumno
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
				<td>'.$fila['reportes'].'</td>
				<td>'.$fila['estado'].'</td>
				<td><input type="button" class="btn btn-danger" value="X" onclick="desactivarTutor('.$fila['idAlumno'].',\''.$fila['email'].'\')"> </td>
				<td><input type="button" class="btn btn-success" value="A" onclick="activarTutor('.$fila['idAlumno'].')"> </td>
				</tr>';
			$i++;
	}
echo $conexion->getError();

}

static public function obtenerTutoresR($conexion){
	$sql = 'SELECT a.idAlumno, Nombre1, Apellido1, NumeroCuenta, email, estado, t.reportes, t.idTutor
	FROM alumno a
	INNER JOIN usuario u ON a.idUsuario = u.idUsuario
	INNER JOIN tipousuario tu ON u.idTipoUsuario = tu.idTipoUsuario
	INNER JOIN tutor t on a.idAlumno =  t.idAlumno
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
				<td>'.$fila['reportes'].'</td>
				
				<td><input type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" value="Ver Reportes" onclick="verReportes('.$fila['idTutor'].')"> </td>
				
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

static public function reportarTutor($conexion,$idTutor,$idCategoria,$descripcion){
	$reportes=0;
	$sql="INSERT INTO reporte (Descripcion, tutor_idTutor, idCategoriaReporte) VALUES ('".$descripcion."', '".$idTutor."', '".$idCategoria."'); ";
	$resultado = $conexion->ejecutarConsulta($sql);
	$sql2="SELECT * from tutor WHERE idTutor=".$idTutor;
	$resultado2 = $conexion->ejecutarConsulta($sql2);
	$fila =  $conexion->obtenerFila($resultado2);
	$reportes = $fila['reportes'] + 1;
	$sql2 ='UPDATE tutor set reportes='.$reportes.' WHERE idTutor = '.$idTutor;
	$resultado2 = $conexion->ejecutarConsulta($sql2);
	echo $conexion->getError();
}

static public function obtenerCategorias($conexion){
	$sql = "SELECT * FROM CategoriaReporte";
	$resultado = $conexion->ejecutarConsulta($sql);
	
	while( ($fila = $conexion->obtenerFila($resultado)))
	{
		$categorias[$fila['idCategoriaReporte']] = $fila['categoria'];
		
	}
echo $conexion->getError();
echo json_encode($categorias);

}


static public function evaluarTutor($conexion,$idTutor,$evaluacion){
	$sql2="SELECT * from tutor WHERE idTutor=".$idTutor;
	$resultado2 = $conexion->ejecutarConsulta($sql2);
	$fila =  $conexion->obtenerFila($resultado2);
	$cantEvaluaciones = $fila['cantEvaluaciones'] + 1;
	$evaluacion+= $fila['evaluacion'];
	$promedio = $evaluacion/$cantEvaluaciones;

	$sql2 ='UPDATE tutor set cantEvaluaciones='.$cantEvaluaciones.',evaluacion='.$evaluacion.', promedio='.$promedio.' WHERE idTutor = '.$idTutor;
	$resultado2 = $conexion->ejecutarConsulta($sql2);
	echo $conexion->getError();
	echo'se califico el tutor';

}



static public function obtenerReportes($conexion,$idTutor){

$impuntualidad=0;
$conductaInmoral=0;
$acoso=0;
$faltaDePreparacion=0;


$impuntualidad2='';
$conductaInmoral2='';
$acoso2='';
$faltaDePreparacion2='';



$sql='SELECT r.Descripcion, r.idCategoriaReporte
FROM reporte r
inner join tutor t on r.tutor_idTutor=t.idTutor
where t.idTutor ='.$idTutor;

$resultado = $conexion->ejecutarConsulta($sql);

	
	while( ($fila = $conexion->obtenerFila($resultado)))
	{
		if($fila['idCategoriaReporte']=='1'){
			$impuntualidad++;
			$impuntualidad2.='
			<tr>
			<th scope="row">'.$impuntualidad.'</th>
			<td>'.$fila['Descripcion'].'</td>
			</tr>';
		}
		elseif($fila['idCategoriaReporte']=='2'||$fila['idCategoriaReporte']=='5'){
			$conductaInmoral++;
			$conductaInmoral2.='<tr>
			<th scope="row">'.$conductaInmoral.'</th>
			<td>'.$fila['Descripcion'].'</td>
			</tr>';

		}
		elseif($fila['idCategoriaReporte']=='3'){
			$acoso++;
			$acoso2.='<tr>
			<th scope="row">'.$acoso.'</th>
			<td>'.$fila['Descripcion'].'</td>
			</tr>';


		}elseif($fila['idCategoriaReporte']=='4'){

			$faltaDePreparacion++;
			$faltaDePreparacion2.='<tr>
			<th scope="row">'.$faltaDePreparacion.'</th>
			<td>'.$fila['Descripcion'].'</td>
			</tr>';
		}
		
	}
	echo $conexion->getError();


	echo '<div class="accordion" id="accordionExample">
	<div class="card2">
	  <div class="card-header" id="headingOne">
		<h2 class="mb-0">
		  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			Reportes Impuntualidad('.$impuntualidad.')
		  </button>
		</h2>
	  </div>

	  <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
		<div class="card-body" id="impuntualidad">
		
		 
		<table class="table table-striped col-xs-12" style="color:black;">
		<thead class="">
		  <tr>
			<th scope="col">#</th>
			<th scope="col">Descripcion</th>   
		  </tr>
		</thead>
		<tbody>
		'.$impuntualidad2.'
		</tbody>
	</table>


		</div>
	  </div>
	</div>
	<div class="card2">
	  <div class="card-header" id="headingTwo">
		<h2 class="mb-0">
		  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			Reportes Acoso('.$acoso.')
		  </button>
		</h2>
	  </div>
	  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
		<div class="card-body" id="acoso">
			

		<table class="table table-striped col-xs-12" style="color:black;">
		<thead class="">
		  <tr>
			<th scope="col">#</th>
			<th scope="col">Descripcion</th>   
		  </tr>
		</thead>
		<tbody>
		'.$acoso2.'
		</tbody>
	</table>
		
		</div>
	  </div>
	</div>
	<div class="card2">
	  <div class="card-header" id="headingThree">
		<h2 class="mb-0">
		  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			Actitudes otras('.$conductaInmoral.')
		  </button>
		</h2>
	  </div>
	  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
		<div class="card-body"id="otros" > 
		
		  
		<table class="table table-striped col-xs-12" style="color:black;">
		<thead class="">
		  <tr>
			<th scope="col">#</th>
			<th scope="col">Descripcion</th>   
		  </tr>
		</thead>
		<tbody>
		'.$conductaInmoral2.'
		</tbody>
	</table>


		</div>
	  </div>
	</div>
	<div class="card2">
	  <div class="card-header" id="headingFour">
		<h2 class="mb-0">
		  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
			Falta de preparacion('.$faltaDePreparacion.')
		  </button>
		</h2>
	  </div>
	  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
	  <div class="card-body"id="faltPrep" > 

	  	
	  
	  <table class="table table-striped col-xs-12" style="color:black;">
		<thead class="">
		  <tr>
			<th scope="col">#</th>
			<th scope="col">Descripcion</th>   
		  </tr>
		</thead>
		<tbody>
		'.$faltaDePreparacion2.'
		</tbody>
	</table>

	
	  </div>
		</div>
	  </div>
	</div>
  </div>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>';
}

}
?>