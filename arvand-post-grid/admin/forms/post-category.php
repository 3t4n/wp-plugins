<?php
$nonce = isset($_POST['apg_posts_cat']) and wp_verify_nonce($_POST['apg_posts_cat'], 'apg_posts_cat');

if (isset($_POST['submit']) and $nonce) {
    $display = isset($_POST['post_cat_display']) ? true : false;
    $bgt = isset($_POST['post_cat_bgt']) ? true : false;
    $mta = isset($_POST['post_cat_mta']) ? true : false;
    $mba = isset($_POST['post_cat_mba']) ? true : false;
    $valid_align = array('left', 'center', 'right');

    if (in_array($_POST['post_cat_align'], $valid_align)) {
        $align_value = sanitize_text_field($_POST['post_cat_align']);
    } else {
        $align_value = 'left';
    }

    $more_data = array(
        'display' => $display,
        'bgt' => $bgt,
        'mt' => apg_number($_POST['post_cat_mt']),
        'mta' => $mta,
        'mb' => apg_number($_POST['post_cat_mb']),
        'mba' => $mba,
        'bg' => sanitize_hex_color($_POST['post_cat_bg']),
        'py' => apg_number($_POST['post_cat_padding']['py']),
        'px' => apg_number($_POST['post_cat_padding']['px']),
        'align' => $align_value,
        'color' => sanitize_hex_color($_POST['post_cat_text_color']),
        'font_size' => apg_number($_POST['post_cat_font_size']),
        'br' => apg_number($_POST['post_cat_br']),
        'sep' => sanitize_text_field(wp_strip_all_tags($_POST['post_cat_sep'])),
        'sep_color' => sanitize_hex_color($_POST['post_cat_sep_color'])
    );

    $change = update_option('apg_post_cat', $more_data);
}

if (isset($_POST['default_post_cat']) and $nonce) {
    $change = delete_option('apg_post_cat');
}

$cat = apg_category_options();
?>

<?php if ((isset($_POST['submit']) or isset($_POST['default_post_cat'])) and !$nonce): ?>
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
    <h2><?php _e('Category Settings','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><?php _e('category display','arvand-posts'); ?></th>
                <td>
                    <input id="apg-cat-display" type="checkbox" name="post_cat_display" value="1" <?php checked($cat['display']); ?>/>
                    <label for="apg-cat-display"><?php _e('display', 'arvand-posts'); ?></label>
                </td>
            </tr>
        </tbody>
    </table>

    <h2><?php _e('Category Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('background color', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-cat-bgt" type="checkbox" name="post_cat_bgt" value="1" <?php checked($cat['bgt']); ?>/>
                    <label for="apg-cat-bgt"><?php _e('transparent (disable custom color)', 'arvand-posts'); ?></label>&nbsp;&nbsp;
                    <input id="apg-cat-bg" type="color" name="post_cat_bg" value="<?php echo esc_attr($cat['bg']); ?>"/>
                    <label for="apg-cat-bg"><?php _e('custom color', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><?php _e('margin', 'arvand-posts'); ?></th>
                <td>
                    <label for="apg-cat-mt"><?php _e('top', 'arvand-posts'); ?></label></th>
                    <input id="apg-cat-mt" class="small-text" type="number" name="post_cat_mt" value="<?php echo esc_attr($cat['mt']); ?>" min="0"/>
                    <label for="apg-cat-mb"><?php _e('bottom', 'arvand-posts'); ?></label></th>
                    <input id="apg-cat-mb" class="small-text" type="number" name="post_cat_mb" value="<?php echo esc_attr($cat['mb']); ?>" min="0"/>
                    <p class="description"><?php _e('These margins apply if margin auto is not checked.', 'arvand-posts'); ?></p>
                </td>
            </tr>

            <tr>
                <th><?php _e('margin auto', 'arvand-posts'); ?></th>
                <td>
                    <input id="apg-cat-mta" type="checkbox" name="post_cat_mta" value="1" min="0"/ <?php checked($cat['mta']); ?>>
                    <label for="apg-cat-mta"><?php _e('top', 'arvand-posts'); ?></label></th>&nbsp;&nbsp;
                    <input id="apg-cat-mba" type="checkbox" name="post_cat_mba" value="1" min="0" <?php checked($cat['mba']); ?>/>
                    <label for="apg-cat-mba"><?php _e('bottom', 'arvand-posts'); ?></label></th>
                </td>
            </tr>

            <tr>
                <th><?php _e('padding', 'arvand-posts'); ?></th>
                <td>
                    <label><?php _e('padding-y', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_cat_padding[py]" value="<?php echo esc_attr($cat['py']); ?>" min="0"/>
                    <label><?php _e('padding-x', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_cat_padding[px]" value="<?php echo esc_attr($cat['px']) ;?>" min="0"/>
                </td>
            </tr>

            <tr>
                <th><label for="apg-cat-text-color"><?php _e('text color', 'arvand-posts'); ?></label></th>
                <td><input id="apg-cat-text-color" type="color" name="post_cat_text_color" value="<?php echo esc_attr($cat['color']); ?>"/></td>
            </tr>

            <tr>
                <th><?php _e('align', 'arvand-posts'); ?></th>
                <td>
                    <fieldset>
                        <label>
                            <input id="apg-cat-align-left" type="radio" name="post_cat_align" value="left" <?php echo ($cat['align'] == 'left') ? 'checked' : ''; ?>/>
                            <label for="apg-cat-align-left"><?php _e('left', 'arvand-posts'); ?></label><br/>
                            <input id="apg-cat-align-center" type="radio" name="post_cat_align" value="center" <?php echo ($cat['align'] == 'center') ? 'checked' : ''; ?>/>
                            <label for="apg-cat-align-center"><?php _e('center', 'arvand-posts'); ?></label><br/>
                            <input id="apg-cat-align-right" type="radio" name="post_cat_align" value="right" <?php echo ($cat['align'] == 'right') ? 'checked' : ''; ?>/>
                            <label for="apg-cat-align-right"><?php _e('right', 'arvand-posts'); ?></label>
                        </label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th><label for="apg-cat-font-size"><?php _e('font size', 'arvand-posts'); ?></label></th>
                <td><input id="apg-cat-font-size" class="small-text" type="number" name="post_cat_font_size" value="<?php echo esc_attr($cat['font_size']); ?>" min="0"/></td>
            </tr>

            <tr>
                <th><label for="apg-cat-br"><?php _e('border radius', 'arvand-posts'); ?></label></th>
                <td><input id="apg-cat-br" class="small-text" type="number" name="post_cat_br" value="<?php echo esc_attr($cat['br']); ?>" min="0"/></td>
            </tr>

            <tr>
                <th><label for="apg-cat-sep"><?php _e('separator', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-cat-sep" class="small-text" type="text" name="post_cat_sep" value="<?php echo esc_attr($cat['sep']); ?>" min="0"/>
                    <p class="description"><?php _e('If empty, the category will be without a separator.', 'arvand-posts'); ?></p>
                </td>
            </tr>

            <tr>
                <th><label for="apg-cat-sep-color"><?php _e('separator color', 'arvand-posts'); ?></label></th>
                <td><input id="apg-cat-sep-color" type="color" name="post_cat_sep_color" value="<?php echo esc_attr($cat['sep_color']); ?>"/></td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field('apg_posts_cat', 'apg_posts_cat'); ?>

    <p>
        <input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('save settings', 'arvand-posts'); ?>"/>
        <input class="button" type="submit" name="default_post_cat" value="<?php esc_attr_e('set as default', 'arvand-posts'); ?>"/>
    </p>
</form>