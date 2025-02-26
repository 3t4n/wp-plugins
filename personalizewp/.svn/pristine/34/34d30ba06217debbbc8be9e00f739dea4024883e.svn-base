<?php
/**
 * User browser language type condition Rules
 *
 * @link       https://personalizewp.com/
 * @since      2.7.0
 *
 * @package    PersonalizeWP
 * @subpackage PersonalizeWP/Rule_Conditions
 */

namespace PersonalizeWP\Rule_Conditions;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Checks for the existence of particular user's browser language'
 */
class Browser_Language extends RuleCondition {

	/**
	 * Class identifier
	 *
	 *  @var string
	 */
	public string $identifier = 'browser_language';

	/**
	 * User browser languages
	 *
	 *  @var string
	 */
	public string $browser_language = '';

	/**
	 * Constructor
	 */
	public function __construct() {

		parent::__construct();

		$this->category = __( 'Core', 'personalizewp' );

		$this->description = __( 'Browser Language', 'personalizewp' );

		$this->comparators = [
			'equals'         => _x( 'Is Equal To', 'Comparator', 'personalizewp' ),
			'does_not_equal' => _x( 'Does Not Equal', 'Comparator', 'personalizewp' ),
		];

		$this->comparison_values = $this->language_codes();
	}

	/**
	 * Returns the known browser language of the visitor
	 *
	 * @return array|false
	 */
	private function get_preferred_browser_language() {

		if ( ! isset( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ) {
			return false;
		}

		$this->browser_language = sanitize_text_field( $_SERVER['HTTP_ACCEPT_LANGUAGE'] );

		$preferred_lang = array();
		$languages      = array();

			// break up string into pieces (languages and q factors)
			preg_match_all( '/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', strtolower( $this->browser_language ), $lang_parse );

		if ( count( $lang_parse[1] ) ) {
			// create a list like "en" => 0.8
			$languages = array_combine( $lang_parse[1], $lang_parse[4] );

			// set default to 1 for any without q factor
			foreach ( $languages as $lang => $val ) {
				if ( '' === $val ) {
					$languages[ $lang ] = 1;
				}
			}

			arsort( $languages, SORT_NUMERIC );
		}

		if ( empty( $languages ) ) {
			return false;
		}

		// Capture the preferred language and create a default based off of it.
		array_push( $preferred_lang, array_key_first( $languages ) );
		// Create a default language code from the preferred language if it's a sub language
		if ( substr_count( array_key_first( $languages ), '-' ) ) {
			array_push( $preferred_lang, substr( array_key_first( $languages ), 0, strpos( array_key_first( $languages ), '-' ) ) );
		}

		return $preferred_lang;
	}

	/**
	 * Test data against condition
	 *
	 * @param string $comparator Comparator test to run
	 * @param string $value      Comparison to check
	 * @param string $action     Action to take
	 * @param object $meta       Additional meta data, cookie name/key
	 *
	 * @return bool
	 */
	public function matchesCriteria( $comparator, $value, $action, $meta = [] ): bool {
		switch ( $comparator ) {
			case 'equals':
				return $this->comparator_equals( $value );
			case 'does_not_equal':
				return $this->comparator_does_not_equal( $value );
		}

		return false;
	}

	/**
	 * "Equal" test
	 *
	 * @param string $value Comparison to check
	 *
	 * @return bool
	 */
	public function comparator_equals( $value ) {

		$user_language = $this->get_preferred_browser_language();

		if ( empty( $user_language ) ) {
			return false;
		}

		if ( in_array( $value, $user_language, true ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * "Does not equal" test
	 *
	 * @param string $value Comparison to check
	 *
	 * @return bool
	 */
	public function comparator_does_not_equal( $value ) {
		$user_language = $this->get_preferred_browser_language();

		if ( empty( $user_language ) ) {
			return false;
		}

		if ( in_array( $value, $user_language, true ) ) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Holds language codes for the browser.
	 *
	 *  @return array
	 */
	public function language_codes() {
		$languages_list = array(
			'af'    => _x( 'Afrikaans', 'Language name', 'personalizewp' ),
			'sq'    => _x( 'Albanian - shqip', 'Language name', 'personalizewp' ),
			'am'    => _x( 'Amharic - አማርኛ', 'Language name', 'personalizewp' ),
			'ar'    => _x( 'Arabic - العربية', 'Language name', 'personalizewp' ),
			'an'    => _x( 'Aragonese - aragonés', 'Language name', 'personalizewp' ),
			'hy'    => _x( 'Armenian - հայերեն', 'Language name', 'personalizewp' ),
			'ast'   => _x( 'Asturian - asturianu', 'Language name', 'personalizewp' ),
			'az'    => _x( 'Azerbaijani - azərbaycan dili', 'Language name', 'personalizewp' ),
			'eu'    => _x( 'Basque - euskara', 'Language name', 'personalizewp' ),
			'be'    => _x( 'Belarusian - беларуская', 'Language name', 'personalizewp' ),
			'bn'    => _x( 'Bengali - বাংলা', 'Language name', 'personalizewp' ),
			'bs'    => _x( 'Bosnian - bosanski', 'Language name', 'personalizewp' ),
			'br'    => _x( 'Breton - brezhoneg', 'Language name', 'personalizewp' ),
			'bg'    => _x( 'Bulgarian - български', 'Language name', 'personalizewp' ),
			'ca'    => _x( 'Catalan - català', 'Language name', 'personalizewp' ),
			'ckb'   => _x( 'Central Kurdish - کوردی (دەستنوسی عەرەبی)', 'Language name', 'personalizewp' ),
			'zh'    => _x( 'Chinese - 中文', 'Language name', 'personalizewp' ),
			'zh-hk' => _x( 'Chinese (Hong Kong) - 中文（香港）', 'Language name', 'personalizewp' ),
			'zh-cn' => _x( 'Chinese (Simplified) - 中文（简体）', 'Language name', 'personalizewp' ),
			'zh-tw' => _x( 'Chinese (Traditional) - 中文（繁體）', 'Language name', 'personalizewp' ),
			'co'    => _x( 'Corsican', 'Language name', 'personalizewp' ),
			'hr'    => _x( 'Croatian - hrvatski', 'Language name', 'personalizewp' ),
			'cs'    => _x( 'Czech - čeština', 'Language name', 'personalizewp' ),
			'da'    => _x( 'Danish - dansk', 'Language name', 'personalizewp' ),
			'nl'    => _x( 'Dutch - Nederlands', 'Language name', 'personalizewp' ),
			'en'    => _x( 'English', 'Language name', 'personalizewp' ),
			'en-au' => _x( 'English (Australia)', 'Language name', 'personalizewp' ),
			'en-ca' => _x( 'English (Canada)', 'Language name', 'personalizewp' ),
			'en-in' => _x( 'English (India)', 'Language name', 'personalizewp' ),
			'en-nz' => _x( 'English (New Zealand)', 'Language name', 'personalizewp' ),
			'en-za' => _x( 'English (South Africa)', 'Language name', 'personalizewp' ),
			'en-gb' => _x( 'English (United Kingdom)', 'Language name', 'personalizewp' ),
			'en-us' => _x( 'English (United States)', 'Language name', 'personalizewp' ),
			'eo'    => _x( 'Esperanto - esperanto', 'Language name', 'personalizewp' ),
			'et'    => _x( 'Estonian - eesti', 'Language name', 'personalizewp' ),
			'fo'    => _x( 'Faroese - føroyskt', 'Language name', 'personalizewp' ),
			'fil'   => _x( 'Filipino', 'Language name', 'personalizewp' ),
			'fi'    => _x( 'Finnish - suomi', 'Language name', 'personalizewp' ),
			'fr'    => _x( 'French - français', 'Language name', 'personalizewp' ),
			'fr-ca' => _x( 'French (Canada) - français (Canada)', 'Language name', 'personalizewp' ),
			'fr-fr' => _x( 'French (France) - français (France)', 'Language name', 'personalizewp' ),
			'fr-ch' => _x( 'French (Switzerland) - français (Suisse)', 'Language name', 'personalizewp' ),
			'gl'    => _x( 'Galician - galego', 'Language name', 'personalizewp' ),
			'ka'    => _x( 'Georgian - ქართული', 'Language name', 'personalizewp' ),
			'de'    => _x( 'German - Deutsch', 'Language name', 'personalizewp' ),
			'de-at' => _x( 'German (Austria) - Deutsch (Österreich)', 'Language name', 'personalizewp' ),
			'de-de' => _x( 'German (Germany) - Deutsch (Deutschland)', 'Language name', 'personalizewp' ),
			'de-li' => _x( 'German (Liechtenstein) - Deutsch (Liechtenstein)', 'Language name', 'personalizewp' ),
			'de-ch' => _x( 'German (Switzerland) - Deutsch (Schweiz)', 'Language name', 'personalizewp' ),
			'el'    => _x( 'Greek - Ελληνικά', 'Language name', 'personalizewp' ),
			'gn'    => _x( 'Guarani', 'Language name', 'personalizewp' ),
			'gu'    => _x( 'Gujarati - ગુજરાતી', 'Language name', 'personalizewp' ),
			'ha'    => _x( 'Hausa', 'Language name', 'personalizewp' ),
			'haw'   => _x( 'Hawaiian - ʻŌlelo Hawaiʻi', 'Language name', 'personalizewp' ),
			'he'    => _x( 'Hebrew - עברית', 'Language name', 'personalizewp' ),
			'hi'    => _x( 'Hindi - हिन्दी', 'Language name', 'personalizewp' ),
			'hu'    => _x( 'Hungarian - magyar', 'Language name', 'personalizewp' ),
			'is'    => _x( 'Icelandic - íslenska', 'Language name', 'personalizewp' ),
			'id'    => _x( 'Indonesian - Indonesia', 'Language name', 'personalizewp' ),
			'ia'    => _x( 'Interlingua', 'Language name', 'personalizewp' ),
			'ga'    => _x( 'Irish - Gaeilge', 'Language name', 'personalizewp' ),
			'it'    => _x( 'Italian - italiano', 'Language name', 'personalizewp' ),
			'it-it' => _x( 'Italian (Italy) - italiano (Italia)', 'Language name', 'personalizewp' ),
			'it-ch' => _x( 'Italian (Switzerland) - italiano (Svizzera)', 'Language name', 'personalizewp' ),
			'ja'    => _x( 'Japanese - 日本語', 'Language name', 'personalizewp' ),
			'kn'    => _x( 'Kannada - ಕನ್ನಡ', 'Language name', 'personalizewp' ),
			'kk'    => _x( 'Kazakh - қазақ тілі', 'Language name', 'personalizewp' ),
			'km'    => _x( 'Khmer - ខ្មែរ', 'Language name', 'personalizewp' ),
			'ko'    => _x( 'Korean - 한국어', 'Language name', 'personalizewp' ),
			'ku'    => _x( 'Kurdish - Kurdî', 'Language name', 'personalizewp' ),
			'ky'    => _x( 'Kyrgyz - кыргызча', 'Language name', 'personalizewp' ),
			'lo'    => _x( 'Lao - ລາວ', 'Language name', 'personalizewp' ),
			'la'    => _x( 'Latin', 'Language name', 'personalizewp' ),
			'lv'    => _x( 'Latvian - latviešu', 'Language name', 'personalizewp' ),
			'ln'    => _x( 'Lingala - lingála', 'Language name', 'personalizewp' ),
			'lt'    => _x( 'Lithuanian - lietuvių', 'Language name', 'personalizewp' ),
			'mk'    => _x( 'Macedonian - македонски', 'Language name', 'personalizewp' ),
			'ms'    => _x( 'Malay - Bahasa Melayu', 'Language name', 'personalizewp' ),
			'ml'    => _x( 'Malayalam - മലയാളം', 'Language name', 'personalizewp' ),
			'mt'    => _x( 'Maltese - Malti', 'Language name', 'personalizewp' ),
			'mr'    => _x( 'Marathi - मराठी', 'Language name', 'personalizewp' ),
			'mn'    => _x( 'Mongolian - монгол', 'Language name', 'personalizewp' ),
			'ne'    => _x( 'Nepali - नेपाली', 'Language name', 'personalizewp' ),
			'no'    => _x( 'Norwegian - norsk', 'Language name', 'personalizewp' ),
			'nb'    => _x( 'Norwegian Bokmål - norsk bokmål', 'Language name', 'personalizewp' ),
			'nn'    => _x( 'Norwegian Nynorsk - nynorsk', 'Language name', 'personalizewp' ),
			'oc'    => _x( 'Occitan', 'Language name', 'personalizewp' ),
			'or'    => _x( 'Oriya - ଓଡ଼ିଆ', 'Language name', 'personalizewp' ),
			'om'    => _x( 'Oromo - Oromoo', 'Language name', 'personalizewp' ),
			'ps'    => _x( 'Pashto - پښتو', 'Language name', 'personalizewp' ),
			'fa'    => _x( 'Persian - فارسی', 'Language name', 'personalizewp' ),
			'pl'    => _x( 'Polish - polski', 'Language name', 'personalizewp' ),
			'pt'    => _x( 'Portuguese - português', 'Language name', 'personalizewp' ),
			'pt-br' => _x( 'Portuguese (Brazil) - português (Brasil)', 'Language name', 'personalizewp' ),
			'pt-pt' => _x( 'Portuguese (Portugal) - português (Portugal)', 'Language name', 'personalizewp' ),
			'pa'    => _x( 'Punjabi - ਪੰਜਾਬੀ', 'Language name', 'personalizewp' ),
			'qu'    => _x( 'Quechua', 'Language name', 'personalizewp' ),
			'ro'    => _x( 'Romanian - română', 'Language name', 'personalizewp' ),
			'mo'    => _x( 'Romanian (Moldova) - română (Moldova)', 'Language name', 'personalizewp' ),
			'rm'    => _x( 'Romansh - rumantsch', 'Language name', 'personalizewp' ),
			'ru'    => _x( 'Russian - русский', 'Language name', 'personalizewp' ),
			'gd'    => _x( 'Scottish Gaelic', 'Language name', 'personalizewp' ),
			'sr'    => _x( 'Serbian - српски', 'Language name', 'personalizewp' ),
			'sh'    => _x( 'Serbo - Croatian', 'Language name', 'personalizewp' ),
			'sn'    => _x( 'Shona - chiShona', 'Language name', 'personalizewp' ),
			'sd'    => _x( 'Sindhi', 'Language name', 'personalizewp' ),
			'si'    => _x( 'Sinhala - සිංහල', 'Language name', 'personalizewp' ),
			'sk'    => _x( 'Slovak - slovenčina', 'Language name', 'personalizewp' ),
			'sl'    => _x( 'Slovenian - slovenščina', 'Language name', 'personalizewp' ),
			'so'    => _x( 'Somali - Soomaali', 'Language name', 'personalizewp' ),
			'st'    => _x( 'Southern Sotho', 'Language name', 'personalizewp' ),
			'es'    => _x( 'Spanish - español', 'Language name', 'personalizewp' ),
			'es-ar' => _x( 'Spanish (Argentina) - español (Argentina)', 'Language name', 'personalizewp' ),
			'es-mx' => _x( 'Spanish (Mexico) - español (México)', 'Language name', 'personalizewp' ),
			'es-es' => _x( 'Spanish (Spain) - español (España)', 'Language name', 'personalizewp' ),
			'es-us' => _x( 'Spanish (United States) - español (Estados Unidos)', 'Language name', 'personalizewp' ),
			'su'    => _x( 'Sundanese', 'Language name', 'personalizewp' ),
			'sw'    => _x( 'Swahili - Kiswahili', 'Language name', 'personalizewp' ),
			'sv'    => _x( 'Swedish - svenska', 'Language name', 'personalizewp' ),
			'tg'    => _x( 'Tajik - тоҷикӣ', 'Language name', 'personalizewp' ),
			'ta'    => _x( 'Tamil - தமிழ்', 'Language name', 'personalizewp' ),
			'tt'    => _x( 'Tatar', 'Language name', 'personalizewp' ),
			'te'    => _x( 'Telugu - తెలుగు', 'Language name', 'personalizewp' ),
			'th'    => _x( 'Thai - ไทย', 'Language name', 'personalizewp' ),
			'ti'    => _x( 'Tigrinya - ትግርኛ', 'Language name', 'personalizewp' ),
			'to'    => _x( 'Tongan - lea fakatonga', 'Language name', 'personalizewp' ),
			'tr'    => _x( 'Turkish - Türkçe', 'Language name', 'personalizewp' ),
			'tk'    => _x( 'Turkmen', 'Language name', 'personalizewp' ),
			'tw'    => _x( 'Twi', 'Language name', 'personalizewp' ),
			'uk'    => _x( 'Ukrainian - українська', 'Language name', 'personalizewp' ),
			'ur'    => _x( 'Urdu - اردو', 'Language name', 'personalizewp' ),
			'ug'    => _x( 'Uyghur', 'Language name', 'personalizewp' ),
			'uz'    => _x( 'Uzbek - o‘zbek', 'Language name', 'personalizewp' ),
			'vi'    => _x( 'Vietnamese - Tiếng Việt', 'Language name', 'personalizewp' ),
			'wa'    => _x( 'Walloon - wa', 'Language name', 'personalizewp' ),
			'cy'    => _x( 'Welsh - Cymraeg', 'Language name', 'personalizewp' ),
			'fy'    => _x( 'Western Frisian', 'Language name', 'personalizewp' ),
			'xh'    => _x( 'Xhosa', 'Language name', 'personalizewp' ),
			'yi'    => _x( 'Yiddish', 'Language name', 'personalizewp' ),
			'yo'    => _x( 'Yoruba - Èdè Yorùbá', 'Language name', 'personalizewp' ),
			'zu'    => _x( 'Zulu - isiZulu', 'Language name', 'personalizewp' ),
		);

		return $languages_list;
	}
}
