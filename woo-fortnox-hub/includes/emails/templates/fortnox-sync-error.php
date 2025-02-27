<?php
/**
 * Fortnox Sync Error email (HTML)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/fortnox-sync-error.php.
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

<p><?php printf( esc_html__( 'A Fortnox sync error has occurred on your website %s.', 'woo-fortnox-hub' ), get_bloginfo( 'name', 'display' ) ); ?></p>
<p><?php esc_html_e( 'Error details:', 'woo-fortnox-hub' ); ?></p>
<p><strong><?php echo esc_html( $error_message ); ?></strong></p>
<p><?php esc_html_e( 'Please check your Fortnox integration settings and resolve this issue as soon as possible.', 'woo-fortnox-hub' ); ?></p>

<?php
/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );

