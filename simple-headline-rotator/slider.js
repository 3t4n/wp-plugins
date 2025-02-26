var headline_count;
var headline_interval;
var old_headline = 0;
var current_headline = 0;
$(document).ready(function(){
  headline_count = $("div.headline").size();
  $("div.headline:eq("+current_headline+")").css('left', '15px');
 
  headline_interval = setInterval(headline_rotate,5000);
  $('#scrollup').hover(function() {
    clearInterval(headline_interval);
  }, function() {
    headline_interval = setInterval(headline_rotate,5000);
    headline_rotate();
  });
});
function headline_rotate() {
  current_headline = (old_headline + 1) % headline_count;
  $("div.headline:eq(" + old_headline + ")")
    .animate({left: -1210},"slow", function() {
      $(this).css('left', '1210px');
    });
  $("div.headline:eq(" + current_headline + ")")
    .animate({left: 15},"slow");  
  old_headline = current_headline;
}