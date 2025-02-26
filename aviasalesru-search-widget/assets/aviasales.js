jQuery.fn.aviasales_form = function() {
	
	var form			= jQuery(this),
		select			= form.find('.aviasales_select select'),
		checkbox		= form.find('.aviasales_checkbox input[type="checkbox"]'),
		swap			= form.find('.aviasales_swap');
	
	select.change(function () {
		var s = jQuery(this);
		s.parent().find('span').text(s.find('option:selected').text());
	});

	checkbox.change(function () {
		jQuery(this).parent().toggleClass('checked');
	});

	swap.click(function () {

		var origin = { value : jQuery('#origin_name').val(), 'iata' : jQuery('#origin_iata').val() }

		jQuery('#origin_name').val(jQuery('#destination_name').val());
		jQuery('#origin_iata').val(jQuery('#destination_iata').val());
		jQuery('#origin_name').parent().find('.aviasales_selected_iata').text(jQuery('#destination_iata').val());

		jQuery('#destination_name').val(origin.value);
		jQuery('#destination_iata').val(origin.iata);
		jQuery('#destination_name').parent().find('.aviasales_selected_iata').text(origin.iata);

	});

	jQuery('#origin_name').on('autocompleteopen', function(e, ui) {
		jQuery('.ui-autocomplete').css('top', jQuery('#origin_name').offset().top + 45);
	});

	jQuery('#destination_name').on('autocompleteopen', function(e, ui) {
		jQuery('.ui-autocomplete').css('top', jQuery('#destination_name').offset().top + 45);
	});

	form.submit(function () {
		jQuery('#oneway').val(jQuery('#oneway').attr('checked') ? 'true' : 'false');
	});

}

jQuery(document).ready(function() {
	
	ASmin.inline_form.init({
		autocomplete_class		: "aviasales_minified_autocomplete",
		action					: jQuery('#aviasales_search').attr('action'),
		form_id					: "#aviasales_search",
		marker					: jQuery('#marker').val(),
		fields_id				: {},
		params_attributes		: {}
	});

	jQuery('.aviasales_widget').aviasales_form();
	
});