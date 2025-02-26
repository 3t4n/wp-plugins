<?php
	settings_fields( 'rtwwwap_extra_features');
	$rtwalwm_extra_features = get_option( 'rtwwwap_extra_features_opt' );

	$rtwalwm_login_page_title = isset($rtwalwm_extra_features['login_shortcode_page']) ? $rtwalwm_extra_features['login_shortcode_page'] : '';

?>
<div class="rtwalwm-extra-features-main-wrapper">

<div class="rtwalwm-extra-features-wrap">
	<ul>
		<li class="active" data-target="rtwalwm_extra_general"> <a href="#"><?php esc_html_e( 'General', 'affiliaa-affiliate-program-with-mlm' ); ?></a> </li>
		<li data-target="rtwalwm_extra_label"> <a href="#"><?php esc_html_e( 'Labels', 'affiliaa-affiliate-program-with-mlm' ); ?></a> </li>
		<li data-target="rtwalwm_extra_bonus"> <a href="#"><?php esc_html_e( 'Bonus', 'affiliaa-affiliate-program-with-mlm' ); ?></a> </li>
		<li data-target="rtwalwm_extra_payment"> <a href="#"><?php esc_html_e( 'Payment', 'affiliaa-affiliate-program-with-mlm' ); ?></a> </li>
		<li data-target="rtwalwm_extra_notification"> 
			<a href="#"><?php esc_html_e( 'Notification', 'affiliaa-affiliate-program-with-mlm' ); ?><span id = "rtwalwm_pro_notification_level"></span></a> 
		</li>
		<li data-target="rtwalwm_extra_rank"> <a href="#"><?php esc_html_e( 'Rank', 'affiliaa-affiliate-program-with-mlm' ); ?></a> </li>

		<a class="rtwalwm-button" target="_blank" href=<?php echo esc_url("https://woocommerce.com/products/affiliate-and-referral/")?> ><?php esc_html_e( 'Get it now', 'affiliaa-affiliate-program-with-mlm' ); ?></a>
		<span id = "rtwalwm_pro_img_level_manual_referral"><img src="<?php echo esc_url( RTWALWM_URL.'assets/images/PRO.png' ); ?>" alt=""></span>
		

	</ul>
</div>
<div class ="rtwwdpdl_pro_text_overlay">

