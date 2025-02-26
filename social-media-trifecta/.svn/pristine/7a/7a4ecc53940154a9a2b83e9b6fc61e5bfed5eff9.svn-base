jQuery(document).ready(function ($) {
    instagramScroll = 0;
 var scroll_height=$('#trifecta-instagram-holder-default').outerHeight();

    $('#instagram-scroll-down').on('click', function () {

        instagramScroll = instagramScroll + scroll_height;
        $('#trifecta-instagram-holder-default').animate({
            scrollTop: instagramScroll
        });

        console.log(instagramScroll);


    });
    $('#instagram-scroll-up').on('click', function () {

        instagramScroll = instagramScroll - scroll_height;
        $('#trifecta-instagram-holder-default').animate({
            scrollTop: instagramScroll
        });
        if (instagramScroll < 0) {
            instagramScroll=0;
        }


    });
});