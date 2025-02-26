<?php
/*
 Plugin Name: Admin Big Width
 Plugin URI: http://www.xorax.info/blog/programmation/plugin-wordpress-25-admin-100
 Description: enlarge your wordpress administration. 
 Version: 1.0
 Author: XoraX
 Author URI: http://www.xorax.info/
*/

function AdminBigWidth () {
  echo '<style type="text/css">.wrap{max-width:none}</style>';
}
add_action('admin_head','AdminBigWidth');
