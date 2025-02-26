<div class="wrap">
	<form method="post" action="options.php">
		<?php settings_fields( 'it_afbppl-global-settings-group' ); ?>
		<?php do_settings_sections( 'it_afbppl-global-settings-group' ); ?>
			<div class="container">
			<div class="plugin-pro">
				<div class="plugin-pro-ft">
						<?php _e('If you want to hire a wordpress expert for any modification over your website, So hire us today','it_afbppl');?><a href="http://infotheme.in/#contact" target="_blank" class="hire-btn">
							<?php _e('Hire Us Today!','it_afbppl');?>
						</a>
						<a href="http://infotheme.in/#support" target="_blank" class="button button-secondary">
							<?php _e('Get Support!','it_afbppl');?>
						</a>
				</div>
			</div>
			<section>
				<div class="tabs tabs-style-underline">
					<nav>
						<ul>
							<li><a href="#section-underline-1" class="icon icon-config"><span><?php _e('General','it_afbppl');?></span></a></li>
							<li><a href="#section-underline-2" class="icon icon-plug"><span><?php _e('Advanced','it_afbppl');?></span></a></li>
							<li><a href="#section-underline-3" class="icon icon-display"><span><?php _e('Styling','it_afbppl');?></span></a></li>
							<li><a href="#section-underline-4" class="icon icon-box"><span><?php _e('Bugs &amp; Support','it_afbppl');?></span></a></li>
						</ul>
					</nav>
					<div class="content-wrap">
						<section id="section-underline-1">
							<table class="form-table">
									<tr valign="top">
									<td scope="row"><?php _e('Facebook Page Url','it_afbppl');?></td>
									<td>
										<input id="it_afbppl_fburl" type="url" name="it_afbppl_fburl" value="<?php echo esc_attr( get_option('it_afbppl_fburl') ); ?>"/>
											<br/><small><?php _e('Enter your facebook page url','it_afbppl');?></small>
									</td>
									<td scope="row"><?php _e('Tabs','it_afbppl');?></td>
									<td>
										<input id="it_afbppl_fbtab" type="text" name="it_afbppl_fbtab" value="<?php echo esc_attr( get_option('it_afbppl_fbtab') ); ?>"/>
											<br/><small><?php _e('e.g., timeline, messages, events');?></small>
									</td>
									</tr>
									<tr valign="top">
									<td scope="row"><?php _e('LightBox Title','it_afbppl');?></td>
									<td>
										<input id="it_afbppl_title" type="text" name="it_afbppl_title" value="<?php echo esc_attr( get_option('it_afbppl_title') ); ?>"/>
											<br/><small><?php _e('Enter your lightbox title','it_afbppl');?></small>
									</td>
									</tr>
									<tr valign="top">
									<td scope="row"><?php _e('Facebook App Id','it_afbppl');?></td>
									<td>
										<input id="it_afbppl_appid" type="text" name="it_afbppl_appid" value="<?php echo esc_attr( get_option('it_afbppl_appid') ); ?>"/>
											<br/><small><?php _e('Enter your facebook app id','it_afbppl');?></small>
									</td>
									</tr>
									<tr valign="top">
									<td scope="row"><?php _e('Show LighBox In','it_afbppl');?></td>
									<td>
										<table>
											<tr>
											<td>
												<label><?php _e('Posts','it_afbppl');?></label>
												<?php if(get_option('it_afbppl_app_showIn')) $app_showIn =  get_option('it_afbppl_app_showIn'); else $app_showIn = array();?>
												
												<input id="it_afbppl_app_showIn" type="checkbox" name="it_afbppl_app_showIn[]" value="posts" <?php if(in_array('posts',$app_showIn)) echo 'checked'; ?>>
											</td>
											<td>
												<label><?php _e('Archives / Categories','it_afbppl');?></label>
												<input id="it_afbppl_app_showIn" type="checkbox" name="it_afbppl_app_showIn[]" value="archive" <?php if(in_array('archive',$app_showIn)) echo 'checked'; ?>>
											</td>
											</tr>
											<tr>
											<td>
												<label><?php _e('Pages','it_afbppl');?></label>
												<input id="it_afbppl_app_showIn" type="checkbox" name="it_afbppl_app_showIn[]" value="pages" <?php if(in_array('pages',$app_showIn)) echo 'checked'; ?>>
											</td>
											<td>
												<label><?php _e('Homepage','it_afbppl');?></label>
												<input id="it_afbppl_app_showIn" type="checkbox" name="it_afbppl_app_showIn[]" value="homepage" <?php if(in_array('homepage',$app_showIn)) echo 'checked'; ?>>
											</td>
											</tr>
										</table>	
									</td>
									</tr>
									<tr valign="top">
									<td scope="row"><?php _e('Delay','it_afbppl');?></td>
									<td>
										<input id="it_afbppl_app_lb_delay" type="number" name="it_afbppl_app_lb_delay" value="<?php echo esc_attr( get_option('it_afbppl_app_lb_delay') ); ?>" />
										<br/><small><?php _e('Delay in appearance of lightbox on frontend in ms (eg 1 second = 1000)','it_afbppl');?></small>
									</td>
									</tr>
									<tr valign="top">
									<td scope="row"><?php _e('Show Once in a day','it_afbppl');?></td>
									<td>
										<select name="it_afbppl_app_lb_in_day">
											<option value="0" <?php if(get_option('it_afbppl_app_lb_in_day') == '0') echo 'selected';?>><?php _e('No','it_afbppl');?></option>
											<option value="1" <?php if(get_option('it_afbppl_app_lb_in_day') == '1') echo 'selected';?>><?php _e('Yes','it_afbppl');?></option>
										</select>
										<br/><small><?php _e('Show once to a user / Show on each page load','it_afbppl');?></small>
									</td>
									</tr>
									<tr valign="top">
									<td scope="row"><?php _e('Close On Body Click','it_afbppl');?></td>
									<td>
										<select name="it_afbppl_app_lb_on_click">
											<option value="0" <?php if(get_option('it_afbppl_app_lb_on_click') == '1') echo 'selected';?>><?php _e('No','it_afbppl');?></option>
											<option value="1" <?php if(get_option('it_afbppl_app_lb_on_click') == '1') echo 'selected';?>><?php _e('Yes','it_afbppl');?></option>
										</select>
										<br/><small><?php _e('Close lighbox on body click / Close when click outside the lightbox','it_afbppl');?></small>
									</td>
									</tr>
							</table>
						</section>
						<section id="section-underline-2">
						<table class="form-table">
						<tr valign="top">
						<td scope="row"><?php _e('Don\'t show if user logged in','it_afbppl');?></td>
						<td>
							<input type="checkbox" value="1" name="it_afbppl_app_loggedin_user" <?php if(get_option('it_afbppl_app_loggedin_user') == '1') echo 'checked';?>>
							<br/><small><?php _e('Don\'t show lightbox if a user is logged in in to your website','it_afbppl');?></small>
						</td>
						</tr>
						<tr valign="top">
						<td scope="row"><?php _e('Don\'t show friends faces in likebox','it_afbppl');?></td>
						<td>
							<input type="checkbox" value="1" name="it_afbppl_app_fb_faces" <?php if(get_option('it_afbppl_app_fb_faces') == '1') echo 'checked';?>>
							<br/><small><?php _e('Don\'t show user\'s friends faces in likebox','it_afbppl');?></small>
						</td>
						</tr>
						<tr valign="top">
						<td scope="row"><?php _e('Don\'t show Cover photo of page','it_afbppl');?></td>
						<td>
							<input type="checkbox" value="1" name="it_afbppl_app_fb_hide_cover" <?php if(get_option('it_afbppl_app_fb_hide_cover') == '1') echo 'checked';?>>
							<br/><small><?php _e('Hide cover photo of your page in like box','it_afbppl');?></small>
						</td>
						</tr>
						<tr valign="top">
						<td scope="row"><?php _e('Enable small header of facebook like box','it_afbppl');?></td>
						<td>
							<input type="checkbox" value="1" name="it_afbppl_app_fb_sm_header" <?php if(get_option('it_afbppl_app_fb_sm_header') == '1') echo 'checked';?>>
							<br/><small><?php _e('Decrease your like box\'s height by using this feature.','it_afbppl');?></small>
						</td>
						</tr>
						</table>
						</section>
						<section id="section-underline-3">
						<table class="form-table">
							<tr valign="top">
							<td scope="row"><?php _e('Add Background Colour To LightBox Title','it_afbppl');?></td>
							<td>
								<input type="text" value="<?php echo esc_attr( get_option('it_afbppl_app_color_bglb') ); ?>" name="it_afbppl_app_color_bglb" id="it_afbppl_app_color_bglb">
							</td>
							</tr>
							<tr valign="top">
							<td scope="row"><?php _e('Add Text Colour To LightBox Title','it_afbppl');?></td>
							<td>
								<input type="text" value="<?php echo esc_attr( get_option('it_afbppl_app_color_lb') ); ?>" name="it_afbppl_app_color_lb" id="it_afbppl_app_color_lb">
							</td>
							</tr>
							<tr valign="top">
							<td scope="row"><?php _e('Add Background Colour To Overlay','it_afbppl');?></td>
							<td>
								<input type="text" value="<?php echo esc_attr( get_option('it_afbppl_app_color_bg') ); ?>" name="it_afbppl_app_color_bg" id="it_afbppl_app_color_bg">
							</td>
							</tr>
							<tr valign="top">
							<td scope="row"><?php _e('Lightbox Width','it_afbppl');?></td>
							<td>
								<input type="number" value="<?php echo esc_attr( get_option('it_afbppl_app_width_lb') ); ?>" name="it_afbppl_app_width_lb" id="it_afbppl_app_width_lb">
								<br/><small><?php _e('Define Lighbox width in pixels, such as for 430px = 430','it_afbppl');?></small>
							</td>
							</tr>
							<tr valign="top">
							<td scope="row"><?php _e('Lightbox Height (In px)','it_afbppl');?></td>
							<td>
								<input type="number" value="<?php echo esc_attr( get_option('it_afbppl_app_height_lb') ); ?>" name="it_afbppl_app_height_lb" id="it_afbppl_app_color_bg">
								<br/><small><?php _e('Define Lighbox width in pixels, such as for 214px = 214','it_afbppl');?></small>
							</td>
							</tr>
						</table>
						</section>
						<section id="section-underline-4">
						<span style="line-height:1.4;"><?php _e('We have tried our best to make this, bugs free and easy to use. If still there you are facing any bug or you want customization in this plugin, please contact us!','it_afbppl');?></span><br><br>
						<a href="<?php  echo 'http://infotheme.in/#contact';?>" target="_blank" class="button button-primary"><?php _e('Click Here To Contact','it_afbppl');?></a>
						</section>
					</div><!-- /content -->		
				</div><!-- /tabs -->
				<footer>
					<p><?php _e('This Plugin is Developed &amp; Designed By','it_afbppl');?> <a href="<?php echo 'http://infotheme.in';?>" target="_blank"><?php _e('InfoTheme','it_afbppl');?></a></p>
					<?php submit_button(); ?>
				</footer>
			</section>
		</div>
	</form>
	
</div>