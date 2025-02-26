<?php

use Ambikly\Constants;

if (!defined('ABSPATH')) {
    exit;
}


if (!function_exists('ambikly_get_template')) {

    function ambikly_get_template($template_name, $args = array(), $template_path = '', $default_path = '')
    {
        $template_name = str_replace('.php', '', $template_name);

        $template_name = str_replace('.', '/', $template_name);

        $template_name .= '.php';

        $cache_key = sanitize_key(implode('-', array('template', $template_name, $template_path, $default_path)));

        $template = wp_cache_get($cache_key, 'ambikly');

        // Cache miss: locate the template.
        if (!$template) {
            $template = ambikly_locate_template($template_name, $template_path, $default_path);
            wp_cache_set($cache_key, $template, 'ambikly');
        }


        // Allow filtering of the template file.
        $template = apply_filters('ambikly_get_template', $template, $template_name, $args, $template_path, $default_path);
        // If the filtered template doesn't exist, throw a warning.

        if (!file_exists($template)) {
            _doing_it_wrong(__FUNCTION__, sprintf(esc_html__('%s does not exist.', 'ambikly'), '<code>' . $template . '</code>'), '1.0.0');

            return;
        }

        // Extract arguments for the template if available.
        if (!empty($args) && is_array($args)) {
            if (isset($args['action_args'])) {
                _doing_it_wrong(__FUNCTION__, esc_html__('action_args should not be overwritten.', 'ambikly'), '1.0.0');
                unset($args['action_args']);
            }
            extract($args); // @codingStandardsIgnoreLine: using extract for template variables.
        }

        // Execute actions before and after the template is included.
        do_action('ambikly_before_template_part', $template_name, $template_path, $template, $args);

        include $template;

        do_action('ambikly_after_template_part', $template_name, $template_path, $template, $args);
    }
}

if (!function_exists('ambikly_locate_template')) {
    function ambikly_locate_template($template_name, $template_path = '', $default_path = '')
    {

        // Set default paths if not provided.
        $template_path = $template_path ?: 'ambikly/';
        $default_path = $default_path ?: untrailingslashit(plugin_dir_path(AMBIKLY_FILE)) . '/templates/';;

        // Check within the theme first.
        $template = locate_template(
            array(
                trailingslashit($template_path) . $template_name,
                $template_name,
            )
        );


        // Fallback to plugin's default template path.
        if (!$template) {
            $template = $default_path . $template_name;
        }

        // Allow filters to modify the template location.
        return apply_filters('ambikly_locate_template', $template, $template_name, $template_path);
    }
}

function ambikly_is_page($page_type = Constants::AMBIKLY_PRODUCT_TYPE)
{

    $ambikly_type = get_query_var('ambikly_type');

    $slug = get_query_var('name');

    if ($ambikly_type && $slug) {

        if ($ambikly_type === $page_type && $slug !== '') {

            return true;
        }
    }

    return false;
}