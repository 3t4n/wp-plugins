<?php



/**

 * The public-facing functionality of the plugin.

 *

 * @since      1.0.0

 *

 * @package    wc_tag_on_products

 * @subpackage wc_tag_on_products/public

 */



/**

 * The public-facing functionality of the plugin.

 *

 * Defines the plugin name, version, and two examples hooks for how to

 * enqueue the admin-specific stylesheet and JavaScript.

 *

 * @package    wc_tag_on_products

 * @subpackage wc_tag_on_products/public

 * @author     Junaid <junaidali.it@gmail.com>

 */

class Wc_Tag_On_Products_Public {



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

        $this->adhoc_calculator_options = get_option($this->plugin_name);

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

		 * defined in Adhoc_Calculator_Loader as all of the hooks are defined

		 * in that particular class.

		 *

		 * The Adhoc_Calculator_Loader will then create the relationship

		 * between the defined hooks and the functions defined in this

		 * class.

		 */



		

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wc-tag-public.css', array(), $this->version, 'all' );




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

		 * defined in Adhoc_Calculator_Loader as all of the hooks are defined

		 * in that particular class.

		 *

		 * The Adhoc_Calculator_Loader will then create the relationship

		 * between the defined hooks and the functions defined in this

		 * class.

		 */



		

		

		

		//wp_enqueue_script( 'angular.min', plugin_dir_url( __FILE__ ) . 'js/angular.min.js', array('jquery'), null, false);



		

		



	}

	

	function add_text_above_wc_shop_image() {

		global $wpdb;
		$table_name = $wpdb->prefix . 'wctag_products';
		$setting = $wpdb->get_row("SELECT * FROM $table_name");

		global $post;

		$postDate = get_the_date('', $post->ID);
		$postDate = date('Y-m-d', strtotime($postDate));

		if(isset($setting->number_of_days)){
			$meetDate = date('Y-m-d', strtotime($postDate. ' + '.$setting->number_of_days.' days'));
			
			$meetDate = strtotime($meetDate);
		}

		$currentDate = date("Y-m-d");
		$currentDate = strtotime($currentDate);
		


		if($meetDate >= $currentDate){
			if(!empty($setting->tag_txt))
		    {
		    	echo '<span class="wcTagcustom">'.esc_html($setting->tag_txt).'</span>';
		    }
		    else{
		       echo '<span class="wcTagcustom">default tag</span>';
		    }
		}
    
}



}

