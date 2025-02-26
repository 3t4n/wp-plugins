<?php 
function easycard_pay_buttons_options(){
		$vars = array();
		$easycard_pay_buttons_client_id=get_option('easycard_pay_buttons_client_id');
		$easycard_pay_buttons_password = get_option('easycard_pay_buttons_password');
		$easycard_pay_buttons_maxPayments = get_option('easycard_pay_buttons_maxPayments');
		
		if (isset($_POST) && !empty($_POST) && !empty($_POST['update_settings'])) {
		
			$easycard_pay_buttons_client_id = isset($_POST['easycard_pay_buttons_client_id']) ? $_POST['easycard_pay_buttons_client_id'] : null;
			update_option('easycard_pay_buttons_client_id', $easycard_pay_buttons_client_id);
			
			$easycard_pay_buttons_password = isset($_POST['easycard_pay_buttons_password']) ? $_POST['easycard_pay_buttons_password'] : null;
			update_option('easycard_pay_buttons_password', $easycard_pay_buttons_password);
			
			$easycard_pay_buttons_maxPayments = isset($_POST['easycard_pay_buttons_maxPayments']) ? $_POST['easycard_pay_buttons_maxPayments'] : null;
			update_option('easycard_pay_buttons_maxPayments', $easycard_pay_buttons_maxPayments);
				$vars['message'] = __('Settings saved.');
		}
    
?>
<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div><h2><?php _e('10Bit EasyCard PayButtons Settings', '10bit-paybuttons-easycard') ?></h2>

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
                        <label for="easycard_pay_buttons_client_id"><?php _e('Client ID', '10bit-paybuttons-easycard') ?></label>
                    </th>
                    <td>
                        <input name="easycard_pay_buttons_client_id" type="text" id="easycard_pay_buttons_client_id" value="<?php echo $easycard_pay_buttons_client_id ?>" class="regular-text"/>
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="easycard_pay_buttons_password"><?php _e('Password', '10bit-paybuttons-easycard') ?></label>
                    </th>
                    <td>
                        <input name="easycard_pay_buttons_password" type="text" id="easycard_pay_buttons_password" value="<?php echo $easycard_pay_buttons_password ?>" class="regular-text" />
                    </td>
                </tr>
				<tr valign="top">
                    <th scope="row">
                        <label for="easycard_pay_buttons_maxPayments"><?php _e('Maximum Payments', '10bit-paybuttons-easycard') ?></label>
                    </th>
					<td>
                        <input name="easycard_pay_buttons_maxPayments" type="number" min="1" max="36" id="easycard_pay_buttons_maxPayments" value="<?php echo $easycard_pay_buttons_maxPayments ?>" class="regular-text" />
                    </td>
                </tr>
            </tbody>
        </table>
		

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
        
    </form>
	
	
	<?php _e('Usage :', '10bit-paybuttons-easycard') ?>
	<br>
	<?php _e('Add the folloing short code inside a post or a page :', '10bit-paybuttons-easycard') ?>
	<br>
	[easycard_pay_button value="12.90" item_name="My Book"> button_class="my-class" button_text="Pay Now"]
	<br>
	<?php _e('value : The amount to pay', '10bit-paybuttons-easycard') ?>
	<br>
	<?php _e('item_name : the name of the sold item', '10bit-paybuttons-easycard') ?>
	<br>
	<?php _e('button_class : CSS class for styling', '10bit-paybuttons-easycard') ?>
	<br>
	<?php _e('button_text : Text to show on the button', '10bit-paybuttons-easycard') ?>
	<br>

</div>
<?php }	?>