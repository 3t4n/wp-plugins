<?php
/*
Plugin Name: Admin Toolbar Remover
Plugin URI: http://www.wpcode.net/admin-toolbar-remover-0-1b.html
Description: Remove Wordpress 3.1 Admin Toolbar.
Version: 0.1b
Author: Pigi
Author URI: http://www.digg-it.info
License: GPL2
*/


/*  Copyright 2010  Pigi  (email : pigi.bari@gmail.com)

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


// Dashboard Widget


function atr_dashboard_widget() { ?>
<?php _e('To Enable Toolbar, Disable "Admin Toolbar Remover"')?> Powered by <a href="http://www.wpcode.net" target="_blank">Wpcode.net</a>
<p style="margin-top:8px;margin-bottom-8px;">
<a href="http://www.wpcode.net/atr/godaddy" target="_blank">
<img src="http://www.ftjcfx.com/image-4091035-10675280" width="125" height="125" alt="Sale! $7.49.com from GoDaddy.com - 125x125 Poker t" border="0"/></a>

<a href="http://www.wpcode.net/atr/powweb" target="_blank">
<img src="http://www.lduhtrp.net/image-4091035-10372866" width="125" height="125" alt="PowWeb Hosting - Only $4.88 per month" border="0"/></a>
Remove These Ad For Free
</p>

<?php 
 }

function atr_add_dashboard_widget() {
	wp_add_dashboard_widget( 'atr-custom-widget', 'Admin Toolbar Remover', 'atr_dashboard_widget' );
}

add_action( 'wp_dashboard_setup', 'atr_add_dashboard_widget' );

add_filter( 'show_admin_bar', '__return_false' ); ?>