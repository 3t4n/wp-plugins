<?php
/**
 * The template for displaying the Pro Dashboard permission denied
 *
 * Override this template by copying it to yourtheme/wc-vendors/dashboard/
 *
 * @var       $page_url          The permalink to the page
 * @var       $page_label        The page label for the menu item
 * @package    WCVendors_Pro
 * @version    1.0.3
 */
?>

<h1><?php esc_html_e( 'No Permission.', 'wc-vendors' ); ?></h1>

<a href="<?php echo esc_attr( $return_url ); ?>" class="button"><?php esc_html_e( 'Return to dashboard', 'wc-vendors' ); ?></a>
