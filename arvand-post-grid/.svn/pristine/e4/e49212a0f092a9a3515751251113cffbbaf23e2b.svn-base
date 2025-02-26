<?php
$nonce = isset($_POST['apg_posts_excerpt']) and wp_verify_nonce($_POST['apg_posts_excerpt'], 'excerpt');

if (isset($_POST['submit']) and $nonce) {
    $display = isset($_POST['post_excerpt_display']) ? true : false;
    $mta = isset($_POST['post_excerpt_mta']) ? true : false;
    $mba = isset($_POST['post_excerpt_mba']) ? true : false;
    $valid_excerpt_align_value = array('left', 'center', 'right');

    if (in_array($_POST['post_excerpt_align'], $valid_excerpt_align_value)) {
        $align_value = sanitize_text_field($_POST['post_excerpt_align']);
    } else {
        $align_value = 'left';
    }

    $post_excerpt_data = array(
        'display' => $display,
        'words_limit' => apg_number($_POST['post_excerpt_wl']),
        'mt' => apg_number($_POST['post_excerpt_mt']),
        'mta' => $mta,
        'mb' => apg_number($_POST['post_excerpt_mb']),
        'mba' => $mba,
        'color' => sanitize_hex_color($_POST['post_excerpt_color']),
        'align' => $align_value,
        'font_size' => apg_number($_POST['post_excerpt_font_size'])
    );

    $change = update_option('apg_post_excerpt', $post_excerpt_data);
}

if (isset($_POST['default_post_excerpt']) and $nonce) {
    $change = delete_option('apg_post_excerpt');
}

$excerpt = apg_excerpt_options();
?>

<?php if ((isset($_POST['submit']) or isset($_POST['default_post_excerpt'])) and !$nonce): ?>
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
    <h2><?php _e('Post Excerpt Settings','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('post excerpt display','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-excerpt-display" type="checkbox" name="post_excerpt_display" value="1" <?php checked($excerpt['display']); ?>/>
                    <label for="apg-excerpt-display"><?php _e('display', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><label for="apg-excerpt-wl"><?php _e('excerpt words limit', 'arvand-posts'); ?></label></th>
                <td><input id="apg-excerpt-wl" class="small-text" type="number" name="post_excerpt_wl" value="<?php echo esc_attr($excerpt['words_limit']); ?>" min="0"/></td>
            </tr>
        </tbody>
    </table>

    <h2><?php _e('Post Excerpt Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><?php _e('margin', 'arvand-posts'); ?></th>
                <td>
                    <label for="apg-excerpt-mt"><?php _e('top', 'arvand-posts'); ?></label></th>
                    <input id="apg-excerpt-mt" class="small-text" type="number" name="post_excerpt_mt" value="<?php echo esc_attr($excerpt['mt']); ?>" min="0"/>
                    <label for="apg-excerpt-mb"><?php _e('bottom', 'arvand-posts'); ?></label></th>
                    <input id="apg-excerpt-mb" class="small-text" type="number" name="post_excerpt_mb" value="<?php echo esc_attr($excerpt['mb']); ?>" min="0"/>
                    <p class="description"><?php _e('These margins apply if margin auto is not checked.', 'arvand-posts'); ?></p>
                </td>
            </tr>

            <tr>
                <th><?php _e('margin auto', 'arvand-posts'); ?></th>
                <td>
                    <input id="apg-excerpt-mta" type="checkbox" name="post_excerpt_mta" value="1" min="0"/ <?php checked($excerpt['mta']); ?>>
                    <label for="apg-excerpt-mta"><?php _e('top', 'arvand-posts'); ?></label></th>&nbsp;&nbsp;
                    <input id="apg-excerpt-mba" type="checkbox" name="post_excerpt_mba" value="1" min="0" <?php checked($excerpt['mba']); ?>/>
                    <label for="apg-excerpt-mba"><?php _e('bottom', 'arvand-posts'); ?></label></th>
                </td>
            </tr>

            <tr>
                <th><label for="apg-excerpt-color"><?php _e('text color', 'arvand-posts'); ?></label></th>
                <td><input id="apg-excerpt-color" type="color" name="post_excerpt_color" value="<?php echo esc_attr($excerpt['color']); ?>"/></td>
            </tr>

            <tr>
                <th><label><?php _e('align', 'arvand-posts'); ?></label></th>
                <td>
                    <fieldset>
                        <label>
                            <input id="apg-excerpt-align-left" type="radio" name="post_excerpt_align" value="<?php echo esc_attr('left'); ?>" <?php echo ($excerpt['align'] == 'left') ? 'checked' : ''; ?>/>
                            <label for="apg-excerpt-align-left"><?php _e('left', 'arvand-posts'); ?></label><br/>
                            <input id="apg-excerpt-align-center" type="radio" name="post_excerpt_align" value="<?php echo esc_attr('center'); ?>" <?php echo ($excerpt['align'] == 'center') ? 'checked' : ''; ?>/>
                            <label for="apg-excerpt-align-center"><?php _e('center', 'arvand-posts'); ?></label><br/>
                            <input id="apg-excerpt-align-right" type="radio" name="post_excerpt_align" value="<?php echo esc_attr('right'); ?>" <?php echo ($excerpt['align'] == 'right') ? 'checked' : ''; ?>/>
                            <label for="apg-excerpt-align-right"><?php _e('right', 'arvand-posts'); ?></label>
                        </label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th><label for="apg-excerpt-font-size"><?php _e('font size', 'arvand-posts'); ?></label></th>
                <td><input id="apg-excerpt-font-size" class="small-text" type="number" name="post_excerpt_font_size" value="<?php echo esc_attr($excerpt['font_size']); ?>" min="0"/></td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field('apg_posts_excerpt', 'apg_posts_excerpt'); ?>

    <p>
        <input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('save settings', 'arvand-posts'); ?>"/>
        <input class="button" type="submit" name="default_post_excerpt" value="<?php esc_attr_e('set as default', 'arvand-posts'); ?>"/>
    </p>
</form>