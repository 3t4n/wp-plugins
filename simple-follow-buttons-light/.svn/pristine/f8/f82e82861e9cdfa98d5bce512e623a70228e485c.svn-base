jQuery(document).ready(function() {

	// switch for checkboxes
	jQuery(".sfbl-admin-wrap input:checkbox").bootstrapSwitch({
		onColor: 	'primary',
		size:		'normal'
	});

	jQuery('.sfbl-updated').fadeIn('fast');
	jQuery('.sfbl-updated').delay(1000).fadeOut('slow');

	//------- INCLUDE LIST ----------//

	// add drag and sort functions to include table
	jQuery(function() {
		jQuery( "#sfblsort1, #sfblsort2" ).sortable({
			connectWith: ".sfblSortable"
		}).disableSelection();
	  });


	// extract and add include list to hidden field
	jQuery('#selected_buttons').val(jQuery('#sfblsort2 li').map(function() {
	// For each <li> in the list, return its inner text and let .map()
	//  build an array of those values.
	return jQuery(this).attr('id');
	}).get());

	// after a change, extract and add include list to hidden field
	jQuery('.ssbp-wrap').mouseout(function() {
		jQuery('#selected_buttons').val(jQuery('#sfblsort2 li').map(function() {
		// For each <li> in the list, return its inner text and let .map()
		//  build an array of those values.
		return jQuery(this).attr('id');
		}).get());
	});

	//---------------------------------------------------------------------------------------//
    //
    // SFBL ADMIN FORM
    //
    jQuery( "#sfbl-admin-form:not('.sfbl-form-non-ajax')" ).on( 'submit', function(e) {

        // don't submit the form
        e.preventDefault();

        // show spinner to show save in progress
        jQuery("button.sfbl-btn-save").html('<i class="fa fa-spinner fa-spin"></i>');

        // get posted data and serialise
        var sfblData = jQuery("#sfbl-admin-form").serialize();

        // disable all inputs
        jQuery(':input').prop('disabled', true);
		jQuery(".sfbl-admin-wrap input:checkbox").bootstrapSwitch('disabled', true);


        jQuery.post(
            jQuery( this ).prop( 'action' ),
            {
                sfblData: sfblData
            },
            function() {

				// show success
                jQuery('button.sfbl-btn-save-success').fadeIn(100).delay(2500).fadeOut(200);

	            // re-enable inputs and reset save button
	            jQuery(':input').prop('disabled', false);
				jQuery(".sfbl-admin-wrap input:checkbox").bootstrapSwitch('disabled', false);
                jQuery("button.sfbl-btn-save").html('<i class="fa fa-floppy-o"></i>');
            }
        ); // end post
    } ); // end form submit

});
