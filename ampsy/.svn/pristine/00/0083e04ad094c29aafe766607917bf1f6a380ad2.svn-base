jQuery('document').ready(function() {
	var url = jQuery('.ampsy-widget:first').data('url');
	
	if (url) {
		var widget_forms = jQuery('.ampsy-widget');
		widget_forms.addClass('loading');

		jQuery.getJSON(url, function(data) {
			if(data.widgets) {
				widget_forms.removeClass('loading');

				var options = '';
				jQuery.each(data.widgets, function(index, widget) {
					options += '<option value="' + widget.id + '">' + widget.title + '</option>';
				});

				var selects = widget_forms.find('select');
				selects.html(options);
				selects.each(function(index) {
					selects.val(jQuery(this).data('value'));
				});

				jQuery(document).on('widget-updated', function(e, widget) {
					var select = widget.find('.ampsy-widget select');
					if (select.length != 0) {
						select.html(options);
						select.val(select.data('value'));
					}
				});

				jQuery(document).on('widget-added', function(e, widget) {
					var select = widget.find('.ampsy-widget select');
					if (select.length != 0) {
						select.html(options);
						select.val(select.data('value'));
					}
				});
			} else {
				widget_forms.addClass('error');
				widget_forms.removeClass('loading');
			}
		});
	}
});
