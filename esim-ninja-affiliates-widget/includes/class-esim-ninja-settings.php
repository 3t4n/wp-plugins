<?php

namespace eSimNinja;

defined( 'ABSPATH' ) || exit;

class ESimNinjaSettings {
	private $esim_ninja_settings_options;

	/**
	 * ESimNinjaSettings constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'esim_ninja_settings_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'esim_ninja_settings_page_init' ) );
	}

	/**
	 * Create plugin settings page
	 */
	public function esim_ninja_settings_add_plugin_page() {
		add_options_page(
			__( 'eSIM.Ninja Settings', 'esim-ninja-affiliates-widget' ),
			__( 'eSIM.Ninja', 'esim-ninja-affiliates-widget' ),
			'manage_options',
			'esim-ninja-settings',
			array( $this, 'esim_ninja_settings_create_admin_page' )
		);
	}

	/**
	 * Display settings
	 */
	public function esim_ninja_settings_create_admin_page() {
		$this->esim_ninja_settings_options = get_option( 'esim_ninja_settings' );
		$locale                            = get_locale();
		if ( 'ru_RU' === $locale ) {
			$link = 'https://esim.ninja/ru/affiliates/';
		} else {
			$link = 'https://esim.ninja/affiliates/';
		}
		?>
        <div class="wrap">
            <h1><?php _e( 'eSIM.Ninja Settings', 'esim-ninja-affiliates-widget' ); ?></h1>
            <p>
				<?php _e( 'eSIM.Ninja is a leading travel mobile data plans comparison platform.', 'esim-ninja-affiliates-widget' ); ?>
				<?php _e( 'This plugin allows you to quickly configure and add a widget to your posts and pages.', 'esim-ninja-affiliates-widget' ); ?>
				<?php _e( 'To use this plugin you\'ll need to', 'esim-ninja-affiliates-widget' ); ?>
                <a href="<?php echo $link; ?>"
                   target="_blank"><?php _e( 'sign up for an eSIM.Ninja affiliate account', 'esim-ninja-affiliates-widget' ); ?>.</a>
				<?php _e( 'Once you’re approved, add your Partner ID below.', 'esim-ninja-affiliates-widget' ); ?>
            </p>
			<?php //settings_errors(); ?>
            <form method="post" action="options.php">
				<?php
				settings_fields( 'esim-ninja-settings-option-group' );
				do_settings_sections( 'esim-ninja-settings-admin' ); ?>
                <h2><?php _e( 'Instructions', 'esim-ninja-affiliates-widget' ); ?></h2>
                <p><?php $this->esim_ninja_description_callback(); ?></p>
				<?php submit_button(); ?>
            </form>
        </div>
	<?php }

	/**
	 * Add fields
	 */
	public function esim_ninja_settings_page_init() {
		register_setting(
			'esim-ninja-settings-option-group',
			'esim_ninja_settings',
			array( $this, 'esim_ninja_settings_sanitize' )
		);
		add_settings_section(
			'esim_ninja_settings_setting_section', // id
			__( 'Common Settings', 'esim-ninja-affiliates-widget' ), // title
			'',
			'esim-ninja-settings-admin'
		);
		add_settings_field(
			'esim_ninja_partner_id', // id
			__( 'Partner ID', 'esim-ninja-affiliates-widget' ), // title
			array( $this, 'esim_ninja_partner_id_callback' ),
			'esim-ninja-settings-admin',
			'esim_ninja_settings_setting_section'
		);
	}

	/**
	 * Sanitize helper
	 *
	 * @param $input
	 *
	 * @return array
	 */
	public function esim_ninja_settings_sanitize( $input ) {
		$sanitary_values = array();
		if ( isset( $input['esim_ninja_partner_id'] ) ) {
			$sanitary_values['esim_ninja_partner_id'] = sanitize_text_field( $input['esim_ninja_partner_id'] );
		}

		return $sanitary_values;
	}

	/**
	 * Partner ID field
	 */
	public function esim_ninja_partner_id_callback() {
		printf(
			'<input class="regular-text" type="text" name="esim_ninja_settings[esim_ninja_partner_id]" id="esim_ninja_partner_id" value="%s">',
			isset( $this->esim_ninja_settings_options['esim_ninja_partner_id'] ) ? esc_attr( $this->esim_ninja_settings_options['esim_ninja_partner_id'] ) : ''
		);
	}

	/**
	 * Description field
	 */
	public function esim_ninja_description_callback() {
		$shortcode = '<strong>[esimninja-widget]</strong>';
		echo sprintf( __( 'Paste this shortcode %s into a post or page and the mobile data plan comparison widget will be displayed right where you’ve added it.', 'esim-ninja-affiliates-widget' ), $shortcode );
	}
}
