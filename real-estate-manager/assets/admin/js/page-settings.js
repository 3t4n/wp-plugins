jQuery(document).ready(function($) {
    var icons = {
        header: "dashicons dashicons-plus",
        activeHeader: "dashicons dashicons-minus"
    }

    $( ".panels-wrap" ).accordion({
        header: "> div > .panel-heading",
        collapsible: true,
        heightStyle: 'content',
        icons: icons,
    });

	$('#rem-settings-form').submit(function(event) {
		event.preventDefault();
        $('.wcp-progress').show();
		var data = $(this).serialize();

		$.post(ajaxurl, data, function(resp) {
			$('.wcp-progress').html(resp);
            window.location.reload();
		});
	});
});