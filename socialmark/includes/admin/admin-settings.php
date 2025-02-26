<?php
defined('ABSPATH') || exit();
$socialmark_option_save_message = "";
if (isset($_POST['socialmark_option_save_nonce'])
    && wp_verify_nonce($_POST['socialmark_option_save_nonce'], 'socialmark_option_save_nonce')
) {

    update_option('default_socialmark_overlay', sanitize_text_field($_POST['default_socialmark_overlay']));

    update_option('default_socialmark_position', sanitize_text_field($_POST['default_socialmark_position']));
    if (array_key_exists('disable_socialmark', $_POST)) {
        update_option('disable_socialmark', sanitize_text_field($_POST['disable_socialmark']));
    } else {
        update_option('disable_socialmark', "");
    }
    if (array_key_exists('disable_socialmark_posts', $_POST)) {
        update_option('disable_socialmark_posts', sanitize_text_field($_POST['disable_socialmark_posts']));
    } else {
        update_option('disable_socialmark_posts', "");
    }
    if (array_key_exists('disable_socialmark_pages', $_POST)) {
        update_option('disable_socialmark_pages', sanitize_text_field($_POST['disable_socialmark_pages']));
    } else {
        update_option('disable_socialmark_pages', "");
    }
    if (array_key_exists('delete_socialmark_data', $_POST)) {
        update_option('delete_socialmark_data', sanitize_text_field($_POST['delete_socialmark_data']));
    } else {
        update_option('delete_socialmark_data', "");
    }
    if (array_key_exists('disable_socialmark_force', $_POST)) {
        update_option('disable_socialmark_force', sanitize_text_field($_POST['disable_socialmark_force']));
    } else {
        update_option('disable_socialmark_force', "");
    }

    global $wpdb;
    $socialmark_meta_key="socialmark_og_image_url";
    $wpdb->update(
        $wpdb->prefix.'postmeta',
        array(
            'meta_value' => ''
        ),
        array(
            'meta_key' => $socialmark_meta_key
        )
    );
    $socialmark_files = glob(SOCIALMARK_UPLOAD.'/*'); // get all file names
    foreach($socialmark_files as $socialmark_file){ // iterate files
        if(is_file($socialmark_file)) {
           unlink($socialmark_file); // delete file
        }
    }

    $socialmark_option_save_message = '<div class="notice notice-success is-dismissible"><p>Settings has been updated.</p></div>';
}
?>
<div class="sm-overlay-option-notice">
    <?php
    echo $socialmark_option_save_message;
    ?>
</div>
<form action="#" method="post">
    <?php
    wp_nonce_field('socialmark_option_save_nonce', 'socialmark_option_save_nonce');
    $default_sm_overlay = get_option('default_socialmark_overlay');
    $socialmark_admin_position = get_option('default_socialmark_position');
    $disable_socialmark = get_option('disable_socialmark');
    $disable_socialmark_posts = get_option('disable_socialmark_posts');
    $disable_socialmark_pages = get_option('disable_socialmark_pages');
    $delete_socialmark_data = get_option('delete_socialmark_data');
    $disable_socialmark_force = get_option('disable_socialmark_force');

    ?>
    <table class="form-table" role="presentation">
        <tbody>
        <tr>
            <th scope="row"><?php _e('Disable SocialMark'); ?></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text">
                        <span><?php _e('Disable SocialMark'); ?></span></legend>
                    <label for="disable_socialmark">
                        <input name="disable_socialmark" type="checkbox"
                               id="disable_socialmark" <?php echo $disable_socialmark === "on" ? "checked" : ""; ?>>
                        <?php _e('Disable for all post types'); ?></label>
                </fieldset>
            </td>
        </tr>
        <tr>
            <th scope="row"><?php _e('Disable for Posts'); ?></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text">
                        <span><?php _e('Disable for Posts'); ?></span></legend>
                    <label for="disable_socialmark_posts">
                        <input name="disable_socialmark_posts" type="checkbox"
                               id="disable_socialmark_posts" <?php echo $disable_socialmark_posts === "on" ? "checked" : ""; ?>>
                        <?php _e('Disable for all posts'); ?></label>
                </fieldset>
            </td>
        </tr>
        <tr>
            <th scope="row"><?php _e('Disable for Pages'); ?></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text">
                        <span><?php _e('Disable for Pages'); ?></span></legend>
                    <label for="disable_socialmark_pages">
                        <input name="disable_socialmark_pages" type="checkbox"
                               id="disable_socialmark_pages" <?php echo $disable_socialmark_pages === "on" ? "checked" : ""; ?>>
                        <?php _e('Disable for all pages'); ?></label>
                </fieldset>
            </td>
        </tr>
        <tr>
            <th scope="row"><label
                        for="default_socialmark_overlay"><?php _e('Default Overlay/Watermark Image'); ?>
                    *</label>
            </th>
            <td><select name="default_socialmark_overlay" id="default_socialmark_overlay">
                    <?php
                    foreach ($socialmark_images as $ov_row) {
                        ?>
                        <option <?php if ($default_sm_overlay === $ov_row['id']) {
                            echo "selected";
                        } ?> value="<?php echo esc_attr($ov_row['id']); ?>"><?php echo esc_attr($ov_row['name']); ?></option>
                        <?php
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <th scope="row"><label
                        for="default_socialmark_position"><?php _e('Default Overlay/Watermark Position'); ?>
                    *</label>
            </th>
            <td><select name="default_socialmark_position" id="default_socialmark_position">
                    <option <?php if ($socialmark_admin_position === "5") {
                        echo "selected";
                    } ?> value="5"><?php _e('Center'); ?></option>
                    <option <?php if ($socialmark_admin_position === "9") {
                        echo "selected";
                    } ?> value="9"><?php _e('Center-Bottom'); ?></option>
                </select></td>
        </tr>
        <tr>
            <th scope="row"><?php _e('Disable SocialMark og:url Force Replace'); ?></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text">
                        <span><?php _e('Disable SocialMark og:url Force Replace (if your website design broke)'); ?></span></legend>
                    <label for="disable_socialmark_force">
                        <input name="disable_socialmark_force" type="checkbox"
                               id="disable_socialmark_force" <?php echo $disable_socialmark_force === "on" ? "checked" : ""; ?>>
                        <?php _e('Disable SocialMark og:url Force Replace (if your website design broke)'); ?></label>
                </fieldset>
            </td>
        </tr>
        <tr>
            <th scope="row"><?php _e('Remove all SocialMark generated data on deleting the plugin'); ?></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text">
                        <span><?php _e('Remove Data on Delete Plugin'); ?></span></legend>
                    <label for="delete_socialmark_data">
                        <input name="delete_socialmark_data" type="checkbox"
                               id="delete_socialmark_data" <?php echo $delete_socialmark_data === "on" ? "checked" : ""; ?>>
                        <?php _e('Remove Data on Delete Plugin'); ?></label>
                </fieldset>
            </td>
        </tr>
        </tbody>
    </table>
    <?php
    if(empty($socialmark_images)){
        ?>
        <p>
            <h3><span style="color:red"><?php _e('Please');?> <a href="?page=socialmark&tab=overlay-images"><?php _e('Add Overlay');?></a> <?php _e('Before You Start.');?></span></h3>
        </p>
    <?php
    }else {
        ?>
        <p class="submit"><input type="submit" name="submit" id="submit"
                                 class="button button-primary socialmark_option_save_button"
                                 value="Save Changes"><br /><small><?php _e('Save changes will refresh all existing images based on new settings'); ?></small></p>
        <?php
    }
    ?>
</form>