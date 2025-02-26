<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.itpathsolutions.com/
 * @since      1.0.0
 *
 * @package    Advanced_Images_Gallery_With_Lightbox
 * @subpackage Advanced_Images_Gallery_With_Lightbox/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Advanced_Images_Gallery_With_Lightbox
 * @subpackage Advanced_Images_Gallery_With_Lightbox/admin
 * @author     It Path Solutions <shailm@itpathsolutions.com>
 */
class Advanced_Images_Gallery_With_Lightbox_Admin {

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
		 * defined in Advanced_Images_Gallery_With_Lightbox_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Images_Gallery_With_Lightbox_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/advanced-images-gallery-with-lightbox-admin.css', array(), $this->version, 'all' );
		
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
		 * defined in Advanced_Images_Gallery_With_Lightbox_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Images_Gallery_With_Lightbox_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$aigwl_setting_url = get_admin_url() . "edit.php?post_type=aigwl_gallery";
	    global $pagenow;
	
		if ( get_post_type( get_the_ID() ) == 'aigwl_gallery' && ! empty($pagenow) && ('post-new.php' === $pagenow || 'post.php' === $pagenow ) ) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/advanced-images-gallery-with-lightbox-admin.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script('custom', plugin_dir_url( __FILE__ ) . 'js/custom.js', array( 'jquery' ), $this->version, false );
		}
	}

	public function aigwl_metabox() {
	    add_meta_box(
	        'aigwl-gallery-setting',
	        __( 'Advanced Images Gallery With Lightbox Setting', 'sitepoint' ),
	        array($this,'aigwl_gallery_settings'),
	        'aigwl_gallery'
	    );
	}
	
	/**
	 * Create action for the CPT
	 *
	 * @since    1.0.0
	 */
	public function aigwl_gallery_custom_post_type () {

			$supports = array(
			'title', // ERG Gallery Title
			);
			$labels = array(
			'name' => _x('Advanced Images Gallery With Lightbox', 'plural'),
			'singular_name' => _x('Advanced Images Gallery With Lightbox', 'singular'),
			'menu_name' => _x('Advanced Images Gallery With Lightbox', 'admin menu'),
			'name_admin_bar' => _x('Advanced Images Gallery With Lightbox', 'admin bar'),
			'add_new' => _x('Add New Gallery', 'add new'),
			'add_new_item' => __('Add New Gallery'),
			'new_item' => __('New Gallery'),
			'edit_item' => __('Edit Gallery'),
			'view_item' => __('View Gallery'),
			'all_items' => __('All Galleries'),
			'not_found' => __('No Gallery found.'),
			'register_meta_box_cb' => 'aigwl_metabox',
			);
			$args = array(
			'supports' => $supports,
			'labels' => $labels,
			'hierarchical' => false,
			'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
			'publicly_queryable' => false,  // you should be able to query it
			'show_ui' => true,  // you should be able to edit it in wp-admin
			'exclude_from_search' => true,  // you should exclude it from search results
			'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
			'has_archive' => false,  // it shouldn't have archive page
			'rewrite' => false,  // it shouldn't have rewrite rules
			'menu_icon'           => 'dashicons-format-gallery',
			);
			register_post_type('aigwl_gallery', $args);
			
	}

	public function set_custom_edit_aigwl_cpt_columns($columns) {
	    $columns['aigwl_gallery_shortcode'] = __( 'Gallery Shortcode','');
	    return $columns;
	}

	// Adding New Coulmn in CPT 
	public function aigwl_new_coulmn( $column_name, $post_id ) 
	{
	    if ( $column_name == 'aigwl_gallery_shortcode')
	    	$shortcode_name =  get_post_meta($post_id,'aigwl_shortcode_name',true);
	        printf( '<span name="aigwl_shortcode" id="aigwl_shortcode_id" value="'.$shortcode_name.'"/>'.$shortcode_name.'</span>' );

	}
	
	function aigwl_gallery_meta_box_add() {
		add_meta_box('aigwl_gallery_box', // meta box ID
			'More settings', // meta box title
			'aigwl_gallery_print_box', // callback function that prints the meta box HTML 
			'aigwl_gallery', // post type where to add it
			'normal', // priority
			'high' ); // position
	}
	 
	/*
	 * Admin settings page 
	 *
	 * @since    1.0.0
	 */
	public static function aigwl_gallery_settings() {
		
		include dirname(__FILE__).'/partials/advanced-images-gallery-with-lightbox-admin-display.php';
	}

	/**
	 * Update admin settings
	 * 
	 * @since    1.0.0
	 */
	public function aigwl_gallery_update_settings($aigwl_gallery_id,$aigwl_gallery) {
		if ( $aigwl_gallery->post_type == 'aigwl_gallery' ) {
		
			$status = 'false';
			if(isset( $_POST['aigwl_cpt_nonce'] ) &&
				wp_verify_nonce( $_POST['aigwl_cpt_nonce'], 'aigwl_cpt_nonce')	
			):
				$aigwl_object  = new Advanced_Images_Gallery_With_Lightbox();
				$aigwl_options	 = $aigwl_object->aigwl_get_options();  
				
				$aigwl_options['aigwl_display_layout'] = (int)stripslashes($_POST['aigwl_display_layout']);
				$aigwl_options['aigwl_image_hover_effect'] = (int)stripslashes($_POST['aigwl_image_hover_effect']);

				$aigwl_options['aigwl_shortcode_name'] = '[aigwl_gallery gallery_id='.$aigwl_gallery_id.']'; 
				$aigwl_options['aigwl_gallery'] = sanitize_text_field($_POST['aigwl_gallery']);
			
				foreach ( $aigwl_options as $aigwl_options_key => $aigwl_options_value ) {
        				$response = update_post_meta( $aigwl_gallery_id, $aigwl_options_key, $aigwl_options_value );		
    			}
				if($response):
					$status = 'true';		
				
				endif;
			else:
			endif;
		}

	}

	public function aigwl_settings_link( array $links ) {
		$url = get_admin_url() . "edit.php?post_type=aigwl_gallery";
		$settings_link = '<a href="' . $url . '">' . __('Settings', 'text-domain') . '</a>';
		  	$links[] = $settings_link;
		return $links;
	}
}