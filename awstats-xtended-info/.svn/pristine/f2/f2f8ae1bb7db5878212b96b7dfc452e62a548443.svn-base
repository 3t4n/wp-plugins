<?php
/*
Plugin Name: AWStats Xtented Info
Plugin URI: http://www.michael-gerard.com/creations/wp-awstats-x
Description: WordPress AWStats Extended Info automatically includes the AWStats misc. statistics tracker on each page. Requires <a href="http://awstats.sourceforge.net/">AWStats</a> developed by Laurent Destailleur, Forrest R. Stevens, Igor Artamonov, and Yanick Champoux.
Version: 2.1b r005
Author: Michael Gerard
Author URI: http://www.michael-gerard.com
Tags: awstats, statistics, WordPress+Plugins, blogging 
*/

/*
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
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/*
	CHANGE LOG
	2.1b r005 (05 APR 2007)
	- BUG FIX - Forgot to change the path in the 'js/awstats_misc_tracker.js' file to... Good catch, and much thanks to Dave, Dominique Stender, and GreyDuck.

	2.1b r004 (31 MAR 2007)
	- BUG FIX - Seems to work better on post pages and static pages if you use the full url rather than the relative url. Duh.

	2.1b r003 (16 MAR 2007)
	- BUG FIX - I broke the link to the script on either r001 or r002. Didn't notice it until now... But hey, problem solved.
	- BUG FIX - Script is now inserted on all pages by default.

	2.1b r002 (25 FEB 2007)
	- FEATURE - Added Version Checking
	- BUG FIX - Updated all links to new AWStats X dedicated page at Tossed Salad

	2.1b r001 (24 FEB 2007)
	- FEATURE - Added Options Page Subpanel "AWStats X"
	- FEATURE - User can select pages to load AWStats Extended script on (is_home,is_single,is_page,is_archive,is_search,is_404)
	
	2.0.2b r120 (27 APR 2006)
	- Cleaned and commented existing code.
	
*/


// DECLARE VARIABLES //

// VERSION
$awext_ver = "2.1b r005";
// VERSION CHECK
$awext_localversion = "21005";

// URL
$awext_url = "wp-awstats-x/wp_awstats_x.php";

// FUNCTION TO LOAD AWSTATS MISC TRACKER
function awext_ext() {
	
	// LOAD GLOBALS
	global $awext_ver;
	global $awext_url;
	
	// ADD SCRIPT TO WP FOOTER
	if(
		(is_home()) && get_option('awext_ishome') == true || 
		(is_single()) && get_option('awext_issingle') == true ||
		(is_page()) && get_option('awext_ispage') == true ||
		(is_archive()) && get_option('awext_isarchive') == true ||
		(is_search()) && get_option('awext_issearch') == true ||
		(is_404()) && get_option('awext_is404') == true 
	){
		echo '
		<!-- ADDED BY WP AWSTATS EXTENDED PLUGIN VERSION '.$awext_ver.' -->
		<script type="text/javascript" src="'.get_bloginfo("wpurl").'/wp-content/plugins/wp-awstats-x/js/awstats_misc_tracker.js"></script>
		<noscript><img src="'.get_bloginfo("wpurl").'/wp-content/plugins/wp-awstats-x/js/awstats_misc_tracker.js?nojs=y" alt="awstats" height=0 width=0 border=0 style="display: none;" /></noscript>
		<!-- END WP AWSTATS EXTENDED PLUGIN VERSION '.$awext_ver.' -->
		';
	}else{
		echo '
		<!-- AWSTATS XTENDED PLUGIN VERSION '.$awext_ver.' DISABLED ON THIS PAGE -->
		<!-- To change this behavior please visit the AWStats X Options page in your Wordpress Admin -->
		<!-- END AWSTATS XTENDED PLUGIN VERSION '.$awext_ver.' -->
		';
	}
	
}

// INSTALLER CLASS (HANDLES INSTALL/UNINSTALL)
class awext_installer {

	// INSTALL //
	function activate() {
		add_option('awext_ishome', '1', 'Add AWStats script to Main (Home) page');
		add_option('awext_issingle', '1', 'Add AWStats script to Post pages');
		add_option('awext_ispage', '1', 'Add AWStats script to Static pages');
		add_option('awext_isarchive', '1', 'Add AWStats script to Archive pages');
		add_option('awext_issearch', '1', 'Add AWStats script to Search pages');
		add_option('awext_is404', '1', 'Add AWStats script to Error (404) page');
	}

	/*
	function activate() {
		if (!get_option('cqs_options'))
			add_option('cqs_options', array(), 'The Custom Query String plugin settings.', 'no');
		return true;
	}
	*/

	// UNINSTALL //
	function deactivate() {
		delete_option('awext_ishome');
		delete_option('awext_issingle');
		delete_option('awext_ispage');
		delete_option('awext_isarchive');
		delete_option('awext_issearch');
		delete_option('awext_is404');
		return true;
	}
	
}


