<?php
$nonce = isset($_POST['apg_posts_pagination']) and wp_verify_nonce($_POST['apg_posts_pagination'], 'apg_posts_pagination');
$change = array();

if (isset($_POST['submit']) and $nonce) {
    $p_display = isset($_POST['posts_p_display']) ? true : false;
    $p_wrap_bgt = isset($_POST['posts_pw_bgt']) ? true : false;
    $valid_align = array('left', 'center', 'right');

    if (in_array($_POST['posts_p_align'], $valid_align)) {
        $align_value = sanitize_text_field($_POST['posts_p_align']);
    } else {
        $align_value = 'center';
    }

    $pw_data = array(
        'display' => $p_display,
        'bgt' => $p_wrap_bgt,
        'bg' => sanitize_hex_color($_POST['posts_pw_bg']),
        'mt' => intval($_POST['posts_pw_margin']['mt']),
        'mb' => intval($_POST['posts_pw_margin']['mb']),
        'pt' => apg_number($_POST['posts_pw_padding']['pt']),
        'pr' => apg_number($_POST['posts_pw_padding']['pr']),
        'pb' => apg_number($_POST['posts_pw_padding']['pb']),
        'pl' => apg_number($_POST['posts_pw_padding']['pl']),
        'align' => $align_value,
        'br' => apg_number($_POST['posts_pw_br']),
    );

    $change['apg_posts_p_wrap'] = update_option('apg_posts_p_wrap', $pw_data);

    $ppn_display = isset($_POST['posts_ppn_display']) ? true : false;
    $ppn_bgt = isset($_POST['posts_ppn_bgt']) ? true : false;

    $ppn_default = array(
        'display' => $ppn_display,
        'prev_text' => sanitize_text_field($_POST['posts_p_prev_text']),
        'next_text' => sanitize_text_field($_POST['posts_p_next_text']),
        'bgt' => $ppn_bgt,
        'bg' => sanitize_hex_color($_POST['posts_ppn_bg']),
        'py' => apg_number($_POST['posts_ppn_padding']['py']),
        'px' => apg_number($_POST['posts_ppn_padding']['px']),
        'color' => sanitize_hex_color($_POST['posts_ppn_text_color']),
        'font_size' => apg_number($_POST['posts_ppn_font_size']),
        'br' => apg_number($_POST['posts_ppn_br'])
    );

    $change['apg_posts_ppn'] = update_option('apg_posts_ppn', $ppn_default);

    $pn_display = isset($_POST['posts_pn_display']) ? true : false;
    $pn_bgt = isset($_POST['posts_pn_bgt']) ? true : false;

    $pn_default = array(
        'display' => $pn_display,
        'bgt' => $pn_bgt,
        'bg' => sanitize_hex_color($_POST['posts_pn_bg']),
        'py' => apg_number($_POST['posts_pn_padding']['py']),
        'px' => apg_number($_POST['posts_pn_padding']['px']),
        'color' => sanitize_hex_color($_POST['posts_pn_text_color']),
        'font_size' => apg_number($_POST['posts_pn_font_size']),
        'br' => apg_number($_POST['posts_pn_br']),
    );

    $change['apg_posts_p_numbers'] = update_option('apg_posts_p_numbers', $pn_default);

    $pd_display = isset($_POST['posts_pd_display']) ? true : false;
    $pd_bgt = isset($_POST['posts_pd_bgt']) ? true : false;

    $pd_default = array(
        'display' => $pd_display,
        'bgt' => $pd_bgt,
        'bg' => sanitize_hex_color($_POST['posts_pd_bg']),
        'py' => apg_number($_POST['posts_pd_padding']['py']),
        'px' => apg_number($_POST['posts_pd_padding']['px']),
        'color' => sanitize_hex_color($_POST['posts_pd_text_color']),
        'br' => apg_number($_POST['posts_pd_br']),
    );

    $change['apg_posts_p_dots'] = update_option('apg_posts_p_dots', $pd_default);

    $pc_bgt = isset($_POST['posts_pc_bgt']) ? true : false;

    $pc_default = array(
        'bgt' => $pc_bgt,
        'bg' => sanitize_hex_color($_POST['posts_pc_bg']),
        'color' => sanitize_hex_color($_POST['posts_pc_text_color'])
    );

    $change['apg_posts_p_current'] = update_option('apg_posts_p_current', $pc_default);
}

