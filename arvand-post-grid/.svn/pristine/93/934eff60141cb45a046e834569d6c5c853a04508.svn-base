<?php
$nonce = isset($_POST['apg_posts_header']) and wp_verify_nonce($_POST['apg_posts_header'], 'apg_posts_header');

if (isset($_POST['submit']) and $nonce) {
    $bgt = isset($_POST['post_header_bgt']) ? true : false;

    $post_header_data = array(
        'bgt' => $bgt,
        'bg' => sanitize_hex_color($_POST['post_header_bg']),
        'pt' => apg_number($_POST['post_header_padding']['pt']),
        'pr' => apg_number($_POST['post_header_padding']['pr']),
        'pb' => apg_number($_POST['post_header_padding']['pb']),
        'pl' => apg_number($_POST['post_header_padding']['pl']),
    );

    $change = update_option('apg_post_header', $post_header_data);
}

if (isset($_POST['default_post_header']) and $nonce) {
    $change = delete_option('apg_post_header');
}

$header = apg_post_header_options();
?>

<?php if ((isset($_POST['submit']) or isset($_POST['default_post_header'])) and !$nonce): ?>
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
    <h2><?php _e('Post Header Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><?php _e('background color', 'arvand-posts'); ?></th>
                <td>
                    <input id="apg-header-bgt" type="checkbox" name="post_header_bgt" value="1" <?php checked($header['bgt']); ?>/>
                    <label for="apg-header-bgt"><?php _e('transparent (disable custom color)', 'arvand-posts'); ?></label>&nbsp;&nbsp;
                    <input id="apg-header-bg" type="color" name="post_header_bg" value="<?php echo esc_attr($header['bg']); ?>"/>
                    <label for="apg-header-bg"><?php _e('custom color', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><?php _e('padding', 'arvand-posts'); ?></th>
                <td>
                    <label><?php _e('top', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_header_padding[pt]" value="<?php echo esc_attr($header['pt']); ?>" min="0"/>
                    <label><?php _e('right', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_header_padding[pr]" value="<?php echo esc_attr($header['pr']); ?>" min="0"/>
                    <label><?php _e('bottom', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_header_padding[pb]" value="<?php echo esc_attr($header['pb']); ?>" min="0"/>
                    <label><?php _e('left', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_header_padding[pl]" value="<?php echo esc_attr($header['pl']); ?>" min="0"/>
                </td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field('apg_posts_header', 'apg_posts_header'); ?>

    <p>
        <input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('save settings', 'arvand-posts'); ?>"/>
        <input class="button" type="submit" name="default_post_header" value="<?php esc_attr_e('set as default', 'arvand-posts'); ?>"/>
    </p>
</form>