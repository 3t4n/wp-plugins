<!-- layout fields and colors section start-->
<div class="tab-pane <?php if(esc_html($tab) == "wacout_fld_clr"){echo "active";}?>" id="wacout_metabox_side_tab3">
	<div class="wacout_layout_stng_sidebar">
		<ul class="nav wacout_stng_nav">
			<li><a href="#wacout_metabox_layout_tab1" class="wacout_side_tab active" data-bs-toggle="tab"><?php _e('Sections Heading' , 'wacout') ;?></a></li>
			<li><a href="#wacout_metabox_layout_tab2" class="wacout_side_tab" data-bs-toggle="tab"><?php _e('Fields Settings' , 'wacout') ;?></a></li>
			
		</ul>
	</div>
	<div class="wacout_layout_stng_cntnt">
		<!-- start general setting-->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="wacout_metabox_layout_tab1">
				<div class="tabpane_inner">
					<?php
					   if(isset($temp_layout_section_label['wacout_billing_heading']) && !empty($temp_layout_section_label['wacout_billing_heading'])){
						   $billing = sanitize_text_field($temp_layout_section_label['wacout_billing_heading']);
					   } else{ $billing = ""; }


					   if(isset($temp_layout_section_label['wacout_shipping_heading']) && !empty($temp_layout_section_label['wacout_shipping_heading'])){
						   $shipping = sanitize_text_field($temp_layout_section_label['wacout_shipping_heading']);
					   } else{ $shipping = ""; }

					   if(isset($temp_layout_section_label['wacout_order_heading']) && !empty($temp_layout_section_label['wacout_order_heading'])){
						   $order = sanitize_text_field($temp_layout_section_label['wacout_order_heading']);
					   } else{ $order = ""; }

					   if(isset($temp_layout_section_label['wacout_related_heading']) && !empty($temp_layout_section_label['wacout_related_heading'])){
						   $related = sanitize_text_field($temp_layout_section_label['wacout_related_heading']);
					   } else{ $related = ""; }

					   if(isset($temp_layout_section_label['wacout_payment_heading']) && !empty($temp_layout_section_label['wacout_payment_heading'])){
						   $payment = sanitize_text_field($temp_layout_section_label['wacout_payment_heading']);
					   } else{ $payment = ""; }

					?>
					<div id="sec_hdng_acrdng">								
					<h3><?php _e('Sections Heading' , 'wacout') ;?></h3>
					<div class="form-table">
						<div class="fm_group mb_20">
							<div class="fm_in">
								<div class="fm_lbl"><?php _e('Billing' , 'wacout') ;?></div>
								<input class="fm_ctrl" type="text" name="wacout_sec_lbl[wacout_billing_heading]" value="<?php echo esc_attr($billing); ?>" />
							</div>
						</div>
						<div class="fm_group mb_20">
							<div class="fm_in">
								<div class="fm_lbl"><?php _e('Shipping' , 'wacout') ;?></div>
								<input class="fm_ctrl" type="text" name="wacout_sec_lbl[wacout_shipping_heading]" value="<?php echo esc_attr($shipping); ?>" />
							</div>
						</div>
						<div class="fm_group mb_20">
							<div class="fm_in">
								<div class="fm_lbl"><?php _e('Order Details' , 'wacout') ;?></div>
								<input class="fm_ctrl" type="text" name="wacout_sec_lbl[wacout_order_heading]" value="<?php echo esc_attr($order); ?>" />
							</div>
						</div>
						<div class="fm_group mb_20">
							<div class="fm_in">
								<div class="fm_lbl"><?php _e('Related Product' , 'wacout') ;?></div>
								<td>
									<input class="fm_ctrl" type="text" name="wacout_sec_lbl[wacout_related_heading]" value="<?php echo esc_attr($related); ?>" />
							</div>
						</div>
						<div class="fm_group">
							<div class="fm_in">
								<div class="fm_lbl"><?php _e('Payment Information' , 'wacout') ;?></div>
								<input class="fm_ctrl" type="text" name="wacout_sec_lbl[wacout_payment_heading]" value="<?php echo esc_attr($payment); ?>" />
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="wacout_metabox_layout_tab2">
				<div class="tabpane_inner">
					<?php

					   /*
					   ** Fields Custom label
					   */
					   if(isset($temp_layout_field_lbl['billing_first_name']) && !empty($temp_layout_field_lbl['billing_first_name'])){ $wacout_billing_first_name = sanitize_text_field($temp_layout_field_lbl['billing_first_name']); } else{ $wacout_billing_first_name = ""; }

					   if(isset($temp_layout_field_lbl['billing_last_name']) && !empty($temp_layout_field_lbl['billing_last_name'])){ $wacout_billing_last_name = sanitize_text_field($temp_layout_field_lbl['billing_last_name']); } else{ $wacout_billing_last_name = ""; }

					   if(isset($temp_layout_field_lbl['billing_company']) && !empty($temp_layout_field_lbl['billing_company'])){ $wacout_billing_company = sanitize_text_field($temp_layout_field_lbl['billing_company']); } else{ $wacout_billing_company = ""; }

					   if(isset($temp_layout_field_lbl['billing_country']) && !empty($temp_layout_field_lbl['billing_country'])){ $wacout_billing_country = sanitize_text_field($temp_layout_field_lbl['billing_country']); } else{ $wacout_billing_country = ""; }

					   if(isset($temp_layout_field_lbl['billing_phone']) && !empty($temp_layout_field_lbl['billing_phone'])){ $wacout_billing_phone = sanitize_text_field($temp_layout_field_lbl['billing_phone']); } else{ $wacout_billing_phone = ""; }

					   if(isset($temp_layout_field_lbl['billing_email']) && !empty($temp_layout_field_lbl['billing_email'])){ $wacout_billing_email = sanitize_text_field($temp_layout_field_lbl['billing_email']); } else{ $wacout_billing_email = ""; }

					   if(isset($temp_layout_field_lbl['shipping_first_name']) && !empty($temp_layout_field_lbl['shipping_first_name'])){ $wacout_shipping_first_name = sanitize_text_field($temp_layout_field_lbl['shipping_first_name']); } else{ $wacout_shipping_first_name = ""; }

					   if(isset($temp_layout_field_lbl['shipping_last_name']) && !empty($temp_layout_field_lbl['shipping_last_name'])){ $wacout_shipping_last_name = sanitize_text_field($temp_layout_field_lbl['shipping_last_name']); } else{ $wacout_shipping_last_name = ""; }

					   if(isset($temp_layout_field_lbl['shipping_company']) && !empty($temp_layout_field_lbl['shipping_company'])){ $wacout_shipping_company = sanitize_text_field($temp_layout_field_lbl['shipping_company']); } else{ $wacout_shipping_company = ""; }

					   if(isset($temp_layout_field_lbl['shipping_country']) && !empty($temp_layout_field_lbl['shipping_country'])){ $wacout_shipping_country = sanitize_text_field($temp_layout_field_lbl['shipping_country']); } else{ $wacout_shipping_country = ""; }

					   if(isset($temp_layout_field_lbl['address_1']) && !empty($temp_layout_field_lbl['address_1'])){ $wacout_address_1 = sanitize_text_field($temp_layout_field_lbl['address_1']); } else{ $wacout_address_1 = ""; }

					   if(isset($temp_layout_field_lbl['city']) && !empty($temp_layout_field_lbl['city'])){ $wacout_city = sanitize_text_field($temp_layout_field_lbl['city']); } else{ $wacout_city = ""; }

					   if(isset($temp_layout_field_lbl['state']) && !empty($temp_layout_field_lbl['state'])){ $wacout_state = sanitize_text_field($temp_layout_field_lbl['state']); } else{ $wacout_state = ""; }

					   if(isset($temp_layout_field_lbl['postcode']) && !empty($temp_layout_field_lbl['postcode'])){ $wacout_postcode = sanitize_text_field($temp_layout_field_lbl['postcode']); } else{ $wacout_postcode = ""; }


						/*
					   ** Fields Custom Class
					   */
					   if(isset($temp_layout_field_lbl['fields_class']['billing_first_name_class']) && !empty($temp_layout_field_lbl['fields_class']['billing_first_name_class'])){ $wacout_billing_first_name_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['billing_first_name_class']); } else{ $wacout_billing_first_name_class = ""; }

					   if(isset($temp_layout_field_lbl['fields_class']['billing_last_name_class']) && !empty($temp_layout_field_lbl['fields_class']['billing_last_name_class'])){ $wacout_billing_last_name_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['billing_last_name_class']); } else{ $wacout_billing_last_name_class = ""; }

					   if(isset($temp_layout_field_lbl['fields_class']['billing_company_class']) && !empty($temp_layout_field_lbl['fields_class']['billing_company_class'])){ $wacout_billing_company_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['billing_company_class']); } else{ $wacout_billing_company_class = ""; }

					   if(isset($temp_layout_field_lbl['fields_class']['billing_country_class']) && !empty($temp_layout_field_lbl['fields_class']['billing_country_class'])){ $wacout_billing_country_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['billing_country_class']); } else{ $wacout_billing_country_class = ""; }

					   if(isset($temp_layout_field_lbl['fields_class']['billing_phone_class']) && !empty($temp_layout_field_lbl['fields_class']['billing_phone_class'])){ $wacout_billing_phone_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['billing_phone_class']); } else{ $wacout_billing_phone_class = ""; }

					   if(isset($temp_layout_field_lbl['fields_class']['billing_email_class']) && !empty($temp_layout_field_lbl['fields_class']['billing_email_class'])){ $wacout_billing_email_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['billing_email_class']); } else{ $wacout_billing_email_class = ""; }

					   if(isset($temp_layout_field_lbl['fields_class']['shipping_first_name_class']) && !empty($temp_layout_field_lbl['fields_class']['shipping_first_name_class'])){ $wacout_shipping_first_name_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['shipping_first_name_class']); } else{ $wacout_shipping_first_name_class = ""; }

					   if(isset($temp_layout_field_lbl['fields_class']['shipping_last_name_class']) && !empty($temp_layout_field_lbl['fields_class']['shipping_last_name_class'])){ $wacout_shipping_last_name_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['shipping_last_name_class']); } else{ $wacout_shipping_last_name_class = ""; }

					   if(isset($temp_layout_field_lbl['fields_class']['shipping_company_class']) && !empty($temp_layout_field_lbl['fields_class']['shipping_company_class'])){ $wacout_shipping_company_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['shipping_company_class']); } else{ $wacout_shipping_company_class = ""; }

					   if(isset($temp_layout_field_lbl['fields_class']['shipping_country_class']) && !empty($temp_layout_field_lbl['fields_class']['shipping_country_class'])){ $wacout_shipping_country_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['shipping_country_class']); } else{ $wacout_shipping_country_class = ""; }

					   if(isset($temp_layout_field_lbl['fields_class']['address_1_class']) && !empty($temp_layout_field_lbl['fields_class']['address_1_class'])){ $wacout_address_1_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['address_1_class']); } else{ $wacout_address_1_class = ""; }

					   if(isset($temp_layout_field_lbl['fields_class']['city_class']) && !empty($temp_layout_field_lbl['fields_class']['city_class'])){ $wacout_city_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['city_class']); } else{ $wacout_city_class = ""; }

					   if(isset($temp_layout_field_lbl['fields_class']['state_class']) && !empty($temp_layout_field_lbl['fields_class']['state_class'])){ $wacout_state_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['state_class']); } else{ $wacout_state_class = ""; }

					   if(isset($temp_layout_field_lbl['fields_class']['postcode_class']) && !empty($temp_layout_field_lbl['fields_class']['postcode_class'])){ $wacout_postcode_class = sanitize_html_class($temp_layout_field_lbl['fields_class']['postcode_class']); } else{ $wacout_postcode_class = ""; }


					  /*
					   ** Fields Required
					   */
					 $req_fields = get_post_meta( $meta_id->ID,'_wacout_fields_req',true );

					 if(isset($req_fields['billing_first_name_req']) && !empty($req_fields['billing_first_name_req'])){ $wacout_billing_first_name_req =  absint($req_fields['billing_first_name_req']); }else{ $wacout_billing_first_name_req = null; }

					 if(isset($req_fields['billing_last_name_req']) && !empty($req_fields['billing_last_name_req'])){ $wacout_billing_last_name_req =  absint($req_fields['billing_last_name_req']); }else{ $wacout_billing_last_name_req = null; }

					 if(isset($req_fields['billing_company_req']) && !empty($req_fields['billing_company_req'])){ $wacout_billing_company_req =  absint($req_fields['billing_company_req']); }else{ $wacout_billing_company_req = null; }

					 if(isset($req_fields['billing_country_req']) && !empty($req_fields['billing_country_req'])){ $wacout_billing_country_req =  absint($req_fields['billing_country_req']); }else{ $wacout_billing_country_req = null; }

					 if(isset($req_fields['billing_phone_req']) && !empty($req_fields['billing_phone_req'])){ $wacout_billing_phone_req =  absint($req_fields['billing_phone_req']); }else{ $wacout_billing_phone_req = null; }

					 if(isset($req_fields['billing_email_req']) && !empty($req_fields['billing_email_req'])){ $wacout_billing_email_req =  absint($req_fields['billing_email_req']); }else{ $wacout_billing_email_req = null; }

					 if(isset($req_fields['shipping_first_name_req']) && !empty($req_fields['shipping_first_name_req'])){ $wacout_shipping_first_name_req =  absint($req_fields['shipping_first_name_req']); }else{ $wacout_shipping_first_name_req = null; }

					 if(isset($req_fields['shipping_last_name_req']) && !empty($req_fields['shipping_last_name_req'])){ $wacout_shipping_last_name_req =  absint($req_fields['shipping_last_name_req']); }else{ $wacout_shipping_last_name_req = null; }

					 if(isset($req_fields['shipping_company_req']) && !empty($req_fields['shipping_company_req'])){ $wacout_shipping_company_req =  absint($req_fields['shipping_company_req']); }else{ $wacout_shipping_company_req = null; }

					 if(isset($req_fields['shipping_country_req']) && !empty($req_fields['shipping_country_req'])){ $wacout_shipping_country_req =  absint($req_fields['shipping_country_req']); }else{ $wacout_shipping_country_req = null; }

					 if(isset($req_fields['address_1_req']) && !empty($req_fields['address_1_req'])){ $wacout_address_1_req =  absint($req_fields['address_1_req']); }else{ $wacout_address_1_req = null; }

					 if(isset($req_fields['city_req']) && !empty($req_fields['city_req'])){ $wacout_city_req =  absint($req_fields['city_req']); }else{ $wacout_city_req = null; }

					 if(isset($req_fields['state_req']) && !empty($req_fields['state_req'])){ $wacout_state_req =  absint($req_fields['state_req']); }else{ $wacout_state_req = null; }

					 if(isset($req_fields['postcode_req']) && !empty($req_fields['postcode_req'])){ $wacout_postcode_req =  absint($req_fields['postcode_req']); }else{ $wacout_postcode_req = null; }



					?>
					<div class="wacout_flds_lbls_wrap">
						<div class="tcol_row">
						<div id="fld_stng_acrdng" style="width:100%">
							<div class="frm_field_div">
								<h3><?php _e('Billing Details Fields' , 'wacout') ;?></h3>
								<div class="tcol_2">
									<div class="tcol_in">												
										<div class="form-table">
											<div class="fm_group mb_20">
												<div class="fm_in">
													<div class="fm_lbl"></div>
													<div class="fmf_vipt"><strong><?php _e('Label' , 'wacout') ;?></strong></div>
													<div class="fmf_vipt"><strong><?php _e('Class' , 'wacout') ;?></strong></div>
													<div class="fmf_viptreq"><strong><?php _e('Required?' , 'wacout') ;?></strong></div>
												</div>
											</div>
											<div class="fm_group mb_20">
												<div class="fm_in">
													<div class="fm_lbl"><?php _e('First name' , 'wacout') ;?></div>
													<div class="fmf_vipt">
														<input class="fm_ctrl" type="text" name="wacout_flds_lbls[billing_first_name]" value="<?php echo esc_attr($wacout_billing_first_name); ?>">

													</div>
													<div class="fmf_vipt">
														<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][billing_first_name_class]" value="<?php echo esc_attr($wacout_billing_first_name_class); ?>">

													</div>
													<div class="fmf_viptreq">
														<label class="switch">
															<input type="checkbox" class="required" name="fields_required[billing_first_name_req]" <?php checked( 1, esc_html($wacout_billing_first_name_req) ) ?> value="1"/>
															<span class="slider round"></span>
														</label>

													</div>
												</div>
											</div>
											<div class="fm_group mb_20">
												<div class="fm_in">
													<div class="fm_lbl"><?php _e('Last name' , 'wacout') ;?></div>
													<div class="fmf_vipt"><input class="fm_ctrl" type="text" name="wacout_flds_lbls[billing_last_name]" value="<?php echo esc_attr($wacout_billing_last_name); ?>"></div>
													<div class="fmf_vipt">
														<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][billing_last_name_class]" value="<?php echo esc_attr($wacout_billing_last_name_class); ?>">
													</div>
													<div class="fmf_viptreq">
														<label class="switch">
															<input type="checkbox" class="required" name="fields_required[billing_last_name_req]" <?php checked( 1, esc_html($wacout_billing_last_name_req) ) ?> value="1"/>
															<span class="slider round"></span>
														</label>
													</div>
												</div>
											</div>
											<div class="fm_group mb_20">
												<div class="fm_in">
													<div class="fm_lbl"><?php _e('Company name' , 'wacout') ;?></div>
													<div class="fmf_vipt"><input class="fm_ctrl" type="text" name="wacout_flds_lbls[billing_company]" value="<?php echo esc_attr($wacout_billing_company); ?>"></div>
													<div class="fmf_vipt">
														<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][billing_company_class]" value="<?php echo esc_attr($wacout_billing_company_class); ?>">
													</div>
													<div class="fmf_viptreq">
														<label class="switch">
															<input type="checkbox" class="required" name="fields_required[billing_company_req]" <?php checked( 1, esc_html($wacout_billing_company_req) ) ?> value="1"/>
															<span class="slider round"></span>
														</label>
													</div>
												</div>
											</div>
											<div class="fm_group mb_20">
												<div class="fm_in">
													<div class="fm_lbl"><?php _e('Country / Region' , 'wacout') ;?></div>
													<div class="fmf_vipt"><input class="fm_ctrl" type="text" name="wacout_flds_lbls[billing_country]" value="<?php echo esc_attr($wacout_billing_country); ?>"></div>
													<div class="fmf_vipt">
														<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][billing_country_class]" value="<?php echo esc_attr($wacout_billing_country_class); ?>">
													</div>
													<div class="fmf_viptreq">
														<label class="switch">
															<input type="checkbox" class="required" name="fields_required[billing_country_req]" <?php checked( 1, esc_html($wacout_billing_country_req) ) ?> value="1"/>
															<span class="slider round"></span>
														</label>
													</div>
												</div>
											</div>
											<div class="fm_group mb_20">
												<div class="fm_in">
													<div class="fm_lbl"><?php _e('Phone' , 'wacout') ;?></div>
													<div class="fmf_vipt"><input class="fm_ctrl" type="text" name="wacout_flds_lbls[billing_phone]" value="<?php echo esc_attr($wacout_billing_phone); ?>"></div>
													<div class="fmf_vipt">
														<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][billing_phone_class]" value="<?php echo esc_attr($wacout_billing_phone_class); ?>">
													</div>
													<div class="fmf_viptreq">
														<label class="switch">
															<input type="checkbox" class="required" name="fields_required[billing_phone_req]" <?php checked( 1, esc_html($wacout_billing_phone_req) ) ?> value="1"/>

															<span class="slider round"></span>
														</label>
													</div>
												</div>
											</div>
											<div class="fm_group">
												<div class="fm_in">
													<div class="fm_lbl"><?php _e('Email address' , 'wacout') ;?></div>
													<div class="fmf_vipt"><input class="fm_ctrl" type="text" name="wacout_flds_lbls[billing_email]" value="<?php echo esc_attr($wacout_billing_email); ?>"></div>
													<div class="fmf_vipt">
														<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][billing_email_class]" value="<?php echo esc_attr($wacout_billing_email_class); ?>">
													</div>
													<div class="fmf_viptreq">
														<label class="switch">
															<input type="checkbox" class="required" name="fields_required[billing_email_req]" <?php checked( 1, esc_html($wacout_billing_email_req) ) ?> value="1"/>

															<span class="slider round"></span>
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="frm_field_div">
								<h3><?php _e('Shipping Details Fields' , 'wacout') ;?></h3>
								<div class="tcol_2">
									<div class="tcol_in">												
										<div class="form-table">
											<div class="fm_group mb_20">
												<div class="fm_in">
													<div class="fm_lbl"></div>
													<div class="fmf_vipt"><strong><?php _e('Label' , 'wacout') ;?></strong></div>
													<div class="fmf_vipt"><strong><?php _e('Class' , 'wacout') ;?></strong></div>
													<div class="fmf_viptreq"><strong><?php _e('Required?' , 'wacout') ;?></strong></div>
												</div>
											</div>
											<div class="fm_group mb_20">
												<div class="fm_in">
													<div class="fm_lbl"><?php _e('First name' , 'wacout') ;?></div>
													<div class="fmf_vipt"><input class="fm_ctrl" type="text" name="wacout_flds_lbls[shipping_first_name]" value="<?php echo esc_attr($wacout_shipping_first_name); ?>"></div>
													<div class="fmf_vipt">
														<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][shipping_first_name_class]" value="<?php echo esc_attr($wacout_shipping_first_name_class); ?>">
													</div>
													<div class="fmf_viptreq">
														<label class="switch">
															<input type="checkbox" class="required" name="fields_required[shipping_first_name_req]" <?php checked( 1, esc_html($wacout_shipping_first_name_req) ) ?> value="1"/>

															<span class="slider round"></span>
														</label>
													</div>
												</div>
											</div>
											<div class="fm_group mb_20">
												<div class="fm_in">
													<div class="fm_lbl"><?php _e('Last name' , 'wacout') ;?></div>
													<div class="fmf_vipt"><input class="fm_ctrl" type="text" name="wacout_flds_lbls[shipping_last_name]" value="<?php echo esc_attr($wacout_shipping_last_name); ?>"></div>
													<div class="fmf_vipt">
														<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][shipping_last_name_class]" value="<?php echo esc_attr($wacout_shipping_last_name_class); ?>">
													</div>
													<div class="fmf_viptreq">
														<label class="switch">
															<input type="checkbox" class="required" name="fields_required[shipping_last_name_req]" <?php checked( 1, esc_html($wacout_shipping_last_name_req) ) ?> value="1"/>

															<span class="slider round"></span>
														</label>
													</div>
												</div>
											</div>
											<div class="fm_group mb_20">
												<div class="fm_in">
													<div class="fm_lbl"><?php _e('Company name' , 'wacout') ;?></div>
													<div class="fmf_vipt"><input class="fm_ctrl" type="text" name="wacout_flds_lbls[shipping_company]" value="<?php echo esc_attr($wacout_shipping_company); ?>"></div>
													<div class="fmf_vipt">
														<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][shipping_company_class]" value="<?php echo esc_attr($wacout_shipping_company_class); ?>">
													</div>
													<div class="fmf_viptreq">
														<label class="switch">
															<input type="checkbox" class="required" name="fields_required[shipping_company_req]" <?php checked( 1, esc_html($wacout_shipping_company_req) ) ?> value="1"/>
															<span class="slider round"></span>
														</label>
													</div>
												</div>
											</div>
											<div class="fm_group">
												<div class="fm_in">
													<div class="fm_lbl"><?php _e('Country / Region' , 'wacout') ;?></div>
													<div class="fmf_vipt"><input class="fm_ctrl" type="text" name="wacout_flds_lbls[shipping_country]" value="<?php echo esc_attr($wacout_shipping_country); ?>"></div>
													<div class="fmf_vipt">
														<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][shipping_country_class]" value="<?php echo esc_attr($wacout_shipping_country_class); ?>">
													</div>
													<div class="fmf_viptreq">
														<label class="switch">
															<input type="checkbox" class="required" name="fields_required[shipping_country_req]" <?php checked( 1, esc_html($wacout_shipping_country_req) ) ?> value="1"/>
															<span class="slider round"></span>
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<h3><?php _e('Common Fields' , 'wacout') ;?></h3>
							<div class="tcol_2">
								<div class="tcol_in">												
									<div class="form-table">
										<div class="fm_group mb_20">
											<div class="fm_in">
												<div class="fm_lbl"></div>
												<div class="fmf_vipt"><strong><?php _e('Label' , 'wacout') ;?></strong></div>
												<div class="fmf_vipt"><strong><?php _e('Class' , 'wacout') ;?></strong></div>
												<div class="fmf_viptreq"><strong><?php _e('Required?' , 'wacout') ;?></strong></div>
											</div>
										</div>
										<div class="fm_group mb_20">
											<div class="fm_in">
												<div class="fm_lbl"><?php _e('Street address' , 'wacout') ;?></div>
												<div class="fmf_vipt"><input class="fm_ctrl" type="text" name="wacout_flds_lbls[address_1]" value="<?php echo esc_attr($wacout_address_1); ?>"></div>
												<div class="fmf_vipt">
													<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][address_1_class]" value="<?php echo esc_attr($wacout_address_1_class); ?>">
												</div>
												<div class="fmf_viptreq">
													<label class="switch">
														<input type="checkbox" class="required" name="fields_required[address_1_req]" <?php checked( 1, esc_html($wacout_address_1_req) ) ?> value="1"/>
														<span class="slider round"></span>
													</label>
												</div>
											</div>
										</div>
										<div class="fm_group mb_20">
											<div class="fm_in">
												<div class="fm_lbl"><?php _e('Town / City' , 'wacout') ;?></div>
												<div class="fmf_vipt"><input class="fm_ctrl" type="text" name="wacout_flds_lbls[city]" value="<?php echo esc_attr($wacout_city); ?>"></div>
												<div class="fmf_vipt">
													<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][city_class]" value="<?php echo esc_attr($wacout_city_class); ?>">
												</div>
												<div class="fmf_viptreq">
													<label class="switch">
														<input type="checkbox" class="required" name="fields_required[city_req]" <?php checked( 1, esc_html($wacout_city_req) ) ?> value="1"/>
														<span class="slider round"></span>
													</label>
												</div>
											</div>
										</div>
										<div class="fm_group mb_20">
											<div class="fm_in">
												<div class="fm_lbl"><?php _e('State' , 'wacout') ;?></div>
												<div class="fmf_vipt"><input class="fm_ctrl" type="text" name="wacout_flds_lbls[state]" value="<?php echo esc_attr($wacout_state); ?>"></div>
												<div class="fmf_vipt">
													<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][state_class]" value="<?php echo esc_attr($wacout_state_class); ?>">
												</div>
												<div class="fmf_viptreq">
													<label class="switch">
														<input type="checkbox" class="required" name="fields_required[state_req]" <?php checked( 1, esc_html($wacout_state_req) ) ?> value="1"/>
														<span class="slider round"></span>
													</label>
												</div>
											</div>
										</div>
										<div class="fm_group">
											<div class="fm_in">
												<div class="fm_lbl"><?php _e('ZIP' , 'wacout') ;?></div>
												<div class="fmf_vipt"><input class="fm_ctrl" type="text" name="wacout_flds_lbls[postcode]" value="<?php echo esc_attr($wacout_postcode); ?>"></div>
												<div class="fmf_vipt">
													<input type="text" class="fm_ctrl" name="wacout_flds_lbls[fields_class][postcode_class]" value="<?php echo esc_attr($wacout_postcode_class); ?>">
												</div>
												<div class="fmf_viptreq">
													<label class="switch">
														<input type="checkbox" class="required" name="fields_required[postcode_req]" <?php checked( 1, esc_html($wacout_postcode_req) ) ?> value="1"/>
														<span class="slider round"></span>
													</label>
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
			</div>
			
		</div>
	</div>
	<div class="clear"></div>
</div>
<!-- layout fields and colors section end-->