<?php

/*
Plugin Name: Announcement and vertical scroll news
Plugin URI: http://www.gopiplus.com/work/2010/07/18/announcement-and-vertical-scroll-news/
Description: This plug-in will create a vertical scroll news or Announcement or flash News for your word press site, we can embed this in site sidebar, Multi language support.
Author: Gopi.R
Version: 10
Author URI: http://www.gopiplus.com/
Donate link: http://www.gopiplus.com/work/2010/07/18/announcement-and-vertical-scroll-news/
*/

global $wpdb, $wp_version;
define("WP_G_ANNOUNCE_TABLE", $wpdb->prefix . "gAnnouncement");

function gAnnouncement()
{
	include_once("gAnnounce/gAnnounce.php");
}

function gAnnouncement_activation()
{
	global $wpdb;
	
	//set the table
	if($wpdb->get_var("show tables like '". WP_G_ANNOUNCE_TABLE . "'") != WP_G_ANNOUNCE_TABLE) 
	{
		$wpdb->query("
			CREATE TABLE IF NOT EXISTS `". WP_G_ANNOUNCE_TABLE . "` (
			  `gAnn_id` int(11) NOT NULL auto_increment,
			  `gAnn_text` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
			  `gAnn_order` int(11) NOT NULL default '0',
			  `gAnn_status` char(3) NOT NULL default 'No',
			  `gAnn_date` datetime NOT NULL default '0000-00-00 00:00:00',
			  `gAnn_expiration` DATE NOT NULL default '0000-00-00',
			  PRIMARY KEY  (`gAnn_id`) )
			");
		
		$sSql = "INSERT INTO `". WP_G_ANNOUNCE_TABLE . "` (`gAnn_text`,`gAnn_order`, `gAnn_status`, `gAnn_date`, `gAnn_expiration`)"; 
		$sSql = $sSql . "VALUES ('This is simply dummy announcement text.','1', 'Yes', '0000-00-00 00:00:00', '0000-00-00');";
		$wpdb->query($sSql);	
		$sSql = "INSERT INTO `". WP_G_ANNOUNCE_TABLE . "` (`gAnn_text`,`gAnn_order`, `gAnn_status`, `gAnn_date`, `gAnn_expiration`)"; 
		$sSql = $sSql . "VALUES ('This is simply dummy announcement text.','2', 'Yes', '0000-00-00 00:00:00', '0000-00-00');";
		$wpdb->query($sSql);	
			
	}
	add_option('gAnnounce_title', "Announcement");
	add_option('gAnnounce_font', 'verdana,arial,sans-serif');
	add_option('gAnnounce_fontsize', '11px');
	add_option('gAnnounce_fontweight', 'normal');
	add_option('gAnnounce_fontcolor', '#000000');
	add_option('gAnnounce_width', '180');
	add_option('gAnnounce_height', '100');
	add_option('gAnnounce_slidedirection', '0');
	add_option('gAnnounce_slidetimeout', '3000');
	add_option('gAnnounce_textalign', 'center');
	add_option('gAnnounce_textvalign', 'middle');
	add_option('gAnnounce_noannouncement ', 'No announcement available');
	add_option('gAnnounce_order', '0');
}

function gAnnouncement_admin_options() 
{
	?>
    <div class="wrap">
    <?php
    $title = __('Announcement or vertical scroll news or flash news');
    $mainurl = get_option('siteurl')."/wp-admin/options-general.php?page=announcement-and-vertical-scroll-news/announcement-and-vertical-scroll-news.php";
    ?>
    <h2><?php echo wp_specialchars( $title ); ?></h2>
    <?php
	global $wpdb;
    $AID=@$_GET["AID"];
    $AC=@$_GET["AC"];
    $rand=$_GET["rand"];
    $submittext = "Insert Announcement";
	if($AC <> "DEL" and trim($_POST['gAnn_text']) <>"") { include_once("gAnnounce/gAnnounceins.php"); }
    if($AC=="DEL" && $rand == "76mv1ojtlele176mv1ojtlele1" && $AID > 0) { include_once("gAnnounce/gAnnouncedel.php"); }
    if($AID<>"" and $AC <> "DEL")
    {
        //select query
        $data = $wpdb->get_results("select * from ".WP_G_ANNOUNCE_TABLE." where gAnn_id=$AID limit 1");
        //bad feedback
        if ( empty($data) ) 
        {
            echo "";
            return;
        }
        $data = $data[0];
        //encode strings
        if ( !empty($data) ) $gAnn_id_x = htmlspecialchars(stripslashes($data->gAnn_id)); 
        if ( !empty($data) ) $gAnn_text_x = htmlspecialchars(stripslashes($data->gAnn_text));
        if ( !empty($data) ) $gAnn_order_x = htmlspecialchars(stripslashes($data->gAnn_order));
        if ( !empty($data) ) $gAnn_status_x = htmlspecialchars(stripslashes($data->gAnn_status));
		if ( !empty($data) ) $gAnn_expiration_x = htmlspecialchars(stripslashes($data->gAnn_expiration));
        $submittext = "Update Announcement";
    }
    ?>
    <?php include_once("gAnnounce/gAnnounceform.php"); ?>
    <?php include_once("gAnnounce/gAnnouncemanage.php"); ?>
</div>
    <?php
}

function widget_gAnnouncement($args) 
{
  extract($args);
  echo $before_widget;
  echo $before_title;
  echo get_option('gAnnounce_title');
  echo $after_title;
  gAnnouncement();
  echo $after_widget;
}

function gAnnouncement_widget_control() 
{
	echo '<p>Announcement and vertical scroll news.<br> To change the setting goto Announcement link under SETTING tab.';
	echo '<br><a href="options-general.php?page=announcement-and-vertical-scroll-news/setting.php">';
	echo 'click here</a></p>';

}


function gAnnouncement_plugins_loaded()
{
  	register_sidebar_widget(__('Announcement'), 'widget_gAnnouncement');   

	
	if(function_exists('register_sidebar_widget')) 
	{
		register_sidebar_widget('Announcement', 'widget_gAnnouncement');
	}
	
	if(function_exists('register_widget_control')) 
	{
		register_widget_control(array('Announcement', 'widgets'), 'gAnnouncement_widget_control', 560, 500);
	} 
}

function gAnnouncement_add_to_menu() 
{
	add_options_page('Announcement and vertical scroll news', 'Announcement', 'manage_options', __FILE__, 'gAnnouncement_admin_options' );
	add_options_page('Announcement and vertical scroll news', '', 'manage_options', "announcement-and-vertical-scroll-news/setting.php",'' );
}

if (is_admin()) 
{
	add_action('admin_menu', 'gAnnouncement_add_to_menu');
}

function gAnnouncement_deactivate() 
{
//	delete_option('gAnnounce_title');
//	delete_option('gAnnounce_width');
//	delete_option('gAnnounce_font');
//	delete_option('gAnnounce_height');
//	delete_option('gAnnounce_fontsize');
//	delete_option('gAnnounce_slidedirection');
//	delete_option('gAnnounce_fontweight');
//	delete_option('gAnnounce_slidetimeout');
//	delete_option('gAnnounce_fontcolor');
//	delete_option('gAnnounce_textalign');
//	delete_option('gAnnounce_textvalign');
}

register_activation_hook(__FILE__, 'gAnnouncement_activation');
add_action('admin_menu', 'gAnnouncement_add_to_menu');
add_action("plugins_loaded", "gAnnouncement_plugins_loaded");
register_deactivation_hook( __FILE__, 'gAnnouncement_deactivate' );
?>