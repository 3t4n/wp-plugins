/**
 * Corporis v1.0.0 - Corporis - Multiporpose Business Theme
 * @link 
 * @copyright 2016-2017 MajesticTheme
 * @license ISC
 */
(function ($) {
    'use strict';

    var $body = $('body'),
        $window = $(window),
        windowHeight = $window.height(),
        windowWidth = $window.width();


    /*==============================================
     Portfolio grid init
     ===============================================*/
    var $alienPortfolio = $('.js-Portfolio');

    $alienPortfolio = $('.js-Portfolio').isotope({
        itemSelector: '.portfolio-item',
        filter: '*'
    });

    if ($.fn.imagesLoaded) {
        $alienPortfolio.imagesLoaded().progress(function () {
            $alienPortfolio.isotope('layout');
        });
    }

    $('.js-PortfolioFilter').on('click focus', 'a', function (e) {
        var $this = $(this);
        e.preventDefault();
        $this.parent().addClass('active').siblings().removeClass('active');
        $alienPortfolio.isotope({filter: $this.data('filter')});
    });


    /*==============================================
     Portfolio popup
     ===============================================*/
    $(".portfolio-gallery").each(function () {
        $(this).find(".popup-gallery").magnificPopup({
            type: "image",
            gallery: {
                enabled: true
            }
        });
    });

    $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
        disableOn: 700,
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    // Example 1: From an element in DOM
    $('.open-popup-link').magnificPopup({
      type:'inline',
      midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });

    /*==============================================
     Returns height of browser viewport
     ===============================================*/
    $('.ScrollTo').on('click', function(e) {
        e.preventDefault();
        var element_id = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(element_id).offset().top -60
        },500);
    });

})(jQuery);

;(function () {
    'use strict';

    var swiper = new Swiper('.swiper-container', {
        // Optional parameters
        effect: 'fade',
        speed: 1000,
        loop: true,
        autoplay: 8000,
        nested: true,
        parallax: true,

        pagination: '.swiper-button-next, .swiper-button-prev',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationType: 'custom',
        paginationCustomRender: function (swiper, current, total) {
            return '<div class="swiperCount">'+
                        '<span class="swiperCount-current">'+ current +'</span>'+
                        '<i class="swiperCount-devider"></i>'+
                        '<span class="swiperCount-total">'+ total +'</span>'+
                   '</div>';
        },
        
    });

})(jQuery);