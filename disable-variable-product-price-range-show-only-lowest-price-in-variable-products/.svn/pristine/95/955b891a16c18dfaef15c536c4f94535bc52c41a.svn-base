<?php 
/**
* Settings for API.
*/
if ( class_exists( 'Woo_Variation_Price_Display_Settings' ) ) {
	return new Woo_Variation_Price_Display_Settings();
}

class Woo_Variation_Price_Display_Settings extends WC_Settings_Page {
	public function __construct() {
		$this->id    = 'woo-variation-price-display';
		$this->label = esc_html__( 'Variation Price Display', 'woo-variation-price-display' );

		parent::__construct();
	}

    /**
	 * Get own sections.
	 *
	 * @return array
	 */
	protected function get_own_sections() {
		return array(
			''       => __( 'General', 'woo-variation-price-display' )
		);
	}

	public function output() {
		global $current_section, $hide_save_button;
		
        $settings = $this->get_settings( $current_section );
        $this->output_fields( $settings );
	}

    public function get_settings_for_default_section() {
        $settings = array(
            array(
                'type' => 'title',
                'id'   => 'woo-variable-lowest-price',
                'title' => __( 'Variation Price Display Settings', 'woo-variation-price-display' ),
                'desc'  => '<p>' . __( 'The following options control the Variation Price Display for WooCommerce extension.', 'woo-variation-price-display' ) . '<p>' 
                . '<p>'
                . sprintf('<a href="%1$s" target="_blank">%2$s</a>', esc_url('https://wpxpress.net/docs/woocommerce-variation-price-display/'), __( 'Documentation', 'woo-variation-price-display' ) ) . ' | '
                . sprintf('<a href="%1$s" target="_blank">%2$s</a>', esc_url('https://wpxpress.net/submit-ticket/'), __( 'Get Help &amp; Support', 'woo-variation-price-display' ) )
                . $this->get_pro_link_html() . ' | ' 
                .sprintf('<a href="%1$s" target="_blank" style="text-decoration: none; font-weight:bold;">%2$s</a>', esc_url( 'https://wordpress.org/support/plugin/disable-variable-product-price-range-show-only-lowest-price-in-variable-products/reviews/#new-post' ), esc_html__( 'Leave a review here ⭐️⭐️⭐️⭐️⭐️', 'woo-variation-price-display' ) ).'</p>',
            ),

            array(
                'id'      => 'wclp_enable_shop_page',
                'type'    => 'checkbox',
                'title'   => __( 'Enable Features on', 'woo-variation-price-display' ),
                'desc'    => __( 'Shop/Archive page.', 'woo-variation-price-display' ),
                'default' => 'yes',
                'checkboxgroup' => 'start',
            ),

            array(
                'id'      => 'wclp_enable_product_page',
                'type'    => 'checkbox',
                'desc'    => __( 'Single product page.', 'woo-variation-price-display' ),
                'default' => 'yes',
                'checkboxgroup' => 'end',
            ),

            array(
                'id'    => 'wclp_price_types',
                'type'  => 'radio',
                'title' => __( 'Price Types', 'woo-variation-price-display' ),
                'required'  => true,
                'options'   => array(
                    'min'   => __( 'Show Only Minimum (Lowest) Price.', 'woo-variation-price-display' ),
                    'max'   => __( 'Show Only Maximum (Highest) Price.', 'woo-variation-price-display' ),
                    'min-to-max'   => __( 'Minimum to Maximum Price.', 'woo-variation-price-display' ),
                    'max-to-min'   => __( 'Maximum to Minimum Price.', 'woo-variation-price-display' ),
                    'list'   => __( 'List All Variation Prices.', 'woo-variation-price-display' ),
                ),
                'default'   => 'min',
            ),

//            array(
//                'id'      => 'wclp_enable_price_text_on',
//                'type'    => 'multiselect',
//                'title'   => esc_html__( 'Enable Text Before After Price', 'woo-variation-price-display' ),
//                'desc' => esc_html__( 'Show custom text before and after price on specific product types.', 'woo-variation-price-display' ),
//                'class'   => ( ! woo_variation_price_display()->is_pro() ) ? 'wc-enhanced-select is_pro' : 'wc-enhanced-select',
//                'default' => array('variable'),
//                'options' => wc_get_product_types(),
//                'custom_attributes' => array(
//                    'data-placeholder' => esc_html__( 'Choose specific product type(s).', 'woo-variation-price-display' ),
//                )
//            ),

            array(
                'id'      => 'wclp_title_before',
                'type'    => 'text',
                'title'   => __( 'Text Before Price', 'woo-variation-price-display' ),
                'default' => 'From:',
            ),

            array(
                'id'      => 'wclp_title_after',
                'type'    => 'text',
                'title'   => __( 'Text After Price', 'woo-variation-price-display' ),
                'default' => '',
            ),

            array(
               'id'      => 'wclp_selected_price',
               'type'    => 'checkbox',
               'title'   => __( 'Show Selected Variation Price', 'woo-variation-price-display' ),
               'desc'    => __( '<strong>Instant update the main price when a variation is selected.</strong>', 'woo-variation-price-display' ),
               'default' => ( ! woo_variation_price_display()->is_pro() ) ? 'no' : 'yes',
               'is_pro'  => true,
            ),

            array(
				'id'      => 'wclp_discount_badge',
				'type'    => 'checkbox',
				'title'   => __( 'Show Discount Percentage Badge', 'woo-variation-price-display' ),
				'desc'    => __( 'Display the discount percentage <code>-50%</code> as a badge on sale price.', 'woo-variation-price-display' ),
				'default' => 'no',
				'is_pro'  => true,
			),

            array(
                'id'      => 'wclp_crossed_price',
                'type'    => 'checkbox',
                'title'   => __( 'Hide Crossed Out Price', 'woo-variation-price-display' ),
                'desc'    => __( 'Hide the crossed out regular price <code><del>$100</del> $50</code> of the variable sale product.', 'woo-variation-price-display' ),
                'default' => 'yes',
            ),

            array(
                'id'      => 'wclp_hide_reset',
                'type'    => 'checkbox',
                'title'   => __( 'Hide Reset Link', 'woo-variation-price-display' ),
                'desc'    => __( 'Hide the "Clear" link that appears when select a variation.', 'woo-variation-price-display' ),
                'default' => 'no',
            ),

			// array(
			//    'id'      => 'wclp_hide_default_price',
			//    'type'    => 'checkbox',
			//    'title'   => __( 'Hide Default Variation Price', 'woo-variation-price-display' ),
			//    'desc'    => __( 'Hide the main price on the single product until a variation is selected.', 'woo-variation-price-display' ),
			//    'default' => 'no',
			// ),

            // Section End
            array(
                'type' => 'sectionend',
                'id'   => 'woo_variation_price_display_default_options'
            ),
        );

        $settings = apply_filters( 'woo_variation_price_display_default_settings_fields', $settings );
        return apply_filters( 'woo_variation_price_display_default_settings', $settings );
    }
		
