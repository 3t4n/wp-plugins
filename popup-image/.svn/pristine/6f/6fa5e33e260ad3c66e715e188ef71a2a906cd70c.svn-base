<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       fb.com/hussam7ussien
 * @since      1.0.0
 *
 * @package    Popup_image
 * @subpackage Popup_image/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Popup_image
 * @subpackage Popup_image/public
 * @author     Hussam Hussien <hussam7ussien@gmail.com>
 */
class Popup_image_Public {

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

	private $done;
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
		$this->done = false;
		add_shortcode('Popup', array($this, 'shortcode'));

	}

    public function shortcode($atts)
    {

    	$atts =shortcode_atts(array(
	        'src' => 'https://uos.edu.pk/assets/backend/images/staff/imagenotfound.svg',
	        'alt' => 'notfound',
	        'width'=>'300',
	        'height'=>'200',
	    ), $atts);


    	$output='<!-- Trigger the Modal -->
				<img class="myImg" src="'.$atts['src'].'" alt="'.$atts['alt'].'" width="'.$atts['width'].'" height="'.$atts['height'].'">';

    	if(!$this->done){
	    $output.='	<!-- The Modal -->
					<div id="myModal" class="modal">

					  <!-- The Close Button -->
					  <span class="close" onclick="document.getElementById(\'myModal\').style.display=\'none\'">&times;</span>

					  <!-- Modal Content (The Image) -->
					  <img class="modal-content" id="img01">

					  <!-- Modal Caption (Image Text) -->
					  <div id="caption"></div>
					</div>';
		$this->done=true;
		}
		return $output;
    }



    public function generateRandomString($length = 10) {
	    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
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
		 * defined in Popup_image_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Popup_image_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/popup_image-public.css', array(), $this->version, 'all' );

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
		 * defined in Popup_image_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Popup_image_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


	  //   wp_register_script( 'bootstrap-js', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), NULL, true );
	  //   wp_register_style( 'bootstrap-css', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', false, NULL, 'all' );
	 	
	 	// wp_enqueue_script('jquery');
	  //   wp_enqueue_script( 'bootstrap-js' );
	  //   wp_enqueue_style( 'bootstrap-css' );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/popup_image-public.js', array( 'jquery' ), $this->version, false );

	}

}
