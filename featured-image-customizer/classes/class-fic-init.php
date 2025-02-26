<?php

namespace FIC\Featured_Image_Customizer;

! defined( ABSPATH ) || exit;

if ( ! class_exists( 'FIC_Init' ) ) {

	class FIC_Init extends Featured_Image_Customizer {

		private $fs;

		private $opt;

		private $view;

		public function __construct() {
			parent::__construct();

			$this->fs   = new FIC_FS;
			$this->opt  = new FIC_Options;
			$this->view = new FIC_View;
		}

		public function init() {
			add_action( 'activated_plugin', array( $this, 'activate_plugin' ) );
			add_action( 'deactivated_plugin', array( $this, 'deactivate_plugin' ) );
			add_action( 'wp_loaded', array( $this, 'on_loaded' ) );
		}

		public function on_loaded() {
			// Rating notices
			add_action( 'admin_notices', array( $this, 'rating_notice_display' ) );
			add_action( 'admin_init', array( $this, 'rating_notice_dismiss' ) );
			$this->fs->create_directory( $this->settings['plugin_uploads'] );

			// If users select to DELETE all brand logos, execute and remove the option.
			if ( true === get_option( 'fic_delete_local_files' ) ) {
				$this->fs->remove_directory( $this->settings['plugin_uploads'] );
				delete_option( 'fic_delete_local_files' );
			}

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'localize_plugin_urls' ) );
			add_action( 'admin_init', array( $this, 'add_plugin_links' ) );
			add_action( 'admin_init', array( $this->opt, 'add_plugin_options' ) );
			add_filter( 'admin_post_thumbnail_html', array( $this, 'add_featured_image_button' ), 10, 3 );
			add_action( 'admin_footer', array( $this->view, 'load_featured_image_customizer_modal' ) );
		}

		public function activate_plugin( $plugin ) {
			if ( $plugin === $this->settings['plugin_basename'] ) {
				// Add temporary plugin options.
				$this->activate_featured_image_customizer();
			}
		}

		public function deactivate_plugin( $plugin ) {
			if ( $plugin === $this->settings['plugin_basename'] ) {
				// Remove temporary plugin options.
				$this->deactivate_featured_image_customizer();
			}
		}

		public function enqueue_admin_scripts() {
			wp_register_script(
				'featured-image-customizer',
				$this->settings['plugin_url'] . 'assets/dist/js/featured-image-customizer.min.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_register_style(
				'featured-image-customizer',
				$this->settings['plugin_url'] . 'assets/dist/css/featured-image-customizer.min.css',
				array(),
				'1.0',
				'all'
			);

			wp_enqueue_script( 'featured-image-customizer' );
			wp_enqueue_style( 'featured-image-customizer' );
		}

		public function localize_plugin_urls() {
			wp_localize_script(
				'featured-image-customizer',
				'fic',
				array(
					'plugin_url' => $this->settings['plugin_url'],
					'ajax_url'   => admin_url( 'admin-ajax.php' ),
				)
			);
		}

		public function add_plugin_links() {
			add_action( 'plugin_action_links', array( $this, 'add_action_links' ), 10, 2 );
			add_action( 'plugin_row_meta', array( $this, 'add_meta_links' ), 10, 2 );
		}

		public function add_action_links( $links, $file_path ) {
			if ( $file_path === $this->settings['plugin_basename'] ) {
				$links['settings'] = '<a href="' . esc_url( admin_url( 'options-media.php' ) ) . '">Settings</a>';
				return array_reverse( $links );
			}

			return $links;
		}

		public function add_meta_links( $links, $file_path ) {
			if ( $file_path === $this->settings['plugin_basename'] ) {
				$links['docmentation'] = '<a href="' . esc_url( $this->settings['plugin_docurl'] ) . '" target="_blank">Documentation</a>';
			}

			return $links;
		}

		function add_featured_image_button( $content, $post_id, $thumbnail_id ) {
			$post       = get_post( $post_id );
			$post_types = get_option( 'fic_post_types' );

			if ( key_exists( $post->post_type, $post_types )
				&& 'true' === $post_types[ $post->post_type ] ) {
				$content .= '<div class="fic">
					<p>Use the button below to create and store a new featured image on the fly from 100+ brand logos.</p>
					<p>
						<a href="#" class="button button-primary fic-open-modal-window" title="Open Featured Image Customizer...">
							<i class="dashicons dashicons-cover-image"></i>
							New Featured Image
						</a>
					</p>
				</div>';
			}

			return $content;
		}

		// Add temporary plugin options.
		public function activate_featured_image_customizer() {
			// Activate plugin for the first time add default permanent options.
			if ( false === get_option( 'featured_image_customizer' ) ) {
				add_option( 'featured_image_customizer', 1 );

				add_option(
					'fic_post_types',
					array(
						'page' => 'true',
						'post' => 'true',
					)
				);
			}
		}

		// Remove temporary plugin options.
		public function deactivate_featured_image_customizer() {
			if ( get_option( 'fic_rating_notice' ) ) {
				delete_option( 'fic_rating_notice' );
			}
		}
	}

	$fic = new FIC_Init();
	$fic->init();
}
