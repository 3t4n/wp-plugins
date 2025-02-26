<?php
defined('ABSPATH') || exit;

if ( ! class_exists( 'Multple_Cart_Fee_Admin' ) ) {
    class Multple_Cart_Fee_Admin {

        public function __construct() {

            add_action('admin_enqueue_scripts', array($this, 'mcfw_enqueue_admin_assets'));
            add_filter('woocommerce_settings_tabs_array', array($this, 'mcfw_add_settings_tab'), 50);
            add_action('woocommerce_settings_tabs_multiple_cart_fee', array($this, 'mcfw_settings_tab'));
            add_action('woocommerce_update_options_multiple_cart_fee', array($this, 'mcfw_update_settings'));
            add_action('woocommerce_admin_field_fee_repeater', array($this, 'mcfw_generate_fee_repeater_html'));
            
        }

        public function mcfw_enqueue_admin_assets($hook) {
            if ('woocommerce_page_wc-settings' !== $hook) {
                return;
            }

            wp_enqueue_style('mcfw-admin', 
                MCFW_URL . 'assets/css/admin.css', 
                array(), 
                MCFW_VERSION
            );

            wp_enqueue_script('mcfw-admin',
                MCFW_URL . 'assets/js/admin.js',
                array('jquery'),
                MCFW_VERSION,
                true
            );

            wp_localize_script('mcfw-admin', 'mcfw_admin', array(
                'i18n' => array(
                    'remove_fee' => __('Remove Fee', 'multiple-cart-fee-for-woocommerce'),
                    'fee_name' => __('Fee Name', 'multiple-cart-fee-for-woocommerce'),
                    'fee_amount' => __('Fee Amount', 'multiple-cart-fee-for-woocommerce'),
                )
            ));
        }

        public function mcfw_add_settings_tab($settings_tabs) {
            $settings_tabs['multiple_cart_fee'] = __('Multiple Cart Fees', 'multiple-cart-fee-for-woocommerce');
            return $settings_tabs;
        }

        public function mcfw_settings_tab() {
            $this->mcfw_output_fees_section();
            woocommerce_admin_fields($this->mcfw_get_settings());
        }

        private function mcfw_output_fees_section() {
            $fees = get_option('multiple_fees', array());
            
            if (empty($fees)) {
                $fees = array(array(
                    'name' => __('Multiple Fee', 'multiple-cart-fee-for-woocommerce'),
                    'amount' => '0'
                ));
            }
            
            ?>
            <h2><?php esc_html_e('Fee Configuration', 'multiple-cart-fee-for-woocommerce'); ?></h2>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <td class="forminp" colspan="2">
                            <div id="multiple-fees-container">
                                <div class="fee-header">
                                    <div class="fee-title"><?php esc_html_e('Fee Name', 'multiple-cart-fee-for-woocommerce'); ?></div>
                                    <div class="fee-amount-title"><?php esc_html_e('Amount', 'multiple-cart-fee-for-woocommerce'); ?></div>
                                    <div class="fee-action"></div>
                                </div>
                                <?php foreach ($fees as $index => $fee): ?>
                                    <div class="fee-row">
                                        <input type="text" 
                                        name="multiple_fees[<?php echo esc_attr( $index ); ?>][name]" 
                                        value="<?php echo esc_attr($fee['name']); ?>" 
                                        class="fee-name"
                                        placeholder="<?php esc_attr_e('Enter fee name', 'multiple-cart-fee-for-woocommerce'); ?>">

                                        <input type="number" 
                                        name="multiple_fees[<?php echo esc_attr( $index ); ?>][amount]" 
                                        value="<?php echo esc_attr($fee['amount']); ?>" 
                                        class="fee-amount"
                                        step="0.01" 
                                        min="0"
                                        placeholder="0.00">

                                        <?php if ($index === count($fees) - 1): ?>
                                            <button type="button" class="add-fee button-secondary">
                                                <span class="dashicons dashicons-plus"></span>
                                            </button>
                                        <?php else: ?>
                                            <button type="button" class="remove-fee button-secondary">
                                                <span class="dashicons dashicons-minus"></span>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
        }

        public function mcfw_update_settings() {
            // Check if nonce exists before processing
            if (!isset($_POST['_wpnonce'])) {
                wp_die('Security check failed');
            }

            // Unslash and sanitize nonce before verification
            $nonce = sanitize_text_field(wp_unslash($_POST['_wpnonce']));

            if (!wp_verify_nonce($nonce, 'woocommerce-settings')) {
                wp_die('Security check failed');
            }
            // Sanitize and process multiple fees
            if (!empty($_POST['multiple_fees']) && is_array($_POST['multiple_fees'])) {
                $fees = array();
                $multiple_fees = wp_unslash($_POST['multiple_fees']);
                foreach ($multiple_fees as $fee) {
                    if (!empty($fee['name']) || !empty($fee['amount'])) {
                        $fees[] = array(
                            'name'   => sanitize_text_field(wp_unslash($fee['name'])),
                            'amount' => floatval(wp_unslash($fee['amount'])),
                        );
                    }
                }
            

                update_option('multiple_fees', $fees);
            }

            // Sanitize and store product, category, and tag IDs
            update_option('multiple_fee_products', isset($_POST['multiple_fee_products']) ? array_map('absint', (array) wp_unslash($_POST['multiple_fee_products'])) : array());
            update_option('multiple_fee_categories', isset($_POST['multiple_fee_categories']) ? array_map('absint', (array) wp_unslash($_POST['multiple_fee_categories'])) : array());
            update_option('multiple_fee_tags', isset($_POST['multiple_fee_tags']) ? array_map('absint', (array) wp_unslash($_POST['multiple_fee_tags'])) : array());

            // Sanitize and store min/max amount
            update_option('multiple_fee_min_amount', isset($_POST['multiple_fee_min_amount']) ? floatval(wp_unslash($_POST['multiple_fee_min_amount'])) : '');
            update_option('multiple_fee_max_amount', isset($_POST['multiple_fee_max_amount']) ? floatval(wp_unslash($_POST['multiple_fee_max_amount'])) : '');

            // Update WooCommerce settings
            woocommerce_update_options($this->mcfw_get_settings());

            // Redirect to prevent form resubmission
            wp_safe_redirect(admin_url('admin.php?page=wc-settings&tab=multiple_cart_fee'));
            exit;
        }

        private function mcfw_get_settings() {
            $settings = array(
                'section_title' => array(
                    'name' => __('Fee Conditions', 'multiple-cart-fee-for-woocommerce'),
                    'type' => 'title',
                    'desc' => __('Set conditions for when fees should apply', 'multiple-cart-fee-for-woocommerce'),
                    'id'   => 'multiple_fee_section_title'
                ),
                'included_products' => array(
                    'name' => __('Apply to Products', 'multiple-cart-fee-for-woocommerce'),
                    'type' => 'multiselect',
                    'class' => 'wc-product-search',
                    'desc' => __('Select products to apply fees to', 'multiple-cart-fee-for-woocommerce'),
                    'id'   => 'multiple_fee_products',
                    'custom_attributes' => array(
                        'data-placeholder' => __('Search for products...', 'multiple-cart-fee-for-woocommerce'),
                        'data-action' => 'woocommerce_json_search_products_and_variations'
                    ),
                    'options' => $this->mcfw_get_selected_products()
                ),
                'included_categories' => array(
                    'name' => __('Apply to Categories', 'multiple-cart-fee-for-woocommerce'),
                    'type' => 'multiselect',
                    'class' => 'wc-enhanced-select',
                    'desc' => __('Select categories to apply fees to', 'multiple-cart-fee-for-woocommerce'),
                    'id'   => 'multiple_fee_categories',
                    'options' => $this->mcfw_get_product_categories()
                ),
                'included_tags' => array(
                    'name' => __('Apply to Tags', 'multiple-cart-fee-for-woocommerce'),
                    'type' => 'multiselect',
                    'class' => 'wc-enhanced-select',
                    'desc' => __('Select tags to apply fees to', 'multiple-cart-fee-for-woocommerce'),
                    'id'   => 'multiple_fee_tags',
                    'options' => $this->mcfw_get_product_tags()
                ),
                'min_cart_amount' => array(
                    'name' => __('Minimum Cart Amount', 'multiple-cart-fee-for-woocommerce'),
                    'type' => 'number',
                    'desc' => __('Apply fees only if cart total is above this amount', 'multiple-cart-fee-for-woocommerce'),
                    'id'   => 'multiple_fee_min_amount',
                    'custom_attributes' => array(
                        'step' => '0.01',
                        'min'  => '0'
                    )
                ),
                'max_cart_amount' => array(
                    'name' => __('Maximum Cart Amount', 'multiple-cart-fee-for-woocommerce'),
                    'type' => 'number',
                    'desc' => __('Apply fees only if cart total is below this amount', 'multiple-cart-fee-for-woocommerce'),
                    'id'   => 'multiple_fee_max_amount',
                    'custom_attributes' => array(
                        'step' => '0.01',
                        'min'  => '0'
                    )
                ),
                'section_end' => array(
                    'type' => 'sectionend',
                    'id'   => 'multiple_fee_section_end'
                )
            );
            return apply_filters('multiple_fee_settings', $settings);
        }

        private function mcfw_get_product_categories() {
            $categories = array();
            $terms = get_terms(array(
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
            ));

            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $categories[$term->term_id] = $term->name;
                }
            }

            return $categories;
        }

        private function mcfw_get_product_tags() {
            $tags = array();
            $terms = get_terms(array(
                'taxonomy' => 'product_tag',
                'hide_empty' => false,
            ));

            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $tags[$term->term_id] = $term->name;
                }
            }

            return $tags;
        }

        public function mcfw_generate_fee_repeater_html($value) {

            $field_key = isset($value['id']) ? $value['id'] : '';
            $fees = get_option('multiple_fees', array());

            if (empty($fees)) {
                $fees = array(array(
                    'name' => __('multiple Fee', 'multiple-cart-fee-for-woocommerce'),
                    'amount' => '0'
                ));
            }

            ob_start();
            ?>
            <tr valign="top">
                <th scope="row" class="titledesc">
                    <label for="<?php echo esc_attr($field_key); ?>"><?php echo esc_html($value['name']); ?></label>
                </th>
                <td class="forminp">
                    <div id="multiple-fees-container">
                        <div class="fee-header">
                            <div class="fee-title"><?php esc_html_e('Fee Name', 'multiple-cart-fee-for-woocommerce'); ?></div>
                            <div class="fee-amount-title"><?php esc_html_e('Amount', 'multiple-cart-fee-for-woocommerce'); ?></div>
                            <div class="fee-action"></div>
                        </div>
                        <?php wp_nonce_field('mcfw_update_settings_action', 'mcfw_update_settings_nonce'); ?>
                        <?php foreach ($fees as $index => $fee): ?>
                            <div class="fee-row">
                                <input type="text" 
                                name="multiple_fees[<?php echo esc_attr( $index ); ?>][name]" 
                                value="<?php echo esc_attr($fee['name']); ?>" 
                                class="fee-name"
                                placeholder="<?php esc_attr_e('Enter fee name', 'multiple-cart-fee-for-woocommerce'); ?>">

                                <input type="number" 
                                name="multiple_fees[<?php echo esc_attr( $index ); ?>][amount]" 
                                value="<?php echo esc_attr($fee['amount']); ?>" 
                                class="fee-amount"
                                step="0.01" 
                                min="0"
                                placeholder="0.00">

                                <?php if ($index === count($fees) - 1): ?>
                                    <button type="button" class="add-fee button-secondary">
                                        <span class="dashicons dashicons-plus"></span>
                                    </button>
                                <?php else: ?>
                                    <button type="button" class="remove-fee button-secondary">
                                        <span class="dashicons dashicons-minus"></span>
                                    </button>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <p class="description"><?php echo esc_html( $value['desc'] ); ?></p>
                </td>
            </tr>
            <?php
            return ob_get_clean();
        }

        public function mcfw_validate_fee_repeater_field($key, $value) {
            return $value;
        }

        private function mcfw_get_selected_products() {
            $product_ids = get_option('multiple_fee_products', array());
            $products = array();

            if (!empty($product_ids)) {
                foreach ($product_ids as $product_id) {
                    $product = wc_get_product($product_id);
                    if ($product) {
                        $products[$product_id] = wp_strip_all_tags($product->get_formatted_name());
                    }
                }
            }

            return $products;
        }
    }

    new Multple_Cart_Fee_Admin();
} 