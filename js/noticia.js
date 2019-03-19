function publicar(){
    parametro = 'txt-asunto='+$("#txt-asunto").val()+
    '&txt-mensaje='+$("#txt-mensaje").val();
    
    $.ajax({
        url:"ajax/gestion-noticia.php?accion=publicar",
               data:parametro,
               method:"POST",
               success:function(respuesta){
                alert('Aviso Creaso!');
                window.location.href='HomeTutor.php'
                console.log(respuesta);
               },
               error:function(e){
       
                  console.log(e);
               }
       
        });
}