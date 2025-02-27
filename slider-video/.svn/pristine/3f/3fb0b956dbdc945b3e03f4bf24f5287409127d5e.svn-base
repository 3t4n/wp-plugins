
				<div id="RW_Load_SVS_Navigation<?php echo esc_html($Rich_Web_VSlider_ID); ?>" style="<?php if($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_SimpleVS_Loading_Show == "on") { ?>display: block;<?php } else { ?>display: none;<?php } ?>">
					<div class="center_content<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
						<?php if($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_SimpleVS_L_Show == "on") { ?>
							<?php if($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_SimpleVS_L_T == "Type 1") { ?>
								<div class="RW_Loader_Frame_Navigation RW_Loader_Frame_Navigation<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
									<div class="loader_Navigation1 loader_Navigation1<?php echo esc_html($Rich_Web_VSlider_ID); ?>" id="loader_Navigation1"></div>
									<div class="loader_Navigation2 loader_Navigation2<?php echo esc_html($Rich_Web_VSlider_ID); ?>" id="loader_Navigation2"></div>
									<div class="loader_Navigation3 loader_Navigation3<?php echo esc_html($Rich_Web_VSlider_ID); ?>" id="loader_Navigation3"></div>
									<div class="loader_Navigation4" id="loader_Navigation4"></div>
								</div>
							<?php } elseif($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_SimpleVS_L_T == "Type 2") { ?>
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
							<?php } elseif($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_SimpleVS_L_T == "Type 3") { ?>
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
							<?php } elseif($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_SimpleVS_L_T == "Type 4") { ?>
								<div class="cssload-thecube<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
									<div class="cssload-cube cssload-c1"></div>
									<div class="cssload-cube cssload-c2"></div>
									<div class="cssload-cube cssload-c4"></div>
									<div class="cssload-cube cssload-c3"></div>
								</div>
							<?php } ?>
						<?php } ?>
						<?php if($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_SimpleVS_LT_Show == "on") { ?>
							<?php if($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_SimpleVS_LT_T == "Type 1") { ?>
								<div class="cssload-loader<?php echo esc_html($Rich_Web_VSlider_ID); ?>"><?php echo  esc_attr($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_SimpleVS_LT);?></div>
							<?php } elseif($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_SimpleVS_LT_T == "Type 2") { ?>
								<div id="inTurnFadingTextG<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
									<?php foreach($text_array as $key=>$v){ ?>
										<div id="inTurnFadingTextG<?php echo esc_html($Rich_Web_VSlider_ID); ?>_<?php echo esc_attr($key + 1); ?>" class="inTurnFadingTextG<?php echo esc_html($Rich_Web_VSlider_ID); ?>"><?php echo esc_attr($v); ?></div>
									<?php } ?>
								</div>
							<?php } elseif($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_SimpleVS_LT_T == "Type 3") { ?>
								<div class="cssload-preloader<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
									<div class="cssload-preloader<?php echo esc_html($Rich_Web_VSlider_ID); ?>-box">
										<?php foreach($text_array as $key=>$v){ ?>
											<div><?php echo esc_attr($v); ?></div>
										<?php } ?>
									</div>
								</div>
							<?php } elseif($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_SimpleVS_LT_T == "Type 4") { ?>
								<div class="RW_Loader_Text_Navigation<?php echo esc_html($Rich_Web_VSlider_ID); ?>">
									<?php echo  esc_attr($Rich_Web_VSlider_Eff_Loader[0]->Rich_Web_SimpleVS_LT);?>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
				<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++) {
					if(strpos($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img, 'youtube') > 0)
					{
						$rest_vd_url = substr($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img, 0, -13);
						$link_vd_sl = $rest_vd_url.'maxresdefault.jpg';
						if (!@fopen("$link_vd_sl",'r')) { $link_vd_sl = $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img; }
					}
					else
					{
						$link_vd_sl = $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;
					}
				?>
					<img class="img_simple<?php echo  esc_attr($Rich_Web_Video);?>" src="<?php echo  esc_url($link_vd_sl);?>" style="display:none;"/>
				<?php } ?>
				<div class="RichWeb_SVS RichWeb_SVS_<?php echo esc_attr($Rich_Web_Video);?>" style="display:none;">
					<div id="Rich_Web_VS_SVS_<?php echo esc_attr($Rich_Web_Video);?>">
						<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++) {
							if(strpos($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img, 'youtube') > 0)
							{
								$rest_vd_url = substr($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img, 0, -13);
								$link_vd_sl = $rest_vd_url.'maxresdefault.jpg';
								if (!@fopen("$link_vd_sl",'r')) { $link_vd_sl = $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img; }
							}
							else
							{
								$link_vd_sl = $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;
							}
						?>
						<img src="<?php echo  esc_url($link_vd_sl);?>" data-src-2x="<?php echo  esc_url($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src);?>" data-caption="#caption-<?php echo  esc_attr($Rich_Web_Video . $i);?>"/>
						<?php } ?>
					</div>
					<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?>
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_T_Show == 'on' || $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_D_Show == 'on'){ ?>
							<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title != '' || $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc != ''){ ?>
								<div id="caption-<?php echo  esc_attr($Rich_Web_Video . $i);?>" style="display:none;">
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title != '' && $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_T_Show == 'on'){ ?>
										<span><?php echo wp_unslash(html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title));?></span>
									<?php }?>
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc != '' && $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_D_Show == 'on'){ ?>
										<?php echo wp_unslash(html_entity_decode(str_replace(chr(34), chr(39),$Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc)));?>
										<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link != ''){ ?>
											<a href="<?php echo  esc_url($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link);?>" target="<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_ONT=='checked'){ echo '_blank'; } ?>"><?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_LText);?></a>
										<?php }?>
									<?php }?>
								</div>
							<?php }?>
						<?php }?>
					<?php } ?>
					<a class="Rich_Web_SVS_Nav Rich_Web_SVS_Prev Rich_Web_SVS_Prev_<?php echo esc_attr($Rich_Web_Video);?>" onclick="RIch_Web_SVS_Close_Video(<?php echo esc_attr($Rich_Web_Video);?>)"><i class='rich_web rich_web-<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_Type);?>-left' ></i></a>
					<a class="Rich_Web_SVS_Nav Rich_Web_SVS_Next Rich_Web_SVS_Next_<?php echo esc_attr($Rich_Web_Video);?>" onclick="RIch_Web_SVS_Close_Video(<?php echo esc_attr($Rich_Web_Video);?>)"><i class='rich_web rich_web-<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_Type);?>-right' ></i></a>
					<iframe src="" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					<div class="Rich_Web_VSlider_SVS_PlayIcon" >
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_AP=="on"){ ?>
							<span onclick="RIch_Web_SVS_Play_Video(<?php echo  esc_attr($Rich_Web_Video);?>, 'on')"> 
						<i class="rich_web rich_web-play"></i></span>
					   <?php }
					   elseif(empty($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_AP)){ ?>
					   	<span onclick="RIch_Web_SVS_Play_Video(<?php echo  esc_attr($Rich_Web_Video);?>, ' ')"> 
					   		<i class="rich_web rich_web-play"></i></span>
					 <?php } ?>
					</div>
				</div>
				<input type='text' style='display:none;' class='RichVSTitle<?php echo esc_html($Rich_Web_VSlider_ID); ?>' value='<?php echo  esc_attr($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_TFS);?>'>