<?php
/**
 * Plugin Name: Advanced Country Blocker
 * Plugin URI: https://sparkcan.com/acb.html
 * Description: Blocks all traffic to the website unless it meets the country filtering rules or accesses via a secret URL parameter. On activation, the admin’s country is auto‐added to the country list. Supports logging, blacklisting of IP addresses, custom block page, admin bypass, and optional email alerts. You can choose whether the country list acts as an allow‑list or a block‑list.
 * Version: 2.0.2
 * Author: Sparkcan
 * Author URI: https://sparkcan.com
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * HELPER FUNCTION: Returns an array of ISO country codes mapped to country names.
 */
function advcb_get_countries() {
	return array(
		''   => 'Select a country',
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
		'BR' => 'Brazil',
		'BN' => 'Brunei',
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
		'CO' => 'Colombia',
		'KM' => 'Comoros',
		'CG' => 'Congo - Brazzaville',
		'CD' => 'Congo - Kinshasa',
		'CR' => 'Costa Rica',
		'CI' => 'Côte d’Ivoire',
		'HR' => 'Croatia',
		'CU' => 'Cuba',
		'CY' => 'Cyprus',
		'CZ' => 'Czech Republic',
		'DK' => 'Denmark',
		'DJ' => 'Djibouti',
		'DM' => 'Dominica',
		'DO' => 'Dominican Republic',
		'EC' => 'Ecuador',
		'EG' => 'Egypt',
		'SV' => 'El Salvador',
		'GQ' => 'Equatorial Guinea',
		'ER' => 'Eritrea',
		'EE' => 'Estonia',
		'ET' => 'Ethiopia',
		'FJ' => 'Fiji',
		'FI' => 'Finland',
		'FR' => 'France',
		'GF' => 'French Guiana',
		'PF' => 'French Polynesia',
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
		'GG' => 'Guernsey',
		'GN' => 'Guinea',
		'GW' => 'Guinea-Bissau',
		'GY' => 'Guyana',
		'HT' => 'Haiti',
		'HN' => 'Honduras',
		'HK' => 'Hong Kong',
		'HU' => 'Hungary',
		'IS' => 'Iceland',
		'IN' => 'India',
		'ID' => 'Indonesia',
		'IR' => 'Iran',
		'IQ' => 'Iraq',
		'IE' => 'Ireland',
		'IM' => 'Isle of Man',
		'IL' => 'Israel',
		'IT' => 'Italy',
		'JM' => 'Jamaica',
		'JP' => 'Japan',
		'JE' => 'Jersey',
		'JO' => 'Jordan',
		'KZ' => 'Kazakhstan',
		'KE' => 'Kenya',
		'KI' => 'Kiribati',
		'KP' => 'North Korea',
		'KR' => 'South Korea',
		'KW' => 'Kuwait',
		'KG' => 'Kyrgyzstan',
		'LA' => 'Laos',
		'LV' => 'Latvia',
		'LB' => 'Lebanon',
		'LS' => 'Lesotho',
		'LR' => 'Liberia',
		'LY' => 'Libya',
		'LI' => 'Liechtenstein',
		'LT' => 'Lithuania',
		'LU' => 'Luxembourg',
		'MO' => 'Macao',
		'MK' => 'North Macedonia',
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
		'MX' => 'Mexico',
		'FM' => 'Micronesia',
		'MD' => 'Moldova',
		'MC' => 'Monaco',
		'MN' => 'Mongolia',
		'ME' => 'Montenegro',
		'MA' => 'Morocco',
		'MZ' => 'Mozambique',
		'MM' => 'Myanmar (Burma)',
		'NA' => 'Namibia',
		'NR' => 'Nauru',
		'NP' => 'Nepal',
		'NL' => 'Netherlands',
		'NC' => 'New Caledonia',
		'NZ' => 'New Zealand',
		'NI' => 'Nicaragua',
		'NE' => 'Niger',
		'NG' => 'Nigeria',
		'NO' => 'Norway',
		'OM' => 'Oman',
		'PK' => 'Pakistan',
		'PW' => 'Palau',
		'PS' => 'Palestinian Territories',
		'PA' => 'Panama',
		'PG' => 'Papua New Guinea',
		'PY' => 'Paraguay',
		'PE' => 'Peru',
		'PH' => 'Philippines',
		'PL' => 'Poland',
		'PT' => 'Portugal',
		'QA' => 'Qatar',
		'RO' => 'Romania',
		'RU' => 'Russia',
		'RW' => 'Rwanda',
		'SM' => 'San Marino',
		'SA' => 'Saudi Arabia',
		'SN' => 'Senegal',
		'RS' => 'Serbia',
		'SC' => 'Seychelles',
		'SL' => 'Sierra Leone',
		'SG' => 'Singapore',
		'SK' => 'Slovakia',
		'SI' => 'Slovenia',
		'SB' => 'Solomon Islands',
		'SO' => 'Somalia',
		'ZA' => 'South Africa',
		'ES' => 'Spain',
		'LK' => 'Sri Lanka',
		'SD' => 'Sudan',
		'SR' => 'Suriname',
		'SE' => 'Sweden',
		'CH' => 'Switzerland',
		'SY' => 'Syria',
		'TW' => 'Taiwan',
		'TJ' => 'Tajikistan',
		'TZ' => 'Tanzania',
		'TH' => 'Thailand',
		'TL' => 'Timor-Leste',
		'TG' => 'Togo',
		'TO' => 'Tonga',
		'TT' => 'Trinidad and Tobago',
		'TN' => 'Tunisia',
		'TR' => 'Turkey',
		'TM' => 'Turkmenistan',
		'UG' => 'Uganda',
		'UA' => 'Ukraine',
		'AE' => 'United Arab Emirates',
		'GB' => 'United Kingdom',
		'US' => 'United States',
		'UY' => 'Uruguay',
		'UZ' => 'Uzbekistan',
		'VU' => 'Vanuatu',
		'VE' => 'Venezuela',
		'VN' => 'Vietnam',
		'YE' => 'Yemen',
		'ZM' => 'Zambia',
		'ZW' => 'Zimbabwe'
	);
}

