<?php
/*
 Plugin Name: anyNote
 Plugin URI: blog.anyshpm.com
 Version: 1.0.0
 Author: anyshpm
 Description: add a note to article,put &lt;pre lang="anynote"&gt; and &lt;/pre&gt; around your note
 */
/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : gsslcsl24@yahoo.com.cn)

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
if (!class_exists("Wp_anyNote"))
{
	class Wp_anyNote
	{
		function Wp_anyNote(){
			wp_register_script('anyNote_js',get_bloginfo('wpurl') . '/wp-content/plugins/anyNote/anyNote.js');
		}

		function addContent($content='')
		{
			$content=str_ireplace("<pre lang=\"anynote\"","\n<div class=\"anyNote\">\n<div class=\"anyNoteTitle\" onmousedown=\"drag(this.parentNode, event);\">便笺</div>\n<div class=\"anyNoteContent\">\n<pre lang=\"anynote\"",$content);
			$content=str_ireplace("</pre>","</pre></div>\n</div>",$content);
			return $content;
		}

		function addJs()
		{
			echo '<!--anyshpm is here-->';
			echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/anyNote/anyNote.css" />' . "\n";
			echo '<script type="text/javascript" src="' . get_bloginfo('wpurl') . '/wp-content/plugins/anyNote/anyNote.js">' . '</script>';
		}
	}
}

if (class_exists("Wp_anyNote"))
{
	$anyNote=new Wp_anyNote();
}

if (isset($anyNote))
{
	add_action("wp_head",array($anyNote,'addJs'));
	add_filter("the_content",array($anyNote,'addContent'),1);
}
?>
