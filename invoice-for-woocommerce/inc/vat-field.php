<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

//Add  billing fields to the checkout page in woocommerce
add_filter('woocommerce_billing_fields', 'invoice_for_woocommerce_billing_fields');

function invoice_for_woocommerce_billing_fields($fields) {

    $fields['vat_number'] = array(
        'label' => get_option( 'VAT_fields_title'), // Add custom field label
        'placeholder' => _x('EU VAT Number e.g. EU999999999', 'placeholder', 'invoice-for-woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'text', // add field type
        'id' => 'billing_eu_vat_number', // add field type
      //  'class' => array('seos-vat-field'),    // add class name
    );
	if(get_option( 'activate_digital_goods' ) ) {
	?>
	<script type="text/javascript">
        jQuery('form.checkout').on('change','input[name^="vat_number"]',function() {
            var val = jQuery( this ).val();
            if (val) {
				jQuery('.tax-rate, .order-total').fadeOut();
				<?php 
			  if( !empty( $_POST['vat_number'] ) and WC()->countries->get_base_country() != $_POST['billing_country']) {
			      add_filter( 'wc_tax_enabled',  'invoice_for_woocommerce_enable_tax' , 1, 2 );//Enable Tax if is digital product 
			  }
			  ?>
			}
			else {
				jQuery('.tax-rate, .order-total').fadeIn();  
			}

        });
    </script>	
	<?php
	}
    return $fields;
}




/**
* VAT Number in emails
*/
add_filter( 'woocommerce_email_order_meta_keys', 'invoice_for_woocommerce_vat_number_display_email' );

function invoice_for_woocommerce_vat_number_display_email( $keys ) {
     $keys['VAT Number'] = 'vat_number';
     return $keys;
}


//Enable Tax if is digital product and add to filter wc_tax_enabled
function invoice_for_woocommerce_enable_tax() {
	if( !empty( $_POST['vat_number'] ) and get_option( 'activate_digital_goods' ) ) {
		return false;
	}
}
/**
* Save VAT Number in the order meta
*/
add_action( 'woocommerce_checkout_update_order_meta', 'vat_number_update_order_meta' );
function vat_number_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['vat_number'] ) ) {
        update_post_meta( $order_id, 'vat_number', sanitize_text_field( $_POST['vat_number'] ) );
    }
}

//Add Vat Number filed in the admin orders.
add_action( 'woocommerce_admin_order_data_after_billing_address', 'vat_number_display_admin_order_meta', 10, 1 );
function vat_number_display_admin_order_meta($order){
	$vat_number = get_post_meta( get_the_ID(), 'vat_number', true );
	?>
    <div><p class="woo-vat form-row-wide"><strong><?php echo __('VAT Number: '); ?></strong><?php echo $vat_number; ?></p></div>
	<div class="edit_vat">
	    <input id="vat_number" type="text" name="vat_number" value="<?php if ( $vat_number ) { echo esc_html( $vat_number ); } ?>" />
	</div><?php
}

// Validate vat field - VIES
add_action('woocommerce_checkout_process', 'invoice_for_woocommerce_admin_scripts_vies_validation');
function invoice_for_woocommerce_admin_scripts_vies_validation () {
	if( !empty( $_POST['vat_number'] ) ) {
		$vatid = sanitize_text_field($_POST['vat_number']);
		$vatid = str_replace(array(' ', '.', '-', ',', ', '), '', trim($vatid));
		$cc = substr($vatid, 0, 2);
		$vn = substr($vatid, 2);
		$client = new SoapClient("http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl");
		if( $client ) {
			$countrycode = $_POST['billing_country'];
			$params = array('countryCode' => $cc, 'vatNumber' => $vn);
			$params_code = $params['countryCode'];
			try{
				$check_vat = $client->checkVat($params);
				if( $check_vat->valid == true and $params_code == $countrycode) {
					
				} else {
					wc_add_notice( sprintf(__('Incorrect VAT Number.', 'invoice-for-woocommerce')) ,'error'  );
				}

				// This foreach shows every single line of the returned information
				foreach($check_vat as $k=>$prop){
					echo $k . ': ' . $prop;
				}

			} catch(SoapFault $e) {
				echo 'Error, see message: '.$e->faultstring;
				  wc_add_notice( sprintf(__('Incorrect VAT Number.', 'invoice-for-woocommerce')) ,'error'  );
			}
		}
	}
}

if(get_option( 'activate_digital_goods' ) ) {
	// Get base country and add VAT only for base country. 
	function invoice_for_woocommerce_add_vat_base_country () {
	?>
		<script type="text/javascript">
			jQuery('form.checkout').on('change','input[name^="vat_number"]',function() {
				var e = document.getElementById("billing_country");
				var val = e.value;
				if (val == "<?php echo WC()->countries->get_base_country(); ?>") {
					jQuery('.tax-rate, .order-total').fadeIn();
				}

			});
		</script>
			<?php 
		}
	add_action('wp_footer','invoice_for_woocommerce_add_vat_base_country');
}