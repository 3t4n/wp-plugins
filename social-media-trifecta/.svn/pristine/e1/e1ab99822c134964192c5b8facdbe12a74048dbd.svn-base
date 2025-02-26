jQuery(document).ready(function ($) {
    fbscrolled = 0;
    $('#facebook-scroll-down').on('click', function () {

        fbscrolled = fbscrolled + 300;
        $('#triefecta-facebook-holder-default').animate({
            scrollTop: fbscrolled
        });
        if (fbscrolled > 3600) {
            fbscrolled=3600;
        }



    });
    $('#facebook-scroll-up').on('click', function () {

        fbscrolled = fbscrolled - 300;
        $('#triefecta-facebook-holder-default').animate({
            scrollTop: fbscrolled
        });
        if (fbscrolled < 0) {
            fbscrolled=0;
        }


    });
});