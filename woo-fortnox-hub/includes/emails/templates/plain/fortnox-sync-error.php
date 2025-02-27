<?php
/**
 * Fortnox Sync Error email (plain text)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/plain/fortnox-sync-error.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails\Plain
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n";
echo esc_html( wp_strip_all_tags( $email_heading ) );
echo "\n=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n\n";

printf( esc_html__( 'A Fortnox sync error has occurred on your website %s.', 'woo-fortnox-hub' ), get_bloginfo( 'name', 'display' ) );
echo "\n\n";

esc_html_e( 'Error details:', 'woo-fortnox-hub' );
echo "\n\n";

echo esc_html( $error_message );
echo "\n\n";

esc_html_e( 'Please check your Fortnox integration settings and resolve this issue as soon as possible.', 'woo-fortnox-hub' );
echo "\n\n";

echo wp_kses_post( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) );

