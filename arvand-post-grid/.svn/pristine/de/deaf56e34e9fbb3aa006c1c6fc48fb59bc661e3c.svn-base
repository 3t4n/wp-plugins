<?php
$nonce = isset($_POST['apg_posts_card']) and wp_verify_nonce($_POST['apg_posts_card'], 'apg_posts_card');
$change = array();

if (isset($_POST['submit']) and $nonce) {
    $valid_gap_values = array(0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30);

    if (in_array($_POST['post_card_gap'], $valid_gap_values)) {
        $posts_gap = ($_POST['post_card_gap'] == 'none') ? 'none' : intval($_POST['post_card_gap']);
        $change['apg_posts_gap'] = update_option('apg_posts_gap', $posts_gap);
    }

    $bgt = isset($_POST['post_card_bgt']) ? true : false;
    $height = ($_POST['post_card_height'] == 1) ? '100%' : 'auto';

    $posts_card_data = array(
        'bg' => sanitize_hex_color($_POST['post_card_bg']),
        'bgt' => $bgt,
        'height' => $height,
        'pt' => apg_number($_POST['post_card_padding']['pt']),
        'pr' => apg_number($_POST['post_card_padding']['pr']),
        'pb' => apg_number($_POST['post_card_padding']['pb']),
        'pl' => apg_number($_POST['post_card_padding']['pl']),
        'border_top' => apg_number($_POST['post_card_border']['border_top']),
        'border_right' => apg_number($_POST['post_card_border']['border_right']),
        'border_bottom' => apg_number($_POST['post_card_border']['border_bottom']),
        'border_left' => apg_number($_POST['post_card_border']['border_left']),
        'bc' => sanitize_text_field($_POST['post_card_bc']),
        'br' => apg_number($_POST['post_card_br']),
        'x' => intval($_POST['post_card_shadow']['x']),
        'y' => intval($_POST['post_card_shadow']['y']),
        'blur' => apg_number($_POST['post_card_shadow']['blur']),
        'spread' => apg_number($_POST['post_card_shadow']['spread']),
        'color' => sanitize_text_field($_POST['post_card_shadow']['color']),
    );

    $change['apg_post_card'] = update_option('apg_post_card', $posts_card_data);

    $valid_cols_values = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);

    $sm = (in_array($_POST['posts_column']['sm'], $valid_cols_values)) ? intval($_POST['posts_column']['sm']) : '6';
    $md = (in_array($_POST['posts_column']['md'], $valid_cols_values)) ? intval($_POST['posts_column']['md']) : '4';
    $lg = (in_array($_POST['posts_column']['lg'], $valid_cols_values)) ? intval($_POST['posts_column']['lg']) : '3';
    $xl = (in_array($_POST['posts_column']['xl'], $valid_cols_values)) ? intval($_POST['posts_column']['xl']) : '3';

    $cols_array = array('sm' => $sm, 'md' => $md, 'lg' => $lg, 'xl' => $xl);

    $change['apg_posts_column'] = update_option('apg_posts_column', $cols_array);
}

if (isset($_POST['default_post_card']) and $nonce) {
    $change['default_post_card'] = delete_option('apg_posts_column');
    $change['default_post_card'] = delete_option('apg_post_card');
    $change['default_posts_gap'] = delete_option('apg_posts_gap');
}

$card = apg_post_card_options();
$col = apg_post_columns_options();
?>

