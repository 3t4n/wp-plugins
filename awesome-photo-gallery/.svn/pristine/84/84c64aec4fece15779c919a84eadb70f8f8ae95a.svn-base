<?php
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}
?>

<div class="wrap">
    <h1>Awesome Photo Gallery - <?php _e( 'Upload new photos', 'apg' ); ?></h1>

    <?php
    if( count( $this->template['photoalbums'] ) === 0 ):
    ?>
        <p><?php _e( 'There are no albums created. Please add a new photo album to start uploading images in your albums.', 'apg' ); ?></p>

        <p><a href="<?php echo admin_url('post-new.php?post_type=apg_photo_albums'); ?>" class="button"><?php _e('Create a new Photo Album'); ?></a></p>
    <?php
    else:
    ?>
    <form method="post" action="<?php echo admin_url('edit.php?post_type=apg_photo_albums&page=apg_upload'); ?>" enctype="multipart/form-data">
        <?php wp_nonce_field( 'apg_photo_uploader_nonce', 'apg_photo_uploader_nonce' ); ?>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="photoalbum"><?php _e( 'Select photo album', 'apg' ); ?></label></th>
                <td><select name="photoalbum" id="apg-photoalbum">
	                <option value="0">-- <?php _e( 'Select photo album', 'apg' ); ?> --</option>
                    <?php foreach( $this->template['photoalbums'] as $pa ): ?>
                        <option value="<?php echo $pa->ID; ?>"><?php echo esc_attr( $pa->post_title ); ?></option>
                    <?php endforeach; ?>
                </select> <a href="<?php echo admin_url('post-new.php?post_type=apg_photo_albums'); ?>"><?php _e( 'Create new album', 'apg' ); ?></a></td>
            </tr>
            <tr id="apg-upload-button">
                <th scope="row"><label for="apg_photos"><?php _e( 'Select photos', 'apg' ); ?></label><p><?php _e( 'You may select multiple photos by selecting them using CMD or CTRL and click in the file upload window.', 'apg' ); ?></p></th>
                <td valign="top"><!--<input type="file" class="apg_image_upload" name="apg_photos[]" id="apg_photos" multiple="multiple" />-->
                    <div class="uploader">
                        <input id="apg_image_names" name="apg_photos" type="hidden" />
                        <input id="apg_image_upload" class="button" name="apg_image_upload" type="button" value="<?php _e('Upload or Select files', 'apg'); ?>" />
                    </div>
                    <div id="apg-upload-selection"></div>
                </td>
            </tr>
        </table>

        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e( 'Upload new Photos', 'apg'); ?>" /></p>
    </form>
    <?php
    endif;
    ?>
</div>