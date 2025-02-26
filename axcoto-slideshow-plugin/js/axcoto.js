(function($) {
	$.resizeImg = function() {
		var height = parseInt($(this).height() * 300 / $(this).width());
		$(this).height(height);
		return this.each(function() {
		});
	};
})(jQuery);

function resize(img) {
	jQuery(document).ready(function($) {
		var defaultWidth = 300;
		img.height = img.height * defaultWidth / img.width ;
		img.width = defaultWidth;
	});
}