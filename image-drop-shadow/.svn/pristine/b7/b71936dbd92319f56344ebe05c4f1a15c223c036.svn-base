<?php
/*
Plugin Name: Image Drop Shadow
Plugin URI: http://alexpolski.com/projects/image-drop-shadow-wordpress-plugin/
Description: Image Drop Shadow wordpress plugin adds stylish drop shadow to
images posted on your blog using jQuery. The plugin uses the method described
by Brian Williams in the article "Onion Skinned Drop Shadows".
Version: 1.1
Author: Alex Polski
Author URI: http://alexpolski.com/
*/

/*  Copyright 2008-2009  Alex Polski  (email : ap@alexpolski.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function ids_init()
{
  wp_enqueue_script('jquery');
}

function ids_head()
{
  $imagepath = get_bloginfo('wpurl') . '/wp-content/plugins/image-drop-shadow/images/';
?>
<style type="text/css">
<!--
/*styles added by Image Drop Shadow plugin*/
.ids_wrap1, .ids_wrap2, .ids_wrap3 { display: inline-table; /* \*/display: block;/**/ }
.ids_wrap1 { float: left; background: url('<?php echo $imagepath; ?>shadow.gif') right bottom no-repeat; }
.ids_wrap2 { background: url('<?php echo $imagepath; ?>corner_bl.gif') -4px 100% no-repeat; }
.ids_wrap3 { padding: 0 5px 5px 0; background: url('<?php echo $imagepath; ?>corner_tr.gif') 100% -3px no-repeat; }
.ids_wrap3 img { display: block; border: 1px solid #ccc; border-color: #efefef #ccc #ccc #efefef; }
-->
</style>
<script type="text/javascript">
<!--
/*code added by Image Drop Shadow plugin*/
  jQuery(document).ready(function() {
    jQuery('div.ids_container a img').parents('a').wrap('<div class="ids_wrap1"><div class="ids_wrap2"><div class="ids_wrap3"></div></div></div>');
    jQuery('div.ids_container img').not(jQuery('div.ids_container a img')).wrap('<div class="ids_wrap1"><div class="ids_wrap2"><div class="ids_wrap3"></div></div></div>');
  });
-->
</script>
<?php
}

add_action('init', 'ids_init');
add_action('wp_head', 'ids_head');

function ids_content($content = '')
{
  return '<div class="ids_container" style="overflow: hidden;">' . $content . '</div>';
}

add_filter('the_content', 'ids_content');
add_filter('the_excerpt', 'ids_content');
?>
