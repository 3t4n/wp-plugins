<?php

/**
 * @param
 * @return void
 * @author DemonIa sanchoclo@gmail.com
 * @function mightyforms_register_block
 * @description Needed for including .js and .css files of Gutenberg plugin
 */

function mightyforms_register_block()
{
    wp_register_script(
        'mightyforms_script_editor',
        plugins_url('./mightyforms_block/blocks.build.js', __FILE__),
        array('wp-blocks', 'wp-element', 'wp-components'),
        MF_VERSION,
        true
    );

    wp_register_style(
        'mightyforms_style_editor',
        plugins_url('./mightyforms_block/style_editor.css', __FILE__),
        array('wp-edit-blocks'),
        MF_VERSION
    );

    if (function_exists('register_block_type')) {
        register_block_type('mf/form-block', array(
            'editor_script'   => 'mightyforms_script_editor',
            'editor_style'    => 'mightyforms_style_editor',
            'style'           => 'mightyforms_style',
            'script'          => 'mightyforms_script',
            'render_callback' => 'mightyforms_render_block',
        ));
    }
}

/**
 * @param $attributes
 * @param $content
 * @return mixed|string
 * @author Dimonpvt dimonpvt@gmail.com
 */
function mightyforms_render_block($attributes, $content)
{
    if (!empty($attributes['selectedFormId'])) {
        return '<div class="mighty-form" id="mf-' . esc_attr($attributes['selectedFormId']) . '"></div>';
    }

    return $content;
}

add_action('init', 'mightyforms_register_block');

/**
 * @param
 * @return void
 * @author DemonIa sanchoclo@gmail.com
 * @function mightyforms_pass_params_to_wp_admin
 * @description In this way, I've pass variables from php to js.
 */
function mightyforms_pass_params_to_wp_admin()
{
    wp_localize_script('mightyforms_script_editor', 'backendData', [
        'gutenbergPluginRootFolder' => plugin_dir_url(__DIR__) . 'images/gutenberg_icon.png',
        'mightyformsApiKey'         => get_option('mightyforms_api_key') ? get_option('mightyforms_api_key') : null,
        'applicationPageUrl'        => get_admin_url(null, 'admin.php?page=mightyforms')
    ]);
}

add_action('admin_print_scripts', 'mightyforms_pass_params_to_wp_admin');