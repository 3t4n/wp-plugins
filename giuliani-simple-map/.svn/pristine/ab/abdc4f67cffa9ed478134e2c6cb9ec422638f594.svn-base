(function($) {

	'use strict';

	$(window).load(function() {
		$('form').submit(function(ev, ui) {

			var editor = $(this).find('#gswpgmap_infow_html');

			editor.val(editor.val().replace(/\n/g, "<br />"));
		});
	});

})(jQuery);

function copyText(element, msg_cnt) {

	var range, selection, worked, msg_cnt = document.getElementById(msg_cnt);

	if (document.body.createTextRange) {
		range = document.body.createTextRange();
		range.moveToElementText(element);
		range.select();
	} else if (window.getSelection) {
		selection = window.getSelection();
		range = document.createRange();
		range.selectNodeContents(element);
		selection.removeAllRanges();
		selection.addRange(range);
	}

	try {
		document.execCommand('copy');
		msg_cnt.innerHTML = 'Copied';
	} catch (err) {
		msg_cnt.innerHTML = 'Copied';
	}
};