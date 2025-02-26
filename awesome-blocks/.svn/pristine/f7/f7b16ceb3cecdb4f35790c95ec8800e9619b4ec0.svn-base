<?php
/**
 * Hooks scripts output class
 *
 *
 * @package	awesome-blocks
 * @subpackage awesome-blocks/public
 * @author	 zintaThemes
 *
 *
 */

if ( ! defined( 'ABSPATH' ) || class_exists( 'AwesomeBlocksHooks' ) ) return;

/**
 * This class describes awesome blocks hooks.
 *
 *
 * @since		1.0.0
 * @var			unown
 *
 */
class AwesomeBlocksHooks extends AwesomeBlocks
{

	/**
	 * IDs
	 *
	 * @var        array
	 */
	public static $blocks = [ 'Pagecontent', 'Magicbox', 'Menu', 'Smenu', 'Breadcrumb', 'Search' ];

	/**
	 * Constructs a new instance.
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 *
	 */
	public function __construct() {
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		$this->blocks_register();
		$this->plugin_assets();

		add_action('wp_ajax_awesome_blocks_inlinestyle', [ $this, 'save_meta' ]);

		return true;
	} // End __construct()

	/**
	 * blocks register function
	 *
	 */
	private function blocks_register() {

		add_filter( 'block_categories', function( $categories ) {
			return array_merge( $categories, [
				[
					'slug' => 'awesome-blocks',
					'title' => esc_html('Gutenberg Blocks', 'awesome-blocks')
				]
			]);
		}, 10, 2 );

		add_action( 'init', function() {
			$dir = AWESOMEBLOCKS_PATH . 'includes' . DIRECTORY_SEPARATOR . 'blocks' . DIRECTORY_SEPARATOR;

			foreach ( self::$blocks as $block ) {
				$file = $dir . 'class-block-' . strtolower( $block ) . '.php';
				if ( file_exists( $file ) ) {
					$class = 'AwesomeBlocks' . $block;
					require_once $file;
					class_exists( $class ) && new $class();
				}
			}
		});

		add_action( 'admin_enqueue_scripts', [ $this, 'admin_style' ] );;
		add_action( 'enqueue_block_editor_assets', [ $this, 'blocks_assets' ] );

	}

