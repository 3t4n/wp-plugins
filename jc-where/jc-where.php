<?php
/*
Plugin Name: JC Where
Plugin URI: http://www.netcod.es/
Description: Display the IP of the server in the administration footer
Version: 1.1
Author: Netcodes
Author URI: http://www.netcod.es/
 */

function jcserver_display(){
    echo '<p id="footer-jc-where" class="alignright" style="margin-left: 10px;"><strong title="Server IP Address">['.$_SERVER['SERVER_ADDR'].']</strong></p>';
}

add_action('in_admin_footer', 'jcserver_display');

?>
