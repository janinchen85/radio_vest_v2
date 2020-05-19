$(document).ready(function() {
    $(document).scroll(function () {
        var header = document.getElementById("navbar");
        var sticky = header.offsetTop;
        if (window.pageYOffset > sticky) {
            $('#navbar').addClass('navFixed');
            $('#navbar').removeClass('navbar');
        } else {
            $('#navbar').removeClass('navFixed');
            $('#navbar').addClass('navbar');
            $('#navbar').animate({"opacity": "0"}, 100);
            setTimeout(function() { fadeNav(); }, 100);
        }
    });          
});

function fadeNav() {
    $('#navbar').addClass('navbar');
    $('#navbar').removeClass('navFixed');
    $('#navbar').animate({"opacity": "1"}, 500);
  }
  
  $(function() {
       $( '#nav a' ).on( 'click', function() {
             $('#nav a').removeClass('active');
             $(this).addClass('active');
       });
  });

  function toggle() {
    var x = document.getElementById("navi");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

function hide(item){
  var i = 1;
  while (i <= 6){
    document.getElementById("mItem"+i).classList.remove('w3-hide-small');
    document.getElementById("item"+i).classList.add('w3-hide-small');
    i++
  }
    document.getElementById("mItem"+item).classList.add('w3-hide-small');
    document.getElementById("item"+item).classList.remove('w3-hide-small');
  toggle();
}
