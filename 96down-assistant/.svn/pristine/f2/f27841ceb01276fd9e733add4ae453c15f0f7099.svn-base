<?php
/**
 * Render the Plugin options form
 * @since 2.0.0
 * @modified 2014.02.10 to fit 3.8 layout and styling
 */
function dbfw_render_form() { ?>

	<div class="wrap">
		
		<!-- Display Plugin Header, and Description -->
		<h2><?php _e( '96 Down Assistant Settings', '96down-assistant' ); ?></h2>
		
		<p><?php _e( 'Below you can adjust the output of the 96 Down Assistant Widget. You can change the title of the widget, the feed URL, the amount of feed items to show and the background color of the widget.', 'dashboard-feed-widget' ); ?></p>
			
		<div id="dbfw-settings">
	
			<!-- Beginning of the Plugin Options Form -->
			<form method="post" action="options.php">
			
				<?php settings_fields( 'dbfw_plugin_options' ); ?>
		
				<?php $options = get_option( 'dbfw_options' ); ?>
			
				<table class="form-table"><tbody>
						
					<tr valign="top">
						<th scope="row">
							<label for="dbfw-title"><?php _e( 'Widget Title', 'dashboard-feed-widget' ); ?></label>
						</th>
						
						<td>
							<input name="dbfw_options[widget_title]" type="text" id="dbfw-title" class="regular-text" value="<?php echo $options['widget_title']; ?>" />
							<p class="description"><?php _e( 'Change the title of the 96Down Assistant Feed Widget into something of your liking', 'dashboard-feed-widget' ); ?></p>
							<input type="hidden" name="action" value="update" />
							<input type="hidden" name="page_options" value="<?php echo $options['widget_title']; ?>" />								
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row">
							<label for="dbfw-feed-url"><?php _e( 'Feed URL', 'dashboard-feed-widget' ); ?></label>
						</th>
						
						<td>
							<input name="dbfw_options[feed_url]" type="text" id="dbfw-feed-url" class="regular-text code" value="<?php echo $options['feed_url']; ?>" />
							<p class="description"><?php _e( 'Change the feed-URL to a site of your choice', 'dashboard-feed-widget' ); ?></p>
							<input type="hidden" name="action" value="update" />
							<input type="hidden" name="page_options" value="<?php echo $options['feed_url']; ?>" />								
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row">
							<label for="dbfw-select"><?php _e( 'How many Feed Items to show in the 96Down Assistant Widget', 'dashboard-feed-widget' ); ?></label>
						</th>
						
						<td>
							<select name='dbfw_options[drp_select_box]'>
								<option value='1' <?php selected( '1', $options['drp_select_box'] ); ?>>1</option>
								<option value='2' <?php selected( '2', $options['drp_select_box'] ); ?>>2</option>
								<option value='3' <?php selected( '3', $options['drp_select_box'] ); ?>>3</option>
								<option value='4' <?php selected( '4', $options['drp_select_box'] ); ?>>4</option>
								<option value='5' <?php selected( '5', $options['drp_select_box'] ); ?>>5</option>
								<option value='6' <?php selected( '6', $options['drp_select_box'] ); ?>>6</option>
								<option value='7' <?php selected( '7', $options['drp_select_box'] ); ?>>7</option>
								<option value='8' <?php selected( '8', $options['drp_select_box'] ); ?>>8</option>
								<option value='9' <?php selected( '9', $options['drp_select_box'] ); ?>>9</option>
								<option value='10' <?php selected( '10', $options['drp_select_box'] ); ?>>10</option>
							</select>
							<p class="description"><?php _e( 'How many feed items to show in the widget?', 'dashboard-feed-widget' ); ?></p>
							<input type="hidden" name="action" value="update" />
							<input type="hidden" name="page_options" value="<?php echo $options['drp_select_box']; ?>" />								
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row">
							<label for="dbfw-bkgr-color"><?php _e( 'Widget Background Color', 'dashboard-feed-widget' ); ?></label>
						</th>
						
						<td>
							<input name="dbfw_options[widget_bkgr]" type="text" id="dbfw-bkgr-color" class="code" value="<?php echo $options['widget_bkgr']; ?>" />
							<p class="description"><?php _e( 'Change the background color of the widget (3 or 6 digit HEX code without the #)', 'dashboard-feed-widget' ); ?></p>
							<input type="hidden" name="action" value="update" />
							<input type="hidden" name="page_options" value="<?php echo $options['widget_bkgr']; ?>" />								
						</td>
					</tr>
					
					<tr valign="top">
						<th scope="row">
							<label for="dbfw-db-chk"><?php _e( 'Database Options', 'dashboard-feed-widget' ); ?></label>
						</th>
						
						<td>
							<input name="dbfw_options[chk_default_options_db]" type="checkbox" id="dbfw-db-chk" value="1" <?php if ( isset($options['chk_default_options_db'] ) ) { checked( '1', $options['chk_default_options_db'] ); } ?> />
								<?php _e( 'Restore defaults upon plugin deactivation/reactivation', 'dashboard-feed-widget' ); ?>
							<p class="description"><?php _e( 'Only check this if you want to reset plugin settings upon Plugin reactivation', 'dashboard-feed-widget' ); ?></p>
						</td>
					</tr>
				
				</tbody></table> <!-- end .tbody end table -->
				
				<p class="submit">
					
					<input type="submit" class="button-primary" value="<?php _e( 'Save Settings', 'dashboard-feed-widget' ) ?>" />
				
				</p>
			
			</form>
		
		</div><!-- #dbfw-settings -->
		
		<div class="author postbox">
			
			<h3 class="hndle">
				<span><?php _e( 'About the Author', 'dashboard-feed-widget' ); ?></span>
			</h3>
			
			<div class="inside">
				<div class="top">
				  <img class="author-image" src="<?php echo plugins_url('../images/calicotek-logo.jpg', __FILE__); ?>" height="150px" width="150px" />
					<p>
						<?php printf( __( 'Hi, my name is ModManMatt, I hope you like this plugin! Please check out any of my other plugins on <a href="%s" title="CaliCoTek">CaliCoTek.com</a>. You can find out more information about me via the following links:', 'dashboard-feed-widget' ),
							esc_url( 'http://calicotek.com' )
									); ?> <br /><hr /> <a href="http://96down.com/private/"><img src="<?php echo plugins_url('../images/96down-icon5.png', __FILE__); ?>" width="50%" height="50%" target="_blank" title="Visit 96Down"/></a>
					</p>
				</div> <!-- end .top -->
				
				<ul>
					<li><a href="http://calicotek.com/" target="_blank" title="CaliCoTek"><?php _e( 'CaliCoTek', 'dashboard-feed-widget' ); ?></a></li>
					<li><a href="https://plus.google.com/+calicotek" target="_blank" title="CaliCoTek on Google+"><?php _e( 'Google+', 'dashboard-feed-widget' ); ?></a></li>
					<li><a href="http://cn.linkedin.com/in/calicotek" target="_blank" title="LinkedIn profile"><?php _e( 'LinkedIn', 'dashboard-feed-widget' ); ?></a></li>
					<li><a href="http://twitter.com/calicotek" target="_blank" title="Twitter"><?php _e( 'Twitter: @calicotek', 'dashboard-feed-widget' ); ?></a></li>
				</ul>
			
			</div> <!-- end .inside -->
		
		</div> <!-- end .postbox -->

	</div> <!-- end .wrap -->

<?php }

