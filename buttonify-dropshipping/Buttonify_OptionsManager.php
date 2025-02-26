<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Buttonify_OptionsManager {

	public function getOptionNamePrefix() {
		return get_class( $this ) . '_';
	}

	public function getOptionMetaData() {
		return array();
	}

	/**
	 * Array of string name of options
	 */
	public function getOptionNames() {
		return array_keys( $this->getOptionMetaData() );
	}

	/**
	 * Override this method to initialize options to default values and save to the database with add_option
	 */
	protected function initOptions() {
	}

	public function addOption( $optionName, $value ) {
		$prefixedOptionName = $this->prefix( $optionName ); // how it is stored in DB

		return add_option( $prefixedOptionName, $value );
	}

	/**
	 * Just returns the class name. Override this method to return something more readable
	 */
	public function getPluginDisplayName() {
		return get_class( $this );
	}

	/**
	 * Get the prefixed version input $name suitable for storing in WP options
	 * Idempotent: if $optionName is already prefixed, it is not prefixed again, it is returned without change
	 */
	public function prefix( $name ) {
		$optionNamePrefix = $this->getOptionNamePrefix();
		if ( strpos( $name, $optionNamePrefix ) === 0 ) {
			return $name; // already prefixed
		}

		return $optionNamePrefix . $name;
	}

	/**
	 * Remove the prefix from the input $name.
	 * Idempotent: If no prefix found, just returns what was input.
	 */
	public function &unPrefix( $name ) {
		$optionNamePrefix = $this->getOptionNamePrefix();
		if ( strpos( $name, $optionNamePrefix ) === 0 ) {
			$val = substr( $name, strlen( $optionNamePrefix ) );

			return $val;
		}

		return $name;
	}

	/**
	 * A wrapper function delegating to WP get_option() but it prefixes the input $optionName
	 * To enforce "scoping" the options in the WP options table thereby avoiding name conflicts
	 * if option is not set.
	 */
	public function getOption( $optionName, $default = null ) {
		$retVal = get_option( $optionName );
		if ( ! $retVal && $default ) {
			$retVal = $default;
		}

		return $retVal;
	}

	public function get_buttonify_version() {
		return $this->getOption( 'buttonify__version' );
	}

	/**
	 * A wrapper function delegating to WP delete_option() but it prefixes the input $optionName
	 * To enforce "scoping" the options in the WP options table thereby avoiding name conflicts
	 */
	public function deleteOption( $optionName ) {
		return delete_option( $optionName );
	}

	public function getRoleOption( $optionName ) {
		$roleAllowed = $this->getOption( $optionName );
		if ( ! $roleAllowed || '' == $roleAllowed ) {
			$roleAllowed = 'Administrator';
		}

		return $roleAllowed;
	}

	/**
	 * Retrieve the url of the plugin
	 */
	public function getUrl() {
		return \plugin_dir_url( __FILE__ );
	}

	public function updateOption( $optionName, $value ) {
		return update_option( $optionName, $value );
	}

//	public function registerSettings() {
//		$settingsGroup  = get_class( $this ) . '-settings-group';
//		$optionMetaData = $this->getOptionMetaData();
//		foreach ( $optionMetaData as $aOptionKey => $aOptionMeta ) {
//			register_setting( $settingsGroup, $aOptionMeta );
//		}
//	}

	public function curlPost( $url ) {
		$argc     = array( 'sslverify' => false );
		$response = wp_remote_get( 'https://app-api.buttonify.net/' . $url, $argc );
		$body     = wp_remote_retrieve_body( $response );

		// var_dump($body);
		return $body;
	}

	/**
	 * Creates HTML for the Administration page to set options for this plugin.
	 * Override this method to create a customized page.
	 */
	public function settingsPage() {
		$aplugin = new Buttonify_OptionsManager();
		wp_enqueue_script( 'startup', $aplugin->getUrl() . 'js/startup.js', array( 'jquery' ), $aplugin->get_buttonify_version(), true );
		wp_localize_script( 'startup', 'ajax_startup', array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script( 'bootstrap', $aplugin->getUrl() . 'js/bootstrap.min.js', array( 'jquery' ), $aplugin->get_buttonify_version(), true );
		wp_enqueue_style( 'bootstrapCss', $aplugin->getUrl() . 'css/bootstrap.min.css', '', $aplugin->get_buttonify_version(), 'all' );
		wp_enqueue_style( 'custom', $aplugin->getUrl() . 'css/main.css', '', $aplugin->get_buttonify_version(), 'all' );
		$buttonify_store_token = $aplugin->getOption( 'buttonify_store_token' );
		$buttonify_connected   = $aplugin->getOption( 'buttonify_connected' );
		$buttonify_shop_url    = $aplugin->getOption( 'buttonify_shop_url' );
		$buttonify_user_id     = $aplugin->getOption( 'buttonify_user_id' );
		$url                   = $aplugin->getUrl();

		?>

      <input type="hidden" id="buttonify_store_token" value="<?php echo esc_attr( $buttonify_store_token ); ?>"/>
      <input type="hidden" id="buttonify_connected" value="<?php echo esc_attr( $buttonify_connected ); ?>"/>
      <input type="hidden" id="buttonify_shop_url" value="<?php echo esc_attr( $buttonify_shop_url ); ?>"/>
      <input type="hidden" id="buttonify_user_id" value="<?php echo esc_attr( $buttonify_user_id ); ?>"/>
      <input type="hidden" id="buttonify_file_url" value="<?php echo esc_attr( $url ); ?>"/>

		<?php wp_nonce_field( 'buttonify_form_action', 'buttonify_nonce_field' ); ?>
      <!--logo-->
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="padding-top:10px">
        <img width="200px" src="<?php echo esc_attr( $url ) . '/images/buttonify_logo.png'; ?>" alt="logo">
      </ul>
      <!--您的商店已成功连接到您的 Buttonify帐户。-->
      <ul class="nav nav-pills mb-3" id="Go_to_Buttonify_DIV" role="tablist" style="padding-top:10px;display: none;">
        <li id="Go_to_Buttonify_tip" class="tip-tip_li" style="width: 100%;">
          <p style="margin-bottom: .5em">
            <b>Your store has been successfully connected to your Buttonify account.</b>
          </p>
          <p style="margin-bottom: .5em">
           <b>Notice</b>: "<span>Consumer key is invalid</span>" or "<span>authentication_error</span>": "Disconnect from Buttonify"->"Connect to Buttonify".
          </p>
          <p style="margin-bottom: .5em">
            <b style="color: #333">Go to</b>
            <a class="Go_to_Buttonify_tip_a"
               href="https://buttonify.net/help/fix-errors-when-installing-buttonify-to-woocommerce-store"
               target="_blank">How to fix errors when installing Buttonify to WooCommerce store?</a>
          </p>
        </li>
        <li class="nav-item" style="width: 100%;">
          <a class="nav-link active custom-css-connect" id="go_to_url"
             href="https://app.buttonify.net/oauth/certification/woo?token=<?php echo esc_attr( $buttonify_store_token ); ?>&domain=<?php echo esc_attr( $buttonify_shop_url ); ?>  "
             target="_blank" aria-selected="true">Go to Buttonify</a>
        </li>
      </ul>
      <!--断开与 Buttonify 的连接-->
      <ul class="nav nav-pills mb-3" id="DisconnectIV" role="tablist" style="padding-top:20px">
        <li class="nav-item d-flex align-items-center justify-content-start" style="width: 100%;padding-right: 1.2rem">
          <a href="javascript:void(0);" class="nav-link active custom-css-connect-mini" aria-selected="true"
             onClick="buttonify_disconnect()">Disconnect from Buttonify</a>
          <a href="javascript:void(0);" class="nav-link custom-css-refresh-mini"
             onClick="buttonify_refresh()">Refresh</a>
        </li>
      </ul>
      <!--连接到 Buttonify-->
      <div id="buttonify_connect_keyDIV" style="display: none;">
        <ul class="nav nav-pills mb-3 d-flex" role="tablist" style="padding-top:10px;margin-top:30px;">
          <!---->
          <li class="nav-item d-flex align-items-center">
            <a href="javascript:void(0);" id="Connect_to_Buttonify" class="nav-link active custom-css-connect"
               target="_blank">Connect to Buttonify</a>
            <a href="javascript:void(0);" id="Refresh_to_Buttonify" class="nav-link custom-css-refresh"
               onClick="buttonify_refresh()">Refresh</a>
          </li>
          <!---->
          <li style="width: 100%;color: #666;line-height: 1.8;">
            <pre style="margin-bottom: .5em">Before connect to Buttonify, the following conditions must be met:</pre>
            <p style="margin-bottom: .5em">1. WooCommerce plugin has been installed and activated;</p>
            <p style="margin-bottom: .5em">2. Set permalinks to anything other than "Plain" in Settings >
              Permalinks;</p>
            <p style="margin-bottom: .5em">3. Your website must be an SSL connection.</p>
            <p style="margin-bottom: .5em">
              <b style="color: #333;">Go to </b>
              <a style="margin-top:10px;margin-bottom:20px;line-height: 1.8;"
                 href="https://buttonify.net/help/install-buttonify-app-to-woocommerce-store"
                 target="_blank">How to install Buttonify APP to your Woocommerce store?</a>
              <br>
            </p>
          </li>
        </ul>
      </div>
		<?php
	}
}
