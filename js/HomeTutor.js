$(document).ready(function(){
	listaSecciones=[];
	$.ajax({
		url:"ajax/getInfo.php?accion=seccionesT",
			   data:"",
			   method:"POST",
			   success:function(respuesta){

					$("#seccionesContainer").html(respuesta);
				/*for (var j = 0; j < respuesta.length; j++) {
			card = 
		'<div class="card">'
			+'<div class="card-body">'
				+'<h5 class="card-title">'+ respuesta[i].nombreSeccion +'</h5>'
				+'<div class="row">'
					+'<div class = "col-10">'
						+'<p class="card-text"> Materia: '+ respuesta[i].nombreMateria +'</p>'
							+'<div class="row">'
								+'<div class="col-6">'
									+'<p class="card-text"> Hora Inicial: '+ respuesta[i].horaInicial +'</p>'
								+'</div>'
								+'<div class="col-6">'
									+'<p class="card-text"> Hora Final: '+ respuesta[i].horaFinal +'</p>'
								+'</div><br><br>'
							+'</div>'
						+'<p class="card-text"> Dias: '+ respuesta[i].dias +'</p>'
						+'<p class="card-text"> Cupos Disponibles: '+ respuesta[i].cupos +'</p>'
					+'</div>'
					+'<div class = "col-2">'
						+'<div class="img-container"><img src="img/imgunah/cropped-logo-2.png" class="logo-seccion"></div>'
						+'<p class="card-text card-calificacion"> Calificación: </p>'
					+'</div>'
				+'</div>'
			+'</div>'
			+'<input type="button" class="btn btn-danger" onclick="eliminarSeccion('.$fila.')">'
		+'</div>'*/
		

			   
			},
			   error:function(e){
	   
				  console.log(e);
				 }
				 
				 
	   
		});
	
/*	listaSecciones = [
		{
			nombreSeccion: "0900",
			nombreMateria: "Programación I",
			horaInicial : "9:00AM",
			horaFinal : "10:00AM",
			cupos: "22",
			dias: "Lunes,Martes,Miercoles",
			calificacion: "9.8"
		},
		{
			nombreSeccion: "1100",
			nombreMateria: "Geometría y Trigonometría",
			horaInicial : "11:00AM",
			horaFinal : "12:00PM",
			cupos: "15",
			dias: "Martes,Miercoles",
			calificacion: "7"
		}
	]*/

	/*for (var i = 0; i < listaSecciones.length; i++) {
		card = 
		'<div class="card">'
			+'<div class="card-body">'
				+'<h5 class="card-title">'+ listaSecciones[i].nombreSeccion +'</h5>'
				+'<div class="row">'
					+'<div class = "col-10">'
						+'<p class="card-text"> Materia: '+ listaSecciones[i].nombreMateria +'</p>'
							+'<div class="row">'
								+'<div class="col-6">'
									+'<p class="card-text"> Hora Inicial: '+ listaSecciones[i].horaInicial +'</p>'
								+'</div>'
								+'<div class="col-6">'
									+'<p class="card-text"> Hora Final: '+ listaSecciones[i].horaFinal +'</p>'
								+'</div><br><br>'
							+'</div>'
						+'<p class="card-text"> Dias: '+ listaSecciones[i].dias +'</p>'
						+'<p class="card-text"> Cupos Disponibles: '+ listaSecciones[i].cupos +'</p>'
					+'</div>'
					+'<div class = "col-2">'
						+'<div class="img-container"><img src="img/imgunah/cropped-logo-2.png" class="logo-seccion"></div>'
						+'<p class="card-text card-calificacion"> Calificación: '+ listaSecciones[i].calificacion +'</p>'
					+'</div>'
				+'</div>'
			+'</div>'
		+'</div>'
		$("#seccionesContainer").append(card)*/
	

		$.ajax({
			url:"ajax/getInfo.php?accion=solicitudesNot",
					 data:"",
					 method:"POST",
					 success:function(respuesta){
						$("#solicitudes-notificacion").html(respuesta);
					},
					error:function(e){
			
					 console.log(e);
					}
					
					
			
		 });


	$("#btn-crearSeccion").click(function(){
		window.location.href='NuevaSeccion.html';
	})
	
});


function eliminarSeccion(a){
	var parametro = 'idSeccion='+a;
	$.ajax({
		url:"ajax/gestion-matricula.php?accion=eliminarSeccion",
	   data:parametro,
	   method:"POST",
	   success:function(respuesta){

		 alert(respuesta);
		 window.location= 'HomeTutor.php';
	   },
	   error:function(e){

		  console.log(e);
	   }

});
	}
	

	function eliminarNoticia(a){
		var parametro = 'idNoticia='+a;
		$.ajax({
			url:"ajax/gestion-noticia.php?accion=eliminarNoticia",
			 data:parametro,
			 method:"POST",
			 success:function(respuesta){
	
			 alert(respuesta);
					
			 window.location= 'HomeTutor.php';
			 },
			 error:function(e){
	
				console.log(e);
			 }
	
	});
		}


		function eliminarComentario(a){
			var parametro = 'idComentario='+a;
			$.ajax({
				url:"ajax/gestion-noticia.php?accion=eliminarComentario",
				 data:parametro,
				 method:"POST",
				 success:function(respuesta){
		
				 alert('Eliminado');
				 window.location= 'HomeTutor.php';
				 },
				 error:function(e){
		
					console.log(e);
				 }
		
		});
			}

  function agregarNoticia(a){
    window.location.replace("noticia.php?sec="+a);
}

function mostrarNoticia(a){

		parametro = 'idSeccion='+a;
	$.ajax({
		url:"ajax/gestion-noticia.php?accion=mostrar",
			   data:parametro,
				 method:"POST",
			   success:function(respuesta){

					$("#div-noticias").html(respuesta);
			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});
}

function comentarNoticia(a,nombre,idAlumno){
   if($('#txt-noticia-'+a).val()){
		$('#txt-noticia-'+a).css("background-color", "white");

		parametro = 'idNoticia='+a+'&idAlumno='+idAlumno+'&txt-comentario='+$('#txt-noticia-'+a).val();
		$.ajax({
					url:"ajax/gestion-noticia.php?accion=comentar",
			   data:parametro,
				 method:"POST",
			   success:function(respuesta){
					console.log(respuesta);
					$("#div-comentario-"+a).html($("#div-comentario-"+a).html()+'<div class="media mt-3 div_comentario">'+
					'<a class="mr-3" href="#">'+
						'<img src="img/perfil-vacio.jpg" class="mr-3" alt="Smiley face"width="25" height="25">'+
					'</a>'+
					'<div class="media-body">'+
						'<h5 class="mt-0">'+nombre+'</h5>'+
						$('#txt-noticia-'+a).val()+
					'</div>'+
					'<input type="button" class="btn btn-danger" style="color: white;" value="X" onClick="eliminarComentario()">'+
					'</div>')
			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});


	 }
	 else{
		$('#txt-noticia-'+a).css("background-color", "red");
	 }

}

function verListado(a){
	window.location = "listadoEstudiantes.php?idSeccion="+a;
}

  