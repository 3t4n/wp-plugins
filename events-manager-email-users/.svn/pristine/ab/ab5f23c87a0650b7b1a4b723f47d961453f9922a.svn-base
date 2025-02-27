jQuery.noConflict();
jQuery(document).ready(function($){

// Email Form.
if( $('#email_form_metabox').length > 0 ) {
	$('#recipients_list').attr('required', true);

	// Attendees not enabled.
	if( $('#select_recipients').length == 0 ) {
		if( EMU.allow_double_bookings == 0 ) {
			$('#recipients_list').html('<a href="mailto:' + EMU.contact_emails +'" title="'+ EMU.email_title +'">' + EMU.contact_emails + '</a>');
			$('label[for="recipients"]').html( EMU.contact_count );
			$('#all_recipients').val(EMU.contact_emails);
		} else {
			// Set inital state.
			if( $('#email_filter').is(':checked') ) {
				$('#recipients_list').html('<a href="mailto:' + EMU.contact_unique +'" title="'+ EMU.email_title +'">' + EMU.contact_unique + '</a>');
				$('label[for="recipients"]').html( EMU.contact_unique_count );
				$('#filtered').html( EMU.filter_double_yes );
				$('#all_recipients').val(EMU.contact_unique);
			} else {
				$('#recipients_list').html('<a href="mailto:' + EMU.contact_emails +'" title="'+ EMU.email_title +'">' + EMU.contact_emails + '</a>');
				$('label[for="recipients"]').html( EMU.contact_count );
				$('#filtered').html( EMU.filter_double_no );
				$('#all_recipients').val(EMU.contact_emails);
			}
		}
	}
	else {
		// React to DropDown changes.
		$('.email-filter').hide();

		// Pageload.
		switch( $('#select_recipients option:selected').index() ) {
			case 1:
				// Booking Contacts
				$('#limitations').html(EMU.explain_bookings);
				$('.email-filter').show();
				// Maybe show filtered booking emails.
				if( $('#email_filter').is(':checked') ) {
					$('#recipients_list').html( '<a href="mailto:' + EMU.contact_unique +'" title="'+ EMU.email_title +'">' + EMU.contact_unique + '</a>' );
					$('#filtered').html( EMU.filter_double_yes );
					$('label[for="recipients"]').html( EMU.contact_unique_count );
					$('#all_recipients').val(EMU.contact_unique);
				} else {
					$('#recipients_list').html( '<a href="mailto:' + EMU.contact_emails +'" title="'+ EMU.email_title +'">' + EMU.contact_emails + '</a>' );
					$('#filtered').html( EMU.filter_double_no );
					$('label[for="recipients"]').html( EMU.contact_count );
					$('#all_recipients').val(EMU.contact_emails);
				}
			break;
			case 2:
				// Attendees
				$('#limitations').html( EMU.explain_attendees );
				$('#email_filter').attr('checked', false);
				$('.email-form-email-filter').hide();
				$('#recipients_list').html( '<a href="mailto:' + EMU.attendee_emails +'" title="'+ EMU.email_title +'">' + EMU.attendee_emails + '</a>' );
				$('label[for="recipients"]').html( EMU.attendee_count );
				$('#all_recipients').val(EMU.attendee_emails);
			break;
			case 3:
				// Both
				$('#limitations').html( EMU.explain_both );
				$('.email-form-email-filter').hide();
				$('#recipients_list').html( '<a href="mailto:' + EMU.both_emails +'" title="'+ EMU.email_title +'">' + EMU.both_emails + '</a>' );
				$('label[for="recipients"]').html( EMU.both_count );
				$('#all_recipients').val(EMU.both_emails);
			break;
		}

		// OnChange.
		$('#select_recipients').on('change', function() {
			switch( $('#select_recipients option:selected').index() ) {
				case 1:
					// Booking Contacts
					$('#limitations').html(EMU.explain_bookings);
					$('.email-form-email-filter').show();
					// Maybe show filtered booking emails.
					if( $('#email_filter').is(':checked') ) {
						$('#recipients_list').html( '<a href="mailto:' + EMU.contact_unique +'" title="'+ EMU.email_title +'">' + EMU.contact_unique + '</a>' );
						$('#filtered').html( EMU.filter_double_yes );
						$('label[for="recipients"]').html( EMU.contact_unique_count );
$('#all_recipients').val(EMU.contact_unique);
					} else {
						$('#recipients_list').html( '<a href="mailto:' + EMU.contact_emails +'" title="'+ EMU.email_title +'">' + EMU.contact_emails + '</a>' );
						$('#filtered').html( EMU.filter_double_no );
						$('label[for="recipients"]').html( EMU.contact_count );
						$('#all_recipients').val(EMU.contact_emails);
					}
				break;
				case 2:
					// Attendees
					$('#limitations').html( EMU.explain_attendees );
					$('.email-form-email-filter').hide();
					$('#recipients_list').html( '<a href="mailto:' + EMU.attendee_emails +'" title="'+ EMU.email_title +'">' + EMU.attendee_emails + '</a>' );
					$('label[for="recipients"]').html( EMU.attendee_count );
					$('#all_recipients').val(EMU.attendee_emails);
				break;
				case 3:
					// Both
					$('#limitations').html( EMU.explain_both );
					$('.email-form-email-filter').hide();
					$('#recipients_list').html( '<a href="mailto:' + EMU.both_emails +'" title="'+ EMU.email_title +'">' + EMU.both_emails + '</a>' );
					$('label[for="recipients"]').html( EMU.both_count );
					$('#all_recipients').val(EMU.both_emails);
				break;
			}
		});
	}

	// Enable filter toggle for booking_emails.
	$('#email_filter').on('click', function() {
		if( $('#email_filter').is(':checked') ) {
			$('#recipients_list').html( '<a href="mailto:' + EMU.contact_unique +'" title="'+ EMU.email_title +'">' + EMU.contact_unique + '</a>' );
			$('#filtered').html( EMU.filter_double_yes );
			$('label[for="recipients"]').html( EMU.contact_unique_count );
			$('#all_recipients').val(EMU.contact_unique);
		} else {
			$('#recipients_list').html( '<a href="mailto:' + EMU.contact_emails +'" title="'+ EMU.email_title +'">' + EMU.contact_emails + '</a>' );
			$('#filtered').html( EMU.filter_double_no );
			$('label[for="recipients"]').html( EMU.contact_count );
			$('#all_recipients').val(EMU.contact_emails);
		}
	});

} // End Email Form


// Options Page.
// Settings Section.
	// On Page Load.
	var toggle_SMTP = $('#general_method option:selected');
	var rows_SMTP 	= $('[class^="general-smtp"]');
	var inputs_SMTP = rows_SMTP.find(':input');

	if( toggle_SMTP.index() == 2 ) {
		rows_SMTP.show();
		inputs_SMTP.attr('required', true);
	} else {
		rows_SMTP.hide();
		inputs_SMTP.attr('required', false);
	}
	$('#general_method').on('change', function() {
		rows_SMTP.toggle(500);
		inputs_SMTP.attr('required', ($('#general_method option:selected').index() != 2 ? false : true) );
	});

// Manual Section.
if( $('#manual').length > 0 ) {
	//Filter Double Bookings
	if( $('#manual_email_filter_no').is(':checked') ) {
		$('#filtered').html( EMU.filter_double_no );
	} else {
		$('#filtered').html( EMU.filter_double_yes );
	}

	// On Change.
	$('[name="em_email_users[manual][email_filter]"]').click( function() {
		if( $('#manual_email_filter_no').is(':checked') ) {
			$('#filtered').html( EMU.filter_double_no );
		} else {
			$('#filtered').html( EMU.filter_double_yes );
		}
	});

	if( EMU.attendees_enabled != 1 ) {
		$('.manual-select-recipients').remove();
	} else {
		selected = $('#manual_select_recipients option:selected').index();
		switch(selected) {
			case 1: $('#manual_limitations').html( EMU.explain_bookings ); break;
			case 2: $('#manual_limitations').html( EMU.explain_attendees ); break;
			case 3: $('#manual_limitations').html( EMU.explain_both ); break;
		}
	}
	if( $('#manual_select_recipients').length > 0 ) {
		$('#manual_select_recipients').on('change', function() {
			selected = $('#manual_select_recipients option:selected').index();
			switch(selected) {
				case 1: $('#manual_limitations').html( EMU.explain_bookings ); break;
				case 2: $('#manual_limitations').html( EMU.explain_attendees ); break;
				case 3: $('#manual_limitations').html( EMU.explain_both ); break;
			}
		});
	}
} // End Manual Section.

});
(jQuery);
