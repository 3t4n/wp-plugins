<?php
// Stop direct call
if (preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) {
				die('You are not allowed to call this page directly.');
}

$urlp = plugins_url('/auto-attachments');
$opts = get_option('auto_attachments_options');
?>
<div class='wrap'>
	<h2><span class="aa-paperclip" style="font-size:23px;"></span><?php _e('Auto Attachments Settings Page', 'autoa'); ?> (<?php echo aa_plugin_get_version(); ?>)</h2>
	<div class="row" style="margin:0;top:0 !important;">
<!-- Admin Area -->
	<form method="post" action='<?php echo $_SERVER["REQUEST_URI"]; ?>' class="col-xs-12 col-md-9">
	<?php wp_nonce_field('update-options'); ?>
		<div style="margin-top:10px;">
			<div class="panel-group" id="accordion">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php _e('<strong>Header Text Settings</strong>', 'autoa'); ?></a>
						</h3>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body">
						<p><small><?php _e('You can now change <strong>Header Texts</strong> from here. You can localize to your language :)', 'autoa'); ?></small></p>
						<p class="clearfix"><strong><?php _e('Add Header Text for Mp3 Files:', 'autoa'); ?></strong><br />
								<div class="col-lg-4 col-xs-6"><input type="text" name="autoa[mp3_listen]" value="<?php echo $opts['mp3_listen']; ?>" class="form-control" /></div>
								<div class="btn-group" data-target="showmp3info" data-toggle="buttons-radio"  >
									  <button type="button" value="yes" class="btn btn-info yes" data-toggle="button"><?php _e('Show', 'autoa'); ?></button>
									  <button type="button" value="no" class="btn btn-info no" data-toggle="button"><?php _e('Hide', 'autoa'); ?></button>
								</div>
							<input type="hidden" name="autoa[showmp3info]" id="showmp3info" value="<?php echo $opts['showmp3info'];?>" />
						</p>
						<p class="clearfix"><strong><?php _e('Add Header Text for Video Files:', 'autoa'); ?></strong><br />
								<div class="col-lg-4 col-xs-6"><input type="text" name="autoa[video_watch]" value="<?php echo $opts['video_watch'] ?>" class="form-control" /></div>
								<div class="btn-group" data-target="showvideoinfo" data-toggle="buttons-radio"  >
									  <button type="button" value="yes" class="btn btn-info yes" data-toggle="button"><?php _e('Show', 'autoa'); ?></button>
									  <button type="button" value="no" class="btn btn-info no" data-toggle="button"><?php _e('Hide', 'autoa'); ?></button>
								</div>
							<input type="hidden" name="autoa[showvideoinfo]" id="showvideoinfo" value="<?php echo $opts['showvideoinfo'];?>" />
						</p>
						<p class="clearfix"><strong><?php _e('Title Before Attachments:', 'autoa'); ?></strong><br />
								<div class="col-lg-4 col-xs-6"><input type="text" name="autoa[before_title]" value="<?php echo $opts['before_title'] ?>" class="form-control" /></div>
								<div class="btn-group" data-target="show_b_title" data-toggle="buttons-radio"  >
									  <button type="button" value="yes" class="btn btn-info yes" data-toggle="button"><?php _e('Show', 'autoa'); ?></button>
									  <button type="button" value="no" class="btn btn-info no" data-toggle="button"><?php _e('Hide', 'autoa'); ?></button>
								</div>
							<input type="hidden" name="autoa[show_b_title]" id="show_b_title" value="<?php echo $opts['show_b_title'];?>" />
								<small><i><?php _e('HTML Accepted', 'autoa'); ?></i></small>
						</p>
					</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><?php _e('<strong>Page & Homepage Settings</strong>', 'autoa'); ?></a></h3>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
					<div class="panel-body">
						<p><strong><?php _e('Show on Categories', 'autoa'); ?></strong></p>
							<span style="font-size: 10px;"><em><?php _e('If you set this settings "Yes", attachments shown on category and single pages. If not attachments shown only in posts', 'autoa');?></em></span>
							<p>
								<div class="btn-group" data-target="category_ok" data-toggle="buttons-radio">
									  <button type="button" value="yes" class="btn btn-info yes" data-toggle="button"><?php _e('Yes', 'autoa'); ?></button>
									  <button type="button" value="no" class="btn btn-info no" data-toggle="button"><?php _e('No', 'autoa'); ?></button>
								</div>
							<input type="hidden" name="autoa[category_ok]" id="category_ok" value="<?php echo $opts['category_ok'];?>" />
							</p>
						<p><strong><?php _e('Show on Homepage', 'autoa'); ?></strong></p>
							<span style="font-size: 10px;"><em><?php _e('If you set this settings "Yes", attachments shown on homepage and single pages. If not attachments shown only in posts', 'autoa');?></em></span>
							<p>
								<div class="btn-group" data-target="homepage_ok" data-toggle="buttons-radio">
									  <button type="button" value="yes" class="btn btn-info yes" data-toggle="button"><?php _e('Yes', 'autoa'); ?></button>
									  <button type="button" value="no" class="btn btn-info no" data-toggle="button"><?php _e('No', 'autoa'); ?></button>
								</div>
							<input type="hidden" name="autoa[homepage_ok]" id="homepage_ok" value="<?php echo $opts['homepage_ok'];?>" />
							</p>
					</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><?php _e('<strong>Gallery Settings</strong>', 'autoa'); ?></a></h3>
					</div>
					<div id="collapseThree" class="panel-collapse collapse" style="height: 0px;">
					<div class="panel-body">
						<p><strong><?php _e('Show Gallery?', 'autoa'); ?></strong></p>
							<span style="font-size: 10px;text-align:justify;"><em><?php _e('You can use gallery for show your image attachments without any plugin or else :) Also if you use colorbox or any other gallery lihtbox plugin yopu can disable colorbox usage.', 'autoa'); ?></em></span>
							<p>
								<div class="btn-group" data-target="galeri_yes" data-toggle="buttons-radio">
									  <button type="button" value="yes" class="btn btn-info yes" data-toggle="button"><?php _e('Yes', 'autoa'); ?></button>
									  <button type="button" value="no" class="btn btn-info no" data-toggle="button"><?php _e('No', 'autoa'); ?></button>
								</div>
							<input type="hidden" name="autoa[galeri]" id="galeri_yes" value="<?php echo $opts['galeri'];?>" />
						<label><?php _e('Select Gallery Color Style','autoa'); ?></label>
							<?php $glsy = array("light","dark");
										$gyl = $opts['galstyle'];
								?>
									<select name="autoa[galstyle]" id="galstyle">
										<?php
											foreach ($glsy as $gls) {
											$selected = ($gyl == $gls) ? 'selected="selected"' : '';
										?>
											<option value="<?php echo $gls; ?>" <?php echo $selected; ?> /><?php echo $gls; ?></option>
										<?php } ?>
									</select>
						</p>
						<p><strong><?php _e('Use Slimbox?', 'autoa'); ?></strong></p>
							<p>
								<div class="btn-group" data-target="use_colorbox" data-toggle="buttons-radio">
									  <button type="button" value="yes" class="btn btn-info yes" data-toggle="button"><?php _e('Yes', 'autoa'); ?></button>
									  <button type="button" value="no" class="btn btn-info no" data-toggle="button"><?php _e('No', 'autoa'); ?></button>
								</div>
							<input type="hidden" name="autoa[use_colorbox]" id="use_colorbox" value="<?php echo $opts['use_colorbox'];?>" />
							<label><?php _e('Select Slimbox Color Style', 'autoa'); ?></label>
							<?php $slsy = array("light","dark");
										$syl = $opts['slimstyle'];
								?>
									<select name="autoa[slimstyle]" id="slimstyle">
										<?php
											foreach ($slsy as $sls) {
											$selected = ($syl == $sls) ? 'selected="selected"' : '';
										?>
											<option value="<?php echo $sls; ?>" <?php echo $selected; ?> /><?php echo $sls; ?></option>
										<?php } ?>
									</select>
						</p>
						<p><strong><?php _e('Gallery Thumb Size?', 'autoa'); ?></strong></p>
							<input type="text" name="autoa[thw]" size="3" value="<?php echo $opts['thw']; ?>" />px <strong>(<?php _e('Width', 'autoa'); ?>)</strong>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="autoa[thh]" size="3" value="<?php echo $opts['thh']; ?>" />px <strong>(<?php _e('Height', 'autoa'); ?>)</strong>
						<p><strong><?php _e('Gallery Big Image Size?', 'autoa'); ?></strong></p>
							<input type="text" name="autoa[tbhw]" size="3" value="<?php echo $opts['tbhw']; ?>" />px <strong>(<?php _e('Width', 'autoa'); ?>)</strong>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="autoa[tbhh]" size="3" value="<?php echo $opts['tbhh']; ?>" />px <strong>(<?php _e('Height', 'autoa');?>)</strong>
					</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><?php _e('<strong>Misc. Settings</strong>', 'autoa'); ?></a></h3>
					</div>
					<div id="collapseFour" class="panel-collapse collapse" style="height: 0px;">
					<div class="panel-body">
					<p><strong><?php _e('Hide Files Section Permanently', 'autoa'); ?></strong></p>
							<span style="font-size: 10px;"><em><?php _e('If this option set to yes, plugin will not show files area (Default No).', 'autoa'); ?></em></span>
							<p>
								<div class="btn-group" data-target="hidefilesall" data-toggle="buttons-radio">
									  <button type="button" value="yes" class="btn btn-info yes" data-toggle="button"><?php _e('Yes', 'autoa'); ?></button>
									  <button type="button" value="no" class="btn btn-info no" data-toggle="button"><?php _e('No', 'autoa'); ?></button>
								</div>
							<input type="hidden" name="autoa[hidefilesall]" id="hidefilesall" value="<?php echo $opts['hidefilesall'];?>" />
							</p>
						<p><strong><?php _e('Hide Audio Section Permanently', 'autoa'); ?></strong></p>
							<span style="font-size: 10px;"><em><?php _e('If this option set to yes, plugin will not show audio area (Default No).', 'autoa'); ?></em></span>
							<p>
								<div class="btn-group" data-target="hideaudioall" data-toggle="buttons-radio">
									  <button type="button" value="yes" class="btn btn-info yes" data-toggle="button"><?php _e('Yes', 'autoa'); ?></button>
									  <button type="button" value="no" class="btn btn-info no" data-toggle="button"><?php _e('No', 'autoa'); ?></button>
								</div>
							<input type="hidden" name="autoa[hideaudioall]" id="hideaudioall" value="<?php echo $opts['hideaudioall'];?>" />
							</p>
						<p><strong><?php _e('Hide Video Section Permanently', 'autoa'); ?></strong></p>
							<span style="font-size: 10px;"><em><?php _e('If this option set to yes, plugin will not show video area (Default No).', 'autoa'); ?></em></span>
							<p>
								<div class="btn-group" data-target="hidevideoall" data-toggle="buttons-radio">
									  <button type="button" value="yes" class="btn btn-info yes" data-toggle="button"><?php _e('Yes', 'autoa'); ?></button>
									  <button type="button" value="no" class="btn btn-info no" data-toggle="button"><?php _e('No', 'autoa'); ?></button>
								</div>
							<input type="hidden" name="autoa[hidevideoall]" id="hidevideoall" value="<?php echo $opts['hidevideoall'];?>" />
							</p>
							<hr />
						<p><strong><?php _e('List View Of Files', 'autoa'); ?></strong></p>
							<span style="font-size: 10px;"><em><?php _e('If you activate this option your downloadable files seen in a list view.', 'autoa'); ?></em></span>
							<p>
								<div class="btn-group" data-target="listview" data-toggle="buttons-radio">
									  <button type="button" value="yes" class="btn btn-info yes" data-toggle="button"><?php _e('Yes', 'autoa'); ?></button>
									  <button type="button" value="no" class="btn btn-info no" data-toggle="button"><?php _e('No', 'autoa'); ?></button>
								</div>
							<input type="hidden" name="autoa[listview]" id="listview" value="<?php echo $opts['listview'];?>" />
							</p>
						<p><strong><?php _e('Open files in new window?', 'autoa'); ?></strong></p>
							<span style="font-size: 10px;"><em><?php _e('Do you want to open files in new window?.', 'autoa'); ?></em></span>
							<p>
								<div class="btn-group" data-target="newwindow" data-toggle="buttons-radio">
									  <button type="button" value="yes" class="btn btn-info yes" data-toggle="button"><?php _e('Yes', 'autoa'); ?></button>
									  <button type="button" value="no" class="btn btn-info no" data-toggle="button"><?php _e('No', 'autoa'); ?></button>
								</div>
							<input type="hidden" name="autoa[newwindow]" id="newwindow" value="<?php echo $opts['newwindow'];?>" />
							</p>
						<p><strong><?php _e('File Icon Size?', 'autoa'); ?></strong></p> 
						<input type="text" name="autoa[fhw]" size="3" value="<?php echo $opts['fhw']; ?>" />px <strong>(<?php _e('Width', 'autoa'); ?>)</strong>&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="autoa[fhh]" size="3" value="<?php echo $opts['fhh']; ?>" />px <strong>(<?php _e('Height', 'autoa'); ?>)</strong>
						<p><strong><?php _e('Player Dimensions?', 'autoa'); ?></strong><br />
							<small><i><?php _e('This dimensions actually for video player. Mp3 player will use only width.','autoa'); ?></i></small></p>
								<input type="text" name="autoa[jhw]" size="3" value="<?php echo $opts['jhw']; ?>" />px <strong>(<?php _e('Width', 'autoa'); ?>)</strong>&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="autoa[jhh]" size="3" value="<?php echo $opts['jhh']; ?>" />px <strong>(<?php _e('Height', 'autoa'); ?>)</strong>
						<p><strong><?php _e('Excluded Post Types', 'autoa');?></strong><br />
							<?php _e('Posts and Pages can\'t be excluded. You can select other post type(s) to exclude.', 'autoa');?><br />
							<hr /><?php _e('You have these Post Types: ', 'autoa');?>
							<?php
								$args=array('_builtin'   => false); $post_types=get_post_types($args,'names');foreach ($post_types as $pt){?>
								<?php echo '<em><strong>'.$pt.'</strong></em>,';?>
							<?php }?><hr />
							<?php _e('Please write post types to exlude. Seperate with comma', 'autoa');?><br />
							<input type="text"  name="autoa[post_types]" size="50" value="<?php echo trim($opts['post_types']);?>" />
						</p>
					</div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><?php _e('<strong>Custom CSS</strong>', 'autoa'); ?></a></h3>
					</div>
					<div id="collapseFive" class="panel-collapse collapse" style="height: 0px;">
						<div class="panel-body">
							<textarea name="autoa[aa_custom_css]" id="custom_css" style="margin:0;padding:0; width: 99.9%; height: 460px; position: relative;"><?php echo $opts['aa_custom_css']; ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<br />
			<input type="hidden" name="serkoup" value="uppo"/>
				<p><input type="submit" name="Submit" value="<?php _e('Save Changes'); ?>" class="btn btn-primary" /></p>
		</div>
	</form>
