<?php
/*
Plugin Name: Auto Dashboard Language
Plugin URI: https://wizardsoft.nl/autodashboardlanguage
Description: Auto Dashboard Language: Set WordPress widgets language to browser language of visitor unless configured at user profile.
Author: Patrick de Groot (WS)
Version: 180201
Author URI: https://wizardsoft.nl/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('WPINC')) {
	die;
}

//define('WSADL_SKIP_ANONYMOUS', true);

function wsadl_define_locale($locale) {
	if (function_exists('wp_get_current_user')) {
		$user = wp_get_current_user();
		if (0 == $user->ID) {
			// Not logged in.
			if (WSADL_SKIP_ANONYMOUS === true) {
				return $locale;
			}
		} else {
			$userLocale = $user->locale;
			if ($userLocale !== '') {
				$locale = $userLocale;
				return $locale;
			}
		}
	}
	$acceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
	#echo '<!--**1' . $acceptLanguage . '-->';
	$browserLanguages = explode(',', $acceptLanguage);
	$availableLanguages = get_available_languages();
	foreach ($browserLanguages as $blang) {
		$blang = substr($blang, 0, 2);
		$wplang = 'en';
		if (strpos($wplang, $blang) === 0) {
			$locale = $wplang;
			return $locale;
		}
		foreach ($availableLanguages as $wplang) {
			if (strpos($wplang, $blang) === 0) {
				$locale = $wplang;
				#echo '<!--**2' . $wplang . '-->';
				return $locale;
			}			
		}
	}
	return $locale;
}
add_filter('locale', 'wsadl_define_locale');
?>
