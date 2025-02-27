(function($) {

    var GS_Book_Showcase = function( $scope, $ ) {
        var $logoWidget = $scope.find('.gs_book_showcase_area');
        if ( ! $logoWidget.length ) return;
        $(document).trigger( 'gsbooks:scripts:reprocess' );
    }

    $(window).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/gs-book-showcase.default', GS_Book_Showcase );
    });

})(jQuery);