/**
 * Plugin Activation:
 * 1) Detect the activating admin’s IP and set that country in the country list.
 * 2) Create a custom DB table to log blocked attempts.
 * 3) Set default options including the filtering mode.
 */
register_activation_hook( __FILE__, 'advcb_plugin_activation' );
function advcb_plugin_activation() {
	// Set the activating admin's country (fallback is RS)
	$admin_ip     = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
	$country_code = 'RS';

	if ( ! empty( $admin_ip ) ) {
		$api_url  = 'http://ip-api.com/json/' . $admin_ip;
		$response = wp_remote_get( $api_url );

		if ( ! is_wp_error( $response ) ) {
			$body = wp_remote_retrieve_body( $response );
			$data = json_decode( $body );
			$country_code = ! empty( $data->countryCode ) ? $data->countryCode : 'RS';
		}
	}
	// In allow mode, the admin’s country is the only allowed country.
	update_option( 'advcb_allowed_countries', array( $country_code ) );

	// Create DB table for logs.
	global $wpdb;
	$table_name      = $wpdb->prefix . 'advcb_block_logs';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        ip varchar(100) NOT NULL,
        country_code varchar(5) DEFAULT '' NOT NULL,
        blocked_time datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        reason varchar(255) DEFAULT '' NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	// Set default options.
	add_option( 'advcb_secret_key', 'OpenSesame' );
	add_option( 'advcb_blacklisted_ips', array() );
	add_option( 'advcb_send_email_alerts', false );
	add_option( 'advcb_alert_email', get_option( 'admin_email' ) );
	add_option( 'advcb_mode', 'allow' );
}

/**
 * MAIN BLOCKING LOGIC
 */
