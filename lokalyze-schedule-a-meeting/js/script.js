$(document).ready(function() {
    $('#mbl-menu').click(function() {
//        $('#navbarSupportedContent').toggleClass('in');
        $('#navbarSupportedContent').slideToggle();
        $('#mbl-menu').toggleClass('fa-times');
    });
    $('#cookie_declinebtn, #cookie_acceptbtn').click(function() {
        $('.cookie-popup').css("display","none");
    });
    $('#technlogies_owl').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: ["", ""],
        autoplay: 'true',
        autoplayTimeout: 2000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
});
$(window).scroll(function() {
    if ($(window).scrollTop() > 250) {
        $('.mainheader').addClass('header-fix');
    }
    else {
        $('.mainheader').removeClass('header-fix');
    }
});


