<?php
$nonce = isset($_POST['apg_posts_general']) and wp_verify_nonce($_POST['apg_posts_general'], 'apg_posts_general');

$post_types = get_post_types(['public' => true], 'names');

if (isset($_POST['submit']) and $nonce) {
    $post_type_array = array();

    foreach ($_POST['posts_post_type'] as $post_type) {
        if (in_array($post_type, $post_types)) {
            $post_type_array[] = sanitize_text_field($post_type);
        }
    }

    $general_data = array(
        'post_type' => $post_type_array,
        'posts_num' => apg_number($_POST['posts_per_page']),
    );

    $change = update_option('apg_post_general', $general_data);
}

if (isset($_POST['default_general']) and $nonce) {
    $change = delete_option('apg_post_general');
}

$general = apg_general_options();
?>

<?php if ((isset($_POST['submit']) or isset($_POST['default_general'])) and !$nonce): ?>
    <div class="notice error is-dismissible">
        <p><strong><?php _e('invalid request.', 'wp-apg-posts'); ?></strong></p>
    </div>
<?php endif; ?>

<?php if (isset($change) and $change): ?>
    <div class="notice updated is-dismissible">
        <p><strong><?php _e('settings saved.', 'wp-apg-posts'); ?></strong></p>
    </div>
<?php endif; ?>

<div class="wrap">
    <h1><?php _e('General Settings','wp-apg-posts'); ?></h1>

    <form action="" method="post">
        <table class="form-table" style="border-bottom: 1px solid #cccccc;">
            <tbody>
                <tr>
                    <th><label for="posts-post-type"><?php _e('post type', 'wp-apg-posts'); ?></label></th>
                    <td>
                        <select id="posts-post-type" name="posts_post_type[]" multiple>
                            <?php foreach ($post_types as $post_type): ?>
                                <option value="<?php esc_attr_e($post_type); ?>"
                                    <?php
                                        if (is_array($general['post_type'])) {
                                            for ($i = 0; $i < count($general['post_type']); $i++) {
                                                selected($general['post_type'][$i], $post_type);
                                            }
                                        } else {
                                            selected($general['post_type'], $post_type);
                                        }
                                    ?>>

                                    <?php esc_html_e($post_type); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th><label for="posts-per-page"><?php _e('number of posts per page', 'wp-apg-posts'); ?></label></th>

                    <td>
                        <input id="posts-per-page" class="small-text" type="number" name="posts_per_page" value="<?php esc_attr_e($general['posts_num']); ?>" min="1"/>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php wp_nonce_field('apg_posts_general', 'apg_posts_general'); ?>

        <p>
            <input class="button-primary" type="submit" name="submit" value="<?php _e('save settings', 'wp-apg-posts'); ?>"/>
            <input class="button" type="submit" name="default_general" value="<?php _e('set as default', 'wp-apg-posts'); ?>"/>
        </p>
    </form>
</div>