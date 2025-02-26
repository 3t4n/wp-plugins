<?php
/*
Plugin Name: AddToThis
Plugin URI: http://www.sajithmr.com
Description: Helps to add your links in bookmarking sites
Version: 1.0
Author: Sajith
Author URI: http://d.olph.in
*/


/*  Copyright 2008  AddToThis  (email : mrsajith@gmail.com)

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

add_filter('the_content', 'add_addtothis');



function add_addtothis($content)
{
	
	$addtothis= '<p>
				<table cellspacing="0" cellpadding="0" border="0" style="width: 300px; height: 50px; text-align: left; margin-left: auto; margin-right: auto;">
				<tbody>
				<tr>
				<td style="text-align: center;">
				<a href="http://del.icio.us/post?url='.get_permalink().'&title='.the_title('', '', false).'" rel="nofollow">
				<img src="'.get_option('siteurl').'/wp-content/plugins/addtothis/delicious.png" alt="Add to Del.cio.us" style="border: 0px solid ; width: 48px; height: 48px;"/>
				</a>
				</td>
				<td style="text-align: center;">
				<a href="'. get_bloginfo('rss_url').'" rel="nofollow">
				<img src="'.get_option('siteurl').'/wp-content/plugins/addtothis/feeds.png" alt="RSS Feed" style="border: 0px solid ; width: 48px; height: 48px;"/>
				</a>
				</td>
				<td style="text-align: center;">
				<a href="http://technorati.com/faves?add='.get_permalink().'" rel="nofollow">
				<img src="'.get_option('siteurl').'/wp-content/plugins/addtothis/technorati.png" alt="Add to Technorati Favorites" style="border: 0px solid ; width: 48px; height: 48px;"/>
				</a>
				</td>
				<td style="text-align: center;">
				<a href="http://www.stumbleupon.com/submit?url='.get_permalink().'&title='.the_title('', '', false).'" rel="nofollow">
				<img src="'.get_option('siteurl').'/wp-content/plugins/addtothis/stumble.png" alt="Stumble It!" style="border: 0px solid ; width: 48px; height: 48px;"/>
				</a>
				
				</td>
				<td style="text-align: center;">
				<a href="http://digg.com/submit?phase=2&url='.get_permalink().'" rel="nofollow">
				<img src="'.get_option('siteurl').'/wp-content/plugins/addtothis/digg.png" alt="Digg It!" style="border: 0px solid ; width: 48px; height: 48px;"/>
				</a>
				
				</td>
				</tr>
				<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td style="text-align: right;" ><a href="http://buzitweet.com/"><img style="border:none" src="'.get_option('siteurl').'/wp-content/plugins/addtothis/sajithmr.png"  title="Powered By BuziTweet" alt="BuziTweet"/></a></td></tr>
				</tbody>
				</table>

                
		
				</p>';
				
				
				
	return $content.$addtothis;
	
}



?>