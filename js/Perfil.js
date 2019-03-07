$(document).ready(function(){

	
	
	
$("#btn-guardar").click(function(){


	if($("#txt-pnombre").val())
	{    
		if($("#txt-papellido").val()){
	
		  if($("#txt-cuenta").val()){
	
	
				var parametro =
					  "pNombre="+$("#txt-pnombre").val()+"&"+
					  "sNombre="+$("#txt-snombre").val()+"&"+
					  "pApellido="+$("#txt-papellido").val()+"&"+
					  "sApellido="+$("#txt-sapellido").val()+"&"+
				  "cuenta="+$("#txt-cuenta").val()+"&"+
				  "telefono="+$("#txt-telefono").val();
					  //alert(parametro);
				  
				  $.ajax({		
				  url:"ajax/gestion-registro.php?accion1=editarAlumno",
					  data:parametro,
					  method:"POST",
					  success:function(respuesta){
						console.log(respuesta);
						alert("Usuario Editado! vuelve a iniciar sesion.");
						window.location = "index.php";
					  },
					  error:function(e){
	
						console.log(e);
					  }
	
				  });
	
	
	
		  }
	
		else{
			  alert("Ingrese Un numero de Cuenta.");
			  
			} 
		
		}
		 else{
			 alert("Ingrese Primer Apellido.");
		 }
	 }
	  else{alert("Ingrese Primer Nombre");}


	});

/*
	estudiante = {
		nombreEstudiante: "Aldo Fernando Flores Córdova",
		numeroCuenta: "20131013754",
		correo: "aldoflorescordova@gmail.com",
		telefono: "95341942",
		carrera: "Ingenieria en Sistemas"
	}

	$("#nombreUsuario").text(" | " + estudiante.nombreEstudiante);
	$("#numeroCuenta").text(estudiante.numeroCuenta);
	$("#correo").text(estudiante.correo);
	$("#telefono").text(estudiante.telefono);
	$("#carrera").text(estudiante.carrera);

	$("#btn-menu").click(function(){
		window.location.href='HomeEstudiante.html';
	})*/
});