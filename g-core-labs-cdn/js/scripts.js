/**
 * Scripts
 *
 * @package GCORE
 */

jQuery(
	function () {
		jQuery( "#gcore_enable_cdn" ).change(
			function () {
				if (this.checked) {
					jQuery( '.g-d' ).prop( 'disabled', false );
					jQuery( 'a.g-d' ).each(
						function (index) {
							temp_v = jQuery( this ).data( 'href' );
							jQuery( this ).prop( 'href', temp_v ).css( 'opacity', '1' );
						}
					);
				} else {
					jQuery( '.g-d' ).prop( 'disabled', true );
					jQuery( 'a.g-d' ).prop( 'href', "#" ).css( 'opacity', '0.3' );
				}
			}
		);
		if (jQuery( ".advanced-show" ).length) {
			t = jQuery( '.advanced-show' ).data( 't' );
			show_advanced( t );
		}
	}
);

function show_advanced(t) {
	nonce    = jQuery( '#gcore-wpnonce' ).val();
	var data = {
		action: 'gcore_advance_param_show',
		t: t,
		n: nonce
	};
	jQuery.post(
		ajaxurl,
		data,
		function (response) {
			jQuery( '.advanced-show' ).html( response );
		}
	);
}

jQuery( '.g-c' ).bind(
	"change",
	function () {
		t     = jQuery( this ).data( 't' );
		o     = jQuery( this ).data( 'o' );
		nonce = jQuery( '#gcore-wpnonce' ).val();

		if (t == 'checkbox') {
			if (jQuery( this ).is( ':checked' )) {
				v = 1;
			} else {
				v = 0;
			}
			if (o == 'gcore_folder_advanced' || o == 'gcore_type_advanced') {
				if (v == 1) {
					jQuery( '.list-ch' ).prop( 'disabled', true ).prop( 'checked', false );
					jQuery( '.list-advanced' ).show();
				} else {
					jQuery( '.list-ch' ).prop( 'disabled', false );
					jQuery( '.list-advanced' ).hide();
				}
			}
		} else {
			v = jQuery( this ).val();
		}
		var data = {
			action: 'gcore_save',
			v: v,
			o: o,
			t: t,
			n: nonce
		};
		console.log( 'data', data );
		jQuery.post(
			ajaxurl,
			data,
			function (response) {
				msg( 'save' );
			}
		);
	}
);

jQuery( '.advanced-show' ).on(
	'click',
	'input.g-add',
	function () {
		t     = jQuery( this ).data( 'type' );
		v     = jQuery( '.new-' + t ).val();
		nonce = jQuery( '#gcore-wpnonce' ).val();
		if (v != '') {
			var data = {
				action: 'gcore_advance_param_add',
				v: v,
				t: t,
				n: nonce
			};
			jQuery.post(
				ajaxurl,
				data,
				function (response) {
					if (response == 1) {
						msg( 'add' );
						show_advanced( t )
					}
				}
			);
		}
	}
);

function msg(t) {
	if (t == "save") {
		jQuery.amaran( {"message":gcoreAmaranMsgSaved} );
	}
	if (t == "del") {
		jQuery.amaran( {"message":gcoreAmaranMsgDeleted} );
	}
	if (t == "add") {
		jQuery.amaran( {"message":gcoreAmaranMsgAdded} );
	}
}

jQuery( '.advanced-show' ).on(
	'click',
	'button.g-delete',
	function () {
		t     = jQuery( this ).data( 'type' );
		v     = jQuery( this ).data( 'e' );
		nonce = jQuery( '#gcore-wpnonce' ).val();

		if (v != '') {
			var data = {
				action: 'gcore_advance_param_del',
				t: t,
				v: v,
				n:nonce
			};
			jQuery.post(
				ajaxurl,
				data,
				function (response) {
					if (response == 1) {
						msg( 'del' );
						show_advanced( t )
					}
				}
			);
		}
	}
);
