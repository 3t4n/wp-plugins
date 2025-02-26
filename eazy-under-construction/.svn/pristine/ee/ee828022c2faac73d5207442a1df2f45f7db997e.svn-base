<?php
if(isset($_SERVER['REQUEST_METHOD'] )) {
if($_SERVER['REQUEST_METHOD'] == "POST"){
	if(isset($_POST['save_options_field'])) {
	if(!wp_verify_nonce(esc_url_raw(wp_unslash($_POST['save_options_field'])), 'save_options')){
		die("Sorry, but this request is invalid");
	}
	}
}
}

if (isset($_GET['turnOnUnderConstructionMode']))
{
	update_option('underConstructionActivationStatus', 1);
}

if (isset($_GET['turnOffUnderConstructionMode']))
{
	update_option('underConstructionActivationStatus', 0);
}

// ======================================
// 		process display options
// ======================================

if (isset($_POST['display_options']))
{
	if ($_POST['display_options'] == 0) //they want to just use the default
	{
		update_option('underConstructionDisplayOption', 0);
	}

	if ($_POST['display_options'] == 1) //they want to use the default with custom text
	{
		$values = array('pageTitle'=>'', 'headerText'=>'', 'bodyText'=>'');

		if (isset($_POST['pageTitle']))
		{
			$values['pageTitle'] = sanitize_text_field(wp_unslash($_POST['pageTitle']));
		}

		if (isset($_POST['headerText']))
		{
			$values['headerText'] = sanitize_text_field(wp_unslash($_POST['headerText']));
		}

		if (isset($_POST['bodyText']))
		{
			$values['bodyText'] = sanitize_text_field(wp_unslash($_POST['bodyText']));
		}


		update_option('underConstructionCustomText', $values);
		update_option('underConstructionDisplayOption', 1);
	}

	if ($_POST['display_options'] == 2) //they want to use their own HTML
	{
		if (isset($_POST['ucHTML']))
		{
			update_option('underConstructionHTML', wp_kses(wp_unslash($_POST['ucHTML'])));
			update_option('underConstructionDisplayOption', 2);
		}
	}
	
	if ($_POST['display_options'] == 3){ //they want to use the under construction page in their theme
		update_option('underConstructionDisplayOption', 3);
	}

}

// ======================================
// 		process http status codes
// ======================================
if (isset($_POST['activate']))
{
	if ($_POST['activate'] == 0)
	{
		update_option('underConstructionActivationStatus', 0);
	}

	if ($_POST['activate'] == 1)
	{
		update_option('underConstructionActivationStatus', 1);
	}
}

// ======================================
// 		process on/off status
// ======================================
if (isset($_POST['http_status']))
{
	if ($_POST['http_status'] == 200)
	{
		update_option('underConstructionHTTPStatus', 200);
	}

	if ($_POST['http_status'] == 301)
	{
		update_option('underConstructionHTTPStatus', 301);
		if(isset($_POST['url'])) {
			update_option('underConstructionRedirectURL', sanitize_url(wp_unslash($_POST['url'])));
		}	
	}

	if ($_POST['http_status'] == 503)
	{
		update_option('underConstructionHTTPStatus', 503);
	}
}

// ======================================
// 		process IP addresses
// ======================================

if(isset($_POST['ip_address'])){

	$ip = sanitize_text_field(wp_unslash($_POST['ip_address']));
	$ip = long2ip(ip2long($ip));

	if($ip != "0.0.0.0"){
		$array = get_option('underConstructionIPWhitelist');

		if(!$array){
			$array = array();
		}

		$array[] = $ip;

		$array = array_unique($array);

		update_option('underConstructionIPWhitelist', $array);
	}
}

if(isset($_POST['remove_selected_ip_btn'])){
	if(isset($_POST['ip_whitelist'])){
		$array = get_option('underConstructionIPWhitelist');

		if(!$array){
			$array = array();
		}

		unset($array[$_POST['ip_whitelist']]);
		$array = array_values($array);
		update_option('underConstructionIPWhitelist', $array);
	}
}

if(isset($_POST['required_role'])){
	update_option('underConstructionRequiredRole', sanitize_text_field(wp_unslash($_POST['required_role'])));
}

$current_theme_has_uc_page = file_exists(get_template_directory() . '/under-construction.php');
?>
<noscript>
	<div class='updated' id='javascriptWarn'>
		<p><?php esc_html_e('JavaScript appears to be disabled in your browser. For this plugin to work correctly, please enable JavaScript or switch to a more modern browser.', 'eazy-under-construction');?></p>
	</div>
