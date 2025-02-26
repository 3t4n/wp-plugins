<?php

/**
 * Edit html file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
} ?>

<div id="ldash-edit">
	<div id="ldash-form-element-validation">
		<div id="ldash-form-element-notices"></div>
		<form id="ldash-form-element-form" class="ldash-form">
			<?php if( $tab == 'orders' ) { ?>
				<div class="ldash-form-element">
					<label for="ldash-form-element-status"><?php _e( 'Status', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_select( 'ldash-form-element-status', 'orders_status', 'No Change', false, false, false, false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-remove-personal-data" class="checkbox-label"><?php _e( 'Remove Personal Data', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'checkbox', 'ldash-form-element-remove-personal-data', '', '', '', false ); ?>
				</div>
				<script>
					jQuery( document ).ready(function($) {
						$('#ldash-form-element-remove-personal-data').change(function() {
							if( $(this).is( ":checked" ) ) {
								$(this).val(1);
							} else {
								$(this).val(0);
							}
						});
					});
				</script>
				<?php if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) { ?>
					<div class="ldash-form-element">
						<label for="ldash-form-element-invoice"><?php _e( 'Invoice', 'lightning-dashboard' ); ?></label>
						<?php LDASH_Markup::field_input( 'number', 'ldash-form-element-invoice', '', '', '', false ); ?>
						<small><?php _e( 'To remove an existing invoice number enter 0. Any prefix or suffix entered in settings will be added to the number entered. Invoice number date generated upon number allocation.', 'lightning-dashboard' ); ?></small>
					</div>
				<?php }
			} elseif( $tab == 'products' ) { ?>
				<div class="ldash-form-element">
					<label for="ldash-form-element-title"><?php _e( 'Title', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-title', '', '', '', false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-sku"><?php _e( 'SKU', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-sku', '', '', '', false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-regular-price"><?php _e( 'Regular Price', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-regular-price', '', '', '', false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-sale-price"><?php _e( 'Sale Price', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-sale-price', '', '', '', false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-status"><?php _e( 'Status', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_select( 'ldash-form-element-status', 'products_status', __( 'No Change', 'lightning-dashboard' ), false, false, false, false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-stock-status"><?php _e( 'Stock Status', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_select( 'ldash-form-element-stock-status', 'products_stock_status', __( 'No Change', 'lightning-dashboard' ), false, false, false, false ); ?>
					<small id="ldash-form-element-stock-status-backorder-status"></small>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-stock-level"><?php _e( 'Stock Level', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-stock-level', '', '', '', false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-stock-level-no" class="checkbox-label"><?php _e( 'No Stock Level', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'checkbox', 'ldash-form-element-stock-level-no', '', '', '', false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-featured"><?php _e( 'Featured', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_select( 'ldash-form-element-featured', 'no_yes', __( 'No Change', 'lightning-dashboard' ), false, false, false, false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-categories"><?php _e( 'Categories', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_select( 'ldash-form-element-categories', 'products_categories', 'No Change', true, false, false, false ); ?>
					<small><?php _e( 'Select multiple categories by holding the control/command key and click multiple categories.', 'lightning-dashboard' ); ?></small>
				</div>
			<?php } elseif( $tab == 'customers' ) { ?>
				<h2><?php _e( 'Billing Details', 'lightning-dashboard' ); ?></h2>
				<div class="ldash-form-element">
					<label for="ldash-form-element-billing-first-name"><?php _e( 'First Name', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-billing-first-name', '', '', '', true ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-billing-last-name"><?php _e( 'Last Name', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-billing-last-name', '', '', '', true ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-billing-company"><?php _e( 'Company', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-billing-company', '', '', '', false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-billing-email"><?php _e( 'Email', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-billing-email', '', '', '', true ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-billing-phone"><?php _e( 'Phone', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-billing-phone', '', '', '', true ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-billing-address-line-1"><?php _e( 'Address Line 1', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-billing-address-line-1', '', '', '', true ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-billing-address-line-2"><?php _e( 'Address Line 2', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-billing-address-line-2', '', '', '', false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-billing-city"><?php _e( 'City', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-billing-city', '', '', '', true ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-billing-postcode"><?php _e( 'Postcode', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-billing-postcode', '', '', '', true ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-billing-state"><?php _e( 'State/County', 'lightning-dashboard' ); ?></label>
					<select id="ldash-form-element-billing-state" required></select>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-billing-state-text', '', '', '', false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-billing-country"><?php _e( 'Country', 'lightning-dashboard' ); ?></label>
						<?php $countries_obj = new WC_Countries();
						$countries = $countries_obj->__get( 'countries' );
						woocommerce_form_field( 'ldash-form-element-billing-country',
							array(
								'type'		=> 'select',
								'options'	=> $countries,
							)
						); ?>
					</label>
				</div>
				<h2><?php _e( 'Shipping Details', 'lightning-dashboard' ); ?></h2>
				<div class="ldash-form-element">
					<label for="ldash-form-element-shipping-first-name"><?php _e( 'First Name', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-shipping-first-name', '', '', '', true ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-shipping-last-name"><?php _e( 'Last Name', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-shipping-last-name', '', '', '', true ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-shipping-company"><?php _e( 'Company', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-shipping-company', '', '', '', false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-shipping-address-1"><?php _e( 'Address Line 1', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-shipping-address-1', '', '', '', true ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-shipping-address-2"><?php _e( 'Address Line 2', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-shipping-address-2', '', '', '', false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-shipping-city"><?php _e( 'City', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-shipping-city', '', '', '', true ); ?>
				</div>			
				<div class="ldash-form-element">
					<label for="ldash-form-element-shipping-postcode"><?php _e( 'Postcode', 'lightning-dashboard' ); ?></label>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-shipping-postcode', '', '', '', true ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-shipping-state"><?php _e( 'State / County', 'lightning-dashboard' ); ?></label>
					<select id="ldash-form-element-shipping-state" required></select>
					<?php LDASH_Markup::field_input( 'text', 'ldash-form-element-shipping-state-text', '', '', '', false ); ?>
				</div>
				<div class="ldash-form-element">
					<label for="ldash-form-element-shipping-country"><?php _e( 'Country', 'lightning-dashboard' ); ?></label>
						<?php $countries_obj = new WC_Countries();
						$countries = $countries_obj->__get( 'countries' );
						woocommerce_form_field( 'ldash-form-element-shipping-country',
							array(
								'type'		=> 'select',
								'options'	=> $countries,
							)
						); ?>
					</label>
				</div>
			<?php } ?>
			<div class="ldash-form-element">
				<button class="button button" id="ldash-delete-button"><?php _e( 'Delete', 'lightning-dashboard' ); ?></button>
				<button class="ldash-float-right button button-primary" id="ldash-save-edit-button"><?php _e( 'Save', 'lightning-dashboard' ); ?></button>
			</div>
		</form>
	</div>
</div>