<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://rovidx.com
 * @since      1.0.0
 *
 * @package    Wp_Smart_Tv
 * @subpackage Wp_Smart_Tv/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Smart_Tv
 * @subpackage Wp_Smart_Tv/public
 * @author     Rovidx Media <plugins@rovidx.com>
 */
class Wp_Smart_Tv_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
        add_action( 'init', array($this,'register_mpt'));
        
        
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Smart_Tv_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Smart_Tv_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-smart-tv-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-smart-tv-public.js', array( 'jquery' ), $this->version, false );
	}
    
    public function register_mpt() {
        $options = get_option('rovidx_smart_tv_options');

        /**
         * Post Type: Movies.
         */

        $labels = array(
            "name" => __( 'Movies', 'wp-smart-tv' ),
            "singular_name" => __( 'Movie', 'wp-smart-tv' ),
            "menu_name" => __( 'My Movies', 'wp-smart-tv' ),
        );

        $args = array(
            "label" => __( 'Movies', 'wp-smart-tv' ),
            "labels" => $labels,
            "menu_icon" => plugins_url('../assets/img/rovidx-smart-tv-for-wordpress-movies.icon.png', __FILE__),
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => false,
            "rest_base" => "",
            "has_archive" => true,
            "show_in_menu" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "movies", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail", "custom-fields" ),
            "taxonomies" => array( "post_tag" ),
        );

        if (isset($options['rovidx_smart_tv_movie_post_type_enabled'])) {

            register_post_type( "movies", $args );
        }
        /**
         * Post Type: Videos.
         */

        $labels = array(
            "name" => __( 'Videos', 'wp-smart-tv' ),
            "singular_name" => __( 'Video', 'wp-smart-tv' ),
            "menu_name" => __( 'My Videos', 'wp-smart-tv' ),
        );

        $args = array(
            "label" => __( 'Videos', 'wp-smart-tv' ),
            "labels" => $labels,
            "menu_icon" => plugins_url('../assets/img/rovidx-smart-tv-for-wordpress-shortform-video.icon.png', __FILE__),
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => false,
            "rest_base" => "",
            "has_archive" => true,
            "show_in_menu" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "videos", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail"  ),
            "taxonomies" => array( "post_tag" ),
        );
        if (isset($options['rovidx_smart_tv_shortform_video_post_type_enabled'])) {
            register_post_type( "videos", $args );
        }
        $labels = array(
            "name" => __( 'Episodes', 'wp-smart-tv' ),
            "singular_name" => __( 'Episode', 'wp-smart-tv' ),
            "menu_name" => __( 'My Episodes', 'wp-smart-tv' ),
        );

        $args = array(
            "label" => __( 'Episodes', 'wp-smart-tv' ),
            "labels" => $labels,
            "menu_icon" => plugins_url('../assets/img/rovidx-smart-tv-for-wordpress-episodes.icon.png', __FILE__),
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => false,
            "rest_base" => "",
            "has_archive" => true,
            "show_in_menu" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "episodes", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail"  ),
        );
    if (isset($options['rovidx_smart_tv_series_post_type_enabled'])) {
        register_post_type( "episodes", $args );	
    }
        /**
         * Post Type: Series.
         */

        $labels = array(
            "name" => __( 'Series', 'wp-smart-tv' ),
            "singular_name" => __( 'Series', 'wp-smart-tv' ),
            "menu_name" => __( 'My Series', 'wp-smart-tv' ),
        );

        $args = array(
            "label" => __( 'Series', 'wp-smart-tv' ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => false,
            "rest_base" => "",
            "has_archive" => true,
            "show_in_menu" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "series", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "custom-fields" ),
            "taxonomies" => array( "post_tag" ),
        );
    if (isset($options['rovidx_smart_tv_series_post_type_enabled'])) {
        register_post_type( "series", $args );
    }

    $labels = array(
            "name" => __( 'TV Specials', 'wp-smart-tv' ),
            "singular_name" => __( 'Special', 'wp-smart-tv' ),
            "menu_name" => __( 'My TV Specials', 'wp-smart-tv' ),
        );

        $args = array(
            "label" => __( 'TV Specials', 'wp-smart-tv' ),
            "labels" => $labels,
            "menu_icon" => plugins_url('../assets/img/tv-icon.png', __FILE__),
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => false,
            "rest_base" => "",
            "has_archive" => true,
            "show_in_menu" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "specials", "with_front" => true ),
            "query_var" => true,
            "supports" => array( "title", "editor", "thumbnail" ),
            "taxonomies" => array( "post_tag" ),
        );

        if (isset($options['rovidx_smart_tv_tvspecials_post_type_enabled'])) {
            register_post_type( "specials", $args );
        }

    }
    
    public function build_roku_dp() {
        $roku_dp = new Wp_Smart_Tv_Roku_DP();
        $ajax_setup = new Wp_Smart_Tv_import_ajax();
    }
}
