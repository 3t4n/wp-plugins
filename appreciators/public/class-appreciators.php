<?php
/**
 * Appreciators WP Plugin
 *
 * @package   Appreciators
 * @author    Minh Lee <minh@appreciators.org>
 * @license   GPL-2.0+
 * @copyright 2016 Appreciators Clique
 */

/**
 * Appreciators class.
 *
 * @package Appreciators
 * @author  Minh Lee <minh@appreciators.org>
 */
class Appreciators {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since 1.0.0
	 *
	 * @var   string
	 */
	const VERSION = '1.1.1';

	/**
	 * Unique identifier for your plugin.
	 *
	 *
	 * The variable name is used as the text domain when internationalizing strings
	 * of text. Its value should match the Text Domain file header in the main
	 * plugin file.
	 *
	 * @since 1.0.0
	 *
	 * @var   string
	 */
	protected static $plugin_slug = 'appreciators';

	/**
	 * Instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @var   object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		// Activate plugin when new blog is added
		add_action( 'wpmu_new_blog', array( $this, 'activate_new_site' ) );

		// Load public-facing style sheets and scripts.
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_ac_widget_scripts' ) );

		// Display the box.
		add_filter( 'the_content', array( $this, 'display' ), 9999 );

		add_action('wp_head', array( $this, 'hook_css' ),9999 );
	}

	/**
	 * Return the plugin slug.
	 *
	 * @since  1.0.0
	 *
	 * @return Plugin slug variable.
	 */
	public static function get_plugin_slug() {
		return self::$plugin_slug;
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since  1.0.0
	 *
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Fired when the plugin is activated.
	 *
	 * @since  1.0.0
	 *
	 * @param  boolean $network_wide True if WPMU superadmin uses
	 *                               "Network Activate" action, false if
	 *                               WPMU is disabled or plugin is
	 *                               activated on an individual blog.
	 *
	 * @return void
	 */
	public static function activate( $network_wide ) {

    /*$settings = get_option( 'appreciators_settings' );

    if($settings === NULL || $settings['display'] === NULL)
        $settings = reset_settings();

		if ( function_exists( 'is_multisite' ) && is_multisite() ) {

			if ( $network_wide ) {

				// Get all blog ids
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) {

					switch_to_blog( $blog_id );
					self::single_activate();
				}

				restore_current_blog();

			} else {
				self::single_activate();
			}

		} else {
			self::single_activate();
		}*/

	}

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @since  1.0.0
	 *
	 * @param  boolean $network_wide True if WPMU superadmin uses
	 *                               "Network Deactivate" action, false if
	 *                               WPMU is disabled or plugin is
	 *                               deactivated on an individual blog.
	 *
	 * @return void
	 */
	public static function deactivate( $network_wide ) {

		if ( function_exists( 'is_multisite' ) && is_multisite() ) {

			if ( $network_wide ) {

				// Get all blog ids
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) {

					switch_to_blog( $blog_id );
					self::single_deactivate();

				}

				restore_current_blog();

			} else {
				self::single_deactivate();
			}

		} else {
			self::single_deactivate();
		}

	}

	/**
	 * Fired when a new site is activated with a WPMU environment.
	 *
	 * @since  1.0.0
	 *
	 * @param  int  $blog_id ID of the new blog.
	 *
	 * @return void
	 */
	public function activate_new_site( $blog_id ) {

		if ( 1 !== did_action( 'wpmu_new_blog' ) ) {
			return;
		}

		switch_to_blog( $blog_id );
		self::single_activate();
		restore_current_blog();
	}

	/**
	 * Get all blog ids of blogs in the current network that are:
	 * - not archived
	 * - not spam
	 * - not deleted
	 *
	 * @since  1.0.0
	 *
	 * @return array|false The blog ids, false if no matches.
	 */
	private static function get_blog_ids() {

		global $wpdb;

		// get an array of blog ids
		$sql = "SELECT blog_id FROM $wpdb->blogs
			WHERE archived = '0' AND spam = '0'
			AND deleted = '0'";

		return $wpdb->get_col( $sql );
	}

