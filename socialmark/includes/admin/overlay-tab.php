<?php
defined('ABSPATH') || exit();
if (isset($_POST['socialmark_overlay_nonce'])
    && wp_verify_nonce($_POST['socialmark_overlay_nonce'], 'socialmark_overlay_nonce')
) {
    if ($_POST['sm_overlay_image_name'] !== "" && $_POST['sm_overlay_image'] !== "") {
        $socialmark_image = sanitize_text_field($_POST['sm_overlay_image']);
        $socialmark_name = sanitize_text_field($_POST['sm_overlay_image_name']);
        $overlay_add_ok = $wpdb->query(
            $wpdb->prepare("INSERT INTO {$wpdb->prefix}sm_images (name, image_link ) VALUES (%s, %s)",
                array(
                    $socialmark_name,
                    $socialmark_image,
                )
            )
        );
        if ($overlay_add_ok) {
            $socialmark_ov_error = "Image successfully inserted.";
            $socialmark_ov_msg_type = "success";
        } else {
            $socialmark_ov_error = $wpdb->last_error;
            $socialmark_ov_msg_type = "error";
        }
    } else {
        $socialmark_ov_error = "please enter all required fields!";
        $socialmark_ov_msg_type = "error";
    }
    $socialmark_images = $wpdb->get_results("SELECT id, name, image_link FROM {$wpdb->prefix}sm_images order by id desc", ARRAY_A);
}
?>
<div class="sm-overlay-add-notice">
    <?php
    if ($socialmark_ov_error !== "") {
        if ($socialmark_ov_msg_type === "success") {
            ?>
            <div class="notice notice-success is-dismissible"><p><?php echo $socialmark_ov_error; ?></p>
            </div>
            <?php

        } else if ($socialmark_ov_msg_type === "error") {
            ?>
            <div class="notice notice-error is-dismissible"><p><?php echo $socialmark_ov_error; ?></p>
            </div>
            <?php
        }
    }
    ?>

</div>
<form method="post">
    <?php
    wp_nonce_field('socialmark_overlay_nonce', 'socialmark_overlay_nonce');
    ?>
    <table class="form-table" role="presentation">
        <tbody>
        <tr>
            <th scope="row"><?php _e('Name'); ?>*</th>
            <td>
                <input name="sm_overlay_image_name" type="text" id="sm_overlay_image_name" value=""
                       class="regular-text" required></a>
            </td>
        </tr>
        <tr>
            <th scope="row"><?php _e('Add New Watermark Image'); ?>*</th>
            <td>
                <input name="sm_overlay_image" type="text" id="sm_overlay_image" value=""
                       class="regular-text" required><a href="#"
                                                        class="socialmark_overlay_image_button button button-secondary"><?php _e('Add/Upload Image'); ?></a>
            </td>
        </tr>
        </tbody>
    </table>

    <p class="submit"><input type="submit" name="submit" id="submit"
                             class="button button-primary socialmark_overlay_add_button"
                             value="<?php _e('Add Overlay/Watermark'); ?>"></p>

</form>

<table class="wp-list-table fixed widefat striped table-view-list">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Remove</th>
    </tr>
    </thead>
    <tbody class="overlay-image-table">
    <?php
    foreach ($socialmark_images as $ov_row) {
        ?>
        <tr id="smov_<?php echo esc_attr($ov_row['id']); ?>">
            <td><?php echo esc_attr($ov_row['name']); ?></td>
            <td><img style="max-width: 100%; max-height: 200px"
                     src="<?php echo esc_attr($ov_row['image_link']); ?>"></td>
            <td>
                <button class="button" onclick="smov_remove(<?php echo esc_attr($ov_row['id']); ?>)">Remove
                </button>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
