<?php
/**
 * RealHomes PayPal Payments Settings.
 *
 * This class is used to initialize the settings page of this plugin.
 *
 * @since    1.0.0
 * @package  realhomes-paypal-payments
 */
if ( ! class_exists( 'Realhomes_Paypal_Payments_Settings' ) ) {
	/**
	 * Realhomes_Paypal_Payments_Settings
	 *
	 * Class for RealHomes PayPal Payments Settings. It is
	 * responsible for handling the settings page of the
	 * plugin.
	 *
	 * @since 1.0.0
	 */
	class Realhomes_Paypal_Payments_Settings {
		/**
		 * Add plugin settings page menu to the dashboard settings menu.
		 *
		 * @since  1.0.0
		 */
		public function settings_page_menu() {
			add_submenu_page(
				'easy-real-estate',
				esc_html__( 'PayPal Settings', 'realhomes-paypal-payments' ),
				esc_html__( 'PayPal Settings', 'realhomes-paypal-payments' ),
				'manage_options',
				'realhomes-paypal-settings',
				array( $this, 'render_settings_page' )
			);
		}

		/**
		 * Render settings on the settings page.
		 *
		 * @since  1.0.0
		 */
		public function render_settings_page() {
			$rpp_settings = get_option( 'rpp_settings' );
			?>
            <div id="realhomes-settings-wrap">
                <form action='options.php' method='post'>
                    <header class="settings-header">
                        <h1><?php esc_html_e( 'RealHomes PayPal Payments Settings', 'realhomes-paypal-payments' ); ?><span class="current-version-tag"><?php echo REALHOMES_PAYPAL_PAYMENTS_VERSION; ?></span></h1>
                        <p class="credit">
                            <a class="logo-wrap" href="https://themeforest.net/item/real-homes-wordpress-real-estate-theme/5373914?aid=inspirythemes" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" height="29" width="29" viewBox="0 0 36 41">
                                    <style>
                                        .a {
                                            fill: #4E637B;
                                        }

                                        .b {
                                            fill: white;
                                        }

                                        .c {
                                            fill: #27313D !important;
                                        }
                                    </style>
                                    <g>
                                        <path d="M25.5 14.6C28.9 16.6 30.6 17.5 34 19.5L34 11.1C34 10.2 33.5 9.4 32.8 9 30.1 7.5 28.4 6.5 25.5 4.8L25.5 14.6Z" class="a"></path>
                                        <path d="M15.8 38.4C16.5 38.8 17.4 38.8 18.2 38.4 20.8 36.9 22.5 35.9 25.5 34.2 22.1 32.2 20.4 31.3 17 29.3 13.6 31.3 11.9 32.2 8.5 34.2 11.5 35.9 13.1 36.9 15.8 38.4" mask="url(#mask-2)" class="a"></path>
                                        <path d="M24.3 25.1C25 24.7 25.5 23.9 25.5 23L25.5 14.6 17 19.5 17 29.3 24.3 25.1Z" fill="#C8ED1E"></path>
                                        <path d="M18.2 10.4C17.4 10 16.5 10 15.8 10.4L8.5 14.6 17 19.5 25.5 14.6 18.2 10.4Z" fill="#F9FAF8"></path>
                                        <path d="M8.5 23C8.5 23.9 8.9 24.7 9.7 25.1L17 29.3 17 19.5 8.5 14.6 8.5 23Z" fill="#88B2D7"></path>
                                        <path d="M8.5 14.6C5.1 16.6 3.4 17.5 0 19.5L0 11.1C0 10.2 0.5 9.4 1.2 9 3.8 7.5 5.5 6.5 8.5 4.8L8.5 14.6Z" mask="url(#mask-4)" class="a"></path>
                                        <path d="M34 27.9L34 19.5 25.5 14.6 25.5 23C25.5 23.4 25.4 23.8 25.1 24.2L33.6 29.1C33.8 28.7 34 28.3 34 27.9" fill="#5E9E2D"></path>
                                        <path d="M25.1 24.2C24.9 24.6 24.6 24.9 24.3 25.1L17 29.3 25.5 34.2 32.8 30C33.1 29.8 33.4 29.5 33.6 29.1L25.1 24.2Z" fill="#6FBF2C"></path>
                                        <path d="M17 10.1C17.4 10.1 17.8 10.2 18.2 10.4L25.5 14.6 25.5 4.8 18.2 0.6C17.8 0.4 17.4 0.3 17 0.3L17 10.1Z" fill="#BDD2E1"></path>
                                        <path d="M1.2 30L8.5 34.2 17 29.3 9.7 25.1C9.3 24.9 9 24.6 8.8 24.2L0.3 29.1C0.5 29.5 0.8 29.8 1.2 30" fill="#418EDA"></path>
                                        <path d="M8.8 24.2C8.6 23.8 8.5 23.4 8.5 23L8.5 14.6 0 19.5 0 27.9C0 28.3 0.1 28.7 0.3 29.1L8.8 24.2Z" fill="#3570AA"></path>
                                        <path d="M15.8 0.6L8.5 4.8 8.5 14.6 15.8 10.4C16.2 10.2 16.6 10.1 17 10.1L17 0.3C16.6 0.3 16.2 0.4 15.8 0.6" fill="#A7BAC8"></path>
                                    </g>
                                </svg>InspiryThemes
                            </a>
                        </p>
                    </header>
                    <div class="settings-content">
		                <?php settings_errors(); ?>
                        <div class="form-wrapper">
			                <?php settings_fields( 'rpp_settings_group' ); ?>
                            <table class="form-table">
                                <tbody>
                                <tr>
                                    <th scope="row">
						                <?php esc_html_e( 'PayPal Payments', 'realhomes-paypal-payments' ); ?>
                                    </th>
                                    <td>
						                <?php
						                $enable_paypal = ! empty( $rpp_settings['enable_paypal'] ) ? $rpp_settings['enable_paypal'] : '';
						                ?>
                                        <input id="rpp_settings[enable_paypal]" name="rpp_settings[enable_paypal]" type="checkbox" value="1" <?php checked( 1, $enable_paypal ); ?> />
                                        <label for="rpp_settings[enable_paypal]"><?php esc_html_e( 'Enable PayPal Payments for Submitted Property.', 'realhomes-paypal-payments' ); ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
						                <?php esc_html_e( 'Enable Sandbox', 'realhomes-paypal-payments' ); ?>
                                    </th>
                                    <td>
						                <?php
						                $enable_sandbox = ! empty( $rpp_settings['enable_sandbox'] ) ? $rpp_settings['enable_sandbox'] : '';
						                ?>
                                        <input id="rpp_settings[enable_sandbox]" name="rpp_settings[enable_sandbox]" type="checkbox" value="1" <?php checked( 1, $enable_sandbox ); ?> />
                                        <label for="rpp_settings[enable_sandbox]"><?php printf( esc_html__( 'Enable PayPal Sandbox for testing environment. For more details please consult %1sPayPal sandbox testing guide%2s.', 'realhomes-paypal-payments' ), '<a href="https://developer.paypal.com/tools/sandbox/" target="_blank">', '</a>' ); ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
						                <?php esc_html_e( 'Client ID*', 'realhomes-paypal-payments' ); ?>
                                    </th>
                                    <td>
						                <?php $client_id = ! empty( $rpp_settings['client_id'] ) ? $rpp_settings['client_id'] : ''; ?>
                                        <input id="rpp_settings[client_id]" name="rpp_settings[client_id]" type="text" class="regular-text" value="<?php echo esc_attr( $client_id ); ?>" />
                                        <p class="description">
                                            <?php printf( esc_html__( 'Paste your application Client ID here. For help consult %1sGet client ID and client secret%2s.', 'realhomes-paypal-payments' ), '<a href="https://developer.paypal.com/api/rest/#link-getclientidandclientsecret" target="_blank">', '</a>' ); ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
						                <?php esc_html_e( 'Client Secret*', 'realhomes-paypal-payments' ); ?>
                                    </th>
                                    <td>
						                <?php $secret_id = ! empty( $rpp_settings['secret_id'] ) ? $rpp_settings['secret_id'] : ''; ?>
                                        <input id="rpp_settings[secret_id]" name="rpp_settings[secret_id]" type="text" class="regular-text" value="<?php echo esc_attr( $secret_id ); ?>" />
                                        <p class="description"><?php esc_html_e( 'Paste your application Secret ID here.', 'realhomes-paypal-payments' ); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
						                <?php esc_html_e( 'Currency Code*', 'realhomes-paypal-payments' ); ?>
                                    </th>
                                    <td>
						                <?php $currency_code = ! empty( $rpp_settings['currency_code'] ) ? $rpp_settings['currency_code'] : ''; ?>
                                        <input id="rpp_settings[currency_code]" name="rpp_settings[currency_code]" class="regular-text" type="text" value="<?php echo esc_attr( $currency_code ); ?>" />
                                        <p class="description">
                                            <?php esc_html_e( 'Provide currency code that you want to use. Example: USD', 'realhomes-paypal-payments' ); ?>
                                            <br>
                                            <?php printf( esc_html__( 'For details check %1sPayPal Supported Currencies%2s', 'realhomes-paypal-payments' ), '<a href="https://developer.paypal.com/docs/reports/reference/paypal-supported-currencies/#link-paypalsupportedcurrencies" target="_blank">', '</a>' ); ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
						                <?php esc_html_e( 'Payment Amount Per Property*', 'realhomes-paypal-payments' ); ?>
                                    </th>
                                    <td>
						                <?php $payment_amount = ! empty( $rpp_settings['payment_amount'] ) ? $rpp_settings['payment_amount'] : ''; ?>
                                        <input id="rpp_settings[payment_amount]" name="rpp_settings[payment_amount]" type="text" class="regular-text" value="<?php echo esc_attr( $payment_amount ); ?>" />
                                        <p class="description"><?php esc_html_e( 'Provide the amount that you want to charge for one property. Example: 20.00', 'realhomes-paypal-payments' ); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
						                <?php esc_html_e( 'Publish Submitted Property after Payment', 'realhomes-paypal-payments' ); ?>
                                    </th>
                                    <td>
						                <?php $publish_property = ! empty( $rpp_settings['publish_property'] ) ? $rpp_settings['publish_property'] : '0'; ?>
                                        <label for="rpp_settings_publish_property_yes">
                                            <input id="rpp_settings_publish_property_yes" name="rpp_settings[publish_property]" type="radio" value="1" <?php checked( 1, $publish_property, true ); ?> />
                                            <?php esc_html_e( 'Yes', 'realhomes-paypal-payments' ); ?>
                                        </label>
                                        <br />
                                        <label for="rpp_settings_publish_property_no">
                                            <input id="rpp_settings_publish_property_no" name="rpp_settings[publish_property]" type="radio" value="0" <?php checked( 0, $publish_property, true ); ?> />
                                            <?php esc_html_e( 'No', 'realhomes-paypal-payments' ); ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
						                <?php esc_html_e( 'Redirect Page*', 'realhomes-paypal-payments' ); ?>
                                    </th>
                                    <td>
						                <?php $redirect_page_url = ! empty( $rpp_settings['redirect_page_url'] ) ? $rpp_settings['redirect_page_url'] : ''; ?>
                                        <input id="rpp_settings[redirect_page_url]" name="rpp_settings[redirect_page_url]" type="text" class="regular-text" value="<?php echo esc_url( $redirect_page_url ); ?>" placeholder="<?php echo esc_url( get_site_url() ); ?>" required="required"/>
                                        <p class="description">
                                            <?php esc_html_e( 'Provide the page URL on which you want to redirect the user after successfull payment approval.', 'realhomes-paypal-payments' ); ?>
                                            <?php esc_html_e( 'Recommended: Front-End Dashboard "My Properties" Page URL.', 'realhomes-paypal-payments' ); ?>
                                        </p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
			                <?php submit_button(); ?>
                        </div>
                    </div>
                    <footer class="settings-footer">
                        <p><span class="dashicons dashicons-editor-help"></span><?php printf( esc_html__( 'For help, please consult the %1$s documentation %2$s of the plugin.', 'realhomes-paypal-payments' ), '<a href="https://realhomes.io/documentation/realhomes-paypal-payments/" target="_blank">', '</a>' ); ?></p>
                        <p><span class="dashicons dashicons-feedback"></span><?php printf( esc_html__( 'For feedback, please provide your %1$s feedback here! %2$s', 'realhomes-paypal-payments' ), '<a href="' . esc_url( add_query_arg( array( 'page' => 'realhomes-feedback' ), get_admin_url() . 'admin.php' ) ) . '" target="_blank">', '</a>' ); ?></p>
                    </footer>
                </form>
            </div>
			<?php
		}

		/**
		 * Register settings for the plugin.
		 *
		 * @since  1.0.0
		 */
		public function register_settings() {
			register_setting( 'rpp_settings_group', 'rpp_settings' );
		}
	}
}
