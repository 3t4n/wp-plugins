function daisycon_select_all(el) {

	if (typeof window.getSelection != "undefined" && typeof document.createRange != "undefined") {
		var range = document.createRange();
		range.selectNodeContents(el);
		var sel = window.getSelection();
		sel.removeAllRanges();
		sel.addRange(range);
	} else if (typeof document.selection != "undefined" && typeof document.body.createTextRange != "undefined") {
		var textRange = document.body.createTextRange();
		textRange.moveToElementText(el);
		textRange.select();
	}
}

function daisycon_load_select(element, data, output_id, output_name, selected) {

	let output = [];
	let id     = '';
	let name   = '';

	selected = selected ? selected.toString().split(',') : [];

	$('.dc_box select[name="' + element + '"] option').remove();

	$.each(data, function(index, value) {

		output = Object.values(value);
		id     = (null !== output[output_id] ? output[output_id].toString() : '');
		name   = output[output_name];

		$('.dc_box select[name="' + element + '"]').append('<option value="' + id + '"' + (true === selected.includes(id) || selected === id ? 'selected="selected"' : '') + '>' + name + '</option>');
	});
}

function daisycon_load_input(element, data, key, selected) {

	let value = data[key];
	value     = (selected ? selected : value);
	element   = $('.dc_box input[name="' + element + '"]');

	if ('number' === element.attr('type')) {

		value = Math.round(value);
	}

	element.val(value);
}

function processData(settings) {

	let _dataType     = settings.dataType ? settings.dataType : 'json';
	let _promiseCache = {};
	let _url          = settings.url;
	let _query        = settings.query ?? [];

	if (undefined === _url) {

		throw new Error('Missing "url" in processData');

		return false;
	}

	let hash = JSON.stringify(
		{
			url   : _url,
			query : _query,
		}
	);

	if (!_promiseCache[hash]) {

		_promiseCache[hash] = $.ajax(
			{
				data     : _query,
				dataType : _dataType,
				url      : _url,
			}
		);

		_promiseCache[hash].fail(function() {

			delete _promiseCache[hash];
		});
	}

	return _promiseCache[hash];
}

$(function() {

	$('.dc_box').on('click', 'input[name="reset_color"]', function() {

		var element = $(this).siblings('input[type="color"]');

		$(element).val(element.data('default'));
	});
});
