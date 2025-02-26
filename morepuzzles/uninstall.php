 <?php

 /**
 * @package morepuzzles
 */

 if( !defined('WP_UNINSTALL_PLUGIN') ){
     die;
 }

 $puzzles = get_posts(array('post_type' => 'morepuzzles', 'numberposts' => -1));

 foreach($puzzles as $puzzle){
    wp_delete_post($puzzle->ID, false);
 }