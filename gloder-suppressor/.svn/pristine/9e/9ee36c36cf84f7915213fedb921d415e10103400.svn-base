<?php
/*
Plugin Name: GloDer Nag Suppressor
Plugin URI: http://andrewfrazier.wordpress.com/
Description: Hides the WordPress Update Nag.
Version: 1.2.2
Author: Andrew Frazier
Author URI: http://andrewfrazier.wordpress.com/
*/

/*
Copyright (C) 2010 Andrew Frazier, www.gloderworks.com (andrew AT gloderworks DOT com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


function addHeaderCode() {?>
	<style type="text/css">
		#update-nag, .update-nag, .update-count {display: none;}
	</style>
<?php }

add_action('admin_head', 'addHeaderCode', 1);
?>