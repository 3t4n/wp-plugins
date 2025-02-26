<?php

/**
 * The settings of the plugin.
 *
 * @package    ReachoWooCommerce
 * @subpackage ReachoWooCommerce/admin
 * @author     Reacho <support@reacho.com>
 */
class Reacho_WooCommerce_Settings {

	public $listIds = null;

	private function set_reacho_list_ids( $reachowc_private_api_key ) {
		$reachowc_api   = new Reacho_WooCommerce_API_Wrapper();
		$reachowc_lists = $reachowc_api->reachowc_lists( $reachowc_private_api_key );

		if ( is_array( $reachowc_lists ) && ! array_key_exists( 'error', $reachowc_lists ) ) {
			if ( count( $reachowc_lists ) === 0 ) {
				$this->listIds = [];
			} else {
				$this->listIds = $reachowc_lists;
			}
		} else {
			$reachowc_settings                               = get_option( Reacho_WooCommerce_Options::REACHO_SETTINGS );
			$reachowc_settings['reachowc_private_api_key']   = '';
			$reachowc_settings['reachowc_public_api_key']    = '';
			$reachowc_settings['reachowc_subscribe_list_id'] = '';
			update_option( Reacho_WooCommerce_Options::REACHO_SETTINGS, $reachowc_settings );
			$reachowc_api->trigger_deactivated_event();
		}
	}

	public function reachowc_settings_page() {
		if ( ! $this->reachowc_generated_wc_keys() ) {
			$this->settings_oauth();

			return;
		}

		?>
        <div class="wrap" style="padding-left: 20px">
            <div style="display: flex; align-items: center">
                <img height="20" width="20" style="margin-top:20px;margin-bottom: 20px"
                     src="<?php echo esc_attr( plugin_dir_url( __DIR__ ) . 'admin/images/logo.png' ); ?>"
                     alt="Reacho Logo"/>
                <h2 style="margin-left: 10px">Reacho Settings</h2>
            </div>
            <div>
                <form action="options.php" method="POST">
					<?php
					settings_fields( Reacho_WooCommerce_Options::REACHO_SETTINGS );
					do_settings_sections( 'reacho-wc-settings' );
					submit_button( 'Save Changes', 'primary', 'submit', true, array(
						'id' => 'reacho_settings_submit'
					) );
					?>
                    <div class="wcr-authorization wcr-authorization-error"></div>
                    <div class="wcr-authorization wcr-authorization-success"></div>
                </form>
            </div>
        </div>
		<?php
	}

	/**
	 * Settings page content for new authentication process.
	 */
	public function settings_oauth() {
		include_once REACHO_PATH . '/admin/partials/reacho-woocommerce-v1-auth-settings.php';
	}

	private function is_integrated() {
		return ReachoWC()->options->get_reacho_option( 'reachowc_private_api_key' );
	}

	private function return_url() {
		return REACHO_ADMIN . 'admin.php?page=reacho-woocommerce';
	}

	private function callback_url() {
		$nonce = wp_create_nonce( 'authorized-callback_nonce' );

		return REACHO_ADMIN . 'admin.php?page=authorized_reacho&authorized_nonce=' . $nonce;
	}

