<?php

/**
* Real Estate Management Main Class - Since 1.0.0
*/

class WCP_Real_Estate_Management
{
    
    function __construct(){
        add_action( 'init', array($this, 'register_property' ) );
        add_action( 'admin_menu', array( $this, 'menu_pages' ) );
        add_action( 'admin_enqueue_scripts', array($this, 'admin_scripts' ) );
        add_action( 'wp_enqueue_scripts', array($this, 'front_scripts' ) );
        add_action( 'save_post', array($this, 'save_property' ) );
        add_action( 'add_meta_boxes', array($this, 'property_metaboxes' ) );
        add_action( 'admin_init', array($this, 'rem_role_cap') , 999);

        add_filter( 'post_updated_messages', array($this, 'property_messages' ) );

        add_action( 'wp_ajax_wcp_rem_save_settings', array($this, 'save_admin_settings' ) );

        add_filter( 'single_template', array($this, 'property_front_template') );
        add_filter( 'template_include', array($this, 'rem_templates'), 99 );

        // Create Property
        add_action( 'wp_ajax_rem_create_pro_ajax', array($this, 'create_property_frontend' ) );

        // Search Property
        add_action( 'wp_ajax_rem_search_property', array($this, 'search_peoperty' ) );
        add_action( 'wp_ajax_nopriv_rem_search_property', array($this, 'search_peoperty' ) );

        // Contact Agent
        add_action( 'wp_ajax_nopriv_rem_contact_agent', array($this, 'send_email_agent' ) );
        add_action( 'wp_ajax_rem_contact_agent', array($this, 'send_email_agent' ) );

        // Agent Login
        add_action( 'wp_ajax_rem_user_login', array($this, 'rem_user_login_check' ) );
        add_action( 'wp_ajax_nopriv_rem_user_login', array($this, 'rem_user_login_check' ) );

        // Edit Profile Fields
        add_action( 'show_user_profile', array($this, 'rem_agent_extra_fields' ) );
        add_action( 'edit_user_profile', array($this, 'rem_agent_extra_fields' ) ); 

        //disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php
        remove_filter('pre_user_description', 'wp_filter_kses');

        // Save Profile Fields
        add_action( 'personal_options_update', array($this, 'save_rem_agent_fields' ) );
        add_action( 'edit_user_profile_update', array($this, 'save_rem_agent_fields' ) );

        // Register New Agent AJAX
        add_action( 'wp_ajax_nopriv_rem_agent_register', array($this, 'rem_register_agent' ) );
        add_action( 'wp_ajax_deny_agent', array($this, 'deny_agent' ) );
        add_action( 'wp_ajax_approve_agent', array($this, 'approve_agent' ) );

        // Compare Properties
        add_action( 'wp_ajax_nopriv_landz_compare_properties', array($this, 'compare_properties' ) );
        add_action( 'wp_ajax_landz_compare_properties', array($this, 'compare_properties' ) );
    }

    /**
    * Registers a new post type property
    * @since 1.0.0
    */
    function register_property() {
        include 'inc/register-property.php';
    }
    
    /**
    * Property page settings metaboxes
    * @since 1.0.0
    */
    function property_metaboxes(){
        add_meta_box( 'property_settings_meta_box', 'Settings', array($this, 'render_property_settings' ), array('rem_property'));
        add_meta_box( 'property_images_meta_box', 'Gallery Images', array($this, 'render_property_images' ), array('rem_property'));
    }

    function render_property_settings(){
        global $post;
        wp_nonce_field( plugin_basename( __FILE__ ), 'rem_property_settings_nonce' );
        include 'inc/property-settings-metabox.php';
    }

    function render_property_images(){
        include 'inc/property-images-metabox.php';
    }

    function save_property($post_id){
        // verify if this is an auto save routine. 
        // If it is our form has not been submitted, so we dont want to do anything
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
            return;

        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times
        if ( !isset( $_POST['rem_property_settings_nonce'] ) )
            return;

        if ( !wp_verify_nonce( $_POST['rem_property_settings_nonce'], plugin_basename( __FILE__ ) ) )
            return;

        // OK, we're authenticated: we need to find and save the data

        if (isset($_POST['rem_property_data']) && $_POST['rem_property_data'] != '') {
            foreach ($_POST['rem_property_data'] as $key => $value) {
                update_post_meta( $post_id, 'rem_'.$key, $value );
            }
        }
    }

