$(document).ready(function(){

    $.ajax({
    url:"ajax/getInfo.php?accion=Edificio",
        data:"",
        method:"POST",
        success:function(respuesta){

          $("#slc-edificio").html(respuesta);
        },
        error:function(e){

           console.log(e);
        }

 });

 $.ajax({
    url:"ajax/getInfo.php?accion=asignaturasT",
        data:"",
        method:"POST",
        success:function(respuesta){

          $("#slc-materia").html(respuesta);
        },
        error:function(e){

           console.log(e);
        }
});

$("#slc-edificio").click(function(){
	$.ajax({
		url:"ajax/getInfo.php?accion=aula",
			data:"codigoEdificio="+$('#slc-edificio').val(),
			method:"POST",
			success:function(respuesta){
	
			  $("#slc-aula").html(respuesta);
			},
			error:function(e){
	
			   console.log(e);
			}
	});
	
})

});


$("#btn-crearSeccion").click(function(){


	if($("#txt-nombreSeccion").val())
		{    
		
		
			if($('#slc-materia').val()){
				if($('#slc-edificio').val()){

					if($('#slc-aula').val()){

						if($('#slc-horaInicial').val()){
							if($('#slc-horaFinal').val()){

								if($('#txt-numeroCupos').val()){
									if($("input[type=checkbox]:checked")){

										var dias = "&dias=";
										//categorias[]=1&lista[]=2&lista[]=3&
									
										$("input[name='week[]']:checked").map(function(){
											dias +=$(this).val();
										});
										
											var parametro = "nombreSeccion="+$("#txt-nombreSeccion").val()+
															"&slc-materia="+$('#slc-materia').val()+
															"&slc-edificio="+$('#slc-edificio').val()+
															"&slc-aula="+$('#slc-aula').val()+
															"&slc-horaInicial="+$('#slc-horaInicial').val()+
															"&slc-horaFinal="+$('#slc-horaFinal').val()+
															"&txt-numeroCupos="+$('#txt-numeroCupos').val()+
															dias;
															$.ajax({		
																url:"ajax/gestion-registro.php?accion1=guardarSeccion",
																	data:parametro,
																	method:"POST",
																	success:function(respuesta){
																	  console.log(respuesta);
																	  alert('Seccion Creada!');
																	  window.location.href='HomeTutor.php';
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
									alert('ingrese los cupos');
								}
						
							}
							else{
								alert('seleccione una hora final');
							}
						
						}
						else{
							alert('seleccione una hr de inicio');
						}
						
					}
					else{
						alert('seleccione un aula');
					}

				}
				else{
					alert('seleccione un edificio');
				}

			}
			else{
				alert("Seleccione una materia");
			}
		}
		else{
			alert("Ingrese un nombre de seccion");
		}
	 });