<?php
/*
Plugin Name: deal or announcement with countdown timer
Plugin URI: http://www.gopiplus.com/work/2010/07/18/deal-or-announcement-with-countdown-timer/
Description: This plugin will display your announcement with countdown timer.
Author: Gopi Ramasamy
Version: 10.3
Author URI: http://www.gopiplus.com/work/2010/07/18/deal-or-announcement-with-countdown-timer/
Donate link: http://www.gopiplus.com/work/2010/07/18/deal-or-announcement-with-countdown-timer/
Text Domain: deal-or-announcement-with-countdown-timer
Domain Path: /languages
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

global $wpdb, $wp_version;
define("WP_G_Countdown_TABLE", $wpdb->prefix . "gCountdown");
define('WP_deal_FAV', 'http://www.gopiplus.com/work/2010/07/18/deal-or-announcement-with-countdown-timer/');

if ( ! defined( 'WP_deal_PLUGIN_BASENAME' ) )
	define( 'WP_deal_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

if ( ! defined( 'WP_deal_PLUGIN_NAME' ) )
	define( 'WP_deal_PLUGIN_NAME', trim( dirname( WP_deal_PLUGIN_BASENAME ), '/' ) );

if ( ! defined( 'WP_deal_PLUGIN_DIR' ) )
	define( 'WP_deal_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . WP_deal_PLUGIN_NAME );

if ( ! defined( 'WP_deal_PLUGIN_URL' ) )
	define( 'WP_deal_PLUGIN_URL', plugins_url() . '/' . WP_deal_PLUGIN_NAME );
	
if ( ! defined( 'WP_deal_ADMIN_URL' ) )
	define( 'WP_deal_ADMIN_URL', admin_url() . 'options-general.php?page=deal-with-countdown' );

function deal() 
{
	deal_or_announcement_with_countdown_timer_show();
}

function deal_or_announcement_with_countdown_timer_show() 
{
	//[deal-or-announcement id=""]
	$deal = "";
	global $wpdb;
	$data = $wpdb->get_results("select * from ".WP_G_Countdown_TABLE." where gCountdisplay='YES' ORDER BY gCountid DESC LIMIT 0 , 1");
	if ( ! empty($data) ) 
	{
		$data = $data[0];
		if ( !empty($data)) $gCountid = $data->gCountid;
		if ( !empty($data)) $gCount = stripslashes($data->gCount); 
		if ( !empty($data)) $gCountmonth = $data->gCountmonth;
		if ( !empty($data)) $gCountdate = $data->gCountdate;
		if ( !empty($data)) $gCountyear = $data->gCountyear;
		if ( !empty($data)) $gCounthour = $data->gCounthour;
		if ( !empty($data)) $gCountzoon = $data->gCountzoon;
		if ( !empty($data)) $gCountdisplay = $data->gCountdisplay;
		
		$displayformats  = "<div>";
		$displayformats  = $displayformats . "<span style='width:50px;display:inline-block;'>%%D%%</span>";
		$displayformats  = $displayformats . "<span style='width:50px;display:inline-block;'>%%H%%</span>";
		$displayformats  = $displayformats . "<span style='width:50px;display:inline-block;'>%%M%%</span>";
		$displayformats  = $displayformats . "<span style='width:50px;display:inline-block;'>%%S%%</span>";
		$displayformats  = $displayformats . "</div>";
		$displayformats  = $displayformats . "<div>";
		$displayformats  = $displayformats . "<span style='width:50px;display:inline-block;'>Day</span>";
		$displayformats  = $displayformats . "<span style='width:50px;display:inline-block;'>Hrs</span>";
		$displayformats  = $displayformats . "<span style='width:50px;display:inline-block;'>Min</span>";
		$displayformats  = $displayformats . "<span style='width:50px;display:inline-block;'>Sec</span>";
		$displayformats  = $displayformats . "</div>";
		
		$deal .= '<script language="JavaScript">';
        $deal .= 'TargetDate = "'.$gCountmonth . '/' . $gCountdate . '/' . $gCountyear . ' ' . $gCounthour . ':00 ' . $gCountzoon . '";';
        $deal .= 'BackColor = "";';
        $deal .= 'ForeColor = "' . get_option('deal_or_announcement_with_countdown_timer_timer_color') . '";';
        $deal .= 'CountActive = true;';
        $deal .= 'CountStepper = -1;';
        $deal .= 'LeadingZero = true;';
		$deal .= 'DisplayFormat = "' . $displayformats . '";';
        $deal .= 'FinishMessage = "<div style=\'padding:5px 0px 5px 0px;\' class=\'over\' align=\'center\'>Time Out!</div>";';
        $deal .= '</script>';
       
	    $deal .= '<div style="padding:5px 0px 0px 0px;color:' . get_option('deal_or_announcement_with_countdown_timer_text_color') . '" align="' . get_option('deal_or_announcement_with_countdown_timer_text_align') . '">'; 
			$deal .= $gCount;
		$deal .= '</div>';
        
		if(get_option('deal_or_announcement_with_countdown_timer_caption') <> "") {
        	$deal .= '<div align="' . get_option('deal_or_announcement_with_countdown_timer_timer_align') . '" style="padding:10px 0px 3px 0px;color:' . get_option('deal_or_announcement_with_countdown_timer_timer_color') .'">';
				$deal .= get_option('deal_or_announcement_with_countdown_timer_caption');
			$deal .= '</div>';
        }
		
        $deal .= '<div class="announcementtime" id="announcementtime" style="padding:0px 0px 10px 0px;" align="' . get_option('deal_or_announcement_with_countdown_timer_timer_align') . '">';
        $deal .= '<script language="JavaScript" src="' . WP_deal_PLUGIN_URL . '/gCountdown.js"></script>'; 
        $deal .= '</div>';
	}
	else
	{
		$deal = "<div style='padding:5px 0px 5px 0px;' class='over' align='center'>No data available in announcement!</div>";
	}
	return $deal;
}
function deal_or_announcement_with_countdown_timer_install() 
{
	global $wpdb;

	//set the messages
	if($wpdb->get_var("show tables like '". WP_G_Countdown_TABLE . "'") != WP_G_Countdown_TABLE) 
	{
		$wpdb->query("
			CREATE TABLE IF NOT EXISTS `". WP_G_Countdown_TABLE . "` (
			  `gCountid` int(11) NOT NULL auto_increment,
			  `gCount` text  NOT NULL,
			  `gCountmonth` int(11) NOT NULL default '0',
			  `gCountdate` int(11) NOT NULL default '0',
			  `gCountyear` int(11) NOT NULL default '0',
			  `gCounthour` int(11) NOT NULL default '0',
			  `gCountzoon` varchar(5) NOT NULL default '',
			  `gCountdisplay` varchar(5) NOT NULL default '',
  			  PRIMARY KEY  (`gCountid`) ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
			");
			
		$sSql = "INSERT INTO `". WP_G_Countdown_TABLE . "` (`gCount` , `gCountmonth` ,`gCountdate` ,`gCountyear` ,`gCounthour` ,`gCountzoon` ,`gCountdisplay`) VALUES ";
		$sSql = $sSql . "('This is simply dummy text for deal countdown plugin. Dummy countdown for Happy New Year!!', ";
		$sSql = $sSql . "'01', '01', '2023', '12', 'AM', 'YES');";
		$wpdb->query($sSql);
	}

	add_option('deal_or_announcement_with_countdown_timer_title', 'Announcement');
	add_option('deal_or_announcement_with_countdown_timer_timer_color', '#2D2D2D');
	add_option('deal_or_announcement_with_countdown_timer_timer_align', 'Center');
	add_option('deal_or_announcement_with_countdown_timer_text_color', '#2D2D2D');
	add_option('deal_or_announcement_with_countdown_timer_text_align', '');
	add_option('deal_or_announcement_with_countdown_timer_caption', 'Happy New Year 2023');
}

function deal_or_announcement_with_countdown_timer_widget($args) 
{
	extract($args);
	echo $before_widget . $before_title;
	echo get_option('deal_or_announcement_with_countdown_timer_title');
	echo $after_title;
	deal_or_announcement_with_countdown_timer_show();
	echo $after_widget;
}

function deal_or_announcement_with_countdown_timer_control() 
{
		$deal_or_announcement_with_countdown_timer_title = get_option('deal_or_announcement_with_countdown_timer_title');
		$deal_or_announcement_with_countdown_timer_timer_color = get_option('deal_or_announcement_with_countdown_timer_timer_color');
		$deal_or_announcement_with_countdown_timer_timer_align = get_option('deal_or_announcement_with_countdown_timer_timer_align');
		$deal_or_announcement_with_countdown_timer_text_color = get_option('deal_or_announcement_with_countdown_timer_text_color');
		$deal_or_announcement_with_countdown_timer_text_align = get_option('deal_or_announcement_with_countdown_timer_text_align');
		$deal_or_announcement_with_countdown_timer_caption = get_option('deal_or_announcement_with_countdown_timer_caption');
		
		if (@$_POST['deal_or_announcement_with_countdown_timer_submit']) 
		{
				$deal_or_announcement_with_countdown_timer_title = stripslashes($_POST['deal_or_announcement_with_countdown_timer_title']);
				$deal_or_announcement_with_countdown_timer_timer_color = stripslashes($_POST['deal_or_announcement_with_countdown_timer_timer_color']);
				$deal_or_announcement_with_countdown_timer_timer_align = stripslashes($_POST['deal_or_announcement_with_countdown_timer_timer_align']);
				$deal_or_announcement_with_countdown_timer_text_color = stripslashes($_POST['deal_or_announcement_with_countdown_timer_text_color']);
				$deal_or_announcement_with_countdown_timer_text_align = stripslashes($_POST['deal_or_announcement_with_countdown_timer_text_align']);
				$deal_or_announcement_with_countdown_timer_caption = stripslashes($_POST['deal_or_announcement_with_countdown_timer_caption']);
				
				update_option('deal_or_announcement_with_countdown_timer_title', $deal_or_announcement_with_countdown_timer_title );
				update_option('deal_or_announcement_with_countdown_timer_timer_color', $deal_or_announcement_with_countdown_timer_timer_color );
				update_option('deal_or_announcement_with_countdown_timer_timer_align', $deal_or_announcement_with_countdown_timer_timer_align );
				update_option('deal_or_announcement_with_countdown_timer_text_color', $deal_or_announcement_with_countdown_timer_text_color );
				update_option('deal_or_announcement_with_countdown_timer_text_align', $deal_or_announcement_with_countdown_timer_text_align );
				update_option('deal_or_announcement_with_countdown_timer_caption', $deal_or_announcement_with_countdown_timer_caption );
		}
		
		echo '<p>Sidebar title text:<br><input  style="width: 325px;" type="text" value="';
		echo $deal_or_announcement_with_countdown_timer_title . '" name="deal_or_announcement_with_countdown_timer_title" id="deal_or_announcement_with_countdown_timer_title" /></p>';
		
		echo '<p>Count down timer title text:<br><input  style="width: 325px;" type="text" value="';
		echo $deal_or_announcement_with_countdown_timer_caption . '" name="deal_or_announcement_with_countdown_timer_caption" id="deal_or_announcement_with_countdown_timer_caption" /></p>';

		echo '<p>Timer color:&nbsp;<input  style="width: 100px;" type="text" value="';
		echo $deal_or_announcement_with_countdown_timer_timer_color . '" name="deal_or_announcement_with_countdown_timer_timer_color" id="deal_or_announcement_with_countdown_timer_timer_color" />';
		
		echo '&nbsp;&nbsp;Text color:&nbsp;<input  style="width: 100px;" type="text" value="';
		echo $deal_or_announcement_with_countdown_timer_text_color . '" name="deal_or_announcement_with_countdown_timer_text_color" id="deal_or_announcement_with_countdown_timer_text_color" /></p>';

		echo '<p>Timer align:&nbsp;<input  style="width: 100px;" type="text" value="';
		echo $deal_or_announcement_with_countdown_timer_timer_align . '" name="deal_or_announcement_with_countdown_timer_timer_align" id="deal_or_announcement_with_countdown_timer_timer_align" />';
		
		echo '&nbsp;&nbsp;Text align:&nbsp;<input  style="width: 100px;" type="text" value="';
		echo $deal_or_announcement_with_countdown_timer_text_align . '" name="deal_or_announcement_with_countdown_timer_text_align" id="deal_or_announcement_with_countdown_timer_text_align" /></p>';

		echo 'Alignment : Left / Right / Center / Justify';
		
		echo '<br><br>';

		echo '<input type="hidden" id="deal_or_announcement_with_countdown_timer_submit" name="deal_or_announcement_with_countdown_timer_submit" value="1" />';
		
}

function widget_deal_or_announcement_with_countdown_timer_management() 
{
	global $wpdb;
	$current_page = isset($_GET['ac']) ? $_GET['ac'] : '';
	switch($current_page)
	{
		case 'edit':
			include('pages/content-management-edit.php');
			break;
		case 'add':
			include('pages/content-management-add.php');
			break;
		case 'set':
			include('pages/widget-setting.php');
			break;
		default:
			include('pages/content-management-show.php');
			break;
	}
}

function deal_or_announcement_with_countdown_timer_widget_init() 
{
	if(function_exists('wp_register_sidebar_widget')) 	
	{
		wp_register_sidebar_widget( 'deal-or-announcement-with-countdown-timer', 
				__('Deal with countdown', 'deal-or-announcement-with-countdown-timer'), 'deal_or_announcement_with_countdown_timer_widget');
	}
	
	if(function_exists('wp_register_widget_control')) 	
	{
		wp_register_widget_control( 'deal-or-announcement-with-countdown-timer', 
				array( __('Deal with countdown', 'deal-or-announcement-with-countdown-timer'), 'widgets'), 'deal_or_announcement_with_countdown_timer_control', 'width=400');
	} 
}

function deal_or_announcement_with_countdown_timer_deactivation() 
{
	// No action required
}

function deal_or_announcement_with_countdown_timer_add_to_menu() 
{
	add_options_page( __('Deal with countdown', 'deal-or-announcement-with-countdown-timer'), __('Deal with countdown', 'deal-or-announcement-with-countdown-timer'), 
				'manage_options', 'deal-with-countdown', 'widget_deal_or_announcement_with_countdown_timer_management' );
}

if (is_admin()) 
{
	add_action('admin_menu', 'deal_or_announcement_with_countdown_timer_add_to_menu');
}

function deal_or_announcement_with_countdown_timer_textdomain() 
{
	  load_plugin_textdomain( 'deal-or-announcement-with-countdown-timer', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

function deal_or_announcement_with_countdown_timer_adminscripts() 
{
	if( !empty( $_GET['page'] ) ) 
	{
		switch ( $_GET['page'] ) 
		{
			case 'deal-with-countdown':
				wp_register_script( 'deal_or_announcement-adminscripts', WP_deal_PLUGIN_URL . '/pages/gCountdownform.js', '', '', true );
				wp_enqueue_script( 'deal_or_announcement-adminscripts' );
				$deal_or_announcement_select_params = array(
					'gCount'  		=> __( 'Please enter the announcement text.', 'deal_or_announcement-select', 'deal-or-announcement-with-countdown-timer' ),
					'gCountdisplay' => __( 'Please select the display status.', 'deal_or_announcement-select', 'deal-or-announcement-with-countdown-timer' ),
					'gCountmonth'  	=> __( 'Please select the expiration month.', 'deal_or_announcement-select', 'deal-or-announcement-with-countdown-timer' ),
					'gCountdate'  	=> __( 'Please select the expiration date.', 'deal_or_announcement-select', 'deal-or-announcement-with-countdown-timer' ),
					'gCountyear'  	=> __( 'Please select the expiration year.', 'deal_or_announcement-select', 'deal-or-announcement-with-countdown-timer' ),
					'gCounthour'  	=> __( 'Please select the expiration time.', 'deal_or_announcement-select', 'deal-or-announcement-with-countdown-timer' ),
					'gCountzoon'  	=> __( 'Please select the expiration time zoon AM/PM.', 'deal_or_announcement-select', 'deal-or-announcement-with-countdown-timer' ),
					'gCountdelete'  => __( 'Do you want to delete this record?', 'deal_or_announcement-select', 'deal-or-announcement-with-countdown-timer' ),
				);
				wp_localize_script( 'deal_or_announcement-adminscripts', 'deal_or_announcement_adminscripts', $deal_or_announcement_select_params );
				break;
		}
	}
}

add_shortcode( 'deal-or-announcement', 'deal_or_announcement_with_countdown_timer_show' );
add_action('plugins_loaded', 'deal_or_announcement_with_countdown_timer_textdomain');
add_action("plugins_loaded", "deal_or_announcement_with_countdown_timer_widget_init");
register_activation_hook(__FILE__, 'deal_or_announcement_with_countdown_timer_install');
register_deactivation_hook(__FILE__, 'deal_or_announcement_with_countdown_timer_deactivation');
add_action('init', 'deal_or_announcement_with_countdown_timer_widget_init');
add_action('admin_enqueue_scripts', 'deal_or_announcement_with_countdown_timer_adminscripts');
?>