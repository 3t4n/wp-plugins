<?php header("content-type: application/x-javascript"); ?>
(function( $ ) {
	'use strict';        
        
<?php if (is_numeric($_GET['activate_mouse_scroll'])) { $activate_mouse_scroll = $_GET['activate_mouse_scroll']; } else { $activate_mouse_scroll = '1'; } ?>
    <?php  if ($activate_mouse_scroll === '1') { ?>
    jQuery.scrollSpeed = function(step, speed) {
        
        var $document = $(document),
        
            $window = $(window),
            
            $body = $('html, body'),
            
            viewport = $window.height(),
            
            top = 0,
            
            scroll = false;
            
        if (window.navigator.msPointerEnabled)
        
            return false;
            
        $window.on('mousewheel DOMMouseScroll', function(e) {
        
            scroll = true;
            
            if (e.originalEvent.wheelDeltaY < 0 || e.originalEvent.detail > 0)
            
                top = (top + viewport) >= $document.height() ? top : top += step;
                
            if (e.originalEvent.wheelDeltaY > 0 || e.originalEvent.detail < 0)
            
                top = top <= 0 ? 0 : top -= step;
                
            $body.stop().animate({
            
                scrollTop: top
                
            }, speed, 'default', function() {
            
                scroll = false;
                
            });
            
            return false;
            
        }).on('scroll', function() {
        
            if (!scroll) top = $window.scrollTop();
            
        }).on('resize', function() {
            
            viewport = $window.height();
            
        });       
    };
    
    jQuery.easing.default = function (x,t,b,c,d) {
    
        return -c * ((t=t/d-1)*t*t*t - 1) + b;
    };
    
    
    
    $(function() {  

    jQuery.scrollSpeed( <?php if (is_numeric($_GET['wpsmoother_mouse_distance'])) { echo $_GET['wpsmoother_mouse_distance']; } else { echo '100'; } ?>, <?php if (is_numeric($_GET['wpsmoother_mouse_speed'])) { echo $_GET['wpsmoother_mouse_speed']; } else { echo '800'; } ?>);

});
<?php } ?>




<?php if (is_numeric($_GET['activate_click_scroll'])) { $activate_click_scroll = $_GET['activate_click_scroll']; } else { $activate_click_scroll = '1'; } ?>
    <?php  if ($activate_click_scroll === '1') { ?>
//SMOOTH ANCHOR SCROLL

$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, <?php if (is_numeric($_GET['wpsmoother_anchor_speed'])) { echo $_GET['wpsmoother_anchor_speed']; } else { echo '800'; } ?>, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
<?php } ?>
})( jQuery );