<?php
/**
 * Connects to the Engage API to get information about configured actions.
 *
 * @author Cornershop Creative
 */
class EngageConnector {

	protected static $instance = false;
	public $metrics = false;
	public $last_response = null;
	// To facilitate debugging, the raw output from the most recent call is logged
	/**
	 * Gets the singleton instance of the Engage connector.  You must call
	 * initialize() before you can call this function.
	 *
	 * @return GFEngageConnector The singleton instance, or false if it has not
	 *   yet been initialized.
	 */
	public static function instance() {
		return self::$instance;
	}

	/**
	 * Creates a new API connection and authenticates with the Engage server.
	 *
	 * @param string $api_key The API Key to use during all requests.
	 * @return GFEngageConnector The newly-created GFEngageConnector singleton.
	 */
	public static function initialize( $api_key ) {
		self::$instance = new EngageConnector( $api_key );
		return self::$instance;
	}

	/** @var reference $ch The open CURL HTTP connection */
	protected $ch = null;

	/** @var string $host The URL of the API server */
	public $host = 'https://api.salsalabs.org/api/integration/ext/v1';

	/** @var array $errors A list of connection errors */
	protected $errors = array();

	/** @var array $segments A list of Engage segments */
	protected $segments = array();

	/** @var the API to user */
	protected $api_key = '';

	/**
	 * Creates a new connection with the Engage API.  You should use initialize()
	 * to create a singleton instead of calling this function directly.
	 */
	protected function __construct( $api_key ) {

		$this->api_key = $api_key;

		// Configure the HTTP connection (maintain cookies)
		$this->ch = curl_init();
		curl_setopt( $this->ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $this->ch, CURLOPT_TIMEOUT, 8 );
		curl_setopt( $this->ch, CURLOPT_COOKIESESSION, true );
		curl_setopt( $this->ch, CURLOPT_COOKIEFILE, '/tmp/cookies_file' );
		curl_setopt( $this->ch, CURLOPT_COOKIEJAR, '/tmp/cookies_file' );

		// Make curl use SSH properly
		curl_setopt( $this->ch, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $this->ch, CURLOPT_SSL_VERIFYHOST, 2 );

		// Set headers for our connection
		curl_setopt( $this->ch, CURLOPT_HEADER, false );
		curl_setopt(
			$this->ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'authToken:' . $this->api_key,
			)
		);

		// Authenticate
		$auth = $this->call( '/metrics' );

		if ( ! isset( $auth ) ) {
			$this->errors[] = 'We were unable to authenticate with the server; no response payload.';
			return;
		}

