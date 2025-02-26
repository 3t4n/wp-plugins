(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$(document).ready(function() { 
		$('.ajaxify-enable-checkbox [type="submit"]').on('click', function(e) {
			e.preventDefault();
			var form_data = new FormData();
			var commentEnable, commentID;
			
			commentEnable = $('[name="comment_enable"]:checked').val();
			commentID = $('[name="comment_id"]').val();
			if(commentEnable == undefined)
			{
				commentEnable = '';
			}
			form_data.append('commentStatus', commentEnable);
			form_data.append('commentContainer', commentID);
			form_data.append('action', 'comment_status_info');
			jQuery('.admin_comment_save').remove();
			$.ajax({
				type: "POST",
				url: admin_comment_ajax_obj.ajaxurl,
				contentType: false,
				processData: false,
				data: form_data,
				beforeSend: function() {
					jQuery('.admin_comment_save').remove();
					jQuery(".ajaxify-content").addClass('loading');
					$('[type="submit"]').after('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>');
				},
				success:function(data) {
					//console.log(data);
					jQuery('.admin_comment_save').remove();
					jQuery(".ajaxify-content").removeClass('loading');
					$('.lds-ring').remove();
					$('[type="submit"]').after("<p class='admin_comment_save'>Request has been Saved.</p>");
					jQuery('.admin_comment_save').delay(2000).hide(500);
				},
				error: function(errorThrown){
					console.log(errorThrown);
					$('.lds-ring').remove();
				}
			});
		});
	});

})( jQuery );