    function admin_scripts($check){
        global $post;
        if ( $check == 'post-new.php' || $check == 'post.php' || 'edit.php') {
            if (isset($post->post_type) && 'rem_property' === $post->post_type) {
                wp_enqueue_media();
                wp_enqueue_script( 'rem-new-property-js', plugins_url( 'assets/admin/js/admin-property.js' , __FILE__ ) , array('jquery', 'wp-color-picker', 'jquery-ui-sortable'));
                wp_enqueue_style( 'rem-new-property-css', plugins_url( 'assets/admin/css/admin.css' , __FILE__ ) );
            }
        }

        if ( $check == 'rem_property_page_rem_settings' ) {
            wp_enqueue_style( 'rem-bs-css', plugins_url( 'assets/admin/css/bootstrap.min.css' , __FILE__ ) );
            wp_enqueue_style( 'rem-new-property-css', plugins_url( 'assets/admin/css/admin.css' , __FILE__ ) );
            wp_enqueue_script( 'rem-save-settings-js', plugins_url( 'assets/admin/js/page-settings.js' , __FILE__ ) , array('jquery', 'wp-color-picker', 'jquery-ui-accordion'));
        }

        if ($check == 'user-edit.php' || $check == 'profile.php') {
            wp_enqueue_media();
            wp_enqueue_script( 'rem-profile-edit', plugins_url( 'assets/admin/js/profile.js' , __FILE__ ), array('jquery'));
        }

        if ($check == 'rem_property_page_rem_property_agents') {
            wp_enqueue_script( 'rem-agents-settings-js', plugins_url( 'assets/admin/js/manage-agents.js' , __FILE__ ) , array('jquery'));
        }
    }

    function front_scripts(){
        if (is_singular( 'rem_property' )) {
            $this->rem_enqueue_script('single-property');
        }
        if(is_author()){
            global $wp_query;
            $curauth = $wp_query->get_queried_object();
            $author_info = $curauth;
            $author_id = $curauth->ID;
            if ( in_array( 'rem_property_agent', (array) $curauth->roles ) ) {
                $this->rem_enqueue_script('profile-agent');
            }            
        }
        if (is_archive()) {
            global $post;
            if (isset($post->post_type) && $post->post_type == 'rem_property') {
                $this->rem_enqueue_script('archive-property');
            }
        }
    }

    function rem_role_cap(){

        $roles = array('rem_property_agent', 'editor', 'administrator');

        // Loop through each role and assign capabilities
        foreach($roles as $the_role) { 

        $role = get_role($the_role);
              $role->add_cap( 'read' );
              $role->add_cap( 'read_rem_property');
              $role->add_cap( 'read_private_rem_properties' );
              $role->add_cap( 'edit_rem_property' );
              $role->add_cap( 'edit_rem_properties' );
          
              if($the_role == 'administrator'){
                  $role->add_cap( 'edit_others_rem_properties' );
                  $role->add_cap( 'delete_others_rem_properties' );
              }
              
              $role->add_cap( 'edit_published_rem_properties' );
              $role->add_cap( 'publish_rem_properties' );
              $role->add_cap( 'delete_private_rem_properties' );
              $role->add_cap( 'delete_published_rem_properties' );
        }
    }

    function rem_user_login_check(){
        if (isset($_REQUEST)) {
            extract($_REQUEST);
            $landz_settings = get_option( 'rem_all_settings' );
            global $user;
            $creds = array();
            $creds['user_login'] = $landz_username;
            $creds['user_password'] =  $landz_userpass;
            $creds['remember'] = (isset($rememberme)) ? true : false;
            $user = wp_signon( $creds, false );

            if ( is_wp_error($user) ) {
                $resp = array(
                    'status'    => 'failed',
                    'message'   => $user->get_error_message(),
                );
                echo json_encode($resp);
            }
            if ( !is_wp_error($user) ) {
                $resp = array(
                    'status'    => 'success',
                    'message'   => $landz_settings['landz_top_bar_login_redirect'],
                );
                echo json_encode($resp);
            }

            die(0);
        }
    }

    function rem_agent_extra_fields($user){
        if ( in_array( 'rem_property_agent', (array) $user->roles ) ) {
            include 'inc/agent-profile-fields.php';
        }
    }

