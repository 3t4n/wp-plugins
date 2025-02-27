<?php
/**
 * The settings of the plugin.
 *
 * @link       https://www.restaumatic.com
 * @since      1.0.0
 *
 * @package    WP_Restaumatic
 * @subpackage WP_Restaumatic/admin
 */

/**
 * The admin area of the plugin.
 *
 * @package    WP_Restaumatic
 * @subpackage WP_Restaumatic/admin
 */
class WP_Restaumatic_Settings {

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
	 * Plugin options.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $options    Plugin options.
	 */
	private $options;

	/**
	 * The Active Menu demo slug.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $demo_slug    The Active Menu demo slug.
	 */
	protected $demo_slug;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string $plugin_name    The name of this plugin.
	 * @param    string $version        The version of this plugin.
	 * @param    string $demo_slug      The Active Menu demo slug.
	 */
	public function __construct( $plugin_name, $version, $demo_slug ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		$this->demo_slug   = $demo_slug;

	}

	/**
	 * Add a top-level menu page.
	 */
	public function add_plugin_page() {

		add_menu_page(
			'WP Restaumatic',
			'WP Restaumatic',
			'manage_options',
			'wp-restaumatic',
			array( $this, 'render_admin_page' ),
			'data:image/svg+xml;base64,' . base64_encode( '<svg viewBox="0 0 126 126" width="126px" height="126px" xmlns="http://www.w3.org/2000/svg"><g fill="#a0a5aa"><path id="path25" d="M 116.49 0 L 9.48 0 C 4.266 0 0 4.266 0 9.48 L 0 116.49 C 0 121.704 4.266 125.97 9.48 125.97 L 116.49 125.97 C 121.704 125.97 125.97 121.704 125.97 116.49 L 125.97 9.48 C 125.97 4.266 121.704 0 116.49 0 Z M 107.79 88.24 L 107.79 88.24 C 107.79 89.058 106.904 89.569 106.196 89.16 L 62.988 64.214 L 19.784 89.157 C 19.074 89.568 18.186 89.055 18.186 88.235 L 18.186 37.736 C 18.186 36.915 19.074 36.403 19.784 36.813 L 62.988 61.757 L 106.196 36.811 C 106.904 36.402 107.79 36.913 107.79 37.731 Z"></path></g></svg>' ) // // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_encode
		);

	}

	/**
	 * Get Restaurant Panel URL.
	 *
	 * @param string $slug The Active Menu slug.
	 */
	public function get_restaurant_panel_url( $slug ) {
		return empty( $slug ) ? '' : 'https://' . $slug . '.skubacz.pl/admin/';
	}

	/**
	 * Options page callback.
	 */
	public function render_admin_page() {
		$this->options = get_option( 'wp_restaumatic' );
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'WP Restaumatic', 'wp-restaumatic' ); ?></h1>

			<?php settings_errors(); ?>

			<form method="post" action="options.php">
			<?php
			settings_fields( 'wp_restaumatic_group' );
			do_settings_sections( 'wp-restaumatic' );

			echo '<h2>' . esc_html__( 'Shortcode', 'wp-restaumatic' ) . '</h2>';

			if ( ! empty( $this->options['slug'] ) ) {
				echo '<p>';
				esc_html_e( 'In order to include Active Menu, use the following code on any page (paste it just as regular content in the editor)', 'wp-restaumatic' );
				echo ':</p>';
				echo '<p>';
				echo '<input type="text" value="' . esc_attr( '[restaumatic_active_menu]' ) . '" class="regular-text code" style="text-align: center;" readonly aria-label="' . esc_attr__( 'Shortcode', 'wp-restaumatic' ) . '">';
				echo '</p>';
			} else {
				echo '<p>';
				esc_html_e( 'In order to include Active Menu on your page, you need to provide the slug assigned to your account', 'wp-restaumatic' );
				echo '.</p>';
			}

			submit_button();
			?>
			</form>

			<h2><?php esc_html_e( 'Useful links', 'wp-restaumatic' ); ?></h2>

