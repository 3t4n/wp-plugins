jQuery(document).ready( function($) {
	jQuery('.if-js-closed').removeClass('if-js-closed').addClass('closed');
	if (typeof(postboxes) != 'undefined') {
		postboxes.add_postbox_toggles('xBGCG'); //wp2.7+
	} else {
		add_postbox_toggles('xBGCG'); //wp2.6-
	}
});  
