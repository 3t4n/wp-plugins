<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://codealtdel.com/
 * @since      1.0.0
 *
 * @package    Age_Okay
 * @subpackage Age_Okay/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Age_Okay
 * @subpackage Age_Okay/admin
 * @author     Code Alt Del <info@codealtdel.com>
 */
class Age_Okay_Admin {

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
	 * The shared functionality for admin and public classes
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      class    $shared    The class for shared functionality
	 */
	private $shared;
	
	/**
	 * The sanitised submitted (POST) data for the editor page
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $shared    Array of processed submitted data
	 */
	private $post_data;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string    $plugin_name    The name of this plugin.
	 * @param    string    $version    The version of this plugin.
	 * @param    class     $shared    Class for shared usage in admin and public.
	 */
	public function __construct( $plugin_name, $version, $shared ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->shared = $shared;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		if ( ! empty( AGE_OKAY_DEBUG ) ) {
			wp_enqueue_style( 'age_okay_admin_css', plugin_dir_url( __FILE__ ) . 'css/age-okay-admin.css', false, $this->version );
		} else {
			wp_enqueue_style( 'age_okay_admin_css', plugin_dir_url( __FILE__ ) . 'css/age-okay-admin-min.css', false, $this->version );
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker');
		
		if ( function_exists( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		} else {
			wp_enqueue_style( 'thickbox' );
			wp_enqueue_script( 'media-upload' );
			wp_enqueue_script( 'thickbox' );
		}
		
		if ( ! empty( AGE_OKAY_DEBUG ) ) {
			wp_enqueue_script( 'age_okay_admin_js', plugin_dir_url( __FILE__ ) . 'js/age-okay-admin.js', array( 'jquery' ), $this->version, true );
		} else {
			wp_enqueue_script( 'age_okay_admin_js', plugin_dir_url( __FILE__ ) . 'js/age-okay-admin-min.js', array( 'jquery' ), $this->version, true );
		}
		
		wp_localize_script( 'age_okay_admin_js', 'age_okay', array(
			'gallery_title'     => __( 'Age Okay Image', 'age-okay' ),
			'gallery_button'    => __( 'Use Image', 'age-okay' ),
			'save_error'        => __( 'There has been an error saving your age verification data.', 'age-okay' ),
			'discard_error'     => __( 'There has been an error discarding your age verification preview data.', 'age-okay' ),
			'lang_load_error'   => __( 'There has been an error loading in the language.', 'age-okay' ),
			'lang_saved'        => __( 'Language saved succesfully', 'age-okay' ),
			'lang_save_error'   => __( 'There has been an error saving your new language content.', 'age-okay' ),
			'lang_deleted'      => __( 'Language deleted succesfully', 'age-okay' ),
			'lang_delete_error' => __( 'There has been an error deleting your language content.', 'age-okay' ),
			'sets_saved'        => __( 'Settings saved succesfully', 'age-okay' ),
			'sets_save_error'   => __( 'There has been an error saving your new settings.', 'age-okay' ),
		) );

	}
	
	/**
	 * Register menu navigation for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function admin_age_okay_menu() {
		
		add_menu_page( 'Age Okay', 'Age Okay', 'manage_options', 'age-okay', array( $this, 'partials_age_okay_editor' ), 'data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyINCiB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMDAuMDAwMDAwIDIwMC4wMDAwMDAiDQogcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1pZFlNaWQgbWVldCI+DQo8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLjAwMDAwMCwyMDAuMDAwMDAwKSBzY2FsZSgwLjEwMDAwMCwtMC4xMDAwMDApIg0KZmlsbD0iI2EwYTVhYSIgc3Ryb2tlPSJub25lIj4NCjxwYXRoIGQ9Ik03ODUgMTg4NyBjLTE2IC0xMiAtMzEgLTI1IC0zMyAtMjkgLTIgLTUgLTggLTggLTEzIC04IC01IDAgLTI3IC0xMg0KLTQ4IC0yNiAtMzkgLTI1IC0zOSAtMjYgLTIzIC01NCA5IC0xNiAyMCAtMjYgMjQgLTI0IDUgMyA4IDMgOCAwIDAgLTMgLTE0MA0KLTIxNSAtMzEwIC00NzIgLTE3MSAtMjU3IC0zMTUgLTQ3NSAtMzIwIC00ODQgLTggLTE1IDUgLTI3IDc1IC03NCA0NyAtMzEgODYNCi01NiA4OCAtNTYgMiAwIDEzNCAxOTYgMjkzIDQzNSAxNTkgMjM5IDI5MSA0MzUgMjk0IDQzNSA2IDAgMTQ1IC0yMTEgMTQ1DQotMjIxIDAgLTQgLTMxIC0yMyAtNjkgLTQzIC0xNzIgLTkwIC0yNzkgLTIxNiAtMzMwIC0zODUgLTIxIC03MiAtMjEgLTIzMCAwDQotMzAyIDU4IC0xOTcgMjE3IC0zNTUgNDMxIC00MjcgNzEgLTI0IDkyIC0yNiAyMzggLTI2IDE0NiAwIDE2NyAyIDIzOCAyNiAyMTQNCjcyIDM3MyAyMzAgNDMxIDQyNyAyMSA3MiAyMSAyMzAgMCAzMDIgLTc1IDI1NyAtMzIwIDQ0MSAtNjA0IDQ1NiBsLTk1IDUgLTEyOQ0KMTk0IC0xMjggMTkzIDIwIDM1IGMyMCAzNCAxNSA1NSAtMTAgNDAgLTcgLTQgLTggLTMgLTQgNSA0IDYgMCAxNCAtMTEgMTggLTEwDQo0IC0yMCA5IC0yMyAxMyAtNiA4IC05NyA3MCAtMTAyIDcwIC0yIDAgLTE2IC0xMSAtMzMgLTIzeiBtNzE4IC04MDAgYzE1OCAtODMNCjI1NiAtMjYwIDIyOCAtNDEyIC0zMSAtMTY0IC0xNjAgLTI5NiAtMzQ2IC0zNTEgLTgwIC0yNCAtMjIwIC0yNCAtMzAwIDAgLTIzMQ0KNjkgLTM4MSAyNjggLTM0NiA0NjEgMjggMTQ4IDEzMCAyNjYgMjg3IDMzMCBsNTggMjQgMTU0IC0yMzIgYzg1IC0xMjggMTU4DQotMjM2IDE2MiAtMjQwIDExIC0xMiAxODEgMTAzIDE3MyAxMTcgLTQgNiAtNTcgODkgLTEyMCAxODQgLTYyIDk1IC0xMTMgMTc1DQotMTEzIDE3NyAwIDkgMTEwIC0zMCAxNjMgLTU4eiIvPg0KPC9nPg0KPC9zdmc+' );
		
		add_submenu_page( 'age-okay', __( 'Editor', 'age-okay' ), __( 'Editor', 'age-okay' ), 'manage_options', 'age-okay', array( $this, 'partials_age_okay_editor' ) );
		
		add_submenu_page( 'age-okay', __( 'Settings', 'age-okay' ), __( 'Settings', 'age-okay' ), 'manage_options', 'age-okay-settings', array( $this, 'partials_age_okay_settings' ) );
		
		add_submenu_page( 'age-okay', __( 'Translations', 'age-okay' ), __( 'Translations', 'age-okay' ), 'manage_options', 'age-okay-trans', array( $this, 'partials_age_okay_translations' ) );
		
		add_submenu_page( 'age-okay', __( 'Documentation', 'age-okay' ), __( 'Documentation', 'age-okay' ), 'manage_options', 'age-okay-docs', array( $this, 'partials_age_okay_documentation' ) );
		
		add_submenu_page( 'age-okay', __( 'GET PRO', 'age-okay' ), __( 'GET PRO', 'age-okay' ), 'manage_options', 'age-okay-pro', array( $this, 'partials_age_okay_getpro' ) );
		
		//global $submenu;
		//$submenu['age-okay'][4] = array( 'GET PRO', 'manage_options' , 'https://www.codealtdel.com' );
		
	}
	
	/**
	 * LOADING TEMPLATES
	 */
	
	/**
	 * Load the template for Editor admin page
	 *
	 * @since    1.0.0
	 */
	public function partials_age_okay_editor() {
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/age-okay-admin-editor.php';
		
	}
	
	/**
	 * Load the template for Settings admin page
	 *
	 * @since    1.0.0
	 */
	public function partials_age_okay_settings() {
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/age-okay-admin-settings.php';
		
	}
	
	/**
	 * Load the template for Translations admin page
	 *
	 * @since    1.0.0
	 */
	public function partials_age_okay_translations() {
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/age-okay-admin-translations.php';
		
	}
	
	/**
	 * Load the template for Documentation admin page
	 *
	 * @since    1.0.0
	 */
	public function partials_age_okay_documentation() {
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/age-okay-admin-docs.php';
		
	}
	
	/**
	 * Load the template for Documentation admin page
	 *
	 * @since    1.0.0
	 */
	public function partials_age_okay_getpro() {
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/age-okay-admin-pro.php';
		
	}
	
	/**
	 * AJAX FUNCTIONALITY
	 */
	
	/**
	 * Save preview data from Editor admin page
	 *
	 * @since    1.0.0
	 */
	public function ajax_age_okay_preview() {
		
		if ( ! current_user_can( 'manage_options' ) || ! wp_verify_nonce( $_POST['editor_nonce'], 'editor_nonce' ) ) {
			echo json_encode( array( 'result' => 'age_nokay' ) );
			die();
		}
		
		$this->setup_save_data();
		
		$data = array( 'v' => 'p' );
		foreach ( $this->shared->options as $key => $val ) {
			if ( isset( $this->post_data[ $key ] ) ) {
				$data[ $key ] = $this->post_data[ $key ];
			}
		}
		$data = stripslashes_deep( $data );
		
		$query = update_option( 'age_okay_preview', $data, false );
		if ( empty( $query ) ) {
			$query = get_option( 'age_okay_preview', false );
			if ( ! empty( $query ) && $query == $data ) {
				$query = true;
			}
		}
		
		$data = array();
		foreach ( $this->shared->lang as $key => $val ) {
			if ( isset( $this->post_data[ $key ] ) ) {
				$data[ $key ] = $this->post_data[ $key ];
			}
		}
		$data = stripslashes_deep( $data );
		
		$query2 = update_option( 'age_okay_preview_lang', $data, false );
		if ( empty( $query2 ) ) {
			$query2 = get_option( 'age_okay_preview_lang', false );
			if ( ! empty( $query2 ) && $query2 == $data ) {
				$query2 = true;
			}
		}
		
		if ( ! empty( $query ) && ! empty( $query2 ) ) {
			echo json_encode( array( 'result' => 'age_okay' ) );
		} else {
			echo json_encode( array( 'result' => 'age_nokay' ) );
		}
		die();
		
	}
	
	/**
	 * Save as live changes in Editor admin page, overwrite preview data
	 *
	 * @since    1.0.0
	 */
	public function ajax_age_okay_save() {
		
		if ( ! current_user_can( 'manage_options' ) || ! wp_verify_nonce( $_POST['editor_nonce'], 'editor_nonce' ) ) {
			echo json_encode( array( 'result' => 'age_nokay' ) );
			die();
		}
		
		$this->setup_save_data();
		
		$data = array( 'v' => 'l' );
		foreach ( $this->shared->options as $key => $val ) {
			if ( isset( $this->post_data[ $key ] ) ) {
				$data[ $key ] = $this->post_data[ $key ];
			}
		}
		$data = stripslashes_deep( $data );
		
		$query = update_option( 'age_okay_preview', $data, false );
		if ( empty( $query ) ) {
			$query = get_option( 'age_okay_preview', false );
			if ( ! empty( $query ) && $query == $data ) {
				$query = true;
			}
		}
		
		$query2 = update_option( 'age_okay', $data, false );
		if ( empty( $query2 ) ) {
			$query2 = get_option( 'age_okay', false );
			if ( ! empty( $query2 ) && $query2 == $data ) {
				$query2 = true;
			}
		}
		
		$data = array();
		foreach ( $this->shared->lang as $key => $val ) {
			if ( isset( $this->post_data[ $key ] ) ) {
				$data[ $key ] = $this->post_data[ $key ];
			}
		}
		$data = stripslashes_deep( $data );
		
		$query3 = update_option( 'age_okay_preview_lang', $data, false );
		if ( empty( $query3 ) ) {
			$query3 = get_option( 'age_okay_preview_lang', false );
			if ( ! empty( $query3 ) && $query3 == $data ) {
				$query3 = true;
			}
		}
		
		$query4 = update_option( 'age_okay_lang', $data, false );
		if ( empty( $query4 ) ) {
			$query4 = get_option( 'age_okay_lang', false );
			if ( ! empty( $query4 ) && $query4 == $data ) {
				$query4 = true;
			}
		}
		
		if ( ! empty( $query ) && ! empty( $query2 ) && ! empty( $query3 ) && ! empty( $query4 ) ) {
			echo json_encode( array( 'result' => 'age_okay' ) );
		} else {
			echo json_encode( array( 'result' => 'age_nokay' ) );
		}
		die();
		
	}
	
	/**
	 * Discard recent preview changes and rollback to last saved data or default values
	 *
	 * @since    1.0.0
	 */
	public function ajax_age_okay_discard() {
		
		if ( ! current_user_can( 'manage_options' ) || ! wp_verify_nonce( $_POST['editor_nonce'], 'editor_nonce' ) ) {
			echo json_encode( array( 'result' => 'age_nokay' ) );
			die();
		}
		
		$data = get_option( 'age_okay', false );
		$data2 = get_option( 'age_okay_preview', false );
		if ( ! empty( $data ) ) {
			$query = update_option( 'age_okay_preview', $data, false );
			if ( empty( $query ) ) {
				$query = get_option( 'age_okay_preview', false );
				if ( ! empty( $query ) && $query == $data ) {
					$query = true;
				}
			}
		} elseif ( ! empty( $data2 ) ) {
			$query = delete_option( 'age_okay_preview' );
		} else {
			$query = true;
		}
		
		$data = get_option( 'age_okay_lang', false );
		$data2 = get_option( 'age_okay_preview_lang', false );
		if ( ! empty( $data ) ) {
			$query2 = update_option( 'age_okay_preview_lang', $data, false );
			if ( empty( $query2 ) ) {
				$query2 = get_option( 'age_okay_preview_lang', false );
				if ( ! empty( $query2 ) && $query2 == $data ) {
					$query2 = true;
				}
			}
		} elseif ( ! empty( $data2 ) ) {
			$query2 = delete_option( 'age_okay_preview_lang' );
		} else {
			$query2 = true;
		}
		
		if ( ! empty( $query ) && ! empty( $query2 ) ) {
			echo json_encode( array( 'result' => 'age_okay' ) );
		} else {
			echo json_encode( array( 'result' => 'age_nokay' ) );
		}
		die();
		
	}
	
	/**
	 * Save settings on Settings admin page
	 * Whether age okay is enabled and where it shows, two versions saved, all data so if you
	 * switch modes data will not be lost, and live data so less to load in on every page load
	 *
	 * @since    1.0.0
	 */
	public function ajax_age_okay_settings_save() {
		
		if ( ! current_user_can( 'manage_options') || ! wp_verify_nonce( $_POST['settings_nonce'], 'settings_nonce' ) ) {
			echo json_encode( array( 'result' => 'age_nokay' ) );
			die();
		}
		
		$live_data = array();
		$all_data = array();
		$data = array();
		
		//$enabled_vals = array( /*'disabled',*/ 'all', 'only', 'except' );
		$enabled_vals = array( 'all', 'only', 'except' );
		if ( empty( $_POST['enabled'] ) || ! in_array( $_POST['enabled'], $enabled_vals ) ) {
			//save type in all_data but under different name to not overwrite live data
			$live_data['enabled'] = $all_data['type'] = false;
		} else {
			$live_data['enabled'] = $all_data['type'] = $_POST['enabled']; //whitelisted
		}
		
		if ( ! empty( $_POST['only_home'] ) ) {
			$data['only_home'] = true;
		}
		if ( ! empty( $_POST['only_types'] ) ) {
			foreach( $_POST['only_types'] as $val ) {
				$data['only_types'][] = sanitize_text_field( $val );
			}
		}
		if ( ! empty( $_POST['only_pid'] ) ) {
			foreach( $_POST['only_pid'] as $val ) {
				$data['only_pid'][] = $val + 0;
			}
		}
		
		if ( $live_data['enabled'] == 'only' ) {
			$live_data = array_merge( $live_data, $data );
		}
		$all_data = array_merge( $all_data, $data );
		$data = array();
		
		if ( ! empty( $_POST['except_home'] ) ) {
			$data['except_home'] = true;
		}
		if ( ! empty( $_POST['except_types'] ) ) {
			foreach( $_POST['except_types'] as $val ) {
				$data['except_types'][] = sanitize_text_field( $val );
			}
		}
		if ( ! empty( $_POST['except_pid'] ) ) {
			foreach( $_POST['except_pid'] as $val ) {
				$data['except_pid'][] = $val + 0;
			}
		}
			
		if ( $live_data['enabled'] == 'except' ) {
			$live_data = array_merge( $live_data, $data );
		}
		$all_data = array_merge( $all_data, $data );
		
		$data = stripslashes_deep( $live_data );
		$query = update_option( 'age_okay_settings', $data, true );
		if ( empty( $query ) ) {
			$query = get_option( 'age_okay_settings', false );
			if ( ! empty( $query ) && $query == $data ) {
				$query = true;
			}
		}
		
		$data = stripslashes_deep( $all_data );
		$query2 = update_option( 'age_okay_settings_all', $data, false );
		if ( empty( $query2 ) ) {
			$query2 = get_option( 'age_okay_settings_all', false );
			if ( ! empty( $query2 ) && $query2 == $data ) {
				$query2 = true;
			}
		}
		
		if ( ! empty( $query ) && ! empty( $query2 ) ) {
			echo json_encode( array( 'result' => 'age_okay' ) );
		} else {
			echo json_encode( array( 'result' => 'age_nokay' ) );
		}
		die();
		
	}
	
	/**
	 * HELPER FUNCTIONS
	 */
	 
	/**
	 * Validate/Sanitise data saved through Editor admin page
	 *
	 * @since    1.0.0
	 */
	private function setup_save_data() {
		
		$this->shared->load_options_default();
		$this->shared->load_lang_default();
		
		$int_keys = array( 'cookie_time', 'cookie_usertime', 'max_width', 'age_diff', 'border_width' );
		$hex_keys = array( 'text_color', 'error_color', 'overlay_color', 'border_color', 'inner_color', 'button_tcolor', 'button_color', 'hbutton_tcolor', 'hbutton_color', 'ebutton_tcolor', 'ebutton_color', 'ehbutton_tcolor', 'ehbutton_color', 'gradient_color_f', 'gradient_color_s', 'gradient_color_m', 'gradient_color_e' );
		
		foreach( $_POST as $key => $val ) {
			if( in_array( $key, $int_keys ) ) {
				$this->post_data[$key] = $val + 0;
			} else if( in_array( $key, $hex_keys ) ) {
				$this->post_data[$key] = sanitize_hex_color( $val );
			} else if( $key == 'no_url' ) {
				if ( $url = parse_url( $val ) ) {
					if ( ! isset( $url['scheme'] ) ) {
						$this->post_data['no_url'] = "http://{$val}";
					}
				}
				$this->post_data[$key] = esc_url_raw( $val );
			} else {
				$this->post_data[$key] = sanitize_text_field( $val );
			}
		}
		
		$this->post_data['age_diff'] = ( ! empty( $this->post_data['age_diff'] ) ? $this->post_data['age_diff'] : 18 );
		$this->post_data['max_width'] = ( ! empty( $this->post_data['max_width'] ) && $this->post_data['max_width'] > 300 ? $this->post_data['max_width'] : 300 );
		$this->post_data['ebutton_style'] = ( ! empty( $this->post_data['ebutton_style'] ) ? $this->post_data['ebutton_style'] : 'false' );
		$this->post_data['exit'] = ( ! empty( $this->post_data['exit'] ) ? $this->post_data['exit'] : 'false' );
		// calculate cookie length
		if ( empty( $this->post_data['cookie_usertime'] ) ) {
			$this->post_data['cookie_usertime'] = 0;
			$this->post_data['cookie_time'] = 0;
		} elseif ( $this->post_data['cookie_type'] == 'hours' ) {
			$this->post_data['cookie_time'] = $this->post_data['cookie_usertime'] * 60 * 60;
		} elseif ( $this->post_data['cookie_type'] == 'days' ) {
			$this->post_data['cookie_time'] = $this->post_data['cookie_usertime'] * 60 * 60 * 24;
		} elseif ( $this->post_data['cookie_type'] == 'months' ) {
			$this->post_data['cookie_time'] = $this->post_data['cookie_usertime'] * 60 * 60 * 24 * 30;
		} elseif ( $this->post_data['cookie_type'] == 'years' ) {
			$this->post_data['cookie_time'] = $this->post_data['cookie_usertime'] * 60 * 60 * 24 * 365;
		} else {
			$this->post_data['cookie_usertime'] = 0;
			$this->post_data['cookie_time'] = 0;
		}
		
		$this->post_data['load_type'] = 'cache';
		
	}

}
