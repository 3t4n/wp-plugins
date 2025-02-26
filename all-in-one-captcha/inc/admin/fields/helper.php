<?php
/**
 * Helper
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return language options.
 *
 * @since 1.0.0
 *
 * @param string $type Captcha type.
 * @param array  $default_option Default option.
 * @return array Language lists.
 */
function aioc_get_language_options( $type, $default_option ) {
	$languages = aioc_get_captcha_languages();

	if ( 'cfturnstile' === $type ) {
		$languages = aioc_get_turnstile_languages();
	} elseif ( 'hcaptcha' === $type ) {
		$languages = aioc_get_hcaptcha_languages();
	}

	return array_merge( $default_option, $languages );
}

/**
 * Return captcha languages.
 *
 * @since 1.0.0
 *
 * @return array Language lists.
 */
function aioc_get_captcha_languages() {
	return array(
		'ar'     => 'Arabic',
		'af'     => 'Afrikaans',
		'am'     => 'Amharic',
		'hy'     => 'Armenian',
		'az'     => 'Azerbaijani',
		'eu'     => 'Basque',
		'bn'     => 'Bengali',
		'bg'     => 'Bulgarian',
		'ca'     => 'Catalan',
		'zh-HK'  => 'Chinese (Hong Kong)',
		'zh-CN'  => 'Chinese (Simplified)',
		'zh-TW'  => 'Chinese (Traditional)',
		'hr'     => 'Croatian',
		'cs'     => 'Czech',
		'da'     => 'Danish',
		'nl'     => 'Dutch',
		'en-GB'  => 'English (UK)',
		'en'     => 'English (US)',
		'et'     => 'Estonian',
		'fil'    => 'Filipino',
		'fi'     => 'Finnish',
		'fr'     => 'French',
		'fr-CA'  => 'French (Canadian)',
		'gl'     => 'Galician',
		'ka'     => 'Georgian',
		'de'     => 'German',
		'de-AT'  => 'German (Austria)',
		'de-CH'  => 'German (Switzerland)',
		'el'     => 'Greek',
		'gu'     => 'Gujarati',
		'iw'     => 'Hebrew',
		'hi'     => 'Hindi',
		'hu'     => 'Hungarain',
		'is'     => 'Icelandic',
		'id'     => 'Indonesian',
		'it'     => 'Italian',
		'ja'     => 'Japanese',
		'kn'     => 'Kannada',
		'ko'     => 'Korean',
		'lo'     => 'Laothian',
		'lv'     => 'Latvian',
		'lt'     => 'Lithuanian',
		'ms'     => 'Malay',
		'ml'     => 'Malayalam',
		'mr'     => 'Marathi',
		'mn'     => 'Mongolian',
		'no'     => 'Norwegian',
		'fa'     => 'Persian',
		'pl'     => 'Polish',
		'pt'     => 'Portuguese',
		'pt-BR'  => 'Portuguese (Brazil)',
		'pt-PT'  => 'Portuguese (Portugal)',
		'ro'     => 'Romanian',
		'ru'     => 'Russian',
		'sr'     => 'Serbian',
		'si'     => 'Sinhalese',
		'sk'     => 'Slovak',
		'sl'     => 'Slovenian',
		'es'     => 'Spanish',
		'es-419' => 'Spanish (Latin America)',
		'sw'     => 'Swahili',
		'sv'     => 'Swedish',
		'ta'     => 'Tamil',
		'te'     => 'Telugu',
		'th'     => 'Thai',
		'tr'     => 'Turkish',
		'uk'     => 'Ukrainian',
		'ur'     => 'Urdu',
		'vi'     => 'Vietnamese',
		'zu'     => 'Zulu',
	);
}

/**
 * Return turnstile languages.
 *
 * @since 1.0.0
 *
 * @return array Language lists.
 */
function aioc_get_turnstile_languages() {
	return array(
		'ar-eg' => 'Arabic',
		'de'    => 'German',
		'en'    => 'English',
		'es'    => 'Spanish',
		'fa'    => 'Persian',
		'fr'    => 'French',
		'id'    => 'Indonesian',
		'it'    => 'Italian',
		'ja'    => 'Japanese',
		'ko'    => 'Korean',
		'nl'    => 'Dutch',
		'pl'    => 'Polish',
		'pt-br' => 'Portuguese (Brazil)',
		'ru'    => 'Russian',
		'tr'    => 'Turkish',
		'uk'    => 'Ukrainian',
		'zh-cn' => 'Chinese (Simplified)',
		'zh-tw' => 'Chinese (Traditional)',
	);
}


/**
 * Return hcaptcha languages.
 *
 * @since 1.0.0
 *
 * @return array Language lists.
 */
