/*!  This file in this program is included in minified and unminified versions, both located in the same directory.  Access unminified version by replacing the .min.js extension with .js  */
window.jQuery(document).ready(function($) {
	if (window.pagenow === 'upload') {
		var $titleAction = $('#wpbody .page-title-action');
		if ($titleAction.length) {
			$('<a>')
				.addClass('wpz-ai-images-page-title-action button-secondary')
				.text('Generate Image with AI')
				.attr('href', '#')
				.on('click', function() {
					$(this).prev('.page-title-action').trigger('click');
					$('#wpbody .wpz-ai-images-show').trigger('click');
					return false;
				})
				.insertAfter($titleAction);
		}
	}
});