<?php
/*
Plugin Name: Howcast Shortcode
Description: The Howcast Shortcode plugin allows you to easily embed Howcast videos into your Wordpress blog.
Version: 1.0
Author: Jesse Young
Author URI: http://www.howcast.com/
*/

/*
  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

function howcast_handler($attr, $content = null) {
  $attr = extract(shortcode_atts(array('width' => 432,
                                       'height' => 276,
                                       'url' => 'http://www.howcast.com/videos/946-What-Is-Howcast'), $attr));  
  $url = strtolower($url);
  $url = substr($url, strpos($url, 'howcast.com/videos/')+19);
  $url = explode('-', $url);
  $video_id = $url[0];
    
  return '<object width="'.$width.'" height="'.$height.'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="howcastplayer"><param name="movie" value="http://www.howcast.com/flash/howcast_player.swf?file='.$video_id.'&theme=black"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><param name="flashVars" value="&fs=true"></param><embed src="http://www.howcast.com/flash/howcast_player.swf?file='.$video_id.'&theme=black" type="application/x-shockwave-flash" width="'.$width.'" height="'.$height.'" allowFullScreen="true" allowScriptAccess="always" flashVars="&fs=true"></embed></object>';  
}
add_shortcode("howcast", "howcast_handler");
?>