</noscript>
<div class="wrap">
	<div id="icon-options-general" class="icon32">
		<br />
	</div>
	<form method="post"
		action="<?php echo esc_attr($GLOBALS['PHP_SELF'] . '?page=underConstructionMainOptions', 'eazy-under-construction'); ?>"
		id="ucoptions">
		<h2><?php esc_html_e('Under Construction', 'eazy-under-construction');?></h2>
		<table>
			<tr>
				<td>
					<h3><?php esc_html_e('Activate or Deactivate', 'eazy-under-construction');?></h3>
				</td>
			</tr>
			<tr>
				<td>
					<fieldset>
						<legend class="screen-reader-text">
							<span><?php esc_html_e('Activate or Deactivate', 'eazy-under-construction');?></span>
						</legend>
						<label title="activate">
						  <input type="radio" name="activate" value="1"<?php if ($this->pluginIsActive()) { echo ' checked="checked"'; } ?>>&nbsp;<?php esc_html_e('on', 'eazy-under-construction');?>
						</label><br /> 
						<label title="deactivate">
						  <input type="radio" name="activate" value="0"<?php if (!$this->pluginIsActive()) { echo ' checked="checked"'; } ?>>&nbsp;<?php esc_html_e('off', 'eazy-under-construction');?>
						</label>
					</fieldset>
				</td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e('HTTP Status Code', 'eazy-under-construction');?></h3>
					<p><?php esc_html_e("You can choose to send the standard HTTP status code with the under construction page, or send a 503 \"Service Unavailable\" status code. This will tell Google that this page isn't ready yet, and cause your site not to be listed until this plugin is disabled.", 'eazy-under-construction');?></p>
				</td>
			</tr>
			<tr>
				<td>
					<fieldset>
						<legend class="screen-reader-text">
							<span><?php esc_html_e('HTTP Status Code', 'eazy-under-construction');?></span>
						</legend>
						<label title="HTTP200">
						  <input type="radio" name="http_status" value="200" id="200_status"<?php if ($this->httpStatusCodeIs(200)) { echo ' checked="checked"'; } ?>>&nbsp;<?php esc_html_e('HTTP 200 - ok', 'eazy-under-construction');?> 
						</label> <br />
						<label title="HTTP301"> 
						  <input type="radio" name="http_status" value="301" id="301_status"<?php if ($this->httpStatusCodeIs(301)) { echo ' checked="checked"'; } ?>>&nbsp;<?php esc_html_e('HTTP 301 - Redirect', 'eazy-under-construction');?> </label> <br />
						<label title="HTTP503">
						  <input type="radio" name="http_status" value="503" id="503_status"<?php if ($this->httpStatusCodeIs(503)) { echo ' checked="checked"'; } ?>>&nbsp;<?php esc_html_e('HTTP 503 - Service Unavailable', 'eazy-under-construction');?>
						</label>
					</fieldset>
					<div id="redirect_panel" <?php echo !$this->httpStatusCodeIs(301) ? 'class="hidden"' : '';?>><br />
					  <label for="url"><?php esc_html_e('Redirect Location:', 'eazy-under-construction');?></label>
						<input type="text" name="url" id="url" value="<?php echo esc_html(get_option('underConstructionRedirectURL'));?>" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e('Restrict By Role', 'eazy-under-construction');?></h3>
				</td>
			</tr>
			<tr>
				<td><?php esc_html_e('Only users at or above this level will be able to log in:', 'eazy-under-construction');?> 
				<select id="required_role" name="required_role">
  				<option value="0"><?php esc_html_e('All Users', 'eazy-under-construction');?></option>
  				<?php
  				$selected = get_option('underConstructionRequiredRole');
  				$editable_roles = get_editable_roles();
  				//to get rid of Notices "Undefined var"...
  				$p = $r = '';
  
  				foreach ( $editable_roles as $role => $details ) {
  					$name = translate_user_role($details['name'] );
  					if ( $selected == $role ) // preselect specified role
  					  $p = "\n\t<option selected='selected' value='" . esc_attr($role) . "'>$name</option>";
  					else
  					  $r .= "\n\t<option value='" . esc_attr($role) . "'>$name</option>";
  				}
  				echo esc_attr($p . $r);
  				?>
				</select>
				</td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e('IP Address Whitelist', 'eazy-under-construction');?></h3>
				</td>
			</tr>
			<tr>
				<td>
				<?php $whitelist = get_option('underConstructionIPWhitelist');
				if(count($whitelist)): ?> 
				  <select size="4" id="ip_whitelist" name="ip_whitelist" style="width: 250px; height: 100px;">
					<?php for($i = 0; $i < count($whitelist); $i++):?>
						<option id="<?php echo esc_attr($i); ?>" value="<?php echo esc_attr($i);?>">
						<?php echo esc_attr($whitelist[$i]);?>
						</option>
						<?php endfor;?>
          </select><br />

          <input type="submit" value="<?php esc_html_e('Remove Selected IP Address', 'eazy-under-construction'); ?>" name="remove_selected_ip_btn" class="button" id="remove_selected_ip_btn" /> <br /> <br /> 
        <?php endif; ?> 
        <label><?php esc_html_e('IP Address:', 'eazy-under-construction');?> <input type="text" name="ip_address" id="ip_address" /> </label>
					<a id="add_current_address_btn" style="cursor: pointer;" class="button"><?php esc_html_e('Add Current Address', 'eazy-under-construction');?></a>
					<span id="loading_current_address" class="hidden">Loading...</span>
					<br />
				</td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e('Display Options', 'eazy-under-construction');?></h3>
				</td>
			</tr>
			<tr>
				<td>
					<fieldset>
						<legend class="screen-reader-text">
							<span><?php esc_html_e('Display Options', 'eazy-under-construction');?> </span>
						</legend>
						<label title="<?php esc_html_e('Display the default under construction page', 'eazy-under-construction');?>">
						  <input type="radio" name="display_options" value="0" id="displayOption0"<?php if ($this->displayStatusCodeIs(0)) { echo ' checked="checked"'; } ?>>&nbsp;<?php esc_html_e('Display the default under construction page', 'eazy-under-construction');?>
						</label> <br />
						<label title="<?php esc_html_e('Display the under construction page that is part of the active theme', 'eazy-under-construction');?>">
						  <input <?php if(!$current_theme_has_uc_page): ?>disabled="disabled" <?php endif; ?> type="radio" name="display_options" value="3" id="displayOption3"<?php if ($this->displayStatusCodeIs(3)) { echo ' checked="checked"'; } ?>>&nbsp;<?php esc_html_e('Display the under construction page that is part of the active theme', 'eazy-under-construction');?>
						  
						  <?php if(!$current_theme_has_uc_page): ?>
						  <br /> <em style="margin-left: 24px;"><?php esc_html_e('Only available for themes with an under-construction.php file', 'eazy-under-construction');?></em>
						  <?php endif; ?>
						  
						</label> <br /> 
						<label title="<?php esc_html_e('Display the default under construction page, but use custom text', 'eazy-under-construction');?>"> 
						  <input type="radio" name="display_options" value="1" id="displayOption1"<?php if ($this->displayStatusCodeIs(1)) { echo ' checked="checked"'; } ?>>&nbsp;<?php esc_html_e('Display the default under construction page, but use custom text', 'eazy-under-construction');?>
						</label> <br /> 
						<label title="<?php esc_html_e('Display a custom page using your own HTML', 'eazy-under-construction');?>"> 
						  <input type="radio" name="display_options" value="2" id="displayOption2"<?php if ($this->displayStatusCodeIs(2)) { echo ' checked="checked"'; } ?>>&nbsp;<?php esc_html_e('Display a custom page using your own HTML', 'eazy-under-construction');?>
						</label> <br /> 
					</fieldset>
				</td>
			</tr>
		</table>
		
		<div id="customText"<?php if (!$this->displayStatusCodeIs(1) && !$this->displayStatusCodeIs(2)) { echo ' style="display: none;"'; } ?>>
			<h3><?php esc_html_e('Display Custom Text', 'eazy-under-construction');?></h3>
			<p><?php esc_html_e('The text here will replace the text on the default page', 'eazy-under-construction');?></p>
			<table>
				<tr valign="top">
					<th scope="row"><label for="pageTitle"> <?php esc_html_e('Page Title', 'eazy-under-construction');?> </label></th>
					<td><input name="pageTitle" type="text" id="pageTitle" value="<?php echo esc_attr($this->getCustomPageTitle()); ?>" class="regular-text" size="50"></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="headerText"> <?php esc_html_e('Header Text', 'eazy-under-construction');?> </label></th>
					<td><input name="headerText" type="text" id="headerText" value="<?php echo esc_attr($this->getCustomHeaderText()); ?>" class="regular-text" size="50"></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="bodyText"> <?php esc_html_e('Body Text', 'eazy-under-construction');?> </label></th>
					<td><?php echo '<textarea rows="2" cols="44" name="bodyText" id="bodyText" class="regular-text">'.esc_attr(trim($this->getCustomBodyText())).'</textarea>'; ?></td>
				</tr>
			</table>
		</div>
		
		<div id="customHTML"<?php if (!$this->displayStatusCodeIs(2)) { echo ' style="display: none;"'; } ?>>
			<h3><?php esc_html_e('Under Construction Page HTML', 'eazy-under-construction');?></h3>
			<p><?php esc_html_e('Put in this area the HTML you want to show up on your front page', 'eazy-under-construction');?></p>
			<?php echo '<textarea name="ucHTML" rows="15" cols="75">'.esc_html($this->getCustomHTML()).'</textarea>'; ?>
		</div>
		
		<p class="submit">
		<?php wp_nonce_field('save_options','save_options_field'); ?>
			<input type="submit" name="Submit" class="button-primary" value="<?php esc_html_e('Save Changes', 'eazy-under-construction'); ?>" id="submitChangesToUnderConstructionPlugin" />
		</p>
	</form>
</div>
