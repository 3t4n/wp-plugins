<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://codealtdel.com/
 * @since      1.0.0
 *
 * @package    Age_Okay
 * @subpackage Age_Okay/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Age_Okay
 * @subpackage Age_Okay/public
 * @author     Code Alt Del <info@codealtdel.com>
 */
class Age_Okay_Public {

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
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $shared;
	
	/**
	 * Variable used when javascript is disabled and verification fails
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $verification_error    Error value when verification fails through posting form.
	 */
	private $verification_error;
	
	/**
	 * Contains array data from settings page
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $settings    Holds values for where to display verification screen
	 */
	private $settings;
	
	/**
	 * Contains post id, allows us to know what post type even if on archive page
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      int    $post_id    Set using get_the_ID() WP function
	 */
	private $post_id;
	
	/**
	 * Contains real id if there is one, and not post id from archive loop
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      int    $page_id    Set using get_queried_object_id() WP function
	 */
	private $page_id;
	
	/**
	 * Contains full page url so we can match against it (includes get vars when possible)
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $page_url    Used to match against url match settings
	 */
	private $page_url;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string    $plugin_name       The name of the plugin.
	 * @param    string    $version    The version of this plugin.
	 * @param    class     $shared    Class for shared usage in admin and public.
	 */
	public function __construct( $plugin_name, $version, $shared ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->shared = $shared;
		
		//post form error
		if ( ! empty( $_COOKIE['age_okay_error'] ) ) {
			$this->verification_error = $_COOKIE['age_okay_error'];
			setcookie( 'age_okay_error', '', time() - 3600, '/' );
		}
		
		if ( ! is_admin() && $GLOBALS['pagenow'] != 'wp-login.php' ) {
			// if viewing preview in editor
			if ( $this->shared->debug == true ) {
				$this->shared->load_options_debug();
				$this->load_type_cache();
			} else {
				$this->shared->load_options_live();
				$this->load_type_cache();
			}
		}

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		if ( ! empty( AGE_OKAY_DEBUG ) ) {
			wp_enqueue_style( 'age_okay_public_css', plugin_dir_url( __FILE__ ) . 'css/age-okay-public.css', false, $this->version );
			wp_enqueue_style( 'age_okay_ie9_css', plugin_dir_url( __FILE__ ) . 'css/age-okay-public-ie9.css', false, $this->version );
		} else {
			wp_enqueue_style( 'age_okay_public_css', plugin_dir_url( __FILE__ ) . 'css/age-okay-public-min.css', false, $this->version );
			wp_enqueue_style( 'age_okay_ie9_css', plugin_dir_url( __FILE__ ) . 'css/age-okay-public-ie9-min.css', false, $this->version );
		}
		wp_style_add_data( 'age_okay_ie9_css', 'conditional', 'lt IE 10' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		if ( ! empty( AGE_OKAY_DEBUG ) ) {
			wp_enqueue_script( 'age_okay_public_js', plugin_dir_url( __FILE__ ) . 'js/age-okay-public.js', array( 'jquery' ), $this->version, true );
		} else {
			wp_enqueue_script( 'age_okay_public_js', plugin_dir_url( __FILE__ ) . 'js/age-okay-public-min.js', array( 'jquery' ), $this->version, true );
		}
		
		$this->setup_page_details();
		wp_localize_script( 'age_okay_public_js', 'age_okay', array(
			'ajax_url'     => admin_url( 'admin-ajax.php' ),
			'debug_key'    => '#age_okay_debug',
			'post_id'      => $this->post_id,
			'page_id'      => get_queried_object_id(),
			'page_url'     => $this->page_url,
			'lang'         => get_locale(),
			'text_init1'   => __( 'There has been an error initialising the age verification screen.', 'age-okay' ),
			'text_init2'   => __( 'Please make sure you are old enough to view this website.', 'age-okay' ),
			'text_verify1' => __( 'There has been an error verifying your age.', 'age-okay' ),
			'text_verify2' => __( 'You will be allowed access to this page, but make sure you are old enough to view it.', 'age-okay' ),
		) );

	}
	
	/**
	 * METHODS FOR LOADING VERIFICATION SCREEN
	 */
	
	/**
	 * Load method for Cache type
	 *
	 * @since    1.0.0
	 */
	private function load_type_cache() {
		
		// load scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		
	}
	
	/**
	 * LOADING TEMPLATES
	 */
	
	/**
	 * Generate the content of the verification screen
	 *
	 * @since    1.0.0
	 */
	public function generate_age_okay_content() {
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/age-okay-public-verify.php';
		
	}
	
	/**
	 * AJAX FUNCTIONALITY/FORM PROCESSING
	 */
	
	/**
	 * Initiate verification screen
	 *
	 * @since    1.0.0
	 */
	public function ajax_age_okay_init() {
		
		// check if viewing preview in editor
		if ( $this->shared->debug == true ) {
			$this->shared->load_options_debug();
			$this->shared->load_lang_debug();
		} elseif ( empty( $_COOKIE['age_okay_verified'] ) ) {
			// check if should be shown on page
			$show_verification = $this->setup_check_page( $_POST['post_id'], $_POST['page_id'], $_POST['page_url'] );
			if ( ! empty( $show_verification ) ) {
				$this->shared->load_options_live();
				$this->shared->load_lang_live( true );
			}
		}
		if ( ! empty( $this->shared->options ) ) {
			// create content of verification screen and return
			ob_start();
			$this->generate_age_okay_content();
			$content = ob_get_contents();
			ob_end_clean();
			echo json_encode( array( 'result' => 'age_nokay', 'content' => $content ) );
		} else {
			echo json_encode( array( 'result' => 'age_okay' ) );
		}
		die();
		
	}
	
	/**
	 * Verify submitted data from verification screen from AJAX
	 *
	 * @since    1.0.0
	 * @see      method age_okay_verify
	 */
	public function ajax_age_okay_verify() {
		
		$this->age_okay_verify( 'ajax' );
		
	}
	
	/**
	 * Verify submitted data from verification screen when Javascript disabled (POST)
	 *
	 * @since    1.0.0
	 * @see      method age_okay_verify
	 */
	public function post_age_okay_verify() {
		
		if ( ! empty( $_POST['age_okay_verify_error'] ) ) {
			setcookie( 'age_okay_error', sanitize_text_field( $_POST['age_okay_verify_error'] ), 0, '/' );
			wp_safe_redirect( esc_url_raw( $_POST['url'] ) );
			die();
		} else {
			$this->age_okay_verify( 'post' );
		}
		
	}
	
	/**
	 * Verify submitted data from verification screen, used by AJAX and POST
	 *
	 * @since    1.0.0
	 * @param    string   $form_type    whether ajax or post
	 */
	public function age_okay_verify( $form_type ) {
		
		if ( ! wp_verify_nonce( $_POST['verify_nonce'], 'verify_nonce' ) ) {
			if ( $form_type == 'ajax' ) {
				echo json_encode( array( 'result' => 'nonce_fail' ) );
			}
			else {
				setcookie( 'age_okay_error', __( 'There has been an error verifying your age.', 'age-okay' ), 0, '/' );
				wp_safe_redirect( esc_url_raw( $_POST['url'] ) );
			}
			die();
		}
		
		if ( $this->shared->debug == true ) {
			$this->shared->load_options_debug();
			$this->shared->load_lang_debug();
		} else {
			$this->shared->load_options_live();
			$this->shared->load_lang_live( true );
		}
		
		// simple enter button
		if ( $this->shared->options['type'] == 'simple' ) {
			$error = false;
		} elseif ( $this->shared->options['type'] == 'check' ) { // checkbox, check if checked
			if ( empty( $_POST['age_okay_check_check'] ) ) {
				$error = $this->shared->lang['check_error'];
			}
		} elseif ( $this->shared->options['type'] == 'input' ) { // date of birth submission
			$day = ( ! empty( $_POST['age_okay_input_day'] ) ? sprintf('%02d', ( $_POST['age_okay_input_day'] + 0 ) ) : '00' );
			$month = ( ! empty( $_POST['age_okay_input_month'] ) ? sprintf('%02d', ( $_POST['age_okay_input_month'] + 0 ) ) : '00' );
			$year = ( ! empty( $_POST['age_okay_input_year'] ) ? sprintf('%04d', ( $_POST['age_okay_input_year'] + 0 ) ) : '0000' );
			$date = $year . '-' . $month . '-' . $day;
			$datetime = \DateTime::createFromFormat( '!Y-m-d', $date );
			// check if date is valid
			if ( $datetime && $datetime->format( 'Y-m-d' ) == $date ) {
				$cur_date = new \DateTime();
				$time_diff = $datetime->diff( $cur_date );
				// check if over verification age
				if ( $time_diff->invert != 0 || $time_diff->y < ( $this->shared->lang['age_diff'] + 0 ) ) {
					$error = $this->shared->lang['input_error_under'];
				} elseif ( $time_diff->y > 150 ) {
					$error = $this->shared->lang['input_error_invalid'];
				}
			} else {
				$error = $this->shared->lang['input_error_invalid'];
			}
		} else {
			$error = __( 'Age verification invalid type', 'age_okay' );
		}

		// return error
		if ( $form_type == 'ajax' ) {
			if ( ! empty( $error ) ) {
				echo json_encode( array( 'result' => 'age_nokay', 'content' => $this->setup_textarea( $error ) ) );
			} else {
				if ( empty( $this->shared->debug ) ) {
					setcookie( 'age_okay_verified', 'true', ( ! empty( $this->shared->options['cookie_time'] ) ? time() + $this->shared->options['cookie_time'] : 0 ), '/' );
				}
				echo json_encode( array( 'result' => 'age_okay' ) );
			}
		} else {
			if ( ! empty( $error ) ) {
				setcookie( 'age_okay_error', $this->setup_textarea( $error ), 0, '/' );
			} else {
				if ( empty( $this->shared->debug ) ) {
					setcookie( 'age_okay_verified', 'true', ( ! empty( $this->shared->options['cookie_time'] ) ? time() + $this->shared->options['cookie_time'] : 0 ), '/' );
				}
			}
			wp_safe_redirect( esc_url_raw( $_POST['url'] ) );
		}
		die();
		
	}
	
	/**
	 * HELPER FUNCTIONS
	 */
	
	/**
	 * Get page/post details for checking where to show page and for javascript variables passed by localize
	 *
	 * @since    1.0.0
	 */
	private function setup_page_details() {
		
		$this->post_id = get_the_ID();
		$this->post_id = ( ! empty( $this->post_id ) ? $this->post_id : 0 );
		
		$this->page_id = get_queried_object_id();
		$this->page_id = ( ! empty( $this->page_id ) ? $this->page_id : 0 );
		
		// add page_url variable so we know what the full url of the page is including get variables
		$this->page_url = '';
		// set homepage as specific page_url so we can identify it in the types selection
		if ( is_front_page() ) {
			$this->page_url = '%ao-home%?' . sanitize_text_field( $_SERVER['QUERY_STRING'] );
		} else { // will not include domain, will be in ^/string1/string2/$?var1=val1&var2=val2 format
			global $wp;
			$this->page_url = sanitize_text_field( add_query_arg( $_SERVER['QUERY_STRING'], '', '^/' . $wp->request . '/$' ) );
		}
		
	}
	
	/**
	 * Check if page should show verification screen
	 *
	 * @since    1.0.0
	 * @see      method setup_page_details
	 * @param    int   $post_id    contains post id, is int even if archive
	 * @param    int   $pade_id    contains real id or 0 if archive
	 * @param    string   $page_url   page url for matching
	 */
	private function setup_check_page( $post_id, $page_id, $page_url ) {
		$post_id = $post_id + 0;
		$page_id = $page_id + 0;
		$page_url = sanitize_text_field( $page_url );
		
		$show_verification = false;
		if ( ! current_user_can( 'manage_options' ) ) {
			$this->settings = get_option( 'age_okay_settings', false );
		}
		// if enabled from settings page
		if ( ! empty( $this->settings['enabled'] ) ) {
			// do not show if bot/spider/crawler
			$bots = array(
				'bot',
				'slurp',
				'crawler',
				'spider',
				'curl',
				'facebook',
				'fetch',
				'ia_archiver',
				'simplepie'
			);
			$user_agent = strtolower( $_SERVER['HTTP_USER_AGENT'] );
			foreach ( $bots as $bot ) {
				if ( strpos( $user_agent, $bot ) !== FALSE ) {
					return false;
				}
			}
			// if only showing on specific pages
			if ( $this->settings['enabled'] == 'only' ) {
				if ( ! empty( $this->settings['only_home'] ) ) {
					if ( ! empty( $page_url ) && strpos( $page_url, '%ao-home%' ) === 0 ) {
						$show_verification = true;
					}
				}
				if ( empty( $show_verification ) && ! empty( $this->settings['only_types'] ) ) {
					$ptype = get_post_type( $post_id );
					if ( ! empty( $ptype ) && in_array( $ptype, $this->settings['only_types'] ) ) {
						$show_verification = true;
					}
				}
				if ( empty( $show_verification ) && ! empty( $this->settings['only_pid'] ) && ! empty( $page_id ) ) {
					if ( in_array( $page_id, $this->settings['only_pid'] ) ) {
						$show_verification = true;
					}
				}
			} elseif ( $this->settings['enabled'] == 'except' ) { // if showing on all pages except some
				$show_verification = true;
				if ( ! empty( $this->settings['except_home'] ) ) {
					if ( ! empty( $page_url ) && strpos( $page_url, '%ao-home%' ) === 0 ) {
						$show_verification = false;
					}
				}
				if ( ! empty( $show_verification ) && ! empty( $this->settings['except_types'] ) ) {
					$ptype = get_post_type( $post_id );
					if ( ! empty( $ptype ) && in_array( $ptype, $this->settings['except_types'] ) ) {
						$show_verification = false;
					}
				}
				if ( ! empty( $show_verification ) && ! empty( $this->settings['except_pid'] ) && ! empty( $page_id ) ) {
					if ( in_array( $page_id, $this->settings['except_pid'] ) ) {
						$show_verification = false;
					}
				}
			} elseif ( $this->settings['enabled'] == 'all' ) { // if sitewide
				$show_verification = true;
			}
		}
		return $show_verification;
		
	}
	
	/**
	 * Output text content, replace placeholder with age
	 *
	 * @since    1.0.0
	 */
	public function setup_textarea( $string ) {
		
		return nl2br( esc_html( str_replace( '%ao-age%', $this->shared->lang['age_diff'], $string ) ) );
		
	}

}
