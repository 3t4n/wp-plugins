<?php
/*
Plugin Name: Addmarx - Bookmark/Share/Email Dropdown
Plugin URI: http://www.addmarx.com/wordpress_plugin.php
Description: Let your blog readers bookmark, email, share and link to your pages. [<br><a href="options-general.php?page=addmarx.php">Customization Options</a>]
Version: 1.1.7
Author: Addmarx
Author URI: http://www.addmarx.com/
*/

/*  Copyright 2009  Addmarx  (email : addmarx@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

   
*/





function ADDMARX_options_page() {

$addmarx_wpurl = get_bloginfo('wpurl');

    if( $_POST[ 'ADDMARX_submit_hidden' ] == 'Y' ) {
        $addmarx_js_stripped_update = stripslashes($_POST['ADDMARX_js']);
        $addmarx_js_stripped_update_2 = preg_replace('/http:\/\/www.addmarx.com\/bookmarx2.png/', $addmarx_wpurl.'/wp-content/plugins/addmarx/bookmarx2.png' , $addmarx_js_stripped_update, 1);
$addmarx_js_stripped_update_3 = preg_replace('/http:\/\/www.addmarx.com\/bookmarx.png/', $addmarx_wpurl.'/wp-content/plugins/addmarx/bookmarx.png' , $addmarx_js_stripped_update_2, 1);
$addmarx_js_stripped_update_4 = preg_replace('/http:\/\/www.addmarx.com\/sharemarx.png/', $addmarx_wpurl.'/wp-content/plugins/addmarx/sharemarx.png' , $addmarx_js_stripped_update_3, 1);
$addmarx_js_stripped_update_5 = preg_replace('/http:\/\/www.addmarx.com\/sharemarx2.png/', $addmarx_wpurl.'/wp-content/plugins/addmarx/sharemarx2.png' , $addmarx_js_stripped_update_4, 1);
$addmarx_js_stripped_update_6 = preg_replace('/http:\/\/www.addmarx.com\/emailmarx.png/', $addmarx_wpurl.'/wp-content/plugins/addmarx/emailmarx.png' , $addmarx_js_stripped_update_5, 1);
$addmarx_js_stripped_update_7 = preg_replace('/http:\/\/www.addmarx.com\/sharebookmarx.png/', $addmarx_wpurl.'/wp-content/plugins/addmarx/sharebookmarx.png' , $addmarx_js_stripped_update_6, 1);
$addmarx_js_stripped_update_8 = preg_replace('/http:\/\/www.addmarx.com\/shareemailbookmarx.png/', $addmarx_wpurl.'/wp-content/plugins/addmarx/shareemailbookmarx.png' , $addmarx_js_stripped_update_7, 1);
$addmarx_js_stripped_update_9 = preg_replace('/http:\/\/www.addmarx.com\/shareemaillinkbookmarx.png/', $addmarx_wpurl.'/wp-content/plugins/addmarx/shareemaillinkbookmarx.png' , $addmarx_js_stripped_update_8, 1);
$addmarx_js_stripped_update_10 = preg_replace('/http:\/\/www.addmarx.com\/linkmarx.png/', $addmarx_wpurl.'/wp-content/plugins/addmarx/linkmarx.png' , $addmarx_js_stripped_update_9, 1);

if($_POST[ 'ADDMARX_mouseover' ] == '1')   {

$addmarx_js_stripped_update_10 = str_replace("clickDynamic1(this); return false;\" href=\"http://www.addmarx.com\"><img", "clickDynamic1(this); return false;\" onmouseover=\"clickDynamic2(this); return false;\" href=\"http://www.addmarx.com/wordpress_plugin.php\"><img alt=\"WordPress Plugin Share Bookmark Email\" ", $addmarx_js_stripped_update_10);

}

if($_POST[ 'ADDMARX_mouseover' ] != '1')   {

$addmarx_js_stripped_update_10 = str_replace("onmouseover=\"clickDynamic2(this); return false;\" href=\"http://www.addmarx.com/wordpress_plugin.php\"><img alt=\"WordPress Plugin Share Bookmark Email\" ", "href=\"http://www.addmarx.com\"><img ", $addmarx_js_stripped_update_10);

}

if($_POST[ 'ADDMARX_spacer' ] == '1')   {

$addmarx_js_stripped_update_10 = str_replace("</iframe></span>", "</iframe></span><p class=\"addmarx_spacer\"></p>", $addmarx_js_stripped_update_10);
$addmarx_js_stripped_update_10 = str_replace("<p class=\"addmarx_spacer\"></p><p class=\"addmarx_spacer\"></p>", "<p class=\"addmarx_spacer\"></p>", $addmarx_js_stripped_update_10);

}

if($_POST[ 'ADDMARX_spacer' ] != '1')   {

$addmarx_js_stripped_update_10 = str_replace("<p class=\"addmarx_spacer\"></p>", " ", $addmarx_js_stripped_update_10);

}




            update_option( 'ADDMARX_main', ($_POST['ADDMARX_main']=='1') ? '1':'-1' );
		update_option( 'ADDMARX_posts', ($_POST['ADDMARX_posts']=='1') ? '1':'-1' );
		update_option( 'ADDMARX_pages', ($_POST['ADDMARX_pages']=='1') ? '1':'-1' );
            update_option( 'ADDMARX_mouseover', ($_POST['ADDMARX_mouseover']=='1') ? '1':'-1' );
		update_option( 'ADDMARX_spacer', ($_POST['ADDMARX_spacer']=='1') ? '1':'-1' );
		update_option( 'ADDMARX_js', ($_POST['ADDMARX_js']=='') ? '<script type="text/javascript">  linkscolor = "000000";  highlightscolor = "888888";  backgroundcolor = "FFFFFF";  channel = "none";   </script><script type="text/javascript" src="http://www.addmarx.com/dynamicbookmark_compressed.php"></script><span><a onClick="clickDynamic1(this); return false;" href="http://www.addmarx.com"><img style="padding:0px; margin:0px" src="'.$addmarx_wpurl.'/wp-content/plugins/addmarx/sharebookmarx.png" border="0"></a></span><span style="position:absolute; z-index:1000001; margin-top:24px; margin-left:-127px; visibility:hidden;"><iframe id="addmarx_empty" scrolling="no" frameborder="0"></iframe></span><!-- Please place the above code into your site where you want to have a bookmark/share/publicize link. Please do not change any of the code aside from the link text or image, or else the code may not work properly.  -->':$addmarx_js_stripped_update_10 );

		?>
    	<div class="updated fade"><p><strong><?php _e('Settings saved.'); ?></strong></p></div>
		<?
		
    }

    ?>
    
    <div class="wrap">



	<h2><?=__( 'Addmarx Options')?></h2>

    <form method="post" action="options-general.php?page=addmarx.php">
    
	<?php wp_nonce_field('update-options'); ?>
    
    	<input type="hidden" name="ADDMARX_submit_hidden" value="Y">
    
        <table class="form-table">
            <tr valign="top">
            <th scope="row">Placement</th>
            <td>
                <label>
                	<input name="ADDMARX_posts" 
                    	onclick="e=getElementsByName('ADDMARX_main')[0];if(!this.checked){e.checked=false;e.disabled=true}else{e.checked=true;e.disabled=false}"
                        onchange="e=getElementsByName('ADDMARX_main')[0];if(!this.checked){e.checked=false;e.disabled=true}else{e.checked=true;e.disabled=false}"
                        type="checkbox"<? if(get_option('ADDMARX_posts')!='-1') echo ' checked="checked"'; ?> value="1"/>
                	Show Addmarx at the bottom of posts 
                </label><br/>
                <label>
                	&nbsp; &nbsp; &nbsp; <input name="ADDMARX_main" type="checkbox"<? 
						if(get_option('ADDMARX_main')!='-1') echo ' checked="checked"';
						if(get_option('ADDMARX_posts')=='-1') echo ' disabled="disabled"';
						?> value="1"/>
                    Show Addmarx at the bottom of front page posts
				</label><br/>
                <label>
                	<input name="ADDMARX_pages" type="checkbox"<? if(get_option('ADDMARX_pages')!='-1') echo ' checked="checked"'; ?> value="1"/>
                    Show Addmarx at the bottom of pages 				</label>
<br /> <br />
To activate Addmarx as a <strong>sidebar widget</strong>, please visit the <a href="widgets.php">widgets</a> page.<br />
Note: Addmarx as a sidebar widget will not obey any of the above placement settings (it will appear on any page that is defined to have a sidebar widget regardless of the above checkbox options).  However, it will obey all the customization options below (code options as well as customized colors).

                
                            </td>
            </tr>

<tr valign="top">
            <th scope="row">Customization </th>
            <td>
                <label><p>To customize Addmarx <strong>colors</strong> and <strong>button choice</strong>, please go to <a href="http://www.addmarx.com/customizeoptions.php" target="_blank">Addmarx Customization</a> and paste JUST the resulting code into the text area below.  A neutral-colored default will appear if no customization is entered.</p>


                	<textarea name="ADDMARX_js" id="ADDMARX_js" style="height: 80px; width: 500px;">
            <?php if ( get_option('ADDMARX_js')!= '') {
			echo get_option('ADDMARX_js');
                    }  else {
                     echo '<script type="text/javascript">  linkscolor = "000000";  highlightscolor = "888888";  backgroundcolor = "FFFFFF";  channel = "none";   </script><script type="text/javascript" src="http://www.addmarx.com/dynamicbookmark_compressed.php"></script><span><a onClick="clickDynamic1(this); return false;" href="http://www.addmarx.com"><img style="padding:0px; margin:0px" src="'.$addmarx_wpurl.'/wp-content/plugins/addmarx/sharebookmarx.png" border="0"></a></span><span style="position:absolute; z-index:1000001; margin-top:24px; margin-left:-127px; visibility:hidden;"><iframe id="addmarx_empty" scrolling="no" frameborder="0"></iframe></span><p class="addmarx_spacer"></p><!-- Please place the above code into your site where you want to have a bookmark/share/publicize link. Please do not change any of the code aside from the link text or image, or else the code may not work properly.  -->';
} ?>
                  </textarea> 
               </label>

<p><label>
                	<input name="ADDMARX_mouseover" type="checkbox"<? if(get_option('ADDMARX_mouseover')=='1'){ echo ' checked="checked"'; }  ?> value="1"/>
                    Show the Addmarx dropdown when the mouse rolls over the button, as opposed to when it is clicked. 				</label></p>

<p><label>
                	<input name="ADDMARX_spacer" type="checkbox"<? if(get_option('ADDMARX_spacer')!='-1'){ echo ' checked="checked"'; }  ?> value="1"/>
                    <span style="color:red;">For blogs with video and/or Flash: </span>Check this to increase Addmarx spacing on pages with any video/Flash. This option fixes a browser bug in which embedded videos, Flash files, etc. hover over the Addmarx dropdown.  It is highly recommended that you keep this checked, even if your blog is not video/Flash intensive.	</label></p>
                
                            </td>
            </tr>


        </table>
    
        <p class="submit">
            <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>"  />
        </p>
    
    </form>
    </div>

<?
 
}


