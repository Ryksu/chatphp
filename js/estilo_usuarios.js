function backgroud(){
  var color = [];
  color[0]='#bfb486';
  color[1]='#99827c';
  color[2]='#3e6c55';
  color[3]='#5320c4';
  color[4]='#0eb6da';
  var rad = Math.round(Math.random()*4);
var usuario_color = document.getElementById("chatbox");
usuario_color.style.backgroundColor= color[rad];


}
