<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://atelierlabo.com
 * @since      1.0.0
 *
 * @package    Cf7_Countries
 * @subpackage Cf7_Countries/includes
 */

/**
 * The core plugin class.
 *
 * @since      1.0.0
 * @package    Cf7_Countries
 * @subpackage Cf7_Countries/includes
 * @author     Atelier Labo <wp@atelierlabo.com>
 */
class Atlb_Cf7_Countries {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Cf7_Countries_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'ATLB_CF7_VERSION' ) ) {
			$this->version = ATLB_CF7_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'cf7-countries';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Cf7_Countries_Loader. Orchestrates the hooks of the plugin.
	 * - Cf7_Countries_i18n. Defines internationalization functionality.
	 * - Cf7_Countries_Admin. Defines all hooks for the admin area.
	 * - Cf7_Countries_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-atlb-cf7-countries-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-atlb-cf7-countries-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-atlb-cf7-countries-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-atlb-cf7-countries-public.php';

		$this->loader = new Atlb_Cf7_Countries_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Cf7_Countries_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Atlb_Cf7_Countries_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Atlb_Cf7_Countries_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Atlb_Cf7_Countries_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Cf7_Countries_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
	
	public function atlb_get_countries() {
		return array(
			'AF' => __( 'Afghanistan', 'woocommerce' ),
			'AX' => __( '&#197;land Islands', 'woocommerce' ),
			'AL' => __( 'Albania', 'woocommerce' ),
			'DZ' => __( 'Algeria', 'woocommerce' ),
			'AS' => __( 'American Samoa', 'woocommerce' ),
			'AD' => __( 'Andorra', 'woocommerce' ),
			'AO' => __( 'Angola', 'woocommerce' ),
			'AI' => __( 'Anguilla', 'woocommerce' ),
			'AQ' => __( 'Antarctica', 'woocommerce' ),
			'AG' => __( 'Antigua and Barbuda', 'woocommerce' ),
			'AR' => __( 'Argentina', 'woocommerce' ),
			'AM' => __( 'Armenia', 'woocommerce' ),
			'AW' => __( 'Aruba', 'woocommerce' ),
			'AU' => __( 'Australia', 'woocommerce' ),
			'AT' => __( 'Austria', 'woocommerce' ),
			'AZ' => __( 'Azerbaijan', 'woocommerce' ),
			'BS' => __( 'Bahamas', 'woocommerce' ),
			'BH' => __( 'Bahrain', 'woocommerce' ),
			'BD' => __( 'Bangladesh', 'woocommerce' ),
			'BB' => __( 'Barbados', 'woocommerce' ),
			'BY' => __( 'Belarus', 'woocommerce' ),
			'BE' => __( 'Belgium', 'woocommerce' ),
			'PW' => __( 'Belau', 'woocommerce' ),
			'BZ' => __( 'Belize', 'woocommerce' ),
			'BJ' => __( 'Benin', 'woocommerce' ),
			'BM' => __( 'Bermuda', 'woocommerce' ),
			'BT' => __( 'Bhutan', 'woocommerce' ),
			'BO' => __( 'Bolivia', 'woocommerce' ),
			'BQ' => __( 'Bonaire, Saint Eustatius and Saba', 'woocommerce' ),
			'BA' => __( 'Bosnia and Herzegovina', 'woocommerce' ),
			'BW' => __( 'Botswana', 'woocommerce' ),
			'BV' => __( 'Bouvet Island', 'woocommerce' ),
			'BR' => __( 'Brazil', 'woocommerce' ),
			'IO' => __( 'British Indian Ocean Territory', 'woocommerce' ),
			'BN' => __( 'Brunei', 'woocommerce' ),
			'BG' => __( 'Bulgaria', 'woocommerce' ),
			'BF' => __( 'Burkina Faso', 'woocommerce' ),
			'BI' => __( 'Burundi', 'woocommerce' ),
			'KH' => __( 'Cambodia', 'woocommerce' ),
			'CM' => __( 'Cameroon', 'woocommerce' ),
			'CA' => __( 'Canada', 'woocommerce' ),
			'CV' => __( 'Cape Verde', 'woocommerce' ),
			'KY' => __( 'Cayman Islands', 'woocommerce' ),
			'CF' => __( 'Central African Republic', 'woocommerce' ),
			'TD' => __( 'Chad', 'woocommerce' ),
			'CL' => __( 'Chile', 'woocommerce' ),
			'CN' => __( 'China', 'woocommerce' ),
			'CX' => __( 'Christmas Island', 'woocommerce' ),
			'CC' => __( 'Cocos (Keeling) Islands', 'woocommerce' ),
			'CO' => __( 'Colombia', 'woocommerce' ),
			'KM' => __( 'Comoros', 'woocommerce' ),
			'CG' => __( 'Congo (Brazzaville)', 'woocommerce' ),
			'CD' => __( 'Congo (Kinshasa)', 'woocommerce' ),
			'CK' => __( 'Cook Islands', 'woocommerce' ),
			'CR' => __( 'Costa Rica', 'woocommerce' ),
			'HR' => __( 'Croatia', 'woocommerce' ),
			'CU' => __( 'Cuba', 'woocommerce' ),
			'CW' => __( 'Cura&ccedil;ao', 'woocommerce' ),
			'CY' => __( 'Cyprus', 'woocommerce' ),
			'CZ' => __( 'Czech Republic', 'woocommerce' ),
			'DK' => __( 'Denmark', 'woocommerce' ),
			'DJ' => __( 'Djibouti', 'woocommerce' ),
			'DM' => __( 'Dominica', 'woocommerce' ),
			'DO' => __( 'Dominican Republic', 'woocommerce' ),
			'EC' => __( 'Ecuador', 'woocommerce' ),
			'EG' => __( 'Egypt', 'woocommerce' ),
			'SV' => __( 'El Salvador', 'woocommerce' ),
			'GQ' => __( 'Equatorial Guinea', 'woocommerce' ),
			'ER' => __( 'Eritrea', 'woocommerce' ),
			'EE' => __( 'Estonia', 'woocommerce' ),
			'ET' => __( 'Ethiopia', 'woocommerce' ),
			'FK' => __( 'Falkland Islands', 'woocommerce' ),
			'FO' => __( 'Faroe Islands', 'woocommerce' ),
			'FJ' => __( 'Fiji', 'woocommerce' ),
			'FI' => __( 'Finland', 'woocommerce' ),
			'FR' => __( 'France', 'woocommerce' ),
			'GF' => __( 'French Guiana', 'woocommerce' ),
			'PF' => __( 'French Polynesia', 'woocommerce' ),
			'TF' => __( 'French Southern Territories', 'woocommerce' ),
			'GA' => __( 'Gabon', 'woocommerce' ),
			'GM' => __( 'Gambia', 'woocommerce' ),
			'GE' => __( 'Georgia', 'woocommerce' ),
			'DE' => __( 'Germany', 'woocommerce' ),
			'GH' => __( 'Ghana', 'woocommerce' ),
			'GI' => __( 'Gibraltar', 'woocommerce' ),
			'GR' => __( 'Greece', 'woocommerce' ),
			'GL' => __( 'Greenland', 'woocommerce' ),
			'GD' => __( 'Grenada', 'woocommerce' ),
			'GP' => __( 'Guadeloupe', 'woocommerce' ),
			'GU' => __( 'Guam', 'woocommerce' ),
			'GT' => __( 'Guatemala', 'woocommerce' ),
			'GG' => __( 'Guernsey', 'woocommerce' ),
			'GN' => __( 'Guinea', 'woocommerce' ),
			'GW' => __( 'Guinea-Bissau', 'woocommerce' ),
			'GY' => __( 'Guyana', 'woocommerce' ),
			'HT' => __( 'Haiti', 'woocommerce' ),
			'HM' => __( 'Heard Island and McDonald Islands', 'woocommerce' ),
			'HN' => __( 'Honduras', 'woocommerce' ),
			'HK' => __( 'Hong Kong', 'woocommerce' ),
			'HU' => __( 'Hungary', 'woocommerce' ),
			'IS' => __( 'Iceland', 'woocommerce' ),
			'IN' => __( 'India', 'woocommerce' ),
			'ID' => __( 'Indonesia', 'woocommerce' ),
			'IR' => __( 'Iran', 'woocommerce' ),
			'IQ' => __( 'Iraq', 'woocommerce' ),
			'IE' => __( 'Ireland', 'woocommerce' ),
			'IM' => __( 'Isle of Man', 'woocommerce' ),
			'IL' => __( 'Israel', 'woocommerce' ),
			'IT' => __( 'Italy', 'woocommerce' ),
			'CI' => __( 'Ivory Coast', 'woocommerce' ),
			'JM' => __( 'Jamaica', 'woocommerce' ),
			'JP' => __( 'Japan', 'woocommerce' ),
			'JE' => __( 'Jersey', 'woocommerce' ),
			'JO' => __( 'Jordan', 'woocommerce' ),
			'KZ' => __( 'Kazakhstan', 'woocommerce' ),
			'KE' => __( 'Kenya', 'woocommerce' ),
			'KI' => __( 'Kiribati', 'woocommerce' ),
			'KW' => __( 'Kuwait', 'woocommerce' ),
			'KG' => __( 'Kyrgyzstan', 'woocommerce' ),
			'LA' => __( 'Laos', 'woocommerce' ),
			'LV' => __( 'Latvia', 'woocommerce' ),
			'LB' => __( 'Lebanon', 'woocommerce' ),
			'LS' => __( 'Lesotho', 'woocommerce' ),
			'LR' => __( 'Liberia', 'woocommerce' ),
			'LY' => __( 'Libya', 'woocommerce' ),
			'LI' => __( 'Liechtenstein', 'woocommerce' ),
			'LT' => __( 'Lithuania', 'woocommerce' ),
			'LU' => __( 'Luxembourg', 'woocommerce' ),
			'MO' => __( 'Macao S.A.R., China', 'woocommerce' ),
			'MK' => __( 'Macedonia', 'woocommerce' ),
			'MG' => __( 'Madagascar', 'woocommerce' ),
			'MW' => __( 'Malawi', 'woocommerce' ),
			'MY' => __( 'Malaysia', 'woocommerce' ),
			'MV' => __( 'Maldives', 'woocommerce' ),
			'ML' => __( 'Mali', 'woocommerce' ),
			'MT' => __( 'Malta', 'woocommerce' ),
			'MH' => __( 'Marshall Islands', 'woocommerce' ),
			'MQ' => __( 'Martinique', 'woocommerce' ),
			'MR' => __( 'Mauritania', 'woocommerce' ),
			'MU' => __( 'Mauritius', 'woocommerce' ),
			'YT' => __( 'Mayotte', 'woocommerce' ),
			'MX' => __( 'Mexico', 'woocommerce' ),
			'FM' => __( 'Micronesia', 'woocommerce' ),
			'MD' => __( 'Moldova', 'woocommerce' ),
			'MC' => __( 'Monaco', 'woocommerce' ),
			'MN' => __( 'Mongolia', 'woocommerce' ),
			'ME' => __( 'Montenegro', 'woocommerce' ),
			'MS' => __( 'Montserrat', 'woocommerce' ),
			'MA' => __( 'Morocco', 'woocommerce' ),
			'MZ' => __( 'Mozambique', 'woocommerce' ),
			'MM' => __( 'Myanmar', 'woocommerce' ),
			'NA' => __( 'Namibia', 'woocommerce' ),
			'NR' => __( 'Nauru', 'woocommerce' ),
			'NP' => __( 'Nepal', 'woocommerce' ),
			'NL' => __( 'Netherlands', 'woocommerce' ),
			'NC' => __( 'New Caledonia', 'woocommerce' ),
			'NZ' => __( 'New Zealand', 'woocommerce' ),
			'NI' => __( 'Nicaragua', 'woocommerce' ),
			'NE' => __( 'Niger', 'woocommerce' ),
			'NG' => __( 'Nigeria', 'woocommerce' ),
			'NU' => __( 'Niue', 'woocommerce' ),
			'NF' => __( 'Norfolk Island', 'woocommerce' ),
			'MP' => __( 'Northern Mariana Islands', 'woocommerce' ),
			'KP' => __( 'North Korea', 'woocommerce' ),
			'NO' => __( 'Norway', 'woocommerce' ),
			'OM' => __( 'Oman', 'woocommerce' ),
			'PK' => __( 'Pakistan', 'woocommerce' ),
			'PS' => __( 'Palestinian Territory', 'woocommerce' ),
			'PA' => __( 'Panama', 'woocommerce' ),
			'PG' => __( 'Papua New Guinea', 'woocommerce' ),
			'PY' => __( 'Paraguay', 'woocommerce' ),
			'PE' => __( 'Peru', 'woocommerce' ),
			'PH' => __( 'Philippines', 'woocommerce' ),
			'PN' => __( 'Pitcairn', 'woocommerce' ),
			'PL' => __( 'Poland', 'woocommerce' ),
			'PT' => __( 'Portugal', 'woocommerce' ),
			'PR' => __( 'Puerto Rico', 'woocommerce' ),
			'QA' => __( 'Qatar', 'woocommerce' ),
			'RE' => __( 'Reunion', 'woocommerce' ),
			'RO' => __( 'Romania', 'woocommerce' ),
			'RU' => __( 'Russia', 'woocommerce' ),
			'RW' => __( 'Rwanda', 'woocommerce' ),
			'BL' => __( 'Saint Barth&eacute;lemy', 'woocommerce' ),
			'SH' => __( 'Saint Helena', 'woocommerce' ),
			'KN' => __( 'Saint Kitts and Nevis', 'woocommerce' ),
			'LC' => __( 'Saint Lucia', 'woocommerce' ),
			'MF' => __( 'Saint Martin (French part)', 'woocommerce' ),
			'SX' => __( 'Saint Martin (Dutch part)', 'woocommerce' ),
			'PM' => __( 'Saint Pierre and Miquelon', 'woocommerce' ),
			'VC' => __( 'Saint Vincent and the Grenadines', 'woocommerce' ),
			'SM' => __( 'San Marino', 'woocommerce' ),
			'ST' => __( 'S&atilde;o Tom&eacute; and Pr&iacute;ncipe', 'woocommerce' ),
			'SA' => __( 'Saudi Arabia', 'woocommerce' ),
			'SN' => __( 'Senegal', 'woocommerce' ),
			'RS' => __( 'Serbia', 'woocommerce' ),
			'SC' => __( 'Seychelles', 'woocommerce' ),
			'SL' => __( 'Sierra Leone', 'woocommerce' ),
			'SG' => __( 'Singapore', 'woocommerce' ),
			'SK' => __( 'Slovakia', 'woocommerce' ),
			'SI' => __( 'Slovenia', 'woocommerce' ),
			'SB' => __( 'Solomon Islands', 'woocommerce' ),
			'SO' => __( 'Somalia', 'woocommerce' ),
			'ZA' => __( 'South Africa', 'woocommerce' ),
			'GS' => __( 'South Georgia/Sandwich Islands', 'woocommerce' ),
			'KR' => __( 'South Korea', 'woocommerce' ),
			'SS' => __( 'South Sudan', 'woocommerce' ),
			'ES' => __( 'Spain', 'woocommerce' ),
			'LK' => __( 'Sri Lanka', 'woocommerce' ),
			'SD' => __( 'Sudan', 'woocommerce' ),
			'SR' => __( 'Suriname', 'woocommerce' ),
			'SJ' => __( 'Svalbard and Jan Mayen', 'woocommerce' ),
			'SZ' => __( 'Swaziland', 'woocommerce' ),
			'SE' => __( 'Sweden', 'woocommerce' ),
			'CH' => __( 'Switzerland', 'woocommerce' ),
			'SY' => __( 'Syria', 'woocommerce' ),
			'TW' => __( 'Taiwan', 'woocommerce' ),
			'TJ' => __( 'Tajikistan', 'woocommerce' ),
			'TZ' => __( 'Tanzania', 'woocommerce' ),
			'TH' => __( 'Thailand', 'woocommerce' ),
			'TL' => __( 'Timor-Leste', 'woocommerce' ),
			'TG' => __( 'Togo', 'woocommerce' ),
			'TK' => __( 'Tokelau', 'woocommerce' ),
			'TO' => __( 'Tonga', 'woocommerce' ),
			'TT' => __( 'Trinidad and Tobago', 'woocommerce' ),
			'TN' => __( 'Tunisia', 'woocommerce' ),
			'TR' => __( 'Turkey', 'woocommerce' ),
			'TM' => __( 'Turkmenistan', 'woocommerce' ),
			'TC' => __( 'Turks and Caicos Islands', 'woocommerce' ),
			'TV' => __( 'Tuvalu', 'woocommerce' ),
			'UG' => __( 'Uganda', 'woocommerce' ),
			'UA' => __( 'Ukraine', 'woocommerce' ),
			'AE' => __( 'United Arab Emirates', 'woocommerce' ),
			'GB' => __( 'United Kingdom (UK)', 'woocommerce' ),
			'US' => __( 'United States (US)', 'woocommerce' ),
			'UM' => __( 'United States (US) Minor Outlying Islands', 'woocommerce' ),
			'UY' => __( 'Uruguay', 'woocommerce' ),
			'UZ' => __( 'Uzbekistan', 'woocommerce' ),
			'VU' => __( 'Vanuatu', 'woocommerce' ),
			'VA' => __( 'Vatican', 'woocommerce' ),
			'VE' => __( 'Venezuela', 'woocommerce' ),
			'VN' => __( 'Vietnam', 'woocommerce' ),
			'VG' => __( 'Virgin Islands (British)', 'woocommerce' ),
			'VI' => __( 'Virgin Islands (US)', 'woocommerce' ),
			'WF' => __( 'Wallis and Futuna', 'woocommerce' ),
			'EH' => __( 'Western Sahara', 'woocommerce' ),
			'WS' => __( 'Samoa', 'woocommerce' ),
			'YE' => __( 'Yemen', 'woocommerce' ),
			'ZM' => __( 'Zambia', 'woocommerce' ),
			'ZW' => __( 'Zimbabwe', 'woocommerce' ),
		);
	}
	
	public static function countries() {
		$temp = new Atlb_Cf7_Countries();		
		return $temp->atlb_get_countries();
	}
}
