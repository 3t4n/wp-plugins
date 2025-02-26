<?php // phpcs:ignore

namespace DistinctiveLightbox;

/**
 * Main WP2FA Class.
 */
class DistinctiveLightbox {

	/**
 * Options variable.
 *
 * @var array
 */
protected static $distinctive_lightbox_options;

  /**
	 * Instance wrapper.
	 *
	 * @var object
	 */
	private static $instance = null;

	/**
	 * Return plugin instance.
	 */
	public static function get_instance() {

		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Contructor.
	 */
	private function __construct() {
		self::$distinctive_lightbox_options = get_option( 'distinctive_lightbox_settings' );
		// Activation/Deactivation.
		register_activation_hook( DISTINCTIVE_LIGHTBOX_FILE, '\DistinctiveLightbox\Core\activate' );
		register_deactivation_hook( DISTINCTIVE_LIGHTBOX_FILE, '\DistinctiveLightbox\Core\deactivate' );
	}

  /**
   * Fire up classes.
   */
  public function init() {
		// Bootstrap.
		Core\setup();

		$this->settings       = new Admin\SettingsPage();
		$this->image_handling = new ImageHandling\ImageHandling();

		$this->add_actions();
  }

	/**
	 * Add our plugins actions.
	 */
	public function add_actions() {
		// SettingsPage.
		add_action( 'admin_menu', array( $this->settings, 'create_settings_admin_menu' ) );
		add_filter( 'the_content', array( $this->image_handling, 'prepare_inline_images' ) );
	}

	/**
	 * Util function to grab settings or apply defaults if no settings are saved into the db.
	 *
	 * @param  string $setting_name Settings to grab value of.
	 * @return string               Settings value or default value.
	 */
	public static function get_distinctive_lightbox_setting( $setting_name = '' ) {
		$default_settings = array(
			'image-setting'         => 'auto-all-images',
			'specific-image-class'  => '',
			'video-setting'         => 'auto-all-videos',
			'exclusive-video-class' => '',
			'opening-animation'     => 'zoomIn',
			'slide-animation'       => 'slide',
			'closing-animation'     => 'zoomOut',
			'max-width'             => '80wh',
			'max-height'            => '900px',
			'desc-position'         => 'bottom',
			'description-setting'   => 'grab-description',
			'gallery-setting'       => 'show-nav',
			'included-image-class'  => '',
			'exclusive-image-class' => '',
		);

		$apply_defaults = false;

		// If we have no setting name, return them all.
		if ( empty( $setting_name ) ) {
			return self::$distinctive_lightbox_options;
		}

		// First lets check if any options have been saved.
		if ( empty( self::$distinctive_lightbox_options ) || ! isset( self::$distinctive_lightbox_options ) ) {
			$apply_defaults = true;
		}

		if ( $apply_defaults ) {
			return $default_settings[ $setting_name ];
		} elseif ( ! isset( self::$distinctive_lightbox_options[ $setting_name ] ) ) {
			return false;
		} else {
			return self::$distinctive_lightbox_options[ $setting_name ];
		}
	}
}
