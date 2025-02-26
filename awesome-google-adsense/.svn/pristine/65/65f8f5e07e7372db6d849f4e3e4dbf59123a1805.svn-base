<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) {return;}
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="wrap">
	<div class="postbox-container" style="width:99%;">
		<!--Print Settings-->
		<div id="" class="aga_box">
			
			<h3 class=""><span><?php echo NAME; ?>  - <?php _e('Settings','awesome-google-adsense');?></span></h3>
			<div class="inside" id="aga_ads">
				<div id="aga_ads_cp" class="gray_box">
					<h4><?php _e( 'Settings' , 'awesome-google-adsense' );?></h4>
					<div class="margin">
						<table cellspacing="0">
							<tr>
								<td width="40%">
									<div class="field_label"><?php _e( 'Adsense ID' , 'awesome-google-adsense' );?></div>
									<?php if(!get_option('aga_ads_id')){ ?>
										<p class="explain alert rounded"><?php _e( 'To display ads from Google Adsense is required to enter your Adsense ID. Your ID can be found in your <a href="https://www.google.com/adsense">Adsense panel</a> on the "Home" tab and in the sidebar "Account Settings". Eg: pub-4268725654361605' , 'awesome-google-adsense' );?></p>
									<?php }else {?>
										<p class="explain"><?php _e( 'Adsense ID is the unique identifier of your account at Google Adsense.' , 'awesome-google-adsense' );?></p>
									<?php } ?>
								</td>
								<td valign="top">
									<input type="text" size="40" name="aga_ads_id" id="aga_ads_id" value="<?=get_option('aga_ads_id')?>"/>
								</td>
							</tr>
							<tr>
								<td>
									<div class="field_label"><?php _e( 'Custom Channels <span class="optional">(Optional)</span>' , 'awesome-google-adsense' );?></div>
									<p class="explain"><?php _e( 'Allows you to define groups of ads for better tracking.' , 'awesome-google-adsense' );?></p>
								</td>
								<td valign="top">
									<input type="text" size="40" name="aga_ads_chanel" id="aga_ads_chanel" value="<?=get_option('aga_ads_chanel')?>"/> 
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div style="text-align:right;margin-top:5px;">
					<div class="fb-like" data-href="http://wordpress.org/extend/plugins/awesome-google-adsense/" data-send="true" data-width="450" data-show-faces="false"></div>
					<span class="submit" id="aga_form_save1_loader" style="display:none">
						<img src="/wp-admin/images/wpspin_light.gif"> <?php _e( 'Wait' , 'awesome-google-adsense' );?>...
					</span>
					<input class="button_aga" id="aga_form_save1" type="button" value="<?php _e( 'Save Changes' , 'awesome-google-adsense' );?>" style="padding:3px 3px;"> 
				</div>
			</div>
				
				
					<div class="inside" id="aga_ads">
						
						<div id="aga_ads_cp" class="gray_box">
							<form name="aga_form_print_settings" id="aga_form_print_settings" method="" action="">
							<?php
								$values = json_decode(get_option('aga_print_settings'));
							?>
							<h4><?php _e( 'Display Configuration' , 'awesome-google-adsense' );?></h4>
							<div class="margin">
								<table cellspacing="0">
									<tr>
										<td width="40%"><div class="field_label"><?php _e( 'Border' , 'awesome-google-adsense' );?></div></td>
										<td>
											<select name="aga_corner" id="aga_corner">
												<option value="normal" <?php if($values->aga_corner=='normal')echo "selected='selected'";?>><?php _e( 'Normal' , 'awesome-google-adsense' );?></option>
												<option value="rounded" <?php if($values->aga_corner=='rounded')echo "selected='selected'";?>><?php _e( 'Rounded' , 'awesome-google-adsense' );?></option>
											</select>
										</td>
									</tr>
									
									<tr>
										<td><div class="field_label"><?php _e( 'Colors' , 'awesome-google-adsense' );?> <input class="button" type="button" value="<?php _e('Set to defaul colors','awesome-google-adsense'); ?>" id="aga_reset_colors" style="padding:1px 3px;"></div> 
										</td>
										<td >
											<table>
												<tr>
													<td><div class="field_label"><?php _e( 'Border color' , 'awesome-google-adsense' );?></div></td>
													<td>
														#<input type="text" name="aga_border_color" id="aga_border_color" size="6" value="<?=$values->aga_border_color?>"/></td><td><div class="colorSelector" id="aga_colorSelector1"><div style="background-color: #<?=$values->aga_border_color?>"></div></div></td>
												</tr>
												<tr>
													<td><div class="field_label"><?php _e( 'Background color' , 'awesome-google-adsense' );?></div></td>
													<td>#<input type="text" name="aga_background_color" id="aga_background_color" size="6" value="<?=$values->aga_background_color?>"/></td><td><div class="colorSelector" id="aga_colorSelector2"><div style="background-color: #<?=$values->aga_background_color?>"></div></div></td>
												</tr>
												<tr>
													<td><div class="field_label"><?php _e( 'Link color' , 'awesome-google-adsense' );?></div></td>
													<td>#<input type="text" name="aga_link_color" id="aga_link_color" size="6" value="<?=$values->aga_link_color?>"/></td><td><div class="colorSelector" id="aga_colorSelector3"><div style="background-color: #<?=$values->aga_link_color?>"></div></div></td>
												</tr>
												<tr>
													<td><div class="field_label"><?php _e( 'Text color' , 'awesome-google-adsense' );?></div></td>
													<td>#<input type="text" name="aga_text_color" id="aga_text_color" size="6" value="<?=$values->aga_text_color?>"/></td><td><div class="colorSelector" id="aga_colorSelector4"><div style="background-color: #<?=$values->aga_text_color?>"></div></div></td>
												</tr>
												<tr>
													<td><div class="field_label"><?php _e( 'Url color' , 'awesome-google-adsense' );?></div></td>
													<td>
														#<input type="text" name="aga_url_color" id="aga_url_color" size="6" value="<?=$values->aga_url_color?>"/></td><td><div class="colorSelector" id="aga_colorSelector5"><div style="background-color: #<?=$values->aga_url_color?>"></div></div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									
									<tr>
										<td><div class="field_label"><?php _e( 'Ad size' , 'awesome-google-adsense' );?></div>
											<p class="explain">
												<?php _e( 'Choose more than one to display random. <br /> (Width x Height)' , 'awesome-google-adsense' );?>
											</p>
										</td>
										<td>
											<table width="90%">
												<tr>
													<td>
														<INPUT TYPE=CHECKBOX NAME="aga_c234x60" id="aga_label_ai_234_60" class='aga_checkbox' <?php if($values->aga_c234x60=='on')echo "checked='checked'"; ?>><label for="aga_label_ai_234_60">234x60</label><BR>
														<INPUT TYPE=CHECKBOX NAME="aga_c468x60" id="aga_label_ai_468_60" class='aga_checkbox' <?php if($values->aga_c468x60=='on')echo "checked='checked'"; ?>><label for="aga_label_ai_468_60">468x60</label><BR>												
														
													</td>
													<td>
														<INPUT TYPE=CHECKBOX NAME="aga_c728x90" id="aga_label_ai_728_90" class='aga_checkbox' <?php if($values->aga_c728x90=='on')echo "checked='checked'"; ?>><label for="aga_label_ai_728_90">728x90</label><BR>
														<INPUT TYPE=CHECKBOX NAME="aga_c120x600" id="aga_label_ai_120_600" class='aga_checkbox' <?php if($values->aga_c120x600=='on')echo "checked='checked'"; ?>><label for="aga_label_ai_120_600">120x600</label><BR>
														
													</td>
													<td>
														<INPUT TYPE=CHECKBOX NAME="aga_c160x600" id="aga_label_ai_160_600" class='aga_checkbox' <?php if($values->aga_c160x600=='on')echo "checked='checked'"; ?>><label for="aga_label_ai_160_600">160x600</label><BR>
														<INPUT TYPE=CHECKBOX NAME="aga_c120x240" id="aga_label_ai_120_240" class='aga_checkbox' <?php if($values->aga_c120x240=='on')echo "checked='checked'"; ?>><label for="aga_label_ai_120_240">120x240</label><BR>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									
									<tr>
										<td>
											<div class="field_label"><?php _e( 'Number of ads per Page' , 'awesome-google-adsense' );?></div>
										</td>
										<td>
											<select name="ads_per_page" id="ads_per_page">
												<option value="0" <?php if($values->ads_per_page==0) echo "selected='selected'" ?>>0</option>
												<option value="1" <?php if($values->ads_per_page==1) echo "selected='selected'" ?>>1</option>
												<option value="2" <?php if($values->ads_per_page==2) echo "selected='selected'" ?>>2</option>
												<option value="3" <?php if($values->ads_per_page==3) echo "selected='selected'" ?>>3</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											<div class="field_label"><?php _e( 'Number of ads per Post' , 'awesome-google-adsense' );?></div>
										</td>
										<td>
											<select name="ads_per_post" id="ads_per_post">
												<option value="0" <?php if($values->ads_per_page==0) echo "selected='selected'" ?>>0</option>
												<option value="1" <?php if($values->ads_per_page==1) echo "selected='selected'" ?>>1</option>
												<option value="2" <?php if($values->ads_per_page==2) echo "selected='selected'" ?>>2</option>
												<option value="3" <?php if($values->ads_per_page==3) echo "selected='selected'" ?>>3</option>
											</select>
										</td>
									</tr>
									
									<tr>
										<td valign="top">
											<div class="field_label"><?php _e( 'Ad type' , 'awesome-google-adsense' );?></div>
										</td>
										<td>
											<select name="ads_type_ads" id="ads_type_ads">
												<option value="text" <?php if($values->ads_type_ads=='text') echo "selected='selected'" ?>><?php _e( 'Text' , 'awesome-google-adsense' );?></option>
												<option value="image" <?php if($values->ads_type_ads=='image') echo "selected='selected'" ?>><?php _e( 'Image' , 'awesome-google-adsense' );?></option>
												<option value="text_image" <?php if($values->ads_type_ads=='text_image') echo "selected='selected'" ?>><?php _e( 'Text & Image' , 'awesome-google-adsense' );?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											<div class="field_label"><?php _e( 'Ad Placement' , 'awesome-google-adsense' );?></div>
										</td>
										<td>
											<select name="ads_positioning" id="ads_positioning">
												<option value="center" <?php if($values->ads_positioning == 'center') echo "selected='selected'" ?>><?php _e( 'Center' , 'awesome-google-adsense' );?></option>
												<option value="left" <?php if($values->ads_positioning == 'left') echo "selected='selected'" ?>><?php _e( 'Left' , 'awesome-google-adsense' );?></option>
												<option value="right" <?php if($values->ads_positioning == 'right') echo "selected='selected'" ?>><?php _e( 'Right' , 'awesome-google-adsense' );?></option>
												<option value="top-center" <?php if($values->ads_positioning == 'top-center') echo "selected='selected'" ?>><?php _e( 'Top/Center' , 'awesome-google-adsense' );?></option>
												<option value="top-left" <?php if($values->ads_positioning == 'top-left') echo "selected='selected'" ?>><?php _e( 'Top/Left' , 'awesome-google-adsense' );?></option>
												<option value="top-right" <?php if($values->ads_positioning == 'top-right') echo "selected='selected'" ?>><?php _e( 'Top/Right' , 'awesome-google-adsense' );?></option>
												<option value="bottom-center" <?php if($values->ads_positioning == 'bottom-center') echo "selected='selected'" ?>><?php _e( 'Bottom/Center' , 'awesome-google-adsense' );?></option>
												<option value="bottom-left" <?php if($values->ads_positioning == 'bottom-left') echo "selected='selected'" ?>><?php _e( 'Bottom/Left' , 'awesome-google-adsense' );?></option>
												<option value="bottom-right" <?php if($values->ads_positioning == 'bottom-right') echo "selected='selected'" ?>><?php _e( 'Bottom/Right' , 'awesome-google-adsense' );?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											<div class="field_label"><?php _e( 'Do not show ads on these Pages' , 'awesome-google-adsense' );?></div>
										</td>
										<td>
											<input type="checkbox" name="non_show_home" id="non_show_home" <?php if($values->non_show_home=='on')echo "checked='checked'"; ?>/> <?php _e( 'Home Page' , 'awesome-google-adsense' );?><br />
											<input type="checkbox" name="non_show_stats" id="non_show_stats" <?php if($values->non_show_stats=='on')echo "checked='checked'"; ?>/> <?php _e( 'Static Pages' , 'awesome-google-adsense' );?> <br />
											<input type="checkbox" name="non_show_posts" id="non_show_posts" <?php if($values->non_show_posts=='on')echo "checked='checked'"; ?>/> <?php _e( 'Posts Pages' , 'awesome-google-adsense' );?> <br />
											<input type="checkbox" name="non_show_categories" id="non_show_categories" <?php if($values->non_show_categories=='on')echo "checked='checked'"; ?>/> <?php _e( 'Category Pages' , 'awesome-google-adsense' );?> <br />
											<input type="checkbox" name="non_show_archive" id="non_show_archive" <?php if($values->non_show_archive=='on')echo "checked='checked'"; ?>/> <?php _e( 'Archive Pages' , 'awesome-google-adsense' );?> <br />
										</td>
									</tr>
									
									<tr id="set_donation_row">
										<td>
											<div class="field_label"><?php _e( 'Donation' , 'awesome-google-adsense' );?></div>
											<p class="explain"><?php _e( 'The default donation rate is 0%. If you like this plugin please pay us a beer.' , 'awesome-google-adsense' );?></p>
										</td>
										<td valign="top">
											<input type="text" id="ceunum" name="ceunum" size="3" value="<?php echo  $values->ceunum;?>"/> %
										</td>
									</tr>
								</table>
							</div>
							</form>
						</div>
						<div style="text-align:right;padding:5px 3px 0px 0px;">
							<span class="submit" id="aga_form_save3_loader" style="display:none">
								<img src="/wp-admin/images/wpspin_light.gif"> <?php _e( 'Wait' , 'awesome-google-adsense' );?>...
							</span>
							<input class="button_aga" type="button" value="<?php _e( 'Save Changes' , 'awesome-google-adsense' );?>" id="aga_form_save3" style="padding:1px 3px;"> 
						</div>
					</div>
				</div>
				
	</div>
</div>