$(document).ready(function(){
	$.ajax({
		url:"ajax/getInfo.php?accion=obtenerEstudiantes",
			   data:"",
			   method:"POST",
			   success:function(respuesta){

					$("#listaEstudiantes").html(respuesta);
		

			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});
	
});