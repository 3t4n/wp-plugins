<?php


$location = $options_page;
$ARTFpluginpath = get_option('siteurl').'/wp-content/plugins/anupraj-tell-friends';
?>

<div class="wrap">
	<style>
	.strong{font-weight:bold}
	.fieldset{border:1px solid gray; padding:20px}
	</style>
	<table border="0"><tr><td><img src="<?php echo $ARTFpluginpath; ?>/images/ARTF.gif" title="AnupRaj Tell Friends" /></td>
	<td style="padding-left:50px"><h2>AnupRaj Tell Friends</h2>
	<?php
if ( isset($_GET['updated'])&& ($_GET['updated']==true)){?> 
<div id="message" class="updated fade"><p><?php echo "Settings Saved"; ?></p></div>
<?php
}
?>
	<p><em>"AnupRaj Tell Friends" plugin by <a href="http://anupraj.com.np/">Anup Raj</a><br />
		Visit the <a href="http://anupraj.com.np/index.php/wp-plugins/anupraj-tell-friends">AnupRaj Tell Friends</a> Plugin site for more information.</em></p></td></tr></table> 
		<h2>Donate</h2>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="10761157">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG_global.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<p style="padding-left:15px;">
Earn Gratitude and contribue by <a href="http://anupraj.com.np/" target="_blank"><strong>Donating</strong></a><br /><em>Your effort will help further development of the plugin.</em></p>
		<br />
		
		<h2>Customizatioin</h2>
		<br />
			<form method="post" action="options.php">
				<?php wp_nonce_field('update-options'); ?>
				
				<fieldset class="fieldset"><legend>Mail</legend>
					<label for="ARTF_blog_name" class="strong">Site name:</label> 
					<input name="ARTF_blog_name" type="text" id="ARTF_blog_name" value="<?php if(get_option('ARTF_blog_name')==""){form_option('blogname');}else{echo get_option('ARTF_blog_name');} ?>" class="regular-text" />
					<br /><br />
					<label for="ARTF_admin_email" class="strong">Site email:</label>
					<input name="ARTF_admin_email" type="text" id="ARTF_admin_email" value="<?php
					if(get_option('ARTF_admin_email')==""){form_option('admin_email');}else{echo get_option('ARTF_admin_email');}
					?>" class="regular-text" /> <em>recommended: noreply@yoursite.com</em><br /><br />
					<br /><br />
					
				</fieldset>
				<br />
				<?php 
				$ARTFcustom_message="";
				if(get_option('ARTFcustom_message')==true){$ARTFcustom_message = "checked=\"1\"";}
				?>
				<fieldset class="fieldset"><legend>Message</legend>
				<label for="ARTF_custom_msg" class="strong">Custom Message</label> <em>(text/html)</em><br />
							<textarea name="ARTF_custom_msg" id="ARTF_custom_msg" style="width:300px; height:100px;" ><?php 
							if(get_option('ARTF_custom_msg')==""){
								echo "Hi!
I just found this page. 
I believe the contents of the page is useful to view.
Thanks";
							}else{
								echo get_option('ARTF_custom_msg');
							}
							?></textarea><br /> <em>Keep 'custom message' simple</em><br /><br />
				</fieldset>
				<br />
				<fieldset class="fieldset"><legend>Widget Setting <em>(Widget must be enabled)</em></legend>
				<p>
				<label for="ARTFtext" class="strong">ARTF Text</label> <input type="text" name="ARTFtext" id="ARTFtext" value="<?php if(get_option('ARTFtext')==""){ echo "Tell A Friend";}else{echo get_option('ARTFtext');} ?>" /> <em>Type Text for anchor (eg. Tell A Friend)</em>
				</p><br />
				</fieldset>
				<br /><br />
				<?php 
					$ARTFoldStats = get_option("ARTFstat");
					if($ARTFoldStats !="" &&($ARTFoldStats == true || $ARTFoldStats >= 0 )){$ARTFstats = "checked=\"1\"";}else{
					update_option("ARTFstatsData","");}
				?>
				 <input type="checkbox" name="ARTFstat" id="ARTFstat" <?php echo $ARTFstats;?> class="regular-text" /> <label for="ARTFstat" class="strong">Activate usage Stats of "AnupRaj Tell Friend" plugin by your visitor </label><br /><em>If previously activated, deactivating it will reset the stats data.</em>
				<br />

				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="ARTF_custom_msg,ARTF_admin_email,ARTF_blog_name,ARTFbcc,ARTFcheck_dns,ARTFcustom_message,ARTFanchor,ARTFmsg_length,ARTFlink_opt,ARTFtext,ARTFcustomlink,ARTFcaptcha,ARTFcusTitle,ARTFantiSPAM,ARTFsendercopy,ARTFstat,ARTFstatsData" />
				<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update') ?>" /> <em>(To Reset: clear all fields and Update)</em></p>
				
				<img src="http://anupraj.com.np/wp.php?type=plugin&name=ARTF&ref=options" style="height:1px;width:1px; " title="Please leave this tag intact to help me find your site. Thank You :)" />
		</form>
		
</div>