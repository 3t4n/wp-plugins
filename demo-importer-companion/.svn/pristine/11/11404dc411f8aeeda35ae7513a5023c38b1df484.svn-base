<?php
/**
 * Plugin Name:       Demo Importer Companion
 * Plugin URI:        https://wordpress.org/plugins/demo-importer-companion/
 * Description:       Import your content, widgets and theme settings with one click. Requires 'One Click Demo Import' plugin
 * Version:           1.0.1
 * Author:            themeinwp
 * Author URI:        https://themeinwp.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       demo-importer-companion
 * Domain Path:       /languages
 * Requires at least: 5.6
 * Requires PHP: 5.2
 * Tested up to: 6.4
 *
 * @package DIC_TWP_Admin
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );  // prevent direct access.

// Define some Constants.
define( 'DIC_TWP_VERSION', '1.0.0' );
define( 'DIC_TWP_URL', plugin_dir_url( __FILE__ ) );
define( 'DIC_TWP_DIR', plugin_dir_path( __FILE__ ) );

if ( ! class_exists( 'DIC_TWP_Admin' ) ) :
	/**
	 * Main class.
	 *
	 * @since 1.0.0
	 */
	class DIC_TWP_Admin {

		/**
		 * Instance
		 *
		 * @access private
		 * @var null $instance
		 * @since 1.0.0
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.0.0
		 * @return object initialized object of class.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Hold the config settings
		 *
		 * @access private
		 * @var array $config_data
		 * @since 1.0.0
		 */
		private $config_data;

		/**
		 * Current theme
		 *
		 * @access private
		 * @var string $current_theme
		 * @since 1.0.0
		 */
		private $current_theme;

		/**
		 * Current template
		 *
		 * @access private
		 * @var string $current_template
		 * @since 1.0.0
		 */
		private $current_template;

		/**
		 * Theme url
		 *
		 * @access private
		 * @var string $theme_url
		 * @since 1.0.0
		 */
		private $theme_url;


		/**
		 * Pro Theme url
		 *
		 * @access private
		 * @var string $pro_theme_url
		 * @since 1.0.0
		 */
		private $pro_theme_url;

		/**
		 * Github base url
		 *
		 * @access private
		 * @var string $base_url
		 * @since 1.0.0
		 */
		private $base_url;

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'dic_twp_import_init' ) );
			add_action( 'themeinwp_starter_templates', array( $this, 'dic_twp_display_templates' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'dic_twp_enqueue_scripts_and_styles' ) );
			add_filter(
				'admin_body_class',
				function( $classes ) {
					$classes .= ' ocdi-importer-companion ';
					return $classes;
				}
			);
		}

		/**
		 * Check for OCDI plugin and start setup.
		 *
		 * @since 1.0.0
		 */
		public function dic_twp_import_init() {

			if ( ! function_exists( 'is_plugin_active' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			load_plugin_textdomain( 'demo-importer-companion', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

			if ( ! class_exists( 'OCDI_Plugin' ) ) {
				if ( is_multisite() ) {
					add_action( 'network_admin_notices', array( $this, 'dic_twp_ocdi_notice' ) );
				} else {
					add_action( 'admin_notices', array( $this, 'dic_twp_ocdi_notice' ) );
				}
			} else {
				$this->dic_twp_setup_init();
			}

		}

		/**
		 * Show notice if OCDI is not installed.
		 *
		 * @since 1.0.0
		 */
		public function dic_twp_ocdi_notice() {
			?>
			<div class="error">
				<p><?php esc_html_e( 'The Demo Importer Companion relies on the \'One Click Demo Import\' plugin for functionality. Ensure the plugin is installed and activated for proper operation.', 'demo-importer-companion' ); ?></p>
			</div>
			<?php
		}

		/**
		 * Setup OCDI Filters
		 *
		 * @since 1.0.0
		 */
		public function dic_twp_setup_init() {

			// Only execute on the admin side.
			if ( is_admin() ) {

				// Get Current Theme.
				$current_theme = wp_get_theme();
				if ( $current_theme->exists() && $current_theme->parent() ) {
					$parent_theme = $current_theme->parent();
					if ( $parent_theme->exists() ) {
						$this->current_theme = $parent_theme->get_stylesheet();
					}
					// Set current theme template for child theme.
					$this->current_template = $current_theme->get_stylesheet();
				} elseif ( $current_theme->exists() ) {
					$this->current_theme = $current_theme->get_stylesheet();
					// Set current theme template.
					$this->current_template = $this->current_theme;
				}

				$this->theme_url = 'https://themeinwp.com/theme/' . $this->current_theme;
				$this->pro_theme_url = 'https://themeinwp.com/theme/' . $this->current_theme.'-pro';

				// Base url of the repository.
				$this->base_url = 'https://raw.githubusercontent.com/twpimport/Demo-Importer-Companion/master/';

				// Get the json file to populate proper demo setup settings.
				$config_file = $this->base_url . $this->current_template . '/init.json';

				$data = wp_remote_get( $config_file );

				// Only execute if our config is loaded properly.
				if ( is_array( $data ) && ! is_wp_error( $data ) ) {

					$data              = wp_remote_retrieve_body( $data );
					$this->config_data = json_decode( $data, true );

					add_filter( 'ocdi/plugin_page_title', array( $this, 'dic_twp_disable_ocdi_title' ) );
					add_filter( 'ocdi/plugin_intro_text', array( $this, 'dic_twp_disable_ocdi_intro' ) );

					add_filter( 'ocdi/register_plugins', array( $this, 'dic_twp_ocdi_register_plugins' ) );
					add_filter( 'ocdi/plugin_page_setup', array( $this, 'dic_twp_ocdi_setup' ) );
					add_action( 'ocdi/before_content_import', array( $this, 'before_content_import' ) );
					add_filter( 'ocdi/import_files', array( $this, 'dic_twp_manage_import' ) );
					add_action( 'ocdi/after_import', array( $this, 'dic_twp_after_import' ) );
				}
			}

		}

		/**
		 * Disable OCDI title
		 *
		 * @param string $plugin_title OCDI Title.
		 * @since 1.0.0
		 */
		public function dic_twp_disable_ocdi_title( $plugin_title ) {
			$plugin_title = '';
			return $plugin_title;
		}

		/**
		 * Disable OCDI Intro Text.
		 *
		 * @param string $plugin_intro_text OCDI Intro Text.
		 * @since 1.0.0
		 */
		public function dic_twp_disable_ocdi_intro( $plugin_intro_text ) {
			$plugin_intro_text = '';
			return $plugin_intro_text;
		}

		/**
		 * Register recommended plugins for OCDI.
		 *
		 * @param array $plugins Array of plugins.
		 * @since 1.0.0
		 */
		public function dic_twp_ocdi_register_plugins( $plugins ) {

			if ( isset( $this->config_data['plugins'] ) ) {

				$recommended_plugins = array();

				foreach ( $this->config_data['plugins'] as $plugin_data ) {
					$recommended_plugins[] = array(
						'name'        => $plugin_data['name'],
						'slug'        => $plugin_data['slug'],
						'required'    => $plugin_data['required'],
						'preselected' => $plugin_data['preselected'],
					);
				}

				return array_merge( $plugins, $recommended_plugins );

			} else {
				return $plugins;
			}
		}

		/**
		 * Change OCDI default texts
		 *
		 * @param array $default_settings Default text array.
		 * @since 1.0.0
		 */
		public function dic_twp_ocdi_setup( $default_settings ) {

			$default_settings['page_title'] = esc_html__( 'Demo Import', 'demo-importer-companion' );
			$default_settings['menu_slug']  = $this->current_theme . '-demo-import';

			return $default_settings;
		}

		/**
		 * Init array for the OCDI demos
		 *
		 * @since 1.0.0
		 */
		public function dic_twp_manage_import() {

			$output = array();

			if ( $this->config_data && isset( $this->config_data['import_files'] ) ) {
				$free_demos = $this->config_data['import_files']['free'];
				foreach ( $free_demos as $demo_data ) {
					$file_url = $this->base_url . $this->current_template . '/' . $demo_data['import_path'] . '/';
					$theme_data = wp_get_theme();
					$theme_tags = $theme_data->get( 'Tags' );
					if (in_array('full-site-editing', $theme_tags)) {
					$output[] = array(
							'import_file_name'           => $demo_data['import_name'],
							'import_file_url'            => $file_url . 'content.xml',
							'import_preview_image_url'   => $file_url . 'screenshot.webp',
							'preview_url'                => $demo_data['preview_url'],
							'import_notice'              => esc_html( 'Make sure to leave the preselected plugins as it is to make the starter sites working as in our preview sites. Other plugins are optional and you can install them only if you need them.', 'demo-importer-companion' ),
						);
					}else {
						$output[] = array(
							'import_file_name'           => $demo_data['import_name'],
							'import_file_url'            => $file_url . 'content.xml',
							'import_widget_file_url'     => $file_url . 'widgets.wie',
							'import_customizer_file_url' => $file_url . 'customizer.dat',
							'import_preview_image_url'   => $file_url . 'screenshot.webp',
							'preview_url'                => $demo_data['preview_url'],
							'import_notice'              => esc_html( 'Make sure to leave the preselected plugins as it is to make the starter sites working as in our preview sites. Other plugins are optional and you can install them only if you need them.', 'demo-importer-companion' ),
						);
					}

				}
			}

			return $output;
		}


		/**
		 * Before Content import.
		 *
		 * @since 1.2.6
		 */
		function before_content_import() {
			// Trash default "hello word" post.
			$post = get_post( 1 );
			$slug = isset( $post->post_name ) ? $post->post_name : '';
			if ( 'hello-world' == $slug ) {
				wp_trash_post( 1 );
			}
		}
		
		/**
		 * Setup after finishing demo import
		 *
		 * @since 1.0.0
		 */
		public function dic_twp_after_import() {
			
			$dic_twp_front_page = get_posts(
			  [
			    'post_type'              => 'page',
			    'title'                  => 'Homepage',
			    'post_status'            => 'all',
			    'numberposts'            => 1,
			    'update_post_term_cache' => false,
			    'update_post_meta_cache' => false,
			  ]
			);
			
			if ( ! empty( $dic_twp_front_page ) ) {
			  update_option( 'page_on_front', $dic_twp_front_page[0]->ID );
			}

			// Get the blog page.
			$dic_twp_blog_page = get_posts(
			  [
			    'post_type'              => 'page',
			    'title'                  => 'Insights',
			    'post_status'            => 'all',
			    'numberposts'            => 1,
			    'update_post_term_cache' => false,
			    'update_post_meta_cache' => false,
			  ]
			);
			
			if ( ! empty( $dic_twp_blog_page ) ) {
			  update_option( 'page_for_posts', $dic_twp_blog_page[0]->ID );
			}
			
			if ( ! empty( $dic_twp_blog_page ) || ! empty( $dic_twp_front_page ) ) {
			  update_option( 'show_on_front', 'page' );

			}
			// Assign navigation menu locations.
			$dic_twp_menu_location_details = array(
				'primary-menu',
				'primary-left-menu',
				'footer-menu',
				'top-menu',
				'social-menu',
			);

			if ( ! empty( $dic_twp_menu_location_details ) ) {
				$navigation_settings      = array();
				$current_navigation_menus = wp_get_nav_menus();
				if ( ! empty( $current_navigation_menus ) && ! is_wp_error( $current_navigation_menus ) ) {
					foreach ( $current_navigation_menus as $menu ) {
						if ( in_array( $menu->slug, $dic_twp_menu_location_details ) ) {
							$navigation_settings[ $menu->slug ] = $menu->term_id;
						}
					}
				}
				set_theme_mod( 'nav_menu_locations', $navigation_settings );
			}
		}

		/**
		 * Render Site templates
		 *
		 * @since 1.0.0
		 */
		public function dic_twp_display_templates() {
			if ( $this->config_data && isset( $this->config_data['import_files'] ) ) {
				$free_demos = $this->config_data['import_files']['free'];
				$pro_demos  = $this->config_data['import_files']['pro'];
				?>
					<div class="ocdi-companion-header">
						<h2 class="ocdi-companion-title"><?php esc_html_e( 'Starter Templates', 'demo-importer-companion' ); ?></h2>
						<p class="ocdi-companion-subtitle">
							<?php esc_html_e( 'Get access to meticulously designed professional website templates that are visually attractive, saving you precious time and effort during the development phase.', 'demo-importer-companion' ); ?>
						</p>
					</div>
					<div class="ocdi-companion-main">
						<div class="ocdi-companion-row">
							<?php
							foreach ( $free_demos as $index => $demo_data ) {
								$file_url   = $this->base_url . $this->current_template . '/' . $demo_data['import_path'] . '/';
								$import_url = add_query_arg(
									array(
										'page'   => $this->current_theme . '-demo-import',
										'step'   => 'import',
										'import' => esc_attr( $index ),
									),
									admin_url( 'themes.php' )
								);
								?>
								<div class="ocdi-companion-item companion-item-free">
                                    <div class="ocdi-companion-panel">
                                        <div class="ocdi-companion-image">
                                            <img class="ocdi-responsive-image" src="<?php echo esc_url( $file_url . 'screenshot.webp' ); ?>">
                                        </div>
                                        <div class="ocdi-companion-footer">
                                            <h3 class="ocdi-companion-footer-title" title="<?php echo esc_attr( $demo_data['import_name'] ); ?>"><?php echo esc_html( $demo_data['import_name'] ); ?></h3>
                                            <div class="ocdi-companion-btn-group">
                                                <a class="ocdi-companion-btn button ocdi-companion-btn-secondary" href="<?php echo esc_url( $demo_data['preview_url'] ); ?>" target="_blank"><?php esc_html_e( 'Preview', 'demo-importer-companion' ); ?></a>
                                                <a class="ocdi-companion-btn button ocdi-companion-btn-primary" href="<?php echo esc_url( $import_url ); ?>"><?php esc_html_e( 'Import Demo', 'demo-importer-companion' ); ?></a>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<?php
							}
							foreach ( $pro_demos as $index => $demo_data ) {
								$file_url = $this->base_url . $this->current_theme . '/' . $demo_data['import_path'] . '/';
								?>
								<div class="ocdi-companion-item companion-item-pro">
                                    <div class="ocdi-companion-panel">
                                        <span class="ocdi-companion-badge"><?php esc_html_e( 'Premium', 'demo-importer-companion' ); ?></span>
                                        <div class="ocdi-companion-image">
                                            <img class="ocdi-responsive-image" src="<?php echo esc_url( $file_url . 'screenshot.webp' ); ?>">
                                        </div>
                                        <div class="ocdi-companion-footer">
                                            <h3 class="ocdi-companion-footer-title" title="<?php echo esc_attr( $demo_data['import_name'] ); ?>"><?php echo esc_html( $demo_data['import_name'] ); ?></h3>
                                            <div class="ocdi-companion-btn-group">
                                                <a class="ocdi-companion-btn button ocdi-companion-btn-secondary" href="<?php echo esc_url( $demo_data['preview_url'] ); ?>" target="_blank"><?php esc_html_e( 'Preview', 'demo-importer-companion' ); ?></a>
                                                <a class="ocdi-companion-btn button ocdi-companion-btn-primary" href="<?php echo esc_url( $this->pro_theme_url . '/' ); ?>" target="_blank"><?php esc_html_e( 'Upgrade Now', 'demo-importer-companion' ); ?></a>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				<?php
			}
		}

		/**
		 * Enqueue admin scripts and styles
		 *
		 * @since 1.0.0
		 */
		public function dic_twp_enqueue_scripts_and_styles() {
			wp_enqueue_style( 'demo-importer-companion', DIC_TWP_URL . 'admin/css/demo-importer-companion-admin.css', array(), DIC_TWP_VERSION, 'all' );
		}
	}

endif;

DIC_TWP_Admin::get_instance();
