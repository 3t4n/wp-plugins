<?php
/** 
 * OPBW Filter
 * 
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly    

$option_text = [
    'all' => __( 'All', 'opal-bulkedit-for-woocommerce' ),
    'contains' => __( 'Contains', 'opal-bulkedit-for-woocommerce' ),
    'not_contains' => __( 'Not Contains', 'opal-bulkedit-for-woocommerce' ),
    'start_with' => __( 'Start With', 'opal-bulkedit-for-woocommerce' ),
    'end_with' => __( 'End With', 'opal-bulkedit-for-woocommerce' ),
];
$option_number = [
    'all' => __( 'All', 'opal-bulkedit-for-woocommerce' ),
    'between' => __( 'Between', 'opal-bulkedit-for-woocommerce' ),
    '>' => '>',
    '<' => '<',
    '>=' => '>=',
    '<=' => '<=',
    '==' => '==',
    '!=' => '!=',
];
?>
<div id="opbw-filter" class="opbw-box">
    <div class="opbw_header_settings">
        <h2 class="opbw_title_page"><?php esc_html_e('Filter the Products', 'opal-bulkedit-for-woocommerce') ?></h2>
    </div>
    <form class="opbw-inner-box opbw-form" action="" method="post">
        <div class="opbw-content">
            <div class="options_group">
                <h3><?php esc_html_e('Filter by Content', 'opal-bulkedit-for-woocommerce') ?></h3>
                <ul>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_title',
                                'value'       => 'all',
                                'options'     => $option_text,
                                'label'       => __( 'Product Title', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field text_select_field',
                                'description' => __('Select a condition from the drop-down and enter a product title', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_sku',
                                'value'       => 'all',
                                'options'     => $option_text,
                                'label'       => __( 'Product SKU', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field text_select_field',
                                'description' => __('Select a condition from the drop-down and enter a product SKU', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_description',
                                'value'       => 'all',
                                'options'     => $option_text,
                                'label'       => __( 'Product Description', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field text_select_field',
                                'description' => __('Select a condition from the drop-down and enter a product description', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_short_description',
                                'value'       => 'all',
                                'options'     => $option_text,
                                'label'       => __( 'Product Short Description', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field text_select_field',
                                'description' => __('Select a condition from the drop-down and enter a product short description', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_price',
                                'value'       => 'all',
                                'options'     => $option_number,
                                'label'       => __( 'Product Regular Price', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field number_select_field',
                                'description' => __('Select a condition and specify a price', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_weight',
                                'value'       => 'all',
                                'options'     => $option_number,
                                'label'       => __( 'Product Weight', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field number_select_field',
                                'description' => __('Select a condition and specify a weight', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_types[]',
                                'value'       => '',
                                'options'     => wc_get_product_types(),
                                'label'       => __( 'Product Types', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_init_select2',
                                'description' => __(' Select the product type(s) for which the filter has to be applied', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                                'custom_attributes' => [
                                    'multiple' => "multiple",
                                    'data-placeholder' => __( 'Select product types', 'opal-bulkedit-for-woocommerce' ),
                                ]
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_status[]',
                                'value'       => '',
                                'options'     => [
                                    'published' => 'Published',
                                    'pending' => 'Pending',
                                    'draf' => 'Draf',
                                ],
                                'label'       => __( 'Product Status', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_init_select2',
                                'description' => __('Select the product status for which the filter has to be applied', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                                'custom_attributes' => [
                                    'multiple' => "multiple",
                                    'data-placeholder' => __( 'Select product status', 'opal-bulkedit-for-woocommerce' ),
                                ]
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_stock_status[]',
                                'value'       => '',
                                'options'     => wc_get_product_stock_status_options(),
                                'label'       => __( 'Product Stock', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_init_select2',
                                'description' => __('Select the stock status for which the filter has to be applied', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                                'custom_attributes' => [
                                    'multiple' => "multiple",
                                    'data-placeholder' => __( 'Select product stock status', 'opal-bulkedit-for-woocommerce' ),
                                ]
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_categories[]',
                                'value'       => '',
                                'options'     => [],
                                'label'       => __( 'Product Categories', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_init_select2 opbw_ajax_select2',
                                'description' => __('Select the category(s) for which the filter has to be applied. The products added to any of the selected categories will be filtered. Enable the checkbox to include subcategories', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                                'custom_attributes' => [
                                    'multiple' => "multiple",
                                    'data-term' => 'category',
                                    'data-placeholder' => __( 'Select Categories', 'opal-bulkedit-for-woocommerce' ),
                                ]
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_tags[]',
                                'value'       => '',
                                'options'     => [],
                                'label'       => __( 'Product Tags', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_init_select2 opbw_ajax_select2',
                                'description' => __(' Select the product tag(s) for which the filter has to be applied ', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                                'custom_attributes' => [
                                    'multiple' => "multiple",
                                    'data-term' => 'tag',
                                    'data-placeholder' => __( 'Select Tags', 'opal-bulkedit-for-woocommerce' ),
                                ]
                            )
                        );
                    ?>
                    </li>
                </ul>
            </div>
            <div class="options_group">
                <h3><?php esc_html_e('Filter by Attributes', 'opal-bulkedit-for-woocommerce') ?></h3>
                <ul>
                    <li>
                    <?php
                        opbw_wp_radio(
                            array(
                                'id'          => 'attr_relation',
                                'value'       => 'or',
                                'options'     => [
                                    'or' => 'OR',
                                    'and' => 'AND',
                                ],
                                'label'       => __( 'Attribute Ralation Filter', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_field',
                                'description' => __('Select a condition from the drop-down and enter a product title', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        $attr_options = [];
                        if (!empty(wc_get_attribute_taxonomies())) {
                            foreach (wc_get_attribute_taxonomies() as $attr) {
                                $attr_options[$attr->attribute_name] = $attr->attribute_label;
                            }
                        }
                        opbw_wp_multiple_checkbox( array( 
                            'wrapper_class' => 'opbw_setting_form', 
                            'class' => 'opbw_field',
                            'id' => 'tax_attributes[]',
                            'label' => esc_html__('Attributes Taxonomy', 'opal-bulkedit-for-woocommerce'),
                            'value' => 0,
                            'options'     => $attr_options,
                            'description' => esc_html__('Select attributes taxonomy to filter', 'opal-bulkedit-for-woocommerce'),
                            'desc_tip' => true,
                        ) );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_attributes[]',
                                'value'       => '',
                                'options'     => [],
                                'label'       => __( 'Product Attributes', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_init_select2',
                                'description' => __(' Select the product attribute(s) for which the filter has to be applied ', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                                'custom_attributes' => [
                                    'multiple' => "multiple",
                                    'data-placeholder' => __( 'Select Attributes', 'opal-bulkedit-for-woocommerce' ),
                                ]
                            )
                        );
                    ?>
                    </li>
                </ul>
            </div>
            <div class="options_group">
                <h3><?php esc_html_e('Exclude for Filter', 'opal-bulkedit-for-woocommerce') ?></h3>
                <ul>
                    <li>
                        <?php
                        opbw_wp_checkbox( array( 
                            'wrapper_class' => 'opbw_setting_form opbw_flex_align_items_center', 
                            'id' => 'show_exclude',
                            'class' => 'opbw_setting_field opbw_field opbw_field_trigger',
                            'label' => esc_html__('Show exclude products', 'opal-bulkedit-for-woocommerce'),
                            'value' => 0,
                            'description' => esc_html__('Excluding products from filter resuilt', 'opal-bulkedit-for-woocommerce'),
                            'cbvalue' => 1,
                            'checkbox_ui' => true
                        ) );
                        ?>
                    </li>
                </ul>
                <ul class="option_list trigger-condition <?php echo esc_attr('hidden_setting') ?>" data-condition="show_exclude">
                    <li>
                        <?php
                            woocommerce_wp_select(
                                array(
                                    'id'          => 'exclude_products[]',
                                    'value'       => '',
                                    'options'     => [],
                                    'wrapper_class' => 'opbw_setting_form', 
                                    'label' => esc_html__('Select exclude products', 'opal-bulkedit-for-woocommerce'),
                                    'class' => 'opbw_setting_field opbw_field opbw_init_select2 opbw_ajax_select2',
                                    'custom_attributes' => [
                                        'multiple' => "multiple",
                                        'data-term' => 'product',
                                        'data-placeholder' => __( 'Typing to select', 'opal-bulkedit-for-woocommerce' ),
                                    ]
                                )
                            );
                        ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="opbw_action mt">
            <input type="hidden" name="action" value="opbw_handle_filter_form">
            <?php //wp_nonce_field('opbw-nonce-ajax', 'ajax_nonce_parameter');  ?>
            <div class="opbw-flex opbw_flex_justify_space_between">
                <button type="button" class="opbw_reset_filter button button-hero opbw_disable"><?php esc_html_e('Reset Filter', 'opal-bulkedit-for-woocommerce') ?></button>
                <button type="submit" id="opbw_submit_filter" class="button button-hero button-primary"><?php esc_html_e('Preview Filtered Products', 'opal-bulkedit-for-woocommerce') ?></button>
            </div>
        </div>
    </form>
</div>