function ADDMARX_menu() {
	if( current_user_can('manage_options') ) {
	   add_options_page('Addmarx Bookmark/Share Customization', 'Addmarx Options', 8, basename(__FILE__), 'ADDMARX_options_page');
	}
}



function ADDMARX_content($content) {

$addmarx_wpurl = get_bloginfo('wpurl');

$addmarx_content = '<script type="text/javascript">  linkscolor = "000000";  highlightscolor = "888888";  backgroundcolor = "FFFFFF";  channel = "none";   </script><script type="text/javascript" src="http://www.addmarx.com/dynamicbookmark_compressed.php"></script><span><a onClick="clickDynamic1(this); return false;" href="http://www.addmarx.com"><img style="padding:0px; margin:0px" src="'.$addmarx_wpurl.'/wp-content/plugins/addmarx/sharebookmarx.png" border="0"></a></span><span style="position:absolute; z-index:1000001; margin-top:24px; margin-left:-127px; visibility:hidden;"><iframe id="addmarx_empty" scrolling="no" frameborder="0"></iframe></span><p class="addmarx_spacer"></p><!-- Please place the above code into your site where you want to have a bookmark/share/publicize link. Please do not change any of the code aside from the link text or image, or else the code may not work properly.  -->';

if (get_option('ADDMARX_js') != '') {
   $addmarx_content = get_option('ADDMARX_js');
}

if (( !is_page() && !is_single() && ((get_option('ADDMARX_main')=='') || (get_option('ADDMARX_main')=='1'))) || ( !is_page() && is_single() && ((get_option('ADDMARX_posts')=='') || (get_option('ADDMARX_posts')=='1'))) || ( is_page() && ((get_option('ADDMARX_pages')=='') || (get_option('ADDMARX_pages')=='1')))) 

	$content .= $addmarx_content;


 return $content;
}



