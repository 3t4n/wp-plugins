<?php
/*
Plugin Name: AJAX Page Loader
Version: 1.0
Plugin URI: http://www.lukehowell.com/ajax-page-loader/
Description: Load pages within blog without reloading page.  
Author: Luke Howell
Author URI: http://www.lukehowell.com/

---------------------------------------------------------------------
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
---------------------------------------------------------------------
*/

/*
Version 1.0 First Release.
*/

if(!function_exists('get_option'))
  require_once('../../../wp-config.php');

// Define path locations for page loader directory and file
define('PLUGIN_AJAXPAGELOADER_PATH', '/wp-content/plugins/ajax-page-loader/');

// Set Hook for outputting JavaScript
add_action('wp_head','ajax_page_loader_js');
function ajax_page_loader_js() {?>
  <script type="text/javascript" src="<?=get_settings('siteurl').PLUGIN_AJAXPAGELOADER_PATH?>jquery.js"></script>
  <script type="text/javascript" src="<?=get_settings('siteurl').PLUGIN_AJAXPAGELOADER_PATH?>ajax-page-loader.js"></script>
  <script type="text/javascript" src="<?=get_settings('siteurl').PLUGIN_AJAXPAGELOADER_PATH?>querystring.js"></script>
  <script type="text/javascript">
    if (document.images){
      loadingIMG= new Image(16,16); 
      loadingIMG.src="<?=get_settings('siteurl').PLUGIN_AJAXPAGELOADER_PATH?>loading.gif";
    }
    var siteurl="<?=get_settings('siteurl')?>";
    var home="<?=get_settings('home')?>";
    if(window.location!=home+'/')
      window.location=home+'/';
  </script>
<?php }?>