		$this->metrics = $auth;
		if ( isset( $auth->error ) ) {
			$this->errors[] = 'We were unable to authenticate with the server.';
			return;
		}

	}


	/**
	 * Convenience method to tacking on errors. Not called within object anywhere
	 */
	public function addErrors( $errors ) {
		if ( is_string( $errors ) ) {
			$errors = array( $errors );
		}
		$this->errors = array_merge( $this->errors, $errors );
	}

	/**
	 * Gets a list of all the errors that have accumulated so far.
	 *
	 * @param boolean $reset If this set to false, the errors will be preserved
	 *   after this call.  Otherwise, they will be cleared.
	 * @return array<string> A list of error messages, or an empty list if there
	 *   have been no errors since the last time the list was reset.
	 */
	public function getErrors( $reset = false ) {
		$out = $this->errors;
		if ( $reset ) {
			$this->errors = array();
		}
		return $out;
	}


	/**
	 * Sends data to a URL and parses the resulting JSON string into
	 * an object or array of objects.
	 *
	 * @param string $endpoint The path on the AP, starting with /.
	 * @param array  $method The HTTP method used, e.g. GET/POST/PUT.
	 * @return array The response, parsed into arrays and hashes.
	 */
	public function call( $endpoint, $method = 'GET', $params = false ) {

		$q = '';
		$params = self::engagify_parameters( $params );

		// Set our method and params
		switch ( $method ) {
			case 'POST':
				curl_setopt( $this->ch, CURLOPT_POST, 1 );
				if ( $params ) {
					curl_setopt( $this->ch, CURLOPT_POSTFIELDS, wp_json_encode( $params ) );
				}
				break;
			case 'GET':
				curl_setopt( $this->ch, CURLOPT_HTTPGET, 1 );
				if ( $params ) {
					$q = $this->serializeParams( $params );
					$endpoint .= '?' . $q;
				}
				break;
			case 'PUT':
				curl_setopt( $this->ch, CURLOPT_CUSTOMREQUEST, 'PUT' );
				if ( $params ) {
					curl_setopt( $this->ch, CURLOPT_POSTFIELDS, wp_json_encode( $params ) );
				}
				break;
		}//end switch

		// Set our URL
		curl_setopt( $this->ch, CURLOPT_URL, $this->host . $endpoint );

		try {

			// perform the API call
			$res = curl_exec( $this->ch );

			if ( false === $res ) {
				throw new \Exception( curl_error( $this->ch ), curl_errno( $this->ch ) );
			}

			$this->last_response = $res;

			// if the API returned back empty data like an array []. This happened when I wanted to get the ID of a Salsa supporter that didn't exist in the user's supporter list. The API just returned []
			// Perform a basic check
			if ( empty( $res ) ) {
				$this->addErrors( __( 'Unable to connect to the server and receive a response.', 'gfengage' ) );
				return null;
			}

			// Convert from a JSON object
			$obj = json_decode( $res );

			if ( ! isset( $obj ) ) {
				$this->addErrors( __( 'Server provided invalid JSON', 'gfengage' ) );
				$this->addErrors( $res );
				return false;
			}

			if ( isset( $obj->errors ) ) {
				$this->addErrors( $obj->errors );
				return false;
			}

			if ( ! isset( $obj->payload ) ) {
				$this->addErrors( __( 'No payload present', 'gfengage' ) );
				return false;
			}

			// give back an object of the response
			return $obj->payload;

		} catch ( \Exception $e ) {

			trigger_error(
				sprintf(
					'cURL failed with error code %s and error message %s',
					$e->getCode(),	// phpcs:ignore
					$e->getMessage() // phpcs:ignore
				),
				E_USER_ERROR
			);
		}//end try
	}

	/**
	 * Serializes the given array of parameters into a valid query string.
	 * Use this function instead of http_query_params() when submitting to the
	 * Engage, because keys with multiple values should not have array
	 * brackets added to them.
	 *
	 * The parameters can either be an array of arrays where each inner array
	 * contains a single key and value, or it can be an array of key/value pairs
	 * where a key with multiple values stores its values in an array.
	 *
	 * @param array $params An array of key/value pairs to post.
	 * @return string A url-encoded query string.
	 */
	function serializeParams( $params ) {

		// Serialize the parameters ourselves so that multiple values are not wrapped
		$q = array();

		foreach ( $params as $key => $val ) {
			if ( is_array( $val ) ) {
				foreach ( $val as $k => $v ) {
					// If the array is numerically indexed, use the parent key
					if ( is_int( $k ) ) {
						$k = $key;
					}
					$q[] = "$k=" . rawurlencode( $v );
				}
			} else {
				$q[] = "$key=" . rawurlencode( $val );
			}
		}
		return implode( '&', $q );
	}

	/**
	 * When the object is destroyed, close the HTTP connection.
	 */
	public function __destruct() {
		if ( isset( $this->ch ) ) {
			curl_close( $this->ch );
		}
	}

	/**
	 * Get and return a list of Segments from this Engage account
	 *
	 * @return array of name|segmentID arrays
	 */
	public function getSegments() {

		$endpoint = '/segments/search';
		$params = array(
			'offset' => 0,
			'count'  => 20,
			'includeMemberCounts' => false,
		);

		$response = $this->call( $endpoint, 'POST', $params );

		if ( $response->total ) {

			// if we already have them all, return them.
			if ( count( $this->segments ) === (int) $response->total ) {
				return $this->segments;
			}

			foreach ( $response->segments as $segment ) {
				$this->segments[] = array(
					'name'       => $segment->name,
					'segmentId'  => $segment->segmentId,
				);
			}

			// See how many pages we need
			$total_loops = ceil( $response->total / 20 );
			$loops_run = 1;

			// LOOP IN HERE
			while ( $loops_run < $total_loops ) {

				$params['offset'] = 20 * $loops_run;
				$response = $this->call( $endpoint, 'POST', $params );
				foreach ( $response->segments as $segment ) {
					$this->segments[] = array(
						'name'       => $segment->name,
						'segmentId'  => $segment->segmentId,
					);
				}

				$loops_run++;
			}
		} else {
			$this->errors[] = __( 'Invalid segments response received', 'gfengage' );
		}//end if

		// Sort them alphabetically.
		usort( $this->segments, array( $this, 'usort_alphabetically' ) );

		return $this->segments;
	}

	/**
	 * Usort callback to order array alphabetically.
	 */
	function usort_alphabetically( $a, $b ) {
		return strcmp( $a['name'], $b['name'] );
	}

	/**
	 * State and Country abbreviations
	 */
	static function abbreviate( $value, $field_name ) {

		$states = array(
			'AL' => 'Alabama',
			'AK' => 'Alaska',
			'AZ' => 'Arizona',
			'AR' => 'Arkansas',
			'CA' => 'California',
			'CO' => 'Colorado',
			'CT' => 'Connecticut',
			'DE' => 'Delaware',
			'DC' => 'District of Columbia',
			'FL' => 'Florida',
			'GA' => 'Georgia',
			'HI' => 'Hawaii',
			'ID' => 'Idaho',
			'IL' => 'Illinois',
			'IN' => 'Indiana',
			'IA' => 'Iowa',
			'KS' => 'Kansas',
			'KY' => 'Kentucky',
			'LA' => 'Louisiana',
			'ME' => 'Maine',
			'MD' => 'Maryland',
			'MA' => 'Massachusetts',
			'MI' => 'Michigan',
			'MN' => 'Minnesota',
			'MS' => 'Mississippi',
			'MO' => 'Missouri',
			'MT' => 'Montana',
			'NE' => 'Nebraska',
			'NV' => 'Nevada',
			'NH' => 'New Hampshire',
			'NJ' => 'New Jersey',
			'NM' => 'New Mexico',
			'NY' => 'New York',
			'NC' => 'North Carolina',
			'ND' => 'North Dakota',
			'OH' => 'Ohio',
			'OK' => 'Oklahoma',
			'OR' => 'Oregon',
			'PA' => 'Pennsylvania',
			'RI' => 'Rhode Island',
			'SC' => 'South Carolina',
			'SD' => 'South Dakota',
			'TN' => 'Tennessee',
			'TX' => 'Texas',
			'UT' => 'Utah',
			'VT' => 'Vermont',
			'VA' => 'Virginia',
			'WA' => 'Washington',
			'WV' => 'West Virginia',
			'WI' => 'Wisconsin',
			'WY' => 'Wyoming',
			'AS' => 'America Samoa',
			'MP' => 'Northern Mariana Islands',
			'PR' => 'Puerto Rico',
			'VI' => 'Virgin Islands',
			'GU' => 'Guam',
			'AA' => 'Armed Forces Americas',
			'AE' => 'Armed Forces Europe',
			'AP' => 'Armed Forces Pacific',
			'AB' => 'Alberta',
			'BC' => 'British Columbia',
			'MB' => 'Manitoba',
			'NL' => 'Newfoundland and Labrador',
			'NB' => 'New Brunswick',
			'NS' => 'Nova Scotia',
			'NT' => 'Northwest Territories',
			'NU' => 'Nunavut',
			'ON' => 'Ontario',
			'PE' => 'Prince Edward Island',
			'QC' => 'Quebec',
			'SK' => 'Saskatchewan',
			'YT' => 'Yukon Territory',
			'ot' => 'Other',
		);

		$countries = array(
			'US' => 'United States',
			'AF' => 'Afghanistan',
			'AL' => 'Albania',
			'DZ' => 'Algeria',
			'AS' => 'American Samoa',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AQ' => 'Antarctica',
			'AG' => 'Antigua and Barbuda',
			'AR' => 'Argentina',
			'AM' => 'Armenia',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria',
			'AZ' => 'Azerbaijan',
			'BS' => 'Bahamas',
			'BH' => 'Bahrain',
			'BD' => 'Bangladesh',
			'BB' => 'Barbados',
			'BY' => 'Belarus',
			'BE' => 'Belgium',
			'BZ' => 'Belize',
			'BJ' => 'Benin',
			'BM' => 'Bermuda',
			'BT' => 'Bhutan',
			'BO' => 'Bolivia',
			'BA' => 'Bosnia and Herzegovina',
			'BW' => 'Botswana',
			'BV' => 'Bouvet Island',
			'BR' => 'Brazil',
			'IO' => 'British Indian Ocean Territory',
			'BN' => 'Brunei Darussalam',
			'BG' => 'Bulgaria',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi',
			'KH' => 'Cambodia',
			'CM' => 'Cameroon',
			'CA' => 'Canada',
			'CV' => 'Cape Verde',
			'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic',
			'TD' => 'Chad',
			'CL' => 'Chile',
			'CN' => 'China',
			'CX' => 'Christmas Island',
			'CC' => 'Cocos (Keeling) Islands',
			'CO' => 'Colombia',
			'KM' => 'Comoros',
			'CG' => 'Congo',
			'CD' => 'Congo, The Democratic Republic of the',
			'CK' => 'Cook Islands',
			'CR' => 'Costa Rica',
			'CI' => "Cote D'Ivoire",
			'HR' => 'Croatia',
			'CU' => 'Cuba',
			'CW' => 'Curacao',
			'CY' => 'Cyprus',
			'CZ' => 'Czech Republic',
			'DK' => 'Denmark',
			'DJ' => 'Djibouti',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
			'TL' => 'East Timor',
			'EC' => 'Ecuador',
			'EG' => 'Egypt',
			'SV' => 'El Salvador',
			'GQ' => 'Equatorial Guinea',
			'ER' => 'Eritrea',
			'EE' => 'Estonia',
			'ET' => 'Ethiopia',
			'FK' => 'Falkland Islands (Malvinas)',
			'FO' => 'Faroe Islands',
			'FJ' => 'Fiji',
			'FI' => 'Finland',
			'FR' => 'France',
			'FX' => 'France, Metropolitan',
			'GF' => 'French Guiana',
			'PF' => 'French Polynesia',
			'TF' => 'French Southern Territories',
			'GA' => 'Gabon',
			'GM' => 'Gambia',
			'GE' => 'Georgia',
			'DE' => 'Germany',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GR' => 'Greece',
			'GL' => 'Greenland',
			'GD' => 'Grenada',
			'GP' => 'Guadeloupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GN' => 'Guinea',
			'GW' => 'Guinea-Bissau',
			'GY' => 'Guyana',
			'HT' => 'Haiti',
			'HM' => 'Heard and McDonald Islands',
			'VA' => 'Holy See (Vatican City State)',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong',
			'HU' => 'Hungary',
			'IS' => 'Iceland',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IR' => 'Iran, Islamic Republic of',
			'IQ' => 'Iraq',
			'IE' => 'Ireland',
			'IL' => 'Israel',
			'IT' => 'Italy',
			'JM' => 'Jamaica',
			'JP' => 'Japan',
			'JO' => 'Jordan',
			'KZ' => 'Kazakhstan',
			'KE' => 'Kenya',
			'KI' => 'Kiribati',
			'KP' => "Korea, Dem. People's Republic of",
			'KR' => 'Korea, Republic of',
			'KW' => 'Kuwait',
			'KG' => 'Kyrgyzstan',
			'LA' => "Lao People's Democratic Republic",
			'LV' => 'Latvia',
			'LB' => 'Lebanon',
			'LS' => 'Lesotho',
			'LR' => 'Liberia',
			'LY' => 'Libyan Arab Jamahiriya',
			'LI' => 'Liechtenstein',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
			'MO' => 'Macao',
			'MK' => 'Macedonia, Former Yugoslav Republic',
			'MG' => 'Madagascar',
			'MW' => 'Malawi',
			'MY' => 'Malaysia',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MH' => 'Marshall Islands',
			'MQ' => 'Martinique',
			'MR' => 'Mauritania',
			'MU' => 'Mauritius',
			'YT' => 'Mayotte',
			'MX' => 'Mexico',
			'FM' => 'Micronesia, Federated States of',
			'MD' => 'Moldova, Republic of',
			'MC' => 'Monaco',
			'MN' => 'Mongolia',
			'MS' => 'Montserrat',
			'MA' => 'Morocco',
			'MZ' => 'Mozambique',
			'MM' => 'Myanmar',
			'NA' => 'Namibia',
			'NR' => 'Nauru',
			'NP' => 'Nepal',
			'NL' => 'Netherlands',
			'NC' => 'New Caledonia',
			'NZ' => 'New Zealand',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NG' => 'Nigeria',
			'NU' => 'Niue',
			'NF' => 'Norfolk Island',
			'MP' => 'Northern Mariana Islands',
			'NO' => 'Norway',
			'OM' => 'Oman',
			'PK' => 'Pakistan',
			'PW' => 'Palau',
			'PS' => 'Palestinian Territory, Occupied',
			'PA' => 'Panama',
			'PG' => 'Papua New Guinea',
			'PY' => 'Paraguay',
			'PE' => 'Peru',
			'PH' => 'Philippines',
			'PN' => 'Pitcairn',
			'PL' => 'Poland',
			'PT' => 'Portugal',
			'PR' => 'Puerto Rico',
			'QA' => 'Qatar',
			'RE' => 'Reunion',
			'RO' => 'Romania',
			'RU' => 'Russian Federation',
			'RW' => 'Rwanda',
			'SH' => 'Saint Helena',
			'KN' => 'Saint Kitts and Nevis',
			'LC' => 'Saint Lucia',
			'PM' => 'Saint Pierre and Miquelon',
			'VC' => 'Saint Vincent and the Grenadines',
			'WS' => 'Samoa',
			'SM' => 'San Marino',
			'ST' => 'Sao Tome and Principe',
			'SA' => 'Saudi Arabia',
			'SN' => 'Senegal',
			'SP' => 'Serbia',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapore',
			'SX' => 'Sint Maarten',
			'SK' => 'Slovakia',
			'SI' => 'Slovenia',
			'SB' => 'Solomon Islands',
			'SO' => 'Somalia',
			'ZA' => 'South Africa',
			'SS' => 'South Sudan',
			'GS' => 'S. Georgia and S. Sandwich Islands',
			'ES' => 'Spain',
			'LK' => 'Sri Lanka',
			'SD' => 'Sudan',
			'SR' => 'Suriname',
			'SJ' => 'Svalbard and Jan Mayen',
			'SZ' => 'Swaziland',
			'SE' => 'Sweden',
			'CH' => 'Switzerland',
			'SY' => 'Syrian Arab Republic',
			'TW' => 'Taiwan',
			'TJ' => 'Tajikistan',
			'TZ' => 'Tanzania, United Republic of',
			'TH' => 'Thailand',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinidad and Tobago',
			'TN' => 'Tunisia',
			'TR' => 'Turkey',
			'TM' => 'Turkmenistan',
			'TC' => 'Turks and Caicos Islands',
			'TV' => 'Tuvalu',
			'UG' => 'Uganda',
			'UA' => 'Ukraine',
			'AE' => 'United Arab Emirates',
			'GB' => 'United Kingdom',
			'UM' => 'United States Outlying Islands',
			'UY' => 'Uruguay',
			'UZ' => 'Uzbekistan',
			'VU' => 'Vanuatu',
			'VE' => 'Venezuela',
			'VN' => 'Vietnam',
			'VG' => 'Virgin Islands, British',
			'VI' => 'Virgin Islands, U.S.',
			'WF' => 'Wallis and Futuna',
			'EH' => 'Western Sahara',
			'YE' => 'Yemen',
			'YU' => 'Yugoslavia',
			'ZR' => 'Zaire',
			'ZM' => 'Zambia',
			'ZW' => 'Zimbabwe',
		);
		// end countries
		if ( 'Country' === $field_name ) {
			$reference_array = $countries;
		} else {
			$reference_array = $states;
		}

		$abbreviation = array_search( $value, $reference_array, true );
		if ( $abbreviation ) {
			return $abbreviation;
		}

		return $value;

	}

	/**
	 * Turn a one-dimensional array into a multi-dimensional one with sub-objects for Engage.
	 * Breaks things up on periods within the associative key.
	 */
	public static function engagify_parameters( $params, $is_top = true ) {

		if ( ! is_array( $params ) ) {
			return $params;
		}

		foreach ( $params as $key => $value ) {

			// check if we have a pipe, which indicates a subobject
			if ( false !== strpos( $key, '|' ) ) {

				list( $subobject, $field ) = explode( '|', $key, 2 );

				// if this seems like a valid split, e.g. address.line1, go ahead and create an 'address' key if we need to.
				if ( $subobject && $field ) {

					// initialize our subobject if we need to.
					if ( ! array_key_exists( $subobject, $params ) || ! is_array( $params[ $subobject ] ) ) {
						$params[ $subobject ] = array();
					}

					// Assign our current value to the contacts subarray if that's what we have
					if ( 'contacts' === $subobject ) {

						// contacts|EMAIL_status is a special case
						if ( 'EMAIL_status' === $field && is_array( $params[ $subobject ][0] ) ) {
							$status_string = self::prepare_email_status_value( $value );
							$params[ $subobject ][]['status'] = $status_string;
						}

						$params[ $subobject ][] = array(
							'type'  => $field,
							'value' => $value,
						);

					} else {
						// Assign our current value to the subjobject field, and unset our original.
						$params[ $subobject ][ $field ] = $value;
					}

					unset( $params[ $key ] );

				}//end if
			} else {

				// recursion FTW
				if ( is_array( $value ) ) {
					$params[ $key ] = self::engagify_parameters( $value, false );
				}
			}//end if
		}//end foreach

		if ( $is_top ) {
			return array(
				'payload' => $params,
			);
		} else {
			return $params;
		}

	}


	/**
	 * More than likely our GForms field is providing a value like 'yes' or 1
	 * But Engage needs it as OPT_IN or OPT_OUT. So we convert it here
	 * Assumption is that 'yes' is true and 'no' is false
	 */
	public static function prepare_email_status_value( $value ) {

		$original_value  = $value;
		if ( is_string( $value ) ) {
			$value = strtolower( $value );
		}

		switch ( $value ) {

			case 'n':
			case 'no':
			case '0':
			case 0:
			case 'f':
			case false:
				$converted_value = 'OPT_OUT';
				break;
			default:
				$converted_value = 'OPT_IN';

		}

		return apply_filters( 'gforms_engage_email_status_value', $converted_value, $original_value );

	}
}
