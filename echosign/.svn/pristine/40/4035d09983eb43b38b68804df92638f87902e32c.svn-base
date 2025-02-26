<?php
/**
 * EchoSign plugin file.
 *
 * Copyright (C) 2010-2020, Smackcoders Inc - info@smackcoders.com
 */

if(!defined('ABSPATH'))  exit;        // Exit if accessed directly

$notification = null;
// get action from request
$action = !empty($_REQUEST['echosign_settings_action']) ? sanitize_text_field($_REQUEST['echosign_settings_action']) : null;
$api_key = get_option('echosign_apikey');
$settings_info = get_option('__wp_echosign_settings_info');
if(empty($settings_info['button_label']))
	$button_label = wp_echosign::$default_button_label;
else
	$button_label = $settings_info['button_label'];

// if action is save, check api key and save
if($action == 'save')	{
	$api_key = sanitize_text_field($_REQUEST['echosign_api_key']);

	if(class_exists('echosign_woocommerce'))  {
		$settings_info['woocommerce_checkout'] = sanitize_text_field($_REQUEST['woocommerce_checkout']);
        	$settings_info['woo_template'] = sanitize_text_field($_REQUEST['echosign_woo_template']);
		if(!empty($_REQUEST['echosign_button_label']))
			$settings_info['button_label'] = sanitize_text_field($_REQUEST['echosign_button_label']);
		else
			$settings_info['button_label'] = $button_label;

		$button_label = $settings_info['button_label'];
	}

	$soap_client = new SoapClient(EchoSign\API::getWSDL());
	$wp_echosign = new wp_echosign();
	$wp_echosign->api_key = $api_key;
	$wp_echosign->echosign_api = new EchoSign\API($soap_client, $api_key);

	try	{
		$response = $wp_echosign->echosign_api->testPing();
		if($response->pong->message == 'It works!')	{
			update_option('echosign_apikey', $api_key);
			$notification = "<div class = 'alert alert-success'> Settings saved successfully </div>";
		}
	}
	catch(exception $e)	{
		$notification = "<div class = 'alert alert-danger'> Error occurred while saving API Key. " . $e->faultstring . '</div>';	
	}
	update_option('__wp_echosign_settings_info', $settings_info);
}
?>
<div class = 'echosign_container'>
	<div>  <h3 class = 'echosign_settings_header'> Echosign Settings </h3> </div>
	<hr>
	<div class = 'row echosign_notification_area'> <?php echo $notification; ?> </div>
	<form name = 'echosign_settings' class = 'form-horizontal' action = '#' method = 'POST'> 
		<input type = 'hidden' name = 'echosign_settings_action' value = 'save'>
		<div class="form-group">
			<label for="echosign_api_key" class="col-sm-3 control-label"> Echosign API Key </label>
			<div class = 'col-md-8'>
				<input type = "text" class = "form-control" id = "echosign_api_key" name = 'echosign_api_key' placeholder="API Key" required value = '<?php echo $api_key; ?>'>
			</div> <!-- .col-sm-8 -->
		</div> <!-- .form-group -->
		<?php if(class_exists('echosign_woocommerce'))	{ ?>
		<div> <h3 class = 'echosign_settings_header'> WooCommerce Settings </h3> </div>
		<hr>
		<div class = 'form-group'> 
			<label for="echosign_add_button" class="col-sm-3 control-label"> Add button to this form </label>		
			<div class = 'col-sm-5'> 
				<label for = "woocommerce_checkout"> <input type = 'checkbox' name = 'woocommerce_checkout' id = 'woocommerce_checkout' class = 'form-control' <?php if($settings_info['woocommerce_checkout'] == 'on') { echo 'checked'; } ?>> <span> Woocommerce Checkout </span> </label> <br> 

			</div> <!-- .col-sm-5 -->
		</div> <!-- .form_group -->
		<div class = 'form-group'>
			<label for = 'echosign_button_label' class = 'col-sm-3 control-label'> Button label text </label>
			<div class = 'col-md-8'>
                               	<input type = 'text' name = 'echosign_button_label' id = 'echosign_button_label' class = 'form-control' value = '<?php echo $button_label; ?>'required>
                        </div> <!-- .col-sm-5 -->
		</div>
		<div class = 'form-group'>
			<label for = 'echosign_button_label' class = 'col-sm-3 control-label'> Select Template </label>
			<div class = 'col-sm-5'>
                               	<select type = 'text' name = 'echosign_woo_template' id = 'echosign_button_label' class = 'form-control' required>
                                 <?php
                                 $get_template_list = get_option('_eor_echosign_template_info');
                                 foreach($get_template_list as $tempKey => $tempVal) { 
                                        $selected = '';
                                        $exp_temp = explode('_', $settings_info['woo_template']);
                                        if($tempVal['document_name'] == $exp_temp['1'])
                                              $selected = 'selected';  ?>
                                        <option value = "<?php echo $tempKey.'_'.$tempVal['document_name']?>" <?php echo $selected ?>> <?php echo $tempVal['document_name'] ?> </option>
                                <?php  }

                                 ?>
                                 </select>

                        </div> <!-- .col-sm-5 -->
		</div>
		<?php } ?>
		<div class = 'form-group'>
			<div class = 'col-sm-3'> </div> 
			<div class = 'col-md-8 text-right'>
				<button type = 'submit' class = 'btn btn-primary' > Save </button>
			</div> <!-- .col-sm-8 -->
		</div> <!-- .form_group -->

	</form> <!-- .echosign_settings -->
<div> <!-- .container -->
