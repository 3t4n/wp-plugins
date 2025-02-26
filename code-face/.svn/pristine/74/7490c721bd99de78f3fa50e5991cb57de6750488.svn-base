<?php
/*
Plugin Name: Code Face Syntax Highlighter
Plugin URI: http://djsipe.com/
Description: Adds syntax hilighting for &lt;pre&gt; blocks.
Version: 1.0
Author: Donald Sipe
Author URI: http://djsipe.com/
*/
/**
 * Code Face Syntax Highlighter
 * 
 * Copyright (C) 2008  Donald Sipe
 * Website: http://djsipe.com
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

function _codefaceRender ()
{
	$puginDirectory = PLUGINDIR;
	echo "<!-- Code Face -->\n";
	echo _codefaceMakeScript('http://yui.yahooapis.com/2.4.1/build/yahoo/yahoo-min.js') . "\n";
	echo _codefaceMakeScript('http://yui.yahooapis.com/2.4.1/build/selector/selector-beta-min.js') . "\n";
	echo _codefaceMakeScript('http://yui.yahooapis.com/2.4.1/build/get/get-beta-min.js') . "\n";
	echo <<<_JS_LITERAL_
<script type="text/javascript">
	YAHOO.namespace("CodeFace");
	YAHOO.CodeFace = {};
	YAHOO.CodeFace.basePath = '/{$puginDirectory}/codeface/'; 
</script>
_JS_LITERAL_;
	echo "\n";
	echo _codefaceMakeScript('/' . PLUGINDIR . '/codeface/js/init.js') . "\n";
}

function _codefaceMakeScript($src)
{
	return '<script type="text/javascript" src="' . $src . '"></script>';
}


add_action('wp_footer', '_codefaceRender');