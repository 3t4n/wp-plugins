(function ($) {
	$(function() {
		// Global custom redirect URL field Hide/Show
		// $( 'select#wbnb_redirect_location' ).on( 'change', function() {
		// 	if ( 'custom' === $( this ).val() ) {
		// 		$( this ).closest('tr').next( 'tr' ).show();
		// 	} else {
		// 		$( this ).closest('tr').next( 'tr' ).hide();
		// 	}
		// }).trigger( 'change' );

		// // Product level custom redirect URL field Hide/Show
		// $( 'select#buy_now_redirect_location' ).on( 'change', function() {
		// 	if ( 'custom' === $( this ).val() ) {
		// 		$( this ).closest('p').next( 'p' ).show();
		// 	} else {
		// 		$( this ).closest('p').next( 'p' ).hide();
		// 	}
		// }).trigger( 'change' );

		// Pro option's style implement
		if ( $('.woo-variation-price-display-form-table tr, #woo-variation-price-display-pro-options').hasClass('is-pro') ) {
			$('.woo-variation-price-display-form-table tr.is-pro input, .woo-variation-price-display-form-table tr.is-pro select').prop('disabled', true).after('<a href="//wpxpress.net/products/woocommerce-variation-price-display/" target="_blank" class="upgrade-to-pro" style="display: inline-block; color: #f65858; font-size: 11px; text-decoration: none; margin-left: 10px; font-weight: 600;">UPGRADE TO PRO &#8594;</a>');
			$('#woo-variation-price-display-pro-options p.form-field input, #woo-variation-price-display-pro-options p.form-field select').prop('disabled', true);
			$('#woo-variation-price-display-pro-options p.form-field').prop('disabled', true).append('<a href="//wpxpress.net/products/woocommerce-variation-price-display/" target="_blank" class="upgrade-to-pro" style="display: inline-block; color: #f65858; font-size: 11px; text-decoration: none; margin-left: 10px; font-weight: 600;">UPGRADE TO PRO &#8594;</a>');
			// $('.woo-variation-price-display-form-table tr.is-pro > th').append('<span class="pro-option-badge" style="background: #f65858; color: #fff; display: inline-block; font-size: 10px; padding: 3px 6px; border-radius: 3px; margin-left: 5px;">PRO</span>');
		}

		// Price before after text Pro option
		$('#wclp_enable_price_text_on.is_pro').on('select2:opening select2:closing', function() {
		    var $options = $(this).find('option');

		    $options.map(function(i, option) {
		    	if ( 'variable' !== $(option).val() ) {
		    		$(option).prop('disabled', true).append(' -> UPGRADE TO PRO');
		    	}
		    });
		});
	});
})(jQuery);