<?php

class Awesome_Accordions_Public
{

    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;

        add_shortcode("awesome-accordions", array($this, "display_awesome_accordions"));

        add_filter('wpseo_sitemap_exclude_post_type', array($this, 'sitemap_exclude_post_type'), 10, 2);

        add_filter("the_content", array($this, "content_filter"));
    }

    public function enqueue_styles() {

        $options = get_option('awesome-accordions-options');
        $scripts = get_option('awesome-accordions-scripts');

        if (isset($options['awesome_acc_load_css']) && !isset($scripts['css']))
        {
            // not migrated yet.
            $scripts["css"] = $options['awesome_acc_load_css'];
            update_option("awesome-accordions-options", $scripts);
        }

        if (isset($scripts['css']) && intval($scripts['css']) == 1)
        {
            wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/awesome-accordions-public.css', array(), $this->version, 'all');
        }
    }

    public function enqueue_scripts() {

        $scripts = get_option('awesome-accordions-scripts');

        if (isset($scripts['js']) && intval($scripts['js']) == 1)
        {
            wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/awesome-accordions-public.js', array('jquery'), $this->version, true);
        }
    }

    public function display_awesome_accordions($atts) {

        ob_start();

        if (!is_array($atts) || empty($atts))
        {
            return ob_get_clean();
        }

        $accordion_id = $atts["id"];

        $tabs_option_enabled = get_post_meta($accordion_id, "aws_acc_tabs", true);

        if ($tabs_option_enabled == 1)
        {

            require_once ABSPATH . '/wp-content/plugins/awesome-accordions-pro/public/partials/tabs.php';
        }
        else
        {

            $tab_opened = isset($atts["first_tab_opened"]) ? $atts["first_tab_opened"] : '';
            $multi_flag = isset($atts["multi-panels"]) && $atts["multi-panels"] === "true" ? true : false;

            $toggle_show_flag = false;

            $toggle_shortcode = isset($atts["toggle"]) ? $atts["toggle"] : '';

            if ($toggle_shortcode !== "")
            {
                $toggle_show_flag = filter_var($toggle_shortcode, FILTER_VALIDATE_BOOLEAN);
            }

            if (function_exists("icl_object_id"))
            {
                $accordion_id = icl_object_id($accordion_id, get_post_type($accordion_id), true, ICL_LANGUAGE_CODE);
            }

            $theme_card = get_stylesheet_directory() . "/awesome-accordion/default.php";

            if (file_exists($theme_card))
            {
                include $theme_card;
            }
            else
            {

                include __DIR__ . "/partials/default-view.php";
            }
        }

        return ob_get_clean();
    }

    function sitemap_exclude_post_type($value, $post_type) {
        if ($post_type == 'aws-accordions')
            return true;
    }

    public function content_filter($content) {

        global $post;
        $post_id = $post->ID;

        $views = get_option('awesome-accordions-views');

        if (isset($views["posts"]) && $views["posts"] === "yes")
        {

            $shortcode = do_shortcode("[awesome-accordions id='$post_id']");
            $content   = $content . $shortcode;
        }

        return $content;
    }

}
