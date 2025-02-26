<?php
function sticky_notification_bar_backend_menu(){
wp_nonce_field('update-options'); 
$options = get_option('Snbar_options');
?>
<div class="snbar_wrapper wrap">
	<div id="icon-themes" class="icon32"></div>
	<h2><?php _e('Sticky Notification Bar '.stickybar_get_version().'  Setting\'s','snbar');?></h2>
</div>
<div id="poststuff">
	<div id="snbar_admin" class="postbox">		
	    <div class="inside" style="padding: 15px;margin: 0;"> <!--inside start-->			 
			<form method="post" id="snbar_general_settings"> <!-- edit form start-->
				 <div class="snbar_general_section postbox">
					  <div class="handlediv"> </div>
						<h3 class="hndle"><span> <?php _e("General Settings",'snbar'); ?> </span></h3>					    
						    <table class="inside" style="padding:20px;width:100%">						  			
								<tr>
									<td><?php _e("Default Bar Position",'snbar'); ?> :</td>
									<td>
									    <input id="snbar_top_position"  type="radio" name="Snbar_options[snbar_defaultposition]" value="Top"<?php checked( 'Top' == $options['snbar_defaultposition'] ); ?>>  <label style="margin-right:68px;" for="snbar_top_position"> <?php _e('Top','snbar') ?></label>  
									    <input id="snbar_bottom_position" type="radio" name="Snbar_options[snbar_defaultposition]" value="Bottom"<?php checked( 'Bottom' == $options['snbar_defaultposition'] ); ?>> <label style="margin-right:40px;" for="snbar_bottom_position"> <?php _e('Bottom','snbar') ?></label> 
									</td>
								</tr>								
								<tr>
									<td><?php _e("Display mode",'snbar'); ?> :</td>									
									<td>
									    <input id="snbar_fixed_width" type="radio" name="Snbar_options[snbar_bar_width_mode]" value="Fixed Width"<?php checked( 'Fixed Width' == $options['snbar_bar_width_mode'] ); ?>>  <label style="margin-right:26px;" for="snbar_fixed_width"> <?php _e('Fixed Width','snbar') ?></label>  
									    <input id="snbar_fullwidth" type="radio" name="Snbar_options[snbar_bar_width_mode]" value="Full width"<?php checked( 'Full width' == $options['snbar_bar_width_mode'] ); ?>> <label style="margin-right:40px;" for="snbar_fullwidth"> <?php _e('Full Width','snbar') ?></label> 
									</td>		
								</tr>								
								<tr class="barwidth_row  <?php if($options['snbar_bar_width_mode']== 'Fixed Width' ){echo "show_row";}else{ echo "hide_row";} ?>">
									<td><?php _e("Enter Width",'snbar'); ?> :</td>									
									<td>									  
									  <input type="text" name="Snbar_options[snbar_bar_width]" style="width:90px;" value="<?php echo $options['snbar_bar_width'] ?>" />
									  <span class="snbar_form_msg"> <?php _e("in pixel",'snbar'); ?> </span> 
									
									</td>		
								</tr>
                                <tr>
									<td><?php _e("Bar Distance To Stick",'snbar'); ?> :</td>
								    <td><input id="snbar_stick" type="text" name="Snbar_options[snbar_sticky_distance]" style="width:102px;" value="<?php echo $options['snbar_sticky_distance'] ?>" />
								    <span class="snbar_form_msg"> <?php _e("in pixel",'snbar'); ?> </span></td>
							    </tr>								
								<tr>
									<td><?php _e("Color Scheme",'snbar'); ?> :</td>
									<td>
									  <div class="snbar_colwrap">									    
										<input id="snbar_color_scheme" style="width:103px;" name="Snbar_options[snbar_color_scheme]" value="<?php echo $options['snbar_color_scheme']?>"  type="text" value="#eeeeee" />
                                        <div class="snbar_colsel snbar_color_scheme"></div> 
									 </div>
									</td>
								</tr>								
									
							</table>		   
					</div> <!--snbar_general end-->					
					<div class="snbar_social postbox">
						<div class="handlediv"> </div>
						<h3 class="hndle"><span> <?php _e("Social Network Settings",'snbar'); ?> </span></h3>					    
						      <table class="inside" style="padding:20px;width:100%">								
									<tr>
										<td><?php _e("Facebook Follow Link",'snbar'); ?> :</td>									
										<td> <input type="text" name="Snbar_options[snbar_facebookUrl]" style="width:180px;" value="<?php echo $options['snbar_facebookUrl'] ?>" /></td>     									
									</tr>	
									<tr>
										<td><?php _e("Twitter Follow Link",'snbar'); ?> :</td>
										<td> <input type="text" name="Snbar_options[snbar_twitterUrl]" style="width:180px;" value="<?php echo $options['snbar_twitterUrl'] ?>" /></td>
									</tr>
									<tr>
										<td><?php _e("Linkedin Follow Link",'snbar'); ?> :</td>
										<td> <input type="text" name="Snbar_options[snbar_linkedinUrl]" style="width:180px;" value="<?php echo $options['snbar_linkedinUrl'] ?>" /></td>	
									</tr>	 
									 <tr>
										<td><?php _e("Google Plus Follow Link",'snbar'); ?> :</td>
										<td> <input type="text" name="Snbar_options[snbar_googleUrl]" style="width:180px;" value="<?php echo $options['snbar_googleUrl'] ?>" /></td>	
									</tr>								
									<tr>
										<td><?php _e("RSS Feedback Link",'snbar'); ?> :</td>
										<td colspan="2"> <input type="text" name="Snbar_options[snbar_rssUrl]" style="width:180px;" value="<?php echo $options['snbar_rssUrl'] ?>" /></td>									
									</tr>								
									 <tr>
										<td><?php _e("Show Facebook Like Button",'snbar'); ?> :</td>
										<td>							
											<input id="snbar_fb_like" type="checkbox" <?php if(isset($options['snbar_facebookLike'])) checked('1',$options['snbar_facebookLike'] ,true);?>  name="Snbar_options[snbar_facebookLike]" value = "1"/>									  
											<label for="snbar_fb_like"> <span class="snbar_form_msg"> <?php _e("Check it to show facebook like button",'snbar'); ?> </span> </label>
										</td>									  
									 </tr>								
								</table>
					</div><!--snbar_display end-->
															
					<div class ="snbar_display postbox">
							<div class="handlediv"> </div>
							<h3 class="hndle"><span> <?php _e("Display Settings",'snbar'); ?> </span></h3>									
						<table class="inside" style="padding:20px;width:100%">
						<tr>
							<td>
								<input id="snbar_shw_logo" type="checkbox" <?php if(isset($options['snbar_logo_chkbox'])) checked('1', $options['snbar_logo_chkbox'],true);?>  name="Snbar_options[snbar_logo_chkbox]" value = "1"/>	
								 <label for="snbar_shw_logo"> <?php _e("Show Logo On The Bar",'snbar'); ?> </label>
							</td>                        				
						</tr>
					
						<tr class="snbar <?php if($options['snbar_logo_chkbox'] == '1' ){echo "show_row";} ?>" >
							<td><?php _e("Upload Logo Image",'snbar'); ?> :</td>
							<td>
								<input id="snbar_upload_image"type="text" name="Snbar_options[snbar_logo_path]"  value="<?php echo $options['snbar_logo_path'] ?>" />
							
								<input id="snbar_upload_image_button" class="button-primary" type="button" value="Upload" />
							</td>									
						</tr> 
                          						
						 <tr>
							<td><?php _e("Show Content On The Bar",'snbar'); ?> :</td>
							<td>
							 <input id="snbar_textradio" type="radio" name="Snbar_options[snbar_content_type]" value="Text"<?php checked( 'Text' == $options['snbar_content_type'] ); ?>>  <label style="margin-right:40px;" for="snbar_textradio"> <?php _e('Text Message','snbar') ?></label>  
							<input id="snbar_custom_menu" type="radio" name="Snbar_options[snbar_content_type]" value="wp_nav_menu"<?php checked( 'wp_nav_menu' == $options['snbar_content_type'] ); ?>> <label for="snbar_custom_menu"> <?php _e('Custom Wp Menu','snbar') ?></label> 
							</td>
						</tr> 
						<tr class="snbar_custom_msg <?php if($options['snbar_content_type']=="Text"){ echo "show_row";} else{ echo "hide_row";} ?> ">
							<td><?php _e("Text Message",'snbar'); ?> :</td>
							<td>
							  <textarea  style="width:218px; height:86px; overflow: hidden;" name="Snbar_options[snbar_content_textarea]" ><?php echo $options['snbar_content_textarea']?></textarea>
							</td>
						</tr>   

						<?php
							$options['snbar_content_color'] = (isset($options['snbar_content_color']) && $options['snbar_content_color']) ? $options['snbar_content_color'] : "#000000";				
						?>
						
						
						<tr class="snbar_custom_msg <?php if($options['snbar_content_type']=="Text"){ echo "show_row";} else{ echo "hide_row";} ?> ">
							<td><?php _e("Text Message Color",'snbar'); ?> :</td>
							<td>
							  <div class="snbar_colwrap">									    
								<input id="snbar_content_color" style="width:103px;" name="Snbar_options[snbar_content_color]" value="<?php echo $options['snbar_content_color']; ?>"  type="text" />
								<div class="snbar_colsel snbar_content_color"></div> 
							 </div>
							</td>
						</tr>	
						
						<tr class="snbar_custom_menu <?php if($options['snbar_content_type']=="wp_nav_menu"){ echo "show_row";} else{ echo "hide_row"; } ?>">
							<td><?php _e("Select Wp Menu",'snbar'); ?> :</td>
							<td>								   
							   <?php
								// Get menus
								$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
								// If no menus exists, direct the user to go and create some.
								if ( !$menus ) {
									echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
								}
								else{
								?>
								<select id="" name="Snbar_options[snbar_menu_select]">
									<?php									
									    $nav_menu= null; 
										foreach ( $menus as $menu ) {
										$selected = $nav_menu == $menu->term_id ? ' selected="selected"' : '';
										echo '<option'. selected($menu->name, $options['snbar_menu_select']). $selected .' value="'. $menu->name .'">'. $menu->name .'</option>';
									}
									?>
								</select>
								<?php } ?>								  				
							</td>
						</tr>								
						<tr>
						 <td><?php _e("Show Scroll Top button ",'snbar'); ?> :</td>
							<td>									  
							   <input id="snbar_scroll" type="checkbox" <?php if(isset($options['snbar_scrolltop_btn_chk'])) checked('1', $options['snbar_scrolltop_btn_chk'],true);?>  name="Snbar_options[snbar_scrolltop_btn_chk]" value = "1"/>									   
							   <label for="snbar_scroll"> <span class="snbar_form_msg"> <?php _e("Check it to show scroll top button",'snbar'); ?> </span> </label>
							</td>
						</tr>								
						 <tr>
							 <td><?php _e("Show Search Form ",'snbar'); ?> :</td>
							 <td>									   
							   <input id="snbar_srch" type="checkbox" <?php if(isset($options['snbar_search_chk'])) checked('1', $options['snbar_search_chk'],true);?>  name="Snbar_options[snbar_search_chk]" value = "1"/>
							  <label for="snbar_srch"><span class="snbar_form_msg"> <?php _e("Check it to show search form",'snbar'); ?> </span></label>
							 </td>
						</tr>  
                        
                        <tr>
							 <td><?php _e("Show Close Button",'snbar'); ?> :</td>
							 <td>									   
							   <input id="snbar_close" type="checkbox" <?php if(isset($options['snbar_set_cookie_btn'])) checked('1', $options['snbar_set_cookie_btn'],true);?>  name="Snbar_options[snbar_set_cookie_btn]" value = "1"/>
							   <label for="snbar_close"><span class="snbar_form_msg"> <?php _e("Check it to show close Bar button on the Bar",'snbar'); ?> </span></label>
							 </td>
						</tr>  
						
					 </table>												  			
				 </div>				
			     <p class="button-controls">
				 <?php $option = null; ?>
					<input type="hidden" name="action" value="update" />
					<input type="hidden" name="page_options" value="<?php echo $option; ?>" />						   
					<input type="submit" value="<?php _e('Save Settings','snbar'); ?>" class="button-primary" id="snbar_update" name="snbar_update">	
				 </p>				 
			</form>	<!-- edit form ends-->	
		</div> <!--inside end-->
    </div>
</div>


<iframe class="sbar_iframe" src="http://www.sketchthemes.com/sketch-updates/plugin-updates/sbar-lite/sbar-lite.php" width="250px" height="370px" scrolling="no" ></iframe>

<?php } ?>