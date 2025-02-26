<?php
$nonce = isset($_POST['apg_posts_wrap']) and wp_verify_nonce($_POST['apg_posts_wrap'], 'apg_posts_wrap');

if (isset($_POST['submit']) and $nonce) {
    $bgt = isset($_POST['posts_wrap_bgt']) ? true : false;

    $posts_wrap_data = array(
        'bgt' => $bgt,
        'bg' => sanitize_hex_color($_POST['posts_wrap_bg']),
        'pt' => apg_number($_POST['posts_wrap_padding']['pt']),
        'pr' => apg_number($_POST['posts_wrap_padding']['pr']),
        'pb' => apg_number($_POST['posts_wrap_padding']['pb']),
        'pl' => apg_number($_POST['posts_wrap_padding']['pl']),
    );

    $change = update_option('apg_post_wrap', $posts_wrap_data);
}

if (isset($_POST['default_post_wrap']) and $nonce) {
    $change = delete_option('apg_post_wrap');
}

$wrap = apg_wrap_options();
?>

<?php if ((isset($_POST['submit']) or isset($_POST['default_post_wrap'])) and !$nonce): ?>
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
    <h2><?php _e('Posts Wrap Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('background color', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-wrap-bgt" type="checkbox" name="posts_wrap_bgt" value="1" <?php checked($wrap['bgt']); ?>/>
                    <label for="apg-wrap-bgt"><?php _e('transparent (disable custom color)', 'arvand-posts'); ?></label>&nbsp;&nbsp;
                    <input id="apg-wrap-bg" type="color" name="posts_wrap_bg" value="<?php echo esc_attr($wrap['bg']); ?>"/>
                    <label for="apg-wrap-bg"><?php _e('custom color', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('padding', 'arvand-posts'); ?></label></th>
                <td>
                    <label><?php _e('top', 'arvand-posts'); ?></label>
                    <input id="apg-wrap-padding-top" class="small-text" type="number" name="posts_wrap_padding[pt]" value="<?php echo esc_attr($wrap['pt']); ?>" min="0"/>
                    <label><?php _e('right', 'arvand-posts'); ?></label>
                    <input id="apg-wrap-padding-right" class="small-text" type="number" name="posts_wrap_padding[pr]" value="<?php echo esc_attr($wrap['pr']); ?>" min="0"/>
                    <label><?php _e('bottom', 'arvand-posts'); ?></label>
                    <input id="apg-wrap-padding-bottom" class="small-text" type="number" name="posts_wrap_padding[pb]" value="<?php echo esc_attr($wrap['pb']); ?>" min="0"/>
                    <label><?php _e('left', 'arvand-posts'); ?></label>
                    <input id="apg-wrap-padding-left" class="small-text" type="number" name="posts_wrap_padding[pl]" value="<?php echo esc_attr($wrap['pl']); ?>" min="0"/>
                </td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field('apg_posts_wrap', 'apg_posts_wrap'); ?>

    <p>
        <input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('save settings', 'arvand-posts'); ?>"/>
        <input class="button" type="submit" name="default_post_wrap" value="<?php esc_attr_e('set as default', 'arvand-posts'); ?>"/>
    </p>
</form>