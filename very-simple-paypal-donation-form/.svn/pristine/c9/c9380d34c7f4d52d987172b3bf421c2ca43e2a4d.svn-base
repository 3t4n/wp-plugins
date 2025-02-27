jQuery( document ).ready(function($) {

	// Special Dropdowns

	$('.dropdown-el').click(function(e) {
		e.preventDefault();
		e.stopPropagation();
		$(this).toggleClass('expanded');
		$('#'+$(e.target).attr('for')).prop('checked',true);
	});

	$(document).click(function() {
		$('.dropdown-el').removeClass('expanded');
	});

	// Donation Form Main Functionality

	$('#vsdf_form').submit(function(e) {
		// this form doesn't submit its own fields
		e.preventDefault();

	    // Modify hidden forms
	    var chosen_type = $('input[name="type"]:checked').val();
	    var amount = get_donation_amount();
		update_pp_form(chosen_type, amount);

		if (!$.isNumeric(amount)) {
			var error = 'Please choose or enter a dollar amount.';
		} else if (amount < 5) {
			var error = 'Please enter an amount that is at least $5.';
		}

		if (!error) {
			$('#errors').hide();
			// Submit the active hidden form
			$('.submitme [type="submit"]').trigger('click');
		} else {
			$('#errors').show().html(error);
		}
	});

});

function get_donation_amount() {
	var amount = jQuery('input[name="radio_amount"]:checked').val();
	if (amount == 0) {
		amount = jQuery('#amount-typed').val();
	}
	return amount;
}

function update_pp_form(chosen_type, amount) {
    jQuery('form').removeClass('submitme');
    if (chosen_type == 'recur') {
	    jQuery('form#recurring').addClass('submitme');
		jQuery('form#recurring [name="a3"]').val(amount);
    } else if (chosen_type == 'once') {
	    jQuery('form#onetime').addClass('submitme');
		jQuery('form#onetime [name="amount"]').val(amount);
	}
}
