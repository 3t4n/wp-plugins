<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ilook.co.il
 * @since      1.0.0
 *
 * @package    Coupon_Bulker
 * @subpackage Coupon_Bulker/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Coupon_Bulker
 * @subpackage Coupon_Bulker/admin
 * @author     Nir Louk <looknear@gmail.com>
 */
class Coupon_Bulker_Admin {

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
		 * defined in Coupon_Bulker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Coupon_Bulker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/coupon-bulker-admin.css', array(), $this->version, 'all' );

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
		 * defined in Coupon_Bulker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Coupon_Bulker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/coupon-bulker-admin.js', array( 'jquery' ), $this->version, false );

	}
        
    public function add_plugin_admin_ui() {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         */
        add_submenu_page( 'woocommerce-marketing', 'Coupon Bulker Settings', 'Coupon Bulker', 'manage_woocommerce', 'coupon_bulker_settings', array($this, 'display_plugin_setup_page'));
        //add_options_page('Coupon Bulker Settings', 'Coupon Bulker', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
    }
    
    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */
    public function display_plugin_setup_page() {
        include_once( 'partials/coupon-bulker-admin-display.php' );
    }
    
    //add clickable "bulk duplicate" to coupons list
    public function add_actions_to_list($actions, $post){
        /* direct ajax?
        if(get_post_type() === 'shop_coupon'){
            $url = add_query_arg(
                array(
                  'coupon_id' => $post->ID,
                  'my_action' => 'bulk_duplicate_coupon',
                )
              );
            
            //$actions['bulk_coupon_duplicate'] = '<a href="' . esc_url( $url ) . '" target="_blank"    >Bulk Duplicate</a>';
            $actions['bulk_coupon_duplicate'] = '<a href="#" class="coupon_bulk_duplicate" data-id="'.$post->ID.'" >Bulk Duplicate</a>';
        }*/
        
        if(get_post_type() !== 'shop_coupon'){
            return $actions;
        }
        
        //https://rizqy.me/create-modal-box-on-wordpress-dashboard/
        //will call duplicate_model_content
        $url = add_query_arg( array(
            'coupon_id' => $post->ID,
            'action'    => 'modal_duplicate',
            'TB_iframe' => 'true',
            'width'     => '600',
            'height'    => '600'
        ), admin_url( 'admin.php' ) );

        $actions['bulk_coupon_duplicate'] = '<a href="' . $url . '" class="thickbox">' . __( 'Bulk Duplicate', 'coupon-bulker' ) . '</a>';

        
        $delete_url = add_query_arg( array(
            'coupon_id' => $post->ID,
            'action'    => 'modal_delete',
            'TB_iframe' => 'true',
            'width'     => '600',
            'height'    => '600'
        ), admin_url( 'admin.php' ) );

        $actions['bulk_coupon_delete'] = '<a href="' . $delete_url . '" class="thickbox">' . __( 'Bulk Delete', 'coupon-bulker' ) . '</a>';

        
        
        return $actions;
    }
    
    //create the modal of the code duplicator
    public function duplicate_thickbox_content(){
        //print_r($_GET);
        $coupon_id = intval($_GET['coupon_id']);
        if (!$coupon_id){
            echo "Coupon ID not detected. reload and try again.";
            wp_die();
        }
        $duplicated_coupon = new WC_Coupon($coupon_id);
        $coupon_code = $duplicated_coupon->get_code();

        //no need for thickbox? define( 'IFRAME_REQUEST', true );
        iframe_header();
        include_once( 'partials/coupon-bulker-duplicate-modal.php' );
        iframe_footer();
        exit;
    }
    
    //create the modal of the code duplicator
    public function delete_thickbox_content(){
        //print_r($_GET);
        $coupon_id = intval($_GET['coupon_id']);//not user input
        if (!$coupon_id){
            echo "Coupon ID not detected. reload and try again.";
            wp_die();
        }
        $duplicated_coupon = new WC_Coupon($coupon_id);

        //no need for thickbox? define( 'IFRAME_REQUEST', true );
        iframe_header();
        include_once( 'partials/coupon-bulker-delete-modal.php' );
        iframe_footer();
        exit;
    }
    
    //generate the coupons
    public function coupon_bulker_ajax_endpoint(){
        global $wpdb; // this is how you get access to the database

        //not user input, but lets clean it
        $func = sanitize_text_field($_POST['fn']);
        //will verify on switch 
        
        //user input. clean spaces.
        $code_prefix = sanitize_text_field(preg_replace('/\s+/', '', $_POST['code_prefix']));
        if (empty($code_prefix)){
            echo json_encode(array('message' => "Must type codes prefix!", 'data' => array()));
            wp_die();
        }
        
        
        switch ($func) {
            case "bulk_coupon_generate":
                $this->generate($code_prefix);
                break;
            
            case "bulk_coupon_delete":
                $this->delete_coupons($code_prefix);
                break;

            default:
                echo json_encode(array('message' => "Action not detected", 'data' => array()));
                wp_die();
                break;
        }
        
    }
    
    private function generate($code_prefix){
        
	$coupon_id = intval( $_POST['coupon_id'] );//not user input
        if (!$coupon_id){
            echo json_encode(array('message' => "Coupon ID not detected", 'data' => array()));
            wp_die();
        }
        $num_of_coupons = intval( $_POST['num_of_coupons']);
        if (!is_int($num_of_coupons) || $num_of_coupons <= 0){
            echo json_encode(array('message' => "Wrong input on number of coupons to generate", 'data' => array()));
            wp_die();
        }


        $num_of_random_chars = intval( $_POST['num_of_random_chars']);
	
        // Get an instance of WC_Coupon object in an array(necessary to use WC_Coupon methods)
        $orig_coupon = new WC_Coupon($coupon_id);
        
        $gen_codes = array();
        $coupons_to_generate = $num_of_coupons;
        while ($coupons_to_generate--){
        
            /**
            * Create a coupon programmatically
            */
            $coupon_code = $this->generate_coupon_code($num_of_random_chars, $code_prefix); // Code
            $gen_codes[] = $coupon_code;
            
            $coupon = array(
            'post_title' => $coupon_code,
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => get_post_field( 'post_author', $coupon_id ),
            'post_type' => 'shop_coupon');

            
            //Create new coupon
            $new_coupon_id = wp_insert_post( $coupon );
            $new_coupon = new WC_Coupon($new_coupon_id);

            // Update its meta
            //general
            $new_coupon->set_discount_type($orig_coupon->get_discount_type());
            $new_coupon->set_amount($orig_coupon->get_amount());
            $new_coupon->set_free_shipping($orig_coupon->get_free_shipping() );
            $new_coupon->set_date_expires($orig_coupon->get_date_expires() );

            //use limits
            $new_coupon->set_individual_use($orig_coupon->get_individual_use());
            $new_coupon->set_product_ids($orig_coupon->get_product_ids());
            $new_coupon->set_excluded_product_ids($orig_coupon->get_excluded_product_ids());
            $new_coupon->set_minimum_amount($orig_coupon->get_maximum_amount());
            $new_coupon->set_maximum_amount($orig_coupon->get_maximum_amount());

            //usage limits
            $new_coupon->set_usage_limit($orig_coupon->get_usage_limit() );
            $new_coupon->set_usage_limit_per_user($orig_coupon->get_usage_limit_per_user());
            $new_coupon->set_limit_usage_to_x_items($orig_coupon->get_limit_usage_to_x_items());

            // SAVE the coupon
            $new_coupon->save();
            
        
        }


        $msg = "Generated ". $num_of_coupons. " coupons";
        //$ret = print_r($orig_coupon->get_data_keys(), true);
        $data["csv_link"] = $this->getCSVlink("generated_coupons", array("bulker_coupon_codes"), $gen_codes);
        echo json_encode(array('message' => $msg, 'data' => $data));
        
	wp_die(); // this is required to terminate immediately and return a proper response

    }
    
    
    // Utility function that generate a non existing coupon code (as each coupon code has to be unique)
    private function generate_coupon_code($chars, $prefix) {
        global $wpdb;

        // Get an array of all existing coupon codes
        $coupon_codes = $wpdb->get_col("SELECT post_name FROM $wpdb->posts WHERE post_type = 'shop_coupon'");

        while(TRUE) {
            $generated_code = $prefix."-".strtolower( wp_generate_password( $chars, false ) );
            //note: the default woo is lower. so can't play with it.
            //see: https://github.com/woocommerce/woocommerce/issues/2607

            // Check if the generated code doesn't exist yet
            if( !in_array( $generated_code, $coupon_codes ) ) {
                break; // stop the loop: The generated coupon code doesn't exist already
            }
            // continue the loop and earch/generate a new code
        }
        return $generated_code;
    }   
    
    private function delete_coupons ($code_prefix){
        global $wpdb;
        global $woocommerce;
        $deleted = 0;
                
        // Get an array of all existing coupon codes
        $coupon_codes = $wpdb->get_col("SELECT post_name FROM $wpdb->posts WHERE post_type = 'shop_coupon' AND post_status = 'publish'");
        
        $deleted_codes = array();
        for ( $i = 0; $i < count($coupon_codes); $i++ ) {
            if (strpos($coupon_codes[$i], $code_prefix) === 0) {
                $coupon = new WC_Coupon($coupon_codes[$i]);
                if ($coupon->get_usage_count() == 0){
                    wp_delete_post($coupon->get_id());
                    $deleted_codes[] = $coupon_codes[$i];
                    $deleted++;
                }
            } 
        }
        
        //$ret = print_r($coupon_codes, true);
        $msg = "Deleted ". $deleted. " bulk coupons";
        $data = array();
        $data["csv_link"] = $this->getCSVlink("deleted_coupons", array("deleted_codes"), $deleted_codes);
        echo json_encode(array('message' => $msg, 'data' => $data));

	wp_die();
    }
    
    //https://cullenwebservices.com/create-a-csv-file-wordpress-user-information-with-php/
    private function getCSVlink($filename, $header, $values) {
 
        $path = wp_upload_dir();   // or where ever you want the file to go
        $outstream = fopen($path['path']."/".$filename."_".date("Y-m-d").".csv", "w");  // the file name you choose

        fputcsv($outstream, $header);  //creates the first line in the csv file

        //each is single line, only codes for now!
        foreach($values as $field)
        {
           fputcsv($outstream, array($field)); //one in row
        }
        //fputcsv($outstream, $values);  //output the user info line to the csv file

        fclose($outstream); 
        return '<a href="'.$path['url'].'/'.$filename.'_'.date("Y-m-d").'.csv">Download Codes</a>';  //make a link to the file so the user can download.
    }
    
 

}
