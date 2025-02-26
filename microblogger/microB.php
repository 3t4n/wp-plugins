<?php
/**
 * @package Micro_blogger
 * @author Sam Williams
 * @version 1.0-RC1
 */
/*
Plugin Name: microblogger
Plugin URI: http://www.inthebinaryrefinery.co.uk/blog/?page_id=118
Description: Microblogger allows you to post quick comments to your readers, please read readme.txt for install information!
Version: 1.0-RC1
Author URI: http://www.inthebinaryrefinery.co.uk
*/

function microb_install() {
    global $wpdb, $wp_roles, $wp_version;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   
        if ( version_compare(mysql_get_server_info(), '4.1.0', '>=') ) {
                if ( ! empty($wpdb->charset) )
                        $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
                if ( ! empty($wpdb->collate) )
                        $charset_collate .= " COLLATE $wpdb->collate";
        }
               
        $microB = $wpdb->prefix . 'microB';
        $microBsettings = $wpdb->prefix . 'microBsettings';
     
                $sql = "CREATE TABLE " . $microB . " (
                `id` int(9) NOT NULL auto_increment,
                `blog` varchar(250) NOT NULL,
                `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
                `article` int(1) NOT NULL default '0',
                UNIQUE KEY `id` (`id`)
                ) $charset_collate;";
       
      dbDelta($sql);
 
     
                $sql = "CREATE TABLE " . $microBsettings . " (
                    pin text NOT NULL,
                    adminblogmodule text NOT NULL,
                    mobiletitle text NOT NULL,
                    fontcolour text NOT NULL,
                    pluginwidth text NOT NULL,
                    activitybanner text NOT NULL,
                    microblogbanner text NOT NULL,
                    microblogcolour text NOT NULL,
                    articlefollowscolour text NOT NULL,
                    admincolour text NOT NULL,
                    usercolour text NOT NULL,
                    keymodule text NOT NULL,
                    microblogmodule text NOT NULL,
                    activitymodule text NOT NULL,
                    microblogorder text NOT NULL,
                    activityorder text NOT NULL,
                    microblogresults text NOT NULL,
                    activityresults text NOT NULL,
                    fontsize text NOT NULL,
                    secondaryfontcolour text NOT NULL,
                    showtime text NOT NULL,
                    RSSOn text NOT NULL,
                    RSSLength text NOT NULL,
                    RSSTitle text NOT NULL,
                    RSSDescription text NOT NULL,
                    RSSLink text NOT NULL
                ) $charset_collate;";
       
      dbDelta($sql);

$query = "SELECT * FROM " . $wpdb->prefix . "microBsettings";
$res = mysql_query($query);
$row = mysql_fetch_assoc($res);

$num_rows = mysql_num_rows($res);


if($num_rows == 0){
$insert = "INSERT INTO " . $microBsettings . "(`pin`, `adminblogmodule`, `mobiletitle`, `fontcolour`, `pluginwidth`, `activitybanner`, `microblogbanner`, `microblogcolour`, `articlefollowscolour`, `admincolour`, `usercolour`, `keymodule`, `microblogmodule`, `activitymodule`, `microblogorder`, `activityorder`, `microblogresults`, `activityresults`, `fontsize`, `secondaryfontcolour`, `showtime`) VALUES
('1234', 'TRUE', '<h2>Write a microblog!</h2>', 'WHITE', '150', '<h2>Recent blog Activity </h2>', '<h2>Microbloggings</h2>', '#666666', '#333333', '#900000', '#000033', 'TRUE', 'TRUE', 'TRUE', '2', '1', '3', '3', '2', '#3B9C9C', 'TRUE');
    ";
    mysql_query($insert) or die('Error, insert query failed');
}
//$URL = "";
//header ("Location: $URL");

}
function microb_uninstall() {
    global $wpdb, $wp_roles, $wp_version;
}
function getcontent() {
    
    include("settings.php");
    
    global $wpdb;
    $table = $wpdb->prefix."microB";
    $query = "SELECT * FROM $table ORDER BY ID DESC LIMIT 3";
    $res = mysql_query($query);

    echo "<!-- MICROBLOG -->";
echo "<table>";     //PAGE CONTAINER
if ($activityorder == '1'){    
    if ($activitymodule == 'TRUE'){
        include("modules/activity.php");
    }
}
if ($microblogorder == '1') {
    
    if ($microblogmodule == 'TRUE'){
        include("modules/microblog.php");
    }
}
if ($activityorder == '2') {
    if ($activitymodule == 'TRUE'){
        include("modules/activity.php");
    }
}
if ($microblogorder == '2') {
    if ($microblogmodule == 'TRUE'){
        include("modules/microblog.php");
    }
}
if ($keymodule == 'TRUE'){
include("modules/key.php");
}
}
function post() {
    global $wpdb;
mysql_query("INSERT INTO " . $wpdb->prefix."microB (blog, article) VALUES ('A post was published!', '2')");
}
function save() {
    global $wpdb;
// mysql_query("INSERT INTO " . $wpdb->prefix. "microB (blog, article) VALUES ('A post was saved.', '2')") or die('Error, insert query failed');
}
function page() {
    global $wpdb;
mysql_query("INSERT INTO " . $wpdb->prefix. "microB (blog, article) VALUES ('A page was published!', '2');");
}
function edit() {
    global $wpdb;
// mysql_query("INSERT INTO " . $wpdb->prefix. "microB (blog, article) VALUES ('A page was edited.', '2')") or die('Error, insert query failed');
}
function comment() {
	global $wpdb;
mysql_query("INSERT INTO " . $wpdb->prefix. "microB (blog, article) VALUES ('A comment was made.', '3')");
}
function microblog_menu() {
add_menu_page('Write a microblog!','Microblog!', '8', __FILE__, 'admenu');
}
function admenu(){
    include ("modules/admin_blog.php");
}
function adminheadblog() {
    include("modules/microadminblog.php");
}

register_activation_hook(__FILE__, 'microb_install');
register_deactivation_hook(__FILE__, 'microb_uninstall');
add_action('showmicroblog', 'getcontent');
add_action('deactivate_microB.php', 'uninstall');
add_action('publish_post', 'post');
add_action('save_post', 'save');
add_action('publish_page', 'save');
add_action('edit_post', 'edit');
add_action('comment_post', 'comment');
add_action('admin_menu', 'microblog_menu');
add_action('admin_head', 'adminheadblog');

?>
