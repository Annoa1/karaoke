$( document ).ready(function() 
{
  // Récupération des éléments
  // var $start = $('.start');
  // var $choice = $('#choice');

  // $start.bind("click", function()
  // {
  //   // $choice.slideToggle()(); Au clic, fait apparaitre/disparaitre les poulpes
  //   $choice.slideDown()();
  // });
  
  var chrono;

  if (chrono = $('#chrono')) {

    var t = 10;
    var runChrono = function() {

      if (t < 0) {
        var id = $('#default_id').html();
        window.location.href = "play.php?id="+id;
      }
      else {
        // affichage
        chrono.html(t+' !');
        t = t - 1;
      }
    }

    window.setInterval(runChrono, 1000);
  }

});