function advcb_block_non_allowed_countries() {
	// Allow admins to bypass the blocking logic.
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {
		return;
	}

	// Retrieve settings.
	$allowed_countries       = get_option( 'advcb_allowed_countries', array() );
	$secret_key              = get_option( 'advcb_secret_key', 'OpenSesame' );
	$temporary_access_duration = HOUR_IN_SECONDS;
	$blacklisted_ips         = get_option( 'advcb_blacklisted_ips', array() );
	$send_email_alerts       = get_option( 'advcb_send_email_alerts', false );
	$alert_email             = get_option( 'advcb_alert_email', get_option( 'admin_email' ) );
	$mode                    = get_option( 'advcb_mode', 'allow' ); // 'allow' or 'block'

	// Get visitor’s IP address.
	$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';

	// 1) Check if IP is blacklisted.
	if ( in_array( $ip, $blacklisted_ips ) ) {
		advcb_record_block( $ip, 'XX', 'Blacklisted IP', $send_email_alerts, $alert_email );
		advcb_show_block_page();
		exit;
	}

	// 2) Check if IP is in the temporary whitelist.
	$whitelisted_ips = get_transient( 'advcb_whitelisted_ips' );
	if ( is_array( $whitelisted_ips ) && in_array( $ip, $whitelisted_ips ) ) {
		return; // temporary access granted
	}

	// 3) Determine visitor’s country code.
	$country_cache_key = 'advcb_country_' . md5( $ip );
	$country_code      = get_transient( $country_cache_key );

	if ( ! $country_code ) {
		$api_url  = 'http://ip-api.com/json/' . $ip;
		$response = wp_remote_get( $api_url );

		if ( is_wp_error( $response ) ) {
			// If API fails, allow access to avoid blocking legitimate users.
			return;
		}
		$body         = wp_remote_retrieve_body( $response );
		$data         = json_decode( $body );
		$country_code = ( $data && isset( $data->countryCode ) ) ? $data->countryCode : null;

		if ( $country_code ) {
			set_transient( $country_cache_key, $country_code, DAY_IN_SECONDS );
		}
	}

	/*
	 * 4) Country Filtering Logic:
	 * In "allow" mode: if the visitor’s country is NOT in the list, then block.
	 * In "block" mode: if the visitor’s country IS in the list, then block.
	 * In both cases, if the secret key parameter is provided, grant temporary access.
	 */
	if ( $country_code ) {
		if ( $mode === 'allow' && ! in_array( $country_code, $allowed_countries ) ) {
			if ( isset( $_GET[ $secret_key ] ) ) {
				// Grant temporary access.
				if ( ! is_array( $whitelisted_ips ) ) {
					$whitelisted_ips = array();
				}
				$whitelisted_ips[] = $ip;
				$whitelisted_ips = array_unique( $whitelisted_ips );
				set_transient( 'advcb_whitelisted_ips', $whitelisted_ips, $temporary_access_duration );

				// Optional: enqueue a redirect alert.
				add_action( 'wp_enqueue_scripts', function() use ( $secret_key ) {
					wp_enqueue_script( 'advcb-alert', plugin_dir_url( __FILE__ ) . 'assets/js/advcb-alert.js', array(), '1.0', true );
					wp_localize_script( 'advcb-alert', 'advcb_redirect', array(
						'url' => esc_url( remove_query_arg( $secret_key ) ),
					) );
				} );
				return;
			}
			advcb_record_block( $ip, $country_code, 'Country not allowed', $send_email_alerts, $alert_email );
			advcb_show_block_page();
			exit;
		} elseif ( $mode === 'block' && in_array( $country_code, $allowed_countries ) ) {
			if ( isset( $_GET[ $secret_key ] ) ) {
				// Grant temporary access.
				if ( ! is_array( $whitelisted_ips ) ) {
					$whitelisted_ips = array();
				}
				$whitelisted_ips[] = $ip;
				$whitelisted_ips = array_unique( $whitelisted_ips );
				set_transient( 'advcb_whitelisted_ips', $whitelisted_ips, $temporary_access_duration );

				add_action( 'wp_enqueue_scripts', function() use ( $secret_key ) {
					wp_enqueue_script( 'advcb-alert', plugin_dir_url( __FILE__ ) . 'assets/js/advcb-alert.js', array(), '1.0', true );
					wp_localize_script( 'advcb-alert', 'advcb_redirect', array(
						'url' => esc_url( remove_query_arg( $secret_key ) ),
					) );
				} );
				return;
			}
			advcb_record_block( $ip, $country_code, 'Country blocked', $send_email_alerts, $alert_email );
			advcb_show_block_page();
			exit;
		}
	}
}
add_action( 'init', 'advcb_block_non_allowed_countries' );

