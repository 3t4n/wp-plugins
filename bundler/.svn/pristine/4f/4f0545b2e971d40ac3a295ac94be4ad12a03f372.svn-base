<?php

namespace Bundler\Controllers;

use Bundler\Models\Settings;
use Bundler\Includes\Traits\Instance;

if (!defined('ABSPATH')) exit;

class SettingsController
{

    use Instance;

    public function get_settings()
    {
        return (object) [
            'quantity_breaks' => $this->get_quantity_breaks_settings(),
            'bundle'          => $this->get_bundle_settings()
        ];
    }

    /**
     * Get volume discount settings
     * 
     * @return object
     */
    public function get_quantity_breaks_settings()
    {
        return Settings::get_quantity_breaks_settings();
    }

    /**
     * Get bundle settings
     * 
     * @return object
     */
    public function get_bundle_settings()
    {
        return Settings::get_bundle_settings();
    }

    /**
     * @param mixed $settings
     * 
     * @return bool
     */
    public function update_settings($settings)
    {
        $quantity_breaks_settings = $settings['quantity_breaks'] ?? [];
        $bundle_settings          = $settings['bundle'] ?? [];

        $quantity_breaks_result = $this->update_quantity_breaks_settings($quantity_breaks_settings);
        $bundle_result          = $this->update_bundle_settings($bundle_settings);

        return $quantity_breaks_result || $bundle_result;
    }

    /**
     * Update volume discount settings
     * 
     * @return object
     */
    public function update_quantity_breaks_settings($settings)
    {
        $allowed_keys = array(
            'design',
            'design_mobile',
            'header_text',
            'header_show',
            'qty_selector',
            'var_form',
            'cart_redirect',
            'checkout_redirect',
            'atc_price_text',
            'background_color',
            'background_color_active',
            'border_color',
            'border_color_active',
            'title_color',
            'sale_price_color',
            'regular_price_color',
            'message1_color',
            'message2_color',
            'message2_background_color',
            'attribute_name_color',
            'dropdown_text_color',
            'dropdown_background_color',
            'radio_show',
            'header_font',
            'title_font',
            'price_font',
            'message1_font',
            'message2_font',
            'attribute_name_font',
            'dropdown_font',
            'atc_button_font',
            'atc_button_background_color',
            'atc_button_border_color',
            'atc_button_text_color',
            'atc_button_show_custom_text',
            'atc_button_custom_text',
        );

        $filtered_settings = array_filter($settings, function ($key) use ($allowed_keys) {
            return in_array($key, $allowed_keys);
        }, ARRAY_FILTER_USE_KEY);

        $result = Settings::update_quantity_breaks_settings($filtered_settings);

        return $result;
    }

    /**
     * Update bundle design settings
     * 
     * @return mixed
     */
    public function update_bundle_settings($settings)
    {
        $allowed_keys = array(
            'background_color',
            'border_color',
            'button_color',
            'button_text',
            'bundle_widget_title',
            'cart_redirect',
            'checkout_redirect',
            'title_show',
            'product_name_color',
            'sale_price_color',
            'regular_price_color',
            'saving_color',
            'saving_text',
            'free_gift_text',
            'free_gift_total_text',
            'total_text'
        );

        $filtered_settings = array_filter($settings, function ($key) use ($allowed_keys) {
            return in_array($key, $allowed_keys);
        }, ARRAY_FILTER_USE_KEY);

        $result = Settings::update_bundle_settings($filtered_settings);

        return $result;
    }


    /**
     * Get the default settings
     * 
     * @return object
     */
    public function get_default_settings()
    {
        return Settings::get_default_settings();
    }

    /**
     * Get the default bundle settings
     * 
     * @return object
     */
    public function get_default_quantity_breaks_settings()
    {
        return Settings::get_default_quantity_breaks_settings();
    }

    /**
     * Get the default bundle settings
     * 
     * @return object
     */
    public function get_default_bundle_settings()
    {
        return Settings::get_default_bundle_settings();
    }
}

return SettingsController::get_instance();