			<ul>
				<?php if ( ! empty( $this->options['slug'] ) && $this->demo_slug !== $this->options['slug'] ) { ?>
				<li>
					<a href="<?php echo esc_url( $this->get_restaurant_panel_url( $this->options['slug'] ) ); ?>"><?php esc_html_e( 'Restaurant Panel', 'wp-restaumatic' ); ?></a>
				</li>
				<?php } ?>
				<li>
					<a href="<?php echo esc_url( __( 'https://www.restaumatic.com/en/ordering-system/', 'wp-restaumatic' ) ); ?>"><?php esc_html_e( 'More about the Active Menu', 'wp-restaumatic' ); ?></a>
				</li>
				<li>
					<a href="https://wordpress.org/plugins/wp-restaumatic/"><?php esc_html_e( 'Plugin documentation', 'wp-restaumatic' ); ?></a>
				</li>
				<li>
					<a href="<?php echo esc_url( __( 'https://www.restaumatic.com/en/contact/', 'wp-restaumatic' ) ); ?>"><?php esc_html_e( 'Support', 'wp-restaumatic' ); ?></a>
				</li>
				<li>
					<a href="<?php echo esc_url( __( 'https://www.restaumatic.com/en/', 'wp-restaumatic' ) ); ?>"><?php esc_html_e( 'Restaumatic home page', 'wp-restaumatic' ); ?></a>
				</li>
			</ul>
		</div>
		<?php
	}

	/**
	 * Register and add settings.
	 */
	public function page_init() {
		register_setting(
			'wp_restaumatic_group',
			'wp_restaumatic',
			array( $this, 'sanitize' )
		);

		add_settings_section(
			'active_menu_section',
			__( 'Active Menu Settings', 'wp-restaumatic' ),
			array( $this, 'print_section_info' ),
			'wp-restaumatic'
		);

		add_settings_field(
			'active-menu-slug',
			__( 'Slug', 'wp-restaumatic' ),
			array( $this, 'slug_callback' ),
			'wp-restaumatic',
			'active_menu_section',
			array( 'label_for' => 'active-menu-slug' )
		);
	}

	/**
	 * Sanitize each setting field as needed.
	 *
	 * @param array $input Contains all settings fields as array keys.
	 */
	public function sanitize( $input ) {
		$new_input = array();

		foreach ( $input as $key => $val ) {
			if ( isset( $input[ $key ] ) ) {
				if ( 'slug' === $key ) {
					$new_input[ $key ] = sanitize_text_field( str_replace( ' ', '', $input[ $key ] ) );
				} else {
					$new_input[ $key ] = sanitize_text_field( $input[ $key ] );
				}
			}
		}

		return $new_input;
	}

	/**
	 * Print the Section text.
	 */
	public function print_section_info() {
		if ( $this->demo_slug === $this->options['slug'] ) {
			echo '<div class="notice inline notice-warning">';
			echo '<p>';
			echo '<strong>' . esc_html__( 'Warning', 'default' ) . '</strong>: ';
			printf(
				// Translators: %s is replaced with example Active Menu slug.
				esc_html__( 'The example %s slug is currently set. It\'s supposed to be used only for demo purposes, so don\'t publish the page with Active Menu shortcode (you won\'t be able to receive and manage orders).', 'wp-restaumatic' ),
				'<code>active-menu</code>'
			);
			echo '</p>';
			echo '</div>';
		}

		echo '<p>';
		esc_html_e( 'Add Restaumatic Active Menu to your website and start selling online using fully featured food ordering system.', 'wp-restaumatic' );

		if ( empty( $this->options['slug'] ) || $this->demo_slug === $this->options['slug'] ) {
			echo '<br />';
			printf(
				// Translators: %s is replaced by the Active Menu sign up link ("the Active Menu on Restaumatic.com").
				esc_html__( 'For this plugin to work, you must sign up for %s. After that, you will get the slug to use below, which allows you to include your own Active Menu on your website using the shortcode.', 'wp-restaumatic' ),
				sprintf(
					'<a href="%s">%s</a>',
					esc_url( __( 'https://www.restaumatic.com/en/ordering-system/', 'wp-restaumatic' ) ),
					esc_html__( 'the Active Menu on Restaumatic.com', 'wp-restaumatic' )
				)
			);
		} elseif ( $this->demo_slug !== $this->options['slug'] ) {
			echo '<br />';
			esc_html_e( 'Do you want to manage your Active Menu?', 'wp-restaumatic' );
			echo ' ';
			echo '<a href="' . esc_url( $this->get_restaurant_panel_url( $this->options['slug'] ) ) . '">';
			esc_html_e( 'Go to the Restaurant Panel', 'wp-restaumatic' );
			echo '</a>.';
		}

		echo '</p>';
	}

	/**
	 * Get the settings option array and print the Active Menu field and content.
	 */
	public function slug_callback() {
		printf(
			'<input type="text" id="active-menu-slug" name="wp_restaumatic[slug]" value="%s" class="regular-text" />',
			isset( $this->options['slug'] ) ? esc_attr( $this->options['slug'] ) : ''
		);

		if ( empty( $this->options['slug'] ) || $this->demo_slug === $this->options['slug'] ) {
			echo '<p class="description">';
			printf(
				// Translators: %1$s is replaced by learn more link and %2$s is replaced by contact link.
				esc_html__( 'Don\'t you know what Active Menu is or don\'t have one? %1$s or %2$s', 'wp-restaumatic' ),
				sprintf(
					'<a href="%s">%s</a>',
					esc_url( __( 'https://www.restaumatic.com/en/ordering-system/', 'wp-restaumatic' ) ),
					esc_html__( 'Learn more', 'wp-restaumatic' )
				),
				sprintf(
					'<a href="%s">%s</a>',
					esc_url( __( 'https://www.restaumatic.com/en/contact/', 'wp-restaumatic' ) ),
					esc_html__( 'contact us', 'wp-restaumatic' )
				)
			);
			echo '. ';

			if ( $this->demo_slug !== $this->options['slug'] ) {
				printf(
					// Translators: %s is replaced with example Active Menu slug.
					esc_html__( 'You can also see the demo using example %s slug.', 'wp-restaumatic' ),
					'<code>active-menu</code>'
				);
			}
			echo '</p>';
		}
	}

}
