<?php

/**
 * Variation default attributes loaded via ajax
 *
 * This file is used to load the product variations
 *
 * @link       http://www.wcvendors.com
 * @since      2.5.2
 */
?>

<div class="variations-defaults">
    <div class="wcv-cols-group">
        <div class="all-20">
            <strong><?php esc_html_e( 'Default Form Values', 'wc-vendors' ); ?>
                : <?php __( 'These are the attributes that will be pre-selected on the frontend.', 'wc-vendors' ); ?></strong>
        </div>
        <div class="variation_default_values all-80">
            <?php

            $attributes = WCV_Utils::array_sort( $attributes, 'position' );

            foreach ( $attributes as $attribute ) {

                echo '<select data-taxonomy="' . esc_attr( sanitize_title( $attribute['name'] ) ) . '" name="default_attribute_' . esc_attr( sanitize_title( $attribute['name'] ) ) . '" data-current="" class="default_attribute ' . esc_attr( sanitize_title( $attribute['name'] ) ) . '"><option value="">' . esc_html__( 'No default', 'wc-vendors' ) . ' ' . esc_html( wc_attribute_label( $attribute['name'] ) ) . '&hellip;</option>';

                foreach ( $attribute['values'] as $key => $value ) {
                    echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';

                }

                echo '</select>';
            }
            ?>
        </div>
        <div class="all-100">
            <p class="tip"
                style="float: left"><?php esc_html_e( 'These are the attributes that will be pre-selected on the frontend.', 'wc-vendors' ); ?></p>
        </div>
    </div>
</div>
