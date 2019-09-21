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
	console.log("hola");
	$.ajax({
		url:"",
			   data:"",
			   method:"GET",
			   success:function(respuesta){
				   document.getElementById('acoso').innerHTML = `
				   
				   `
				   document.getElementById('impuntualidad').innerHTML = `
				   
				   `
				   document.getElementById('otros').innerHTML = `
				   
				   `
				   document.getElementById('falrPrep').innerHTML = `
				   
				   `
				  

			
		

			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   

	})
}