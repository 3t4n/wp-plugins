<?php

/**
 * @version 1.4.0
 */

function ccc_return_list_languages()
{
    return array(
        'en' => 'English',
        'ru' => 'Русский',
        'it' => 'Italiano',
        'fr' => 'Français',
        'es' => 'Español',
        'cn' => '中国',
        'de' => 'Deutsch',
        'hi' => 'हिन्दी',
        'id' => 'Bahasa Indonesia',
        'ja' => '日本語',
        'pt' => 'Português',
    );
}

function ccc_wrap_sanitize_text_field($sanitized_value)
{
    $sanitized_value = preg_replace('/[()]/', '', $sanitized_value);
    // Escape the attribute value for safe output
    $escaped_value = esc_attr($sanitized_value);
    return $sanitized_value;
}

function ccc_return_language_detected()
{
    $sl = substr(get_bloginfo('language'), 0, 2);

    return (in_array($sl, array_keys(ccc_return_list_languages()))) ? $sl : 'en';
}

function ccc_return_currency_list()
{
    $contents = file_get_contents(plugin_dir_path(__FILE__).'data/currencies_'.ccc_return_language_detected().'.json');

    return json_decode($contents, true);
}

function ccc_return_iframe($params, $width, $height, $signature = null, $text = null)
{
    $target_url = esc_url(strtolower('https://'.$params['fm'].(('en' != $params['lg']) ? '.'.$params['lg'] : '').'.currencyrate.today'.DIRECTORY_SEPARATOR.$params['to']));

    $url = 'https://currencyrate.today/load-converter?'.http_build_query($params);
    $output = '<iframe title="'.(($text) ? esc_attr($text).': CurrencyRate.Today' : 'Currency Converter Widget').'" src="'.esc_url($url).'" height="'.esc_attr($height).'" width="'.esc_attr($width).'" frameborder="0" loading="lazy" scrolling="no" class="ccc-iframe" name="ccc-currency-converter-calculator"></iframe>';
    if ($signature) {
        $output .= '<p>'.(($text) ? esc_html($text).' ' : '').' <a href="'.$target_url.'" class="ccc-base-currency-link">'.esc_html($params['fm'].'/'.$params['to']).'</a>: '.date_i18n('D, j M', false).'.</p>';
    } else {
        $output .= '<p><a href="'.$target_url.'" class="ccc-base-currency-link">CurrencyRate</a></p>';
    }

    return $output;
}

function ccc_print_timezone_list($code, $arr)
{
    $output_string = '';
    $code = esc_attr($code);
    foreach ($arr as $v) {
        $output_string .= '<option value="' . esc_attr($v[0]) . '"' . (($code === $v[0]) ? ' selected' : '') . '>' . esc_html($v[1]) . '</option>' . PHP_EOL;
    }

    return $output_string;
}

function ccc_is_valid_size($size)
{
    return is_numeric($size) || preg_match('/^\d+%$/', $size);
}

function ccc_print_select_options($code, $arr, $o = false)
{
    $output_string = '';
    $code = esc_attr($code);
    foreach ($arr as $k => $v) {
        $output_string .= '<option value="' . esc_attr($k) . '"' . (($code === $k) ? ' selected' : '') . '>' . ((true === $o) ? esc_html($k . ' - ' . $v) : esc_html($v)) . '</option>' . PHP_EOL;
    }

    return $output_string;
}
