<?php
$nonce = isset($_POST['apg_posts_title']) and wp_verify_nonce($_POST['apg_posts_title'], 'apg_posts_title');

if (isset($_POST['submit']) and $nonce) {
    $mta = isset($_POST['post_title_mta']) ? true : false;
    $mba = isset($_POST['post_title_mba']) ? true : false;
    $valid_title_align_value = array('left', 'center', 'right');

    if (in_array($_POST['post_title_align'], $valid_title_align_value)) {
        $align_value = sanitize_text_field($_POST['post_title_align']);
    } else {
        $align_value = 'left';
    }

    $valid_font_weight_value = array('bold', 'normal');

    if (in_array($_POST['post_title_font_weight'], $valid_font_weight_value)) {
        $font_weight_value = sanitize_text_field($_POST['post_title_font_weight']);
    } else {
        $font_weight_value = 'bold';
    }

    $post_title_data = array(
        'mt' => apg_number($_POST['post_title_mt']),
        'mta' => $mta,
        'mb' => apg_number($_POST['post_title_mb']),
        'mba' => $mba,
        'color' => sanitize_hex_color($_POST['post_title_color']),
        'align' => $align_value,
        'font_size' => apg_number($_POST['post_title_font_size']),
        'font_weight' => $font_weight_value,
    );

    $change = update_option('apg_post_title', $post_title_data);
}

if (isset($_POST['default_post_title']) and $nonce) {
    $change = delete_option('apg_post_title');
}

$title = apg_title_options();
?>

<?php if ((isset($_POST['submit']) or isset($_POST['default_post_title'])) and !$nonce): ?>
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
    <h2><?php _e('Post Title Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><?php _e('margin', 'arvand-posts'); ?></th>
                <td>
                    <label for="apg-title-mt"><?php _e('top', 'arvand-posts'); ?></label></th>
                    <input id="apg-title-mt" class="small-text" type="number" name="post_title_mt" value="<?php echo esc_attr($title['mt']); ?>" min="0"/>
                    <label for="apg-title-mb"><?php _e('bottom', 'arvand-posts'); ?></label></th>
                    <input id="apg-title-mb" class="small-text" type="number" name="post_title_mb" value="<?php echo esc_attr($title['mb']); ?>" min="0"/>
                    <p class="description"><?php _e('These margins apply if margin auto is not checked.', 'arvand-posts'); ?></p>
                </td>
            </tr>

            <tr>
                <th><?php _e('margin auto', 'arvand-posts'); ?></th>
                <td>
                    <input id="apg-title-mta" type="checkbox" name="post_title_mta" value="1" min="0"/ <?php checked($title['mta']); ?>>
                    <label for="apg-title-mta"><?php _e('top', 'arvand-posts'); ?></label></th>&nbsp;&nbsp;
                    <input id="apg-title-mba" type="checkbox" name="post_title_mba" value="1" min="0" <?php checked($title['mba']); ?>/>
                    <label for="apg-title-mba"><?php _e('bottom', 'arvand-posts'); ?></label></th>
                </td>
            </tr>

            <tr>
                <th><label for="apg-title-color"><?php _e('text color', 'arvand-posts'); ?></label></th>
                <td><input id="apg-title-color" class="ltr" type="color" name="post_title_color" value="<?php echo esc_attr($title['color']); ?>"/></td>
            </tr>

            <tr>
                <th><label><?php _e('align', 'arvand-posts'); ?></label></th>
                <td>
                    <fieldset>
                        <label>
                            <input id="apg-title-align-left" type="radio" name="post_title_align" value="<?php echo esc_attr('left'); ?>" <?php echo ($title['align'] == 'left') ? 'checked' : ''; ?>/>
                            <label for="apg-title-align-left"><?php _e('left', 'arvand-posts'); ?></label><br/>
                            <input id="apg-title-align-center" type="radio" name="post_title_align" value="<?php echo esc_attr('center'); ?>" <?php echo ($title['align'] == 'center') ? 'checked' : ''; ?>/>
                            <label for="apg-title-align-center"><?php _e('center', 'arvand-posts'); ?></label><br/>
                            <input id="apg-title-align-right" type="radio" name="post_title_align" value="<?php echo esc_attr('right'); ?>" <?php echo ($title['align'] == 'right') ? 'checked' : ''; ?>/>
                            <label for="apg-title-align-right"><?php _e('right', 'arvand-posts'); ?></label>
                        </label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th><label for="apg-title-font-size"><?php _e('font size', 'arvand-posts'); ?></label></th>
                <td><input id="apg-title-font-size" class="small-text" type="number" name="post_title_font_size" value="<?php echo esc_attr($title['font_size']); ?>" min="0"/></td>
            </tr>

            <tr>
                <th><label><?php _e('font weight', 'arvand-posts'); ?></label></th>
                <td>
                    <fieldset>
                        <label>
                            <input id="apg-title-bold" type="radio" name="post_title_font_weight" value="bold" <?php echo ($title['font_weight'] == 'bold') ? 'checked' : ''; ?>/>
                            <label for="apg-title-bold"><?php _e('bold', 'arvand-posts'); ?></label><br/>
                            <input id="apg-title-normal" type="radio" name="post_title_font_weight" value="normal" <?php echo ($title['font_weight'] == 'normal') ? 'checked' : ''; ?>/>
                            <label for="apg-title-normal"><?php _e('normal', 'arvand-posts'); ?></label>
                        </label>
                    </fieldset>
                </td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field('apg_posts_title', 'apg_posts_title'); ?>

    <p>
        <input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('save settings', 'arvand-posts'); ?>"/>
        <input class="button" type="submit" name="default_post_title" value="<?php esc_attr_e('set as default', 'arvand-posts'); ?>"/>
    </p>
</form>