	/**
	 * Fired for each blog when the plugin is activated.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	private static function single_activate() {
		reset_settings();
	}

	/**
	 * Fired for each blog when the plugin is deactivated.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	private static function single_deactivate() {
		//delete_option( 'appreciators_settings' );
	}

    private static function reset_settings() {
		$options = array(
			'display' => 'posts',
			'author_links' => 'users_set',
			'nofollow_author_links' => 'follow',
			'link_target' => '_top',
			'gravatar' => 100,
			'author_name_font_size' => 48,
			'author_name_line_height' => 48,
			'author_name_font' => '\'Open Sans\', sans-serif',
			'author_name_font_weight' => '600',
			'author_name_capitalization' => 'uppercase',
			'author_name_decoration' => 'none',
			'author_byline_font_size' => '15',
			'author_byline_line_height' => '21',
			'author_byline_font' => '\'Open Sans\', sans-serif',
			'author_byline_font_weight' => '700',
			'author_byline_capitalization' => 'uppercase',
			'author_byline_decoration' => 'underline',
			'author_biography_font_size' => '12',
			'author_biography_line_height' => '17',
			'author_biography_font' => '\'Open Sans\', sans-serif',
			'author_biography_font_weight' => '400',
			'separator' => 'at',
			'background_color' => '#333333',
			'highlight_color' => '#0088cc',
			'text_color' => '#ffffff',
			'byline_color' => '#777777',
			'border_top_size' => 20,
			'border_right_size' => 0,
			'border_bottom_size' => 20,
			'border_left_size' => 0,
			'border_style' => 'solid',
			'border_color' => '#444444',
			'mobile_avatar_display' => 'hide',
			'user_roles_access' => 'contributors',
			'icon_size' => 48,
			'icon_spacing' => 2,
			'icon_hover_effect' => 'fade',
			'icon_position' => 'top',
			'pick_icon_set' => 'flat-circle'
		);

		add_option( 'appreciators_settings', $options );

        return $options;
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function load_plugin_textdomain() {
		$domain = self::get_plugin_slug();
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

        load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
        load_plugin_textdomain( $domain, FALSE, basename( plugin_dir_path( dirname( __FILE__ ) ) ) . '/languages/' );
	}

    /**
	 * Register and enqueue scripts.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function enqueue_ac_widget_scripts() {

        if(APP_ENV == 'dev')
            $appWebURL = 'https://dev.appreciators.org';
        else if(APP_ENV == 'stage')
            $appWebURL = 'https://appreciators.org:8444';
        else
            $appWebURL = 'https://appreciators.org';

            wp_enqueue_script(
				'env',
				$appWebURL . '/env.js',
				array( ),
				null,
				true
			);

            wp_enqueue_style('appreciators-styles', $appWebURL . '/Widgets/css/appreciators.css', array(), self::VERSION, 'all' );
            wp_enqueue_script('appreciators-client', $appWebURL . '/Widgets/js/appreciators-client.js', array('env'), '1.1', true);
	}

	/**
	 * Checks if can display the box.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $settings Appreciators WP Plugin settings.
	 *
	 * @return bool
	 */
	protected function is_display( $settings ) {
    
		switch( $settings['display'] ) {
			case 'posts':
				return is_single() && 'post' == get_post_type();
				break;
			case 'home_posts':
				return is_single() && 'post' == get_post_type() || is_home();
				break;

			default:
				return false;
				break;
		}
	}

	/**
	 * HTML of the box.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $settings Appreciators WP Plugin settings.
	 *
	 * @return string          Appreciators WP Plugin HTML.
	 */
	public static function view( $settings ) {

		// Load the styles.
		//wp_enqueue_style( self::get_plugin_slug() . '-styles' );

		// Set the gravatar size.
		$gravatar = ! empty( $settings['gravatar'] ) ? $settings['gravatar'] : 70;

		if ( function_exists( 'get_coauthors' ) && count( get_coauthors( get_the_id() ) ) > 1 ){
            return "Multiple authors not supported!";

		}
        else{

			global $authordata;
			global $post;
			
            $author_bio_avatar_size = apply_filters( 'twentyfifteen_author_bio_avatar_size', 80 );

            $html = "<hr /><div class='post-author'><h3>Author</h3><div class='post-author-appeal'><div class='post-author-img hide-xs'>";
            $html .= get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );		                   
            $html .= "</div><div class='post-appreciation'><div class='appreciation2' author-id='";
			$html .= $authordata->ID;
			$html .= "' content-id='";
			$html .= $post->ID;
			$html .= "' style='width:100%; margin-right:-10px;'></div></div></div><div class='post-author-details mt-15-xs'><h5 class='author-title'>";
            $html .=  "<a class='author-link' href=";
            $html .= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); 
            $html .= " rel='author'>";
            $html .= $authordata->nickname;
            $html .= '</a></h5><p class="author-bio">';
            $html .=  $authordata->description; 
            $html .= "</p></div></div><div class='author-info'></div>";

		return $html;
		}
	}
	
    /**
	 * Insert the box in the content.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $content WP the content.
	 *
	 * @return string          WP the content with Appreciators WP Plugin.
	 */
	public function display( $content ) {

		// Get the settings.
		$settings = get_option( 'appreciators_settings' );

        if($settings === NULL || $settings['display'] === NULL)
            $settings = Appreciators::reset_settings();

		if ( $this->is_display( $settings ) ) {
			return $content . self::view( $settings );
		}

		return $content;
	}
}
