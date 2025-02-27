<?php
/*
Plugin Name: IP2Location Tags
Plugin URI: https://ip2location.com/resources/wordpress-ip2location-tag
Description: Enable you to use IP2Location tags to customize your post content by country.
Version: 2.13.4
Author: IP2Location
Author URI: https://www.ip2location.com
*/

$upload_dir = wp_upload_dir();
defined('FS_METHOD') or define('FS_METHOD', 'direct');
defined('IP2LOCATION_DIR') or define('IP2LOCATION_DIR', $upload_dir['basedir'] . DIRECTORY_SEPARATOR . 'ip2location' . DIRECTORY_SEPARATOR);
define('IP2LOCATION_TAGS_ROOT', __DIR__ . DIRECTORY_SEPARATOR);

require_once IP2LOCATION_TAGS_ROOT . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$ip2location_tags = new IP2LocationTags();

register_activation_hook(__FILE__, [$ip2location_tags, 'set_defaults']);

add_action('admin_enqueue_scripts', [$ip2location_tags, 'plugin_enqueues']);
add_action('admin_footer_text', [$ip2location_tags, 'admin_footer_text']);
add_action('admin_notices', [$ip2location_tags, 'plugin_admin_notices']);
add_action('wp_ajax_get_region_list', [$ip2location_tags, 'region_list']);
add_action('wp_ajax_ip2location_tags_download_database', [$ip2location_tags, 'download_database']);
add_action('wp_ajax_ip2location_tags_validate_token', [$ip2location_tags, 'validate_token']);
add_action('wp_ajax_ip2location_tags_admin_notice', [$ip2location_tags, 'plugin_dismiss_admin_notice']);
add_action('wp_ajax_ip2location_tags_submit_feedback', [$ip2location_tags, 'submit_feedback']);
add_action('wp_ajax_update_ip2location_tags_database', [$ip2location_tags, 'download']);

class IP2LocationTags
{
	protected $regions = [];
	protected $mode;

	public function __construct()
	{
		add_action('admin_menu', [&$this, 'admin_page']);
		add_filter('the_content', [&$this, 'parse_content']);
		add_filter('widget_text', [&$this, 'parse_widget']);

		// Check for IP2Location BIN directory.
		if (!file_exists(IP2LOCATION_DIR)) {
			wp_mkdir_p(IP2LOCATION_DIR);
		}

		if (!in_array(get_option('ip2location_tags_lookup_mode'), ['io', 'ws'])) {
			// Check if database exist
			if (!is_file(IP2LOCATION_DIR . get_option('ip2location_tags_database'))) {
				$database = $this->get_database_file();

				if (is_file(IP2LOCATION_DIR . $database)) {
					$geo = new \IP2Location\Database(IP2LOCATION_DIR . $database, \IP2Location\Database::FILE_IO);

					// Get geolocation by IP address.
					$response = $geo->lookup('8.8.8.8', \IP2Location\Database::ALL);

					if (isset($response['countryCode']) && $response['countryCode'] == 'US') {
						update_option('ip2location_tags_database', $database);
					}
				}
			}
		}

		// Get regions
		if (($handle = fopen(IP2LOCATION_TAGS_ROOT . 'IP2LOCATION-ISO3166-2.CSV', 'r')) !== false) {
			while (($data = fgetcsv($handle, 1000, ',')) !== false) {
				if (strpos($data[2], '-') === false) {
					continue;
				}

				list($country_code, $region_code) = explode('-', $data[2]);
				$this->regions[$country_code][$region_code] = $data[1];
			}
			fclose($handle);
		}
	}

	public function parse_widget($content)
	{
		// Escape tags
		$content = str_replace(['<', '>'], ['&lt;', '&gt;'], $content);

		// Parse widget content
		$content = $this->parse_content($content);

		// Restore tags and return value
		return str_replace(['&lt;', '&gt;'], ['<', '>'], $content);
	}

	public function parse_content($content)
	{
		$find = ['{ip:ipAddress}', '{ip:countryCode}', '{ip:countryName}', '{ip:regionName}', '{ip:cityName}', '{ip:latitude}', '{ip:longitude}', '{ip:isp}', '{ip:domainName}', '{ip:zipCode}', '{ip:timeZone}', '{ip:netSpeed}', '{ip:iddCode}', '{ip:areaCode}', '{ip:weatherStationCode}', '{ip:weatherStationName}', '{ip:mcc}', '{ip:mnc}', '{ip:mobileCarrierName}', '{ip:elevation}', '{ip:usageType}', '{ip:addressType}', '{ip:category}', '{ip:countryFlag}', '{ip:countryFlag32}', '{ip:countryFlag64}'];

		// Stop lookup if tags not exists
		if (!preg_match('/' . implode('|', $find) . '|\[ip:/', $content)) {
			return $content;
		}

		$result = $this->get_location($this->get_ip());

		if (!$result) {
			$this->write_debug_log('Not able to read IP2Location database.');

			return $content;
		}

		$replace = [$result['ipAddress'], $result['countryCode'], $result['countryName'], $result['regionName'], $result['cityName'], $result['latitude'], $result['longitude'], $result['isp'], $result['domainName'], $result['zipCode'], $result['timeZone'], $result['netSpeed'], $result['iddCode'], $result['areaCode'], $result['weatherStationCode'], $result['weatherStationName'], $result['mcc'], $result['mnc'], $result['mobileCarrierName'], $result['elevation'], $result['usageType'], $result['addressType'], $result['category'], '<img src="' . plugins_url('assets/img/flags/16/' . strtolower($result['countryCode']) . '_16.png', __FILE__) . '" > ', '<img src="' . plugins_url('assets/img/flags/32/' . strtolower($result['countryCode']) . '_32.png', __FILE__) . '" > ', '<img src="' . plugins_url('assets/img/flags/64/' . strtolower($result['countryCode']) . '_64.png', __FILE__) . '" > '];

		// Replace geolocation variables
		$content = str_replace($find, $replace, $content);

		// Replace tags
		$content = $this->replace_content($content, '[', ']', $result);

		// Replace tags (Legacy)
		$content = $this->replace_content($content, '&lt;', '&gt;', $result);

		return $content;
	}

	public function replace_content($content, $tag_open, $tag_close, $result)
	{
		// Parse IP2Location tags
		do {
			$to_this = '';

			// Get country list from tag
			$data = $this->parse_tag($content, $tag_open . 'ip:', $tag_close);

			// Get protected text from tag
			$text = $this->parse_tag($content, $tag_open . 'ip:' . $data . $tag_close, $tag_open . '/ip' . $tag_close);

			// Rebuild the whole tag
			$replace_this = $tag_open . 'ip:' . $data . $tag_close . $text . $tag_open . '/ip' . $tag_close;

			$entries = explode(',', str_replace(' ', '', strtoupper($data)));

			// Show content if wildcard defined
			if (in_array('*', $entries)) {
				$to_this = $text;
			}

			// Show content for listed entries
			if (in_array($result['countryCode'], $entries) || in_array($result['countryCode'] . ':' . $this->get_region_code($result['countryCode'], $result['regionName']), $entries)) {
				$to_this = $text;
			}

			// Hide content for prohibited entries
			if (in_array('-' . $result['countryCode'], $entries) || in_array('-' . $result['countryCode'] . ':' . $this->get_region_code($result['countryCode'], $result['regionName']), $entries)) {
				$to_this = '';
			}

			$content = str_replace($replace_this, $to_this, $content);
		} while ($data);

		return $content;
	}