    function save_rem_agent_fields($user_id){
        if ( current_user_can( 'edit_user', $user_id )){
            update_user_meta( $user_id,'rem_facebook_url', sanitize_text_field( $_POST['rem_facebook_url'] ) );
            update_user_meta( $user_id,'rem_twitter_url', sanitize_text_field( $_POST['rem_twitter_url'] ) );
            update_user_meta( $user_id,'rem_googleplus_url', sanitize_text_field( $_POST['rem_googleplus_url'] ) );
            update_user_meta( $user_id,'rem_linkedin_url', sanitize_text_field( $_POST['rem_linkedin_url'] ) );
            update_user_meta( $user_id,'rem_user_skills', $_POST['rem_user_skills'] );
            update_user_meta( $user_id,'rem_user_tagline', sanitize_text_field( $_POST['rem_user_tagline'] ) );
            update_user_meta( $user_id, 'rem_agent_meta_image', $_POST['rem_agent_meta_image'] );
            update_user_meta( $user_id,'rem_user_contact_sc', sanitize_text_field( $_POST['rem_user_contact_sc'] ) );
        }
    }

    function get_all_property_features(){

        $saved_settings = get_option( 'rem_all_settings' );

        $property_individual_cbs = array(
                'Attic', 'Gas Heat', 'Balcony', 'Wine Cellar', 'Basketball Court',
                'Trash Compactors', 'Fireplace', 'Pool', 'Lake View', 'Solar Heat',
                'Separate Shower', 'Wet Bar','Remodeled','Skylights',
                'Stone Surfaces', 'Golf Course', 'Health Club', 'Backyard', 'Pet Allowed',
                'Office/Den', 'Laundry'  );

        if(has_filter('rem_property_features')) {
            $property_individual_cbs = apply_filters('rem_property_features', $property_individual_cbs);
        }

        if (isset($saved_settings['property_detail_fields']) && $saved_settings['property_detail_fields'] != '') {
            $p_types = explode(PHP_EOL, $saved_settings['property_detail_fields']);
            foreach ($p_types as $new_property_detail) {
                if ($new_property_detail != '') {
                    $property_individual_cbs[] = $new_property_detail;
                }
            }
        }

        return $property_individual_cbs;
    }

    function get_all_property_types(){

        $saved_settings = get_option( 'rem_all_settings' );

        $property_type_options  = array(
            'duplex'    => __( 'Duplex', 'wcp-rem' ),
            'houses' => __( 'Houses', 'wcp-rem' ),
            'offices'   => __( 'Offices', 'wcp-rem' ),
            'retail'    => __( 'Retail', 'wcp-rem' ),
            'vila'      => __( 'Vila', 'wcp-rem'),
        );

        if(has_filter('rem_property_types')) {
            $property_type_options = apply_filters('rem_property_types', $property_type_options);
        }

        if (isset($saved_settings['property_type_options']) && $saved_settings['property_type_options'] != '') {
            $p_types = explode(PHP_EOL, $saved_settings['property_type_options']);
            foreach ($p_types as $new_property_type) {
                if ($new_property_type != '') {
                    $property_type_options[$new_property_type] = $new_property_type;
                }
            }
        }

        return $property_type_options;
    }

    function get_all_property_purpose(){

        $saved_settings = get_option( 'rem_all_settings' );
        
        $property_purpose_options  = array(
            'rent'  => __( 'Rent', 'wcp-rem' ),
            'sell' => __( 'Sell', 'wcp-rem' ),
        );

        if(has_filter('rem_property_purposes')) {
            $property_purpose_options = apply_filters('rem_property_purposes', $property_purpose_options);
        }

        if (isset($saved_settings['property_purpose_options']) && $saved_settings['property_purpose_options'] != '') {
            $p_types = explode(PHP_EOL, $saved_settings['property_purpose_options']);
            foreach ($p_types as $new_property_type) {
                if ($new_property_type != '') {
                    $property_purpose_options[$new_property_type] = $new_property_type;
                }
            }
        }

        return $property_purpose_options;
    }

