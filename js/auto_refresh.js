//Esta funcion refresh en un segundo el chat es necesario jquery para que funcione;

$(document).ready(function(){
  var interval = setInterval(function(){
    $.ajax({
      url:'../php/mensajes.php',
      success:function(data){
        $('#chatbox').html(data);
      }
    });
  },1000);
});
