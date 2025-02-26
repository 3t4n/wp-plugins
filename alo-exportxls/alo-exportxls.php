<?php
/*
Plugin Name: ALO Export Xls
Plugin URI: http://www.eventualo.net/blog/?p=400
Description: A plugin to generate XLS files (MS Excel / OpenOffice Calc) from WP database's tables.
Version: 0.1.1
Author: Alessandro Massasso
Author URI: http://www.eventualo.net
*/

/*  Copyright 2009  Alessandro Massasso  (email : alo@eventualo.net)

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


/**
 * Settings
 */
define("ALO_EX_FOOTER","&raquo; <em>Please visit my site and leave your feedback: <a href='http://www.eventualo.net/blog/?p=400' target='_blank'>www.eventualo.net</a></em>");


/**
 * On plugin activation 
 */
function ALO_ex_install() {
	if (!get_option('ALO_ex_expath')) add_option('ALO_ex_expath', 'tmp/');
}

register_activation_hook(__FILE__,'ALO_ex_install');


/**
 * Add menu pages 
 */
function ALO_ex_add_admin_menu() {
    add_options_page('Alo Export Xls', 'Alo Export Xls', 8, 'alo-exportxls-options', 'ALO_ex_option_page');
	add_management_page ('Alo Export Xls', 'Alo Export Xls', 8, 'alo-exportxls/alo-exportxls_main.php');
}

add_action('admin_menu', 'ALO_ex_add_admin_menu');


/**
 * Option page 
 */
function ALO_ex_option_page() { 
    global $wp_version;
    
    if(isset($_REQUEST['submit']) and $_REQUEST['submit']) {
	    if(isset($_POST['expath'])) update_option('ALO_ex_expath', stripslashes(trim($_POST['expath'])));
	    echo '<div id="message" class="updated fade"><p>Updated.</p></div>';
    }?>
    
    <div class="wrap">
    <h2>Alo Export Xls's Options</h2>

    <form action="" method="post">
    <p><label for="expath">Absolute path where storing XLS files (remember the slash at the end of path):</label></p>
    <input type="text" name="expath" value="<?php echo get_option('ALO_ex_expath') ?>" id="expath" size="20" maxlength="100" />

    <p class="submit" style='display:inline'>
    <input type="hidden" id="user-id" name="user_ID" value="<?php echo (int) $user_ID ?>" />
    <span id="autosave"></span>
    <input type="submit" name="submit" value="<?php echo 'Update'; ?>" style="font-weight: bold;" />
    </p>
    </form>
    
    <div style='margin:15px;'>
    <h4 style='color:#f00;padding-top:30px;'>WARNING: READ FOR YOUR BLOG SECURITY!</h4>
    <p>You should choose a path <strong>outside/above from blog root</strong>: otherwise it's dangerous to put an exported file with posts/users/comments' details in a public directory.</p>
    <p>Good examples for *nix system are:</p>
    <ol><li><code>tmp/</code></li>
    <li><code>var/www/vhosts/<em>domain.ltd</em>/private/</code></li>
    <li><code>opt/lampp/tmp/</code></li></ol>
    
    <p>Good examples for Windows system are:</p>
    <ol><li><code>Inetpub\vhosts\<em>domain.ltd</em>\temp\</code></li>
    <li><code>wamp\tmp\</code></li></ol>    
    </div>
    
    <p><?php echo ALO_EX_FOOTER; ?></p>
    </div>
<?php	
} ?>
