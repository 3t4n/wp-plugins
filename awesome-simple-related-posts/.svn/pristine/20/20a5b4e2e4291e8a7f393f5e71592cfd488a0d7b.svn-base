<?php
/* 
 * Plugin Name: Awesome Simple Related Posts
 * Plugin URI: https://amanurrahman.com/
 * Author: Amanur Rahman
 * Author URI: https://amanurrahman.com/
 * Description: This is a simple plugin that shows your related post under every single post.
 * Licence: GPL2
 * Version: 3.4
 */


if ( !defined( 'ABSPATH' ) ) {
        die; // Exit if accessed directly
    }

defined( 'ABSPATH' ) or die('You can not access this file you stupid');

require_once ('settings/options-page.php');

wp_register_style( 'amanhstur', plugin_dir_url( __FILE__ ).'/css/main.css' );
wp_enqueue_style('amanhstur');

add_filter('the_content','amanhstur_related_post');

function amanhstur_related_post($content){
    global $post;
    if(!is_singular($post)){
        return $content;
        
    }
    
    $categories = get_the_terms(get_the_ID(), 'category');
    $categoriesIds = array();
    
    foreach ($categories as $category) {
        $categoriesIds[] = $category->term_id;
        
    }
    
    $loop = new WP_Query(array(
        'caegory_in' => $categoriesIds,
        'posts_per_page' => get_option('awsrp_number_of_related_posts'),
        'post__not_in' => array(get_the_ID()),
        'order_by' => 'rand', 
    ));
    
    //If there are posts then
    if($loop->have_posts()){
        $content .='<div class="related-wrap">';
        $content .='<div class="related-item-wrap">';
        $content .='<h3 class="related-post-title">Related Posts</h3><ul>';
        while ($loop->have_posts()){
            $loop->the_post();
            $content .= '<a href="'.get_permalink().'"><div class="related-post-thumbnail">'.get_the_post_thumbnail().'<li>'.get_the_title().'</li></div></a>';
        }
            $content .= '</ul>';
            
            $content .='</div></div>';
   
    }
    
    wp_reset_query();
    return $content;
    
}