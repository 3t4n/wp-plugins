<?php

/*
	Plugin Name: Amazon UK Banner by iWebX
	Version: 1.3
	Description: This simple plugin adds an auto-updating Amazon UK banner underneath the content of every post. <br />The banner automatically updates from Amazon for latest promotions and offers.<br />>> STEP (1) Get your Amazon UK Affiliate ID <br /> >>STEP (2) Enter your ID and choose banner size on the settings page. <br /> >>STEP (3) Sit back and enjoy the extra money roll in. More info can be found: http://iwebx.info/amazon-uk-banner-plugin/
	Plugin URI: http://iwebx.info/amazon-uk-banner-plugin/
	Author: iWebX
	Author URI: http://iwebx.info/wp-plugins/
*/

#### Global Values
if (!defined('AUBPLUGIN_THEME_DIR'))
    define('AUBPLUGIN_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template());

if (!defined('AUBPLUGIN_PLUGIN_NAME'))
    define('AUBPLUGIN_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));

if (!defined('AUBPLUGIN_PLUGIN_DIR'))
    define('AUBPLUGIN_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . AUBPLUGIN_PLUGIN_NAME);

if (!defined('AUBPLUGIN_PLUGIN_URL'))
    define('AUBPLUGIN_PLUGIN_URL', WP_PLUGIN_URL . '/' . AUBPLUGIN_PLUGIN_NAME);

##### Add plugin admin page
add_action('admin_menu', 'aubplugin_menu_pages');

function aubplugin_menu_pages() {
    // Add the top-level admin menu
    $page_title = 'Amazon UK Banner by iWebX';
    $menu_title = 'Amazon UK Banner';
    $capability = 'manage_options';
    $menu_slug = 'aubplugin-settings';
    $function = 'aubplugin_settings';
    add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function);

    // Add submenu page with same slug as parent to ensure no duplicates
    $sub_menu_title = 'Banner Settings';
    add_submenu_page($menu_slug, $page_title, $sub_menu_title, $capability, $menu_slug, $function);

    // Now add the submenu page for Help
    $submenu_page_title = 'Amazon UK Banner by iWebX Plugin Donations';
    $submenu_title = 'Donate';
    $submenu_slug = 'aubplugin-donate';
    $submenu_function = 'aubplugin_donate';
    add_submenu_page($menu_slug, $submenu_page_title, $submenu_title, $capability, $submenu_slug, $submenu_function);
}

function aubplugin_settings() {
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }

    // Render the HTML for the Settings page or include a file that does
	#grab AMAZON ID variable from POST
	if ($_POST['aub_var_amazonid'] == NULL) {
	
	}
	else {
	$aub_amazon_id = $_POST['aub_var_amazonid'];
	update_option( 'aub_amazon_id', $aub_amazon_id );
	print "<p>Database set to input</p>";
	}
	#grab AMAZON ID variable from database if available or create one
	if (get_option('aub_amazon_id') == NULL) {
	update_option( 'aub_amazon_id', 'xxxxxxxxxxxxxxxxxxx-21' );
	print "<p>Database set AMAZON ID to default</p>";
	}
	
	#grab BANNER SIZE variable from post
	if ($_POST['aub_var_bannersize'] == NULL) {
	
	}
	else {
	$aub_bannersize = $_POST['aub_var_bannersize'];
	update_option( 'aub_bannersize', $aub_bannersize );
	print "<p>Database set BANNER SIZE to $aub_bannersize.</p>";
	}
	
	#grab FLOAT OP variable from post
	if ($_POST['aub_var_floatopt'] == NULL) {
	
	}
	else {
	$aub_floatopt = $_POST['aub_var_floatopt'];
	update_option( 'aub_floatopt', $aub_floatopt );
	print "<p>Database set Float Option to $aub_floatopt.</p>";
	}
	
	#change BANNER SIZE variable if not set
	if ($_POST['aub_var_bannersize'] == 'not-set') {
	update_option( 'aub_bannersize', '300x250' );
	print "<p>Database set BANNER SIZE to default (300x250), as no banner size was selected when saved.</p>";
	}
	else {

	}
	
	#change FLOAT OPT variable if not set
	if ($_POST['aub_var_floatopt'] == 'not-set') {
	update_option( 'aub_floatopt', 'left' );
	print "<p>Database set Float Option to default (left), as no float option was selected when saved.</p>";
	}
	else {

	}
	
	#grab BANNER SIZE variable from database if available or create one
	if (get_option('aub_bannersize') == NULL) {
	update_option( 'aub_bannersize', '300x250' );
	print "<p>Database set BANNER SIZE to default (300x250), as NULL value was found.</p>";
	}

	#grab Float Opt variable from database if available or create one
	if (get_option('aub_floatopt') == NULL) {
	update_option( 'aub_floatopt', 'left' );
	print "<p>Database set float opt to default (left), as NULL value was found.</p>";
	}


	
	
	$aub_db_amazon_id = get_option('aub_amazon_id');
	$aub_db_bannersize = get_option('aub_bannersize');

	#grab variables from database
	$final_aub_db_amazon_id = get_option('aub_amazon_id');
	$final_aub_db_bannersize = get_option('aub_bannersize');
	$final_aub_db_floatopt = get_option('aub_floatopt');
	
	#display settings page
	$aub_acp = AUBPLUGIN_PLUGIN_URL . '/plugin-acp';
	print "	
	<table width=\"100%\" border=\"0\">
		<tr>
			<td width=\"50%\"><iframe width=\"100%\" height=\"250\" scrolling=\"no\" src=\"$aub_acp/iwebx_plugins.htm\"></iframe>
			</td>
			<td width=\"50%\"><iframe width=\"100%\" height=\"250\" scrolling=\"no\" src=\"$aub_acp/like_plugins.htm\"></iframe>
			</td>
		</tr>
		<tr width=\"100%\">
			<td bgcolor=\"darkred\">
				<center>
				<h1><font color=\"white\">Settings</font></h1>
				<h2><font color=\"yellow\">Please select banner size and float option each time you click save!</font></h2>
				<form method=\"post\" action=\"../../../wp-admin/admin.php?page=aubplugin-settings\">
					<font color=\"white\">Amazon UK ID: </font><input type=\"text\" name=\"aub_var_amazonid\" value=\"$aub_db_amazon_id\">
				<select name=\"aub_var_bannersize\" value=\"$aub_db_bannersize\">
					<option value=\"not-set\">Reset to Default Banner Size</option>
					<option value=\"300x250\">(300x250) Centered Below Content</option>
					<option value=\"468x60\">(468x60) Centered Below Content</option>
					<option value=\"728x90\">(728x90) Centered Below Content</option>
					<option value=\"160x600\">(160x600) Floated Left/Right of Content</option>
					<option value=\"120x600\">(120x600) Floated Left/Right of Content</option>
					<option value=\"300x250f\">(300x250) Floated Left/Right of Content</option>
				</select>
				<select name=\"aub_var_floatopt\" value=\"$aub_db_floatopt\">
					<option value=\"not-set\">Reset to Default Float Option</option>
					<option value=\"left\">Float Left</option>
					<option value=\"right\">Float Right</option>
				</select>
				<input type=\"submit\" value=\"Save Settings\">
				</form>
				<center>
			</td>
			<td>&nbsp;
			</td>
		</tr>
		<tr width=\"100%\">
			<td bgcolor=\"darkgreen\"><center><h1><font color=\"white\">Current data stored in database</font></h1><br />
			<font color=\"white\">
			Amazon ID: '$final_aub_db_amazon_id'<br />
			Banner size: '$final_aub_db_bannersize'<br />
			Float Option: '$final_aub_db_floatopt'
			</font>
			<center>
			</td>
			<td>&nbsp;
			</td>
		</tr>
	</table>
	</table>";

}

function aubplugin_donate() {
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }

    // Render the HTML for the Help page or include a file that does
	$aub_acp = AUBPLUGIN_PLUGIN_URL . '/plugin-acp';
	print "Amazon UK Banner by iWebX Donations Page<br /><iframe width=\"100%\" height=\"250\" scrolling=\"no\" src=\"$aub_acp/like_plugins.htm\">";
}

