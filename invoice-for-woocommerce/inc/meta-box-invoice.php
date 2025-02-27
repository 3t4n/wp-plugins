<?php
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
// Adding Metabox
    function invoice_for_woocommerce_box() {
    $screens = ['shop_order'];
    foreach ($screens as $screen) {
        add_meta_box(
            'ifw_box_id',           // Unique ID
            'Crate Invoice',  // Box title
            'invoice_for_woocommerce_box_html',  // Content callback, must be of type callable
            $screen ,// Post type
			'normal',
			'high'
        );
    }
}
add_action( 'add_meta_boxes', 'invoice_for_woocommerce_box' );

// Get items quantity, name and subtotal price.
function invoice_for_woocommerce_all_products() {
	global $post;
	$order = new WC_Order( $post->ID );
	$order_items = $order->get_items();
	?>
	<tr>
		<td><b><?php echo esc_html( get_option( 'field_28' ) )." ";  ?></b></td>
		<td><b><?php echo esc_html( get_option( 'field_30' ) )." "; ?></b></td>
		<td><b><?php echo esc_html( get_option( 'field_31' ) )." "; ?></b></td>
	</tr>
	<?php
	foreach ($order_items as $items_key => $items_value) {  ?>
		<tr>
			<td><?php echo esc_html( $items_value['name'] ); ?></td>
			<td><?php echo esc_html( $items_value['qty'] ); ?></td>
			<td><?php echo number_format((float)esc_html( $order->get_item_subtotal( $items_value) ), 2, '.', '' ); ?></td>
		</tr>
	<?php }
}

function invoice_for_woocommerce_get_price_exchange_rate () {
	global $post;
 	$order = wc_get_order($post->ID);
	$ifw_exchange_rate = (($order->get_total() - $order->get_total_tax())*get_option('2_field_53'));
	return number_format((float)esc_attr($ifw_exchange_rate), 2, '.', '');
}

// Get product items name
function invoice_for_woocommerce_item () {
	global $post;
	$order = new WC_Order($post->ID);
		$items = $order->get_items();
		foreach ( $items as $item ) {
			$product = wc_get_product( $item['product_id'] );
			echo $product->get_name();
	}
}

// Get price total without tax
function invoice_for_woocommerce_get_price () {
	global $post;
 	$order = wc_get_order($post->ID);
	$ifw_price = $order->get_total() - $order->get_total_tax();
	$ifw_price1 = number_format((float)$ifw_price, 2, '.', '');
	return $ifw_price1;
}

// Get VAT percentage when is a tax else get 0%
function invoice_for_woocommerce_get_procent () {
	global $post;
 	$order = wc_get_order(get_the_ID());
	$total_tax = $order->get_total_tax();
	if(empty( $total_tax )) {
		echo "0%";
	}
	elseif( !empty( $total_tax ) ) {
	$ifv_procent = (($total_tax * 100) / invoice_for_woocommerce_get_price ());
		echo number_format((float)$ifv_procent, 0, '.', '')."%";
	}
}

function show_invoice_numbers ( $ccccc ) {

	$arr_push_orders = array();
	$args = array(
		'limit'           => -1,
		'type'        => 'shop_order',
		'status'          => 'completed'
	);
	$query = new WC_Order_Query( $args );
	$orders = $query->get_orders();

	foreach( $orders as $order_id ) {
		$order_data = $order_id->get_meta( 'invoice_number' );
		    if( $order_data !="" ) {
		array_push( $arr_push_orders, $order_data );
		}
	}
	if ( in_array( $ccccc, $arr_push_orders ) ) {
		return true;
	}
	else {
		return false;
	}
}

function invoice_for_woocommerce_invoie_add_qr_code () {
	global $post;
	$order = new WC_Order($post->ID);
   // Save PNG codes to server
    $ifv_order_id = get_post_meta($post->ID, 'ifv_order_id', true);	
	$gr_path = trailingslashit(plugin_dir_url(__DIR__) )."inc/qr/".get_the_ID().'.png';
	echo $gr_path;

}

