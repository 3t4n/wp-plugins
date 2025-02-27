//Use Strict Mode
(function ($) {
    "use strict";

    //Begin - Window Load
    $(window).load(function () {



    	//Project Filter
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


    });

    //End - Use Strict mode
})(jQuery);