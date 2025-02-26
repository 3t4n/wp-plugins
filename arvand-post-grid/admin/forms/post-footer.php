<?php
$nonce = isset($_POST['apg_posts_footer']) and wp_verify_nonce($_POST['apg_posts_footer'], 'apg_posts_footer');

if (isset($_POST['submit']) and $nonce) {
    $footer_display = isset($_POST['post_footer_display']) ? true : false;
    $author_display = isset($_POST['post_author_display']) ? true : false;
    $date_display = isset($_POST['post_date_display']) ? true : false;
    $bgt = isset($_POST['post_footer_bgt']) ? true : false;

    $valid_footer_align_value = array('left', 'center', 'right');

    if (in_array($_POST['post_footer_align'], $valid_footer_align_value)) {
        $align_value = sanitize_text_field($_POST['post_footer_align']);
    } else {
        $align_value = 'left';
    }

    $post_footer_data = array(
        'footer_display' => $footer_display,
        'author_display' => $author_display,
        'date_display' => $date_display,
        'bgt' => $bgt,
        'bg' => sanitize_hex_color($_POST['post_footer_bg']),
        'pt' => apg_number($_POST['post_footer_padding']['pt']),
        'pr' => apg_number($_POST['post_footer_padding']['pr']),
        'pb' => apg_number($_POST['post_footer_padding']['pb']),
        'pl' => apg_number($_POST['post_footer_padding']['pl']),
        'text_color' => sanitize_hex_color($_POST['post_footer_text_color']),
        'text_align' => $align_value,
        'font_size' => apg_number($_POST['post_footer_font_size']),
        'bw' => apg_number($_POST['post_footer_bw']),
        'bc' => sanitize_hex_color($_POST['post_footer_bc']),
    );

    $change = update_option('apg_post_footer', $post_footer_data);
}

if (isset($_POST['default_post_footer']) and $nonce) {
    $change = delete_option('apg_post_footer');
}

$footer = apg_footer_options();
?>

<?php if ((isset($_POST['submit']) or isset($_POST['default_post_footer'])) and !$nonce): ?>
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
    <h2><?php _e('Post Footer Settings','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('post footer display','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-footer-display" type="checkbox" name="post_footer_display" value="1" <?php checked($footer['footer_display']); ?>/>
                    <label for="apg-footer-display"><?php _e('display', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('post author display','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-author-display" type="checkbox" name="post_author_display" value="1" <?php checked($footer['author_display']); ?>/>
                    <label for="apg-author-display"><?php _e('display', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('post date display','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-date-display" type="checkbox" name="post_date_display" value="1" <?php checked($footer['date_display']); ?>/>
                    <label for="apg-date-display"><?php _e('display', 'arvand-posts'); ?></label>
                </td>
            </tr>
        </tbody>
    </table>

    <h2><?php _e('Post Footer Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('background color', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-footer-bgt" type="checkbox" name="post_footer_bgt" value="1" <?php checked($footer['bgt']); ?>/>
                    <label for="apg-footer-bgt"><?php _e('transparent (disable custom color)', 'arvand-posts'); ?></label>&nbsp;&nbsp;
                    <input id="apg-footer-bg" type="color" name="post_footer_bg" value="<?php echo esc_attr($footer['bg']); ?>"/>
                    <label for="apg-footer-bg"><?php _e('custom color', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><?php _e('padding', 'arvand-posts'); ?></th>
                <td>
                    <label><?php _e('top', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_footer_padding[pt]" value="<?php echo esc_attr($footer['pt']); ?>" min="0"/>
                    <label><?php _e('right', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_footer_padding[pr]" value="<?php echo esc_attr($footer['pr']) ;?>" min="0"/>
                    <label><?php _e('bottom', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_footer_padding[pb]" value="<?php echo esc_attr($footer['pb']); ?>" min="0"/>
                    <label><?php _e('left', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_footer_padding[pl]" value="<?php echo esc_attr($footer['pl']); ?>" min="0"/>
                </td>
            </tr>

            <tr>
                <th><label for="apg-footer-text-color"><?php _e('text color', 'arvand-posts'); ?></label></th>
                <td><input id="apg-footer-text-color" type="color" name="post_footer_text_color" value="<?php echo esc_attr($footer['text_color']); ?>"/></td>
            </tr>

            <tr>
                <th><label><?php _e('text align', 'arvand-posts'); ?></label></th>
                <td>
                    <fieldset>
                        <label>
                            <input id="apg-footer-align-left" type="radio" name="post_footer_align" value="<?php echo esc_attr('left'); ?>" <?php echo ($footer['text_align'] == 'left') ? 'checked' : ''; ?>/>
                            <label for="apg-footer-align-left"><?php _e('left', 'arvand-posts'); ?></label><br/>
                            <input id="apg-footer-align-center" type="radio" name="post_footer_align" value="<?php echo esc_attr('center'); ?>" <?php echo ($footer['text_align'] == 'center') ? 'checked' : ''; ?>/>
                            <label for="apg-footer-align-center"><?php _e('center', 'arvand-posts'); ?></label><br/>
                            <input id="apg-footer-align-right" type="radio" name="post_footer_align" value="<?php echo esc_attr('right'); ?>" <?php echo ($footer['text_align'] == 'right') ? 'checked' : ''; ?>/>
                            <label for="apg-footer-align-right"><?php _e('right', 'arvand-posts'); ?></label>
                        </label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th><label for="apg-footer-font-size"><?php _e('font size', 'arvand-posts'); ?></label></th>
                <td><input id="apg-footer-font-size" class="small-text" type="number" name="post_footer_font_size" value="<?php echo esc_attr($footer['font_size']); ?>" min="0"/></td>
            </tr>

            <tr>
                <th><label for="apg-footer-bw"><?php _e('border width', 'arvand-posts'); ?></label></th>
                <td><input id="apg-footer-bw" class="small-text" type="number" name="post_footer_bw" value="<?php echo esc_attr($footer['bw']); ?>" min="0"/></td>
            </tr>

            <tr>
                <th><label for="apg-footer-bc"><?php _e('border color', 'arvand-posts'); ?></label></th>
                <td><input id="apg-footer-bc" type="color" name="post_footer_bc" value="<?php echo esc_attr($footer['bc']); ?>"/></td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field('apg_posts_footer', 'apg_posts_footer'); ?>

    <p>
        <input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('save settings', 'arvand-posts'); ?>"/>
        <input class="button" type="submit" name="default_post_footer" value="<?php esc_attr_e('set as default', 'arvand-posts'); ?>"/>
    </p>
</form>