<?php

namespace Bits\CodePenList\Modules;

class Editor extends BaseModule
{
    /**
     * Extend the TinyMce editor.
     * 
     * @return void
     */
    public static function extendEditor()
    {
        add_filter('mce_buttons', [get_class(), 'extendMceButtons']);
        add_filter('mce_external_plugins', [get_class(), 'extendMcePlugins']);
    }

    /**
     * Extend the TinyMCE plugins.
     * 
     * @param  array  $plugins
     * @return array
     */
    public static function extendMcePlugins($plugins) 
    {
        $plugins['bits_codepen_list'] = bits_cpl_base_url('js/codepen-list.js');

        return $plugins;
    }

    /**
     * Get the translations for the TinyMCE plugin.
     * Pretend to be jQuery.
     * 
     * @return void
     */
    public static function getTranslations()
    {
        $translations = [
            'type'          => __('Type:', 'bits-codepen-list'),
            'count'         => __('Posts:', 'bits-codepen-list'),
            'hours'         => __('hours', 'bits-codepen-list'),
            'target'        => __('Target:', 'bits-codepen-list'),
            'posts'         => __('Posts', 'bits-codepen-list'),
            'public'        => __('Public', 'bits-codepen-list'),
            'popular'       => __('Popular', 'bits-codepen-list'),
            'username'      => __('Username', 'bits-codepen-list'),
            'cacheTime'     => __('Cache time:', 'bits-codepen-list'),
            'newWindow'     => __('New window', 'bits-codepen-list'),
            'sameWindow'    => __('Same window', 'bits-codepen-list'),
            'insertList'    => __('Insert a CodePen List', 'bits-codepen-list'),
        ];

        wp_localize_script('jquery', 'BitsCodePenList', $translations);
    }

    /**
     * Extend the TinyMce buttons.
     *  
     * @param  array  $buttons
     * @return array
     */
    public static function extendMceButtons($buttons) 
    {
        array_push($buttons, 'bits_codepen_list');

        return $buttons;
    }

    /**
     * Register the hooks.
     * 
     * @return void
     */
    public function registerHooks()
    {
        add_action('admin_enqueue_scripts', [get_class(), 'extendEditor']);
        add_action('admin_enqueue_scripts', [get_class(), 'getTranslations']);
    }
}