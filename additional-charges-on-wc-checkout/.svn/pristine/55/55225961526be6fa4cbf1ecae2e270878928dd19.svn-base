<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ACWC_SETTING_ADMIN_OPTIONS_FIELDS {

    public function __construct() {
        // Add settings tabs and fields
        add_filter("woocommerce_get_sections_products", array($this, 'acwc_add_settings_tabs'));
        add_filter("woocommerce_get_settings_products", array($this, 'acwc_create_setting_fields'), 10, 2);
    }

    /**
     * Add settings tab for Additional Charges
     *
     * @param array $setting_tab
     * @return array
     */
    public function acwc_add_settings_tabs($setting_tab) {
        $setting_tab['additional_charges'] = esc_html__("Additional Charges", "additional-charges-on-wc-checkout");
        return $setting_tab;
    }

    /**
     * Create settings fields for Additional Charges
     *
     * @param array $settings
     * @param string $current_section
     * @return array
     */
    public function acwc_create_setting_fields($settings, $current_section) {
        $wc_ac_settings = array();
        if ('additional_charges' == $current_section) {
            $wc_ac_settings = array(
                array(
                    'name' => esc_html__('WC Additional Charges', 'additional-charges-on-wc-checkout'),
                    'type' => 'title',
                    'desc' => '',
                    'id'   => 'wc_additional_fee_sections_title'
                ),
                array(
                    'name' => esc_html__('Enable WC Additional Charges', 'additional-charges-on-wc-checkout'),
                    'type' => 'checkbox',
                    'desc' => esc_html__('Check this if you want to enable the WC Additional Charges', 'additional-charges-on-wc-checkout'),
                    'id'   => 'wc_enable_additional_charges_options'
                ),
                array(
                    'name' => esc_html__('Apply to Specific Categories', 'additional-charges-on-wc-checkout'),
                    'type' => 'multiselect',
                    'class' => 'wc-enhanced-select',
                    'desc' => esc_html__('Start typing to search and select categories.', 'additional-charges-on-wc-checkout'),
                    'options' => $this->get_categories_for_select(),
                    'id'   => 'wc_additional_fee_categories'
                ),
                array(
                    'name' => esc_html__('Apply to Specific Products', 'additional-charges-on-wc-checkout'),
                    'type' => 'multiselect',
                    'class' => 'wc-enhanced-select',
                    'desc' => esc_html__('Start typing to search and select products.', 'additional-charges-on-wc-checkout'),
                    'options' => $this->get_products_for_select(),
                    'id'   => 'wc_additional_fee_products'
                ),
                array(
                    'name' => esc_html__('Please Enter The Additional Charges Name', 'additional-charges-on-wc-checkout'),
                    'type' => 'text',
                    'desc' => esc_html__('This will be the title of the fee that shows on the checkout page', 'additional-charges-on-wc-checkout'),
                    'desc_tip' => true,
                    'id'   => 'wc_additional_fee_title'
                ),
                array(
                    'name' => sprintf(esc_html__('Fixed Amount ( %s )', 'additional-charges-on-wc-checkout'), get_woocommerce_currency_symbol()),
                    'type' => 'text',
                    'desc' => esc_html__('This amount will be added to the order total when a user places an order.', 'additional-charges-on-wc-checkout'),
                    'desc_tip' => true,
                    'id'   => 'wc_additional_fee_amount'
                ),
                array(
                    'name' => esc_html__('Type of Fee', 'additional-charges-on-wc-checkout'),
                    'type' => 'select',
                    'desc' => esc_html__('Whether this is a fixed amount fee or % of order total.', 'additional-charges-on-wc-checkout'),
                    'options' => array(
                        'Fixed Amount' => esc_html__('Fixed Amount', 'additional-charges-on-wc-checkout'),
                        '% of Order Total' => esc_html__('% of Order Total', 'additional-charges-on-wc-checkout')
                    ),
                    'desc_tip' => true,
                    'id'   => 'wc_additional_fee_type'
                ),
                array(
                    'name' => esc_html__('Cart Amount (Optional)', 'additional-charges-on-wc-checkout'),
                    'type' => 'text',
                    'desc' => esc_html__('Cart amount, after which this fee will be added to the order total. (Leave blank if you do not wish to use this feature.)', 'additional-charges-on-wc-checkout'),
                    'desc_tip' => true,
                    'id'   => 'wc_additional_fee_minimum_cart_amount'
                ),
                array(
                    'name' => esc_html__('Apply fee when (optional)', 'additional-charges-on-wc-checkout'),
                    'type' => 'select',
                    'desc' => esc_html__('Whether you want to apply the fee if the order amount is more than $XX or less than $XX. (Leave empty if you do not wish to use this.)', 'additional-charges-on-wc-checkout'),
                    'options' => array(
                        'Order is more than' => esc_html__('Order is more than', 'additional-charges-on-wc-checkout'),
                        'Order is less than' => esc_html__('Order is less than', 'additional-charges-on-wc-checkout')
                    ),
                    'id'   => 'wc_additional_fee_condition_type'
                ),
                array(
                    'name' => esc_html__('Include Shipping Charge', 'additional-charges-on-wc-checkout'),
                    'type' => 'checkbox',
                    'desc' => esc_html__('Include the shipping charge in Order Total when "Type of Fee" is "% of Order Total".', 'additional-charges-on-wc-checkout'),
                    'id'   => 'wc_additional_fee_include_shipping_charge'
                ),
                array('type' => 'sectionend', 'id' => 'additional_charges_fee_sections_end'),
            );
            return $wc_ac_settings;
        } else {
            return $settings;
        }
    }

    /**
     * Get categories for the searchable select box.
     *
     * @return array
     */
    private function get_categories_for_select() {
        $categories = get_terms(array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
        ));
        $options = array();
        if (!is_wp_error($categories)) {
            foreach ($categories as $category) {
                $options[$category->term_id] = esc_html($category->name);
            }
        }
        return $options;
    }

    /**
     * Get products for the searchable select box.
     *
     * @return array
     */
    private function get_products_for_select() {
    $products = wc_get_products(array(
        'limit'  => -1,     
        'status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC',
    ));
    
    $options = array();
    foreach ($products as $product) {
        $sku = $product->get_sku(); 
        $name = esc_html($product->get_name()); 
        // Include the SKU in the product display
        $options[$product->get_id()] = $sku ? "$name (SKU: $sku)" : $name;
    }

    return $options;
    }
}

$adminSetting = new ACWC_SETTING_ADMIN_OPTIONS_FIELDS();
?>
