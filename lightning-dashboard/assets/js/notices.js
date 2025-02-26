// Move any WordPress notices to notices container (this includes any add-on version incompatability notices)

jQuery(window).load( function() {
	jQuery( '.notice:not(.ldash-notice)' ).appendTo('#ldash-notices').show();
});