<?php
/*
Plugin Name: Comments number Restore
Plugin URI: http://www.satollo.com/english/wordpress/comments-number-restore
Description: Hyper Cache is an extremely aggressive cache for WordPress.
Version: 1.0
Author: Satollo
Author URI: http://www.satollo.com
Disclaimer: Use at your own risk. No warranty expressed or implied is provided.

---
Copyright 2008  Satollo  (email : satollo@gmail.com)
---

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
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA


*/

add_action('admin_head', 'cnr_admin_head');
function cnr_admin_head() {
	add_options_page('Comments Number Restore', 'Comments Number Restore', 'manage_options', 'comments-number-restore/options.php');
}

?>
