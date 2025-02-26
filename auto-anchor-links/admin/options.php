<?php 

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

		if ( $_POST['page_options'] )	
			$options = explode(',', stripslashes($_POST['page_options']));
		if ($options) {
			foreach ($options as $option) {
				$option = trim($option);
				$value = trim($_POST[$option]);
				$mwm_aalLoader->options[$option] = $value;
			}
		
			// Save options
			update_option('mwm_aal_options', $mwm_aalLoader->options);
			$mwm_aalLoader->show_message(__('Updated Successfully','mwmall'));
			
		}
		?>
	
		
<div class="wrap">
	<h2>Auto Anchor List Options</h2>
	
	
	
	
	
	
	<form name="generaloptions" method="post">
	<?php wp_nonce_field('ngg_settings') ?>
	<input type="hidden" name="page_options" value="activatePlugin,activateCSS,autoDisplayInContent,displayTitle,displayPosts,displayPages,contentColumnCount,is_home,is_single,is_page,is_category,is_tag,is_date,is_author,is_search" />
		<table class="form-table">
			<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('Activate Plugin','mwmaal') ?></th>
				<td>
				<input type="checkbox" name="activatePlugin" value="true" <?php checked(true, $mwm_aalLoader->options['activatePlugin']); ?> />
						<?php _e('Deactivating this plugin will simply prevent any display.','mwmaal') ?>
				</td>
				<!-- ======= Credits ============= -->
				<td valign="top" rowspan="20" width="200px" >
					<p>Created by:</p>
					<div style="text-align:center;">
					<a href="http://www.mindwiremedia.net"><img src="http://www.mindwiremedia.net/_wpPluginImageResources/logo.png" border="0" width="200px;"></a><br/><a href="http://www.mindwiremedia.net"><small>www.mindwiremedia.net</small></a>

					<br/>
					Join In: <a href="http://www.linkedin.com/in/mindwiremedia"><img src="http://www.mindwiremedia.net/_mailSignature/linkedin.jpg" border="0" title="Connect on LinkedIn"></a> <a href="http://www.facebook.com/pages/Colorado-Springs-CO/MindWireMedia/56441558483"><img src="http://www.mindwiremedia.net/_mailSignature/facebook.png" border="0" title="Friend Us On Facebook"></a> <a href="http://twitter.com/mindwiremedia"></a><img src="http://www.mindwiremedia.net/_mailSignature/twitter.png" border="0" title="Follow Us on Twitter"></a>
					</div>
										<h2 style="margin-top:0px;"><?php _e('Like this plugin?','mwmaal'); ?></h2>
					
					<p><?php _e('Why not do the following:','mwmaal'); ?></p>
					
						<p><a href="http://www.mindwiremedia.net/products/wordpress/plugins/auto-anchor-links-wordpress-plugin-home/" target="_blank">Plugin Author Homepage</a></p>
						<p><?php _e('Link to it so other folks can find out about it.','mwmaal'); ?></p>
						<p>
							<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7738177" target="_blank">
					<img src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</a>
					
						</p>

		</td>
		<!-- ======= END Credits ============= -->
			</tr>
			<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('Activate AAL CSS','mwmaal') ?></th>
				<td>
				<input type="checkbox" name="activateCSS" value="true" <?php checked(true, $mwm_aalLoader->options['activateCSS']); ?> />
						<?php _e('Uncheck if you want to use your own CSS.','mwmaal') ?>
				</td>
			</tr>
			<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('List Output Title','mwmaal') ?></th>
				<td>
				<input type="text" size="35" name="displayTitle" value="<?php echo $mwm_aalLoader->options['displayTitle']; ?>" />
						<span class="setting-description"><?php _e('Title to display above anchor link list.','mwmaal') ?></span>
				</td>
			</tr>
			<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('Auto Display In Content','mwmaal') ?></th>
				<td>
				<input type="checkbox" name="autoDisplayInContent" value="true" <?php checked(true, $mwm_aalLoader->options['autoDisplayInContent']); ?> />
						<?php _e('Do you want to automatically display links to &lt;H&gt; tags at the top of content?','mwmaal') ?>
				</td>
			</tr>
			<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('Auto Display On','mwmaal') ?></th>
				<td>
				<?php _e('If auto display is on, where do you want the links to display?','mwmaal') ?><br/>
					<input type="checkbox" name="is_home"<?php checked($mwm_aalLoader->options['is_home']); ?> /> <?php _e("Front page of the blog", 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_single"<?php checked($mwm_aalLoader->options['is_single']); ?> /> <?php _e("Individual blog posts", 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_page"<?php checked($mwm_aalLoader->options['is_page']); ?> /> <?php _e('Individual WordPress "Pages"', 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_category"<?php checked($mwm_aalLoader->options['is_category']); ?> /> <?php _e("Category archives", 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_tag"<?php checked($mwm_aalLoader->options['is_tag']); ?> /> <?php _e("Tag listings", 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_date"<?php checked($mwm_aalLoader->options['is_date']); ?> /> <?php _e("Date-based archives", 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_author"<?php checked($mwm_aalLoader->options['is_author']); ?> /> <?php _e("Author archives", 'mwmaal'); ?><br/>
			<input type="checkbox" name="is_search"<?php checked($mwm_aalLoader->options['is_search']); ?> /> <?php _e("Search results", 'mwmaal'); ?><br/>
		
				</td>
			</tr>
			<!--<tr  valign="top">
				<th scope="row" valign="top" align="left"><?php _e('# of Columns in Content','mwmaal') ?></th>
				<td>
				<input type="text" size="3" name="contentColumnCount" value="<?php echo $mwm_aalLoader->options['contentColumnCount']; ?>" />
						<span class="setting-description"><?php _e('How many columns do you want to break the links displayed in the content into.','mwmaal') ?></span>
				</td>
			</tr>-->
		</table>
		<div class="submit"><input class="button-primary" type="submit" name="updateoption" value="<?php _e('Save Changes') ;?>"/></div>
	</form>

</div>