    function get_all_property_status(){

        $saved_settings = get_option( 'rem_all_settings' );

        $property_status_options  = array(
            'normal'    => __( 'Normal', 'wcp-rem' ),
            'available' => __( 'Available', 'wcp-rem' ),
            'not available' => __( 'Not Available', 'wcp-rem' ),
            'sold' => __( 'Sold', 'wcp-rem' ),
            'openhouse' => __( 'Open House', 'wcp-rem' ),
        );

        if(has_filter('rem_property_statuses')) {
            $property_status_options = apply_filters('rem_property_statuses', $property_status_options);
        }

        if (isset($saved_settings['property_status_options']) && $saved_settings['property_status_options'] != '') {
            $statuses = explode(PHP_EOL, $saved_settings['property_status_options']);
            foreach ($statuses as $new_property_type) {
                if ($new_property_type != '') {
                    $property_status_options[$new_property_type] = $new_property_type;
                }
            }
        }

        return $property_status_options;
    }

    function create_property_frontend(){

        // print_r($_REQUEST); exit;
        if (isset($_REQUEST) && $_REQUEST != '') {
            extract($_REQUEST);
            $current_user_data = wp_get_current_user();

            // Create post object
            $my_post = array(
              'post_title'    => wp_strip_all_tags( $title ),
              'post_content'  => $content,
              'post_status'   => 'publish',
              'post_author'   => $current_user_data->ID,
              'post_type'   => 'rem_property',
            );
             
            // Insert the post into the database
            $property_id = wp_insert_post( $my_post );

            foreach ($_REQUEST as $key => $data) {
                if ($key != 'title' || $key != 'content' || $key != 'rem_property_data' || $key != 'tags') {
                    update_post_meta( $property_id, 'rem_property_'.$key, $data );
                }

                if ($key == 'rem_property_data') {
                    update_post_meta( $property_id, 'rem_property_images', $data['property_images'] );                    
                    foreach ($data['property_images'] as $imgID => $id) {
                        if (!has_post_thumbnail( $property_id )) {
                            set_post_thumbnail( $property_id, $imgID );
                        }
                    }
                }

                if ($key == 'tags') {
                    wp_set_post_terms( $property_id, $data, 'rem_property_tag' );
                }
            }

            echo get_permalink( $property_id );

        }

        die();
    }

    function send_email_agent(){
        // print_r($_REQUEST); exit;
        if (isset($_REQUEST) && $_REQUEST != '') {
            extract($_REQUEST);
            $agent_info = get_userdata($agent_id);
            $agent_email = $agent_info->user_email;
            if (isset($subject) && $subject != '') {
                $subject = $subject;
            } else {
                $subject = get_the_title( $property_id );
            }

            $headers = 'From: '.$client_name.'  <'.$client_email.'>' . "\r\n";
            
            if (wp_mail( $agent_email, $subject, $client_msg, $headers )) {
                $resp = array('status' => 'sent', 'msg' => __( 'Email Sent Successfully', 'wcp-rem' ) );
            } else {
                $resp = array('status' => 'fail', 'msg' => __( 'There is some problem, please try later', 'wcp-rem' ) );
            }
        }

        echo json_encode($resp); die(0);
    }

    function search_peoperty(){
        if(isset($_REQUEST)){
            extract($_REQUEST);
            include 'inc/search-property-ajax.php';
        }

        die(0);
    }

    function menu_pages(){
        add_submenu_page( 'edit.php?post_type=rem_property', 'All Property Agents', __( 'Agents', 'wcp-rem' ), 'manage_options', 'rem_property_agents', array($this, 'render_agents_page') );
        add_submenu_page( 'edit.php?post_type=rem_property', 'Real Estate Manager - Settings', __( 'Settings', 'wcp-rem' ), 'manage_options', 'rem_settings', array($this, 'render_settings_page') );
        add_submenu_page( 'edit.php?post_type=rem_property', 'Real Estate Manager - Documentation', __( 'Shortcodes', 'wcp-rem' ), 'manage_options', 'rem_documentation', array($this, 'render_docs_page') );
    }

    function render_agents_page(){
        include 'inc/page-agents.php';
    }

    function render_docs_page(){
        include 'inc/page-docs.php';
    }

    function render_settings_page(){
        include 'inc/page-settings.php';
    }


