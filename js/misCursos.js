$(document).ready(function(){
	listaSecciones=[];
	$.ajax({
		url:"ajax/getInfo.php?accion=seccionesE",
			   data:"",
			   method:"POST",
			   success:function(respuesta){

                    $("#seccionesContainer-estudiante").html(respuesta);
                    	   
			},
            error:function(e){
    
               console.log(e);
            }
    
     });
})

function mostrarNoticia(a){

    parametro = 'idSeccion='+a;
$.ajax({
    url:"ajax/gestion-noticia.php?accion=mostrar",
           data:parametro,
             method:"POST",
           success:function(respuesta){

                $("#div-noticias-E").html(respuesta);
           
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

   function abandonarSeccion(idSeccion){
      var r = confirm("En realidad desea abandonar la seccion?");
      if (r == true) {
      parametro = 'idSeccion='+idSeccion;
    $.ajax({
        
        url:"ajax/gestion-matricula.php?accion=abandonarSeccion",
               data:parametro,
                 method:"POST",
               success:function(respuesta){
                
    
                window.location = "misCursos.php";
               
            },
               error:function(e){
       
                  console.log(e);
               }
       
        });

   }else{
      alert('Cancelado!');
   }
}