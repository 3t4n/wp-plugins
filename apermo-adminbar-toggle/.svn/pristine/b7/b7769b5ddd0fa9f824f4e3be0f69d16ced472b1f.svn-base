jQuery(document).ready(function ($) {
    function adminbar_toggle() {
        $('#wpadminbar').fadeToggle(200,function () {
            $('body').toggleClass('admin-bar');
            if ( $('body').hasClass('admin-bar') ) {
                $('html').addClass('six').css('margin-top', '');
            } else {
                $('html').attr('style', function(i,s) { return (s||'') + ' margin-top: inherit !important;' });
            }
        });
    }

    $(document).on('keydown', function ( e ) {
		if ( ! ( e.altKey && e.shiftKey ) ) {
			return;
		}

        switch ( e.which ) {
            case 65: //a
                adminbar_toggle();
                break;
        }
    });
});