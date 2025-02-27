<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://yukyhendiawan.com
 * @since      1.0.0
 *
 * @package    Import_Export_Menu
 * @subpackage Import_Export_Menu/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Import_Export_Menu
 * @subpackage Import_Export_Menu/admin
 * @author     Yuky Hendiawan <yukyhendiawan1998@gmail.com>
 */
class Import_Export_Menu_Admin {

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
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Enqueues the necessary CSS for the Import Export Menu admin page.
	 *
	 * @param string $hook The hook name for the current admin page.
	 *
	 * @return void
	 */
	public function enqueue_styles( $hook ) {

		// Check if the current admin page is the Import Export Menu admin page or the About page.
		if ( 'toplevel_page_import-export-menu' === $hook || 'import-export-menu_page_import-export-menu-information' === $hook ) {
			// Enqueue the CSS file for the Import Export Menu admin page.
			wp_enqueue_style(
				$this->plugin_name,
				plugins_url( 'import-export-menu' ) . '/assets/css/import-export-menu-admin.min.css',
				array(),
				$this->version
			);
		}
	}

	/**
	 * Enqueues the necessary scripts for the Import Export Menu admin page.
	 *
	 * This function is responsible for enqueuing the necessary scripts for the Import Export Menu admin page.
	 * It checks if the current admin page is the Import Export Menu admin page or the "About" page.
	 * If it is, it enqueues the SweetAlert JavaScript library, the main JavaScript file for the Import Export Menu admin page, and the admin-menu.min.js JavaScript file.
	 * It also localizes the ajaxObject object, which contains the admin-ajax.php URL and a nonce for making AJAX requests.
	 *
	 * @param string $hook The hook name for the current admin page.
	 *
	 * @return void
	 */
	public function enqueue_scripts( $hook ) {

		if ( 'toplevel_page_import-export-menu' === $hook || 'import-export-menu_page_import-export-menu-information' === $hook ) {
			// Enqueue the SweetAlert JavaScript library.
			wp_enqueue_script( $this->plugin_name . '-sweetalert', plugins_url( 'import-export-menu' ) . '/assets/js/sweetalert.min.js', array(), $this->version, true );

			// Enqueue the main JavaScript file for the Import Export Menu admin page.
			wp_enqueue_script( $this->plugin_name, plugins_url( 'import-export-menu' ) . '/assets/js/import-export-menu-admin.js', array( 'jquery' ), $this->version, true );

			// Enqueue the admin-menu.min.js JavaScript file.
			wp_enqueue_script( 'import-export-menu-script', plugins_url( 'import-export-menu' ) . '/assets/js/admin-menu.min.js', array(), $this->version, true );

			// Localize the ajaxObject object.
			wp_localize_script(
				$this->plugin_name,
				'ajaxObject',
				array(
					'ajaxUrl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'ajax-nonce' ),
				)
			);
		}
	}

	/**
	 * Disables admin notices on the specific page.
	 *
	 * This function is responsible for disabling all admin notices on the "Import Export Menu" admin page.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function disable_admin_notices_on_specific_pages() {
		global $plugin_page;

		// Check if the current page is in the WordPress admin area.
		if ( is_admin() ) {
			if ( 'import-export-menu' === $plugin_page || 'import-export-menu-information' === $plugin_page ) {
				remove_all_actions( 'admin_notices' );
			}
		}
	}

	/**
	 * Callback function for Export Import.
	 *
	 * This function is responsible for rendering the content of the "Export Import" admin page.
	 *
	 * @return void
	 */
	public function import_export_menu_display_page() {
		// Include the partial file that contains the HTML content.
		include plugin_dir_path( __FILE__ ) . 'partials/import-export-menu.php';
	}

