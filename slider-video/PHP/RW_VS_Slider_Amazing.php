
			<div id="RW_Load_ASS_Navigation<?php echo esc_html($Rich_Web_VSlider_ID); ?>" style="<?php if($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_ASSl_Loading_Show == "on") { ?>display: block;<?php } else { ?>display: none;<?php } ?>">
				<div class="center_content<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
					<?php if($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_ASSl_L_Show == "on") { ?>
						<?php if($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_ASSl_L_T == "Type 1") { ?>
							<div class="RW_Loader_Frame_Navigation RW_Loader_Frame_Navigation<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
								<div class="loader_Navigation1 loader_Navigation1<?php echo esc_html($Rich_Web_VSlider_ID); ?>" id="loader_Navigation1"></div>
								<div class="loader_Navigation2 loader_Navigation2<?php echo esc_html($Rich_Web_VSlider_ID); ?>" id="loader_Navigation2"></div>
								<div class="loader_Navigation3 loader_Navigation3<?php echo esc_html($Rich_Web_VSlider_ID); ?>" id="loader_Navigation3"></div>
								<div class="loader_Navigation4" id="loader_Navigation4"></div>
							</div>
						<?php } elseif($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_ASSl_L_T == "Type 2") { ?>
							<div class="overlay-loader<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
								<div class="loader<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
									<div></div>
									<div></div>
									<div></div>
									<div></div>
									<div></div>
									<div></div>
									<div></div>
								</div>
							</div>
						<?php } elseif($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_ASSl_L_T == "Type 3") { ?>
							<div class="windows8<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
								<div class="wBall" id="wBall_1">
									<div class="wInnerBall"></div>
								</div>
								<div class="wBall" id="wBall_2">
									<div class="wInnerBall"></div>
								</div>
								<div class="wBall" id="wBall_3">
									<div class="wInnerBall"></div>
								</div>
								<div class="wBall" id="wBall_4">
									<div class="wInnerBall"></div>
								</div>
								<div class="wBall" id="wBall_5">
									<div class="wInnerBall"></div>
								</div>
							</div>
						<?php } elseif($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_ASSl_L_T == "Type 4") { ?>
							<div class="cssload-thecube<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
								<div class="cssload-cube cssload-c1"></div>
								<div class="cssload-cube cssload-c2"></div>
								<div class="cssload-cube cssload-c4"></div>
								<div class="cssload-cube cssload-c3"></div>
							</div>
						<?php } ?>
					<?php } ?>
					<?php if($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_ASSl_LT_Show == "on") { ?>
						<?php if($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_ASSl_LT_T == "Type 1") { ?>
							<div class="cssload-loader<?php echo esc_html($Rich_Web_VSlider_ID); ?>"><?php echo  esc_attr($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_ASSl_LT);?></div>
						<?php } elseif($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_ASSl_LT_T == "Type 2") { ?>
							<div id="inTurnFadingTextG<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
								<?php foreach($text_array as $key=>$v){ ?>
									<div id="inTurnFadingTextG<?php echo esc_html($Rich_Web_VSlider_ID); ?>_<?php echo esc_attr($key + 1); ?>" class="inTurnFadingTextG<?php echo esc_html($Rich_Web_VSlider_ID); ?>"><?php echo esc_attr($v); ?></div>
								<?php } ?>
							</div>
						<?php } elseif($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_ASSl_LT_T == "Type 3") { ?>
							<div class="cssload-preloader<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
								<div class="cssload-preloader<?php echo esc_html($Rich_Web_VSlider_ID); ?>-box">
									<?php foreach($text_array as $key=>$v){ ?>
										<div><?php echo esc_attr($v); ?></div>
									<?php } ?>
								</div>
							</div>
						<?php } elseif($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_ASSl_LT_T == "Type 4") { ?>
							<div class="RW_Loader_Text_Navigation<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
								<?php echo  esc_attr($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_ASSl_LT);?>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
			<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++) {
				if(strpos($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img, 'youtube') > 0)
				{
					$rest = substr($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img, 0, -13);
					$link = $rest.'maxresdefault.jpg';
					if (!@fopen("$link",'r')) { $link = $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img; }
				}
				else
				{
					$link = $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;
				}
			?>
				<img class="rw_hidden_imgs<?php echo esc_html($Rich_Web_VSlider_ID); ?>" src="<?php echo  esc_url($link); ?>" style="display:none;">
			<?php } ?>
			<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Show == 'on') {$RW_SV_SL_ACTIVE = 'active';} ?>
				<div class="RW_CONTENT_LEFT_RIGHT_<?php echo esc_html($Rich_Web_VSlider_ID); ?>" style="height:0;opacity:0;">
					<div class="RW_SV_NSV_<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
						<span class="countVideoes<?php echo esc_html($Rich_Web_VSlider_ID); ?>"></span>
						<div id="RW_SV_Slider_Wrap_<?php echo esc_html($Rich_Web_VSlider_ID); ?>" class="<?php echo esc_attr($RW_SV_SL_ACTIVE);?>">
							<ul id="RW_SV_Slider_<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
								<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++) {
									if(strpos($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img, 'youtube') > 0)
									{
										$rest = substr($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img, 0, -13);
										$link = $rest.'maxresdefault.jpg';
										if (!@fopen("$link",'r')) { $link = $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img; }
									}
									else
									{
										$link = $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;
									}
								?>
									<li style="background-image: url(<?php echo  esc_url($link); ?>); background-repeat: no-repeat; background-size: 100% 100%;">
										<span style="display: none;" class="RW_SV_Slider_Link"><?php echo  esc_url($link); ?></span>
										<div class="RW_SV_Slider_Title_Div_<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
											<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_TO_NS1_Show == 'on') { ?>
												<h3><?php echo wp_unslash(html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title));?></h3>
											<?php } ?>
											
											<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_DO_NS1_Show == 'on') { ?>
												<div>
												<?php echo wp_unslash(html_entity_decode(str_replace(chr(34), chr(39),$Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc)));?>
												</div>
											<?php } ?>
										</div>
										<iframe style="display: none;" width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe>
										<a href="<?php echo esc_url( $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src);?>" class="rvs-nv-play-video" class="rvs-play-video rvs-play-video<?php echo esc_html($Rich_Web_VSlider_ID); ?>"></a>
									</li>
								<?php } ?>
							</ul>
							<div class="RW_SV_Btns_<?php echo esc_html($Rich_Web_VSlider_ID); ?>" id="RW_SV_Next_<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Arrow_Type == 'icon') { ?>
									<i class="rich_web rich_web-<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Icon_Type);?>-right" aria-hidden="true"></i>
								<?php } else if($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Arrow_Type == 'image') { ?>
									<img width="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Width);?>" height="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Height);?>" src="<?php echo  plugin_dir_url(__DIR__)."Images/icons/icon-".$Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Image_Type."-".$Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Image_Type.".png";?>">
								<?php } ?>
							</div>
							<div class="RW_SV_Btns_<?php echo esc_html($Rich_Web_VSlider_ID); ?>" id="RW_SV_Previous_<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Arrow_Type == 'icon') { ?>
									<i class="rich_web rich_web-<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Icon_Type);?>-left" aria-hidden="true"></i>
								<?php } else if($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Arrow_Type == 'image') { ?>
									<img width="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Width);?>" height="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Height);?>" src="<?php echo  plugin_dir_url(__DIR__)."Images/icons/icon-".$Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Image_Type.".png";?>">
								<?php } ?>
							</div>
							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_TO_NS1_Num_Show == 'on') { ?> <div id="
							<?php echo esc_html($Rich_Web_VSlider_ID); ?>"></div> <?php } ?>
							<div class="RW_SV_Pagination_Wrap_<?php echo esc_html($Rich_Web_VSlider_ID); ?>"><ul></ul></div>
						</div>
						<input type="text" style="display: none;" class="RW_SV_Inp_Width<?php echo esc_html($Rich_Web_VSlider_ID); ?>"       value="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_GO_NS1_Width);?>">
						<input type="text" style="display: none;" class="RW_SV_Inp_Height<?php echo esc_html($Rich_Web_VSlider_ID); ?>"      value="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_GO_NS1_Height);?>">
						<input type="text" style="display: none;" class="RW_SV_Inp_FSize"       value="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_FSize);?>">
						<input type="text" style="display: none;" class="RW_SV_Inp_Img_Width"   value="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Width);?>">
						<input type="text" style="display: none;" class="RW_SV_Inp_Img_Height"  value="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_IO_NS1_Height);?>">
						<input type="text" style="display: none;" class="RW_SV_Inp_Title_FSize" value="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_TO_NS1_FSize);?>">
						<input type="text" style="display: none;" class="RW_SV_Inp_Num_FSize"   value="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_TO_NS1_Num_FSize);?>">
						<input type="text" style="display: none;" class="RW_SV_Inp_Nav_Width"   value="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_PO_NS1_Width);?>">
						<input type="text" style="display: none;" class="RW_SV_Inp_Nav_Height"  value="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_PO_NS1_Height);?>">
						<input type="text" style="display: none;" class="rw_autoplay<?php echo esc_html($Rich_Web_VSlider_ID); ?>" value="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_GO_NS1_PTime);?>">
						<input type="text" style="display:none;" class="rw_autoplay_OnOf<?php echo esc_html($Rich_Web_VSlider_ID); ?>" value="<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_GO_NS1_Autoplay);?>">
					</div>
				</div>