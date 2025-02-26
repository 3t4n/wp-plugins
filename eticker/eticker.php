<?php
/*
Plugin Name: eTicker
Plugin URI: http://www.itukker.nl/blog/eticker/
Description: Display a graphical light message ticker on your blog.
Version: 1.0.1
Author: Tukker
Author URI: http://www.iTukker.nl
*/

/*  Copyright 2010  Tukker  (email : tukker@iTukker.nl)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; version 2.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
	This plugin uses Javascript libraries originally developed by Yahoo.
	Please refer to http://developer.yahoo.com/yui/ for more information on the YUI.
*/

if (!defined( 'ITK_ETK_DIRECTORY' )) {
	define( 'ITK_ETK_DIRECTORY' , get_option('siteurl') . '/wp-content/plugins/eticker' );
}

function itk_eticker($atts, $content = null) {
	return itk_eticker_show($content);
}

function itk_eticker_show($content) {
	return '
	<div sTyle="text-align: center;">
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
				id="Ticker" width="526" height="75"
				codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">
				<param name="movie" value="' . ITK_ETK_DIRECTORY . '/static/swf/Ticker.swf" />
				<param name="quality" value="high" />
				<param name="wmode" value="transparent" />
				<param name="allowScriptAccess" value="sameDomain" />
				<param NAME="flashvars" value="message=' . $content . '">
				<embed src="' . ITK_ETK_DIRECTORY . '/static/swf/Ticker.swf" 
					quality="high" wmode="transparent"
					width="526" height="75" name="Ticker" align="middle"
					play="true"
					loop="false"
					quality="high"
					allowScriptAccess="sameDomain"
					type="application/x-shockwave-flash"
					pluginspage="http://www.adobe.com/go/getflashplayer"
					flashvars="message=' . $content . '">
				</embed>
		</object>
	</div>';
}

add_shortcode('itk-eticker', 'itk_eticker');
?>