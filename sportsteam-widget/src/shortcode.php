<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function sprttm_getDomainCfgForLivescoreService() {
    $settings = get_option('sportsteam_settings_options');
    $cfgs = require('cfg.php');

    $lang = isset($settings['sportsteam_lang']) ? $settings['sportsteam_lang'] : '';

    // check if lang supported in case not do it en
    if (!in_array($lang, array_keys($cfgs['domainMap']))) {
        $locale = substr(get_locale(), 0, 2);

        $lang = in_array($locale, array_keys($cfgs['domainMap'])) ? $locale : 'en';
    }

    return $cfgs['domainMap'][$lang];
}

function sprttm_renderLivescoreService($atts) {
    $settings = get_option('sportsteam_settings_options');
    // check author credit link is on or not. if not set it without link via iframe
    $isLinkInsert = isset($settings['sportsteam_is_link_insert']) ? $settings['sportsteam_is_link_insert'] : 'off';

    if ($isLinkInsert != 'on') {
        return '[livescore]';
    }

    $attsCfg = shortcode_atts(
        array(
            'path' => '',
        ),
        $atts,
        'livescore'
    );

    $cfg = sprttm_getDomainCfgForLivescoreService();

    $path = $attsCfg['path'];
    $pathParts = explode('/', $path);
    $leagueName = isset($pathParts[4]) ? ucwords(str_replace('-', ' ', $pathParts[4])) : '';

    $rnd = isset($settings['sportsteam_your_word_num']) ? $settings['sportsteam_your_word_num'] : 0;
    $url = $cfg['base'];
    $textPathKey = '' === $path ? '/today' : $path;
    $textPathKey = $leagueName ? '{tournament}' : $textPathKey;
    $defText = 'livescore ' . ucwords(str_replace('-', ' ', str_replace('/', ' ', $textPathKey)));
    $text = isset($cfg[$textPathKey]) ? $cfg[$textPathKey][$rnd] : $defText;
    $text = $leagueName ? str_replace('{tournament}', $leagueName, $text) : $text;

    return "<a href='".esc_url($url.$path)."'>".esc_html($text)."</a>";
}
