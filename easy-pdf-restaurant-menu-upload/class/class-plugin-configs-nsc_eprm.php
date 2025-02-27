<?php

class plugin_configs_nsc_eprm
{
    private $config_file_path;
    private $configs_as_object;
    private $configs_as_object_without_db;
    private $active_tab;

    public function get_option_nsc_eprm($option_slug, $default = false)
    {
        $option_value = $default;
        $found = false;
        $settings_for_options = $this->return_plugin_configs_without_db_settings_nsc_eprm();
        foreach ($settings_for_options->setting_page_fields->tabs as $tab) {
            foreach ($tab->tabfields as $field) {
                if ($field->field_slug === $option_slug) {
                    $option_value = get_option($settings_for_options->plugin_prefix . $option_slug, $field->pre_selected_value);
                    $found = true;
                    break;
                }
            }
        }
        if ($found === false) {
            $option_value = get_option($settings_for_options->plugin_prefix . $option_slug, $option_value);
        }
        return $option_value;
    }

    public function plugin_prefix_nsc_eprm()
    {
        $this->return_plugin_configs_without_db_settings_nsc_eprm();
        return $this->configs_as_object_without_db->plugin_prefix;
    }

    public function plugin_slug_nsc_eprm()
    {
        $this->return_plugin_configs_without_db_settings_nsc_eprm();
        return $this->configs_as_object_without_db->plugin_slug;
    }

    public function return_plugin_configs_nsc_eprm()
    {
        if (empty($this->configs_as_object)) {
            $this->configs_as_object = $this->return_plugin_configs_without_db_settings_nsc_eprm();
            $this->add_current_setting_values();
            $this->add_html_description_templates();
        }
        return $this->configs_as_object;
    }

    public function return_plugin_configs_without_db_settings_nsc_eprm()
    {
        if (empty($this->configs_as_object_without_db)) {
            $this->configs_as_object_without_db = $this->read_config_file();
            if (empty($this->configs_as_object_without_db)) {
                throw new Exception($this->config_file_path . " was not readable. Make sure it contains valid json.");
            }
        }
        return $this->configs_as_object_without_db;
    }

    public function return_settings_field_nsc_eprm($searched_field_slug)
    {
        $this->return_plugin_configs_nsc_eprm();
        foreach ($this->configs_as_object->setting_page_fields->tabs as $tab) {
            $number_of_fields = count($tab->tabfields);
            for ($i = 0; $i < $number_of_fields; $i++) {
                if ($tab->tabfields[$i]->field_slug == $searched_field_slug) {
                    return $tab->tabfields[$i];
                }
            }
        }
    }

    public function return_plugin_upload_base_dir_nsc_eprm()
    {
        $uploadDirArray = wp_upload_dir();

        $defaultUploadDirPath = realpath($uploadDirArray['basedir']);

        $resultToReturn = $defaultUploadDirPath . "/" . $this->plugin_slug_nsc_eprm() . "/";
        if (!is_dir($resultToReturn)) {
            mkdir($resultToReturn);
        }
        return $resultToReturn;
    }

    public function replace_variables_in_config_nsc_eprm($varname, $replace_value)
    {
        $configs = $this->return_plugin_configs_nsc_eprm();
        $configs_string = json_encode($configs, JSON_UNESCAPED_UNICODE);
        $configs_string = apply_filters("filter_replace_variables_in_config_nsc_eprm", $configs_string);
        $configs_string = str_replace("{{" . $varname . "}}", $replace_value, $configs_string);
        $this->configs_as_object = json_decode($configs_string);
    }

    private function read_config_file()
    {
        $this->config_file_path = PLUGIN_CONFIGS_PATH_nsc_eprm;
        $settings = file_get_contents($this->config_file_path);
        $settings = apply_filters('plugin_settings_as_string_nsc_eprm', $settings);
        $settings = json_decode($settings);
        if (empty($settings)) {
            throw new Exception($this->config_file_path . " was not readable. Make sure it contains valid json.");
        }
        $settings = apply_filters('plugin_settings_as_object_nsc_eprm', $settings);
        return $settings;
    }

    private function get_active_tab()
    {
        $this->active_tab = "";
        if (isset($_GET["tab"])) {
            $this->active_tab = $_GET["tab"];
        } else {
            $this->active_tab = $this->configs_as_object->setting_page_fields->tabs[0]->tab_slug;
        }
    }

    private function add_html_description_templates()
    {
        $number_of_tabs = count($this->configs_as_object->setting_page_fields->tabs);
        if (strpos($this->configs_as_object->settings_page_configs->description, ".html") !== false &&
            file_exists(PLUGIN_PATH_nsc_eprm . "/admin/tpl/" . $this->configs_as_object->settings_page_configs->description)) {
            $desc = file_get_contents(PLUGIN_PATH_nsc_eprm . "/admin/tpl/" . $this->configs_as_object->settings_page_configs->description);
            $this->configs_as_object->settings_page_configs->description = $desc;
        }
        for ($t = 0; $t < $number_of_tabs; $t++) {
            if (strpos($this->configs_as_object->setting_page_fields->tabs[$t]->tab_description, ".html") !== false &&
                file_exists(PLUGIN_PATH_nsc_eprm . "/admin/tpl/" . $this->configs_as_object->setting_page_fields->tabs[$t]->tab_description)) {
                $tab_desc = file_get_contents(PLUGIN_PATH_nsc_eprm . "/admin/tpl/" . $this->configs_as_object->setting_page_fields->tabs[$t]->tab_description);
                $this->configs_as_object->setting_page_fields->tabs[$t]->tab_description = $tab_desc;
            }
        }
    }

    // this fuctions gets the value saved in wordpress db using get_option
    // and adds it to the config object in the pre_selected_value field.
    // if no value is set it sets the default value from config file.
    private function add_current_setting_values()
    {
        $this->get_active_tab();
        $this->configs_as_object->setting_page_fields->active_tab_slug = $this->active_tab;
        $number_of_tabs = count($this->configs_as_object->setting_page_fields->tabs);
        for ($t = 0; $t < $number_of_tabs; $t++) {
            $number_of_fields_in_this_tab = count($this->configs_as_object->setting_page_fields->tabs[$t]->tabfields);
            if ($this->active_tab == $this->configs_as_object->setting_page_fields->tabs[$t]->tab_slug) {
                $this->configs_as_object->setting_page_fields->tabs[$t]->active = true;
                $this->configs_as_object->setting_page_fields->active_tab_index = $t;
            }
            for ($f = 0; $f < $number_of_fields_in_this_tab; $f++) {
                $option_slug = $this->configs_as_object->plugin_prefix . $this->configs_as_object->setting_page_fields->tabs[$t]->tabfields[$f]->field_slug;
                $default_value = $this->configs_as_object->setting_page_fields->tabs[$t]->tabfields[$f]->pre_selected_value;
                $wp_option_value = get_option($option_slug, $default_value);
                $this->configs_as_object->setting_page_fields->tabs[$t]->tabfields[$f]->pre_selected_value = $wp_option_value;
            }
        }
    }
}
