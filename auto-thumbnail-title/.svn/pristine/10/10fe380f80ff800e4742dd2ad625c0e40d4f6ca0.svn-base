<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/mauricioperera/
 * @since      1.0.0
 *
 * @package    Auto_Thumbnail_Title
 * @subpackage Auto_Thumbnail_Title/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Auto_Thumbnail_Title
 * @subpackage Auto_Thumbnail_Title/admin
 * @author     Mauricio Perera <mauricio.perera@gmail.com>
 */
class Auto_Thumbnail_Title_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'admin_menu', array( $this, 'auto_thumbnail_title_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'auto_thumbnail_title_page_init' ) );

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Auto_Thumbnail_Title_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Auto_Thumbnail_Title_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/auto-thumbnail-title-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Auto_Thumbnail_Title_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Auto_Thumbnail_Title_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/auto-thumbnail-title-admin.js', array( 'jquery' ), $this->version, false );

	}

public function auto_thumbnail_title_add_plugin_page() {
		add_menu_page(
			'Auto thumbnail title', // page_title
			'ATT', // menu_title
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
			<p>Un plugin creado por <a href="https://www.linkedin.com/in/mauricioperera/" rel="external nofollow" class="url">Mauricio Perera</a></p>
			<p>Selecciona el color que tendrá el fondo del titulo y la fuente.</p>
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
			'Opciones', // title
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

		add_settings_field(
			'color_de_fuente_1', // id
			'Color de fuente', // title
			array( $this, 'color_de_fuente_1_callback' ), // callback
			'auto-thumbnail-title-admin', // page
			'auto_thumbnail_title_setting_section' // section
		);
	}

	public function auto_thumbnail_title_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['color_de_fondo_0'] ) ) {
			$sanitary_values['color_de_fondo_0'] = sanitize_text_field( $input['color_de_fondo_0'] );
		}

		if ( isset( $input['color_de_fuente_1'] ) ) {
			$sanitary_values['color_de_fuente_1'] = sanitize_text_field( $input['color_de_fuente_1'] );
		}

		return $sanitary_values;
	}

	public function auto_thumbnail_title_section_info() {
		
	}

	public function color_de_fondo_0_callback() {
		printf(
			'<input class="color" type="color" name="auto_thumbnail_title_option_name[color_de_fondo_0]" id="color_de_fondo_0" value="%s">',
			isset( $this->auto_thumbnail_title_options['color_de_fondo_0'] ) ? esc_attr( $this->auto_thumbnail_title_options['color_de_fondo_0']) : ''
		);
	}

	public function color_de_fuente_1_callback() {
		printf(
			'<input class="color" type="color" name="auto_thumbnail_title_option_name[color_de_fuente_1]" id="color_de_fuente_1" value="%s">',
			isset( $this->auto_thumbnail_title_options['color_de_fuente_1'] ) ? esc_attr( $this->auto_thumbnail_title_options['color_de_fuente_1']) : ''
		);
	}

}