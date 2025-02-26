
jQuery(document).ready(function ($) {
  if ($('#artProgressBar').length > 0) {
    window.onscroll = function () { artScrollFunction() };
  }

  function artScrollFunction() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("artProgressBar").style.width = scrolled + "%";
  }
});

