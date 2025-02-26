function initializeAdvancedImageGallery($scope, $) {
    const $swiperContainer = $scope.find('.zlfms-carousel.swiper-container');

    if (!$swiperContainer.length) return;

    const settings = {
        spaceBetween: parseInt($swiperContainer.data('space-between'), 10) || 30,
        slidesPerView: parseInt($swiperContainer.data('slides-per-view'), 10) || 3,
        slidesPerViewLaptop: parseInt($swiperContainer.data('slides-per-view-laptop'), 10) || 3,
        slidesPerViewTablet: parseInt($swiperContainer.data('slides-per-view-tablet'), 10) || 2,
        slidesPerViewMobile: parseInt($swiperContainer.data('slides-per-view-mobile'), 10) || 1,
        slidesPerScroll: parseInt($swiperContainer.data('slides-per-scroll'), 10) || 1,
        paginationEnabled: $swiperContainer.data('pagination') === true || $swiperContainer.data('pagination') === 'true',
        paginationType: $swiperContainer.data('pagination-type') || 'bullets',
        paginationDynamicBullets: $swiperContainer.data('pagination-dynamic-bullets') === true || $swiperContainer.data('pagination-dynamic-bullets') === 'true',
        navigationEnabled: $swiperContainer.data('navigation') === true || $swiperContainer.data('navigation') === 'true',
        autoplayEnabled: String($swiperContainer.data('autoplay')).toLowerCase() === 'true',
        scrollSpeed: parseInt($swiperContainer.data('scroll-speed'), 10) || 5000,
        pauseOnHover: $swiperContainer.data('pause-on-hover') === 'yes',
        pauseOnInteraction: $swiperContainer.data('pause-on-interaction') === 'yes',
        transitionSpeed: parseInt($swiperContainer.data('speed'), 10) || 500,
        infiniteScrollEnabled: $swiperContainer.data('infinite-scroll') === 'yes',
        offsetSides: $swiperContainer.data('offset-sides') || 'none',
        offsetWidth: parseInt($swiperContainer.data('offset-width'), 10) || 30,
        effect: $swiperContainer.data('effect') === 'yes' ? 'coverflow' : 'slide',
    };

    // Apply offset styles
    if (settings.offsetSides !== 'none') {
        let offsetCSS = '';
        if (settings.offsetSides === 'both' || settings.offsetSides === 'left') offsetCSS += `padding-left: ${settings.offsetWidth}px;`;
        if (settings.offsetSides === 'both' || settings.offsetSides === 'right') offsetCSS += `padding-right: ${settings.offsetWidth}px;`;
        $swiperContainer.css('cssText', offsetCSS);
    }

    // Initialize Swiper with responsive breakpoints
    const swiper = new Swiper($swiperContainer[0], {
        speed: settings.transitionSpeed,
        spaceBetween: settings.spaceBetween,
        slidesPerGroup: settings.slidesPerScroll,
        pagination: settings.paginationEnabled ? {
            el: $swiperContainer.find('.swiper-pagination').get(0),
            clickable: true,
            dynamicBullets: settings.paginationType === 'bullets' && settings.paginationDynamicBullets,
            type: settings.paginationType === 'fraction' ? 'fraction' : (settings.paginationType === 'progressbar' ? 'progressbar' : 'bullets'),
            progressbarOpposite: false,
        } : false,

        navigation: settings.navigationEnabled ? {
            nextEl: $swiperContainer.find('.swiper-button-next').get(0),
            prevEl: $swiperContainer.find('.swiper-button-prev').get(0),
        } : false,
        autoplay: settings.autoplayEnabled ? {
            delay: settings.scrollSpeed,
            disableOnInteraction: settings.pauseOnInteraction,
        } : false,
        loop: settings.infiniteScrollEnabled,
        effect: settings.effect,
        coverflowEffect: settings.effect === 'coverflow' ? {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        } : {},
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

    // Pause autoplay on hover if enabled
    if (settings.autoplayEnabled && settings.pauseOnHover) {
        $swiperContainer.on('mouseover', function () {
            galleryTop.autoplay.stop();
        });
        $swiperContainer.on('mouseout', function () {
            galleryTop.autoplay.start();
        });
    }
}

// Run the code under Elementor when the widget is loaded
jQuery(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/advanced_image_gallery.default', initializeAdvancedImageGallery);
});
