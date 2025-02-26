<?php

// *****************************************************************************
// INCLUDES / HTML.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

// =============================================================================
// tagit()
// =============================================================================

function tagit(
    $tag        ,
    $innerHTML
    ) {

    return <<<EOT
<{$tag}>{$innerHTML}</{$tag}>
EOT;

}

// =============================================================================
// h1() ... h6()
// =============================================================================

function h1( $innerHTML ) { return tagit( 'h1' , $innerHTML ) ; }
function h2( $innerHTML ) { return tagit( 'h2' , $innerHTML ) ; }
function h3( $innerHTML ) { return tagit( 'h3' , $innerHTML ) ; }
function h4( $innerHTML ) { return tagit( 'h4' , $innerHTML ) ; }
function h5( $innerHTML ) { return tagit( 'h5' , $innerHTML ) ; }
function h6( $innerHTML ) { return tagit( 'h6' , $innerHTML ) ; }

// =============================================================================
// p() ...
// =============================================================================

function          p( $innerHTML ) { return tagit(          'p' , $innerHTML ) ; }
function          b( $innerHTML ) { return tagit(          'b' , $innerHTML ) ; }
function          i( $innerHTML ) { return tagit(          'i' , $innerHTML ) ; }
function          u( $innerHTML ) { return tagit(          'u' , $innerHTML ) ; }
function        pre( $innerHTML ) { return tagit(        'pre' , $innerHTML ) ; }
function blockquote( $innerHTML ) { return tagit( 'blockquote' , $innerHTML ) ; }

// =============================================================================
// br() ...
// =============================================================================

function br() { return '<br />' ; }
function hr() { return '<hr />' ; }

// =============================================================================
// That's that!
// =============================================================================

