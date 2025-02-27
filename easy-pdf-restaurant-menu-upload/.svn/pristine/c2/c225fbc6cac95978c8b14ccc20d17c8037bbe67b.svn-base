<?php

class admin_settings_nsc_eprm
{
    private $settings;
    private $prefix;
    private $plugin_dir;
    private $plugin_configs;

    public function __construct()
    {
        $this->plugin_dir = PLUGIN_PATH_nsc_eprm;
        $this->plugin_configs = new plugin_configs_nsc_eprm();
    }

    public function return_default_menu_types_nsc_eprm()
    {
        $menutypes = array(array("menutype" => "lunch", "menutypename" => "Lunch"), array("menutype" => "general", "menutypename" => "General"));
        $menutypes = apply_filters("menu_types_nsc_eprm", $menutypes);
        // for add on 1.0 compatibility
        if (isset($menutypes[0]) && !isset($menutypes[0]["menutype"])) {
            $compMenuType = array();
            foreach ($menutypes as $menuTypeType) {
                $compMenuType[] = array("menutype" => $menuTypeType, "menutypename" => $menuTypeType);
            }
            $menutypes = $compMenuType;
        }
        return $menutypes;
    }

    public function set_plugin_config_settings_nsc_eprm()
    {
        $this->settings = $this->plugin_configs->return_plugin_configs_without_db_settings_nsc_eprm();
        $this->prefix = $this->settings->plugin_prefix;
    }

    public function execute_wordpress_actions_nsc_eprm()
    {
        $this->set_plugin_config_settings_nsc_eprm();
        add_action('admin_init', array($this, 'register_settings_nsc_eprm'));
        add_action('admin_menu', array($this, 'add_admin_menu_nsc_eprm'));
    }

    public function create_admin_page_nsc_eprm()
    {
        $easy_pdf_restaurant_menu = new nsc_easy_pdf_restaurant_menu();
        $menutypes = $this->return_default_menu_types_nsc_eprm();

        $easy_pdf_restaurant_menu->nsc_eprm_cleanup_unused_entries_and_files($menutypes);

        foreach ($menutypes as $menutype) {
            $current_filename = $this->plugin_configs->get_option_nsc_eprm($menutype['menutype'] . "_orifilename", "none");
            if ($current_filename === "none") {
                $this->plugin_configs->replace_variables_in_config_nsc_eprm("current_" . $menutype['menutype'] . "_menu_filename", "<br>" . esc_attr($this->plugin_configs->get_option_nsc_eprm($menutype['menutype'] . "_orifilename", "none")));
                continue;
            }
            $this->plugin_configs->replace_variables_in_config_nsc_eprm("current_" . $menutype['menutype'] . "_menu_filename", "<br><a href='" . $easy_pdf_restaurant_menu->nsc_eprm_return_download_url($menutype['menutype'], true) . "' target='_blank'>" . esc_attr($this->plugin_configs->get_option_nsc_eprm($menutype['menutype'] . "_orifilename", "none")) . "</a>");
        }
        $this->plugin_configs->replace_variables_in_config_nsc_eprm("custom text for uploader", esc_html($this->plugin_configs->get_option_nsc_eprm("text_for_uploader")));
        $this->plugin_configs->replace_variables_in_config_nsc_eprm("premium-addon-advertisment", "<strong>You need more menus? Want to get rid of this message? Check the premium addon for unlimited number of menus: <a href='https://beautiful-wp.com/' target='_blank'>beautiful-wp.com</a></strong>");

        $settings_object = $this->plugin_configs->return_plugin_configs_nsc_eprm();
        $form_fields = new admin_html_formfields_nsc_eprm;
        require $this->plugin_dir . "/admin/tpl/admin.php";
    }

    /* for 1.2 to 1.3 */
    private function nsc_eprm_migrate_user_role()
    {
        $role = get_role('nsc_erpm_manage_rest_menu_role');
        if (!empty($role)) {
            add_role(
                'upload_menu_nsc_eprm',
                'Restaurant Menu Uploader',
                array('read' => true, "view_admin_dashboard" => true)
            );
            remove_role('nsc_erpm_manage_rest_menu_role');
        }

        /* for 1.5 to 1.6 */
        $role = get_role('upload_menu_nsc_eprm');
        if ($role->has_cap('upload_restaurant_menu_nsc_eprm') === false) {
            $role->add_cap('upload_restaurant_menu_nsc_eprm');
        }
    }

    public function add_admin_menu_nsc_eprm()
    {
        add_media_page($this->settings->settings_page_configs->page_title, $this->settings->settings_page_configs->menu_title, $this->settings->settings_page_configs->capability, $this->settings->plugin_slug, array($this, "create_admin_page_nsc_eprm"));
    }

    public function register_settings_nsc_eprm()
    {
        $easy_pdf_restaurant_menu = new nsc_easy_pdf_restaurant_menu();
        $files_to_save = array("lunch" => "nsc_eprm_uploadfile_lunch", "general" => "nsc_eprm_uploadfile_general");
        $files_to_save = apply_filters("files_to_save_nsc_eprm", $files_to_save);
        foreach ($files_to_save as $type => $file_to_save) {
            if (isset($_FILES[$file_to_save]['name']) && !empty($_FILES[$file_to_save]['name'])) {
                // Form data sent
                $easy_pdf_restaurant_menu->nsc_eprm_save_menu($type, $_FILES[$file_to_save]);
            }
        }
        //settings werden mit db values angereichert
        $this->settings = $this->plugin_configs->return_plugin_configs_nsc_eprm();
        $input_cleaner = new clean_input_validation_nsc_eprm();

        foreach ($this->settings->setting_page_fields->tabs as $tab) {
            foreach ($tab->tabfields as $field) {
                $functionForValidation = array($input_cleaner, "sanitize_user_input_nsc_eprm");
                if ($field->extra_validation_name !== false) {
                    $functionForValidation = array($input_cleaner, $field->extra_validation_name);
                    $functionForValidation = apply_filters('function_for_extra_validation_nsc_eprm', $functionForValidation, $field->extra_validation_name);
                }
                if ($field->save_in_db === true && $this->current_user_can_nsc_eprm($tab->capability) === true) {
                    register_setting($this->settings->plugin_slug . $tab->tab_slug, $this->prefix . $field->field_slug, $functionForValidation);
                }
            }
        }
        $this->nsc_eprm_migrate_user_role();
    }

    private function current_user_can_nsc_eprm($capabilities)
    {
        if (is_string($capabilities)) {
            $capabilities = array($capabilities);
        }

        foreach ($capabilities as $capability) {
            if (current_user_can($capability) === true) {
                return true;
            }
        }
        return false;
    }

    public function add_settings_link_nsc_eprm($links)
    {
        $settings_link = '<a href="upload.php?page=' . $this->settings->plugin_slug . '">' . __('Settings') . '</a>';
        array_push($links, $settings_link);
        return $links;
    }

}
