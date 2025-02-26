<?php
/*
Plugin Name: AbsoluteRSS
Plugin URI: http://robert.accettura.com/projects/absoluterss
Description: Adjusts your links in RSS to use absolute links so that they work correctly in all feed readers (and validate).  GPL Licensed.
Author: Robert Accettura
Version: 1.1.3
Author URI: http://robert.accettura.com
License: GPL (http://www.gnu.org/licenses/gpl.txt)
Copyright (C) 2005-2007 Robert Accettura

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

add_filter('the_content', 'absoluteRSS');

function absoluteRSS($content){
    global $doing_rss;
    if (is_feed() || $doing_rss) {
        $home = parse_url(get_settings('home'));
        $home = $home['scheme'].'://'.$home['host'];
        // replace <img src=""/> and <a href=""/> with absolute links
        return preg_replace( "/<(a|img)(.*?)(href|src)=('|\")\/(.*?)('|\")/is", "<\\1\\2\\3=\"".$home."/\\5\"", $content);
    }
    // just return content untouched if it's not a feed
    return $content;
}

?>