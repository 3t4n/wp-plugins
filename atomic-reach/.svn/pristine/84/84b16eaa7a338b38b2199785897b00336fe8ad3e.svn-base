<?php

 /* 
    Plugin Name: Atomic Reach
    Plugin URI: http://apps.atomicreach.com/app/profile/id/20
    Description: Display Posts from Atomic Reach tribes in your Wordpress site
    Author: Dan Shreim
    Version: 1.0 
    Author URI: http://snapjay.com
*/

require_once 'inc.php';

$_SESSION['pluginPath'] = plugins_url('');  

wp_enqueue_style('atomicreachstyles', plugins_url( 'rx/shortcodes.css', __FILE__ ));  
add_action( 'wp_enqueue_scripts', 'wptuts_scripts_important');

function wptuts_scripts_important()
{
    wp_deregister_script( 'jquery' );  
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', array(), null, false );  
    wp_enqueue_script('jquery');
    wp_enqueue_script('atomicreachjs', plugins_url( 'rx/shortcodes.js', __FILE__ ));  
}




add_shortcode('arPosts' , array('ArInterfaceShortcodes', 'posts'));
add_shortcode('tribeUsers ' , array('ArInterfaceShortcodes', 'userGrid'));
add_filter('widget_text', 'do_shortcode');







class ArInterfaceShortcodes {
    
    /**
     *
     * @param type $attr 
     *  $tribeUri  OR $username
     *  $layout -> vertical or horizontal 
     */
    public function posts($attr){
        
        $ARPostList = new ARPostList($attr);
        return $ARPostList->draw();
    }
    
     /**
     *
     * @param type $attr 
     *  $tribeUri  OR $username
     *  $layout -> vertical or horizontal 
     */
    public function userGrid($attr){
        
        $ARUserGrid = new ARUserGrid($attr);
        return $ARUserGrid->draw();
        
    }
    
    
    
}





