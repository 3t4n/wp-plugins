<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://peprojects.nl
 * @since      1.0.0
 *
 * @package    Apostle_Social_Wall
 * @subpackage Apostle_Social_Wall/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Apostle_Social_Wall
 * @subpackage Apostle_Social_Wall/admin
 * @author     Door PE Projects <info@peprojects.nl>
 */
class Apostle_Social_Wall_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Apostle_Social_Wall_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Apostle_Social_Wall_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/apostle-social-wall-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Apostle_Social_Wall_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Apostle_Social_Wall_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/apostle-social-wall-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * Register post type .
	 *
	 * @since    1.0.0
	 */
	public function apostle_social_wall_post_type() {
		 register_post_type('social_wall', array(
			'labels' => array(
				'name' => __('Social Wall Feed','apostle-social-wall'),
				'singular_name' => __('Social Wall','apostle-social-wall'),
				'add_new' => __('Add New Feed', 'book', 'apostle-social-wall'),
				'add_new_item' => __('Add New Feed', 'apostle-social-wall'),
				'new_item' => __('New Feed', 'apostle-social-wall'),
				'edit_item' => __('Edit Feed', 'apostle-social-wall'),
				'view_item' => __('View Feed', 'apostle-social-wall'),
				'all_items' => __('All Feeds', 'apostle-social-wall'),
				'search_items' => __('Search Feeds', 'apostle-social-wall'),
				'parent_item_colon' => __('Parent Feeds:', 'apostle-social-wall'),
				'not_found' => __('No Feeds found.', 'apostle-social-wall'),
				'not_found_in_trash' => __('No Feeds found in Trash.', 'apostle-social-wall')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array(
				'slug' => 'social_wall'
			),
			'menu_icon' => "dashicons-rss"
		));
		remove_post_type_support('social_wall', 'editor');
		
	}
	
	/**
	 * Add meta box to 'social_wall' Post Type.
	 *
	 * @since    1.0.0
	 */
	public function apostle_social_wall_meta_boxes(){
		add_meta_box('add-feed-url', __('Add Feed URL', 'apostle-social-wall'), array($this,'apostle_social_wall_url_callback'), 'social_wall');
		add_meta_box('add-short-code', __('Short Code', 'apostle-social-wall'), array($this,'apostle_social_wall_shortcode_callback'), 'social_wall');
	}
	
	public function apostle_social_wall_url_callback($post){
		$feed_url = get_post_meta($post->ID, 'feed_url', true);
		echo 'Enter Feed XML Url : <input name="feed_url" type="text" style="width: 60%;" value="' . $feed_url . '">';
	}
	
	public function apostle_social_wall_shortcode_callback($post){
		echo '<code>[ASW_RSS_Feed ID=' . $post->ID . '] </code>';
	}
	
	
	/**
	 * Add Shortcode in column.
	 *
	 * @since    1.0.0
	 */
	public function apostle_social_wall_columns_head_only($defaults){
		$date = $defaults['date'];
		unset($defaults['date']);
		$defaults['short_code'] = 'Shortcode';
		$defaults['date']       = $date;
		
		return $defaults;
	}
	
	public function apostle_social_wall_columns_content_only($column_name, $post_ID){
		if ($column_name == 'short_code') {
			$feed_url = get_post_meta($post_ID, 'feed_url', true);
			echo '<code>[ASW_RSS_Feed ID=' . $post_ID . '] </code>';
		}
	}
	
	/**
	 * Save meta box data.
	 *
	 * @since    1.0.0
	 */
	public function apostle_social_wall_save_post( $post_id){

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}
		if (!current_user_can('edit_post', $post_id)) {
			return;
		}
		if (isset($_POST['post_type']) && 'social_wall' == $_POST['post_type']) {
			update_post_meta($post_id, 'feed_url', $_POST['feed_url']);
		}
		
	}
}
