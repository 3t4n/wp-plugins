<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Add settings panel to ACh Tag Manager plugin.
function achtm_option_page() {

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die();
	}

	?>
	<div class="ach-header"><h2 class="ach-toolkit-header"><?php echo _e('ACh Tag Manager', 'ach-tag-manager'); ?> <span class="ach-version">1.0.0</span></h2></div>
	<div class="ach-description"><p><?php echo _e('ACh Tag Manager is a free tool for everyone to manage Global Site Tag, Google Tag Manager, and Google Analytics.', 'ach-tag-manager'); ?></p></div>
	<?php
	// Update GA and Tag Manager settings
	if( isset($_POST['achtm_submit_btn']) && isset($_POST['achtm_nonce']) && wp_verify_nonce($_POST['achtm_nonce'], 'achtm_security')) {
		$success = '';
		
		$measurement_id = sanitize_text_field($_POST['acga_measurement_id']);
		if( $measurement_id != ''){
			update_option( 'achtm_google_measurement_id', $measurement_id );
		}
		else{
			delete_option( 'achtm_google_measurement_id' );
		}
		$analytics_code = sanitize_text_field($_POST['acga_analytics_code']);
		if( $analytics_code != ''){
			update_option( 'achtm_google_anaytics_code', $analytics_code );
		}
		else{
			delete_option( 'achtm_google_anaytics_code' );
		}
		$tagmanager_id = sanitize_text_field($_POST['actag_manager_id']);
		if( $tagmanager_id != ''){
			update_option( 'achtm_tag_manager_id', $tagmanager_id );
		}
		else{
			delete_option( 'achtm_tag_manager_id' );
		}
		if( $success == ''){
			$success .= '<div class="updated notice notice-success is-dismissible below-h2" id="ach-message"><p><strong>'.__('Settings Updated. Please clear cache if you have a cache service.','ach-tag-manager').'</strong></p></div>';
		}
	}
    if( isset($success )){ echo $success; }
    ?>
