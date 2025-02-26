<?php
/**
 * Importer Class
 *
 * @package Axle_Demo_Importer
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ADI_Importer Class.
 *
 * A class for importer page.
 *
 * @since 1.0.0
 */
class ADI_Importer {

	/**
	 * Capibility.
	 *
	 * @var string The capability users should have to view the page.
	 */
	public $minimum_capability = 'upload_files';

	/**
	 * Get things started.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menus' ) );
		add_action( 'mime_types', array( $this, 'new_mime_types' ) );
		add_action( 'admin_head', array( $this, 'custom_admin_messages' ) );
		add_action( 'axle_demo_importer_after_import', array( $this, 'after_import' ) );
		add_action( 'plugin_action_links_' . ADI_PLUGIN_BASE, array( $this, 'add_plugin_links' ) );
	}

	/**
	 * Register admin menu.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function admin_menus() {
		add_theme_page(
			esc_html__( 'Axle Demo Importer', 'axle-demo-importer' ),
			esc_html__( 'Axle Demo Importer', 'axle-demo-importer' ),
			$this->minimum_capability,
			'axle-demo-importer',
			array( $this, 'importer_screen' )
		);
	}

	/**
	 * Add plugin links.
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @param array $links Plugin links.
	 * @return array New plugin links array.
	 */
	public function add_plugin_links( $links ) {
		$custom_link = '<a href="' . esc_url( admin_url( 'themes.php?page=axle-demo-importer' ) ) . '">' . esc_html__( 'Demo Importer', 'axle-demo-importer' ) . '</a>';
		array_unshift( $links, $custom_link );
		return $links;
	}

	/**
	 * Render importer screen.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function importer_screen() {
		?>
		<div class="wrap importer-wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

			<?php do_action( 'axle_demo_importer_before_admin_content' ); ?>

			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">

					<div id="post-body-content">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
								<div class="inside">
									<?php $this->process_form(); ?>
									<?php $this->render_form(); ?>
								</div><!-- .inside -->
							</div><!-- .postbox -->
						</div><!-- .meta-box-sortables -->
					</div><!-- #post-body-content -->

					<div id="postbox-container-1" class="postbox-container">
						<div class="meta-box-sortables">
							<div class="postbox">
								<h2><span><?php esc_html_e( 'Important!', 'axle-demo-importer' ); ?></span></h2>
								<div class="inside">
									<h4><?php esc_html_e( 'Please click on the Import button only once and wait, it can take a couple of minutes.', 'axle-demo-importer' ); ?></h4>
								</div><!-- .inside -->
							</div><!-- .postbox -->
						</div><!-- .meta-box-sortables -->
						<div class="meta-box-sortables">
							<div class="postbox">
								<h2><span><?php esc_html_e( 'Get Help!', 'axle-demo-importer' ); ?></span></h2>
								<div class="inside">
									<h4><?php esc_html_e( 'Have queries? Found bugs?', 'axle-demo-importer' ); ?></h4>
									<p><a href="https://wordpress.org/support/plugin/axle-demo-importer"><?php esc_html_e( 'Visit plugin support page', 'axle-demo-importer' ); ?></a></p>
								</div><!-- .inside -->
							</div><!-- .postbox -->
						</div><!-- .meta-box-sortables -->
					</div><!-- #postbox-container-1 -->

				</div><!-- #post-body -->
				<br class="clear">
			</div><!-- #poststuff -->

			<?php do_action( 'axle_demo_importer_after_admin_content' ); ?>

		</div><!-- .wrap -->
		<?php
	}

	/**
	 * Render form.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function render_form() {

		// Check user permission.
		if ( ! current_user_can( 'upload_files' ) ) {
			$obj = new WP_Error( 'no-upload-files-permission', esc_html__( 'Sorry, you are not allowed to upload files on this site.', 'axle-demo-importer' ) );
			$this->show_message( $obj );
			return;
		}

		require_once ADI_PLUGIN_DIR . 'templates/upload-form.php';
	}

	/**
	 * Process form.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function process_form() {

		// Is valid submission?
		if ( 'POST' !== $_SERVER['REQUEST_METHOD'] ) {
			return;
		}

		$flag_predefined = ( isset( $_POST['predefined'] ) && 1 === absint( $_POST['predefined'] ) ) ? true: false;

		$theme_zip_file = axle_demo_importer_get_demo_content_settings( 'zip_file' );
		$theme_zip_file_remote = axle_demo_importer_get_demo_content_settings( 'zip_file_remote' );

		$zip_to_process = '';

		if ( true === $flag_predefined ) {
			if ( ! empty( $theme_zip_file ) ) {
				$zip_to_process = $theme_zip_file;
			}
			if ( ! empty( $theme_zip_file_remote ) ) {
				// Download.
				$downloader = new ADI_Downloader();
				$downloaded_file = $downloader->download_file( $theme_zip_file_remote );
				if ( ! is_wp_error( $downloaded_file ) ) {
					$zip_to_process = $downloaded_file;
					// Save path in option. We need it later for cleanup.
					update_option( 'axle_demo_importer_downloaded_file', $downloaded_file );
				} else {
					$object = new WP_Error( 'error-while-downloading-zip', esc_html__( 'An error occurred while fetching remote file.', 'axle-demo-importer' ) );
					$this->show_message( $object, 'error' );
					return;
				}
			}
		}

		if ( false === $flag_predefined ) {
			$validate = $this->validate_form();
			if ( true === $validate ) {
				$zip_to_process = $_FILES['zip-file']['tmp_name'];
			} else {
				$this->show_message( $validate );
			}
		}

		if ( ! empty( $zip_to_process ) ) {
			$process = $this->process_zip( $zip_to_process );
			if ( ! is_wp_error( $process ) ) {
				// Zip files are processed successfully.
				$object = new WP_Error( 'zip-files-processed-successfully', esc_html__( 'Demo content imported successfully.', 'axle-demo-importer' ) );
				$this->show_message( $object, 'success' );
			} else {
				$this->show_message( $process );
			}
		}

		// Clean up downloaded file.
		$this->cleanup_download();
	}

	/**
	 * Validate form.
	 *
	 * @since 1.0.0
	 *
	 * @return bool|WP_Error True if valid.
	 */
	public function validate_form() {

		$output = false;

		// Check file.
		if ( isset( $_FILES['zip-file']['name'] ) && ! empty( $_FILES['zip-file']['name'] ) ) {

			// Is file type valid?
			if ( 'application/zip' !== $_FILES['zip-file']['type'] ) {
				return new WP_Error( 'no-valid-file-type', esc_html__( 'Please select a valid zip file.', 'axle-demo-importer' ) );
			}
		} else {
			return new WP_Error( 'no-file-selected', esc_html__( 'Please select a zip file.', 'axle-demo-importer' ) );
		}

		$output = true;

		return $output;
	}

