<?php
defined( 'ABSPATH' ) || exit;

if ( isset( $_POST['wpcpu_prices'] ) ) {
	update_option( 'wpcpu_prices', Wpcpu_Helper()::sanitize_array( $_POST['wpcpu_prices'] ) );
}

$prices = (array) get_option( 'wpcpu_prices', [] );
?>
<div class="wpclever_settings_page wrap">
    <h1 class="wpclever_settings_page_title"><?php echo esc_html__( 'WPC Price by User Role', 'wpc-price-by-user-role' ) . ' ' . esc_html( WPCPU_VERSION ) . ' ' . ( defined( 'WPCPU_PREMIUM' ) ? '<span class="premium" style="display: none">' . esc_html__( 'Premium', 'wpc-price-by-user-role' ) . '</span>' : '' ); ?></h1>
    <div class="wpclever_settings_page_desc about-text">
        <p>
			<?php printf( /* translators: stars */ esc_html__( 'Thank you for using our plugin! If you are satisfied, please reward it a full five-star %s rating.', 'wpc-price-by-user-role' ), '<span style="color:#ffb900">&#9733;&#9733;&#9733;&#9733;&#9733;</span>' ); ?>
            <br/>
            <a href="<?php echo esc_url( WPCPU_REVIEWS ); ?>" target="_blank"><?php esc_html_e( 'Reviews', 'wpc-price-by-user-role' ); ?></a> |
            <a href="<?php echo esc_url( WPCPU_CHANGELOG ); ?>" target="_blank"><?php esc_html_e( 'Changelog', 'wpc-price-by-user-role' ); ?></a> |
            <a href="<?php echo esc_url( WPCPU_DISCUSSION ); ?>" target="_blank"><?php esc_html_e( 'Discussion', 'wpc-price-by-user-role' ); ?></a>
        </p>
    </div>
	<?php if ( isset( $_POST['settings-updated'] ) && $_POST['settings-updated'] ) { ?>
        <div class="notice notice-success is-dismissible">
            <p><?php esc_html_e( 'Settings updated.', 'wpc-price-by-user-role' ); ?></p>
        </div>
	<?php } ?>
    <div class="wpclever_settings_page_nav">
        <h2 class="nav-tab-wrapper">
            <a href="<?php echo esc_url( admin_url( 'admin.php?page=wpclever-wpcpu-global' ) ); ?>" class="nav-tab nav-tab-active">
				<?php esc_html_e( 'Settings', 'wpc-price-by-user-role' ); ?>
            </a>
        </h2>
    </div>
    <div class="wpclever_settings_page_content">
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <td colspan="2">
                        <div class="wpcpu-items-wrapper">
                            <div class="wpcpu-items wpcpu-roles">
								<?php
								$i = 0;

								foreach ( $prices as $key => $price ) {
									$active = $i === 0;
									include WPCPU_DIR . 'includes/templates/role-price.php';
									$i ++;
								}
								?>
                            </div>
                        </div>
						<?php include WPCPU_DIR . 'includes/templates/add-new.php'; ?>
                    </td>
                </tr>
                <tr class="submit">
                    <th colspan="2">
                        <input type="hidden" name="settings-updated" value="1"/>
						<?php submit_button(); ?>
                    </th>
                </tr>
            </table>
        </form>
    </div><!-- /.wpclever_settings_page_content -->
</div>
