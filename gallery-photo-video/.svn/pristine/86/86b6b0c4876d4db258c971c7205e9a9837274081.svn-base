<section class="GPV_wrapper GPV_wrapper_<?php echo $id;?> clearfix">
	<?php 
	if($data_setting['GPV_setting_title']=='Yes'){?>
	<div class="heading_title">
		<h2 class="grid-title"><?php _e( ucfirst(get_the_title($id)), GPV_TEXTDOMAIN ); ?></h2>
	</div>
	<?php	}	?>
	<?php 
	if(!empty($GPV_Record[0])){
		?>
		<div class="gpv_container GPV_my-grid_<?php echo $id;?> gpv_cfix">
			<?php 
			foreach ($GPV_Record as $data) {
				if($data_setting["GPV_setting_column_layout"]==1){
					$crop_img=$data['GPV_img_url'];
				}else if($data_setting["GPV_setting_column_layout"]<=4){
					$crop_img=$data['gpv_img_500'];
				}
				?>		
				<!-- GPV item start -->
				<div class="grid-item" >
					<div class="grid-thumbnail">
						<div class="grid-thumbnail-content pic" style="color:#FFF;">						
							<img class="img-responsive" src="<?php echo esc_url($crop_img); ?>" alt="<?php echo esc_attr($data['GPV_image_title']); ?>">
							<?php 
							if($data_setting['GPV_setting_icon_open']=='Yes'){
								if($data['GPV_select']=='Video'){ ?>
								<div class="gpv-play-icon"></div>
								<?php } }?>
								<span class="pic-caption <?php echo($data_setting['GPV_setting_hover_effect_show']=='Yes')?$data_setting['GPV_setting_hover_effect']:''; ?>">
									<h2 class="hover-label"><?php _e( ucfirst($data['GPV_image_title']), GPV_TEXTDOMAIN ); ?></h2>										
								</span>
							</div>
							<div class="grid-arrow"></div>	
						</div>
						<div class="grid-details">
							<span class="grid-close"></span>
							<div class="grid-details-content">
								<div class="grid_container grid_exemplo">
									<div class="row">
										<div class="col-md-6 gpv_cfix">
											<?php 
											if($data['GPV_select']=='Image'){
												?>
												<img class="img-responsive animated_gpv" src="<?php echo esc_url($data['GPV_img_url']); ?>" alt="<?php echo esc_attr($data['GPV_image_title']); ?>">
												<?php
											}else if($data['GPV_select']=='Video'){

												if(!empty($data['GPV_video_url'])){
													if (preg_match('/youtube/',$data['GPV_video_url'])){
														$embed_url= explode('=', $data['GPV_video_url']);
														$embed_url='https://www.youtube.com/embed/'.end($embed_url);		

													}else if(preg_match('/vimeo/',$data['GPV_video_url'])){
														$embed_url= explode('/', $data['GPV_video_url']);		
														$embed_url='https://player.vimeo.com/video/'.end($embed_url);
													}													
													?>
													<iframe class="video v1" style="width:100%; height:<?php echo (!empty($data['GPV_video_iframe']))?$data["GPV_video_iframe"]:'300'; ?>px;" src="<?php echo esc_url(esc_url($embed_url));?>" frameborder="0" allowfullscreen></iframe>
													<?php
												}else{
													?>
													<img class="img-responsive animated_gpv" src="<?php echo esc_url($data['GPV_img_url']); ?>" alt="<?php echo esc_attr($data['GPV_image_title']); ?>">
													<?php
												}
											}else if($data['GPV_select']=='Link'){
												?>
												<img class="img-responsive animated_gpv" src="<?php echo esc_url($data['GPV_img_url']); ?>" alt="<?php echo esc_attr($data['GPV_image_title']); ?>">
												<?php												
											}
											?>
										</div>
										<div class="col-md-6">
											<?php if($data_setting['GPV_setting_label']=='Yes'){?>
											<h2 class="animated_gpv grid-image-label"><?php _e( ucfirst($data['GPV_image_title']), GPV_TEXTDOMAIN ); ?></h2><hr>
											<?php }	?>
											<?php 
											if($data_setting['GPV_setting_description']=='Yes'){?>
											<p class="animated_gpv grid-description">

												<?php 
												if(empty($data_setting['GPV_setting_description_char']) || $data_setting['GPV_setting_description_char']>=401 )
												{
													$data_setting['GPV_setting_description_char']=400;
												}
														//echo substr($data['GPV_description'] ,0,$data_setting['GPV_setting_description_char']); 
												_e( substr($data['GPV_description'] ,0,$data_setting['GPV_setting_description_char']), GPV_TEXTDOMAIN );
												?>
											</p>
											<?php }	?>
											<?php												
											if($data['GPV_select']=='Image'){
												$btnurl=$data['GPV_img_url'];
												?>											
												<a href="<?php echo $btnurl;?>" <?php echo $lightboxclass; ?> title="<?php echo $data['GPV_button_text']; ?>" target="<?php echo $linkopen; ?>" ><?php _e( $data['GPV_button_text'], GPV_TEXTDOMAIN ); ?>
												</a>
												<?php										

											}else if($data['GPV_select']=='Video'){
												$btnurl=$data['GPV_video_url'];
												if(empty($btnurl)){
													$btnurl=$data['GPV_img_url'];
												}
												?>
												<a href="<?php echo $btnurl;?>" <?php echo $lightboxclass; ?> title="<?php echo $data['GPV_button_text']; ?>" target="<?php echo $linkopen; ?>" ><?php _e( $data['GPV_button_text'], GPV_TEXTDOMAIN ); ?>
												</a>
												<?php
											}else if($data['GPV_select']=='Link'){
												$btnurl=esc_url($data['GPV_link']);
												$lightboxclass='class=""';
												?>
												<a  href="<?php echo $btnurl;?>"  <?php echo $lightboxclass; ?> title="<?php echo $data['GPV_button_text']; ?>" target="<?php echo $linkopen; ?>" ><?php _e( $data['GPV_button_text'], GPV_TEXTDOMAIN ); ?></a>
												<?php
											}																							
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- GPV item end -->	
					<?php 
				}
				?>	

			</div>
			<?php
		}else{
			?>
			<h2 style="text-align:center; color:red; margin-top: 20px!important;"><?php _e( 'Empty Gallery.', GPV_TEXTDOMAIN ); ?></h2>
			<?php
		}
		?>				
	</section>