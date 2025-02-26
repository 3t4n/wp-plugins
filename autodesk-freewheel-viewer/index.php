<?php
/*
Plugin Name: Freewheel DWF Viewer
Plugin URI: http://www.blackreit.com
Description: View 2D or 3D DWF in wordpress with Freewheel
Version: 1.0
Author: Matthew Emma
Author URI: http://blackreit.info/
*/

function freewheelview($attr, $content) {
	return '<iframe scrolling="no" width="' . $attr['width'] . '" height="' . $attr['height'] . '" src="http://freewheel.autodesk.com/dwf.aspx?path=' . $attr['path'] . '" frameborder="0" align="middle"></iframe>';
}
add_shortcode('freewheel', 'freewheelview');

?>