<?php
/*
Plugin Name: ad-coder
Plugin URI: http://www.triologic.de/
Description: easy way to spread adserver code or other banner code over your blog or page content - e.g. type {IMU 486_60} and this tag will be replaced with the code you have prepaired in the admin option panel for this
Version: 1.0
Author: TRIOLOGIC GmbH, Germany
Author URI: http://triologic.de/
Update Server: http://triologic.de/2007/12/29/ad-coder-version1/
Min WP Version: 2.3.1
Max WP Version: 2.3.1
*/

/*  Copyright 2007  PLUGIN_AUTHOR_NAME  (email : wp-plugins@triologic.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/



/**
 * load textdomain if present and locale is set
 *
 */

$currentLocale = get_locale();
if(!empty($currentLocale)) {
	$moFile = dirname(__FILE__) . "/Ad_Coder-" . $currentLocale . ".mo";
	if(@file_exists($moFile) && is_readable($moFile)) load_textdomain('Ad_Coder', $moFile);
}


/**
 * function adservercoder_admin_menu() - adds option page for the plugin
 */
 
function adservercoder_admin_menu() {
	if (function_exists('add_options_page')) {
		add_options_page('options-general.php', 'Ad Coder', 8, basename(__FILE__), 'adserver_subpanel');
	}
}



/**
 * function adservercoder_v1() - replace all given tags in content
 */
 
function adservercoder_v1($content) {
	$adscode_468x60 = get_option('adservercoder_468x60');
	$adscode_468x60 = stripslashes($adscode_468x60);
	$content = str_replace('{IMU_468_60}', $adscode_468x60, $content);
	//$content = $adscode_468x60;

	$adscode_234x60 = get_option('adservercoder_234x60');
	$adscode_234x60 = stripslashes($adscode_234x60);
	$content = str_replace('{IMU_234_60}', $adscode_234x60, $content);
	
	$adscode_88x31 = get_option('adservercoder_88x31');
	$adscode_88x31 = stripslashes($adscode_88x31);
	$content = str_replace('{IMU_88_31}', $adscode_88x31, $content);
	
	$adscode_120x90 = get_option('adservercoder_120x90');
	$adscode_120x90 = stripslashes($adscode_120x90);
	$content = str_replace('{IMU_120_90}', $adscode_120x90, $content);
	
	$adscode_120x60 = get_option('adservercoder_120x60');
	$adscode_120x60 = stripslashes($adscode_120x60);
	$content = str_replace('{IMU_120_60}', $adscode_120x60, $content);
	
	$adscode_120x240 = get_option('adservercoder_120x240');
	$adscode_120x240 = stripslashes($adscode_120x240);
	$content = str_replace('{IMU_120_240}', $adscode_120x240, $content);
	
	$adscode_125x125 = get_option('adservercoder_125x125');
	$adscode_125x125 = stripslashes($adscode_125x125);
	$content = str_replace('{IMU_125_125}', $adscode_125x125, $content);
	
	$adscode_728x90 = get_option('adservercoder_728x90');
	$adscode_728x90 = stripslashes($adscode_728x90);
	$content = str_replace('{IMU_728_90}', $adscode_728x90, $content);
	
	$adscode_160x600 = get_option('adservercoder_160x600');
	$adscode_160x600 = stripslashes($adscode_160x600);
	$content = str_replace('{IMU_160_600}', $adscode_160x600, $content);
	
	$adscode_120x600 = get_option('adservercoder_120x600');
	$adscode_120x600 = stripslashes($adscode_120x600);
	$content = str_replace('{IMU_120_600}', $adscode_120x600, $content);

    return $content;
}


/**
 * function adserver_subpanel() - all what happened on the admin panel
 */

