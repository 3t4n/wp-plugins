(function( $ ) {
	'use strict';

	/**
	 * All of the code for your sdk-facing JavaScript source
	 * should reside in this file.
	 */

	$('.hto-button-allow, .hto-button-skip').on('click', function (e) {
        e.preventDefault();
        
        $.ajax({
            url: HTO_SDK_V1.ajax_url,
            type: 'POST',
            data: {
                action: 'hto_sdk_v1_insights',
                button_val: $(this).attr('value'),
                nonce: HTO_SDK_V1.nonce
            },
            success(response) {
                console.log(response);
                if (response.status === 'success') {
                    location.reload();
                } else {
                    alert(response.message);
                }
            }
        });
    });

	$(document).on('click', '.hto-global-notice .notice-dismiss', function () {
        $.ajax({
            url: HTO_SDK_V1.ajax_url,
            type: 'POST',
            data: {
                action: 'hto_sdk_v1_dismiss_notice',
                nonce: HTO_SDK_V1.nonce
            }
        });
    });

})( jQuery );
