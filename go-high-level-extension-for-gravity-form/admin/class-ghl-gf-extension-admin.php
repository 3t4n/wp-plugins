<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.ibsofts.com
 * @since      5.0.7
 *
 * @package    Ghl_Gf_Extension
 * @subpackage Ghl_Gf_Extension/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ghl_Gf_Extension
 * @subpackage Ghl_Gf_Extension/admin
 * @author     iB Softs <https://www.ibsofts.com>
 */

class Ghl_Gf_Extension_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    5.0.7
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    5.0.7
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    5.0.7
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    5.0.7
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Ghl_Gf_Extension_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Ghl_Gf_Extension_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
         if(isset($_GET['page']) && ($_GET['page'] === "ghl_for_gf" || $_GET['page'] === "gf_edit_forms")){
             wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/ghl-gf-extension-admin.css', array(), $this->version, 'all');
         }
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    5.0.7
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Ghl_Gf_Extension_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Ghl_Gf_Extension_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/ghl-gf-extension-admin.js', array('jquery'), $this->version, false);
        wp_localize_script($this->plugin_name, 'ghl_form_data', array('ajaxurl' => admin_url( 'admin-ajax.php' )));
        // wp_register_script( $this->plugin_name, plugins_url('js/ghl-gf-extension-admin.js', __FILE__), array(), false, true );

        wp_enqueue_script('jquery');
        wp_enqueue_script('datatables', 'https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js', array('jquery'), '1.11.5', true);
        wp_enqueue_style('datatables-style', 'https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css');

    }

    // Adding option in Setting 
    function ibs_ghlgfe_menu_item($menu_items)
    {

        $menu_items[] = array(
            'name' => 'my_custom_form_settings_page',
            'label' => __('Go High Level')
        );

        return $menu_items;
    }

    function ibs_ghlgfe_display()
    {
        if (class_exists('GFFormSettings')) {
            GFFormSettings::page_header();
            if (file_exists(plugin_dir_path(__FILE__) . 'partials/ghl-gf-extension-admin-display.php')) {
                require plugin_dir_path(__FILE__) . 'partials/ghl-gf-extension-admin-display.php';
            }
            GFFormSettings::page_footer();
        }
    }

    // GHL global tag callback

    // function create_menu( $menus ){
    //     $menus[] = array( 'name' => 'ghl_for_gf', 'label' => __( 'GHL - Gravity Form' ), 'callback' =>  array($this, 'ghl_global_tag') );
    //     return $menus;
    // }
    function ghlgf_create_menu_page() {
    
        $page_title 	= __( 'GHL - Gravity Form', 'ghl-gf-extension' );
        $menu_title 	= __( 'GHL - Gravity Form', 'ghl-gf-extension' );
        $capability 	= 'manage_options';
        $menu_slug 		= 'ghl_for_gf';
        $callback   	= array( $this, 'ghl_page_content' );
        $icon_url   	= 'dashicons-admin-plugins';
        add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $callback, $icon_url );

    }	
    
    function ghl_page_content(){
        
        if(file_exists(plugin_dir_path(__FILE__) . 'partials/ghl-gf-extension-page.php')){
            require plugin_dir_path(__FILE__) . 'partials/ghl-gf-extension-page.php';
        }
    }

    function ibs_ghlgfe_send_to_gohighlevel($entry, $form)
    {
        global $wpdb;
        $loc_acc_tok = null;
        $global_loc_acc_tok = null;
        $table_name = $wpdb->base_prefix . "ghlex_subaccount";
        $table_name_form=$wpdb->prefix . "ghlexform_mapping";
        $field_ids = array();
        $required_types = array("name", "email", "phone");
        foreach ($required_types as $type) {
            $field_exists = false;
            foreach ($form['fields'] as $field) {
                if ($field["type"] == $type) {
                    $field_exists = true;
                    $field_ids[$type] = $field["id"];
                    break;
                }
            }
            if (!$field_exists) {
                break;
            }
        }
        if (count($field_ids) >= count($required_types)) {
			$form_loc_id='';
			$glob_loc_id='';
            $loc_id='gf_ghl_locid_' . $form['id'];
            $existing_row_loc = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s", $loc_id));
			if($existing_row_loc){
            $form_loc_id=$existing_row_loc->form_option_value;
			}
            $existing_row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE Location_id = %s", $form_loc_id));
            if ($existing_row !== null) {
                $loc_acc_tok = $existing_row->Location_acc_tok;
            }
            
            //for global.
            $existing_glob_loc= $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s",'ghl_global_locid'));
			if($existing_glob_loc){
            $glob_loc_id=$existing_glob_loc->form_option_value;
			}
            $global_existing_row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE Location_id = %s", $glob_loc_id));
            if ($global_existing_row !== null) {
                $global_loc_acc_tok=($global_existing_row->Location_acc_tok);
            }
            
            

            if ($loc_acc_tok || $global_loc_acc_tok) {
    
                // Get the data from the Gravity Forms entry
                $name_field_id = $field_ids['name'];
                if (class_exists('GFAPI')) {
                    $name_subfields = GFAPI::get_field($form, $name_field_id)->inputs;
                }
                if (count($name_subfields) >= 2) {
                    $prefix_name = rgar($entry, $name_field_id . '.' . '2');
                    $first_name = rgar($entry, $name_field_id . '.' . '3');
                    $middle_name = rgar($entry, $name_field_id . '.' . '4');
                    $last_name = rgar($entry, $name_field_id . '.' . '6');
                    $prefix_name = rgar($entry, $name_field_id . '.' . '8');
                    $name_value = trim($prefix_name . ' ' . $first_name . ' ' . $middle_name . ' ' . $last_name . ' ' . $prefix_name);
                } else {
                    $name_value = rgar($entry, $name_field_id);
                }
                $email = rgar($entry, $field_ids['email']);
                $phone = rgar($entry, $field_ids['phone']);
                //tags for main
				$tags_option_name='';
                $existing_row_main_tag = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s", 'gf_ghl_tags_' . $form['id']));
				if($existing_row_main_tag){
                $tags_option_name = $existing_row_main_tag->form_option_value;
				}
                //tags for global
				$tags_option_glob_name='';
                $existing_row_glob_tag = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_form WHERE form_option_name = %s", 'ghl_global_tag'));
				if($existing_row_glob_tag){
                 $tags_option_glob_name=$existing_row_glob_tag->form_option_value;
				}
                $tags = (!empty($tags_option_name) && ($tags_option_name) !== false) ? ($tags_option_name) : (($tags_option_glob_name !== false) ? ($tags_option_glob_name) : "");
                


                //check if user not select any location id.
                $actual_locid=(!empty($form_loc_id)) && (($form_loc_id) !== false) ? ($form_loc_id) : ($glob_loc_id);

                $actual_locAcctkn=(!empty($loc_acc_tok)) && (($loc_acc_tok) !== false) ? ($loc_acc_tok) : ($global_loc_acc_tok);
                
                $exist = $this->check_contact($email, $actual_locAcctkn,$actual_locid);
                $tags = (!empty($exist)) ? $tags.','.$exist : $tags;
                

                $contact_data = array(
                    'locationId'  => $actual_locid,
                    'name' => $name_value,
                    'email' => $email,
                    'phone' => $phone,
                    'tags' => $tags,
                );
                
    
                $endpoint = "https://services.leadconnectorhq.com/contacts/upsert";
                $ghl_version = '2021-07-28';

                $request_args = array(
                    'body'         => $contact_data,
                    'headers'     => array(
                        'Authorization' => "Bearer {$actual_locAcctkn}",
                        'Version'         => $ghl_version
                    ),
                );

                $response = wp_remote_post( $endpoint, $request_args );
                $http_code = wp_remote_retrieve_response_code( $response );

                if ( 200 === $http_code || 201 === $http_code ) {

                    $body = json_decode( wp_remote_retrieve_body( $response ) );
                    $contact = $body->contact;

                    return $contact;
                }
                
                
            }
        }
    }

    public function ghlplugin_settings($actions, $plugin_file){
        
        if($plugin_file == "go-high-level-extension-for-gravity-form/ghl-gf-extension.php"){
            $actions[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=ghl_for_gf') ) .'">Settings</a>';
            $actions[] = '<a href="https://www.ibsofts.com/checkout/?add-to-cart=4387" target="_blank"><b>Upgrade to Premium</b></a>';
        }
        
        return $actions;
    }
    
    public function ghl_check_form_data(){
        global $wpdb;
        $table_name = $wpdb->prefix . "ghlexform_mapping";
        $form_id = sanitize_text_field($_POST['form_id']);
        $existing_row_tags = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE form_option_name = %s", 'gf_ghl_tags_' . $form_id));
        $existing_row_loc = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE form_option_name = %s", 'gf_ghl_locid_' . $form_id));
        $table_name_sub = $wpdb->base_prefix . "ghlex_subaccount";

        if(!empty($form_id)){
              $tags='';
              $checkSubacct='';
              $api_key = isset($existing_row_loc->form_option_value) ? $existing_row_loc->form_option_value : "";
              $existingSubacct=$wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name_sub WHERE Location_id = %s", $api_key));
              if($existingSubacct){
                $checkSubacct=$existingSubacct->Location_id;
              }

              $tags = $existing_row_tags->form_option_value;
            wp_send_json_success(array("success" => true, 'api_key' => $api_key, 'tags' => $tags,'sub_api'=>$checkSubacct));
        }
        wp_send_json_success(array("success" => false));
        die();
    }
    
    public function remove_footer_version(){
        if(isset($_GET['page']) && $_GET['page'] === "ghl_for_gf")
        remove_filter( 'update_footer', 'core_update_footer' );
    }

    public function remove_footer_admin(){
        if(isset($_GET['page']) && $_GET['page'] === "ghl_for_gf"){
            return '';
        }
        return '<span id="footer-thankyou">Thank you for creating with <a href="https://wordpress.org/">WordPress</a>.</span>';
    }
    
    public function ghl_plugin_update_msg($plugin_data, $response){
        if (isset($plugin_data['update']) && $plugin_data['update'] && isset($response->upgrade_notice)) {
                echo '<div class="update-message notice inline notice-error notice-alt"><p><strong>Important:</strong> 
                To utilize the latest features and enhancements effectively, we recommend updating your plugin to the newest version before June 1st.</p></div>';
        }
    }
    
    private function check_contact($email, $api_key,$location_id){

            $endpoint = 'https://services.leadconnectorhq.com/contacts/?query='.$email.'&locationId='.$location_id;
            $ghl_version = '2021-07-28';

            $request_args = array(
                'headers'     => array(
                    'Authorization' => "Bearer {$api_key}",
                    'Version'         => $ghl_version
                ),
            );

            $response = wp_remote_get( $endpoint, $request_args );
            $http_code = wp_remote_retrieve_response_code( $response );

            if ( 200 === $http_code || 201 === $http_code ) {

                $body = json_decode( wp_remote_retrieve_body( $response ) );
                if(!empty($body->contacts)){
                    $tags = $body->contacts[0]->tags;
                    $tags = implode(",", $tags);
                    return $tags;
                }               
            }
            else{
                return;
            }
            
        
    }
}