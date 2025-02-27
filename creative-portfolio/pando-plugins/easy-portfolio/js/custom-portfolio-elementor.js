//Use Strict Mode
(function ($) {
    "use strict";

    var $container = $('.pgflio-portfolio-content');
    var $grid = $('.pgflio-portfolio-content').isotope({
        itemSelector: '.portfolio-item-wrapper'
    });

    function startPugfolio(){
        var $container = $('.pgflio-portfolio-content');
        var $grid = $('.pgflio-portfolio-content').isotope({
            itemSelector: '.portfolio-item-wrapper'
        });

        $('.pgflio-portfolio-filter').on('click', 'button', function () {   
            $('.pgflio-portfolio-filter button').removeClass('item-active');
            $(this).addClass('item-active');
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });

        //Lightbox
        $('.pgflio-portfolio-lightbox').simpleLightbox({
            captions: true,
        });     
    }

    //Begin - Window Load
    $(window).load(function () {    
        setTimeout(startPugfolio, 800);   
    });

    $(document).on('mouseup', function(){
       setTimeout(startPugfolio, 1200);   
    });

    //End - Use Strict mode
})(jQuery);