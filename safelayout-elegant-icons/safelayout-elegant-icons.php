<?php
/*
Plugin Name: Safelayout Elegant Icons
Plugin URI: https://safelayout.com
Description: Beautiful SVG icons.
Requires at least: 6.2
Requires PHP: 7.0
Version: 1.2.1
Author: Safelayout
Text Domain: safelayout-elegant-icons
Domain Path: /languages
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Elementor tested up to: 3.27.6
Elementor Pro tested up to: 3.27.4
*/

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

if ( ! class_exists( 'Safelayout_elegant_icons' ) && ! class_exists( 'Safelayout_elegant_icons_pro' ) ) {
	
	// Define the constant used in this plugin
	define( 'SAFELAYOUT_ICONS_VERSION', '1.2.1');
	define( 'SAFELAYOUT_ICONS_PATH', plugin_dir_path( __FILE__ ) );
	define( 'SAFELAYOUT_ICONS_URL', plugin_dir_url( __FILE__ ) );
	define( 'SAFELAYOUT_ICONS_NAME', plugin_basename( __FILE__ ) );

	class Safelayout_elegant_icons {
		protected $options_page_hook = null;
		protected $elementor_iconbox_styles = null;
		protected $elementor_iconbox_styles_key = null;
		protected $icons_list_key = false;

		public function __construct() {
			add_action( 'init', array( $this, 'load_textdomain' ) );
			add_action( 'activated_plugin', array( $this, 'activated_plugin' ) );
			add_filter( 'plugin_action_links_' . SAFELAYOUT_ICONS_NAME, array( $this, 'plugin_action_links' ) );
			add_filter( 'wp_kses_allowed_html', array( $this, 'allowed_html' ), 10, 2 );
			add_filter( 'safecss_filter_attr_allow_css', array( $this, 'attr_allow_css' ), 10, 2 );
			add_filter( 'safe_style_css', array( $this, 'allowed_css' ), 10, 1 );

			add_action( 'init', array( $this, 'register_block' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'load_packs' ), 1 );
			add_action( 'enqueue_block_editor_assets', array( $this, 'set_translations' ), PHP_INT_MAX );
			add_filter( 'block_categories_all', array( $this, 'safelayout_blocks_categories_add' ), 10, 2 );

			add_filter( 'tiny_mce_before_init', array( $this, 'new_mce_options' ), PHP_INT_MAX );
			add_filter( 'wp_enqueue_scripts', array( $this, 'enqueue_mce' ), PHP_INT_MAX );
			add_filter( 'mce_external_plugins', array( $this, 'mce_plugins' ), PHP_INT_MAX );
			add_filter( 'mce_buttons', array( $this, 'mce_buttons' ), PHP_INT_MAX );

			add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
			add_action( 'elementor/controls/register', array( $this, 'register_controls' ) );
			add_action( 'elementor/editor/before_enqueue_scripts', array( $this, 'elementor_enqueue' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'register_elementor_front' ) );
			add_action( 'elementor/preview/enqueue_styles', array( $this, 'elementor_preview_enqueue' ) );
			add_filter( 'elementor/document/save/data', array( $this, 'elementor_iconbox_style' ), 10, 2 );

			if ( is_admin() ) {
				add_action( 'admin_menu', array( $this, 'admin_menu' ) );
				add_action( 'admin_init', array( $this, 'add_settings_fields' ) );
				add_action( 'admin_init', array( $this, 'add_rate_reminder' ) );
				add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
				add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts_for_feedback' ) );
				add_action( 'admin_footer-plugins.php', array( $this, 'add_code_for_feedback' ) );
				add_action( 'wp_ajax_slei_icons_feedback', array( $this, 'icons_feedback_ajax_handler' ) );
				add_filter( 'http_request_host_is_external', array( $this, 'allow_icons_feedback_host' ), 10, 3 );
				add_filter( 'register_block_type_args', array( $this, 'add_icon_blocks_to_core_blocks' ), 10, 2 );
			}
		}

		// set icon box front style
		public function set_iconbox_style( &$elements ) {
			for ( $i = 0, $size = count( $elements ); $i < $size; ++$i ) {
				if ( $elements[$i]['elType'] == 'widget' && $elements[$i]['widgetType'] == 'Safelayout_iconbox_widget' ) {
					if ( array_key_exists( 'settings', $elements[$i] ) && count( $elements[$i]['settings'] ) > 0 && array_key_exists( 'iconbox', $elements[$i]['settings'] ) ) {
						$box = $elements[$i]['settings']['iconbox'];
						if ( ( $pos = strrpos( $box, "</style>" ) ) !== FALSE ) {
							$elements[$i]['settings']['iconbox'] = $box = substr( $box, $pos + 8 );
						}
						$effect;
						$result = preg_match( '/sl-ei-container-block-effect[0-9]{3}/', $box, $effect );
						if ( $result ) {
							if ( ! in_array( $effect[0], $this->elementor_iconbox_styles_key ) ) {
								$this->elementor_iconbox_styles_key[] = $effect[0];
								$index = substr( $effect[0], -3 );
								$tag = '<style type="text/css" id="safelayout-icon-box-block-effect' . $index . '-css">';
								$elements[$i]['settings']['iconbox'] = $tag . $this->elementor_iconbox_styles[(int)$index] . '</style>' . $box;
							}
						}
					}
				} else if ( array_key_exists( 'elements', $elements[$i] ) && count( $elements[$i]['elements'] ) > 0 ) {
					$this->set_iconbox_style( $elements[$i]['elements'] );
				}
			}
		}

		// set icon box front style
		public function elementor_iconbox_style( $data, $object ) {
			$this->set_elementor_iconbox_style_array();
			if ( array_key_exists( 'elements', $data ) && count( $data['elements'] ) > 0 ) {
				$this->set_iconbox_style( $data['elements'] );
			}
			return $data;
		}

		// Register elementor widget front js & css file
		public function register_elementor_front() {
			wp_register_style(
				'safelayout-safelayout-icon-style',
				SAFELAYOUT_ICONS_URL . 'build/icon/style-index.css',
				array(),
				SAFELAYOUT_ICONS_VERSION,
			);
			wp_register_style(
				'safelayout-safelayout-icon-box-style',
				SAFELAYOUT_ICONS_URL . 'build/icon-box/style-index.css',
				array(),
				SAFELAYOUT_ICONS_VERSION,
			);
		}

		// Register elementor widget
		public function register_widgets( $widgets_manager ) {
			require_once SAFELAYOUT_ICONS_PATH . 'elementor/class-safelayout-icons-elementor-widget.php';
			$widgets_manager->register( new \Safelayout_icons_elementor_widget() );
			require_once SAFELAYOUT_ICONS_PATH . 'elementor/class-safelayout-iconbox-elementor-widget.php';
			$widgets_manager->register( new \Safelayout_iconbox_elementor_widget() );
		}

		// Register elementor control
		public function register_controls( $controls_manager ) {
			require_once SAFELAYOUT_ICONS_PATH . 'elementor/class-safelayout-icons-elementor-control.php';
			$controls_manager->register( new \Safelayout_icons_elementor_control() );
			require_once SAFELAYOUT_ICONS_PATH . 'elementor/class-safelayout-iconbox-elementor-control.php';
			$controls_manager->register( new \Safelayout_iconbox_elementor_control() );
			require_once SAFELAYOUT_ICONS_PATH . 'elementor/class-safelayout-boxbutton-elementor-control.php';
			$controls_manager->register( new \Safelayout_boxbutton_elementor_control() );
			require_once SAFELAYOUT_ICONS_PATH . 'elementor/class-safelayout-ribbon-elementor-control.php';
			$controls_manager->register( new \Safelayout_ribbon_elementor_control() );
			require_once SAFELAYOUT_ICONS_PATH . 'elementor/class-safelayout-boxhead-elementor-control.php';
			$controls_manager->register( new \Safelayout_boxhead_elementor_control() );
			require_once SAFELAYOUT_ICONS_PATH . 'elementor/class-safelayout-boxtext-elementor-control.php';
			$controls_manager->register( new \Safelayout_boxtext_elementor_control() );
		}

		// Add js & css file for elementor editor
		public function elementor_enqueue() {
			$this->load_packs();
			$this->load_mce_assets();
			$this->load_iconbox_assets();
			$this->load_ribbon_assets();
			$this->load_boxbutton_assets();
		}

		// Add js & css file for elementor editor
		public function elementor_preview_enqueue() {
			wp_enqueue_style( 'safelayout-safelayout-icon-box-editor-style' );
		}

		// Add js & css file for icon box edit
		public function load_iconbox_assets() {
			$asset = include SAFELAYOUT_ICONS_PATH . 'build/icon-box/index.asset.php';
			wp_enqueue_script(
				'safelayout-safelayout-icon-box-editor-script',
				SAFELAYOUT_ICONS_URL . 'build/icon-box/index.js',
				$asset['dependencies'],
				$asset['version'],
				array(
					'in_footer' => true,
				)
			);
			wp_enqueue_style(
				'safelayout-safelayout-icon-box-editor-style',
				SAFELAYOUT_ICONS_URL . 'build/icon-box/index.css',
				array_filter(
					$asset['dependencies'],
					function ( $style ) {
						return wp_style_is( $style, 'registered' );
					}
				),
				$asset['version'],
			);
			wp_enqueue_style(
				'safelayout-safelayout-icon-box-style',
				SAFELAYOUT_ICONS_URL . 'build/icon-box/style-index.css',
				array(),
				$asset['version'],
			);
			foreach ( $asset['dependencies'] as $dep ) {
				wp_enqueue_style( $dep );
			}
		}

		// Add js & css file for box ribbon edit
		public function load_ribbon_assets() {
			$asset = include SAFELAYOUT_ICONS_PATH . 'build/box-ribbon/index.asset.php';
			wp_enqueue_script(
				'safelayout-safelayout-box-ribbon-editor-script',
				SAFELAYOUT_ICONS_URL . 'build/box-ribbon/index.js',
				$asset['dependencies'],
				$asset['version'],
				array(
					'in_footer' => true,
				)
			);
			foreach ( $asset['dependencies'] as $dep ) {
				wp_enqueue_style( $dep );
			}
		}

		// Add js & css file for box button edit
		public function load_boxbutton_assets() {
			$asset = include SAFELAYOUT_ICONS_PATH . 'build/box-button/index.asset.php';
			wp_enqueue_script(
				'safelayout-safelayout-box-button-editor-script',
				SAFELAYOUT_ICONS_URL . 'build/box-button/index.js',
				$asset['dependencies'],
				$asset['version'],
				array(
					'in_footer' => true,
				)
			);
			foreach ( $asset['dependencies'] as $dep ) {
				wp_enqueue_style( $dep );
			}
		}

		// Load plugin textdomain
		public function load_textdomain() {
			load_plugin_textdomain( 'safelayout-elegant-icons', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

		// Add svg to tinymce
		public function new_mce_options( $init ) {
			$ext = 'span[*],div[*],svg[*],a[*],circle[*],clippath[*],defs[*],ellipse[*],feblend[*],fecolormatrix[*],fecomponenttransfer[*],fecomposite[*],feconvolvematrix[*],fediffuselighting[*],fedisplacementmap[*],fedistantlight[*],feflood[*],fefunca[*],fefuncb[*],fefuncg[*],fefuncr[*],fegaussianblur[*],feimage[*],femerge[*],femergenode[*],femorphology[*],feoffset[*],fepointlight[*],fespecularlighting[*],fespotlight[*],fetile[*],feturbulence[*],filter[*],g[*],mask[*],path[*],pattern[*],polygon[*],polyline[*],radialgradient[*],rect[*],stop[*],lineargradient[*],style[*],symbol[*],use[*]';

			if ( isset( $init['extended_valid_elements'] ) ) { 
				$init['extended_valid_elements'] .= ',' . $ext;
			} else {
				$init['extended_valid_elements'] = $ext;
			}

			$s = SAFELAYOUT_ICONS_URL . 'build/icon/';
			if ( isset( $init['content_css'] ) ) { 
				$init['content_css'] .= ',' . $s . 'style-index.css';
			} else {
				$init['content_css'] = $s . 'style-index.css';
			}
			$this->load_packs();
			$this->load_mce_assets();
			return $init;
		}

		// Loade assets for tinymce
		public function load_mce_assets() {
			$asset = include SAFELAYOUT_ICONS_PATH . 'build/mce/index.asset.php';
	
			wp_enqueue_script(
				'safelayout-safelayout-mce-editor-script',
				SAFELAYOUT_ICONS_URL . 'build/mce/index.js',
				$asset['dependencies'],
				$asset['version'],
				array(
					'in_footer' => true,
				)
			);

			wp_enqueue_style(
				'safelayout-safelayout-icon-editor-style',
				SAFELAYOUT_ICONS_URL . 'build/icon/index.css',
				array_filter(
					$asset['dependencies'],
					function ( $style ) {
						return wp_style_is( $style, 'registered' );
					}
				),
				$asset['version'],
			);
	
			wp_enqueue_style(
				'safelayout-safelayout-icon-style',
				SAFELAYOUT_ICONS_URL . 'build/icon/style-index.css',
				array(),
				$asset['version'],
			);
			foreach ( $asset['dependencies'] as $dep ) {
				wp_enqueue_style( $dep );
			}
		}

		// Add js & css file for frontend mce
		public function enqueue_mce() {
			$wp_post = get_post();

			if ( $wp_post instanceof WP_Post ) {
				$n = 'safelayout-ei-icon-block';
				if ( $n !== '' && mb_strpos( (string) $wp_post->post_content, $n ) !== false ) {
					wp_enqueue_style(
						'safelayout-safelayout-icon-style',
						SAFELAYOUT_ICONS_URL . 'build/icon/style-index.css',
						array(),
						SAFELAYOUT_ICONS_VERSION,
					);
				}
			}
		}

		// Add js plugin file to tinymce
		public function mce_plugins( $plugins ) {
			$plugins['safelayout_icons'] = SAFELAYOUT_ICONS_URL . 'assets/js/plugin.js';
			return $plugins;
		}

		// Add a toolbar button to tinymce
		public function mce_buttons( $toolbarButtons ) {
			$toolbarButtons[] = 'safelayout_icons';
			return $toolbarButtons;
		}

		// activated plugin
		public function activated_plugin( $plugin ) {
			if( $plugin == plugin_basename( __FILE__ ) ) {
				$rate = $this->get_rate_data();
			}
		}

		// Add settings link on plugin page
		public function plugin_action_links( $links ) {
			$settings_link = array(
				'<a href="' . admin_url( 'options-general.php?page=safelayout-elegant-icons' ) . '">' . esc_html__( 'Settings', 'safelayout-elegant-icons' ) . '</a>',
			);
			$links = array_merge( $links, $settings_link );
			return $links;
		}

		// Register icons block
		public function register_block() {
			if ( ! function_exists( 'register_block_type' ) ) {
				// Gutenberg is not active.
				return;
			}
			register_block_type( __DIR__ . '/build/icon' );
			register_block_type( __DIR__ . '/build/icon-box' );
			register_block_type( __DIR__ . '/build/box-button' );
			register_block_type( __DIR__ . '/build/box-ribbon' );
			register_block_type( __DIR__ . '/build/container' );
		}

		// Add block category
		public function safelayout_blocks_categories_add( $block_categories, $editor_context ) {
			$key = false;
			foreach ( $block_categories as $block_cat ) {
				if ( $block_cat['slug'] === 'blocks-safelayout-category' ) {
					$key = true;
					break;
				}
			}
			if ( ! $key ) {
				array_unshift(
					$block_categories,
					array(
						'slug'  => 'blocks-safelayout-category',
						'title' => __( 'Blocks By Safelayout', 'safelayout-elegant-icons' ),
						'icon'  => null,
					)
				);
			}
			return $block_categories;
		}

		// Return rate reminder data
		public function get_rate_data() {
			$rate = get_option( 'safelayout_icons_options_rate' );
			if ( ! $rate ) {
				$rate = array(
					'time'	=> time(),
					'later'	=> time(),
				);
				update_option( 'safelayout_icons_options_rate', $rate );
			}
			return $rate;
		}

		// Return icons upgrade data
		public function get_upgrade_data() {
			$upgrade = get_option( 'safelayout_icons_options_upgrade' );
			if ( ! $upgrade ) {
				$upgrade = time();
				update_option( 'safelayout_icons_options_upgrade', $upgrade );
			}
			return $upgrade;
		}

		// Add rate reminder
		public function add_rate_reminder() {
			if ( is_super_admin() ) {
				$rate = $this->get_rate_data();
				$upgrade = $this->get_upgrade_data();
				if ( $rate['later'] != 0 && $rate['later'] < strtotime( '-3 day' ) ) {
					add_action( 'admin_notices', array( $this, 'show_rate_reminder' ), 0 );
					add_action( 'wp_ajax_slei_icons_rate_reminder', array( $this, 'icons_rate_reminder_ajax_handler' ) );
					add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts_for_rate_reminder' ) );
				} else if ( $upgrade < strtotime( '-20 day' ) ) {
					add_action( 'admin_notices', array( $this, 'show_upgrade_message' ), 0 );
					add_action( 'wp_ajax_slei_icons_upgrade', array( $this, 'icons_upgrade_ajax_handler' ) );
					add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts_for_rate_reminder' ) );
				}
			}
		}

		// ajax handlers for rate reminder
		public function icons_rate_reminder_ajax_handler() {
			check_ajax_referer( 'slei_icons_ajax' );
			$type = sanitize_text_field( $_POST['type'] );
			$rate = $this->get_rate_data();
			if ( $type === 'sl-ei-rate-later' ) {
				$rate['later'] = time();
			} else {
				$rate['later'] = 0;
			}
			update_option( 'safelayout_icons_options_rate', $rate );

			wp_die();
		}

		// Show rate reminder
		public function show_rate_reminder() {
			global $current_user;
			?>
			<div id="sl-ei-rate-reminder" class="notice notice-success is-dismissible">
				<img alt="safelayout elegant icons" src="https://ps.w.org/safelayout-elegant-icons/assets/icon-128x128.png">
				<div class="sl-ei-msg-container">
					<p>
						<?php
						printf(
							esc_html__(
								'Howdy, %1$s! Thank you for using %2$s! Could you please do us a BIG favor and %3$s? Just to help us spread the word and boost our motivation.%4$s',
								'safelayout-elegant-icons'
							),
							'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
							'<strong>' . esc_html__( 'Safelayout Elegant Icons', 'safelayout-elegant-icons' ) . '</strong>',
							'<strong>' . esc_html__( 'give it a 5-star rating on WordPress.org', 'safelayout-elegant-icons' ) . '</strong>',
							'<br>' . esc_html__( 'We really appreciate your support!', 'safelayout-elegant-icons' ) . '<strong> -Safelayout-</strong>'
						);
						?>
					</p>
					<div class="sl-ei-rate-reminder-footer">
						<a id="sl-ei-rate-ok" class="button" href="https://wordpress.org/support/plugin/safelayout-elegant-icons/reviews/?filter=5" target="_blank">
							<?php esc_html_e( 'Yes, I will help ★★★★★', 'safelayout-elegant-icons' ); ?>
						</a>
						<a id="sl-ei-rate-later" class="button"><span class="dashicons dashicons-calendar"></span><?php esc_html_e( 'Remind me later', 'safelayout-elegant-icons' ); ?></a>
						<a id="sl-ei-rate-already" class="button"><span class="dashicons dashicons-smiley"></span><?php esc_html_e( 'I already did', 'safelayout-elegant-icons' ); ?></a>
					</div>
				</div>
			</div>
			<?php
		}

		// ajax handlers for upgrade message
		public function icons_upgrade_ajax_handler() {
			check_ajax_referer( 'slei_icons_ajax' );
			update_option( 'safelayout_icons_options_upgrade', time() );
			wp_die();
		}

		// Show upgrade message
		public function show_upgrade_message() {
			global $current_user;
			?>
			<div id="sl-ei-upgrade-reminder" class="notice notice-success is-dismissible">
				<div class="sl-ei-msg-container">
					<p>
						<?php
						printf(
							esc_html__(
								'Howdy, %1$s! Thank you for using %2$s! Please consider %3$s, get full features and %4$s.%5$s',
								'safelayout-elegant-icons'
							),
							'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
							'<strong>' . esc_html__( 'Safelayout Elegant Icons', 'safelayout-elegant-icons' ) . '</strong>',
							'<strong>' . esc_html__( 'upgrading to the PRO version', 'safelayout-elegant-icons' ) . '</strong>',
							'<strong>' . esc_html__( 'support the developer', 'safelayout-elegant-icons' ) . '</strong>',
							'<br>' . esc_html__( 'We really appreciate your support!', 'safelayout-elegant-icons' ) . '<strong> -Safelayout-</strong>'
						);
						?>
					</p>
					<div class="sl-ei-upgrade-reminder-footer">
						<a id="sl-ei-upgrade" class="button" href="https://safelayout.com" target="_blank">
							<span class="dashicons dashicons-smiley"></span><?php esc_html_e( 'Upgrade to Pro', 'safelayout-elegant-icons' ); ?>
						</a>
						<a id="sl-ei-upgrade-later" class="button">
							<span class="dashicons dashicons-calendar"></span><?php esc_html_e( 'Remind me later', 'safelayout-elegant-icons' ); ?>
						</a> 
					</div>
				</div>
			</div>
			<?php
		}

		// allow feedback host
		public function allow_icons_feedback_host( $allow, $host, $url ) {
			return ( false !== strpos( $host, 'safelayout' ) ) ? true : $allow;
		}

		// Add css and js file for rate reminder
		public function enqueue_scripts_for_rate_reminder( $hook ) {
			$this->enqueue_scripts_for_feedback_and_rate();
		}

		// Add css and js file for feedback
		public function enqueue_scripts_for_feedback( $hook ) {
			if ( $hook != 'plugins.php' ) {
				return;
			}
			$this->enqueue_scripts_for_feedback_and_rate();
		}

		// Add css and js file for feedback & rate reminder
		public function enqueue_scripts_for_feedback_and_rate() {
			wp_enqueue_script(
				'safelayout-elegant-icons-script-admin-feedback',
				SAFELAYOUT_ICONS_URL . 'assets/js/safelayout-elegant-icons-admin-feedback.min.js',
				array( 'jquery' ),
				SAFELAYOUT_ICONS_VERSION,
				true
			);
			$temp_obj = array(
				'ajax_url'	=> admin_url( 'admin-ajax.php' ),
				'nonce'		=> wp_create_nonce( 'slei_icons_ajax' ),
			);
			wp_localize_script( 'safelayout-elegant-icons-script-admin-feedback', 'sleiIconsAjax', $temp_obj );
			wp_enqueue_style(
				'safelayout-elegant-icons-style-admin-feedback',
				SAFELAYOUT_ICONS_URL . 'assets/css/safelayout-elegant-icons-admin-feedback.min.css',
				array(),
				SAFELAYOUT_ICONS_VERSION
			);
		}

		// ajax handlers for feedback
		public function icons_feedback_ajax_handler() {
			check_ajax_referer( 'slei_icons_ajax' );
			$type = sanitize_text_field( $_POST['type'] );
			$text = sanitize_text_field( $_POST['text'] );
			$apiUrl = 'https://safelayout.com/feedback/feedback.php';
			$rate = $this->get_rate_data();

			$data = array (
				'php'		=> phpversion(),
				'wordpress'	=> get_bloginfo( 'version' ),
				'version'	=> SAFELAYOUT_ICONS_VERSION,
				'time'		=> $rate['time'],
				'type'		=> $type,
				'text'		=> $text,
				'plugin'	=> 'icons',
			);
			$arg = array (
				'body'			=> $data,
				'timeout'		=> 30,
				'sslverify'		=> false,
				'httpversion'	=> 1.1,
			);

			$ret = wp_safe_remote_post( $apiUrl, $arg );
			if ( is_wp_error( $ret ) ) {
				$apiUrl = 'http://' . substr( $apiUrl, 8 );
				$ret = wp_remote_post( $apiUrl, $arg );
			}
			var_dump( $ret );

			wp_die();
		}

		// Add html code for feedback
		public function add_code_for_feedback( $hook ) {
			?>
			<div id="sl-ei-feedback-modal">
				<div class="sl-ei-feedback-window">
					<div class="sl-ei-feedback-header"><?php esc_html_e( 'Quick Feedback', 'safelayout-elegant-icons' ); ?></div>
					<div class="sl-ei-feedback-body">
						<div class="sl-ei-feedback-title">
							<?php esc_html_e( 'If you have a moment, please share why you are deactivating', 'safelayout-elegant-icons' ); ?>
							<span class="dashicons dashicons-smiley"></span>
						</div>
						<div class="sl-ei-feedback-item">
							<input type="radio" name="sl-ei-feedback-radio" value="temporary deactivation" id="sl-ei-feedback-item1">
							<label for="sl-ei-feedback-item1"><?php esc_html_e( "It's a temporary deactivation", 'safelayout-elegant-icons' ); ?></label>
						</div>
						<div class="sl-ei-feedback-item">
							<input type="radio" name="sl-ei-feedback-radio" value="site broken" id="sl-ei-feedback-item2">
							<label for="sl-ei-feedback-item2"><?php esc_html_e( 'The plugin broke my site', 'safelayout-elegant-icons' ); ?></label><br>
							<textarea rows="2" id="sl-ei-feedback-item2-text" placeholder="<?php esc_html_e( 'Please explain the problem.', 'safelayout-elegant-icons' ); ?>"></textarea>
						</div>
						<div class="sl-ei-feedback-item">
							<input type="radio" name="sl-ei-feedback-radio" value="better plugin" id="sl-ei-feedback-item5">
							<label for="sl-ei-feedback-item5"><?php esc_html_e( 'I found a better plugin', 'safelayout-elegant-icons' ); ?></label><br>
							<input type="text" id="sl-ei-feedback-item5-text" placeholder="<?php esc_html_e( "What's the plugin name?", 'safelayout-elegant-icons' ); ?>">
						</div>
						<div class="sl-ei-feedback-item">
							<input type="radio" name="sl-ei-feedback-radio" value="Other" id="sl-ei-feedback-item6">
							<label for="sl-ei-feedback-item6"><?php esc_html_e( 'Other', 'safelayout-elegant-icons' ); ?></label><br>
							<textarea rows="2" id="sl-ei-feedback-item6-text" placeholder="<?php esc_html_e( 'Please share the reason.', 'safelayout-elegant-icons' ); ?>"></textarea>
						</div>
					</div>
					<div class="sl-ei-feedback-footer">
						<a id="sl-ei-feedback-submit" class="button"><?php esc_html_e( 'Submit & Deactivate', 'safelayout-elegant-icons' ); ?></a>
						<a id="sl-ei-feedback-skip" class="button"><?php esc_html_e( 'Skip & Deactivate', 'safelayout-elegant-icons' ); ?></a> 
					</div>
					<div id="sl-ei-feedback-loader"><div id="sl-ei-dots-rate" class="sl-ei-spin-rate"><div><span></span><span></span><span></span><span></span></div>
					<div id="sl-ei-feedback-loader-msg"><?php esc_html_e( 'Wait ...', 'safelayout-elegant-icons' ); ?></div></div></div>
					<div id="sl-ei-feedback-loader-msg-tr"><?php esc_html_e( 'Redirecting ...', 'safelayout-elegant-icons' ); ?></div>
				</div>
			</div>
			<?php
		}

		// Load icons packs
		public function load_packs() {
			$packs = $this->get_packs();
			$first = '';
			foreach ( $packs['icons'] as $icon ) {
				if ( $icon['active'] === 'yes' ) {
					$path = SAFELAYOUT_ICONS_URL . 'packs/' . $icon['file_name'] . '.js';
					if ( $first === '' ) {
						$first = $icon['file_name'];
					}
					wp_enqueue_script(
						'safelayout-pack-' . $icon['file_name'] . '-script',
						$path,
						array(),
						SAFELAYOUT_ICONS_VERSION,
						false
					);
				}
			}

			if ( ! $this->icons_list_key ) {
				$this->icons_list_key = true;
				$temp = "SLEImceIcons = {};if (!(typeof SLEIiconArray !== 'undefined' && SLEIiconArray)) {SLEIiconArray = []}";
				wp_add_inline_script(
					'safelayout-pack-' . $first . '-script',
					$temp,
					'before'
				);
			}
		}

		// Set translations
		public function set_translations() {
			wp_set_script_translations(
				'safelayout-safelayout-icon-editor-script',
				'safelayout-elegant-icons',
				SAFELAYOUT_ICONS_PATH . 'languages'
			);
		}

		// Add an admin menu for plugin
		public function admin_menu() {
			$this->options_page_hook = add_options_page(
				esc_html__( 'Safelayout Elegant Icons Options', 'safelayout-elegant-icons' ),
				esc_html__( 'Safelayout Icons', 'safelayout-elegant-icons' ),
				'manage_options',
				'safelayout-elegant-icons',
				array( $this, 'admin_menu_page' )
			);
		}

		// Admin menu page
		public function admin_menu_page() {
			$packs = $this->get_packs();

			?>
			<div class="wrap">
				<h2><?php esc_html_e( 'Safelayout Elegant Icons Options', 'safelayout-elegant-icons' ); ?></h2>
				<?php settings_errors( 'safelayout-elegant-icons' ); ?>
				<div id="sl-ei-packs-settings">
					<form method="post" action="options.php">
						<?php settings_fields( 'safelayout_icons_packs_group' ); ?>
						<input type="hidden" name="safelayout-elegant-icons-validate-key" value="true">
						<div>
							<table class="sl-ei-packs-table">
								<caption><?php esc_html_e( 'Safelayout Elegant Icons Installed Packs', 'safelayout-elegant-icons' ); ?></caption>
								<thead>
									<tr>
										<th><?php esc_html_e( 'No.', 'safelayout-elegant-icons' ); ?></th>
										<th><?php esc_html_e( 'Pack Name', 'safelayout-elegant-icons' ); ?></th>
										<th><?php esc_html_e( 'Pack Status', 'safelayout-elegant-icons' ); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach ( $packs['icons'] as $index => $pack ) {
											echo '<tr><td>' . esc_html( $index + 1 ) . '</td><td>' . esc_html( $pack['name'] ) .
												 '</td><td><input type="checkbox" name="safelayout_icons_packs[safelayout-' .
												 esc_html( $pack['file_name'] ) . ']" value="yes" ' .
												 checked( esc_attr( $pack['active'] ), 'yes', false ) . ' id="safelayout-' .
												 esc_html( $pack['file_name'] ) . '"><label for="safelayout-' . esc_html( $pack['file_name'] ) .
												 '">' . esc_html__( 'Active', 'safelayout-elegant-icons' ) . '</label></td></tr>';
										}
									?>
								</tbody>
							</table>
						</div>
						<div style="height: 50px;">
							<?php submit_button( esc_html__( 'Save Changes', 'safelayout-elegant-icons' ), 'primary', 'submit', false ); ?>
						</div>
					</form>
				</div>
			</div>
			<?php
		}

		// Add settings fields
		public function add_settings_fields() {
			register_setting(
				'safelayout_icons_packs_group',
				'safelayout_icons_packs',
				array( $this, 'option_sanitize' )
			);
		}

		// Add css file for settings page
		public function enqueue_scripts( $hook ) {
			if ( ! $hook || $hook != $this->options_page_hook ) {
				return;
			}
			wp_enqueue_style(
				'safelayout-elegant-icons-style-admin',
				SAFELAYOUT_ICONS_URL . 'assets/css/safelayout-elegant-icons-admin.min.css',
				array(),
				SAFELAYOUT_ICONS_VERSION
			);
		}

		// Sanitize options
		public function option_sanitize( $input ) {
			if ( ! isset( $_POST["safelayout-elegant-icons-validate-key"] ) ) {
				return $input;
			}
			$packs = $this->get_packs();
			$packs['version'] = SAFELAYOUT_ICONS_VERSION;
			$key = false;
			
			foreach ( $packs['icons'] as $index => $pack ) {
				$id = 'safelayout-' . esc_html( $pack['file_name'] );
				if ( isset( $input[ $id ] ) ) {
					$packs['icons'][$index]['active'] = 'yes';
					$key = true;
				} else {
					$packs['icons'][$index]['active'] = 'no';
				}
			}
			if ( $key ) {
				return $packs;
			} else {
				return $this->get_packs();
			}
		}

		// Return default packs
		public function get_default_packs() {
			$default = array(
				'version'	=> SAFELAYOUT_ICONS_VERSION,
				'icons'		=> [
					array( 'name' => 'Themeisle',					'active' => 'yes', 'file_name' => 'themeisle-icons' ),
					array( 'name' => 'Wordpress Dashicons',			'active' => 'yes', 'file_name' => 'wordpress-dashicons-icons' ),
					array( 'name' => 'Wordpress',					'active' => 'yes', 'file_name' => 'wordpress-icons' ),
				],
			);
			return $default;
		}

		// Return packs
		public function get_packs() {
			$packs = get_option( 'safelayout_icons_packs' );
			if ( ! $packs ) {
				$packs = $this->get_default_packs();
				update_option( 'safelayout_icons_packs', $packs );
			}
			return $packs;
		}

		// set icon box style array
		public function set_elementor_iconbox_style_array() {
			$this->elementor_iconbox_styles_key = [];
			$this->elementor_iconbox_styles = array(
				/* index 000 */	'not use',
				/* index 001 */	'.sl-ei-container-block-effect001{border-radius:inherit;box-shadow:var(--sl-ei-box-effect-shadow);display:inherit;flex-direction:inherit;padding:50px 10px 51px;position:relative;text-align:center;width:inherit;z-index:1}.sl-ei-icon-box-back-shape-effect001{border-radius:inherit;height:100%;left:0;overflow:hidden;pointer-events:none;position:absolute;top:0;width:100%;z-index:2}.sl-ei-icon-box-back-shape-effect001:after,.sl-ei-icon-box-back-shape-effect001:before{background:var(--sl-ei-box-effect-color);box-shadow:var(--sl-ei-box-effect-shadow1);content:"";height:45px;left:0;position:absolute;top:0;width:100%}.sl-ei-icon-box-back-shape-effect001:before{border-top-left-radius:inherit;border-top-right-radius:inherit}.sl-ei-icon-box-back-shape-effect001:after{border-bottom-left-radius:inherit;border-bottom-right-radius:inherit;bottom:0;top:auto}',
				/* index 002 */	'.sl-ei-container-block-effect002{border-radius:inherit;box-shadow:var(--sl-ei-box-effect-shadow);display:inherit;flex-direction:inherit;padding:20px 10px;position:relative;text-align:center;width:inherit;z-index:1}.sl-ei-icon-box-back-shape-effect002{border-radius:inherit}.sl-ei-icon-box-back-shape-effect002:after,.sl-ei-icon-box-back-shape-effect002:before{background:var(--sl-ei-box-effect-color);box-shadow:var(--sl-ei-box-effect-shadow);content:"";height:100%;left:0;position:absolute;top:0;width:100%;z-index:2}.sl-ei-icon-box-back-shape-effect002:before{border-top-left-radius:inherit;border-top-right-radius:inherit;-webkit-clip-path:polygon(85% 0,80% 5%,20% 5%,15% 0);clip-path:polygon(85% 0,80% 5%,20% 5%,15% 0)}.sl-ei-icon-box-back-shape-effect002:after{border-bottom-left-radius:inherit;border-bottom-right-radius:inherit;bottom:0;-webkit-clip-path:polygon(0 75%,0 100%,20% 100%,0 75%,100% 100%,80% 100%,100% 75%,100% 100%);clip-path:polygon(0 75%,0 100%,20% 100%,0 75%,100% 100%,80% 100%,100% 75%,100% 100%);top:auto}',
				/* index 003 */	'.sl-ei-container-block-effect003{border-radius:inherit;box-shadow:var(--sl-ei-box-effect-shadow);display:inherit;flex-direction:inherit;padding:20px 15px;position:relative;text-align:center;width:inherit;z-index:1}.sl-ei-container-block-effect003:after,.sl-ei-container-block-effect003:before{border:5px solid;border-color:var(--sl-ei-box-effect-color);border-radius:inherit;bottom:0;-webkit-clip-path:polygon(30% 30%,30% 0,0 0,0 30%,100% 30%,100% 0,70% 0,70% 100%,100% 100%,100% 70%,0 70%,0 100%,30% 100%,30% 70%);clip-path:polygon(30% 30%,30% 0,0 0,0 30%,100% 30%,100% 0,70% 0,70% 100%,100% 100%,100% 70%,0 70%,0 100%,30% 100%,30% 70%);content:"";left:0;position:absolute;right:0;top:0;z-index:-1}.sl-ei-container-block-effect003:after{border:2px solid;border-color:var(--sl-ei-box-effect-color);bottom:8px;-webkit-clip-path:polygon(25% 25%,25% 0,0 0,0 25%,100% 25%,100% 0,75% 0,75% 100%,100% 100%,100% 75%,0 75%,0 100%,25% 100%,25% 75%);clip-path:polygon(25% 25%,25% 0,0 0,0 25%,100% 25%,100% 0,75% 0,75% 100%,100% 100%,100% 75%,0 75%,0 100%,25% 100%,25% 75%);filter:brightness(.85);left:8px;right:8px;top:8px}.sl-ei-container-block-effect003 .sl-ei-icon-box-back-pattern-anim{z-index:-2}',
				/* index 004 */	'.sl-ei-container-block-effect004{border-radius:inherit;box-shadow:var(--sl-ei-box-effect-shadow);display:inherit;flex-direction:inherit;padding:15px 10px 10px;position:relative;text-align:center;width:inherit;z-index:1}.sl-ei-container-block-effect004 .sl-ei-container-block-effect004-icon{margin:10px;z-index:1}.sl-ei-container-block-effect004 .sl-ei-container-block-effect004-head{background:var(--sl-ei-box-effect-color);box-shadow:var(--sl-ei-box-effect-shadow1);-webkit-clip-path:polygon(30px 0,100% 0,100% 100%,15px 100%);clip-path:polygon(30px 0,100% 0,100% 100%,15px 100%);margin:0 -10px;padding:5px 5px 5px 10px;position:relative}.sl-ei-container-block-effect004 .sl-ei-container-block-effect004-head h1,.sl-ei-container-block-effect004 .sl-ei-container-block-effect004-head h2,.sl-ei-container-block-effect004 .sl-ei-container-block-effect004-head h3,.sl-ei-container-block-effect004 .sl-ei-container-block-effect004-head h4,.sl-ei-container-block-effect004 .sl-ei-container-block-effect004-head h5,.sl-ei-container-block-effect004 .sl-ei-container-block-effect004-head h6{margin:auto!important}',
				/* index 005 */	'.sl-ei-container-block-effect005{border-radius:inherit;box-shadow:var(--sl-ei-box-effect-shadow);display:inherit;flex-direction:inherit;overflow:hidden;padding:10px;position:relative;text-align:center;width:inherit;z-index:1}.sl-ei-container-block-effect005:before{background:var(--sl-ei-box-effect-color);box-shadow:inset 0 0 15px rgba(0,0,0,.451);content:"";height:200px;left:-95px;position:absolute;top:-100px;transform:rotate(40deg);width:160px;z-index:-1}.sl-ei-container-block-effect005 .sl-ei-container-block-effect005-icon{padding:10px 5px}.sl-ei-container-block-effect005 .sl-ei-container-block-effect005-head:after{border-top:5px dotted;border-color:var(--sl-ei-box-effect-color1);clear:both;content:"";display:block;height:3px;margin:11px auto 0;width:100px}.sl-ei-container-block-effect005 .sl-ei-container-block-effect005-head h1,.sl-ei-container-block-effect005 .sl-ei-container-block-effect005-head h2,.sl-ei-container-block-effect005 .sl-ei-container-block-effect005-head h3,.sl-ei-container-block-effect005 .sl-ei-container-block-effect005-head h4,.sl-ei-container-block-effect005 .sl-ei-container-block-effect005-head h5,.sl-ei-container-block-effect005 .sl-ei-container-block-effect005-head h6{margin:auto!important}.sl-ei-container-block-effect005 .sl-ei-icon-box-back-pattern-anim{z-index:-2}',
				/* index 006 */	'.sl-ei-container-block-effect006{border-radius:inherit;box-shadow:var(--sl-ei-box-effect-shadow);display:inherit;flex-direction:inherit;padding:45px 10px 25px;position:relative;text-align:center;width:inherit;z-index:1}.sl-ei-icon-box-back-shape-effect006{border-radius:inherit}.sl-ei-icon-box-back-shape-effect006:after,.sl-ei-icon-box-back-shape-effect006:before{background:var(--sl-ei-box-effect-color);box-shadow:var(--sl-ei-box-effect-shadow);content:"";height:100%;left:0;position:absolute;top:0;width:100%;z-index:2}.sl-ei-icon-box-back-shape-effect006:before{border-top-left-radius:inherit;border-top-right-radius:inherit;-webkit-clip-path:polygon(0 0,100% 0,100% 7.5%,85% 7.5%,80% 12.5%,20% 12.5%,15% 7.5%,0 7.5%);clip-path:polygon(0 0,100% 0,100% 7.5%,85% 7.5%,80% 12.5%,20% 12.5%,15% 7.5%,0 7.5%)}.sl-ei-icon-box-back-shape-effect006:after{border-bottom-left-radius:inherit;border-bottom-right-radius:inherit;bottom:0;-webkit-clip-path:polygon(0 100%,100% 100%,100% 90%,85% 90%,80% 95%,20% 95%,15% 90%,0 90%);clip-path:polygon(0 100%,100% 100%,100% 90%,85% 90%,80% 95%,20% 95%,15% 90%,0 90%);top:auto}',
				/* index 007 */	'.sl-ei-container-block-effect007{border-radius:inherit;box-shadow:var(--sl-ei-box-effect-shadow);display:inherit;flex-direction:inherit;overflow:hidden;padding:15px 15px 10px;position:relative;text-align:center;width:inherit;z-index:1}.sl-ei-container-block-effect007:after,.sl-ei-container-block-effect007:before{background:var(--sl-ei-box-effect-color);border-radius:0 100px 100px 0;bottom:30px;content:"";left:0;position:absolute;top:100px;width:13px}.sl-ei-container-block-effect007:after{border-radius:100px 0 0 100px;left:auto;right:0}.sl-ei-container-block-effect007 .sl-ei-container-block-effect007-icon{aspect-ratio:1/1;background:var(--sl-ei-box-effect-color);border-radius:50%;box-shadow:6px 0 10px rgba(0,0,0,.3),0 0 0 12px #fff,0 0 10px 8px #000;display:inline-flex;height:-moz-fit-content;height:fit-content;margin:10px;padding:15px;position:relative}',
			);
		}

		// Add allowed html tags
		public static function allowed_html( $tags, $context ) {
			if ( 'post' === $context ) {
				$tags['div'] = array(
					'class' => true,
					'id' => true,
					'style' => true,
					'sldataicon' => true,
					'aria-label' => true,
					'title' => true,
				);

				$tags['a'] = array(
					'id' => true,
					'style' => true,
					'href' => true,
					'target' => true,
					'rel' => true,
					'aria-label' => true,
					'title' => true,
					'class' => true,
				);

				$tags['span'] = array(
					'id' => true,
					'class' => true,
					'style' => true,
					'sldataicon' => true,
					'aria-label' => true,
					'title' => true,
				);

				$tags['style'] = array(
					'id' => true,
					'type' => true,
				);

				$tags['br'] = array();

				$tags['p'] = array(
					'class' => true,
					'style' => true,
				);

				$tags['h1'] = array(
					'class' => true,
					'style' => true,
				);

				$tags['h2'] = array(
					'class' => true,
					'style' => true,
				);

				$tags['h3'] = array(
					'class' => true,
					'style' => true,
				);

				$tags['h4'] = array(
					'class' => true,
					'style' => true,
				);

				$tags['h5'] = array(
					'class' => true,
					'style' => true,
				);

				$tags['h6'] = array(
					'class' => true,
					'style' => true,
				);

				$tags['svg'] = array(
					'id' => true,
					'class' => true,
					'style' => true,
					'viewbox' => true,
					'filter' => true,
					'focusable' => true,
					'xmlns' => true,
					'preserveaspectratio' => true,
					'aria-hidden' => true,
					'data-*' => true,
					'role' => true,
					'height' => true,
					'width' => true,
				);

				$tags['defs'] = array(
					'id' => true,
					'key' => true,
				);

				$tags['lineargradient'] = array(
					'id' => true,
					'x1' => true,
					'y1' => true,
					'x2' => true,
					'y2' => true,
				);

				$tags['radialgradient'] = array(
					'id' => true,
					'cx' => true,
					'cy' => true,
					'r'	=> true,
					'fx' => true,
					'fy' => true,
				);

				$tags['stop'] = array(
					'stop-color' => true,
					'offset' => true,
					'stop-opacity' => true,
					'key' => true,
				);

				$tags['ellipse'] = array(
					'id' => true,
					'class' => true,
					'style' => true,
					'filter' => true,
					'cx' => true,
					'cy' => true,
					'rx' => true,
					'ry' => true,
					'fill' => true,
				);

				$tags['g'] = array(
					'id' => true,
					'class' => true,
					'style' => true,
					'filter' => true,
					'viewbox' => true,
					'fill' => true,
					'stroke' => true,
				);

				$tags['rect'] = array(
					'id' => true,
					'class' => true,
					'style' => true,
					'filter' => true,
					'x' => true,
					'y' => true,
					'width' => true,
					'height' => true,
					'rx' => true,
					'fill' => true,
					'stroke' => true,
					'stroke-width' => true,
					'key' => true,
				);

				$tags['path'] = array(
					'id' => true,
					'class' => true,
					'style' => true,
					'filter' => true,
					'd' => true,
					'fill' => true,
					'stroke' => true,
					'stroke-width' => true,
					'vector-effect' => true,
					'key' => true,
				);

				$tags['symbol'] = array(
					'id' => true,
					'class' => true,
					'style' => true,
					'filter' => true,
					'x' => true,
					'y' => true,
					'width' => true,
					'height' => true,
					'viewbox' => true,
				);

				$tags['use'] = array(
					'id' => true,
					'class' => true,
					'style' => true,
					'filter' => true,
					'viewbox' => true,
					'href' => true,
					'xlink:href' => true,
				);
			}

			return $tags;
		}

		// Add allowed css style
		public function allowed_css( $styles ) {
			$styles[] = 'transform';
			$styles[] = 'display';
			$styles[] = 'text-shadow';
			$styles[] = 'box-shadow';
			$styles[] = 'user-select';
			$styles[] = 'color';
			$styles[] = 'background';
			$styles[] = 'border-color';
			$styles[] = 'border-width';
			$styles[] = 'border-style';
			$styles[] = '--sl-ei-box-background-color';
			$styles[] = '--sl-ei-box-back-shadow-color';
			$styles[] = '--sl-ei-box-pattern-opacity';
			$styles[] = '--sl-ei-box-anim-color';
			$styles[] = '--sl-ei-box-vertical-align';
			$styles[] = '--sl-ei-box-effect-color';
			$styles[] = '--sl-ei-box-effect-color1';
			$styles[] = '--sl-ei-box-effect-shadow';
			$styles[] = '--sl-ei-box-effect-shadow1';
			return $styles;
		}

		//add icon block to core navigation
		public function add_icon_blocks_to_core_blocks( $args, $block_type ) {
			if ( 'core/navigation' === $block_type || 'core/navigation-link' === $block_type) {
				$args['allowed_blocks'] ??= [];
				$args['allowed_blocks'][] = 'safelayout/safelayout-icon';
				$args['allowed_blocks'][] = 'safelayout/safelayout-box-button';
			}
			return $args;
		}

		// Add allowed css for filter and transform
		public function attr_allow_css( $allow_css, $css_test_string ) {
			if ( strpos( $css_test_string, 'filter' ) === false &&
				strpos( $css_test_string, 'display' ) === false &&
				strpos( $css_test_string, 'text-shadow' ) === false &&
				strpos( $css_test_string, 'box-shadow' ) === false &&
				strpos( $css_test_string, 'background' ) === false &&
				strpos( $css_test_string, 'color' ) === false &&
				strpos( $css_test_string, 'border' ) === false &&
				strpos( $css_test_string, 'user-select' ) === false &&
				strpos( $css_test_string, '--sl' ) === false &&
				strpos( $css_test_string, 'transform' ) === false ) {
				return $allow_css;
			} else {
				return true;
			}
		}
	}
	new Safelayout_elegant_icons();
}