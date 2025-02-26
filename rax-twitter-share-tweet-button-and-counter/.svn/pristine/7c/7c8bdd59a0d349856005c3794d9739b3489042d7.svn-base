<?php
/*
Plugin Name: RAX - Twitter Share Tweet Button And Counter
Plugin URI: http://www.programmingfacts.com/wordpress-rax-twitter-share-tweet-button-counter/
Description: This will automatically add a Twitter Tweet Share Button after content or below content. This is light weight simple plugin which helps you and your visitors to share the post in twitter by just a one click.
Version: 1.0
Author: Rakshit Patel
Author URI: http://www.programmingfacts.com
License: GPL2
*/

/*  Copyright 2010  Rakshit Patel  (email : raxit4u2@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

	add_option("rax_twitter_button_position","top"); // default position
	add_option("rax_twitter_button_counter","1"); // by default show counter
	add_option("rax_twitter_button_layout","vertical"); // default layout
	add_option("rax_twitter_button_language","en"); // default language
	add_option("rax_twitter_button_alignment","right"); // default alignment


	add_action('admin_menu', 'rax_twitter_share_tweet_button_counter_menu_options');
	
	add_action("the_content",'rax_twitter_share_tweet_button_counter_show_options');
	
	function rax_twitter_share_tweet_button_counter_menu_options() {
	
	  add_options_page('RAX - Twitter Share Tweet Button And Counter', ' RAX - Twitter Share Tweet Button And Counter', 'manage_options', 'rax-twitter-share-tweet-button-options', 'rax_twitter_share_tweet_button_options');
	
	}
	
	function rax_twitter_share_tweet_button_options() {
	
	  if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	  }
?>	
	  <div style="width:95%; font-size:11px; padding:3px 3px 3px 15px;">
	  <p style="font-size:20px; background-color:#4086C7; color:#FFF; width:90%; padding:2px;">Set Options for RAX - Twitter Share Tweet Button And Counter</p>
	  <p>
			<form method="post" action="options.php">
				<?php wp_nonce_field('update-options');?>
				<table width="100%" border="0" cellspacing="8" cellpadding="0">
                  <tr>
                  	<td align="left" colspan="3"><h2>Button Settings</h2></td>
                  </tr>
                  <tr>
                  	<td width="15%" align="left" valign="top">Button Position : </td>
                    <td width="25%" align="left" valign="top">
                    	<select name="rax_twitter_button_position" id="rax_twitter_button_position">
                        	<option value="top" <?php if(get_option('rax_twitter_button_position') == 'top') echo 'selected="selected"';?>>Above Post</option>
                        	<option value="bottom" <?php if(get_option('rax_twitter_button_position') == 'bottom') echo 'selected="selected"';?>>Below Post</option>
                        	<option value="both" <?php if(get_option('rax_twitter_button_position') == 'both') echo 'selected="selected"';?>>Above as well as Below Post</option>
                        </select>
                    </td>
					<td align="left" valign="top"><span style="font-size:10px; color:#333333;">( Where to show tweet share button)</span></td>
                  </tr>
                  <tr>
                  	<td align="left" valign="top">Show Counter : </td>
                    <td align="left" valign="top"><input type="checkbox" name="rax_twitter_button_counter" id="rax_twitter_button_counter" value="none" <?php if(get_option('rax_twitter_button_counter') == "none") echo 'checked="checked"'; ?> />&nbsp;No</td>
					<td align="left" valign="top"><span style="font-size:10px; color:#333333;">(Want to show number of tweets count ?)</span></td>
                  </tr>
                  <tr>
                  	<td align="left" valign="top">Button Layout : </td>
                    <td align="left" valign="top">
                      	<select name="rax_twitter_button_layout" id="rax_twitter_button_layout">
                        	<option value="horizontal" <?php if(get_option('rax_twitter_button_layout') == 'horizontal') echo 'selected="selected"';?>>Horizontal</option>
                        	<option value="vertical" <?php if(get_option('rax_twitter_button_layout') == 'vertical') echo 'selected="selected"';?>>Vertical</option>
                        </select>
					</td>
					<td align="left" valign="top"><span style="font-size:10px; color:#333333;">( Want a Horizontal button or vertical button ?)</span></td>
                  </tr>
                  
                  <tr>
                  	<td align="left" valign="top">Language : </td>
                    <td align="left" valign="top">
                      <select name="rax_twitter_button_language" id="rax_twitter_button_language">
                          <option value="en" <?php if(get_option('rax_twitter_button_language') == 'en') echo 'selected="selected"';?>>English</option>
                          <option value="fr" <?php if(get_option('rax_twitter_button_language') == 'fr') echo 'selected="selected"';?>>French</option>
                          <option value="de" <?php if(get_option('rax_twitter_button_language') == 'de') echo 'selected="selected"';?>>German</option>
                          <option value="es" <?php if(get_option('rax_twitter_button_language') == 'es') echo 'selected="selected"';?>>Spanish</option>
                          <option value="ja" <?php if(get_option('rax_twitter_button_language') == 'ja') echo 'selected="selected"';?>>Japanese</option>
                      </select>
					</td>
					<td align="left" valign="top"><span style="font-size:10px; color:#333333;">( Want to show in different language ?)</span></td>
                  </tr>
                  
                  <tr>
                  	<td align="left" colspan="3"><h2>CSS Settings</h2></td>
                  </tr>
                  
                  <tr>
                  	<td align="left" valign="top">Alignment : </td>
                    <td align="left" valign="top">
                    	<select name="rax_twitter_button_alignment" id="rax_twitter_button_alignment">
                        	<option value="left" <?php if(get_option('rax_twitter_button_alignment') == 'left') echo 'selected="selected"';?>>Left</option>
                        	<option value="right" <?php if(get_option('rax_twitter_button_alignment') == 'right') echo 'selected="selected"';?>>Right</option>
                        </select>
                      </td>
					<td align="left" valign="top"><span style="font-size:10px; color:#333333;">(Button Alignment)</span></td>
                  </tr>
                  
				  <tr>
                  	<td align="left" valign="top">&nbsp;</td>
                    <td align="left" valign="top"><input type="submit" value="<?php _e('Update Options')?>" /></td>
					<td align="left" valign="top">&nbsp;</td>
                  </tr>
				</table>
				
				
				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="rax_twitter_button_position,rax_twitter_button_counter,rax_twitter_button_layout,rax_twitter_button_language,rax_twitter_button_alignment" />
			</form>
	  </p>
	  </div>
<?php				
	}

	function rax_twitter_share_tweet_button_counter_show_options($post_content)
	{
		if( is_single() )
		{
			$rax_twitter_button_position = get_option("rax_twitter_button_position"); // get twitter button position
			$rax_twitter_button_counter = get_option("rax_twitter_button_counter"); // get twitter button counter option
			$rax_twitter_button_layout = get_option("rax_twitter_button_layout"); // get twitter button layout
			$rax_twitter_button_language = get_option("rax_twitter_button_language"); // get twitter button language
			$rax_twitter_button_alignment = get_option("rax_twitter_button_alignment"); // get twitter button alignment
			
			$data_count = "data-count";
			$data_lang = "";
			
			// set the counter
			if($rax_twitter_button_counter == "none") {
				$data_count .= ' = "none"';
			}
			// set layout
			else if($rax_twitter_button_layout) {
				$data_count .= ' = "'.$rax_twitter_button_layout.'"';
			}
			else {
				$data_count .= ' = "vertical"';
			}
			
			
			// set language variable if set
			if($rax_twitter_button_language != 'en') {
				$data_lang = 'data-lang="'.$rax_twitter_button_language.'"';
			}
			
			// make a tweet button
			$rax_tweet_ready_show = '<div style="float:'.$rax_twitter_button_alignment.'; margin:0px 10px 10px 10px; margin-'.$rax_twitter_button_alignment.':0px;">			
			<a href="http://twitter.com/share" class="twitter-share-button" '.$data_count.' '.$data_lang.'>Tweet</a>
			<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
			</div>';
			
			// put twitter button as per position selected
			if($rax_twitter_button_position == 'bottom') {
				$post_content .= $rax_tweet_ready_show;
			}
			else if($rax_twitter_button_position == 'top') {
				$post_content = $rax_tweet_ready_show.$post_content;
			}
			else {
				$post_content .= $rax_tweet_ready_show;
				$post_content = $rax_tweet_ready_show.$post_content;
			}
			
		}
		
		return  $post_content;

	}
?>