function obtenerSecciones(idClase){
    parametro = 'idClase='+idClase;
    $.ajax({
		url:"ajax/getInfo.php?accion=ObtenerSeccionesE",
			   data:parametro,
				 method:"POST",
			   success:function(respuesta){

					$("#slc-secciones").html(respuesta);
			   
			},
			   error:function(e){
	   
				  console.log(e);
			   }
	   
		});

}


$('#btn-matricular').click(function(){
	parametro = 'idSeccion='+$('#slc-secciones').val();
	$.ajax({
	url:"ajax/gestion-matricula.php?accion=matricularSeccion",
			 data:parametro,
			 method:"POST",
			 success:function(respuesta){

				alert(respuesta);
			 
		},
			 error:function(e){
	 
				console.log(e);
			 }
	 
	});

})

$("#slc-secciones").click(function(){
parametro = 'idSeccion='+$('#slc-secciones').val();
$.ajax({
	url:"ajax/gestion-matricula.php?accion=seccionMatriculada",
			 data:parametro,
			 method:"POST",
			 success:function(respuesta){
				 console.log(respuesta)
				if(respuesta==1){
					//$('#lbl-matricula').css('display','true');
					document.getElementById('lbl-matricula').style.display ='inherit';
					document.getElementById('btn-matricular').style.display ='none';
				}
				else{
					//$('#lbl-matricula').css('display','none');
					document.getElementById('lbl-matricula').style.display ='none';
					document.getElementById('btn-matricular').style.display ='inherit';
				}
			 
		},
			 error:function(e){
	 
				console.log(e);
			 }
	 
	});


})

