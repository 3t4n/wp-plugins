<?php
/**
 * Template: search-product
 *
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @version           1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$settings    = awsa_quick_buy_get_settings();
$logo_url    = $settings['logo'];
$page_title  = $settings['title'];
$description = $settings['description'];
?>
<div class="awsa-product-search">
	<form action="" method="post">
		<div id="aw-logo">
			<img id="logo" src="<?php echo esc_html( $logo_url ); ?>" >
		</div>
		<div>
			<h1><?php echo esc_html( $page_title ); ?></h1>
			<p><?php echo esc_html( $description ); ?></p>
		</div>
		<input name="awsa-product-sku" class="input-text" type="text" placeholder="<?php esc_attr_e( 'Enter the product SKU', 'awsa-quick-buy' ); ?>" value="<?php echo esc_attr( $sku ); ?>"/>
		<button id="awsa-btn-search-product" class="button"><?php esc_html_e( 'Search', 'awsa-quick-buy' ); ?></button>
	</form>
</div>
