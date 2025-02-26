(function($) {
    var HeroSlider = function($scope, $) {
        var activeMainSlider = $('.featured-book-slider-activate');

        activeMainSlider.each(function(index) {
            var $this = $(this);
            var carouselOptions = {
                dots: $this.data("dots"),
                arrows: $this.data("nav"),
                infinite: $this.data("loop"),
                autoplay: $this.data("autoplay"),
                autoplayTimeout: $this.data("autoplay-timeout"),
                draggable: $this.data("mouse-drag"),
                swipe: $this.data("touch-drag"),
                slidesToShow: 1,
                autoplayHoverPause: $this.data("auto-hover"),
                prevArrow: '<button type="button" class="slick-prev"><i class="rswpthemes-icon icon-angle-left-solid"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="rswpthemes-icon icon-angle-right-solid"></i></button>',
                centerMode: $this.data("center-mode"),
                speed: $this.data('smart-speed') || 300,
                cssEase: 'ease',
                adaptiveHeight: true
            };

            // Initialize Slick Slider
            $this.slick(carouselOptions);
        });
    };

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/rswpthemes_awt_full_width_books_slider.default', HeroSlider);
    });

})(jQuery);

