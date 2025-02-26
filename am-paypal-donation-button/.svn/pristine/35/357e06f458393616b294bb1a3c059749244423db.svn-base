<?php
add_action('admin_menu', 'baw_create_menu');

function baw_create_menu() {
add_options_page(AMPAYPALBUTTON_NAME, AMPAYPALBUTTON_NAME, 'manage_options', 'am-paypal-donation-button-settings', 'get_am_paypal_settings');
}

function get_am_paypal_settings() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	if (isset($_POST['update_am_paypal_button_settings']) and $_POST['update_am_paypal_button_settings']=="yes"){
	
			$opts = array('am_paypalEmail' => $_POST['am_paypalEmail'],
            'am_paypalPurpose' => $_POST['am_paypalPurpose'],
            'am_paypalButtonCountryLanguage' => $_POST['am_paypalButtonCountryLanguage'],
            'am_paypalButtonOptionCurrency' => $_POST['am_paypalButtonOptionCurrency'],
            'am_paypalReference' => $_POST['am_paypalReference'],
            'am_paypalButtonImg' => $_POST['am_paypalButtonImg'],
            'am_paypalReturnPage' => $_POST['am_paypalReturnPage'],
			'am_paypalReturnPageCancel' => $_POST['am_paypalReturnPageCancel'],
			'am_paypalReturnMethod' => $_POST['am_paypalReturnMethod']
			);
			update_option('am_paypal_donation_button',$opts);
			$settingUpdated = true;
	}
	
	if (!get_option('am_paypal_donation_button')){
		
		$opts = array('am_paypalEmail' => '',
            'am_paypalPurpose' => '',
            'am_paypalButtonCountryLanguage' => 'en_US',
            'am_paypalButtonOptionCurrency' => 'USD',
            'am_paypalReference' => '',
            'am_paypalButtonImg' => 'btn_donateCC_LG.gif',
            'am_paypalReturnPage' => 'http://'.$_SERVER['HTTP_HOST'],
			'am_paypalReturnPageCancel' => '',
			'am_paypalReturnMethod' => '0'
			);
			add_option('am_paypal_donation_button',$opts);		
	}
		
			$am_paypal_opts =  get_option('am_paypal_donation_button');
			$am_paypalEmail = esc_attr( $am_paypal_opts['am_paypalEmail'] );
			$am_paypalPurpose = esc_attr( $am_paypal_opts['am_paypalPurpose'] );
			$am_paypalButtonCountryLanguage = esc_attr( $am_paypal_opts['am_paypalButtonCountryLanguage'] );
			$am_paypalButtonOptionCurrency = esc_attr( $am_paypal_opts['am_paypalButtonOptionCurrency'] );
			$am_paypalReference = esc_attr( $am_paypal_opts['am_paypalReference'] );
			$am_paypalButtonImg = esc_attr( $am_paypal_opts['am_paypalButtonImg'] );	
			$am_paypalReturnPage = esc_attr( $am_paypal_opts['am_paypalReturnPage'] );		
			$am_paypalReturnPageCancel = esc_attr( $am_paypal_opts['am_paypalReturnPageCancel'] );	
			$am_paypalReturnMethod = esc_attr( $am_paypal_opts['am_paypalReturnMethod'] );
?>
<script type="text/javascript" language="javascript">
function checkAmPayPalForm(){
	if(jQuery("#am_paypalEmail").val()=="")
	{
		alert("All fields are required!");
		return false;
	}
}