<!-- Admin Area -->
<!-- Right Widgets -->
	<div class="col-xs-12 col-md-3">
		<div id="dashboard_plugins" class="metabox-holder">
			<div id="dashboard" class="postbox">
				<h3 class='hndle'><span><?php _e('Contributor', 'autoa'); ?></span></h3>
					<div class="inside">
						<p style="padding:5px;">
							<img src="http://www.gravatar.com/avatar/d9e0fb92795db0ad96cf2b37bf0fc042.png" align="right" style="width:80px;height:80px;padding:2px;"><br /><strong>Serkan Algur</strong>
								<ul style="padding:5px;">
									<li><a href="http://www.wpadami.com" target="_blank"><?php _e('Personal Blog (Turkish)', 'autoa'); ?></a></li>
									<li><a href="http://www.wpfunc.com" target="_blank"><?php _e('WpFunC (functions share)', 'autoa'); ?></a></li>
									<li><a href="http://facebook.com/serkan.algur" target="_blank"><?php _e('Facebook', 'autoa'); ?></a></li>
									<li><a href="https://twitter.com/kaisercrazy" class="twitter-follow-button" data-show-count="true" data-lang="tr" data-show-screen-name="false"></a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
									<li><a href="http://www.friendfeed.com/kaisercrazy" target="_blank"><?php _e('Friendfeed', 'autoa'); ?></a></li>
									<li><a href="mailto:info@wpadami.com"><?php _e('Email Me', 'autoa'); ?></a></li>
									<li><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
										<input type="hidden" name="cmd" value="_s-xclick">
										<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
										">
										<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
										<img alt="" border="0" src="https://www.paypalobjects.com/tr_TR/i/scr/pixel.gif" width="1" height="1">
										</form>
									</li>
								</ul>
						</p>
					</div>
			</div>
			<div id="dashboard" class="postbox">
				<h3><?php _e('Preview', 'autoa'); ?></h3>
					<div class="inside"><br />
						<div class='mp3info'><?php echo $opts['mp3_listen']; ?></div>
						<div class='videoinfo'><?php echo $opts['video_watch']; ?></div>
					</div>
			</div>
			<!-- Insert Info Headers' Style -->
			<style>
				.videoinfo,.mp3info,.afileinfo{ width:200px;padding: 5px 0 5px 5px;line-height: 20px;font-size: 14px;margin: 0 0 10px 10px;text-align:justify;text-shadow: 1px 1px 1px #FFF;display:block;font-weight:bold;}
				.mp3info{background: #f5f5f5;border: 1px solid #dadada;color: #666666;clear:both;}
				.videoinfo{background: #FFFFCC;border: 1px solid #FFCC66;color: #996600;clear:both;}
				/* The CSS */
			</style>
		</div>
	</div>
<!-- Right Widgets -->
</div>
</div>
