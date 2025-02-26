<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_migration_tool($plugin, $name) {
    $seo_title = 'Rankology';
    if (method_exists(rankology_get_service('ToggleOption'), 'getToggleWhiteLabel') && '1' === rankology_get_service('ToggleOption')->getToggleWhiteLabel()) {
        $seo_title = method_exists(rankology_fno_get_service('OptionPro'), 'getWhiteLabelListTitle') && rankology_fno_get_service('OptionPro')->getWhiteLabelListTitle() ? rankology_fno_get_service('OptionPro')->getWhiteLabelListTitle() : 'Rankology';
    }

    $html = '<div id="' . $plugin . '-migration-tool" class="postbox section-tool">
        <div class="inside">
                <h3>' . sprintf(__('Import posts and terms (if available) metadata from %s', 'wp-rankology'), $name) . '</h3>

                <p>' . __('By clicking Migrate, we\'ll import:', 'wp-rankology') . '</p>

                <ul>
                    <li>' . __('Title tags', 'wp-rankology') . '</li>
                    <li>' . __('Meta description', 'wp-rankology') . '</li>
                    <li>' . __('Facebook Open Graph tags (title, description and image thumbnail)', 'wp-rankology') . '</li>';
    if ('premium-seo-pack' != $plugin) {
        $html .= '<li>' . __('Twitter tags (title, description and image thumbnail)', 'wp-rankology') . '</li>';
    }
    if ('wp-meta-seo' != $plugin && 'seo-ultimate' != $plugin) {
        $html .= '<li>' . __('Meta Robots (noindex, nofollow...)', 'wp-rankology') . '</li>';
    }
    if ('wp-meta-seo' != $plugin && 'seo-ultimate' != $plugin && 'slim-seo' != $plugin) {
        $html .= '<li>' . __('Canonical URL', 'wp-rankology') . '</li>';
    }
    if ('wp-meta-seo' != $plugin && 'seo-ultimate' != $plugin && 'squirrly' != $plugin && 'slim-seo' != $plugin) {
        $html .= '<li>' . __('Focus / target keywords', 'wp-rankology') . '</li>';
    }
    if ('wp-meta-seo' != $plugin && 'premium-seo-pack' != $plugin && 'seo-ultimate' != $plugin && 'squirrly' != $plugin && 'aio' != $plugin && 'slim-seo' != $plugin) {
        $html .= '<li>' . __('Primary category', 'wp-rankology') . '</li>';
    }
    if ('wpseo' == $plugin || 'platinum-seo' == $plugin || 'smart-crawl' == $plugin || 'rankologyor' == $plugin || 'rk' == $plugin || 'seo-framework' == $plugin || 'aio' == $plugin) {
        $html .= '<li>' . __('Redirect URL', 'wp-rankology') . '</li>';
    }
    $html .= '</ul>

                <div class="rankology-notice is-warning">
                    <p>
                        ' . sprintf(__('<strong>WARNING:</strong> Migration will delete / update all <strong>%1$s posts and terms metadata</strong>. Some dynamic variables will not be interpreted. We do <strong>NOT delete any %2$s data</strong>.', 'wp-rankology'), $seo_title, $name) . '
                    </p>
                </div>

                <button id="rankology-' . $plugin . '-migrate" type="button" class="btn btnSecondary">
                    ' . __('Migrate now', 'wp-rankology') . '
                </button>

                <span class="spinner"></span>

                <div class="log"></div>
            </div>
        </div>';

    return $html;
}
