<?php
namespace ArtistPress\Administration\Settings;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

abstract class Settings
{
    public $pluginName;
    public $version;
    public $title;
    public $settings;
    public $section;
    
    public function __construct($pluginName, $version, $title, $settings, $section)
    {
        $this->pluginName = $pluginName;
        $this->version = $version;
        $this->title = $title;
        $this->settings = $settings;
        $this->section = $section;
    }

    /**
	 * Renders the section description markup.
	 * @since    1.5.0
     */ 
    abstract public static function getSectionDescription();

    /**
	 * Gets array of fields for these settings.
	 * @since    1.5.0
     */ 
    abstract  public function getSectionFields();
    
    /**
	 * Sanitizes the form fields for this view.
	 * @since    1.5.0
     */    
    public static function sectionValidation($input) 
    {
        $output = array();

        foreach ($input as $key => $value) {
            if (isset($input[$key])) {
                $output[$key] = strip_tags(stripslashes($input[ $key ]));
            }
        }

        return \apply_filters(__METHOD__, $output, $input);
    }
    
    /**
	 * Registers the settings for this section.
	 * @since    1.5.0
     */ 
    public function registerSettings()
    {
        $fields = $this->getSectionFields();
        $option = !empty($fields[0]['args']['key']) ? $fields[0]['args']['key'] : false;
        
        // Set Plugin Defaults
        if (false === \get_option($option)) {
            $defaults = [];
            foreach ($fields as $field) {
                if (!empty($field['args']['default'])) {
                    $defaults[$field['args']['slug']] = $field['args']['default'];
                }
            }
            if (!empty($defaults)) {
                \add_option($option, $defaults);
            }
        }

        \add_settings_section(
            $this->section,
            $this->title,
            [static::class, 'getSectionDescription'],
            $this->settings
        );

        foreach ($fields as $field) {
            
            $callback = 'get' . \ucfirst($field['type']) . 'Field';

            \add_settings_field(
                $field['args']['slug'],
                $field['args']['name'],
                ['\ArtistPress\Administration\Settings\Fields', $callback],
                $this->settings,
                $this->section,
                $field['args']
            );
        }
        
        \register_setting(
            $this->settings,
            $this->settings,
            [static::class, 'sectionValidation']
        );
    }
}
