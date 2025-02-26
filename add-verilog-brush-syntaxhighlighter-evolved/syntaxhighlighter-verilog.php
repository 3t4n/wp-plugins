<?php
/*
Plugin Name: Add Verilog Brush to SyntaxHighlighter Evolved
Description: Adds support for the Verilog language to the SyntaxHighlighter Evolved plugin.
Author: Mark Seminatore
Version: 1.0.18
Author URI: https://fpgacoding.com
*/
 
// SyntaxHighlighter Evolved doesn't do anything until early in the "init" hook, so best to wait until after that
add_action( 'init', 'syntaxhighlighter_verilog_regscript' );
 
// Tell SyntaxHighlighter Evolved about this new language/brush
add_filter( 'syntaxhighlighter_brushes', 'syntaxhighlighter_verilog_addlang' );
add_filter( 'syntaxhighlighter_brush_names', 'syntaxhighlighter_verilog_addname' );

// Register the brush file with WordPress
function syntaxhighlighter_verilog_regscript() {
    wp_register_script( 'syntaxhighlighter-brush-verilog', plugins_url( 'shBrushVerilog.js', __FILE__ ), array('syntaxhighlighter-core'), '1.0.18', true );
}
 
// Filter SyntaxHighlighter Evolved's language array
function syntaxhighlighter_verilog_addlang( $brushes ) {
    $brushes['verilog'] = 'verilog';
    $brushes['v'] = 'verilog';
 
    return $brushes;
}

// Filter SyntaxHighlighter Evolved's name array
function syntaxhighlighter_verilog_addname( $names ) {
   $names['verilog'] = 'Verilog';

   return $names;
}
?>
