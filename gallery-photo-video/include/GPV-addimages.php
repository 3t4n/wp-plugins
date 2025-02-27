<?php 
$id=$post->ID;
$GPV_AllPhotos = unserialize(base64_decode(get_post_meta( $id, 'GPV_photos_details', true)));
$TotalImg =  get_post_meta( $id, 'GPV_images_count', true );
?>
<section class="GPV-section" style="background:#23282d;">
	<header class="GPV-header-add-new" style="">
		<button id="GPV-add-new" type="button" class="button button-primary button-large" data-uploader_title="Upload Image" data-uploader__content="Select"><?php _e( 'Add New Image', GPV_TEXTDOMAIN ); ?></button>
		<?php printf( __('<a href="%s" class="button button-primary button-large" target="_blank">Documentation</a>', GPV_TEXTDOMAIN),esc_url(documentation_link) ); ?>
		<?php printf( __('<a href="%s" class="button button-primary button-large" target="_blank">Live Demo</a>', GPV_TEXTDOMAIN),esc_url(live_demo_link) ); ?>
		<?php printf( __('<a href="%s" class="button button-primary button-large" target="_blank">Buy Pro $9</a>', GPV_TEXTDOMAIN),esc_url(pro_version_link) ); ?>
		<button id="GPV-all-images-trash" class="button button-primary button-large"><?php _e( 'Trash All Images', GPV_TEXTDOMAIN ); ?></button>
		<button disabled style="border-color:#f44336; border-radius:4px; background:#f44336; padding:5px; color:#FFF;">(<?php echo $TotalImg; ?>) <?php _e( 'Images', GPV_TEXTDOMAIN ); ?></button>

		<input type="hidden" id="GPVaction" name="GPVaction" value="GPVaction">
	</header>
</section>
<section style="border:1px solid #888;">
	<figure>
		<h3 style="text-align:center;">Shortcode &nbsp:-&nbsp [GPV id=<?php echo $id; ?>]</h3>
		<p class="description"><?php _e( 'Note : Select Same Size Images.', GPV_TEXTDOMAIN ); ?></p>
	</figure>
</section>

<section class="GPV-section clearfix">
	<article>
		<ul id="GPV-gallery" class="clearfix">			
			<?php 
			if($TotalImg)
			{
				foreach($GPV_AllPhotos as $data)
				{						
					?>
					<li class="clearfix GPV-single-li-div" id="<?php echo $data['GPV_li_id']; ?>">
						<input type="hidden" id="GPV_li_id" name="GPV_li_id[]" value="<?php echo $data['GPV_li_id']; ?>">
						<input type="hidden" id="GPV_img_url" name="GPV_img_url[]"  value="<?php echo $data['GPV_img_url']; ?>" readonly="readonly" />	
						<input type="hidden" id="gpv_img_300" name="gpv_img_300[]"  value="<?php echo $data['gpv_img_300']; ?>" readonly="readonly" />	
						<input type="hidden" id="gpv_img_500" name="gpv_img_500[]"  value="<?php echo $data['gpv_img_500']; ?>" readonly="readonly" />		
						<a href="" id="GPV-remove-image" ><img src="<?php echo GPV_URL; ?>images/trash-icon.png" alt="<?php echo esc_attr($data['GPV_image_title']); ?>"></a>
						<aside class="GPV-single-img">		
							<img style="padding:15px 0 15px 10px;" src="<?php echo esc_url($data['gpv_img_300']); ?>" width="250" height="200" alt="<?php echo esc_attr($data['GPV_image_title']); ?>">
						</aside>
						<aside class="setting-side">
							<figure>
								<article class="GPV-image-record">
									<div class="form-group">
										<label><?php _e( 'Label :', GPV_TEXTDOMAIN ); ?></label>
										<input type="text" class="form-control" name="GPV_image_title[]" value="<?php echo $data['GPV_image_title'] ?>" placeholder="Enter Image Label">
									</div>
									<div class="form-group">
										<label><?php _e( 'Type :', GPV_TEXTDOMAIN ); ?></label>
										<select id="GPV_select_option" name="GPV_select[]"  class="GPV_select_option">
											<optgroup label="Select">
												<option value="Image" <?php selected($data['GPV_select'], 'Image' ); ?>><?php _e( 'Image', GPV_TEXTDOMAIN ); ?></option>
												<option value="Video" <?php selected($data['GPV_select'], 'Video' ); ?>><?php _e( 'Video', GPV_TEXTDOMAIN ); ?></option>
												<option value="Link" <?php selected($data['GPV_select'], 'Link' ); ?>><?php _e( 'Link', GPV_TEXTDOMAIN ); ?></option>
											</optgroup>
										</select>
									</div>

									<div class="form-group video-url-div js-hide display-none">
										<label><?php _e('Video Url :',GPV_TEXTDOMAIN); ?></label>
										<input type="text" name="GPV_video_url[]" value="<?php echo $data['GPV_video_url'] ?>" class="form-control" placeholder="Enter Video Url">
										<p class="description" style="margin-left: 22%;">
											<?php printf( __('Get Video <a href="%s" target="_blank">Click</a>', GPV_TEXTDOMAIN),esc_url(video_get_url)	); ?>
										</p>
									</div>

									<div class="form-group video-url-div js-hide display-none">
										<label><?php _e('Iframe :',GPV_TEXTDOMAIN); ?></label>
										<span style="padding:6px; background:#0085ba; color:#FFF;"><?php _e('Height :',GPV_TEXTDOMAIN); ?></span><input type="number" name="GPV_video_iframe[]" value="<?php echo $data['GPV_video_iframe'] ?>" class="form-control" placeholder="Enter Video IFrame height" style="width: 54%; padding: 6px;"><span style="padding:6px; background:#23282d; color:#FFF;">PX</span>
									</div>

									<div class="form-group video-link-div js-hide display-none">
										<label><?php _e('Link :',GPV_TEXTDOMAIN); ?></label>
										<input type="text" name="GPV_link[]" value="<?php echo $data['GPV_link'] ?>" class="form-control" placeholder="Enter Page Link">
									</div>
									<div class="form-group">
										<label><?php _e('Button Text :',GPV_TEXTDOMAIN); ?></label>
										<input type="text" name="GPV_button_text[]" placeholder="Button Text" value="<?php echo $data['GPV_button_text']; ?>" style="width: 61%;">
										<span><?php _e('Show :',GPV_TEXTDOMAIN); ?></span><input type="checkbox" name="" checked disabled>
									</div>

									<div class="form-group">
										<label><?php _e('Description :',GPV_TEXTDOMAIN); ?></label>
										<textarea name="GPV_description[]" placeholder="Description" rows="3"><?php echo $data['GPV_description']; ?></textarea>
									</div>
								</article>
							</figure>
						</aside>
					</li>
					<script type="text/javascript">
					jQuery(function(){
						var obj_li=jQuery('#<?php echo $data["GPV_li_id"]; ?>');						
						obj_li.find('.js-hide').hide();
						var GPV_type="<?php echo $data['GPV_select'];?>";
						if(GPV_type=='Image'){
							obj_li.find('.video-url-div').add(obj_li.find('.video-link-div')).fadeOut('slow');
						}else if(GPV_type=='Video'){							
							obj_li.find('.video-url-div').fadeIn('slow');				
						}else if(GPV_type=='Link'){								
							obj_li.find('.video-link-div').fadeIn('slow');
						}
					});
					</script>
					<?php
				}
			}else{
				$TotalImg=0;
			}
			?>
		</ul>
	</article>
</section>