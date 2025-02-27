////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Checkbox Selection functions for Listing
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Usual DOM Listing structure:
 	<div class="oper_listing_container oper_selectable_table oper_NAME_listing_container">
		<div class="oper_listing_usual_row oper_list_header oper_selectable_head">
			<div class="oper_listing_col oper_col_id check-column"><div class="content_text"><input type="checkbox" /></div></div>
			<div class="oper_listing_col oper_col_labels"><div class="content_text"><?php 	echo esc_js( __( 'Actions', 'email-reminders' ) ); ?></div></div>
			<div class="oper_listing_col oper_col_data"><div class="content_text"><?php 	echo esc_js( __( 'Data', 'email-reminders' ) ); ?></div></div>
		</div>
		<div id="row_id_{{{data.rules_id}}}" class="oper_listing_usual_row oper_list_row oper_row">
			<div class="oper_listing_col oper_col_id check-column"><div class="content_text"><input type="checkbox" /></div></div>
			<div class="oper_listing_col oper_col_labels">
				<div class="content_text"><span class="oper_label"><?php _e('Email', 'email-reminders'); ?>: {{{data['rule']['email_template']}}}</span></div>
			</div>
			...
 	</div>
 */

/**
 * Selections of several  checkboxes like in gMail with shift :)
 * Need to  have this structure:
 * .oper_selectable_table
 *      .oper_selectable_head
 *              .check-column
 *                  :checkbox
 *      .oper_selectable_body
 *          .oper_row
 *              .check-column
 *                  :checkbox
 *      .oper_selectable_foot
 *              .check-column
 *                  :checkbox
 */
function oper_define_gmail_checkbox_selection( $ ){

	var checks, first, last, checked, sliced, lastClicked = false;

	// Check all checkboxes
	$('.oper_selectable_body').find('.check-column').find(':checkbox').on( 'click', function(e) {
	//$('.oper_selectable_body').children().children('.check-column').find(':checkbox').on( 'click', function(e) {
		if ( 'undefined' == e.shiftKey ) { return true; }
		if ( e.shiftKey ) {
			if ( !lastClicked ) { return true; }
			//checks = $( lastClicked ).closest( 'form' ).find( ':checkbox' ).filter( ':visible:enabled' );
						checks = $( lastClicked ).closest( '.oper_selectable_body' ).find( ':checkbox' ).filter( ':visible:enabled' );
			first = checks.index( lastClicked );
			last = checks.index( this );
			checked = $(this).prop('checked');
			if ( 0 < first && 0 < last && first != last ) {
				sliced = ( last > first ) ? checks.slice( first, last ) : checks.slice( last, first );
				sliced.prop( 'checked', function() {
					if ( $(this).closest('.oper_row').is(':visible') )
						return checked;

					return false;
				} ).trigger( 'change' );
			}
		}
		lastClicked = this;

		// toggle "check all" checkboxes
		var unchecked = $(this).closest('.oper_selectable_body').find(':checkbox').filter(':visible:enabled').not(':checked');
		$(this).closest('.oper_selectable_table').children('.oper_selectable_head, .oper_selectable_foot').find(':checkbox').prop('checked', function() {
			return ( 0 === unchecked.length );
		}).trigger( 'change' );

		return true;
	});

	// Head || Foot clicking to  select / deselect ALL
	$('.oper_selectable_head, .oper_selectable_foot').find('.check-column :checkbox').on( 'click', function( event ) {
		var $this = $(this),
			$table = $this.closest( '.oper_selectable_table' ),
			controlChecked = $this.prop('checked'),
			toggle = event.shiftKey || $this.data('wp-toggle');

		$table.children( '.oper_selectable_body' ).filter(':visible')
						.find('.check-column').find(':checkbox')
			//.children().children('.check-column').find(':checkbox')
			.prop('checked', function() {
				if ( $(this).is(':hidden,:disabled') ) {
					return false;
				}

				if ( toggle ) {
					return ! $(this).prop( 'checked' );
				} else if ( controlChecked ) {
					return true;
				}

				return false;
			}).trigger( 'change' );

		$table.children('.oper_selectable_head,  .oper_selectable_foot').filter(':visible')
						.find('.check-column').find(':checkbox')
			//.children().children('.check-column').find(':checkbox')
			.prop('checked', function() {
				if ( toggle ) {
					return false;
				} else if ( controlChecked ) {
					return true;
				}

				return false;
			});
	});


	// Visually  show selected border
	$( '.oper_selectable_body' ).find( '.check-column :checkbox' ).on( 'change', function ( event ){
		if ( jQuery( this ).is( ':checked' ) ){
			jQuery( this ).closest( '.oper_list_row' ).addClass( 'row_selected_color' );
		} else {
			jQuery( this ).closest( '.oper_list_row' ).removeClass( 'row_selected_color' );
		}
		// Disable text selection while pressing 'shift'
		document.getSelection().removeAllRanges();
	} );

}

/**
 * Get ID of row,  based on clciked element
 *
 * @param this_inbound_element  - ususlly  this
 * @returns {number}
 */
function oper_get_row_id_from_element( this_inbound_element ){

	var element_id = jQuery( this_inbound_element ).closest('.oper_listing_usual_row').attr('id');

	element_id = parseInt( element_id.replace( 'row_id_', '' ) );

	return element_id;
}

/**
 * Get ID array  of selected elements
 */
function oper_get_selected_row_id(){

	$table = jQuery( '.oper_listing_container.oper_selectable_table');

	var checkboxes = $table.children( '.oper_selectable_body' ).filter( ':visible' ).find( '.check-column' ).find( ':checkbox' );

	var selected_id = [];
	jQuery.each( checkboxes, function( key, checkbox ) {

		if ( jQuery( checkbox ).is( ':checked' ) ) {
  			var element_id = oper_get_row_id_from_element( checkbox );	//   jQuery( checkbox ).closest('.oper_listing_usual_row').attr('id');

			// element_id = parseInt( element_id.replace( 'row_id_', '' ) );

  			selected_id.push(element_id);
		}

	});

//console.log( 'oper_get_selected_row_id', selected_id );

	return selected_id;

	// _.each( json_items_arr, function ( p_val, p_key, p_data ){
	//
	// });
}