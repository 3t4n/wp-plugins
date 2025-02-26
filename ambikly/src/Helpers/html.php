<?php
function ambikly_header($header_name)
{
    global $wp_version;
    if (
        version_compare($wp_version, '5.9', '>=') &&
        function_exists('wp_is_block_theme') &&
        wp_is_block_theme()
    ) {
        ?>
        <!doctype html>
        <html <?php language_attributes(); ?>>
        <head>
            <meta charset="<?php bloginfo('charset'); ?>">
            <?php wp_head(); ?>
        </head>

        <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <div class="wp-site-blocks">
        <header class="wp-block-template-part site-header">
            <?php block_header_area(); ?>
        </header>
        <?php
    } else {
        get_header($header_name);
    }
}

function ambikly_footer($footer_name)
{

    global $wp_version;
    if (
        version_compare($wp_version, '5.9', '>=') &&
        function_exists('wp_is_block_theme') &&
        wp_is_block_theme()
    ) {
        ?>

        <footer class="wp-block-template-part site-footer">
            <?php block_footer_area(); ?>
        </footer>
        </div>
        <?php ambikly_block_support_styles(); ?>
        <?php wp_footer(); ?>
        </body>
        </html>
        <?php
    } else {
        get_footer($footer_name);
    }
}

function ambikly_image($image_id, $size = 'full', $attributes = [])
{

    $attributes = wp_parse_args($attributes, [
        'class' => 'ambikly-main-image',
        'alt' => ''
    ]);

    $image = wp_get_attachment_image_src($image_id, 'full');

    if (!$image) {
        ?>
        <img src="<?php echo esc_url(AMBIKLY_ASSETS_URI . 'images/placeholder.png'); ?>"
             alt="Placeholder Image" class="<?php echo esc_attr($attributes['class']) ?>">
        <?php
    } else {
        echo wp_get_attachment_image($image_id, $size, '', $attributes);
    }
}

function ambikly_action_field($action_id)
{
    echo '<input type="hidden" name="action" value="ambikly_' . esc_attr($action_id) . '" />';
}

function ambikly_hidden_field($name, $value)
{

    echo '<input type="hidden" name="' . esc_attr($name) . '" value="' . esc_attr($value) . '">';
}

function ambikly_nonce_field($action_id)
{
    wp_nonce_field('ambikly_' . $action_id . '_nonce', 'ambikly_nonce');
}

function ambikly_submit_button()
{
    $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';
    $id = isset($_GET['id']) ? absint($_GET['id']) : 0;

    if ($id > 0 && $action == "edit") {
        $saving_text = esc_html__('Updating...', 'ambikly');
        $submit_text = esc_html__('Update Changes', 'ambikly');
    } else {

        $submit_text = esc_html__('Save Changes', 'ambikly');
        $saving_text = esc_html__('Saving...', 'ambikly');
    }
    ?>
    <p class="submit">
        <button type="submit"
                class="ambikly-save"
                data-text="<?php echo esc_attr($submit_text); ?>"
                data-saving-text="<?php echo esc_attr($saving_text) ?>"><?php echo esc_html($submit_text); ?></button>
    </p>
    <?php
}

/**
 * @param $product \Ambikly\Models\Product
 *
 * @return void
 */
function ambikly_price_html($product)
{

    $regular_price_class = 'ambikly-regular-price';

    if ($product->getDiscountedPrice()) {

        $regular_price_class .= ' strikethrough';

        echo '<span class="' . esc_attr($regular_price_class) . '">' . esc_html(ambikly_get_price($product->getRegularPrice())) . '</span>';

        echo '<span class="ambikly-discounted-price">' . esc_html(ambikly_get_price($product->getDiscountedPrice())) . '</span>';
    } else {
        echo '<span class="' . esc_attr($regular_price_class) . '">' . esc_html(ambikly_get_price($product->getRegularPrice())) . '</span>';
    }

}
