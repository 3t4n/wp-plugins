(function( $ ) {
	'use strict';

	$(function() {
		var pageTitle = $("title").text();
		$(window).blur(function() {
				$("title").delay(browser_tab_title_params.delay).queue(function() {
					$("title").text(browser_tab_title_params.new_title);
					$(this).clearQueue();
				});
		});
		$(window).focus(function() {
			$("title").text(pageTitle);
		});
	});

})( jQuery );
