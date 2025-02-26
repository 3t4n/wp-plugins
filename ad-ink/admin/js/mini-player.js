(function ($) {
    'use strict';

    $(function () {
		$('#ad-ink-admin [mini-player] [mini-player-position]').click(function () {
			var val = $(this).attr('mini-player-position');
			$("#ad-ink-admin [mini-player] [mini-player-position]").removeClass("active");
			$("#ad-ink-admin [mini-player] [mini-player-position=" + val + "]").addClass("active");
			$("#ad-ink-admin [mini-player] [mini-player-input]").val(val);
		});
    });
})(jQuery);