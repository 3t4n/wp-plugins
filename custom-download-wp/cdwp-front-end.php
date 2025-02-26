<?php
if (get_option('cdwp_default_style') == 0)
{
    add_action('wp_enqueue_scripts', 'enqueue_cdwp_styles', 100);
    function enqueue_cdwp_styles()
    {
        wp_enqueue_style('cdwp-style', plugin_dir_url(__FILE__) . 'css/cdwp-style.css');
    }

}

