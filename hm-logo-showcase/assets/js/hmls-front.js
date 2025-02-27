(function(window, $) {

    // USE STRICT
    "use strict";

    if (hmlsSlideOption.displayRtl == true) {
        var Displayrtl = true;
    }
    if (hmlsSlideOption.centerMode == true) {
        var centerMode = true;
    }
    if (hmlsSlideOption.displayArrow == true) {
        var displayArrow = false;
    }
    //alert(displayArrow);

    //var splide = document.getElementsByClassName("hmls-slide-wrapper");
    var splide = document.getElementsByClassName("hmls-view-slide")[0];

    if (splide != null) {

        $('.hmls-view-slide').slick({
            speed: hmlsSlideOption.speed,
            slidesToShow: hmlsSlideOption.logos,
            slidesToScroll: 1,
            autoplay: hmlsSlideOption.autoplay,
            infinite: true,
            autoplaySpeed: hmlsSlideOption.interval,
            cssEase: 'ease',
            dots: true,
            dotsClass: 'slick-dots',
            pauseOnHover: true,
            arrows: displayArrow,
            rtl: Displayrtl,
            draggable: false,
            centerMode: centerMode,
            prevArrow: '<button type="button" data-role="none" class="slick-prev">Previous</button>',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false
                    }
                }
            ],
        });
    }

})(window, jQuery);