    public function output_fields( $options ) {
        foreach ( $options as $value ) {
            if ( ! isset( $value['type'] ) ) {
                continue;
            }
            if ( ! isset( $value['id'] ) ) {
                $value['id'] = '';
            }
            if ( ! isset( $value['title'] ) ) {
                $value['title'] = isset( $value['name'] ) ? $value['name'] : '';
            }
            if ( ! isset( $value['class'] ) ) {
                $value['class'] = '';
            }
            if ( ! isset( $value['css'] ) ) {
                $value['css'] = '';
            }
            if ( ! isset( $value['default'] ) ) {
                $value['default'] = '';
            }
            if ( ! isset( $value['desc'] ) ) {
                $value['desc'] = '';
            }
            if ( ! isset( $value['desc_tip'] ) ) {
                $value['desc_tip'] = false;
            }
            if ( ! isset( $value['placeholder'] ) ) {
                $value['placeholder'] = '';
            }
            if ( ! isset( $value['suffix'] ) ) {
                $value['suffix'] = '';
            }
            if ( ! isset( $value['is_pro'] ) ) {
                $value['is_pro'] = false;
            }

            if ( ! isset( $value['value'] ) ) {
                $value['value'] = WC_Admin_Settings::get_option( $value['id'], $value['default'] );
            }

            $classes = array();

            if ( ! function_exists( 'woo_variation_price_display_pro' ) ) {
                if( $value['is_pro'] ){
                    $classes[] = 'is-pro';
                }
            }

            $class =  implode( ' ', array_values( array_unique( $classes ) ) );

            // Custom attribute handling.
            $custom_attributes = array();

            if ( ! empty( $value['custom_attributes'] ) && is_array( $value['custom_attributes'] ) ) {
                foreach ( $value['custom_attributes'] as $attribute => $attribute_value ) {
                    $custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
                }
            }

            $custom_attributes = implode( ' ', $custom_attributes );

            // Description handling.
            $field_description = WC_Admin_Settings::get_field_description( $value );
            $description       = $field_description['description'];
            $tooltip_html      = $field_description['tooltip_html'];

            // Switch based on type.
            switch ( $value['type'] ) {

                // Section Titles.
                case 'title':
                    if ( ! empty( $value['title'] ) ) {
                        echo '<h2>' . esc_html( $value['title'] ) . '</h2>';
                    }
                    if ( ! empty( $value['desc'] ) ) {
                        echo '<div id="' . esc_attr( sanitize_title( $value['id'] ) ) . '-description">';
                        echo wp_kses_post( wpautop( wptexturize( $value['desc'] ) ) );
                        echo '</div>';
                    }
                    echo '<table class="form-table woo-variation-price-display-form-table">' . "\n\n";
                    if ( ! empty( $value['id'] ) ) {
                        do_action( 'woocommerce_settings_' . sanitize_title( $value['id'] ) );
                    }
                    break;

                // Section Ends.
                case 'sectionend':
                    if ( ! empty( $value['id'] ) ) {
                        do_action( 'woocommerce_settings_' . sanitize_title( $value['id'] ) . '_end' );
                    }
                    echo '</table>';
                    if ( ! empty( $value['id'] ) ) {
                        do_action( 'woocommerce_settings_' . sanitize_title( $value['id'] ) . '_after' );
                    }
                    break;

                // Standard text inputs and subtypes like 'number'.
                case 'text':
                case 'password':
                case 'datetime':
                case 'datetime-local':
                case 'date':
                case 'month':
                case 'time':
                case 'week':
                case 'number':
                case 'email':
                case 'url':
                case 'tel':
                    $option_value = $value['value'];

                    ?><tr class="<?php echo esc_attr( $class ) ?>" valign="top">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?> <?php echo wp_kses_post( $tooltip_html ); ?></label>
                        </th>
                        <td class="forminp forminp-<?php echo esc_attr( sanitize_title( $value['type'] ) ); ?>">
                            <input
                                name="<?php echo esc_attr( $value['id'] ); ?>"
                                id="<?php echo esc_attr( $value['id'] ); ?>"
                                type="<?php echo esc_attr( $value['type'] ); ?>"
                                style="<?php echo esc_attr( $value['css'] ); ?>"
                                value="<?php echo esc_attr( $option_value ); ?>"
                                class="<?php echo esc_attr( $value['class'] ); ?>"
                                placeholder="<?php echo esc_attr( $value['placeholder'] ); ?>"
                                <?php printf( $custom_attributes ); ?>
                                /><span class="suffix"><?php echo esc_html( $value['suffix'] ); ?></span> <?php echo wp_kses_post( $description ); ?>
                        </td>
                    </tr>
                    <?php
                    break;

                // Color picker.
                case 'color':
                    $option_value = $value['value'];

                    ?>
                    <tr class="<?php echo esc_attr( $class ) ?>" valign="top">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?> <?php echo wp_kses_post( $tooltip_html ); ?></label>
                        </th>
                        <td class="forminp forminp-<?php echo esc_attr( sanitize_title( $value['type'] ) ); ?>">&lrm;
                            <span class="colorpickpreview" style="background: <?php echo esc_attr( $option_value ); ?>">&nbsp;</span>
                            <input
                                name="<?php echo esc_attr( $value['id'] ); ?>"
                                id="<?php echo esc_attr( $value['id'] ); ?>"
                                type="text"
                                dir="ltr"
                                style="<?php echo esc_attr( $value['css'] ); ?> width: 80px;"
                                value="<?php echo esc_attr( $option_value ); ?>"
                                class="<?php echo esc_attr( $value['class'] ); ?>colorpick"
                                placeholder="<?php echo esc_attr( $value['placeholder'] ); ?>"
                                <?php printf( $custom_attributes ); ?>
                                />&lrm; <?php echo wp_kses_post( $description ); ?>
                                <div id="colorPickerDiv_<?php echo esc_attr( $value['id'] ); ?>" class="colorpickdiv" style="z-index: 100;background:#eee;border:1px solid #ccc;position:absolute;display:none;"></div>
                        </td>
                    </tr>
                    <?php
                    break;

                // Textarea.
                case 'textarea':
                    $option_value = $value['value'];

                    ?>
                    <tr class="<?php echo esc_attr( $class ) ?>" valign="top">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?> <?php echo wp_kses_post( $tooltip_html ); ?></label>
                        </th>
                        <td class="forminp forminp-<?php echo esc_attr( sanitize_title( $value['type'] ) ); ?>">
                            <?php echo wp_kses_post( $description ); ?>

                            <textarea
                                name="<?php echo esc_attr( $value['id'] ); ?>"
                                id="<?php echo esc_attr( $value['id'] ); ?>"
                                style="<?php echo esc_attr( $value['css'] ); ?>"
                                class="<?php echo esc_attr( $value['class'] ); ?>"
                                placeholder="<?php echo esc_attr( $value['placeholder'] ); ?>"
                                <?php printf( $custom_attributes ); ?>
                                ><?php echo esc_textarea( $option_value ); // WPCS: XSS ok. ?></textarea>
                        </td>
                    </tr>
                    <?php
                    break;

                // Select boxes.
                case 'select':
                case 'multiselect':
                    $option_value = $value['value'];

                    ?>
                    <tr class="<?php echo esc_attr( $class ) ?>" valign="top">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?> <?php echo wp_kses_post( $tooltip_html ); ?></label>
                        </th>
                        <td class="forminp forminp-<?php echo esc_attr( sanitize_title( $value['type'] ) ); ?>">
                            <select
                                name="<?php echo esc_attr( $value['id'] ); ?><?php echo ( 'multiselect' === $value['type'] ) ? '[]' : ''; ?>"
                                id="<?php echo esc_attr( $value['id'] ); ?>"
                                style="<?php echo esc_attr( $value['css'] ); ?>"
                                class="<?php echo esc_attr( $value['class'] ); ?>"
                                <?php printf( $custom_attributes ); ?>
                                <?php echo 'multiselect' === $value['type'] ? 'multiple="multiple"' : ''; ?>
                                >
                                <?php
                                foreach ( $value['options'] as $key => $val ) {
                                    ?>
                                    <option value="<?php echo esc_attr( $key ); ?>"
                                        <?php

                                        if ( is_array( $option_value ) ) {
                                            selected( in_array( (string) $key, $option_value, true ), true );
                                        } else {
                                            selected( $option_value, (string) $key );
                                        }

                                        ?>
                                    ><?php echo esc_html( $val ); ?></option>
                                    <?php
                                }
                                ?>
                            </select><span class="suffix"><?php echo esc_html( $value['suffix'] ); ?></span> <?php echo wp_kses_post( $description ); ?>
                        </td>
                    </tr>
                    <?php
                    break;

                // Radio inputs.
                case 'radio':
                    $option_value = $value['value'];

                    ?>
                    <tr class="<?php echo esc_attr( $class ) ?>" valign="top">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?> <?php echo wp_kses_post( $tooltip_html ); ?></label>
                        </th>
                        <td class="forminp forminp-<?php echo esc_attr( sanitize_title( $value['type'] ) ); ?>">
                            <fieldset>
                                <?php echo wp_kses_post( $description ); ?>
                                <ul>
                                <?php
                                foreach ( $value['options'] as $key => $val ) {
                                    ?>
                                    <li>
                                        <label><input
                                            name="<?php echo esc_attr( $value['id'] ); ?>"
                                            value="<?php echo esc_attr( $key ); ?>"
                                            type="radio"
                                            style="<?php echo esc_attr( $value['css'] ); ?>"
                                            class="<?php echo esc_attr( $value['class'] ); ?>"
                                            <?php printf( $custom_attributes ); ?>
                                            <?php checked( $key, $option_value ); ?>
                                            /> <?php echo esc_html( $val ); ?></label>
                                    </li>
                                    <?php
                                }
                                ?>
                                </ul>
                            </fieldset>
                        </td>
                    </tr>
                    <?php
                    break;

                // Checkbox input.
                case 'checkbox':
                    $option_value     = $value['value'];
                    $visibility_class = array();

                    if ( ! isset( $value['hide_if_checked'] ) ) {
                        $value['hide_if_checked'] = false;
                    }
                    if ( ! isset( $value['show_if_checked'] ) ) {
                        $value['show_if_checked'] = false;
                    }
                    if ( 'yes' === $value['hide_if_checked'] || 'yes' === $value['show_if_checked'] ) {
                        $visibility_class[] = 'hidden_option';
                    }
                    if ( 'option' === $value['hide_if_checked'] ) {
                        $visibility_class[] = 'hide_options_if_checked';
                    }
                    if ( 'option' === $value['show_if_checked'] ) {
                        $visibility_class[] = 'show_options_if_checked';
                    }

                    if ( ! isset( $value['checkboxgroup'] ) || 'start' === $value['checkboxgroup'] ) {
                        ?>
                            <tr valign="top" class="<?php echo esc_attr( implode( ' ', $visibility_class ) ); ?> <?php echo esc_attr( $class ) ?>">
                                <th scope="row" class="titledesc"><?php echo esc_html( $value['title'] ); ?></th>
                                <td class="forminp forminp-checkbox">
                                    <fieldset>
                        <?php
                    } else {
                        ?>
                            <fieldset class="<?php echo esc_attr( implode( ' ', $visibility_class ) ); ?>">
                        <?php
                    }

                    if ( ! empty( $value['title'] ) ) {
                        ?>
                            <legend class="screen-reader-text"><span><?php echo esc_html( $value['title'] ); ?></span></legend>
                        <?php
                    }

                    ?>
                        <label for="<?php echo esc_attr( $value['id'] ); ?>">
                            <input
                                name="<?php echo esc_attr( $value['id'] ); ?>"
                                id="<?php echo esc_attr( $value['id'] ); ?>"
                                type="checkbox"
                                class="<?php echo esc_attr( isset( $value['class'] ) ? $value['class'] : '' ); ?>"
                                value="1"
                                <?php checked( $option_value, 'yes' ); ?>
                                <?php printf( $custom_attributes ); ?>
                            /> <?php echo wp_kses_post( $description ); ?>
                        </label> <?php echo wp_kses_post( $tooltip_html ); ?>
                    <?php

                    if ( ! isset( $value['checkboxgroup'] ) || 'end' === $value['checkboxgroup'] ) {
                        ?>
                                    </fieldset>
                                </td>
                            </tr>
                        <?php
                    } else {
                        ?>
                            </fieldset>
                        <?php
                    }
                    break;

                case 'dimensions':
                    $option_value = $value['value'];
                    ?>

                    <tr class="<?php echo esc_attr( $class ) ?>" valign="top">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?> <?php echo wp_kses_post( $tooltip_html ); ?></label>
                        </th>

                        <td class="forminp forminp-<?php echo esc_attr( sanitize_title( $value['type'] ) ); ?>">
                            <label for="<?php echo esc_attr( $value['id'] ); ?>_top" style="display: inline-block">Top
                                <input
                                    name="<?php echo esc_attr( $value['id'] ); ?>[top]"
                                    id="<?php echo esc_attr( $value['id'] ); ?>_top"
                                    type="number"
                                    style="width: 60px; display: block"
                                    value="<?php echo esc_attr( $option_value['top'] ); ?>"
                                    class="<?php echo esc_attr( $value['class'] ); ?>"
                                    placeholder="<?php echo esc_attr( $value['placeholder'] ); ?>"
                                    step="1"
                                    min="0"
                                />
                            </label>

                            <label for="<?php echo esc_attr( $value['id'] ); ?>_right" style="display: inline-block">Right
                                <input
                                    name="<?php echo esc_attr( $value['id'] ); ?>[right]"
                                    id="<?php echo esc_attr( $value['id'] ); ?>_right"
                                    type="number"
                                    style="width: 60px; display: block"
                                    value="<?php echo esc_attr( $option_value['right'] ); ?>"
                                    class="<?php echo esc_attr( $value['class'] ); ?>"
                                    placeholder="<?php echo esc_attr( $value['placeholder'] ); ?>"
                                    step="1"
                                    min="0"
                                />
                            </label>

                            <label for="<?php echo esc_attr( $value['id'] ); ?>_bottom" style="display: inline-block">Bottom
                                <input
                                    name="<?php echo esc_attr( $value['id'] ); ?>[bottom]"
                                    id="<?php echo esc_attr( $value['id'] ); ?>_bottom"
                                    type="number"
                                    style="width: 60px; display: block"
                                    value="<?php echo esc_attr( $option_value['bottom'] ); ?>"
                                    class="<?php echo esc_attr( $value['class'] ); ?>"
                                    placeholder="<?php echo esc_attr( $value['placeholder'] ); ?>"
                                    step="1"
                                    min="0"
                                />
                            </label>

                            <label for="<?php echo esc_attr( $value['id'] ); ?>_left" style="display: inline-block">Left
                                <input
                                    name="<?php echo esc_attr( $value['id'] ); ?>[left]"
                                    id="<?php echo esc_attr( $value['id'] ); ?>_left"
                                    type="number"
                                    style="width: 60px; display: block"
                                    value="<?php echo esc_attr( $option_value['left'] ); ?>"
                                    class="<?php echo esc_attr( $value['class'] ); ?>"
                                    placeholder="<?php echo esc_attr( $value['placeholder'] ); ?>"
                                    step="1"
                                    min="0"
                                />
                            </label>

                            <?php echo wp_kses_post( $description ); ?>
                        </td>
                    </tr>

                    <?php
                    break;

                // Default: run an action.
                default:
                    do_action( 'woocommerce_admin_field_' . $value['type'], $value );
                    do_action( 'woo-variation-price-display_admin_field', $value );
                    break;
            }
        }
    }

