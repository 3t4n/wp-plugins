<?php

/**
 * @package  Arplay
 */

namespace IncArplay\Pages;

use IncArplay\Base\BaseController;
use IncArplay\Api\Callbacks\AdminCallbacks;
use IncArplay\Api\Callbacks\ManagerCallbacks;
use IncArplay\Api\SettingsApi;


class Dashboard extends BaseController
{

	public $settings;

	public $callbacks;

	public $callbacks_mngr;

	public $pages = array();

    public $subpages = array();


	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->callbacks_mngr = new ManagerCallbacks();

		$this->setPages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage('Settings')->addSubPages( $this->subpages )->register();
	}


	public function setPages() 
	{
        $this->pages = array(
            array(
                'page_title' => 'AR Play',
                'menu_title' => 'AR Play',
                'capability' => 'manage_options',
                'menu_slug' => 'arplay_settings',
                'callback' => array( $this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-welcome-view-site',
                'position' => 110
            )
        );
	}


    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'arplay_plugin_settings',
                'option_name' => 'arplay_plugin',
                'callback' => array( $this->callbacks_mngr, 'sanitizeSettings' )
            )
        );

        $this->settings->setSettings( $args );
    }


    public function setSections()
    {
        $args = array(
            array(
                'id' => 'arplay_admin_index',
                'title' => 'Settings Manager',
                'callback' => array( $this->callbacks_mngr, 'adminSettingsManager' ),
                'page' => 'arplay_plugin'
            )
        );

        $this->settings->setSections( $args );
    }


    public function setFields()
    {
        $args = array();

        foreach ( $this->managers as $key => $value ) {
            $args[] = array(
                'id' => $key,
                'title' => $value,
                'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
                'page' => 'arplay_plugin',
                'section' => 'arplay_admin_index',
                'args' => array(
                    'option_name' => 'arplay_plugin',
                    'label_for' => $key,
                    'class' => 'ui-toggle'
                )
            );


        }

        $args[] = array(
            'id' => 'uuid',
            'title' => 'UUID',
            'callback' => array( $this->callbacks_mngr, 'uuidField' ),
            'page' => 'arplay_plugin',
            'section' => 'arplay_admin_index',
            'args' => array(
                'option_name' => 'arplay_plugin',
                'label_for' => 'uuid',
                'class' => ''
            )
        );

        $this->settings->setFields( $args );
    }

}