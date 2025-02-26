<?php
/*
* Shortcode generator.
*/
class Addons_Espania_Shortcode_Generator {

 	function __construct() {	
	
		// Register the necessary actions on `admin_init`.
		add_action( 'admin_head', array( &$this, 'init' ) );

	} 
	
	/*
	* Init methods for tinyMCE editor.
	*/
	function init() {
		if ( ( current_user_can( 'edit_posts' ) || current_user_can( 'edit_pages' ) ) && get_user_option( 'rich_editing') == 'true' )  {
		
		  	// Add the tinyMCE buttons and plugins.
			add_filter( 'mce_buttons', array( &$this, 'filter_mce_buttons' ) );
			add_filter( 'mce_external_plugins', array( &$this, 'filter_mce_external_plugins' ) );
			
			// Register the custom CSS styles.
			wp_register_style( 'addons_espania-shortcode-generator', $this->framework_url() . 'css/shortcode-generator.css' );
			wp_enqueue_style( 'addons_espania-shortcode-generator' );
		} 
	}
	
	/*
	* Add new button to the tinyMCE editor.
	*/
	function filter_mce_buttons( $buttons ) {
		
		array_push( $buttons, 'addons_espania_shortcodes_button' );
		
		return $buttons;
		
	} 

	/*
	* Add functionality to the tinyMCE editor as an external plugin.
	*/
	function filter_mce_external_plugins( $plugin_array ) {
		
		$plugin_array['addons_espania_shortcodes_button'] = $this->framework_url() . 'editor_plugin.js';
		
		return $plugin_array;
		
	} 
	
	/*
	* Get url of curreny dir
	*/
	function framework_url() {	
		return trailingslashit( plugin_dir_url( __FILE__ ) . '/' );
	} 

} 

/*
* INSTANTIATE CLASS
*/
$Addons_Espania_Shortcode_Generator = new Addons_Espania_Shortcode_Generator();

?>