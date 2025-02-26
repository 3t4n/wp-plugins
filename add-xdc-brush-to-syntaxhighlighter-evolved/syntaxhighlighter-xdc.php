<?php
/*
Plugin Name: Add XDC Brush to SyntaxHighlighter Evolved
Description: Adds support for the Xilinx Design Constraint (XDC) Files to the SyntaxHighlighter Evolved plugin.
Author: Mark seminatore
Version: 1.0.3
Author URI: https://fpgacoding.com
*/
 
// SyntaxHighlighter Evolved doesn't do anything until early in the "init" hook, so best to wait until after that
add_action( 'init', 'syntaxhighlighter_xdc_regscript' );
 
// Tell SyntaxHighlighter Evolved about this new language/brush
add_filter( 'syntaxhighlighter_brushes', 'syntaxhighlighter_xdc_addlang' );
add_filter( 'syntaxhighlighter_brush_names', 'syntaxhighlighter_xdc_addname' );

// Register the brush file with WordPress
function syntaxhighlighter_xdc_regscript() {
    wp_register_script( 'syntaxhighlighter-brush-xdc', plugins_url( 'shBrushConstraint.js', __FILE__ ), array('syntaxhighlighter-core'), '1.0.3', true );
}
 
// Filter SyntaxHighlighter Evolved's language array
function syntaxhighlighter_xdc_addlang( $brushes ) {
    $brushes['xdc'] = 'xdc';
 
    return $brushes;
}

// Filter SyntaxHighlighter Evolved's name array
function syntaxhighlighter_xdc_addname( $names ) {
   $names['xdc'] = 'XDC';

   return $names;
}
?>
