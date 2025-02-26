<?php

/**
 * @package CF7SubmitAnimations
 */

namespace Cf7subanimsinc\Pages;

use \Cf7subanimsinc\Api\SettingsApi;
use \Cf7subanimsinc\Api\Callbacks\AdminCallbacks;
use \Cf7subanimsinc\Base\BaseController;

class Dashboard extends BaseController
{

    public $settings;
    public $pages;
    public $callbacks;
    function register()
    {

        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->setPages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();

        // add_action('admin_menu', array($this, 'add_admin_pages'));
        $this->settings->addPages($this->pages)->register();
    }

    function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Contact Form 7 Submit Animations',
                'menu_title' => 'CF7 Submit Animations',
                'capability' => 'manage_options',
                'menu_slug' => 'cf7_submit_animations',
                'callback' =>  array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-email',
                'position' => 30
            )
        );
    }
    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'cf7_submit_animations_settings',
                'option_name' => 'cf7_submit_animations',
                'callback' => array($this->callbacks, 'inputSanitize')
            )
        );

        $this->settings->setSettings($args);
    }
    public function setSections()
    {
        $args = array(
            array(
                'id' => 'cf7_submit_animations_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'adminSectionManager'),
                'page' => 'cf7_submit_animations'
            )
        );
        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array();
        foreach ($this->dropdowns as $key => $value) {
            $args[] = array(
                'id' => $key,
                'title' => $value['title'],
                'callback' => array($this->callbacks, $value['callback_function']),
                'page' => 'cf7_submit_animations',
                'section' => 'cf7_submit_animations_admin_index',
                'args' => array(
                    'option_name' => 'cf7_submit_animations',
                    'label_for' => $key,
                    'options' => isset($value['options']) ? $value['options'] : null,
                    'placeholder' => isset($value['placeholder']) ? $value['placeholder'] : null
                )
            );
        }
        $this->settings->setFields($args);
    }
}
