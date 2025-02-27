let c2c_hsch = {};

( function( context ) {

	/* Props to https://stackoverflow.com/a/30810322 for copy-to-clipboard code. */
	context.fallback_copy_text_to_clipboard = function( text ) {
		let textArea = document.createElement( 'textarea' );
		textArea.value = text;
		document.body.appendChild( textArea );
		textArea.focus();
		textArea.select();

		document.execCommand( 'copy' );

		document.body.removeChild(textArea);
	};

	/* Props to https://stackoverflow.com/a/30810322 for copy-to-clipboard code. */
	context.copy_text_to_clipboard = function( text ) {
		if ( ! navigator.clipboard ) {
			context.fallback_copy_text_to_clipboard( text );
			return;
		}
		navigator.clipboard.writeText( text )
	}

	context.do_insert = function( encoded_text, text ) {
		// Insert into editor if checkbox is checked.
		if ( jQuery( 'input[name="c2c_hsch_send_to_editor"]' ).is( ':checked' ) ) {
			send_to_editor( encoded_text );
		}

		// Copy to clipboard if checkbox is checked.
		if ( jQuery( 'input[name="c2c_hsch_copy_to_clipboard"]' ).is( ':checked' ) ) {
			let text_for_clipboard = '';
			if ( jQuery( '.mce-tinymce' ).is(':visible') ) {
				text_for_clipboard = text;
			} else {
				text_for_clipboard = encoded_text;
			}
			context.copy_text_to_clipboard( text_for_clipboard );
		}

		return;
	}

})( c2c_hsch );

jQuery(function($) {
	$('.htmlspecialcharacter_helplink').click(function() {
		$('#htmlhelperhelp').toggle(); return false;
	});
	$('.htmlspecialcharacter_morelink').click(function() {
		$('#commoncodes, #morehtmlspecialcharacters, #htmlhelper_more, #htmlhelper_less').toggle(); return false;
	});
});
