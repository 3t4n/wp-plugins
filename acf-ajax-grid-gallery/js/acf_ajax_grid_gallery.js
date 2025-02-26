(function( $ ){
    function aa_grid_gallery_lightbox(settings){
        var lightbox = $('.aa-grid-gallery-lightbox');
        var defaults = {
            name: lightbox,
            spinner: 'double-bounce',
        };
        var options = $.extend(defaults,settings);
        var spinner_loader = options['spinner'];
        var venoOptions = {
            titleattr: 'data-title',
            numeratio: true,
            spinner: spinner_loader,
        };
        var venoBox = options['name'];
        venoBox.venobox(venoOptions);
    }
    $(document).ready(function(){

        // infinite scroll dynamic
        $('.aa-grid-gallery').each(function(){
            var tis_gal = $(this);
            var maincontent = tis_gal.find('.aa-grid-gallery-row');
            var viewMoreButton = tis_gal.find('.aa-grid-gallery-viewmore');

            // lightbox
            var lightBox = $('.aa-grid-gallery-lightbox');
            var venoBox = tis_gal.find(lightBox);
            var loadspinner = tis_gal.attr('data-loadspinner');
            aa_grid_gallery_lightbox({
                name: venoBox,
                spinner: loadspinner,
            });

            viewMoreButton.each(function(){

                $(this).on( 'click', function() {

                    var dataindex = $(this).attr('data-index');
                    
                    var $grid_container = maincontent.infiniteScroll({
                        // options
                        path: '.aa-grid-gallery-pagination .next.page-numbers, .aa-grid-gallery-pagination .page-link',
                        append: '.' + dataindex + ' .aa-grid-gallery-list',
                        history: false,
                        loadOnScroll: false,
                        hideNav: '.' + dataindex + ' .aa-grid-gallery-pagination .next.page-numbers, .aa-grid-gallery-pagination .page-link',
                        button: '.' + dataindex + ' .aa-grid-gallery-viewmore',
                        status: '.' + dataindex + ' .aa-grid-gallery-load-status',
                        // debug: true,
                    });

                    $grid_container.on( 'append.infiniteScroll', function( event, response, path, items ) {
                        // re-enable lightBox after loadmore
                        var relightBox = $(this).find($('.aa-grid-gallery-lightbox'));
                        aa_grid_gallery_lightbox({
                            name: relightBox,
                            spinner: loadspinner,
                        });
                    });

                    // load next page
                    $grid_container.infiniteScroll('loadNextPage');

                });

            });
        }); 
    });
})( jQuery );