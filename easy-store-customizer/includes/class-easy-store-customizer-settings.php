<?php

/**
 * Default settings for the plugin config and validation.
 *
 * @link       https://100xwpdev.com
 *
 * @package    Easy_Store_Customizer
 * @subpackage Easy_Store_Customizer/includes
 */

/**
 * Default settings for the plugin config and validation.
 *
 *
 * @package    Easy_Store_Customizer
 * @subpackage Easy_Store_Customizer/includes
 * @author     Bheru Lal Gameti  <bherulalgameti24@gmail.com>
 */
class Easy_Store_Customizer_Settings
{
    /**
     * The unique identifier of this plugin.
     *
     
     * @access   protected
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * This is used to define default settings for the plugin.
     *
     
     * @access   protected
     * @var      array    $settings    The default settings for the plugin.
     */
    protected $settings;


    public function __construct()
    {
        $this->plugin_name = 'easy-store-customizer';
        $this->settings = $this->get_defaults();
    }

    /**
     * Get default settings structure
     */
    public function get_defaults()
    {
        return [
            'shop_add_to_cart' => [
                'label' => __('Rename "Add to cart" Button Label', 'easy-store-customizer'),
                'description' => __('Customize the text of the Add to Cart button for different product types.', 'easy-store-customizer'),
                'status' => 0,
                'options' => [
                    'simple' => 'Add to cart',
                    'grouped' => 'Select options',
                    'external' => 'View product',
                    'variable' => 'Select options'
                ]
            ],
            'shop_product_per_page' => [
                'label' => __('Number of Products Per Page', 'easy-store-customizer'),
                'description' => __('Change the default number of products per page (16) to any number.', 'easy-store-customizer'),
                'status' => 0,
                'options' => [
                    'count' => 16,
                ]
            ],
            'product_qty_input_plus_minus' => [
                'label' => __('Add to Cart Quantity Plus & Minus Buttons', 'easy-store-customizer'),
                'description' => __('Add plus/minus buttons to the quantity input field on product pages.', 'easy-store-customizer'),
                'status' => 0
            ],
            'product_qty_input_arrows' => [
                'label' => __('Hide Add To Cart Quantity Input Arrows', 'easy-store-customizer'),
                'description' => __("If you're using qty plus minus button then the arrow are useless.", 'easy-store-customizer'),
                'status' => 0
            ],
            'product_show_number_sold' => [
                'label' => __('Show Number of Products Sold', 'easy-store-customizer'),
                'description' => __("Display the number of products sold on the product page. In Positon, you can choose where to display the number of products sold. <a href='https://www.businessbloomer.com/woocommerce-visual-hook-guide-single-product-page/' target='_blank'>Visual Hook Guide</a>", 'easy-store-customizer'),
                'status' => 0,
                'options' => [
                    'label' => 'Item sold',
                    'position' => 'woocommerce_single_product_summary'
                ]
            ],
        ];
    }

    /**
     * Register settings
     */
    public function register_settings()
    {
        register_setting(
            $this->plugin_name,
            $this->plugin_name,
            [
                'sanitize_callback' => [$this, 'sanitize_settings'],
                'default' => []
            ]
        );
    }

    /**
     * Clean helper for text fields
     */
    private function clean_text($value)
    {
        return sanitize_text_field(wp_unslash($value));
    }

    /**
     * Sanitize settings
     */
    public function sanitize_settings($input)
    {
        $clean = [];

        foreach ($this->get_defaults() as $feature_id => $feature) {
            $clean[$feature_id] = [];

            $clean[$feature_id]['status'] =
                isset($input[$feature_id]['status']) ? 1 : 0;

            if (isset($feature['options'])) {
                $clean[$feature_id]['options'] = [];

                foreach ($feature['options'] as $option => $default) {

                    $clean[$feature_id]['options'][$option] =
                        isset($input[$feature_id]['options'][$option])
                        ? $this->clean_text($input[$feature_id]['options'][$option])
                        : $default;
                }
            }
        }
        return $clean;
    }

    /**
     * Get a setting value
     */
    public function get($feature, $option = null)
    {
        $settings = get_option($this->plugin_name);

        // If no settings exist yet, return defaults
        if (false === $settings) {
            $settings = $this->get_defaults();
        }

        // Return entire feature
        if ($option === null) {
            $value = isset($settings[$feature]) ? $settings[$feature] : '';
            return $value !== '' ? $value : null;
        }

        // Return specific option
        $value = isset($settings[$feature]['options'][$option])
            ? $settings[$feature]['options'][$option]
            : '';
        return $value !== '' ? $value : null;
    }

    /**
     * Check if a feature is enabled
     */
    public function is_enabled($feature)
    {
        $settings = $this->get($feature);
        return isset($settings['status']) && $settings['status'] === 1;
    }
}
