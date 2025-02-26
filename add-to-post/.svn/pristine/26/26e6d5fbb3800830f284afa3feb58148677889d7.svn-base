<?php
/*
Plugin Name: Add To Post
Plugin URI: http://www.Get10000Subscribers.com/add-to-post/
Description: Add To Post allows you to add additional content to either the start, end or both areas of your blog posts.
Version: 1.0
Author: Howie Nguyen
Author URI: http://www.HowWhoWhen.com
*/

/*  Copyright 2012 Howie Nguyen (email : howie [at] howwhowhen.com)

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

if(is_admin()) {
  add_action('admin_menu', 'gts_addtopost_menu');
  add_action('admin_init', 'gts_addtopost_register');
}

function gts_addtopost_register() {
  register_setting('gts_addtopost_optiongroup', 'gts_addtopost_top_enabled');
  register_setting('gts_addtopost_optiongroup', 'gts_addtopost_top');
  register_setting('gts_addtopost_optiongroup', 'gts_addtopost_bottom_enabled');
  register_setting('gts_addtopost_optiongroup', 'gts_addtopost_bottom');
}

function gts_addtopost_menu() {
  add_options_page('Add To Post Settings', 'Add To Post', 'manage_options', 'add-to-post', 'gts_addtopost_options');
}

function gts_addtopost_options() { ?>
  <div class="wrap">
    <div id="icon-options-general" class="icon32"><br /></div>
    <h2>Add To Post</h2>
    by <strong>Howie Nguyen</strong> of <a href="http://Get10000Subscribers.com">Get10000Subscribers.com</a>
    <p>Add To Post allows you to add additional content to either the start, end or both areas of your blog posts. You can use it to add AdSense code, opt-in forms or notifications such as disclaimers and disclosures to all your posts.</p>
    <form method="post" action="options.php">
    <?php settings_fields('gts_addtopost_optiongroup'); ?>
    <h3 style="margin-top: 10px;">Add To Top Of All Posts</h3>
    <p>Enable this section to add content to the start of all your posts.</p>
    <input type="checkbox" name="gts_addtopost_top_enabled" value="1" <?php checked( get_option('gts_addtopost_top_enabled'), 1 ); ?> />
    <label for="gts_addtopost_top_enabled">Enable</label><br />
    <textarea name="gts_addtopost_top" style="width: 90%; height: 150px;"><?php echo get_option('gts_addtopost_top'); ?></textarea>
    <h3 style="margin-top: 10px;">Add To Bottom Of All Posts</h3>
    <p>Enable this section to add content to the end of all your posts.</p>
    <input type="checkbox" name="gts_addtopost_bottom_enabled" value="1" <?php checked( get_option('gts_addtopost_bottom_enabled'), 1 ); ?> />
    <label for="gts_addtopost_bottom_enabled">Enable</label><br />
    <textarea name="gts_addtopost_bottom" style="width: 90%; height: 150px;"><?php echo get_option('gts_addtopost_bottom'); ?></textarea>
    <p class="submit">
      <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
    </p>		
    </form>
  </div>
<?php }

function gts_addtopost($content) {
  if(is_single()) {
    if(get_option('gts_addtopost_top_enabled')) {
      $content = get_option('gts_addtopost_top') . $content;
    }
    if(get_option('gts_addtopost_bottom_enabled')) {
      $content = $content . get_option('gts_addtopost_bottom');
    }
  }
  return $content;
}

add_filter('the_content', 'gts_addtopost');
?>
