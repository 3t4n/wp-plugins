"use strict";
jQuery(document).ready(function(){
	jQuery(document).on('click', '.afsw-notice-dismis .notice-dismiss', function(){
		jQuery.sendFormAfsw({
			data: {mod: 'overview', action: 'dismissNotice', 'slug': jQuery(this).closest('.afsw-notice-dismis').attr('data-disslug')}
		});
	});
});