    public function save() {
        global $current_section;

        $settings = $this->get_settings( $current_section );
        WC_Admin_Settings::save_fields( $settings );

        if ( $current_section ) {
            do_action( 'woocommerce_update_options_' . $this->id . '_' . $current_section );
            do_action( 'woocommerce_update_options_woo-variation-price-display', $current_section );
        }
    }

    public function get_product_category_id_name_array() {
        $lists = array();
        $categories = get_categories( array( 'taxonomy' => 'product_cat' ) );

        foreach ( $categories as $category ) {
            $lists[ $category->term_id ] = $category->name;
        }

        return $lists;
    }

    public function get_product_id_name_array() {
        $lists = array();

        $posts = get_posts(
            array(
                'post_type'      => 'product',
                'posts_per_page' => -1,
                'order'          => 'ASC',
                'orderby'        => 'title'
            )
        );

        foreach ( $posts as $post ) {
            $lists[ $post->ID ] = $post->post_title;
        }

        return $lists;
    }

    public function get_pro_link_html() {
        if ( ! function_exists( 'woo_variation_price_display_pro' ) ) {
            $html = ' | ' . sprintf('<a href="%1$s" target="_blank" style="color:#d63638"><b>%2$s</b></a>', esc_url('https://wpxpress.net/products/woocommerce-variation-price-display/'), __( 'Get Pro Features', 'woo-variation-price-display' ) );

            return $html;
        }

        return '';
    }
}

return new Woo_Variation_Price_Display_Settings();