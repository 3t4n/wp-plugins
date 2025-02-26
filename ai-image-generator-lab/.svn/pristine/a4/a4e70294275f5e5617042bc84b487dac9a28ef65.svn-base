/*!  This file in this program is included in minified and unminified versions, both located in the same directory.  Access unminified version by replacing the .min.js extension with .js  */

jQuery(document).ready(function($) {
	
// Admin Page Tabs
var wpz_admin__navigate = function () {
    jQuery('#wpz-ai-image-lab-settings-tabs-content > div, #wpz-ai-image-lab-settings-tabs > li').removeClass('wpz-ai-image-lab-settings-active');
    jQuery('#wpz-ai-image-lab-settings-' + location.hash.substr(1)).addClass('wpz-ai-image-lab-settings-active');
    jQuery('#wpz-ai-image-lab-settings-tabs > li:has(a[href="' + location.hash + '"])').addClass('wpz-ai-image-lab-settings-active');
};

if (location.hash) {
    wpz_admin__navigate();
}
jQuery(window).on('hashchange', wpz_admin__navigate);


	$('#wpz-ai-images-video-overlay > a').on('click', function() {
		var $container = $(this).parent().parent().empty();
		$('<iframe>')
			.attr({
				src: 'https://www.youtube.com/embed/MIHLiVYAYMI',
				allowfullscreen: true
			})
			.width($container.width())
			.height($container.width() * (9/16))
			.appendTo($container);
		return false;
	});
});