    function rem_register_agent(){

        if (isset($_REQUEST)) {

            $resp = array();
            // Lets Check if username already exists
            if (username_exists( $_REQUEST['username'] ) || email_exists( $_REQUEST['useremail'] )) {
                $resp = array('status' => 'already', 'msg' => __( 'Username or Email already exists', 'wcp-rem' ));
            } else {

                $_REQUEST['time'] = current_time( 'mysql' );

                $previous_users = get_option( 'rem_pending_users' );

                if ( $previous_users != '' && is_array($previous_users)) {
                   foreach ($previous_users as $single_user) {
                       if ($single_user['username'] == $_REQUEST['username'] || $single_user['useremail'] == $_REQUEST['useremail']) {
                            $resp = array('status' => 'already', 'msg' => __( 'Username or Email already exists', 'wcp-rem' ));
                            echo json_encode($resp);
                            exit;
                       }
                   }
                   $previous_users[] = $_REQUEST;
                } else {
                   $previous_users = array($_REQUEST);
                }

                if (update_option( 'rem_pending_users', $previous_users )) {
                    do_action( 'rem_new_agent_register', $_REQUEST );
                    $resp = array('status' => 'success', 'msg' => __( 'Registered Successfully, please wait until admin approves.', 'wcp-rem' ));
                } else {
                    $resp = array('status' => 'error', 'msg' => __( 'Error, please try later', 'wcp-rem' ));
                }
                
            }

            echo json_encode($resp);
            die(0);
        }

    }

    function deny_agent(){
        if (isset($_REQUEST) && current_user_can( 'manage_options' )) {
            $pending_agents = get_option( 'rem_pending_users' );
            unset($pending_agents[$_REQUEST['userindex']]);
            update_option( 'rem_pending_users', $pending_agents );
            do_action( 'rem_new_agent_rejected', $_REQUEST['userindex'] );
        }
        die(0);
    }

    function approve_agent(){
        if (isset($_REQUEST) && current_user_can( 'manage_options' )) {
            $pending_agents = get_option( 'rem_pending_users' );

            $new_agent = $pending_agents[$_REQUEST['userindex']];

            extract($new_agent);

            $agent_id = wp_create_user( $username, $password, $useremail );

            do_action( 'rem_new_agent_approved', $new_agent );

            wp_update_user( array( 'ID' => $agent_id, 'role' => 'rem_property_agent' ) );

            update_user_meta( $agent_id, 'first_name', $firstname);
            update_user_meta( $agent_id, 'last_name', $lastname);
            update_user_meta( $agent_id, 'description', $info);
            update_user_meta( $agent_id, 'rem_user_tagline', $tagline);
            update_user_meta( $agent_id, 'rem_facebook_url', $facebook_url );
            update_user_meta( $agent_id, 'rem_twitter_url', $twitter_url );
            update_user_meta( $agent_id, 'rem_googleplus_url', $google_url );
            update_user_meta( $agent_id, 'rem_linkedin_url', $linkedin_url );
            update_user_meta( $agent_id, 'rem_user_skills', $skills );

            unset($pending_agents[$_REQUEST['userindex']]);

            update_option( 'rem_pending_users', $pending_agents );
        }

        die(0);
    }

    function compare_properties(){
        // print_r($_REQUEST);
        include 'compare-properties.php';
        die(0);
    }
    
    static function rem_activated(){
        /*
         * Adding Custom Role 'rem_property_agent'
         */
        $roles_set = get_option('rem_role_isset');

        if(!$roles_set){
            add_role(
                'rem_property_agent',
                __( 'Property Agent' ),
                array(
                    'read' => true,
                    'edit_posts' => true,
                    'delete_posts' => false,
                    'publish_posts' => false,
                    'upload_files' => true,
                )
            );
            flush_rewrite_rules();
            update_option('rem_role_isset', true);
        }       
    }

    function property_front_template($single_template){
        global $post;
        $all_settings = get_option( 'rem_all_settings' );
        $property_layout = (isset($all_settings['single_property_layout'])) ? $all_settings['single_property_layout'] : 'plugin' ;        

        if (isset($post->post_type) && $post->post_type == 'rem_property' && $property_layout == 'plugin') {
            $single_template = dirname( __FILE__ ) . '/templates/default.php';
        }

        return $single_template;
    }

