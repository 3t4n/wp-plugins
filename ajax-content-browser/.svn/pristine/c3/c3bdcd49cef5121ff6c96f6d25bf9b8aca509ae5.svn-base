<?php
/**
 * Admin View: About
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="wrap about-wrap full-width-layout">

	<?php include_once( 'html-admin-header.php' ); ?>

	<div class="headline-feature">
		<h2><?php esc_html_e( 'Default usage', 'acb' ); ?></h2>
		<p class="lead-description"><?php esc_html_e( 'Show your blog posts, Woo products, EDD downloadables, or any custom post type, beautifully.', 'acb' ); ?></p>
		<div class="inline-svg aligncenter">
			<img src="<?php echo acb()->plugin_url(); ?>/assets/images/acb.png" alt="" style="width:auto;">
		</div>
	</div>

	<div class="feature-section is-wide has-2-columns is-wider-right">
		<div class="column">
			<div class="inline-svg aligncenter">
				<img src="<?php echo acb()->plugin_url(); ?>/assets/images/woo.png" alt="">
			</div>
		</div>
		<div class="column is-vertically-aligned-center">
			<h3><?php esc_html_e( 'WooCommerce Integration', 'acb' ); ?></h3>
			<p><?php printf( wp_kses_post( __( 'Want to show your awesome <strong>WooCommerce</strong> products? You can customize the shortcode options to add the product post type. <code>[acb post_type="product"]</code> Yay! That is easy!', 'acb' ) ) ); ?></p>
		</div>
	</div>

	<div class="feature-section is-wide has-2-columns is-wider-left">
		<div class="column is-vertically-aligned-center">
			<h3><?php esc_html_e( 'Easy Digital Downloads Integration', 'acb' ); ?></h3>
			<p><?php printf( wp_kses_post( __( 'ACB integrates automatically with <strong>Easy Digital Downloads</strong> to display your downloadable products in any grid. <code>[acb post_type="download"]</code> will show EDD products.', 'acb' ) ) ); ?></p>
		</div>
		<div class="column">
			<div class="inline-svg aligncenter">
				<img src="<?php echo acb()->plugin_url(); ?>/assets/images/edd.png" alt="">
			</div>
		</div>
	</div>

	<hr>

	<h3 class="aligncenter"><?php esc_html_e( 'How does it work?', 'acb' ); ?></h3>
	<div class="has-2-columns is-fullwidth">
		<div class="column">
			<h4><?php esc_html_e( 'Basic integration', 'acb' ); ?></h4>
			<p><?php printf( wp_kses_post( __( 'The basic integration will show your blog posts by default. Add the shortcode <code>[acb]</code> to any page to embed an AJAX grid to that page.', 'acb' ) ) ); ?></p>
		</div>
		<div class="column">
			<h4><?php esc_html_e( 'Customization options', 'acb' ); ?></h4>
			<p><?php echo sprintf( wp_kses_post( __( 'The <code>[acb]</code> comes with many customization parameters to help you take control over every aspect in the grid. See the <a href="%s">docs</a>.', 'acb' ) ), esc_url( admin_url( 'admin.php?page=acb-docs' ) ) ); ?></p>
		</div>
	</div>

	<hr>

	<div class="return-to-dashboard">
		<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=page' ) ); ?>"><?php esc_html_e( 'Embed your first AJAX grid &rarr;', 'acb' ); ?></a>
	</div>

</div>