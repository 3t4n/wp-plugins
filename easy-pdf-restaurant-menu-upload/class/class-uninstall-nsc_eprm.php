<?php

class uninstaller_nsc_eprm
{
    private $plugin_configs;
    private $plugin_upload_path;

    public function __construct()
    {
        $this->plugin_configs = new plugin_configs_nsc_eprm;
        $this->plugin_upload_path = $this->plugin_configs->return_plugin_upload_base_dir_nsc_eprm();
    }

    public function delete_options_nsc_eprm()
    {
        $bannersettings_option_names = $this->get_all_settings_nsc_eprm();
        foreach ($bannersettings_option_names as $name) {
            delete_option($name);
        }
        return true;
    }

    public function remove_directory_nsc_eprm($target = null)
    {
        if (empty($target)) {
            $target = $this->plugin_upload_path;
        }

        if (is_dir($target)) {
            $files = glob($target . '*', GLOB_MARK); //GLOB_MARK adds a slash to directories returned

            foreach ($files as $file) {
                $this->remove_directory_nsc_eprm($file);
            }

            rmdir($target);
        } elseif (is_file($target)) {
            unlink($target);
        }
    }

    private function get_all_settings_nsc_eprm()
    {
        global $wpdb;
        $options = $wpdb->get_results("select * from $wpdb->options where option_name like 'nsc_eprm_%' or option_name like '%_nsc_eprm'");
        $names = array();
        foreach ($options as $option) {
            $names[] = $option->option_name;
        }
        return $names;
    }
}
