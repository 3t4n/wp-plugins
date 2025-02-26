<?php
/*
Plugin Name: asm-brush
Plugin URI: http://www.chlankboot.com/blog/asm-brush
Description: Adds <strong>assembly language</strong> support to the SyntaxHighlighter Evolved plugin
Author: chlankboot
Version: 1.0.1
Author URI: http://www.chlankboot.com/
License: GPLv2
*/
 
add_action( 'init', 'syntaxhighlighter_asmbrush_regscript' );
 
// Tell SyntaxHighlighter Evolved about this new language/brush
add_filter( 'syntaxhighlighter_brushes', 'syntaxhighlighter_asmbrush_addlang' );
 
// Register the brush file with WordPress
function syntaxhighlighter_asmbrush_regscript() {
    wp_register_script( 'syntaxhighlighter-brush-asm', plugins_url( 'shBrushAsm.js', __FILE__ ), array('syntaxhighlighter-core'), '1.0.1' );
    $ABStyleUrl = WP_PLUGIN_URL . '/asm-brush/style.css';
    $ABStyleFile = WP_PLUGIN_DIR . '/asm-brush/style.css';
    if ( file_exists($ABStyleFile) ) {
                                        wp_register_style('TheStyleSheets', $ABStyleUrl);
                                        wp_enqueue_style( 'TheStyleSheets');
                                     }
}
 
// Filter SyntaxHighlighter Evolved's language array
function syntaxhighlighter_asmbrush_addlang( $brushes ) {
    $brushes['assembly'] = 'asm';
    $brushes['x86'] = 'asm';
    return $brushes;
}
 
?>