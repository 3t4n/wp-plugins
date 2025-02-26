<?php

if(!function_exists('plouf')) {
function plouf($e,$txt = '') {
	if($txt != '') echo "<br />\n$txt";
	echo '<pre>';
	print_r($e);
	echo '</pre>';
}
}


function hexasmal_add_verification($type = false) {

	if($type == 'billing_address') {
		hexasmal_generate_javascript(
			'div.woocommerce-address-fields',
			true,
			'billing_postcode',
			'billing_city',
			'billing_country'
		);


	}
	elseif($type == 'shipping_address') {
		hexasmal_generate_javascript(
			'div.woocommerce-address-fields',
			true,
			'shipping_postcode',
			'shipping_city',
			'shipping_country'
		);
	}
	elseif($type == 'shipping_calculator') {
		hexasmal_generate_javascript(
			'form.woocommerce-shipping-calculator',
			true,
			'calc_shipping_postcode',
			'calc_shipping_city',
			'calc_shipping_country'
		);
		$hexasmal_switch_fields = get_option('hexasmal_switch_address_fields');

		if($hexasmal_switch_fields) {
		?>
		<script type="text/javascript">
			jQuery('#calc_shipping_city_field').before(jQuery('#calc_shipping_postcode_field'));
		</script>
		<?php 		
		}
	}
	elseif($type == 'shipping_form') {
		hexasmal_generate_javascript(
			'div.woocommerce-shipping-fields',
			true,
			'shipping_postcode',
			'shipping_city',
			'shipping_country'
		);
		$hexasmal_switch_fields = get_option('hexasmal_switch_address_fields');
		if($hexasmal_switch_fields) {
		?>
		<script type="text/javascript">
			jQuery('#shipping_city_field').before(jQuery('#shipping_postcode_field'));
		</script>
		<?php 	
		}	
	}
	elseif($type == 'billing_form') {

		hexasmal_generate_javascript(
			'div.woocommerce-billing-fields',
			true,
			'billing_postcode',
			'billing_city',
			'billing_country'
		);
		$hexasmal_switch_fields = get_option('hexasmal_switch_address_fields');
		if($hexasmal_switch_fields) {
		?>
		<script type="text/javascript">
			jQuery('#billing_city_field').before(jQuery('#billing_postcode_field'));
		</script>
		<?php 
		}	
	}
	elseif($type == 'order_billing_address') {
		hexasmal_generate_javascript(
			'div.order_data_column_container div.order_data_column:nth-child(2)',
			true,
			'_billing_postcode',
			'_billing_city',
			'_billing_country'
		);		
	}
	elseif($type == 'order_shipping_address') {
		hexasmal_generate_javascript(
			'div.order_data_column_container div.order_data_column:nth-child(3)',
			true,
			'_shipping_postcode',
			'_shipping_city',
			'_shipping_country'
		);		
	}

}

