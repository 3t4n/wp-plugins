<?php
/*
    Contributors: abr4xas
    Donate link: http://donate.abr4xas.org/
    Tags: shortcode, bootstrap
    Requires at least: 3.0.1
    Tested up to: 3.4
    Stable tag: 4.3
    License: GPLv2 or later
    License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


// Info
function infobox($atts,$content=null){
    $info = "<p class=\"bg-info\">";
    $info .= $content;
    $info .= "</p>";
    return $info;
}

// warning
function warningbox($atts,$content=null){
    $warning = "<p class=\"bg-warning\">";
    $warning .= $content;
    $warning .= "</p>";
    return $warning;
}
// danger
function dangerbox($atts,$content=null){
    $danger = "<p class=\"bg-danger\">";
    $danger .= $content;
    $danger .= "</p>";
    return $danger;
}

//Short Codes

add_shortcode( "info", "infobox" );
add_shortcode( "warning", "warningbox" );
add_shortcode( "danger", "dangergbox" );

?>