<!-- layout fields and colors section start-->
<div class="tab-pane <?php if(esc_html($tab) == "wacout_temp_style"){echo "active";}?>" id="wacout_metabox_side_tab3">
	<div class="wacout_layout_stng_sidebar">
		<ul class="nav wacout_stng_nav">
			
			<li><a href="#wacout_metabox_layout_tab3" class="wacout_side_tab active" data-bs-toggle="tab"><?php _e( 'Color options' , 'wacout' ) ;?></a></li>
			<li><a href="#wacout_metabox_layout_tab4" class="wacout_side_tab" data-bs-toggle="tab"><?php _e( 'Button Settings' , 'wacout' ) ;?></a></li>
		</ul>
	</div>
	<div class="wacout_layout_stng_cntnt">
		<!-- start general setting-->
		<div class="tab-content">
			
			<div role="tabpanel" class="tab-pane active" id="wacout_metabox_layout_tab3">
				<div class="tabpane_inner">
					<?php

					  if(isset($temp_layout_styling_option['one_column_styling']['one_column_width']) && !empty($temp_layout_styling_option['one_column_styling']['one_column_width'])){ $wacout_one_column_width = absint($temp_layout_styling_option['one_column_styling']['one_column_width']); } else{ $wacout_one_column_width = "500"; }


					   if(isset($temp_layout_styling_option['section_style']['sec_bdr_width']) && !empty($temp_layout_styling_option['section_style']['sec_bdr_width'])){ $wacout_sec_bdr_width = absint($temp_layout_styling_option['section_style']['sec_bdr_width']); } elseif(isset($temp_layout_styling_option['section_style']['sec_bdr_width']) && ($temp_layout_styling_option['section_style']['sec_bdr_width'] == 0) ){$wacout_sec_bdr_width = "0";}else{ $wacout_sec_bdr_width = "6"; }

					   if(isset($temp_layout_styling_option['section_style']['sec_padding']) && !empty($temp_layout_styling_option['section_style']['sec_padding'])){ $wacout_sec_padding = absint($temp_layout_styling_option['section_style']['sec_padding']); }else{ $wacout_sec_padding = "30"; }

					   if(isset($temp_layout_styling_option['heading_style']['hd_background']) && !empty($temp_layout_styling_option['heading_style']['hd_background'])){ $wacout_hd_background = sanitize_hex_color($temp_layout_styling_option['heading_style']['hd_background']); } else{ $wacout_hd_background = "#007ead"; }

					   if(isset($temp_layout_styling_option['heading_style']['hd_font_color']) && !empty($temp_layout_styling_option['heading_style']['hd_font_color'])){ $wacout_hd_font_color = sanitize_hex_color($temp_layout_styling_option['heading_style']['hd_font_color']); } else{ $wacout_hd_font_color = "#ffffff"; }

					   if(isset($temp_layout_styling_option['heading_style']['hd_font_size']) && !empty($temp_layout_styling_option['heading_style']['hd_font_size'])){ $wacout_hd_font_size = absint($temp_layout_styling_option['heading_style']['hd_font_size']); } else{ $wacout_hd_font_size = "24"; }

					   if(isset($temp_layout_styling_option['form_fields_style']['lbl_font_color']) && !empty($temp_layout_styling_option['form_fields_style']['lbl_font_color'])){ $wacout_lbl_font_color = sanitize_hex_color($temp_layout_styling_option['form_fields_style']['lbl_font_color']); } else{ $wacout_lbl_font_color = "#343434"; }

					   if(isset($temp_layout_styling_option['form_fields_style']['lbl_font_size']) && !empty($temp_layout_styling_option['form_fields_style']['lbl_font_size'])){ $wacout_lbl_font_size = absint($temp_layout_styling_option['form_fields_style']['lbl_font_size']); } else{ $wacout_lbl_font_size = "18"; }

					   if(isset($temp_layout_styling_option['form_fields_style']['fld_bdr_color']) && !empty($temp_layout_styling_option['form_fields_style']['fld_bdr_color'])){ $wacout_fld_bdr_color = sanitize_hex_color($temp_layout_styling_option['form_fields_style']['fld_bdr_color']); } else{ $wacout_fld_bdr_color = "#e2e2e2"; }

					   if(isset($temp_layout_styling_option['form_fields_style']['fld_bdr_size']) && !empty($temp_layout_styling_option['form_fields_style']['fld_bdr_size'])){ $wacout_fld_bdr_size = absint($temp_layout_styling_option['form_fields_style']['fld_bdr_size']); } else{ $wacout_fld_bdr_size = "2"; }

					?>
					<div id="clr_optn_acrdng">
						<div class="frm_field_div">
							<h3><?php _e('One Column Styling' , 'wacout') ;?></h3>
							<div class="form-table wacout_clr_opt">
								<div class="fm_group">
									<div class="fm_in">
										<div class="fm_lbl"><?php _e('Width' , 'wacout') ;?></div>
										<div class="wacout_range_slider fm_ctrl">
											<input class="wacout_rs" type="range" value="<?php echo esc_attr($wacout_one_column_width); ?>" name="wacout_layout_styling[one_column_styling][one_column_width]" min="400" max="1170">
											<span class="wacout_rsv"><?php esc_html_e($wacout_one_column_width)?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="frm_field_div">
							<h3><?php _e('Section style' , 'wacout') ;?></h3>
							<div class="form-table wacout_clr_opt">
								<div class="fm_group mb_20">
									<div class="fm_in">
										<div class="fm_lbl"><?php _e('Section border width' , 'wacout') ;?></div>
										<div class="wacout_range_slider fm_ctrl">
											<input class="wacout_rs" type="range" value="<?php echo esc_attr($wacout_sec_bdr_width); ?>" name="wacout_layout_styling[section_style][sec_bdr_width]" min="0" max="10">
											<span class="wacout_rsv"><?php esc_html_e($wacout_sec_bdr_width)?></span>
										</div>
									</div>
								</div>
								<div class="fm_group">
									<div class="fm_in">
										<div class="fm_lbl"><?php _e('Section padding' , 'wacout') ;?></div>
										<div class="wacout_range_slider fm_ctrl">
											<input class="wacout_rs" type="range" value="<?php echo esc_attr($wacout_sec_padding); ?>" name="wacout_layout_styling[section_style][sec_padding]" min="1" max="50">
											<span class="wacout_rsv"><?php esc_html_e($wacout_sec_padding)?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="frm_field_div">
							<h3><?php _e('Heading Style' , 'wacout') ;?></h3>
							<div class="form-table wacout_clr_opt">
								<div class="fm_group mb_20">
									<div class="fm_in">
										<div class="fm_lbl"><?php _e('Background' , 'wacout') ;?></div>
										<input class="color-picker" data-alpha="true" type="text" name="wacout_layout_styling[heading_style][hd_background]" value="<?php echo esc_attr($wacout_hd_background); ?>"/>
									</div>
								</div>
								<div class="fm_group mb_20">
									<div class="fm_in">
										<div class="fm_lbl"><?php _e('Font Color' , 'wacout') ;?></div>
										<input class="color-picker" data-alpha="true" type="text" name="wacout_layout_styling[heading_style][hd_font_color]" value="<?php echo esc_attr($wacout_hd_font_color); ?>"/>
									</div>
								</div>
								<div class="fm_group">
									<div class="fm_in">
										<div class="fm_lbl"><?php _e('Font Size' , 'wacout') ;?></div>
										<div class="wacout_range_slider fm_ctrl">
											<input class="wacout_rs" type="range" value="<?php echo esc_attr($wacout_hd_font_size); ?>" name="wacout_layout_styling[heading_style][hd_font_size]" min="1" max="50">
											<span class="wacout_rsv"><?php esc_html_e($wacout_hd_font_size)?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<h3><?php _e('Form Fields Style' , 'wacout') ;?></h3>
						<div class="form-table wacout_clr_opt">
							<div class="fm_group mb_20">
								<div class="fm_in">
									<div class="fm_lbl"><?php _e('Label Font Color' , 'wacout') ;?></div>
									<input class="color-picker" data-alpha="true" type="text" name="wacout_layout_styling[form_fields_style][lbl_font_color]" value="<?php echo esc_attr($wacout_lbl_font_color); ?>"/>
								</div>
							</div>
							<div class="fm_group mb_20">
								<div class="fm_in">
									<div class="fm_lbl"><?php _e('Label Font Size' , 'wacout') ;?></div>
									<div class="wacout_range_slider fm_ctrl">
										<input class="wacout_rs" type="range" value="<?php echo esc_attr($wacout_lbl_font_size); ?>" name="wacout_layout_styling[form_fields_style][lbl_font_size]" min="1" max="50">
										<span class="wacout_rsv"><?php esc_html_e($wacout_lbl_font_size)?></span>
									</div>
								</div>
							</div>
							<div class="fm_group mb_20">
								<div class="fm_in">
									<div class="fm_lbl"><?php _e('Fields border Color' , 'wacout') ;?></div>
									<input class="color-picker" data-alpha="true" type="text" name="wacout_layout_styling[form_fields_style][fld_bdr_color]" value="<?php echo esc_attr($wacout_fld_bdr_color); ?>"/>
								</div>
							</div>
							<div class="fm_group">
								<div class="fm_in">
									<div class="fm_lbl"><?php _e('Fields border Size' , 'wacout') ;?></div>
									<div class="wacout_range_slider fm_ctrl">
										<input class="wacout_rs" type="range" value="<?php echo esc_attr($wacout_fld_bdr_size); ?>" name="wacout_layout_styling[form_fields_style][fld_bdr_size]" min="1" max="50">
										<span class="wacout_rsv"><?php esc_html_e($wacout_fld_bdr_size)?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="wacout_metabox_layout_tab4">
				<div class="tabpane_inner">
					<?php
					   // button text
					   if(isset($temp_layout_button_text['apply_coupan_button']) && !empty($temp_layout_button_text['apply_coupan_button'])){ $wacout_apply_coupan_button = sanitize_text_field($temp_layout_button_text['apply_coupan_button']); } else{ $wacout_apply_coupan_button = ""; }

					   if(isset($temp_layout_button_text['place_order_button']) && !empty($temp_layout_button_text['place_order_button'])){ $wacout_place_order_button = sanitize_text_field($temp_layout_button_text['place_order_button']); } else{ $wacout_place_order_button = ""; }

					   // button style
					   if(isset($temp_layout_button_text['btn_setting']['button_background']) && !empty($temp_layout_button_text['btn_setting']['button_background'])){ $wacout_button_background = sanitize_hex_color($temp_layout_button_text['btn_setting']['button_background']); } else{ $wacout_button_background = "#fe3232"; }

					   if(isset($temp_layout_button_text['btn_setting']['button_bg_hvr']) && !empty($temp_layout_button_text['btn_setting']['button_bg_hvr'])){ $wacout_button_bg_hvr = sanitize_hex_color($temp_layout_button_text['btn_setting']['button_bg_hvr']); } else{ $wacout_button_bg_hvr = "#005c90"; }

					   if(isset($temp_layout_button_text['btn_setting']['button_font_color']) && !empty($temp_layout_button_text['btn_setting']['button_font_color'])){ $wacout_button_font_color = sanitize_hex_color($temp_layout_button_text['btn_setting']['button_font_color']); } else{ $wacout_button_font_color = "#ffffff"; }

					   if(isset($temp_layout_button_text['btn_setting']['button_border_color']) && !empty($temp_layout_button_text['btn_setting']['button_border_color'])){ $wacout_button_border_color = sanitize_hex_color($temp_layout_button_text['btn_setting']['button_border_color']); } else{ $wacout_button_border_color = "#fe3232"; }

					   if(isset($temp_layout_button_text['btn_setting']['button_border_size']) && !empty($temp_layout_button_text['btn_setting']['button_border_size'])){ $wacout_button_border_size = absint($temp_layout_button_text['btn_setting']['button_border_size']); } else{ $wacout_button_border_size = "1"; }

					   if(isset($temp_layout_button_text['btn_setting']['button_font_size']) && !empty($temp_layout_button_text['btn_setting']['button_font_size'])){ $wacout_button_font_size = absint($temp_layout_button_text['btn_setting']['button_font_size']); } else{ $wacout_button_font_size = "19"; }


					?>
					<div class="wacout_flds_lbls_wrap bts_box">
						<div id="btn_optn_acrdng">
							<div class="frm_field_div">
								<h3><?php _e('Button Text' , 'wacout') ;?></h3>
								<div class="form-table">
									<div class="fm_group mb_20">
										<div class="fm_in">
											<div class="fm_lbl"><?php _e('Apply Coupon' , 'wacout') ;?></div>
											<input class="fm_ctrl" type="text" name="wacout_btn_txt[apply_coupan_button]" value="<?php echo esc_attr($wacout_apply_coupan_button); ?>">
										</div>
									</div>
									<div class="fm_group">
										<div class="fm_in">
											<div class="fm_lbl"><?php _e('Place Order' , 'wacout') ;?></div>
											<input class="fm_ctrl" type="text" name="wacout_btn_txt[place_order_button]" value="<?php echo esc_attr($wacout_place_order_button); ?>">
										</div>
									</div>
								</div>
							</div>
							
						
							<h3><?php _e('Button Style' , 'wacout') ;?></h3>
							<div class="form-table wacout_btn_stng">
								<div class="fm_group mb_20">
									<div class="fm_in">
										<div class="fm_lbl"><?php _e('Background' , 'wacout') ;?></div>
										<input class="color-picker" data-alpha="true" type="text" name="wacout_btn_txt[btn_setting][button_background]" value="<?php echo esc_attr($wacout_button_background); ?>"/>
									</div>
								</div>
								<div class="fm_group mb_20">
									<div class="fm_in">
										<div class="fm_lbl"><?php _e('Background on Hover' , 'wacout') ;?></div>
										<input class="color-picker" data-alpha="true" type="text" name="wacout_btn_txt[btn_setting][button_bg_hvr]" value="<?php echo esc_attr($wacout_button_bg_hvr); ?>"/>
									</div>
								</div>
								<div class="fm_group mb_20">
									<div class="fm_in">
										<div class="fm_lbl"><?php _e('Font Color' , 'wacout') ;?></div>
										<input class="color-picker" data-alpha="true" type="text" name="wacout_btn_txt[btn_setting][button_font_color]" value="<?php echo esc_attr($wacout_button_font_color); ?>"/>
									</div>
								</div>
								<div class="fm_group mb_20">
									<div class="fm_in">
										<div class="fm_lbl"><?php _e('Border Color' , 'wacout') ;?></div>
										<input class="color-picker" data-alpha="true" type="text" name="wacout_btn_txt[btn_setting][button_border_color]" value="<?php echo esc_attr($wacout_button_border_color); ?>"/>
									</div>
								</div>
								<div class="fm_group mb_20">
									<div class="fm_in">
										<div class="fm_lbl"><?php _e('Border Size' , 'wacout') ;?></div>
										<div class="fm_ctrl wacout_range_slider">
											<input class="wacout_rs" type="range" value="<?php echo esc_attr($wacout_button_border_size); ?>" name="wacout_btn_txt[btn_setting][button_border_size]" min="1" max="20">
											<span class="wacout_rsv"><?php esc_html_e($wacout_button_border_size)?></span>
										</div>
									</div>
								</div>
								<div class="fm_group">
									<div class="fm_in">
										<div class="fm_lbl"><?php _e('Font Size' , 'wacout') ;?></div>
										<div class="fm_ctrl wacout_range_slider">
											<input class="wacout_rs" type="range" value="<?php echo esc_attr($wacout_button_font_size); ?>" name="wacout_btn_txt[btn_setting][button_font_size]" min="1" max="20">
											<span class="wacout_rsv"><?php esc_html_e($wacout_button_font_size)?></span>
										</div>
									</div>
								</div>
							</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<!-- layout fields and colors section end-->