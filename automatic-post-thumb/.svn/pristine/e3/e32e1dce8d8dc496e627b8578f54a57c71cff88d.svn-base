<?php
/*
Plugin Name: Automatic Post Thumb
Plugin URI: http://devolux.org/post-thumb
Description: The plugin generates a thumbnail from the first image uploaded to a post.
Author: Devolux
Version: 1.0
Author URI: http://devolux.org/
*/

function post_thumb() {
        global $id, $wpdb;

        //reading from database
        $image_data = $wpdb->get_results("SELECT guid, post_content, post_mime_type, post_title
        FROM $wpdb->posts
        WHERE post_type = 'attachment' && post_parent = $id && post_mime_type LIKE '%image%'
        ORDER BY ID ASC");

$first_image_data = array ($image_data[0]);

        //array output
        foreach($first_image_data as $output) {


                        //if there is no description use title (filename) instead
                        if (empty($output->post_content) == TRUE)
                                  {$output->post_content = $output->post_title;}

                        //images
                        if (substr($output->post_mime_type, 0, 5) == 'image')
                                 {echo "<img src=\"$output->guid\" alt=\"$output->post_title\" title=\"$output->post_content\" /> \n";}

                        else
                                 {echo "<img src=\"".get_bloginfo ('url')."/wp-content/plugins/post_thumb/wp_default.png\" alt=\"default image\" title=\"$output->post_content\" class=\"post_img\" /> \n";}

                                             }
}

?>