    function rem_templates($template){
        $all_settings = get_option( 'rem_all_settings' );
        $layout_agent = (isset($all_settings['single_property_layout'])) ? $all_settings['single_property_layout'] : 'plugin' ;
        $layout_archive = (isset($all_settings['archive_property_layout'])) ? $all_settings['archive_property_layout'] : 'plugin' ;

        if (is_author() && $layout_agent == 'plugin') {
            global $wp_query;
            $curauth = $wp_query->get_queried_object();
            $author_info = $curauth;
            $author_id = $curauth->ID;
            if ( in_array( 'rem_property_agent', (array) $curauth->roles ) ) {
                $template = dirname( __FILE__ ) . '/templates/agent.php';
            }
        }
        if (is_archive() && $layout_archive == 'plugin') {
            global $post;
            if (isset($post->post_type) && $post->post_type == 'rem_property') {
                $template = dirname( __FILE__ ) . '/templates/list-properties.php';
            }
        }
        return $template;
    }

    function admin_settings_fields(){

        include 'inc/admin-settings-arr.php';

        return $fieldsData;
    }

    function render_setting_field($field){
        include 'inc/render-admin-settings.php';
    }

    function save_admin_settings(){
        if (isset($_REQUEST)) {
            update_option( 'rem_all_settings', $_REQUEST );
            echo 'Settings Saved';
        }
        die(0);
    }

    function get_price($property_id){
        $currency_symbol = '$';
        $all_settings = get_option( 'rem_all_settings' );
        $price = get_post_meta($property_id, 'rem_property_price', true);

        if (isset($all_settings['currency']) && $all_settings['currency'] != '') {
            $currency_symbol = $all_settings['currency'];
        }

        if(has_filter('rem_property_price')) {
            $price = apply_filters('rem_property_price', $price, $currency_symbol);
        } else {
            $price = $currency_symbol.' '.number_format($price, 2);
        }

        return $price;
    }

