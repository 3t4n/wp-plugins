(function () {
	window.tinymce.PluginManager.add('alignjustify', function (editor) {
		function onAlignButtonClick(event, command) {
			const $button = jQuery(event.target).closest('.mce-btn');
			if ($button.hasClass('mce-active')) {
				$button.removeClass('mce-active');
				editor.execCommand('justifynone');
			}
			else {
				editor.execCommand(command);
				jQuery('.dpit-mce-active').removeClass('mce-active');
				$button.addClass('mce-active dpit-mce-active');
			}
		}
		editor.addButton('alignjustify', {
			title: 'Align Justify',
			icon: 'alignjustify',
			onclick: function (event) {
				onAlignButtonClick(event, 'justifyfull');
			}
		});
		editor.addButton('alignleft', {
			onclick: function (event) {
				onAlignButtonClick(event, 'justifyleft');
			}
		});
		editor.addButton('alignright', {
			onclick: function (event) {
				onAlignButtonClick(event, 'justifyright');
			}
		});
		editor.addButton('aligncenter', {
			onclick: function (event) {
				onAlignButtonClick(event, 'justifycenter');
			}
		});
	});
})();
