(function( $ ) {
	'use strict';

	$(window).load(function() {
		$("#ds-searchbox-form").submit(function(event) {
			var query = $("#ds-searchbox").val();
			var res = query.match(/[a-zăîâșț \-]+/i);

			if (res != query) {
				event.preventDefault();
				$("#ds-error-message-wrapper").css("visibility", "visible");
			}
		});

		$("#ds-searchbox").change(function() {
			$("#ds-error-message-wrapper").css("visibility", "hidden");
		});
	});
})( jQuery );

