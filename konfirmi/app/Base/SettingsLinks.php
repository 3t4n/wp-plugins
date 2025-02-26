<?php

/**
 * Set up Konfirmi plugin active links
 * 
 * @package Konfirmi Plugin
 */
namespace Konfirmi\Base;

use \Konfirmi\Base\BaseController;

class SettingsLinks extends BaseController
{
    /*
     * Register action links displayed for Konfirmi plugin
     */
    public function register()
    {
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_links') );
    }

    /**
     * Add plugin action links.
     * Add a link to the settings page on the plugins.php page.
     *
     * @param  array  $links List of existing plugin action links.
     * @return array         List of modified plugin action links.
     */
    public function settings_links($links)
    {
        $link = '<a href="admin.php?page=konfirmi_plugin">Settings</a>';
        array_push( $links, $link );
        return $links;
    }
}