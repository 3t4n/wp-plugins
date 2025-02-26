<?php
function ESSITCO_AMS_offer_metaboxes_html($object){
	wp_nonce_field("offer-nonce", "offer-meta-box-nonce");
	
	$storelist_args = array(
		'numberposts' => -1,
		'post_type'   => 'store',
		'post_status' => 'publish',
	);

	$storelist = get_posts($storelist_args);
?>	

	<tr>
		<td style="width: 100%" colspan="12">
			
			<div class="field AMS_Text_Field">
				<div class="field-title AMS_title">
					<label for="store"><?php echo __( 'Store', 'affiliate_solution' ); ?></label>
				</div>
				<div class="titleDescriptions AMS_description">
					<?php echo __( 'choose Store associated with offer', 'affiliate_solution' ); ?>
				</div>
				<div class="field-item">
					<select id="store" name="store" class="select required">
						<option value="-1"><?php echo __( 'Choose Store', 'affiliate_solution' ); ?></option>
						<?php
						if(!empty($storelist)){
							foreach($storelist as $stores){
								$sid = $stores->ID;
								$postTitle = $stores->post_title;
								?>
								<option <?php echo ($sid == get_post_meta($object->ID, "store", true)) ? 'selected="selected"':'' ?> value="<?php echo $sid ?>"><?php echo __( $postTitle, 'affiliate_solution' ); ?></option>
							<?php
							}
						}
						?>
					</select>
				</div>
			</div>
			
			<div class="field AMS_Text_Field">
				<div class="field-title AMS_title">
					<label for="offer_type"><?php echo __( 'Offer type', 'affiliate_solution' ); ?></label>
				</div>
				<div class="titleDescriptions AMS_description"><?php echo __( 'Type of offer', 'affiliate_solution' ); ?></div>
				<div class="field-item">
					<?php $offer_type = get_post_meta($object->ID, "offer_type", true); ?>
					<select id="offer_type" name="offer_type" class="select" >
						<option value="-1">Choose Offer Type</option>
						<option value="coupon" <?php echo ($offer_type == 'coupon') ? 'selected="selected"':'' ?> ><?php echo __( 'Coupon', 'affiliate_solution' ); ?></option>
						<option value="deal" <?php echo ($offer_type == 'deal') ? 'selected="selected"':'' ?> ><?php echo __( 'Deal', 'affiliate_solution' ); ?></option>
					</select>
				</div>
			</div>
			
			<div id="couponDivs">
				<div class="field AMS_Text_Field">
					<div class="field-title AMS_title">
						<label for="coupon_type"><?php echo __( 'Coupon type', 'affiliate_solution' ); ?></label>
					</div>
					<div class="titleDescriptions AMS_description"><?php echo __( 'Type of coupon', 'affiliate_solution' ); ?></div>
					<div class="field-item">
						<?php $coupon_type = get_post_meta($object->ID, "coupon_type", true); ?>
						<select id="coupon_type" name="coupon_type" class="select" >
							<option value="-1">Choose Coupon Type</option>
							<option value="code" <?php echo ($coupon_type == 'code') ? 'selected="selected"':'' ?> ><?php echo __( 'Coupon With Code', 'affiliate_solution' ); ?></option>
							<option value="sale" <?php echo ($coupon_type == 'sale') ? 'selected="selected"':'' ?>><?php echo __( 'Coupon For Sale', 'affiliate_solution' ); ?></option>
						</select>
					</div>
				</div>
				
				<div class="field AMS_Text_Field" id="coupon_code_div">
					<div class="field-title AMS_title">
						<label for="coupon_code"><?php echo __( 'Coupon Code', 'affiliate_solution' ); ?></label>
					</div>
					<div class="titleDescriptions AMS_description"><?php echo __( 'Input Coupon Code', 'affiliate_solution' ); ?></div>
					<div class="field-item">
						<input name="coupon_code" type="text" value="<?php echo get_post_meta($object->ID, "coupon_code", true); ?>" >
					</div>
				</div>
				
				<div class="field AMS_Text_Field" id="coupon_sale_div">
					<div class="field-title AMS_title">
						<label for="coupon_sale_link"><?php echo __( 'Coupon Sale Link', 'affiliate_solution' ); ?></label>
					</div>
					<div class="titleDescriptions AMS_description"><?php echo __( 'Input Coupon Sale Link', 'affiliate_solution' ); ?></div>
					<div class="field-item">
						<input name="coupon_sale_link" type="text" value="<?php echo get_post_meta($object->ID, "coupon_sale_link", true); ?>" >
					</div>
				</div>
								
				<div class="field AMS_Text_Field" id="coupon_store_div">
					<div class="field-title AMS_title">
						<label for="coupon_store_link_with_code"><?php echo __( 'Coupon Store link with Code', 'affiliate_solution' ); ?></label>
					</div>
					<div class="titleDescriptions AMS_description"><?php echo __( 'Input link to the store with code included, which will be displayed on the coupon popup window', 'affiliate_solution' ); ?></div>
					<div class="field-item">
						<input name="coupon_store_link_with_code" type="text" value="<?php echo get_post_meta($object->ID, "coupon_store_link_with_code", true); ?>" >
					</div>
				</div>
			</div>
			<div id="dealDivs">
				<!-- deals div -->
				<div class="field AMS_Text_Field">
					<div class="field-title AMS_title">
						<label for="deal_store_list_price"><?php echo __( 'Deal List Price', 'affiliate_solution' ); ?></label>
					</div>
					<div class="titleDescriptions AMS_description"><?php echo __( 'Input store deal list price', 'affiliate_solution' ); ?></div>
					<div class="field-item">
						<input name="deal_store_list_price" type="number" value="<?php echo get_post_meta($object->ID, "deal_store_list_price", true); ?>" >
					</div>
				</div>
				<div class="field AMS_Text_Field">
					<div class="field-title AMS_title">
						<label for="deal_store_sale_price"><?php echo __( 'Deal Sale Price', 'affiliate_solution' ); ?></label>
					</div>
					<div class="titleDescriptions AMS_description"><?php echo __( 'Input store deal sale price', 'affiliate_solution' ); ?></div>
					<div class="field-item">
						<input name="deal_store_sale_price" type="number" value="<?php echo get_post_meta($object->ID, "deal_store_sale_price", true); ?>" >
					</div>
				</div>
				<div class="field AMS_Text_Field">
					<div class="field-title AMS_title">
						<label for="deal_affiliate_link"><?php echo __( 'Deal Link', 'affiliate_solution' ); ?></label>
					</div>
					<div class="titleDescriptions AMS_description"><?php echo __( 'Input deal link which will be opened once the deal is clicked', 'affiliate_solution' ); ?></div>
					<div class="field-item">
						<input name="deal_affiliate_link" type="text" value="<?php echo get_post_meta($object->ID, "deal_affiliate_link", true); ?>" >
					</div>
				</div>
			</div>
			<div class="field AMS_Text_Field">
				<div class="field-title AMS_title">
					<label for="offer_start_date"><?php echo __( 'Start date', 'affiliate_solution' ); ?></label>
				</div>
				<div class="titleDescriptions AMS_description"><?php echo __( 'Set start date and time for the offer', 'affiliate_solution' ); ?></div>
				<div class="field-item">
					<?php $offer_start_date = get_post_meta($object->ID, "offer_start_date", true); ?>
					<input type="datetime-local" id="offer_start_date" name="offer_start_date" value="<?php echo $offer_start_date != '' ? date('Y-m-d',$offer_start_date).'T'.date('H:i',$offer_start_date) : date('Y-m-d').'T'.date('H:i') ?>" min="<?php echo $offer_start_date != '' ? $offer_start_date : date('Y-m-d').'T'.date('H:i'); ?>" class="offer_date" />
				</div>
			</div>			
			<div class="field AMS_Text_Field">
				<div class="field-title AMS_title">
					<label for="offer_expire_date"><?php echo __( 'Expiry date', 'affiliate_solution' ); ?></label>
				</div>
				<div class="titleDescriptions AMS_description"><?php echo __( 'Set Expiry date and time for the offer', 'affiliate_solution' ); ?></div>
				<div class="field-item">
					<?php $offer_expire_date = get_post_meta($object->ID, "offer_expire_date", true); ?>
					<input type="datetime-local" id="offer_expire_date" name="offer_expire_date" value="<?php echo $offer_expire_date != '' ? date('Y-m-d',$offer_expire_date).'T'.date('H:i',$offer_expire_date) : date('Y-m-d').'T'.date('H:i') ?>" class="offer_date" />
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
		</td>
	</tr>
	<script>
	jQuery(function(){
		
		if('<?php echo get_post_meta($object->ID, "offer_type", true) ?>' == 'coupon'){
			jQuery("#dealDivs").hide();
			jQuery("#couponDivs").show();
			if( '<?php echo get_post_meta($object->ID, "coupon_type", true) ?>' == 'code'){
				jQuery("#coupon_code_div").show();
				jQuery("#coupon_sale_div").hide();
				jQuery("#coupon_store_div").show();
			} else if('<?php echo get_post_meta($object->ID, "coupon_type", true) ?>' == 'sale'){
				jQuery("#coupon_code_div").hide();
				jQuery("#coupon_sale_div").show();
				jQuery("#coupon_store_div").hide();
			} else {
				jQuery("#coupon_code_div").hide();
				jQuery("#coupon_sale_div").hide();
				jQuery("#coupon_store_div").hide();
			}
			
		} else if('<?php echo get_post_meta($object->ID, "offer_type", true) ?>' == 'deal'){
			jQuery("#couponDivs").hide();
			jQuery("#dealDivs").show();
			
			jQuery("#coupon_code_div").hide();
			jQuery("#coupon_sale_div").hide();
			jQuery("#coupon_store_div").hide();
		} else {
			jQuery("#couponDivs").hide();
			jQuery("#dealDivs").hide();
			
			jQuery("#coupon_code_div").hide();
			jQuery("#coupon_sale_div").hide();
			jQuery("#coupon_store_div").hide();
		}
				
		jQuery('#offer_type').change( function(){
			var $this = jQuery(this);
			jQuery("#coupon_type").change();
			if($this.val() == 'coupon'){
				jQuery("#couponDivs").show();
				jQuery("#dealDivs").hide();
			} else if($this.val() == 'deal'){
				jQuery("#couponDivs").hide();
				jQuery("#dealDivs").show();
			} else {
				
			}						
		});
		
		jQuery('#coupon_type').change( function(){
			var $this = jQuery(this);
			
			if($this.val() == 'code'){
				jQuery("#coupon_code_div").show();
				jQuery("#coupon_sale_div").hide();
				jQuery("#coupon_store_div").show();
			} else if($this.val() == 'sale'){
				jQuery("#coupon_code_div").hide();
				jQuery("#coupon_sale_div").show();
				jQuery("#coupon_store_div").hide();
			} else {
				jQuery("#coupon_code_div").hide();
				jQuery("#coupon_sale_div").hide();
				jQuery("#coupon_store_div").hide();
			}						
		});
	});
	</script>
<?php
}
?>