function ADDMARX_widget($args)
{
	// Pre-2.6 compatibility
	if(!defined('WP_PLUGIN_URL'))
	{
		if(!defined('WP_CONTENT_URL'))
		{
			define('WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
		}
		define('WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins');
	}
	if(!defined('WP_PLUGIN_DIR'))
	{
		if(!defined('WP_CONTENT_DIR'))
		{
			define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
		}
		define('WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins');
	}


     $addmarx_wpurl_widget = get_bloginfo('wpurl');

$addmarx_content_widget = '<script type="text/javascript">  linkscolor = "000000";  highlightscolor = "888888";  backgroundcolor = "FFFFFF";  channel = "none";   </script><script type="text/javascript" src="http://www.addmarx.com/dynamicbookmark_compressed.php"></script><span><a onClick="clickDynamic1(this); return false;" href="http://www.addmarx.com"><img style="padding:0px; margin:0px" src="'.$addmarx_wpurl.'/wp-content/plugins/addmarx/sharebookmarx.png" border="0"></a></span><span style="position:absolute; z-index:1000001; margin-top:24px; margin-left:-127px; visibility:hidden;"><iframe id="addmarx_empty" scrolling="no" frameborder="0"></iframe></span><p class="addmarx_spacer"></p><!-- Please place the above code into your site where you want to have a bookmark/share/publicize link. Please do not change any of the code aside from the link text or image, or else the code may not work properly.  -->';

if (get_option('ADDMARX_js') != '') {
   $addmarx_content_widget = get_option('ADDMARX_js');
}


$addmarx_content_widget = preg_replace('/margin-left:.*px/', 'margin-left:-175px' , $addmarx_content_widget, 1);



	// Set title to null
	$title = "";

	// Help widget to conform to the active theme: before_widget, before_title and after_title
	extract($args);
	echo $before_widget . $before_title . $title . $after_title;


	// Display Addmarx
	echo $addmarx_content_widget;
	

	// Help widget to conform to the active theme: after_widget
	echo $after_widget;


}

function ADDMARX_widget_control()
{
	echo 'To edit Addmarx, please see the <a href="options-general.php?page=addmarx.php">options page</a>';
}

function ADDMARX_widget_init()
{
	if(function_exists('register_sidebar_widget'))
	{
		register_sidebar_widget(__('Addmarx'), 'ADDMARX_widget');
	}

	if(function_exists('register_widget_control'))
	{
		register_widget_control(array(__('Addmarx'), 'widgets'), 'ADDMARX_widget_control');
	}
}

add_action("plugins_loaded", "ADDMARX_widget_init");






add_action('the_content', 'ADDMARX_content');




add_action('admin_menu', 'ADDMARX_menu');

?>