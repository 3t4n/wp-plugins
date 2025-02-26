<?php
/**
 * Plugin Name: Author Role List
 * Description: A plugin to show author details as per their role.
 * Version: 1.0.0
 * Author: Roopesh
 * Tested up to: 5.2.2
 *
 * Text Domain: authorlist
 *
 * @package AuthorList.
 * @category Core
 * @author Roopesh
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* added .mo file for translation  */
$locale = get_locale();

load_textdomain( 'author_list', plugin_dir_path( __FILE__ ).'languages/'.$locale.'.mo' );

register_activation_hook(__FILE__, 'author_list_activate');
/* while activation save variable to show activation message  */
function author_list_activate() {
    add_option( 'author_list_activate_msg', 'y' );
}

/* This function display admin notice to activate author-list plugin, if they first activated */
add_action('admin_notices','author_list_admin_notices',99);

function author_list_admin_notices(){
	if ( 'y' == get_option( 'author_list_activate_msg' ) ) {
		echo '<div class="updated"><p>'. wp_kses_post( __( 'Author - List plugin is activated successfully. You can view the author list from Add New Page by adding the shortcode <code> [author-list role=administrator post_type=post,page number=1 orderby=email order=ASC] </code>  from backend.', 'author_list' ) ) . '</p></div>';
		delete_option( 'author_list_activate_msg' );
	}
}

/**
 * Class to show author list.
 */
class authorList {
	
	/**
	 * Call default construtor.
	 */
	function __construct() {
		
		/**
		 * Action to call author shortcode.
		 */
		add_action('init', array( $this, 'authorlist_shortcodes_init' ) );

	}
	
	/**
	 * Add author list shortcode.
	 */
	public function authorlist_shortcodes_init() {
		
		add_shortcode('author-list', array( $this, 'list_author_shortcode' ) );
	
	}
	
	/**
	 * List all user as per their role.
	 *
	 * @param array $atts
	 * @return string
	 */
	public function list_author_shortcode( $atts ) {
		
		$atts = shortcode_atts( array(
				'role'		=> 'Administrator',
				'number'	=> 5,
				'post_type'	=> 'post',
				'orderby'	=> 'post_count',
				'order'		=> 'DESC',
			), $atts, 'list_author_shortcode' );
	 
		$current_page = max( 1, get_query_var('paged') );
		$offset = ($current_page - 1) * $atts[ 'number' ];
		
		if ( false !== strpos($atts[ 'post_type' ], ',') ) {
			$atts[ 'post_type' ] = explode(',', $atts[ 'post_type' ] );
		}
		
		// get users list.
		$args = array(
			'has_published_posts' 	=> $atts[ 'post_type' ],
			'role'					=> $atts[ 'role' ],
			'orderby'				=> $atts[ 'orderby' ],
			'order'					=> $atts[ 'order' ],
			'number'				=> $atts[ 'number' ],
			'offset'				=> $offset,
		);
	 
		// The Query
		$user_query = new WP_User_Query( $args );
		$user_count = $user_query->total_users;

		global $author_list_user, $total_pages;
		
		// count the number of users found in the query
		$total_users = $user_count ? $user_count : 1;
		
		$total_pages = 1;
		
		$total_pages = ceil( $total_users / $atts[ 'number' ]);

		// User Loop
		if ( ! empty( $user_query->results ) ) {
			foreach ( $user_query->results as $author_list_user ) {
				// Call author template.
				author_list_get_template_part( 'author-bio' );
			}
			// Call to pagination tempalte.
			author_list_get_template_part( 'pagination' );
		} else {
			echo __( 'No users found.', 'author_list' );
		}
	}
}
 
/**
 * Get template part.
 *
 *
 * @access public
 * @param string $name (default: '')
 */
function author_list_get_template_part( $name = '' ) {
	$template = '';
	
	// If template file doesn't exist, look in yourtheme/author-bio.php
	if ( $name ) {
		$template = locate_template( array( "{$name}.php", "author-list/{$name}.php" ) );
	}
	
	// Get default name.php
	if ( ! $template && $name && file_exists( plugin_dir_path( __FILE__ ) . "author-list/{$name}.php" ) ) {
		$template = plugin_dir_path( __FILE__ ) . "author-list/{$name}.php";
	}

	// Allow 3rd party plugins to filter template file from their plugin.
	$template = apply_filters( 'author_list_get_template_part', $template, $name );

	if ( $template ) {
		load_template( $template, false );
	}
} 

$authorList = new authorList(); // go
