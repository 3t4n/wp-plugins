<?php
/**
 * Handle login ui frontend.
 */
namespace Advanced_Login_Page_Customizer;

defined( 'ABSPATH' ) || exit;

require_once 'styles.php';

class Login_UI {
	/**
	 * Assets handle.
	 *
	 * @var string
	 */
	public static $handle = 'alpc-login-ui';

	/**
	 * Initiate class.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'login_enqueue_scripts', array( __CLASS__, 'register_assets' ),11 );
		add_action( 'login_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ) );
		add_action( 'login_enqueue_scripts', 'wp_enqueue_global_styles' );
		add_action( 'login_footer', 'wp_enqueue_stored_styles' );
		add_action( 'login_header', array( __CLASS__, 'wrapper_opening_div' ) );
		add_action( 'login_body_class', array( __CLASS__, 'login_body_class' ) );
		// add_action( 'login_header', array( __CLASS__, 'left_section_opening_div' ) );
		// add_action( 'login_header', array( __CLASS__, 'left_section_closing_div' ) );
		// add_action( 'login_header', array( __CLASS__, 'right_section_opening_div' ) );
		// add_action( 'login_footer', array( __CLASS__, 'right_section_closing_div' ) );
		add_action( 'login_footer', array( __CLASS__, 'wrapper_closing_div' ) );
		add_action( 'login_footer', array( __CLASS__, 'add_background_video' ) );
		add_filter( 'login_headerurl', array( __CLASS__, 'logo_url' ) );
		add_filter( 'login_headertext', array( __CLASS__, 'login_headertext' ) );
		add_filter( 'login_title', array( __CLASS__, 'login_title' ) );
		add_filter( 'login_messages', array( __CLASS__, 'logout_message' ) );
		add_filter( 'login_message', array( __CLASS__, 'handle_login_messages' ) );
		add_action( 'login_errors', array( __CLASS__, 'login_errors' ) );
		add_filter( 'login_display_language_dropdown',	array( __CLASS__, 'remove_language_switch' ) );
	}

	/**
	 * Register assets.
	 *
	 * @return void
	 */
	public static function register_assets() {

		$asset_file_values = include_once 'index.asset.php';

		$deps = $asset_file_values['dependencies'];

		$ver = $asset_file_values['version'];
		$src = sprintf( '%sbuild/non-blocks/login-ui/index.js', ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_URL );
		wp_register_script( self::$handle, $src, $deps, $ver, true );

		$login_settings = advanced_login_page_customizer_login_settings();
		$settings = ! empty( $login_settings['settings'] ) ? $login_settings['settings'] : array();
		$loco_settings = array(
			'auto_remember_me' => isset($settings['auto_remember_me']) ? $settings['auto_remember_me'] : false,
			'enable_pci_compliance' => isset($settings['enable_pci_compliance']) ? $settings['enable_pci_compliance'] : false,
			'remove_language_switcher' => isset($settings['remove_language_switcher']) ? $settings['remove_language_switcher'] : false,
			);
		wp_localize_script( self::$handle, '_alpc_login_ui', $loco_settings );

		$src = sprintf( '%sbuild/non-blocks/login-ui/index.css', ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_URL );

		wp_register_style( self::$handle, $src, array(), $ver );
		wp_register_style( self::$handle . '-inline', false, array( ), $ver );
		wp_add_inline_style( self::$handle . '-inline', Login_UI_Style::get_style() );

		wp_register_style('alpc-custom-login-style', false);
		$settings = advanced_login_page_customizer_login_settings();
		$custom_css = ! empty( $settings['settings']['customScripts']['css'] ) ?   $settings['settings']['customScripts']['css']  : '';
		wp_add_inline_style('alpc-custom-login-style', $custom_css );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @return void
	 */
	public static function enqueue_scripts() {
		// wp_enqueue_style( 'global-styles' );
		wp_enqueue_script( self::$handle );
		wp_enqueue_style( self::$handle );
		wp_enqueue_style( self::$handle . '-inline' );
		// wp_enqueue_style( 'wp-block-library' );
		wp_enqueue_style('alpc-custom-login-style');
		// wp_enqueue_stored_styles();
		// wp_enqueue_style( 'core-block-supports' );
		// wp_add_global_styles_for_blocks();
		// wp_get_global_styles();
	}

	/**
	 * Wrapper Opening.
	 *
	 * @return void
	 */
	public static function wrapper_opening_div() {
		echo sprintf( '<!-- alpc/ Login Wrapper Opening --> <div class="%s">', 'alpc-login-wrap' );
	}

	public static function login_body_class( $classes ) {
		$classes[] = 'alpc-body';
		return $classes;
	}


	/**
	 * Left section opening.
	 *
	 * @return void
	 */
	public static function left_section_opening_div() {
			echo sprintf( '<!-- alpc Login Left section Opening --><div class="%s">', 'alpc-login-left-section' );
			$post = get_post( 14 );
			echo wp_kses_post( apply_filters( 'the_content', $post->post_content ) );
	}

	/**
	 * Left section Closing.
	 *
	 * @return void
	 */
	public static function left_section_closing_div() {
		echo '</div><!-- alpc Login Left section Closing -->';
	}

	/**
	 * Right section opening.
	 *
	 * @return void
	 */
	public static function right_section_opening_div() {
		echo sprintf( '<!-- alpc Login Right section Opening --><div class="%s">', 'alpc-login-right-section' );
	}

	/**
	 * Right section closing.
	 *
	 * @return void
	 */
	public static function right_section_closing_div() {
		echo '</div><!-- alpc Login Right section Closing -->';
	}

	/**
	 * Add background video.
	 *
	 * @return void
	 */
	public static function add_background_video() {
		$settings = advanced_login_page_customizer_login_settings();
		if ( empty( $settings['styles']['background']['enabledBackgroundVideo'] ) || empty( $settings['styles']['background']['videoSource'] ) ) {
			return false;
		}

		if ( ( $settings['styles']['background']['videoSource'] ) === 'youtube' ) {
			if ( ! empty( $settings['styles']['background']['youtubeId'] ) ) {
				$id = $settings['styles']['background']['youtubeId'];
				printf( '<iframe id="alpc-youtube-video-background" width="420" height="315" src="https://www.youtube.com/embed/%s?autoplay=1&mute=1&loop=1&controls=0&playsinline=1"></iframe>', esc_attr( $id ) );
			}
		}

		if ( 'media' === $settings['styles']['background']['videoSource'] ) {
			if ( empty( $settings['styles']['background']['videoData']['id'] ) ) {
				return false;
			}
			$video_url = wp_get_attachment_url( $settings['styles']['background']['videoData']['id'] );

			if ( empty( $video_url ) ) {
				return false;
			}
			printf(
				'
			<video autoplay loop id="alpc-video-background" playsinline="" muted>
			<source src="%s" type="video/mp4">
			</video>',
				esc_url( $video_url )
			);
		}
	}

	/**
	 * Wrapper closing.
	 *
	 * @return void
	 */
	public static function wrapper_closing_div() {
		echo '</div><!-- alpc Login Wrapper Closing -->';
	}

	/**
	 * Seting logo
	 *
	 * @param string $url
	 * @return string
	 */
	public static function logo_url( $url ) {
		$settings = advanced_login_page_customizer_login_settings();
		if ( ! empty( $settings['settings']['logo']['url'] ) ) {
			$url = esc_url( $settings['settings']['logo']['url'] );
		}
		return $url;
	}

	/**
	 * Set header text.
	 *
	 * @param string $text
	 * @return string
	 */
	public static function login_headertext( $text ) {
		$settings = advanced_login_page_customizer_login_settings();
		if ( ! empty( $settings['settings']['logo']['title'] ) ) {
			$text = esc_attr( $settings['settings']['logo']['title'] );
		}
		return $text;
	}
	/**
	 * Set browser title.
	 *
	 * @param string $text
	 * @return string
	 */
	public static function login_title( $text ) {
		$settings = advanced_login_page_customizer_login_settings();
		if ( ! empty( $settings['settings']['pageOptions']['title'] ) ) {
			$text = esc_attr( $settings['settings']['pageOptions']['title'] );
		}
		return $text;
	}
	public static function login_errors( $error ) {
		global $errors;
		$settings  = \Advanced_Login_Page_Customizer\advanced_login_page_customizer_login_settings();
		$err_codes = $errors->get_error_codes();
		if ( ! empty( $err_codes[0] ) ) {
			$code = $err_codes[0];
			if ( ! empty( $code ) && ! empty( $settings['settings']['errorMessages'][ $code ] ) ) {
				$error = wp_kses_post( $settings['settings']['errorMessages'][ $code ] );

			}
		}
		return $error;
	}
	public static function logout_message( $logout_message ) {
		$settings = advanced_login_page_customizer_login_settings();
		if ( ! empty( $_GET['loggedout'] ) && $_GET['loggedout'] == 'true' ) {
			$logout_message = ! empty( $settings['settings']['infoMessages']['log_out'] )
				? $settings['settings']['infoMessages']['log_out']
				: 'The User has Log out.';
		}
		return $logout_message;
	}

	public static function handle_login_messages( $message ) {
		$settings = advanced_login_page_customizer_login_settings();
		// Check for different login actions and set messages accordingly
		if ( isset( $_GET['action'] ) ) {
			switch ( $_GET['action'] ) {
				case 'lostpassword':
					$lost_password_message = ! empty( $settings['settings']['infoMessages']['lost_password'] )
						? $settings['settings']['infoMessages']['lost_password']
						: 'Please enter your username or email address. You will receive an email message with instructions on how to reset your password.';
					return '<p class="message">' . esc_html( $lost_password_message ) . '</p>';

				case 'register':
					$register_message = ! empty( $settings['settings']['infoMessages']['register'] )
						? $settings['settings']['infoMessages']['register']
						: 'Register your site.';
					return '<p class="message">' . esc_html( $register_message ) . '</p>';

				default:
					break;
			}
		}

		// Return the default message if no custom condition applies
		return $message;
	}

	public static function remove_language_switch() {
		$options = advanced_login_page_customizer_login_settings();
		return ( isset( $options['settings']['remove_language_switcher'] ) && $options['settings']['remove_language_switcher'] ) ? false : true;
	}
}

Login_UI::init();
