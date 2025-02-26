<?php
/*
Plugin Name: Sencha.io Src for WordPress
Plugin URI: http://mark-kirby.co.uk/2011/auto-tinysrc-wordpress-plugin
Description: Passes all images through the tinysrc service, optimising all your images for mobile.
Version: 1.1
Author: Mark Kirby/ribot
Author URI: http://ribot.co.uk
License: GPL2
*/
/*  Copyright 2010  ribot  (email : mark.kirby@ribot.co.uk)

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
add_option('tinysrc_url', 'http://src.sencha.io/');
add_filter('the_content', 'tinysrc_process', 100);
function tinysrc_process($content) {
   return preg_replace_callback('{(<img.*src=")(.*?)(".*\/>)}', 'tinysrc_process_matches', $content);
}
function tinysrc_process_matches($matches) {
   $tinySrcUrl = get_option('tinysrc_url');
   $tinySrcReplaced = "$matches[1]$tinySrcUrl/$matches[2]$matches[3]";
   $widthRemoved = preg_replace('{width=".*"}', "", $tinySrcReplaced);
   return preg_replace('{height=".*"}', "", $widthRemoved);
}
function get_tinysrc_image($imageUrl, $echo = true) {
   $tinysrc_image = get_option('tinysrc_url').$imageUrl;
   if ($echo) {
      echo $tinysrc_image;
   } else {
      return $tinysrc_image;
   }
}

// create custom plugin settings menu
add_action('admin_menu', 'auto_tinysrc_create_menu');

function auto_tinysrc_create_menu() {

   add_options_page( 'Sencha.io Src Options', 'Sencha.io Src', 'manage_options', 'auto-tinysrc-options', 'auto_tinysrc_settings_page');

}


function auto_tinysrc_settings_page() {
?>
<div class="wrap">
   <h2>Auto TinySrc</h2>
   <form method="post" action="options.php">
      <?php wp_nonce_field('update-options'); ?>
      <table class="form-table">
         <tr valign="top">
            <th scope="row">TinySrc url:</th>
            <td><input type="text" name="tinysrc_url" value="<?php echo get_option('tinysrc_url'); ?>" /></td>
         </tr>
      </table>
      <input type="hidden" name="action" value="update" />
      <input type="hidden" name="page_options" value="tinysrc_url" />
      <p class="submit">
         <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
      </p>
   </form>
</div>
<?php } 
