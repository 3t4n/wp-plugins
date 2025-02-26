<?php   
    /* 
    Plugin Name: Logout Button 
    Plugin URI: http://www.ben-poland-dev.com
    Description: Displays A Logout Button. Shortcodes [logout-to-default] [logout-to-current] [logout-to-home]
    Author: Ben Poland 
    Version: 1.0 
    Author URI: http://www.ben-poland-dev.com
    */

    include(ABSPATH . "wp-includes/pluggable.php");  

    function redirectDefault( $atts, $content = null )
    {
        if ( is_user_logged_in() ) {
            echo '<a href='.wp_loginout().'" title="Logout"></a>';
        }
    }

    function redirectCurrentPage( $atts, $content = null )
    {
        if ( is_user_logged_in() ) {
            echo '<a href='.wp_loginout( get_permalink() ).'" title="Logout"></a>';
        }
    }

    function redirectHomePage( $atts, $content = null )
    {
        if ( is_user_logged_in() ) {
            echo '<a href='.wp_loginout( home_url() ).'" title="Logout"></a>';
        }
    }        

    add_shortcode( 'logout-to-default', 'redirectDefault');
    add_shortcode( 'logout-to-current', 'redirectCurrentPage');
    add_shortcode( 'logout-to-home', 'redirectHomePage');
?>