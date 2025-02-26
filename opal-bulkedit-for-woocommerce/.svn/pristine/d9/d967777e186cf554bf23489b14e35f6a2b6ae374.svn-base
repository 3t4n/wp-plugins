<?php
/** 
 * OPBW Edit Products
 * 
 * @uses history_id
 * @uses count_products_selected
 * 
*/

use Automattic\WooCommerce\Utilities\I18nUtil;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly    

$option_content = [
    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
    'set_new' => __( 'Set New', 'opal-bulkedit-for-woocommerce' ),
    'append' => __( 'Append', 'opal-bulkedit-for-woocommerce' ),
    'prepand' => __( 'Prepend', 'opal-bulkedit-for-woocommerce' ),
    'replace' => __( 'Replace', 'opal-bulkedit-for-woocommerce' ),
];
$option_number = [
    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
    'increase' => __( 'Increase (+)', 'opal-bulkedit-for-woocommerce' ),
    'decrease' => __( 'Decrease (-)', 'opal-bulkedit-for-woocommerce' ),
    'fixed' => __( 'Fixed', 'opal-bulkedit-for-woocommerce' ),
];

$symbol = get_woocommerce_currency_symbol();
$option_price = [
    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
    'up_percentage' => __('Increase by Percentage ( + %)', 'opal-bulkedit-for-woocommerce'),
    'down_percentage' => __('Decrease by Percentage ( - %)', 'opal-bulkedit-for-woocommerce'),
    'up_price' => sprintf('%1s  ( + %2s)', __('Increase by Price', 'opal-bulkedit-for-woocommerce'), $symbol),
    'down_price' => sprintf('%1s  ( - %2s)', __('Decrease by Price', 'opal-bulkedit-for-woocommerce'), $symbol),
    'flat_all' => __('Flat Price for All', 'opal-bulkedit-for-woocommerce'),
];

