<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://bitbucket.org/luchomatic
 * @since      1.0.0
 *
 * @package    Anchor_Highlighter
 * @subpackage Anchor_Highlighter/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Anchor_Highlighter
 * @subpackage Anchor_Highlighter/public
 * @author     Luciano Castro <luciano.castro@outlook.com>
 */
class Anchor_Highlighter_Public {

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
		$this->anchor_options = get_option($this->plugin_name);

	}

	// Add post/page slug
	public function anchor_highlight_body_class_slug( $classes ) {
		if(!empty($this->anchor_options['body_class_slug'])){
			global $post;
			if(is_singular()){
				$classes[] = $post->post_name;
			}
		}
		return $classes;
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
		 * defined in Anchor_Highlighter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Anchor_Highlighter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/anchor-highlighter-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Anchor_Highlighter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Anchor_Highlighter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/anchor-highlighter-public.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script('myjs', plugins_url( 'js/my.js', __FILE__) );
        $options = get_option( $this->plugin_name );
        $scriptData = array(
            'activated' => $options['activated'],
        );
        wp_localize_script('myjs', 'my_options', $scriptData);
    }

}
