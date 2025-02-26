<?php

class TRIFECTA_FACBOOK {

	private static $instance;
	private $facebook_page_id_field ='smt_fb_page_id';
	private $facebook_app_id ='smt_fb_app_id';
	private $facebook_app_secret_key ='smt_fb_app_secret_key';




	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_menus' ) );
		add_action( 'admin_init', array( $this, 'facebook_initilaize_options' ) );


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
			<h2>Tirefecta Facebook Option</h2>

			<!-- Make a call to the WordPress function for rendering errors when settings are saved. -->
			<?php

			settings_errors();

			?>

			<!-- Create the form that will be used to render our options -->
			<form method="post" action="options.php">
				<?php settings_fields( 'trifecta_facebook' ); ?>
				<?php do_settings_sections( 'trifecta_facebook' ); ?>
				<?php submit_button( 'Save Settings', 'primary', 'trifecta-facebook-save-btn' ); ?>
			</form>

		</div><!-- /.wrap -->
		<?php
	}

	public function add_admin_menus() {
//		add_submenu_page( SOCIAL_MEDIA_TIRFECTA::$page_slug, 'Facebook Settings', 'Facebook Settings', 'manage_options', 'trifecta_facebook', array(
//			$this,
//			'facebook_admin_settings',
//		) );
	} // end sandbox_theme_display

	public function facebook_admin_settings() {
		$facebook_options = array();

	}

	function facebook_initilaize_options() {

		// First, we register a section. This is necessary since all future options must belong to a
		add_settings_section( 'facebook_group',         // ID used to identify this section and with which to register options
			'Facebook Settings',                  // Title to be displayed on the administration page
			array(
				$this,
				'facebook_call_back_options',
			), // Callback used to render the description of the section
			'trifecta_facebook'                           // Page on which to add this section of options
		);

		// Next, we'll introduce the fields for toggling the visibility of content elements.
		add_settings_field( $this->facebook_page_id_field,                      // ID used to identify the field throughout the theme
			'Facebook Page ID',                           // The label to the left of the option interface element
			array(
				$this,
				'get_facebook_page_id',
			),   // The name of the function responsible for rendering the option interface
			'trifecta_facebook',                          // The page on which this option will be displayed
			'facebook_group',         // The name of the section to which this field belongs
			array(                              // The array of arguments to pass to the callback. In this case, just a description.
				'Please enter facebook page id.',
			) );

		add_settings_field( $this->facebook_app_id , 'Facebook APP ID', array(
				$this,
				'get_facebook_app_id',
			), 'trifecta_facebook', 'facebook_group', array(
				'Please enter facebook page id.',
			) );

		add_settings_field( $this->facebook_app_secret_key, 'Facebook Secret Key', array(
			$this,
			'get_facebook_app_secret_key',
		), 'trifecta_facebook', 'facebook_group', array(
			'Please enter facebook page id.',
		) );



		// Finally, we register the fields with WordPress

		register_setting( 'trifecta_facebook', $this->facebook_page_id_field );
		register_setting( 'trifecta_facebook', $this->facebook_app_id  );
		register_setting( 'trifecta_facebook', $this->facebook_app_secret_key );


	} // end sandbox_initialize_theme_options


	/* ------------------------------------------------------------------------ *
	 * Section Callbacks
	 * ------------------------------------------------------------------------ */

	function facebook_call_back_options() {
		echo '<p>Please fill the credentials below</p>';
	}

	/* ------------------------------------------------------------------------ *
	 * Field Callbacks
	 * ------------------------------------------------------------------------ */

	function get_facebook_page_id( $args ) {

		// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
		//$html = '<input type="checkbox" id="show_header" name="show_header" value="1" ' . checked( 1, get_option( 'facebook_page_id_field' ), false ) . '/>';
		$html = '	<input type="text" id="'.$this->facebook_page_id_field.'" name="'.$this->facebook_page_id_field.'" value="' . get_option( $this->facebook_page_id_field ) . '"/>';

		//		$html .= '<label for="show_header"> ' . print_r($args,false) . '</label>';

		echo $html;

	}
	function get_facebook_app_id( $args ) {

		// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
		//$html = '<input type="checkbox" id="show_header" name="show_header" value="1" ' . checked( 1, get_option( 'facebook_page_id_field' ), false ) . '/>';
		$html = '	<input type="text" id="'.$this->facebook_app_id .'" name="'.$this->facebook_app_id .'" value="' . get_option( $this->facebook_app_id ) . '"/>';

		//		$html .= '<label for="show_header"> ' . print_r($args,false) . '</label>';

		echo $html;

	}
	function get_facebook_app_secret_key( $args ) {

		// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
		//$html = '<input type="checkbox" id="show_header" name="show_header" value="1" ' . checked( 1, get_option( 'facebook_page_id_field' ), false ) . '/>';
		$html = '	<input type="text" id="'.$this->facebook_app_secret_key.'" name="'.$this->facebook_app_secret_key.'" value="' . get_option( $this->facebook_app_secret_key ) . '"/>';

		//		$html .= '<label for="show_header"> ' . print_r($args,false) . '</label>';

		echo $html;

	}
	public function get_facebook_class(){

	}



}

add_action( 'plugins_loaded', array( 'TRIFECTA_FACBOOK', 'get_instance' ) );