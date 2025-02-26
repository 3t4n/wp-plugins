<?php
/**
 * Popup Image Data HTML
 *
 * @package SlidersPack - All In One Image Sliders
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$prefix = WP_APAIOIS_META_PREFIX;

// Taking some values
$alt_text 			= get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
$attachment_link 	= get_post_meta( $attachment_id, $prefix.'attachment_link', true );
?>

<div class="wp-spaios-popup-title"><?php esc_html_e('Edit Image', 'sliderspack-all-in-one-image-sliders'); ?></div>
	
<div class="wp-spaios-popup-body">

	<form method="post" class="wp-spaios-attachment-form">
		
		<?php if( !empty($attachment_post->guid) ) { ?>
		<div class="wp-spaios-popup-img-preview">
			<img src="<?php echo esc_url($attachment_post->guid); ?>" alt="" />
		</div>
		<?php } ?>
		<a href="<?php echo get_edit_post_link( $attachment_id ); ?>" target="_blank" class="button right"><i class="dashicons dashicons-edit"></i> <?php esc_html_e('Edit Image From Attachment Page', ' sliderspack'); ?></a>

		<table class="form-table">
			<tr>
				<th><label for="wp-spaios-attachment-title"><?php esc_html_e('Title', ' sliderspack'); ?>:</label></th>
				<td>
					<input type="text" name="wp_spaios_attachment_title" value="<?php echo esc_attr($attachment_post->post_title); ?>" class="large-text wp-spaios-attachment-title" id="wp-spaios-attachment-title" />
					<span class="description"><?php esc_html_e('Enter image title.', ' sliderspack'); ?></span>
				</td>
			</tr>	
			<tr>
				<th><label for="wp-spaios-attachment-alt-text"><?php esc_html_e('Alternative Text', 'sliderspack-all-in-one-image-sliders'); ?>:</label></th>
				<td>
					<input type="text" name="wp_spaios_attachment_alt" value="<?php echo esc_attr($alt_text); ?>" class="large-text wp-spaios-attachment-alt-text" id="wp-spaios-attachment-alt-text" />
					<span class="description"><?php esc_html_e('Enter image alternative text.', 'sliderspack-all-in-one-image-sliders'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="wp-spaios-attachment-caption"><?php esc_html_e('Caption', 'sliderspack-all-in-one-image-sliders'); ?>:</label></th>
				<td>
					<textarea name="wp_spaios_attachment_caption" class="large-text wp-spaios-attachment-caption" id="wp-spaios-attachment-caption"><?php echo esc_attr($attachment_post->post_excerpt); ?></textarea>
					<span class="description"><?php esc_html_e('Enter image caption.', 'sliderspack-all-in-one-image-sliders'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="wp-spaios-attachment-link"><?php esc_html_e('Image Link', 'album-and-image-gallery-plus-lightbox'); ?>:</label></th>
				<td>
					<input type="text" name="wp_spaios_attachment_link" value="<?php echo esc_url($attachment_link); ?>" class="large-text aigpl-attachment-link" id="wp-spaios-attachment-link" />
					<span class="description"><?php esc_html_e('Enter image link. e.g ', 'sliderspack-all-in-one-image-sliders'); ?>http://wponlinesupport.com</span>
				</td>
			</tr>

			<tr>
				<td colspan="2" align="right">
					<div class="wp-spaios-success wp-spaios-hide"></div>
					<div class="wp-spaios-error wp-spaios-hide"></div>
					<span class="spinner wp-spaios-spinner"></span>
					<button type="button" class="button button-primary wp-spaios-save-attachment-data" data-id="<?php echo $attachment_id; ?>" data-nonce="<?php echo wp_create_nonce("wp-spaios-save-attachment-data-{$attachment_id}"); ?>"><i class="dashicons dashicons-yes"></i> <?php esc_html_e('Save Changes', ' sliderspack'); ?></button>
					<button type="button" class="button wp-spaios-popup-close"><?php esc_html_e('Close', ' sliderspack'); ?></button>
				</td>
			</tr>
		</table>
	</form><!-- end .wp-spaios-attachment-form -->
</div><!-- end .wp-spaios-popup-body -->