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

  // Auto-complétion des pays
  var paysString;
  var listPays;
  if (paysString = $('#pays-string').html()) {
    listPays = paysString.split(";");
    $( "#pays" ).autocomplete({
        source: listPays
    });
  }

  // Auto-compétion des artistes
  var artistString;
  var listArtist;
  function autoCompleteArtist() {
    listArtist = artistString.split(";");
    $( ".artist" ).autocomplete({
        source: listArtist
    });
  }
  if (artistString = $('#artists-string').html()) {
    autoCompleteArtist();
  }

  // Ajout vidéo : nouvel artist
  var new_art;
  if (new_art = $('#new_art')) {

    function addNewArtist(e){
      e.preventDefault();
      $(this).after('<br><label></label><input class="artist" name="artist[]" type="text"><button id="new_art" class="icones">+</button>');
      $(this).remove();
      $('#new_art').click(addNewArtist);
      autoCompleteArtist();
    }
    
    new_art.click(addNewArtist);
  }

  // Ajout vidéo : importer des sous-titres
  var import_sbt;
  if (import_sbt = $('#import_sbt')) {

    function addInputsSbt(e){
      e.preventDefault();
      var s = '<label for="vtt">Sous-titres (vtt) *</label><input id="vtt" name="vtt" type="file">';
      s += '<br><label for="srt">Sous-titres (srt) *</label><input id="srt" name="srt" type="file">';
      s += '<br><label for="srt_prog">Sous-titres progressifs (srt) *</label><input id="srt_prog" name="srt_prog" type="file">';
      $('#lab_sbt').remove();
      $(this).after(s);
      $(this).remove();
    }
    
    import_sbt.click(addInputsSbt);
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