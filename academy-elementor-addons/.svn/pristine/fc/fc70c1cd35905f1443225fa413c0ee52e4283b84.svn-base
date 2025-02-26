'use strict';

(function ($) {

    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/academyea-course-carousel.default', function( $scope, $ ) {
            var DataAtrrCalss = '.academyea-course-carousel';

            var courseCount = parseInt($scope.find(DataAtrrCalss).attr('courseCount').replace(/"/g, ''), 10);
            var slidesToShow_dsk = parseInt($scope.find(DataAtrrCalss).attr('carousel_column_dsk').replace(/\D/g, ''), 10);
			var slidesToShow_medium = parseInt($scope.find(DataAtrrCalss).attr('carousel_column_tablet').replace(/\D/g, ''), 10);
			var slidesToShow_mobile = parseInt($scope.find(DataAtrrCalss).attr('carousel_column_mobile').replace(/\D/g, ''), 10);
            var dsk_slideShow = (slidesToShow_dsk && courseCount) === 1 ? 2 : slidesToShow_dsk;
            
            var carousel_infinite_loop = $scope.find(DataAtrrCalss).attr('carousel_infinite_loop').replace(/"/g, '');

            var carousel_autoplay = $scope.find(DataAtrrCalss).attr('carousel_auto_play').replace(/"/g, '');

            var carousel_auto_play_speed = parseInt($scope.find(DataAtrrCalss).attr('carousel_auto_play_speed').replace(/\D/g, ''), 10);
            carousel_auto_play_speed = Number(carousel_auto_play_speed);

            var carousel_pause_on_hover = $scope.find(DataAtrrCalss).attr('carousel_pause_on_hover').replace(/"/g, '');
            
            var autoplay_options = {
                delay: carousel_auto_play_speed,
                pauseOnMouseEnter: carousel_pause_on_hover == 'yes' ? carousel_pause_on_hover = true : carousel_pause_on_hover = false,
            };


            var carousel_center = $scope.find(DataAtrrCalss).attr('carousel_center').replace(/"/g, '');
            carousel_center == 'yes' ? carousel_center = true : carousel_center = false;

            var carousel_smooth_scroll = $scope.find(DataAtrrCalss).attr('carousel_free_mode').replace(/"/g, '');
            carousel_smooth_scroll == 'yes' ? carousel_smooth_scroll = true : carousel_smooth_scroll = false;

            var carousel_transition = parseInt($scope.find(DataAtrrCalss).attr('carousel_transition').replace(/\D/g, ''));


            var carousel_dot = $scope.find(DataAtrrCalss).attr('carousel_dot').replace(/"/g, '');
            var pagination_options = {
                el: '.swiper-pagination',
                type: 'bullets',
            };

            var carousel_arrows = $scope.find(DataAtrrCalss).attr('carousel_arrows').replace(/"/g, '');
            var navigation_options = {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            };

            const mySwiper = new Swiper('.swiper', {
                // Swiper options go here
                effect: 'slide',
                slidesPerView: dsk_slideShow,
                spaceBetween: 5,
                speed: carousel_transition,
                centeredSlides: carousel_center,
                freeMode: carousel_smooth_scroll,
                loop: carousel_infinite_loop == 'yes' ? carousel_infinite_loop = true : carousel_infinite_loop = false,
                autoplay: carousel_autoplay == 'yes' ? autoplay_options : '',
                navigation: carousel_arrows == 'yes' ? navigation_options : '',
                pagination: carousel_dot == 'yes' ? pagination_options : '',
                breakpoints: {
                    320: {
                      slidesPerView: slidesToShow_mobile,
                      spaceBetween: 5
                    },
                    640: {
                        slidesPerView: slidesToShow_medium,
                        spaceBetween: 5
                    },
                    1024: {
                        slidesPerView: dsk_slideShow,
                        spaceBetween: 5
                    }
                  },
            });
        });
    });

})(jQuery);