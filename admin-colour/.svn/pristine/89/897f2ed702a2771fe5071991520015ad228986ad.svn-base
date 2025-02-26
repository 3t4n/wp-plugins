<?php
/*
Plugin Name: Admin-Colour
Plugin URI: http://www.alex-wells.co.uk/admin-color/
Description: A plugin to change the admin menu colours to make it easier to switch between menu options. Created by Alex Wells while working at Simpsons Creative.
Version: 3.0
Author: Alex Wells
Author URI: http://www.twitter.com/alex_simpsons
License: GPL
*/
  
 // THIS GIVES US SOME OPTIONS FOR STYLING THE ADMIN AREA
function admin_colors() {
 $output ='<style type="text/css">
 			.menu-icon-dashboard { background-color:#'. get_option('admin_colour_dashboard').'; color:#'. get_option('admin_colour_dashboard_text').' !important;}
 				#adminmenu .menu-icon-dashboard div.wp-menu-image:before {color:#'. get_option('admin_colour_dashboard_icon').' !important;}
				
			.menu-icon-post { background-color:#'. get_option('admin_colour_posts').'; color:#'. get_option('admin_colour_posts_text').' !important;}
			 	#adminmenu .menu-icon-post div.wp-menu-image:before {color:#'. get_option('admin_colour_posts_icon').' !important;}

 			.menu-icon-media { background-color:#'. get_option('admin_colour_media').'; color:#'. get_option('admin_colour_media_text').' !important;}
 				#adminmenu .menu-icon-media div.wp-menu-image:before {color:#'. get_option('admin_colour_media_icon').' !important;}

 			.menu-icon-page { background-color:#'. get_option('admin_colour_page').'; color:#'. get_option('admin_colour_page_text').' !important;}
 				#adminmenu .menu-icon-page div.wp-menu-image:before {color:#'. get_option('admin_colour_page_icon').' !important;}

 			.menu-icon-comments { background-color:#'. get_option('admin_colour_comments').'; color:#'. get_option('admin_colour_comments_text').' !important;}
 				#adminmenu .menu-icon-comments div.wp-menu-image:before {color:#'. get_option('admin_colour_comments_icon').' !important;}

 			.menu-icon-appearance { background-color:#'. get_option('admin_colour_appearance').'; color:#'. get_option('admin_colour_appearance_text').' !important;}
 				#adminmenu .menu-icon-appearance div.wp-menu-image:before {color:#'. get_option('admin_colour_appearance_icon').' !important;}

 			.menu-icon-plugins { background-color:#'. get_option('admin_colour_plugins').'; color:#'. get_option('admin_colour_plugins_text').' !important;}
 				#adminmenu .menu-icon-plugins div.wp-menu-image:before {color:#'. get_option('admin_colour_plugins_icon').' !important;}

 			.menu-icon-users { background-color:#'. get_option('admin_colour_users').'; color:#'. get_option('admin_colour_users_text').' !important;}
 				#adminmenu .menu-icon-users div.wp-menu-image:before {color:#'. get_option('admin_colour_users_icon').' !important;}

 			.menu-icon-tools { background-color:#'. get_option('admin_colour_tools').'; color:#'. get_option('admin_colour_tools_text').' !important;}
 			 				#adminmenu .menu-icon-tools div.wp-menu-image:before {color:#'. get_option('admin_colour_tools_icon').' !important;}

			.menu-icon-settings { background-color:#'. get_option('admin_colour_settings').'; color:#'. get_option('admin_colour_settings_text').' !important;}
 			 				#adminmenu .menu-icon-settings div.wp-menu-image:before {color:#'. get_option('admin_colour_settings_icon').' !important;}
			
#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,#adminmenu li.current a.menu-top,.folded #adminmenu li.wp-has-current-submenu,.folded #adminmenu li.current.menu-top,#adminmenu .wp-menu-arrow,#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, 

#adminmenu .wp-has-current-submenu.opensub .wp-submenu,
#adminmenu li.opensub>a.menu-top,
.folded #adminmenu li.opensub>a.menu-top

{	
background-color: #'. get_option('admin_colour_active').' !important; /* Fallback */
color:#'. get_option('admin_colour_active_text').' !important;
background-image: none;
}

/*pop out background colour*/
.js #adminmenu .opensub .wp-submenu {}


  .wp-submenu {background-color:#'.get_option('admin_colour_drop_bg').'!important;}
  .wp-submenu a {color:#'.get_option('admin_colour_drop_text').'!important;} 



.admin_colour_title { float:left; margin:0px; padding:0px; display:inline; width:100px;} 

#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap { background-color:#'. get_option('admin_colour_master_bg').';}
         
		//#adminmenu div.wp-menu-image:before {color:#fff!important;}
		 
		 
		 /*
		 #wpadminbar {background-color:#fff; color:#000;}
		#wpadminbar a.ab-item, #wpadminbar>#wp-toolbar span.ab-label, #wpadminbar>#wp-toolbar span.noticon { color:#000;}
		#wpadminbar #adminbarsearch:before, #wpadminbar .ab-icon:before, #wpadminbar .ab-item:before { color:#000;}
		
		//hover



		 </style>';
		 echo $output;
}
 

add_action('admin_head', 'admin_colors');
 
  
?><?php
  // INSTALL AND UNINSTALL SCRIPTS TO CREATE DATABASE ENTRIES FOR THE SETTINGS
/* Runs when plugin is activated */
register_activation_hook(__FILE__,'admin_colour_install'); 

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'admin_colour_remove' );

function admin_colour_install() {
/* Creates new database field */
add_option("admin_colour_dashboard", '23282D', '', 'yes');
add_option("admin_colour_dashboard_text", 'fff', '', 'yes');
add_option("admin_colour_posts", '23282D', '', 'yes');
add_option("admin_colour_posts_text", 'fff', '', 'yes');
add_option("admin_colour_media", '23282D', '', 'yes');
add_option("admin_colour_media_text", 'fff', '', 'yes');
add_option("admin_colour_page", '23282D', '', 'yes');
add_option("admin_colour_page_text", 'fff', '', 'yes');
add_option("admin_colour_comments", '23282D', '', 'yes');
add_option("admin_colour_comments_text", 'fff', '', 'yes');
add_option("admin_colour_appearance", '23282D', '', 'yes');
add_option("admin_colour_appearance_text", 'fff', '', 'yes');
add_option("admin_colour_plugins", '23282D', '', 'yes');
add_option("admin_colour_plugins_text", 'fff', '', 'yes');
add_option("admin_colour_users", '23282D', '', 'yes');
add_option("admin_colour_users_text", 'fff', '', 'yes');
add_option("admin_colour_settings", '23282D', '', 'yes');
add_option("admin_colour_settings_text", 'fff', '', 'yes');
add_option("admin_colour_tools", '23282D', '', 'yes');
add_option("admin_colour_tools_text", 'fff', '', 'yes');
add_option("admin_colour_active", '2babe2', '', 'yes');
add_option("admin_colour_active_text", 'ffffff', '', 'yes');
add_option("admin_colour_master_bg", '23282D', '', 'yes');
add_option("admin_colour_drop_bg", '32373C', '', 'yes');
add_option("admin_colour_drop_text", 'fff', '', 'yes');


//Icon settings
add_option("admin_colour_dashboard_icon", 'fff', '', 'yes');
add_option("admin_colour_posts_icon", 'fff', '', 'yes');
add_option("admin_colour_media_icon", 'fff', '', 'yes');
add_option("admin_colour_page_icon", 'fff', '', 'yes');
add_option("admin_colour_comments_icon", 'fff', '', 'yes');
add_option("admin_colour_appearance_icon", 'fff', '', 'yes');
add_option("admin_colour_plugins_icon", 'fff', '', 'yes');
add_option("admin_colour_users_icon", 'fff', '', 'yes');
add_option("admin_colour_settings_icon", 'fff', '', 'yes');
add_option("admin_colour_tools_icon", 'fff', '', 'yes');



}

function admin_colour_remove() {
/* Deletes the database field */
delete_option('admin_colour_dashboard_text');
delete_option('admin_colour_dashboard');
delete_option('admin_colour_posts_text');
delete_option('admin_colour_posts');
delete_option('admin_colour_media');
delete_option('admin_colour_media_text');
delete_option('admin_colour_page');
delete_option('admin_colour_page_text');
delete_option('admin_colour_comments');
delete_option('admin_colour_comments_text');
delete_option('admin_colour_appearance');
delete_option('admin_colour_appearance_text');
delete_option('admin_colour_plugins');
delete_option('admin_colour_plugins_text');
delete_option('admin_colour_users');
delete_option('admin_colour_users_text');
delete_option('admin_colour_tools');
delete_option('admin_colour_tools_text');
delete_option('admin_colour_settings');
delete_option('admin_colour_settings_text');
delete_option('admin_colour_active');
delete_option('admin_colour_active_text');
delete_option('admin_colour_master_bg');
delete_option('admin_colour_drop_bg');
delete_option('admin_colour_drop_text');

//Icon settings
delete_option('admin_colour_dashboard_icon');
delete_option('admin_colour_posts_icon');
delete_option('admin_colour_media_icon');
delete_option('admin_colour_page_icon');
delete_option('admin_colour_comments_icon');
delete_option('admin_colour_appearance_icon');
delete_option('admin_colour_plugins_icon');
delete_option('admin_colour_users_icon');
delete_option('admin_colour_settings_icon');
delete_option('admin_colour_tools_icon');


}

?><?php

//THE ADMIN AREA SETTINGS PAGE FOR ADDING THE SETTINGS FOR THE PLUGIN


/* Call the html code */
add_action('admin_menu', 'Admin_colour_menu');

function Admin_colour_menu() {
$mypage = add_options_page('Admin Colour', 'Admin Colour', 'administrator',
'hello-world', 'hello_world_html_page');
add_action ("admin_print_scripts-$mypage",'admin_colour_settings');
}

function admin_colour_settings()
{
	$plugindir = get_settings('home').'/wp-content/plugins/'.dirname(plugin_basename(__FILE__));
	wp_enqueue_script('loadjs', $plugindir . '/jscolor.js');
	echo "<script type='text/javascript' src='".$plugindir."/jscolor.js' ></script>\n";
}
?><?php
function hello_world_html_page() {

$plugindir = get_settings('home').'/wp-content/plugins/'.dirname(plugin_basename(__FILE__));

?>
<div>
<h2>Admin Colour Options</h2>
<h3>Enter Hex code without the  # </h3>
<p>Please note that applying a pre-set theme will overwrite your custom colour schemes, why not try applying a pre-set theme and then making changes to quickly get the result you are after.</p>
<a href="http://www.twitter.com/alex_simpsons" target="_blank"><img src="<?php echo $plugindir.'/tweet.png'; ?>"  /></a>
<div style="height:20px; width:100%; float:left;"><p>&nbsp;</p></div>

<div style="border:#333333 solid 1px; padding:10px; width:300px; float:left;">
<h3>Custom Colours</h3>
<form method="post" action="options.php">
<input type="submit" value="<?php _e('Save Changes') ?>" />

<?php wp_nonce_field('update-options'); ?>

<h3>Main menu background colour</h3>
<input class="color" name="admin_colour_master_bg" type="text" id="admin_colour_master_bg"
value="<?php echo get_option('admin_colour_master_bg'); ?>" />
<br />
<hr/>

<h3>Dashboard</h3>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_dashboard" type="text" id="admin_colour_dashboard"
value="<?php echo get_option('admin_colour_dashboard'); ?>" />
<br/>
<div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_dashboard_text" type="text" id="admin_colour_dashboard_text"
value="<?php echo get_option('admin_colour_dashboard_text'); ?>" />

<div class="admin_colour_title">icon</div>
<input class="color" name="admin_colour_dashboard_icon" type="text" id="admin_colour_dashboard_icon"
value="<?php echo get_option('admin_colour_dashboard_icon'); ?>" />


<h3>Posts</h3>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_posts" type="text" id="admin_colour_posts"
value="<?php echo get_option('admin_colour_posts'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_posts_text" type="text" id="admin_colour_posts_text"
value="<?php echo get_option('admin_colour_posts_text'); ?>" />
<br/>
 <div class="admin_colour_title">icon</div>
<input class="color" name="admin_colour_posts_icon" type="text" id="admin_colour_posts_icon"
value="<?php echo get_option('admin_colour_posts_icon'); ?>" />


<h3>Media</h3>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_media" type="text" id="admin_colour_media"
value="<?php echo get_option('admin_colour_media'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_media_text" type="text" id="admin_colour_media_text"
value="<?php echo get_option('admin_colour_media_text'); ?>" />
<br/>
 <div class="admin_colour_title">icon</div>
<input class="color" name="admin_colour_media_icon" type="text" id="admin_colour_media_icon"
value="<?php echo get_option('admin_colour_media_icon'); ?>" />
 

<h3>Page</h3>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_page" type="text" id="admin_colour_page"
value="<?php echo get_option('admin_colour_page'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_page_text" type="text" id="admin_colour_page_text"
value="<?php echo get_option('admin_colour_page_text'); ?>" /><br/>
 <div class="admin_colour_title">icon</div>
<input class="color" name="admin_colour_page_icon" type="text" id="admin_colour_page_icon"
value="<?php echo get_option('admin_colour_page_icon'); ?>" />

<h3>Comments</h3>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_comments" type="text" id="admin_colour_comments"
value="<?php echo get_option('admin_colour_comments'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_comments_text" type="text" id="admin_colour_comments_text"
value="<?php echo get_option('admin_colour_comments_text'); ?>" />
<br/>
 <div class="admin_colour_title">icon</div>
<input class="color" name="admin_colour_comments_icon" type="text" id="admin_colour_comments_icon"
value="<?php echo get_option('admin_colour_comments_icon'); ?>" />


<h3>Appearance</h3>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_appearance" type="text" id="admin_colour_appearance"
value="<?php echo get_option('admin_colour_appearance'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_appearance_text" type="text" id="admin_colour_appearance_text"
value="<?php echo get_option('admin_colour_appearance_text'); ?>" />
<br/>
 <div class="admin_colour_title">icon</div>
<input class="color" name="admin_colour_appearance_icon" type="text" id="admin_colour_appearance_icon"
value="<?php echo get_option('admin_colour_appearance_icon'); ?>" />

<h3>Plugins</h3>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_plugins" type="text" id="admin_colour_plugins"
value="<?php echo get_option('admin_colour_plugins'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_plugins_text" type="text" id="admin_colour_plugins_text"
value="<?php echo get_option('admin_colour_plugins_text'); ?>" />
<br/>
 <div class="admin_colour_title">icon</div>
<input class="color" name="admin_colour_plugins_icon" type="text" id="admin_colour_plugins_icon"
value="<?php echo get_option('admin_colour_plugins_icon'); ?>" />

<h3>Users</h3>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_users" type="text" id="admin_colour_users"
value="<?php echo get_option('admin_colour_users'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_users_text" type="text" id="admin_colour_users_text"
value="<?php echo get_option('admin_colour_users_text'); ?>" />

<br/>
 <div class="admin_colour_title">icon</div>
<input class="color" name="admin_colour_users_icon" type="text" id="admin_colour_users_icon"
value="<?php echo get_option('admin_colour_users_icon'); ?>" />


<h3>Tools</h3>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_tools" type="text" id="admin_colour_tools"
value="<?php echo get_option('admin_colour_tools'); ?>" />
<br/>
<div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_tools_text" type="text" id="admin_colour_tools_text"
value="<?php echo get_option('admin_colour_tools_text'); ?>" />
<br/>
<div class="admin_colour_title">icon</div>
<input class="color" name="admin_colour_tools_icon" type="text" id="admin_colour_tools_icon"
value="<?php echo get_option('admin_colour_tools_icon'); ?>" />



<h3>Settings</h3>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_settings" type="text" id="admin_colour_settings"
value="<?php echo get_option('admin_colour_settings'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_settings_text" type="text" id="admin_colour_settings_text"
value="<?php echo get_option('admin_colour_settings_text'); ?>" />
<br/>
 <div class="admin_colour_title">icon</div>
<input class="color" name="admin_colour_settings_icon" type="text" id="admin_colour_settings_icon"
value="<?php echo get_option('admin_colour_settings_icon'); ?>" />


<h3>Active</h3>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_active" type="text" id="admin_colour_active"
value="<?php echo get_option('admin_colour_active'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_active_text" type="text" id="admin_colour_active_text"
value="<?php echo get_option('admin_colour_active_text'); ?>" />



<h3>Drop down / pop out menus</h3>
<div class="admin_colour_title">background</div>
<input class="color" name="admin_colour_drop_bg" type="text" id="admin_colour_drop_bg"
value="<?php echo get_option('admin_colour_drop_bg'); ?>" />
<br/>
 <div class="admin_colour_title">text</div>
<input class="color" name="admin_colour_drop_text" type="text" id="admin_colour_drop_text"
value="<?php echo get_option('admin_colour_drop_text'); ?>" />





<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="admin_colour_settings_icon,admin_colour_tools_icon,admin_colour_users_icon,admin_colour_plugins_icon,admin_colour_appearance_icon,admin_colour_comments_icon,admin_colour_page_icon,admin_colour_media_icon,admin_colour_posts_icon,admin_colour_drop_text,admin_colour_drop_bg,admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text,admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text, admin_colour_master_bg, admin_colour_dashboard_icon" />

<p>
<input type="submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
<!-- ''''''''''' START THEME - Default '''''''''''' -->
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3>Default</h3>
                <p style="background-color:#23282D; color:#fff; padding:2px;">Example</p>

        <input name="admin_colour_master_bg" type="hidden" value="22272C"/>
                        <input name="admin_colour_dashboard" type="hidden" value="23282D" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="ffffff" />
                        <input name="admin_colour_posts" type="hidden"  value="23282D" />
                        <input name="admin_colour_posts_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_media" type="hidden"  value="23282D" />
                        <input name="admin_colour_media_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_page" type="hidden"  value="23282D" />
                        <input name="admin_colour_page_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_comments" type="hidden"  value="23282D" />
                        <input name="admin_colour_comments_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_appearance" type="hidden"  value="23282D" />
                        <input name="admin_colour_appearance_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_plugins" type="hidden"  value="23282D" />
                        <input name="admin_colour_plugins_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_users" type="hidden"  value="23282D" />
                        <input name="admin_colour_users_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_tools" type="hidden"  value="23282D" />
                        <input name="admin_colour_tools_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_settings" type="hidden"  value="23282D" />
                        <input name="admin_colour_settings_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_active" type="hidden"  value="0074A2" />
                        <input name="admin_colour_active_text" type="hidden" value="fff" />

                        <input name="admin_colour_drop_text" type="hidden" value="fff" />
                        <input name="admin_colour_drop_bg" type="hidden" value="32373C" />
                        
                        <!-- ICONS -->
                        <input name="admin_colour_dashboard_icon" type="hidden" value="fff" />
                        <input name="admin_colour_posts_icon" type="hidden" value="fff" />
                        <input name="admin_colour_media_icon" type="hidden" value="fff" />
                        <input name="admin_colour_page_icon" type="hidden" value="fff" />
                        <input name="admin_colour_comments_icon" type="hidden" value="fff" />
                        <input name="admin_colour_appearance_icon" type="hidden" value="fff" />
                        <input name="admin_colour_plugins_icon" type="hidden" value="fff" />
                        <input name="admin_colour_users_icon" type="hidden" value="fff" />
                        <input name="admin_colour_settings_icon" type="hidden" value="fff" />
                        <input name="admin_colour_tools_icon" type="hidden" value="fff" />
                      
                      
                      
                      
                      
                      
  
                        
                        
                        
        <input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="admin_colour_settings_icon,admin_colour_tools_icon,admin_colour_users_icon,admin_colour_plugins_icon,admin_colour_appearance_icon,admin_colour_comments_icon,admin_colour_page_icon,admin_colour_media_icon,admin_colour_posts_icon,admin_colour_drop_text,admin_colour_drop_bg,admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text,admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text, admin_colour_master_bg, admin_colour_dashboard_icon" />
        
        <p>
        <input type="submit" value="<?php _e('Activate') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->


<!-- ''''''''''' START THEME '''''''''''' -->
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3>SC Blue</h3>
                <p style="background-color:#00ADEF; color:#FFFFFF; padding:2px;">Example</p>

                <input name="admin_colour_master_bg" type="hidden" value="00ADEF"/>

                        <input name="admin_colour_dashboard" type="hidden" value="00ADEF" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="FFFFFF" />
                        <input name="admin_colour_posts" type="hidden"  value="00ADEF" />
                        <input name="admin_colour_posts_text" type="hidden" value="FFFFFF" />
                        <input name="admin_colour_media" type="hidden"  value="00ADEF" />
                        <input name="admin_colour_media_text" type="hidden" value="FFFFFF" />
                        <input name="admin_colour_page" type="hidden"  value="00ADEF" />
                        <input name="admin_colour_page_text" type="hidden" value="FFFFFF" />
                        <input name="admin_colour_comments" type="hidden"  value="00ADEF" />
                        <input name="admin_colour_comments_text" type="hidden" value="FFFFFF" />
                        <input name="admin_colour_appearance" type="hidden"  value="00ADEF" />
                        <input name="admin_colour_appearance_text" type="hidden" value="FFFFFF" />
                        <input name="admin_colour_plugins" type="hidden"  value="00ADEF" />
                        <input name="admin_colour_plugins_text" type="hidden" value="FFFFFF" />
                        <input name="admin_colour_users" type="hidden"  value="00ADEF" />
                        <input name="admin_colour_users_text" type="hidden" value="FFFFFF" />
                        <input name="admin_colour_tools" type="hidden"  value="00ADEF" />
                        <input name="admin_colour_tools_text" type="hidden" value="FFFFFF" />
                        <input name="admin_colour_settings" type="hidden"  value="00ADEF" />
                        <input name="admin_colour_settings_text" type="hidden" value="FFFFFF" />
                        
                        <input name="admin_colour_active" type="hidden"  value="0074A2" />
                        <input name="admin_colour_active_text" type="hidden" value="FFF" />
                        
                        
                        <input name="admin_colour_drop_text" type="hidden" value="fff" />
                        <input name="admin_colour_drop_bg" type="hidden" value="00ADEF" />
                        
                        
                          <!-- ICONS -->
                        <input name="admin_colour_dashboard_icon" type="hidden" value="fff" />
                        <input name="admin_colour_posts_icon" type="hidden" value="fff" />
                        <input name="admin_colour_media_icon" type="hidden" value="fff" />
                        <input name="admin_colour_page_icon" type="hidden" value="fff" />
                        <input name="admin_colour_comments_icon" type="hidden" value="fff" />
                        <input name="admin_colour_appearance_icon" type="hidden" value="fff" />
                        <input name="admin_colour_plugins_icon" type="hidden" value="fff" />
                        <input name="admin_colour_users_icon" type="hidden" value="fff" />
                        <input name="admin_colour_settings_icon" type="hidden" value="fff" />
                        <input name="admin_colour_tools_icon" type="hidden" value="fff" />
                        
                        
                        
                        
                        
        <input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="admin_colour_settings_icon,admin_colour_tools_icon,admin_colour_users_icon,admin_colour_plugins_icon,admin_colour_appearance_icon,admin_colour_comments_icon,admin_colour_page_icon,admin_colour_media_icon,admin_colour_posts_icon,admin_colour_drop_text,admin_colour_drop_bg,admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text,admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text, admin_colour_master_bg, admin_colour_dashboard_icon" />
        
        
        <p>
        <input type="submit" value="<?php _e('Activate') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->





<!-- ''''''''''' START THEME '''''''''''' -->
     <?php $mainBG ='58C31B'; $mainTxt ='FFFFFF'; $mainTxtNameOfTheme = 'All Green';?>
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3><?php echo $mainTxtNameOfTheme;?></h3>
   
                <p style="background-color:#<?php echo $mainBG;?>; color:#<?php echo $mainTxt;?>; padding:2px;">Example</p>
                    <input name="admin_colour_active" type="hidden"  value="0074A2" />
                        <input name="admin_colour_active_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        
                        
                        <input name="admin_colour_drop_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_drop_bg" type="hidden" value="51a123" />
                        
                        
                        

                <input name="admin_colour_master_bg" type="hidden" value="<?php echo $mainBG;?>"/>

                        <input name="admin_colour_dashboard" type="hidden" value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_posts" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_posts_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_media" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_media_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_page" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_page_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_comments" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_comments_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_appearance" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_appearance_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_plugins" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_plugins_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_users" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_users_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_tools" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_tools_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_settings" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_settings_text" type="hidden" value="<?php echo $mainTxt;?>" />
                    
                        
                        
                          <!-- ICONS -->
                        <input name="admin_colour_dashboard_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_posts_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_media_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_page_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_comments_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_appearance_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_plugins_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_users_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_settings_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_tools_icon" type="hidden" value="fff" />
                        
                        
                        
                        
                        
        <input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="admin_colour_settings_icon,admin_colour_tools_icon,admin_colour_users_icon,admin_colour_plugins_icon,admin_colour_appearance_icon,admin_colour_comments_icon,admin_colour_page_icon,admin_colour_media_icon,admin_colour_posts_icon,admin_colour_drop_text,admin_colour_drop_bg,admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text,admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text, admin_colour_master_bg, admin_colour_dashboard_icon" />
        
        
        <p>
        <input type="submit" value="<?php _e('Activate') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->



<!-- ''''''''''' START THEME '''''''''''' -->
     <?php $mainBG ='ffb413'; $mainTxt ='FFFFFF'; $mainTxtNameOfTheme = 'All Orange';?>
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3><?php echo $mainTxtNameOfTheme;?></h3>
   
                <p style="background-color:#<?php echo $mainBG;?>; color:#<?php echo $mainTxt;?>; padding:2px;">Example</p>
                    <input name="admin_colour_active" type="hidden"  value="0074A2" />
                        <input name="admin_colour_active_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        
                        
                        <input name="admin_colour_drop_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_drop_bg" type="hidden" value="<?php echo $mainBG;?>" />
                        
                        
                        

                <input name="admin_colour_master_bg" type="hidden" value="<?php echo $mainBG;?>"/>

                        <input name="admin_colour_dashboard" type="hidden" value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_posts" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_posts_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_media" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_media_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_page" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_page_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_comments" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_comments_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_appearance" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_appearance_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_plugins" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_plugins_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_users" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_users_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_tools" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_tools_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_settings" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_settings_text" type="hidden" value="<?php echo $mainTxt;?>" />
                    
                        
                        
                          <!-- ICONS -->
                        <input name="admin_colour_dashboard_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_posts_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_media_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_page_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_comments_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_appearance_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_plugins_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_users_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_settings_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_tools_icon" type="hidden" value="fff" />
                        
                        
                        
                        
                        
        <input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="admin_colour_settings_icon,admin_colour_tools_icon,admin_colour_users_icon,admin_colour_plugins_icon,admin_colour_appearance_icon,admin_colour_comments_icon,admin_colour_page_icon,admin_colour_media_icon,admin_colour_posts_icon,admin_colour_drop_text,admin_colour_drop_bg,admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text,admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text, admin_colour_master_bg, admin_colour_dashboard_icon" />
        
        
        <p>
        <input type="submit" value="<?php _e('Activate') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->




<!-- ''''''''''' START THEME '''''''''''' -->
     <?php $mainBG ='b516ff'; $mainTxt ='FFFFFF'; $mainTxtNameOfTheme = 'All Purple';?>
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3><?php echo $mainTxtNameOfTheme;?></h3>
   
                <p style="background-color:#<?php echo $mainBG;?>; color:#<?php echo $mainTxt;?>; padding:2px;">Example</p>
                    <input name="admin_colour_active" type="hidden"  value="0074A2" />
                        <input name="admin_colour_active_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        
                        
                        <input name="admin_colour_drop_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_drop_bg" type="hidden" value="<?php echo $mainBG;?>" />
                        
                        
                        

                <input name="admin_colour_master_bg" type="hidden" value="<?php echo $mainBG;?>"/>

                        <input name="admin_colour_dashboard" type="hidden" value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_posts" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_posts_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_media" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_media_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_page" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_page_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_comments" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_comments_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_appearance" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_appearance_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_plugins" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_plugins_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_users" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_users_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_tools" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_tools_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_settings" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_settings_text" type="hidden" value="<?php echo $mainTxt;?>" />
                    
                        
                        
                          <!-- ICONS -->
                        <input name="admin_colour_dashboard_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_posts_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_media_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_page_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_comments_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_appearance_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_plugins_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_users_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_settings_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_tools_icon" type="hidden" value="fff" />
                        
                        
                        
                        
                        
        <input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="admin_colour_settings_icon,admin_colour_tools_icon,admin_colour_users_icon,admin_colour_plugins_icon,admin_colour_appearance_icon,admin_colour_comments_icon,admin_colour_page_icon,admin_colour_media_icon,admin_colour_posts_icon,admin_colour_drop_text,admin_colour_drop_bg,admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text,admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text, admin_colour_master_bg, admin_colour_dashboard_icon" />
        
        
        <p>
        <input type="submit" value="<?php _e('Activate') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->




<!-- ''''''''''' START THEME '''''''''''' -->
     <?php $mainBG ='fc0006'; $mainTxt ='FFFFFF'; $mainTxtNameOfTheme = 'All Red';?>
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3><?php echo $mainTxtNameOfTheme;?></h3>
   
                <p style="background-color:#<?php echo $mainBG;?>; color:#<?php echo $mainTxt;?>; padding:2px;">Example</p>
                    <input name="admin_colour_active" type="hidden"  value="0074A2" />
                        <input name="admin_colour_active_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        
                        
                        <input name="admin_colour_drop_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_drop_bg" type="hidden" value="<?php echo $mainBG;?>" />
                        
                        
                        

                <input name="admin_colour_master_bg" type="hidden" value="<?php echo $mainBG;?>"/>

                        <input name="admin_colour_dashboard" type="hidden" value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_posts" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_posts_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_media" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_media_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_page" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_page_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_comments" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_comments_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_appearance" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_appearance_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_plugins" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_plugins_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_users" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_users_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_tools" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_tools_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_settings" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_settings_text" type="hidden" value="<?php echo $mainTxt;?>" />
                    
                        
                        
                          <!-- ICONS -->
                        <input name="admin_colour_dashboard_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_posts_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_media_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_page_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_comments_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_appearance_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_plugins_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_users_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_settings_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_tools_icon" type="hidden" value="fff" />
                        
                        
                        
                        
                        
        <input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="admin_colour_settings_icon,admin_colour_tools_icon,admin_colour_users_icon,admin_colour_plugins_icon,admin_colour_appearance_icon,admin_colour_comments_icon,admin_colour_page_icon,admin_colour_media_icon,admin_colour_posts_icon,admin_colour_drop_text,admin_colour_drop_bg,admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text,admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text, admin_colour_master_bg, admin_colour_dashboard_icon" />
        
        
        <p>
        <input type="submit" value="<?php _e('Activate') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->



<!-- ''''''''''' START THEME '''''''''''' -->
     <?php $mainBG ='f46cf6'; $mainTxt ='FFFFFF'; $mainTxtNameOfTheme = 'All Pink';?>
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3><?php echo $mainTxtNameOfTheme;?></h3>
   
                <p style="background-color:#<?php echo $mainBG;?>; color:#<?php echo $mainTxt;?>; padding:2px;">Example</p>
                    <input name="admin_colour_active" type="hidden"  value="0074A2" />
                        <input name="admin_colour_active_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        
                        
                        <input name="admin_colour_drop_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_drop_bg" type="hidden" value="<?php echo $mainBG;?>" />
                        
                        
                        

                <input name="admin_colour_master_bg" type="hidden" value="<?php echo $mainBG;?>"/>

                        <input name="admin_colour_dashboard" type="hidden" value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_posts" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_posts_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_media" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_media_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_page" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_page_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_comments" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_comments_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_appearance" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_appearance_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_plugins" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_plugins_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_users" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_users_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_tools" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_tools_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_settings" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_settings_text" type="hidden" value="<?php echo $mainTxt;?>" />
                    
                        
                        
                          <!-- ICONS -->
                        <input name="admin_colour_dashboard_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_posts_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_media_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_page_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_comments_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_appearance_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_plugins_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_users_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_settings_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_tools_icon" type="hidden" value="fff" />
                        
                        
                        
                        
                        
        <input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="admin_colour_settings_icon,admin_colour_tools_icon,admin_colour_users_icon,admin_colour_plugins_icon,admin_colour_appearance_icon,admin_colour_comments_icon,admin_colour_page_icon,admin_colour_media_icon,admin_colour_posts_icon,admin_colour_drop_text,admin_colour_drop_bg,admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text,admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text, admin_colour_master_bg, admin_colour_dashboard_icon" />
        
        
        <p>
        <input type="submit" value="<?php _e('Activate') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->


<!-- ''''''''''' START THEME '''''''''''' -->
     <?php $mainBG ='fcff00'; $mainTxt ='000'; $mainTxtNameOfTheme = 'All Pink';?>
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3><?php echo $mainTxtNameOfTheme;?></h3>
   
                <p style="background-color:#<?php echo $mainBG;?>; color:#<?php echo $mainTxt;?>; padding:2px;">Example</p>
                    <input name="admin_colour_active" type="hidden"  value="0074A2" />
                        <input name="admin_colour_active_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        
                        
                        <input name="admin_colour_drop_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_drop_bg" type="hidden" value="<?php echo $mainBG;?>" />
                        
                        
                        

                <input name="admin_colour_master_bg" type="hidden" value="<?php echo $mainBG;?>"/>

                        <input name="admin_colour_dashboard" type="hidden" value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_posts" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_posts_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_media" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_media_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_page" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_page_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_comments" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_comments_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_appearance" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_appearance_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_plugins" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_plugins_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_users" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_users_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_tools" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_tools_text" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_settings" type="hidden"  value="<?php echo $mainBG;?>" />
                        <input name="admin_colour_settings_text" type="hidden" value="<?php echo $mainTxt;?>" />
                    
                        
                        
                          <!-- ICONS -->
                        <input name="admin_colour_dashboard_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_posts_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_media_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_page_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_comments_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_appearance_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_plugins_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_users_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_settings_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        <input name="admin_colour_tools_icon" type="hidden" value="<?php echo $mainTxt;?>" />
                        
                        
                        
                        
                        
        <input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="admin_colour_settings_icon,admin_colour_tools_icon,admin_colour_users_icon,admin_colour_plugins_icon,admin_colour_appearance_icon,admin_colour_comments_icon,admin_colour_page_icon,admin_colour_media_icon,admin_colour_posts_icon,admin_colour_drop_text,admin_colour_drop_bg,admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text,admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text, admin_colour_master_bg, admin_colour_dashboard_icon" />
        
        
        <p>
        <input type="submit" value="<?php _e('Activate') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->


<!-- ''''''''''' START THEME - Default '''''''''''' -->
        <div style="border:#333333 solid 1px; padding:10px; width:100px; float:left;"> 
        <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <h3><a href="http://www.alex-wells.co.uk" target="_blank">Alex-wells.co.uk</a></h3>
                <p style="background-color:#FFA836; color:#fff; padding:2px;">Dashboard</p>
                <p style="background-color:#00CC42; color:#fff; padding:2px;">Posts</p>
                <p style="background-color:#C225ED; color:#fff; padding:2px;">Media</p>
                <p style="background-color:#3A9BEE; color:#fff; padding:2px;">Pages</p>
                <p style="background-color:#43CCC9; color:#fff; padding:2px;">Comments</p>

        <input name="admin_colour_master_bg" type="hidden" value="22272C"/>
                        <input name="admin_colour_dashboard" type="hidden" value="ffa836" />
                        <input name="admin_colour_dashboard_text" type="hidden"  value="ffffff" />
                        <input name="admin_colour_posts" type="hidden"  value="2acc15" />
                        <input name="admin_colour_posts_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_media" type="hidden"  value="BC1FF6" />
                        <input name="admin_colour_media_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_page" type="hidden"  value="3a9bee" />
                        <input name="admin_colour_page_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_comments" type="hidden"  value="43CCC9" />
                        <input name="admin_colour_comments_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_appearance" type="hidden"  value="23282D" />
                        <input name="admin_colour_appearance_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_plugins" type="hidden"  value="23282D" />
                        <input name="admin_colour_plugins_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_users" type="hidden"  value="23282D" />
                        <input name="admin_colour_users_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_tools" type="hidden"  value="23282D" />
                        <input name="admin_colour_tools_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_settings" type="hidden"  value="23282D" />
                        <input name="admin_colour_settings_text" type="hidden" value="ffffff" />
                        <input name="admin_colour_active" type="hidden"  value="0074A2" />
                        <input name="admin_colour_active_text" type="hidden" value="fff" />

                        <input name="admin_colour_drop_text" type="hidden" value="fff" />
                        <input name="admin_colour_drop_bg" type="hidden" value="32373C" />
                        
                        <!-- ICONS -->
                        <input name="admin_colour_dashboard_icon" type="hidden" value="fff" />
                        <input name="admin_colour_posts_icon" type="hidden" value="fff" />
                        <input name="admin_colour_media_icon" type="hidden" value="fff" />
                        <input name="admin_colour_page_icon" type="hidden" value="fff" />
                        <input name="admin_colour_comments_icon" type="hidden" value="fff" />
                        <input name="admin_colour_appearance_icon" type="hidden" value="fff" />
                        <input name="admin_colour_plugins_icon" type="hidden" value="fff" />
                        <input name="admin_colour_users_icon" type="hidden" value="fff" />
                        <input name="admin_colour_settings_icon" type="hidden" value="fff" />
                        <input name="admin_colour_tools_icon" type="hidden" value="fff" />
                      
                      
                      
                      
                      
                      
  
                        
                        
                        
        <input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="admin_colour_settings_icon,admin_colour_tools_icon,admin_colour_users_icon,admin_colour_plugins_icon,admin_colour_appearance_icon,admin_colour_comments_icon,admin_colour_page_icon,admin_colour_media_icon,admin_colour_posts_icon,admin_colour_drop_text,admin_colour_drop_bg,admin_colour_dashboard, admin_colour_dashboard_text, admin_colour_posts, admin_colour_posts_text, admin_colour_media, admin_colour_media_text,admin_colour_page, admin_colour_page_text, admin_colour_comments, admin_colour_comments_text, admin_colour_appearance, admin_colour_appearance_text, admin_colour_plugins, admin_colour_plugins_text, admin_colour_users, admin_colour_users_text, admin_colour_tools, admin_colour_tools_text, admin_colour_settings, admin_colour_settings_text, admin_colour_active, admin_colour_active_text, admin_colour_master_bg, admin_colour_dashboard_icon" />
        
        <p>
        <input type="submit" value="<?php _e('Activate') ?>" />
        </p>
        
        </form>
        </div>
<!-- ''''''''''' END THEME '''''''''''' -->





</div><!--End the page i think-->
<?php
}
?>