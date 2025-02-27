jQuery('document.body').ready(($) => {
	generate_awb();
	cancel_awb();
	print_label();
})

function print_label() {
	jQuery('.print-awb-label').on('click', function(e) {

		if( jQuery(this).attr('href') === '' ) {
			e.preventDefault();
			var shipmentID = jQuery(this).data('shipment-id');
			var orderId = jQuery(this).data('order-id');
			var $button = jQuery(this);

			// Add a spinner and disable the button
			$button.prop('disabled', true).html('Generating...');

			// Perform the AJAX request
			jQuery.ajax({
				type: 'POST',
				url: admin_custom_vars.ajaxurl,
				data:{
					action: 'print_label',
					admin_custom_nonce: admin_custom_vars.nonce,
					shipemnt_id: shipmentID,
					order_id: orderId,
				},

				success: function(response) {
					window.location.href = response.data.file_url;
					$button.prop('disabled', false).html('Cetak Label');
				},
				error: function(error) {
						alert('Error Print_label'); // Display error message
						$button.prop('disabled', false).html('<span class="spinner"></span> Generating Label...');
				},
			})
		}
	})
}

function cancel_awb() {
	// Show the modal when the "Cancel AWB" button is clicked
	jQuery('.cancel-label').on('click', function(e) {
		e.preventDefault();
		jQuery('#awb-cancel-modal').fadeIn();
	});

	// Close the modal when clicking "Close" or outside the modal content
	jQuery('#close-popup').on('click', function() {
		jQuery('#awb-cancel-modal').fadeOut();
	});

	// Confirm cancelation with selected reason
	jQuery('#confirm-cancel').on('click', function() {
		var reason = jQuery('#cancel-reason').val();
		var awbNumber = jQuery('.cancel-label').data('awb-number');

		// Perform AJAX request to cancel AWB with reason
		jQuery.ajax({
			type: 'POST',
			url: admin_custom_vars.ajaxurl,
			data: {
					action: 'cancel_awb',
					reason: reason,
					awb_number: awbNumber,
					admin_custom_nonce: admin_custom_vars.nonce
			},
			success: function(response) {
				alert('AWB Canceled');
				location.reload(true);
				$('#awb-cancel-modal').fadeOut();
			},
			error: function() {
				alert('Error canceling AWB');
				$('#awb-cancel-modal').fadeOut();
			}
		});
	})

}

function generate_awb() {
	jQuery('.generate-awb').on('click', function(e) {
		e.preventDefault();

		var $button = jQuery(this);
		var orderId = jQuery(this).data('order-id');

		// Add a spinner and disable the button
		$button.prop('disabled', true).html('<span class="spinner"></span> Generating AWB...');

		// Perform the AJAX request
		jQuery.ajax({
			type: 'POST',
			url: admin_custom_vars.ajaxurl,
			data:{
				action: 'generate_awb',
				admin_custom_nonce: admin_custom_vars.nonce,
				order_id: orderId,
			},
			success: function(response) {
				console.log(response); // Display success message (you can update this part)
				location.reload(true);
			},
			error: function(error) {
				alert('Error generating AWB'); // Display error message (you can update this part)
				$button.prop('disabled', false).html('Generate AWB'); // Reset button
			},
		})
	})
}