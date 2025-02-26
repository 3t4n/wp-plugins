<style>
code {
	background: #eaeaea;
}
</style>
<div class="wrap">
	<style>
	.strong{font-weight:bold}
	.fieldset{border:1px solid gray; padding:20px}
	.red{color:red}
	#stats th{background-color:gray;color:white;font-weight:bold;padding:3px;}
	#stats td{padding:3px;border:1px solid gray;color:black;background-color:transparent; align:left; valign:top;}
	#stats tr{background-color:white;color:gray;}
	#stats tr:hover{background-color:gray;color:white;}
	</style>
	<table border="0"><tr><td><img src="<?php echo $ARTFpluginpath; ?>/images/ARTF.gif" title="AnupRaj Tell Friends" /></td>
	<td style="padding-left:50px"><h2>AnupRaj Tell Friends</h2>
	
	<p><em>"AnupRaj Tell Friends" plugin by <a href="http://anupraj.com.np/">Anup Raj</a><br />

		Visit the <a href="http://anupraj.com.np/index.php/wp-plugins/anupraj-tell-friends">AnupRaj Tell Friends</a> Plugin site for more information.</em></p></td></tr></table>
		
		<h2>Stats</h2>
		<br /> 
	<?php 
	$ARTFoldStats = get_option("ARTFstat");
	if($ARTFoldStats !="" &&($ARTFoldStats == true || $ARTFoldStats >= 0 )){
	$ARTFoldStats = ($ARTFoldStats<1?0:$ARTFoldStats);
?>
		<strong>"<a href="http://anupraj.com.np/index.php/wp-plugins/anupraj-tell-friends" title="AnupRaj Tell Friends" >AnupRaj Tell Friends</a>" served <span class="red"><?php echo $ARTFoldStats; ?></span> times </strong> on your site till now.<br />
		<em>Delete Records: Disabling Stats and Enabling it again will reset your data.</em>
		<?php
		}else{
		?>
		<strong class="red">Stats of "<a href="http://anupraj.com.np/index.php/wp-plugins/anupraj-tell-friends" title="AnupRaj Tell Friends" class="red">AnupRaj Tell Friends</a>" must be enabled from the <a href="?page=anupraj-tell-friends/anupraj-tell-friends-options.php" class="red">Customization Page</a>.</strong>
		<?php
		}
		?><br /><br />
		
		<h2>Donate</h2>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="10761157">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG_global.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<p style="padding-left:15px;">
Earn Gratitude and contribue by <a href="http://anupraj.com.np/" target="_blank"><strong>Donating</strong></a><br /><em>Your effort will help further development of the plugin.</em></p>
		
				<img src="http://anupraj.com.np/wp.php?type=plugin&name=ARTF&ref=stats" style="height:1px;width:1px; " title="Please leave this tag intact to help me find your site. Thank You :)" />
</div>