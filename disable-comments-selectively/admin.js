jQuery(document).ready(function($) {

	// link the select options to the relevant checkbox
	jQuery('[type=checkbox]', jQuery('#dcbt')).on('change', function(e) {
		var all_terms = jQuery(this).parent().nextAll('select').first().children();

		if (jQuery(this).is(':checked')) {
			all_terms.prop('selected', 'selected');
		} else {
			all_terms.prop('selected', false);
		}

		e.stopPropagation();
	});

	// and do the reverse, link the checkbox to the select options
	jQuery('select', jQuery('#dcbt')).on('change', function(e) {
		var count = jQuery(':selected', this).length;
		var total = jQuery('option', this).length;
		var tax_checkbox = jQuery('[type=checkbox]', jQuery(this).prevAll('label').first());

		if (count == total) {
			tax_checkbox.prop('checked', 'checked');
		} else {
			tax_checkbox.prop('checked', false);
		}

		e.stopPropagation();
	});

});