// All metabox fields
function invoice_for_woocommerce_box_html( $post ) {
	global $post;
	global $order;
	$order = wc_get_order( get_the_ID() );
    ?>
    <table>
	<tr>
		<td>
			<input id="get_date_created" type="hidden" name="get_date_created" value="<?php if ($order->has_status( 'completed' ) ) { echo $order->get_date_created()->format ('d-m-Y'); } ?>">
			
			<input id="get_date_complate" type="hidden" name="get_date_complate" value="<?php if ($order->has_status( 'completed' ) ) { echo $order->get_date_created()->format ('d-m-Y'); } ?>">
			
			<input id="ifv_customer" type="hidden" name="ifv_customer" value=" <?php if( !empty( $order->get_billing_company() ) ) {
				echo esc_html( $order->get_billing_company() );
				}
				else {
					echo esc_html( $order->get_billing_first_name()." ".$order->get_billing_last_name() );
				}
			?>">
			
			<input id="ifv_city" type="hidden" name="ifv_city" value="<?php if( !empty( $order->get_billing_city() ) ) { echo esc_html( $order->get_billing_city().", ". WC()->countries->countries[$order->get_billing_country()] ); } ?>">
			
			<input id="ifv_address" type="hidden" name="ifv_address" value="
			<?php 
			echo esc_html( $order->get_billing_address_1()." ". $order->get_billing_address_2()." ".$order->get_billing_postcode() ); ?>
			">
		
			<!-- Get order ID -->
			<input id="ifv_order_id" type="hidden" name="ifv_order_id" value="<?php echo esc_html( $order->get_id() ); ?>">
			<!--Get billing first and last name -->
			<input id="ifv_customer_name" type="hidden" name="ifv_customer_name" value="<?php echo esc_html( $order->get_billing_first_name()." ".$order->get_billing_last_name() ); ?>">
			<!-- Get Items name -->
			<input id="ifv_customer_product" type="hidden" name="ifv_customer_product" value="<?php echo invoice_for_woocommerce_item(); ?>">
			<!-- Get order total price value -->
			<input id="ifv_get_total" type="hidden" name="ifv_get_total" value="<?php echo esc_html( $order->get_total() ); ?>">
			
			<input id="ifv_get_price" type="hidden" name="ifv_get_price" value="<?php echo invoice_for_woocommerce_get_price (); ?>">
			
			<input id="ifv_get_procent" type="hidden" name="ifv_get_procent" value="<?php echo invoice_for_woocommerce_get_procent (); ?>">
			
			<input id="ifv_get_fee" type="hidden" name="ifv_get_fee" value="<?php echo esc_html( number_format((float)$order->get_total_tax(), 2, '.', '') ); ?>">
			
			<input id="ifv_place" type="hidden" name="ifv_place" value="<?php if( !empty( WC()->countries->countries[$order->get_billing_country()] ) ) { echo esc_html( WC()->countries->countries[$order->get_billing_country()] ); } ?>">
			
			<input id="ifv_get_payment_method" type="hidden" name="ifv_get_payment_method" value="<?php echo esc_html( $order->get_payment_method() ); ?>">
			
			<input id="ifv_all_products" type="hidden" name="ifv_all_products" value="<?php echo invoice_for_woocommerce_all_products(); ?>">
			
			<input id="ifv_get_footer_all_country" type="hidden" name="ifv_get_footer_all_country" value="<?php echo esc_attr( get_option( 'field_48' ) ); ?>">
			
			<input id="ifv_get_base_price" type="hidden" name="ifv_get_base_price" value="<?php echo invoice_for_woocommerce_get_price (); ?>">
			
			<input id="ifv_sent_email" type="hidden" name="ifv_sent_email" value="<?php if( !isset( $_POST['ifv_sent_email'] ) ) { echo esc_html( get_post_meta( get_the_ID(), 'ifv_sent_email', true ) ); } ?>">
			
			<input id="ifv_activate_invoice" type="hidden" name="ifv_activate_invoice" value="<?php echo esc_html( get_post_meta( get_the_ID(), 'ifv_activate_invoice', true ) ); ?>">
			
			<input id="ifv_activate_invoice_1" type="hidden" name="ifv_activate_invoice_1" value="<?php echo esc_html( get_post_meta( get_the_ID(), 'ifv_activate_invoice_1', true ) ); ?>">
			
			<input id="ifv_download_invoice" type="hidden" name="ifv_download_invoice" value="<?php echo esc_html( get_post_meta( get_the_ID(), 'ifv_download_invoice', true ) ); ?>">	
			
			<input id="ifv_download_invoice_1" type="hidden" name="ifv_download_invoice_1" value="<?php echo esc_html( get_post_meta( get_the_ID(), 'ifv_download_invoice_1', true ) ); ?>">	
			
			<input id="ifv_get_exchange_rate" type="hidden" name="ifv_get_exchange_rate" value="<?php echo esc_html( get_post_meta( get_the_ID(), 'ifv_get_exchange_rate', true ) ); ?>">
			
			<input id="gr_code_add" type="hidden" name="gr_code_add" value="<?php echo invoice_for_woocommerce_invoie_add_qr_code (); ?>">	

		</td>
	</tr>
	<?php if ( $order->get_status() == 'completed' ) { ?>
	<tr>
		<td>
			<?php 
			esc_html_e( 'Invoice Number: ','invoice-for-woocommerce' ); ?> 
			<input id="invoice_number" min="0" step="1" type="number" name="invoice_number" value="<?php echo esc_html( get_post_meta(get_the_ID(), 'invoice_number', true ) ); ?>">
			<button type="submit" class="button save_order button-primary" name="saveme" value="Update"><?php esc_html_e( 'Save','invoice-for-woocommerce' ); ?></button>
			<br />
			<br />
			
			<?php 
		if( get_post_meta( get_the_ID(), 'invoice_number', true ) ) { ?>
			
				<a class="button"  href="<?php echo admin_url( 'post.php?post=' . get_the_ID() ) . '&action=edit&link=go'; ?>" ><?php esc_html_e( 'Generate Invoice','invoice-for-woocommerce' ); ?>
			
				<?php if ( get_option( 'countries_flag' ) ) { ?>
					<img style="width:20px; height: 12px;" src="<?php echo " ".plugin_dir_url( __FILE__ ).'flags/'.str_replace( " ", "_", get_option( 'countries_flag' ) ).".jpg"; ?>">
				<?php } ?>
				</a>
				<select name="ifv_activate_invoice" id="ifv_activate_invoice" class="ifv_activate_invoice">
					<option value=""><?php esc_html_e( 'Deactivate Invoice', 'invoice-for-woocommerce' ); ?></option>
					<option value="yes_order_list" <?php selected( get_post_meta( get_the_ID(), 'ifv_activate_invoice', true ), 'yes_order_list' ); ?>><?php esc_html_e( 'Activate Invoice to order list', 'invoice-for-woocommerce' ); ?></option>
				</select>
				<br>
				<br>
			

			
			<?php

				
				
		}
			?>	
		</td>
	</tr>
<?php } else {
		echo "<br>"; esc_html_e( 'This option is only available for completed orders.', 'invoice-for-woocommerce' ); 
}

