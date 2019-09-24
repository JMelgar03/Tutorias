$(document).ready(function(){
	$.ajax({
		url:"ajax/gestion-usuario.php?accion=obtenerTutoresR",
			   data:"",
			   method:"POST",
			   success:function(respuesta){

					$("#listaTutores").html(respuesta);
		

			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		})

})	

	
function verReportes(id){
	
	$.ajax({
		url:"ajax/gestion-usuario.php?accion=obtenerReportes",
			   data:"idTutor="+id,
			   method:"GET",
			   success:function(respuesta){
			$('#divReportes').html(respuesta);
				   

			   
			},
			error:function(e){
	   
				  console.log(e);
			   }
	   

	})
}