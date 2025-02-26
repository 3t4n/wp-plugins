<?php
/**
 * Advanced WP Table setup.
 *
 * @since   1.1.0
 *
 * @package Advanced_WP_Table
 */

/**
 * Class Advanced_WP_Table
 *
 * @since 1.0.0
 */
class Advanced_WP_Table {

	/**
	 * The single instance of the class.
	 *
	 * @since 1.1.0
	 *
	 * @var Advanced_WP_Table
	 */
	protected static $instance = null;

	/**
	 * Advanced_WP_Table version.
	 *
	 * @var string
	 */
	public $version = '1.1.0';

	/**
	 * Advanced_WP_Table constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->defines();

		register_activation_hook( __FILE__, array( $this, 'install' ) );
		register_deactivation_hook( __FILE__, array( $this, 'uninstall' ) );

		add_action( 'admin_notices', array( $this, 'show_notices' ) );
		add_action( 'init', array( $this, 'register_post_type' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_backend_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_frontend_scripts' ) );
		add_action( 'rest_api_init', array( $this, 'register_meta_api' ) );
		add_shortcode( 'advanced_wp_table', array( $this, 'register_shortcode' ) );

		$this->includes();
	}

	/**
	 * Define the constants.
	 *
	 * @since 1.1.0
	 */
	public function defines() {
		if ( ! defined( 'ADVANCED_WP_TABLE_PATH' ) ) {
			define( 'ADVANCED_WP_TABLE_PATH', plugin_dir_path( dirname( __FILE__ ) ) );
		}

		if ( ! defined( 'ADVANCED_WP_TABLE_URL' ) ) {
			define( 'ADVANCED_WP_TABLE_URL', plugin_dir_url( dirname( __FILE__ ) ) );
		}
	}

	/**
	 * Include the dependencies.
	 *
	 * @since 1.0.0
	 */
	public function includes() {
		if ( ! $this->should_we_run() ) {
			return;
		}

		require_once dirname( __FILE__ ) . '/class-advanced-wp-table-list.php';
	}

	/**
	 * Should we run or not.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	private function should_we_run() {
		if ( version_compare( get_bloginfo( 'version' ), '5.0', '<' ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Main Advanced_WP_Table instance.
	 *
	 * Ensures only one instance of Advanced_WP_Table is loaded or can be loaded.
	 *
	 * @since 1.1.0
	 *
	 * @return \Advanced_WP_Table
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Runs when the plugin is activated.
	 *
	 * @since 1.1.0
	 */
	public function install() {
		// Register the post type 'advanced-wp-table'.
		$this->register_post_type();

		// Clear the permalinks after the post type has been registered.
		flush_rewrite_rules();
	}

	/**
	 * Register Post Type.
	 *
	 * @since 1.0.0
	 */
	public function register_post_type() {
		$args = array(
			'public'       => false,
			'has_archive'  => false,
			'query_var'    => false,
			'show_in_rest' => true,
			'label'        => __( 'Advanced WP Table', 'advanced-wp-table' ),
		);

		register_post_type( 'advanced-wp-table', $args );
	}

	/**
	 * Runs when the plugin is deactivated.
	 *
	 * @since 1.1.0
	 */
	public function uninstall() {
		// Unregister the post type, so the rules are no longer in memory.
		unregister_post_type( 'advanced-wp-table' );

		// Clear the permalinks to remove our post type's rules from the database.
		flush_rewrite_rules();
	}

	/**
	 * Add the meta field to REST API responses for CPT advanced-wp-table read and write.
	 *
	 * @since 1.0.0
	 */
	public function register_meta_api() {
		register_rest_field(
			'advanced-wp-table',
			'advanced_wp_table_data',
			array(
				'get_callback'    => array( $this, 'get_meta' ),
				'update_callback' => array( $this, 'update_meta' ),
				'schema'          => null,
			)
		);
	}

	/**
	 * Handler for getting custom field data.
	 *
	 * @param array  $object     The object from the response.
	 * @param string $field_name Name of field.
	 *
	 * @since 1.0.0
	 *
	 * @return mixed
	 */
	public function get_meta( $object, $field_name ) {
		return get_post_meta( $object['id'], $field_name, true );
	}