?>
	</table>
    <?php
	require_once( plugin_dir_path( __FILE__ ) . 'invoice-original.php' );
}

// Save Field
add_action('save_post', 'invoice_for_woocommerce_save_postdata');
function invoice_for_woocommerce_save_postdata($post_id) {
    if ( array_key_exists( 'get_date_created', $_POST ) ) { update_post_meta( $post_id, 'get_date_created', sanitize_text_field( $_POST['get_date_created'] ) ); }
	if ( array_key_exists( 'get_date_complate', $_POST ) ) { update_post_meta( $post_id, 'get_date_complate', sanitize_text_field( $_POST['get_date_complate'] ) ); }
	if ( array_key_exists( 'invoice_number', $_POST ) ) { update_post_meta( $post_id, 'invoice_number', sanitize_text_field( $_POST['invoice_number'] ) ); }
	if ( array_key_exists( 'ifv_customer', $_POST ) ) { update_post_meta( $post_id, 'ifv_customer', sanitize_text_field( $_POST['ifv_customer'] ) ); }
	if ( array_key_exists( 'ifv_city', $_POST ) ) { update_post_meta( $post_id, 'ifv_city', sanitize_text_field( $_POST['ifv_city'] ) ); }
	if ( array_key_exists( 'ifv_address', $_POST ) ) { update_post_meta( $post_id,'ifv_address', sanitize_text_field( $_POST['ifv_address'] ) ); }
	if ( array_key_exists( 'ifv_order_id', $_POST ) ) { update_post_meta( $post_id, 'ifv_order_id', sanitize_text_field( $_POST['ifv_order_id'] ) ); }
	if ( array_key_exists( 'ifv_customer_name', $_POST ) ) { update_post_meta( $post_id, 'ifv_customer_name', sanitize_text_field( $_POST['ifv_customer_name'] ) ); }
	if ( array_key_exists( 'ifv_customer_product', $_POST ) ) { update_post_meta( $post_id, 'ifv_customer_product', sanitize_text_field( $_POST['ifv_customer_product'] ) ); }
	if ( array_key_exists( 'ifv_get_total', $_POST ) ) { update_post_meta( $post_id, 'ifv_get_total', sanitize_text_field( $_POST['ifv_get_total'] ) ); }
	if ( array_key_exists( 'ifv_get_price', $_POST ) ) { update_post_meta( $post_id, 'ifv_get_price',  sanitize_text_field( $_POST['ifv_get_price'] ) ); }
	if ( array_key_exists( 'ifv_get_fee', $_POST ) ) { update_post_meta( $post_id,'ifv_get_fee', sanitize_text_field( $_POST['ifv_get_fee'] ) ); }
	if ( array_key_exists( 'ifv_get_procent', $_POST ) ) { update_post_meta( $post_id, 'ifv_get_procent', sanitize_text_field( $_POST['ifv_get_procent'] ) ); }
	if ( array_key_exists( 'ifv_place', $_POST)) { update_post_meta( $post_id, 'ifv_place', sanitize_text_field($_POST['ifv_place']) ); }
	if ( array_key_exists( 'ifv_get_payment_method', $_POST ) ) { update_post_meta( $post_id, 'ifv_get_payment_method', sanitize_text_field( $_POST['ifv_get_payment_method'] ) ); }
	if ( array_key_exists( 'ifv_get_is_EU', $_POST ) ) { update_post_meta( $post_id,'ifv_get_is_EU', sanitize_text_field( $_POST['ifv_get_is_EU'] ) ); }
	if ( array_key_exists( 'ifv_get_base_price', $_POST ) ) { update_post_meta( $post_id, 'ifv_get_base_price', sanitize_text_field( $_POST['ifv_get_base_price']) );}
	if ( array_key_exists( 'ifv_get_footer_all_country', $_POST ) ) { update_post_meta($post_id,'ifv_get_footer_all_country', sanitize_text_field( $_POST['ifv_get_footer_all_country'] ) ); }
	if ( array_key_exists( 'ifv_get_with_vat_EU', $_POST ) ) { update_post_meta( $post_id,  'ifv_get_with_vat_EU',  sanitize_text_field( $_POST['ifv_get_with_vat_EU'] ) ); }
	if ( array_key_exists( 'ifv_activate_invoice', $_POST ) ) { update_post_meta( $post_id,'ifv_activate_invoice', sanitize_text_field( $_POST['ifv_activate_invoice'] ) ); }
	if ( array_key_exists( 'ifv_activate_invoice_1', $_POST ) ) { update_post_meta( $post_id,'ifv_activate_invoice_1', sanitize_text_field( $_POST['ifv_activate_invoice_1'] ) ); }
	if ( array_key_exists( 'ifv_vat_id', $_POST ) ) { update_post_meta( $post_id, 'ifv_vat_id', sanitize_text_field( $_POST['ifv_vat_id'] ) ); }
	if ( array_key_exists( 'ifv_get_exchange_rate', $_POST ) ) { update_post_meta( $post_id, 'ifv_get_exchange_rate', sanitize_text_field( $_POST['ifv_get_exchange_rate'] ) ); }
	if ( array_key_exists( 'ifv_get_fee_exchange_rate', $_POST ) ) { update_post_meta( $post_id,'ifv_get_fee_exchange_rate', sanitize_text_field( $_POST['ifv_get_fee_exchange_rate'] ) ); }
	if ( array_key_exists( 'ifv_sent_email', $_POST ) ) { update_post_meta( $post_id,'ifv_sent_email', sanitize_text_field( $_POST['ifv_sent_email'] ) ); }
	if ( array_key_exists( 'ifv_all_products', $_POST ) ) { update_post_meta( $post_id, 'ifv_all_products', sanitize_text_field( $_POST['ifv_all_products'] ) ); }
	if ( array_key_exists( 'vat_number', $_POST ) ) { update_post_meta( $post_id, 'vat_number', sanitize_text_field( $_POST['vat_number'] ) ); }
	if ( array_key_exists( 'ifv_download_invoice', $_POST ) ) { update_post_meta( $post_id, 'ifv_download_invoice', sanitize_text_field( $_POST['ifv_download_invoice'] ) ); }
	if ( array_key_exists( 'gr_code_add', $_POST ) ) { update_post_meta( $post_id, 'gr_code_add', sanitize_text_field( $_POST['gr_code_add'] ) ); }
}