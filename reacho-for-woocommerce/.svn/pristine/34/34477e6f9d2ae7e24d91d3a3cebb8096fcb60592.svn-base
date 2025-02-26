<?php
/**
 * ReachoWooCommerce Oauth Partial.
 *
 * @package   Reacho_WooCommerce
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="wcr-settings" xmlns="http://www.w3.org/1999/html">
	<div class="wcr-content-wrapper" style="background: transparent">
		<div class="wcr-content">
			<div class="wcr-logo" style="display: flex;align-items: center;padding-left: 20px;">
				<img src="<?php echo esc_url( REACHO_URL ); ?>admin/images/logo.png" height="120" width="120">
			</div>
			<div class="wcr-connect-wrapper">
				<div class="wcr-content-subtitles">
                    <span class="wcr-content-title">Click the ‘Authorize’ button below to connect Reacho WooCommerce to your WordPress account</span>
<!--                    <span class="wcr-content-subtitle">New to Reacho and want to learn more? Check out our <a class="subtitle-guide-link" href="https://help.reacho.com/hc/en-us/articles/115005255808-How-to-Integrate-with-WooCommerce" target="_blank">How to Integrate with WooCommerce guide.</a> </span>-->
                    <div class="connect-buttons" style="margin-top: 0">
                        <fieldset class="connect-button">
                            <a id="wcr_oauth_connect" class="button button-primary <?php echo is_ssl() ?  '' : 'wcr-disabled'; ?>" <?php echo is_ssl() ?  'href="' . esc_url(  home_url() . '/wc-auth/v1/authorize?app_name=reacho-woocommerce&scope=read_write&user_id=' . get_current_user_id() . '&return_url=' . $this->return_url() . '&callback_url=' .$this->callback_url() ) . '"' : ''; ?>>Authorize</a>
                        </fieldset>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