<div class="rtwalwm-extra-table-wrapper">
		<table class="rtwalwm-table form-table rtwalwm-show" id="rtwalwm_extra_general">
			<tbody>
				<tr>
					<th><?php esc_html_e( 'Select Affiliate Page', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						<?php
							$rtwalwm_affiliate_page_selected = get_option( 'rtwwwap_affiliate_page_id' );
							$rtwalwm_page_args = array(
											        'post_type'    => 'page',
											        'post_status'  => 'publish'
												);
							$rtwalwm_all_pages = get_pages( $rtwalwm_page_args );

						?>
						<p><select class="rtwalwm_select2_page" id="" name="rtwwwap_extra_features_opt[page]" >
							
							
							<option value="">
								<?php esc_html_e( "Select a Page", 'affiliaa-affiliate-program-with-mlm' ); ?>
							</option>
							<?php
								foreach( $rtwalwm_all_pages as $rtwalwm_page_key => $rtwalwm_page_value )
								{
							?>
									<option value="<?php echo esc_attr($rtwalwm_page_value->ID); ?>" <?php selected( $rtwalwm_affiliate_page_selected, $rtwalwm_page_value->ID ) ?> >
										<?php echo esc_html( $rtwalwm_page_value->post_title ); ?>
									</option>
							<?php
								}
							?>
						</select>
						
						
						</p>
						<br>
						<div class="descr"><?php printf( '%s - %s', esc_html_e( 'Use the following shortcode on the selected page', 'affiliaa-affiliate-program-with-mlm' ), '[rtwwwap_affiliate_page]' ); ?></div>
					</td>
				</tr>

				<tr>
					<th><?php esc_html_e( 'Affiliate Login page', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						<?php
							
							$rtwalwm_page_args = array(
											        'post_type'    => 'page',
											        'post_status'  => 'publish'
												);
							$rtwalwm_all_pages = get_pages( $rtwalwm_page_args );
						?>
						<p><select class="rtwalwm_select2_page" id="" name="" >
							<option value="">
								<?php esc_html_e( "Select a Page", 'affiliaa-affiliate-program-with-mlm' ); ?>
							</option>
							
						</select></p>
						<br>
						<div class="descr"><?php printf( '%s - %s', esc_html_e( 'Select page if your are using Login shortcode seprately', 'affiliaa-affiliate-program-with-mlm' ), '[rtwalwm_aff_login_page]' ); ?></div>
					</td>
				</tr>

				<tr>
					<th><?php esc_html_e( 'Affiliate Signup page ', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						<?php
						
							$rtwalwm_page_args = array(
											        'post_type'    => 'page',
											        'post_status'  => 'publish'
												);
							$rtwalwm_all_pages = get_pages( $rtwalwm_page_args );
						?>
						<p><select class="rtwalwm_select2_page" id="" name="" >
							<option value="">
								<?php esc_html_e( "Select a Page", 'affiliaa-affiliate-program-with-mlm' ); ?>
							</option>
							
						</select></p>
						<br>
						<div class="descr"><?php printf( '%s - %s', esc_html_e( 'Select page if your are using Register shortcode seprately', 'affiliaa-affiliate-program-with-mlm' ), '[rtwalwm_aff_reg_page]' ); ?></div>
					</td>
				</tr>
				<tr>
					<th><?php esc_html_e( 'Affiliate Page Template ', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						<p><select class="rtwalwm_select2_page" id="" name="rtwwwap_extra_features_opt[affiliate_page_template]">
						<?php
					
							$rtwalwm_select_affiliate_page_temp =  esc_attr(isset($rtwalwm_extra_features[ 'affiliate_page_template' ]) ?$rtwalwm_extra_features[ 'affiliate_page_template' ]  : 1);
						?>
							<option value="" selected>
								<?php esc_html_e( "Template 1", 'affiliaa-affiliate-program-with-mlm' ); ?>
							</option>
							<option value="" disabled>
								<?php esc_html_e( "Template 2", 'affiliaa-affiliate-program-with-mlm' ); ?>
							</option>
							<option value="" disabled>
								<?php esc_html_e( "Template 3", 'affiliaa-affiliate-program-with-mlm' ); ?>
							</option>
						</select></p>
						<br>
						<div class="descr"><?php printf( '%s', esc_html_e( 'Select Template for Affiliate Page ','affiliaa-affiliate-program-with-mlm' )); ?></div>
					</td>
				</tr>

			
				<?php
							if( RTWALWM_IS_WOO == 1 ){
								?>
									<tr>
										<th><?php esc_html_e( 'Show under My Account', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
										<td class="tr2">
											<?php
												$rtwalwm_show_in_woo_checked = esc_attr(isset( $rtwalwm_extra_features[ 'show_in_woo' ] ) ? $rtwalwm_extra_features[ 'show_in_woo' ] : 1);
											?>
											<p>
												<span class="rtwalwm-custom-radio">
													<input id="radio-13" type="radio" name="" value="" disabled /><?php esc_html_e( 'Yes', 'affiliaa-affiliate-program-with-mlm' ); ?>
													<label for="radio-13"></label>
												</span>
											</p>
											<p>
												<span class="rtwalwm-custom-radio">
													<input id="radio-14" type="radio" name="" value=""  disabled/><?php esc_html_e( 'No', 'affiliaa-affiliate-program-with-mlm' ); ?>
													<label for="radio-14"></label>
												</span>
											</p>
											<div class="descr"><?php esc_html_e( 'Activate to show under WooCommerce->My Account', 'affiliaa-affiliate-program-with-mlm' );?></div>
										</td>
									</tr>
								<?php
								}
							else if( RTWALWM_IS_WOO != 1 )
							{
				?>	
					<tr>
						<th><?php esc_html_e( 'Select Currency', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
						<td class="tr2">
						
							<p><select class="rtwalwm_select2_curr" id="" name="" disabled>
								
							</select></p>
							<br>
							<div class="descr"><?php printf( '%s', esc_html_e( 'By Default USD will be used', 'affiliaa-affiliate-program-with-mlm' ) ); ?></div>
						</td>
					</tr>
					
				<?php
					 }
				?>
				<tr>
					<th>
					 <?php esc_html_e( 'Upto Decimal Places', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
					 <input type="text" class="rtwalwm_admin_input_text" id="" name="" value="" placeholder="<?php esc_html_e( 'Enter Upto decimal places', 'affiliaa-affiliate-program-with-mlm' ); ?>" disabled/>
					 <br>
					 <div class="descr"><?php esc_html_e( 'This decimal places will used for calculating commission and showing numbers', 'affiliaa-affiliate-program-with-mlm' ); ?></div>
					</td>
			 	</tr>
				 <tr>
						<th>
						<?php esc_html_e( 'Hide Login Form', 'affiliaa-affiliate-program-with-mlm' ); ?>
						</th>
						<td class="tr2">
						
						<input id="rtwwwap_active_login_shortcode" type="checkbox" name="" />
								
				
						<div class="descr"><?php esc_html_e( 'Select this if you want to hide Login form on Affiliate Page', 'affiliaa-affiliate-program-with-mlm' ); ?></div>
						</td>
				</tr>
				<tr>
						<th>
						<?php esc_html_e( 'Hide Registration Form', 'affiliaa-affiliate-program-with-mlm' ); ?>
						</th>
						<td class="tr2">
						
						<input id="rtwwwap_active_registration_shortcode" type="checkbox" name=""  />
								
				
						<div class="descr"><?php esc_html_e( 'Select this if you want to hide Registration form on Affiliate Page', 'affiliaa-affiliate-program-with-mlm' ); ?></div>
						</td>
				</tr>
				<tr>
					<th><?php esc_html_e( 'Affiliate Verification', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						<p>
							<span class="rtwalwm-custom-radio">
								<input id="radio-1" type="radio" value="" disabled/><?php esc_html_e( 'On', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-1"></label>
							</span>
						</p>
						<p>
							<span class="rtwalwm-custom-radio">
								
								<input id="radio-2" type="radio"  value="" disabled/><?php esc_html_e( 'Off', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-2"></label>
							</span>
						</p>
						<div class="descr"><?php esc_html_e( 'Activate this feature if you want to check whether this user can be affiliate or not', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
				<tr>
					<th><?php esc_html_e( 'Mail to Admin', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						<p>
							<span class="rtwalwm-custom-radio">
								<input id="radio-11" type="radio"  value="" disabled /><?php esc_html_e( 'On', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-11"></label>
							</span>
						</p>
						<p>
							<span class="rtwalwm-custom-radio">
								
								<input id="radio-12" type="radio" value="" disabled/><?php esc_html_e( 'Off', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-12"></label>
							</span>
						</p>
						<div class="descr"><?php esc_html_e( 'Activate this feature if you want to get mails when a commission is generated', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
				<tr>
						<th><?php esc_html_e( 'Slug in Affiliate Link', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
						<td class="tr2">
							<input type="text" disabled/>
							<div class="descr"><?php esc_html_e( 'Replace rtwwwap_aff slug from Affiliate link', 'affiliaa-affiliate-program-with-mlm' );?></div>
						</td>
					</tr>
				<tr>
					<th><?php esc_html_e( 'Cookie Expiration', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						<input type="number" min="0"  value="" disabled/>
						<div class="descr"><?php esc_html_e( 'Enter Days after which referral cookie will expire ( Note: 0 days means cookie will expire when the browser will be closed )', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
				<tr>
					<th><?php esc_html_e( 'QR code for referral links', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						<p>
							<span class="rtwalwm-custom-radio">
								<input id="radio-3" type="radio" name="" value="" disabled /><?php esc_html_e( 'On', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-3"></label>
							</span>
						</p>
						<p>
							<span class="rtwalwm-custom-radio">
							
								<input id="radio-4" type="radio" name="" value="" disabled/><?php esc_html_e( 'Off', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-4"></label>
							</span>
						</p>
					</td>
				</tr>
				<tr>
					<th><?php esc_html_e( 'Enable/disable Email verification', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						<p>
							<span class="rtwalwm-custom-radio">
								<input id="radio-5" type="radio" name="" value="" disabled /><?php esc_html_e( 'On', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-5"></label>
							</span>
						</p>
						<p>
							<span class="rtwalwm-custom-radio">
							
								<input id="radio-6" type="radio" name="" value="" disabled/><?php esc_html_e( 'Off', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-6"></label>
							</span>
						</p>
					</td>
				</tr>
				<tr>
					<th>
						<?php esc_html_e( 'Custom css', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
						<textarea rows="4" class="rtwalwm_textarea_css" name=""  disabled></textarea>
						<div class="descr"><?php esc_html_e( 'Write custom css for frontend', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
			</tbody>
		</table>

		<!-- Label Table -->
		<table class="rtwalwm-table form-table rtwalwm-hide-table" id="rtwalwm_extra_label">
			<tbody>
			<tr>
					<th>
						<?php esc_html_e( 'Title for button "Become an Affiliate"', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
						<input type="text" class="rtwalwm_admin_input_text" id="rtwwwap_become_title" name="rtwwwap_extra_features_opt[become_title]" value="<?php echo isset( $rtwalwm_extra_features[ 'become_title' ] ) ? esc_attr($rtwalwm_extra_features[ 'become_title' ]) : ''; ?>"  placeholder="<?php esc_html_e( 'Enter Become an Affiliate button Title', 'affiliaa-affiliate-program-with-mlm' ); ?>"  />
					</td>
				</tr>	<div class="rtwalwm-popup-wrapper">
		
			  <h3 class="rtwalwm-popup-heading"><?php esc_html_e( 'Add Manual Referral', 'affiliaa-affiliate-program-with-mlm' ); ?></h3>
				
	
				<tr>
					<th>
						<?php esc_html_e( 'Title for Section "Benefits for being an Affiliate"', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
						<input type="text" class="rtwalwm_admin_input_text" id="rtwwwap_benefits_title" name="rtwwwap_extra_features_opt[benefits_title]" value="<?php echo isset( $rtwalwm_extra_features[ 'benefits_title' ] ) ? esc_attr($rtwalwm_extra_features[ 'benefits_title' ]) : ''; ?>" placeholder="<?php esc_html_e( 'Enter Benefits Section Title', 'affiliaa-affiliate-program-with-mlm' ); ?>" />
					</td>
				</tr>
				<tr class="rtwalwm_benefits">
					<th>
						<?php esc_html_e( 'Benefits for being an Affiliate', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
						<?php
							$rtwalwm_default_benefits = sprintf( "<ul><li>%s</li><li>%s</li><li>%s</li></ul>", esc_html__( 'Earn extra money just by marketing our products with our affiliate tools', 'affiliaa-affiliate-program-with-mlm' ), esc_html__( 'Earn wallet amount to buy products on our site', 'affiliaa-affiliate-program-with-mlm' ), esc_html__( 'Signup Bonus when someone signup from your shared link', 'affiliaa-affiliate-program-with-mlm' ));

							// for frontend wp_editor content
							$rtwalwm_extra_features_wp_editor = isset( $rtwalwm_extra_features[ 'aff_benefits' ] ) ? $rtwalwm_extra_features[ 'aff_benefits' ] : $rtwalwm_default_benefits;

							$rtwalwm_extra_features_wp_editor = html_entity_decode( $rtwalwm_extra_features_wp_editor );
							$rtwalwm_extra_features_wp_editor = stripslashes( $rtwalwm_extra_features_wp_editor );
							$rtwalwm_extra_features_editor_id 	= 'rtwmlbonusfrontendeditor';
							$rtwalwm_extra_features_settings 	=  array(
														'wpautop' 		=> false,
													'media_buttons' => false,
													'textarea_name' => 'rtwwwap_extra_features_opt[aff_benefits]',
													'textarea_rows' => 7
												
											);
							wp_editor( $rtwalwm_extra_features_wp_editor, $rtwalwm_extra_features_editor_id, $rtwalwm_extra_features_settings );
						?>
						<div class="descr"><?php esc_html_e( 'These benefits will be shown to the users, so that they will become an Affiliate', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
				<tr>
					<th>
						<?php esc_html_e( 'Label for Tab "Overview"', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
						<input type="text" class="rtwalwm_admin_input_text" name="" value="" placeholder="<?php esc_html_e( 'Enter Overview Label', 'affiliaa-affiliate-program-with-mlm' ); ?>" disabled/>
						<div class="descr"><?php esc_html_e( 'Enter title for Tab Overview in Affilate Dashboard Panel', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
				<tr>
					<th>
						<?php esc_html_e( 'Label for Tab "Commissions"', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
						<input type="text" class="rtwalwm_admin_input_text" name="" value="" placeholder="<?php esc_html_e( 'Enter Commission Label', 'affiliaa-affiliate-program-with-mlm' ); ?>" disabled/>
						<div class="descr"><?php esc_html_e( 'Enter title for Tab Commission in Affilate Dashboard Panel', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
				<tr>
					<th>
						<?php esc_html_e( 'Label for Tab "Affiliate Tools"', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
						<input type="text" class="rtwalwm_admin_input_text" name="" value="" placeholder="<?php esc_html_e( 'Enter Affilate Tools Label', 'affiliaa-affiliate-program-with-mlm' ); ?>"disabled />
						<div class="descr"><?php esc_html_e( 'Enter title for Tab Affiliate Tools in Affilate Dashboard Panel', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
				<tr>
					<th>
						<?php esc_html_e( 'Label for Tab "Download"', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
						<input type="text" class="rtwalwm_admin_input_text" name="" value="" placeholder="<?php esc_html_e( 'Enter Download Label', 'affiliaa-affiliate-program-with-mlm' ); ?>" disabled/>
						<div class="descr"><?php esc_html_e( 'Enter title for Tab Download in Affilate Dashboard Panel', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
				<tr>
					<th>
						<?php esc_html_e( 'Label for Tab "Payout"', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
						<input type="text" class="rtwalwm_admin_input_text" name="" value="" placeholder="<?php esc_html_e( 'Enter Payout Label', 'affiliaa-affiliate-program-with-mlm' ); ?>" disabled />
						<div class="descr"><?php esc_html_e( 'Enter title for Tab Payout in Affilate Dashboard Panel', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
				<tr>
					<th>
						<?php esc_html_e( 'Label for Tab "Profile"', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
						<input type="text" class="rtwalwm_admin_input_text" name="" placeholder="<?php esc_html_e( 'Enter Profile Label', 'affiliaa-affiliate-program-with-mlm' ); ?>" disabled/>
						<div class="descr"><?php esc_html_e( 'Enter title for Tab Profile in Affilate Dashboard Panel', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
			</tbody>
		</table>

		<!-- Bonus Table -->
		<table class="rtwalwm-table form-table rtwalwm-hide-table" id="rtwalwm_extra_bonus">
			<tbody>
				<tr>
					<th><?php esc_html_e( 'Signup Bonus Type', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						<p>
							<span class="rtwalwm-custom-radio">
								<input id="radio-9" type="radio" name="" value="" disabled /><?php esc_html_e( 'Referral Code', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-9"></label>
							</span>
						</p>
						<p>
							<span class="rtwalwm-custom-radio">

								<input id="radio-10" type="radio" name="" value="" disabled /><?php esc_html_e( 'Cookie ( Default )', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-10"></label>
							</span>
						</p>
						<div class="descr"><?php esc_html_e( '[ Note : When "REFFERAL CODE" is selected as Signup Bonus Type then "REFFERAL LINK(s)" will not be used for Commission Generation, Signup Bonus and adding member to MLM chain ]', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
				<tr>
					<th>
						<?php esc_html_e( 'Signup Bonus', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
						<input type="number" min="0" name="" value="" disabled />
						<div class="descr"><?php esc_html_e( 'Enter Amount to be given for referral signup (By default 0)', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
				
					<tr>
						<th>
							<?php esc_html_e( 'Performance Bonus', 'affiliaa-affiliate-program-with-mlm' ); ?>
						</th>
						<td class="tr2">
							<table>
								<thead>
									<th>
										<?php esc_html_e( 'Total Sale amount to unlock achievement', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</th>
									<th>
										<?php esc_html_e( 'Incentive', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</th>
									<th>
										<?php esc_html_e( 'Add/Remove row', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</th>	<div class="rtwalwm-popup-wrapper">
	
								</thead>
								<tbody class="rtwalwm_tbody rtwalwm_perf_table">
									
								
									<tr>
										<td>
											<input class="rtwalwm_sale_amount" type="number" min="1" name="" value="" disabled  />
										</td>
										<td>
											<input class="rtwalwm_incentive" type="number" min="0" name="" value="" disabled/>
										</td>
										<td>
											<span class="dashicons dashicons-plus-alt rtwalwm_add_new_row_perf" disabled></span>
											<span class="dashicons dashicons-dismiss rtwalwm_remove_row_perf" disabled></span>
										</td>
									</tr>
							
								</tbody>
							</table>
						</td>
					</tr>
				


				<tr>
					<th><?php esc_html_e( 'Social Media Share Buttons', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						<p>
							<span class="rtwalwm-checkbox">
				    			<input id="rtwalwm_checkbox_social_share" type="checkbox" name="" disabled />
				    			<label for="rtwalwm_checkbox_social_share"></label>
				    		</span>
				    	</p>
					</td>
				</tr>
				
				<tr class="rtwalwm_social_share_bonus">
					<th>
						<?php esc_html_e( 'Sharing Bonus', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
						<input type="number" min="0" step="0.01" name="" value="" disabled/>
						<div class="descr"><?php esc_html_e( 'Enter Amount to be given for Sharing a product on social media (By default 0)', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
				<tr class="rtwalwm_social_share_bonus_limit">
					<th>
						<?php esc_html_e( 'Sharing Bonus Limit', 'affiliaa-affiliate-program-with-mlm' ); ?>
					</th>
					<td class="tr2">
						<table>
							<thead>
								<th>
									<?php esc_html_e( 'Time Limit', 'affiliaa-affiliate-program-with-mlm' ); ?>
								</th>
								<th>
									<?php esc_html_e( 'Amount Limit', 'affiliaa-affiliate-program-with-mlm' ); ?>
								</th>
							</thead>
							<tbody class="rtwalwm_tbody">
								<tr>
									<td>
									
										<select class="rtwalwm_select2_sharing_bonus_time_limit" id="" name="" >
											<option value="" disabled>
												<?php esc_html_e( 'No Limit', 'affiliaa-affiliate-program-with-mlm' ); ?>
											</option>
											<option value="" disabled>
												<?php esc_html_e( 'Daily Limit', 'affiliaa-affiliate-program-with-mlm' ); ?>
											</option>
											<option value="" disabled>
												<?php esc_html_e( 'Weekly Limit', 'affiliaa-affiliate-program-with-mlm' ); ?>
											</option>
											<option value="" disabled>
												<?php esc_html_e( 'Monthly Limit', 'affiliaa-affiliate-program-with-mlm' ); ?>
											</option>
										</select>
									</td>
									<td>
										<input type="number" class="sharing_bonus_amount_limit" min="0" step="0.01" name="" value="" disabled/>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="descr"><?php esc_html_e( 'Enter Time and Amount after which Affiliate will not get the share bonus', 'affiliaa-affiliate-program-with-mlm' );?></div>
					</td>
				</tr>
			</tbody>
		</table>
		<!-- Bonus Table -->
		<table class="rtwalwm-table form-table rtwalwm-hide-table" id="rtwalwm_extra_payment">
			<tbody>
				<tr>
					<th><?php esc_html_e( 'Activate Paypal', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						<p>
							<span class="rtwalwm-checkbox">
				    			<input id="rtwalwm_checkbox_paypal" type="checkbox" name="" disabled />
				    			<label for="rtwalwm_checkbox_paypal"></label>
				    		</span>
				    	</p>
				    	<div class="rtwalwm-payment-wrapper">
							<span class="rtwalwm-custom-radio">
								<input class="rtwalwm_paypal_live_radio" id="radio-5" type="radio" name="" value="" disabled><?php esc_html_e( 'Paypal Live', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-5"></label>
							</span>
							<div class="">
								<input id="rtwalwm_paypal_live_id" type="text" name="" value="" placeholder="<?php esc_attr_e( 'Client ID', 'affiliaa-affiliate-program-with-mlm' ) ?>" disabled/>
							</div>
							<div class="">
								<input id="rtwalwm_paypal_live_secret" type="text" name="" value="" placeholder="<?php esc_attr_e( 'Client Secret', 'affiliaa-affiliate-program-with-mlm' ) ?>" disabled/>
							</div>
				    	</div>
				    	<div class="rtwalwm-payment-wrapper">
							<span class="rtwalwm-custom-radio">
								<input class="rtwalwm_paypal_sandbox_radio" id="radio-6" type="radio" name="" value="" disabled /><?php esc_html_e( 'Paypal Sandbox', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-6"></label>
							</span>
							<span class="">
								<input id="rtwalwm_paypal_sandbox_id" type="text" name="" value="" placeholder="<?php esc_attr_e( 'Client ID', 'affiliaa-affiliate-program-with-mlm' ) ?>" disabled/>
							</span>
							<span class="">
								<input id="rtwalwm_paypal_sandbox_secret" type="text" name="" value="" placeholder="<?php esc_attr_e( 'Client Secret', 'affiliaa-affiliate-program-with-mlm' ) ?>" disabled/>
							</span>
				    	</div>
					</td>
				</tr>
				<tr>
					<th><?php esc_html_e( 'Activate Stripe', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						<p>
							<span class="rtwalwm-checkbox">
				    			<input id="rtwalwm_checkbox_stripe" type="checkbox" name="" disabled />
				    			<label for="rtwalwm_checkbox_stripe"></label>
				    		</span>
				    	</p>
				    	<div class="rtwalwm-payment-wrapper">
							<span class="rtwalwm-custom-radio">
								<input class="rtwalwm_stripe_live_radio" id="radio-7" type="radio" name="" value=""  disabled/><?php esc_html_e( 'Stripe Live', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-7"></label>
							</span>
							<div class="">
								<input id="rtwalwm_stripe_live_id" type="text" name="" value="" placeholder="<?php esc_attr_e( 'Publishable Key', 'affiliaa-affiliate-program-with-mlm' ) ?>" disabled />
							</div>
							<div class="">
								<input id="rtwalwm_stripe_live_secret" type="text" name="" value="" placeholder="<?php esc_attr_e( 'Secret Key', 'affiliaa-affiliate-program-with-mlm' ) ?>" disabled/>
							</div>
				    	</div>
				    	<div class="rtwalwm-payment-wrapper">
							<span class="rtwalwm-custom-radio">
								<input class="rtwalwm_stripe_sandbox_radio" id="radio-8" type="radio" name="" value="" disabled/><?php esc_html_e( 'Stripe Sandbox', 'affiliaa-affiliate-program-with-mlm' ); ?>
								<label for="radio-8"></label>
							</span>
							<span class="">
								<input id="rtwalwm_stripe_sandbox_id" type="text" name="" value="" placeholder="<?php esc_attr_e( 'Publishable Key', 'affiliaa-affiliate-program-with-mlm' ) ?>" disabled/>
							</span>
							<span class="">
								<input id="rtwalwm_stripe_sandbox_secret" type="text" name="" value="" placeholder="<?php esc_attr_e( 'Secret Key', 'affiliaa-affiliate-program-with-mlm' ) ?>" disabled/>
							</span>
				    	</div>
					</td>
				</tr>

				<tr>
					<th><?php esc_html_e( 'Activate Paystack', 'affiliaa-affiliate-program-with-mlm' ); ?></th>
					<td class="tr2">
						
				    	<div class="rtwalwm-payment-wrapper">
							
							<span class="">
								<input id="rtwalwm_stripe_sandbox_id" type="text" name="" value="" placeholder="<?php esc_attr_e( 'Public Key', 'affiliaa-affiliate-program-with-mlm' ) ?>" disabled/>
							</span>
							<span class="">
								<input id="rtwalwm_stripe_sandbox_secret" type="text" name="" value="" placeholder="<?php esc_attr_e( 'Secret Key', 'affiliaa-affiliate-program-with-mlm' ) ?>" disabled/>
							</span>
				    	</div>
					</td>
				</tr>

			</tbody>
		</table>
		<!-- Notification table -->
		<table class="rtwalwm-table form-table rtwalwm-hide-table" id="rtwalwm_extra_notification">
				<tbody>
					<tr>
						<td><input type="button" class="rtwalwm-button rtwalwm_add_notification" value="<?php esc_html_e( 'Add Notification', 'affiliaa-affiliate-program-with-mlm' ); ?>"></td>
					</tr>
					<tr>
						<td class="tr2">
							<table class="rtwalwm_notification_table">
								<thead>
									<th>
										<?php esc_html_e( 'Title', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</th>
									<th>
										<?php esc_html_e( 'View / Edit', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</th>
									<th>
										<?php esc_html_e( 'Remove ', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</th>
								</thead>
								<tbody class="rtwalwm_noti_main">
									<?php
									$rtwalwm_noti_option = get_option("rtwalwm_noti_arr");
								
									if($rtwalwm_noti_option)
									{
										foreach ($rtwalwm_noti_option as $key => $value) 
										{
										?>
											<tr>
												
												<td><?php echo  esc_attr($value['title'])?></td>
												<td>
													<span><i class="fa fa-eye rtwalwm_view_edit_icon" data-key="<?php echo esc_attr($key)?>" aria-hidden="true" data-noti_title="<?php echo esc_attr($value['title']) ?>" data-noti_content="<?php echo esc_attr($value['content']) ?>"></i></span></td>
												<td><i class="far fa-trash-alt rtwalwm_delete rtwalwm_view_delete_icon" data-key="<?php echo esc_attr($key)?>"></i></td>
											</tr>
										<?php 
										}
									}
									?>	
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
		</table>


		<!-- Rank table -->
	
		<table class="rtwalwm-table form-table rtwalwm-hide-table" id="rtwalwm_extra_rank">
			<tbody>
				<tr>
					<td class="rtwwwap_new_rank_text">
						<input type="button" value="<?php esc_html_e( 'Add New Rank', 'affiliaa-affiliate-program-with-mlm' ); ?>" class="rtwwwap-button" id="rtwwwap_rank_requirements">
						
					</td>
				</tr>
				<tr>
					<td class="tr2">
						<table class="rtwwwap_notification_table">
							<thead class="rtwwwap_set_diff_width_th">
								<th>
									<?php  esc_html_e( 'SN', 'affiliaa-affiliate-program-with-mlm' ); ?>
								</th>
								<th>
									<?php  esc_html_e( 'Rank Name', 'affiliaa-affiliate-program-with-mlm' ); ?>
								</th>
								<th>
								<?php  esc_html_e( 'Rank Priority', 'affiliaa-affiliate-program-with-mlm' ); ?>
								</th>
								
								<th>
									<?php  esc_html_e( 'Rank Commission', 'affiliaa-affiliate-program-with-mlm' ); ?>
								</th>
								<th>
								<?php  esc_html_e( 'Actions ', 'affiliaa-affiliate-program-with-mlm' ); ?>
								</th>
								<th>
									<?php  esc_html_e( 'Date ', 'affiliaa-affiliate-program-with-mlm' ); ?>
								</th>
							</thead>

							<tbody class="rtwwwap_noti_main">
								
								<tr>
									<td>
										<?php  esc_html_e( '1' , 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
									<td>
										<?php  esc_html_e( 'Bronze', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
									<td>
										<?php  esc_html_e( '1', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
									<td>
										<?php  esc_html_e( '10', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
									<td id ="edit_rank" class="rtwwwap_action">
										<button type = "button"  id ="rtwwwap_edit_reqmnt" class = "rtwwwap_edit_reqmnt"><?php  esc_html_e( "edit" , 'affiliaa-affiliate-program-with-mlm' ); ?></button>
										<button type = "button"   id ="rtwwwap_delete_reqmnt" class = "rtwwwap_delete_reqmnt"><?php  esc_html_e( "delete" , 'affiliaa-affiliate-program-with-mlm' ); ?></button>
									</td>
									<td>
										<?php  esc_html_e( '24-11-22', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
								</tr>

								<tr>
									<td>
										<?php  esc_html_e( '2' , 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
									<td>
										<?php  esc_html_e( 'Silver', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
									<td>
										<?php  esc_html_e( '4', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
									<td>
										<?php  esc_html_e( '15', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
									<td id ="edit_rank" class="rtwwwap_action">
										<button type = "button"  id ="rtwwwap_edit_reqmnt" class = "rtwwwap_edit_reqmnt"><?php  esc_html_e( "edit" , 'affiliaa-affiliate-program-with-mlm' ); ?></button>
										<button type = "button"   id ="rtwwwap_delete_reqmnt" class = "rtwwwap_delete_reqmnt"><?php  esc_html_e( "delete" , 'affiliaa-affiliate-program-with-mlm' ); ?></button>
									</td>
									<td>
										<?php  esc_html_e( '26-11-22', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
								</tr>

								<tr>
									<td>
										<?php  esc_html_e( '3' , 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
									<td>
										<?php  esc_html_e( 'Gold', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
									<td>
										<?php  esc_html_e( '5', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
									<td>
										<?php  esc_html_e( '24', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
									<td id ="edit_rank" class="rtwwwap_action">
										<button type = "button"  id ="rtwwwap_edit_reqmnt" class = "rtwwwap_edit_reqmnt"><?php  esc_html_e( "edit" , 'affiliaa-affiliate-program-with-mlm' ); ?></button>
										<button type = "button"   id ="rtwwwap_delete_reqmnt" class = "rtwwwap_delete_reqmnt"><?php  esc_html_e( "delete" , 'affiliaa-affiliate-program-with-mlm' ); ?></button>
									</td>
									<td>
										<?php  esc_html_e( '27-11-22', 'affiliaa-affiliate-program-with-mlm' ); ?>
									</td>
								</tr>
									
							</tbody>
							
						</table>
					</td>
				</tr>
			</tbody>
		</table>


			<?php 			
				$rtwalwm_exrta_tab = '' ;
				$rtwwwa_html = apply_filters('rtwalwm_social_login_settings',$rtwalwm_exrta_tab)
			?>
		</div>
	</div>
</div>
<div class="rtwalwm-popup-wrapper">
		<div class="rtwalwm-popup-content">
			  <h3 class="rtwalwm-popup-heading"><?php esc_html_e( 'Notification Details', 'affiliaa-affiliate-program-with-mlm' ); ?></h3>
				<div class="rtwalwm-popup-row">
					<div>
						<label class="rtwalwm_notification_title" for="rtwalwm_notification_title_inpt"><?php esc_html_e( 'enter Notification title', 'affiliaa-affiliate-program-with-mlm' ); ?></label>
						<input type="text" class="rtwalwm_notification_title_inpt" id="rtwalwm_notification_title_inpt">
						<label class="rtwalwm_notification_title"><?php esc_html_e( 'enter Notification message', 'affiliaa-affiliate-program-with-mlm' ); ?></label>
					 	<textarea rows="4" cols="65" maxlength="100" class="rtwalwm_notification_textarea" placeholder='<?php esc_html_e("Enter your reason here within 100 words...", "affiliaa-affiliate-program-with-mlm" )?>' ></textarea>
					</div>
				</div>
				<div class="rtwalwm-popup-footer">
					<input type="button" value="<?php esc_html_e( 'Save', 'affiliaa-affiliate-program-with-mlm' ); ?>" class="rtwalwm-button" id="rtwalwm_save_notification">
					<input type="reset" name="" value="<?php esc_html_e( 'Cancel', 'affiliaa-affiliate-program-with-mlm' ); ?>" class="rtwalwm-button rtwalwm-button-reset" id="rtwalwm_cancle_add_notification">
				</div>
		</div>
	</div>
