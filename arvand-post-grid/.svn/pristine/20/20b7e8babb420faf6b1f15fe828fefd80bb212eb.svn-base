<?php
$nonce = isset($_POST['apg_posts_avatar']) and wp_verify_nonce($_POST['apg_posts_avatar'], 'apg_posts_avatar');

if (isset($_POST['submit']) and $nonce) {
    $display = isset($_POST['post_avatar_display']) ? true : false;
    $valid_avatar_align_value = array('left', 'center', 'right');

    if (in_array($_POST['post_avatar_align'], $valid_avatar_align_value)) {
        $align_value = sanitize_text_field($_POST['post_avatar_align']);
    } else {
        $align_value = 'left';
    }

    $post_avatar_data = array(
        'display' => $display,
        'size' => apg_number($_POST['post_avatar_size']),
        'mt' => intval($_POST['post_avatar_margin']['mt']),
        'mr' => intval($_POST['post_avatar_margin']['mr']),
        'mb' => intval($_POST['post_avatar_margin']['mb']),
        'ml' => intval($_POST['post_avatar_margin']['ml']),
        'align' => $align_value,
        'br' => apg_number($_POST['post_avatar_br']),
    );

    $change = update_option('apg_post_avatar', $post_avatar_data);
}

if (isset($_POST['default_post_avatar']) and $nonce) {
    $change = delete_option('apg_post_avatar');
}

$avatar = apg_avatar_options();
?>

<?php if ((isset($_POST['submit']) or isset($_POST['default_post_avatar'])) and !$nonce): ?>
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
                <th><label><?php _e('post avatar display','arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-avatar-display" type="checkbox" name="post_avatar_display" value="1" <?php checked($avatar['display']); ?>/>
                    <label for="apg-avatar-display"><?php _e('display', 'arvand-posts'); ?></label>
                </td>
            </tr>
        </tbody>
    </table>

    <h2><?php _e('Post Avatar Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label for="post_avatar_margin"><?php _e('margin', 'arvand-posts'); ?></label></th>
                <td>
                    <label><?php _e('top', 'arvand-posts'); ?></label>
                    <input id="apg-avatar-mt" class="small-text" type="number" name="post_avatar_margin[mt]" value="<?php echo esc_attr($avatar['mt']); ?>"/>
                    <label><?php _e('right', 'arvand-posts'); ?></label>
                    <input id="apg-avatar-mr" class="small-text" type="number" name="post_avatar_margin[mr]" value="<?php echo esc_attr($avatar['mr']); ?>"/>
                    <label><?php _e('bottom', 'arvand-posts'); ?></label>
                    <input id="apg-avatar-mb" class="small-text" type="number" name="post_avatar_margin[mb]" value="<?php echo esc_attr($avatar['mb']); ?>"/>
                    <label><?php _e('left', 'arvand-posts'); ?></label>
                    <input id="apg-avatar-ml" class="small-text" type="number" name="post_avatar_margin[ml]" value="<?php echo esc_attr($avatar['ml']); ?>"/>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('align', 'arvand-posts'); ?></label></th>
                <td>
                    <fieldset>
                        <label>
                            <input id="apg-avatar-align-left" type="radio" name="post_avatar_align" value="left" <?php echo ($avatar['align'] == 'left') ? 'checked' : ''; ?>/>
                            <label for="apg-avatar-align-left"><?php _e('left', 'arvand-posts'); ?></label><br/>
                            <input id="apg-avatar-align-center" type="radio" name="post_avatar_align" value="center" <?php echo ($avatar['align'] == 'center') ? 'checked' : ''; ?>/>
                            <label for="apg-avatar-align-center"><?php _e('center', 'arvand-posts'); ?></label><br/>
                            <input id="apg-avatar-align-right" type="radio" name="post_avatar_align" value="right" <?php echo ($avatar['align'] == 'right') ? 'checked' : ''; ?>/>
                            <label for="apg-avatar-align-right"><?php _e('right', 'arvand-posts'); ?></label>
                        </label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th><?php _e('border radius', 'arvand-posts')?></th>
                <td>
                    <input id="apg-avatar-br" class="small-text" type="number" name="post_avatar_br" value="<?php echo esc_attr($avatar['br']); ?>" min="0"/>
                </td>
            </tr>

            <tr>
                <th><?php _e('avatar size', 'arvand-posts')?></th>
                <td>
                    <input id="apg-avatar-size" class="small-text" type="number" name="post_avatar_size" value="<?php echo esc_attr($avatar['size']); ?>" min="0"/>
                </td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field('apg_posts_avatar', 'apg_posts_avatar'); ?>

    <p>
        <input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('save settings', 'arvand-posts'); ?>"/>
        <input class="button" type="submit" name="default_post_avatar" value="<?php esc_attr_e('set as default', 'arvand-posts'); ?>"/>
    </p>
</form>