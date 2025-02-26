<?php
/*
Plugin Name: abuse.ch httpBL check
Version: 2.1
Plugin URI: http://wordpress.org/extend/plugins/abusech-httpbl-check/
Description: Check if a visitor is listed on httpBL.abuse.ch, see http://dnsbl.abuse.ch/faq.php#about_httpbl for more information
Author: admin [at] abuse {dot} ch
Author URI: http://www.abuse.ch
*/

function check_for_httpbl($logging)
{
	// Use default setting if the Plugin has not been setup yet
	if($useDefaults=!(get_option('httpBL_IsSetup')=="1"))
	{
		$logging = 1;
		$logo = 1;
	}
	else
	{
		$logging = get_option('logging');
		$logo = get_option('logo');
	}
	$iconFolder = get_bloginfo('wpurl')."/wp-content/plugins/abusech-httpbl-check";
	// Check the visitors IP against httpBL.abuse.ch
	$time = date('M-d-Y H:i:s');
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	if($logging == "1") { $hostname = ((gethostbyaddr($ipaddress)==$ipaddress)?"":gethostbyaddr($ipaddress)); }
	$rev = array_reverse(explode('.', $ipaddress));
	$lookup = implode('.', $rev) . '.' . 'httpbl.abuse.ch.';
	$response = gethostbyname($lookup);
	if($response == "127.0.0.2") {
		if($logging == "1") { logit($time,$ipaddress,$hostname,$response); }
		echo "<h1>Your ip-address ($ipaddress) is banned</h1> <em>(reason: Hacking activities)</em><br />
		<p>Your ip-address is banned because it is blacklisted on httpBL.abuse.ch. It was previously identified as source of hacking activities.<br />
		You can look up your <a href='http://dnsbl.abuse.ch/lookup.php?IPAddress=$ipaddress' target='_blank'>ip address ($ipaddress)</a> for more information.</p>"; 
		if($logo == "1") { echo '<center><a href="http://dnsbl.abuse.ch" target="_blank" title="protected by httpbl.abuse.ch"><img src="'.$iconFolder.'/httpbl_button.jpg" alt="prodtected by httpbl.abuse.ch" width="130" height="35" border="0" title="protected by httpbl.abuse.ch" /></a></center>'; }
		exit();}
	if($response == "127.0.0.3") { 
		if($logging == "1") { logit($time,$ipaddress,$hostname,$response); }
		echo "<h1>Your ip-address ($ipaddress) is banned</h1> <em>(reason: Source of RFI attacks)</em><br />
		<p>Your ip-address is banned because it is blacklisted on httpBL.abuse.ch. It was previously identified as source of RFI attacks.<br />
		You can look up your <a href='http://dnsbl.abuse.ch/lookup.php?IPAddress=$ipaddress' target='_blank'>ip address ($ipaddress)</a> for more information.</p>";
		if($logo == "1") { echo '<center><a href="http://dnsbl.abuse.ch" target="_blank" title="protected by httpbl.abuse.ch"><img src="'.$iconFolder.'/httpbl_button.jpg" alt="prodtected by httpbl.abuse.ch" width="130" height="35" border="0" title="protected by httpbl.abuse.ch" /></a></center>'; }
		exit();}
	if($response == "127.0.0.4") {
		if($logging == "1") { logit($time,$ipaddress,$hostname,$response); }
		echo "<h1>Your ip-address ($ipaddress) is banned</h1> <em>(reason: Referer Spam)</em><br />
		<p>Your ip-address is banned because it is blacklisted on httpBL.abuse.ch. It was previously identified as source of referer spam.<br />
		You can look up your <a href='http://dnsbl.abuse.ch/lookup.php?IPAddress=$ipaddress' target='_blank'>ip address ($ipaddress)</a> for more information.</p>";
		if($logo == "1") { echo '<center><a href="http://dnsbl.abuse.ch" target="_blank" title="protected by httpbl.abuse.ch"><img src="'.$iconFolder.'/httpbl_button.jpg" alt="prodtected by httpbl.abuse.ch" width="130" height="35" border="0" title="protected by httpbl.abuse.ch" /></a></center>'; }
		exit();}
	if($response == "127.0.0.5") {
		if($logging == "1") { logit($time,$ipaddress,$hostname,$response); }
		echo "<h1>Your ip-address ($ipaddress) is banned</h1> <em>(reason: Automated scanning drone)</em><br />
		<p>Your ip-address is banned because it is blacklisted on httpBL.abuse.ch. It was previously identified as automated scanning drone.<br />
		You can look up your <a href='http://dnsbl.abuse.ch/lookup.php?IPAddress=$ipaddress' target='_blank'>ip address ($ipaddress)</a> for more information.</p>";
		if($logo == "1") { echo '<center><a href="http://dnsbl.abuse.ch" target="_blank" title="protected by httpbl.abuse.ch"><img src="'.$iconFolder.'/httpbl_button.jpg" alt="prodtected by httpbl.abuse.ch" width="130" height="35" border="0" title="protected by httpbl.abuse.ch" /></a></center>'; }
		exit();}
}
function logit($time,$ipaddress,$hostname,$response) {
	$useragent = trim(strip_tags($_SERVER['HTTP_USER_AGENT']));
	$logfile = fopen("httpbl.log", a);
	fwrite($logfile, "$time | $ipaddress | $hostname | $useragent | $response\r\n");
}