	/**
	 * Handler for updating custom field data.
	 *
	 * @param mixed  $value      The value of the field.
	 * @param object $object     The object from the response.
	 * @param string $field_name Name of field.
	 *
	 * @since 1.0.0
	 *
	 * @return bool|int
	 */
	public function update_meta( $value, $object, $field_name ) {
		return update_post_meta( $object->ID, $field_name, $value );
	}

	/**
	 * Load frontend scripts.
	 *
	 * @since 1.0.0
	 */
	public function load_frontend_scripts() {
		wp_register_style(
			'advanced-wp-table-style',
			ADVANCED_WP_TABLE_URL . 'assets/advanced-wp-table.css',
			array(),
			filemtime( ADVANCED_WP_TABLE_PATH . 'assets/advanced-wp-table.css' )
		);

		if ( 'advanced-wp-table' === get_post_type() ) {
			wp_enqueue_style( 'advanced-wp-table-style' );
		}
	}

	/**
	 * Load backend scripts.
	 *
	 * @param string $hook The current admin page.
	 *
	 * @since 1.0.0
	 */
	public function load_backend_scripts( $hook ) {
		if ( 'toplevel_page_advanced-wp-table' !== $hook ) {
			return;
		}

		global $post;

		wp_add_inline_script(
			'wp-blocks',
			sprintf(
				'wp.blocks.unstable__bootstrapServerSideBlockDefinitions( %s );',
				wp_json_encode( get_block_editor_server_block_settings() )
			),
			'after'
		);

		wp_add_inline_script(
			'wp-blocks',
			sprintf(
				'wp.blocks.setCategories( %s );',
				wp_json_encode( get_block_categories( $post ) )
			),
			'after'
		);

		wp_tinymce_inline_scripts();
		wp_enqueue_editor();

		wp_enqueue_media();
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_script( 'wp-edit-post' );

		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
		do_action( 'enqueue_block_editor_assets' );

		wp_enqueue_script( 'wp-edit-site' );
		wp_enqueue_script( 'wp-format-library' );
		wp_enqueue_style( 'wp-edit-site' );
		wp_enqueue_style( 'wp-format-library' );

		// Automatically load dependencies and version.
		$asset_file = require_once dirname( __DIR__ ) . '/build/index.asset.php';

		wp_enqueue_script(
			'advanced-wp-table-backend-js',
			ADVANCED_WP_TABLE_URL . 'build/index.js',
			$asset_file['dependencies'],
			$asset_file['version'],
			true
		);

		wp_enqueue_style(
			'advanced-wp-table-backend-css',
			ADVANCED_WP_TABLE_URL . 'build/index.css',
			array(),
			$asset_file['version'],
		);
	}

	/**
	 * Register the shortcode.
	 *
	 * @param array $atts The array of options.
	 *
	 * @since 1.0.0
	 *
	 * @return mixed|void
	 */
	public function register_shortcode( $atts ) {
		$id = isset( $atts['id'] ) ? absint( $atts['id'] ) : 0;

		if ( ! $id ) {
			return;
		}

		wp_enqueue_style( 'advanced-wp-table-style' );

		/**
		 * Add filter to enqueue scripts dynamically for developers.
		 *
		 * @param int $id The table id.
		 */
		do_action( 'advanced_wp_table_enqueue_scripts', $id );

		$table = get_post_meta( $id, 'advanced_wp_table_data', true );
		$rows  = isset( $table['rows'] ) ? $table['rows'] : '';

		ob_start();
		?>

		<?php if ( $rows ) : ?>

			<div class="advanced-wp-table-wrapper" id="advanced-wp-table-<?php echo get_the_ID(); ?>">
				<table>
					<?php foreach ( $rows as $row ) : ?>
						<tr>
							<?php foreach ( $row as $cell ) : ?>
								<td>
									<?php
									// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									echo do_blocks( $cell );
									?>
								</td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>

		<?php endif; ?>
		<?php

		$output = ob_get_clean();

		/**
		 * Add filter to alter the shortcode output for developers.
		 */
		$output = apply_filters( 'advanced_wp_table_output', $output, $id );

		return $output;
	}

	/**
	 * Show admin notices.
	 *
	 * @since 1.0.0
	 */
	public function show_notices() {
		if ( $this->should_we_run() ) {
			return;
		}

		$class   = 'notice notice-info';
		$message = __( 'Advanced WP Table plugin requires WordPress version 5.0 or greater.', 'advanced-wp-table' );

		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
	}

}
