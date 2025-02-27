<?php

$revi_lang = 'en';
if (REVI_PLUGIN_LANGUAGE == 'wpml' && defined('ICL_LANGUAGE_CODE')) {
    if (ICL_LANGUAGE_CODE && strlen(ICL_LANGUAGE_CODE) >= 2 && ICL_LANGUAGE_CODE != 'ICL_LANGUAGE_CODE') {
        $revi_lang = ICL_LANGUAGE_CODE;
    }
} else if (REVI_PLUGIN_LANGUAGE == 'polylang') {
    $revi_lang = pll_current_language();
} else {

    if (!empty(get_option('REVI_SELECTED_LANGUAGE'))) {
        $revi_lang = get_option('REVI_SELECTED_LANGUAGE');
    } else if (!empty(get_option('REVI_LANG'))) {
        $revi_lang = get_option('REVI_LANG');
    }
}

$revi_lang = reviParseLang($revi_lang);
define('REVI_LANGUAGE', $revi_lang);
