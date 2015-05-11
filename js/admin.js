(function() {

  function reset_pwd(event) {
    event.preventDefault();
    but_pwd.before("<input name='pwd' type='text'>");
    but_pwd.remove();
  }

  var but_pwd = $('#but_pwd');
  but_pwd.click(reset_pwd);

})();