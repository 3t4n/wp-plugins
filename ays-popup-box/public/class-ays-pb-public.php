<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://ays-pro.com/
 * @since      1.0.0
 *
 * @package    Ays_Pb
 * @subpackage Ays_Pb/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ays_Pb
 * @subpackage Ays_Pb/public
 * @author     AYS Pro LLC <info@ays-pro.com>
 */
class Ays_Pb_Public {

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
		 * defined in Ays_Pb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ays_Pb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
        wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.0.13/css/all.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ays-pb-public.css', array(), $this->version, 'all' );

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
		 * defined in Ays_Pb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ays_Pb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ays-pb-public.js', array( 'jquery' ), $this->version, false );
	}

	public function ays_generate_shortcode(){
        //add_shortcode( 'ays-pb', array($this, 'ays_generate_popup') );
    }

    public function ays_set_cookie(){
	    $cookie_name = 'ays_popup_cookie';
	    $cookie_value = 'Lorem Ipsum dollor sit amet.';
        $cookie_expiration =  time() + 300;
        setcookie($cookie_name, $cookie_value, $cookie_expiration, '/');
    }

	public function ays_generate_popup(){
        $options = get_option($this->plugin_name);
        $shortcode = $options['shortcode'];
        $width = $options['width'];
        $height = $options['height'];
        $popup_title = $options['popup_title'];
        $popup_description = $options['popup_description'];

        ?>
        <div id="css-only-modals">
            <input id="modal1" class="css-only-modal-check" type="checkbox" checked/>
            <div class="css-only-modal" style="width: <?php echo $width; ?>px; height: <?php echo $height; ?>px">
                <label for="modal1" class="css-only-modal-close"><i class="fa fa-times fa-2x"></i></label>
                <h2><?php echo $popup_title; ?></h2>
                <p><?php echo $popup_description; ?></p>
                <hr />
                <div>
                    <?php echo do_shortcode($shortcode); ?>
                </div>
                <label for="modal1" class="css-only-modal-btn btn btn-primary btn-lg">Okay</label>
            </div>
            <div id="screen-shade"></div>
        </div>
        <div style="background:red">
        </div>
        <?php
    }

}