    function property_messages( $messages ) {
        $post             = get_post();
        $post_type        = get_post_type( $post );
        $post_type_object = get_post_type_object( $post_type );

        $messages['rem_property'] = array(
            0  => '', // Unused. Messages start at index 1.
            1  => __( 'Property updated.', 'wcp-rem' ),
            2  => __( 'Custom field updated.', 'wcp-rem' ),
            3  => __( 'Custom field deleted.', 'wcp-rem' ),
            4  => __( 'Property updated.', 'wcp-rem' ),
            /* translators: %s: date and time of the revision */
            5  => isset( $_GET['revision'] ) ? sprintf( __( 'Property restored to revision from %s', 'wcp-rem' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6  => __( 'Property published.', 'wcp-rem' ),
            7  => __( 'Property saved.', 'wcp-rem' ),
            8  => __( 'Property submitted.', 'wcp-rem' ),
            9  => sprintf(
                __( 'Property scheduled for: <strong>%1$s</strong>.', 'wcp-rem' ),
                // translators: Publish box date format, see http://php.net/date
                date_i18n( __( 'M j, Y @ G:i', 'wcp-rem' ), strtotime( $post->post_date ) )
            ),
            10 => __( 'Property draft updated.', 'wcp-rem' )
        );

        if ( $post_type_object->publicly_queryable && 'rem_property' === $post_type ) {
            $permalink = get_permalink( $post->ID );

            $view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View Property', 'wcp-rem' ) );
            $messages[ $post_type ][1] .= $view_link;
            $messages[ $post_type ][6] .= $view_link;
            $messages[ $post_type ][9] .= $view_link;

            $preview_permalink = add_query_arg( 'preview', 'true', $permalink );
            $preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview Property', 'wcp-rem' ) );
            $messages[ $post_type ][8]  .= $preview_link;
            $messages[ $post_type ][10] .= $preview_link;
        }

        return $messages;
    }

    function rem_enqueue_script($type){
        switch ($type) {
            case 'single-property':
                // Main Scripts and Styles
                wp_enqueue_style( 'rem-bs-css', plugins_url( 'assets/admin/css/bootstrap.min.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-styles-css', plugins_url( 'assets/front/css/rem-styles.css' , __FILE__ ) );
                wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

                // Photorama
                wp_enqueue_style( 'rem-fotorama-css', plugins_url( 'assets/front/lib/fotorama.min.css' , __FILE__ ) );
                wp_enqueue_script( 'rem-photorama-js', plugins_url( 'assets/front/lib/fotorama.min.js' , __FILE__ ), array('jquery'));

                // Imagesfill and Loaded
                wp_enqueue_script( 'rem-imagefill-js', plugins_url( 'assets/front/lib/imagefill.min.js' , __FILE__ ), array('jquery'));   
                wp_enqueue_script( 'rem-imagesloaded-js', plugins_url( 'assets/front/lib/imagesloaded.min.js' , __FILE__ ), array('jquery'));   
                
                // Page Specific
                wp_enqueue_style( 'rem-single-property-css', plugins_url( 'assets/front/css/single-property.css' , __FILE__ ) );
                wp_enqueue_script( 'rem-single-property-js', plugins_url( 'assets/front/js/single-property.js' , __FILE__ ), array('jquery'));                

                break;

            case 'archive-property':
                // Main Scripts and Styles
                wp_enqueue_style( 'rem-bs-css', plugins_url( 'assets/admin/css/bootstrap.min.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-styles-css', plugins_url( 'assets/front/css/rem-styles.css' , __FILE__ ) );
                wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

                // Imagesfill and Loaded
                wp_enqueue_script( 'rem-imagefill-js', plugins_url( 'assets/front/lib/imagefill.min.js' , __FILE__ ), array('jquery'));   
                wp_enqueue_script( 'rem-imagesloaded-js', plugins_url( 'assets/front/lib/imagesloaded.min.js' , __FILE__ ), array('jquery'));   
                
                // Page Specific
                wp_enqueue_style( 'rem-archive-property-css', plugins_url( 'assets/front/css/archive-property.css' , __FILE__ ) );
                wp_enqueue_script( 'rem-archive-property-js', plugins_url( 'assets/front/js/archive-property.js' , __FILE__ ), array('jquery'));                
                
                break;

            case 'profile-agent':
                // Main Scripts and Styles
                wp_enqueue_style( 'rem-bs-css', plugins_url( 'assets/admin/css/bootstrap.min.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-styles-css', plugins_url( 'assets/front/css/rem-styles.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-skillbars-css', plugins_url( 'assets/front/lib/skill-bars.css' , __FILE__ ) );
                wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

                // Imagesfill and Loaded
                wp_enqueue_script( 'rem-imagefill-js', plugins_url( 'assets/front/lib/imagefill.min.js' , __FILE__ ), array('jquery'));   
                wp_enqueue_script( 'rem-imagesloaded-js', plugins_url( 'assets/front/lib/imagesloaded.min.js' , __FILE__ ), array('jquery'));   
                
                // Carousel
                wp_enqueue_script( 'rem-carousel-js', plugins_url( 'assets/front/lib/responsiveCarousel.min.js' , __FILE__ ), array('jquery'));   

                // Page Specific
                wp_enqueue_style( 'rem-archive-property-css', plugins_url( 'assets/front/css/archive-property.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-profile-agent-css', plugins_url( 'assets/front/css/profile-agent.css' , __FILE__ ) );
                wp_enqueue_script( 'rem-profile-agent-js', plugins_url( 'assets/front/js/profile-agent.js' , __FILE__ ), array('jquery'));                
                
                break;

            case 'register-agent':
                // Main Scripts and Styles
                wp_enqueue_style( 'rem-bs-css', plugins_url( 'assets/admin/css/bootstrap.min.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-styles-css', plugins_url( 'assets/front/css/rem-styles.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-register-css', plugins_url( 'assets/front/css/register-agent.css' , __FILE__ ) );
                wp_enqueue_script( 'rem-register-agent-js', plugins_url( 'assets/front/js/register-agent.js' , __FILE__ ), array('jquery'));                
                
                break;

            case 'login-agent':
                // Main Scripts and Styles
                wp_enqueue_style( 'rem-bs-css', plugins_url( 'assets/admin/css/bootstrap.min.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-styles-css', plugins_url( 'assets/front/css/rem-styles.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-login-css', plugins_url( 'assets/front/css/login-agent.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-labelauty-css', plugins_url( 'assets/front/lib/labelauty.css' , __FILE__ ) );
                wp_enqueue_script( 'rem-labelauty', plugins_url( 'assets/front/lib/labelauty.min.js' , __FILE__ ), array('jquery'));
                wp_enqueue_script( 'rem-login-agent', plugins_url( 'assets/front/js/login.js' , __FILE__ ), array('jquery'));
                wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
                
                break;

            case 'create-property':
                // Main Scripts and Styles
                wp_enqueue_style( 'rem-bs-css', plugins_url( 'assets/admin/css/bootstrap.min.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-styles-css', plugins_url( 'assets/front/css/rem-styles.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-admin-css', plugins_url( 'assets/admin/css/admin.css' , __FILE__ ) );
                
                wp_enqueue_style( 'rem-easydropdown-css', plugins_url( 'assets/front/lib/easydropdown.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-labelauty-css', plugins_url( 'assets/front/lib/labelauty.css' , __FILE__ ) );
                wp_enqueue_script( 'rem-labelauty', plugins_url( 'assets/front/lib/labelauty.min.js' , __FILE__ ), array('jquery'));
                wp_enqueue_script( 'rem-easy-drop', plugins_url( 'assets/front/lib/jquery.easydropdown.min.js' , __FILE__ ), array('jquery'));
                wp_enqueue_script( 'rem-create-pro', plugins_url( 'assets/front/js/create-property.js' , __FILE__ ), array('jquery'));
                wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
                break;

            case 'my-properties':
                // Main Scripts and Styles
                wp_enqueue_style( 'rem-bs-css', plugins_url( 'assets/admin/css/bootstrap.min.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-styles-css', plugins_url( 'assets/front/css/rem-styles.css' , __FILE__ ) );
                wp_enqueue_script( 'dashicons' );
                wp_enqueue_style( 'rem-myproperties-css', plugins_url( 'assets/front/css/my-properties.css' , __FILE__ ) );
                break;

            case 'search-property':
                // Main Scripts and Styles
                wp_enqueue_style( 'rem-bs-css', plugins_url( 'assets/admin/css/bootstrap.min.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-styles-css', plugins_url( 'assets/front/css/rem-styles.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-archive-css', plugins_url( 'assets/front/css/archive-property.css' , __FILE__ ) );
                
                wp_enqueue_style( 'rem-nouislider-css', plugins_url( 'assets/front/lib/nouislider.min.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-easydropdown-css', plugins_url( 'assets/front/lib/easydropdown.css' , __FILE__ ) );
                wp_enqueue_style( 'rem-labelauty-css', plugins_url( 'assets/front/lib/labelauty.css' , __FILE__ ) );
                wp_enqueue_script( 'rem-labelauty', plugins_url( 'assets/front/lib/labelauty.min.js' , __FILE__ ), array('jquery'));
                wp_enqueue_script( 'rem-easy-drop', plugins_url( 'assets/front/lib/jquery.easydropdown.min.js' , __FILE__ ), array('jquery'));
                wp_enqueue_script( 'rem-nouislider-drop', plugins_url( 'assets/front/lib/nouislider.all.min.js' , __FILE__ ), array('jquery'));

                wp_enqueue_script( 'rem-imagefill-js', plugins_url( 'assets/front/lib/imagefill.min.js' , __FILE__ ), array('jquery'));   
                wp_enqueue_script( 'rem-imagesloaded-js', plugins_url( 'assets/front/lib/imagesloaded.min.js' , __FILE__ ), array('jquery'));

                $rem_settings = get_option( 'rem_all_settings' );
                
                wp_enqueue_style( 'rem-search-css', plugins_url( 'assets/front/css/search-property.css' , __FILE__ ) );

                $script_settings = array(
                    'price_min'         => (isset($rem_settings['minimum_price']) && $rem_settings['minimum_price'] != '') ? $rem_settings['minimum_price'] : '350',
                    'price_max'         => (isset($rem_settings['maximum_price']) && $rem_settings['maximum_price'] != '') ? $rem_settings['maximum_price'] : '45000', 
                    'price_min_default' => (isset($rem_settings['default_minimum_price']) && $rem_settings['default_minimum_price'] != '') ? $rem_settings['default_minimum_price'] : '7000', 
                    'price_max_default' => (isset($rem_settings['default_maximum_price']) && $rem_settings['default_maximum_price'] != '') ? $rem_settings['default_maximum_price'] : '38500', 
                    'price_step'        => (isset($rem_settings['price_step']) && $rem_settings['price_step'] != '') ? $rem_settings['price_step'] : '10',
                    'currency_symbol'   => (isset($rem_settings['currency']) && $rem_settings['currency'] != '') ? $rem_settings['currency'] : '$',
                );
                wp_enqueue_script( 'rem-search-script', plugins_url( 'assets/front/js/search-property.js' , __FILE__ ), array('jquery'));
                wp_localize_script( 'rem-search-script', 'rem_ob', $script_settings );                
                
                break;
            
            default:
                # code...
                break;
        }
    }
}
?>