<?php
defined( 'ABSPATH' ) or exit;
function mbo_wp_select( $field )
{
    global $thepostid, $post;

    $thepostid = empty( $thepostid ) ? $post->ID : $thepostid;
    $field     = wp_parse_args( $field, array
    (
        'class'             => 'select short',
        'style'             => '',
        'wrapper_class'     => '',
        'value'             => get_post_meta( $thepostid, $field['id'], true ),
        'name'              => $field['id'],
        'desc_tip'          => false,
        'custom_attributes' => array(),
    ));

    $wrapper_attributes = array
    (
        'class' => $field['wrapper_class'] . " form-field {$field['id']}_field",
    );

    $label_attributes = array
    (
        'for' => $field['id'],
    );

    $field_attributes          = (array) $field['custom_attributes'];
    $field_attributes['style'] = $field['style'];
    $field_attributes['id']    = $field['id'];
    $field_attributes['name']  = $field['name'];
    $field_attributes['class'] = $field['class'];

    $tooltip     = ! empty( $field['description'] ) && false !== $field['desc_tip'] ? $field['description'] : '';
    $description = ! empty( $field['description'] ) && false === $field['desc_tip'] ? $field['description'] : '';
    ?>
    <p <?php echo wc_implode_html_attributes( $wrapper_attributes ); // WPCS: XSS ok. ?>>
        <label <?php echo wc_implode_html_attributes( $label_attributes ); // WPCS: XSS ok. ?>><?php echo wp_kses_post( $field['label'] ); ?></label>
        <?php if ( $tooltip ) : ?>
            <?php echo wc_help_tip( $tooltip ); // WPCS: XSS ok. ?>
        <?php endif; ?>
        <select <?php echo wc_implode_html_attributes( $field_attributes ); // WPCS: XSS ok. ?>>
            <?php
            foreach ( $field['options'] as $key => $value ) {
                echo '<option value="' . esc_attr( $key ) . '"' . wc_selected( $key, $field['value'] ) . disabled( $value['disabled'] ) . ( !empty( $value['desc'] ) ? ' data-option-desc="' . $value['desc'] : '' ) . '">' . esc_html( $value['label'] ) . '</option>';
            }
            ?>
        </select>
        <?php if ( $description ) : ?>
            <span class="description"><?php echo wp_kses_post( $description ); ?></span>
        <?php endif; ?>
        <span id="<?php echo $field['id']; ?>_field_description" class="description">
            <script>
                if ( typeof mbo_wp_select === 'undefined' )
                {
                    var mbo_wp_select = document.getElementById('<?php echo $field['id']; ?>');
                }
                else
                {
                    mbo_wp_select = document.getElementById('<?php echo $field['id']; ?>');
                }
                if ( typeof mbo_wp_select_desc === 'undefined' )
                {
                    var mbo_wp_select_desc = mbo_wp_select.options[mbo_wp_select.selectedIndex].getAttribute('data-option-desc');
                }
                else
                {
                    mbo_wp_select_desc = mbo_wp_select.options[mbo_wp_select.selectedIndex].getAttribute('data-option-desc');
                }
                document.getElementById('<?php echo $field['id']; ?>_field_description').innerHTML = mbo_wp_select_desc;
            </script>
        </span>
    </p>
    <?php
}
function mbo_wp_radio( $field )
{
    global $thepostid, $post;

    $thepostid              = empty( $thepostid ) ? $post->ID : $thepostid;
    $field['class']         = isset( $field['class'] ) ? $field['class'] : 'select short';
    $field['style']         = isset( $field['style'] ) ? $field['style'] : '';
    $field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
    $field['value']         = isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );
    $field['name']          = isset( $field['name'] ) ? $field['name'] : $field['id'];
    $field['desc_tip']      = isset( $field['desc_tip'] ) ? $field['desc_tip'] : false;

    echo '<fieldset class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><legend>' . wp_kses_post( $field['label'] ) . '</legend>';

    if ( !empty( $field['description'] ) && false !== $field['desc_tip'] )
    {
        echo wc_help_tip( $field['description'] );
    }

    echo '<ul class="wc-radios mbo-radios">';

    foreach ( $field['options'] as $key => $value )
    {
        echo '<li><strong><label><input
				name="' . esc_attr( $field['name'] ) . '"
				value="' . esc_attr( $key ) . '"
				type="radio"
				class="' . esc_attr( $field['class'] ) . '"
				style="' . esc_attr( $field['style'] ) . '"
				' . checked( esc_attr( $field['value'] ), esc_attr( $key ), false ) .
                ( $value['disabled'] ? 'disabled' : '' ) . '
				/> ' . esc_html( $value['label'] ) . '</label></strong>' .
            '<p>'.$value['desc'].'</p>' .
		    '</li>';
    }
    echo '</ul>';

    if ( !empty( $field['description'] ) && false === $field['desc_tip'] )
    {
        echo '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
    }

    echo '</fieldset>';
}
function mbo_get_no_options()
{
    return array
    (
        '_molongui_deal_type' => 'custom',
        '_molongui_deal_quantity' => 1,
        '_molongui_bump_autoadd'  => 0,
        '_molongui_bump_image_hover_id'       => '',
        '_molongui_bump_image_hover_url'      => '',
        '_molongui_bump_image_hover_edit_url' => '',
        '_molongui_bump_video_url'            => '',
        '_molongui_bump_page'              => 'checkout',
        '_molongui_bump_cart_position'     => '',
        '_molongui_bump_checkout_position' => 'woocommerce_review_order_before_submit',
        '_molongui_bump_minicart_position' => '',
        '_molongui_bump_display_conditions_relation' => '',
        '_molongui_deal_is_upsell'                   => 0,
        '_molongui_bump_min_order_value'             => '',
        '_molongui_bump_min_item_count'              => '',
        '_molongui_bump_show_when_products'          => '',
        '_molongui_bump_hide_when_products'          => '',
        '_molongui_bump_show_when_categories'        => '',
        '_molongui_bump_hide_when_categories'        => '',
        '_molongui_bump_start_date' => '',
        '_molongui_bump_end_date'   => '',
        '_molongui_bump_box_border_color_2'   => '',
        '_molongui_bump_box_border_color_3'   => '',
        '_molongui_bump_box_border_color_4'   => '',
        '_molongui_bump_box_border_animation' => 'none',
    );
}