/**
 * RECORD BLOCKED ATTEMPT IN DATABASE & (optionally) SEND EMAIL
 */
function advcb_record_block( $ip, $country_code, $reason, $send_email_alerts, $alert_email ) {
	global $wpdb;
	$table_name = $wpdb->prefix . 'advcb_block_logs';

	$wpdb->insert( $table_name, array(
		'ip'           => $ip,
		'country_code' => $country_code ?: '',
		'reason'       => $reason,
	), array( '%s', '%s', '%s' ) );

	if ( $send_email_alerts && ! empty( $alert_email ) ) {
		$subject = 'Country Blocker Alert: A visitor was blocked';
		$message = sprintf(
			"A visitor from IP: %s (country: %s) was blocked.\nReason: %s\nTime: %s",
			$ip,
			$country_code,
			$reason,
			current_time( 'mysql' )
		);
		wp_mail( $alert_email, $subject, $message );
	}
}

/**
 * SHOW A CUSTOM BLOCK PAGE (instead of default 403).
 */
function advcb_show_block_page() {
	wp_die(
		'<h1>Access Restricted</h1><p>We’re sorry, but your location is not allowed to view this site.</p>',
		'Access Denied',
		array( 'response' => 403 )
	);
}

/**
 * REGISTER/INITIALIZE SETTINGS
 */
