<div class="cjs_plugin_body">
    <h2><?php echo get_admin_page_title(); ?></h2>

    <div id="cjs-save-message" style="display: none;">
        <?php _e("Image Saved Successfully","cheeko-slider"); ?>
    </div>

    <div class="cjs_image_upload">
        <form method="post" action="" name="Upload_image">
            <table width="100%" border="0" cellspacing="16" cellpadding="2">
                <tr>
                    <td width="20%" class="cjs_label">
                        <strong><?php _e("Upload an Image","cheeko-slider"); ?></strong>
                    </td>
                    <td width="60%">
                        <input type="text" name="cjs_image_url" id="cjs_image_url">
                    </td>
                    <td width="10%">
                        <input type="button" id="cjs_button" value="<?php _e('Upload an Image','cheeko-slider'); ?>">
                    </td>
                    <td width="10%">
                        <input type="button" id="cjs_save_images" value="<?php _e('Save Image','cheeko-slider'); ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <?php
                            $cheeko_slider_options = get_option('cheeko_slider_options');
                        ?>
                        <strong><?php _e("Note:","cheeko-slider"); ?></strong> <?php _e("Please upload images","cheeko-slider"); ?> <?php echo $cheeko_slider_options['cjs_width']; ?> x <?php echo $cheeko_slider_options['cjs_height']; ?> <?php _e("or go to settings and change the dimenssions.","cheeko-slider"); ?>
                    </td>
                </tr>
            </table>
        </form>

        <p id="cjs_success_msg"><?php _e("Image Saved","cheeko-slider"); ?></p>
    </div>

    <h3><?php _e("View Images","cheeko-slider"); ?></h3>
    <div class="cjs-img-list">

        <table class="image-sort" cellspacing="0" id="image-sort" style="width:99%;">
            <thead>
                <tr>
                    <th scope="col" class="column-slug"><?php _e("Image","cheeko-slider"); ?></th>
                    <th scope="col"><?php _e("Image Links To","cheeko-slider"); ?></th>
                    <th scope="col"><?php _e("Description","cheeko-slider") ?></th>
                    <th scope="col"><?php _e("Title","cheeko-slider"); ?></th>
                    <th scope="col" class="column-slug"><?php _e("Actions","cheeko-slider"); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php
                global $wpdb;
                $result = $wpdb->get_results("SELECT * FROM wp_cjs_images");
                foreach ($result as $row) {
            ?>
                    <tr id="list_item">
                        <td width="12%">
                            <img src="<?php echo esc_url($row->cjs_img_path); ?>" width="100" height="auto">
                        </td>
                        <td width="22%">
                            <input type="text" class="cjs_img_link" value="<?php echo esc_url_raw($row->cjs_img_link); ?>" size="30">
                        </td>
                        <td width="26%">
                            <textarea rows="3" class="cjs_img_description"><?php echo esc_textarea(stripslashes($row->cjs_img_description)); ?></textarea>
                        </td>
                        <td width="22%">
                            <input type="text" class="cjs_img_title" value="<?php echo sanitize_text_field(stripslashes($row->cjs_img_title)); ?>" size="30">
                        </td>
                        <td width="20%">
                            <input type="button" data-id-update="<?php echo $row->cjs_img_id; ?>" class="cjs-update-image" value="<?php _e('Update','cheeko-slider'); ?>">
                            <input type="button" data-id="<?php echo $row->cjs_img_id; ?>" class="cjs-delete-image" value="<?php _e('Delete','cheeko-slider'); ?>">
                        </td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table>

        <div id="cjs-update-message" style="display: none;"><?php _e('Updated Successfully','cheeko-slider'); ?></div>
        <div id="cjs-del-message" style="display: none;"><?php _e('Delete Successfully','cheeko-slider'); ?></div>
    </div>
</div>