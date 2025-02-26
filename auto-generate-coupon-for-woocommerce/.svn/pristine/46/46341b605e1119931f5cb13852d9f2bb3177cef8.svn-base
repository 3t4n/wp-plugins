<?php
//plugin Callback Settings
// exit if file is called directly
if (!defined('ABSPATH')) {

    exit;
}



function auto_generate_coupon_callback_discount_type($args) {

    $options = get_option('auto_generate_coupon_options', auto_generate_coupon_default_options());

    $id = isset($args['id']) ? $args['id'] : '';
    $label = isset($args['label']) ? $args['label'] : '';

    $selected_option = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

    $select_options = array(
        'fixed_cart' => esc_html__('Fixed Cart Discount','auto_generate_coupon'),
        'percent' => esc_html__('Percent Discount','auto_generate_coupon'),
    );

    echo '<select id="auto_generate_coupon_options_' .  esc_html($id) . '" name="auto_generate_coupon_options[' .  esc_html($id) . ']">';

    foreach ($select_options as $value => $option) {

        $selected = selected($selected_option === $value, true, false);

        echo '<option value="' .  esc_html($value) . '"' . esc_html($selected) . '>' . esc_html($option) . '</option>';
    }

    echo '</select> <label for="auto_generate_coupon_options_' .  esc_html($id) . '">' . esc_html__($label, 'auto_generate_coupon') . '</label>';
}

function auto_generate_coupon_callback_discount_amount($args) {


    $options = get_option('auto_generate_coupon_options', auto_generate_coupon_default_options());

    $id = isset($args['id']) ? $args['id'] : '';
    $label = isset($args['label']) ? $args['label'] : '';

    $value = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

    echo '<input id="auto_generate_coupon_options_' .  esc_html($id) . '" name="auto_generate_coupon_options[' .  esc_html($id) . ']" type="text" size="40" value="' .  esc_html($value) . '"><br />';
    echo '<label for="auto_generate_coupon_options_' .  esc_html($id) . '">' .  esc_html($label) . '</label>';
}

function auto_generate_coupon_callback_free_shipping($args) {

    $options = get_option('auto_generate_coupon_options', auto_generate_coupon_default_options());

    $id = isset($args['id']) ? $args['id'] : '';
    $label = isset($args['label']) ? $args['label'] : '';

    $checked = isset($options[$id]) ? checked($options[$id], 1, false) : '';

    echo '<input id="auto_generate_coupon_options_' .  esc_html($id) . '" name="auto_generate_coupon_options[' .  esc_html($id) . ']" type="checkbox" value="1"' . esc_html($checked) . '> ';
    echo '<label for="auto_generate_coupon_options_' .  esc_html($id) . '">' .  esc_html($label) . '</label>';
}

function auto_generate_coupon_callback_expiry_date($args) {


    $options = get_option('auto_generate_coupon_options', auto_generate_coupon_default_options());

    $id = isset($args['id']) ? $args['id'] : '';
    $label = isset($args['label']) ? $args['label'] : '';

    $value = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';
    
    echo '<label for="auto_generate_coupon_options_' .  esc_html($id) . '">' .  esc_html($label) . '</label>';
    
  echo '  <br>  
    <form id="" name="" action="'.esc_url(get_permalink()).'" method="post">
        <input type="text" id="auto_generate_coupon_options_expiry_date" name="auto_generate_coupon_options[' .  esc_html($id) . ']" value="'.$value.'"/>
    </form>';?>

    <script type="text/javascript">
        jQuery(document).ready(function () {
                    jQuery('#auto_generate_coupon_options_expiry_date').datepicker({
                dateFormat: 'dd-mm-yy'
            });
        });
    </script> 
        
        <?php
    ;
}

function auto_generate_coupon_callback_individual_use($args) {
    $options = get_option('auto_generate_coupon_options', auto_generate_coupon_default_options());

    $id = isset($args['id']) ? $args['id'] : '';
    $label = isset($args['label']) ? $args['label'] : '';

    $checked = isset($options[$id]) ? checked($options[$id], 1, false) : '';

    echo '<input id="auto_generate_coupon_options_' .  esc_html($id) . '" name="auto_generate_coupon_options[' .  esc_html($id) . ']" type="checkbox" value="1"' . esc_html($checked) . '> ';
    echo '<label for="auto_generate_coupon_options_' .  esc_html($id) . '">' .  esc_html($label) . '</label>';
}

function auto_generate_coupon_callback_active_campaign($args) {
    $options = get_option('auto_generate_coupon_options', auto_generate_coupon_default_options());

    $id = isset($args['id']) ? $args['id'] : '';
    $label = isset($args['label']) ? $args['label'] : '';

    $checked = isset($options[$id]) ? checked($options[$id], 1, false) : '';

    echo '<input id="auto_generate_coupon_options_' .  esc_html($id) . '" name="auto_generate_coupon_options[' .  esc_html($id) . ']" type="checkbox" value="1"' . esc_html($checked) . '> ';
    echo '<label for="auto_generate_coupon_options_' .  esc_html($id) . '">' . esc_html_e('Activeate campaign', 'auto_generate_coupon') . '</label>';
}

function auto_generate_coupon_callback_message_for_new_coupon($args) {

    $options = get_option('auto_generate_coupon_options', auto_generate_coupon_default_options());
    $id = isset($args['id']) ? $args['id'] : '';
    $label = isset($args['label']) ? $args['label'] : '';

    $allowed_tags = wp_kses_allowed_html('post');

    $value = isset($options[$id]) ? wp_kses(stripslashes_deep($options[$id]), $allowed_tags) : '';

    echo '<textarea id="auto_generate_coupon_options_' .  esc_html($id) . '" name="auto_generate_coupon_options[' .  esc_html($id) . ']"' .
    ' cols="50" rows="4">' .  esc_html($value) . '</textarea><br>';
    echo '<label for="auto_generate_coupon_options_' .  esc_html($id) . '">' .  esc_html($label) . '</label>';
}

function auto_generate_coupon_callback_coupon_settings() {
    echo '<p>'.esc_html__(' These settings is enable you to seut up coupon roles','auto_generate_coupon'). '</p>';
}

function auto_generate_coupon_callback_custom_message() {
    echo '<p>'.esc_html__('These settings is enable you to customize coupon message','auto_generate_coupon').'</p>';
}
