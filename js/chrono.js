$( document ).ready(function() 
{
   var chrono;

  if (chrono = $('#chrono')) {

    var regex = /id=/;

    if (!regex.test(window.location.href)) {
      var t = 5;
      var runChrono = function() {

        if (t < 0) {
          var id = $('#default_id').val();
          var adress = "play.php?id="+id;
          // console.log(adress);
          window.location.href = adress;
        }
        else {
          // affichage
          chrono.html(t);
          t = t - 1;
        }
      }

      window.setInterval(runChrono, 1000);
    } 
  }

});