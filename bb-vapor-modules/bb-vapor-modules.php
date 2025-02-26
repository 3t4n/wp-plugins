<?php
/**
 * Plugin Name: BB Vapor Modules
 * Plugin URI: https://bbvapormodules.com
 * Description: A selection of modules for Beaver Builder.
 * Version: 2.0.0
 * Author: Ronald Huereca
 * Author URI: https://mediaron.com
 * Requires at least: 5.0
 * Contributors: ronalfy
 * Text Domain: bb-vapor-modules
 * Domain Path: /languages
 */
define( 'BBVAPOR_PLUGIN_FREE', true );
define( 'BBVAPOR_PLUGIN_NAME', 'BB Vapor Modules' );
define( 'BBVAPOR_BEAVER_BUILDER_DIR', plugin_dir_path( __FILE__ ) );
define( 'BBVAPOR_BEAVER_BUILDER_URL', plugins_url( '/', __FILE__ ) );
define( 'BBVAPOR_BEAVER_BUILDER_VERSION', '2.0.0' );
define( 'BBVAPOR_BEAVER_BUILDER_SLUG', plugin_basename(__FILE__) );

class BBVapor_Modules {

	public function __construct() {
		add_action( 'plugin_loaded', array( $this, 'bbvm_beaver_builder_plugin_loaded' ) );

		// Load text domain
		load_plugin_textdomain( 'bb-vapor-modules', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
	public function bbvm_beaver_builder_module_init() {

		require_once( 'includes/bbvm-beaverbuilder-admin.php' );
		new BBVapor_BeaverBuilder_Admin();

		if ( class_exists( 'FLBuilder' ) ) {

			add_action( 'wp_head', array( $this, 'bbvm_beaver_builder_ajax_url' ) );

			// Breadcrumb module
			require_once 'bbvm-modules/basic-breadcrumbs-module/bbvm-breadcrumbs-module.php';
			new BBVapor_Breadcrumbs_Module();

			// Photo overlay module
			require_once 'bbvm-modules/photo-overlay/bbvm-photo-overlay-module.php';
			new BBVapor_Photo_Overlay_Module();

			// Photo module.
			require_once 'bbvm-modules/photo/bbvm-photo.php';
			new BBVapor_Photo();

			// Gravity Forms module
			if ( class_exists( 'GFAPI' ) ) {
				require_once 'bbvm-modules/gravityforms/bbvm-gravityforms-module.php';
				new BBVapor_Gravityforms_Module();
			}

			// Card Module
			require_once 'bbvm-modules/card/bbvm-card-module.php';
			new BBVapor_Card_Module();

			// Alerts Module
			require_once 'bbvm-modules/alerts/bbvm-alerts-module.php';
			new BBVapor_Alerts_Module();

			// Animated Button Module
			require_once 'bbvm-modules/animated-button/bbvm-animated-button.php';
			new BBVapor_Animated_Button_Module();

			// Button Module
			require_once 'bbvm-modules/button/bbvm-button.php';
			new BBVapor_Button_Module();

			// Gists Module
			require_once 'bbvm-modules/gist/bbvm-gist-module.php';
			new BBVapor_Gist_Module();

			// Gravatar module
			require_once 'bbvm-modules/gravatar/bbvm-gravatar-module.php';
			new BBVapor_Gravatar_Module();

			// Social Media Icons Module
			require_once 'bbvm-modules/social-media-icons/bbvm-social-media-module.php';
			new BBVapor_Social_Media_Module();

			// Copyright Module
			require_once 'bbvm-modules/copyright/bbvm-copyright-module.php';
			new BBVapor_Copyright_Module();

			// Syntax highlighter module
			global $SyntaxHighlighter;
			if( is_object( $SyntaxHighlighter ) ) {
				require_once 'bbvm-modules/syntax-highlighter/bbvm-syntax-highlighter-module.php';
				new BBVapor_Syntax_Highlighter_Module();
			}

			// WP Plugin Info Card module.
			if ( function_exists( 'wppic_shortcode_function' ) ) {
				require_once 'bbvm-modules/plugin-info-card/bbvm-plugin-info-card.php';
				new BBVapor_Plugin_Info_card();
			}

			// LearnDash modules.
			if ( defined( 'LEARNDASH_VERSION' ) ) {
				if ( $this->is_module_enabled( $module_options, 'learndash-profile' ) ) {
					require_once 'bbvm-modules/learndash-profile/bbvm-learndash-profile.php';
					new BBVapor_LearnDash_Profile();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-courses' ) ) {
					require_once 'bbvm-modules/learndash-courses/bbvm-learndash-courses.php';
					new BBVapor_LearnDash_Courses();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-lessons' ) ) {
					require_once 'bbvm-modules/learndash-lessons/bbvm-learndash-lessons.php';
					new BBVapor_LearnDash_Lessons();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-topics' ) ) {
					require_once 'bbvm-modules/learndash-topics/bbvm-learndash-topics.php';
					new BBVapor_LearnDash_Topics();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-quizzes' ) ) {
					require_once 'bbvm-modules/learndash-quizzes/bbvm-learndash-quizzes.php';
					new BBVapor_LearnDash_Quizzes();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-quiz' ) ) {
					require_once 'bbvm-modules/learndash-quiz/bbvm-learndash-quiz.php';
					new BBVapor_LearnDash_Quiz();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-course-content' ) ) {
					require_once 'bbvm-modules/learndash-course-content/bbvm-learndash-course-content.php';
					new BBVapor_LearnDash_Course_Content();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-course-info' ) ) {
					require_once 'bbvm-modules/learndash-course-info/bbvm-learndash-course-info.php';
					new BBVapor_LearnDash_Course_Info();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-course-progress' ) ) {
					require_once 'bbvm-modules/learndash-course-progress/bbvm-learndash-course-progress.php';
					new BBVapor_LearnDash_Course_Progress();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-course-status' ) ) {
					require_once 'bbvm-modules/learndash-course-status/bbvm-learndash-course-status.php';
					new BBVapor_LearnDash_Course_Status();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-messages' ) ) {
					require_once 'bbvm-modules/learndash-messages/bbvm-learndash-messages.php';
					new BBVapor_LearnDash_Messages();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-login' ) ) {
					require_once 'bbvm-modules/learndash-login/bbvm-learndash-login.php';
					new BBVapor_LearnDash_Login();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-user-status' ) ) {
					require_once 'bbvm-modules/learndash-user-status/bbvm-learndash-user-status.php';
					new BBVapor_LearnDash_User_Status();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-user-points' ) ) {
					require_once 'bbvm-modules/learndash-user-points/bbvm-learndash-user-points.php';
					new BBVapor_LearnDash_User_Points();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-payments' ) ) {
					require_once 'bbvm-modules/learndash-payments/bbvm-learndash-payments.php';
					new BBVapor_LearnDash_Payments();
				}
				if ( $this->is_module_enabled( $module_options, 'learndash-certificates' ) ) {
					require_once 'bbvm-modules/learndash-certificates/bbvm-learndash-certificates.php';
					new BBVapor_LearnDash_Certificates();
				}
			}

			// Spacers/Separators
			require_once 'bbvm-modules/simple-spacer/bbvm-simple-spacer-module.php';
			new BBVapor_Simple_Spacer_Module();
			require_once 'bbvm-modules/simple-separator/bbvm-simple-separator.php';
			new BBVapor_Simple_Separator_Module();
			require_once 'bbvm-modules/intermediate-separator/bbvm-intermediate-separator.php';
			new BBVapor_Intermediate_Separator_Module();
			require_once 'bbvm-modules/advanced-separator/bbvm-advanced-separator-module.php';
			new BBVapor_Advanced_Separator_Module();

			// Vegas Slideshow
			require_once 'bbvm-modules/vegas-slideshow/bbvm-vegas-slideshow-module.php';
			new BBVapor_Vegas_Slideshow_Module();

			add_shortcode( 'bbvm_bb_copyright', array( $this, 'bbvm_beaver_builder_copyright' ) );
		}


	}

	/**
	 * Get a color based on module settings.
	 *
	 * @param string $color The color (could be alpha, six digits, or a string such as inherit).
	 *
	 * @return string The updated color.
	 */
	public static function get_color( $color ) {
		if ( empty( $color ) ) {
			return 'inherit';
		}
		if ( 6 === strlen( $color ) ) {
			return '#' . $color;
		} else {
			return $color;
		}
		return $color;
	}

	/**
	 * Get an opening anchor based on link settings
	 *
	 * @param object $settings The Beaver Builder module settings object.
	 * @param string $name     The setting name to check for.
	 * @param string $class    The class to insert into an anchor.
	 *
	 * @return string Anchor HTML markup
	 */
	public static function get_starting_anchor( $settings, $name, $class = '' ) {
		$return = sprintf(
			'<a href="%s" class="%s"',
			esc_url( $settings->{$name} ),
			esc_attr( $class )
		);

		$no_follow = $name . '_nofollow';
		if ( isset( $settings->{$no_follow} ) && 'yes' === $settings->{$no_follow} ) {
			$return .= ' rel="nofollow"';
		}

		// Target.
		$target = $name . '_target';
		if ( isset( $settings->{$target} ) && ! empty( $settings->{$target} ) ) {
			$return .= sprintf( ' target="%s"', esc_attr( $settings->{$target} ) );
		}
		$return .= '>';
		return $return;
	}

	public function bbvm_beaver_builder_ajax_url() {
	?>
	<script>
	var bbvm_beaver_builder_ajax_url = '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>';
	</script>
	<?php
	}
	public function bbvm_beaver_builder_plugin_loaded() {

		if ( ! apply_filters( 'bbvapor_load', true ) ) {
			return;
		}

		add_action( 'init', array( $this, 'bbvm_beaver_builder_module_init' ), 20 );

		// Vegas
		require_once 'includes/vegas-row-settings.php';
		bbvapor_modules_row_register_settings();
	}

	public function bbvm_beaver_builder_copyright( $atts ) {
		$args = shortcode_atts( array(
			'site' => get_bloginfo( 'sitename' ),
			'start' => false,
			'end' => date('Y'),
			'copyright_text' => __( 'Copyright', 'bb-vapor-modules' ),
			'symbol' => '&copy;'
		), $atts );
		$copyright_html = '';
		$copyright_html .= $args['symbol'] . '&nbsp;';
		if( false !== $args['start'] ) {
			$copyright_html .= esc_html( $args['start'] ) . '-';
		}
		$copyright_html .= esc_html( $args['end'] );
		$copyright_html .= '&nbsp';
		$copyright_html .= esc_html( $args['copyright_text'] ) . '&nbsp';
		$copyright_html .= esc_html( $args['site'] );
		return $copyright_html;
	}
}

new BBVapor_Modules();