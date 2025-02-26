<?php

class FHDisableRecaptcha {

    public function __construct() {
        add_action( 'admin_init', array($this,'fh_dr_register_settings') );
        add_action( 'admin_menu', array($this,'fh_dr_register_options_page') );
        add_action( 'wp_enqueue_scripts', array($this,'fh_dr_frontend_scripts'),15 );
        //add_action( 'wp_print_scripts', array($this,'fh_dr_frontend_print_scripts') );
        add_action( 'template_redirect', array($this,'fh_dr_frontend_print_scripts') );
        add_action( 'admin_enqueue_scripts', array($this,'fh_dr_admin_scripts') );
        add_filter( 'plugin_action_links_'.FH_DISABLE_RECAPTCHA_BASE_FILE, array( $this,'fh_dr_add_plugin_page_settings_link') );
        register_activation_hook( FH_DISABLE_RECAPTCHA_BASE_FILE, array( $this,'fh_dr_redirect_to_settings_page' ) );
    }

    public function fh_dr_register_settings() {
        register_setting( 'fh_disable_recaptcha', 'dr_options' );
        if (get_option('fh_dr_do_activation_redirect', false)) {
            delete_option('fh_dr_do_activation_redirect');
            add_option('fh_dr_show_activation_msg', true);
            exit( wp_redirect("options-general.php?page=disable-recaptcha-cf7") );
        }
    }

    public function fh_dr_register_options_page() {
        add_options_page( 'Disable Google Recaptcha CF7', 'Disable Recatcha - CF7', 'manage_options', 'disable-recaptcha-cf7', array($this, 'fh_dr_options_page') );
    }

    public function fh_dr_redirect_to_settings_page() {
        add_option('fh_dr_do_activation_redirect', true);
    }

    public function fh_dr_options_page() {
        include( FH_DISABLE_RECAPTCHA_PATH."/templates/admin/disable-recaptcha.php" );
    }

    public function fh_dr_get_post_types_by_taxonomy( $taxonomy = '' ) {
        global $wp_taxonomies;
        if ( isset( $wp_taxonomies[ $taxonomy ] ) ) {
            return $wp_taxonomies[ $taxonomy ]->object_type;
        }
        return array();
    }

    public function fh_dr_frontend_scripts() {
        global $post;
        $dr_options = get_option('dr_options');
        $hide_enqueue = false;
        $complete_hide = false;
        if(is_singular()) {
            $post_type = get_post_type( $post->ID );
            $dr_option_value = $dr_options['hide_dr_'.$post_type];            
            if(!empty($dr_option_value)) {
                if($dr_option_value == 'hide') {
                    $hide_enqueue = true;
                }
                if($dr_option_value == 'fhide') {
                    $complete_hide = true;
                }
                else if($dr_option_value == 'hide_custom') {
                    $selection = $dr_options['selected_hide_dr_'.$post_type];
                    if(count($selection)) {
                        if(in_array($post->ID,$selection)) {
                            $hide_enqueue = true;
                        }
                    }
                }
            }
            else {
                $dr_option_value = $dr_options['hide_dr_global'];
                if(empty($dr_option_value)) {
                    $dr_option_value = 'hide';
                }
                if($dr_option_value == 'hide') {
                    $hide_enqueue = true;
                }
                else if($dr_option_value == 'fhide') {
                    $complete_hide = true;
                }
            }
        }
        else if(is_archive()) {
            $tax = get_queried_object();
            $post_type = $this->fh_dr_get_post_types_by_taxonomy($tax->taxonomy);
            if(count($post_type)) {
                $post_type = $post_type[0];
                $dr_option_value = $dr_options['hide_dr_archive_'.$post_type];
                if(!empty($dr_option_value)) {
                    if($dr_option_value == 'hide') {
                        $hide_enqueue = true;
                    }
                    if($dr_option_value == 'fhide') {
                        $hide_enqueue = true;
                    }
                }
                else {
                    $dr_option_value = $dr_options['hide_dr_archive_global'];
                    if(empty($dr_option_value)) {
                        $dr_option_value = 'hide';
                    }
                    if($dr_option_value == 'hide') {
                        $hide_enqueue = true;
                    }
                    else if($dr_option_value == 'fhide') {
                        $complete_hide = true;
                    }
                }
            }
        }
        if($hide_enqueue) {
            wp_enqueue_style('dr-style',FH_DISABLE_RECAPTCHA_URL.'assets/css/dr.css',array(),time());
            wp_enqueue_script('dr-script',FH_DISABLE_RECAPTCHA_URL.'assets/js/dr.js',array('jquery','wpcf7-recaptcha'),time(),true);
        }
        else if($complete_hide) {
            wp_enqueue_style('dr-style',FH_DISABLE_RECAPTCHA_URL.'assets/css/dr.css',array(),time());
        }
    }

    public function fh_dr_frontend_print_scripts() {
        $dr_options = get_option('dr_options');
        $remove_dr = false;
        if(is_singular()) {
            global $post;
            $post_type = get_post_type( $post->ID );
            $dr_option_value = $dr_options['hide_dr_'.$post_type];            
            if(!empty($dr_option_value)) {
                if($dr_option_value == 'remove') {
                    $remove_dr = true;
                }
                else if($dr_option_value == 'remove_custom') {
                    $selection = $dr_options['selected_remove_dr_'.$post_type];
                    if(count($selection)) {
                        if(in_array($post->ID,$selection)) {
                            $remove_dr = true;
                        }
                    }
                }
            }
            else {
                $dr_option_value = $dr_options['hide_dr_global'];
                if($dr_option_value == 'remove') {
                    $remove_dr = true;
                }
            }
        }
        else if(is_archive()) {
            $tax = get_queried_object();
            $post_type = $this->fh_dr_get_post_types_by_taxonomy($tax->taxonomy);
            if(count($post_type)) {
                $post_type = $post_type[0];
                $dr_option_value = $dr_options['hide_dr_archive_'.$post_type];
                if(!empty($dr_option_value)) {
                    if($dr_option_value == 'remove') {
                        $remove_dr = true;
                    }
                }
                else {
                    $dr_option_value = $dr_options['hide_dr_archive_global'];
                    if($dr_option_value == 'remove') {
                        $remove_dr = true;
                    }
                }
            }
        }
        if($remove_dr) {
            //wp_dequeue_script('google-recaptcha');
            remove_action( 'wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts', 20, 0 );
        }
    }

    public function fh_dr_add_plugin_page_settings_link( $links ) {
        $deactivate = $links['deactivate'];
        unset($links['deactivate']);
        $links[] = '<a href="' .admin_url( 'options-general.php?page=disable-recaptcha-cf7' ) .'">' . __('Settings') . '</a>';
        $links['deactivate'] = $deactivate;
	    return $links;
    }

    public function fh_dr_admin_scripts() {
        wp_enqueue_style('dr-admin-multi',FH_DISABLE_RECAPTCHA_URL.'assets/css/admin/multi.min.css', array(),'1.0');
        wp_enqueue_style('dr-admin-style',FH_DISABLE_RECAPTCHA_URL.'assets/css/admin/style.css', array(),time());
        wp_enqueue_script('dr-admin-multi',FH_DISABLE_RECAPTCHA_URL.'assets/js/admin/multi.min.js', array('jquery'),'1.0');
        wp_enqueue_script('dr-admin-script',FH_DISABLE_RECAPTCHA_URL.'assets/js/admin/admin-dr.js', array('jquery'),time());
    }

}