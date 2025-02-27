<div class="wrap">
    <div id="icon-themes" style="display: inline-block; vertical-align: middle; width:30px;"><img
                src="<?php echo COUPON_PLUGIN_URL . 'assets/images/icon.png'; ?>" style="max-width: 100%"></div>
    <h2 style="display: inline-block;"><?php _e( 'Coupon Plugin Setting Options', COUPON_PLUGIN_TEXT_DOMAIN ); ?></h2>
	<?php settings_errors(); ?>
	<?php
	$active_tab = 'general_settings';
	if ( isset( $_GET['tab'] ) ) {
		$active_tab = $_GET['tab'];
	}
	?>
    <div class="cp-tabs">
        <nav>
            <ul class="cp-tabs-navigation">
                <li><a href="?post_type=coupon&page=coupon-plugin-setting&tab=general_settings"
						<?php echo $active_tab == 'general_settings' ? 'class="selected"' : ''; ?>><?php _e( 'General', COUPON_PLUGIN_TEXT_DOMAIN ); ?></a>
                </li>
				<?php if ( ! function_exists( 'CouponPluginPro\coupon_plugin_pro_init' ) ) { ?>
                    <li><a href="?post_type=coupon&page=coupon-plugin-setting&tab=pro_settings"
							<?php echo $active_tab == 'pro_settings' ? 'class="selected"' : ''; ?>><?php _e( 'Go Pro', COUPON_PLUGIN_TEXT_DOMAIN ); ?></a>
                    </li>
				<?php } ?>
            </ul> <!-- cp-tabs-navigation -->
        </nav>
        <ul class="cp-tabs-content">
            <li class="selected">
				<?php if ( $active_tab == 'general_settings' ) { ?>
                    <form method="post" action="options.php">
						<?php settings_fields( 'coupon-plugin-options' ); ?>
						<?php CouponPlugin\Custom\Admin\custom_do_settings_sections( 'coupon-plugin-setting' ); ?>
						<?php submit_button(); ?>

                    </form>
				<?php } elseif ( $active_tab == 'pro_settings' ) {
					$current_user = wp_get_current_user();
					include( COUPON_PLUGIN_PATH . 'src/custom/admin/view/feature.php' );
				} ?>
            </li>
        </ul>
    </div>
</div>