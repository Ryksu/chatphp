function scrollToBotton(id){
  var chat = document.getElementById(id);
  $('#'+id).animate({
    scrollTop: chat.scrollHeight - chat.clientHeight
  },'slow');
}
