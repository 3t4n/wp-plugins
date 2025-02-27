<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.wpconcierges.com/plugins/lk-insight/
 * @since      1.0.0
 *
 * @package    LkInsight
 * @subpackage LkInsight/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    LkInsight
 * @subpackage LkInsight/public
 * @author     WpConcierges <support@wpconcierges.com>
 */
class LkInsight_Public {

  /**
	 * The plugin options.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$options    The plugin options.
	 */
	private $options;

 
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
    	$this->set_options();
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

				//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/lkinsight-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/lkinsight-public.js', array( 'jquery' ), $this->version, false );

	}
	
	public function lkinsight_wp_head()
{
  
    	if ( empty( $this->options['lkinsight-tag-id'] ) ) { return; }	
    
       $lkinsight_tag_id = $this->options['lkinsight-tag-id'];
    if ( isset( $lkinsight_tag_id ) && strlen($lkinsight_tag_id)>3 ) {
        ob_start();
				include lkinsight_get_template( 'lkinsight-public-tag' );
				$lktag_base = ob_get_contents();
				ob_end_clean();
        echo  $lktag_base . "\n" ;
    }

}

	public function lkinsight_woo_thankyou()
{
  
    	if ( empty( $this->options['lkinsight-tag-id'] ) ) { return; }	
    
       $lkinsight_conversion= $this->options['lkinsight-conversion'];
    if ( isset( $lkinsight_conversion ) && strlen($lkinsight_conversion)>3 ) {
        echo  $lkinsight_conversion . "\n" ; 
    }

}

	public function lkinsight_woo_add_to_cart()
{
  
    	if ( empty( $this->options['lkinsight-tag-id'] ) ) { return; }	
    
       $lkinsight_add_to_cart = $this->options['lkinsight-add-to-cart'];
    if ( isset( $lkinsight_add_to_cart ) && strlen($lkinsight_add_to_cart)>3 ) {
        echo  $lkinsight_add_to_cart . "\n" ;
    }

}

	public function lkinsight_woo_before_checkout()
{
  
    	if ( empty( $this->options['lkinsight-tag-id'] ) ) { return; }	
    
       $lkinsight_begin_checkout = $this->options['lkinsight-begin-checkout'];
    if ( isset( $lkinsight_begin_checkout ) && strlen($lkinsight_begin_checkout)>3 ) {
        echo  $lkinsight_begin_checkout . "\n" ;
    }

}

 public function lkinsight_contact7_submission(){
 	 if ( empty( $this->options['lkinsight-tag-id'] ) ) { return; }	
    
       $lkinsight_contact7_submission = $this->options['lkinsight-contact7-submission'];
    if ( isset( $lkinsight_contact7_submission ) && strlen($lkinsight_contact7_submission)>3 ) {
        echo  $lkinsight_contact7_submission . "\n" ;
    }
}

  public function lkinsight_ninja_submission(){
 	 if ( empty( $this->options['lkinsight-tag-id'] ) ) { return; }	
    
       $lkinsight_ninja_submission = $this->options['lkinsight-ninja-submission'];
    if ( isset( $lkinsight_ninja_submission ) && strlen($lkinsight_ninja_submission)>3 ) {
        echo  $lkinsight_ninja_submission . "\n" ;
    }
}
  /**
	 * Sets the class variable $options
	 */
	private function set_options() {

		$this->options = get_option( $this->plugin_name . '-options' );

	} // set_options()

}
