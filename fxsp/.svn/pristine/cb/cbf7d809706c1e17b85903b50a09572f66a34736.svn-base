<?php
/*
Plugin Name: spellCheck
Plugin URI: http://raven.za.net/#
Description: Spellchecking hack using http://www.broken-notebook.com/spell_checker/index.php (requires pspell)
Author: Dave Raven (fx)
Version: 0.2
Author URI: http://raven.za.net/
*/ 

//Slap the js into the header
function fxsp_script() {
	echo( '<script src="' . get_settings('siteurl') . '/wp-content/plugins/fxsp/spell_checker.js" type="text/javascript"></script><script>' );
	sajax_show_javascript(); echo( '</script>' );
}
	
//Style sheet, pretty obvious
function fxsp_css() { echo ( '<link rel="stylesheet" href="' . get_settings('siteurl') . '/wp-content/plugins/fxsp/default.css" type="text/css" />' ); }

//Print the check spelling option and create status span for messages
function fxsp_print() {
	echo( '<span class="action" id="action"><a class="check_spelling" onClick="setObjToCheck(\'content\'); spellCheck();">SpellCheck</a></span><br />' );
	echo( '<span class="status" id="status"></span>' );
}

//WYSI plugin elite code - this adds the extra required divs to wordpress
function admin_replace( $lookmanoqtags ) {
	$lookmanoqtags = preg_replace('/<div><textarea rows="9" cols="40" name="content" tabindex="4" id="content"><\/textarea><\/div>/', '<div><textarea rows="9" cols="40" name="content" tabindex="4" id="content"></textarea></div><div class="suggestion_box" id="suggestions"></div><div class="edit_box" id="results"></div>', $lookmanoqtags);
	return $lookmanoqtags;
}

//Where to add the code
	if( stristr($_SERVER["PHP_SELF"],"post.php")||stristr($_SERVER["PHP_SELF"],"page-new.php") ) {
		include( ABSPATH . "/wp-content/plugins/fxsp/spell_checker.php" );
		ob_start( 'admin_replace' );
		add_action( 'admin_head', 'fxsp_css' );
		add_action( 'admin_head', 'fxsp_script' );
		add_action( 'edit_form_advanced', 'fxsp_print' );
		add_action( 'simple_edit_form', 'fxsp_print' );
		add_action( 'edit_page_form', 'fxsp_print' );
	}
?>
