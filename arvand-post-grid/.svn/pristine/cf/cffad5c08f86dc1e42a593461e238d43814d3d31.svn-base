<?php
$nonce = isset($_POST['apg_posts_image']) and wp_verify_nonce($_POST['apg_posts_image'], 'apg_posts_image');

if (isset($_POST['submit']) and $nonce) {
    $display = isset($_POST['post_image_display']) ? true : false;
    $valid_size = array('thumbnail', 'medium', 'large');

    if (in_array($_POST['post_image_size'], $valid_size)) {
        $image_size = sanitize_text_field($_POST['post_image_size']);
    } else {
        $image_size = 'medium';
    }

    if ($_POST['post_image_height'] == 'auto') {
        $height = sanitize_text_field($_POST['post_image_height']);
    } else {
        $height = 'equal';
    }

    $post_image_data = array(
        'display' => $display,
        'size' => $image_size,
        'height' => $height,
        'equal_size' => apg_number($_POST['post_image_equal_size']),
        'br' => apg_number($_POST['post_image_border'])
    );

    $change = update_option('apg_post_image', $post_image_data);
}

if (isset($_POST['default_post_image']) and $nonce) {
    $change = delete_option('apg_post_image');
}

$image = apg_post_image_options();
?>

<?php if ((isset($_POST['submit']) or isset($_POST['default_post_image'])) and !$nonce): ?>
    <div class="notice error is-dismissible">
        <p><strong><?php _e('invalid request.', 'arvand-posts'); ?></strong></p>
    </div>
<?php endif; ?>

<?php if (isset($change) and $change): ?>
    <div class="notice updated is-dismissible">
        <p><strong><?php _e('settings saved.', 'arvand-posts'); ?></strong></p>
    </div>
<?php endif; ?>

<form action="" method="post">
    <h2><?php _e('Post Image Settings','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('image display','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-image-display" type="checkbox" name="post_image_display" value="1" <?php checked($image['display']); ?>/>
                    <label for="apg-image-display"><?php _e('display', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><?php _e('image size','arvand-posts'); ?></th>
                <td>
                    <select name="post_image_size">
                        <option value="<?php echo esc_attr('thumbnail'); ?>" <?php echo ($image['size'] == 'thumbnail') ? 'selected' : ''; ?>><?php _e('small', 'arvand-posts'); ?></option>
                        <option value="<?php echo esc_attr('medium'); ?>" <?php echo ($image['size'] == 'medium') ? 'selected' : ''; ?>><?php _e('medium', 'arvand-posts'); ?></option>
                        <option value="<?php echo esc_attr('large'); ?>" <?php echo ($image['size'] == 'large') ? 'selected' : ''; ?>><?php _e('large', 'arvand-posts'); ?></option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>

    <h2><?php _e('Post Image Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><?php _e('height', 'arvand-posts'); ?></th>
                <td>
                    <fieldset>
                        <label>
                            <input id="apg-image-equal" type="radio" name="post_image_height" value="<?php echo esc_attr('equal'); ?>" <?php echo ($image['height'] == 'equal') ? 'checked' : ''; ?>/>
                            <label for="apg-image-equal"><?php _e('equal', 'arvand-posts'); ?></label><br/>
                            <input id="apg-image-auto" type="radio" name="post_image_height" value="<?php echo esc_attr('auto'); ?>" <?php echo ($image['height'] == 'auto') ? 'checked' : ''; ?>/>
                            <label for="apg-image-auto"><?php _e('auto', 'arvand-posts'); ?></label>
                        </label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th><label for="apg-image-equal-size"><?php _e('equal image size', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-image-equal-size" class="small-text" type="number" name="post_image_equal_size" value="<?php echo esc_attr($image['equal_size']); ?>" min="0"/>
                </td>
            </tr>

            <tr>
                <th><label for="apg-image-border"><?php _e('border radius', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-image-border" class="small-text" type="number" name="post_image_border" value="<?php echo esc_attr($image['br']); ?>" min="0"/>
                </td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field('apg_posts_image', 'apg_posts_image'); ?>

    <p>
        <input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('save settings', 'arvand-posts'); ?>"/>
        <input class="button" type="submit" name="default_post_image" value="<?php esc_attr_e('set as default', 'arvand-posts'); ?>"/>
    </p>
</form>
