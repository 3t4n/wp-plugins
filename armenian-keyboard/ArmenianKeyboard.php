<?php
/*

Plugin Name: Armenian Keyboard
Plugin URI: http://www.biznet.am/Keyboard/
Description: You type latin letters and get Armenian
Version: 1.0
Author: BizNet.am
Author URI: http://www.biznet.am/
License: GPL2
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

define('ARMKEY_PLUGIN_URL', plugin_dir_url( __FILE__ ));

// Direct call
if ( !function_exists( 'add_action' ) ) {
	header('Location:http://www.biznet.am/Keyboard/');
	die();
}


function ArmenianKeyboard(){?>
	<script type="text/javascript">
	if (typeof jQuery == 'undefined') {
		document.write('<scri'+'pt type="text/javascript" src="<?=ARMKEY_PLUGIN_URL?>js/jquery-1.7.1.min.js"></sc'+'ript>');
	}
	</script>

	<script type="text/javascript" src="<?=ARMKEY_PLUGIN_URL?>js/hyKeyboard.js"></script>

	<script type="text/javascript">
	$(function(){
		$('#comment').translate('trOn');
	});
	</script>
<?}

function ArmenianKeyboardAddCheckbox(){
	echo'<span class="ArmenianKeyboard_span"><input type="checkbox" id="trOn" checked="checked" /> Անջատել / միացնել հայերենը (Ctrl+Shift)</span>';
}

add_action('wp_head', 'ArmenianKeyboard');
add_filter('comment_form','ArmenianKeyboardAddCheckbox');

?>