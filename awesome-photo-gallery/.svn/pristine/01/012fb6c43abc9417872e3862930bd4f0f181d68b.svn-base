var slideshow_status = false;
var slideshow_autostart = false;
var slideshow_handler;
var slideshow_timeout = 1;

jQuery(document).ready(function() {
    jQuery('#apg-photo-close').click(function() {
       jQuery('#apg-photo-watcher').hide();

        apg_slideshow_stop();
    });

    jQuery('#apg-photo-previous').click(function( event ) {
        event.preventDefault();
        apg_previous_photo();
        apg_slideshow_stop();

        return false;
    });

    jQuery('#apg-photo-next').click(function( event ) {
        event.preventDefault();
        apg_next_photo();
        apg_slideshow_stop();

        return false;
    });

    jQuery('.apg-photo-url').click(function( event ) {
       event.preventDefault();

       jQuery('#apg-photo-watcher').show();
        apg_set_big_photo( jQuery(this).attr('href') );
        if (typeof apg_filmstrip_update == 'function') { apg_filmstrip_update(); }

        if( slideshow_autostart == true ) {
            apg_slideshow_start();
        }

        if (typeof apg_google_tracking != 'undefined') {
            ga( 'send', 'event', 'awesome-photo-gallery', 'click', 'view-big-photo' );
        }
    });

    jQuery('.apg-goto-link').click(function( event ) {
        location.href = jQuery(this).attr('href');
    });

    jQuery('#apg-slide-toggle').click(function( event ) {
        apg_slideshow_toggle();
    });

});

jQuery(document).keyup(function(e) {
    if (e.keyCode == 27) {
        jQuery('#apg-photo-watcher').hide();

        apg_slideshow_stop();
    }
    else if (e.keyCode == 37) {
        // left key
        apg_previous_photo();
        apg_slideshow_stop();
    }
    else if (e.keyCode == 39) {
        // right key
        apg_next_photo();
        apg_slideshow_stop();
    }
    else if (e.keyCode == 32) {
        // space bar
        apg_slideshow_toggle();
    }
});

function apg_previous_photo() {
    var links = jQuery("#apg-gallery div a").map(function () {
        return this.href;
    }).get();
    var start = jQuery('img', '#apg-photo').data('url');
    var prev = links[(jQuery.inArray(start, links) - 1 + links.length) % links.length];

    apg_set_big_photo( prev );
    if (typeof apg_filmstrip_update == 'function') { apg_filmstrip_update(); }
    if (typeof apg_google_tracking != 'undefined') {
        ga( 'send', 'event', 'awesome-photo-gallery', 'click', 'view-previous-photo' );
    }
}

function apg_next_photo(){
    var links = jQuery("#apg-gallery div a").map(function () {
        return this.href;
    }).get();
    var start = jQuery('img', '#apg-photo').data('url');
    var next = links[(jQuery.inArray(start, links) + 1) % links.length];

    apg_set_big_photo( next );
    if (typeof apg_filmstrip_update == 'function') { apg_filmstrip_update(); }
    if (typeof apg_google_tracking != 'undefined') {
        ga( 'send', 'event', 'awesome-photo-gallery', 'click', 'view-next-photo' );
    }
}

function apg_set_big_photo( url ){
    jQuery('#apg-photo').html('<img src="' + url + '" data-url="' + url + '" alt="Photo big - Awesome Photo Gallery" />');
    if (typeof apg_google_tracking != 'undefined') {
        ga( 'send', 'event', 'awesome-photo-gallery', 'click', 'view-full-photo', url );
    }
}

function apg_slideshow_start() {
    slideshow_status = true;
    jQuery('#apg-slide-toggle').html('<span class="apg-button-contents"><i class="fa fa-pause apg-slideshow-pause"></i></span>');

    window.clearTimeout(slideshow_handler);
    slideshow_handler = setTimeout(function(){ apg_slideshow_next(); }, apg_slideshow_timeout() );

    if (typeof apg_google_tracking != 'undefined') {
        ga( 'send', 'event', 'awesome-photo-gallery', 'click', 'slideshow-start' );
    }
}

function apg_slideshow_stop() {
    slideshow_status = false;
    window.clearTimeout(slideshow_handler);

    jQuery('#apg-slide-toggle').html('<span class="apg-button-contents"><i class="fa fa-play apg-slideshow-play"></i></span>');

    if (typeof apg_google_tracking != 'undefined') {
        ga( 'send', 'event', 'awesome-photo-gallery', 'click', 'slideshow-stop' );
    }
}

function apg_slideshow_next() {
    if( slideshow_status == true ) {
        apg_next_photo();

        slideshow_handler = setTimeout(function(){ apg_slideshow_next(); }, apg_slideshow_timeout() );
    }
}

function apg_slideshow_toggle(){
    if( slideshow_status == false ) {
        apg_slideshow_start();
    }
    else{
        apg_slideshow_stop();
    }
}

function apg_slideshow_timeout(){
    return parseInt( slideshow_timeout ) * 1000;
}