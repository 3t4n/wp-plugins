<?php

class TRIFECTA_TWITTER {
	private static $instance;
	private        $consumer_key_options        = 'twitter_consumer_key';
	private        $secreat_consumer_key        = 'twitter_secreat_consumer_key';
	private        $access_token_twitter        = 'access_token_twitter';
	private        $twitter_secret_access_token = 'twitter_secret_access_token';
	private        $twitter_user_name           = 'twitter_user_name';


	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_menus' ) );
		add_action( 'admin_init', array( $this, 'twitter_initalize_option' ) );
	}

	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	public static function admin_menu_settings() {
		?>
		<!-- Create a header in the default WordPress 'wrap' container -->
		<div class="wrap">
			<!-- Add the icon to the page -->
			<div id="icon-themes" class="icon32"></div>
			<h2>Tirefecta Twitter Option</h2>

			<!-- Make a call to the WordPress function for rendering errors when settings are saved. -->


			<!-- Create the form that will be used to render our options -->
			<form method="post" action="options.php">
				<?php settings_fields( 'trifecta_twitter' ); ?>
				<?php do_settings_sections( 'trifecta_twitter' ); ?>
				<?php submit_button( 'Save Settings', 'primary', 'trifecta-twitter-save-btn' ); ?>
			</form>

		</div><!-- /.wrap -->
		<?php

	}

	public function add_admin_menus() {
//		add_submenu_page( SOCIAL_MEDIA_TIRFECTA::$page_slug, 'Twitter Settings', 'Twitter Settings', 'manage_options', 'trifecta_twitter', array(
//			$this,
//			'twitter_admin_menu',
//		) );
	}

	function twitter_admin_menu() {
		$twitter_options = array(
			'consumer_key'        => get_option( $this->consumer_key_options ),
			'secret_consumer_key' => get_option( $this->secreat_consumer_key ),
			'access_token'        => get_option( $this->access_token_twitter ),
			'secret_acces_token'  => get_option( $this->twitter_secret_access_token ),
			'twitter_name'        => get_option( $this->twitter_user_name ),
		);
		
				$flag = 1;


			$this->get_twitter_backend_settings( $flag );



	}

	public function get_twitter_backend_settings( $flag ) {
		if ( $flag == 1 ) {
			echo 'all is set';
		}
	}

	function twitter_initalize_option() {
		add_settings_section( 'twitter_group', 'Twitter Credentials', array(
			$this,
			'twitter_group_callback',
		), 'trifecta_twitter' );

		add_settings_field( $this->consumer_key_options, 'Consumer Key', array(
			$this,
			'get_twitter_consumer_key',
		), 'trifecta_twitter', 'twitter_group', array( '' ) );

		add_settings_field( $this->secreat_consumer_key, 'Consumer Secret Key', array(
			$this,
			'get_twitter_secret_consumer_key',
		), 'trifecta_twitter', 'twitter_group', array( '' ) );

		add_settings_field( $this->access_token_twitter, 'Access Token', array(
			$this,
			'get_access_token_twitter',
		), 'trifecta_twitter', 'twitter_group', array( '' ) );
		add_settings_field( $this->twitter_secret_access_token, 'Secret Access Token', array(
			$this,
			'get_twitter_secret_access_token',
		), 'trifecta_twitter', 'twitter_group', array( '' ) );
		add_settings_field( 'twitter_user_name', 'Twitter User Name', array(
			$this,
			'get_twitter_user_name',
		), 'trifecta_twitter', 'twitter_group', array( '' ) );

		register_setting( 'trifecta_twitter', $this->consumer_key_options );
		register_setting( 'trifecta_twitter', $this->secreat_consumer_key );
		register_setting( 'trifecta_twitter', $this->access_token_twitter );
		register_setting( 'trifecta_twitter', $this->twitter_secret_access_token );
		register_setting( 'trifecta_twitter', $this->twitter_user_name );
	}

	function twitter_group_callback() {
		echo 'Twitter Options';
	}

	function get_twitter_consumer_key() {
		// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
		$html = '	<input type="text" id="twitter_consumer_key" name="twitter_consumer_key" value="' . get_option( $this->consumer_key_options ) . '"/>';
		echo $html;

	}

	function get_twitter_secret_consumer_key() {
		// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
		$html = '	<input type="text" id="twitter_secreat_consumer_key" name="twitter_secreat_consumer_key" value="' . get_option( $this->secreat_consumer_key ) . '"/>';
		echo $html;

	}

	function get_access_token_twitter() {
		// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
		$html = '	<input type="text" id="access_token_twitter" name="access_token_twitter" value="' . get_option( $this->access_token_twitter ) . '"/>';
		echo $html;

	}

	function get_twitter_secret_access_token() {
		// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
		$html = '	<input type="text" id="twitter_secret_access_token" name="twitter_secret_access_token" value="' . get_option( $this->twitter_secret_access_token ) . '"/>';
		echo $html;

	}

	function get_twitter_user_name() {
		// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
		$html = '	<input type="text" id="twitter_user_name" name="twitter_user_name" value="' . get_option( $this->twitter_user_name ) . '"/>';
		echo $html;

	}


}

add_action( 'plugins_loaded', array( 'TRIFECTA_TWITTER', 'get_instance' ) );