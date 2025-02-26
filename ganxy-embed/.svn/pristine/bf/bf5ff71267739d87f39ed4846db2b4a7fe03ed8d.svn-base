;(function($) {
	$(document).on( 'click', '.nav-tab-wrapper a', function(e) {
		e.preventDefault();
		$('#ganxy-help-sections section').hide();
		$('.nav-tab').removeClass('nav-tab-active');
		$(this).addClass('nav-tab-active');
		$('#ganxy-help-sections section').eq($(this).index()).show();
		return false;
	})
})( jQuery );