function change_am_paypal_button_lang(lang){

	jQuery("#am_paypal_sm_img").attr('src','https://www.paypal.com/'+lang+'/i/btn/btn_donate_SM.gif');
	jQuery("#am_paypal_lg_img").attr('src','https://www.paypal.com/'+lang+'/i/btn/btn_donate_LG.gif');
	jQuery("#am_paypal_cc_lg_img").attr('src','https://www.paypal.com/'+lang+'/i/btn/btn_donateCC_LG.gif');
	
}
</script>
<div id="temBtn"></div>

		<div style="width:400px; padding:40px; margin:0 auto;background:#FFF;margin-top:40px;">
        <?php if(isset($settingUpdated) and $settingUpdated == true){echo '<span style="color:red">Settings updated</span>';};?>
        <h2>AM - PayPal donation button settings</h2>
        <form method="post" onsubmit="return checkAmPayPalForm()" name="am_paypalForm">
        <input type="hidden" name="update_am_paypal_button_settings" value="yes"/>
		<label for="am_paypalEmail"><?php _e( 'PayPal ID (Email):' ); ?></label> 
		<input type="text" class="widefat" id="am_paypalEmail"  name="am_paypalEmail" value="<?php echo $am_paypalEmail;?>"/> 
        
        <label for="am_paypalPurpose"><?php _e( 'Purpose:' ); ?></label> 
		<input type="text" class="widefat" id="am_paypalPurpose"  name="am_paypalPurpose" value="<?php echo $am_paypalPurpose;?>" /> 
        
        <label for="am_paypalReference"><?php _e( 'Reference:' ); ?></label> 
		<input type="text" class="widefat" id="am_paypalReference"  name="am_paypalReference" value="<?php echo $am_paypalReference;?>" />    
             
        <label for="am_paypalButtonCountryLanguage"><?php _e( 'Country and language:' ); ?></label>
        
        <select class="widefat" id="am_paypalButtonCountryLanguage"  name="am_paypalButtonCountryLanguage" onchange="change_am_paypal_button_lang(this.value)">
        <?php 
		include dirname( __FILE__ ) . "/country_language.inc.php";
		foreach($paypal_country_lang as $key=>$value){
		if ($am_paypalButtonCountryLanguage==$key)
		echo "<option value=\"$key\" selected=\"selected\">$value</option>";
		else
		echo "<option value=\"$key\">$value</option>";
		}
		?>
        </select>
        
        <label for="am_paypalButtonOptionCurrency"><?php _e( 'Currency:' ); ?></label>
        <select class="widefat" id="am_paypalButtonOptionCurrency"  name="am_paypalButtonOptionCurrency">
        <?php 
		include dirname( __FILE__ ) . "/currency.inc.php";
		foreach($paypal_currency as $key=>$value){
			if ($am_paypalButtonOptionCurrency==$key)
		echo "<option value=\"$key\" selected=\"selected\">$value</option>";
		else
		echo "<option value=\"$key\">$value</option>";
		}
		?>
        </select>
        <div>
        <label for="am_paypalButtonImg"><?php _e( 'Donation Button:' ); ?></label>
        <ul>
        <li>
        <input type="radio" style="float:left;margin-right:10px" id="am_paypalButtonImgSM"  name="am_paypalButtonImg" value="btn_donate_SM.gif" <?php echo($am_paypalButtonImg=="btn_donate_SM.gif")?"checked":"";?>/>
        	<img src="https://www.paypalobjects.com/<?php echo $am_paypalButtonCountryLanguage;?>/i/btn/btn_donate_SM.gif" id="am_paypal_sm_img"/>
        </li>
        <li>
        <input type="radio" style="float:left;margin-right:10px" id="am_paypalButtonImgLG"  name="am_paypalButtonImg" value="btn_donate_LG.gif" <?php echo($am_paypalButtonImg=="btn_donate_LG.gif")?"checked":"";?>/>
        	<img src="https://www.paypalobjects.com/<?php echo $am_paypalButtonCountryLanguage;?>/i/btn/btn_donate_LG.gif" id="am_paypal_lg_img"/>
        </li>
        <li>
        <input type="radio"  style="float:left;margin-right:10px" id="am_paypalButtonImgCC"  name="am_paypalButtonImg" value="btn_donateCC_LG.gif" <?php echo($am_paypalButtonImg=="btn_donateCC_LG.gif")?"checked":"";?>/>
        	<img src="https://www.paypalobjects.com/<?php echo $am_paypalButtonCountryLanguage;?>/i/btn/btn_donateCC_LG.gif" id="am_paypal_cc_lg_img" />   
         </li>
         <li>
         <label for="am_paypalReturnPage"><?php _e( 'Return page after donation is done:' ); ?></label>
         <input type="text" class="widefat" id="am_paypalReturnPage"  name="am_paypalReturnPage" value="<?php echo $am_paypalReturnPage;?>" />
         </li>
         <li>
         <label for="am_paypalReturnPage"><?php _e( 'Return page when donation is canceled:' ); ?></label>
         <input type="text" class="widefat" id="am_paypalReturnPageCancel"  name="am_paypalReturnPageCancel" value="<?php echo $am_paypalReturnPageCancel;?>" />
         </li>
         <li>
         <label for="am_paypalReturnMethod"><?php _e( 'Return method: (Takes effect only if the return page is set)' ); ?></label>
         <select id="am_paypalReturnMethod" name="am_paypalReturnMethod">
         	<option value="0" selected="selected"><?php _e('GET method (default)');?></option>
            <option value="1"><?php _e('GET method, no variables');?></option>
            <option value="2"><?php _e('POST method');?></option>
         </select>
         </li>
         </ul>     
         </div>
         <div style="text-align:center">  
         <input type="submit" class="button-primary" value="Save"/>
         <input type="button" class="button-primary" value="Reset" onclick="document.am_paypalForm.reset();"/>
         </div>
         </form>
         <br/>
         <?php _e( 'Insert the shortCode [am_paypal_donation_button] in your post to show PayPal donation button.' ); ?>
        </div>

<?php 	} ?>