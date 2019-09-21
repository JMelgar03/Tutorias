
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

     $.ajax({
		url:"ajax/getInfo.php?accion=llenarCategorias",
			   data:"",
            method:"POST",
            dataType:'json',
			   success:function(respuesta){
                  
                  for(let i=0;i<Object.keys(respuesta).length;i++){
                     
                     
                    $("#exampleFormControlSelect1").html( $("#exampleFormControlSelect1").html()+ '<option value="'+Object.keys(respuesta)[i]+'">'+respuesta[i+1]+'</option>');
                  }
			},
            error:function(e){
    
               console.log(e);
            }
    
     });


})

var numEstrellas;


function obtEstrellas(){
   console.log("hola");
 
   let cantestrellas = document.querySelectorAll('input[type="radio"][name="estrellas"]:checked');
   numEstrellas = cantestrellas["0"].value;
   console.log(numEstrellas);

   $.ajax({
      url:"",
      data: "estrellas="+numEstrellas,
      method:"POST",
      success:function(respuesta){
      console.log(respuesta);
      alert('Seccion Creada!');
      window.location.href='HomeTutor.php';
      },
      error:function(e){

      console.log(e);
      }
  })

}
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

function reportar()
{
  var parametros = `slc-id-categoria=${$('#exampleFormControlSelect1').val()}&txt-descripcion=${$('#exampleFormControlTextarea1').val()}&idTutor=${$('#txtIdTutor').val()}`;

  
   $.ajax({
      url:"ajax/gestion-usuario.php?accion=reportar",
      data:parametros,
      method:"POST",
      success:function(a){
         console.log(a);
         $('#seccionesContainer-estudiante').html(
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">'+
            '<strong>Reporte Realizado!</strong> se realizo el reporte al tutor de esta seccion el administrador podra ver tu reporte y tomarlo en cuenta.'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
              '<span aria-hidden="true">&times;</span>'+
            '</button>'+
          '</div>'+
         
         $('#seccionesContainer-estudiante').html());
         $('#exampleFormControlTextarea1').val("")

      },
      error:function(e){
         console.log(e);

      }
   })
}

function establecerIdTutor(idTutor){
   $("#txtIdTutor").val(idTutor);
}