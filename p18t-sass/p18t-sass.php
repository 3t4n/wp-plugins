<?php
/*
Plugin Name: P18T Sass
Plugin URI: http://programmierwerkstatt.com/plugins/wordpress/p18t-sass/
Description: Integrates PHamlP Sass Feature; see: http://code.google.com/p/phamlp/
Version: 1.0.0
Author: Johannes Lichtenwallner
Author URI: http://programmierwerkstatt.com/handwerker/johannes-lichtenwallner/
License: New BSD License
*/


add_action('admin_menu', 'p18t_sass_options_page');
add_action('after_setup_theme', 'p18t_sass_enqueue_stylesheet');

function p18t_sass_options_page() {
    add_options_page('P18T Sass', 'P18T Sass', 'administrator','p18t_sass', 'p18t_sass_options_page_display');
    add_action( 'admin_init', 'p18t_sass_register_settings' );
}

function p18t_sass_register_settings() {
    require_once dirname(__FILE__) . '/src/P18T/Sass/SettingsValidator.php';
    $validator = new P18T_Sass_SettingsValidator();
    register_setting('p18t_sass_option_group', 'p18t_sass_scss_file', array($validator, 'validateScssFile'));
    register_setting('p18t_sass_option_group', 'p18t_sass_css_file', array($validator, 'validateCssFile'));
    register_setting('p18t_sass_option_group', 'p18t_sass_style', array($validator, 'validateStyle'));
    register_setting('p18t_sass_option_group', 'p18t_sass_syntax', array($validator, 'validateSyntax'));
    register_setting('p18t_sass_option_group', 'p18t_sass_depends', array($validator, 'validateDepends'));
}

function p18t_sass_options_page_display() {
    $styles = array('nested', 'expanded', 'compact', 'compressed');
    $syntaxes = array('sass', 'scss');
    include dirname(__FILE__) . '/view/settings.php';
}

function p18t_sass_enqueue_stylesheet()
{
    if (is_admin()) {
        return;
    }
    $cssFilename = get_option('p18t_sass_css_file');
    $cssPath = get_stylesheet_directory() . '/' . $cssFilename;
    $depends = array();
    $dependsString = get_option('p18t_sass_depends', '');
    if (0 < strlen($dependsString)) {
        $depends = explode(',', $dependsString);
    }

    if (is_readable($cssPath)) {
        wp_register_style(
            'p18t-sass-' . $cssFilename,
            get_stylesheet_directory_uri() . '/' . $cssFilename,
            $depends,
            filemtime(get_stylesheet_directory() .'/' . $cssFilename),
            'all'
        );
        wp_enqueue_style('p18t-sass-' . $cssFilename);
        p18t_sass_update();
    }
}

function p18t_sass_update()
{
    $source = get_stylesheet_directory() . '/' . get_option('p18t_sass_scss_file');
    $target = get_stylesheet_directory() . '/' . get_option('p18t_sass_css_file');

    if ((is_readable($source)) and (is_writable($target))) {
        if (filemtime($source) > filemtime($target)) {
            require_once dirname(__FILE__) . '/sass/SassParser.php';
            $options = array(
                'cache' => false,
                'style' => get_option('p18t_sass_style', 'compressed'),
                'syntax' => get_option('p18t_sass_syntax', 'scss'),
                'extensions' => array(
                    'compass' => array(''),
                )
            );
            $sass = new SassParser($options);
            $css = $sass->toCss($source, true);
            file_put_contents($target, $css);
        }
    }
}