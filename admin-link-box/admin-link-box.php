<?php
/*
Plugin Name: Admin-Link-Box
Plugin URI: http://www.lynk.de/wordpress/admin-link-box/
Description: Put a hidden wp-admin/login link in the top-left corner, visible on mouseover.
Version: 1.0
Author: Marcus Grellert
Author URI: http://www.lynk.de/
Author Email: wp#lynk.de
*/
/*  Copyright 2010 Marcus Grellert

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

 /*
 
 This is the code block for direct pasting into the template file
 
<!-- start -->
<div style="position:absolute; top:0; left:0; width:12px; height:12px; font:1px; z-index:76" onmouseover="document.getElementById('lynkAdminBoxOn').style.visibility='visible';"></div><div style="background:#2e4e73;color:#fff;    position:absolute;top:0;left:0;width:12px;height:80px;z-index:78;display:block;margin:0;padding:0;visibility:hidden;font:9px Arial;text-align:center;cursor:pointer" onmouseout="this.style.visibility='hidden';" onclick="window.location.href='/wp-admin'" id="lynkAdminBoxOn">&nbsp;&nbsp; A D M I N</div>
<!-- end -->


*/





function lynkAdminLinkBox() {
                                
echo '<div style="position:absolute; top:0; left:0; width:12px; height:12px; font:1px; z-index:76" onmouseover="document.getElementById(\'lynkAdminBoxOn\').style.visibility=\'visible\';"></div><div style="background:#2e4e73;color:#fff;    position:absolute;top:0;left:0;width:12px;height:80px;z-index:78;display:block;margin:0;padding:0;visibility:hidden;font:9px Arial;text-align:center;cursor:pointer" onmouseout="this.style.visibility=\'hidden\';" onclick="window.location.href=\'/wp-admin\'" id="lynkAdminBoxOn">&nbsp;&nbsp; A D M I N</div>';
}

add_action('get_footer','lynkAdminLinkBox');

?>