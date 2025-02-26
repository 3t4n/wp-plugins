<?php
/**
 * Setup admin panel for Konfirmi Plugin
 * 
 * @package Konfirmi Plugin
 */

namespace Konfirmi\Pages;

use \Konfirmi\Base\BaseController;
use \Konfirmi\Api\SettingsApi;
use \Konfirmi\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $pages;
    public $callbacks;

    /*
     * Set up pages of Konfirmi plugin and register them
     */
    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->setPages();
        $this->settings->addPages( $this->pages )->register();
    }

    /*
     * Create the pages of Konfirmi plugin
     */ 
    public function setPages()
    {
        $this->pages = [
            [
                'page_title' => $this->config["admin"]["pageTitle"], 
                'menu_title' => $this->config["admin"]["menuTitle"], 
                'capability' => 'manage_options', 
                'menu_slug' => 'konfirmi_plugin', 
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-admin-settings',
                'position' => 110
            ]
        ];
    }
}