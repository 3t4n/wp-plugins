jQuery( function($) {


	/*
	 * Show / hide the Networks selector
	 *
	 */
	$(document).on( 'click', '#spab-user-fields-select-networks', function(e) {
		e.preventDefault();
		$('#spab-networks-selector-wrapper').stop().slideToggle();
	});


	/*
	 * Check and uncheck Networks Selector checkboxes on click
	 *
	 */
	$(document).on( 'click', '#spab-networks-selector .spab-network', function() {
		$this = $(this);
		$checkbox = $this.children('.spab-network-checkbox');

		if( $this.attr('data-checked') )
			$this.removeAttr('data-checked');
		else
			$this.attr('data-checked', 'true');
	});


	/*
	 * Add and remove user social profile network field from the edit screen
	 * of the user
	 *
	 */
	$(document).on( 'click', '#spab-networks-selector-footer .button-primary', function(e) {
		e.preventDefault();

		$('#spab-networks-selector .spab-network').each( function() {
			$this = $(this);

			// Add the network row to the table
			if( $this.attr('data-checked') ) {

				var html 		  = '';
				var network 	  = $this.attr('data-network');
				var network_name  = $this.attr('data-network-name');
				var network_desc  = $this.attr('data-network-description');
				var alreadyInList = false;

				// Check to see if the field table row is already in the table
				$('#spab-user-fields tr').each( function() {
					if( $(this).hasClass('spab-social-profile-' + network) )
						alreadyInList = true;
				});

				// Return if the network row is already in the table
				if( alreadyInList )
					return alreadyInList;

				// Append the html of the table row to the table
				html += '<tr class="spab-social-profile-field-wrapper spab-social-profile-' + network + '">';
					html += '<th>';
						html += '<span class="spab-sort-handle"></span>';
						html += '<label for="spab_profile_' + network + '">' + network_name + '</label>';
					html += '</th>';

					html += '<td>';
						html += '<input type="text" name="spab_social_profiles[' + network + ']" id="spab_profile_' + network + '" value="" class="regular-text" />';

						if( network_desc != '' )
							html += '<br /><span class="description">' + network_desc + '</span>';
					html += '</td>';

				html += '</tr>';

				$('#spab-user-fields tbody').append( html );

			// Remove the network row from the table
			} else
				$('#spab-user-fields tr.spab-social-profile-' + $this.attr('data-network')).remove();

		});

		// Close the Network Selector
		$('#spab-networks-selector-wrapper').stop().slideUp();

	});


	/*
	 * Show / hide the sorting icon for the fields
	 *
	 */
	$(document).on( 'click', '#spab-user-fields-sort-networks', function(e) {
		e.preventDefault();
		$(this).blur();
		$('#spab-user-fields tr').toggleClass('spab-sortable');
	});

	/*
	 * Fire-up sortable
	 *
	 */
	$('#spab-user-fields').sortable({
		items  : 'tr',
		handle : '.spab-sort-handle'
	});

});