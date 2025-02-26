<?php
/**
 * Handles Post Setting metabox HTML
 *
 * @package App Mockups Carousel
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $post;

$prefix = WP_AMC_META_PREFIX; // Metabox prefix

$gallery_imgs 	= get_post_meta( $post->ID, $prefix.'gallery_id', true );
$no_img_cls		= !empty($gallery_imgs) ? 'wp-amc-hide' : '';
?>

<table class="form-table wp-amc-post-sett-table">
	<tbody>
		<tr valign="top">
			<th scope="row">
				<label for="wp-amc-gallery-imgs"><?php _e('Choose Gallery Images', 'app-mockups-carousel'); ?></label>
			</th>
			<td>
				<button type="button" class="button button-secondary wp-amc-img-uploader" id="wp-amc-gallery-imgs" data-multiple="true" data-button-text="<?php _e('Add to Gallery', 'app-mockups-carousel'); ?>" data-title="<?php _e('Add Images to Gallery', 'app-mockups-carousel'); ?>"><i class="dashicons dashicons-format-gallery"></i> <?php _e('Gallery Images', 'app-mockups-carousel'); ?></button>
				<button type="button" class="button button-secondary wp-amc-del-gallery-imgs"><i class="dashicons dashicons-trash"></i> <?php _e('Remove Gallery Images', 'app-mockups-carousel'); ?></button><br/>
				
				<div class="wp-amc-gallery-imgs-prev wp-amc-imgs-preview wp-amc-gallery-imgs-wrp">
					<?php if( !empty($gallery_imgs) ) {
						foreach ($gallery_imgs as $img_key => $img_data) {

							$attachment_url 		= wp_get_attachment_thumb_url( $img_data );
							$attachment_edit_link	= get_edit_post_link( $img_data );
					?>
							<div class="wp-amc-img-wrp">
								<div class="wp-amc-img-tools wp-amc-hide">
									<span class="wp-amc-tool-icon wp-amc-edit-img dashicons dashicons-edit" title="<?php _e('Edit Image in Popup', 'app-mockups-carousel'); ?>"></span>
									<a href="<?php echo $attachment_edit_link; ?>" target="_blank" title="<?php _e('Edit Image', 'app-mockups-carousel'); ?>"><span class="wp-amc-tool-icon wp-amc-edit-attachment dashicons dashicons-visibility"></span></a>
									<span class="wp-amc-tool-icon wp-amc-del-tool wp-amc-del-img dashicons dashicons-no" title="<?php _e('Remove Image', 'app-mockups-carousel'); ?>"></span>
								</div>
								<img class="wp-amc-img" src="<?php echo $attachment_url; ?>" alt="" />
								<input type="hidden" class="wp-amc-attachment-no" name="wp_amc_img[]" value="<?php echo $img_data; ?>" />
							</div><!-- end .wp-amc-img-wrp -->
					<?php }
					} ?>
					
					<p class="wp-amc-img-placeholder <?php echo $no_img_cls; ?>"><?php _e('No Gallery Images', 'app-mockups-carousel'); ?></p>

				</div><!-- end .wp-amc-imgs-preview -->
				<span class="description"><?php _e('Choose your desired images for gallery. Hold Ctrl key to select multiple images at a time.', 'app-mockups-carousel'); ?></span>
			</td>
		</tr>
	</tbody>
</table><!-- end .wtwp-tstmnl-table -->