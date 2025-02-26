<?php
$websiteurlfilter = str_replace("http://","",str_replace("https://","",network_site_url( '/' )));
$urladsmatcher_monetization = "https://www.adsmatcher.com/api/verify.php?website=".$websiteurlfilter;
$response = wp_remote_get($urladsmatcher_monetization);
$adsmatcher_activation_statut = sanitize_text_field($response['body']);
$adsmatcher_wordpressapi = get_option('adsmatcher_wordpress_key');

if(!empty($adsmatcher_wordpressapi) && $adsmatcher_activation_statut=="3"){
	$stepone= "You have an <a href='https://www.adsmatcher.com/authentication/' target='_blank' class='thickbox'>AdsMatcher</a> account.";
	$steptwo = "Your site is connected to AdsMatcher. <a class='thickbox' href='https://www.adsmatcher.com/login.php?wordpress=apikey' target='_blank'>See your WordPress API Key</a>";
	$stepthree = "Manage your <a href='https://www.adsmatcher.com/login.php?wordpress=adzone' target='_blank'>Ad Zone</a>";
	$verifiedinput = "display: inline;";
	$finalverifiedinput = "display: inline;";
	$disableinput = "disabled";
	$buttonstatut = "style='display: none;'";
}else if(!empty($adsmatcher_wordpressapi) && $adsmatcher_activation_statut=="2"){
	$stepone= "You have an <a href='https://www.adsmatcher.com/authentication/' target='_blank' class='thickbox'>AdsMatcher</a> account.";
	$steptwo = "Your site is connected to AdsMatcher. <a class='thickbox' href='https://www.adsmatcher.com/login.php?wordpress=apikey' target='_blank'>See your WordPress API Key</a>";
	$stepthree = "Create your first <a href='https://www.adsmatcher.com/login.php?wordpress=adzone' target='_blank'>Ad Zone</a>";
	$verifiedinput = "display: inline;";
	$finalverifiedinput = "display: none;";
	$disableinput = "disabled";
	$buttonstatut = "style='display: none;'";
}else{
	$stepone= "Do you have AdsMatcher account? If not, <a href='https://www.adsmatcher.com/signup/' target='_blank' class='thickbox'>Create One</a> - it's <strong>100% free</strong>.";
	$steptwo = "Connect your site to AdsMatcher. <a class='thickbox' href='https://www.adsmatcher.com/login.php?wordpress=apikey' target='_blank'>Find your WordPress API Key</a>";
	$stepthree = "Create your first <a href='https://www.adsmatcher.com/login.php?wordpress=adzone' target='_blank'>Ad Zone</a>";
	$verifiedinput = "display: none;";
	$finalverifiedinput = "display: none;";
	$disableinput = "";
	$buttonstatut = "";
}

if(isset($_POST['submitapikey'])){
	
	$setapikey = sanitize_text_field($_POST['adsmatcher_api_key']);
	$urlmatcher = "https://www.adsmatcher.com/api/verify.php?website=".$websiteurlfilter."&statut=check&apikey=".$setapikey;
	$urlmatcher_response = wp_remote_get($urlmatcher);
	$urlmatcher_statut = sanitize_text_field($urlmatcher_response['body']);
	
	if($urlmatcher_statut=="incorrect"){
		$error_adsmatcher_apikey = "<p><span style='font-size: 17px;display: block;margin-top: 10px;color: red;'>Your WordPress API Key is incorrect.</span></p>";
	}else{
		$adsmatcheresponse = explode("||", $urlmatcher_statut);
		if($adsmatcheresponse[0]=="correct"){
			$websitepublicid = $adsmatcheresponse[1];
			update_option('adsmatcher_website_publicid', $websitepublicid);
			update_option('adsmatcher_wordpress_key', $setapikey);
			
			$stepone= "You have an <a href='https://www.adsmatcher.com/authentication/' target='_blank' class='thickbox'>AdsMatcher</a> account.";
			$steptwo = "Your site is connected to AdsMatcher. <a class='thickbox' href='https://www.adsmatcher.com/login.php?wordpress=apikey' target='_blank'>See your WordPress API Key</a>";
			$verifiedinput = "display: inline;";
			$error_adsmatcher_apikey = "<p><span style='font-size: 17px;display: block;margin-top: 10px;color: green;'>Your website has been successfully verified.</span></p>";
			$disableinput = "disabled";
			$buttonstatut = "style='display: none;'";
		}
	}
}

wp_enqueue_style('style', plugins_url( 'settings.css', __FILE__ ), false, '1.0', 'all' );
?>
<div class="wrap settings-container">
	<div class="menu-masthead">
		<div class="icon32 icon32-adsmatcher-settings" id="icon-broadpsring-ca">
			<a href="https://www.adsmatcher.com/" target="_blank"><img width="201px" height="60px" src="<?php echo plugins_url( '../src/img/adsmatcher_logo.png', __FILE__ ); ?>" /></a>
		</div>
	</div>
	
	<table class="form-table" role="presentation">
		<tbody>
			<tr>
				<th scope="row"><span class="adsmatcher_step">1</span></th>
				<td><span class='adsmatcher_instructions_h2'><?php echo wp_kses_data($stepone); ?></span> <img width='16px' height='16px' style='<?php echo wp_kses_data($verifiedinput); ?>' src='<?php echo plugins_url( '../src/img/adsmatcher_icon_active.png', __FILE__ ); ?>' /></td> 
			</tr>
			<tr>
				<th scope="row"><span class="adsmatcher_step">2</span></th>
				<td><form action="" method="post">
						<span class='adsmatcher_instructions_h2'><?php echo wp_kses_data($steptwo); ?></span> <img width='16px' height='16px' style='<?php echo wp_kses_data($verifiedinput); ?>' src='<?php echo plugins_url( '../src/img/adsmatcher_icon_active.png', __FILE__ ); ?>' />
						<p><input id="adsmatcher_api_key" value="<?php echo esc_attr(get_option('adsmatcher_wordpress_key')); ?>" name="adsmatcher_api_key" size="40" type="text" <?php echo wp_kses_data($disableinput); ?>  autocomplete="off"> <img width='16px' height='16px' style='display: none;' src='<?php echo plugins_url( '../src/img/adsmatcher_icon_active.png', __FILE__ ); ?>' /></p>
						<p <?php echo wp_kses_data($buttonstatut); ?> ><button id="verify_api_key" name="submitapikey" type="submit" class="button-primary">Verify WordPress API Key</button></p>
						<?php if(isset($error_adsmatcher_apikey)){ echo $error_adsmatcher_apikey; } ?>
				</form></td>
			</tr>
			<tr>
				<th scope="row"><span class="adsmatcher_step">3</span></th>
				<td><p><span class='adsmatcher_instructions_h2'><?php echo wp_kses_data($stepthree); ?></span> <img width='16px' height='16px' style='<?php echo wp_kses_data($finalverifiedinput); ?>' src='<?php echo plugins_url( '../src/img/adsmatcher_icon_active.png', __FILE__ ); ?>' /></p></td>
			</tr>
		</tbody>
	</table>
	<span class="adsmatcher_instructions_help">The Ad Zones that you create on AdsMatcher, will be automatically installed on your website with this plugin.<br>If you have any questions, <a href="https://www.adsmatcher.com/contact/" target="_blank">contact us</a> and we'll get back to you within 24 hours.</span>
</div>