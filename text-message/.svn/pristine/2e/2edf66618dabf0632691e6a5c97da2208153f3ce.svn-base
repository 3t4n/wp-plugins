									<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly  ?>
									<div id="bt-log-in" class="<?php echo $biztext_status_class;?>">
									
										<?php if ($wpvbiztext_number == "") { 
										
											echo "<span id='not-logged-in' onclick='bizTextLogin()'>You have not yet logged in. Click here to log in or sign up to get your Biz Number.</span>" ;
											
											} else {
											
												echo $biztext_status;
											
											};
											
										?>
											
									</div>
									
									<div id='biztext-link-wrapper'>
										<?php if (function_exists('biztext_options_page_form') && $wpvbiztext_number !== "") { 	
												$link = admin_url("admin.php?page=biz-text_form");
												echo "<a href='$link' target='_blank'>Click here to go to the Text Message Contact Form plugin settings.</a>";
											} else {
											    $wp_plugin_search_url = get_home_url() . "/wp-admin/plugin-install.php?s=+text+message+contact+form+biztext&tab=search&type=term";
												echo "<p>To receive text messages and/or emails through a contact form on a desktop, <a href='$wp_plugin_search_url' target='_self'>please install the Text Message Contact Form plugin.</a></p>";
											}
										?>	
									</div>
									<P class="preview-heading">-- Preview --</p>
									
									<div id="display-type-wrapper">	
											<a id='web-link' href='#' style='<?php if($biz_btn_type=="display_button") echo "display:none";?>' class='<?php echo $biz_link_only_class;?>'><?php echo $biz_lnk_text;?></a>
											<a id='web-btn'  href='#' style='<?php echo $biz_btn_styles;?>' class='<?php echo $biz_link_class;?>'><span id='inner-web-btn'><?php echo $biz_btn_text;?><span></a>
									</div>
									
									<button class="accordion notice-warning">The texting option may only be visible on a mobile device. Click here to see a mobile view.</button>
															<div class="panel">
																<p>Mobile view may not be accurate</p>
																<iframe id="site-preview" src="<?php echo biztext_site_url();?>" height="600px" width="350px" onload="bizTextFrameLoad(this)"></iframe>
															</div>

									<div class="display_on_website-button">
								
										<h3>1) Edit Display Types</h3>
									
										<!-- left column -->
										<div>
									
											<form id="wpbiztext-button-form" name="wpbiztext-button-form" method='post' action=''>	
											
												<?php
													if ( function_exists('wp_nonce_field') ) 
												
														wp_nonce_field('biztext-display-otpions'); 
											
												?>	
												
												<input type="hidden" name="wpbiztext-btnumber" id="wpbiztext-btnumber" value="<?php echo $biz_text_number;?>" />	
						
												<input type="hidden" name="wpbiztext-form-submitted" value="Y" />	
												<input type="hidden" name="wpbiztext-form-activated" id="wpbiztext-form-activated" value="N" />
												<fieldset class="left-indent">
									
													<legend class="screen-reader-text"><span>input type="radio"</span></legend>
													<label title='g:i a'>
														<input type="radio" id="display_link" name="display_type" value="display_link" <?php if($biz_btn_type=="display_link") echo 'checked'; ?>  />
														<span><?php esc_attr_e( 'Link', 'WpAdminStyle' ); ?></span>
													</label>
													<table id="set-link" class="form-table">
														<tr>
															<td class="label-td">
																<label for="wpbixtext_text_name">Link Text</label>
															</td>
															<td>
																<input name="wpbixtext_text_name" id="wpbixtext_text_name" type="text" value="<?php echo $biz_lnk_text;?>" class="regular-text wpbiztext-styles" />
															</td>
														</tr>
														<tr>
														    <td colspan="2" class="label-td">
																<a id='biztext-link-advanced-options' class="accordion biztext-advanced-options">Advanced Options</a>
																<div class="panel">
															  		<table class="form-table">														
															  			<tr>
																			<td class="label-td">
																				<label for="wpbixtext_link_only_class">Additional Classes <div class="tooltip">
  																				<span class="tooltiptext">Add any extra classes you need to add. ( space separated ).</span>
																				</div></label>
																			</td>
																			<td>
																
																				<input name="wpbixtext_link_only_class" id="wpbixtext_link_only_class" type="text" value="<?php echo $biz_link_only_class;?>" class="regular-text wpbiztext-styles" />
							
																			</td>
																		</tr>
																		
																		<tr>
																		
																			<td colspan="2" class="label-td">
																			
																				<div id="html_code_box_link" class="html-code-box" ></div>
																				<a class="button-secondary" id="get-code-link">Get HTML Code</a>
																			
																			</td>
																		
																		</tr>	
															  			
															  	    </table>
															  	</div>    		
															</td>

													</table>
											
													<label title='g:i a'>
														<input type="radio" id="display_button" name="display_type" value="display_button" <?php if($biz_btn_type=="display_button") echo 'checked'; ?> />
														<span><?php esc_attr_e( 'Button', 'WpAdminStyle' ); ?></span>
													</label>

						
													<table id="set-button" class="form-table">
											
														<tr>
															<td class="label-td">
																<label for="wpbixtext_button_text">Button Text</label>
															</td>
															<td>
																<input name="wpbixtext_button_text" id="wpbixtext_button_text" type="text" value="<?php echo $biz_btn_text;?>" class="regular-text wpbiztext-styles" />
															</td>
														</tr>		
												
														<tr>
															<td class="label-td">
																<label for="btn-color">Button Text Color</label>
															</td>
															<td>
																<input type="text" class="jscolor {closable:true,closeText:'Close', onFineChange:'updateColor(this)'}" name="btn-color" id="btn-color" value="<?php echo $biz_btn_text_color;?>"">
															</td>
														</tr>	
														
														<tr>
															<td class="label-td">
																<label for="btn-bg">Button Color <div class="tooltip">
  																	<span class="tooltiptext">For no background, leave blank.</span>
																</div></label>
															</td>
															<td>
																<!--<input type="color" name="btn-bg" id="btn-bg"  value="<?php echo $biz_btn_color;?>"></p>-->
																<input type="text" class="jscolor {closable:true,closeText:'Close',required:false, onFineChange:'updateBg(this)'}" name="btn-bg" id="btn-bg" value="<?php echo $biz_btn_color;?>">
							
															</td>
														</tr>	
														
														<tr>
															<td class="label-td">
																<label for="btn-border">Button Border Color <div class="tooltip">
  																	<span class="tooltiptext">For no border colour, leave blank.</span>
																</div></label>
															</td>
															<td>
																<!--<input type="color" name='btn-border' id="btn-border"  value="<?php echo $biz_btn_border_color;?>"></p>-->
																<input type="text" class="jscolor {closable:true,closeText:'Close',required:false, onFineChange:'updateBorder(this)'}" name='btn-border' id="btn-border" value="<?php echo $biz_btn_border_color;?>">
															</td>
														</tr>	
														
														<!-- advanced -->
														
														
														<tr>
														    <td colspan="2" class="label-td">
																<a id='biztext-button-advanced-options' class="accordion biztext-advanced-options">Advanced Options</a>
																<div class="panel">
															  		<table class="form-table">
															  			<tr>
																			<td class="label-td">
																				<label for="wpbixtext_textsize_value">Button Text Size</label>
																			</td>
																			<td>
															   					<input name="wpbixtext_textsize_value" class='bz-slide-input wpbiztext-styles' id="wpbixtext_textsize_value" type="text" value="<?php echo $biz_btn_text_size;?>"/><span>px&nbsp;</span>
															   					<input type="range" min="16" max="48" name="button_size" step="1" value="<?php echo $biz_btn_text_size;?>" class="slider wpbiztext-styles" id="button_size">	
																			</td>	
																		</tr>
																		
																		<tr>
																			<td class="label-td">
																				<label for="button_padding_value">Button Padding Vertical</label>
																			</td>
																			<td> 
														
														   
																			   <input name="button_padding_value" class='bz-slide-input wpbiztext-styles' id="button_padding_value" type="text" value="<?php echo $biz_btn_pad_ver;?>" /><span>px&nbsp;</span>
																			   <input type="range" min="5" name="button_padding" max="15" step="1" value="<?php echo $biz_btn_pad_ver;?>" class="slider wpbiztext-styles" id="button_padding">
												
																			</td>
																		</tr>
													
																		<tr>
																			<td class="label-td">
																				<label for="button_padding_horz_value">Button Padding Horizontal</label>
																			</td>
																			<td> 
														  
																				<input name="button_padding_horz_value" class='bz-slide-input wpbiztext-styles' id="button_padding_horz_value" type="text" value="<?php echo $biz_btn_pad_hor;?>" /><span>px&nbsp;</span>
																				<input type="range" name ="button_padding_horz" min="5" max="25" step="1" value="<?php echo $biz_btn_pad_hor;?>" class="slider wpbiztext-styles" id="button_padding_horz">
				
																									
																			</td>
																		</tr>
																		<tr>
																			<td class="label-td">
																				<label for="button_border_radius_value">Button Border Radius</label>
																			</td>
																			<td> 
														
																			   <input name="button_border_radius_value" class='bz-slide-input wpbiztext-styles' id="button_border_radius_value" type="text" value="<?php echo $biz_btn_radius;?>" /><span>px&nbsp;</span>
																			   <input type="range" name="button_border_radius" min="0" max="100" step="1" value="<?php echo $biz_btn_radius;?>" class="slider wpbiztext-styles" id="button_border_radius">
				
																									
																		</td>
																		</tr>
																		<tr>
																			<td class="label-td">
																				<label for="wpbixtext_button_width">Button Width <div class="tooltip">
																					<span class="tooltiptext">Full width will be the width of your page or column</span>
																				</div></label>
																			</td>
																			<td>
																				<select name="wpbixtext_button_width" id="wpbixtext_button_width" class='wpbiztext-styles-select'>
																					<option value="inline-block" <?php if($biz_btn_width == "inline-block") echo 'selected="selected"'; ?>>Width of Text</option>
																					<option value="block" <?php if($biz_btn_width == "block") echo 'selected="selected"'; ?>>Full Width</option>
														
																				</select>													
																			</td>
																		</tr>	
																		<tr>
																			<td class="label-td">
																				<label for="wpbixtext_button_align">Button Text Align</label>
																			</td>
																			<td>
																				<select name="wpbixtext_button_align" id="wpbixtext_button_align" class='wpbiztext-styles-select'>
																					<option value="left" <?php if($biz_btn_align == "left") echo 'selected="selected"'; ?>>Left</option>
																					<option value="center" <?php if($biz_btn_align == "center") echo 'selected="selected"'; ?>>Center</option>
																					<option value="right" <?php if($biz_btn_align == "right") echo 'selected="selected"'; ?>>Right</option>
														
																				</select>													
																			</td>
																		</tr>	
																		<tr>
																			<td class="label-td">
																				<label for="wpbixtext_link_class">Additional Classes <div class="tooltip">
																					<span class="tooltiptext">Add any extra classes you need to add. ( space separated ).</span>
																				</div></label>
																			</td>
																			<td>
															
																				<input name="wpbixtext_link_class" id="wpbixtext_link_class" type="text" value="<?php echo $biz_link_class;?>" class="regular-text wpbiztext-styles" />
						
																			</td>
																		</tr>		
																		
																		<tr>
																		
																			<td colspan="2" class="label-td">
																			
																				<div id="html_code_box" class="html-code-box" ></div>
																				<a class="button-secondary" id="get-code">Get HTML Code</a>
																			
																			</td>
																		
																			
																		
																		</tr>																
																		
															  		</table>
																</div>
															
															</td>
														
														</tr>
														
														<!-- end advanced -->
														<!-- start fixed options -->
														
														<tr>
													
													        <td colspan="2" class="label-td"><hr></td>
													    
													    </tr>
														
														<tr>
														    <td class="label-td">
																<label for="wpbixtext_button_fixed">Fix Button to Pages Global <div class="tooltip">
  																	<span class="tooltiptext">Button always fixed on your website pages.</span>
																</div></label>
															</td>
															<td>
							
																<input type="checkbox" <?php if($biz_button_fixed === 'true') echo 'checked="checked"'; ?> name='wpbixtext_button_fixed' id="wpbixtext_button_fixed" >
															
															</td>
														</tr>	
														
														<tr>
														    <td colspan="2" class="label-td">
																<a id='biztext-button-fixed-options' class="accordion biztext-advanced-options">Fixed Options Global</a>
																<div class="panel">
															  		<table class="form-table">
																		<tr>
																			<td class="label-td">
																				<label for="wpbixtext_button_fixed_position">Position</label>
																			</td>
																			<td>
																				<select name="wpbixtext_button_fixed_position" id="wpbixtext_button_fixed_position" class=''>
																					<option value="bottom" <?php if($biz_button_fixed_pos == "bottom") echo 'selected="selected"'; ?>>Bottom</option>
																					<option value="top" <?php if($biz_button_fixed_pos == "top") echo 'selected="selected"'; ?>>Top</option>
																					
																				</select>													
																			</td>
																		</tr>	
																		<tr>
																			<td class="label-td">
																				<label for="wpbixtext_button_fixed_side">Side</label>
																			</td>
																			<td>
																				<select name="wpbixtext_button_fixed_side" id="wpbixtext_button_fixed_side" class=''>
																					<option value="right" <?php if($biz_button_fixed_side == "right") echo 'selected="selected"'; ?>>Right</option>
																					<option value="left" <?php if($biz_button_fixed_side == "left") echo 'selected="selected"'; ?>>Left</option>
					
																				</select>													
																			</td>
																		</tr>																  		
															  			<tr>
																			<td class="label-td">
																				<label for="wpbixtext_button_fixed_zindex">Z-Index <div class="tooltip">
																					<span class="tooltiptext">Increase the number to show your button in front of any other elements on your page</span>
																				</div></label>
																			</td>
																			<td>
															   					<input name="wpbixtext_button_fixed_zindex" class='wpbiztext-styles' id="wpbixtext_button_fixed_zindex" type="number" value=<?php echo $biz_button_fixed_zindex;?> />
																			</td>	
																		</tr>
																		
																		<tr>
																			<td class="label-td">
																				<label for="wpbixtext_button_fixed_distpos">Distance From Position</label>
																			</td>
																			<td> 
													
																			   <input name="wpbixtext_button_fixed_distpos" class='bz-slide-input wpbiztext-styles' id="wpbixtext_button_fixed_distpos" type="number" value=<?php echo $biz_button_fixed_dispos;?> /><span>px&nbsp;</span>
												
																			</td>
																		</tr>
													
																		<tr>
																			<td class="label-td">
																				<label for="wpbixtext_button_fixed_distside">Distance From Side</label>
																			</td>
																			<td> 
														  
																				<input name="wpbixtext_button_fixed_distside" class='bz-slide-input wpbiztext-styles' id="wpbixtext_button_fixed_distside" type="number" value=<?php echo $biz_button_fixed_disside;?> /><span>px&nbsp;</span>
				
																									
																			</td>
																		</tr>

																		<tr>
														                    <td class="label-td">
																                <label for="wpbixtext_button_fixed_icon">Icon Instead of Button</label>
															                </td>
															                <td>
															                	<select name="wpbixtext_button_fixed_icon" id="wpbixtext_button_fixed_icon" class=''>
																					<option value="false" <?php if($biz_button_fixed_icon == "false") echo 'selected="selected"'; ?>>No Icon</option>
																					<option value="xsmall" <?php if($biz_button_fixed_icon == "xsmall") echo 'selected="selected"'; ?>>Extra Small</option>
																					<option value="small" <?php if($biz_button_fixed_icon == "small") echo 'selected="selected"'; ?>>Small</option>
																					<option value="medium" <?php if($biz_button_fixed_icon == "medium") echo 'selected="selected"'; ?>>Medium</option>
																					<option value="large" <?php if($biz_button_fixed_icon == "large") echo 'selected="selected"'; ?>>Large</option>
																					<option value="xlarge" <?php if($biz_button_fixed_icon == "xlarge") echo 'selected="selected"'; ?>>Extra Large</option>
					
																				</select>											
															
															                </td>
														                </tr>
														                <tr>
														                    <td colspan="2" class="label-td">
														                    <ul>
														                    
														                        <li>These settings will apply to any fixed buttons</li>
														                        <li>You can change using the Biz Text Widget or add attributes to the shortcode if you have not checked to Fixed to Website Global</li>
														                        <li>Set the color of the Icon using Button Text Color and the background with Button Color options above</li>
														                    </ul>
														                   
														                </tr>                                                                                
																		
															  		</table>
																</div>
															
															</td>
														
														</tr>
														<!-- end fixed options -->
																		
													</table> 
													
													
													<!--<input class="button-secondary" id="clear_button" type="reset" name="" value="Reset" />-->
													
													<hr>
													
													<table id="advanced-options" class="form-table">
													</table>
													
													<input type="hidden" id="wpbiztext-button-code" name="wpbiztext-button-code" value="" />
													<input type="hidden" id="wpbiztext-link-code" name="wpbiztext-link-code" value="" />
													<input type="hidden" id="wpbiztext-styles" name="wpbiztext-styles" value="" />	
												</fieldset>
												
												<div class="left-indent">
												
												</div>
												
												<h3>2) Display on Your Website in Two Ways</h3>
											
												<div class="left-indent">
											
													<p>A) Place the following short code on your website pages where you want your Biz Number to appear:</p>
													
													<div class="left-indent">
														<p><strong>For your Button:</strong></p> 
														<p>[BT_BUTTON]</p>
														<p>To fix to a page: [BT_BUTTON fixed='true']</p>
														<p>To show Biz Text Icon: [BT_BUTTON fixed='true' icon='***']<br>***replace with one of the following: xsmall, small, medium, large, xlarge</p>
														
														<p><strong>For your Link:</strong></p>
														<p>[BT_LINK]</p>
													</div>
													
													<p>B) Add using the Biz Text Widget</p>
													
													<div class="left-indent">
													
														<p><span class='learn-widget' onclick="bizTextLearnWidget()">Click here to learn how</span></p>
													
													</div>
												     
												</div>
											
													<h3>3) Activate Your Code</h3>
											
											</form>
									
										</div>
										
										
										
										<!-- end right column -->
									
										<div class='display-row'>
											<div class="left-indent">
											
												<!--<input class="button-secondary"  id='bz-form-submit' type="submit" name="wpbiztext-button-form" value="ACTIVATE" />-->
												<input class="button-secondary biztezt-btn biztext_sumbit-form"  type="submit" id="biztext_submit" value="SAVE & ACTIVATE"/>
												<input class="button-secondary biztezt-btn biztext_sumbit-form"  type="submit" id="biztext_submit_deactivate" value="SAVE & DEACTIVATE"/>
											
											</div>
										
										</div>
								
									</div>