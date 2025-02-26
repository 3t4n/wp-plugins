/**
 * jQuery plugin for an accordion
 */
/* define $ as jQuery just in case */
(function ($) {
	/* toggle / accordion events - my custom plugin */
	$.fn.accordion = function (options) {
		/* set the default options */
		var settings = $.extend({
			animation: false,
			speed: 200,
			multiple: false
		}, options);

		/* set vars */
		var accordion = this;
		var groups = accordion.find('.group');
		var boxes = accordion.find('.box');
		var controls = accordion.find('.control');
		var active_controls = controls.find('.current');
		var active_control = active_controls.first().length > 0 ? active_controls.first() : accordion.find('.control:eq(0)');

		/* hide the accordion and close all the boxes */
		accordion.hide();
		boxes.hide();

		/* on page load - show the accordion */
		$(window).load(function () {
			/* hide the collapse icon, unless the group is marked open, then hide the expander icon */
			$.each(groups, function (i, group) {
				if ($(groups[i]).hasClass('open')) {
					$(groups[i]).find('.expand').hide();
					$(groups[i]).find('.box').show();
				} else {
					$(groups[i]).find('.collapse').hide();
					$(groups[i]).find('.box').hide();
				}
			});

			/* show the accordion when everything is loaded */
			accordion.show();
		});

		/* accordion control click action */
		accordion.on('click', '.control', function (e) {
			var parent_el = $(this).closest('.group');
			var target = parent_el.find('.box');
			if (parent_el.hasClass('open')) {
				/* hide all the collapse icons if multiple settings is set to false (only one box open at a time) */
				if (settings.multiple == false) {
					groups.find('.collapse').hide();
				}

				/* if open, collapse it */
				parent_el.removeClass('open');
				parent_el.find('.collapse').hide(); /* hide the collapse icon */
				parent_el.find('.expand').show(); /* show the expand icon */

				/* if animation is set to true, animate; otherwise show / hide instantly instead */
				if (settings.animation == true) {
					target.slideUp(settings.speed);
				} else {
					target.hide();
				}
			} else /* otherwise, expand it */ {
				/* hide all the collapse icons if multiple settings is set to false (only one box open at a time) */
				if (settings.multiple == false) {
					/* close all boxes and hide collapse icons / show all expand icons - before expanding this control / box */
					groups.removeClass('open');
					groups.find('.collapse').hide();
					groups.find('.expand').show();

					/* if animation is set to true, animate; otherwise show / hide instantly instead */
					if (settings.animation == true) {
						boxes.slideUp(settings.speed);
					} else {
						boxes.hide();
					}
				}

				/* open this box */
				parent_el.addClass('open');
				parent_el.find('.expand').hide(); /* hide the expand icon */
				parent_el.find('.collapse').show(); /* show the collapse icon */

				/* if animation is set to true, animate; otherwise show / hide instantly instead */
				if (settings.animation == true) {
					target.slideDown(settings.speed);
				} else {
					target.show();
				}
			}
			e.preventDefault();
		});
	}
})(jQuery);
