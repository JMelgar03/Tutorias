<?php
	class Usuario{

		private $codigoUsuario;
		private $contrasena;
		private $codigoRol;

		public function __construct($codigoUsuario,
					$contrasena,
					$codigoRol){
			$this->codigoUsuario = $codigoUsuario;
			$this->contrasena = $contrasena;
			$this->codigoRol = $codigoRol;
		}
		public function getCodigoUsuario(){
			return $this->codigoUsuario;
		}
		public function setCodigoUsuario($codigoUsuario){
			$this->codigoUsuario = $codigoUsuario;
		}
		public function getContrasena(){
			return $this->contrasena;
		}
		public function setContrasena($contrasena){
			$this->contrasena = $contrasena;
		}
		public function getCodigoRol(){
			return $this->codigoRol;
		}
		public function setCodigoRol($codigoRol){
			$this->codigoRol = $codigoRol;
		}
		public function __toString(){
			return "CodigoUsuario: " . $this->codigoUsuario . 
				" Contrasena: " . $this->contrasena . 
				" CodigoRol: " . $this->codigoRol;
		}





		public static function verificarUsuario($conexion,$cuenta,$contra){
		    $sql = sprintf(
		   "SELECT * from usuario u
  		 	inner join Estudiante e on u.CODIGOUSUARIO = e.CODIGOUSUARIO
            inner join Persona p on e.codigoPersona = p.codigoPersona
            inner join CentroEstudio ce on ce.codigoCentroEstudio = e.codigoCentroEstudio
            inner join ESTUDIANTEXPLANESTUDIO exp on e.CODIGOESTUDIANTE = exp.CODIGOESTUDIANTE
            inner join PlanEStudios pe on exp.CODIGOPLANESTUDIO=pe.CODIGOPLANESTUDIO
            inner join CARRERA ca on pe.CODIGOCARRERA = ca.CODIGOCARRERA
            inner join Historial h on e.codigoEstudiante = h.codigoEstudiante
            where e.NUMEROCUENTA=".$cuenta." and u.CONTRASENA='".$contra."'"
  					
  					
		    	);
		    //echo ($sql);

		    $resultado = $conexion->ejecutarConsulta($sql);

		   // $cantidadRegistros = $conexion->cantidadRegistros($resultado); 
		   	$numrows = oci_fetch_all($resultado, $res);



		    $respuesta=array();
		   
		    if ($numrows==1){
		    	$resultado = $conexion->ejecutarConsulta($sql);
		    	$fila = $conexion->obtenerFila($resultado);
		    	$respuesta["estatus"]=1;
		    	$_SESSION["NUMEROCUENTA"] = $fila["NUMEROCUENTA"];
		    	$_SESSION["PNOMBRE"] = $fila["PNOMBRE"];
                 $_SESSION["PAPELLIDO"] = $fila["PAPELLIDO"];
                 $_SESSION["NOMBRECENTRO"] = $fila["NOMBRECENTRO"];
                 $_SESSION["NOMBRECARRERA"] = $fila["NOMBRECARRERA"];
		    	$_SESSION["CODIGOROL"]=$fila["CODIGOROL"];
		    	$_SESSION["CODIGOHISTORIAL"]=$fila["CODIGOHISTORIAL"];
		    	$_SESSION["CODESTUDIANTE"] = $fila["CODIGOESTUDIANTE"];
		    	
		    }
		    else{
		    	$respuesta["estatus"]=0;
			 }
    
		    echo json_encode($respuesta);

		}

    /*
		public function registrarUsuario($conexion){
			$sql = sprintf("INSERT INTO usuarios(nombre_usuario, nombre_persona, contrasenna, email, telefono, fecha_nacimiento, url_foto_perfl, ultima_conexion, seguidores, siguiendo, ID_genero, ID_tipo_usuario) VALUES('%s','%s','%s','%s',%s,'%s','%s','%s',%s,%s,%s,%s)",
				$conexion->antiInyeccion($this->nombre_usuario),
				$conexion->antiInyeccion($this->nombre_persona),
				$conexion->antiInyeccion("fb"),
				$conexion->antiInyeccion($this->email),
				$conexion->antiInyeccion("99999999"),
				$conexion->antiInyeccion("2017-10-10"),
				$conexion->antiInyeccion($this->url_foto_perfil),
				$conexion->antiInyeccion("2017-10-10"),
				$conexion->antiInyeccion("100"),
				$conexion->antiInyeccion("50"),
				$conexion->antiInyeccion($this->genero),
				$conexion->antiInyeccion("3")
		);
			$resultado = $conexion->ejecutarconsulta($sql);
			$_SESSION["nombre_persona"] = $this->nombre_usuario;
			 $_SESSION["url_foto_perfl"] = "foto_default.png";


		}


*/

/*
		public static function consultar($conexion,$cuenta,$contra){
			$sql= sprintf("SELECT e.numeroCuenta,p.pNombre,p.pApellido,ce.nombreCentro,ca.nombreCarrera,u.CodigoRol from usuario u
  					inner join Estudiante e on u.CODIGOUSUARIO = e.CODIGOUSUARIO
  					inner join Persona p on e.codigoPersona = p.codigoPersona
  					inner join CentroEstudio ce on ce.codigoCentroEstudio = e.codigoCentroEstudio
  					inner join Carrera ca on ce.codigoCentroEstudio = ca.codigoCentroEstudio
  					where e.numeroCuenta = %s and u.contrasena='%s'",
		    		$conexion->antiInyeccion($cuenta),
		    		$conexion->antiInyeccion($contra)
			);
			$resultado = $conexion->ejecutarconsulta($sql);
			$cantidadRegistros=$conexion->cantidadRegistros($resultado);
			if($cantidadRegistros==1){
				echo "1";
				$fila=$conexion->obtenerFila($resultado);
				$_SESSION["nombre_persona"] = $fila["nombre_persona"];
				$_SESSION["url_foto_perfil"] = "foto_default.png";
			}else{
				echo "0";
			}
		}
*/

	}
?>