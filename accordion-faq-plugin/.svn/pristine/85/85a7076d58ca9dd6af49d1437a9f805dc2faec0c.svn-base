var action = 'click';
var speed = '500';

jQuery(document).ready(function () {

    // Question handler
    jQuery('li.q').on(action, function () {

        // gets next element
        // opens .a of selected question
        jQuery(this).next().slideToggle(speed)

            // selects all other answers and slides up any open answer
            .siblings('li.a').slideUp();

        // Grab img from clicked question
        var img = jQuery(this).children('img');

        // remove Rotate class from all images except the active
        jQuery('img').not(img).removeClass('rotate');

        // toggle rotate class
        img.toggleClass('rotate');

    });

});