?>
<div id="opbw-edit" class="opbw-box">
    <div class="opbw_header_settings opbw-flex opbw_flex_justify_space_between">
        <h2 class="opbw_title_page"><?php esc_html_e('Handling of Products', 'opal-bulkedit-for-woocommerce') ?></h2>
        <strong style="font-size: 15px;"><?php 
            $cound_pad = str_pad($count_products_selected, 2, '0', STR_PAD_LEFT);
            /* translators: %s - Number of products selected */
            printf(esc_html(_n( '%s product selected', '%s products selected', $count_products_selected, 'opal-bulkedit-for-woocommerce' )), esc_html($cound_pad));
        ?></strong>
    </div>
    <form class="opbw-inner-box opbw-form" action="" method="post">
        <input type="hidden" name="opbw_history" value="<?php echo esc_attr($history_id) ?>">
        <div class="opbw-content">
            <div class="options_group">
                <h3><?php esc_html_e('Handling Action', 'opal-bulkedit-for-woocommerce') ?></h3>
                <ul>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'delete_action',
                                'value'       => 'none',
                                'options'     => [
                                    'none' => __( 'Edit', 'opal-bulkedit-for-woocommerce' ),
                                    'move_to_trash' => __( 'Move to trash', 'opal-bulkedit-for-woocommerce' ),
                                    'delete_permanently' => __( 'Delete Permanently', 'opal-bulkedit-for-woocommerce' ),
                                ],
                                'label'       => __( 'Delete Action', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_field_trigger',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                </ul>
            </div>
            
            <div class="options_group trigger-condition" data-condition="delete_action" data-condition-value="none">
                <h3><?php esc_html_e('Content', 'opal-bulkedit-for-woocommerce') ?></h3>
                <ul>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'title_change',
                                'value'       => 'none',
                                'options'     => $option_content,
                                'label'       => __( 'Product Title', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_content_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'sku_change',
                                'value'       => 'none',
                                'options'     => $option_content,
                                'label'       => __( 'Product SKU', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_content_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'description_change',
                                'value'       => 'none',
                                'options'     => $option_content,
                                'label'       => __( 'Product Description', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_content_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'short_description_change',
                                'value'       => 'none',
                                'options'     => $option_content,
                                'label'       => __( 'Product Short Description', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_content_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'featured_change',
                                'value'       => 'none',
                                'options'     => [
                                    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
                                    'yes' => __( 'Yes', 'opal-bulkedit-for-woocommerce' ),
                                    'no' => __( 'No', 'opal-bulkedit-for-woocommerce' ),
                                ],
                                'label'       => __( 'Featured Product', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'thumbnail_change',
                                'value'       => 'none',
                                'options'     => [
                                    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
                                    'update' => __( 'Update', 'opal-bulkedit-for-woocommerce' ),
                                    'remove' => __( 'Remove', 'opal-bulkedit-for-woocommerce' ),
                                ],
                                'label'       => __( 'Product Thumbnail', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_field_trigger',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li class="trigger-condition <?php echo esc_attr('opbw_hidden') ?>" data-class-toggle="opbw_hidden" data-condition="thumbnail_change" data-condition-value="update">
                    <?php
                        woocommerce_wp_text_input(
                            array(
                                'id'          => 'thumbnail_change_id',
                                'value'       => '',
                                'label'       => __( 'Product Thumbnail', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_media_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                                'type' => 'hidden'
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'gallery_change',
                                'value'       => 'none',
                                'options'     => [
                                    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
                                    'add' => __( 'Add', 'opal-bulkedit-for-woocommerce' ),
                                    'remove' => __( 'Remove', 'opal-bulkedit-for-woocommerce' ),
                                    'remove_all' => __( 'Remove All', 'opal-bulkedit-for-woocommerce' ),
                                ],
                                'label'       => __( 'Product Gallery', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_field_trigger',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li class="trigger-condition <?php echo esc_attr('opbw_hidden') ?>" data-class-toggle="opbw_hidden" data-condition="gallery_change" data-condition-value="add|remove">
                    <?php
                        woocommerce_wp_text_input(
                            array(
                                'id'          => 'gallery_change_images',
                                'value'       => '',
                                'label'       => __( 'Product Gallery Images', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_media_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                                'type' => 'hidden',
                                'custom_attributes' => [
                                    'data-multiple' => '1'
                                ]
                            )
                        );
                    ?>
                    </li>
                </ul>
            </div>

            <div class="options_group trigger-condition" data-condition="delete_action" data-condition-value="none">
                <h3><?php esc_html_e('Price', 'opal-bulkedit-for-woocommerce') ?></h3>
                <ul>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'regular_price',
                                'value'       => 'none',
                                'options'     => $option_price,
                                'label'       => __( 'Regular Price', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_price_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'sale_price',
                                'value'       => 'none',
                                'options'     => $option_price,
                                'label'       => __( 'Sale Price', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_price_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'schedule_sale_price',
                                'value'       => 'none',
                                'options'     => [
                                    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
                                    'enable' => __( 'Enable', 'opal-bulkedit-for-woocommerce' ),
                                    'disable' => __( 'Disable', 'opal-bulkedit-for-woocommerce' ),
                                ],
                                'label'       => __( 'Schedule Sale Price', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_field_trigger',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li class="trigger-condition <?php echo esc_attr('hidden_setting') ?>" data-condition="schedule_sale_price" data-condition-value="enable">
                        <div class="mb">
                        <?php
                            woocommerce_wp_text_input(
                                array(
                                    'id'          => 'sale_start',
                                    'value'       => '',
                                    'label'       => __( 'Sale start date', 'opal-bulkedit-for-woocommerce' ),
                                    'wrapper_class' => 'opbw_setting_form', 
                                    'class' => 'opbw_setting_field opbw_field opbw_date_field',
                                    'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                    'desc_tip' => true,
                                    'placeholder' => esc_html( _x( 'From&hellip;', 'placeholder', 'opal-bulkedit-for-woocommerce' ) ) . ' YYYY-MM-DD',
                                    // 'custom_attributes' => [
                                    //     'enable-time' => false,
                                    // ]
                                )
                            );
                        ?>
                        </div>
                        <div>
                        <?php
                            woocommerce_wp_text_input(
                                array(
                                    'id'          => 'sale_end',
                                    'value'       => '',
                                    'label'       => __( 'Sale end date', 'opal-bulkedit-for-woocommerce' ),
                                    'wrapper_class' => 'opbw_setting_form', 
                                    'class' => 'opbw_setting_field opbw_field opbw_date_field',
                                    'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                    'desc_tip' => true,
                                    'placeholder' => esc_html( _x( 'To&hellip;', 'placeholder', 'opal-bulkedit-for-woocommerce' ) ) . ' YYYY-MM-DD',
                                    // 'custom_attributes' => [
                                    //     'enable-time' => false,
                                    // ]
                                )
                            );
                        ?>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="options_group trigger-condition" data-condition="delete_action" data-condition-value="none">
                <h3><?php esc_html_e('Inventory', 'opal-bulkedit-for-woocommerce') ?></h3>
                <ul>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'stock_management',
                                'value'       => 'none',
                                'options'     => [
                                    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
                                    'yes' => __( 'Yes', 'opal-bulkedit-for-woocommerce' ),
                                    'no' => __( 'No', 'opal-bulkedit-for-woocommerce' ),
                                ],
                                'label'       => __( 'Stock Management', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'allow_backorders',
                                'value'       => 'none',
                                'options'     => [
                                    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
                                    'no' => __( 'Do not allow', 'opal-bulkedit-for-woocommerce' ),
                                    'notify' => __( 'Allow, but notify customer', 'opal-bulkedit-for-woocommerce' ),
                                    'yes' => __( 'Allow', 'opal-bulkedit-for-woocommerce' ),
                                ],
                                'label'       => __( 'Allow Backorders?', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'sold_individually',
                                'value'       => 'none',
                                'options'     => [
                                    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
                                    'yes' => __( 'Yes', 'opal-bulkedit-for-woocommerce' ),
                                    'no' => __( 'No', 'opal-bulkedit-for-woocommerce' ),
                                ],
                                'label'       => __( 'Sold Individually', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'stock_status',
                                'value'       => 'none',
                                'options'     => [
                                    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
                                    'instock' => __( 'In stock', 'opal-bulkedit-for-woocommerce' ),
                                    'outofstock' => __( 'Out of stock', 'opal-bulkedit-for-woocommerce' ),
                                    'onbackorder' => __( 'On backorder', 'opal-bulkedit-for-woocommerce' ),
                                ],
                                'label'       => __( 'Stock Status', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'stock_quantity',
                                'value'       => 'none',
                                'options'     => $option_number,
                                'label'       => __( 'Stock Quantity', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_number_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                </ul>
            </div>

            <div class="options_group trigger-condition" data-condition="delete_action" data-condition-value="none">
                <h3><?php esc_html_e('Shipping', 'opal-bulkedit-for-woocommerce') ?></h3>
                <ul>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_weight',
                                'value'       => 'none',
                                'options'     => $option_number,
                                'label'       => sprintf(
                                    /* translators: %s: Weight unit */
                                    __( 'Weight (%s)', 'opal-bulkedit-for-woocommerce' ),
                                    I18nUtil::get_weight_unit_label( get_option( 'woocommerce_weight_unit', 'kg' ) )
                                ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_number_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_length',
                                'value'       => 'none',
                                'options'     => $option_number,
                                'label'       => sprintf(
                                    /* translators: %s: Length unit */
                                    __( 'Length (%s)', 'opal-bulkedit-for-woocommerce' ),
                                    I18nUtil::get_dimensions_unit_label( get_option( 'woocommerce_dimension_unit', 'cm' ) )
                                ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_number_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_width',
                                'value'       => 'none',
                                'options'     => $option_number,
                                'label'       => sprintf(
                                    /* translators: %s: Width unit */
                                    __( 'Width (%s)', 'opal-bulkedit-for-woocommerce' ),
                                    I18nUtil::get_dimensions_unit_label( get_option( 'woocommerce_dimension_unit', 'cm' ) )
                                ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_number_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'product_height',
                                'value'       => 'none',
                                'options'     => $option_number,
                                'label'       => sprintf(
                                    /* translators: %s: Height unit */
                                    __( 'Height (%s)', 'opal-bulkedit-for-woocommerce' ),
                                    I18nUtil::get_dimensions_unit_label( get_option( 'woocommerce_dimension_unit', 'cm' ) )
                                ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_number_field',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                </ul>
            </div>

            <div class="options_group trigger-condition" data-condition="delete_action" data-condition-value="none">
                <h3><?php esc_html_e('Attributes', 'opal-bulkedit-for-woocommerce') ?></h3>
                <ul>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'attr_action',
                                'value'       => 'none',
                                'options'     => [
                                    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
                                    'add' => __( 'Add and Apply', 'opal-bulkedit-for-woocommerce' ),
                                    'remove' => __( 'Remove', 'opal-bulkedit-for-woocommerce' ),
                                ],
                                'label'       => __( 'Attribute Actions', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_field_trigger',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li class="trigger-condition <?php echo esc_attr('opbw_hidden') ?>" data-class-toggle="opbw_hidden" data-condition="attr_action" data-condition-value="!none">
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'variants_change[]',
                                'value'       => '',
                                'options'     => opbw_get_all_variants(),
                                'label'       => __( 'Choose Variants', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_init_select2',
                                'description' => __('Select the category(s) for which the filter has to be applied. The products added to any of the selected categories will be filtered. Enable the checkbox to include subcategories', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                                'custom_attributes' => [
                                    'multiple' => "multiple",
                                    'data-placeholder' => __( 'Select Variants', 'opal-bulkedit-for-woocommerce' ),
                                ]
                            )
                        );
                    ?>
                    </li>
                    <li class="trigger-condition <?php echo esc_attr('opbw_hidden') ?>" data-class-toggle="opbw_hidden" data-condition="attr_action" data-condition-value="add">
                        <div>
                        <?php
                            opbw_wp_checkbox( array( 
                                'wrapper_class' => 'opbw_setting_form opbw_flex_align_items_center', 
                                'id' => 'attrs_allow_new',
                                'class' => 'opbw_setting_field opbw_field opbw_field_trigger',
                                'label' => esc_html__('Add New Attribute', 'opal-bulkedit-for-woocommerce'),
                                'value' => 0,
                                'description' => esc_html__('Excluding products from filter resuilt', 'opal-bulkedit-for-woocommerce'),
                                'cbvalue' => 1,
                                'checkbox_ui' => true
                            ) );
                        ?>
                        </div>
                        <ul class="trigger-condition <?php echo esc_attr('hidden_setting') ?>" data-condition="attrs_allow_new">
                            <li>
                            <?php
                                woocommerce_wp_select(
                                    array(
                                        'id'          => 'attrs_add',
                                        'value'       => '',
                                        'options'     => opbw_get_main_attr(),
                                        'label'       => __( 'Choose Attributes to Add', 'opal-bulkedit-for-woocommerce' ),
                                        'wrapper_class' => 'opbw_setting_form', 
                                        'class' => 'opbw_setting_field opbw_field',
                                        'description' => __('Select the category(s) for which the filter has to be applied. The products added to any of the selected categories will be filtered. Enable the checkbox to include subcategories', 'opal-bulkedit-for-woocommerce'),
                                        'desc_tip' => true,
                                    )
                                );
                            ?>
                            </li>
                            <li>
                                <?php
                                woocommerce_wp_textarea_input(
                                    array(
                                        'id'          => 'attrs_tax_add',
                                        'value'       => '',
                                        'label'       => __( 'Attribute Values', 'opal-bulkedit-for-woocommerce' ),
                                        'wrapper_class' => 'opbw_setting_form', 
                                        'class' => 'opbw_setting_field opbw_field',
                                        'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                        'placeholder' => __('Enter each value in new line', 'opal-bulkedit-for-woocommerce'),
                                        'desc_tip' => true,
                                        'rows' => 5,
                                    )
                                );
                                ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            
            <div class="options_group trigger-condition" data-condition="delete_action" data-condition-value="none">
                <h3><?php esc_html_e('Categories', 'opal-bulkedit-for-woocommerce') ?></h3>
                <ul>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'category_change',
                                'value'       => 'none',
                                'options'     => [
                                    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
                                    'add' => __( 'Add and Apply', 'opal-bulkedit-for-woocommerce' ),
                                    'remove' => __( 'Remove', 'opal-bulkedit-for-woocommerce' ),
                                ],
                                'label'       => __( 'Product Categories', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_field_trigger',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li class="trigger-condition <?php echo esc_attr('opbw_hidden') ?>" data-class-toggle="opbw_hidden" data-condition="category_change" data-condition-value="!none">
                        <div>
                        <?php
                            woocommerce_wp_select(
                                array(
                                    'id'          => 'category_change_ids[]',
                                    'value'       => '',
                                    'options'     => [],
                                    'label'       => __( 'Product Categories List', 'opal-bulkedit-for-woocommerce' ),
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
                        </div>
                        <ul class="mt trigger-condition <?php echo esc_attr('opbw_hidden') ?>" data-class-toggle="opbw_hidden" data-condition="category_change" data-condition-value="add">
                            <li>
                            <?php
                                opbw_wp_checkbox( array( 
                                    'wrapper_class' => 'opbw_setting_form opbw_flex_align_items_center', 
                                    'id' => 'category_change_add_new',
                                    'class' => 'opbw_setting_field opbw_field opbw_field_trigger',
                                    'label' => esc_html__('Add New Tag', 'opal-bulkedit-for-woocommerce'),
                                    'value' => 0,
                                    'description' => esc_html__('Excluding products from filter resuilt', 'opal-bulkedit-for-woocommerce'),
                                    'cbvalue' => 1,
                                    'checkbox_ui' => true
                                ) );
                            ?>
                            </li>
                            <li class="trigger-condition <?php echo esc_attr('hidden_setting') ?>" data-condition="category_change_add_new">
                                <?php
                                woocommerce_wp_textarea_input(
                                    array(
                                        'id'          => 'category_change_new_val',
                                        'value'       => '',
                                        'label'       => __( 'New Category Values', 'opal-bulkedit-for-woocommerce' ),
                                        'wrapper_class' => 'opbw_setting_form', 
                                        'class' => 'opbw_setting_field opbw_field',
                                        'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                        'placeholder' => __('Enter each value in new line', 'opal-bulkedit-for-woocommerce'),
                                        'desc_tip' => true,
                                        'rows' => 5,
                                    )
                                );
                                ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="options_group trigger-condition" data-condition="delete_action" data-condition-value="none">
                <h3><?php esc_html_e('Tags', 'opal-bulkedit-for-woocommerce') ?></h3>
                <ul>
                    <li>
                    <?php
                        woocommerce_wp_select(
                            array(
                                'id'          => 'tag_change',
                                'value'       => 'none',
                                'options'     => [
                                    'none' => __( '< No Change >', 'opal-bulkedit-for-woocommerce' ),
                                    'add' => __( 'Add and Apply', 'opal-bulkedit-for-woocommerce' ),
                                    'remove' => __( 'Remove', 'opal-bulkedit-for-woocommerce' ),
                                ],
                                'label'       => __( 'Product Tags', 'opal-bulkedit-for-woocommerce' ),
                                'wrapper_class' => 'opbw_setting_form', 
                                'class' => 'opbw_setting_field opbw_field opbw_field_trigger',
                                'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                'desc_tip' => true,
                            )
                        );
                    ?>
                    </li>
                    <li class="trigger-condition <?php echo esc_attr('opbw_hidden') ?>" data-class-toggle="opbw_hidden" data-condition="tag_change" data-condition-value="!none">
                        <div>
                        <?php
                            woocommerce_wp_select(
                                array(
                                    'id'          => 'tag_change_ids[]',
                                    'value'       => '',
                                    'options'     => [],
                                    'label'       => __( 'Product Tags List', 'opal-bulkedit-for-woocommerce' ),
                                    'wrapper_class' => 'opbw_setting_form', 
                                    'class' => 'opbw_setting_field opbw_field opbw_init_select2 opbw_ajax_select2',
                                    'description' => __('Select the tag(s) for which the filter has to be applied. The products added to any of the selected tags will be filtered. Enable the checkbox to include subtags', 'opal-bulkedit-for-woocommerce'),
                                    'desc_tip' => true,
                                    'custom_attributes' => [
                                        'multiple' => "multiple",
                                        'data-term' => 'tag',
                                        'data-placeholder' => __( 'Select Tags', 'opal-bulkedit-for-woocommerce' ),
                                    ]
                                )
                            );
                        ?>
                        </div>
                        <ul class="mt trigger-condition <?php echo esc_attr('opbw_hidden') ?>" data-class-toggle="opbw_hidden" data-condition="tag_change" data-condition-value="add">
                            <li>
                            <?php
                                opbw_wp_checkbox( array( 
                                    'wrapper_class' => 'opbw_setting_form opbw_flex_align_items_center', 
                                    'id' => 'tag_change_add_new',
                                    'class' => 'opbw_setting_field opbw_field opbw_field_trigger',
                                    'label' => esc_html__('Add New Tag', 'opal-bulkedit-for-woocommerce'),
                                    'value' => 0,
                                    'description' => esc_html__('Excluding products from filter resuilt', 'opal-bulkedit-for-woocommerce'),
                                    'cbvalue' => 1,
                                    'checkbox_ui' => true
                                ) );
                            ?>
                            </li>
                            <li class="trigger-condition <?php echo esc_attr('hidden_setting') ?>" data-condition="tag_change_add_new">
                                <?php
                                woocommerce_wp_textarea_input(
                                    array(
                                        'id'          => 'tag_change_new_val',
                                        'value'       => '',
                                        'label'       => __( 'New Tag Values', 'opal-bulkedit-for-woocommerce' ),
                                        'wrapper_class' => 'opbw_setting_form', 
                                        'class' => 'opbw_setting_field opbw_field',
                                        'description' => __('Select a condition to edit the title, and enter the relevant text', 'opal-bulkedit-for-woocommerce'),
                                        'placeholder' => __('Enter each value in new line', 'opal-bulkedit-for-woocommerce'),
                                        'desc_tip' => true,
                                        'rows' => 5,
                                    )
                                );
                                ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="opbw_action mt">
            <div class="opbw-flex opbw_flex_justify_space_between">
                <div class="opbw-flex">
                    <button type="button" class="opbw_back_step button button-hero button-primary" data-stepback="2" style="margin-right: 15px;"><?php esc_html_e('Back', 'opal-bulkedit-for-woocommerce') ?></button>
                    <button type="button" class="opbw_reset_edit button button-hero opbw_disable"><?php esc_html_e('Reset Value', 'opal-bulkedit-for-woocommerce') ?></button>
                </div>
                <button type="submit" id="opbw_submit_editor" class="button button-hero button-primary"><?php esc_html_e('Update products', 'opal-bulkedit-for-woocommerce') ?></button>
            </div>
        </div>
    </form>
</div>