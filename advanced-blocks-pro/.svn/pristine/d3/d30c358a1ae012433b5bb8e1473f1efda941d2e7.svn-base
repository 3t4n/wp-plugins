<?php

namespace Advanced_Blocks_Pro;

use KubAT\PhpSimple\HtmlDomParser;

add_filter('render_block', __NAMESPACE__ . '\block_filters', 10, 2);

function block_filters(string $block_content, array $block): string
{
    if (!str_starts_with($block['blockName'], 'advanced-blocks-pro')) {
        return $block_content;
    }

    foreach ($block['attrs'] as $key => $attr) {
        if (str_contains($key, 'font_family')) {
            apply_font($attr);
        }
    }

    switch ($block['blockName']) {
        case 'advanced-blocks-pro/button':
        case 'advanced-blocks-pro/infobox':
        case 'advanced-blocks-pro/form':
        case 'advanced-blocks-pro/video':
        case 'advanced-blocks-pro/icon':
        case 'advanced-blocks-pro/icon-list-child':
            $block_content = inject_svg_icon($block_content, $block, ".em-svg-icon");
            break;
        case 'advanced-blocks-pro/slider':
            $block_content = inject_svg_icon($block_content, $block, ".em-svg-icon-pre");
            $block_content = inject_svg_icon($block_content, $block, ".em-svg-icon-next");
            break;
    }

    return $block_content;
}

function apply_font(string $font_family): void
{
    $locale = get_locale();
    $subsets = [
        'ru_RU' => 'cyrillic',
        'bg_BG' => 'cyrillic',
        'he_IL' => 'hebrew',
        'el' => 'greek',
        'vi' => 'vietnamese',
        'uk' => 'cyrillic',
        'cs_CZ' => 'latin-ext',
        'ro_RO' => 'latin-ext',
        'pl_PL' => 'latin-ext',
        'hr_HR' => 'latin-ext',
        'hu_HU' => 'latin-ext',
        'sk_SK' => 'latin-ext',
        'tr_TR' => 'latin-ext',
        'lt_LT' => 'latin-ext',
    ];
    $subsets_arg = isset($subsets[$locale]) ? '&subset=' . $subsets[$locale] : '';
    $fonts_url = sprintf('https://fonts.googleapis.com/css?family=%1$s%2$s', $font_family, $subsets_arg);
    wp_enqueue_style('google-fonts-advanced-blocks-pro-' . $font_family, $fonts_url);
}

function inject_svg_icon(string $block_content, array $block, string $class): string
{
    foreach ($block['attrs'] as $key => $attr) {
        if (str_contains($key, 'svg')) {
            if (isset($attr['url'])) {
                $svg_path = $attr['url'];
                $parsed_content = HtmlDomParser::str_get_html($block_content);
                foreach ($parsed_content->find($class) as $el) {
                    $el->innertext = HtmlDomParser::file_get_html($svg_path)->save();
                }
                $block_content = $parsed_content->save();
            }
        }
    }
    return $block_content;
}