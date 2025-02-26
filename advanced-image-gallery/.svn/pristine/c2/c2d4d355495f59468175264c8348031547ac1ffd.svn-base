function initializeAdvancedImageSlideshow($scope, $) {
    const $swiperContainer = $scope.find('.zlfms-slideshow');

    if (!$swiperContainer.length) return;

    // Parse and log all the relevant settings
    const settings = {
        spaceBetween: parseInt($swiperContainer.data('space-between'), 10) || 30,
        slidesPerView: parseInt($swiperContainer.data('slides-per-view'), 10) || 3,
        slidesPerViewLaptop: parseInt($swiperContainer.data('slides-per-view-laptop'), 10) || 3,
        slidesPerViewTablet: parseInt($swiperContainer.data('slides-per-view-tablet'), 10) || 2,
        slidesPerViewMobile: parseInt($swiperContainer.data('slides-per-view-mobile'), 10) || 1,
        slidesPerScroll: parseInt($swiperContainer.data('slides-per-scroll'), 10) || 1,
        navigationEnabled: $swiperContainer.data('navigation') === true || $swiperContainer.data('navigation') === 'true',
        autoplayEnabled: String($swiperContainer.data('autoplay')).toLowerCase() === 'true',
        scrollSpeed: parseInt($swiperContainer.data('scroll-speed'), 10) || 5000,
        centeredSlides: $swiperContainer.attr('data-centermode') === 'true',
        pauseOnHover: $swiperContainer.data('pause-on-hover') === 'yes',
        pauseOnInteraction: $swiperContainer.data('pause-on-interaction') === 'yes',
        transitionSpeed: parseInt($swiperContainer.data('speed'), 10) || 500,
        infiniteScrollEnabled: $swiperContainer.data('infinite-scroll') === 'yes',
    };

    // Initialize the thumbs swiper
    const galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: settings.spaceBetween,
        centeredSlides: settings.centeredSlides,
        slidesPerView: settings.slidesPerView,
        slidesPerGroup: settings.slidesPerScroll,
        loop: settings.infiniteScrollEnabled,
        loopedSlides: 10,
        watchOverflow: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        slideToClickedSlide: true,
        breakpoints: {
            0: {
                slidesPerView: settings.slidesPerViewMobile,
            },
            768: {
                slidesPerView: settings.slidesPerViewTablet,
            },
            1024: {
                slidesPerView: settings.slidesPerViewLaptop,
            },
            1366: {
                slidesPerView: settings.slidesPerView,
            }
        },
        keyboard: {
            enabled: true,
        }
    });

    // Initialize the main gallery swiper with autoplay
    const galleryTop = new Swiper('.gallery-top', {
        spaceBetween: settings.spaceBetween,
        slidesPerView: 1,
        slidesPerGroup: settings.slidesPerScroll,
        centeredSlides: settings.centeredSlides,
        autoplay: settings.autoplayEnabled ? {
            delay: settings.scrollSpeed,
            disableOnInteraction: settings.pauseOnInteraction,
        } : false,
        loop: settings.infiniteScrollEnabled,
        loopedSlides: 10,
        speed: settings.transitionSpeed,
        navigation: settings.navigationEnabled ? {
            nextEl: $swiperContainer.find('.swiper-button-next').get(0),
            prevEl: $swiperContainer.find('.swiper-button-prev').get(0),
        } : false,
    });

    // Pause autoplay on hover if enabled
    if (settings.autoplayEnabled && settings.pauseOnHover) {
        $swiperContainer.on('mouseover', function () {
            galleryTop.autoplay.stop();
        });
        $swiperContainer.on('mouseout', function () {
            galleryTop.autoplay.start();
        });
    }

    // Sync controllers
    galleryTop.controller.control = galleryThumbs;
    galleryThumbs.controller.control = galleryTop;
}

// Run the code under Elementor when the widget is loaded
jQuery(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/advanced_image_gallery.default', initializeAdvancedImageSlideshow);
});