function abusech_httpbl_menu() {
	add_options_page('abuse.ch httpBL Options', 'abuse.ch httpBL', 'manage_options', 'abusech_httpbl', 'abusech_httpbl_options');
}

function abusech_httpbl_options() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	// Use default setting if the Plugin has not been setup yet
	if($useDefaults=!(get_option('httpBL_IsSetup')=="1"))
	{
		$logging = 1;
		$logo = 1;
	}
	else
	{
		$logging = get_option('logging');
		$logo = get_option('logo');
	}
	// Diplay option page
	?>
	<div class="wrap">
	<h2>abuse.ch httpBL Options</h2>
	<?php
	if((!is_writable($_SERVER["DOCUMENT_ROOT"]."/httpbl.log")) && ($logging == "1"))
	{
		echo '<p></p><strong><font color="#FF0000">ERROR</font>: httpbl.log is not writable!</font></strong><br />Solution: Create and and change permission of httpbl.log in the root directory (chmod 666) or disable the logging function below.</p>';
	}
	?>
	<p>Below you can see the options for the abuse.ch httpBL plugin:</p>

	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
	<table class="form-table">
	<tr valign="top">
	<th scope="row">Enable logging:</th>
	<td><input type="checkbox" id="logging" name="logging" value="1" <?php echo $logging ? 'checked' : ''; ?>></td>
	</tr>
	<tr>
	<th scope="row">Display httpBL logo in error page:</th>
	<td><input type="checkbox" id="logo" name="logo" value="1" <?php echo $logo ? 'checked' : ''; ?>></td>
	</tr>
	</table>

	<input type="hidden" name="httpBL_IsSetup" value="1" checked;/>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="logging,logo,httpBL_IsSetup" />

	<p class="submit">
	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	</p>

	</form>
	</div>
	<?php
	// If a Logfile exist, we will display its content here
	if((file_exists($_SERVER["DOCUMENT_ROOT"]."/httpbl.log")) && ($logging == "1"))
	{
		echo "<h3>httpBL Log</h3>";
		if(0 == filesize($_SERVER["DOCUMENT_ROOT"]."/httpbl.log"))
		{
			echo "<p><em>Logfile is empty</em></p>";
		}
		else
		{
			echo '<table border="0"><tr><td>Timestamp</td><td>IP address</td><td>Hostname</td><td>User-Agent</td><td>httpBL zone</td></tr>';
			$file = fopen($_SERVER["DOCUMENT_ROOT"]."/httpbl.log", "r");
			while(!feof($file))
			{
				$line =  fgets($file);
				$logarray = explode(" | ", $line);
				$httpblzone = trim($logarray[4]);
				if($httpblzone == '127.0.0.2'){ $httpblzone = 'Script Kiddie'; } elseif($httpblzone == '127.0.0.3'){ $httpblzone = 'RFI attacker'; } elseif($httpblzone == '127.0.0.4'){ $httpblzone = 'Referer Spammer'; } else{ $httpblzone = 'Scanning drone'; }
				echo "<tr><td>".$logarray[0]."</td><td><a href=\"http://dnsbl.abuse.ch/lookup.php?ipaddress=".$logarray[1]."\" target=\"_blank\" title=\"Lookup ".$logarray[1]." on httpBL.abuse.ch\">".$logarray[1]."</a></td><td>".$logarray[2]."</td><td>".substr($logarray[3], 0, 60)."</td><td>$httpblzone</td></tr>";
			}
			fclose($file);
			echo '</table>';
		}
	}
	else
	{
		echo '<p><em>As soon as you enable the logging function and the logfile contains some content, you will see some output here.</em></p>';
	}
}

add_action('init', 'check_for_httpbl');
add_action('admin_menu', 'abusech_httpbl_menu');
?>
