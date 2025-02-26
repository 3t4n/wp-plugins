<?php
/**
 * Template: quick-buy
 *
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @version           1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$settings = awsa_quick_buy_get_settings();
?>
<html>
	<head>
		<style>
			body{background: white;}
			#aw-content{
				padding: 10px;
				max-width: 1024px;
				margin: auto;
			}
			.awsa-product-search{text-align: center;}
			.awsa-product-search #aw-logo{
				text-align: center;
				padding: 10px;
			}

			.awsa-product-search #aw-logo #logo{
				width: 100px;
				height: auto;
			}
		</style>
		<?php
		/**
		 * WordPress wp_head hook
		 */
		wp_head();
		?>
	</head>
	<body class="<?php echo join( ' ', get_body_class() ); ?>">
		<div id="aw-content" class="wrap">
			<?php
			/**
			 * $sku used in templates
			 */
			$sku_var = get_query_var( 'sku' );
			$sku     = awsa_fa_to_en_number(
				sanitize_text_field( $sku_var )
			);
			if ( ! empty( $sku ) ) {
				$product_id = wc_get_product_id_by_sku( $sku );
			}

			if ( $product_id ) {
				global $wp_query;
				$wp_query = new WP_Query(
					array(
						'p'              => $product_id,
						'post_type'      => 'product',
						'post_status'    => 'publish',
						'posts_per_page' => 1,
					)
				);
			}
			if ( ! $product_id || ( $product_id && 'yes' !== $settings['hide-search-form-after-find'] ) ) {
				require AWSA_QUICK_BUY_TEMPLATES . 'search-product-template.php';
			}

			if ( $product_id ) {
				require AWSA_QUICK_BUY_TEMPLATES . 'single-product-template.php';
			} elseif ( ! empty( $sku_var ) ) {
				echo '<div class="awsa-product-not-found" style="color:red">' . esc_html__( 'Product not found', 'awsa-quick-buy' ) . '</div>';
			}
			?>
		</div>
	<?php
	/**
	 * WordPress wp_footer hook
	 */
	wp_footer();
	?>
	</body>
</html>
