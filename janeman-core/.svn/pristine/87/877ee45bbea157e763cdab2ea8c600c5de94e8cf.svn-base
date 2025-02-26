(function($){
'use strict';

/*----- ELEMENTOR LOAD FUNTION CALL ---*/

$( window ).on( 'elementor/frontend/init', function() {


    var hero_slide_bg = function(){

         // Hero slider background setting
        function sliderBgSetting() {
            if ($(".hero-slider .slide").length) {
                $(".hero-slider .slide").each(function() {
                    var $this = $(this);
                    var img = $this.find(".slider-bg").attr("src");

                    $this.css({
                        backgroundImage: "url("+ img +")",
                        backgroundSize: "cover",
                        backgroundPosition: "center center"
                    })
                });
            }
        }

        sliderBgSetting();

    }; // end

    var hero_slide = function(){
        
        //Setting hero slider
        function heroSlider() {
            if ($(".hero-slider").length) {
                $(".hero-slider").not('.slick-initialized').slick({
                    autoplay: true,
                    autoplaySpeed: 6000,
                    arrows: true,
                    prevArrow: '<button type="button" class="slick-prev">Previous</button>',
                    nextArrow: '<button type="button" class="slick-next">Next</button>',
                    dots: true,
                    fade: true,
                    cssEase: 'linear',
                });
            }
        }

        //Active heor slider
        heroSlider();

    }; // end

   

    //hero_slide_bg
    elementorFrontend.hooks.addAction( 'frontend/element_ready/annur-janeman_slider.default', function($scope, $){
        hero_slide_bg();
    } );


    //hero_slide
    elementorFrontend.hooks.addAction( 'frontend/element_ready/annur-janeman_slider.default', function($scope, $){
        hero_slide();
    } );


    
} );


})(jQuery);  