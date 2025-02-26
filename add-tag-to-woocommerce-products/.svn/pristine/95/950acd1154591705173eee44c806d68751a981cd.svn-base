<?php



/**

 * The admin-specific functionality of the plugin.

 *

 * @since      1.0.0

 *

 * @package    wc_tag_on_products

 * @subpackage wc_tag_on_products/admin

 */



/**

 * The admin-specific functionality of the plugin.

 *

 * Defines the plugin name, version, and two examples hooks for how to

 * enqueue the admin-specific stylesheet and JavaScript.

 *

 * @package    wc_tag_on_products

 * @subpackage wc_tag_on_products/admin

 * @author     Junaid <junaidali.it@gmail.com>

 */

class Wc_Tag_On_Products_Admin {



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

	 * Register the JavaScript for the admin area.

	 *

	 * @since    1.0.0

	 */

	public function enqueue_scripts() {



		/**

		 * This function is provided for demonstration purposes only.

		 *

		 * An instance of this class should be passed to the run() function

		 * defined in Wc_Tag_Product_Loader as all of the hooks are defined

		 * in that particular class.

		 *

		 * The Wc_Tag_Product_Loader will then create the relationship

		 * between the defined hooks and the functions defined in this

		 * class.

		 */



		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/adhoc-calculator-admin.js', array( 'jquery' ), $this->version, false );



	}





public function add_plugin_admin_menu() {



    /*

     * Add a settings page for this plugin to the Settings menu.

     *

     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.

     *

     *        Administration Menus: http://codex.wordpress.org/Administration_Menus

     *

     */

add_options_page( 'Tag Products Woocommerce', 'Tag Products Woocommerce', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')

    );

}



 /**

 * Add settings action link to the plugins page.

 *

 * @since    1.0.0

 */

 

public function add_action_links( $links ) {

    /*

    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)

    */

   $settings_link = array(

    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',

   );

   return array_merge(  $settings_link, $links );



}



/**

 * Render the settings page for this plugin.

 *

 * @since    1.0.0

 */

 

public function display_plugin_setup_page() {

    include_once( 'display_setting_page.php' );

}


public function wpse10500_admin_action()
{
    


    if(isset($_POST['tag_txt'])){
    	$postTxt = sanitize_text_field($_POST['tag_txt']);
    }



    if(isset($_POST['number_of_days'])){
    	$number_of_days = intval($_POST['number_of_days']);
    }

 		global $wpdb;
        $table_name = $wpdb->prefix . 'wctag_products';

        $wpdb->update(
            $table_name,
            array(
                'tag_txt' => $postTxt,
                'number_of_days' => $number_of_days

            ),
            array( 'id' => 1 )
        );




    wp_redirect( $_SERVER['HTTP_REFERER'] );
    exit();
}




}