	public function admin_options()
	{
		if (!is_admin()) {
			return;
		}

		add_action('wp_enqueue_script', 'load_jquery');

		$mode_status = '';
		$lookup_mode = (isset($_POST['lookupMode'])) ? sanitize_text_field($_POST['lookupMode']) : get_option('ip2location_tags_lookup_mode');
		$api_key = (isset($_POST['apiKey'])) ? sanitize_text_field($_POST['apiKey']) : get_option('ip2location_tags_api_key');
		$io_api_key = (isset($_POST['ioApiKey'])) ? sanitize_text_field($_POST['ioApiKey']) : get_option('ip2location_tags_io_api_key');
		$enable_debug_log = (isset($_POST['submit']) && isset($_POST['enable_debug_log'])) ? 1 : (((isset($_POST['submit']) && !isset($_POST['enable_debug_log']))) ? 0 : get_option('ip2location_tags_debug_log_enabled'));

		if (isset($_POST['lookupMode'])) {
			switch ($_POST['lookupMode']) {
				case 'ws':
					$request = new WP_Http();
					$response = $request->request('https://api.ip2location.com/v2/?' . http_build_query([
						'key'   => $api_key,
						'check' => 1,
					]), ['timeout' => 3]);

					$json = json_decode($response['body']);

					if (empty($json)) {
						$mode_status = '
						<div id="message" class="error">
							<p><strong>ERROR</strong>: Error when accessing IP2Location web service gateway.</p>
						</div>';
					}
					break;

				case 'io':
					$request = new WP_Http();
					$response = $request->request('https://api.ip2location.io/?key=?' . http_build_query([
						'key' => $io_api_key,
						'ip'  => '1.1.1.1',
					]), ['timeout' => 3]);

					$json = json_decode($response['body']);

					if (empty($json)) {
						$mode_status = '
						<div id="message" class="error">
							<p><strong>ERROR</strong>: Error when accessing IP2Location.IO web service gateway.</p>
						</div>';
					}
					break;
			}

			if (empty($mode_status)) {
				update_option('ip2location_tags_lookup_mode', $lookup_mode);
				update_option('ip2location_tags_api_key', $api_key);
				update_option('ip2location_tags_io_api_key', $api_key);
				update_option('ip2location_tags_debug_log_enabled', $enable_debug_log);

				if ($enable_debug_log) {
					$this->write_debug_log('Debug log enabled.');
				} else {
					$this->write_debug_log('Debug log disabled.');
				}

				$mode_status .= '
				<div id="message" class="updated">
					<p>Changes saved.</p>
				</div>';
			}
		}

		echo '
		<style type="text/css">
			.red{color:#cc0000}
			.code{color:#003399;font-family:\'Courier New\'}
			pre{margin:0 0 20px 0;border:1px solid #c0c0c0;backgroumd:#e4e4e4;color:#535353;font-family:\'Courier New\';padding:8px}
			.result{margin:0 0 20px 0;border:1px solid #006699;backgroumd:#99ffcc;color:#000033;padding:8px}
		</style>

		<script>
			(function( $ ) {
				$(function(){
					$("#download").on("click", function(e){
						e.preventDefault();

						if ($("#productCode").val() == "" || $("#token").val() == ""){
							return;
						}

						$("#download").attr("disabled", "disabled");
						$("#download-status").html(\'<div style="padding:10px; border:1px solid #ccc; background-color:#ffa;">Downloading \' + $("#productCode").val() + \' BIN database in progress... Please wait...</div>\');

						$.post(ajaxurl, { action: "update_ip2location_tags_database", productCode: $("#productCode").val(), token: $("#token").val() }, function(response) {
							if(response == "SUCCESS") {
								alert("Downloading completed.");

								$("#download-status").html(\'<div id="message" class="updated"><p>Successfully downloaded the \' + $("#productCode").val() + \' BIN database. Please refresh information by <a href="javascript:;" id="reload">reloading</a> the page.</p></div>\');

								$("#reload").on("click", function(){
									window.location = window.location.href.split("#")[0];
								});
							}
							else {
								alert("Downloading failed.");

								$("#download-status").html(\'<div id="message" class="error"><p><strong>ERROR</strong>: Failed to download \' + $("#productCode").val() + \' BIN database. Please make sure you correctly enter the product code and login crendential. Please also take note to download the BIN product code only.</p></div>\');
							}
						}).always(function() {
							$("#productCode").val("DB1LITEBIN");
							$("#download").removeAttr("disabled");
						});
					});

					$("#countryCode").on("change", function(){
						$.post(ajaxurl, { "action": "get_region_list", "countryCode": $(this).val() }, function(data){
							$("#regionCode >optgroup").html(data);
						});
					});

					$("#regionCode").on("change", function(){
						$("#region-code").html(\'<div id="message" class="updated"><p>The subdivision code for \' + $("#regionCode option:selected").text() + \', \' + $("#countryCode option:selected").text() + \' will be <strong>\' + $("#countryCode").val() + \':\' + $("#regionCode").val() + \'</strong>.</p></div>\');
					});

					$("#use-bin").on("click", function(){
						$("#bin-mode").show();
						$("#ws-mode").hide();
						$("#wio-mode").hide();

						$("html, body").animate({
							scrollTop: $("#use-bin").offset().top - 50
						}, 100);
					});

					$("#use-ws").on("click", function(){
						$("#bin-mode").hide();
						$("#ws-mode").show();
						$("#io-mode").hide();

						$("html, body").animate({
							scrollTop: $("#use-ws").offset().top - 50
						}, 100);
					});

					$("#use-io").on("click", function(){
						$("#bin-mode").hide();
						$("#ws-mode").hide();
						$("#io-mode").show();

						$("html, body").animate({
							scrollTop: $("#use-io").offset().top - 50
						}, 100);
					});

					$("#' . $lookup_mode . '-mode").show();
				});
			})( jQuery );
		</script>

		<div class="wrap">
			<h3>IP2Location Tags</h3>
			<p>
				IP2Location Tags provides a solution to easily get the visitor\'s location information based on IP address and customize the content display for different countries. This plugin uses IP2Location BIN file for location queries, therefore there is no need to set up any relational database to use it. Depending on the BIN file that you are using, this plugin is able to provide you the information of country, region or state, city, latitude and longitude, US ZIP code, time zone, Internet Service Provider (ISP) or company name, domain name, net speed, area code, weather station code, weather station name, mobile country code (MCC), mobile network code (MNC) and carrier brand, elevation and usage type of origin for an IP address.
			</p>

			<p>&nbsp;</p>

			<div style="border-bottom:1px solid #ccc;">
				<h3>Lookup Mode</h3>
			</div>

			' . $mode_status . '

			<form id="form-lookup-mode" method="post">
				<p>
					<label><input id="use-bin" type="radio" name="lookupMode" value="bin"' . (($lookup_mode == 'bin') ? ' checked' : '') . '> Local BIN database</label>

					<div id="bin-mode" style="margin-left:50px;display:none;background:#d7d7d7;padding:20px">';

		if (!is_file(IP2LOCATION_DIR . get_option('ip2location_tags_database'))) {
			echo '
						<div id="message" class="error">
							<p>
								Unable to find the IP2Location BIN database! Please download the database at at <a href="https://www.ip2location.com/#wordpress-wzdit" target="_blank">IP2Location commercial database</a> | <a href="https://lite.ip2location.com/sign-up#wordpress-wzdit" target="_blank">IP2Location LITE database (free edition)</a>.
							</p>
						</div>';
		} else {
			// Create IP2Location object.
			$ipl = new \IP2Location\Database(IP2LOCATION_DIR . get_option('ip2location_tags_database'), \IP2Location\Database::FILE_IO);
			$dbVersion = $ipl->getDatabaseVersion();
			$curdbVersion = str_replace('.', '-', $dbVersion);

			echo '
						<p>
							<b>Current Database Version: </b>
							' . $curdbVersion . '
						</p>';

			if (strtotime($curdbVersion) < strtotime('-2 months')) {
				echo '
							<div style="background:#fff;padding:2px 10px;border-left:3px solid #cc0000">
								<p>
									<strong>REMINDER</strong>: Your IP2Location database was outdated. We strongly recommend you to download the latest version for accurate result.
								</p>
							</div>';
			}
		}

		echo '
						<p>
							BIN file download: <a href="https://www.ip2location.com/#wordpress-wzdit" target="_blank">IP2Location Commercial database</a> | <a href="https://lite.ip2location.com/sign-up#wordpress-wzdit" targe="_blank">IP2Location LITE database (free edition)</a>.
						</p>

						<p>&nbsp;</p>

						<div style="border-bottom:1px solid #ccc;">
							<h4>Download & Update IP2Location BIN Database</h4>
						</div>

						<div id="download-status" style="margin:10px 0;"></div>

						<strong>Product Code</strong>:
						<select id="productCode" type="text" value="" style="margin-right:10px;" >
							<option value="DB1LITEBIN">DB1LITEBIN</option>
							<option value="DB3LITEBIN">DB3LITEBIN</option>
							<option value="DB5LITEBIN">DB5LITEBIN</option>
							<option value="DB9LITEBIN">DB9LITEBIN</option>
							<option value="DB11LITEBIN">DB11LITEBIN</option>
							<option value="DB1BIN">DB1BIN</option>
							<option value="DB2BIN">DB2BIN</option>
							<option value="DB3BIN">DB3BIN</option>
							<option value="DB4BIN">DB4BIN</option>
							<option value="DB5BIN">DB5BIN</option>
							<option value="DB6BIN">DB6BIN</option>
							<option value="DB7BIN">DB7BIN</option>
							<option value="DB8BIN">DB8BIN</option>
							<option value="DB9BIN">DB9BIN</option>
							<option value="DB10BIN">DB10BIN</option>
							<option value="DB11BIN">DB11BIN</option>
							<option value="DB12BIN">DB12BIN</option>
							<option value="DB13BIN">DB13BIN</option>
							<option value="DB14BIN">DB14BIN</option>
							<option value="DB15BIN">DB15BIN</option>
							<option value="DB16BIN">DB16BIN</option>
							<option value="DB17BIN">DB17BIN</option>
							<option value="DB18BIN">DB18BIN</option>
							<option value="DB19BIN">DB19BIN</option>
							<option value="DB20BIN">DB20BIN</option>
							<option value="DB21BIN">DB21BIN</option>
							<option value="DB22BIN">DB22BIN</option>
							<option value="DB23BIN">DB23BIN</option>
							<option value="DB24BIN">DB24BIN</option>
							<option value="DB25BIN">DB25BIN</option>
							<option value="DB1LITEBINIPV6">DB1LITEBINIPV6</option>
							<option value="DB3LITEBINIPV6">DB3LITEBINIPV6</option>
							<option value="DB5LITEBINIPV6">DB5LITEBINIPV6</option>
							<option value="DB9LITEBINIPV6">DB9LITEBINIPV6</option>
							<option value="DB11LITEBINIPV6">DB11LITEBINIPV6</option>
							<option value="DB1BINIPV6">DB1BINIPV6</option>
							<option value="DB2BINIPV6">DB2BINIPV6</option>
							<option value="DB3BINIPV6">DB3BINIPV6</option>
							<option value="DB4BINIPV6">DB4BINIPV6</option>
							<option value="DB5BINIPV6">DB5BINIPV6</option>
							<option value="DB6BINIPV6">DB6BINIPV6</option>
							<option value="DB7BINIPV6">DB7BINIPV6</option>
							<option value="DB8BINIPV6">DB8BINIPV6</option>
							<option value="DB9BINIPV6">DB9BINIPV6</option>
							<option value="DB10BINIPV6">DB10BINIPV6</option>
							<option value="DB11BINIPV6">DB11BINIPV6</option>
							<option value="DB12BINIPV6">DB12BINIPV6</option>
							<option value="DB13BINIPV6">DB13BINIPV6</option>
							<option value="DB14BINIPV6">DB14BINIPV6</option>
							<option value="DB15BINIPV6">DB15BINIPV6</option>
							<option value="DB16BINIPV6">DB16BINIPV6</option>
							<option value="DB17BINIPV6">DB17BINIPV6</option>
							<option value="DB18BINIPV6">DB18BINIPV6</option>
							<option value="DB19BINIPV6">DB19BINIPV6</option>
							<option value="DB20BINIPV6">DB20BINIPV6</option>
							<option value="DB21BINIPV6">DB21BINIPV6</option>
							<option value="DB22BINIPV6">DB22BINIPV6</option>
							<option value="DB23BINIPV6">DB23BINIPV6</option>
							<option value="DB24BINIPV6">DB24BINIPV6</option>
							<option value="DB25BINIPV6">DB25BINIPV6</option>
						</select>

						<strong>Download Token</strong>:
						<input id="token" type="text" value="' . get_option('ip2location_tags_token') . '" style="margin-right:10px;" />

						<button id="download" class="button action">Download</button>

						<span style="display:block; font-size:0.8em">Get your download token from <a href="https://lite.ip2location.com/file-download#wordpress-wzdit" target="_blank">https://lite.ip2location.com/file-download</a> or <a href="https://www.ip2location.com/file-download#wordpress-wzdit" target="_blank">https://www.ip2location.com/file-download</a>.</span>

						<div style="margin-top:20px;">
							<strong>Note</strong>: If you failed to download the BIN database using this automated downloading tool, please follow the procedures below to update the BIN database manually.
							<ol style="list-style-type:circle;margin-left:30px">
								<li>Download the BIN database at <a href="https://www.ip2location.com/#wordpress-wzdit" target="_blank">IP2Location commercial database</a> | <a href="https://lite.ip2location.com/#wordpress-wzdit" target="_blank">IP2Location LITE database (free edition)</a>.</li>
								<li>Decompress the zip file and update the BIN database to ' . IP2LOCATION_DIR . '.</li>
								<li>Once completed, please refresh the information by reloading the setting page.</li>
							</ol>
						</div>

						<br><br>
						You may implement automated monthly database update as well. <a href="https://www.ip2location.com/resources/how-to-automate-ip2location-bin-database-download" target="_balnk">Learn more...</a>
						<p>&nbsp;</p>
					</div>
				</p>
				<p>
					<label><input id="use-ws" type="radio" name="lookupMode" value="ws"' . (($lookup_mode == 'ws') ? ' checked' : '') . '> IP2Location Web Service</label>

					<div id="ws-mode" style="margin-left:50px;display:none;background:#d7d7d7;padding:20px">
						<p>Please insert your IP2Location <a href="https://www.ip2location.com/web-service#wordpress-wzdit" target="_blank">Web service</a> API key.</p>
						<p>
							<strong>API Key</strong>:
							<input name="apiKey" type="text" value="' . $api_key . '" style="margin-right:10px;" />
						</p>
					</div>
				</p>
				<p>
					<label><input id="use-io" type="radio" name="lookupMode" value="io"' . (($lookup_mode == 'io') ? ' checked' : '') . '> IP2Location.io Web Service</label>

					<div id="io-mode" style="margin-left:50px;display:none;background:#d7d7d7;padding:20px">
						<p>Please insert your IP2Location.io <a href="https://www.ip2location.io/#wordpress-wzdit" target="_blank">Web service</a> API key.</p>
						<p>
							<strong>API Key</strong>:
							<input name="ioApiKey" type="text" value="' . $io_api_key . '" style="margin-right:10px;" />
						</p>
					</div>
				</p>
				<p>
					<h3>Debugging Logs</h3>
					<label for="enable_debug_log">
						<input type="checkbox" name="enable_debug_log" id="enable_debug_log" value="1"' . (($enable_debug_log == 1) ? ' checked' : '') . ' /> Enable Debug Message Logging
					</label>
				</p>
				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"  />
				</p>
			</form>

			<p>&nbsp;</p>

			<div style="border-bottom:1px solid #ccc;">
				<h3 id="ip-lookup">IP Lookup</h3>
			</div>
			<p>
				Enter a valid IP address for checking.
			</p>';

		$ip_address = (isset($_POST['ipAddress'])) ? sanitize_text_field($_POST['ipAddress']) : '';

		if (isset($_POST['lookup'])) {
			echo '<input type="hidden" id="lookup-result" value="true">';

			if (!filter_var($ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
				echo '
				<div id="message" class="error">
					<p><strong>ERROR</strong>: Invalid IP address.</p>
				</div>';
			} else {
				$response = $this->get_location($ip_address);

				if (is_array($response) && $response['countryName']) {
					if ($response['countryCode'] != '??' && strlen($response['countryCode']) == 2) {
						echo '
							<div id="message" class="updated">
								<p>IP address <strong>' . $ip_address . '</strong> belongs to <strong>' . $response['countryName'] . '</strong>.</p>
							</div>';
					} else {
						echo '
							<div id="message" class="error">
								<p><strong>ERROR</strong>: ' . $response['countryName'] . '</p>
							</div>';
					}
				} else {
					echo '
						<div id="message" class="error">
							<p><strong>ERROR</strong>: This IP address is not found in this database.</p>
						</div>';
				}
			}
		}

		echo '
			<form method="post">
				<p>
					<label><b>IP Address: </b></label>
					<input type="text" name="ipAddress" value="' . $ip_address . '" />
					<input type="submit" name="lookup" value="Lookup" class="button action" />
				</p>
			</form>

			<p>&nbsp;</p>

			<div style="border-bottom:1px solid #ccc;">
				<h3>Subdivision Code List</h3>
			</div>
			<p>
				Select a country code for subdivision code list
			</p>';

		if (!is_file(IP2LOCATION_TAGS_ROOT . 'IP2LOCATION-ISO3166-2.CSV')) {
			echo '
			<div id="message" class="error">
				<p>
					IP2Location ISO3166-2 CSV file not found. Please download the CSV file at the following link:
					<a href="https://www.ip2location.com/free/iso3166-2#wordpress-wzdit" target="_blank">ISO 3166-2 Subdivision Code</a>.
					<ol class="red" style="list-style-type:circle;margin-left:30px;">
							<li>Download the zip file.</li>
							<li>Decompress the zip file.</li>
							<li>Upload <b>IP2LOCATION-ISO3166-2.CSV</b> to /wp-content/plugins/ip2location-tags/.</li>
							<li>Once completed, please refresh the information by reloading the page.</li>
					</ol>
				</p>
			</div>';
		} else {
			$country_codes = array_keys($this->regions);

			echo '
			<form>
				<select id="countryCode" type="text" size="10" style="height:200px">
					<optgroup label="Choose a Country Code">';

			foreach ($country_codes as $country_code) {
				$country_name = $this->get_country_name($country_code);

				if (!$country_name) {
					continue;
				}

				echo '<option value="' . $country_code . '"> ' . $country_name . '</option>';
			}

			echo '
					</optgroup>
				</select>

				<select id="regionCode" size="10" style="height:200px">
					<optgroup label="Country Subdivision Code List">
					</optgroup>
				</select>

				<div id="region-code"></div>
			</form>';
		}

		echo '
			<p>&nbsp;</p>

			<h3>Get visitor\'s location information with Variable Tag</h3>
			<p>
				<strong>Variable Tag List</strong>
				<ul>
					<li><span class="code">{ip:ipAddress}</span> - Visitor IP address.</li>
					<li><span class="code">{ip:countryCode}</span> - Two-character country code based on ISO 3166.</li>
					<li><span class="code">{ip:countryName}</span> - Country name based on ISO 3166.</li>
					<li><span class="code">{ip:regionName}</span> - Region, province or state name.</li>
					<li><span class="code">{ip:cityName}</span> - City name.</li>
					<li><span class="code">{ip:latitude}</span> - Latitude of the city.</li>
					<li><span class="code">{ip:longitude}</span> - Longitude of the city.</li>
					<li><span class="code">{ip:zipCode}</span> - ZIP/Postal code.</li>
					<li><span class="code">{ip:isp}</span> - Internet Service Provider or company\'s name.</li>
					<li><span class="code">{ip:domainName}</span> - Internet domain name associated to IP address range.</li>
					<li><span class="code">{ip:timeZone}</span> - UTC time zone.</li>
					<li><span class="code">{ip:netSpeed}</span> - Internet connection type. DIAL = dial up, DSL = broadband/cable, COMP = company/T1</li>
					<li><span class="code">{ip:iddCode}</span> - The IDD prefix to call the city from another country.</li>
					<li><span class="code">{ip:areaCode}</span> - A varying length number assigned to geographic areas for call between cities.</li>
					<li><span class="code">{ip:weatherStationCode}</span> - The special code to identify the nearest weather observation station.</li>
					<li><span class="code">{ip:weatherStationName}</span> - The name of the nearest weather observation station.</li>
					<li><span class="code">{ip:mcc}</span> - Mobile Country Codes (MCC) as defined in ITU E.212 for use in identifying mobile stations in wireless telephone networks, particularly GSM and UMTS networks.</li>
					<li><span class="code">{ip:mnc}</span> - Mobile Network Code (MNC) is used in combination with a Mobile Country Code (MCC) to uniquely identify a mobile phone operator or carrier.</li>
					<li><span class="code">{ip:mobileCarrierName}</span> - Commercial brand associated with the mobile carrier.</li>
					<li><span class="code">{ip:elevation}</span> - Average height of city above sea level in meters (m).</li>
					<li><span class="code">{ip:usageType}</span> - Usage type classification of ISP or company.</li>
					<li><span class="code">{ip:addressType}</span> - IP address types as defined in Internet Protocol version 4 (IPv4) and Internet Protocol version 6 (IPv6). (A) Anycast - One to the closest, (U) Unicast - One to one, (M) Multicast - One to multiple, (B) Broadcast - One to all</li>
					<li><span class="code">{ip:category}</span> - The domain category is based on <a href="https://www.ip2location.com/free/iab-categories" target="_blank">IAB Tech Lab Content Taxonomy</a>. These categories are comprised of Tier-1 and Tier-2 (if available) level categories widely used in services like advertising, Internet security and filtering appliances.</li>
					<li><span class="code">{ip:countryFlag}</span> - Flag of country with size of 16 x 16.</li>
					<li><span class="code">{ip:countryFlag32}</span> - Flag of country with size of 32 x 32.</li>
					<li><span class="code">{ip:countryFlag64}</span> - Flag of country with size of 64 x 64.</li>
				</ul>
			</p>
			<p>&nbsp;</p>

			<h4>Usage Example</h4>

			<p>
				<b>Display visitor\'s IP address, country name, region name and city name.</b>
				<pre>Your IP is {ip:ipAddress}
You are in {ip:countryName}, {ip:regionName}, {ip:cityName} </pre>
			</p>

			<p>&nbsp;</p>

			<h3>Customize the post content with IP2Location Tag</h3>
			<p>
				<h4>Syntax to show content for specific country</h4>
				<pre>&#91;ip:XX[,XX]..[,XX]&#93;Your content here.&#91;/ip&#93;</pre>
				<div class="red">Note: XX is a two-character ISO-3166 country code.</div>
			</p>
			<p>
				<strong>Example</strong><br/>
				To show the content for United States or Canada visitors only.<br/>
				<pre>&#91;ip:US,CA&#93;Only visitors from United States or Canada can view this line.&#91;/ip&#93;</pre>
			</p>
			<p>&nbsp;</p>
			<p>
				<h4>Syntax to show content for specific country and region</h4>
				<pre>&#91;ip:XX:YY[,XX:YY]..[,XX:YY]&#93;Your content here.&#91;/ip&#93;</pre>
				<div class="red">Note: XX is a two-character ISO-3166 country code and YY is a ISO-3166-2 sub-division code.</div>
			</p>
			<p>
				<strong>Example</strong><br/>
				To show the content for California or New York visitors only.<br/>
				<pre>&#91;ip:US:CA,US:NY&#93;Only visitors from California or New York can view this line.&#91;/ip&#93;</pre>
			</p>
			<p>&nbsp;</p>

			<p>
				<h4>Syntax to hide the content from specific country</h4>
				<pre>&#91;ip:*,-XX[,-XX]..[,-XX]&#93;Your content here.&#91;/ip&#93;</pre>
				<div class="red">Note: XX is a two-character ISO-3166 country code.</div>
			</p>
			<p>
				<strong>Example</strong><br/>
				All visitors will be able to see the line except visitors from Vietnam.</br>
				<pre>&#91;ip:*,-VN&#93;All visitors will be able to see this line except visitors from Vietnam.&#91;/ip&#93;</pre>
			</p>

			<p>&nbsp;</p>

			<p>
				<h4>Syntax to hide the content from specific country and region</h4>
				<pre>&#91;ip:*,-XX:YY[,-XX:YY]..[,-XX:YY]&#93;Your content here.&#91;/ip&#93;</pre>
				<div class="red">Note: XX is a two-character ISO-3166 country code and YY is a ISO-3166-2 sub-division code.</div>
			</p>
			<p>
				<strong>Example</strong><br/>
				All visitors will be able to see the line except visitors from California.</br>
				<pre>&#91;ip:*,-US:CA&#93;All visitors will be able to see this line except visitors from California.&#91;/ip&#93;</pre>
			</p>

			<p>&nbsp;</p>

			<h3>References</h3>

			<p>Please visit <a href="https://www.ip2location.com/free/country-multilingual#wordpress-wzdit" target="_blank">https://www.ip2location.com</a> for ISO country codes and names supported.</p>

			<p>&nbsp;</p>
		</div>';

		if (!in_array(get_option('ip2location_tags_lookup_mode'), ['io', 'ws']) && (!is_file(IP2LOCATION_DIR . get_option('ip2location_tags_database')))) {
			echo '
			<div id="modal-get-started" class="ip2location-modal" style="display:block">
				<div class="ip2location-modal-content" style="width:400px;height:250px">
					<div align="center"><img src="' . plugins_url('/assets/img/logo.png', __FILE__) . '" width="256" height="31" align="center"></div>

					<p>
						<strong>IP2Location Tags</strong> provides a solution to easily get the visitor\'s location information based on IP address and customize the content display for different countries.
					</p>
					<p>
						This is a step-by-step guide to setup this plugin.
					</p>';

			if (!extension_loaded('bcmath')) {
				echo '
					<span class="dashicons dashicons-warning"></span> IP2Location requires <strong>bcmath</strong> PHP extension enabled. Please enable this extension in your <strong>php.ini</strong>.
					<p style="text-align:center;margin-top:60px">
						<button class="button button-primary" disabled>Get Started</button>
					</p>';
			} else {
				echo '
					<p style="text-align:center;margin-top:80px">
						<button class="button button-primary" id="btn-get-started">Get Started</button>
					</p>';
			}

			echo '
				</div>
			</div>
			<div id="modal-step-1" class="ip2location-modal">
				<div class="ip2location-modal-content" style="width:400px;height:320px">
					<div align="center">
						<h1>Sign Up IP2Location LITE</h1>
						<table class="setup" width="200">
							<tr>
								<td align="center">
									<img src="' . plugins_url('/assets/img/step-1-selected.png', __FILE__) . '" width="32" height="32" align="center"><br>
									<strong>Step 1</strong>
								</td>
								<td align="center">
									<img src="' . plugins_url('/assets/img/step-2.png', __FILE__) . '" width="32" height="32" align="center"><br>
									Step 2
								</td>
								<td align="center">
									<img src="' . plugins_url('/assets/img/step-3.png', __FILE__) . '" width="32" height="32" align="center"><br>
									Step 3
								</td>
							</tr>
						</table>
						<div class="line"></div>
					</div>

					<form>
						<p>
							<label>Enter IP2Location LITE download token</label>
							<input type="text" id="setup_token" class="regular-text code" maxlength="64" style="width:100%">
						</p>
						<p class="description">
							Don\'t have an account yet? Sign up a <a href="https://lite.ip2location.com/sign-up#wordpress-wzdit" target="_blank">free account</a> to obtain your download token.
						</p>
						<p id="token_status">&nbsp;</p>
					</form>
					<p style="text-align:right;margin-top:30px">
						<button id="btn-to-step-2" class="button button-primary" disabled>Next &raquo;</button>
					</p>
				</div>
			</div>
			<div id="modal-step-2" class="ip2location-modal">
				<div class="ip2location-modal-content" style="width:400px;height:320px">
					<div align="center">
						<h1>Download IP2Location Database</h1>
						<table class="setup" width="200">
							<tr>
								<td align="center">
									<img src="' . plugins_url('/assets/img/step-1.png', __FILE__) . '" width="32" height="32" align="center"><br>
									Step 1
								</td>
								<td align="center">
									<img src="' . plugins_url('/assets/img/step-2-selected.png', __FILE__) . '" width="32" height="32" align="center"><br>
									<strong>Step 2</strong>
								</td>
								<td align="center">
									<img src="' . plugins_url('/assets/img/step-3.png', __FILE__) . '" width="32" height="32" align="center"><br>
									Step 3
								</td>
							</tr>
						</table>
						<div class="line"></div>
					</div>

					<form style="height:140px">
						<p id="ip2location_download_status"></p>
					</form>
					<p style="text-align:right;margin-top:30px">
						<button id="btn-to-step-1" class="button button-primary" disabled>&laquo; Previous</button>
						<button id="btn-to-step-3" class="button button-primary" disabled>Next &raquo;</button>
					</p>
				</div>
			</div>
			<div id="modal-step-3" class="ip2location-modal">
				<div class="ip2location-modal-content" style="width:400px;height:320px">
					<div align="center">
						<h1>Setup Rules</h1>
						<table class="setup" width="200">
							<tr>
								<td align="center">
									<img src="' . plugins_url('/assets/img/step-1.png', __FILE__) . '" width="32" height="32" align="center"><br>
									Step 1
								</td>
								<td align="center">
									<img src="' . plugins_url('/assets/img/step-2.png', __FILE__) . '" width="32" height="32" align="center"><br>
									Step 2
								</td>
								<td align="center">
									<img src="' . plugins_url('/assets/img/step-3-selected.png', __FILE__) . '" width="32" height="32" align="center"><br>
									<strong>Step 3</strong>
								</td>
							</tr>
						</table>
						<div class="line"></div>
					</div>

					<form style="height:140px">
						<p>
							Please press the finish button to comeplete your setup.
						</p>
					</form>
					<p style="text-align:right;margin-top:30px">
						<button class="button button-primary" onclick="window.location.href=\'' . admin_url('admin.php?page=ip2location-tags') . '\';">Finish</button>
					</p>
				</div>
			</div>

			<div id="modal-step-4" class="ip2location-modal">
				<div class="ip2location-modal-content" style="width:400px;height:320px">
					<div align="center">
						<img src="' . plugins_url('/assets/img/step-end.png', __FILE__) . '" width="300" height="225" align="center"><br>
						Congratulations! You have completed the setup.
					</div>
					<p style="text-align:right;margin-top:50px">
						<button class="button button-primary" onclick="window.location.href=\'' . admin_url('admin.php?page=ip2location-tags') . '\';">Done</button>
					</p>
				</div>
			</div>';
		}
	}

	public function admin_page()
	{
		add_options_page('IP2Location Tags', 'IP2Location Tags', 'manage_options', 'ip2location-tags', [&$this, 'admin_options']);
	}

	public function set_defaults()
	{
		if (get_option('ip2location_tags_lookup_mode') !== false) {
			return;
		}

		update_option('ip2location_tags_lookup_mode', 'bin');
		update_option('ip2location_tags_api_key', '');
		update_option('ip2location_tags_io_api_key', '');
		update_option('ip2location_tags_database', '');

		// Find any .BIN files in current directory
		$files = scandir(IP2LOCATION_TAGS_ROOT);

		foreach ($files as $file) {
			if (strtoupper(substr($file, -4)) == '.BIN') {
				update_option('ip2location_tags_database', $file);
				break;
			}
		}
	}

	public function get_location($ip)
	{
		switch (get_option('ip2location_tags_lookup_mode')) {
			case 'bin':
				$this->write_debug_log('Lookup by BIN database.');
				// Make sure IP2Location database is exist.
				if (!is_file(IP2LOCATION_DIR . get_option('ip2location_tags_database'))) {
					$this->write_debug_log('IP2Location BIN database not found.');

					return false;
				}

				// Create IP2Location object.
				$geo = new \IP2Location\Database(IP2LOCATION_DIR . get_option('ip2location_tags_database'), \IP2Location\Database::FILE_IO);

				// Get geolocation by IP address.
				$response = $geo->lookup($ip, \IP2Location\Database::ALL);

				$this->write_debug_log('Geolocation result for [' . $ip . '] found: ' . print_r($response, true));

				return [
					'ipAddress'          => $ip,
					'countryCode'        => (isset($response['countryCode'])) ? $response['countryCode'] : '-',
					'countryName'        => (isset($response['countryName'])) ? $response['countryName'] : '-',
					'regionName'         => (isset($response['regionName'])) ? $response['regionName'] : '-',
					'cityName'           => (isset($response['cityName'])) ? $response['cityName'] : '-',
					'latitude'           => (isset($response['latitude'])) ? $response['latitude'] : '-',
					'longitude'          => (isset($response['longitude'])) ? $response['longitude'] : '-',
					'isp'                => (isset($response['isp'])) ? $response['isp'] : '-',
					'domainName'         => (isset($response['domainName'])) ? $response['domainName'] : '-',
					'zipCode'            => (isset($response['zipCode'])) ? $response['zipCode'] : '-',
					'timeZone'           => (isset($response['timeZone'])) ? $response['timeZone'] : '-',
					'netSpeed'           => (isset($response['netSpeed'])) ? $response['netSpeed'] : '-',
					'iddCode'            => (isset($response['iddCode'])) ? $response['iddCode'] : '-',
					'areaCode'           => (isset($response['areaCode'])) ? $response['areaCode'] : '-',
					'weatherStationCode' => (isset($response['weatherStationCode'])) ? $response['weatherStationCode'] : '-',
					'weatherStationName' => (isset($response['weatherStationName'])) ? $response['weatherStationName'] : '-',
					'mcc'                => (isset($response['mcc'])) ? $response['mcc'] : '-',
					'mnc'                => (isset($response['mnc'])) ? $response['mnc'] : '-',
					'mobileCarrierName'  => (isset($response['mobileCarrierName'])) ? $response['mobileCarrierName'] : '-',
					'elevation'          => (isset($response['elevation'])) ? $response['elevation'] : '-',
					'usageType'          => (isset($response['usageType'])) ? $response['usageType'] : '-',
					'addressType'        => (isset($response['addressType'])) ? $response['addressType'] : '-',
					'category'           => (isset($response['category'])) ? $response['category'] : '-',
				];
				break;

			case 'ws':
				$this->write_debug_log('Lookup by Web service.');

				if (!class_exists('WP_Http')) {
					include_once ABSPATH . WPINC . '/class-http.php';
				}

				$request = new WP_Http();
				$response = $request->request('https://api.ip2location.com/v2/?' . http_build_query([
					'key'     => get_option('ip2location_tags_api_key'),
					'ip'      => $ip,
					'package' => 'WS10',
					'format'  => 'json',
				]), ['timeout' => 3]);

				if (($json = json_decode($response['body'])) !== null) {
					$this->write_debug_log('Geolocation result for [' . $ip . '] found: ' . print_r($json, true));

					return [
						'ipAddress'          => $ip,
						'countryCode'        => $json->country_code,
						'countryName'        => $json->country_name,
						'regionName'         => $json->region_name,
						'cityName'           => $json->city_name,
						'latitude'           => $json->latitude,
						'longitude'          => $json->longitude,
						'isp'                => $json->isp,
						'domainName'         => $json->domain,
						'zipCode'            => $json->zip_code,
						'timeZone'           => '-',
						'netSpeed'           => '-',
						'iddCode'            => '-',
						'areaCode'           => '-',
						'weatherStationCode' => '-',
						'weatherStationName' => '-',
						'mcc'                => '-',
						'mnc'                => '-',
						'mobileCarrierName'  => '-',
						'elevation'          => '-',
						'usageType'          => '-',
						'addressType'        => '-',
						'category'           => '-',
					];
				}

				$this->write_debug_log('Web service connection error.');
				break;

			case 'io':
				$this->write_debug_log('Lookup by ip2location.io web service.');

				if (!class_exists('WP_Http')) {
					include_once ABSPATH . WPINC . '/class-http.php';
				}

				$request = new WP_Http();
				$response = $request->request('https://api.ip2location.io/?' . http_build_query([
					'key' => get_option('ip2location_tags_io_api_key'),
					'ip'  => $ip,
				]), ['timeout' => 3]);

				if (($json = json_decode($response['body'])) !== null) {
					$this->write_debug_log('Geolocation result for [' . $ip . '] found: ' . print_r($json, true));

					return [
						'ipAddress'          => $json->ip,
						'countryCode'        => $json->country_code,
						'countryName'        => $json->country_name,
						'regionName'         => $json->region_name,
						'cityName'           => $json->city_name,
						'latitude'           => $json->latitude,
						'longitude'          => $json->longitude,
						'isp'                => $json->isp ?? '',
						'domainName'         => $json->domain ?? '',
						'zipCode'            => $json->zip_code,
						'timeZone'           => $json->time_zone,
						'netSpeed'           => $json->net_speed ?? '',
						'iddCode'            => $json->idd_code ?? '',
						'areaCode'           => $json->area_code ?? '',
						'weatherStationCode' => $json->weather_station_code ?? '',
						'weatherStationName' => $json->weather_station_name ?? '',
						'mcc'                => $json->mcc ?? '',
						'mnc'                => $json->mnc ?? '',
						'mobileCarrierName'  => $json->mobile_carrier_name ?? '',
						'elevation'          => $json->elevation ?? '',
						'usageType'          => $json->usage_type ?? '',
						'addressType'        => $json->address_type ?? '',
						'category'           => $json->category ?? '',
					];
				}

				$this->write_debug_log('ip2location.io web service connection error.');
				break;
		}
	}

	public function download()
	{
		set_time_limit(600);

		try {
			$productCode = (isset($_POST['productCode'])) ? sanitize_text_field($_POST['productCode']) : '';
			$token = (isset($_POST['token'])) ? sanitize_text_field($_POST['token']) : '';

			if (!class_exists('WP_Http')) {
				include_once ABSPATH . WPINC . '/class-http.php';
			}

			// Remove existing database.zip.
			if (is_file(IP2LOCATION_TAGS_ROOT . 'database.zip')) {
				@unlink(IP2LOCATION_TAGS_ROOT . 'database.zip');
			}

			// Start downloading BIN database from IP2Location website.
			$request = new WP_Http();
			$response = $request->request('https://www.ip2location.com/download?' . http_build_query([
				'file'  => $productCode,
				'token' => $token,
			]), ['timeout' => 120]);

			if ((isset($response->errors)) || (!(in_array('200', $response['response'])))) {
				die('Connection error.');
			}

			// Save downloaded package into plugin directory.
			$fp = fopen(IP2LOCATION_DIR . 'database.zip', 'w');

			if (!$fp) {
				die('No permission to write into file system.');
			}

			fwrite($fp, $response['body']);
			fclose($fp);

			// Decompress the package.
			$zip = zip_open(IP2LOCATION_DIR . 'database.zip');

			if (!is_resource($zip)) {
				die('Downloaded file is corrupted.');
			}

			while ($entries = zip_read($zip)) {
				// Extract the BIN file only.
				$file_name = zip_entry_name($entries);

				if (substr($file_name, -4) != '.BIN') {
					continue;
				}

				// Remove existing BIN files before extract the latest BIN file.
				$files = scandir(IP2LOCATION_DIR);

				foreach ($files as $file) {
					if (strtoupper(substr($file, -4)) == '.BIN') {
						@unlink(IP2LOCATION_DIR . $file);
					}
				}

				$handle = fopen(IP2LOCATION_DIR . $file_name, 'w+');
				fwrite($handle, zip_entry_read($entries, zip_entry_filesize($entries)));
				fclose($handle);

				if (!is_file(IP2LOCATION_DIR . $file_name)) {
					die('ERROR');
				}

				@unlink(IP2LOCATION_DIR . 'database.zip');

				update_option('ip2location_tags_token', $token);
				update_option('ip2location_tags_database', $file_name);

				die('SUCCESS');
			}
		} catch (Exception $e) {
			die('ERROR');
		}

		die('ERROR');
	}

	public function region_list()
	{
		$country_code = (isset($_POST['countryCode'])) ? sanitize_text_field($_POST['countryCode']) : '';

		if (isset($this->regions[$country_code])) {
			sort($this->regions[$country_code]);
			foreach ($this->regions[$country_code] as $region_code => $region_name) {
				echo '<option value="' . str_pad($region_code, 2, '0', STR_PAD_LEFT) . '"> ' . $region_name . '</option>';
			}
		}
	}

	public function get_country_name($code)
	{
		$countries = ['AF' => 'Afghanistan', 'AL' => 'Albania', 'DZ' => 'Algeria', 'AS' => 'American Samoa', 'AD' => 'Andorra', 'AO' => 'Angola', 'AI' => 'Anguilla', 'AQ' => 'Antarctica', 'AG' => 'Antigua and Barbuda', 'AR' => 'Argentina', 'AM' => 'Armenia', 'AW' => 'Aruba', 'AU' => 'Australia', 'AT' => 'Austria', 'AZ' => 'Azerbaijan', 'BS' => 'Bahamas', 'BH' => 'Bahrain', 'BD' => 'Bangladesh', 'BB' => 'Barbados', 'BY' => 'Belarus', 'BE' => 'Belgium', 'BZ' => 'Belize', 'BJ' => 'Benin', 'BM' => 'Bermuda', 'BT' => 'Bhutan', 'BO' => 'Bolivia', 'BA' => 'Bosnia and Herzegovina', 'BW' => 'Botswana', 'BV' => 'Bouvet Island', 'BR' => 'Brazil', 'IO' => 'British Indian Ocean Territory', 'BN' => 'Brunei Darussalam', 'BG' => 'Bulgaria', 'BF' => 'Burkina Faso', 'BI' => 'Burundi', 'KH' => 'Cambodia', 'CM' => 'Cameroon', 'CA' => 'Canada', 'CV' => 'Cape Verde', 'KY' => 'Cayman Islands', 'CF' => 'Central African Republic', 'TD' => 'Chad', 'CL' => 'Chile', 'CN' => 'China', 'CX' => 'Christmas Island', 'CC' => 'Cocos (Keeling) Islands', 'CO' => 'Colombia', 'KM' => 'Comoros', 'CG' => 'Congo', 'CK' => 'Cook Islands', 'CR' => 'Costa Rica', 'CI' => 'Cote D\'Ivoire', 'HR' => 'Croatia', 'CU' => 'Cuba', 'CY' => 'Cyprus', 'CZ' => 'Czech Republic', 'CD' => 'Democratic Republic of Congo', 'DK' => 'Denmark', 'DJ' => 'Djibouti', 'DM' => 'Dominica', 'DO' => 'Dominican Republic', 'TP' => 'East Timor', 'EC' => 'Ecuador', 'EG' => 'Egypt', 'SV' => 'El Salvador', 'GQ' => 'Equatorial Guinea', 'ER' => 'Eritrea', 'EE' => 'Estonia', 'ET' => 'Ethiopia', 'FK' => 'Falkland Islands (Malvinas)', 'FO' => 'Faroe Islands', 'FJ' => 'Fiji', 'FI' => 'Finland', 'FR' => 'France', 'FX' => 'France, Metropolitan', 'GF' => 'French Guiana', 'PF' => 'French Polynesia', 'TF' => 'French Southern Territories', 'GA' => 'Gabon', 'GM' => 'Gambia', 'GE' => 'Georgia', 'DE' => 'Germany', 'GH' => 'Ghana', 'GI' => 'Gibraltar', 'GR' => 'Greece', 'GL' => 'Greenland', 'GD' => 'Grenada', 'GP' => 'Guadeloupe', 'GU' => 'Guam', 'GT' => 'Guatemala', 'GN' => 'Guinea', 'GW' => 'Guinea-bissau', 'GY' => 'Guyana', 'HT' => 'Haiti', 'HM' => 'Heard and Mc Donald Islands', 'HN' => 'Honduras', 'HK' => 'Hong Kong', 'HU' => 'Hungary', 'IS' => 'Iceland', 'IN' => 'India', 'ID' => 'Indonesia', 'IR' => 'Iran (Islamic Republic of)', 'IQ' => 'Iraq', 'IE' => 'Ireland', 'IL' => 'Israel', 'IT' => 'Italy', 'JM' => 'Jamaica', 'JP' => 'Japan', 'JO' => 'Jordan', 'KZ' => 'Kazakhstan', 'KE' => 'Kenya', 'KI' => 'Kiribati', 'KR' => 'Korea, Republic of', 'KW' => 'Kuwait', 'KG' => 'Kyrgyzstan', 'LA' => 'Lao People\'s Democratic Republic', 'LV' => 'Latvia', 'LB' => 'Lebanon', 'LS' => 'Lesotho', 'LR' => 'Liberia', 'LY' => 'Libyan Arab Jamahiriya', 'LI' => 'Liechtenstein', 'LT' => 'Lithuania', 'LU' => 'Luxembourg', 'MO' => 'Macau', 'MK' => 'Macedonia', 'MG' => 'Madagascar', 'MW' => 'Malawi', 'MY' => 'Malaysia', 'MV' => 'Maldives', 'ML' => 'Mali', 'MT' => 'Malta', 'MH' => 'Marshall Islands', 'MQ' => 'Martinique', 'MR' => 'Mauritania', 'MU' => 'Mauritius', 'YT' => 'Mayotte', 'MX' => 'Mexico', 'FM' => 'Micronesia, Federated States of', 'MD' => 'Moldova, Republic of', 'MC' => 'Monaco', 'MN' => 'Mongolia', 'MS' => 'Montserrat', 'MA' => 'Morocco', 'MZ' => 'Mozambique', 'MM' => 'Myanmar', 'NA' => 'Namibia', 'NR' => 'Nauru', 'NP' => 'Nepal', 'NL' => 'Netherlands', 'AN' => 'Netherlands Antilles', 'NC' => 'New Caledonia', 'NZ' => 'New Zealand', 'NI' => 'Nicaragua', 'NE' => 'Niger', 'NG' => 'Nigeria', 'NU' => 'Niue', 'NF' => 'Norfolk Island', 'KP' => 'North Korea', 'MP' => 'Northern Mariana Islands', 'NO' => 'Norway', 'OM' => 'Oman', 'PK' => 'Pakistan', 'PW' => 'Palau', 'PA' => 'Panama', 'PG' => 'Papua New Guinea', 'PY' => 'Paraguay', 'PE' => 'Peru', 'PH' => 'Philippines', 'PN' => 'Pitcairn', 'PL' => 'Poland', 'PT' => 'Portugal', 'PR' => 'Puerto Rico', 'QA' => 'Qatar', 'RE' => 'Reunion', 'RO' => 'Romania', 'RU' => 'Russian Federation', 'RW' => 'Rwanda', 'KN' => 'Saint Kitts and Nevis', 'LC' => 'Saint Lucia', 'VC' => 'Saint Vincent and the Grenadines', 'WS' => 'Samoa', 'SM' => 'San Marino', 'ST' => 'Sao Tome and Principe', 'SA' => 'Saudi Arabia', 'SN' => 'Senegal', 'SC' => 'Seychelles', 'SL' => 'Sierra Leone', 'SG' => 'Singapore', 'SK' => 'Slovak Republic', 'SI' => 'Slovenia', 'SB' => 'Solomon Islands', 'SO' => 'Somalia', 'ZA' => 'South Africa', 'GS' => 'South Georgia And The South Sandwich Islands', 'ES' => 'Spain', 'LK' => 'Sri Lanka', 'SH' => 'St. Helena', 'PM' => 'St. Pierre and Miquelon', 'SD' => 'Sudan', 'SR' => 'Suriname', 'SJ' => 'Svalbard and Jan Mayen Islands', 'SZ' => 'Swaziland', 'SE' => 'Sweden', 'CH' => 'Switzerland', 'SY' => 'Syrian Arab Republic', 'TW' => 'Taiwan', 'TJ' => 'Tajikistan', 'TZ' => 'Tanzania, United Republic of', 'TH' => 'Thailand', 'TG' => 'Togo', 'TK' => 'Tokelau', 'TO' => 'Tonga', 'TT' => 'Trinidad and Tobago', 'TN' => 'Tunisia', 'TR' => 'Turkey', 'TM' => 'Turkmenistan', 'TC' => 'Turks and Caicos Islands', 'TV' => 'Tuvalu', 'UG' => 'Uganda', 'UA' => 'Ukraine', 'AE' => 'United Arab Emirates', 'GB' => 'United Kingdom', 'US' => 'United States', 'UM' => 'United States Minor Outlying Islands', 'UY' => 'Uruguay', 'UZ' => 'Uzbekistan', 'VU' => 'Vanuatu', 'VA' => 'Vatican City State (Holy See)', 'VE' => 'Venezuela', 'VN' => 'Viet Nam', 'VG' => 'Virgin Islands (British)', 'VI' => 'Virgin Islands (U.S.)', 'WF' => 'Wallis and Futuna Islands', 'EH' => 'Western Sahara', 'YE' => 'Yemen', 'YU' => 'Yugoslavia', 'ZM' => 'Zambia', 'ZW' => 'Zimbabwe'];

		return (isset($countries[$code])) ? $countries[$code] : '';
	}

	public function get_region_code($country_code, $region_name)
	{
		if (!isset($this->regions[$country_code])) {
			return false;
		}

		foreach ($this->regions[$country_code] as $rc => $rn) {
			if (strtoupper($region_name) == $rn) {
				return $rc;
			}
		}

		return false;
	}

	public function plugin_admin_notices()
	{
		if (get_user_meta(get_current_user_id(), 'ip2location_tags_admin_notice', true) === 'dismissed') {
			return;
		}

		$url = get_admin_url() . 'options-general.php?page=ip2location-tags';
		$currentscr = get_current_screen();

		if ($currentscr->parent_base == 'plugins') {
			if (is_plugin_active('ip2location-tags/ip2location-tags.php')) {
				echo '
					<div id="ip2location-tags-notice" class="updated notice is-dismissible">
						<h2>IP2Location Tags is almost ready!</h2>
						<p>Download and update IP2Location BIN database for accurate result.</p>
						<p>
							<a href=' . $url . ' class="button button-primary"> Download Now </a>
							<a href="https://www.ip2location.com/#wordpress-wzdit" class="button"> Learn more </a>
						</p>
					</div>
				';
			}
		}
	}

	public function plugin_enqueues($hook)
	{
		if (is_admin() && get_user_meta(get_current_user_id(), 'ip2location_tags_admin_notice', true) !== 'dismissed') {
			wp_enqueue_script('ip2location_tags_admin_script', plugins_url('/assets/js/notice-update.js', __FILE__), ['jquery'], '1.0', true);
			wp_localize_script('ip2location_tags_admin_script', 'ip2location_tags_admin', ['ip2location_tags_admin_nonce' => wp_create_nonce('ip2location_tags_admin_nonce')]);
		}

		if ($hook == 'settings_page_ip2location-tags') {
			wp_enqueue_script('ip2location_tags_script_js', plugins_url('/assets/js/script.js?t=' . microtime(true), __FILE__), ['jquery'], null, true);
		}

		if ($hook == 'plugins.php') {
			// Add in required libraries for feedback modal
			wp_enqueue_script('jquery-ui-dialog');
			wp_enqueue_style('wp-jquery-ui-dialog');

			wp_enqueue_script('ip2location_tags_admin_script', plugins_url('/assets/js/feedback.js', __FILE__), ['jquery'], null, true);
		} elseif ($hook == 'settings_page_ip2location-tags') {
			wp_enqueue_style('ip2location_tags_admin_menu_styles', untrailingslashit(plugins_url('/', __FILE__)) . '/assets/css/style.css', []);
			wp_enqueue_script('ip2location_tags_admin_script', plugins_url('/assets/js/script.js?t=' . microtime(true), __FILE__), ['jquery'], null, true);
		}
	}

	public function plugin_dismiss_admin_notice()
	{
		if (!isset($_POST['ip2location_tags_admin_nonce']) || !wp_verify_nonce($_POST['ip2location_tags_admin_nonce'], 'ip2location_tags_admin_nonce')) {
			wp_die();
		}

		update_user_meta(get_current_user_id(), 'ip2location_tags_admin_notice', 'dismissed');
	}

	public function write_debug_log($message)
	{
		if (!get_option('ip2location_tags_debug_log_enabled')) {
			return;
		}

		file_put_contents(IP2LOCATION_TAGS_ROOT . 'debug.log', gmdate('Y-m-d H:i:s') . "\t" . $message . "\n", FILE_APPEND);
	}

	public function admin_footer_text($footer_text)
	{
		$plugin_name = substr(basename(__FILE__), 0, strpos(basename(__FILE__), '.'));
		$current_screen = get_current_screen();

		if (($current_screen && strpos($current_screen->id, $plugin_name) !== false)) {
			$footer_text .= sprintf(
				__('Enjoyed %1$s? Please leave us a %2$s rating. A huge thanks in advance!', $plugin_name),
				'<strong>' . __('IP2Location Tags', $plugin_name) . '</strong>',
				'<a href="https://wordpress.org/support/plugin/' . $plugin_name . '/reviews/?filter=5/#new-post" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a>'
			);
		}

		if ($current_screen->id == 'plugins') {
			return $footer_text . '
			<div id="ip2location-tags-feedback-modal" class="hidden" style="max-width:800px">
				<span id="ip2location-tags-feedback-response"></span>
				<p>
					<strong>Would you mind sharing with us the reason to deactivate the plugin?</strong>
				</p>
				<p>
					<label>
						<input type="radio" name="ip2location-tags-feedback" value="1"> I no longer need the plugin
					</label>
				</p>
				<p>
					<label>
						<input type="radio" name="ip2location-tags-feedback" value="2"> I couldn\'t get the plugin to work
					</label>
				</p>
				<p>
					<label>
						<input type="radio" name="ip2location-tags-feedback" value="3"> The plugin doesn\'t meet my requirements
					</label>
				</p>
				<p>
					<label>
						<input type="radio" name="ip2location-tags-feedback" value="4"> Other concerns
						<br><br>
						<textarea id="ip2location-tags-feedback-other" style="display:none;width:100%"></textarea>
					</label>
				</p>
				<p>
					<div style="float:left">
						<input type="button" id="ip2location-tags-submit-feedback-button" class="button button-danger" value="Submit & Deactivate" />
					</div>
					<div style="float:right">
						<a href="#">Skip & Deactivate</a>
					</div>
				</p>
			</div>';
		}

		return $footer_text;
	}

	public function download_database()
	{
		@set_time_limit(300);

		require_once ABSPATH . 'wp-admin/includes/file.php';
		WP_Filesystem();
		global $wp_filesystem;

		try {
			$code = (isset($_POST['database'])) ? sanitize_text_field($_POST['database']) : '';

			if ($code == 'DB1') {
				$code = 'DB1BINIPV6';
			}

			$working_dir = IP2LOCATION_DIR . 'working' . DIRECTORY_SEPARATOR;
			$zip_file = $working_dir . 'database.zip';

			// Remove existing working directory
			$wp_filesystem->delete($working_dir, true);

			// Create working directory
			$wp_filesystem->mkdir($working_dir);

			if (!class_exists('WP_Http')) {
				include_once ABSPATH . WPINC . '/class-http.php';
			}

			$request = new WP_Http();

			// Check download permission
			$response = $request->request('https://www.ip2location.com/download-info?' . http_build_query([
				'package' => $code,
				'token'   => get_option('ip2location_tags_token'),
				'source'  => 'wp_tags',
			]));

			$parts = explode(';', $response['body']);

			if ($parts[0] != 'OK') {
				// Download LITE version
				if ($code == 'DB1BINIPV6') {
					$code = 'DB1LITEBINIPV6';
				}

				$response = $request->request('https://www.ip2location.com/download-info?' . http_build_query([
					'package' => $code,
					'token'   => get_option('ip2location_tags_token'),
					'source'  => 'wp_tags',
				]));

				$parts = explode(';', $response['body']);

				if ($parts[0] != 'OK') {
					die('You do not have a IP2Location subscription.');
				}
			}

			// Start downloading BIN database from IP2Location website
			$response = $request->request('https://www.ip2location.com/download?' . http_build_query([
				'file'   => $code,
				'token'  => get_option('ip2location_tags_token'),
				'source' => 'wp_tags',
			]), [
				'timeout' => 300,
			]);

			if ((isset($response->errors)) || (!(in_array('200', $response['response'])))) {
				$wp_filesystem->delete($working_dir, true);
				die('Connection timed out while downloading the database.');
			}

			// Save downloaded package.
			$fp = fopen($zip_file, 'w');

			if (!$fp) {
				die(__('No permission to write into file system.', 'ip2location-tags'));
			}

			fwrite($fp, $response['body']);
			fclose($fp);

			if (filesize($zip_file) < 51200) {
				$message = file_get_contents($zip_file);
				$wp_filesystem->delete($working_dir, true);

				die($message);
			}

			// Unzip the package to working directory
			$result = unzip_file($zip_file, $working_dir);

			// Once extracted, delete the package.
			unlink($zip_file);

			if (is_wp_error($result)) {
				$wp_filesystem->delete($working_dir, true);
				die('Problem when decompressing the downloaded package.');
			}

			// File the BIN database
			$bin_database = '';
			$files = scandir($working_dir);

			foreach ($files as $file) {
				if (strtoupper(substr($file, -4)) == '.BIN') {
					$bin_database = $file;
					break;
				}
			}

			// Move file to IP2Location directory
			$wp_filesystem->move($working_dir . $bin_database, IP2LOCATION_DIR . $bin_database, true);

			update_option('ip2location_tags_lookup_mode', 'bin');
			update_option('ip2location_tags_database', $bin_database);

			// Remove working directory
			$wp_filesystem->delete($working_dir, true);

			die('SUCCESS');
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function validate_token()
	{
		try {
			$token = (isset($_POST['token'])) ? sanitize_text_field($_POST['token']) : '';

			if (!class_exists('WP_Http')) {
				include_once ABSPATH . WPINC . '/class-http.php';
			}

			$request = new WP_Http();

			// Check download permission
			$response = $request->request('https://www.ip2location.com/download-info?' . http_build_query([
				'package' => 'DB1LITEBIN',
				'token'   => $token,
				'source'  => 'wp_tags',
			]));

			$parts = explode(';', $response['body']);

			if ($parts[0] != 'OK') {
				$response = $request->request('https://www.ip2location.com/download-info?' . http_build_query([
					'package' => 'DB1BIN',
					'token'   => $token,
					'source'  => 'wp_tags',
				]));

				$parts = explode(';', $response['body']);

				if ($parts[0] != 'OK') {
					die('Invalid download token.');
				}
			}

			update_option('ip2location_tags_token', $token);

			die('SUCCESS');
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function submit_feedback()
	{
		$feedback = (isset($_POST['feedback'])) ? sanitize_text_field($_POST['feedback']) : '';
		$others = (isset($_POST['others'])) ? sanitize_text_field($_POST['others']) : '';

		$options = [
			1 => 'I no longer need the plugin',
			2 => 'I couldn\'t get the plugin to work',
			3 => 'The plugin doesn\'t meet my requirements',
			4 => 'Other concerns' . (($others) ? (' - ' . $others) : ''),
		];

		if (isset($options[$feedback])) {
			if (!class_exists('WP_Http')) {
				include_once ABSPATH . WPINC . '/class-http.php';
			}

			$request = new WP_Http();
			$response = $request->request('https://www.ip2location.com/wp-plugin-feedback?' . http_build_query([
				'name'    => 'ip2location-tags',
				'message' => $options[$feedback],
			]), ['timeout' => 5]);
		}
	}

	private function get_ip()
	{
		// Get server IP address
		$server_ip = (isset($_SERVER['SERVER_ADDR'])) ? $_SERVER['SERVER_ADDR'] : '';

		// If website is hosted behind CloudFlare protection.
		if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && filter_var($_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
			return $_SERVER['HTTP_CF_CONNECTING_IP'];
		}

		if (isset($_SERVER['X-Real-IP']) && filter_var($_SERVER['X-Real-IP'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
			return $_SERVER['X-Real-IP'];
		}

		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = trim(current(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])));

			if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) && $ip != $server_ip) {
				return $ip;
			}
		}

		return $_SERVER['REMOTE_ADDR'];
	}

	private function get_database_file()
	{
		// Find any .BIN files in current directory.
		$files = scandir(IP2LOCATION_DIR);

		foreach ($files as $file) {
			if (preg_match('/PX|PROXY/', strtoupper($file))) {
				continue;
			}

			if (strtoupper(substr($file, -4)) == '.BIN') {
				return $file;
			}
		}
	}

	private function get_database_date()
	{
		if (!is_file(IP2LOCATION_DIR . get_option('ip2location_tags_database'))) {
			return;
		}

		$obj = new \IP2Location\Database(IP2LOCATION_DIR . get_option('ip2location_tags_database'), \IP2Location\Database::FILE_IO);

		return date('Y-m-d', strtotime(str_replace('.', '-', $obj->getDatabaseVersion())));
	}

	private function is_region_supported()
	{
		if (get_option('ip2location_tags_lookup_mode') == 'ws' && get_option('ip2location_tags_api_key')) {
			return true;
		}

		if (get_option('ip2location_tags_lookup_mode') == 'io' && get_option('ip2location_tags_io_api_key')) {
			return true;
		}

		if (!is_file(IP2LOCATION_DIR . get_option('ip2location_tags_database'))) {
			return null;
		}

		$obj = new \IP2Location\Database(IP2LOCATION_DIR . get_option('ip2location_tags_database'), \IP2Location\Database::FILE_IO);

		$result = $obj->lookup('8.8.8.8', \IP2Location\Database::ALL);

		if (preg_match('/unavailable/', $result['regionName'])) {
			return false;
		}

		return true;
	}

	private function parse_tag($s, $start, $end)
	{
		$s = ' ' . $s;
		$data = strpos($s, $start);

		if ($data == 0) {
			return '';
		}

		$data += strlen($start);
		$len = strpos($s, $end, $data) - $data;

		return substr($s, $data, $len);
	}
}
