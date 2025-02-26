<?php

/**
 * Plugin Name: Show Template in Use
 * Description: (simply) show the template that is serving the current page - just activate to use! Please consider <a href="https://ko-fi.com/kriby">buying me a coffee <3 </a>
 * Version:     1.0.0
 * Author:      kriby
 * Author URI:  http://kriby.xyz
 */

function kriby_show_template() {
    if( is_super_admin() ){
        global $template;
        echo('<div style="margin: 4px; background-color: #fcfcfc; color: #000"><p><strong>The current template file is: ' . $template . ' </strong></p></div>');
    } 
}
add_action('wp_head', 'kriby_show_template');

?>