<?php
/* 
Plugin Name:  140follow
Plugin URI:   http://netreview.de/wordpress/wordpress-plugin-140follow-fur-alle/
Description:  140follow removes NOFOLLOW from author link if the comment has more than XXX characters.
Version:      2.0
Author:       Daniel B.
Author URI:   http://netreview.de
*/

/*
  Copyright 2009  NetReview.de (Daniel B.)  (email : kontakt@netreview.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

if ( ! defined( 'WP_PLUGIN_URL' ) )
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins' );
      
      
if (is_admin()) {
  register_activation_hook  ( __FILE__, 'wp_140follow_install'  );
  register_deactivation_hook( __FILE__, 'wp_140follow_uninstall');
  
  add_action('admin_menu', 'wp_140follow_admin_menu');
}      

/*
 * @brief Ads 140follow options to WP database
 */
function wp_140follow_install() {
  global $wpdb, $dbfollow_options;
  
  // Check options 
  if (!get_option('dbfollow_options')) {
    
    add_option('dbfollow_options', 
               array('follow_count' => '140', 
                     'follow_js' => '1')
    );
  }   
}

/*
 * @brief Removes the 140follow options from WP database
 */
function wp_140follow_uninstall() {
  // Delete 140follow options
  delete_option('dbfollow_options');  
}

/*
 * @brief Ads options page in the admin section
 */
function wp_140follow_admin_menu() {
  add_submenu_page('options-general.php', '140follow', '140follow', 8, '140follow', 'wp_140follow_options');  
}

/*
 * @brief Manages 140follow options
 */
function wp_140follow_options() {
  global $wpdb, $dbfollow_options;
  
  if (!empty($_POST['followsave'])) {
      check_admin_referer('140follow');
      
      $dbfollow_options['follow_count'] = trim($_POST['followcount']);
      $dbfollow_options['follow_js']    = trim($_POST['followjs']);
      
      update_option('dbfollow_options', $dbfollow_options);
      
      echo '<div id="message" class="update fade">
             <p>' . __('Settings saved successfully.', '140follow') . '</p>
            </div>' . "\n";   
  }
  
  $dbfollow_options = get_option('dbfollow_options');
  
  ?>
  <div class="wrap">
    <div id="icon-options-general" class="icon32"><br /></div>  
    <h2>140follow Settings</h2>
    
    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
      <table class="form-table">
        <tr>
          <th scope="row">
            Character Count:
          </th>
          <td>
            <input size="15" type="text" name="followcount" value="<?php echo htmlspecialchars($dbfollow_options['follow_count']); ?>" />
          </td>
          <td>
            How many characters to make the link DoFollow?
          </td>
        </tr>
        <tr>
          <th scope="row">
            Use JavaScript:
          </th>
          <td>
            <select name="followjs">
            <option value="0" <?php if ($dbfollow_options['follow_js'] == '0'): ?>selected="selected"<?php endif; ?>>No</option>
            <option value="1" <?php if ($dbfollow_options['follow_js'] == '1'): ?>selected="selected"<?php endif; ?>>Yes</option>
            </select>              
          </td>
          <td>
            If you use the javascript character counter, you have to modify your theme a little bit ;)
          </td>            
        </tr>  
        <tr>
          <td colspan="3">
            <?php wp_nonce_field('140follow'); ?>
            <span class="submit"><input name="followsave" value="<?php _e('Save Changes'); ?>" type="submit" /></span>
          </td>
        </tr>        
      </table>
    </form>
       
    <h3>Usage</h3>    
    
    <div>
      <h4>JavaScript Enabled</h4>
      <ol>
        <li>Go to your theme directory and open "comments.php"</li>
        <li>Find <code>&lt;form action="&lt;?php echo get_option('siteurl');</code></li>
        <li>Add on the end of this line (before last "&gt;"):
          <ul>
            <li><code>name="commentform"</code></li>
          </ul>
        </li>
        <li>Find <code>&lt;p&gt;&lt;textarea name="comment" id="comment"</code></li>
        <li>Add after this line the following code:
          <ul>
            <li><code>&lt;p&gt;&lt;script&gt;displaylimit("document.commentform.comment",&lt;?php $followopt = get_option('dbfollow_options'); echo $followopt['follow_count']; ?&gt;)&lt;/script&gt;&lt;/p&gt;</code></li>
          </ul>
        </li>
      </ol>
      <h4>JavaScript Disabled</h4>
        <ul>
          <li>Remove this line from your "comments.php" if exists: 
            <ul>
              <li><code>&lt;p&gt;&lt;script&gt;displaylimit("document.commentform.comment",&lt;?php $followopt = get_option('dbfollow_options'); echo $followopt['follow_count']; ?&gt;)&lt;/script&gt;&lt;/p&gt;</code></li>
            </ul>
          </li>        
        </ul>
    </div>
    
    <h3>Donation</h3>
     
    <table class='form-table'>
      <tr>
        <td> 
         <form style="display:inline" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_new">
          <input name="cmd" value="_s-xclick" type="hidden">
          <input name="hosted_button_id" value="6513268" type="hidden">
          <input name="item_name" value="140follow Donation" type="hidden">
          <input name="no_note" value="1" type="hidden">
          <input name="currency_code" value="EUR" type="hidden">
          <input name="tax" value="0" type="hidden">
          <input name="bn" value="PP-DonationsBF" type="hidden">
          <input value="Donate" name="submit" alt="Donation via PayPal : fast, simple and secure!" border="0" type="submit">
         </form>
          Does this plugin make you happy? Do you find it useful? 
          <br />If you think this plugin helps you, please consider donating. 
          <br /><strong>Thank you for your support!</strong>
        </td>
      </tr>
    <tr><td>
      <strong>140follow Plugin by <a href="http://netreview.de" target="_blank" title="NetReview">NetReview.de</a> </strong> 
    </td></tr>    
    
    </table>    
    
  </div>
  <?php 
}

function wp_140follow_js() {
  global $wpdb;
  
  $dbfollow_options = get_option('dbfollow_options');
  
  if ($dbfollow_options['follow_js'] == '1') {
    echo "\n".'<!-- BEGIN Plugin: 140follow -->'."\n";
    echo '<script src="'.WP_PLUGIN_URL.'/140follow/140follow.js" type="text/javascript"></script>';
    echo "\n".'<!-- END   Plugin: 140follow -->'."\n";
  }
  else {
    echo "\n".'<!-- This Page is powered by 140follow Plugin (NON-JS) -->'."\n";    
  }
  
}

function wp_140follow_make_dofollow($ret) {
  global $wpdb, $comment;
  
  $dbfollow_options = get_option('dbfollow_options');
  
  if (eregi('dontfollow', $ret)) {
    $ret = preg_replace("/\/dontfollow'/","' ",  $ret); 
    $ret = preg_replace("/\/dontfollow\"/","\" ",$ret);
  } 
  else {    
    $chars = strlen($comment->comment_content);
    
    if ($chars >= intval($dbfollow_options['follow_count'])) {    
      $ret = preg_replace("/ rel='external nofollow'/"," rel='external'",$ret); 
      $ret = preg_replace("/ rel=\"external nofollow\"/"," rel='external'",$ret);
    }
  }
  
  return $ret; 
} 

/**** HOOKS ****/
add_action('wp_head', 'wp_140follow_js');
add_filter('get_comment_author_link', 'wp_140follow_make_dofollow'); 

?>