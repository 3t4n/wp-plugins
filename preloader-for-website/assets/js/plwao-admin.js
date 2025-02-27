(function( $ ) {

	/* Initialize color box */
	if( $('.plwao-color-box').length > 0 ) {
		$('.plwao-color-box').wpColorPicker();
	}

	/* Show/Hide JS */
	$( document ).on( 'change', '.plwao-show-hide', function() {

		var prefix		= $(this).attr('data-prefix');
		var inp_type	= $(this).attr('type');
		var showlabel	= $(this).attr('data-label');

		if(typeof(showlabel) == 'undefined' || showlabel == '' ) {
			showlabel = $(this).val();
		}

		if( prefix ) {
			showlabel = prefix +'-'+ showlabel;
			$('.plwao-show-hide-row-'+prefix).hide();
			$('.plwao-show-for-all-'+prefix).show();
		} else {
			$('.plwao-show-hide-row').hide();
			$('.plwao-show-for-all').show();
		}

		$('.plwao-show-if-'+showlabel).hide();
		$('.plwao-hide-if-'+showlabel).hide();

		if( inp_type == 'checkbox' || inp_type == 'radio' ) {
			if( $(this).is(":checked") ) {
				$('.plwao-show-if-'+showlabel).show();
			} else {
				$('.plwao-hide-if-'+showlabel).show();
			}
		} else {
			$('.plwao-show-if-'+showlabel).show();
		}
	});

	/* On click of spinner design */
	$( document ).on( 'click', '.plwao-spinner-class', function() {

		var cur_obj = $(this);

		$('.plwao-spinner-class').removeClass('plwao-active');
		$(cur_obj).addClass('plwao-active');
	});

	/* Reset Settings Button */
	$( document ).on( 'click', '.plwao-reset-sett', function() {
		var ans;
		ans = confirm(PlwaoAdmin.reset_msg);

		if(ans) {
			return true;
		} else {
			return false;
		}
	});
})(jQuery);