if (isset($_POST['default_post_pagination']) and $nonce) {
    $change['apg_posts_p_wrap'] = delete_option('apg_posts_p_wrap');
    $change['apg_posts_ppn'] = delete_option('apg_posts_ppn');
    $change['apg_posts_p_dots'] = delete_option('apg_posts_p_dots');
    $change['apg_posts_p_numbers'] = delete_option('apg_posts_p_numbers');
    $change['apg_posts_p_current'] = delete_option('apg_posts_p_current');
}

$pw = apg_pagination_options('pw');
$ppn = apg_pagination_options('ppn');
$pn = apg_pagination_options('pn');
$pd = apg_pagination_options('pd');
$pc = apg_pagination_options('pc');
?>

<?php if ((isset($_POST['submit']) or isset($_POST['default_post_pagination'])) and !$nonce): ?>
    <div class="notice error is-dismissible">
        <p><strong><?php _e('invalid request.', 'arvand-posts'); ?></strong></p>
    </div>
<?php endif; ?>

<?php if (in_array(true, $change)): ?>
    <div class="notice updated is-dismissible">
        <p><strong><?php _e('settings saved.', 'arvand-posts'); ?></strong></p>
    </div>
<?php endif; ?>

<form action="" method="post">
    <h2><?php _e('Pagination Settings','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('pagination display','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-p-display" type="checkbox" name="posts_p_display" value="1" <?php checked($pw['display']); ?>/>
                    <label for="apg-p-display"><?php _e('display', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('prev & next display','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-ppn-display" type="checkbox" name="posts_ppn_display" value="1" <?php checked($ppn['display']); ?>/>
                    <label for="apg-ppn-display"><?php _e('display', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('pagination dots','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-pd-display" type="checkbox" name="posts_pd_display" value="1" <?php checked($pd['display']); ?>/>
                    <label for="apg-pd-display"><?php _e('display', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('previous text','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-p-prev-text" type="text" name="posts_p_prev_text" value="<?php echo esc_attr($ppn['prev_text']); ?>"/>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('next text','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-p-next-text" type="text" name="posts_p_next_text" value="<?php echo esc_attr($ppn['next_text']); ?>"/>
                </td>
            </tr>
        </tbody>
    </table>

    <h2><?php _e('Pagination Wrap Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('background color', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-pw-bgt" type="checkbox" name="posts_pw_bgt" value="1" <?php checked($pw['bgt']); ?>/>
                    <label for="apg-pw-bgt"><?php _e('transparent (disable custom color)', 'arvand-posts'); ?></label>&nbsp;&nbsp;
                    <input id="apg-pw-bg" type="color" name="posts_pw_bg" value="<?php echo esc_attr($pw['bg']); ?>"/>
                    <label for="apg-pw-bg"><?php _e('custom color', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><?php _e('margin', 'arvand-posts'); ?></th>
                <td>
                    <label><?php _e('top', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="posts_pw_margin[mt]" value="<?php echo esc_attr($pw['mt']); ?>" min="0"/>
                    <label><?php _e('bottom', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="posts_pw_margin[mb]" value="<?php echo esc_attr($pw['mb']) ;?>" min="0"/>
                </td>
            </tr>

            <tr>
                <th><?php _e('padding', 'arvand-posts'); ?></th>
                <td>
                    <label><?php _e('top', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="posts_pw_padding[pt]" value="<?php echo esc_attr($pw['pt']); ?>" min="0"/>
                    <label><?php _e('right', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="posts_pw_padding[pr]" value="<?php echo esc_attr($pw['pr']) ;?>" min="0"/>
                    <label><?php _e('bottom', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="posts_pw_padding[pb]" value="<?php echo esc_attr($pw['pb']); ?>" min="0"/>
                    <label><?php _e('left', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="posts_pw_padding[pl]" value="<?php echo esc_attr($pw['pl']) ;?>" min="0"/>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('align', 'arvand-posts'); ?></label></th>
                <td>
                    <fieldset>
                        <label>
                            <input id="apg-p-align-left" type="radio" name="posts_p_align" value="left" <?php echo ($pw['align'] == 'left') ? 'checked' : ''; ?>/>
                            <label for="apg-p-align-left"><?php _e('left', 'arvand-posts'); ?></label><br/>
                            <input id="apg-p-align-center" type="radio" name="posts_p_align" value="center" <?php echo ($pw['align'] == 'center') ? 'checked' : ''; ?>/>
                            <label for="apg-p-align-center"><?php _e('center', 'arvand-posts'); ?></label><br/>
                            <input id="apg-p-align-right" type="radio" name="posts_p_align" value="right" <?php echo ($pw['align'] == 'right') ? 'checked' : ''; ?>/>
                            <label for="apg-p-align-right"><?php _e('right', 'arvand-posts'); ?></label>
                        </label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th><label for="apg-pw-br"><?php _e('border radius', 'arvand-posts'); ?></label></th>
                <td><input id="apg-pw-br" class="small-text" type="number" name="posts_pw_br" value="<?php echo esc_attr($pw['br']); ?>" min="0"/></td>
            </tr>
        </tbody>
    </table>

    <h2><?php _e('Prev & Next Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('background color', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-ppn-bgt" type="checkbox" name="posts_ppn_bgt" value="1" <?php checked($ppn['bgt']); ?>/>
                    <label for="apg-ppn-bgt"><?php _e('transparent (disable custom color)', 'arvand-posts'); ?></label>&nbsp;&nbsp;
                    <input id="apg-ppn-bg" type="color" name="posts_ppn_bg" value="<?php echo esc_attr($ppn['bg']); ?>"/>
                    <label for="apg-ppn-bg"><?php _e('custom color', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><?php _e('padding', 'arvand-posts'); ?></th>
                <td>
                    <label><?php _e('paddind-y', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="posts_ppn_padding[py]" value="<?php echo esc_attr($ppn['py']); ?>" min="0"/>
                    <label><?php _e('paddind-x', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="posts_ppn_padding[px]" value="<?php echo esc_attr($ppn['px']) ;?>" min="0"/>
                </td>
            </tr>

            <tr>
                <th><?php _e('text color', 'arvand-posts'); ?></th>
                <td>
                    <input id="apg-ppn-text-color" type="color" name="posts_ppn_text_color" value="<?php echo esc_attr($ppn['color']); ?>"/>
                </td>
            </tr>

            <tr>
                <th><label for="apg-ppn-font-size"><?php _e('font size', 'arvand-posts'); ?></label></th>
                <td><input id="apg-ppn-font-size" class="small-text" type="number" name="posts_ppn_font_size" value="<?php echo esc_attr($ppn['font_size']); ?>" min="0"/></td>
            </tr>

            <tr>
                <th><label for="apg-ppn-br"><?php _e('border radius', 'arvand-posts'); ?></label></th>
                <td><input id="apg-ppn-br" class="small-text" type="number" name="posts_ppn_br" value="<?php echo esc_attr($ppn['br']); ?>" min="0"/></td>
            </tr>
        </tbody>
    </table>

    <h2><?php _e('Dots Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('background color', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-pd-bgt" type="checkbox" name="posts_pd_bgt" value="1" <?php checked($pd['bgt']); ?>/>
                    <label for="apg-pd-bgt"><?php _e('transparent (disable custom color)', 'arvand-posts'); ?></label>&nbsp;&nbsp;
                    <input id="apg-pd-bg" type="color" name="posts_pd_bg" value="<?php echo esc_attr($pd['bg']); ?>"/>
                    <label for="apg-pd-bg"><?php _e('custom color', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><?php _e('padding', 'arvand-posts'); ?></th>
                <td>
                    <label><?php _e('paddind-y', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="posts_pd_padding[py]" value="<?php echo esc_attr($pd['py']); ?>" min="0"/>
                    <label><?php _e('paddind-x', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="posts_pd_padding[px]" value="<?php echo esc_attr($pd['px']) ;?>" min="0"/>
                </td>
            </tr>

            <tr>
                <th><?php _e('text color', 'arvand-posts'); ?></th>
                <td>
                    <input id="apg-pd-text-color" type="color" name="posts_pd_text_color" value="<?php echo esc_attr($pd['color']); ?>"/>
                </td>
            </tr>

            <tr>
                <th><label for="apg-pd-br"><?php _e('border radius', 'arvand-posts'); ?></label></th>
                <td><input id="apg-pd-br" class="small-text" type="number" name="posts_pd_br" value="<?php echo esc_attr($pd['br']); ?>" min="0"/></td>
            </tr>
        </tbody>
    </table>

    <h2><?php _e('Page Numbers Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('background color', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-pn-bgt" type="checkbox" name="posts_pn_bgt" value="1" <?php checked($pn['bgt']); ?>/>
                    <label for="apg-pn-bgt"><?php _e('transparent (disable custom color)', 'arvand-posts'); ?></label>&nbsp;&nbsp;
                    <input id="apg-pn-bg" type="color" name="posts_pn_bg" value="<?php echo esc_attr($pn['bg']); ?>"/>
                    <label for="apg-pn-bg"><?php _e('custom color', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><?php _e('padding', 'arvand-posts'); ?></th>
                <td>
                    <label><?php _e('paddind-y', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="posts_pn_padding[py]" value="<?php echo esc_attr($pn['py']); ?>" min="0"/>
                    <label><?php _e('paddind-x', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="posts_pn_padding[px]" value="<?php echo esc_attr($pn['px']) ;?>" min="0"/>
                </td>
            </tr>

            <tr>
                <th><?php _e('text color', 'arvand-posts'); ?></th>
                <td>
                    <input id="apg-pn-text-color" type="color" name="posts_pn_text_color" value="<?php echo esc_attr($pn['color']); ?>"/>
                </td>
            </tr>

            <tr>
                <th><label for="apg-pn-font-size"><?php _e('font size', 'arvand-posts'); ?></label></th>
                <td><input id="apg-pn-font-size" class="small-text" type="number" name="posts_pn_font_size" value="<?php echo esc_attr($pn['font_size']); ?>" min="0"/></td>
            </tr>

            <tr>
                <th><label for="apg-pn-br"><?php _e('border radius', 'arvand-posts'); ?></label></th>
                <td><input id="apg-pn-br" class="small-text" type="number" name="posts_pn_br" value="<?php echo esc_attr($pn['br']); ?>" min="0"/></td>
            </tr>
        </tbody>
    </table>

    <h2><?php _e('Current Page Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('background color', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-pc-bgt" type="checkbox" name="posts_pc_bgt" value="1" <?php checked($pc['bgt']); ?>/>
                    <label for="apg-pc-bgt"><?php _e('transparent (disable custom color)', 'arvand-posts'); ?></label>&nbsp;&nbsp;
                    <input id="apg-pc-bg" type="color" name="posts_pc_bg" value="<?php echo esc_attr($pc['bg']); ?>"/>
                    <label for="apg-pc-bg"><?php _e('custom color', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><?php _e('text color', 'arvand-posts'); ?></th>

                <td>
                    <input id="apg-pc-text-color" type="color" name="posts_pc_text_color" value="<?php echo esc_attr($pc['color']); ?>"/>
                </td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field('apg_posts_pagination', 'apg_posts_pagination'); ?>

    <p>
        <input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('save settings', 'arvand-posts'); ?>"/>
        <input class="button" type="submit" name="default_post_pagination" value="<?php esc_attr_e('set as default', 'arvand-posts'); ?>"/>
    </p>
</form>
