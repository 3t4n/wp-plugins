<?php
$GPV_img_url=wp_get_attachment_image_src($post,'GPV_original_image',true);
$gpv_img_300=wp_get_attachment_image_src($post,'gpv_img_300',true);
$gpv_img_500=wp_get_attachment_image_src($post,'gpv_img_500',true);
$GPV_li_id=md5(uniqid('GPV_'));
?>
<li class="clearfix GPV-single-li-div" id="<?php echo $GPV_li_id; ?>">
	<input type="hidden" id="GPV_li_id" name="GPV_li_id[]" value="<?php echo $GPV_li_id; ?>">
	<input type="hidden" id="GPV_img_url" name="GPV_img_url[]"  value="<?php echo esc_url($GPV_img_url[0]); ?>" readonly="readonly" />	
	<input type="hidden" id="gpv_img_300" name="gpv_img_300[]"  value="<?php echo esc_url($gpv_img_300[0]); ?>" readonly="readonly" />	
	<input type="hidden" id="gpv_img_500" name="gpv_img_500[]"  value="<?php echo esc_url($gpv_img_500[0]); ?>" readonly="readonly" />		
	<a href="#" id="GPV-remove-image" ><img src="<?php echo GPV_URL; ?>images/trash-icon.png" alt="image"></a>
	<aside class="GPV-single-img">		
		<img style="padding:15px 0 15px 10px;" src="<?php echo esc_url($gpv_img_300[0]); ?>" width="250" height="200" alt="image">
	</aside>
	<aside class="setting-side">
		<figure>
			<article class="GPV-image-record">
				<div class="form-group">
					<label><?php _e('Label :',GPV_TEXTDOMAIN); ?></label>
					<input type="text" class="form-control" name="GPV_image_title[]" placeholder="Enter Image Label">
				</div>
				<div class="form-group">
					<label><?php _e('Type :',GPV_TEXTDOMAIN); ?></label>
					<select id="GPV_select_option" name="GPV_select[]" class="GPV_select_option">
						<optgroup label="Select">
							<option value="Image"><?php _e('Image',GPV_TEXTDOMAIN); ?></option>
							<option value="Video"><?php _e('Video',GPV_TEXTDOMAIN); ?></option>
							<option value="Link"><?php _e('Link',GPV_TEXTDOMAIN); ?></option>
						</optgroup>
					</select>
				</div>

				<div class="form-group video-url-div js-hide display-none">
					<label><?php _e('Video Url :',GPV_TEXTDOMAIN); ?></label>
					<input type="text" name="GPV_video_url[]" class="form-control" placeholder="Enter Video Url">
					<p class="description" style="margin-left: 22%;">
						<?php printf( __('Get Video <a href="%s" target="_blank">Click</a>', GPV_TEXTDOMAIN),esc_url(video_get_url)	); ?>
					</p>
				</div>

				<div class="form-group video-url-div js-hide display-none">
					<label><?php _e('Iframe :',GPV_TEXTDOMAIN); ?></label>
					<span style="padding:6px; background:#0085ba; color:#FFF;"><?php _e('Height :',GPV_TEXTDOMAIN); ?></span><input type="number" name="GPV_video_iframe[]" value="300" class="form-control" placeholder="Enter Video IFrame height" style="width: 54%; padding: 6px;"><span style="padding:6px; background:#23282d; color:#FFF;">PX</span>
				</div>

				<div class="form-group video-link-div js-hide display-none">
					<label><?php _e('Link :',GPV_TEXTDOMAIN); ?></label>
					<input type="text" name="GPV_link[]" class="form-control" placeholder="Enter Page Link">
				</div>

				<div class="form-group">
					<label><?php _e('Button Text :',GPV_TEXTDOMAIN); ?></label>
					<input type="text" name="GPV_button_text[]" placeholder="Button Text" value="View Detail" style="width: 61%;">
					<span><?php _e('Show :',GPV_TEXTDOMAIN); ?></span><input type="checkbox" checked disabled>
				</div>

				<div class="form-group">
					<label><?php _e('Description :',GPV_TEXTDOMAIN); ?></label>
					<textarea name="GPV_description[]" placeholder="Description" rows="3"></textarea>
				</div>
			</article>
		</figure>
	</aside>
</li>