<?php if ((isset($_POST['submit']) or isset($_POST['default_post_card'])) and !$nonce): ?>
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
    <h2><?php _e('Post Card Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><?php _e('post columns in screens:', 'arvand-posts'); ?></th>
                <td>
                    <label for="apg-column-sm"><?php _e('small', 'arvand-posts'); ?></label>
                    <input id="apg-column-sm" class="small-text" type="number" name="posts_column[sm]" value="<?php echo esc_attr($col['sm']); ?>" min="1" max="12"/>
                    <label for="apg-column-md"><?php _e('medium', 'arvand-posts'); ?></label>
                    <input id="apg-column-md" class="small-text" type="number" name="posts_column[md]" value="<?php echo esc_attr($col['md']); ?>" min="1" max="12"/>
                    <label for="apg-column-lg"><?php _e('large', 'arvand-posts'); ?></label>
                    <input id="apg-column-lg" class="small-text" type="number" name="posts_column[lg]" value="<?php echo esc_attr($col['lg']); ?>" min="1" max="12"/>
                    <label for="apg-column-lx"><?php _e('x-large', 'arvand-posts'); ?></label>
                    <input id="apg-column-lx" class="small-text" type="number" name="posts_column[xl]" value="<?php echo esc_attr($col['xl']); ?>" min="1" max="12"/>
                    <p class="description"><?php _e('occupied columns (1-12)', 'arvand-posts'); ?></p>
                </td>
            </tr>

            <tr>
                <th><label for="apg-card-gap"><?php _e('post card gap', 'arvand-posts'); ?></label></th>
                <td>
                    <select id="apg-card-gap" type="text" name="post_card_gap">
                        <?php
                        $gap = apg_posts_gap_options();
                        $val = array('none', 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30);
                        ?>

                        <option value="none" <?php selected($gap, $val[0]); ?>>none</option>
                        <option value="2" <?php selected($gap, $val[1]); ?>>2</option>
                        <option value="4" <?php selected($gap, $val[2]); ?>>4</option>
                        <option value="6" <?php selected($gap, $val[3]); ?>>6</option>
                        <option value="8" <?php selected($gap, $val[4]); ?>>8</option>
                        <option value="10" <?php selected($gap, $val[5]); ?>>10</option>
                        <option value="12" <?php selected($gap, $val[6]); ?>>12</option>
                        <option value="14" <?php selected($gap, $val[7]); ?>>14</option>
                        <option value="16" <?php selected($gap, $val[8]); ?>>16</option>
                        <option value="18" <?php selected($gap, $val[9]); ?>>18</option>
                        <option value="20" <?php selected($gap, $val[10]); ?>>20</option>
                        <option value="22" <?php selected($gap, $val[11]); ?>>22</option>
                        <option value="24" <?php selected($gap, $val[12]); ?>>24</option>
                        <option value="26" <?php selected($gap, $val[13]); ?>>26</option>
                        <option value="28" <?php selected($gap, $val[14]); ?>>28</option>
                        <option value="30" <?php selected($gap, $val[15]); ?>>30</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('background color', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-card-bgt" type="checkbox" name="post_card_bgt" value="1" <?php checked($card['bgt']); ?>/>
                    <label for="apg-card-bgt"><?php _e('transparent (disable custom color)', 'arvand-posts'); ?></label>&nbsp;&nbsp;
                    <input id="apg-card-bg" type="color" name="post_card_bg" value="<?php echo esc_attr($card['bg']); ?>"/>
                    <label for="apg-card-bg"><?php _e('custom color', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('height', 'arvand-posts'); ?></label></th>
                <td>
                    <fieldset>
                        <label>
                            <input id="apg-card-equal-height" type="radio" name="post_card_height" value="1" <?php checked($card['height'], '100%'); ?>/>
                            <label for="apg-card-equal-height"><?php _e('equal','arvand-posts'); ?></label><br/>
                            <input id="apg-card-auto-height" type="radio" name="post_card_height" value="2" <?php checked($card['height'], 'auto') ?>/>
                            <label for="apg-card-auto-height"><?php _e('auto','arvand-posts'); ?></label>
                        </label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('padding', 'arvand-posts'); ?></label></th>
                <td>
                    <label><?php _e('top', 'arvand-posts'); ?></label>
                    <input id="apg-card-padding-top" class="small-text" type="number" name="post_card_padding[pt]" value="<?php echo esc_attr($card['pt']); ?>" min="0"/>
                    <label><?php _e('right', 'arvand-posts'); ?></label>
                    <input id="apg-card-padding-right" class="small-text" type="number" name="post_card_padding[pr]" value="<?php echo esc_attr($card['pr']); ?>" min="0"/>
                    <label><?php _e('bottom', 'arvand-posts'); ?></label>
                    <input id="apg-card-padding-bottom" class="small-text" type="number" name="post_card_padding[pb]" value="<?php echo esc_attr($card['pb']); ?>" min="0"/>
                    <label><?php _e('left', 'arvand-posts'); ?></label>
                    <input id="apg-card-padding-left" class="small-text" type="number" name="post_card_padding[pl]" value="<?php echo esc_attr($card['pl']); ?>" min="0"/>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('border', 'arvand-posts'); ?></label></th>
                <td>
                    <label for="apg-card-border-top"><?php _e('top', 'arvand-posts'); ?></label>
                    <input id="apg-card-border-top" class="small-text" type="number" name="post_card_border[border_top]" value="<?php echo esc_attr($card['border_top']); ?>" min="0"/>
                    <label for="apg-card-border-right"><?php _e('right', 'arvand-posts'); ?></label>
                    <input id="apg-card-border-right" class="small-text" type="number" name="post_card_border[border_right]" value="<?php echo esc_attr($card['border_right']); ?>" min="0"/>
                    <label for="apg-card-border-bottom"><?php _e('bottom', 'arvand-posts'); ?></label>
                    <input id="apg-card-border-bottom" class="small-text" type="number" name="post_card_border[border_bottom]" value="<?php echo esc_attr($card['border_bottom']); ?>" min="0"/>
                    <label for="apg-card-border-left"><?php _e('left', 'arvand-posts'); ?></label>
                    <input id="apg-card-border-left" class="small-text" type="number" name="post_card_border[border_left]" value="<?php echo esc_attr($card['border_left']); ?>" min="0"/>
                    <label for="apg-card-border-color"><?php _e('border color','arvand-posts'); ?></label>
                    <input id="apg-card-border-color" type="color" name="post_card_bc" value="<?php echo esc_attr($card['bc']); ?>"/>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('border radius','arvand-posts'); ?></label></th>
                <td>
                    <input class="small-text" type="number" name="post_card_br" value="<?php echo esc_attr($card['br']); ?>" min="0"/>
                </td>
            </tr>

            <tr>
                <th><?php _e('shadow', 'arvand-posts'); ?></th>
                <td>
                    <label for="apg-card-shadow-x"><?php _e('shadow-x','arvand-posts'); ?></label>
                    <input id="apg-card-shadow-x" class="small-text" type="number" name="post_card_shadow[x]" value="<?php echo esc_attr($card['x']); ?>"/>
                    <label for="apg-card-shadow-y"><?php _e('shadow-y','arvand-posts'); ?></label>
                    <input id="apg-card-shadow-y" class="small-text" type="number" name="post_card_shadow[y]" value="<?php echo esc_attr($card['y']);?>"/>
                    <label for="apg-card-shadow-blur"><?php _e('blur','arvand-posts'); ?></label>
                    <input id="apg-card-shadow-blur" class="small-text" type="number" name="post_card_shadow[blur]" value="<?php echo esc_attr($card['blur']); ?>" min="0"/>
                    <label for="apg-card-shadow-spread"><?php _e('spread','arvand-posts'); ?></label>
                    <input id="apg-card-shadow-spread" class="small-text" type="number" name="post_card_shadow[spread]" value="<?php echo esc_attr($card['spread']); ?>" min="0"/>
                    <label for="apg-card-shadow-color"><?php _e('color','arvand-posts'); ?></label>
                    <input id="apg-card-shadow-color" type="color" name="post_card_shadow[color]" value="<?php echo esc_attr($card['color']); ?>"/>
                </td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field('apg_posts_card', 'apg_posts_card'); ?>

    <p>
        <input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('save settings', 'arvand-posts'); ?>"/>
        <input class="button" type="submit" name="default_post_card" value="<?php esc_attr_e('set as default', 'arvand-posts'); ?>"/>
    </p>
</form>