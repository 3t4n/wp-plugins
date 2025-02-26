<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://hikeorders.com/accessibility_enabler/home/
 * @since      1.0.0
 *
 * @package    A11y_Enabler
 * @subpackage A11y_Enabler/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    A11y_Enabler
 * @subpackage A11y_Enabler/public
 * @author     Your Name <email@example.com>
 */
class A11y_Enabler_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $A11y_Enabler    The ID of this plugin.
	 */
	private $A11y_Enabler;

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
	 * @param      string    $A11y_Enabler       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $A11y_Enabler, $version ) {

		$this->A11y_Enabler = $A11y_Enabler;
		$this->version = $version;

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
		 * defined in A11y_Enabler_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The A11y_Enabler_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->A11y_Enabler, plugin_dir_url( __FILE__ ) . 'css/a11y-enabler-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function add_script() {

        $options = get_option($this->A11y_Enabler,'');
        if(is_array($options)) {
            $orgId = trim($options['a11y_enabler_orgId']);


            if($orgId != null) {
                $scriptUrl = "https://jsappcdn.hikeorders.com/main/assets/js/hko-accessibility.min.js?orgId=".$orgId;

                wp_enqueue_script(
                    $this->A11y_Enabler,
                    $scriptUrl,
                    array(),
                    null,
                    false
                );
            }
        }







	}

	public function add_async($tag, $handle){
        if ( 'a11y-enabler' !== $handle )
            return $tag;
        return str_replace( ' src', ' async="async" src', $tag );
    }




}