<div class="ach-wrapper">
	<div id="ach-tabs" style="display:none">
	<ul>
		<li><a href="#googleatm"><?php esc_html_e( 'Settings', 'ach-tag-manager' ); ?></a></li>
		<li><a href="#support"><?php esc_html_e( 'Support', 'ach-tag-manager' ); ?></a></li>
	</ul>
	
	<!-- =================================== Settings =================================== -->

	<div id="googleatm">
    <form action="<?php echo basename($_SERVER['REQUEST_URI']); ?>" method="post">
        <?php wp_nonce_field('achtm_security', 'achtm_nonce'); ?>
        <table class="form-table" role="presentation">
            <tbody>
				<tr>
                    <th scope="row"><label for="set_google_measurement_id"><?php _e('GA4 Measurement ID:', 'ach-tag-manager'); ?></label>
                    </th>
                    <td>
                        <?php 
                            $ac_measurement_id = '';
                            //get default
                            if( get_option( 'achtm_google_measurement_id' ) ) {
                                $ac_measurement_id = get_option( 'achtm_google_measurement_id' );
                            }
                        ?>
                        <input name="acga_measurement_id" type="text" id="acga_measurement_id" value="<?php echo $ac_measurement_id; ?>" class="regular-text">
                        <p class="description" id="acga_measurement_id-description"><?php _e('It looks like: <strong>G-XXXXXXXXXX</strong>', 'ach-tag-manager'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="set_google_anaytics_code"><?php _e('Google Anaytics ID:', 'ach-tag-manager'); ?></label>
                    </th>
                    <td>
                        <?php 
                            $ac_anaytics_code = '';
                            //get default
                            if( get_option( 'achtm_google_anaytics_code' ) ) {
                                $ac_anaytics_code = get_option( 'achtm_google_anaytics_code' );
                            }
                        ?>
                        <input name="acga_analytics_code" type="text" id="acga_analytics_code" value="<?php echo $ac_anaytics_code; ?>" class="regular-text">
                        <p class="description" id="acga_analytics_code-description"><?php _e('It looks like: <strong>UA-XXXXXXXXX-Y</strong>', 'ach-tag-manager'); ?></p>
                    </td>
                </tr>
				<tr>
                    <th scope="row"><label for="set_google_tag_manager_id"><?php _e('Google Tag Manager ID:', 'ach-tag-manager'); ?></label>
                    </th>
                    <td>
                        <?php 
                            $achtag_manager_id = '';
                            //get default
                            if( get_option( 'achtm_tag_manager_id' ) ) {
                                $achtag_manager_id = get_option( 'achtm_tag_manager_id' );
                            }
                        ?>
                        <input name="actag_manager_id" type="text" id="actag_manager_id" value="<?php echo $achtag_manager_id; ?>" class="regular-text">
                        <p class="description" id="actag_manager_id-description"><?php _e('It looks like: <strong>GTM-XXXXXXX</strong>', 'ach-tag-manager'); ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
		<p class="ac-footer"><input type="submit" name="achtm_submit_btn" id="achtm_submit_btn" class="button button-primary" value="<?php _e('Update Settings', 'ach-tag-manager'); ?>"></p>
    </form>
	</div>
	
	<!-- =================================== Support =================================== -->

	<div id="support">
		<div class="ach-help support-ach">
			<div class="ac-support-row support-ach">
				<div class="ac-support-col">
					<div class="support-box">
						<h3 class="support-box-heading ac-support-heading"><i class="fa fa-question-circle"></i> <?php _e( 'Support', 'ach-tag-manager' ); ?></h3>
						<div class="ach-content">
							<div class="support-ach ac-support-about-text">
								<h2><?php _e( 'If you need assistance, see our help resources.', 'ach-tag-manager' ); ?></h2>
								<p><?php _e( 'Please make a search to find help with your problem, or head over to our support forum to ask a question.', 'ach-tag-manager' ); ?></p>
							</div>
							<div class="ac-support-row support-ach">
								<div class="ac-support-col">
									<a class="ac-support-forum-button" href="https://ach.li" target="_blank"><i class="fa fa-globe"></i><?php _e( 'Visit my site', 'ach-tag-manager' ); ?></a>
								</div>
								<div class="ac-support-col">
									<a class="ac-support-forum-button" href="mailto:hello@ach.li"><i class="fa fa-envelope"></i><?php _e( 'Send email', 'ach-tag-manager' ); ?></a>
								</div>
								<div class="ac-support-col">
									<a class="ac-support-forum-button" href="https://wordpress.org/support/plugin/ach-tag-manager" target="_blank"><i class="fa fa-comments"></i><?php _e( 'Support forum', 'ach-tag-manager' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="ac-support-col">
					<div class="ac-support-col ach-last">
						<div class="support-box">
							<h3 class="support-box-heading ac-support-heading"><i class="fa fa-heart"></i> <?php _e( 'About us', 'ach-tag-manager' ); ?></h3>
							<div class="ach-content">
								<div class="support-ach ac-support-about-text">
									<h3><?php _e( 'The ACh Tag Manager is a free tool for everyone to manage Global Site Tag, Google Tag Manager, and Google Analytics.', 'ach-tag-manager' ); ?></h3>
									<p><?php _e( 'The ACh Tag Manager was developed by <a class="ach-link-text" href="https://ach.li" target="_blank">ACh</a> and is <a class="ach-link-text" href="https://wordpress.org" target="_blank">available for free</a> on WordPress.', 'ach-tag-manager' ); ?></p>
									<p><?php _e( 'We work hard to give you an exceptional premium products and 5 star support. To show your appreciation you can buy us a coffee or simply by sharing or follow us on social media.', 'ach-tag-manager' ); ?></p>
								</div>
								<div class="support-ach ac-support-social-links">
									<ul>
										<li class="ach-buy-coffee"><a href="https://paypal.me/AChopani/10usd" target="_blank"><i class="fa fa-coffee"></i> <?php _e( 'Buy us a coffee', 'ach-tag-manager' ); ?></a></li>
										<li class="ach-facebook"><a href="#"><i class="fa fa-facebook-f"></i> <?php _e( 'Like us', 'ach-tag-manager' ); ?></a></li>
										<li class="ach-twitter"><a href="#"><i class="fa fa-twitter"></i> <?php _e( 'Tweet us', 'ach-tag-manager' ); ?></a></li>
										<li class="ach-rate"><a href="https://wordpress.org/support/plugin/ach-tag-manager/reviews"><i class="fa fa-thumbs-up"></i> <?php _e( 'Rate us', 'ach-tag-manager' ); ?></a></li>
									</ul>
								</div>
								<p class="footer-links"><a href="https://wordpress.org" class="ach-link">www.wordpress.org</a> | <a href="https://ach.li" class="ach-link">www.ach.li</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
<?php
}
?>