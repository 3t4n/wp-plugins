<?php

class HeyCDP {
	private $hey_cdp_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'hey_cdp_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'hey_cdp_page_init' ) );
	}

	public function hey_cdp_add_plugin_page() {
		add_menu_page(
			'Hey CDP', // page_title
			'Hey CDP', // menu_title
			'manage_options', // capability
			'hey-cdp', // menu_slug
			array( $this, 'hey_cdp_create_admin_page' ), // function
			'dashicons-admin-generic', // icon_url
			2 // position
		);
	}

	public function hey_cdp_create_admin_page() {
		$this->hey_cdp_options = get_option( 'hey_cdp_option_name' ); ?>

		<div class="wrap">
      <div class="header" style="background: linear-gradient(90deg, rgba(255,85,85,1) 0%, rgba(102,0,0,1) 100%); color: white; padding: 20px">
        <h2 style="color: white; font-size: 30px">Bienvenido a Hey!</h2>
        <p style="font-size: 20px">Complementos de integración de HEY CDP</p>
      </div>
      <hr class="wp-header-end">
			<p style="font-size: 17px">Utiliza los campos disponibles para configurar la clave de acceso (hey key) y la versión correspondiente en el sistema.</p>
      <p style="font-size: 17px; font-weight: 800">Configuración:</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'hey_cdp_option_group' );
					do_settings_sections( 'hey-cdp-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function hey_cdp_page_init() {
		register_setting(
			'hey_cdp_option_group', // option_group
			'hey_cdp_option_name', // option_name
			array( $this, 'hey_cdp_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'hey_cdp_setting_section', // id
			'', // title
			array( $this, 'hey_cdp_section_info' ), // callback
			'hey-cdp-admin' // page
		);

		add_settings_field(
			'hey_key_0', // id
			'hey_key', // title
			array( $this, 'hey_key_0_callback' ), // callback
			'hey-cdp-admin', // page
			'hey_cdp_setting_section' // section
		);

		add_settings_field(
			'version_1', // id
			'Versión', // title
			array( $this, 'version_1_callback' ), // callback
			'hey-cdp-admin', // page
			'hey_cdp_setting_section' // section
		);
	}

	public function hey_cdp_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['hey_key_0'] ) ) {
			$sanitary_values['hey_key_0'] = sanitize_text_field( $input['hey_key_0'] );
		}

		if ( isset( $input['version_1'] ) ) {
			$sanitary_values['version_1'] = $input['version_1'];
		}

		return $sanitary_values;
	}

	public function hey_cdp_section_info() {
		
	}

	public function hey_key_0_callback() {
    printf(
      '<input class="regular-text" type="text" name="hey_cdp_option_name[hey_key_0]" id="hey_key_0" value="%s"><br><small>**Necesitas una licencia de Hey! activa para obtener este dato</small>',
			isset( $this->hey_cdp_options['hey_key_0'] ) ? esc_attr( $this->hey_cdp_options['hey_key_0']) : ''
		);
	}

	public function version_1_callback() {
		?> <select name="hey_cdp_option_name[version_1]" id="version_1">
			<?php $selected = (isset( $this->hey_cdp_options['version_1'] ) && $this->hey_cdp_options['version_1'] === '1.0.1') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>1.0.1</option>
		</select> <?php
	}

}

if ( is_admin() )
	$hey_cdp = new HeyCDP();

/* 
 * Retrieve this value with:
 * $hey_cdp_options = get_option( 'hey_cdp_option_name' ); // Array of All Options
 * $hey_key_0 = $hey_cdp_options['hey_key_0']; // hey_key
 * $version_1 = $hey_cdp_options['version_1']; // Versión
 */