<?php
function ESSITCO_AMS_store_metaboxes_html($object){
	wp_nonce_field("store-nonce", "meta-box-nonce");
?>	
	<tr>
		<td style="width: 100%" colspan="12">
			
			<div class="field AMS_Text_Field" id="store_url_field">
				<div class="field-title AMS_title">
					<label for="store_url"><?php echo __( 'Store URL', 'affiliate_solution' ); ?></label>
				</div>
				<div class="titleDescriptions AMS_description"><?php echo __( 'input store URL', 'affiliate_solution' ); ?></div>
				<div class="field-item">
					<input name="store_url" id="store_url" type="text" value="<?php echo get_post_meta($object->ID, "store_url", true); ?>" >
				</div>
			</div>
			
			<div class="field AMS_Text_Field">
				<div class="field-title AMS_title">
					<label for="store_tracking_url"><?php echo __( 'Store Tracking URL', 'affiliate_solution' ); ?></label>
				</div>
				<div class="titleDescriptions AMS_description"><?php echo __( 'store tracking URL', 'affiliate_solution' ); ?></div>
				<div class="field-item">
					<input name="store_tracking_url" id="store_tracking_url" type="text" value="<?php echo get_post_meta($object->ID, "store_tracking_url", true); ?>">
				</div>
			</div>
			
			<div class="field AMS_Text_Field">
				<div class="field-title AMS_text">
					<label for="store_guidelines"><?php echo __( 'Store Guidelines(%)', 'affiliate_solution' ); ?></label>
				</div>
				<div class="titleDescriptions AMS_description"><?php echo __( 'Store affiliate commission', 'affiliate_solution' ); ?></div>
				<div class="field-item">
					<textarea name="store_guidelines"  ><?php echo get_post_meta($object->ID, "store_guidelines", true); ?></textarea>
				</div>
			</div>
			
			<div class="field AMS_Text_Field extra_margin">
				<div class="field-title AMS_title">
					<label for="store_facebook"><?php echo __( 'Store Facebook Page Link', 'affiliate_solution' ); ?></label>
				</div>
				<div class="titleDescriptions AMS_description"><?php echo __( 'Input link to the store facebook page', 'affiliate_solution' ); ?></div>
				<div class="field-item">
					<input name="store_facebook" type="text" value="<?php echo get_post_meta($object->ID, "store_facebook", true); ?>" >
				</div>
			</div>
			
			<div class="field AMS_Text_Field">
				<div class="field-title AMS_title">
					<label for="store_twitter"><?php echo __( 'Store Twitter Page Link', 'affiliate_solution' ); ?></label>
				</div>
				<div class="titleDescriptions AMS_description"><?php echo __( 'Input link to the store Twitter page', 'affiliate_solution' ); ?></div>
				<div class="field-item">
					<input name="store_twitter" type="text" value="<?php echo get_post_meta($object->ID, "store_twitter", true); ?>" >
				</div>
			</div>
			
			<div class="field AMS_Text_Field">
				<div class="field-title AMS_title">
					<label for="store_google"><?php echo __( 'Store Google+ Page Link', 'affiliate_solution' ); ?></label>
				</div>
				<div class="titleDescriptions AMS_description"><?php echo __( 'Input link to the store Google+ page', 'affiliate_solution' ); ?></div>
				<div class="field-item">
					<input name="store_google" type="text" value="<?php echo get_post_meta($object->ID, "store_google", true); ?>" >
				</div>
			</div>
			
			<div class="field AMS_Text_Field">
				<div class="field-title AMS_title">
					<label for="is_featured"><?php echo __( 'Is Featured', 'affiliate_solution' ); ?></label>
				</div>
				<div class="titleDescriptions AMS_description"><?php echo __( 'Select if featured store', 'affiliate_solution' ); ?></div>
				<div class="field-item">
					<select id="is_featured" name="is_featured" class="select required">
						<option <?php echo (get_post_meta($object->ID, "is_featured", true) == 'inactive') ? 'selected="selected"':'' ?> value="inactive" ><?php echo __('Inactive','affiliate_solution'); ?></option>
						<option <?php echo (get_post_meta($object->ID, "is_featured", true) == 'active') ? 'selected="selected"':'' ?> value="active" ><?php echo __('Active','affiliate_solution'); ?></option>
					</select>
				</div>
			</div>
			<input type="hidden" name="channel_name" value="other_channel" />
		</td>
	</tr>
<?php
}
?>