<?php

namespace AIPT\Core;

use AIPT\Core\Database\Migrations\CreateBulkGeneratorTables;

class Activator {
    private static $default_values = [
        'openai_api_key' => '',
        'gemini_api_key' => '',
        'api_provider' => 'openai',
        'system_prompt' => 'You are a professional product description writer. Return only the clean product description. Do not use any markdown, formatting, introductory phrases, meta-comments or additional text. Provide content that is directly suitable for WordPress editor. Your response MUST NOT exceed {max_length} characters in length.',
        'user_prompt' => 'Write a product description in {language}. Use the following writing style: {style}. The product title is: {title}',
        'language' => 'English',
        'writing_style' => 'Professional',
        'max_length' => '1000',
        'max_short_length' => '300',
        'model' => 'gpt-4o',
        'enable_product_attributes' => true,
        'enable_product_categories' => true,
        'enable_product_tags' => true,
        'enable_product_price' => true,
        'enable_product_sku' => true,
        'needs_setup' => true,
        'setup_completed' => false
    ];

    public static function activate() {
        

        if (!class_exists('WooCommerce')) {
            return;
        }

        try {

            add_option('aipt_redirect_after_activation', true);
            

            $is_first_activation = get_option('aipt_first_activation', true);
            $previous_version = get_option('aipt_version', '0');
            

            $bulk_generator_tables = new CreateBulkGeneratorTables();
            $bulk_generator_tables->up();

            if ($is_first_activation) {
                foreach (self::$default_values as $key => $value) {
                    if (get_option('aipt_' . $key) === false) {
                        add_option('aipt_' . $key, $value);
                    }
                }
            }

            $openai_api_key = get_option('aipt_openai_api_key', '');
            $gemini_api_key = get_option('aipt_gemini_api_key', '');
            $api_provider = get_option('aipt_api_provider', 'openai');

            $needs_setup = ($api_provider === 'openai' && empty($openai_api_key)) || 
                          ($api_provider === 'gemini' && empty($gemini_api_key));

            update_option('aipt_needs_setup', $needs_setup);
            update_option('aipt_setup_completed', !$needs_setup);

            if ($is_first_activation) {
                update_option('aipt_first_activation', false);
            }
            update_option('aipt_version', AIPT_VERSION);

            if (version_compare($previous_version, '2.0.2', '=')) {
                set_transient('aipt_bulk_feature_notice', 
                    __('AI Product Tools has been updated with a new Bulk Generator feature! Check it out in the AI Product Tools menu.', 'ai-product-tools'),
                    DAY_IN_SECONDS
                );
            }

        } catch (\Exception $e) {
            

            set_transient('aipt_database_error', 
                sprintf(
                    /* translators: %1$s: previous version, %2$s: current version, %3$s: error message */
                    __('Plugin upgrade from version %1$s to %2$s failed. Please try again or contact support if the problem persists. Error: %3$s', 'ai-product-tools'),
                    $previous_version,
                    AIPT_VERSION,
                    $e->getMessage()
                ),
                60 
            );

            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
            deactivate_plugins(plugin_basename(AIPT_PLUGIN_DIR . 'ai-product-tools.php'));
            
            if (isset($_GET['activate'])) {
                unset($_GET['activate']);
            }
        }
        
    }

    public static function get_default_value($key) {
        return isset(self::$default_values[$key]) ? self::$default_values[$key] : '';
    }
} 