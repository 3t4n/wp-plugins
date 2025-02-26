jQuery('[data-fancybox="aigwl_gallery"]').fancybox({
    buttons: [
      "slideShow",
      "thumbs",
      "zoom",
      "fullScreen",
      "close"
    ],
    loop: false,
    protect: true,
    fitToView: false,
    maxWidth: "90%"
  });

  jQuery( document ).ready(function() {
    jQuery.fancybox.defaults.hash = false;
  }); 

  jQuery(document).ready(function($) {
    $(".fancybox").fancybox({
        fitToView: false,
        maxWidth: "90%"
    });
});