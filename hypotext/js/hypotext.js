(function($) {
  // code using $ as alias to jQuery
  $(function() {
    // Hide the hypotext content.
    $('.hypotext-content').hide();
    // When a hypotext link is clicked.
    $('a.hypotext.closed').click(function (e) {
      // custom handling here
      e.preventDefault();

      // Create the class reference from the rel value.
      var id = '.' + $(this).attr('rel');

      // If the content is hidden, show it now.
      if ( $(id).css('display') == 'none' ) {
        $(id).show('slow');
        if (jQuery.ui) {
          // UI loaded
          $(id).effect("highlight", {}, 1000);
        }
      }
      // If the content is shown, hide it now.
      else {
        $(id).hide('slow');
      }
    });

    // If we have a hash value in the url.
    if (window.location.hash) {
      // If the anchor is within a hypotext block, expand it, by clicking the
      // relevant link.
      console.log(window.location.hash);
      var anchor = $(window.location.hash);
      var hypotextLink = $('#' + anchor.parents('.hypotext-content').attr('rel'));
      console.log(hypotextLink);
      hypotextLink.click();
      // Wait until the content has expanded before jumping to anchor.
      //$.delay(1000);
      setTimeout(function(){
        scrollToAnchor(window.location.hash);
      }, 1000);
    }
  });

  function scrollToAnchor(id) {
    var anchor = $(id);
    $('html,body').animate({scrollTop: anchor.offset().top},'slow');
  }

})(jQuery);