<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	function casino_review_post_meta_fields($post) {

		// Use nonce for verification
		
		wp_nonce_field(plugin_basename( __FILE__ ), 'casino_review_metabox_nonce');
?>

	<table style="width: 100%;">
	
		<tr>
			<td><?php _e('Affiliate Referral URL', 'casino-review'); ?>:<?php _e('Enter the full referral or affiliate url provided by your affiliate program to track your visitors.', 'casino-review'); ?></td>
			<td><label for="casinoAffiliatUrl"><input type="text" name="casinoAffiliatUrl" id="casinoAffiliatUrl" value="<?php if(!empty(get_post_meta($post->ID, 'casinoAffiliatUrl', true))){ echo esc_attr(get_post_meta($post->ID, 'casinoAffiliatUrl', true)); } ?>" /></label></td>
		</tr>
		
		<tr>
			<td><?php _e('Bonus Display Text', 'casino-review'); ?>:</td>
			<td><label for="casinoBonusDisplayText"><input type="text" name="casinoBonusDisplayText" id="casinoBonusDisplayText" value="<?php if(!empty(get_post_meta($post->ID, 'casinoBonusDisplayText', true))){ echo esc_attr(get_post_meta($post->ID, 'casinoBonusDisplayText', true)); } ?>" /></label></td>
		</tr>
		
		<tr>
			<td><?php _e('Review Page URL', 'casino-review'); ?>:<?php _e('After you create your review page using the shortcode, place that review page link here.', 'casino-review'); ?></td>
			<td><label for="casinoReviewPageUrl"><input type="text" name="casinoReviewPageUrl" id="casinoReviewPageUrl" value="<?php if(!empty(get_post_meta($post->ID, 'casinoReviewPageUrl', true))){ echo esc_attr(get_post_meta($post->ID, 'casinoReviewPageUrl', true)); } ?>" /></label></td>
		</tr>
		
		<tr>
			<td><?php _e('Editor Rating', 'casino-review'); ?>:<?php _e('This is the main star rating/overall rating.', 'casino-review'); ?></td>
			<td>
				<select name="casinoEditorRating" id="casinoEditorRating">
					<option value=""><?php _e('Select', 'casino-review'); ?></option>
					<?php $x=1; while ($x<=5){ ?>
					<option <?php if(!empty(get_post_meta($post->ID, 'casinoEditorRating', true)) && (esc_attr(get_post_meta($post->ID, 'casinoEditorRating', true))==esc_attr($x))){ echo esc_attr('selected'); } ?> value="<?php echo esc_attr($x); ?>"><?php echo esc_attr($x); ?></option>
					<?php $x=$x+1; } ?>
			   </select>
			</td>
		</tr>
		
		<tr>
			<td><?php _e('Features, separate each by |', 'casino-review'); ?>:</td>
			<td><label for="casinoFeatures"><input type="text" name="casinoFeatures" id="casinoFeatures" value="<?php if(!empty(get_post_meta($post->ID, 'casinoFeatures', true))){ echo esc_attr(get_post_meta($post->ID, 'casinoFeatures', true)); } ?>" /></label></td>
		</tr>
		
	</table>

<?php
      }

	//Save post meta data when post is saved
	
	add_action( 'save_post', 'casino_review_save_post_meta_data');
	
	function casino_review_save_post_meta_data($post_id) {	

		if ((isset( $_POST['casino_review_metabox_nonce'])) && (wp_verify_nonce( $_POST['casino_review_metabox_nonce'], plugin_basename( __FILE__ )))) {
	
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
				return;
		
				if (current_user_can('manage_options')) {
				
					if (isset($_POST['casinoAffiliatUrl'])) { update_post_meta($post_id, 'casinoAffiliatUrl', sanitize_text_field($_POST['casinoAffiliatUrl'])); }
					
					if (isset($_POST['casinoBonusDisplayText'])) { update_post_meta($post_id, 'casinoBonusDisplayText', sanitize_text_field($_POST['casinoBonusDisplayText'])); }
					
					if (isset($_POST['casinoReviewPageUrl'])) { update_post_meta($post_id, 'casinoReviewPageUrl', sanitize_text_field($_POST['casinoReviewPageUrl'])); }
					
					if (isset($_POST['casinoEditorRating'])) { update_post_meta($post_id, 'casinoEditorRating', sanitize_text_field($_POST['casinoEditorRating'])); }
					
					if (isset($_POST['casinoFeatures'])) { update_post_meta($post_id, 'casinoFeatures', sanitize_text_field($_POST['casinoFeatures'])); }
					
				}

		}
	}	

?>