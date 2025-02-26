<?php
/**
 * Admin Search Post by ID
 *
 * @package   Admin_Search_Post_By_ID
 * @author    Fernando Mendoza <f.mendoza@outlook.com>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2013 Fernando Mendoza
 */

/**
 * Plugin class.
 *
 * @package Admin_Search_Post_By_ID
 * @author  Fernando Mendoza <f.mendoza@outlook.com>
 */
class Admin_Search_Post_By_ID {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	const VERSION = '1.0.0';

	/**
	 * Unique identifier for your plugin.
	 *
	 * Use this value (not the variable name) as the text domain when internationalizing strings of text. It should
	 * match the Text Domain file header in the main plugin file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'admin-search-post-by-id';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		add_action( 'restrict_manage_posts', array( $this, 'add_input_search' ) );

		add_action( 'manage_posts_custom_column', array( $this, 'show_custom_columns' ), 10, 2 );

		add_filter( 'manage_posts_columns', array( $this, 'custom_columns' ), 10 );

		add_filter( 'posts_where', array( $this, 'filter_by_id' ) );

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance )
			self::$instance = new self;

		return self::$instance;
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		$domain = $this->plugin_slug;
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
		load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages' );
	}

	public function add_input_search() {

        $post_id = '';
        if ( isset( $_GET['post_id'] ) && !empty( $_GET['post_id'] ) && intval( $_GET['post_id'] ) != 0 )
            $post_id = $_GET['post_id'];
        echo ' <label>' . __('Search by ID', 'admin-search-post-by-id') . '</label> <input type="text" name="post_id" value=' . $post_id . '> ';
	}

	public function filter_by_id( $where ) {
		
		if ( is_admin() ) {
        	if ( isset( $_GET['post_id'] ) && !empty( $_GET['post_id'] ) && intval( $_GET['post_id'] ) != 0 ) {
            	$post_id = intval( $_GET['post_id'] );
            	$where .= " AND ID = $post_id";
        	}
    	}
    	return $where;
	}

	public function custom_columns( $columns ) {

		return array_merge( $columns, array('id' => __( 'ID' ) ) );
	}

	public function show_custom_columns( $name, $post_id ) {
	    switch ( $name ) {
	        case 'id':
	            echo $post_id;
	    }
	}
}
