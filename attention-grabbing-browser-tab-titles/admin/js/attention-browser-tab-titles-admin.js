jQuery(document).ready(function($) {

	 function AbttToggleFields() {
		var isEnabled = $('#attention_browser-settings-page #attention_browser_enable_feature').is(':checked');
		if (isEnabled) {
			$('#attention_browser-settings-page .dependent-fields').removeClass('hide-only-field');
		} else {
			$('#attention_browser-settings-page .dependent-fields').addClass('hide-only-field');
		}
	}

	// Run the function on page load and whenever the checkbox changes
	AbttToggleFields();

	$('#attention_browser-settings-page #attention_browser_enable_feature').on('change', function() {
		AbttToggleFields();
	});

	$('#attention_browser-settings-page #add-title-text').on('click', function() {
		$('#title-texts-container').append('<div class="title-text-field"><input type="text" name="attention_browser_title_texts[]" value="" /><button type="button" class="button remove-title-text">Remove</button></div>');
	});

	$(document).on('click', '#attention_browser-settings-page .remove-title-text', function() {
		$(this).parent().remove();
	});
});