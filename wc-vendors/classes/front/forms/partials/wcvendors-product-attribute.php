<?php

/**
 * Product Attribute
 *
 * This file is used to load the product attribute
 *
 * @link       http://www.wcvendors.com
 * @since      2.5.2
 * @version    2.5.2
 */
?>

<div data-index_value="<?php echo esc_attr( $i ); ?>" data-label="<?php echo esc_html( $attribute_label ); ?>"
    data-taxonomy="<?php echo esc_attr( $taxo ); ?>"
    class="woocommerce_attribute wcv-metabox closed <?php echo esc_attr( implode( ' ', $metabox_class ) ); ?>"
    rel="<?php echo esc_attr( $position ); ?>">
    <h5>
        <strong class="attribute_name"><?php echo esc_html( $attribute_label ); ?></strong>
        <a href="#" class="remove_row delete" style="float:right;"><?php esc_html_e( 'Remove', 'wc-vendors' ); ?></a>
        <i class='wcv-icon wcv-icon-angle-down'></i>
    </h5>

    <div class="wcv_attribute_data wcv-metabox-content">

        <div class="wcv-column-group wcv-horizontal-gutters" style="border-bottom: 1px solid #ccc; margin-bottom: 5px;">
            <div class="all-30">
                <div class="control-group" data-index_value="<?php echo esc_attr( $i ); ?>">
                    <?php if ( $attribute['is_taxonomy'] ) : ?>
                        <input type="hidden" name="attribute_names[<?php echo esc_attr( $i ); ?>]"
                                value="<?php echo esc_attr( $taxo ); ?>"/>
                    <?php else : ?>
                        <input type="text" class="attribute_name" name="attribute_names[<?php echo esc_attr( $i ); ?>]"
                                value="<?php echo esc_attr( $attribute['name'] ); ?>"/>
                    <?php endif; ?>

                    <input type="hidden" name="attribute_position[<?php echo esc_attr( $i ); ?>]" class="attribute_position"
                            value="<?php echo esc_attr( $position ); ?>" id="attribute_position_<?php echo esc_attr( $i ); ?>"/>
                    <input type="hidden" name="attribute_is_taxonomy[<?php echo esc_attr( $i ); ?>]"
                            value="<?php echo $attribute['is_taxonomy'] ? 1 : 0; ?>"/>

                    <ul class="control unstyled inline">
                        <li>
                            <input type="checkbox" class="checkbox" <?php checked( $attribute['is_visible'], 1 ); ?>
                                    name="attribute_visibility[<?php echo esc_attr( $i ); ?>]" value="1"/>
                            <label><?php esc_html_e( 'Visible on the product page', 'wc-vendors' ); ?></label>
                        </li>
                        <li class="enable_variation show_if_variable">
                            <input type="checkbox"
                                    class="checkbox wcv_variation_checkbox" <?php checked( $attribute['is_variation'], 1 ); ?>
                                    id="attribute_variation_<?php echo esc_attr( $i ); ?>"
                                    name="attribute_variation[<?php echo esc_attr( $i ); ?>]" value="1"/>
                            <label><?php esc_html_e( 'Used for variations', 'wc-vendors' ); ?></label>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="all-70">
                <div class="control-group">
                    <label><?php esc_html_e( 'Value(s)', 'wc-vendors' ); ?>:</label>
                    <div class="control" data-index_value="<?php echo esc_attr( $i ); ?>" data-taxonomy="<?php echo esc_attr( $taxo ); ?>"
                        data-label="<?php echo esc_html( $attribute_label ); ?>">
                        <?php if ( $attribute['is_taxonomy'] ) : ?>
                            <?php if ( 'select' === $attribute_taxonomy->attribute_type ) : ?>

                                <select multiple="multiple" id="attribute_values_<?php echo esc_attr( $i ); ?>"
                                        data-placeholder="<?php esc_attr_e( 'Select terms', 'wc-vendors' ); ?>"
                                        class="attribute_values select2" name="attribute_values[<?php echo esc_attr( $i ); ?>][]"
                                        style="width: 100%">
                                    <?php
                                    $args      = array(
                                        'orderby'    => ! empty( $attribute_taxonomy->attribute_orderby ) ? $attribute_taxonomy->attribute_orderby : 'name',
                                        'hide_empty' => 0,
                                        'taxonomy'   => $taxo,
                                    );
                                    $all_terms = get_terms( apply_filters( 'wcv_product_attribute_terms', $args ) );
                                    if ( $all_terms ) {
                                        foreach ( $all_terms as $t ) {
                                            echo '<option value="' . esc_attr( $t->slug ) . '" ' . selected( has_term( absint( $t->term_id ), $taxo, $post_id ), true, false ) . '>' . esc_html( $t->name ) . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <button class="button select_all_attributes"><?php esc_html_e( 'Select all', 'wc-vendors' ); ?></button>
                                <button class="button select_no_attributes"><?php esc_html_e( 'Select none', 'wc-vendors' ); ?></button>

                                <?php if ( $attribute_terms_allowed ) : ?>

                                    <button class="button add_new_attribute"
                                            data-selectid="attribute_values_<?php echo esc_attr( $i ); ?>"
                                            style="float:right;"><?php esc_html_e( 'Add new', 'wc-vendors' ); ?></button>

                                <?php endif; ?>

                                <?php do_action( 'wcv_product_option_terms', $attribute_taxonomy, $i, $attribute ); ?>

                            <?php elseif ( 'text' === $attribute_taxonomy->attribute_type ) : ?>

                                <input type="text" id="attribute_values_<?php echo esc_attr( $i ); ?>"
                                        name="attribute_values[<?php echo esc_attr( $i ); ?>]"
                                        value="<?php echo esc_attr( implode( ' ' . WC_DELIMITER . ' ', wp_get_post_terms( $post_id, $taxo, array( 'fields' => 'names' ) ) ) ); ?>"
                                        placeholder="<?php echo esc_attr( sprintf( /* translators: %s: delimiter */ __( '"%s" separate terms', 'wc-vendors' ), WC_DELIMITER ) ); ?>"
                                        class="attribute_values"/>

                            <?php endif; ?>

                        <?php else : ?>
                            <input type="text" id="attribute_values_<?php echo esc_attr( $i ); ?>"
                                    name="attribute_values[<?php echo esc_attr( $i ); ?>]"
                                    value="<?php echo esc_attr( $attribute['value'] ); ?>"
                                    placeholder="<?php echo esc_attr( sprintf( /* translators: %s: delimiter */ __( '"%s" separate terms', 'wc-vendors' ), WC_DELIMITER ) ); ?>"
                                    class="attribute_values"/>
                        <?php endif; ?>
                    </div>
                </div> <!-- end control group -->
            </div>


        </div>

    </div>
    <hr style="clear: both;"/>
</div>
