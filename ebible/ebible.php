<?php
/*
Plugin Name: eBible
Version: 1.1
Plugin URI: http://ebible.com/plugins
Description: The eBible VerseLink plugin let's website and blog owners automatically link to Bible references (For Wordpress 1.5+)
Author: eBible.com
Author URI: http://ebible.com
*/

if (! function_exists('includeJSHeader')) {

    function includeJSHeader() {

        // build the script include tag
        $content = "<script type=\"text/javascript\" src=\"http://www.ebible.com/assets/verselink/ebible.verselink.js\"></script>";
        echo $content;
		}
    

}



add_action('wp_footer', 'includeJSHeader', 40);

?>