	/**
	 * Registers the top-level admin menu page and adds a submenu page for 'Import Export'.
	 *
	 * This function uses the WordPress add_menu_page() and add_submenu_page() functions to create
	 * the necessary admin menu structure. It also sets up the callback functions for
	 * the top-level and submenu pages.
	 *
	 * @return void
	 */
	public function register_admin_menu_page() {
		add_menu_page(
			__( 'Import Export Menu', 'import-export-menu' ), // Page title.
			__( 'Import Export Menu', 'import-export-menu' ), // Menu title.
			'manage_options', // Capability required.
			'import-export-menu', // Menu slug.
			array( $this, 'callback_template_for_import_export_menu' ), // Callback function.
			'dashicons-admin-generic', // Icon URL.
			30 // $position.
		);

		add_submenu_page(
			'import-export-menu', // Parent menu slug.
			__( 'Information', 'import-export-menu' ), // Page title.
			__( 'Information', 'import-export-menu' ), // Menu title.
			'manage_options', // Capability required.
			'import-export-menu-information', // Menu slug.
			array( $this, 'callback_template_for_information_menu' ) // Callback function.
		);
	}

	/**
	 * Loads the template for the 'Import Export' menu page in the plugin.
	 *
	 * This function constructs the path to the template file located
	 * in the plugin directory and includes it if it exists.
	 */
	public function callback_template_for_import_export_menu() {
		// Define the path to the template file.
		$template_path = plugin_dir_path( __FILE__ ) . 'partials/import-export-menu.php';

		// Check if the template file exists.
		if ( file_exists( $template_path ) ) {
			// Include the template file if it exists.
			include $template_path;
		}
	}

	/**
	 * Loads the template for the 'Information' menu page in the plugin.
	 *
	 * This function constructs the path to the template file located
	 * in the plugin directory and includes it if it exists.
	 */
	public function callback_template_for_information_menu() {
		// Define the path to the template file.
		$template_path = plugin_dir_path( __FILE__ ) . 'partials/information.php';

		// Check if the template file exists.
		if ( file_exists( $template_path ) ) {
			// Include the template file if it exists.
			include $template_path;
		}
	}

	/**
	 * Add custom MIME types to the allowed upload types.
	 *
	 * @param array $mimes An array of MIME types allowed for upload.
	 * @return array The modified array of allowed MIME types.
	 */
	public function custom_mime_types( $mimes ) {
		// Add JSON file type to the allowed MIME types.
		$mimes['json'] = 'application/json';

		// Return the modified array of MIME types.
		return $mimes;
	}

