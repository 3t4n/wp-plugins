<?php
/**
 * Template: single-product
 *
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @version           1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div id="content" class="">
	<?php

	/**
	 * Woocommerce woocommerce_before_main_content hook
	 */
	do_action( 'woocommerce_before_main_content' );
	while ( have_posts() ) :
		the_post();
		if ( has_action( 'awsa_quick_buy_display_single_product' ) ) {
			do_action( 'awsa_quick_buy_display_single_product', $product_id );
		} else {
			wc_get_template_part( 'content', 'single-product' );
		}

	endwhile;

	/**
	 * Woocommerce woocommerce_after_main_content hook
	 */
	do_action( 'woocommerce_after_main_content' );
	?>
</div>
