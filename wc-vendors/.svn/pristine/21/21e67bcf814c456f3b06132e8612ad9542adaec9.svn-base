<?php

/**
 * Product Variations
 *
 * This file is used to load the product variations
 *
 * @link       http://www.wcvendors.com
 * @since      2.5.2
 * @version    2.5.2
 */
use WC_Vendors\Classes\Front\WCV_Product_Controller;
?>
<?php
$hide_enabled         = wc_string_to_bool( get_option( 'wcvendors_hide_product_variations_enabled', 'no' ) );
$hide_downloadable    = wc_string_to_bool( get_option( 'wcvendors_hide_product_variations_downloadable', 'no' ) );
$hide_virtual         = wc_string_to_bool( get_option( 'wcvendors_hide_product_variations_virtual', 'no' ) );
$hide_manage_stock    = wc_string_to_bool( get_option( 'wcvendors_hide_product_variations_manage_stock', 'no' ) );
$hide_price           = wc_string_to_bool( get_option( 'wcvendors_hide_product_variations_price', 'no' ) );
$hide_sale_price      = wc_string_to_bool( get_option( 'wcvendors_hide_product_variations_sale_price', 'no' ) );
$hide_stock_qty       = wc_string_to_bool( get_option( 'wcvendors_hide_product_variations_stock_qty', 'no' ) );
$hide_stock_status    = wc_string_to_bool( get_option( 'wcvendors_hide_product_variations_stock_status', 'no' ) );
$hide_weight          = wc_string_to_bool( get_option( 'wcvendors_hide_product_variations_weight', 'no' ) );
$hide_dimensions      = wc_string_to_bool( get_option( 'wcvendors_hide_product_variations_dimensions', 'no' ) );
$hide_shipping_class  = wc_string_to_bool( get_option( 'wcvendors_hide_product_variations_shipping_class', 'no' ) );
$hide_download_limit  = wc_string_to_bool( get_option( 'wcvendors_hide_product_variations_download_limit', 'no' ) );
$hide_download_expiry = wc_string_to_bool( get_option( 'wcvendors_hide_product_variations_download_expiry', 'no' ) );

$variaton_dropdown_type = get_option( 'wcvendors_variation_actions_dropdown_type', '' );

$actions            = array();
$actions['options'] = array(
    'add_variation'       => array(
        'label'      => __( 'Add variation', 'wc-vendors' ),
        'attributes' => array( 'data-global' => true ),
    ),
    'link_all_variations' => array(
        'label'      => __( 'Create variations from all attributes', 'wc-vendors' ),
        'attributes' => array( 'data-global' => true ),
    ),
    'delete_all'          => array( 'label' => __( 'Delete all variations', 'wc-vendors' ) ),
);

