<?php
	function wmf_add_options_page_redirector() {
		add_options_page(esc_html__('WMF Mobile Redirector','wmfrt2d'), esc_html__('WMF Mobile Redirector','wmfrt2d'), 'manage_options', __FILE__, 'wmf_settings_form_redirector');
	}

	function wmf_add_defaults_redirector() {
			$arr = array(	
				"mobilesite"			=> "",
				"tabletsite"			=> "",
				"mobileactive"			=> "false",
				"tabletactive"			=> "false",
				"backlink"			=> "false"
			);
			update_option( 'wmf_reoptions', $arr );
	}

	function wmf_init_redirector(){
	
		register_setting( 'wmf_replugin_options', 'wmf_reoptions' );

	}


	function wmf_settings_form_redirector(){
	?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
		<h2><?php esc_html_e('WMF Mobile Redirector Options','wmfrt2d');?></h2>
		<form method="post" action="options.php">
        
			<?php 
			settings_fields('wmf_replugin_options');  
			$options = get_option('wmf_reoptions');

			if (!isset($options['mobileactive'])) {
				$options['mobileactive'] = "";
			}
			if (!isset($options['tabletactive'])) {
				$options['tabletactive'] = "";
			}
			if (!isset($options['onlyhome'])) {
				$options['onlyhome'] = "";
			}
			if (!isset($options['backlink'])) {
				$options['backlink'] = "";
			}
			?>
			<table class="form-table">
			    <tr><h3><?php esc_html_e('Info','wmfrt2d');?></h3></tr>
				<tr><p><?php esc_html_e('Please write your mobile & tablet web site address like this sample; https://mobile.yourwebsite.com','wmfrt2d');?></p></tr>
				
                <tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row"><?php echo esc_html_e('Mobile Site Address','wmfrt2d');?></th>
					<td>
					<label><input name="wmf_reoptions[mobilesite]" type="text" value="<?php if (isset($options['mobilesite'])) { echo $options['mobilesite']; } ?>"  /> </label><br /><span style="color:#666666;margin-left:2px;"><?php echo esc_html_e('Please enter your mobile web site address','wmfrt2d');?></span>
					</td>
				</tr>
                
                <tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row"><?php esc_html_e('Tablet Site Address','wmfrt2d');?></th>
					<td>
					<label><input name="wmf_reoptions[tabletsite]" type="text" value="<?php if (isset($options['tabletsite'])) { echo $options['tabletsite']; } ?>"  /> </label><br /><span style="color:#666666;margin-left:2px;"><?php esc_html_e('Please enter your tablet site address','wmfrt2d');?></span>
					</td>
				</tr>
                
                <tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row"><?php esc_html_e('Mobile Site Redirection','wmfrt2d');?></th>
					<td>
                    <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmf_reoptions[mobileactive]" id="wmf_reoptions[mobileactive]" value="true" <?php if($options['mobileactive'] == "true"){ echo 'checked';}?> /><div><div></div></div></label>
                    <span style="color:#666666;margin-left:2px;"><?php echo esc_html_e('Enable or disable mobile device redirection.','wmfrt2d');?></span>
					</td>
				</tr>
                
                <tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row"><?php esc_html_e('Tablet Site Redirection','wmfrt2d');?></th>
					<td>
                    <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmf_reoptions[tabletactive]" id="wmf_reoptions[tabletactive]" value="true" <?php if($options['tabletactive'] == "true"){ echo 'checked';}?> /><div><div></div></div></label>
                    <span style="color:#666666;margin-left:2px;"><?php echo esc_html_e('Enable or disable tablet device redirection.','wmfrt2d');?></span>
					</td>
				</tr>
                
                <tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row"><?php esc_html_e('Backlink','wmfrt2d');?></th>
					<td>
                    <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmf_reoptions[backlink]" id="wmf_reoptions[backlink]" value="true" <?php if($options['backlink'] == "true"){ echo 'checked';}?> /><div><div></div></div></label>
                    <span style="color:#666666;margin-left:2px;"><?php echo esc_html_e('If enable this option you can use back link to desktop site & stop redirection.<br> Here is the sample back link: '.get_bloginfo('wpurl').'/?desktop=1','wmfrt2d');?></span>
					</td>
				</tr>
                
                <tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row"><?php esc_html_e('Work Only Home','wmfrt2d');?></th>
					<td>
                    <label><input type="checkbox" class="ios-switch green  bigswitch" name="wmf_reoptions[onlyhome]" id="wmf_reoptions[onlyhome]" value="true" <?php if($options['onlyhome'] == "true"){ echo 'checked';}?> /><div><div></div></div></label>
                    <span style="color:#666666;margin-left:2px;"><?php echo esc_html_e('If enable this option script will work only home & front page.','wmfrt2d');?></span>
					</td>
				</tr>
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php esc_html_e('Save Changes','wmfrt2d') ?>" />
			</p>
		</form>


	</div>
	<?php	
	}

add_action('admin_menu', 'wmf_add_options_page_redirector');
register_activation_hook(__FILE__, 'wmf_add_defaults_redirector');
add_action('admin_init', 'wmf_init_redirector');
?>