function advcb_register_settings() {
	// Register and sanitize the country codes list.
	register_setting( 'advcb_options_group', 'advcb_allowed_countries', array(
		'sanitize_callback' => 'advcb_sanitize_allowed_countries',
	) );

	// Register and sanitize secret key.
	register_setting( 'advcb_options_group', 'advcb_secret_key', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	// Register and sanitize blacklisted IPs.
	register_setting( 'advcb_options_group', 'advcb_blacklisted_ips', array(
		'sanitize_callback' => 'advcb_sanitize_blacklisted_ips',
	) );

	// Register and sanitize email alert toggle.
	register_setting( 'advcb_options_group', 'advcb_send_email_alerts', array(
		'sanitize_callback' => 'advcb_sanitize_boolean',
	) );

	// Register and sanitize alert email.
	register_setting( 'advcb_options_group', 'advcb_alert_email', array(
		'sanitize_callback' => 'sanitize_email',
	) );

	// Register and sanitize the filtering mode.
	register_setting( 'advcb_options_group', 'advcb_mode', array(
		'sanitize_callback' => 'advcb_sanitize_mode',
	) );
}
add_action( 'admin_init', 'advcb_register_settings' );

/**
 * ADD MENU PAGE
 */
function advcb_register_options_page() {
	add_menu_page(
		'Country Blocker',
		'Country Blocker',
		'manage_options',
		'advcb_settings',
		'advcb_options_page',
		'dashicons-location-alt',
		60
	);

	// Add a sub-page for logs.
	add_submenu_page(
		'advcb_settings',
		'Block Logs',
		'Block Logs',
		'manage_options',
		'advcb_block_logs',
		'advcb_block_logs_page'
	);
}
add_action( 'admin_menu', 'advcb_register_options_page' );

/**
 * MAIN SETTINGS PAGE with Dynamic Country Select Boxes
 */
function advcb_options_page() {
	// Get current filtering mode to adjust labels.
	$mode       = get_option( 'advcb_mode', 'allow' );
	$list_label = ( $mode === 'block' ) ? 'Blocked Country Codes' : 'Allowed Country Codes';
	$list_desc  = ( $mode === 'block' )
		? 'Select ISO country codes that should be blocked from accessing the site.'
		: 'Select ISO country codes that are allowed to access the site.';

	// Retrieve the saved countries. Ensure we have an array.
	$selected_countries = get_option( 'advcb_allowed_countries', array() );
	if ( ! is_array( $selected_countries ) ) {
		$selected_countries = explode( ',', $selected_countries );
	}
	// Always display at least one select box.
	if ( empty( $selected_countries ) ) {
		$selected_countries = array( '' );
	}

	// Get the complete list of countries.
	$countries = advcb_get_countries();
	?>
    <div class="wrap">
        <h1>Advanced Country Blocker Settings</h1>
        <form method="post" action="options.php">
			<?php settings_fields( 'advcb_options_group' ); ?>
			<?php do_settings_sections( 'advcb_options_group' ); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Country Filter Mode</th>
                    <td>
                        <!-- Hidden field to ensure a value is always sent -->
                        <input type="hidden" name="advcb_mode" value="allow">
                        <label>
                            <input type="checkbox" name="advcb_mode" value="block" <?php checked( 'block', get_option( 'advcb_mode', 'allow' ) ); ?> />
                            Use Blacklist Mode (the list below will block visitors from those countries)
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php echo esc_html( $list_label ); ?></th>
                    <td>
                        <p><?php echo esc_html( $list_desc ); ?></p>
                        <div id="advcb_country_selector_container">
							<?php foreach ( $selected_countries as $country ) : ?>
                                <div class="advcb_country_selector" style="margin-bottom:5px;">
                                    <select name="advcb_allowed_countries[]">
										<?php foreach ( $countries as $code => $name ) : ?>
                                            <option value="<?php echo esc_attr( $code ); ?>" <?php selected( $country, $code ); ?>>
												<?php echo esc_html( $name ); ?>
                                            </option>
										<?php endforeach; ?>
                                    </select>
                                    <button type="button" class="button advcb_remove_country">Remove</button>
                                </div>
							<?php endforeach; ?>
                        </div>
                        <button type="button" id="advcb_add_country" class="button">Add Another Country</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Secret Key for Temporary Access</th>
                    <td>
                        <input type="text" name="advcb_secret_key" value="<?php echo esc_attr( get_option( 'advcb_secret_key', 'OpenSesame' ) ); ?>" />
                        <p>
                            Append <code>?<?php echo esc_html( get_option( 'advcb_secret_key', 'OpenSesame' ) ); ?>=1</code> to the URL to gain temporary access.
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Blacklisted IP Addresses</th>
                    <td>
                        <p>Enter comma-separated IP addresses that should be blocked regardless of country filtering.</p>
                        <input type="text" name="advcb_blacklisted_ips" value="<?php echo esc_attr( is_array( get_option( 'advcb_blacklisted_ips', array() ) ) ? implode( ',', get_option( 'advcb_blacklisted_ips', array() ) ) : get_option( 'advcb_blacklisted_ips', '' ) ); ?>" style="width: 100%; max-width: 400px;" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Email Alerts</th>
                    <td>
                        <label>
                            <input type="checkbox" name="advcb_send_email_alerts" value="1" <?php checked( true, (bool) get_option( 'advcb_send_email_alerts', false ) ); ?> />
                            Send email alerts for blocked attempts?
                        </label>
                        <p>Email to notify:</p>
                        <input type="email" name="advcb_alert_email" value="<?php echo esc_attr( get_option( 'advcb_alert_email', get_option( 'admin_email' ) ) ); ?>" style="width: 100%; max-width: 400px;" />
                    </td>
                </tr>
            </table>
			<?php submit_button(); ?>
        </form>
    </div>
    <!-- Inline JavaScript to handle dynamic country select boxes -->
    <script>
        jQuery(document).ready(function($) {
            // Add new select box when "Add Another Country" is clicked.
            $('#advcb_add_country').on('click', function(){
                // Clone the first selector, reset its value and append.
                var $clone = $('#advcb_country_selector_container .advcb_country_selector:first').clone();
                $clone.find('select').val('');
                $('#advcb_country_selector_container').append($clone);
            });
            // Remove a select box when its "Remove" button is clicked.
            $(document).on('click', '.advcb_remove_country', function(){
                if ($('#advcb_country_selector_container .advcb_country_selector').length > 1) {
                    $(this).closest('.advcb_country_selector').remove();
                } else {
                    alert('At least one country must be selected.');
                }
            });
        });
    </script>
	<?php
}

/**
 * SHOW THE BLOCK LOGS IN THE ADMIN
 */
function advcb_block_logs_page() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'advcb_block_logs';

	$paged   = isset( $_GET['paged'] ) ? absint( $_GET['paged'] ) : 1;
	$limit   = 20;
	$offset  = ( $paged - 1 ) * $limit;

	$results = $wpdb->get_results( $wpdb->prepare(
		"SELECT * FROM $table_name ORDER BY blocked_time DESC LIMIT %d OFFSET %d",
		$limit,
		$offset
	) );

	$total       = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name" );
	$total_pages = ceil( $total / $limit );
	?>
    <div class="wrap">
        <h1>Blocked Attempts Log</h1>
		<?php if ( $results ) : ?>
            <table class="widefat fixed striped">
                <thead>
                <tr>
                    <th width="50px">ID</th>
                    <th width="150px">IP</th>
                    <th width="100px">Country Code</th>
                    <th>Reason</th>
                    <th width="200px">Time</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach ( $results as $row ) : ?>
                    <tr>
                        <td><?php echo esc_html( $row->id ); ?></td>
                        <td><?php echo esc_html( $row->ip ); ?></td>
                        <td><?php echo esc_html( $row->country_code ); ?></td>
                        <td><?php echo esc_html( $row->reason ); ?></td>
                        <td><?php echo esc_html( $row->blocked_time ); ?></td>
                    </tr>
				<?php endforeach; ?>
                </tbody>
            </table>
			<?php if ( $total_pages > 1 ) : ?>
                <div class="tablenav"><div class="tablenav-pages">
						<?php for ( $i = 1; $i <= $total_pages; $i++ ) : ?>
							<?php $class = ( $i == $paged ) ? ' class="button button-primary disabled"' : ' class="button"'; ?>
                            <a<?php echo $class; ?> href="?page=advcb_block_logs&paged=<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></a>
						<?php endfor; ?>
                    </div></div>
			<?php endif; ?>
		<?php else : ?>
            <p>No blocked attempts logged yet.</p>
		<?php endif; ?>
    </div>
	<?php
}

/**
 * SANITIZE INPUTS
 */
function advcb_sanitize_allowed_countries( $input ) {
	$countries = is_array( $input ) ? $input : explode( ',', $input );
	return array_map( 'sanitize_text_field', array_map( 'trim', $countries ) );
}

function advcb_sanitize_blacklisted_ips( $input ) {
	$ips = is_array( $input ) ? $input : explode( ',', $input );
	return array_map( 'sanitize_text_field', array_map( 'trim', $ips ) );
}

function advcb_sanitize_boolean( $input ) {
	return (bool) $input;
}

function advcb_sanitize_mode( $input ) {
	return ( $input === 'block' ) ? 'block' : 'allow';
}

add_filter( 'pre_update_option_advcb_allowed_countries', 'advcb_sanitize_allowed_countries' );
add_filter( 'pre_update_option_advcb_blacklisted_ips', 'advcb_sanitize_blacklisted_ips' );
?>
