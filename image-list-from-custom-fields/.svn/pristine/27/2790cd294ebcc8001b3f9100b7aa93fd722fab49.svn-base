<?php

/*

Plugin Name: Image List From Custom Fields

Version: 1.1

Plugin URI: http://webunaire.com/image-list-from-custom-fields-plugin/

Description: Image List From Custom Fields plugin displays a list of images from a recent number of posts and links back to them.  This plugin is similar to other image list plugins with one main difference, instead of searching for and pulling an image from the post it pulls the image from the custom fields specified by the author when he/she writes the post.  By doing this a much clearer image can be displayed with less load on the server.  Insert the follwing code in the header (within the loop) or in the sidebar (with some css customization) 

<?php if (function_exists('get_custom_image_list')) { get_custom_image_list(); } ?>

Further information is available at the plugin homepage.

Author: David Morris

Author URI: http://webunaire.com/

Copyright 2008 2009  David Morris (email : david-morris@webunaire.com)

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

function get_custom_image_list($images = 9,$thumb_width = 50,$thumb_height = 50) {

        echo '<!-- Custom Fields Image List Plugin - Homepage: http://webunaire.com/image-list-from-custom-fields-plugin -->';
        
        image_list_css();

	global $wpdb;

	$sql = "SELECT ID, post_title, post_content FROM $wpdb->posts WHERE post_status = 'publish' AND post_type ='post' ORDER BY post_date DESC LIMIT $images ";


	$posts = $wpdb->get_results($sql);	


	if( $posts ) { 
                
		echo '<ul class="custom-image-list">';

                $thumb = 'Thumbnail'; 
		$imfalse = 'false'; 
                
		foreach( $posts as $post ) {
                        
                        $content = $post-> post_content;
                        $imageid = get_post_meta($post->ID,$thumb,$imfalse);

			$image ='<img src="'.$imageid.'" alt ="'. wptexturize($post->post_title) .'" width="'.$thumb_width.'" />';			
		

			echo '<li class="imgthumb"><a href="'.get_permalink($post->ID).'" title="'. wptexturize($post->post_title).'">'. $image .'</a></li>';

                        }
     echo '</ul>';

		} 
echo '<!-- End Custom Fields Image List Plugin - Homepage: http://webunaire.com/image-list-from-custom-fields-plugin -->';
}

function image_list_css() {

	echo "
	<style type='text/css'>
	
        ul.custom-image-list {float:left; width:565px; margin: 0 0 0 35px; margin: 0 0 0 15px; padding:0;}

        ul.custom-image-list li {float:left; width: 50px; height: 50px; overflow:hidden;}

        li.imgthumb {border: 2px solid black; margin: 0 8px 0 0;}
        
       </style>";
}

?>