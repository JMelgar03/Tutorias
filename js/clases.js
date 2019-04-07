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
if($('#slc-secciones').val()){
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
	}	
else{
	alert('No Hay Seccion Seleccionada.');
}

})

function crearSolicitud(a){
	if($('#slc-horaInicial2').val() != 'Hora Inicial'){
		if($('#slc-horaFinal2').val() != 'Hora Final'){ 
				if($("input[type=checkbox]:checked").val()){

					var dias = "&dias=";
					//categorias[]=1&lista[]=2&lista[]=3&
				
					$("input[name='week2[]']:checked").map(function(){
						dias +=$(this).val();
					});

					var parametro = "txt-idClase="+a+" &slc-horaInicial2="+$('#slc-horaInicial2').val()+
					"&slc-horaFinal2="+$('#slc-horaFinal2').val()+dias;
				
					$.ajax({		
						url:"ajax/gestion-registro.php?accion1=guardarSolicitud",
							data:parametro,
							method:"POST",
							success:function(respuesta){
								console.log(respuesta);
								alert('Solicitud Creada!');
							},
							error:function(e){
			
								console.log(e);
							}
			
						});




				}
				else{
						alert('seleccione almenos un dia.')
			 }
			}
					else{
						alert('seleccione una hora final');
					}
				
				}
				else{
					alert('seleccione una hora de inicio');
				}

}

function crearBoton(a){
	$("#div-contenedorBoton").html('<input type="button" class="btn btn-primary mt-2" value="Solicitar" onclick="crearSolicitud('+a+')">')
}