$actions['groups']['status']       = array(
    'label'   => __( 'Status', 'wc-vendors' ),
    'id'      => 'variable_status',
    'options' => array(
        'toggle_variable_enabled'         => array( 'label' => __( 'Toggle &quot;Enabled&quot;', 'wc-vendors' ) ),
        'toggle_variable_is_downloadable' => array( 'label' => __( 'Toggle &quot;Downloadable&quot;', 'wc-vendors' ) ),
        'toggle_variable_is_virtual'      => array( 'label' => __( 'Toggle &quot;Virtual&quot;', 'wc-vendors' ) ),
    ),
);
$actions['groups']['pricing']      = array(
    'label'   => __( 'Pricing', 'wc-vendors' ),
    'id'      => 'variable_pricing',
    'options' => array(
        'variable_regular_price'          => array( 'label' => __( 'Set regular prices', 'wc-vendors' ) ),
        'variable_regular_price_increase' => array( 'label' => __( 'Increase regular prices (fixed amount or percentage)', 'wc-vendors' ) ),
        'variable_regular_price_decrease' => array( 'label' => __( 'Decrease regular prices (fixed amount or percentage)', 'wc-vendors' ) ),
        'variable_sale_price'             => array( 'label' => __( 'Set sale prices', 'wc-vendors' ) ),
        'variable_sale_price_increase'    => array( 'label' => __( 'Increase sale prices (fixed amount or percentage)', 'wc-vendors' ) ),
        'variable_sale_price_decrease'    => array( 'label' => __( 'Decrease sale prices (fixed amount or percentage)', 'wc-vendors' ) ),
        'variable_sale_schedule'          => array( 'label' => __( 'Set scheduled sale dates', 'wc-vendors' ) ),
    ),
);
$actions['groups']['inventory']    = array(
    'label'   => __( 'Inventory', 'wc-vendors' ),
    'id'      => 'variable_inventory',
    'options' => array(
        'toggle_variable_manage_stock' => array( 'label' => __( 'Toggle &quot;Manage stock&quot;', 'wc-vendors' ) ),
        'variable_stock'               => array( 'label' => __( 'Stock', 'wc-vendors' ) ),
    ),
);
$actions['groups']['shipping']     = array(
    'label'   => __( 'Shipping', 'wc-vendors' ),
    'id'      => 'variable_shipping',
    'options' => array(
        'variable_length' => array( 'label' => __( 'Length', 'wvvendors-pro' ) ),
        'variable_width'  => array( 'label' => __( 'Widgth', 'wvvendors-pro' ) ),
        'variable_height' => array( 'label' => __( 'Height', 'wvvendors-pro' ) ),
        'variable_weight' => array( 'label' => __( 'Weight', 'wvvendors-pro' ) ),
    ),
);
$actions['groups']['downloadable'] = array(
    'label'   => __( 'Downloadable products', 'wc-vendors' ),
    'id'      => 'variable_downloadable',
    'options' => array(
        'variable_download_limit'  => array( 'label' => __( 'Download limit', 'wvvendors-pro' ) ),
        'variable_download_expiry' => array( 'label' => __( 'Download expiry', 'wvvendors-pro' ) ),
    ),
);

if ( $hide_enabled ) {
    unset( $actions['groups']['status']['toggle_variation_enabled'] );
}

if ( $hide_downloadable ) {
    unset( $actions['groups']['status']['toggle_variation_is_downloadable'] );
}

if ( $hide_enabled ) {
    unset( $actions['groups']['status']['toggle_variation_is_virtual'] );
}

if ( $hide_manage_stock ) {
    unset( $actions['groups']['inventory']['toggle_variable_manage_stock'] );
}

if ( $hide_sale_price ) {
    unset( $actions['groups']['pricing']['variable_sale_price'] );
    unset( $actions['groups']['pricing']['variable_sale_price_increase'] );
    unset( $actions['groups']['pricing']['variable_sale_price_decrease'] );
    unset( $actions['groups']['pricing']['variable_sale_schedule'] );
}

if ( $hide_price ) {
    unset( $actions['groups']['pricing'] );
}

if ( $hide_stock_qty ) {
    unset( $actions['groups']['invetory']['variable_stock'] );
}

if ( $hide_dimensions ) {
    unset( $actions['groups']['shipping']['variable_width'] );
    unset( $actions['groups']['shipping']['variable_height'] );
    unset( $actions['groups']['shipping']['variable_length'] );
}

if ( $hide_weight ) {
    unset( $actions['groups']['shipping']['variable_weight'] );
}

if ( $hide_download_limit ) {
    unset( $actions['groups']['downloadable']['download_limit'] );
}

if ( $hide_download_expiry ) {
    unset( $actions['groups']['downloadable']['download_expiry'] );
}

$actions = wcv_deprecated_filter( 'wcvendors_pro_variation_actions', '2.5.2', 'wcvendors_variation_actions', $actions );