	/**
	 * Enqueue blocks assets
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 *
	 */
	public function blocks_assets() {
		wp_register_script(
			'leaflet',
			AWESOMEBLOCKS_URL . 'assets/vendor/leaflet/leaflet.js',
			[],
			AWESOMEBLOCKS_VERSION
		);

		wp_enqueue_script(
			'awesome-blocks',
			AWESOMEBLOCKS_URL . 'assets/js/awesome-blocks.bundle.min.js',
			[ 'leaflet', 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor' ],
			AWESOMEBLOCKS_VERSION
		);

    wp_localize_script( 'awesome-blocks', 'AwesomeBlocks', $this->js_data() );

		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'awesome-blocks', 'awesome-blocks' );
		}
	}

	/**
	 * load plugin assets
	 *
	 */
	private function plugin_assets() {
    add_action( 'add_meta_boxes', [ $this, 'register_meta_boxes' ] );
		add_action( 'wp_head', [ $this, 'head_code' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'scripts_start' ], 11 );
	}

	/**
	 * set ajax dtat
	 *
	 * @return     array  ( description_of_the_return_value )
	 */
	private function js_data() {
		$id = get_the_ID();
		$style = get_post_meta( $id, '_awesome-blocks_inlinestyle', true );

		return[
			'id' => $id,
      'inlineStyle' => is_array($style) && !empty($style) ? $style : [],
      'ajaxurl'   => admin_url( 'admin-ajax.php' ),
      'nonce' => wp_create_nonce( 'awesome-blocks-nonce' ),
		];
	}

	/**
	 * Saves a meta.
	 *
	 * @param      <type>  $post_id  The post identifier
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 *
	 */
	public function save_meta() {
		check_ajax_referer( 'awesome-blocks-nonce', 'nonce' );

		$status = 'success';
		$post_id = (int) $_POST['id'];
		$style_array = (array) $this->sanitize_style( $_POST['style_array'] );

		if ( ! empty( $post_id ) ) {
			update_post_meta( $post_id, '_awesome-blocks_inlinestyle', $style_array );
		} else {
			$status = 'failure';
		}

		wp_die( $status );
	}

	/**
	 * sanitize style JSON object
	 *
	 * @param      <type>  $style  The style
	 */
	private function sanitize_style( $style ) {
		$output = [];

		if ( ! empty( $style ) ) {

			$validate_css = $this->validate();

			foreach ( $style as $key => $value ) {
				$block = sanitize_html_class($key); // unique ID for block
				$style = true === $validate_css->validate( $value['style'] ) ? $value['style'] : '';

				if ( ! empty( $value['element'] ) && ! empty( $style ) ) {
					$element 	= sanitize_text_field( $value['element'] ); // the element selector

					$output[ $block ] = [
						'element' => $element,
						'style' => $style
					];
				}

			}
		}

		return $output;
	}

	/**
	 * sanitize and validate CSS styles
	 *
	 * @return     WP_Customize_Custom_CSS_Setting  The wp customize custom css setting.
	 */
	private function validate() {
		if ( ! class_exists( 'WP_Customize_Setting' ) ) {
			require_once ABSPATH . 'wp-includes' . DIRECTORY_SEPARATOR . 'class-wp-customize-setting.php';
			require_once ABSPATH . 'wp-includes' . DIRECTORY_SEPARATOR . 'customize' . DIRECTORY_SEPARATOR . 'class-wp-customize-custom-css-setting.php';
		}
		return new WP_Customize_Custom_CSS_Setting( 'awesome-blocks', 'custom_css[awesome-blocks]' );
	}

	/**
	 * scripts_start
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 *
	 */
	public function scripts_start() {
		$this->enqueue_styles();
		$this->enqueue_scripts(
			has_block(
				'awesome-blocks/openstreetmap',
				get_the_ID()
			)
		);
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public function enqueue_styles() {
		wp_register_style(
			'fontawesome',
			AWESOMEBLOCKS_URL.'assets/vendor/fontawesome/css/all.min.css',
			[],
			AWESOMEBLOCKS_VERSION,
			'all'
		);

		wp_register_style(
			'awesome-blocks',
			AWESOMEBLOCKS_URL.'assets/css/style.min.css',
			[ 'fontawesome' ],
			AWESOMEBLOCKS_VERSION,
			'all'
		);

		wp_enqueue_style('awesome-blocks');
	} // End enqueue_styles()

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public function admin_style() {
    wp_enqueue_style(
			'fontawesome',
			AWESOMEBLOCKS_URL . 'assets/vendor/fontawesome/css/all.min.css',
			[],
			AWESOMEBLOCKS_VERSION
		);
		wp_enqueue_style(
			'awesome-blocks',
			AWESOMEBLOCKS_URL . 'assets/css/editor.min.css',
			[],
			AWESOMEBLOCKS_VERSION
		);
	} // End enqueue_styles()

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public function enqueue_scripts( $openstreetmap = false ) {

		$dep = [];

		wp_register_script(
			'leaflet',
			AWESOMEBLOCKS_URL . 'assets/vendor/leaflet/leaflet.js',
			[],
			AWESOMEBLOCKS_VERSION,
			true
		);

		wp_register_script(
			'leaflet-markercluster',
			AWESOMEBLOCKS_URL . 'assets/vendor/Leaflet.markercluster/leaflet.markercluster.js',
			[ 'leaflet' ],
			AWESOMEBLOCKS_VERSION,
			true
		);

		if ( $openstreetmap ) {
			$dep[] = 'leaflet-markercluster';
		}

		wp_register_script(
			'awesome-blocks',
			AWESOMEBLOCKS_URL . 'assets/js/awesome-blocks.min.js',
			$dep,
			AWESOMEBLOCKS_VERSION,
			true
		);

		wp_enqueue_script('awesome-blocks');
	} // End enqueue_scripts()

	/**
	 *
	 * Create header script.
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public function head_code() {
		$id = get_the_ID();

		if ( empty($id) ) {
			echo '';
		}

		$styles = self::get_inline_style(
			get_post_meta( $id, '_awesome-blocks_inlinestyle', true )
		);

		$type_attr = current_theme_supports( 'html5', 'style' ) ? '' : ' type="text/css"';
		?>
		<style<?php echo $type_attr; ?> id="awesome-blocks_inline_style">
			<?php echo strip_tags( $styles );?>
		</style>
    <?php
	} // End head_code()

	/**
	 * Gets the inline style.
	 *
	 * @param		string	$value	The value
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public static function get_inline_style( $inline_style ) {
		if ( empty( $inline_style ) ) {
			return '';
		}

		$css = '';
		if ( is_array( $inline_style ) && !empty( $inline_style ) ) {
			foreach ( $inline_style as $key => $value ) {
				if ( isset($value['element']) && isset($value['style']) && ! empty($value['element']) && ! empty($value['style']) && is_string($value['element']) && is_string($value['style']) ) {
					$style = stripslashes($value['style']);
					$css .= sanitize_text_field( $value['element'] ) . ' { ' . sanitize_text_field($style) . " }";
				}
			}
		}
		return $css;
	}

	/**
	 * register awesome-blocks metaboxes
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var			unown
	 */
	public function register_meta_boxes( $post ) {
		add_meta_box(
			'_awesome-blocks_inlinestyle',
			esc_html__('Awesome Blocks', 'awesome-blocks'),
			function () {
				echo '<input id="awesome-blocks_inline_style" type="text" name="awesome-blocks_inlinestyle" value=""/>';
			},
			[ 'post', 'page', 'hayyabuild' ]
		);
	}

} // End AwesomeBlocksHooks class
