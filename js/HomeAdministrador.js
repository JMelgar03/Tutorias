$(document).ready(function(){
	$.ajax({
		url:"ajax/gestion-usuario.php?accion=obtenerTutores",
			   data:"",
			   method:"POST",
			   success:function(respuesta){

					$("#listaTutores").html(respuesta);
		

			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});

	$.ajax({
		url:"ajax/getInfo.php?accion=centroEstudioAdmin",
			   data:"",
			   method:"POST",
			   success:function(respuesta){

					$("#listaCentroEstudio").html(respuesta);

					verCiudades();

			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});


	
});

function verCiudades(){

	$.ajax({
		url:"ajax/getInfo.php?accion=ciudadesAdmin",
			   data:"",
			   method:"POST",
			   success:function(respuesta){

					$("#idCiudad").html(respuesta);
			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});

	
}

function verEdificios(idCentroEstudio){

	if($("#edificios"+idCentroEstudio).css("display")=="none"){
		var parametro = 'idCentroEstudio='+idCentroEstudio;
		$.ajax({
			url:"ajax/getInfo.php?accion=edificioAdmin",
				   data:parametro,
				   method:"POST",
				   success:function(respuesta){

						$("#listaEdificios" + idCentroEstudio).html(respuesta);
				   
				},
				   error:function(e){
		   
					  console.log(e);
				   }
		   
			});

		$("#edificios"+idCentroEstudio).css("display","table")
	}else{
		$("#edificios"+idCentroEstudio).css("display","none")
	}

	
}

function verAulas(idEdificio){

	if($("#aulas"+idEdificio).css("display")=="none"){
		var parametro = 'idEdificio='+idEdificio;
		$.ajax({
			url:"ajax/getInfo.php?accion=aulaAdmin",
				   data:parametro,
				   method:"POST",
				   success:function(respuesta){

						$("#listaAulas" + idEdificio).html(respuesta);
				   
				},
				   error:function(e){
		   
					  console.log(e);
				   }
		   
			});

		$("#aulas"+idEdificio).css("display","table")
	}else{
		$("#aulas"+idEdificio).css("display","none")
	}

	
}


function desactivarTutor(a,correo){
	var txt;
	var r = confirm("En Realidad Desea Desactivar El Tutor");
	if (r == true) {
	
		var parametro = 'idAlumno='+a+'&correo='+correo;
    $.ajax({
		url:"ajax/gestion-usuario.php?accion=desactivarTutor",
			   data:parametro,
			   method:"POST",
			   success:function(respuesta){
					window.location = 'HomeAdministrador.php';
			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});


	} else {
		alert('Cancelado!');
	}
   /* */
}

function activarTutor(a){
	var parametro = 'idAlumno='+a;
    $.ajax({
		url:"ajax/gestion-usuario.php?accion=activarTutor",
			   data:parametro,
			   method:"POST",
			   success:function(respuesta){
					window.location = 'HomeAdministrador.php';
			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});
}

function eliminarCentro(idCentro){
	var txt;
	var r = confirm("En realidad desea eliminar este centro de estudio?");
	if (r == true) {
	
		var parametro = 'idCentro='+idCentro;
    	$.ajax({
		url:"ajax/gestion-registro.php?accion1=eliminarCentro",
			   data:parametro,
			   method:"POST",
			   success:function(respuesta){
			   		alert('Centro Eliminado');
					window.location = 'HomeAdministrador.php';
			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});


	} else {
		alert('Cancelado!');
	}
}

function guardarCentro(){
	var txt;
	var r = confirm("En realidad desea agregar este centro de estudio?");
	if (r == true) {
	if( $("#nombreCentro").val()&&$("#idCiudad").val()){
		
		var parametro = 'nombreCentro='+ $("#nombreCentro").val()+'&'+'idCiudad='+$("#idCiudad").val();
    	console.log(parametro)
    	$.ajax({
    		type:"POST",
			url:"ajax/gestion-registro.php?accion1=guardarCentro",
			data: parametro,
			beforeSend: function(request) {
			    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			  },
			success:function(respuesta){
			   		alert('Centro Creado');
					window.location = 'HomeAdministrador.php';
			   
			},
			error:function(e){
	   
				  console.log(e);
			   }
	   
		});

	}else{
		alert('Ningun campo debe estar vacio.')
	}
	} else {
		alert('Cancelado!');
	}
}


function eliminarEdificio(idEdificio){
	var txt;
	var r = confirm("En realidad desea eliminar este Edificio?");
	if (r == true) {
	
		var parametro = 'idEdificio='+idEdificio;
    	$.ajax({
		url:"ajax/gestion-registro.php?accion1=eliminarEdificio",
			   data:parametro,
			   method:"POST",
			   success:function(respuesta){
			   		alert('Edificio Eliminado');
					window.location = 'HomeAdministrador.php';
			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});


	} else {
		alert('Cancelado!');
	}
}

function guardarEdificio(idCentro){
	var txt;
	var r = confirm("En realidad desea agregar este Edificio?");
	if (r == true) {
	
		var parametro = 'nombreEdificio='+ $("#nombreEdificio"+idCentro).val()+'&'+'numeroAulas='+$("#numeroAulas"+idCentro).val() + "&idCentro="+idCentro;
    	console.log(parametro)
    	$.ajax({
    		type:"POST",
			url:"ajax/gestion-registro.php?accion1=guardarEdificio",
			data: parametro,
			beforeSend: function(request) {
			    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			  },
			success:function(respuesta){
			   		alert('Edificio Creado');
					window.location = 'HomeAdministrador.php';
			   
			},
			error:function(e){
	   
				  console.log(e);
			   }
	   
		});


	} else {
		alert('Cancelado!');
	}
}

function eliminarAula(idAula){
	var txt;
	var r = confirm("En realidad desea eliminar esta Aula?");
	if (r == true) {
	
		var parametro = 'idAula='+idAula;
    	$.ajax({
		url:"ajax/gestion-registro.php?accion1=eliminarAula",
			   data:parametro,
			   method:"POST",
			   success:function(respuesta){
			   		alert('Aula Eliminado');
					window.location = 'HomeAdministrador.php';
			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});


	} else {
		alert('Cancelado!');
	}
}

function guardarAula(idEdificio){
	var txt;
	var r = confirm("En realidad desea agregar esta Aula?");
	if (r == true) {
	
		var parametro = 'numeroAula='+ $("#numeroAula"+idEdificio).val()+'&'+'capacidad='+$("#capacidad"+idEdificio).val() + "&idEdificio="+idEdificio;
    	console.log(parametro)
    	$.ajax({
    		type:"POST",
			url:"ajax/gestion-registro.php?accion1=guardarAula",
			data: parametro,
			beforeSend: function(request) {
			    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			  },
			success:function(respuesta){
			   		alert('Aula Creada');
					window.location = 'HomeAdministrador.php';
			   
			},
			error:function(e){
	   
				  console.log(e);
			   }
	   
		});


	} else {
		alert('Cancelado!');
	}
}