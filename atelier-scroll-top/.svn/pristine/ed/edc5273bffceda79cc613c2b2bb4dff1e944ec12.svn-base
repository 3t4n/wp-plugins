/* Scripts Atelier Scroll Top */
jQuery(document).ready(function() {

    var scroll = jQuery('#scroll-top-alt');

    jQuery(window).scroll(function(){
       if(jQuery(this).scrollTop() > 40) {
           scroll.fadeIn();
       } else {
           scroll.fadeOut();
       }
    });


    scroll.on('click',function() {
       jQuery('html,body').animate({
           scrollTop: 0
       },
           800);
    });

    // Add Color Picker
    jQuery(function() {
        jQuery('.color-field').wpColorPicker();
    });

    /* Clouds info */
jQuery('.icon-ast').on('mouseleave',function() {
   jQuery('.cloud-info-icons').fadeIn();
});

});