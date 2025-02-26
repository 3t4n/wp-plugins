jQuery(function ($) {
	var _data = window.embed_extended_admin || {};

	var $enable = $('select[name=embed_extended_url_patterns_mode]');
	$enable.on('change', function () {
		var label = this.value === 'include' ? _data.text_included : _data.text_excluded;
		$('#embed-extended-url-patterns-description').find('span').html(label);
	});
	$enable.triggerHandler('change');

	var $parseHtml = $('input[name=embed_extended_parse_html_content]');
	$parseHtml.on('change', function () {
		var $fields = $('#default_embed_config');
		this.checked ? $fields.show() : $fields.hide();
	});
	$parseHtml.triggerHandler('change');
});