function adserver_subpanel() {

	add_option('adservercoder_468x60', '');
	add_option('adservercoder_234x60', '');
	add_option('adservercoder_88x31', '');
	add_option('adservercoder_120x90', '');
	add_option('adservercoder_120x60', '');
	add_option('adservercoder_120x240', '');
	add_option('adservercoder_125x125', '');
	add_option('adservercoder_728x90', '');
	add_option('adservercoder_160x600', '');
	add_option('adservercoder_120x600', '');
	
	add_option('thisversion', '1');
	
	function testversion($strVersionNumber) {
		$strUrlForTesting = 'http://www.triologic.de/wp-adserver-coder-version.php?version=' . $strVersionNumber . '&amp;lang=de';
		$page = file_get_contents($strUrlForTesting ,'r');
		If (strlen($page) < 10) { $page = _e('No Internet Connection for version testing. Try it later on.','Ad_Coder'); };
		return $page;
	}


	
	if (isset($_POST['adservercoder_468x60'])) {
    	$adscode_468x60 = $_POST['adservercoder_468x60'];
    	update_option('adservercoder_468x60', $adscode_468x60);
    }
    $adscode_468x60 = get_option('adservercoder_468x60');
    $adscode_468x60 = stripslashes($adscode_468x60);
	
	if (isset($_POST['adservercoder_234x60'])) {
    	$adscode_234x60 = $_POST['adservercoder_234x60'];
    	update_option('adservercoder_234x60', $adscode_234x60);
    }
    $adscode_234x60 = get_option('adservercoder_234x60');
    $adscode_234x60 = stripslashes($adscode_234x60);
	
	if (isset($_POST['adservercoder_88x31'])) {
    	$adscode_88x31 = $_POST['adservercoder_88x31'];
    	update_option('adservercoder_88x31', $adscode_88x31);
    }
    $adscode_88x31 = get_option('adservercoder_88x31');
    $adscode_88x31 = stripslashes($adscode_88x31);
	
	if (isset($_POST['adservercoder_120x90'])) {
    	$adscode_120x90 = $_POST['adservercoder_120x90'];
    	update_option('adservercoder_120x90', $adscode_120x90);
    }
    $adscode_120x90 = get_option('adservercoder_120x90');
    $adscode_120x90 = stripslashes($adscode_120x90);
	
	if (isset($_POST['adservercoder_120x60'])) {
    	$adscode_120x60 = $_POST['adservercoder_120x60'];
    	update_option('adservercoder_120x60', $adscode_120x60);
    }
    $adscode_120x60 = get_option('adservercoder_120x60');
    $adscode_120x60 = stripslashes($adscode_120x60);
	
	if (isset($_POST['adservercoder_120x240'])) {
    	$adscode_120x240 = $_POST['adservercoder_120x240'];
    	update_option('adservercoder_120x240', $adscode_120x240);
    }
    $adscode_120x240 = get_option('adservercoder_120x240');
    $adscode_120x240 = stripslashes($adscode_120x240);
	
	if (isset($_POST['adservercoder_125x125'])) {
    	$adscode_125x125 = $_POST['adservercoder_125x125'];
    	update_option('adservercoder_125x125', $adscode_125x125);
    }
    $adscode_125x125 = get_option('adservercoder_125x125');
    $adscode_125x125 = stripslashes($adscode_125x125);
	
	if (isset($_POST['adservercoder_728x90'])) {
    	$adscode_728x90 = $_POST['adservercoder_728x90'];
    	update_option('adservercoder_728x90', $adscode_728x90);
    }
    $adscode_728x90 = get_option('adservercoder_728x90');
    $adscode_728x90 = stripslashes($adscode_728x90);

    if (isset($_POST['adservercoder_160x600'])) {
    	$adscode_160x600 = $_POST['adservercoder_160x600'];
    	update_option('adservercoder_160x600', $adscode_160x600);
    }
    $adscode_160x600 = get_option('adservercoder_160x600');
    $adscode_160x600 = stripslashes($adscode_160x600);

    if (isset($_POST['adservercoder_120x600'])) {
    	$adscode_120x600 = $_POST['adservercoder_120x600'];
    	update_option('adservercoder_120x600', $adscode_120x600);
    }
    $adscode_120x600 = get_option('adservercoder_120x600');
    $adscode_120x600 = stripslashes($adscode_120x600);
    
    ?>
    
    <style type="text/css">

		li.sm_hint {
			color:green;
		}

		li.sm_optimize {
			color:orange;
		}

		li.sm_error {
			color:red;
		}

		input.sm_warning:hover {
			background: #ce0000;
			color: #fff;
		}

		a.sm_button {
			padding:4px;
			display:block;
			padding-left:25px;
			background-repeat:no-repeat;
			background-position:5px 50%;
			text-decoration:none;
			border:none;
		}

		a.sm_button:hover {
			border-bottom-width:1px;
		}

		a.sm_pluginHome {
			background-image:url(http://www.triologic.de/wp-includes/images/wlw/wp-icon.png);
		}
		</style>
    
    <div class="wrap">
	<div id="poststuff">
					<div id="moremeta">
						<div id="grabit" class="dbx-group">
							<fieldset id="sm_pnres" class="dbx-box">
								<h3 class="dbx-handle"><?php _e('About this Plugin','Ad_Coder'); ?>:</h3>
								<div class="dbx-content">
									<a class="sm_button sm_pluginHome" href="http://www.triologic.de/2007/12/29/ad-coder-version1/">Plugin-Home</a>
									<a class="sm_button sm_pluginHome" href="http://www.triologic.de/2007/12/29/preiswerter-webspace-fur-blogger-inklusive-vorinstallation/">Blog-Space</a>
								</div>
							</fieldset>
							<fieldset id="sm_smres" class="dbx-box">
								<h3 class="dbx-handle"><?php _e('About Banner','Ad_Coder'); ?>:</h3>
								<div class="dbx-content">
									<a class="sm_button sm_pluginHome" href="http://www.triologic.de/2007/12/30/bannerwerbung-die-sich-lohnt/">Banner-Howto</a>
									<a class="sm_button sm_pluginHome" href="http://www.triologic.de/2007/12/21/25/">Kostenfrei werben</a>
								</div>
							</fieldset>
							<fieldset id="sm_smres" class="dbx-box">
								<h3 class="dbx-handle"><?php _e('About Adserver','Ad_Coder'); ?>:</h3>
								<div class="dbx-content">
									<a class="sm_button sm_pluginHome" href="http://www.triologic.de/2007/12/30/ihr-kompletter-adserver-auf-mietbasis-mit-top-service/">Eigener Adserver</a>
									<a class="sm_button sm_pluginHome" href="http://www.triologic.de/2007/12/21/25/">Kostenfrei werben</a>
								</div>
							</fieldset>

<script type="text/javascript">
	// Dynamic Iframe loader
	function loadIframe(theURL) {
		document.getElementById("mainContent").src=theURL;
	}

	// resizes Iframe according to content
	function resizeMe(obj){
		docHeight = (mainContent.document.height || mainContent.document.body.scrollHeight ) + 20
		obj.style.height = docHeight + 'px'
	}
</script>

							<fieldset id="sm_smres" class="dbx-box">
								<h3 class="dbx-handle"><?php _e('Over the Dashboard','Ad_Coder'); ?>:</h3>
								<div class="dbx-content">
                                    <iframe id="mainContent" name="mainContent" onload="resizeMe(this)" border="0" frameborder="0" scrolling="no" allowtransparency="yes" style="width:100%;" src="http://www.triologic.de/adserver-coder-wp-plugin-iframe.php">
									</iframe><br />
								</div>
							</fieldset>

						</div>
					</div>
     				<div id="advancedstuff" class="dbx-group" >
						<!-- Rebuild Area -->
						<div class="dbx-b-ox-wrapper">
							<fieldset id="sm_rebuild" class="dbx-box">
								<div class="dbx-h-andle-wrapper">
									<h3 class="dbx-handle"><?php _e('Status','Ad_Coder'); ?></h3>
								</div>
								<div class="dbx-c-ontent-wrapper">
									<div class="dbx-content">
										<ul>
											<li><?php echo testversion(get_option('thisversion')); ?></li>
										</ul>
									</div>
								</div>
							</fieldset>
							<fieldset id="sm_rebuild" class="dbx-box">
								<div class="dbx-h-andle-wrapper">
									<h3 class="dbx-handle"><?php _e('Usage','Ad_Coder'); ?></h3>
								</div>
								<div class="dbx-c-ontent-wrapper">
									<div class="dbx-content">
										<ul>
											<li><?php _e('Insert tags like {IMU_468_60} in your posts and pages. Have a look at the list down on this page.','Ad_Coder'); ?></li>
											<li><?php _e('This plugin replace those tags depending on your given code on this page.','Ad_Coder'); ?></li>
											<li><?php _e('Your code could be plain text, html or js.','Ad_Coder'); ?></li>
											<li><?php _e('Your code replace tags as it is defined WITHOUT ANY WARRANTY. You are the admin!','Ad_Coder'); ?></li>
										</ul>
									</div>
								</div>
							</fieldset>
							<fieldset id="sm_rebuild" class="dbx-box">
								<div class="dbx-h-andle-wrapper">
									<h3 class="dbx-handle"><?php _e('Tag Manager','Ad_Coder'); ?></h3>
								</div>
								<div class="dbx-c-ontent-wrapper">
									<div class="dbx-content">

<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=ad_coder.php&updated=true">
		<table width="100%" cellspacing="2" cellpadding="5" class="editform">
			<tr valign="top">
				<th scope="row"><?php _e('Code:') ?></th>
				<td><textarea name="adservercoder_468x60" id="adscode_468x60" style="width: 90%;" rows="4" cols="50"><?php echo $adscode_468x60; ?></textarea>
				<br /><?php _e('Add Full Banner {IMU 46 8x60} Code here','Ad_Coder'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Code:') ?></th>
				<td><textarea name="adservercoder_234x60" id="adscode_234x60" style="width: 90%;" rows="4" cols="50"><?php echo $adscode_234x60; ?></textarea>
				<br /><?php _e('Add Half Banner {IMU 234x60} Code here','Ad_Coder'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Code:') ?></th>
				<td><textarea name="adservercoder_88x31" id="adscode_88x31" style="width: 90%;" rows="4" cols="50"><?php echo $adscode_88x31; ?></textarea>
				<br /><?php _e('Add Micro Bar {IMU 88x31} Code here','Ad_Coder'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Code:') ?></th>
				<td><textarea name="adservercoder_120x90" id="adscode_120x90" style="width: 90%;" rows="4" cols="50"><?php echo $adscode_120x90; ?></textarea>
				<br /><?php _e('Add Button 1 {IMU 120x90} Code here','Ad_Coder'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Code:') ?></th>
				<td><textarea name="adservercoder_120x60" id="adscode_120x60" style="width: 90%;" rows="4" cols="50"><?php echo $adscode_120x60; ?></textarea>
				<br /><?php _e('Add Button 2 {IMU 120x60} Code here','Ad_Coder'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Code:') ?></th>
				<td><textarea name="adservercoder_120x240" id="adscode_120x240" style="width: 90%;" rows="4" cols="50"><?php echo $adscode_120x240; ?></textarea>
				<br /><?php _e('Add Vertical Banner {IMU 120x240} Code here','Ad_Coder'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Code:') ?></th>
				<td><textarea name="adservercoder_125x125" id="adscode_125x125" style="width: 90%;" rows="4" cols="50"><?php echo $adscode_125x125; ?></textarea>
				<br /><?php _e('Add Square Button {IMU 125x125} Code here','Ad_Coder'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Code:') ?></th>
				<td><textarea name="adservercoder_728x90" id="adscode_728x90" style="width: 90%;" rows="4" cols="50"><?php echo $adscode_728x90; ?></textarea>
				<br /><?php _e('Add Leader Board {IMU 728x90} Code here','Ad_Coder'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Code:') ?></th>
				<td><textarea name="adservercoder_160x600" id="adscode_160x600" style="width: 90%;" rows="4" cols="50"><?php echo $adscode_160x600; ?></textarea>
				<br /><?php _e('Add Wide Skyscraper {IMU 160x600} Code here','Ad_Coder'); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Code:') ?></th>
				<td><textarea name="adservercoder_120x600" id="adscode_120x600" style="width: 90%;" rows="4" cols="50"><?php echo $adscode_120x600; ?></textarea>
				<br /><?php _e('Add Skyscraper {IMU 120x600} Code here','Ad_Coder'); ?></td>
			</tr>
		</table>
		<p class="submit">
			<input type="submit" name="Submit" value="<?php _e('Update Options'); ?> &raquo;" />
		</p>
	</form>
										
									</div>
								</div>
							</fieldset>
							<fieldset id="sm_rebuild" class="dbx-box">
								<div class="dbx-h-andle-wrapper">
									<h3 class="dbx-handle"><?php _e('Supported tag list','Ad_Coder'); ?></h3>
								</div>
								<div class="dbx-c-ontent-wrapper">
									<div class="dbx-content">
									<ul>
									    <li>{IMU_468_60}<br /> <?php _e('IMU Full Banner with dimension 468 x 60 px','Ad_Coder'); ?></li>
									    <li>{IMU_234_60}<br /> <?php _e('IMU Half Banner with dDimension 234 x 60 px','Ad_Coder'); ?></li>
									    <li>{IMU_88_31}<br /> <?php _e('IMU Micro Bar with dimension 88 x 31 px','Ad_Coder'); ?></li>
									    <li>{IMU_120_90}<br /> <?php _e('IMU Button 1 with dimension 120 x 90 px','Ad_Coder'); ?></li>
									    <li>{IMU_120_60}<br /> <?php _e('IMU Button 2 with dimension 120 x 60 px','Ad_Coder'); ?></li>
									    <li>{IMU_120_240}<br /> <?php _e('IMU Vertical Banner with dimension 120 x 240 px','Ad_Coder'); ?></li>
									    <li>{IMU_125_125}<br /> <?php _e('IMU Square Button with dimension 125 x 125 px','Ad_Coder'); ?></li>
									    <li>{IMU_728_90}<br /> <?php _e('IMU Leaderboard with dimension 728 x 90 px','Ad_Coder'); ?></li>
									    <li>{IMU_160_600}<br /> <?php _e('IMU Wide Skyscraper with dimension 160 x 600 px','Ad_Coder'); ?></li>
									    <li>{IMU_120_600}<br /> <?php _e('IMU Sykscraber with dimension 120 x 600 px','Ad_Coder'); ?></li>
									</ul>
									
									</div>
								</div>
							</fieldset>
						</div>
					</div>
	</div>
								
	</div>
    <?
}
add_action('admin_menu', 'adservercoder_admin_menu');
add_filter('the_content', 'adservercoder_v1');

?>
