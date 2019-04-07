$(document).ready(function(){
	$.ajax({
		url:"ajax/gestion-registro.php?accion1=obtenerSolicitudes",
			   data:"",
			   method:"GET",
			   success:function(respuesta){

					$("#listaSolicitudes").html(respuesta);
		

			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});
	
});

function eliminarSolicitud(a){
	var parametro = 'idSolicitud='+a;
	$.ajax({
		url:"ajax/gestion-registro.php?accion1=eliminarSolicitud",
			   data:parametro,
			   method:"POST",
			   success:function(respuesta){
				
				$("#fila-"+a).html(respuesta);
		

			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});


}