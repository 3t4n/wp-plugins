<table class="form-table" role="presentation">
	<tbody>
		<?php 
			$socialshare_btn_style = get_option('socail_btn_style')?get_option('socail_btn_style'):'style-1';
			$social_post_types 	   = get_post_types( [ 'public' => true,'show_in_nav_menus'=> true ], 'objects');
			$social_selected_post  = get_option( 'social_post_types' ) ? get_option( 'social_post_types' ) : array('post','page');
		?>
		<tr>
			<td colspan="2" class="s-share-social-style-wraper"> 
				<span class="tbl-ttle"><?php echo esc_html__('Select Post Type :','htsocialshare-btn') ?></span>
				<?php foreach ( $social_post_types as $post_type ) : ?>
					<?php $checked = is_array($social_selected_post) && in_array( $post_type->name, $social_selected_post, true ) ? 'checked="checked"' : ''; ?>
					<label style="margin-right: 5px;">
						<input style="margin-left: 0px;margin-right: 0px;" type="checkbox" name="social_post_types[]" value="<?php echo esc_attr( $post_type->name ); ?>" <?php echo $checked; ?>/>
						<?php echo esc_html__($post_type->label,'htsocialshare-btn'); ?>
					</label>
				<?php endforeach; ?>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="s-share-social-style-wraper">
				<span class="tbl-ttle"><?php echo esc_html__('Button Styles :','htsocialshare-btn'); ?></span>
				<div class="s-share-social-style">
					<div class="s-share-social-col">
						<div class="s-share-social-style-item">
							<p><?php echo esc_html__('Button Style  1','htsocialshare-btn'); ?></p>
							<label class="button-styles">
								<i class="fas fa-info-circle"></i>
								<div class="style-demo">
									<i class="fas fa-caret-down"></i>
									<img src="<?php echo esc_url(HTSOCIALSHARE_PL_URL.'admin/assets/images/style_1.png'); ?>">
								</div>
								<input type="radio" id="socail_btn_style-1" name="socail_btn_style" value="style-1" <?php echo $socialshare_btn_style=='style-1'?'checked':''; ?>/>
							</label>
						</div>
						<div class="s-share-social-style-item">
							<p><?php echo esc_html__('Button Style  2','htsocialshare-btn'); ?></p>
							<label class="button-styles">
								<i class="fas fa-info-circle"></i>
								<div class="style-demo">
									<i class="fas fa-caret-down"></i>
									<img src="<?php echo esc_url(HTSOCIALSHARE_PL_URL.'admin/assets/images/style_3.png'); ?>">
								</div>
								<input type="radio" id="socail_btn_style_2" name="socail_btn_style" value="style-2" <?php echo $socialshare_btn_style=='style-2'?'checked':''; ?>/>
							</label>
						</div>
					</div>
					<div class="s-share-social-col">
						<div class="s-share-social-style-item">
							<p><?php echo esc_html__('Button Style  3','htsocialshare-btn'); ?></p>
							<label class="button-styles">
								<i class="fas fa-info-circle"></i>
								<div class="style-demo">
									<i class="fas fa-caret-down"></i>
									<img src="<?php echo esc_url(HTSOCIALSHARE_PL_URL.'admin/assets/images/style_4.png'); ?>">
								</div>
								<input type="radio" id="socail_btn_style_3" name="socail_btn_style" value="style-3" <?php echo $socialshare_btn_style=='style-3'?'checked':''; ?>/>
							</label>
						</div>
						<div class="s-share-social-style-item">
							<p><?php echo esc_html__('Button Style  4','htsocialshare-btn'); ?></p>
							<label class="button-styles">
								<i class="fas fa-info-circle"></i>
								<div class="style-demo">
									<i class="fas fa-caret-down"></i>
									<img src="<?php echo esc_url(HTSOCIALSHARE_PL_URL.'admin/assets/images/style_6.png'); ?>">
								</div>
								<input type="radio" id="socail_btn_style_4" name="socail_btn_style" value="style-4" <?php echo $socialshare_btn_style=='style-4'?'checked':''; ?>/>
							</label>
						</div>
					</div>
					<div class="s-share-social-col">
						<div class="s-share-social-style-item">
							<p><?php echo esc_html__('Button Style  5','htsocialshare-btn'); ?></p>
							<label class="button-styles">
								<i class="fas fa-info-circle"></i>
								<div class="style-demo">
									<i class="fas fa-caret-down"></i>
									<img src="<?php echo esc_url(HTSOCIALSHARE_PL_URL.'admin/assets/images/style_9.png'); ?>">
								</div>
								<input type="radio" id="socail_btn_style_5" name="socail_btn_style" value="style-5" <?php echo $socialshare_btn_style=='style-5'?'checked':''; ?>/>
							</label>
						</div>
						<div class="s-share-social-style-item">
							<p><?php echo esc_html__('Button Style  6','htsocialshare-btn'); ?></p>
							<label class="button-styles">
								<i class="fas fa-info-circle"></i>
								<div class="style-demo">
									<i class="fas fa-caret-down"></i>
									<img src="<?php echo esc_url(HTSOCIALSHARE_PL_URL.'admin/assets/images/style_11.png'); ?>">
								</div>
								<input type="radio" id="socail_btn_style_6" name="socail_btn_style" value="style-6" <?php echo $socialshare_btn_style=='style-6'?'checked':''; ?>/>
							</label>
						</div>
					</div>
					<div class="s-share-social-col">
						<div class="s-share-social-style-item">
							<p><?php echo esc_html__('Button Style  7','htsocialshare-btn'); ?></p>
							<label class="button-styles">
								<i class="fas fa-info-circle"></i>
								<div class="style-demo">
									<i class="fas fa-caret-down"></i>
									<img src="<?php echo esc_url(HTSOCIALSHARE_PL_URL.'admin/assets/images/style_5.png'); ?>">
								</div>
								<input type="radio" id="socail_btn_style_7" name="socail_btn_style" value="style-7" <?php echo $socialshare_btn_style=='style-7'?'checked':''; ?>/>
							</label>
						</div>
						<div class="s-share-social-style-item">
							<p><?php echo esc_html__('Button Style  8','htsocialshare-btn'); ?></p>
							<label class="button-styles">
								<i class="fas fa-info-circle"></i>
								<div class="style-demo">
									<i class="fas fa-caret-down"></i>
									<img src="<?php echo esc_url(HTSOCIALSHARE_PL_URL.'admin/assets/images/style_7.png'); ?>">
								</div>
								<input type="radio" id="socail_btn_style_8" name="socail_btn_style" value="style-8" <?php echo $socialshare_btn_style=='style-8'?'checked':''; ?>/>
							</label>
						</div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="s-share-social-style-wraper">
				<?php $s_share_btn_position = get_option('button_position')?get_option('button_position'):'center'; ?>
					<span class="tbl-ttle"><?php echo esc_html__('Button Location :','htsocialshare-btn'); ?></span>
					<div class="for-social-style-1">
						<div class="s-share-social-location">
							<div class="s-share-social-col">
								<div class="s-share-social-style-item">
									<input type="radio" name="button_position" id="full-top" value="full-top" <?php echo $s_share_btn_position=='full-top'?'checked':''; ?>>
									<label for="full-top"><?php echo esc_html__('Left Wall Top','htsocialshare-btn') ?></label>
								</div>
								<div class="s-share-social-style-item">
									<input type="radio" name="button_position" id="center" value="center" <?php echo $s_share_btn_position=='center'?'checked':''; ?>>
									<label for="center"><?php echo esc_html__('Left Wall Center','htsocialshare-btn') ?></label>
								</div>
								<div class="s-share-social-style-item">
									<input type="radio" name="button_position" id="full-bottom" value="full-bottom" <?php echo $s_share_btn_position=='full-bottom'?'checked':''; ?>>
									<label for="full-bottom"><?php echo esc_html__('Left Wall Bottom','htsocialshare-btn') ?></label>
								</div>
							</div>
						</div>
					</div>
					<div class="for-social-style-others">
						<div class="s-share-social-location">
							<div class="s-share-social-col">
								<div class="s-share-social-style-item">
									<input type="radio" name="button_position" id="before-content" value="before-content" <?php echo $s_share_btn_position=='before-content'?'checked':''; ?>>
									<label for="before-content"><?php echo esc_html__('Before Content','htsocialshare-btn'); ?></label>
								</div>
								<div class="s-share-social-style-item">
									<input type="radio" name="button_position" id="after-content" value="after-content" <?php echo $s_share_btn_position=='after-content'?'checked':''; ?>>
									<label for="after-content"><?php echo esc_html__('After Content','htsocialshare-btn'); ?></label>
								</div>
							</div>
							<div class="s-share-social-col">
								<div class="s-share-social-style-item">
									<input type="radio" name="button_position" id="after-comment" value="after-comment" <?php echo $s_share_btn_position=='after-comment'?'checked':''; ?>>
									<label for="after-comment"><?php echo esc_html__('After Comment Field','htsocialshare-btn'); ?></label>
								</div>
								<div class="s-share-social-style-item">
									<input type="radio" name="button_position" id="before-comment" value="before-comment" <?php echo $s_share_btn_position=='before-comment'?'checked':''; ?>>
									<label for="before-comment"><?php echo esc_html__('Before Comment Field','htsocialshare-btn'); ?></label>
								</div>
							</div>
						</div>
					</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="social-share-icon-reset">
				<?php $s_share_icon_list = get_option('social_icon_list')?get_option('social_icon_list'):array(
						'facebook'=>'fab fa-facebook-f',
						'Twitter'=>'',
						'Linkedin'=>'',
					);?>
				<div class="s-share-social-icon-wraper">

					<div class="s-share-social-icon">
						<span class="tbl-ttle"><?php echo esc_html__('Social Share Icon :','htsocialshare-btn'); ?></span>
						<ul class="s-share-icon-list">
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[facebook]" name="social_icon_list[facebook]" <?php echo isset($s_share_icon_list['facebook'])?'checked':'';?> value="fab fa-facebook-f">
								<label for="social_icon_list[facebook]">
									<div class="s-share-icon facebook">
										<i class="fab fa-facebook-f"></i>
									</div> 
								</label>
								<label for="social_icon_list[facebook]" class="s-share-icon-text"><?php echo esc_html__('facebook','htsocialshare-btn'); ?></label>
							</li>
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[Pinterest]" name="social_icon_list[Pinterest]" <?php echo isset($s_share_icon_list['Pinterest'])?'checked':'';?> value="fab fa-pinterest-p">
								<label for="social_icon_list[Pinterest]">
									<div class="s-share-icon pinterest">
										<i class="fab fa-pinterest-p"></i>
									</div> 
								</label>
								<label for="social_icon_list[Pinterest]" class="s-share-icon-text"><?php echo esc_html__('Pinterest','htsocialshare-btn'); ?></label>
							</li>
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[Twitter]" name="social_icon_list[Twitter]" <?php echo isset($s_share_icon_list['Twitter'])?'checked':'';?> value="fab fa-twitter">
								<label for="social_icon_list[Twitter]">
									<div class="s-share-icon twitter">
										<i class="fab fa-twitter" aria-hidden="true"></i>
									</div> 
								</label>
								<label for="social_icon_list[Twitter]" class="s-share-icon-text"><?php echo esc_html__('Twitter','htsocialshare-btn'); ?></label>
							</li>
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[Linkedin]" name="social_icon_list[Linkedin]" <?php echo isset($s_share_icon_list['Linkedin'])?'checked':'';?> value="fab fa-linkedin">
								<label for="social_icon_list[Linkedin]">
									<div class="s-share-icon linkedin">
										<i class="fab fa-linkedin" aria-hidden="true"></i>
									</div> 
								</label>
								<label for="social_icon_list[Linkedin]" class="s-share-icon-text"><?php echo esc_html__('Linkedin','htsocialshare-btn'); ?></label>
							</li>
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[WhatsApp]" name="social_icon_list[WhatsApp]" <?php echo isset($s_share_icon_list['WhatsApp'])?'checked':'';?> value="fab fa-whatsapp">
								<label for="social_icon_list[WhatsApp]">
									<div class="s-share-icon whatsapp">
										<i class="fab fa-whatsapp" aria-hidden="true"></i>
									</div> 
								</label>
								<label for="social_icon_list[WhatsApp]" class="s-share-icon-text"><?php echo esc_html__('WhatsApp','htsocialshare-btn'); ?></label>
							</li>
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[Skype]" name="social_icon_list[Skype]" <?php echo isset($s_share_icon_list['Skype'])?'checked':'';?> value="fab fa-skype">
								<label for="social_icon_list[Skype]">
									<div class="s-share-icon skype">
										<i class="fab fa-skype" aria-hidden="true"></i>
									</div> 
								</label>
								<label for="social_icon_list[Skype]" class="s-share-icon-text"><?php echo esc_html__('Skype','htsocialshare-btn'); ?></label>
							</li>
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[reddit]" name="social_icon_list[reddit]" <?php echo isset($s_share_icon_list['reddit'])?'checked':'';?> value="fab fa-reddit-alien">
								<label for="social_icon_list[reddit]">
									<div class="s-share-icon reddit">
										<i class="fab fa-reddit-alien" aria-hidden="true"></i>
									</div> 
								</label>
								<label for="social_icon_list[reddit]" class="s-share-icon-text"><?php echo esc_html__('reddit','htsocialshare-btn'); ?></label>
							</li>
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[Gmail]" name="social_icon_list[Gmail]" <?php echo isset($s_share_icon_list['Gmail'])?'checked':'';?> value="far fa-envelope">
								<label for="social_icon_list[Gmail]">
									<div class="s-share-icon gmail">
										<i class="far fa-envelope"></i>
									</div> 
								</label>
								<label for="social_icon_list[Gmail]" class="s-share-icon-text"><?php echo esc_html__('Gmail','htsocialshare-btn'); ?></label>
							</li>
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[Instagram]" name="social_icon_list[Instagram]" <?php echo isset($s_share_icon_list['Instagram'])?'checked':'';?> value="fab fa-instagram">
								<label for="social_icon_list[Instagram]">
									<div class="s-share-icon instagram">
										<i class="fab fa-instagram" aria-hidden="true"></i>
									</div> 
								</label>
								<label for="social_icon_list[Instagram]" class="s-share-icon-text"><?php echo esc_html__('Instagram','htsocialshare-btn'); ?></label>
							</li>
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[YouTube]" name="social_icon_list[YouTube]" <?php echo isset($s_share_icon_list['YouTube'])?'checked':'';?> value="fab fa-youtube">
								<label for="social_icon_list[YouTube]">
									<div class="s-share-icon youtube">
										<i class="fab fa-youtube"></i>
									</div> 
								</label>
								<label for="social_icon_list[YouTube]" class="s-share-icon-text"><?php echo esc_html__('YouTube','htsocialshare-btn'); ?></label>
							</li>
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[WordPress]" name="social_icon_list[WordPress]" <?php echo isset($s_share_icon_list['WordPress'])?'checked':'';?> value="fab fa-wordpress">
								<label for="social_icon_list[WordPress]">
									<div class="s-share-icon wordpress">
										<i class="fab fa-wordpress" aria-hidden="true"></i>
									</div> 
								</label>
								<label for="social_icon_list[WordPress]" class="s-share-icon-text"><?php echo esc_html__('WordPress','htsocialshare-btn'); ?></label>
							</li>
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[Google Bookmarks]" name="social_icon_list[Google Bookmarks]" <?php echo isset($s_share_icon_list['Google Bookmarks'])?'checked':'';?> value="fab fa-google">
								<label for="social_icon_list[Google Bookmarks]">
									<div class="s-share-icon google">
										<i class="fab fa-google" aria-hidden="true"></i>
									</div> 
								</label>
								<label for="social_icon_list[Google Bookmarks]" class="s-share-icon-text"><?php echo esc_html__('Google Bookmarks','htsocialshare-btn'); ?></label>
							</li>
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[Messenger]" name="social_icon_list[Messenger]" <?php echo isset($s_share_icon_list['Messenger'])?'checked':'';?> value="fab fa-facebook-messenger">
								<label for="social_icon_list[Messenger]">
									<div class="s-share-icon messenger">
										<i class="fab fa-facebook-messenger"></i>
									</div> 
								</label>
								<label for="social_icon_list[Messenger]" class="s-share-icon-text"><?php echo esc_html__('Messenger','htsocialshare-btn'); ?></label>
							</li>
							<li>
								<input type="checkbox" class="social-icon-list" id="social_icon_list[LINE]" name="social_icon_list[LINE]" <?php echo isset($s_share_icon_list['LINE'])?'checked':'';?> value="fab fa-line">
								<label for="social_icon_list[LINE]">
									<div class="s-share-icon line">
										<i class="fab fa-line"></i>
									</div>
								</label>
								<label for="social_icon_list[LINE]" class="s-share-icon-text"><?php echo esc_html__('LINE','htsocialshare-btn'); ?></label>
							</li>
						</ul>
					</div>
				</div>
			</td>
		</tr>
		<tr class="facebook-app-id">
			<?php $s_share_fbapp_id = get_option( 'facebook_app_id' )?get_option( 'facebook_app_id' ):''; ?>
			<th scope="row"><?php echo esc_html__('Facebook App ID','htsocialshare-btn'); ?></th>
			<td>
				<input type="text" class="regular-text" id="facebook_app_id" name="facebook_app_id" value="<?php  echo esc_attr($s_share_fbapp_id); ?>"/>
				<p class="description"><?php echo esc_html__( 'Don\'t have Facebook App ID ','htsocialshare-btn'); ?><a href="<?php echo esc_url('https://developers.facebook.com/'); ?>" target="_blank">Create Facebook App ID</a></p>
			</td>
		</tr>
		<tr class="youtube-url">
			<?php $s_share_youtube_username = get_option( 'youtube_username' )?get_option( 'youtube_username' ):''; ?>
			<th scope="row"><?php echo esc_html__('YouTube URL','htsocialshare-btn'); ?></th>
			<td>
				<input type="text" class="regular-text" id="youtube_username" name="youtube_username" value="<?php  echo esc_attr($s_share_youtube_username); ?>"/>
				<p class="description"><?php echo esc_html__( 'Enter YouTube Channel URL.','htsocialshare-btn'); ?></p>
			</td>
		</tr>
		<tr class="instagram-username">
			<?php $s_share_instagram_username = get_option( 'instagram_username' )?get_option( 'instagram_username' ):''; ?>
			<th scope="row"><?php echo esc_html__('Instagram Username','htsocialshare-btn'); ?></th>
			<td >
				<input type="text" class="regular-text" id="instagram_username" name="instagram_username" value="<?php  echo esc_attr($s_share_instagram_username); ?>"/>
				<p class="description"><?php echo esc_html__( 'Enter Instagram Username.','htsocialshare-btn'); ?></p>
			</td>
		</tr>
	</tbody>
</table>