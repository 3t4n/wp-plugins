<div class="wrap">
    <div id="icon-themes" style="display: inline-block; vertical-align: middle;"><img
                src="<?php echo AFFILIATE_COUPON_LITE_URL . 'assets/images/coupon-icon.png'; ?>"></div>
    <h2 style="display: inline-block;"><?php _e( 'Coupon Plugin Setting Options', 'affiliate-coupon-lite'); ?></h2>
	<?php settings_errors(); ?>
	<?php
	$active_tab = 'general_settings';
	if ( isset( $_GET['tab'] ) ) {
		$active_tab = sanitize_text_field($_GET['tab']);
	}
	?>
    <div class="cp-tabs">
        <nav>
            <ul class="cp-tabs-navigation">
                <li><a href="?post_type=coupon&page=coupon-plugin-setting&tab=general_settings"
						<?php echo esc_attr($active_tab) == 'general_settings' ? 'class="selected"' : ''; ?>><?php _e( 'General', 'affiliate-coupon-lite'); ?></a>
                </li>
				<?php if ( ! function_exists( 'CouponPluginPro\affiliate_coupon_lite_pro_init' ) ) { ?>
                    <li><a href="?post_type=coupon&page=coupon-plugin-setting&tab=pro_settings"
							<?php echo esc_attr($active_tab) == 'pro_settings' ? 'class="selected"' : ''; ?>><?php _e( 'Go Pro', 'affiliate-coupon-lite'); ?></a>
                    </li>
				<?php } ?>
            </ul> <!-- cp-tabs-navigation -->
        </nav>
        <ul class="cp-tabs-content">
            <li class="selected">
				<?php if ( $active_tab == 'general_settings' ) { ?>
                    <form method="post" action="options.php">
						<?php settings_fields( 'coupon-plugin-options' ); ?>
						<?php AffiliateCoupon\Custom\Admin\custom_do_settings_sections( 'coupon-plugin-setting' ); ?>
						<?php submit_button(); ?>

                    </form>
				<?php } elseif ( $active_tab == 'pro_settings' ) {
					$current_user = wp_get_current_user();
					include( AFFILIATE_COUPON_LITE_PATH . 'src/custom/admin/view/feature.php' );
				} ?>
            </li>
        </ul>
    </div>
</div>
