 <div style="width: 80%; padding: 10px; margin: 10px;"> 

	<h1>Dhrup Social share Settings</h1>
<!-- Start Options Form -->

	<form action="options.php" method="post" id="dpss-sidebar-admin-form">
		
	<div id="dpss-tab-menu">
	  <a id="dpss-general" class="dpss-tab-links active" >General</a> 
	  <a  id="dpss-share-buttons" class="dpss-tab-links">Social Share Buttons</a> 
	  
	</div>
	<div class="dpss-setting">
	<!-- General Setting -->	
	<div class="first dpss-tab" id="div-dpss-general">
	<h2>General Settings</h2>
    
    <p><input type="checkbox" id="dpss_active" name="dpss_active" value='1' <?php checked(get_option('dpss_active'),1);?>/> <b><?php _e('Enable Sidebar');?> </b>
    </p>
    <p><h3><strong><?php _e('Social Share Button Publish Options:','dpss');?></strong></h3></p>
	<p>
	 <input type="checkbox" id="publish1" value="yes" name="dpss_fpublishBtn" <?php checked(get_option('dpss_fpublishBtn'),'yes');?>/><b>Facebook Button</b>
	</p>
	<p>
	<input type="checkbox" id="publish2" name="dpss_tpublishBtn" value="yes" <?php checked(get_option('dpss_tpublishBtn'),'yes');?>/> <b>Twitter Button</b>
	</p>
	<p>
	<input type="checkbox" id="publish3" name="dpss_gpublishBtn" value="yes" <?php checked(get_option('dpss_gpublishBtn'),'yes');?>/> <b>Google Button</b>
	</p>
	<p><input type="checkbox" id="publish4" name="dpss_lpublishBtn" value="yes" <?php checked(get_option('dpss_lpublishBtn'),'yes');?>/> <b>Linkedin Button</b>
	</p>
	<p><input type="checkbox" id="publish6" name="dpss_ppublishBtn" value="yes" <?php checked(get_option('dpss_ppublishBtn'),'yes');?>/> <b>Pinterest Button</b>
	</p>
	<p><input type="checkbox" id="publish7" name="dpss_republishBtn" value="yes" <?php checked(get_option('dpss_republishBtn'),'yes');?>/> <b>Reddit Button</b>
	</p>
	<p><input type="checkbox" id="publish8" name="dpss_stpublishBtn" value="yes" <?php checked(get_option('dpss_stpublishBtn'),'yes');?>/> <b>Stumbleupon Button</b>
	</p>
	<p><input type="checkbox" id="publish5" name="dpss_mpublishBtn" value="yes" <?php checked(get_option('dpss_mpublishBtn'),'yes');?>/> <b>Mailbox Button</b>
	</p>
    <?php if(get_option('dpss_mpublishBtn')=='yes');{?> 
	<p id="mailmsg"><input type="text" name="dpss_mailMessage" id="dpss_mailMessage" value="<?php echo get_option('dpss_mailMessage');?>" placeholder="abc.0087@gmail.com" size="40" class="regular-text ltr">
	</p>
	<?php } ?>
	<p><input type="checkbox" id="ytBtns" name="dpss_ytpublishBtn" value="yes" <?php checked(get_option('dpss_ytpublishBtn'),'yes');?>/> <b>Youtube Button</b>
	</p>
	<?php if(get_option('dpss_ytpublishBtn')=='yes'){?> 
	<p id="ytpath"><input type="text" name="dpss_ytPath" id="dpss_ytPath" value="<?php echo get_option('dpss_ytPath');?>" placeholder="http://www.youtube.com" size="40" class="regular-text ltr"><br>add youtube channel url</p>
	<?php } ?>
			

	</div>
	
	<!-- Share Buttons -->
	<div class="dpss-tab" id="div-dpss-share-buttons">
	<h2>Social Share Buttons Settings</h2>
	<table>
		    <td><?php _e('Enable:','dpss');?></td>
				<td colspan="2">
					<input type="checkbox" id="dpss_buttons_active" name="dpss_buttons_active" value='1' <?php checked(get_option('dpss_buttons_active'),1);?>/>
				</td>
		    </tr>
			<tr>
				<th nowrap><?php echo 'Share Button Position:';?></th>
				<td>
				<select id="dpss_btn_position" name="dpss_btn_position" >
				<option value="left" <?php selected(get_option('dpss_btn_position'),'left');?>>Left</option>
				<option value="right" <?php selected(get_option('dpss_btn_position'),'right');?>>Right</option>
				</select>
				</td>
			</tr>
			<tr>
				<th nowrap><?php echo 'Display Buttons On ';?></th>
				<td>
				<select id="dpss_btn_display" name="dpss_btn_display" >
				<option value="below" <?php selected(get_option('dpss_btn_display'),'below');?>>Bottom Of The Content</option>
				<option value="above" <?php selected(get_option('dpss_btn_display'),'above');?>>Top Of The Content</option>
				</select>
				</td>
			</tr>
			<tr>
				<th nowrap><?php echo 'Share Button Text:';?></th>
				<td>
				<input type="textbox" id="dpss_btn_text" name="dpss_btn_text" value="<?php echo get_option('dpss_btn_text'); ?>" placeholder="Share This!" size="20"/>
				<i>(Leave blank if you want hide button)</i></td>
			</tr>
			<tr>
			    <td colspan="2">
			     <strong>Show Share Buttons On :</strong> Home <input type="checkbox" id="dpss_page_hide_home" value="yes" name="dpss_page_hide_home" <?php checked(get_option('dpss_page_hide_home'),'yes');?>/> Page <input type="checkbox" id="dpss_page_hide_page" value="yes" name="dpss_page_hide_page" <?php checked(get_option('dpss_page_hide_page'),'yes');?>/> Post <input type="checkbox" id="dpss_page_hide_post" value="yes" name="dpss_page_hide_post" <?php checked(get_option('dpss_page_hide_post'),'yes');?>/> Category/Archive <input type="checkbox" id="dpss_page_hide_archive" value="yes" name="dpss_page_hide_archive" <?php checked(get_option('dpss_page_hide_archive'),'yes');?>/> <br>
			    </td>
			</tr>
			
			<tr>
			    <td colspan="2">
			     <strong><h4>Social Share Button Images 32X32 (Optional) :</h4></strong>
			    </td>
			</tr>
			<tr>
			    <td colspan="2" align="right">
			     <input type="button" id="dpssresetpage" value="RESET">
			    </td>
			</tr>
			<tr> 
			    <th><?php echo 'Facebook:';?></th>
				<td class="dpssButtonsImg" id="dpssButtonsFbImg2">
				 <input type="text" id="dpss_page_fb_image" name="dpss_page_fb_image" value="<?php echo get_option('dpss_page_fb_image'); ?>" placeholder="Insert facebook button image path" size="40"  class="inputButtonid"/>
                <input id="dpss_fb_image_button2" type="button" value="Upload Image" class="cswbfsUploadBtn"/>&nbsp;&nbsp;<input type="text" id="dpss_page_fb_title"  name="dpss_page_fb_title" value="<?php echo get_option('dpss_page_fb_title'); ?>" placeholder="Alt Text" size="20" class="dpss_title"/>
				</td>
			</tr>
			<tr>
				<th><?php echo 'Twitter:';?></th>
				<td class="dpssButtonsImg" id="dpssButtonsTwImg2">
				<input type="text" id="dpss_page_tw_image" name="dpss_page_tw_image" value="<?php echo get_option('dpss_page_tw_image'); ?>" placeholder="Insert twitter button image path" size="40" class="inputButtonid"/>
				<input id="dpss_tw_image_button2" type="button" value="Upload Image" class="cswbfsUploadBtn"/>&nbsp;&nbsp;<input type="text" id="dpss_page_tw_title"  name="dpss_page_tw_title" value="<?php echo get_option('dpss_page_tw_title'); ?>" placeholder="Alt Text" size="20" class="dpss_title"/>
				</td>
			</tr>
			<tr><th><?php echo 'Linkedin:';?></th>
				<td class="dpssButtonsImg" id="dpssButtonsLiImg2"><input type="text" id="dpss_page_li_image" name="dpss_page_li_image" value="<?php echo get_option('dpss_page_li_image'); ?>" placeholder="Insert Linkedin button image path" size="40" class="inputButtonid"/>
				<input id="dpss_li_image_button2" type="button" value="Upload Image" class="cswbfsUploadBtn"/>&nbsp;&nbsp;<input type="text" id="dpss_page_li_title"  name="dpss_page_li_title" value="<?php echo get_option('dpss_page_li_title'); ?>" placeholder="Alt Text" size="20" class="dpss_title"/>
				</td>
			</tr>
			<tr>
				<th><?php echo 'Pintrest:';?></th>
				<td class="dpssButtonsImg" id="dpssButtonsPiImg2"><input type="text" id="dpss_page_pin_image" name="dpss_page_pin_image" value="<?php echo get_option('dpss_page_pin_image'); ?>" placeholder="Insert pinterest button image path" size="40" class="inputButtonid"/>
				<input id="dpss_pi_image_button2" type="button" value="Upload Image" class="cswbfsUploadBtn"/>&nbsp;&nbsp;<input type="text" id="dpss_page_pin_title"  name="dpss_page_pin_title" value="<?php echo get_option('dpss_page_pin_title'); ?>" placeholder="Alt Text" size="20" class="dpss_title"/>
				</td>
			</tr>
			<tr>
				<th><?php echo 'Google Plus:';?></th>
				<td class="dpssButtonsImg" id="dpssButtonsGpImg2">
				<input type="text" id="dpss_page_gp_image" name="dpss_page_gp_image" value="<?php echo get_option('dpss_page_gp_image'); ?>" placeholder="Insert google button image path" size="40" class="inputButtonid"/>
				<input id="dpss_gp_image_button2" type="button" value="Upload Image" class="cswbfsUploadBtn"/>&nbsp;&nbsp;<input type="text" id="dpss_page_gp_title"  name="dpss_page_gp_title" value="<?php echo get_option('dpss_page_gp_title'); ?>" placeholder="Alt Text" size="20" class="dpss_title"/>
				</td>
			</tr>
			
			<tr>
				<th><?php echo 'Mail:';?></th>
				<td class="dpssButtonsImg" id="dpssButtonsMlImg2">
				<input type="text" id="dpss_page_mail_image" name="dpss_page_mail_image" value="<?php echo get_option('dpss_page_mail_image'); ?>" placeholder="Insert mail button image path" size="40" class="inputButtonid"/>
				<input id="dpss_ml_image_button2" type="button" value="Upload Image" class="cswbfsUploadBtn"/>&nbsp;&nbsp;<input type="text" id="dpss_page_mail_title"  name="dpss_page_mail_title" value="<?php echo get_option('dpss_page_mail_title'); ?>" placeholder="Alt Text" size="20" class="dpss_title"/>
				</td>
			</tr>
			<tr>
				<th><?php echo 'Youtube:';?></th>
				<td class="dpssButtonsImg" id="dpssButtonsYtImg2">
				<input type="text" id="dpss_page_yt_image" name="dpss_page_yt_image" value="<?php echo get_option('dpss_page_yt_image'); ?>" placeholder="Insert youtube button image path" size="40" class="inputButtonid"/>
				<input id="dpss_yt_image_button2" type="button" value="Upload Image" class="cswbfsUploadBtn"/>&nbsp;&nbsp;<input type="text" id="dpss_page_yt_title"  name="dpss_page_yt_title" value="<?php echo get_option('dpss_page_yt_title'); ?>" placeholder="Alt Text" size="20" class="dpss_title"/>
				</td>
			</tr>
	</table>
	
	</div>
	</div>
	<span class="submit-btn"><?php echo get_submit_button('Save Settings','button-primary','submit','','');?></span>	
    <?php settings_fields('dpss_sidebar_options'); ?>
	</form>
<!-- End Options Form -->
	</div>
