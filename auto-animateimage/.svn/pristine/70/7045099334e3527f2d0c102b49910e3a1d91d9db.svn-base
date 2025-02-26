/*
 * JavaScript for Auto AnimateImage
 * Copyright (C) 2012 attosoft <http://attosoft.info/en/>
 * This file is distributed under the same license as the Auto AnimateImage package.
 * attosoft <contact@attosoft.info>, 2012.
 */

jQuery(function($) {
	postboxes.add_postbox_toggles(pagenow);

	$(".colorpicker").each(function() {
		var text = $(this).prevAll(".colortext");
		var preview = $(this).prevAll(".colorpreview");
		var fb = $.farbtastic(this);
		if (text.val()[0] == '#') fb.setColor(text.val()); // color in hex
		preview.css("backgroundColor", text.val());
		fb.linkTo(function(color) {
			text.val(color);
			preview.css("backgroundColor", color);
		});
	});
	$(".pickcolor").click(function() { $(this).nextAll(".colorpicker").show(); return false; });
	$(document).mousedown(function() { $(".colorpicker:visible").hide(); });

	if ($.isFunction($().slider)) {
		$(".opacity-slider").each(function() {
			var text = $(this).prevAll("input[type='number']");
			$(this).slider({
				max: 1,
				step: 0.05,
				value: text.val(),
				slide: function(event, ui) { text.val(ui.value); },
				change: function(event, ui) { text.val(ui.value); }
			});
		});
		$(".opacity-trans").click(function() { $(this).next(".opacity-slider").slider("value", 0); });
		$(".opacity-opaque").click(function() { $(this).prev(".opacity-slider").slider("value", 1); });
	}

	$(".media-uploader").each(function() {
		var text = $(this).prevAll("input:text");
		$(this).click(function() {
			formfield = text.attr('name');
			tb_show(this.value, 'media-upload.php?type=image&post_id=' + post_id + '&TB_iframe');
			window.send_to_editor = function(html) {
				imgurl = $('img', html).attr('src') || $(html).attr('src'); // type/library or type_url
				text.val(imgurl);
				tb_remove();
			}
			return false;
		});
	});
});

function onRepeatChange(input) {
	document.form[input.name][1].checked = input.value == '-1';
}
