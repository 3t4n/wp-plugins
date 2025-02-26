<?php
/*
 * Auto AnimateImage Utils
 * Copyright (C) 2012 attosoft <http://attosoft.info/en/>
 * This file is distributed under the same license as the Auto AnimateImage package.
 * attosoft <contact@attosoft.info>, 2012.
 */

class Animate_Image_Utils {

// @param msgid key list (variable-length argument)
function __() {
	$num_args = func_num_args();
	for ($i = 0; $i < $num_args; $i++) {
		$text = func_get_arg($i);
		$ret = $this->___($text);
		if ($ret != $text)
			return $ret;
	}
	return func_get_arg(0);
}

/*
 * Retrieves translated string from both 'animateimage' and 'default' domain
 */
function ___( $text ) {
	$ret = __($text, 'animateimage');
	return $ret != $text ? $ret : __($text);
}

// @param msgid key list (variable-length argument)
function _e() {
	$args = func_get_args();
	echo call_user_func_array(array(&$this, '__'), $args);
}

/**
 * @since 3.0
 * @see /wp-includes/general-template.php
 */
function disabled( $disabled, $current = true, $echo = true ) {
	if (function_exists( 'disabled' ))
		return disabled( $disabled, $current, $echo );
	else if (function_exists( '__checked_selected_helper' ))
		return __checked_selected_helper( $disabled, $current, $echo, 'disabled' );

	$result = $disabled == $current ? " disabled='disabled'" : '';
	if ( $echo ) echo $result;
	return $result;
}

/**
 * @see /wp-admin/includes/template.php or /wp-includes/general-template.php
 * @note '$current = true' and '$echo' is defined since WordPress 2.8
 */
function checked( $checked, $current = true, $echo = true ) {
	if ( version_compare('2.8', get_bloginfo('version')) > 0 )
		checked( $checked, $current );
	else
		return checked( $checked, $current, $echo );
}

// @note '$plugin' is defined since WordPress 2.8
function plugins_url( $path, $plugin = '' ) {
	if (!$plugin) $plugin = __FILE__;
	return version_compare('2.8', get_bloginfo('version')) > 0 ? plugins_url( 'auto-animateimage/' . $path ) : plugins_url( $path, $plugin );
}

} # class Animate_Image_Utils
?>