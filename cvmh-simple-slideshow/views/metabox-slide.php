<?php
// Exit if accessed directly
defined( 'ABSPATH' ) or exit;

$options = json_decode( get_option( 'cvmh_slideshow' ), true );
$image_id = get_post_meta( get_the_ID(), '_cvmh_slide_image', true );
$image = array();
if( !empty( $image_id ) ):
    $image = wp_get_attachment_image_src( $image_id, 'medium' );
endif;

//token
wp_nonce_field( 'cvmh-slideshow','cvmh_slide_nonce' );
?>
   
<div id="slide-img" class="field required">
    <p class="label">
        <label for="slide_image"><?php _e( 'Image', 'cvmh-simple-slideshow' ); ?><span class="required">*</span></label>
        <?php if ( !empty( $options['width'] ) and !empty( $options['height'] ) ) : ?>
            <?php echo $options['width'] . ' x ' . $options['height'] . 'px'; ?>
        <?php endif; ?>
    </p>
    <div class="cvmh-image-uploader clearfix">
        <div id="preview_image" class="has-image">
            <div class="hover">
                <ul class="bl">
                    <li><a class="cvmh-button-delete ir" href="#"><?php _e( 'Remove', 'cvmh-simple-slideshow' ); ?></a></li>
                </ul>
            </div>
            <img class="cvmh-image-image" src="<?php echo $image[0]; ?>" />
        </div>
        <div class="no-image">
            <p>
                <?php _e( 'No image selected', 'cvmh-simple-slideshow' ); ?>
                <a id="upload_image_button" class="button add-image" title="<?php _e( 'Add new image', 'cvmh-simple-slideshow' ); ?>" href="javascript:void(0);"><?php _e( 'Add new image', 'cvmh-simple-slideshow' ); ?></a>
            </p>   
        </div>
    </div>
    <input id="slide_image" type="hidden" name="slide[image]" value="<?php echo $image_id; ?>" />
</div>

<?php if ( !empty( $options['fields'] ) ) : ?>
    <?php foreach( $options['fields'] as $key => $label ) : ?>
        <div id="slide-<?php echo $key; ?>" class="field">
            <p class="label">
                <label for="slide_<?php echo $key; ?>"><?php echo $label; ?></label>
            </p>
            <div class="cvmh-input-wrap">
                <input id="slide_<?php echo $key; ?>" class="text" type="text" value="<?php echo get_post_meta( get_the_ID(), '_cvmh_slide_' . $key, true ); ?>" name="slide[<?php echo $key; ?>]" />
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div id="slide-link" class="field">
    <p class="label">
        <label for="slide_link"><?php _e( 'Link', 'cvmh-simple-slideshow' ); ?></label>
    </p>
    <div class="cvmh-input-wrap">
        <input id="slide_link" class="text" type="text" value="<?php echo get_post_meta( get_the_ID(), '_cvmh_slide_link', true ); ?>" name="slide[link]" />
        <label for="slide_new_window">
            <input type="checkbox" id="slide_new_window" name="slide[new_window]" value="1" <?php echo get_post_meta( get_the_ID(), '_cvmh_slide_new_window', true ) == 1 ? ' checked="checked"' : ''; ?> />
            <?php _e( 'Open link in a new window/tab', 'cvmh-simple-slideshow' ); ?>
        </label>
    </div>
</div>