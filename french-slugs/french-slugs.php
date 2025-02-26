<?php
/*
Plugin Name: French Slugs
Version: 1.0
Description: Changes simple quotes (apostrophes) to dashes (-) to keep slugs readable and SEO friendly, mostly in French.
Author: Résidence mixte
Author URI: http://residence-mixte.com/
Plugin URI: http://residence-mixte.com/
*/

add_filter( 'sanitize_title', 'sanitize_title_with_dashes_fr', 1, 3 );

function sanitize_title_with_dashes_fr($title, $raw_title = '', $context = 'display') {
    if ( 'save' == $context ) {
        // Convert simple and basic curly (MS Word) quotes to hyphens
        $title = str_replace( array('\'','%e2%80%99') , '-', $title);
    }
    return $title;
}