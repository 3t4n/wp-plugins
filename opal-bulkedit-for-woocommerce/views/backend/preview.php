<?php
/** 
 * OPBW Preview Products
 * @uses preview_obj
 * @uses per_page
 * @uses kw
 * @uses selected_all
 * 
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly    

?>

<div id="opbw-preview" class="opbw-box">
    <div class="opbw_header_settings">
        <h2 class="opbw_title_page"><?php esc_html_e('Preview the Products', 'opal-bulkedit-for-woocommerce') ?></h2>
    </div>
    <div class="opbw-inner-box">
        <div class="opbw_preview_action">
            <div class="opbw-flex opbw_flex_align_items_end" style="grid-gap: 30px;">
                <div class="opbw-flex opbw_flex_align_items_end">
                    <?php
                    woocommerce_wp_text_input(
                        array(
                            'id'          => 'preview_items_per_page',
                            'label'       => esc_html__( 'Items per page', 'opal-bulkedit-for-woocommerce' ),
                            'placeholder' => __('Value', 'opal-bulkedit-for-woocommerce'),
                            'value'       => $per_page,
                            'description' => esc_html__( 'Items per page', 'opal-bulkedit-for-woocommerce' ),
                            'style' => 'display: block; width: 140px; padding: 5px 10px',
                            'type' => 'number',
                            'desc_tip' => true,
                        )
                    );
                    ?>
                    <button type="button" id="opbw_apply_items" style="padding: 5px 20px;" class="button button-primary"><?php esc_html_e('Apply', 'opal-bulkedit-for-woocommerce') ?></button>
                </div>
                <div class="opbw-flex opbw_flex_align_items_end">
                    <?php
                    woocommerce_wp_text_input(
                        array(
                            'id'          => 'preview_search',
                            'label'       => esc_html__( 'Search', 'opal-bulkedit-for-woocommerce' ),
                            'placeholder' => __('Typing some keywords', 'opal-bulkedit-for-woocommerce'),
                            'value'       => $kw,
                            'description' => esc_html__( 'Typing some keywords', 'opal-bulkedit-for-woocommerce' ),
                            'style' => 'display: block; width: 200px; padding: 5px 10px',
                            'desc_tip' => true,
                        )
                    );
                    ?>
                </div>
                <div class="opbw-flex opbw_flex_align_items_end">
                    <?php
                        opbw_wp_checkbox( array( 
                            'id' => 'select_all_checked',
                            'label' => esc_html__('Select/Unselect All', 'opal-bulkedit-for-woocommerce'),
                            'value' => true,
                            'cbvalue' => $selected_all,
                            'checkbox_ui' => true,
                        ) );
                    ?>
                </div>
            </div>
        </div>
        <?php $preview_obj->display(); ?>
    </div>
    <div class="opbw_action mt">
        <div class="opbw-flex opbw_flex_justify_space_between">
            <div class="opbw-flex">
                <button type="button" class="opbw_back_step button button-hero button-primary" data-stepback="1" style="margin-right: 15px;"><?php esc_html_e('Back', 'opal-bulkedit-for-woocommerce') ?></button>
                <button type="button" class="opbw_reset_filter button button-hero"><?php esc_html_e('Reset Filter', 'opal-bulkedit-for-woocommerce') ?></button>
            </div>
            <button type="button" id="opbw_confirm_preview" class="button button-hero button-primary"><?php esc_html_e('Confirm & Edit', 'opal-bulkedit-for-woocommerce') ?></button>
        </div>
    </div>
</div>