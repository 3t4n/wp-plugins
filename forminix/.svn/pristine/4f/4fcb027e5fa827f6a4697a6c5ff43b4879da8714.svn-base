<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('ForminixAdmin')) {
    class ForminixAdmin
    {

        public $utils;
        public $settings;

        public function __construct()
        {
            $this->utils = new ForminixUtils($this);
            $this->settings = new ForminixSettings($this);
            new ForminixAdminAjax($this);

            add_action("admin_menu", array($this, 'forminix_admin_menu'));
            add_action('admin_enqueue_scripts', array($this, 'forminix_admin_enqueue'));
            add_action( 'plugin_action_links_' . FORMINIX_BASE_PATH, array( $this, 'forminix_action_links') );
        }

        function forminix_action_links($links) {
            $settings_url = add_query_arg( 'page', 'forminix-dashboard', get_admin_url() . 'admin.php' );
            $setting_arr = array('<a href="' . esc_url( $settings_url ) . '">Dashboard</a>');
            $links = array_merge($setting_arr, $links);
            return $links;
        }


        function forminix_admin_menu()
        {
            $icon_url = FORMINIX_IMG_DIR . "forminix_icon.svg";
            add_menu_page("Forminix", "Forminix", 'manage_options', "forminix-dashboard", array($this, 'forminix_admin_dashboard'), $icon_url, 6);
            add_submenu_page("forminix-dashboard", "Forminix", 'Dashboard', "manage_options", 'forminix-dashboard', array($this, 'forminix_admin_dashboard'));
            add_submenu_page("forminix-dashboard", "Modules", 'Modules', "manage_options", 'forminix-modules', array($this, 'forminix_admin_modules'));
        }



        function forminix_admin_enqueue( $page )
        {
            if($page == "toplevel_page_forminix-dashboard"){
                wp_enqueue_style('forminix-admin-main', FORMINIX_CSS_DIR.'admin_main.css', array(), FORMINIX_VERSION);
                wp_enqueue_style('forminix-admin-forms', FORMINIX_CSS_DIR.'admin_forms.css', array(), FORMINIX_VERSION);
                wp_enqueue_style('forminix-admin-entries', FORMINIX_CSS_DIR.'admin_entries.css', array(), FORMINIX_VERSION);
                wp_enqueue_style('forminix-admin-entry', FORMINIX_CSS_DIR.'admin_entry.css', array(), FORMINIX_VERSION);
                wp_enqueue_style('forminix-admin-datatable', FORMINIX_CSS_DIR.'dataTables.min.css', array(), FORMINIX_VERSION);
                wp_enqueue_style('forminix-admin-builder', FORMINIX_CSS_DIR.'admin_builder.css', array(), FORMINIX_VERSION);

                wp_enqueue_style('forminix-admin-settings', FORMINIX_CSS_DIR.'admin_settings.css', array(), FORMINIX_VERSION);
                wp_enqueue_style('forminix-admin-settings-email', FORMINIX_CSS_DIR.'admin_settings_email.css', array(), FORMINIX_VERSION);
                wp_enqueue_style('forminix-admin-settings-integration', FORMINIX_CSS_DIR.'admin_settings_integration.css', array(), FORMINIX_VERSION);


                wp_enqueue_script( 'forminix-admin-main', FORMINIX_JS_DIR.'admin_main.js', array('jquery'), FORMINIX_VERSION );
                wp_enqueue_script( 'forminix-admin-forms', FORMINIX_JS_DIR.'admin_forms.js', array('jquery'), FORMINIX_VERSION );
                wp_enqueue_script( 'forminix-admin-entries', FORMINIX_JS_DIR.'admin_entries.js', array('jquery'), FORMINIX_VERSION );
                wp_enqueue_script( 'forminix-admin-entry', FORMINIX_JS_DIR.'admin_entry.js', array('jquery'), FORMINIX_VERSION );
                wp_enqueue_script( 'forminix-admin-datatable', FORMINIX_JS_DIR.'dataTables.min.js', array('jquery'), FORMINIX_VERSION );
                wp_enqueue_script( 'forminix-admin-builder', FORMINIX_JS_DIR.'admin_builder.js', array('jquery', 'jquery-ui-sortable', 'jquery-ui-draggable', 'jquery-ui-droppable'), FORMINIX_VERSION );

                wp_enqueue_script( 'forminix-admin-settings', FORMINIX_JS_DIR.'admin_settings.js', array('jquery'), FORMINIX_VERSION );
                wp_enqueue_script( 'forminix-admin-settings-email', FORMINIX_JS_DIR.'admin_settings_email.js', array('jquery'), FORMINIX_VERSION );
                wp_enqueue_script( 'forminix-admin-settings-integration', FORMINIX_JS_DIR.'admin_settings_integration.js', array('jquery'), FORMINIX_VERSION );
                wp_enqueue_script( 'forminix-admin-settings-logic', FORMINIX_JS_DIR.'admin_settings_logic.js', array('jquery'), FORMINIX_VERSION );


                /* Load Modules Stylesheets and Scripts */
                $activated_modules = $this->settings->listAllModules();
                foreach ($activated_modules as $module_slug){
                    if($module_slug == "mailchimp"){
                        wp_enqueue_script( 'forminix-admin-module-mailchimp', FORMINIX_JS_DIR.'modules/admin_module_mailchimp.js', array('jquery'), FORMINIX_VERSION );
                    }
                    if($module_slug == "slack"){
                        wp_enqueue_script( 'forminix-admin-module-slack', FORMINIX_JS_DIR.'modules/admin_module_slack.js', array('jquery'), FORMINIX_VERSION );
                    }
                }
                /* Load Modules Stylesheets and Scripts */


                if(function_exists("wp_enqueue_editor")){
                    wp_enqueue_editor();
                    wp_add_inline_script( 'forminix-admin-main', 'const forminix_default_js_var = ' . json_encode( array(
                            'tinymce_code_plugin' => FORMINIX_JS_DIR.'tinymce_code_plugin.js',
                        ) ), 'before' );
                }


            }

            if($page == "forminix_page_forminix-modules"){
                wp_enqueue_style('forminix-admin-main', FORMINIX_CSS_DIR.'admin_main.css', array(), FORMINIX_VERSION);
                wp_enqueue_style('forminix-admin-modules', FORMINIX_CSS_DIR.'admin_modules.css', array(), FORMINIX_VERSION);
                wp_enqueue_script( 'forminix-admin-modules', FORMINIX_JS_DIR.'admin_modules.js', array('jquery'), FORMINIX_VERSION );
            }
        }


        function forminix_admin_dashboard()
        {
            include_once FORMINIX_PATH . "backend/templates/dashboard.php";
        }

        function forminix_admin_modules()
        {
            include_once FORMINIX_PATH . "backend/templates/modules.php";
        }

    }
}




if(is_admin()){
    new ForminixAdmin();
}