	/**
	 * Clean up downloaded file.
	 *
	 * @since 1.0.0
	 */
	public function cleanup_download() {

		$file = get_option( 'axle_demo_importer_downloaded_file' );

		if ( $file ) {
			WP_Filesystem();
			global $wp_filesystem;
			$wp_filesystem->delete( $file, false, 'f' );
			update_option( 'axle_demo_importer_downloaded_file', '' );
		}

	}

	/**
	 * Process zip.
	 *
	 * @since 1.0.0
	 *
	 * @param string $zip_file Zip file.
	 * @return bool|WP_Error True if successful import.
	 */
	private function process_zip( $zip_file ) {

		WP_Filesystem();
		global $wp_filesystem;
		$upload_directory = wp_upload_dir();
		$destination_directory = trailingslashit( $upload_directory['basedir'] ) . 'axle-demo-importer-tmp/';

		$unzipped = unzip_file( $zip_file, $destination_directory );

		// Is file unzipped?
		if ( true !== $unzipped ) {
			return new WP_Error( 'error-in-unzip', esc_html__( 'Some error occurred while unzipping.', 'axle-demo-importer' ) );
		}

		// Fetch files list.
		$files_list = $wp_filesystem->dirlist( $destination_directory );

		// Check unzipped files.
		if ( empty( $files_list ) ) {
			return new WP_Error( 'empty-in-unzip', esc_html__( 'Uploaded zip does not have any files.', 'axle-demo-importer' ) );
		}

		$demo_contents = array();

		foreach ( $files_list as $file_key => $file ) {

			$file_extension = wp_check_filetype( $file_key );

			if ( in_array( $file_extension['ext'], array( 'xml', 'dat', 'wie' ), true ) ) {
				$demo_contents[ $file_extension['ext'] ] = $destination_directory . $file_key;
			}
		}

		// Import content now.
		if ( ! empty( $demo_contents ) ) {
			do_action( 'axle_demo_importer_before_import', $demo_contents );
			$this->init_import( $demo_contents );
			do_action( 'axle_demo_importer_after_import', $demo_contents );
		} else {
			return new WP_Error( 'not-valid-demo-files', esc_html__( 'Zip does not contain any valid demo files.', 'axle-demo-importer' ) );
		}

		// Delete demo content files.
		$wp_filesystem->rmdir( $destination_directory, true );

		return true;
	}