#adding settings link
add_filter('plugin_action_links', 'aub_plugin_action_links', 10, 2);

function aub_plugin_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=aubplugin-settings">Settings</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}

#functions
function easyamazonbanner468x60($content1) {

	if (!is_page()&&!is_feed()) {
		$final_aub_db_amazon_id = get_option('aub_amazon_id');
		$final_aub_db_bannersize = get_option('aub_bannersize');
		$content1 .= '<center><br /><iframe src="http://rcm-uk.amazon.co.uk/e/cm?t='.$final_aub_db_amazon_id.'&o=2&p=26&l=ez&f=ifr&f=ifr" width="468" height="60" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe></center>';
		return $content1;

	}

	else {
		$final_aub_db_amazon_id = get_option('aub_amazon_id');
		$final_aub_db_bannersize = get_option('aub_bannersize');
		$content1 .= '<center><br /><iframe src="http://rcm-uk.amazon.co.uk/e/cm?t='.$final_aub_db_amazon_id.'&o=2&p=26&l=ez&f=ifr&f=ifr" width="468" height="60" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe></center>';
		return $content1;

	}

}



function easyamazonbanner300x250($content2) {

	if (!is_page()&&!is_feed()) {
		$final_aub_db_amazon_id = get_option('aub_amazon_id');
		$final_aub_db_bannersize = get_option('aub_bannersize');
		$content2 .= '<center><br /><iframe src="http://rcm-uk.amazon.co.uk/e/cm?t='.$final_aub_db_amazon_id.'&o=2&p=12&l=ez&f=ifr&f=ifr" width="300" height="250" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe></center>';
		return $content2;

	}

	else {
		$final_aub_db_amazon_id = get_option('aub_amazon_id');
		$final_aub_db_bannersize = get_option('aub_bannersize');
		$content2 .= '<center><br /><iframe src="http://rcm-uk.amazon.co.uk/e/cm?t='.$final_aub_db_amazon_id.'&o=2&p=12&l=ez&f=ifr&f=ifr" width="300" height="250" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe></center>';
		return $content2;

	}

}

