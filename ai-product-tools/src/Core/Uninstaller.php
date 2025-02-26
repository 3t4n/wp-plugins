<?php

namespace AIPT\Core;

/**
 * Handles plugin uninstallation cleanup
 *
 * @package AIPT\Core
 * @since 2.0.4
 */
class Uninstaller {
    /**
     * Clean up plugin data after uninstall
     * This method is hooked to Freemius after_uninstall action
     * 
     * @return void
     */
    public static function cleanup() {
        if (!current_user_can('activate_plugins')) {
            return;
        }

        $options_to_delete = [

            'aipt_openai_api_key',
            'aipt_gemini_api_key',
            'aipt_api_provider',
            

            'aipt_system_prompt',
            'aipt_user_prompt',
            'aipt_language',
            'aipt_writing_style',
            'aipt_max_length',
            'aipt_max_short_length',
            'aipt_model',
            

            'aipt_enable_product_attributes',
            'aipt_enable_product_categories',
            'aipt_enable_product_tags',
            'aipt_enable_product_price',
            'aipt_enable_product_sku',
            

            'aipt_needs_setup',
            'aipt_setup_completed',
            'aipt_first_activation',
            'aipt_redirect_to_setup'
        ];

        foreach ($options_to_delete as $option) {
            delete_option($option);
        }

    }
} 