?>
<div id="wcv_variable_product_options" class="wcv-metaboxes-wrapper">

    <div id="variable_product_options_inner">
        <div class="wcv-cols-group wcv-horizontal-gutters variations_notice">
            <div class="all-100">
                <div id="wcv-attr-message" class="inline notice woocommerce-message">
                    <?php echo wp_kses( __( 'Before you can add a variation you need to add some variation attributes on the <strong>Attributes</strong> tab.', 'wc-vendors' ), wcv_allowed_html_tags() ); ?>
                </div>
            </div>
        </div>
        <div class="wcv-cols-group wcv-horizontal-gutters variation_options variations-toolbar">
            <div class="all-100">

                <?php if ( 'single' === $variaton_dropdown_type ) : ?>
                    <div class="wcv-cols-group control-group">
                        <div class="all-90 control">

                            <input type="hidden" name="variation_dropdown_type" id="variation_dropdown_type"
                                    value="single"/>
                            <select id="variation_actions_single" class="variation_actions">
                                <option></option>
                                <?php
                                foreach ( $actions['options'] as $value => $options ) :

                                    if ( isset( $options['attributes'] ) && is_array( $options['attributes'] ) ) {
                                        $option_attributes = ' ';
                                        foreach ( $options['attributes'] as $attribute_key => $attribute_value ) {
                                            $option_attributes .= ' ' . $attribute_key . '="' . $attribute_value . '"';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo esc_attr( $value ); ?>"
                                                                <?php
                                                                if ( $option_attributes ) {
                                                                    echo esc_attr( $option_attributes );
                                                                }
                                                                ?>
                                    ><?php echo esc_attr( $options['label'] ); ?></option>
                                <?php endforeach; ?>

                                <?php foreach ( $actions['groups'] as $group_id => $group ) : ?>
                                    <optgroup label="<?php echo esc_attr( $group['label'] ); ?>">
                                        <?php foreach ( $group['options'] as $value => $group_options ) : ?>
                                            <option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_attr( $group_options['label'] ); ?></option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="all-10 wcv-horizontal-gutters align-right control">
                            <a class="button bulk_edit do_variation_action"><?php esc_html_e( 'Go', 'wc-vendors' ); ?></a>
                        </div>
                    </div>


                <?php else : ?>

                    <input type="hidden" name="variation_dropdown_type" id="variation_dropdown_type" value="grouped"/>
                    <div class="wcv-cols-group wcv-horizontal-gutters">
                        <div class="all-33 small-100 wcv-variation-action-container">
                            <?php esc_attr_e( 'Create', 'wc-vendors' ); ?>
                            <select id="variable_manage_variations" class="variation_actions variation_grouped_actions">
                                <option></option>
                                <?php foreach ( $actions['options'] as $value => $options ) : ?>
                                    <option data-global="true"
                                            value="<?php echo esc_attr( $value ); ?>"><?php echo esc_attr( $options['label'] ); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php foreach ( $actions['groups'] as $group ) : ?>
                            <div class="all-33 small-100 wcv-variation-action-container">
                                <?php echo esc_html( $group['label'] ); ?>
                                <select id="<?php echo esc_attr( $group['id'] ); ?>"
                                        class="variation_actions variation_grouped_actions">
                                    <option></option>
                                    <?php foreach ( $group['options'] as $value => $group_options ) : ?>
                                        <option data-global="true"
                                                value="<?php echo esc_attr( $value ); ?>"><?php echo esc_attr( $group_options['label'] ); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="wcv-cols-group wcv-horizontal-gutters">
            <div class="all-80">
                <div class="toolbar toolbar-variations-defaults">
                    <div class="variations-defaults">
                        <?php if ( $variation_attribute_found ) : ?>
                            <div class="wcv-cols-group">
                                <div class="all-20">
                                    <strong><?php esc_html_e( 'Default form values', 'wc-vendors' ); ?>:</strong>
                                </div>
                                <div class="variation_default_values all-80">
                                    <?php

                                    $attributes         = WCV_Utils::array_sort( $attributes, 'position' );
                                    $default_attributes = maybe_unserialize( get_post_meta( $post_id, '_default_attributes', true ) );

                                    foreach ( $attributes as $attribute ) {

                                        // Only deal with attributes that are variations.
                                        if ( ! $attribute['is_variation'] ) {
                                            continue;
                                        }

                                        // Get current value for variation (if set).
                                        $variation_selected_value = isset( $default_attributes[ sanitize_title( $attribute['name'] ) ] ) ? $default_attributes[ sanitize_title( $attribute['name'] ) ] : '';

                                        // Name will be something like attribute_pa_color.
                                        echo '<select data-taxonomy="' . esc_attr( sanitize_title( $attribute['name'] ) ) . '" name="default_attribute_' . esc_attr( sanitize_title( $attribute['name'] ) ) . '" class="default_attribute ' . esc_attr( sanitize_title( $attribute['name'] ) ) . '" data-current="' . esc_attr( $variation_selected_value ) . '"><option value="">' . esc_html__( 'No default', 'wc-vendors' ) . ' ' . esc_html( wc_attribute_label( $attribute['name'] ) ) . '&hellip;</option>';

                                        // Get terms for attribute taxonomy or value if its a custom attribute.
                                        if ( $attribute['is_taxonomy'] ) {
                                            $post_terms = wp_get_post_terms( $post_id, $attribute['name'] );

                                            foreach ( $post_terms as $term ) { // phpcs:ignore
                                                echo '<option ' . selected( $variation_selected_value, $term->slug, false ) . ' value="' . esc_attr( $term->slug ) . '">' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</option>';
                                            }
                                        } else {
                                            $options = wc_get_text_attributes( $attribute['value'] );

                                            foreach ( $options as $option ) {
                                                $selected = sanitize_title( $variation_selected_value ) === $variation_selected_value ? selected( $variation_selected_value, sanitize_title( $option ), false ) : selected( $variation_selected_value, $option, false );
                                                echo '<option ' . esc_attr( $selected ) . ' value="' . esc_attr( $option ) . '">' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
                                            }
                                        }

                                        echo '</select>';
                                    }
                                    ?>
                                </div>
                                <div class="all-100">
                                    <p class="tip"><?php esc_html_e( 'These are the attributes that will be pre-selected on the frontend.', 'wc-vendors' ); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="all-20 align-right">
                <div class="variations-pagenav">
                    <span class="displaying-num"><?php printf( _n( '%s item', '%s items', $variations_count, 'wc-vendors' ), esc_attr( $variations_count ) ); // phpcs:ignore ?></span>
                    <span class="expand-close">
                        (<a href="#" class="expand_all"><?php esc_html_e( 'Expand', 'wc-vendors' ); ?></a> / <a href="#"
                                                                                                            class="close_all"><?php esc_html_e( 'Close', 'wc-vendors' ); ?></a>)
                    </span>
                </div>
            </div>
        </div>

        <div class="wcv-cols-group wcv-horizontal-gutters">
            <div class="all-100">
                <div class="wcv_variations wcv-metaboxes" data-attributes="
                <?php
                // esc_attr does not double encode - htmlspecialchars does.
                echo htmlspecialchars( wp_json_encode( $attributes ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                ?>
                " data-total="<?php echo esc_attr( $variations_count ); ?>" data-page="1" data-edited="false">
                    <?php
                    if ( ! empty( $post_id ) ) {
                        WCV_Product_Controller::load_variations( $post_id );
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="wcv-cols-group wcv-horizontal-gutters variations-toolbar">
            <div class="all-100 align-right">
                <div class="toolbar">
                    <div class="variations-pagenav">
                        <span class="displaying-num"><?php printf( _n( '%s item', '%s items', $variations_count, 'wc-vendors' ), esc_attr( $variations_count ) ); //phpcs:ignore ?></span>
                        <span class="expand-close">
                            (<a href="#" class="expand_all"><?php esc_html_e( 'Expand', 'wc-vendors' ); ?></a> / <a href="#"
                                                                                                                class="close_all"><?php esc_html_e( 'Close', 'wc-vendors' ); ?></a>)
                        </span>
                    </div>
                </div> <!-- end .toolbar -->
            </div>
        </div>
        <input type="hidden" id="wcv_parent_object" value=""/>
        <input type="hidden" id="wcv_deleted_variations" name="wcv_deleted_variations" value="" data-variations=""/>
    </div>
</div>