	/**
	 * Import files.
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @param array $files Files.
	 * @return void
	 */
	public function init_import( $files ) {

		if ( isset( $files['xml'] ) && ! empty( $files['xml'] ) ) {
			// Increase memory limit.
			ini_set( 'memory_limit', apply_filters( 'axle_demo_importer_memory_limit', '256M' ) );
			$xml_import = new ADI_XML_Importer();
			$xml_import->fetch_attachments = true;
			set_time_limit( 0 );
			$xml_import->import( $files['xml'] );
			// Unset xml from files list.
			unset( $files['xml'] );
		}

		if ( ! empty( $files ) ) {
			foreach ( $files as $file_key => $file_path ) {
				if ( 'dat' === $file_key && ! empty( $file_path ) ) {
					$dat_import = new ADI_DAT_Importer();
					$dat_import->_import( $file_path );
				} elseif ( 'wie' === $file_key && ! empty( $file_path ) ) {
					$wie_import = new ADI_WEI_Importer();
					$wie_import->import( $file_path );
				}
			}
		}
	}

	/**
	 * Show admin message.
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @param WP_Error $object Object.
	 * @param string   $message_type Message type.
	 * @return void
	 */
	public function show_message( $object, $message_type = 'error' ) {

		// Bail if not valid object.
		if ( ! is_wp_error( $object ) ) {
			return;
		}

		// Bail if no error message.
		if ( ! $object->get_error_message() ) {
			return;
		}
		?>
		<div class="notice notice-<?php echo esc_attr( $message_type ); ?>">
			<?php $messages = $object->get_error_messages(); ?>
			<?php if ( 1 === count( $messages ) ) : ?>
				<p><strong><?php echo esc_html( $object->get_error_message() ); ?></strong></p>
			<?php else : ?>
				<ul>
					<?php foreach ( $messages as $message ) : ?>
						<li><?php echo esc_html( $message ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div><!-- .notice -->
		<?php
	}

	/**
	 * Add new mime types.
	 *
	 * @since 1.0.0
	 *
	 * @param array $types Mime types array.
	 * @return array Customized array.
	 */
	public function new_mime_types( $types ) {
		$types = array_merge( $types, array(
			'wie' => 'text/html',
			'dat' => 'text/plain',
			'xml' => 'application/xml',
		) );

		return $types;
	}

	/**
	 * Admin messages.
	 *
	 * @since 1.0.0
	 */
	public function custom_admin_messages() {
		$screen = get_current_screen();
		if ( $screen && 'appearance_page_axle-demo-importer' === $screen->id ) {
			$plugin_info = new WP_Error( 'needed-plugins-info', esc_html__( 'Before you begin, make sure all the required plugins are activated.', 'axle-demo-importer' ) );
			$this->show_message( $plugin_info, 'warning' );
			$better_demo_info = new WP_Error( 'get-best-demo-setup', esc_html__( 'To get best result, it is recommended to import demo content in fresh WordPress setup.', 'axle-demo-importer' ) );
			$this->show_message( $better_demo_info, 'warning' );
		}
	}

	/**
	 * After import.
	 *
	 * @since 1.0.0
	 */
	public function after_import() {
		// Set static front page.
		$static_front_page_status = apply_filters( 'axle_demo_importer_static_front_page', axle_demo_importer_get_demo_content_settings( 'static_front_page' ) );

		if ( true === $static_front_page_status ) {
			$static_page = apply_filters( 'axle_demo_importer_static_page', axle_demo_importer_get_demo_content_settings( 'static_page' ) );
			$posts_page = apply_filters( 'axle_demo_importer_posts_page', axle_demo_importer_get_demo_content_settings( 'posts_page' ) );
			update_option( 'show_on_front', 'page' );

			$pages = array(
				'page_on_front'  => $static_page,
				'page_for_posts' => $posts_page,
			);

			foreach ( $pages as $option_key => $slug ) {
				$result = get_page_by_path( $slug );
				if ( $result ) {
					if ( is_array( $result ) ) {
						$object = array_shift( $result );
					} else {
						$object = $result;
					}
					update_option( $option_key, $object->ID );
				}
			}
		}

		// Set menu locations.
		$menu_details = apply_filters( 'axle_demo_importer_menu_locations', axle_demo_importer_get_demo_content_settings( 'menu_locations' ) );

		if ( ! empty( $menu_details ) ) {
			$nav_settings = array();
			$current_menus = wp_get_nav_menus();
			if ( ! empty( $current_menus ) && ! is_wp_error( $current_menus ) ) {
				foreach ( $current_menus as $menu ) {
					foreach ( $menu_details as $location => $menu_slug ) {
						if ( $menu->slug === $menu_slug ) {
							$nav_settings[ $location ] = $menu->term_id;
						}
					}
				}
			}

			set_theme_mod( 'nav_menu_locations', $nav_settings );
		}
	}
}

new ADI_Importer();
