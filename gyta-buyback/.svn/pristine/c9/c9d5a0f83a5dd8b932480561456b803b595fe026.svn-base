<?php
/**
 * Customer on-hold order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-on-hold-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php
$text_to_display = get_option( 'wcpti_settings_order_placed_local_drop_off' );
if($text_to_display=='') {
	$text_to_display = 'Thanks for your order.  Please drop off your item(s) during our normal business hours.';
}
?>

<?php /* translators: %s: Customer first name */ ?>
<p><?php printf( esc_html__( 'Hi %s,', 'woocommerce' ), esc_html( $order->get_billing_first_name() ) ); ?></p>
<p>
	<?php
		$wcpti_easypost_postage_label_png_url = $order->get_meta('_wcpti_easypost_postage_label_png_url');
		if($wcpti_easypost_postage_label_png_url!='') {
			//esc_html_e( 'Thanks for your order. It’s on-hold until we confirm that payment has been received. In the meantime, here’s a reminder of what you ordered:', 'woocommerce' );
			//esc_html_e( 'Thanks for your order.  Please <a href="'.$wcpti_easypost_postage_label_png_url.'">print your shipping label</a> and package your item(s) below carefully!', 'woocommerce' );
			?>
				Thanks for your order.  Please <a href="<?php echo $wcpti_easypost_postage_label_png_url ?>">print your shipping label</a> and package your item(s) below carefully!
			<?php
		} else if(isLocalPickup($order)) {
			esc_html_e( $text_to_display, 'woocommerce' );

		} else if(get_option( 'wcpti_settings_vpfi_use_easypost' )!='no') {
			
			$wcpti_easypost_error = $order->get_meta('_wcpti_easypost_error');
			$html = 'Thanks for your order.  Something went wrong with your shipping label.';
			if($wcpti_easypost_error!='') {
				$html .= ' The error was: '.$wcpti_easypost_error;
			}
			$html .= ' Please contact us to get a copy of your shipping label.';
			esc_html_e( $html, 'woocommerce' );
		} else {
			// No label, no local pickup, no shipping being used here at all.
		}
	?>
</p>

<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
