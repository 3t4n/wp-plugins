<?php

/**
 * class.MelibuAuthorAbstract.php 
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Author Box Pro
 * @since       1.0
 */

if (!class_exists('MB_AUTHOR_BOX_ABSTRACT')) {

    abstract class MB_AUTHOR_BOX_ABSTRACT {

        /**
         * 
         * @param type $user_id
         */
        public static function profile_update($user_id) {

            if (current_user_can('edit_users')) {

                $profile_pic = empty($_POST['melibu-ab-image-id']) ? '' : $_POST['melibu-ab-image-id'];
                update_user_meta($user_id, 'user_thumb', $profile_pic);

                $main_description = empty($_POST['user_main_description']) ? '' : $_POST['user_main_description'];
                update_user_meta($user_id, 'user_main_description', $main_description);
            }
        }

        /**
         * 
         * @param type $user
         */
        public static function show_user_profile($user) {

            $profileThumb = ($user !== 'add-new-user') ? get_user_meta($user->ID, 'user_thumb', true) : false;
            $main_description = ($user !== 'add-new-user') ? get_user_meta($user->ID, 'user_main_description', true) : false;

            if (!empty($profileThumb)) {
                /**
                 * USER image
                 * @see https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src/
                 */
                $image = wp_get_attachment_image_src($profileThumb, 'thumbnail');
            } else {
                $image = get_avatar_url(get_the_author_meta('ID'), array("size" => 96));
            }
            $thumbSource = !empty($profileThumb) ? $image[0] : $image;
            ?>
            <div class="mb-author-box-pro-profile--settings">
                <h2 id="mb-author-box-pro-profile--header"><?php _e('MB Author Box', 'author-box-pro') ?></h2>
                <table class="form-table mb-profile--settings-options">
                    <tr>
                        <th>
                            <?php _e('Profile Picture', 'author-box-pro') ?><br />
                            <small>(<?php _e('without Gravatar', 'author-box-pro') ?>)</small>
                        </th>
                        <td>
                            <div class="mb-author-box-pro-profile--settings-upload">
                                <input type="button" data-id="melibu-ab-image-id" data-src="melibu-ab-image-show" class="button melibu-ab-image" name="melibu-ab-image" value="<?php _e('Profile Upload', 'author-box-pro') ?>" />
                                <input type="button" data-id="melibu-ab-image-id" class="button melibu-ab-image-reset" name="melibu-ab-image-reset" value="<?php _e('Reset Image', 'author-box-pro') ?>" />
                            </div>
                            <div class="mb-author-box-pro-profile--settings-preview" id="melibu-ab-image-show" <?php echo !empty($thumbSource) ? 'style="background-image: url(' . $thumbSource . ');"' : ''; ?>>
                                <input type="hidden" class="button" name="melibu-ab-image-id" id="melibu-ab-image-id" value="<?php echo !empty($profileThumb) ? $profileThumb : ''; ?>" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php _e('Biographical Info', 'author-box-pro') ?><br />
                            <small>(<?php _e('with format', 'author-box-pro') ?>)</small>
                        </th>
                        <td>
                            <?php
                            if (!empty($main_description)) {
                                $content = $main_description;
                            } else {
                                $content = '';
                            }
                            wp_editor($content, 'user_main_description');
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            <?php
        }

    }

}