<?php 
function pelecard_pay_buttons_options(){
		$vars = array();
		$pelecard_pay_Buttons_termNo=get_option('pelecard_pay_Buttons_termNo');
		$pelecard_pay_Buttons_username=get_option('pelecard_pay_Buttons_username');
		$pelecard_pay_Buttons_password=get_option('pelecard_pay_Buttons_password');
		$pelecard_pay_Buttons_max_Payments=get_option('pelecard_pay_Buttons_max_Payments');
		$pelecard_pay_Buttons_logo=get_option('pelecard_pay_Buttons_logo');
		$pelecard_pay_Buttons_smallLogo=get_option('pelecard_pay_Buttons_smallLogo');
		$pelecard_pay_Buttons_hidePciDssLogo=get_option('pelecard_pay_Buttons_hidePciDssLogo');
		$pelecard_pay_Buttons_hidePelecardLogo=get_option('pelecard_pay_Buttons_hidePelecardLogo');
		$pelecard_pay_Buttons_css=get_option('pelecard_pay_Buttons_css');
		$pelecard_pay_Buttons_Background=get_option('pelecard_pay_Buttons_Background');
		$pelecard_pay_Buttons_backgroundImage=get_option('pelecard_pay_Buttons_backgroundImage');
		$pelecard_pay_Buttons_topMargin=get_option('pelecard_pay_Buttons_topMargin');
		$pelecard_pay_Buttons_success_url=get_option('pelecard_pay_Buttons_success_url');
		$pelecard_pay_Buttons_error_url=get_option('pelecard_pay_Buttons_error_url');
		$pelecard_pay_Buttons_currency=get_option('pelecard_pay_Buttons_currency');
		
		if (isset($_POST) && !empty($_POST) && !empty($_POST['update_settings'])) {
		
			$pelecard_pay_Buttons_termNo = isset($_POST['pelecard_pay_Buttons_termNo']) ? $_POST['pelecard_pay_Buttons_termNo'] : null;
			update_option('pelecard_pay_Buttons_termNo', $pelecard_pay_Buttons_termNo);
			
			$pelecard_pay_Buttons_username = isset($_POST['pelecard_pay_Buttons_username']) ? $_POST['pelecard_pay_Buttons_username'] : null;
			update_option('pelecard_pay_Buttons_username', $pelecard_pay_Buttons_username);
			
			$pelecard_pay_Buttons_password = isset($_POST['pelecard_pay_Buttons_password']) ? $_POST['pelecard_pay_Buttons_password'] : null;
			update_option('pelecard_pay_Buttons_password', $pelecard_pay_Buttons_password);
			
			$pelecard_pay_Buttons_max_Payments = isset($_POST['pelecard_pay_Buttons_max_Payments']) ? $_POST['pelecard_pay_Buttons_max_Payments'] : null;
			update_option('pelecard_pay_Buttons_max_Payments', $pelecard_pay_Buttons_max_Payments);
			
			$pelecard_pay_Buttons_logo = isset($_POST['pelecard_pay_Buttons_logo']) ? $_POST['pelecard_pay_Buttons_logo'] : null;
			update_option('pelecard_pay_Buttons_logo', $pelecard_pay_Buttons_logo);
			
			$pelecard_pay_Buttons_smallLogo = isset($_POST['pelecard_pay_Buttons_smallLogo']) ? $_POST['pelecard_pay_Buttons_smallLogo'] : null;
			update_option('pelecard_pay_Buttons_smallLogo', $pelecard_pay_Buttons_smallLogo);
			
			$pelecard_pay_Buttons_hidePciDssLogo = isset($_POST['pelecard_pay_Buttons_hidePciDssLogo']) ? $_POST['pelecard_pay_Buttons_hidePciDssLogo'] : null;
			update_option('pelecard_pay_Buttons_hidePciDssLogo', $pelecard_pay_Buttons_hidePciDssLogo);
			
			$pelecard_pay_Buttons_hidePelecardLogo = isset($_POST['pelecard_pay_Buttons_hidePelecardLogo']) ? $_POST['pelecard_pay_Buttons_hidePelecardLogo'] : null;
			update_option('pelecard_pay_Buttons_hidePelecardLogo', $pelecard_pay_Buttons_hidePelecardLogo);
			
			$pelecard_pay_Buttons_css = isset($_POST['pelecard_pay_Buttons_css']) ? $_POST['pelecard_pay_Buttons_css'] : null;
			update_option('pelecard_pay_Buttons_css', $pelecard_pay_Buttons_css);
			
			$pelecard_pay_Buttons_Background = isset($_POST['pelecard_pay_Buttons_Background']) ? $_POST['pelecard_pay_Buttons_Background'] : null;
			update_option('pelecard_pay_Buttons_Background', $pelecard_pay_Buttons_Background);
			
			$pelecard_pay_Buttons_backgroundImage = isset($_POST['pelecard_pay_Buttons_backgroundImage']) ? $_POST['pelecard_pay_Buttons_backgroundImage'] : null;
			update_option('pelecard_pay_Buttons_backgroundImage', $pelecard_pay_Buttons_backgroundImage);
			
			$pelecard_pay_Buttons_topMargin = isset($_POST['pelecard_pay_Buttons_topMargin']) ? $_POST['pelecard_pay_Buttons_topMargin'] : null;
			update_option('pelecard_pay_Buttons_topMargin', $pelecard_pay_Buttons_topMargin);
			
			$pelecard_pay_Buttons_error_url = isset($_POST['pelecard_pay_Buttons_error_url']) ? $_POST['pelecard_pay_Buttons_error_url'] : null;
			update_option('pelecard_pay_Buttons_error_url', $pelecard_pay_Buttons_error_url);
			
			$pelecard_pay_Buttons_success_url = isset($_POST['pelecard_pay_Buttons_success_url']) ? $_POST['pelecard_pay_Buttons_success_url'] : null;
			update_option('pelecard_pay_Buttons_success_url', $pelecard_pay_Buttons_success_url);
			
			$pelecard_pay_Buttons_currency = isset($_POST['pelecard_pay_Buttons_currency']) ? $_POST['pelecard_pay_Buttons_currency'] : null;
			update_option('pelecard_pay_Buttons_currency', $pelecard_pay_Buttons_currency);
			
			
			$vars['message'] = __('Settings saved.');
		}
    
?>
<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div><h2><?php _e('10Bit pelecard PayButtons Settings', '10bit-paybuttons-pelecard') ?></h2>

<?php if ($message): ?>
    <div id="setting-error-settings_updated" class="updated settings-error">
        <p><strong><?php echo $message ?></strong></p>
    </div>
<?php endif; ?>
    
    <form method="post" action="">
		<input type="hidden" name="update_settings" value="Y" />
        <table class="form-table">
            <tbody>
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_termNo"><?php _e('Terminal Number', '10bit-paybuttons-pelecard') ?></label>
                    </th>
                    <td>
                        <input name="pelecard_pay_Buttons_termNo" type="text" id="pelecard_pay_Buttons_termNo" value="<?php echo $pelecard_pay_Buttons_termNo ?>" class="regular-text"/>
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_username"><?php _e('Username', '10bit-paybuttons-pelecard') ?></label>
                    </th>
                    <td>
                        <input name="pelecard_pay_Buttons_username" type="text" id="pelecard_pay_Buttons_username" value="<?php echo $pelecard_pay_Buttons_username ?>" class="regular-text" />
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_password"><?php _e('Password', '10bit-paybuttons-pelecard') ?></label>
                    </th>
					<td>
                        <input name="pelecard_pay_Buttons_password" type="password" id="pelecard_pay_Buttons_password" value="<?php echo $pelecard_pay_Buttons_password ?>" class="regular-text" />
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_max_Payments"><?php _e('Maximum Payments', '10bit-paybuttons-pelecard') ?></label>
                    </th>
					<td>
                        <input name="pelecard_pay_Buttons_max_Payments" type="number" min="1" max="36" id="pelecard_pay_Buttons_max_Payments" value="<?php echo $pelecard_pay_Buttons_max_Payments ?>" class="regular-text" />
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_currency"><?php _e('Currency', '10bit-paybuttons-pelecard') ?></label>
                    </th>
					<td>
						<select name="pelecard_pay_Buttons_currency"> 
							<option <?php echo $pelecard_pay_Buttons_currency==1?'selected':''; ?> value="1"><?php _e('ILS', '10bit-paybuttons-pelecard')?></option>
							<option <?php echo $pelecard_pay_Buttons_currency==2?'selected':''; ?> value="2"><?php _e('USD', '10bit-paybuttons-pelecard')?></option>
						</select>
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_success_url"><?php _e('Success ( thank you ) page URL', '10bit-paybuttons-pelecard') ?></label>
                    </th>
                    <td>
                        <input name="pelecard_pay_Buttons_success_url" type="text" id="pelecard_pay_Buttons_success_url" value="<?php echo $pelecard_pay_Buttons_success_url ?>" class="regular-text" />
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_error_url"><?php _e('Error page URL', '10bit-paybuttons-pelecard') ?></label>
                    </th>
                    <td>
                        <input name="pelecard_pay_Buttons_error_url" type="text" id="pelecard_pay_Buttons_error_url" value="<?php echo $pelecard_pay_Buttons_error_url ?>" class="regular-text" />
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_logo"><?php _e('Path to custom logo', '10bit-paybuttons-pelecard') ?></label>
                    </th>
                    <td>
                        <input name="pelecard_pay_Buttons_logo" type="text" id="pelecard_pay_Buttons_logo" value="<?php echo $pelecard_pay_Buttons_logo ?>" class="regular-text" />
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_smallLogo"><?php _e('Path to small custom logo', '10bit-paybuttons-pelecard') ?></label>
                    </th>
                    <td>
                        <input name="pelecard_pay_Buttons_smallLogo" type="text" id="pelecard_pay_Buttons_smallLogo" value="<?php echo $pelecard_pay_Buttons_smallLogo ?>" class="regular-text" />
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_hidePciDssLogo"><?php _e('Hide PCI DSS logo', '10bit-paybuttons-pelecard') ?></label>
                    </th>
                    <td>
                        <input  name="pelecard_pay_Buttons_hidePciDssLogo" type="checkbox" <?php echo $pelecard_pay_Buttons_hidePciDssLogo=='on'?'checked':''; ?> id="pelecard_pay_Buttons_hidePciDssLogo"/>
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_hidePelecardLogo"><?php _e('Hide Pelecard logo', '10bit-paybuttons-pelecard') ?></label>
                    </th>
                    <td>
                        <input name="pelecard_pay_Buttons_hidePelecardLogo" type="checkbox" <?php echo $pelecard_pay_Buttons_hidePelecardLogo=='on'?'checked':''; ?> id="pelecard_pay_Buttons_hidePelecardLogo"/>
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_css"><?php _e('Path To custom Style sheet(CSS)', '10bit-paybuttons-pelecard') ?></label>
                    </th>
                    <td>
                        <input name="pelecard_pay_Buttons_css" type="text" id="pelecard_pay_Buttons_css" value="<?php echo $pelecard_pay_Buttons_css ?>" class="regular-text" />
						<div>
							<?php _e('must be a secured URL ( HTTPS )', '10bit-paybuttons-pelecard') ?>
						</div>
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_Background"><?php _e('Background color', '10bit-paybuttons-pelecard') ?></label>
                    </th>
                    <td>
                        <input name="pelecard_pay_Buttons_Background" type="text" id="pelecard_pay_Buttons_Background" value="<?php echo $pelecard_pay_Buttons_Background ?>" class="regular-text" />
						<div>
						
						<?php _e('Use hexadecimal color without the #', '10bit-paybuttons-pelecard') ?>
						</div>
						
                    </td>
                </tr>
				

				<?php/*
				<tr valign="top">
                    <th scope="row">
                        <label for="pelecard_pay_Buttons_backgroundImage"><?php _e('Background image', '10bit-paybuttons-pelecard') ?></label>
                    </th>
                    <td>
                        <input name="pelecard_pay_Buttons_backgroundImage" type="text" id="pelecard_pay_Buttons_backgroundImage" value="<?php echo $pelecard_pay_Buttons_backgroundImage ?>" class="regular-text" />
                    </td>
                </tr>
				*/?>
            </tbody>
        </table>
		

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
        
    </form>
	
	
	<?php _e('Usage :', '10bit-paybuttons-pelecard') ?>
	<br>
	<?php _e('Add the following short code inside a post or a page :', '10bit-paybuttons-pelecard') ?>
	<br>
	[pelecard_pay_button value="12.90" item_name="My Book" button_class="my-class" button_text="Pay Now"]
	<br>
	<?php _e('value : The amount to pay', '10bit-paybuttons-pelecard') ?>
	<br>
	<?php _e('item_name : the name of the sold item', '10bit-paybuttons-pelecard') ?>
	<br>
	<?php _e('button_class : CSS class for styling', '10bit-paybuttons-pelecard') ?>
	<br>
	<?php _e('button_text : Text to show on the button', '10bit-paybuttons-pelecard') ?>
	<br>
</div>
<?php }	?>