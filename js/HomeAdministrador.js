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
	
});

function desactivarTutor(a){
    var parametro = 'idAlumno='+a;
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
}