	/**
	 * Handles the AJAX request for getting the menu items.
	 *
	 * This function is responsible for handling the AJAX request to get the menu items.
	 * It verifies the nonce, retrieves the menu items, and sends them back to the client in JSON format.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function handle_get_export() {

		// Verify nonce.
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'ajax-nonce' ) ) {
			// If nonce verification fails, send JSON error response and terminate.
			wp_send_json_error(
				array(
					'message' => esc_html__( 'Invalid nonce handle_get_export!', 'import-export-menu' ),
					'status'  => esc_html__( 'Error!', 'import-export-menu' ),
				)
			);

			// End processing.
			wp_die();
		}

		// Retrieve all navigation menus.
		$menus = wp_get_nav_menus();
		$datas = array();

		// Loop through each menu and retrieve menu items.
		foreach ( $menus as $menu ) {
			$menu->plugin_name = IMPORT_EXPORT_MENU_PLUGIN_NAME;
			$menu_items        = wp_get_nav_menu_items( $menu->term_id );

			// Check if menu items exist.
			if ( ! empty( $menu_items ) ) {
				foreach ( $menu_items as $item ) {
					// Initialize additional properties for each menu item.
					$item->menu_item_parent_object_id = 'blank';
					$item->menu_item_parent_type      = 'blank';
					$item->menu_item_parent_title     = 'blank';
					$item->menu_item_parent_url       = 'blank';
					$item->menu_item_parent_id        = 'blank';
					$item->menu_item_parent_post_name = 'blank';

					// If item has a parent, retrieve parent item details.
					if ( $item->menu_item_parent ) {
						$looping2 = wp_get_nav_menu_items( $menu->term_id );
						foreach ( $looping2 as $get_item2 ) {
							if ( intval( $item->menu_item_parent ) === $get_item2->ID ) {
								// Assign parent item properties to current item.
								$item->menu_item_parent_object_id = $get_item2->object_id;
								$item->menu_item_parent_type      = $get_item2->type;
								$item->menu_item_parent_title     = $get_item2->title;
								$item->menu_item_parent_url       = $get_item2->url;
								$item->menu_item_parent_id        = $get_item2->ID;
								$item->menu_item_parent_post_name = $get_item2->post_name;
							}
						}
					}
				}

				// Assign menu items to menu object and add menu object to $datas array.
				$menu->terms = $menu_items;
				$datas[]     = $menu;
			}
		}

		// Convert menu data to JSON format and send to client.
		wp_send_json_success( $datas );

		// End processing.
		wp_die();
	}

	/**
	 * Processes a single menu item.
	 *
	 * This method processes a single menu item and returns an array of arguments
	 * that can be used to create a new menu item in a navigation menu.
	 *
	 * @param object $menu_item The menu item to process.
	 *
	 * @return array An array of arguments for creating a new menu item.
	 */
	public function process_menu_item( $menu_item ) {
		$args = array();

		// Common properties for all types.
		$common_args = array(
			'menu-item-title'        => $menu_item->title,
			'menu-item-object'       => $menu_item->object,
			'menu-item-object-id'    => 0,
			'menu-item-position'     => $menu_item->menu_order,
			'menu-item-type'         => $menu_item->type,
			'menu-item-url'          => $menu_item->url,
			'menu-item-description'  => $menu_item->description,
			'menu-item-attr-title'   => $menu_item->attr_title,
			'menu-item-target'       => $menu_item->target,
			'menu-item-xfn'          => $menu_item->xfn,
			'menu-item-status'       => $menu_item->post_status,
			'menu-item-parent-id'    => 0,
			'menu-item-parent-title' => $menu_item->menu_item_parent_title,
			'menu-item-parent-type'  => $menu_item->menu_item_parent_type,
		);

		if ( 'taxonomy' === $menu_item->type ) {
			// Process taxonomy type menu item.
			$url  = $menu_item->url;
			$path = wp_parse_url( $url, PHP_URL_PATH );
			$slug = basename( $path );
			$term = get_term_by( 'slug', $slug, 'category' );
			if ( $term && is_object( $term ) ) {
				$args = array_merge(
					$common_args,
					array(
						'menu-item-object-id' => $term->term_id, // ID Category.
					)
				);
			}
		} elseif ( 'post_type' === $menu_item->type ) {
			// Process taxonomy type menu item.
			$menu_item_url = $menu_item->url;
			$path          = wp_parse_url( $menu_item_url, PHP_URL_PATH );
			$slug          = basename( $path );

			// Define arguments for querying a post based on the slug.
			$args = array(
				'name'           => $slug,
				'post_status'    => 'publish',
				'posts_per_page' => -1,
			);

			// Retrieve the post based on the arguments.
			$post = get_posts( $args );

			// Check if a post with the specified slug exists.
			if ( $post && $post[0]->post_title ) {
				// If found, merge common arguments with additional information.
				$args = array_merge(
					$common_args,
					array(
						'menu-item-object-id' => $post[0]->ID,
					)
				);
			} else {
				// Second approach if the first one doesn't yield results.
				// Check if a post with the menu item title exists.
				$post_exists = post_exists( $menu_item->title );

				if ( $post_exists ) {
					// If found, merge common arguments with additional information.
					$args = array_merge(
						$common_args,
						array(
							'menu-item-object-id' => $post_exists,
						)
					);
				} else {
					$page     = get_page_by_path( $slug, OBJECT, 'page' );
					$post     = get_page_by_path( $slug, OBJECT, 'post' );
					$singular = get_page_by_path( $slug, OBJECT, 'any' );
					if ( $page && $page->ID ) {
						$args = array_merge(
							$common_args,
							array(
								'menu-item-object-id' => $page->ID,
							)
						);
					} elseif ( $post && $post->ID ) {
						$args = array_merge(
							$common_args,
							array(
								'menu-item-object-id' => $post->ID,
							)
						);
					} elseif ( $singular && $singular->ID ) {
						$args = array_merge(
							$common_args,
							array(
								'menu-item-object-id' => $singular->ID,
							)
						);
					}
				}
			}
		} else {
			// Process other types of menu item.
			$args = array_merge(
				$common_args,
				array(
					'menu-item-object-id' => $menu_item->object_id,
				)
			);
		}

		return $args;
	}