function easyamazonbanner160x600($content3) {

	if (!is_page()&&!is_feed()) {
		$final_aub_db_amazon_id = get_option('aub_amazon_id');
		$final_aub_db_bannersize = get_option('aub_bannersize');
		$final_aub_db_floatopt = get_option('aub_floatopt');
		if ($final_aub_db_floatopt == 'right') {
		$aub_floatmargin = '0px 0px 0px 10px';
		}
		else {
		$aub_floatmargin = '0px 10px 0px 0px';
		}
		echo '<div style="float:'.$final_aub_db_floatopt.'; margin: '.$aub_floatmargin.';"><iframe src="http://rcm-uk.amazon.co.uk/e/cm?t='.$final_aub_db_amazon_id.'&o=2&p=14&l=ez&f=ifr&f=ifr" width="160" height="600" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe></div>';
		$content3 .= '';
		return $content3;

	}

	else {
		$final_aub_db_amazon_id = get_option('aub_amazon_id');
		$final_aub_db_bannersize = get_option('aub_bannersize');
		$final_aub_db_floatopt = get_option('aub_floatopt');
		if ($final_aub_db_floatopt == 'right') {
		$aub_floatmargin = '0px 0px 0px 10px';
		}
		else {
		$aub_floatmargin = '0px 10px 0px 0px';
		}
		echo '<div style="float:'.$final_aub_db_floatopt.'; margin: '.$aub_floatmargin.';"><iframe src="http://rcm-uk.amazon.co.uk/e/cm?t='.$final_aub_db_amazon_id.'&o=2&p=14&l=ez&f=ifr&f=ifr" width="160" height="600" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe></div>';
		$content3 .= '';
		return $content3;

	}

}

function easyamazonbanner120x600($content4) {

	if (!is_page()&&!is_feed()) {
		$final_aub_db_amazon_id = get_option('aub_amazon_id');
		$final_aub_db_bannersize = get_option('aub_bannersize');
		$final_aub_db_floatopt = get_option('aub_floatopt');
		if ($final_aub_db_floatopt == 'right') {
		$aub_floatmargin = '0px 0px 0px 10px';
		}
		else {
		$aub_floatmargin = '0px 10px 0px 0px';
		}
		echo '<div style="float:'.$final_aub_db_floatopt.'; margin: '.$aub_floatmargin.';"><iframe src="http://rcm-uk.amazon.co.uk/e/cm?t='.$final_aub_db_amazon_id.'&o=2&p=29&l=ez&f=ifr&f=ifr" width="120" height="600" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe></div>';
		$content4 .= '';
		return $content4;

	}

	else {
		$final_aub_db_amazon_id = get_option('aub_amazon_id');
		$final_aub_db_bannersize = get_option('aub_bannersize');
		$final_aub_db_floatopt = get_option('aub_floatopt');
		if ($final_aub_db_floatopt == 'right') {
		$aub_floatmargin = '0px 0px 0px 10px';
		}
		else {
		$aub_floatmargin = '0px 10px 0px 0px';
		}
		echo '<div style="float:'.$final_aub_db_floatopt.'; margin: '.$aub_floatmargin.';"><iframe src="http://rcm-uk.amazon.co.uk/e/cm?t='.$final_aub_db_amazon_id.'&o=2&p=29&l=ez&f=ifr&f=ifr" width="120" height="600" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe></div>';
		$content4 .= '';
		return $content4;

	}

}

