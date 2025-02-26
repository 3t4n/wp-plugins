<?php

/**
 * Datatable html file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

// Bulk edit button

if( $tab == 'customers' ) {
	$bulk_edit_button_label = __( 'Bulk Delete', 'lightning-dashboard' );
	$bulk_edit_button_id = 'ldash-bulk-delete';
	$bulk_edit_button_classes = 'ldash-display-none button button-primary button-small';
} else {
	$bulk_edit_button_label = __( 'Bulk Edit', 'lightning-dashboard' );
	$bulk_edit_button_id = 'ldash-bulk-edit';
	$bulk_edit_button_classes = 'thickbox ldash-datatable-button ldash-display-none button button-primary button-small';
}

$bulk_edit_button = '<a name="Bulk Edit" id="' . $bulk_edit_button_id . '" style="display: none;" href="#TB_inline?width=630&height=' . get_option( 'ldash_general_appearance_lightbox_height' ) . '&inlineId=ldash-edit" class="' . $bulk_edit_button_classes . '" data-edit-type="bulk">' . $bulk_edit_button_label . '</a>';

// Initial variable states

$show_table = 0;
$reason = '';

// Decide to show table

if( $tab == 'orders' && $option == 'custom' ) {

	if( isset( $_POST['date_from'] ) && isset( $_POST['date_to'] ) ) {
		
		$show_table = 1;
	
	} else {

		$reason = __( 'Please select a date range from above to view data.', 'lightning-dashboard' );

	}

} else {

	$show_table = 1;

}

// Custom Columns

if( ldash_add_on_active( 'custom-columns' ) ) {
	$custom_columns = apply_filters( 'ldash_add_on_custom_columns_columns', array() );
}

// Show Table

if( $show_table == 1 ) { ?>

	<table id="ldash-datatable-<?php echo $tab; ?>" class="stripe hover row-border">
		<thead>
			<?php if( $tab == 'orders' ) { ?>
				<tr>
					<th><?php _e( 'ID', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'User ID Hidden', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Customer', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Date', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Status', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Total', 'lightning-dashboard' ); ?></th>
					<?php if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) { ?>
						<th><?php _e( 'Invoice', 'lightning-dashboard' ); ?></th>
					<?php }
					if( ldash_add_on_active( 'custom-columns' ) ) {
						echo apply_filters( 'ldash_add_on_custom_columns_column_heading', 'orders' );
					} ?>
					<th><?php _e( 'Edit', 'lightning-dashboard' ); ?></th>
				</tr>
				<tr>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-id', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-user-id-hidden', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-customer', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-date', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_select( 'ldash-filter-status', 'orders_status', __( 'Any', 'lightning-dashboard' ), false, false, false, false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-total', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<?php if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) { ?>
						<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-invoice', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<?php }
					if( ldash_add_on_active( 'custom-columns' ) ) {
						echo apply_filters( 'ldash_add_on_custom_columns_column_filter', 'orders' );
					} ?>
					<th><?php echo $bulk_edit_button; ?></th>
				</tr>
			<?php } elseif( $tab == 'products' ) { ?>
				<tr>
					<th><?php _e( 'ID', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Title', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'SKU', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Type', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Status', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Stock Status', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Stock Level', 'lightning-dashboard' ); ?></th>
					<th><?php echo __( 'Current Price', 'lightning-dashboard' ) . ' (' . get_woocommerce_currency_symbol() . ')'; ?></th>
					<th><?php echo __( 'Sale Price', 'lightning-dashboard' ) . ' (' . get_woocommerce_currency_symbol() . ')'; ?></th>
					<th><?php _e( 'On Sale', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Featured', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Categories', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Categories Hidden', 'lightning-dashboard' ); ?></th>
					<?php if( ldash_add_on_active( 'custom-columns' ) ) {
						echo apply_filters( 'ldash_add_on_custom_columns_column_heading', 'products' );
					} ?>
					<th><?php _e( 'Edit', 'lightning-dashboard' ); ?></th>
				</tr>
				<tr>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-id', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-title', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-sku', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_select( 'ldash-filter-type', 'products_type', __( 'Any', 'lightning-dashboard' ), false, false, false, false ); ?></th>
					<th><?php LDASH_Markup::field_select( 'ldash-filter-status', 'products_status', __( 'Any', 'lightning-dashboard' ), false, false, false, false ); ?></th>
					<th><?php LDASH_Markup::field_select( 'ldash-filter-stock-status', 'products_stock_status', __( 'Any', 'lightning-dashboard' ), false, false, false, false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-stock-level', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-price', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-sale-price', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_select( 'ldash-filter-on-sale', 'no_yes', __( 'Any', 'lightning-dashboard' ), false, false, false, false ); ?></th>
					<th><?php LDASH_Markup::field_select( 'ldash-filter-featured', 'no_yes', __( 'Any', 'lightning-dashboard' ), false, false, false, false ); ?></th>
					<th><?php LDASH_Markup::field_select( 'ldash-filter-categories', 'products_categories', __( 'Any', 'lightning-dashboard' ), false, false, false, false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-categories-hidden', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<?php if( ldash_add_on_active( 'custom-columns' ) ) {
						echo apply_filters( 'ldash_add_on_custom_columns_column_filter', 'products' );
					} ?>
					<th><?php echo $bulk_edit_button; ?></th>
				</tr>
			<?php } elseif( $tab == 'customers' ) { ?>
				<tr>
					<th><?php _e( 'ID', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Name', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Company', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Email', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Phone', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Billing Address', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Shipping Address', 'lightning-dashboard' ); ?></th>
					<?php if( ldash_add_on_active( 'custom-columns' ) ) {
						echo apply_filters( 'ldash_add_on_custom_columns_column_heading', 'customers' );
					} ?>
					<th><?php _e( 'Orders', 'lightning-dashboard' ); ?></th>
					<th><?php _e( 'Edit', 'lightning-dashboard' ); ?></th>
				</tr>
				<tr>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-id', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-name', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-company', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-email', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-phone', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-billing-address', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<th><?php LDASH_Markup::field_input( 'text', 'ldash-filter-shipping-address', '', __( 'Any', 'lightning-dashboard' ), '', false ); ?></th>
					<?php if( ldash_add_on_active( 'custom-columns' ) ) {
						echo apply_filters( 'ldash_add_on_custom_columns_column_filter', 'customers' );
					} ?>
					<th></th>
					<th><?php echo $bulk_edit_button; ?></th>
				</tr>
			<?php } ?>
		</thead>
	</table>

<?php } else {

	echo '<p>' . $reason . '</p>';

} ?>

<script type="text/javascript">
	jQuery(document).ready( function($) {

		// Change classes

		$.fn.dataTable.ext.classes.sPageButton = 'button button-small';
		$.fn.dataTable.ext.classes.sPageButtonActive = 'button-primary';
		$.fn.dataTable.ext.classes.sPageButtonDisabled = 'button-disabled';

		// Errors

		$.fn.dataTable.ext.errMode = 'none'; // Disable normal error mode

		// Do a console log instead

		$( '#ldash-datatable-<?php echo $tab; ?>' ).on( 'error.dt', function( e, settings, techNote, message ) {

			console.log( 'An error has been reported: ', message );

		} );

		// Selected Count/Rows + Bulk Edit Button

		<?php if( $tab == 'products' ) { ?>
			selectedProductTypes = [];
		<?php } ?>

		$('body').on( 'click', '#ldash-datatable-<?php echo $tab; ?> tbody tr, #ldash-datatable-<?php echo $tab; ?> tbody tr .ldash-datatable-button', function() { // also done on the button as without this the bulk edit (x) wouldn't be updated if multiple rows selected and edit button clicked

			selectedCount = table.rows( '.selected' ).count();

			selectedRows = table.rows({
				"page": "all",
				"selected": true
			});

			<?php if( $tab == 'products' ) { ?>

				// Find out the type of products selected

				selectedProductTypes = [];

				selectedRows.every( function() {
					var selectedRowData = this.data();
					selectedProductType = selectedRowData.type.toLowerCase();
					selectedProductTypes[selectedProductType] = selectedProductType;
				});

			<?php } ?>

			// Show/hide bulk edit button

			if( selectedCount > 1 ) {

				$('#<?php echo $bulk_edit_button_id; ?>').show().text( '<?php echo $bulk_edit_button_label; ?> (' + selectedCount + ')' );

			} else {

				$('#<?php echo $bulk_edit_button_id; ?>').hide();

			}

			// Show/hide invoices/packing slips buttons if non selected (this wants moving the rest of stuff to add on)

			<?php if( ldash_add_on_active( 'invoices-packing-slips' ) ) { ?>

				if( selectedCount >= 1 ) {

					$('#ldash-non-initialize-button-invoices').show().text( 'Invoices (' + selectedCount + ')' );
					$('#ldash-non-initialize-button-packing_slips').show().text( 'Packing Slips (' + selectedCount + ')' );

				} else {

					$('#ldash-non-initialize-button-invoices').hide();
					$('#ldash-non-initialize-button-packing_slips').hide();

				}

			<?php } ?>

			selectedIds('string');

		} );

		// Selected Ids

		function selectedIds( type ) {

			var selectedRowData = table.rows('.selected').data();

			if( type == 'string' ) {

				var ids = '';

				$.each( selectedRowData, function( key ) {

					idAsLink = selectedRowData[key]['id'];
					id = $(idAsLink).text();

					if( key == 0 ) {

						ids = id;

					} else {

						ids = ids + ',' + id;

					}

				});

			} else { // array

				var ids = {};

				$.each( selectedRowData, function( key ) {

					idAsLink = selectedRowData[key]['id'];
					id = $(idAsLink).text();
					ids[key] = id;

				});

			}

			// add to options right form so any form submision there has them

			$('.ldash-options-right form #ldash-selected').val(ids);

			// Return ids

			return ids;

		}

		// Delete

		$('body').on( 'click', '#ldash-delete-button, #ldash-bulk-delete', function() {

			event.preventDefault();

			// Confirm dialog

			if( confirm( '<?php _e( 'Are you sure you want to permananetly delete?', 'lightning-dashboard' ); ?>' ) ) {
				
				// Delete the posts
			
				$('#ldash-delete-button').attr( 'disabled', true ); // Disables delete button so not clicked twice (element selector used rather than 'this' so if a bulk delete taking place from customers page if user happens to click edit while rows still deleting the delete and save buttons still disabled, we dont disable the edit row buttons because they are links and thickbox would still work even though disabled anyway - edge case)
				$('#ldash-save-edit-button').attr( 'disabled', true ); // Disables save button so can't immediately attempt save after clicking delete

				ids = selectedIds();

				dataToSend = {
					'action': 'datatable_delete',
					'ids' : ids,
					'type' : '<?php echo $tab; ?>'
				};

				$.ajax({
					type: "POST",
					url: ajaxurl,
					data: dataToSend,
					success:function(data) {
						$('#ldash-datatable-<?php echo $tab; ?>').DataTable().ajax.reload( function( json ) {
							tb_remove();
							$('#ldash-delete-button').attr( 'disabled', false ); // Re-enable delete button - see above why disabled
							$('#ldash-save-edit-button').attr( 'disabled', false ); // Re-enable save button - see above why disabled
							$('#ldash-bulk-delete').attr( 'disabled', false ).hide(); // if it was a bulk delete (e.g. customers page thenr enable and hide ready for next time bulk rows selected)
						}, false );
					},
				});

				$('#<?php echo $bulk_edit_button_id; ?>').hide();

				// Remove the invoice/packing slip buttons as no rows selected anymore

				<?php if( ldash_add_on_active( 'invoices-packing-slips' ) ) { ?>

					$('#ldash-non-initialize-button-invoices').hide();
					$('#ldash-non-initialize-button-packing_slips').hide();

				<?php } ?>

			}

		});

		// Save

		$('body').on('click', '#ldash-save-edit-button', function() {

			event.preventDefault();
			endScript = 0;

			// Required fields validation

			$('#ldash-form-element-validation').find('input, select').each(function(){

				if( $(this).prop('required')){

					if( $(this).val() == '' ) {

						alert('Please fill in all required fields.');
						endScript = 1;

					}	

				}
			});

			if( endScript == 1 ) {
				return;
			}

			// Prepare data for save

			$(this).attr( 'disabled', true );

			var ids = selectedIds();

			<?php if( $tab == 'orders' ) { ?>

				// Order data

				var status = $('#ldash-form-element-status').val();
				var removePersonalData = $('#ldash-form-element-remove-personal-data').val();

				<?php if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) { ?>
					var invoice = $('#ldash-form-element-invoice').val();
				<?php } ?>

				dataToSend = {
					'action': 'datatable_save',
					'tab' : '<?php echo $tab; ?>',
					'ids' : ids,
					'status' : status,
					'remove_personal_data' : removePersonalData,
					<?php if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) { ?>'invoice' : invoice,<?php } ?>
				};

			<?php } elseif( $tab == 'products' ) { ?>

				// Products data

				var title = $('#ldash-form-element-title').val();
				var sku = $('#ldash-form-element-sku').val();
				var regularPrice = $('#ldash-form-element-regular-price').val();
				var salePrice = $('#ldash-form-element-sale-price').val();
				var status = $('#ldash-form-element-status').val();
				var stockLevel = $('#ldash-form-element-stock-level').val();
				var stockLevelNo = $('#ldash-form-element-stock-level-no').val();
				var stockStatus = $('#ldash-form-element-stock-status').val();
				var categories = $('#ldash-form-element-categories').val();
				var featured = $('#ldash-form-element-featured').val();

				dataToSend = {
					'action': 'datatable_save',
					'tab' : '<?php echo $tab; ?>',
					'ids' : ids,
					'title'	: title,
					'sku'	: sku,
					'status' : status,
					'regular_price'	: regularPrice,
					'sale_price'	: salePrice,
					'stock_level' : stockLevel,
					'stock_level_no' : stockLevelNo,
					'stock_status' : stockStatus,
					'categories' : categories,
					'featured' : featured,
				};
			
			<?php } elseif( $tab == 'customers' ) { ?>

				// Customers data
			
				var billingFirstName = $('#ldash-form-element-billing-first-name').val();
				var billingLastName = $('#ldash-form-element-billing-last-name').val();
				var billingCompany = $('#ldash-form-element-billing-company').val();
				var billingEmail = $('#ldash-form-element-billing-email').val();
				var billingPhone = $('#ldash-form-element-billing-phone').val();
				var billingAddressLine1 = $('#ldash-form-element-billing-address-line-1').val();
				var billingAddressLine2 = $('#ldash-form-element-billing-address-line-2').val();
				var billingCity = $('#ldash-form-element-billing-city').val();
				var billingPostcode = $('#ldash-form-element-billing-postcode').val();
				var billingState = $('#ldash-form-element-billing-state').val();
				if( billingState == null ) { var billingState = $('#ldash-form-element-billing-state-text').val(); }
				var billingCountry = $('#ldash-form-element-billing-country').val();

				var shippingFirstName = $('#ldash-form-element-shipping-first-name').val();
				var shippingLastName = $('#ldash-form-element-shipping-last-name').val();
				var shippingCompany = $('#ldash-form-element-shipping-company').val();
				var shippingAddressLine1 = $('#ldash-form-element-shipping-address-1').val();
				var shippingAddressLine2 = $('#ldash-form-element-shipping-address-2').val();
				var shippingCity = $('#ldash-form-element-shipping-city').val();
				var shippingPostcode = $('#ldash-form-element-shipping-postcode').val();
				var shippingState = $('#ldash-form-element-shipping-state').val();
				if( shippingState == null ) { var shippingState = $('#ldash-form-element-shipping-state-text').val(); }
				var shippingCountry = $('#ldash-form-element-shipping-country').val();

				dataToSend = {
					'action': 'datatable_save',
					'tab' : '<?php echo $tab; ?>',
					'ids' : ids,
					'billing_first_name' : billingFirstName,
					'billing_last_name' : billingLastName,
					'billing_company' : billingCompany,
					'billing_email' : billingEmail,
					'billing_phone' : billingPhone,
					'billing_address_line_1' : billingAddressLine1,
					'billing_address_line_2' : billingAddressLine2,
					'billing_city' : billingCity,
					'billing_postcode' : billingPostcode,
					'billing_state' : billingState,
					'billing_country' : billingCountry,
					'shipping_first_name' : shippingFirstName,
					'shipping_last_name' : shippingLastName,
					'shipping_company' : shippingCompany,
					'shipping_address_line_1' : shippingAddressLine1,
					'shipping_address_line_2' : shippingAddressLine2,
					'shipping_city' : shippingCity,
					'shipping_postcode' : shippingPostcode,
					'shipping_state' : shippingState,
					'shipping_country' : shippingCountry,
				};

			<?php } ?>

			// Save

			$.ajax({
				type: "POST",
				url: ajaxurl,
				data: dataToSend,
				success:function(data) {
					$('#ldash-datatable-<?php echo $tab; ?>').DataTable().ajax.reload( function( json ) {
						tb_remove();
						$('#ldash-save-edit-button').attr('disabled', false);
						$('#ldash-bulk-edit').hide();
					}, false );
				},
			}); 

		});

		// Edit

		$('body').on('click', '.ldash-datatable-button', function() {

			// Remove any previous edit notices.

			$('#ldash-form-element-notices').html('');

			if( $(this).attr('id') !== 'ldash-bulk-edit' ) { // stops it picking the last row if clicking the bulk edit button

				// Ensures row gets selected (avoids issues with selecting a row then clicking another rows edit button)
				currentRow = $(this).closest('tr')[0].rowIndex;
				currentRow = currentRow - 2; // - 2 as takes into account the difference in starting number and the top row
				table.row(':eq(' + currentRow + ')', { page: 'current' }).select();

			}

			// Remove old field values

			$('#ldash-edit input').each( function() {

				if( $(this).attr('type') == 'checkbox' ) {

					$(this).prop( 'checked', false );

				} else {

					$(this).val('');

				}

			});

			$('#ldash-edit select option').each( function() {
				
				$(this).attr( 'selected', false );
			
			});

			// Initital variable values

			type = $(this).attr('data-edit-type');

			// Show Hide Stock Level Inputs

			function showHideStockLevelInputs() {

				if( $('#ldash-form-element-stock-status').val() == 'outofstock' ) {

					$('#ldash-form-element-stock-level').val('N/A').attr('disabled', true);
					$('#ldash-form-element-stock-level-no').prop('checked',true).attr('disabled', true);

				} else {

					if( $('#ldash-form-element-stock-level-no').val() == 1 ) {

						$('#ldash-form-element-stock-level').val('N/A').attr('disabled', true);
						$('#ldash-form-element-stock-level-no').prop('checked',true).attr('disabled', false );

					} else {

						if( $('#ldash-form-element-stock-level').val() !== 'N/A' ) {

							useVal = $('#ldash-form-element-stock-level').val();

						} else {

							useVal = 1;

						}

						$('#ldash-form-element-stock-level').val( useVal ).attr('disabled', false);
						$('#ldash-form-element-stock-level-no').prop('checked',false).attr('disabled', false );

					}

				}

			}

			// If a single edit populate the fields

			<?php if( $tab == 'orders' ) { ?>

				if( type == 'single' ) {

					// Status

					status = $(this).attr('data-status');
					$('#ldash-form-element-status').val( status );

					// Invoice

					<?php if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) { ?>

						invoice = $(this).attr('data-invoice');
						$('#ldash-form-element-invoice').val( invoice );

					<?php } ?>

				}

			<?php } elseif( $tab == 'products' ) { ?>

				title = $(this).attr('data-title');
				stockStatus = $(this).attr('data-stock-status');
				sku = $(this).attr('data-sku');
				regularPrice = $(this).attr('data-regular-price');
				salePrice = $(this).attr('data-sale-price');
				status = $(this).attr('data-status');
				stockLevel = $(this).attr('data-stock-level');
				stockLevelNo = $(this).attr('data-stock-level-no');
				stockStatus = $(this).attr('data-stock-status');
				featured = $(this).attr('data-featured');
				categories = $(this).attr('data-categories');
				hiddenCategories = $(this).attr('data-hidden-categories');
				backorders = $(this).attr('data-backorders');

				if( type == 'single' ) {

					// Title

					$( '#ldash-form-element-title' ).attr( 'disabled', false ).val( title );

					if( selectedProductTypes['variation'] == 'variation' ) {

						$( '#ldash-form-element-title' ).attr( 'disabled', true ).val( title );

					}

					// SKU

					$( '#ldash-form-element-sku' ).attr( 'disabled', false ).val( sku );

					// Regular Price
					
					$( '#ldash-form-element-regular-price' ).attr( 'disabled', false ).val( regularPrice );

					if( regularPrice == 'N/A' ) {

						$('#ldash-form-element-regular-price').attr( 'disabled', true );

					}

					// Sale Price
					
					$( '#ldash-form-element-sale-price' ).attr( 'disabled', false ).val( salePrice );

					if( salePrice == 'N/A' ) {

						$('#ldash-form-element-sale-price').attr('disabled', true );

					}

					// Status

					$('#ldash-form-element-status').attr( 'disabled', false );

					$('#ldash-form-element-status option').each( function() {
						$(this).attr( 'selected', false );
					});

					$.each( status.split(','), function( i,e ) {
						$( '#ldash-form-element-status option[value="' + e.trim() + '"]' ).attr( 'selected', true ); // trim removes white space otherwise it wont add
					});

					// Stock Level

					$('#ldash-form-element-stock-level').attr( 'disabled', false ).val( stockLevel );

					if( stockLevel == 'N/A' ) {

						$('#ldash-form-element-stock-level').attr('disabled', true );

					}

					// Stock Level No

					$('#ldash-form-element-stock-level-no').attr( 'disabled', false );

					if( stockLevelNo == 'N/A' ) {

						$('#ldash-form-element-stock-level-no').attr('disabled', true );

					} else {

						if( stockLevelNo == '1' ) {

							$('#ldash-form-element-stock-level-no').prop('checked', true);

						} else {

							$('#ldash-form-element-stock-level-no').prop('checked', false);

						}

					}

					$('#ldash-form-element-stock-level-no').change(function() { // If stock level no checked change the values and toggle stock level field

						if( $(this).is( ":checked" ) ) {

							$(this).val(1);
							$('#ldash-form-element-stock-level').val('N/A').attr('disabled', true);

						} else {

							$(this).val(0);
							$('#ldash-form-element-stock-level').val(1).attr('disabled', false);

						}

					});

					// Stock Status

					$('#ldash-form-element-stock-status').attr( 'disabled', false ).val( stockStatus );

					if( stockStatus == 'N/A' ) {

						$('#ldash-form-element-stock-status').attr('disabled', true );

					}

					// Stock Status Backorder Notice

					if( backorders == 'yes' ) {

						$('#ldash-form-element-stock-status-backorder-status').show().text( '<?php _e( 'Backorders enabled. Disable backorders via the product edit page or select out of stock.', 'lightning-dashboard' ); ?>' );

					} else {

						$('#ldash-form-element-stock-status-backorder-status').show().text( '<?php _e( 'Backorders disabled. Set to on backorder to enable, in addition setting a positive stock level will mark the item in stock and will revert to on backorder once stock depleted.', 'lightning-dashboard' ); ?>' );

					}

					// Featured

					$('#ldash-form-element-featured').attr( 'disabled', false ).val( featured );

					// Categories

					$('#ldash-form-element-categories option').attr( 'disabled', false );

					$('#ldash-form-element-categories option').each( function() {
						$(this).attr( 'selected', false );
					});

					$.each( hiddenCategories.split(','), function( i,e ) {
						$( '#ldash-form-element-categories option[value="' + e.trim() + '"]' ).attr( 'selected', true ); // trim removes white space otherwise it wont add
					});

				} else { // If Bulk

					$( '#ldash-form-element-stock-status-backorder-status' ).hide();

					$( '#ldash-form-element-title' ).attr( 'disabled', true );
					$( '#ldash-form-element-sku' ).attr( 'disabled', true );
					$( '#ldash-form-element-categories option[value=""]' ).attr( 'selected', true );

					if( selectedProductTypes['variation'] == 'variation' ) {

						$('#ldash-form-element-featured').attr( 'disabled', true );
						$('#ldash-form-element-categories').attr( 'disabled', true );

					} else { // else has to be here so if user selects with certain type then changes the selected rows and trys again the old disables are removed if no longer used

						$('#ldash-form-element-featured').attr( 'disabled', false );
						$('#ldash-form-element-categories').attr( 'disabled', false );

					}

					if( selectedProductTypes['external'] == 'external' || selectedProductTypes['grouped'] == 'grouped' ) {

						$('#ldash-form-element-regular-price').attr( 'disabled', true );
						$('#ldash-form-element-sale-price').attr( 'disabled', true );
						$('#ldash-form-element-stock-status').attr( 'disabled', true );
						$('#ldash-form-element-stock-level').attr( 'disabled', true);
						$('#ldash-form-element-stock-level-no').attr( 'disabled', true );

					} else { // else has to be here so if user selects with certain type then changes the selected rows and trys again the old disables are removed if no longer used

						$('#ldash-form-element-regular-price').attr( 'disabled', false );
						$('#ldash-form-element-sale-price').attr( 'disabled', false );
						$('#ldash-form-element-stock-status').attr( 'disabled', false );
						$('#ldash-form-element-stock-level').attr( 'disabled', false);
						$('#ldash-form-element-stock-level-no').attr( 'disabled', false );

					}

					// Display bulk notice

					<?php LDASH_Notices::notice( 'warning', true, '', __( 'Some fields disabled as bulk editing dependent on the combined product types selected.', 'lightning-dashboard' ), 'ldash-form-element-notices', false, false ); ?>

				}

				// If stock status is disabled then no stock applies so we don't do the stock level and stock level no show hides, etc as they'd override the disables

				if( $('#ldash-form-element-stock-status').attr( 'disabled' ) !== 'disabled' ) {

					showHideStockLevelInputs();

					$('#ldash-form-element-stock-status').change(function() {

						showHideStockLevelInputs();

					});

				}

			<?php } elseif( $tab == 'customers' ) { ?>

				if( type == 'single' ) {

					// Billing First name

					firstName = $(this).attr('data-first-name');
					$('#ldash-form-element-billing-first-name').val( firstName );

					// Billing Last name

					lastName = $(this).attr('data-last-name');
					$('#ldash-form-element-billing-last-name').val( lastName );

					// Billing Company

					company = $(this).attr('data-company');
					$('#ldash-form-element-billing-company').val( company );

					// Billing Email

					email = $(this).attr('data-email');
					$('#ldash-form-element-billing-email').val( email );

					// Billing Phone

					phone = $(this).attr('data-phone');
					$('#ldash-form-element-billing-phone' ).val( phone );

					// Billing Address 1

					billingAddress1 = $(this).attr('data-billing-address-1');
					$('#ldash-form-element-billing-address-line-1').val( billingAddress1 );

					// Billing Address 2

					billingAddress2 = $(this).attr('data-billing-address-2');
					$('#ldash-form-element-billing-address-line-2').val( billingAddress2 );

					// Billing City

					billingCity = $(this).attr('data-billing-city');
					$('#ldash-form-element-billing-city').val( billingCity );

					// Billing Postcode

					billingPostcode = $(this).attr('data-billing-postcode');
					$('#ldash-form-element-billing-postcode').val( billingPostcode );

					// Billing State

					billingState = $(this).attr('data-billing-state');

					// Billing Country

					billingCountry = $(this).attr('data-billing-country');

					$('#ldash-form-element-billing-country option').each( function() {
						
						$(this).attr( 'selected', false );

						if( $(this).val() == billingCountry ) {

							$(this).attr( 'selected', true );

						}

					});

					// Billing Country

					updateBillingStateFields( true, billingState, billingCountry );

					$( "#ldash-form-element-billing-country" ).change( function() {

						billingCountry = $(this).val();
						updateBillingStateFields( true, billingState, billingCountry );

					});

					// Shipping First Name

					shippingFirstName = $(this).attr('data-shipping-first-name');
					$('#ldash-form-element-shipping-first-name').val( shippingFirstName );

					// Shipping Last Name

					shippingLastName = $(this).attr('data-shipping-last-name');
					$('#ldash-form-element-shipping-last-name').val( shippingLastName );

					// Shipping Company

					shippingCompany = $(this).attr('data-shipping-company');
					$('#ldash-form-element-shipping-company').val( shippingCompany );

					// Shipping Address 1

					shippingAddress1 = $(this).attr('data-shipping-address-1');
					$('#ldash-form-element-shipping-address-1').val( shippingAddress1 );

					// Shipping Address 2

					shippingAddress2 = $(this).attr('data-shipping-address-2');
					$('#ldash-form-element-shipping-address-2').val( shippingAddress2 );

					// Shipping City

					shippingCity = $(this).attr('data-shipping-city');
					$('#ldash-form-element-shipping-city').val( shippingCity );

					// Shipping Postcode

					shippingPostcode = $(this).attr('data-shipping-postcode');
					$('#ldash-form-element-shipping-postcode').val( shippingPostcode );

					// Shipping State

					shippingState = $(this).attr('data-shipping-state');

					// Shipping Country

					shippingCountry = $(this).attr('data-shipping-country');

					$('#ldash-form-element-shipping-country option').each( function() {
						
						$(this).attr( 'selected', false );

						if( $(this).val() == shippingCountry ) {

							$(this).attr( 'selected', true );

						}

					});

					// Shipping Country

					updateShippingStateFields( true, shippingState, shippingCountry );

					$( "#ldash-form-element-shipping-country" ).change( function() {

						shippingCountry = $(this).val();
						updateShippingStateFields( true, shippingState, shippingCountry );

					});

					// Update Billing State Fields

					function updateBillingStateFields( initialLoad, initialBillingState, billingCountry ) {

						dataToSend = {
							'action': 'billing_state_options',
							'billing_country' : billingCountry,
							'initial_load' : initialLoad,
							'initial_billing_state' : initialBillingState,
						};

						$.ajax({
							type: "POST",
							url: ajaxurl,
							data: dataToSend,
							success:function(data) {

								function decodeEntities( encodedString ) {
									var textArea = document.createElement('textarea');
									textArea.innerHTML = encodedString;
									return textArea.value;
								}

								$('#ldash-form-element-billing-state').hide().val('').attr( 'required', false );
								$('#ldash-form-element-billing-state option').remove(); // Remove every option
								$('#ldash-form-element-billing-state-text').hide().val('').attr( 'required', false );

								data = jQuery.parseJSON( data );

								if( $.isEmptyObject( data.billing_states ) ) {

									if( data.initial_load == 'true' ) {

										$('#ldash-form-element-billing-state-text').val( data.initial_billing_state );

									}

									$('#ldash-form-element-billing-state-text').show().attr( 'required', true );

								} else {

									$('#ldash-form-element-billing-state-text').val('');

									$.each(data.billing_states, function( id, option ) {

										$('#ldash-form-element-billing-state').append( $('<option>', {
											value: id,
											text: decodeEntities(option)
										}));

									});

									if( data.initial_load == 'true' ) {

										$('#ldash-form-element-billing-state option[value=' + data.initial_billing_state + ']').attr( 'selected', true );

									}

									$('#ldash-form-element-billing-state').show().attr( 'required', true );

								}

							},

						});

					}

					// Update Shipping State Fields

					function updateShippingStateFields( initialLoad, initialShippingState, shippingCountry ) {

						dataToSend = {
							'action': 'shipping_state_options',
							'shipping_country' : shippingCountry,
							'initial_load' : initialLoad,
							'initial_shipping_state' : initialShippingState,
						};

						$.ajax({
							
							type: "POST",
							url: ajaxurl,
							data: dataToSend,
							success:function(data) {

								function decodeEntities( encodedString ) {

									var textArea = document.createElement( 'textarea' );
									textArea.innerHTML = encodedString;
									return textArea.value;

								}

								$('#ldash-form-element-shipping-state').hide().val('').attr( 'required', false );
								$('#ldash-form-element-shipping-state option').remove();
								$('#ldash-form-element-shipping-state-text').hide().val('').attr( 'required', false );

								data = jQuery.parseJSON( data );

								if( $.isEmptyObject( data.shipping_states ) ) {

									if( data.initial_load == 'true' ) {

										$('#ldash-form-element-shipping-state-text').val( data.initial_shipping_state );

									}

									$('#ldash-form-element-shipping-state-text').show().attr( 'required', true );

								} else {

									$('#ldash-form-element-shipping-state-text').val('');

									$.each(data.shipping_states, function( id, option ) {

										$('#ldash-form-element-shipping-state').append( $('<option>', {
											value: id,
											text: decodeEntities( option )
										}));

									});

									if( data.initial_load == 'true' ) {

										$('#ldash-form-element-shipping-state option[value=' + data.initial_shipping_state + ']').attr( 'selected', true );

									}

									$('#ldash-form-element-shipping-state').show().attr( 'required', true );

								}

							},

						});

					}

				}

			<?php } ?>

		});

		// Initialize

		<?php

		global $wpdb;

		// Save State Handling

		if( get_option( 'ldash_general_misc_save_state' ) == 'on' ) {

			$state_save = 'true';

		} else {

			$state_save = 'false';

		}

		// If orders page and user id from customer page is in use then disable save state on this page

		if( $tab == 'orders' ) {

			if( isset( $user_id ) && !empty( $user_id ) ) {
			
				$state_save = 'false';
			
			}

		}

		$initiailize_buttons = array();
		$initiailize_buttons['colvis'] = array(
			'text'				=> '"' . __( 'Column Visibility', 'lightning-dashboard' ) . '"',
			'columns'			=> '":not(.ldash-column-visibility-exclude)"',
			'collectionTitle'	=> '"' . __( 'Column Visibility', 'lightning-dashboard' ) . '"',
			'fade'				=> 0, /* No fade so consistent with Thickbox */
		);

		$initialize_buttons = apply_filters( 'ldash_initialize_buttons', $initiailize_buttons );
		$initialize_buttons_markup = '';

		if( !empty( $initialize_buttons ) ) {

			foreach( $initialize_buttons as $initialize_button_id => $initialize_button_extends ) {

				$initialize_buttons_markup .= '{ "extend": \'' . $initialize_button_id . '\'';

				foreach( $initialize_button_extends as $initialize_button_extend_id => $initialize_button_extend_value ) {

					$initialize_buttons_markup .= ', "' . $initialize_button_extend_id . '": ' . $initialize_button_extend_value;

				}

				$initialize_buttons_markup .= '},';

			}

		}

		$initialize_buttons_markup = rtrim( $initialize_buttons_markup, ',' );

		// Standard Initialize Settings

		$standard_initialize_settings = '
			"orderCellsTop": true,
			"colReorder": {
				"fixedColumnsLeft": 1,
				"realtime": false
			},
			"select": true,
			"pageLength": ' . get_option( 'ldash_general_appearance_rows_per_page' ) . ',
			"bLengthChange": false,
			"pagingType": "full_numbers",
			"dom": \'<"top"B<"clear">ilpf<"clear">>rt<"bottom"ilpf<"clear">>\',
			"buttons": {
				"buttons": [' . $initialize_buttons_markup . '],
				"dom": {
					"button": {
						"className": \'button button-small\',
					},
				},
			},
			"processing": false,
			"ajax": ldashAjaxUrl,
			"stateSave": ' . $state_save . ',
			"stateDuration": 0,
			"language": {
				"emptyTable": "' . __ ('No data available. If you have filters set try reducing them for more results.', 'lightning-dashboard' ) . '"
			},
			"initComplete": function( settings, json ) {
				// on page load trigger change of filter inputs so anything loaded from save state gets automatically filtered (this code has to come after the filter functions above)
				$(\'#ldash-datatable-'.$tab.' thead tr:eq(1) th\').each( function (i) {
					$( \'input\', this ).trigger(\'change\');
					$( \'select\', this ).trigger(\'change\');
				});
			},
		';

		if( $tab == 'orders' ) {

			// Get row highlight colors

			$row_highlight_colors = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}options` WHERE `option_name` LIKE 'ldash_orders_rows_row_highlight_color_%'" ); ?>

			// Table

			var table = $( '#ldash-datatable-<?php echo $tab; ?>' ).DataTable( {
				<?php echo $standard_initialize_settings; ?>
				"order": [[ 0, "desc" ]],
				"columnDefs": [
					{ "data": "id", "name": "id", "targets": 0},
					{ "data": "user-id-hidden", "name": "user-id-hidden", "targets": 1, "visible": false, "className": "ldash-column-visibility-exclude" },
					{ "data": "customer", "name": "customer", "targets": 2},
					{ "data": "date", "name": "date", "targets": 3},
					{ "data": "status", "name": "status", "targets": 4},
					{ "data": "total", "name": "total", "targets": 5},
					<?php $last_target = 5;
					if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) {
						$last_target = 6; ?>
						{ "data": "invoice", "name": "invoice", "targets": 6},
					<?php }
					if( ldash_add_on_active( 'custom-columns' ) ) {
						$custom_col_defs = apply_filters( 'ldash_add_on_custom_columns_column_definitions', 'orders', $last_target );
						echo $custom_col_defs[0];
						$last_target = $custom_col_defs[1];
					} ?>
					{ "data": "actions", "name": "actions", "targets": <?php echo $last_target + 1; ?>, "orderable": false }
				],
				"createdRow": function( row, data, dataIndex ) {
					<?php
					if( !empty( $row_highlight_colors ) ) {
						foreach( $row_highlight_colors as $row_highlight_color ) {

							$row_highlight_status = ucfirst( str_replace(
								// Remove ldash_orders_rows_row_highlight_color_ and replace underscore with hyphen so matching row highlight color status will trigger 
								array( 'ldash_orders_rows_row_highlight_color_' , '_' ),
								array( '', '-'),
								$row_highlight_color->option_name
							) ); ?>

							if ( data['status'] == "<?php echo $row_highlight_status; ?>" ) {
								$(row).css( 'background-color', '<?php echo $row_highlight_color->option_value; ?>' );
							}
						<?php }
					} ?>
				},
				"stateSaveParams": function( settings, data ) {
					data.filterId = $('#ldash-filter-id').val();
					data.filterUserIdHidden = $('#ldash-filter-user-id-hidden').val();
					data.filterCustomer = $('#ldash-filter-customer').val();
					data.filterDate = $('#ldash-filter-date').val();
					data.filterStatus = $('#ldash-filter-status option:selected').val();
					data.filterTotal = $('#ldash-filter-total').val();
					<?php if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) { ?>
						data.filterInvoice = $('#ldash-filter-invoice').val();
					<?php }
					if( ldash_add_on_active( 'custom-columns' ) ) {
						do_action( 'ldash_add_on_custom_columns_column_save_state_parameters', 'orders' );
					} ?>
				},
				"stateLoadParams": function( settings, data ) {
					$('#ldash-filter-id').val(data.filterId);
					$('#ldash-filter-user-id-hidden').val(data.filterUserIdHidden);
					$('#ldash-filter-customer').val(data.filterCustomer);
					$('#ldash-filter-date').val(data.filterDate);
					$('#ldash-filter-status option[value="'+data.filterStatus+'"]').prop( 'selected', true );
					$('#ldash-filter-total').val(data.filterTotal);
					<?php if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) { ?>
						$('#ldash-filter-invoice').val(data.filterInvoice);
					<?php }
					if( ldash_add_on_active( 'custom-columns' ) ) {
						apply_filters( 'ldash_add_on_custom_columns_column_load_state_parameters', 'orders' );
					} ?>
				},
				"initComplete": function( settings, json ) {
					<?php if( isset( $user_id ) && !empty( $user_id ) ) { ?>
						$('#ldash-filter-user-id-hidden').val( '<?php echo $user_id; ?>' ).trigger('change');
					<?php } ?>
				},
			} );

		<?php } elseif( $tab == 'products' ) { ?>

			// Table

			var table = $( '#ldash-datatable-<?php echo $tab; ?>' ).DataTable( {
				<?php echo $standard_initialize_settings; ?>
				"order": [[ 0, "desc" ]],
				"columnDefs": [
					{ "data": "id", "name": "id", "targets": 0},
					{ "data": "title", "name": "title", "targets": 1},
					{ "data": "sku", "name": "sku", "targets": 2},
					{ "data": "type", "name": "type", "targets": 3},
					{ "data": "status", "name": "status", "targets": 4},
					{ "data": "stock-status", "name": "stock-status", "targets": 5},
					{ "data": "stock-level", "name": "stock-level", "targets": 6},
					{ "data": "price", "name": "price", "targets": 7},
					{ "data": "sale-price", "name": "sale-price", "targets": 8, "visible": false, "className": "ldash-column-visibility-exclude" },
					{ "data": "on-sale", "name": "on-sale", "targets": 9},
					{ "data": "featured", "name": "featured", "targets": 10},
					{ "data": "categories", "name": "categories", "targets": 11},
					{ "data": "categories-hidden", "name": "categories-hidden", "targets": 12, "visible": false, "className": "ldash-column-visibility-exclude" },
					<?php
					$last_target = 12;
					if( ldash_add_on_active( 'custom-columns' ) ) {
						$custom_col_defs = apply_filters( 'ldash_add_on_custom_columns_column_definitions', 'products', $last_target );
						echo $custom_col_defs[0];
						$last_target = $custom_col_defs[1];
					} ?>
					{ "data": "actions", "name": "actions", "targets": <?php echo $last_target + 1; ?>, "orderable": false },
				],
				"stateSaveParams": function( settings, data ) {
					data.filterId = $('#ldash-filter-id').val();
					data.filterTitle = $('#ldash-filter-title').val();
					data.filterSku = $('#ldash-filter-sku').val();
					data.filterType = $('#ldash-filter-type option:selected').val();
					data.filterStatus = $('#ldash-filter-status option:selected').val();
					data.filterStockStatus = $('#ldash-filter-stock-status option:selected').val();
					data.filterStockLevel = $('#ldash-filter-stock-level').val();
					data.filterPrice = $('#ldash-filter-price').val();
					data.filterOnSale = $('#ldash-filter-on-sale option:selected').val();
					data.filterFeatured = $('#ldash-filter-featured option:selected').val();
					data.filterCategories = $('#ldash-filter-categories option:selected').val();
					data.filterCategoriesHidden = $('#ldash-filter-categories-hidden').val();
					<?php if( ldash_add_on_active( 'custom-columns' ) ) {
						do_action( 'ldash_add_on_custom_columns_column_save_state_parameters', 'products' );
					} ?>
				},
				"stateLoadParams": function( settings, data ) {
					$('#ldash-filter-id').val(data.filterId);
					$('#ldash-filter-title').val(data.filterTitle);
					$('#ldash-filter-sku').val(data.filterSku);
					$('#ldash-filter-type option[value="'+data.filterType+'"]').prop( 'selected', true );
					$('#ldash-filter-status option[value="'+data.filterStatus+'"]').prop( 'selected', true );
					$('#ldash-filter-stock-status option[value="'+data.filterStockStatus+'"]').prop( 'selected', true );
					$('#ldash-filter-stock-level').val(data.filterStockLevel);
					$('#ldash-filter-price').val(data.filterPrice);
					$('#ldash-filter-on-sale option[value="'+data.filterOnSale+'"]').prop( 'selected', true );
					$('#ldash-filter-featured option[value="'+data.filterFeatured+'"]').prop( 'selected', true );
					$('#ldash-filter-categories option[value="'+data.filterCategories+'"]').prop( 'selected', true );
					$('#ldash-filter-categories-hidden').val(data.filterCategoriesHidden);
					<?php if( ldash_add_on_active( 'custom-columns' ) ) {
						apply_filters( 'ldash_add_on_custom_columns_column_load_state_parameters', 'products' );
					} ?>
				},
			} );

		<?php } elseif( $tab == 'customers' ) { ?>

			// Table

			var table = $( '#ldash-datatable-<?php echo $tab; ?>' ).DataTable( {
				<?php echo $standard_initialize_settings; ?>
				"order": [[ 0, "desc" ]],
				"columnDefs": [
					{ "data": "id", "name": "id", "targets": 0},
					{ "data": "name", "name": "name", "targets": 1},
					{ "data": "company", "name": "company", "targets": 2},
					{ "data": "email", "name": "email", "targets": 3},
					{ "data": "phone", "name": "phone", "targets": 4},
					{ "data": "billing-address", "name": "billing-address", "targets": 5},
					{ "data": "shipping-address", "name": "shipping-address", "targets": 6},
					<?php
					$last_target = 6;
					if( ldash_add_on_active( 'custom-columns' ) ) {
						$custom_col_defs = apply_filters( 'ldash_add_on_custom_columns_column_definitions', 'customers', $last_target );
						echo $custom_col_defs[0];
						$last_target = $custom_col_defs[1];
					} ?>
					{ "data": "orders", "name": "orders", "targets": <?php echo $last_target + 1; ?>, "orderable": false },
					{ "data": "actions", "name": "actions", "targets": <?php echo $last_target + 2; ?>, "orderable": false },
				],
				"stateSaveParams": function( settings, data ) {
					data.filterId = $('#ldash-filter-id').val();
					data.filterName = $('#ldash-filter-name').val();
					data.filterCompany = $('#ldash-filter-company').val();
					data.filterEmail = $('#ldash-filter-email').val();
					data.filterPhone = $('#ldash-filter-phone').val();
					data.filterBillingAddress = $('#ldash-filter-billing-address').val();
					data.filterShippingAddress = $('#ldash-filter-shipping-address').val();
					<?php if( ldash_add_on_active( 'custom-columns' ) ) {
						do_action( 'ldash_add_on_custom_columns_column_save_state_parameters', 'customers' );
					} ?>
				},
				"stateLoadParams": function( settings, data ) {
					$('#ldash-filter-id').val(data.filterId);
					$('#ldash-filter-name').val(data.filterName);
					$('#ldash-filter-company').val(data.filterCompany);
					$('#ldash-filter-email').val(data.filterEmail);
					$('#ldash-filter-phone').val(data.filterPhone);
					$('#ldash-filter-billing-address').val(data.filterBillingAddress);
					$('#ldash-filter-shipping-address').val(data.filterShippingAddress);
					<?php if( ldash_add_on_active( 'custom-columns' ) ) {
						apply_filters( 'ldash_add_on_custom_columns_column_load_state_parameters', 'customers' );
					} ?>
				},
			} );

		<?php }

		// If there are initialize buttons then append them to options form

		if( !empty( $initialize_buttons ) ) { ?>

			$( ".ldash-options-right form" ).append( $( ".dt-buttons button" ) );
			
		<?php } ?>



		// Filters

		$('#ldash-datatable-<?php echo $tab; ?> thead tr:eq(1) th').each( function (i) {

			// Text Filters

			$( 'input', this ).on( 'keyup change', function () { // Any input (not select) in the filter field table rows above

				columnName = $(this).attr('id').replace( 'ldash-filter-','' ) + ':name';
				var col = table.column( columnName );

				if ( col.search() !== this.value ) {
					col.search( this.value ).draw();
				}

			} );

		} );

		// Exact Match Filter Function

		function exactMatchFilter( $this, $columnName ) {

			if( $this.val() !== '' ) {
				table.column( $columnName + ':name' ).search("^" + $this.val() + "$", true, false, true).draw();
			} else {
				table.column( $columnName + ':name').search( $this.val() ).draw();
			}

		}

		// Orders Select Field Filters

		<?php if( $tab == 'orders' ) { ?>

			$('#ldash-filter-user-id-hidden').on( 'change', function() {
				var columnName = 'user-id-hidden';
				exactMatchFilter( $(this), columnName );
			});

			$('#ldash-filter-status').on( 'change', function() {
				var columnName = 'status';
				exactMatchFilter( $(this), columnName );
			});

			<?php if( ldash_add_on_active( 'custom-columns' ) ) {
				if( !empty( $custom_columns['orders'] ) ) { 
					foreach( $custom_columns['orders'] as $custom_column ) {
						if( $custom_column['filter_type'] == 'select' ) { ?>
							$('#ldash-filter-<?php echo $custom_column['id']; ?>').on( 'change', function() {
								var columnName = '<?php echo $custom_column['id']; ?>';
								exactMatchFilter( $(this), columnName );
							});
						<?php }
					}
				}
			}

		} ?>

		// Products Select Field Filters

		<?php if( $tab == 'products' ) { ?>

			$('#ldash-filter-status').on('change', function() {
				var columnName = 'status';
				exactMatchFilter( $(this), columnName );
			});

			$('#ldash-filter-featured').on('change', function() {
				var columnName = 'featured';
				exactMatchFilter( $(this), columnName );
			});

			$('#ldash-filter-stock-status').on('change', function() {
				var columnName = 'stock-status';
				exactMatchFilter( $(this), columnName );
			});

			$('#ldash-filter-categories').on('change', function() {
				var columnName = 'categories-hidden'; // Filters hidden categories column
				exactMatchFilter( $(this), columnName );
			});

			$('#ldash-filter-type').on('change', function() {
				var columnName = 'type';
				exactMatchFilter( $(this), columnName );
			});

			$('#ldash-filter-on-sale').on('change', function() {
				var columnName = 'on-sale';
				exactMatchFilter( $(this), columnName );
			});

			<?php if( ldash_add_on_active( 'custom-columns' ) ) {
				if( !empty( $custom_columns['products'] ) ) { 
					foreach( $custom_columns['products'] as $custom_column ) {
						if( $custom_column['filter_type'] == 'select' ) { ?>
							$('#ldash-filter-<?php echo $custom_column['id']; ?>').on( 'change', function() {
								var columnName = '<?php echo $custom_column['id']; ?>';
								exactMatchFilter( $(this), columnName );
							});
						<?php }
					}
				}
			}

		}

		// Customers Select Field Filters

		if( $tab == 'customers' ) {

			if( ldash_add_on_active( 'custom-columns' ) ) {
				if( !empty( $custom_columns['customers'] ) ) {
					foreach( $custom_columns['customers'] as $custom_column ) {
						if( $custom_column['filter_type'] == 'select' ) { ?>
							$('#ldash-filter-<?php echo $custom_column['id']; ?>').on( 'change', function() {
								var columnName = '<?php echo $custom_column['id']; ?>';
								exactMatchFilter( $(this), columnName );
							});
						<?php }
					}
				}
			}

		} ?>

		// Clear Column Filters if Column Visibilities Changed

		table.on( 'column-visibility.dt', function ( e, settings, column, state ) {

			// Clear all inputs, we did try to just clear the one being cleared but depending on load state and if columns hidden we can't match the inputs using tr:eq(x) to the column response from this function, so we reset all

			if( state ) {

				var idx = $( table.column( column ).header() ).index();

				$('#ldash-datatable-<?php echo $tab; ?> thead tr:eq(1) th:eq('+idx+') input').val(''); // minus 1 because id is always first
				$('#ldash-datatable-<?php echo $tab; ?> thead tr:eq(1) th:eq('+idx+') select option:selected').removeAttr('selected');
				$('#ldash-datatable-<?php echo $tab; ?> thead tr:eq(1) th:eq('+idx+') select option[value=""]').attr('selected', true);

			} else {
			
				table.columns(column).search('').draw();

			}

		} );

		// Refresh Notice

		function addRefreshNotice( type ) {

			$('#ldash-refresh-notice').remove(); // If 2 links clicked stops double messages

			<?php if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) { ?>

				if( type == 'invoices' ) {

					<?php LDASH_Notices::notice( 'warning', true, 'ldash-refresh-notice', __( 'Due to invoice and packing slip generation the data below may have changed, therefore once the download has completed, <a href="#">click here to refresh data</a>.', 'lightning-dashboard' ), '', false, false ); ?>

				} else {

					<?php LDASH_Notices::notice( 'warning',	true, 'ldash-refresh-notice', __( 'Looks like you navigated away from the page and may have made changes, <a href="#">click here to refresh data</a>.', 'lightning-dashboard' ), '', false,	false ); // Same as below ?>
				}

			<?php } else {

				// Same as above

				LDASH_Notices::notice( 'warning',	true, 'ldash-refresh-notice', __( 'Looks like you navigated away from the page and may have made changes, <a href="#">click here to refresh data</a>.', 'lightning-dashboard' ), '', false,	false );

			} ?>

		}

		// On New Window Refresh Notice

		$('body').on( 'click', 'a[target="_blank"]', function() {

			addRefreshNotice();

		});

		// Refresh Link Click

		$('body').on( 'click', '#ldash-refresh-notice p a', function() {

			event.preventDefault();
			$('#ldash-refresh-notice p').html( '<?php _e( 'Refreshing...', 'lightning-dashboard' ); ?>' );

			$('#ldash-datatable-<?php echo $tab; ?>').DataTable().ajax.reload( function ( json ) {

				// Update notice

				$('#ldash-refresh-notice').removeClass( 'notice-warning' ).addClass('notice-success');
				$('#ldash-refresh-notice p').html( '<?php _e( 'Refreshed successfully.', 'lightning-dashboard' ); ?>' );
				$('#ldash-refresh-notice')<?php echo LDASH_Notices::slide_up(); ?>;

				setTimeout(function() {
					$('#ldash-refresh-notice').remove();
				}, 2500); // Ensure it's removed after the 3000 of the delay and fadeout so if another one gets added there is only 1 element of that id

			}, false);

		});

		// Save State Reset

		$('body').on( 'click', '#ldash-save-state-reset', function() {

			if( confirm( '<?php _e( 'Are you sure you want to reset save state? This will remove any settings you have applied such as filters, search, pagination and column ordering/visibility.', 'lightning-dashboard' ); ?>' ) ) {

				table.state.clear();

				// If the save state reset notice is there (e.g. if settings changed the notice appears)

				if( $('#ldash-temp-save-state-reset').length ) {

					// Update the content of it

					$('#ldash-temp-save-state-reset p').html( '<?php _e( 'Clearing save state...', 'lightning-dashboard' ); ?>' );

				} else { // No existing notice so add one

					<?php LDASH_Notices::notice( 'warning', true, '', __( 'Clearing save state...', 'lightning-dashboard' ), '', false, false ); ?>

				}

			} else {

				event.preventDefault();

			}

		});

		// Filtered Results by User Notice

		<?php if( $tab == 'orders' && isset( $user_id ) && !empty( $user_id ) ) {
			LDASH_Notices::notice( 'warning', true, '', __( 'You are filtering orders by a specific customer, any additional filters applied will only return results for this specific customer.', 'lightning-dashboard' ), '', false, false );
		} ?>

		// Non Initialize Buttons

		<?php $non_initialize_buttons = apply_filters( 'ldash_non_initialize_buttons', array() );

		if( !empty( $non_initialize_buttons ) ) {

			foreach( $non_initialize_buttons as $initialize_button_id => $initialize_button_data ) { ?>
				$( '<button type="submit" value="" name="<?php echo str_replace( '-', '_', 'ldash-non-initialize-button-' . $initialize_button_id ); ?>" id="ldash-non-initialize-button-<?php echo $initialize_button_id; ?>" class="button button-small"><?php echo $initialize_button_data['text']; ?></button>' ).appendTo('.ldash-options-right form');

				$('body').on( 'click', '#ldash-non-initialize-button-<?php echo $initialize_button_id; ?>', function() {

					<?php if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) {

						if( $initialize_button_id == 'invoices' ) { ?>
							
							addRefreshNotice( 'invoices' );

						<?php }

					} ?>

				});

			<?php }

		} ?>

	});
</script>