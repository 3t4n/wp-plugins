<?php

namespace SixStorageOnline\Api;

class Six_Storage_SettingsApi
{
    public $six_storage_admin_pages = array();
    public $six_storage_settings = array();
    public $six_storage_sections = array();
    public $fields = array();

    public function six_storage_settingsAPI_register()
    {
        if(!empty($this->six_storage_admin_pages)) {
            add_action('admin_menu', [$this, 'sixStorageAddAdminMenu']);
        }

        if(!empty($this->six_storage_settings)) {
            add_action('admin_init', [$this, 'sixStorageRegisterPlugin']);
        }
    }

    // Setter Methods

    public function six_storage_addPages(array $six_storage_pages)
    {
        $this->six_storage_admin_pages = $six_storage_pages;
        return $this;
    }

    public function six_storage_setSettings(array $six_storage_settings)
    {
        $this->six_storage_settings = $six_storage_settings;
        return $this;
    }

    public function six_storage_setSections(array $six_storage_sections)
    {
        $this->six_storage_sections = $six_storage_sections;
        return $this;
    }

    public function six_storage_setFields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }


    // Register Methods

    public function sixStorageAddAdminMenu()
    {
        foreach ($this->six_storage_admin_pages as $page) {
            if(array_key_exists('parent_slug',$page)){
                add_submenu_page($page['parent_slug'],$page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], 
                $page['callback'], $page['position']);
            }else{
                add_menu_page($page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], 
                $page['callback'], $page['icon_url'], $page['position']);
            }
        }
    }

    public function sixStorageRegisterPlugin()
    {
        // register settings
        foreach ($this->six_storage_settings as $setting) {
            $six_storage_settingsCallback = isset($setting['callback']) ? $setting['callback'] : '';
            register_setting($setting['option_group'], $setting['option_name'], $six_storage_settingsCallback);
        }

        // add settings section
        foreach ($this->six_storage_sections as $section) {
            $sectionCallback = isset($section['callback']) ? $section['callback'] : '';
            add_settings_section($section['id'], $section['title'], $sectionCallback, $section['page']);
        }

        // add settings field
        foreach ($this->fields as $field) {
            $fieldCallback = isset($field['callback']) ? $field['callback'] : '';
            add_settings_field( $field['id'], $field['title'], $fieldCallback, $field['page'], $field['section'], $field['args']);
        }
    }
}
