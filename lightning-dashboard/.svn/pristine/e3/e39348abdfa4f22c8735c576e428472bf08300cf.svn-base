<?php

/**
 * Tabs html file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
} ?>

<h2 id="ldash-tabs" class="nav-tab-wrapper">
	<a href="admin.php?page=lightning-dashboard&tab=orders" class="nav-tab<?php echo ( $tab == 'orders' ? ' nav-tab-active' : '' ); ?>"><?php _e( 'Orders', 'lightning-dashboard' ); ?></a>
	<a href="admin.php?page=lightning-dashboard&tab=products" class="nav-tab<?php echo ( $tab == 'products' ? ' nav-tab-active' : '' ); ?>"><?php _e( 'Products', 'lightning-dashboard' ); ?></a>
	<a href="admin.php?page=lightning-dashboard&tab=customers" class="nav-tab<?php echo ( $tab == 'customers' ? ' nav-tab-active' : '' ); ?>"><?php _e( 'Customers', 'lightning-dashboard' ); ?></a>
	<a href="admin.php?page=lightning-dashboard&tab=settings" class="nav-tab<?php echo ( $tab == 'settings' ? ' nav-tab-active' : '' ); ?>"><?php _e( 'Settings', 'lightning-dashboard' ); ?></a>
	<?php if( get_option( 'ldash_general_misc_external_tabs' ) == 'on' ) { ?>
		<a href="<?php echo LDASH_URL; ?>add-ons/" class="nav-tab" target="_blank"><?php _e( 'Add-Ons', 'lightning-dashboard' ); ?></a>
	<?php }
	if( get_option( 'ldash_general_misc_woocommerce_tab' ) == 'on' ) { ?>
		<div class="nav-tab with-menu"><?php _e( '...', 'lightning-dashboard' ); ?>
			<ul>
				<li><a href="edit-tags.php?taxonomy=product_cat&post_type=product"><?php _e( 'Categories', 'lightning-dashboard' ); ?></a></li>
				<li><a href="edit-tags.php?taxonomy=product_tag&post_type=product"><?php _e( 'Tags', 'lightning-dashboard' ); ?></a></li>
				<li><a href="edit.php?post_type=product&page=product_attributes"><?php _e( 'Attributes', 'lightning-dashboard' ); ?></a></li>
				<li><a href="edit.php?post_type=shop_coupon"><?php _e( 'Coupons', 'lightning-dashboard' ); ?></a></li>
				<li><a href="admin.php?page=wc-reports"><?php _e( 'Reports', 'lightning-dashboard' ); ?></a></li>
				<li><a href="admin.php?page=wc-settings"><?php _e( 'WooCommerce Settings', 'lightning-dashboard' ); ?></a></li>
			</ul>
		</div>
	<?php }
	if( get_option( 'ldash_general_appearance_display_logo' ) == 'on' ) {
		if( !empty( get_option( 'ldash_general_appearance_custom_logo' ) ) ) { ?>
			<a><img src="<?php echo wp_get_attachment_url( get_option( 'ldash_general_appearance_custom_logo' ) ); ?>" id="ldash-logo"></a>
		<?php } else { ?>
			<a href="admin.php?page=lightning-dashboard"><img src="<?php echo plugin_dir_url( __DIR__ ) . '../assets/images/logo.svg'; ?>" id="ldash-logo"></a>
		<?php } ?>
	<?php } ?>
	<span id="ldash-version"><?php echo LDASH_VERSION; ?></span>
</h2>