<?php
/*
Plugin Name: The artifakt Hashtag Plugin
Plugin URI: http://www.artifakt.ca
Description: The artifakt Team's custom Hashtag WordPress plugin allows you to use hashtags in your posts that become searchable throughout your website.
Author: The artifakt Team
Author URI: http://www.artifakt.ca
Version: 2.5
*/
class artifaktHashtags {
	/*--------------------------------------------*
	 * Constants
	 *--------------------------------------------*/
	const name = 'artifakt Hashtags';
	const slug = 'artifakt_hashtags';
	/**
	 * Constructor
	 */
	function __construct() {
		//register an activation hook for the plugin
		register_activation_hook( __FILE__, array( &$this, 'install_artifakt_hashtags' ) );
		register_activation_hook( __FILE__, array( &$this, 'install_artifakt_hashtags' ) );
		//Hook up to the init action
		add_action( 'init', array( &$this, 'init_artifakt_hashtags' ) );
		add_action( 'init', array( &$this, 'register_taxonomy_hashtags') );
        	$this->wp_rewrite = & $GLOBALS["wp_rewrite"];
	}
  
	function register_taxonomy_hashtags() {
    		$labels = array( 
        	'name' => _x( 'Hashtags', 'hashtags' ),
        	'singular_name' => _x( 'Hashtag', 'hashtags' ),
        	'search_items' => _x( 'Search Hashtags', 'hashtags' ),
        	'popular_items' => _x( 'Popular Hashtags', 'hashtags' ),
        	'all_items' => _x( 'All Hashtags', 'hashtags' ),
        	'parent_item' => _x( 'Parent Hashtag', 'hashtags' ),
        	'parent_item_colon' => _x( 'Parent Hashtag:', 'hashtags' ),
        	'edit_item' => _x( 'Edit Hashtag', 'hashtags' ),
        	'update_item' => _x( 'Update Hashtag', 'hashtags' ),
        	'add_new_item' => _x( 'Add New Hashtag', 'hashtags' ),
        	'new_item_name' => _x( 'New Hashtag', 'hashtags' ),
        	'separate_items_with_commas' => _x( 'Separate hashtags with commas', 'hashtags' ),
        	'add_or_remove_items' => _x( 'Add or remove Hashtags', 'hashtags' ),
        	'choose_from_most_used' => _x( 'Choose from most used Hashtags', 'hashtags' ),
        	'menu_name' => _x( 'Hashtags', 'hashtags' ),
    		);
    		$args = array( 
        	'labels' => $labels,
        	'public' => true,
        	'show_in_nav_menus' => true,
        	'show_ui' => true,
        	'show_tagcloud' => true,
        	'show_admin_column' => false,
        	'hierarchical' => false,
        	'rewrite' => true,
        	'query_var' => true
    		);
    		register_taxonomy( 'hashtags', array('post'), $args );
	}
	/**
	 * Runs when the plugin is activated
	 */ 
	function install_artifakt_hashtags() {
		$this->register_taxonomy_hashtags();
		$this->wp_rewrite->flush_rules();
	}
	
	/**
	 * Runs when the plugin is initialized
	 */
	function init_artifakt_hashtags() {
		add_action( 'save_post', array( &$this, 'af_set_hashtags' ) );
		add_filter( 'the_content', array( &$this, 'hashtag_content_filter' ) );    
		add_filter( 'comment_text', array( &$this, 'hashtag_comment_filter' ) );    
	}

	function af_set_hashtags($post_id) {
		// If this is a revision, get real post ID
		if ( $parent_id = wp_is_post_revision( $post_id ) ) 
			$post_id = $parent_id;
	
			$thepost = get_post($post_id);
			$content = $thepost->post_content;

			if ( preg_match_all('/#([\p{L}\p{Mn}]+)/u',$content,$matches) ) {
        			foreach( $matches[1] as $hashtag ) {
        				$hash_array[] = str_replace("#", "", $hashtag);
				}
				$hash_string = implode(", ", $hash_array);
				wp_set_post_terms( $post_id, $hash_string, 'hashtags' );	
        		}
	}

	function hashtag_content_filter($content) {
		if ( preg_match_all('/#([\p{L}\p{Mn}]+)/u',$content,$matches) ) {
			foreach( $matches[1] as $hashtag ) {
				$term = term_exists( $hashtag, 'hashtags');
				if ( $term !== 0 && $term !== null ) {
					$hashTerm = get_term_by('name', $hashtag, 'hashtags');
					$hashLink = get_term_link( $hashTerm, 'hashtags');
					$content = str_replace('#'.$hashtag, '<a href="'.esc_url( $hashLink ).'">#'.$hashtag.'</a>',$content);
				}
			}
		}
		return $content;
	}
	function hashtag_comment_filter($comment_text) {
		if ( preg_match_all('/#([\p{L}\p{Mn}]+)/u',$comment_text,$matches) ) {
			foreach( $matches[1] as $hashtag ) {
				$term = term_exists( $hashtag, 'hashtags');
				if ( $term !== 0 && $term !== null ) {
					$hashTerm = get_term_by('name', $hashtag, 'hashtags');
					$hashLink = get_term_link( $hashTerm, 'hashtags');
					$comment_text = str_replace('#'.$hashtag, '<a href="'.esc_url( $hashLink ).'">#'.$hashtag.'</a>',$comment_text);
				}
			}
		}
		return $comment_text;
	}

} // end class
new artifaktHashtags();
?>
