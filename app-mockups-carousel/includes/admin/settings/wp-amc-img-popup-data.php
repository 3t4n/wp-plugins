<?php
/**
 * Popup Image Data HTML
 *
 * @package App Mockups Carousel
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

$prefix = WP_AMC_META_PREFIX;

// Taking some values
$alt_text 			= get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
$attachment_link 	= get_post_meta( $attachment_id, $prefix.'attachment_link', true );
?>

<div class="wp-amc-popup-title"><?php _e('Edit Image', 'app-mockups-carousel'); ?></div>
	
<div class="wp-amc-popup-body">

	<form method="post" class="wp-amc-attachment-form">
		
		<?php if( !empty($attachment_post->guid) ) { ?>
		<div class="wp-amc-popup-img-preview">
			<img src="<?php echo $attachment_post->guid; ?>" alt="" />
		</div>
		<?php } ?>
		<a href="<?php echo get_edit_post_link( $attachment_id ); ?>" target="_blank" class="button right"><i class="dashicons dashicons-edit"></i> <?php _e('Edit Image From Attachment Page', 'app-mockups-carousel'); ?></a>

		<table class="form-table">
			<tr>
				<th><label for="wp-amc-attachment-title"><?php _e('Title', 'app-mockups-carousel'); ?>:</label></th>
				<td>
					<input type="text" name="wp_amc_attachment_title" value="<?php echo wp_ssc_esc_attr($attachment_post->post_title); ?>" class="large-text wp-amc-attachment-title" id="wp-amc-attachment-title" />
					<span class="description"><?php _e('Enter image title.', 'app-mockups-carousel'); ?></span>
				</td>
			</tr>

			<tr>
				<th><label for="wp-amc-attachment-alt-text"><?php _e('Alternative Text', 'app-mockups-carousel'); ?>:</label></th>
				<td>
					<input type="text" name="wp_amc_attachment_alt" value="<?php echo wp_ssc_esc_attr($alt_text); ?>" class="large-text wp-amc-attachment-alt-text" id="wp-amc-attachment-alt-text" />
					<span class="description"><?php _e('Enter image alternative text.', 'app-mockups-carousel'); ?></span>
				</td>
			</tr>		

			<tr>
				<th><label for="wp-amc-attachment-link"><?php _e('Image Link', 'app-mockups-carousel'); ?>:</label></th>
				<td>
					<input type="text" name="wp_amc_attachment_link" value="<?php echo esc_url($attachment_link); ?>" class="large-text wp-amc-attachment-link" id="wp-amc-attachment-link" />
					<span class="description"><?php _e('Enter image link. e.g http://wponlinesupport.com', 'app-mockups-carousel'); ?></span>
				</td>
			</tr>

			<tr>
				<td colspan="2" align="right">
					<div class="wp-amc-success wp-amc-hide"></div>
					<div class="wp-amc-error wp-amc-hide"></div>
					<span class="spinner wp-amc-spinner"></span>
					<button type="button" class="button button-primary wp-amc-save-attachment-data" data-id="<?php echo $attachment_id; ?>"><i class="dashicons dashicons-yes"></i> <?php _e('Save Changes', 'app-mockups-carousel'); ?></button>
					<button type="button" class="button wp-amc-popup-close"><?php _e('Close', 'app-mockups-carousel'); ?></button>
				</td>
			</tr>
		</table>
	</form><!-- end .wp-amc-attachment-form -->

</div><!-- end .wp-amc-popup-body -->