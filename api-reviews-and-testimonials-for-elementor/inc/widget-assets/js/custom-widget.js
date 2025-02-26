jQuery(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/widget', function ($scope, $) {
        $('[class^="rts-slick-slider-"]').each(function () {
            var $slider = $(this);
            var slidesToShow = $slider.data('slides-to-show');

            if (!$slider.hasClass('slick-initialized')) { // Ensure the slider is not already initialized
                $slider.slick({
                    slidesToShow: slidesToShow,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: true,
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    adaptiveHeight: true
                });
            }
        });
    });
});