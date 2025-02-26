<?php
$nonce = isset($_POST['apg_posts_more']) and wp_verify_nonce($_POST['apg_posts_more'], 'apg_posts_more');

if (isset($_POST['submit']) and $nonce) {
    $display = isset($_POST['post_more_display']) ? true : false;
    $bgt = isset($_POST['post_more_bgt']) ? true : false;
    $full = isset($_POST['post_more_full_width']) ? true : false;
    $mta = isset($_POST['post_more_mta']) ? true : false;
    $mba = isset($_POST['post_more_mba']) ? true : false;
    $valid_align_value = array('left', 'center', 'right');

    if (in_array($_POST['post_more_align'], $valid_align_value)) {
        $align_value = sanitize_text_field($_POST['post_more_align']);
    } else {
        $align_value = 'left';
    }

    $more_data = array(
        'display' => $display,
        'text' => sanitize_text_field($_POST['post_more_text']),
        'bgt' => $bgt,
        'bg' => sanitize_hex_color($_POST['post_more_bg']),
        'full' => $full,
        'mt' => intval($_POST['post_more_mt']),
        'mta' => $mta,
        'mb' => intval($_POST['post_more_mb']),
        'mba' => $mba,
        'py' => apg_number($_POST['post_more_padding']['py']),
        'px' => apg_number($_POST['post_more_padding']['px']),
        'align' => $align_value,
        'color' => sanitize_hex_color($_POST['post_more_text_color']),
        'font_size' => apg_number($_POST['post_more_font_size']),
        'bw' => apg_number($_POST['post_more_bw']),
        'bc' => sanitize_hex_color($_POST['post_more_bc']),
        'br' => apg_number($_POST['post_more_br']),
    );

    $change = update_option('apg_post_more', $more_data);
}

if (isset($_POST['default_post_more']) and $nonce) {
    $change = delete_option('apg_post_more');
}

$more = apg_read_more_options();
?>

<?php if ((isset($_POST['submit']) or isset($_POST['default_post_more'])) and !$nonce): ?>
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
    <h2><?php _e('Post Read More Settings','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('read more display','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-more-display" type="checkbox" name="post_more_display" value="1" <?php checked($more['display']); ?>/>
                    <label for="apg-more-display"><?php _e('display', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('read more text','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-more-text" type="text" name="post_more_text" value="<?php echo esc_attr($more['text']); ?>"/>
                </td>
            </tr>
        </tbody>
    </table>

    <h2><?php _e('Post More Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('background color', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-more-bgt" type="checkbox" name="post_more_bgt" value="1" <?php checked($more['bgt']); ?>/>
                    <label for="apg-more-bgt"><?php _e('transparent (disable custom color)', 'arvand-posts'); ?></label>&nbsp;&nbsp;
                    <input id="apg-more-bg" type="color" name="post_more_bg" value="<?php echo esc_attr($more['bg']); ?>"/>
                    <label for="apg-more-bg"><?php _e('custom color', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('full width','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-more-full-width" type="checkbox" name="post_more_full_width" value="1" <?php checked($more['full']); ?>/>
                    <label for="apg-more-full-width"><?php _e('full width', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><?php _e('margin', 'arvand-posts'); ?></th>
                <td>
                    <label for="apg-more-mt"><?php _e('top', 'arvand-posts'); ?></label></th>
                    <input id="apg-more-mt" class="small-text" type="number" name="post_more_mt" value="<?php echo esc_attr($more['mt']); ?>" min="0"/>
                    <label for="apg-more-mb"><?php _e('bottom', 'arvand-posts'); ?></label></th>
                    <input id="apg-more-mb" class="small-text" type="number" name="post_more_mb" value="<?php echo esc_attr($more['mb']); ?>" min="0"/>
                    <p class="description"><?php _e('These margins apply if margin auto is not checked.', 'arvand-posts'); ?></p>
                </td>
            </tr>

            <tr>
                <th><?php _e('margin auto', 'arvand-posts'); ?></th>
                <td>
                    <input id="apg-more-mta" type="checkbox" name="post_more_mta" value="1" min="0"/ <?php checked($more['mta']); ?>>
                    <label for="apg-more-mta"><?php _e('top', 'arvand-posts'); ?></label></th>&nbsp;&nbsp;
                    <input id="apg-more-mba" type="checkbox" name="post_more_mba" value="1" min="0" <?php checked($more['mba']); ?>/>
                    <label for="apg-more-mba"><?php _e('bottom', 'arvand-posts'); ?></label></th>
                </td>
            </tr>

            <tr>
                <th><?php _e('padding', 'arvand-posts'); ?></th>
                <td>
                    <label><?php _e('padding-y', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_more_padding[py]" value="<?php echo esc_attr($more['py']); ?>" min="0"/>
                    <label><?php _e('padding-x', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_more_padding[px]" value="<?php echo esc_attr($more['px']) ;?>" min="0"/>
                </td>
            </tr>

            <tr>
                <th><label for="apg-more-text-color"><?php _e('text color', 'arvand-posts'); ?></label></th>
                <td><input id="apg-more-text-color" type="color" name="post_more_text_color" value="<?php echo esc_attr($more['color']); ?>"/></td>
            </tr>

            <tr>
                <th><label><?php _e('align', 'arvand-posts'); ?></label></th>
                <td>
                    <fieldset>
                        <label>
                            <input id="apg-more-align-left" type="radio" name="post_more_align" value="left" <?php echo ($more['align'] == 'left') ? 'checked' : ''; ?>/>
                            <label for="apg-more-align-left"><?php _e('left', 'arvand-posts'); ?></label><br/>
                            <input id="apg-more-align-center" type="radio" name="post_more_align" value="center" <?php echo ($more['align'] == 'center') ? 'checked' : ''; ?>/>
                            <label for="apg-more-align-center"><?php _e('center', 'arvand-posts'); ?></label><br/>
                            <input id="apg-more-align-right" type="radio" name="post_more_align" value="right" <?php echo ($more['align'] == 'right') ? 'checked' : ''; ?>/>
                            <label for="apg-more-align-right"><?php _e('right', 'arvand-posts'); ?></label>
                        </label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th><label for="apg-more-font-size"><?php _e('font size', 'arvand-posts'); ?></label></th>
                <td><input id="apg-more-font-size" class="small-text" type="number" name="post_more_font_size" value="<?php echo esc_attr($more['font_size']); ?>" min="0"/></td>
            </tr>

            <tr>
                <th><label for="apg-more-bw"><?php _e('border width', 'arvand-posts'); ?></label></th>
                <td><input id="apg-more-bw" class="small-text" type="number" name="post_more_bw" value="<?php echo esc_attr($more['bw']); ?>" min="0"/></td>
            </tr>

            <tr>
                <th><label for="apg-more-bc"><?php _e('border color', 'arvand-posts'); ?></label></th>
                <td><input id="apg-more-bc" type="color" name="post_more_bc" value="<?php echo esc_attr($more['bc']); ?>"/></td>
            </tr>

            <tr>
                <th><label for="apg-more-br"><?php _e('border radius', 'arvand-posts'); ?></label></th>
                <td><input id="apg-more-br" class="small-text" type="number" name="post_more_br" value="<?php echo esc_attr($more['br']); ?>" min="0"/></td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field('apg_posts_more', 'apg_posts_more'); ?>

    <p>
        <input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('save settings', 'arvand-posts'); ?>"/>
        <input class="button" type="submit" name="default_post_more" value="<?php esc_attr_e('set as default', 'arvand-posts'); ?>"/>
    </p>
</form>