function aioc_get_hcaptcha_languages() {
	return array(
		'af'    => 'Afrikaans',
		'sq'    => 'Albanian',
		'am'    => 'Amharic',
		'ar'    => 'Arabic',
		'hy'    => 'Armenian',
		'az'    => 'Azerbaijani',
		'eu'    => 'Basque',
		'be'    => 'Belarusian',
		'bn'    => 'Bengali',
		'bg'    => 'Bulgarian',
		'bs'    => 'Bosnian',
		'my'    => 'Burmese',
		'ca'    => 'Catalan',
		'ceb'   => 'Cebuano',
		'zh'    => 'Chinese',
		'zh-CN' => 'Chinese Simplified',
		'zh-TW' => 'Chinese Traditional',
		'co'    => 'Corsican',
		'hr'    => 'Croatian',
		'cs'    => 'Czech',
		'da'    => 'Danish',
		'nl'    => 'Dutch',
		'en'    => 'English',
		'eo'    => 'Esperanto',
		'et'    => 'Estonian',
		'fa'    => 'Persian',
		'fi'    => 'Finnish',
		'fr'    => 'French',
		'fy'    => 'Frisian',
		'gd'    => 'Gaelic',
		'gl'    => 'Galacian',
		'ka'    => 'Georgian',
		'de'    => 'German',
		'el'    => 'Greek',
		'gu'    => 'Gujurati',
		'ht'    => 'Haitian',
		'ha'    => 'Hausa',
		'haw'   => 'Hawaiian',
		'he'    => 'Hebrew',
		'hi'    => 'Hindi',
		'hmn'   => 'Hmong',
		'hu'    => 'Hungarian',
		'is'    => 'Icelandic',
		'ig'    => 'Igbo',
		'id'    => 'Indonesian',
		'ga'    => 'Irish',
		'it'    => 'Italian',
		'ja'    => 'Japanese',
		'jw'    => 'Javanese',
		'kn'    => 'Kannada',
		'kk'    => 'Kazakh',
		'km'    => 'Khmer',
		'rw'    => 'Kinyarwanda',
		'ky'    => 'Kirghiz',
		'ko'    => 'Korean',
		'ku'    => 'Kurdish',
		'lo'    => 'Lao',
		'la'    => 'Latin',
		'lv'    => 'Latvian',
		'lt'    => 'Lithuanian',
		'lb'    => 'Luxembourgish',
		'mk'    => 'Macedonian',
		'mg'    => 'Malagasy',
		'ms'    => 'Malay',
		'ml'    => 'Malayalam',
		'mt'    => 'Maltese',
		'mi'    => 'Maori',
		'mr'    => 'Marathi',
		'mn'    => 'Mongolian',
		'ne'    => 'Nepali',
		'no'    => 'Norwegian',
		'ny'    => 'Nyanja',
		'or'    => 'Oriya',
		'pl'    => 'Polish',
		'pt'    => 'Portuguese',
		'ps'    => 'Pashto',
		'pa'    => 'Punjabi',
		'ro'    => 'Romanian',
		'ru'    => 'Russian',
		'sm'    => 'Samoan',
		'sn'    => 'Shona',
		'sd'    => 'Sindhi',
		'si'    => 'Singhalese',
		'sr'    => 'Serbian',
		'sk'    => 'Slovak',
		'sl'    => 'Slovenian',
		'so'    => 'Somani',
		'st'    => 'Southern Sotho',
		'es'    => 'Spanish',
		'su'    => 'Sundanese',
		'sw'    => 'Swahili',
		'sv'    => 'Swedish',
		'tl'    => 'Tagalog',
		'tg'    => 'Tajik',
		'ta'    => 'Tamil',
		'tt'    => 'Tatar',
		'te'    => 'Teluga',
		'th'    => 'Thai',
		'tr'    => 'Turkish',
		'tk'    => 'Turkmen',
		'ug'    => 'Uyghur',
		'uk'    => 'Ukrainian',
		'ur'    => 'Urdu',
		'uz'    => 'Uzbek',
		'vi'    => 'Vietnamese',
		'cy'    => 'Welsh',
		'xh'    => 'Xhosa',
		'yi'    => 'Yiddish',
		'yo'    => 'Yoruba',
		'zu'    => 'Zulu',
	);
}

/**
 * Return captcha scores options.
 *
 * @since 1.0.0
 *
 * @return array $score_values Score lists.
 */
function aioc_get_captcha_scores() {
	$score_values = array();

	for ( $i = 0.0; $i <= 1; $i += 0.1 ) {
		$score_values[ "$i" ] = number_format_i18n( $i, 1 );
	}

	return $score_values;
}

/**
 * Sort by order id.
 *
 * @since 1.0.0
 *
 * @param bool $a Get Order id.
 * @param bool $b Get Order id.
 * @return bool Order by id.
 */
function aioc_sort_by_order_id( $a, $b ) {

	if ( $a['order_id'] > $b['order_id'] ) {
		return 1;
	} elseif ( $a['order_id'] < $b['order_id'] ) {
		return -1;
	}

	return 0;
}
