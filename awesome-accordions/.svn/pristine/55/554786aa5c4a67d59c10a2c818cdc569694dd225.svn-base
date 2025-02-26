<?php

class Awesome_Accordions_Tabs
{

    private $tabs;
    private $plugin_name;

    public function __construct($plugin_name) {

        $this->plugin_name = $plugin_name;

        add_filter("aws_acc_get_tabs", array($this, "fn_aws_acc_get_tabs"), 10, 1);
        add_filter("aws_acc_include_setting_tab", array($this, "fn_aws_acc_include_setting_tab"), 10);
        
    }

    public function init_tabs() {

        $tabs = apply_filters("aws_acc_get_tabs", array());

        $current = filter_input(INPUT_GET, "tab", FILTER_DEFAULT);
        $current = ( $current !== NULL ? $current : "general" );

        include __DIR__ . "/partials/tabs/main.php";
    }

    public function fn_aws_acc_get_tabs($tabs) {

        return array(
            'general' => __('General', $this->plugin_name),
            'scripts' => __('Scripts', $this->plugin_name),
            'views'   => __('Views', $this->plugin_name),
        );
    }

    public function fn_aws_acc_include_setting_tab() {

        $current = filter_input(INPUT_GET, 'tab', FILTER_SANITIZE_STRING);
        $current = ( $current ? $current : "general" );

        if (!empty($_POST))
        {
            $this->update_tab_settings($current);
        }

        ob_start();

        if ($current === "scripts")
        {

            $this->check_legacy("1.0.5");
            $scripts = get_option('awesome-accordions-scripts');
        }
        else if ($current === "general")
        {
            $options = get_option('awesome-accordions-options');
        }
        else if ($current === "views")
        {
            $views = get_option('awesome-accordions-views');
        }

        include __DIR__ . "/partials/tabs/$current.php";
        return ob_get_clean();
    }

    public function settings_active_checked($key) {

        $settings = get_option("aws_team_showcase_active_cssjs", true);

        if (!is_array($settings) || empty($settings))
        {
            $settings = array(
                "css" => 1,
                "js"  => 1,
            );
        }

        if (is_array($settings) && !empty($settings) && isset($settings[$key]) && intval($settings[$key]) > 0)
        {
            return "checked";
        }
    }

    public function update_tab_settings($current) {

        if ($current === "general")
        {
            $input_post = filter_input(INPUT_POST, "awesome-accordions-options", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $this->update_settings("general", $input_post);
        }
        else if ($current === "scripts")
        {
            $input_post = filter_input(INPUT_POST, "awesome-accordions-scripts", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $this->update_settings("scripts", $input_post);
        }
        else if ($current === "views")
        {
            $input_post = filter_input(INPUT_POST, "awesome-accordions-views", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $this->update_settings("views", $input_post);
        }
    }

    private function update_settings($tab, $input_post) {

        if ($tab === "general")
        {
            update_option("awesome-accordions-options", $input_post);
        }
        else if ($tab === "scripts")
        {
            update_option("awesome-accordions-scripts", $input_post);
        }
        else if ($tab === "views")
        {
            update_option("awesome-accordions-views", $input_post);
        }
    }

    private function check_legacy($version) {
        
        if ($version === "1.0.5")
        {
            // Changed script tab and script loading keys.

            $options = get_option('awesome-accordions-options');
            $scripts = get_option('awesome-accordions-scripts');

            if (isset($options['awesome_acc_load_css']) && !isset($scripts['css']))
            {
                // not migrated yet.
                $scripts["css"] = $options['awesome_acc_load_css'];
                update_option("awesome-accordions-options", $scripts);
            }
            
        }
    }

}
