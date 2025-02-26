<?php

class Auto_Thumbnail_Title_Admin_Options {
	private $auto_thumbnail_title_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'auto_thumbnail_title_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'auto_thumbnail_title_page_init' ) );
	}

	public function auto_thumbnail_title_add_plugin_page() {
		add_menu_page(
			'Auto thumbnail title', // page_title
			'Auto thumbnail title', // menu_title
			'manage_options', // capability
			'auto-thumbnail-title', // menu_slug
			array( $this, 'auto_thumbnail_title_create_admin_page' ), // function
			'dashicons-admin-settings', // icon_url
			3 // position
		);
	}

	public function auto_thumbnail_title_create_admin_page() {
		$this->auto_thumbnail_title_options = get_option( 'auto_thumbnail_title_option_name' ); ?>

		<div class="wrap">
			<h2>Auto thumbnail title</h2>
			<p>Auto thumbnail title</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'auto_thumbnail_title_option_group' );
					do_settings_sections( 'auto-thumbnail-title-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function auto_thumbnail_title_page_init() {
		register_setting(
			'auto_thumbnail_title_option_group', // option_group
			'auto_thumbnail_title_option_name', // option_name
			array( $this, 'auto_thumbnail_title_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'auto_thumbnail_title_setting_section', // id
			'Settings', // title
			array( $this, 'auto_thumbnail_title_section_info' ), // callback
			'auto-thumbnail-title-admin' // page
		);

		add_settings_field(
			'color_de_fondo_0', // id
			'Color de fondo', // title
			array( $this, 'color_de_fondo_0_callback' ), // callback
			'auto-thumbnail-title-admin', // page
			'auto_thumbnail_title_setting_section' // section
		);
	}

	public function auto_thumbnail_title_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['color_de_fondo_0'] ) ) {
			$sanitary_values['color_de_fondo_0'] = sanitize_text_field( $input['color_de_fondo_0'] );
		}

		return $sanitary_values;
	}

	public function auto_thumbnail_title_section_info() {
		
	}

	public function color_de_fondo_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="auto_thumbnail_title_option_name[color_de_fondo_0]" id="color_de_fondo_0" value="%s">',
			isset( $this->auto_thumbnail_title_options['color_de_fondo_0'] ) ? esc_attr( $this->auto_thumbnail_title_options['color_de_fondo_0']) : ''
		);
	}

}
if ( is_admin() )
	$auto_thumbnail_title = new Auto_Thumbnail_Title_Admin_Options();

/* 
 * Retrieve this value with:
 * $auto_thumbnail_title_options = get_option( 'auto_thumbnail_title_option_name' ); // Array of All Options
 * $color_de_fondo_0 = $auto_thumbnail_title_options['color_de_fondo_0']; // Color de fondo
 */