	public function reachowc_register_settings() {
		register_setting(
			Reacho_WooCommerce_Options::REACHO_SETTINGS,
			Reacho_WooCommerce_Options::REACHO_SETTINGS,
			array(
				'sanitize_callback' => array( $this, 'sanitize_reacho_settings' )
			)
		);

		add_settings_section( 'reachowc_api_settings', '', '', 'reacho-wc-settings' );
		add_settings_field( 'reachowc_private_api_key', 'Private API Key', array(
			$this,
			'input_private_api_key'
		), 'reacho-wc-settings', 'reachowc_api_settings' );
		add_settings_field( 'reachowc_public_api_key', 'Public API Key', array(
			$this,
			'input_public_api_key'
		), 'reacho-wc-settings', 'reachowc_api_settings' );


//		if ( $this->listIds ) {
////	        add_settings_section( 'reachowc_subscription_settings', '', array(
////		        $this,
////		        'reachowc_subscription_settings_title'
////	        ), 'reacho-wc-settings' );
//			add_settings_field( 'reachowc_subscribe_list_id', 'Reacho List ID', array(
//				$this,
//				'input_subscribe_list_id_for_email'
//			), 'reacho-wc-settings', 'reachowc_api_settings' );
//		}

		if ( ! empty( $_GET['showMode'] ) && ( ! isset( $_GET['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['nonce'] ) ), 'nonce_action' ) ) ) {
			add_settings_field( 'reachowc_showMode_nonce', 'Show Mode Nonce', array(
				$this,
				'reachowc_input_show_nonce'
			), 'reacho-wc-settings', 'reachowc_api_settings' );
		}


		if ( ! empty( $_GET['showMode'] ) && isset( $_GET['nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['nonce'] ) ), 'nonce_action' ) ) {

			add_settings_field( 'reachowc_mode', 'Environment', array(
				$this,
				'input_environment'
			), 'reacho-wc-settings', 'reachowc_api_settings' );

			add_settings_field( 'reachowc_api_url', 'API Url', array(
				$this,
				'input_api_url',
			), 'reacho-wc-settings', 'reachowc_api_settings' );
		}
	}

	public function sanitize_reacho_settings( $input ) {
		$sanitized = array();

		if ( isset( $input['reachowc_private_api_key'] ) ) {
			$sanitized['reachowc_private_api_key'] = sanitize_text_field( $input['reachowc_private_api_key'] );
		}

		if ( isset( $input['reachowc_public_api_key'] ) ) {
			$sanitized['reachowc_public_api_key'] = sanitize_text_field( $input['reachowc_public_api_key'] );
		}

		if ( isset( $input['reachowc_mode'] ) ) {
			$sanitized['reachowc_mode'] = sanitize_text_field( $input['reachowc_mode'] );
		}

		if ( isset( $input['reachowc_api_url'] ) ) {
			$sanitized['reachowc_api_url'] = esc_url_raw( $input['reachowc_api_url'] );
		}

		if ( isset( $input['reachowc_subscribe_list_id'] ) ) {
			$sanitized['reachowc_subscribe_list_id'] = absint( $input['reachowc_subscribe_list_id'] );
		}

		return $sanitized;
	}

	public function reachowc_input_show_nonce() {
		$reachowc_mode_nonce = wp_create_nonce( 'nonce_action' );
		echo '<input type="text" name="reachowc_showMode_nonce" value="' . esc_attr( $reachowc_mode_nonce ) . '">';
	}

	public function reachowc_set_listIds() {
		$private_api_key = ReachoWC()->options->get_reacho_option( 'reachowc_private_api_key' );
		$this->set_reacho_list_ids( $private_api_key );
	}

	public function input_private_api_key() {
		$this->reachowc_set_listIds();
		$private_api_key = ReachoWC()->options->get_reacho_option( 'reachowc_private_api_key' );
		?>
        <input id="reachowc_private_api_key" style="width: 450px" type="text"
               name="reachowc_settings[reachowc_private_api_key]"
               value="<?php echo esc_attr( $private_api_key ); ?>"/>
        <!--        <button id="reachowc_connect_btn" type="button" class="button button-primary">Connect</button>-->
        <br/>
		<?php if ( $private_api_key && !is_array($this->listIds) ) { ?>
            <small style="color: red"> Invalid API Key </small> <?php } ?>
        <small>You can locate your private API key on the <a href="https://app.reacho.com/accounts/settings/api-keys"
                                                           target="_blank">Reacho account page</a></small>
		<?php
	}

	public function input_public_api_key() {
		?>
        <input id="reachowc_public_api_key" style="width: 450px" type="text"
               name="reachowc_settings[reachowc_public_api_key]"
               value="<?php echo esc_attr( ReachoWC()->options->get_reacho_option( 'reachowc_public_api_key' ) ); ?>"/>
        <br/>
        <small>You can locate your public API key on the <a href="https://app.reacho.com/accounts/settings/api-keys"
                                                          target="_blank">Reacho account page</a></small>
        <!--        <br/><br/>-->
        <!--        <button id="reachowc_connect_btn" type="button" class="button button-primary">Connect</button>-->
		<?php
	}

	public function reachowc_subscription_settings_title() {
		echo '<h3>Subscribe contacts at checkout<br/>';
		echo '<small style="font-size: 11px; font-weight: normal">Contacts will be subscribed to the specified list when they click "Place Order"</small></h3>';
	}

	public function input_subscribe_list_id_for_email() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-reacho-woocommerce-api-wrapper.php';
		$reachowc_api             = new Reacho_WooCommerce_API_Wrapper();
		$reachowc_private_api_key = ReachoWC()->options->get_reacho_option( 'reachowc_private_api_key' );
		$reachowc_lists           = $reachowc_api->reachowc_lists( $reachowc_private_api_key );

		if ( ! $this->listIds ) {
			return;
		}

		if ( empty( $reachowc_lists ) ) {
			echo esc_html( $this->listIds );
		} else {
			$reachowcListId = ReachoWC()->options->get_reacho_option( 'reachowc_subscribe_list_id' );
			?>
            <select id="reachowc_subscribe_list_id" name="reachowc_settings[reachowc_subscribe_list_id]">
				<?php
				foreach ( $this->listIds as $list ) {
					?>
                    <option value="<?php echo esc_html( $list['id'] ); ?>" <?php if ( $reachowcListId == esc_html( $list['id'] ) ) { ?> selected="selected" <?php } ?> ><?php echo esc_html( $list['name'] ); ?></option>
					<?php
				}
				?>
            </select><br/>
            <small style="font-size: 11px; font-weight: normal">Contacts will be subscribed to the specified list when
                they click "Place Order" at checkout</small>
			<?php
		}
	}

	public function input_environment() {
		$env = ReachoWC()->options->get_reacho_option( 'reachowc_mode' );
		?>
        <select id="reachowc_mode" name="reachowc_settings[reachowc_mode]">
            <option>Select</option>
            <option value="local" <?php if ( $env == 'local' ) { ?> selected="selected" <?php } ?>>Local</option>
            <option value="sandbox" <?php if ( $env == 'sandbox' ) { ?> selected="selected" <?php } ?>>Sandbox</option>
            <option value="qa" <?php if ( $env == 'qa' ) { ?> selected="selected" <?php } ?>>QA</option>
            <option value="app" <?php if ( $env == 'app' ) { ?> selected="selected" <?php } ?>>Production</option>
        </select>
		<?php
	}

	public function input_api_url() {
		?>
        <input id="reachowc_api_url" style="width: 450px" type="text"
               name="reachowc_settings[reachowc_api_url]"
               disabled="disabled"
               value="<?php echo esc_attr( ReachoWC()->options->get_reacho_option( 'reachowc_api_url' ) ); ?>"/>
        <br/>
        <!--        <br/><br/>-->
        <!--        <button id="reachowc_connect_btn" type="button" class="button button-primary">Connect</button>-->
		<?php
	}

	public function reachowc_validate_private_api_key() {
		// Check if nonce is valid
		check_ajax_referer( 'reachowc_nonce_action', '_wpnonce' );

		// Validate and sanitize input data
		$private_api_key = isset( $_POST['privateApiKey'] ) ? sanitize_text_field( wp_unslash( $_POST['privateApiKey'] ) ) : '';
		$public_api_key  = isset( $_POST['publicApiKey'] ) ? sanitize_text_field( wp_unslash( $_POST['publicApiKey'] ) ) : '';
		$mode            = isset( $_POST['mode'] ) ? sanitize_text_field( wp_unslash( $_POST['mode'] ) ) : 'app';

		if ( empty( $private_api_key ) ) {
			wp_send_json_error( [ 'message' => 'API Key is required' ] );

			return;
		}

		$reachowc_api = new Reacho_WooCommerce_API_Wrapper( $mode );
		$tracks       = $reachowc_api->reachowc_lists( $private_api_key );

		$reachowc_settings = get_option( Reacho_WooCommerce_Options::REACHO_SETTINGS );
		if ( array_key_exists( 'error', $tracks ) ) {
			$reachowc_settings['reachowc_private_api_key']   = '';
			$reachowc_settings['reachowc_public_api_key']    = '';
			$reachowc_settings['reachowc_subscribe_list_id'] = '';

			update_option( Reacho_WooCommerce_Options::REACHO_SETTINGS, $reachowc_settings );
			wp_send_json_error( [ 'message' => $tracks['error'] ] );

			return;
		}

		$reachowc_settings['reachowc_private_api_key']   = $private_api_key;
		$reachowc_settings['reachowc_public_api_key']    = $public_api_key;
		$reachowc_settings['reachowc_mode']              = $mode;
		$reachowc_settings['reachowc_subscribe_list_id'] = '';

		update_option( Reacho_WooCommerce_Options::REACHO_SETTINGS, $reachowc_settings );

		$site_url = site_url();
		$reachowc_api->trigger_event( 'INSTALL', [
			'shopUrl'                     => $site_url,
			'woocommerce_consumer_key'    => get_option( 'reachowc_consumer_key' ),
			'woocommerce_consumer_secret' => get_option( 'reachowc_consumer_secret' ),
			'reachowc_rest_base_url'      => site_url() . '/wp-json/reacho/v1/{entity}',
			'woocommerce_rest_base_url'   => site_url() . '/wp-json/wc/v3/{entity}',
		], $private_api_key );

		if ( count( $tracks ) > 0 && array_key_exists( 'id', $tracks[0] ) ) {
			if ( ! empty( $_POST['listId'] ) ) {
				$list_id = sanitize_text_field( wp_unslash( $_POST['listId'] ) );
				$this->trigger_list_event( $site_url, $list_id );

				return;
			}
			wp_send_json_success( $tracks );

			return;
		}

		wp_send_json_success( [] );

		return;
	}

	public function trigger_list_event( $site_url, $list_id ) {
		$reachowc_api = new Reacho_WooCommerce_API_Wrapper();
		$reachowc_api->trigger_event( 'LIST.UPDATED', [
			'shopUrl' => $site_url,
			'listId'  => sanitize_text_field( $list_id )
		] );
	}

	/**
	 * Get setting option for textbox
	 *
	 * @param string $setting_name Setting Name.
	 * @param string $setting_group Setting Group Name.
	 *
	 * @return string|false
	 */
	public function get_setting_option( $setting_name, $setting_group = null ) {
		if ( $setting_group ) {
			$setting = get_option( $setting_group );
			if ( isset( $setting[ $setting_name ] ) ) {
				return $setting[ $setting_name ];
			}
		} else {
			$setting = get_option( $setting_name );
			if ( $setting ) {
				return $setting;
			}
		}

		return false;
	}

	public function reachowc_generated_wc_keys() {
		global $wpdb;

		// Define a unique cache key
		$cache_key = 'reachowc_wc_keys';

		// Try to get the keys from cache
		$keys = wp_cache_get( $cache_key, 'reachowc_cache_group' );

		// If not found in cache, query the database
		if ( $keys === false ) {
			$keys = $wpdb->get_row(
				$wpdb->prepare(
					"
                    SELECT consumer_key, consumer_secret, permissions
                    FROM {$wpdb->prefix}woocommerce_api_keys
                    WHERE description LIKE %s ORDER BY key_id DESC LIMIT 1
                ",
					'%reacho-woocommerce%'
				)
			);

			// If no keys found, return false
			if ( ! $keys ) {
				return false;
			}

			// Store the result in cache for future use (with a time limit of 1 hour)
			wp_cache_set( $cache_key, $keys, 'reachowc_cache_group', 3600 );
		}

		return $keys;
	}

}