// ADMINISTRATION PANEL
function awext_options_subpanel() {

	// GET and COMPARE RENMOTE VERSION
	function awext_remote_vcheck() {
		
		include_once(ABSPATH . WPINC . '/class-snoopy.php');
		$awext_remoteversion = 'http://www.michael-gerard.com/wp-content/downloads/wp-awstats-x/vcheck/wp-awstats-x-version.txt';
	
		global $awext_localversion;
	
		if (class_exists(snoopy)) {
			$client = new Snoopy();
			$client->_fp_timeout = 4;
			if (@$client->fetch($awext_remoteversion) === false) {
				return -1;
			}
			$remote = $client->results;
			if (!$remote || strlen($remote) > 8 ) {
				return -1;
			} 
			if (intval($remote) > intval($awext_localversion)) {
				return 1;
			} else {
				return 0;
			}
		}
		
	}

	// LOAD GLOBALS
	global $awext_ver;

	// IS FORM BEING SUBMITTED
	if (isset($_POST['submitted'])) {

		// Get form data
		$awext_ishome = $_POST['awext_ishome'];
		$awext_issingle = $_POST['awext_issingle'];
		$awext_ispage = $_POST['awext_ispage'];
		$awext_isarchive = $_POST['awext_isarchive'];
		$awext_issearch = $_POST['awext_issearch'];
		$awext_is404 = $_POST['awext_is404'];

		// Update Options
		update_option('awext_ishome', $awext_ishome);
		update_option('awext_issingle', $awext_issingle);
		update_option('awext_ispage', $awext_ispage);
		update_option('awext_isarchive', $awext_isarchive);
		update_option('awext_issearch', $awext_issearch);
		update_option('awext_is404', $awext_is404);
		?> 

		<!-- Echo Options Updated -->
		<div id="message" class="updated fade"><p><b>AWStats Xtended options updated!</b></p></div> 

<?php } ?>

	<div class="wrap">
		<h2>AWStats Xtended Info</h2>
		<p><b>Version:</b> <?php echo $awext_ver; ?>
		<!-- Version Check -->
		<?php if(awext_remote_vcheck() == 0){ ?>
			<span style="color:green;">You have the most current version of AWStats X</span></p>
		<?php }elseif(awext_remote_vcheck() == 1){
			if (class_exists(snoopy)) {
				$awext_remote_v_nice =  'http://www.michael-gerard.com/wp-content/downloads/wp-awstats-x/vcheck/wp-awstats-x-vnice.txt';
				$client = new Snoopy();
				$client->_fp_timeout = 4;
				if (@$client->fetch($awext_remote_v_nice) === false) {
					break;
				}else{
				$remote = $client->results;
					$awext_new_version = $remote;
				}
			} ?>
			<b><span style="color:red;">There is a new version (<?php echo $awext_new_version; ?>) of AWStats X available. <a href="http://www.michael-gerard.com/wp-content/downloads/wp-awstats-x/wp-awstats-x.zip">Download Now</a></span></b></p>
		<?php }else{ ?>
			<span style="color:red;">Version checking unavailable. Please visit <a href="http://www.michael-gerard.com/creations/wp-awstats-x/">Tossed Salad</a> to check for available updates.</span></p>
		<?php } ?>	
		<!--<p><b>Remote Version:</b> <?php echo awext_remote_vcheck(); ?></p>-->
			<form method="post" name="options" target="_self">
			<b>Select pages to include AWStats tracking script</b>
				<table>
					<tr>
						<td width="3%"><input name="awext_ishome" type="checkbox" <?php checked(1,get_option('awext_ishome')) ?> value="1" /></td>
						<td width="97%"><label for="awext_ishome">Main Page (is_home)</label></td>
					</tr>
					<tr>
						<td width="3%"><input name="awext_issingle" type="checkbox" <?php checked(1,get_option('awext_issingle')) ?> value="1" /></td>
						<td width="97%"><label for="awext_issingle">Post Pages (is_single)</label></td>
					</tr>
					<tr>
						<td width="3%"><input name="awext_ispage" type="checkbox" <?php checked(1,get_option('awext_ispage')) ?> value="1" /></td>
						<td width="97%"><label for="awext_ispage">Static Pages (is_page)</label></td>
					</tr>
					<tr>
						<td width="3%"><input name="awext_isarchive" type="checkbox" <?php checked(1,get_option('awext_isarchive')) ?> value="1" /></td>
						<td width="97%"><label for="awext_isarchive">Archive Pages (is_archive)</label></td>
					</tr>
					<tr>
						<td width="3%"><input name="awext_issearch" type="checkbox" <?php checked(1,get_option('awext_issearch')) ?> value="1" /></td>
						<td width="97%"><label for="awext_issearch">Search Pages (is_search)</label></td>
					</tr>
					<tr>
						<td width="3%"><input name="awext_is404" type="checkbox" <?php checked(1,get_option('awext_is404')) ?> value="1" /></td>
						<td width="97%"><label for="awext_is404">404 (Error) Page (is_404)</label></td>
					</tr>
				</table>		
			<p class="submit">
				<input name="submitted" type="hidden" value="yes" />
				<input type="submit" name="update_awext" value="Update Options" />
			</p>
			</form>
		<p><i>For updates and support, please visit <a href="http://www.michael-gerard.com/creations/wp-awstats-x/">Tossed Salad</a>.</i></p>
	</div>

<?php }

// VERSION CHECK



// INSERT OPTIONS PAGE SUBPANREL
function awext_add_options_page(){
	add_options_page('AWStats Xtended Info', 'AWStats X', 10, __FILE__, 'awext_options_subpanel'); 	
}



// ACTIONS
add_action('admin_menu', 'awext_add_options_page');
add_action('activate_'.$awext_url, array('awext_installer','activate'));
add_action('deactivate_'.$awext_url, array('awext_installer','deactivate'));
add_action('wp_footer','awext_ext');

?>