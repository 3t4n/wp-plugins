<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.piclaunch.com/
 * @since      1.0.0
 *
 * @package    Ampnonampads
 * @subpackage Ampnonampads/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ampnonampads
 * @subpackage Ampnonampads/public
 * @author     Piclaunch <Piclaunch@gmail.com>
 */
class Ampnonampads_Public {

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
		$this->ampnonampads_options = get_option($this->plugin_name);

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
		 * defined in Ampnonampads_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ampnonampads_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ampnonampads-public.css', array(), $this->version, 'all' );

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
		 * defined in Ampnonampads_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ampnonampads_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ampnonampads-public.js', array( 'jquery' ), $this->version, false );

	}

	//Piclaunch Code Starts
	//Method for POST HEADER Script on AMP AUto Ads
	function amp_post_adLab( $amp_template ) {	
		//Check if Flag show AMP Auto Add is on
	 	if( !empty($this->ampnonampads_options['ANA_showAMPAuto']) ){

$scripts = $amp_template->get( 'amp_component_scripts', array() );
	foreach ( $scripts as $element => $script ) : 
$custom_type = ($element == 'amp-mustache') ? 'template' : 'element';
//echo "<script async custom-element= 'amp-test'>console.log( 'Debug Objects: " .esc_attr( $element ). "' );</script>";
if ( esc_attr( $element ) == 'amp-iframe'){
//echo "<script async custom-element= 'amp-test'>console.log( 'Debug Objects: " .esc_attr( $element ). "' );</script>";
}
endforeach; 

		?>
		<script async custom-element="amp-auto-ads" src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js"></script>	
		<?php
		}
		// Flag for AD post content in AMP page 

		 	if( !empty($this->ampnonampads_options['ANA_showAMP']) ){
			?>

		 <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
		<?php
		}		
	}

	function amp_post_adlab_body() {
		//Check if Flag show AMP Auto Add is on
	 	if( !empty($this->ampnonampads_options['ANA_showAMPAuto']) ){

	 		?>
			<amp-auto-ads type="<?php echo $this->ampnonampads_options['ANA_adtype']; ?>" data-ad-client="<?php echo $this->ampnonampads_options['ANA_aclient']; ?>"></amp-auto-ads>
		<?php
	 	}	
	}

	function amp_custom_banner_extension_insert_banner() { 
		// Flag for AD post content in AMP page 
		if( !empty($this->ampnonampads_options['ANA_showAMP']) ){
		?>

	<!-- Front page - 2 (whatsq.com) -->
	<amp-ad width="<?php echo $this->ampnonampads_options['ANA_awidth']; ?>"  height="<?php echo $this->ampnonampads_options['ANA_aheight']; ?>" 
	  type="<?php echo $this->ampnonampads_options['ANA_adtype']; ?>" 
	  data-ad-client="<?php echo $this->ampnonampads_options['ANA_aclient']; ?>"
	  data-ad-slot="<?php echo $this->ampnonampads_options['ANA_aslots']; ?>"
	  data-auto-format="<?php echo $this->ampnonampads_options['ANA_format']; ?>"
	  data-full-width>
	    <div overflow></div>
	</amp-ad>
		<?php
		} 
	}


	//For Auto Non AMP Ads
	function auto_add_nonAMP(){
		if( !empty($this->ampnonampads_options['ANA_showNAMPAuto']) ){
		?>

			<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({
			google_ad_client: "<?php echo $this->ampnonampads_options['ANA_aclient']; ?>",
			enable_page_level_ads: true
			});
			</script>

		<?php
		} 

	}

	//Piclaunch Code Ends

}
