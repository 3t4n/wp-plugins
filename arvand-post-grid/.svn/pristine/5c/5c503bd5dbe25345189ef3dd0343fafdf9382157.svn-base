<?php
$nonce = isset($_POST['apg_posts_content']) and wp_verify_nonce($_POST['apg_posts_content'], 'apg_posts_content');

if (isset($_POST['submit']) and $nonce) {
    $bgt = (isset($_POST['post_content_bgt'])) ? true : false;

    $post_content_data = array(
        'bgt'=> $bgt,
        'bg' => sanitize_hex_color($_POST['post_content_bg']),
        'pt' => apg_number($_POST['post_content_padding']['pt']),
        'pr' => apg_number($_POST['post_content_padding']['pr']),
        'pb' => apg_number($_POST['post_content_padding']['pb']),
        'pl' => apg_number($_POST['post_content_padding']['pl']),
        'cat_order' => apg_number($_POST['post_cat_order']),
        'title_order' => apg_number($_POST['post_title_order']),
        'exc_order' => apg_number($_POST['post_excerpt_order']),
        'more_order' => apg_number($_POST['post_read_more_order']),
    );

    $change = update_option('apg_post_content', $post_content_data);
}

if (isset($_POST['default_post_content']) and $nonce) {
    $change = delete_option('apg_post_content');
}

$content = apg_post_content_options();
?>

<?php if ((isset($_POST['submit']) or isset($_POST['default_post_content'])) and !$nonce): ?>
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
    <h2><?php _e('Post Content Styles','arvand-posts'); ?></h2>

    <table class="form-table" style="border-bottom: 1px solid #cccccc;">
        <tbody>
            <tr>
                <th><label><?php _e('background color', 'arvand-posts'); ?></label></th>
                <td>
                    <input id="apg-content-bgt" type="checkbox" name="post_content_bgt" value="1" <?php checked($content['bgt']); ?>/>
                    <label for="apg-content-bgt"><?php _e('transparent (disable custom color)', 'arvand-posts'); ?></label>&nbsp;&nbsp;
                    <input id="apg-content-bg" type="color" name="post_content_bg" value="<?php echo esc_attr($content['bg']); ?>"/>
                    <label for="apg-content-bg"><?php _e('custom color', 'arvand-posts'); ?></label>
                </td>
            </tr>

            <tr>
                <th><?php _e('padding', 'arvand-posts'); ?></th>
                <td>
                    <label><?php _e('top', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_content_padding[pt]" value="<?php echo esc_attr($content['pt']); ?>" min="0"/>
                    <label><?php _e('right', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_content_padding[pr]" value="<?php echo esc_attr($content['pr']) ;?>" min="0"/>
                    <label><?php _e('bottom', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_content_padding[pb]" value="<?php echo esc_attr($content['pb']); ?>" min="0"/>
                    <label><?php _e('left', 'arvand-posts'); ?></label>
                    <input class="small-text" type="number" name="post_content_padding[pl]" value="<?php echo esc_attr($content['pl']); ?>" min="0"/>
                </td>
            </tr>

            <tr>
                <th><label><?php _e('content elements order', 'arvand-posts'); ?></label></th>
                <td>
                    <label for="apg-cat-order"><?php _e('category', 'arvand-posts'); ?></label>
                    <input id="apg-cat-order" class="small-text" type="number" name="post_cat_order" value="<?php echo esc_attr($content['cat_order']); ?>" min="1" max="4"/>
                    <label for="apg-title-order"><?php _e('title', 'arvand-posts'); ?></label>
                    <input id="apg-title-order" class="small-text" type="number" name="post_title_order" value="<?php echo esc_attr($content['title_order']); ?>" min="1" max="4"/>
                    <label for="apg-excerpt-order"><?php _e('excerpt', 'arvand-posts'); ?></label>
                    <input id="apg-excerpt-order" class="small-text" type="number" name="post_excerpt_order" value="<?php echo esc_attr($content['exc_order']); ?>" min="1" max="4"/>
                    <label for="apg-read-more-order"><?php _e('read more', 'arvand-posts'); ?></label>
                    <input id="apg-read-more-order" class="small-text" type="number" name="post_read_more_order" value="<?php echo esc_attr($content['more_order']); ?>" min="1" max="4"/>
                </td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field('apg_posts_content', 'apg_posts_content'); ?>

    <p>
        <input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('save settings', 'arvand-posts'); ?>"/>
        <input class="button" type="submit" name="default_post_content" value="<?php esc_attr_e('set as default', 'arvand-posts'); ?>"/>
    </p>
</form>