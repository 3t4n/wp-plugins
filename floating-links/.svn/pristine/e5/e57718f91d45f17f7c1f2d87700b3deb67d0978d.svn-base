<?php
/**
* Admin View: Page - Social Icons
*/
if ( ! defined( 'ABSPATH' ) ) {
exit;
}

?>
<div id="floating-links" class="fl">
    <div class="fl-wrapper">
        <div class="fl-header-wrapper">
            <div class="fl-header">
                <img class="fl-logo" src="<?php echo FLOATING_LINKS_URL . 'admin/assets/images/plugin-logo.png'; ?>" alt="Floating Links logo">
                <div class="fl-header-left">
                    <nav class="fl-header-menu">
                        <ul>
                            <li>
                                <a class="active" href="<?php echo esc_url( admin_url( 'admin.php?page=floating-links-social-icons' ) ); ?>">
									<?php esc_html_e('Settings', 'floating-links'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="disabled" disabled="disabled">
									<?php esc_html_e('Design (Coming Soon)', 'floating-links'); ?>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="fl-header-right">
                    <a href="<?php echo esc_url( admin_url('admin.php?page=floating_links') ); ?>"><?php esc_html_e('Floating Links', 'floating-links'); ?></a>
                    <?php if( ! fl_fs()->is_premium() ) { ?>
                        <a href="<?php echo esc_url( fl_fs()->get_upgrade_url() ); ?>" class="button button-black" target="_blank"><?php esc_html_e('Go Pro', 'floating-links'); ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="fl-content-wrapper">
            <div class="fl-settings-box">
                <div class="fl-settings-wrapper">
                    <h3><?php esc_html_e('Visibility Control', 'floating-links'); ?></h3>
                    <form class="fl_social_icons_form" id="fl_social_icons_form" name="fl_social_icons_form">
                    <div id="fl-social-icons" class="fl-settings-container <?php echo esc_attr( $plan_class ); ?>">
						<?php
						if( isset( $settings['networks'] ) ) {
                            foreach ( $settings['networks'] as $network ) {
                            ?>
                                <div class="fl-setting" id="<?php esc_attr_e( $network['id'] ); ?>">
                                    <div class="fl-setting-label">
                                        <div class="fl-reorder-icon <?php if( 'fl-free' == $plan_class ) { echo esc_attr( $plan_class ); echo ' fl-modal-trigger'; } ?>" <?php if( 'fl-free' == $plan_class ) { ?> href="#fl-drag-drop-upgrade" <?php } ?>>
                                            <span title="<?php esc_attr_e('Drag and drop to reorder', 'floating-links'); ?>" class="dashicons dashicons-sort"></span>
                                        </div>
                                        <span><?php echo esc_html( $network['name'] ); ?></span>
                                    </div>
                                    <div class="fl-setting-checkbox">
                                        <label class="fl-switch">
                                            <input type="checkbox" <?php checked( 'on', $network['enabled'] );  ?> name="networks[<?php echo esc_attr( $network['id'] ); ?>][enabled]"  data-option="<?php echo esc_attr( $network['id'] ); ?>" class="fl_social_network_options">
                                            <span class="fl-slider fl-round"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="networks[<?php echo esc_attr( $network['id'] ); ?>][name]" value="<?php echo esc_attr( $network['name'] ); ?>">
                                    <input type="hidden" name="networks[<?php echo esc_attr( $network['id'] ); ?>][id]" value="<?php echo esc_attr( $network['id'] ); ?>">
                                    <input type="hidden" name="networks[<?php echo esc_attr( $network['id'] ); ?>][icon]" value="<?php echo esc_attr( $network['icon'] ); ?>">
                                </div>
								<?php
							}
                        } ?>
                    </div>
                    </form>
                </div>
            </div>
            <div class="fl-settings-box">
                <div class="fl-settings-wrapper">
                    <h3><?php esc_html_e('Advanced Settings', 'floating-links'); ?></h3>
                    <div id="fl-main-bar" class="fl-settings-container">
                        <div class="fl-setting">
                            <div class="fl-setting-label">
                                <span><?php esc_html_e('Minimizer', 'floating-links' ); ?></span>
                                <span class="dashicons dashicons-info-outline fl-tooltip" title="<?php esc_attr_e('Enable show and hide feature for social bar', 'floating-links' ); ?>."></span>
                            </div>
                            <div class="fl-setting-checkbox">
                                <label class="fl-switch">
                                    <input type="checkbox" <?php if( isset( $settings['enable_minimizer'] ) ) { checked( 'on', $settings['enable_minimizer'] ); } ?> id="fl_minimizer" data-option="enable_minimizer" class="fl_social_options">
                                    <span class="fl-slider fl-round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fl-notification-holder"><?php esc_html_e( 'Saved', 'floating-links' ); ?></div>
	<?php if ( fl_fs()->is_free_plan() ) { ?>
        <div id="fl-drag-drop-upgrade" class="fl-modal fadeIn">
        <div class="fl-modal-content">
            <div class="fl-modal-wraper">
                <span class="fl-lock-icon"><span class="dashicons dashicons-lock"></span></span>
                <h5><?php esc_html_e( 'Premium Feature', 'floating-links' ); ?></h5>
                <p>
					<?php esc_html_e( "Unlock the Full Experience! The drag and drop feature you tried is part of our Premium package. Upgrade now to unleash this and many other exciting features, turning your workflow into a breeze. Don’t miss out on elevating your experience to the next level!", 'floating-links' ); ?>
                </p>
                <p><?php esc_html_e( 'Upgrade today and get ' . $upgrade_info['discount'] . ' discount! On the checkout click on "Have a promotional code?', 'floating-links' ); ?></br>
					<?php if ( $upgrade_info['coupon'] ) { ?>
                        <code><?php esc_html_e( $upgrade_info['coupon'] ); ?></code>
					<?php } ?>
                </p>
                <hr/>
                <a href="<?php echo esc_url( $upgrade_info['btn_url'] ); ?>" class="btn">
					<?php esc_html_e( $upgrade_info['btn_text'] ); ?>
                </a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
