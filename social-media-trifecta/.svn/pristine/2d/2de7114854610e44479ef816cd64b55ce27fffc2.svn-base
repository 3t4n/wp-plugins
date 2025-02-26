<?php

class TRIFECTA_INSTAGRAM {
	private static $instance;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_menus' ) );
		add_action( 'admin_init', array( $this, 'instagram_initilaize_options' ) );

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
			<h2>Tirefecta Instagram Option</h2>
			<p> Set this as your Valid redirect URIs also uncheck the Disable implicit OAuth </p>
			<p>  <?php echo admin_url('/admin.php?page=social_media_trifecta'); ?></p>

			<!-- Make a call to the WordPress function for rendering errors when settings are saved. -->


			<!-- Create the form that will be used to render our options -->
			<form method="post" action="options.php">
				<?php settings_fields( 'trifecta_instagram' ); ?>
				<?php do_settings_sections( 'trifecta_instagram' ); ?>
				<?php submit_button( 'Save Settings' ); ?>
			</form>

		</div><!-- /.wrap -->
		<?php
	}

	public function add_admin_menus() {
//		add_submenu_page( SOCIAL_MEDIA_TIRFECTA::$page_slug, 'Instagram Settings', 'Instagram Settings', 'manage_options', 'trifecta_instagram', array(
//			$this,
//			'admin_menu_settings',
//		) );
	} // end sandbox_theme_display

	function instagram_initilaize_options() {

		// First, we register a section. This is necessary since all future options must belong to a
		add_settings_section( 'instagram_group', 'Instagram Credentials', array(
			$this,
			'instagram_call_back_options',
		), 'trifecta_instagram' );

		// Next, we'll introduce the fields for toggling the visibility of content elements.
		add_settings_field( 'instagram_app_id', 'Instagram App ID', array(
			$this,
			'get_instagram_app_id',
		), 'trifecta_instagram', 'instagram_group', array( 'Please enter Instagram App id.', ) );

		add_settings_field( 'instagram_app_secret_key', 'App Secret Key :', array(
			$this,
			'get_instagram_app_secret_key',
		), 'trifecta_instagram', 'instagram_group', array( 'Please enter Instagram App id.', ) );

		add_settings_field( 'instagram_access_token', 'Access Token Key:', array(
			$this,
			'get_instagram_access_token',
		), 'trifecta_instagram', 'instagram_group', array( '', ) );

		add_settings_field( 'instagram_user_name', 'Username:', array(
			$this,
			'get_instagram_username',
		), 'trifecta_instagram', 'instagram_group', array( 'Please enter Instagram App id.', ) );


		// Finally, we register the fields with WordPress

		register_setting( 'trifecta_instagram', 'instagram_app_secret_key' );
		register_setting( 'trifecta_instagram', 'instagram_app_id' );
		register_setting( 'trifecta_instagram', 'instagram_access_token' );
		register_setting( 'trifecta_instagram', 'instagram_user_name' );


	} // end sandbox_initialize_theme_options


	/* ------------------------------------------------------------------------ *
	 * Section Callbacks
	 * ------------------------------------------------------------------------ */

	function instagram_call_back_options() {
		$insta_app_id = get_option( "instagram_app_id" );

		if ( ! empty( $insta_app_id ) ) {
			$s        = empty( $_SERVER[ "HTTPS" ] ) ? '' : ( $_SERVER[ "HTTPS" ] == "on" ) ? "s" : "";
			$protocol = $this->strleft( strtolower( $_SERVER[ "SERVER_PROTOCOL" ] ), "/" ) . $s;


			$port         = ( $_SERVER[ "SERVER_PORT" ] == "80" ) ? "" : ( ":" . $_SERVER[ "SERVER_PORT" ] );
			$redirect_url = $protocol . "://" . $_SERVER[ 'SERVER_NAME' ] . $port . $_SERVER[ 'REQUEST_URI' ];


			?>

			<a href="https://instagram.com/oauth/authorize/?client_id=<?php echo $insta_app_id ?>&redirect_uri=<?php echo $redirect_url . '&response_type=token'; ?>">Click
				Here to First Sign In to Instagram</a>
			<?php
		}
	}

	public function strleft( $s1, $s2 ) {
		return substr( $s1, 0, strpos( $s1, $s2 ) );
	}


	/* ------------------------------------------------------------------------ *
	 * Field Callbacks
	 * ------------------------------------------------------------------------ */

	function get_instagram_app_id( $args ) {
		// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
		$html = '	<input type="text" id="instagram_app_id" name="instagram_app_id" value="' . get_option( "instagram_app_id" ) . '"/>';
		echo $html;
	}

	function get_instagram_app_secret_key( $args ) {
		// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
		$html = '	<input type="text" id="instagram_app_secret_key" name="instagram_app_secret_key" value="' . get_option( "instagram_app_secret_key" ) . '"/>';
		echo $html;
	}

	function get_instagram_access_token( $args ) {
		// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field


		$html = '	<input type="text" id="instagram_access_token" name="instagram_access_token" value="' . get_option( "instagram_access_token" ) . '"/>';
		echo $html;

		?>
		<script type="text/javascript">
			var hash = window.location.hash;
			var value = hash.split("=");
			if (value[1] != '' && typeof value[1]!='undefined') {
				jQuery('#instagram_access_token').val(value[1]);

				var userNameField = document.getElementById("instagram_access_token");
				userNameField.value = value[1];
			}
		</script>
<?php
	}

	function get_instagram_username( $args ) {
		// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
		$html = '	<input type="text" id="instagram_user_name" name="instagram_user_name" value="' . get_option( "instagram_user_name" ) . '"/>';
		echo $html;
	}


}

add_action( 'plugins_loaded', array( 'TRIFECTA_INSTAGRAM', 'get_instance' ) );