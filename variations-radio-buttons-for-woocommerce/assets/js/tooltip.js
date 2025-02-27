jQuery(window).on('load', function() {
	jQuery('.variations .value label[title!=""][title]').each(function() {
		var target = jQuery(this);
		var my = target.data('my') ? target.data('my') : 'center bottom+10';
		var at = target.data('at') ? target.data('at') : 'center top';
		var attribute = target.data('attribute') ? target.data('attribute') : '';

		target.tooltip({
			tooltipClass: attribute,
			position: {
				my: my,
				at: at,
				using: function(position, feedback)
				{
					jQuery(this).css(position);
	
					jQuery('<div>')
						.addClass('arrow ' + attribute)
						.addClass(feedback.vertical)
						.addClass(feedback.horizontal)
						.appendTo(this);
				}
			}
		});
	});
});
