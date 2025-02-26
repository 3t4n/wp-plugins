<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// define
define( 'AZOADS_MENU', array( 'Ads', 'Settings', 'Reports', 'Support' ) );
$current_page_slug = azoads_get_param_from_url( 'page' );
?>
<div class="azo-ads-container">
	<div class="azo-ads-wrapper">
		<div class="azo-ads-header">
			<div class="azo-ads-brands">
				<img src="<?php echo esc_html( AZOADS_BASE_URL ); ?>/assets/images/azo-ads-logo.svg" alt="<?php esc_html_e( 'AZO Ads', 'azo-ads' ); ?>">
				<h3><?php esc_html_e( 'AZO Ads', 'azo-ads' ); ?><?php echo ( defined( 'AZOADS_PRO_VERSION' ) ? ' <span class="pro-activated">Pro</span>' : '' ); ?></h3>
				<?php if ( ! defined( 'AZOADS_PRO_VERSION' ) ) : ?>
				<a class="upgrade-to-pro-btn" href="https://my.azonow.com/cart/?add-to-cart=2214" target="_blank"><?php esc_html_e( 'Upgrade to Pro', 'azo-ads' ); ?></a>
				<?php endif; ?>
			</div>
			<ul class="azo-ads-menu">
				<?php
				foreach ( AZOADS_MENU as $menu_item ) :
					$page_slug = AZOADS_SLUG . '-' . strtolower( $menu_item );
				?>
				<li<?php echo ( $page_slug == $current_page_slug ) ? ' class="active"' : ''; ?>>
					<a href="admin.php?page=<?php echo esc_html( $page_slug ); ?>"><?php echo esc_html( $menu_item ); ?></a>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<?php
		if ( defined( 'AZOADS_PRO_VERSION' ) ) :
			$license = new AZOAds_Pro_License;
			if ( ! $license->isValid() ) :
		?>
		<div class="azo-ads-activate-your-key"><?php esc_html_e( 'Thank you for choosing AZO Ads Pro. Please use your key to activate the license.', 'azo-ads' ); ?></div>
		<?php
			endif;
		endif;
		?>