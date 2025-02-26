wp_faq = {
	init : function() {
		jQuery('ol.faq .answer').hide();
		jQuery('ol.faq h3').click(function() {
			wp_faq.toggle(this)
		});
	},
	toggle : function(elt) {
		jQuery(elt).toggleClass('active');
		jQuery(elt).siblings('.answer').slideToggle('normal');
	}
}
jQuery(function() {
	wp_faq.init();
	jQuery('ol.faq li').removeClass('alt');
});
