(function() {

  // Changement du mot de passe
  function reset_pwd(event) {
    event.preventDefault();
    but_pwd.before("<input name='pwd' type='text'>");
    but_pwd.remove();
  }

  var but_pwd;
  if (but_pwd = $('#but_pwd')) {
    but_pwd.click(reset_pwd);
  } 

  // Auto-complétion
  var paysString;
  var listPays;
  if (paysString = $('#pays-string').html()) {
    listPays = paysString.split(";");
    $( "#pays" ).autocomplete({
        source: listPays
    });
  }
  
  // Modification d'un artist
  function modifArtist() {
    var art_id = $(this).val();
    var td = $(this).parent();
    var old_name = $('#art_'+art_id).text();
    $('#art_'+art_id).html("<form style='margin:0' action='admin-artist.php?id="+art_id+"' method='post'><input type='text' name='nom' id='focus' value='"+old_name+"'></form>");
    $('#focus').focus();
    td.html("<button class='icones'>O</button>");
    td.children().click(function(){
      $('form').submit();
    });
    td.keypress(function(e) {
      if(e.which == 13) {
        $('form').submit();
      }
    }); 
  }

  var art_buttons;
  if (art_buttons = $('button.modif')) {
    art_buttons.click(modifArtist);
  }

})();