	/**
	 * Updates the parent ID of each menu item in the given array based on the titles of the corresponding menu items in the $self_items array.
	 *
	 * @param int   $menu_id The ID of the navigation menu to update.
	 * @param array $args An array of menu items to update. Each menu item should be an associative array with the following keys:
	 *   - 'menu-item-parent-title': The title of the parent menu item.
	 *   - 'menu-item-object-id': The ID of the menu item object.
	 *
	 * @return void
	 */
	public function update_parent_id( $menu_id, &$args ) {
		$self_items = wp_get_nav_menu_items( $menu_id );
		$index      = 0;

		foreach ( $args as &$args_menu_item ) {
			foreach ( $self_items as $self_menu_item ) {
				// Update parent ID if the titles match.
				if ( array_key_exists( 'menu-item-parent-title', $args_menu_item ) ) {
					if ( $args_menu_item['menu-item-parent-title'] === $self_menu_item->title ) {
						$args_menu_item['menu-item-parent-id'] = $self_menu_item->ID;
						update_post_meta( $args_menu_item['menu-item-object-id'], '_menu_item_menu_item_parent', $self_menu_item->ID );
					}
				}
			}
			++$index;
		}
	}

	/**
	 * Handles the AJAX request for importing menu items.
	 *
	 * This function is responsible for handling the AJAX request to import menu items.
	 * It verifies the nonce, processes the import, and sends a response to the client.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function handle_get_import() {
		// Verify nonce.
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'ajax-nonce' ) ) {
			// If nonce verification fails, send JSON error response and terminate.
			wp_send_json_error(
				array(
					'message' => esc_html__( 'Invalid nonce handle_get_import!', 'import-export-menu' ),
					'status'  => esc_html__( 'Error!', 'import-export-menu' ),
				)
			);

			// End processing.
			wp_die();
		}

		// Check if file data is empty.
		if ( ! isset( $_FILES['file'] ) || UPLOAD_ERR_OK !== $_FILES['file']['error'] ) {
			wp_send_json_error(
				array(
					'message' => esc_html__( 'File data is empty.', 'import-export-menu' ),
					'status'  => esc_html__( 'Error!', 'import-export-menu' ),
				)
			);

			// End processing.
			wp_die();
		}

		// Get data input file.
		$uploaded_file = $_FILES['file'];

		// Verify the file type to ensure it's a JSON file.
		if ( 'application/json' !== $uploaded_file['type'] ) {
			wp_send_json_error(
				array(
					'message' => esc_html__( 'Invalid file type. Please upload a JSON file.', 'import-export-menu' ),
					'status'  => esc_html__( 'Error!', 'import-export-menu' ),
				)
			);

			// End processing.
			wp_die();
		}

		// Check if the file size exceeds 5MB.
		if ( $uploaded_file['size'] > 5242880 ) { // 5242880 bytes = 5MB
			wp_send_json_error(
				array(
					'message' => esc_html__( 'File size exceeds 5MB. Please upload a smaller file.', 'import-export-menu' ),
					'status'  => esc_html__( 'Error!', 'import-export-menu' ),
				)
			);

			// End processing.
			wp_die();
		}

		// Optional array to override the default behavior of wp_handle_upload.
		$upload_overrides = array( 'test_form' => false );

		// Move the uploaded file to the target directory.
		$movefile = wp_handle_upload( $uploaded_file, $upload_overrides );

		// Check if the file upload was successful and there were no errors.
		if ( $movefile && ! isset( $movefile['error'] ) ) {

			if ( file_exists( $movefile['file'] ) ) {
				// phpcs:ignore
				$json_content = file_get_contents( $movefile['file'] );

				$menus = json_decode( $json_content, false );
			} else {
				// If the file does not exist or there is a permission issue, send an error message.
				wp_send_json_error(
					array(
						'message' => esc_html__( 'File not found or there is a permission issue.', 'import-export-menu' ),
						'status'  => esc_html__( 'Error!', 'import-export-menu' ),
					)
				);

				// End processing.
				wp_die();
			}

			// Loop through each menu.
			if ( ! empty( $menus ) ) {
				foreach ( $menus as $menu ) {

					// Get the internal menu by slug.
					$internal_menu = get_term_by( 'slug', $menu->slug, 'nav_menu' );

					// Check if the property 'plugin_name' exists and its value is 'Import Export Menu'.
					if ( ! isset( $menu->plugin_name ) || 'Import Export Menu' !== $menu->plugin_name ) {
						// Set the error message to indicate that the file upload failed and must be from the Import Export Menu plugin.
						wp_send_json_error(
							array(
								'message' => esc_html__( 'Failed to upload file. The file must be from the Import Export Menu plugin.', 'import-export-menu' ),
								'status'  => esc_html__( 'Error!', 'import-export-menu' ),
							)
						);

						// End processing.
						wp_die();
					}

					// Check if a menu with the specified name already exists.
					$menu_exists = wp_get_nav_menu_object( $menu->name );

					if ( $menu_exists ) {
						// If the menu exists, delete it.
						wp_delete_nav_menu( $menu->name );
					}

					// Create a new menu with the same name.
					$menu_id = wp_create_nav_menu( $menu->name );

					// Build arguments for new menu items.
					$args  = array();
					$index = 0;

					if ( ! empty( $menu->terms ) ) {
						foreach ( $menu->terms as $menu_item ) {

							// Skip if the post status is 'draft'.
							if ( 'draft' === $menu_item->post_status ) {
								continue;
							}

							// Process menu item based on its type.
							$args_menu_item = $this->process_menu_item( $menu_item );

							// Update nav menu item and get the updated ID.
							$nav_menu_item_update = wp_update_nav_menu_item( $menu_id, 0, $args_menu_item );

							// Update the object ID in the arguments.
							$args_menu_item['menu-item-object-id'] = $nav_menu_item_update;

							$args[ $index++ ] = $args_menu_item;
						}
					}

					// Update parent ID for menu items.
					$this->update_parent_id( $menu_id, $args );

				}
			} else {
				// If no menus are found, send an error message.
				wp_send_json_error(
					array(
						'message' => esc_html__( 'No menus found to import.', 'import-export-menu' ),
						'status'  => esc_html__( 'Error!', 'import-export-menu' ),
					)
				);

				// End processing.
				wp_die();
			}

			// Send a success response with the file URL if the file is successfully uploaded.
			wp_send_json_success(
				array(
					'message'  => esc_html__( 'File uploaded successfully.', 'import-export-menu' ),
					'status'   => esc_html__( 'Success!', 'import-export-menu' ),
					'file_url' => $movefile['file'],
				)
			);
		} else {
			// Send an error response if the file upload fails.
			wp_send_json_error(
				array(
					'message' => esc_html__( 'Failed to upload file.', 'import-export-menu' ),
					'status'  => esc_html__( 'Error!', 'import-export-menu' ),
				)
			);
		}

		// End processing.
		wp_die();
	}
}
