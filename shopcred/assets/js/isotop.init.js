(function ($) {
    $(document).ready(function (e) {

        // Init block loaded via AJAX
        $(document.body).on('post-load', function (e) {
            spc_init_isotop();
        });

        var spc_init_isotop = () => {

            $('.spc-woo-product-wrapper').each(function (index) {
                var $container = $(this).find('.spc-woo-product-items');
                var $isotop_active = $container.hasClass('spc-filter-active');
                var carouselNav = $container.attr('id');

                if ($container.hasClass('spc-filter-active')) {
                    var filterableItem = '#' + $(this).attr('id');
                    $container.isotope({
                        filter: '*',
                        animationOptions: {
                            queue: true
                        }
                    });

                    $(filterableItem + ' .spc-filterable-menu li').click(function () {
                        $(filterableItem + ' .spc-filterable-menu li.current').removeClass('current');
                        $(this).addClass('current');

                        var selector = $(this).attr('data-filter');
                        $container.isotope({
                            filter: selector,
                            layoutMode: 'masonry',
                            getSortData: {
                                name: '.name',
                                symbol: '.symbol',
                                number: '.number parseInt',
                                category: '[data-category]',
                                weight: function (itemElem) {
                                    var weight = $(itemElem).find('.weight').text();
                                    return parseFloat(weight.replace(/[\(\)]/g, ''));
                                }
                            },
                            animationOptions: {
                                queue: true
                            },
                            masonry: {
                                columnWidth: 1
                            }
                        });
                        return false;
                    });
                    $container.imagesLoaded().progress(function () {
                        $container.isotope('layout');
                    });
                }

            });
        };

        spc_init_isotop();
    });

})(jQuery);