function easyamazonbanner728x90($content5) {

	if (!is_page()&&!is_feed()) {
		$final_aub_db_amazon_id = get_option('aub_amazon_id');
		$final_aub_db_bannersize = get_option('aub_bannersize');
		$content5 .= '<center><iframe src="http://rcm-uk.amazon.co.uk/e/cm?t='.$final_aub_db_amazon_id.'&o=2&p=48&l=ez&f=ifr&f=ifr" width="728" height="90" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe></center>';
		return $content5;

	}

	else {
		$final_aub_db_amazon_id = get_option('aub_amazon_id');
		$final_aub_db_bannersize = get_option('aub_bannersize');
		$content2 .= '<center><iframe src="http://rcm-uk.amazon.co.uk/e/cm?t='.$final_aub_db_amazon_id.'&o=2&p=48&l=ez&f=ifr&f=ifr" width="728" height="90" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe></center>';
		return $content2;

	}

}

function easyamazonbanner300x250f($content6) {

	if (!is_page()&&!is_feed()) {
		$final_aub_db_amazon_id = get_option('aub_amazon_id');
		$final_aub_db_bannersize = get_option('aub_bannersize');
		$final_aub_db_floatopt = get_option('aub_floatopt');
		if ($final_aub_db_floatopt == 'right') {
		$aub_floatmargin = '0px 0px 0px 10px';
		}
		else {
		$aub_floatmargin = '0px 10px 0px 0px';
		}
		echo '<div style="float:'.$final_aub_db_floatopt.'; margin: '.$aub_floatmargin.';"><iframe src="http://rcm-uk.amazon.co.uk/e/cm?t='.$final_aub_db_amazon_id.'&o=2&p=12&l=ez&f=ifr&f=ifr" width="300" height="250" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe></div>';
		$content6 .= '';
		return $content6;

	}

	else {
		$final_aub_db_amazon_id = get_option('aub_amazon_id');
		$final_aub_db_bannersize = get_option('aub_bannersize');
		$final_aub_db_floatopt = get_option('aub_floatopt');
		if ($final_aub_db_floatopt == 'right') {
		$aub_floatmargin = '0px 0px 0px 10px';
		}
		else {
		$aub_floatmargin = '0px 10px 0px 0px';
		}
		echo '<div style="float:'.$final_aub_db_floatopt.'; margin: '.$aub_floatmargin.';"><iframe src="http://rcm-uk.amazon.co.uk/e/cm?t='.$final_aub_db_amazon_id.'&o=2&p=12&l=ez&f=ifr&f=ifr" width="300" height="250" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe></div>';
		$content6 .= '';
		return $content6;

	}

}

#filters
function iwebx_aub_query1($query) {
	if ( !is_front_page() ) {
		return add_filter('the_content', 'easyamazonbanner468x60', 1);
    }
	else {
		return;
	}

}

function iwebx_aub_query2($query) {
	if ( !is_front_page() ) {
		return add_filter('the_content', 'easyamazonbanner300x250', 1);
    }
	else {
		return;
	}

}

function iwebx_aub_query3($query) {
	if ( !is_front_page() ) {
		return add_filter('the_content', 'easyamazonbanner160x600', 1);
    }
	else {
		return;
	}

}

function iwebx_aub_query4($query) {
	if ( !is_front_page() ) {
		return add_filter('the_content', 'easyamazonbanner120x600', 1);
    }
	else {
		return;
	}

}

function iwebx_aub_query5($query) {
	if ( !is_front_page() ) {
		return add_filter('the_content', 'easyamazonbanner728x90', 1);
    }
	else {
		return;
	}

}

function iwebx_aub_query6($query) {
	if ( !is_front_page() ) {
		return add_filter('the_content', 'easyamazonbanner300x250f', 1);
    }
	else {
		return;
	}

}

$aub_banner = get_option('aub_bannersize');
	
#filter if aub_bannersize = 468x60
if ($aub_banner == '468x60') {
add_filter( 'pre_get_posts', 'iwebx_aub_query1' );
}

#filter if aub_bannersize = 300x250
if ($aub_banner == '300x250') {
add_filter( 'pre_get_posts', 'iwebx_aub_query2' );
}

#filter if aub_bannersize = 160x600
if ($aub_banner == '160x600') {
add_filter( 'pre_get_posts', 'iwebx_aub_query3' );
}

#filter if aub_bannersize = 120x600
if ($aub_banner == '120x600') {
add_filter( 'pre_get_posts', 'iwebx_aub_query4' );
}

#filter if aub_bannersize = 728x90
if ($aub_banner == '728x90') {
add_filter( 'pre_get_posts', 'iwebx_aub_query5' );
}

#filter if aub_bannersize = 300x250f
if ($aub_banner == '300x250f') {
add_filter( 'pre_get_posts', 'iwebx_aub_query6' );
}

?>