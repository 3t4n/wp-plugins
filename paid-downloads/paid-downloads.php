<?php
/*
Plugin Name: Paid Downloads
Plugin URI: http://www.icprojects.net/paid-downloads-plugin.html
Description: The plugin easily allows you to sell any digital content and accept payments through PayPal, AlertPay or InerKassa. If you also wish to accept Authorize.Net and 2Checkout, please try <a href="http://codecanyon.net/item/paid-downloads-pro/2081656?ref=ichurakov">Paid Downloads Pro</a>.
Version: 3.15
Author: Ivan Churakov
Author URI: http://www.icprojects.net/about
*/
define('PD_RECORDS_PER_PAGE', '20');
define('PD_VERSION', 3.15);
wp_enqueue_script("jquery");
register_activation_hook(__FILE__, array("paiddownloads_class", "install"));

class paiddownloads_class {
	var $options;
	var $error;
	var $info;
	var $currency_list;
	
	var $paypal_currency_list = array("USD", "AUD", "BRL", "CAD", "CHF", "CZK", "DKK", "EUR", "GBP", "HKD", "HUF", "ILS", "JPY", "MXN", "MYR", "NOK", "NZD", "PHP", "PLN", "SEK", "SGD", "THB", "TRY", "TWD");
	var $alertpay_currency_list = array("AUD", "BGN", "CAD", "CHF", "CZK", "DKK", "EEK", "EUR", "GBP", "HKD", "HUF", "INR", "LTL", "MYR", "MKD", "NOK", "NZD", "PLN", "RON", "SEK", "SGD", "USD", "ZAR");
	var $interkassa_currency_list = array("USD", "EUR", "GBP", "RUR", "UAH");
	var $buynow_buttons_list = array("html", "paypal", "css3", "custom");
	
	function __construct() {
		if (function_exists('load_plugin_textdomain')) {
			load_plugin_textdomain('paiddownloads', false, dirname(plugin_basename(__FILE__)).'/languages/');
		}
		$this->currency_list = array_unique(array_merge($this->paypal_currency_list, $this->alertpay_currency_list, $this->interkassa_currency_list));
		sort($this->currency_list);
		$this->currency_list = array_unique(array_merge(array("USD"), $this->currency_list));
		
		$this->options = array (
			"exists" => 1,
			"version" => PD_VERSION,
			"show_donationbox" => "",
			"enable_paypal" => "on",
			"paypal_id" => "sales@".str_replace("www.", "", $_SERVER["SERVER_NAME"]),
			"paypal_sandbox" => "off",
			"paypal_address" => "off",
			"enable_alertpay" => "off",
			"alertpay_id" => "sales@".str_replace("www.", "", $_SERVER["SERVER_NAME"]),
			"enable_interkassa" =>"off",
			"interkassa_shop_id" => "",
			"interkassa_currency" => $interkassa_currency_list[0],
			"interkassa_secret_key" => "",
			"seller_email" => "alerts@".str_replace("www.", "", $_SERVER["SERVER_NAME"]),
			"from_name" => get_bloginfo("name"),
			"from_email" => "noreply@".str_replace("www.", "", $_SERVER["SERVER_NAME"]),
			"success_email_subject" => __('Product download details', 'paiddownloads'),
			"success_email_body" => __('Dear {first_name},', 'paiddownloads').PHP_EOL.PHP_EOL.__('Thank you for purchasing {product_title}. Click the link below to download the product:', 'paiddownloads').PHP_EOL.'{download_link}'.PHP_EOL.__('Please remember that this link is valid for {download_link_lifetime} day(s) only.', 'paiddownloads').PHP_EOL.PHP_EOL.__('Thanks,', 'paiddownloads').PHP_EOL.get_bloginfo("name"),
			"handle_unverified" => "off",
			"success_email_body_unverified" => __('Dear {first_name},', 'paiddownloads').PHP_EOL.PHP_EOL.__('Thank you for purchasing {product_title}. We will review your payment transaction and contact you as soon as possible (maximum 24 hours). Sorry for the inconvenience.', 'paiddownloads').PHP_EOL.PHP_EOL.__('Thanks,', 'paiddownloads').PHP_EOL.get_bloginfo("name"),
			"failed_email_subject" => __('Payment was not completed', 'paiddownloads'),
			"failed_email_body" => __('Dear {first_name},', 'paiddownloads').PHP_EOL.PHP_EOL.__('We would like to inform you that we have received your payment for {product_title}.', 'paiddownloads').PHP_EOL.__('The payment status is currently: {payment_status}', 'paiddownloads').PHP_EOL.__('Once the payment is completed and cleared, we will send the download details to you by e-mail.', 'paiddownloads').PHP_EOL.PHP_EOL.__('Thanks,', 'paiddownloads').PHP_EOL.get_bloginfo("name"),
			"buynow_type" => "html",
			"buynow_image" => "",
			"link_lifetime" => "2",
			"terms" => ""
		);

		if (!empty($_COOKIE["paiddownloads_error"])) {
			$this->error = stripslashes($_COOKIE["paiddownloads_error"]);
			setcookie("paiddownloads_error", "", time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
		}
		if (!empty($_COOKIE["paiddownloads_info"])) {
			$this->info = stripslashes($_COOKIE["paiddownloads_info"]);
			setcookie("paiddownloads_info", "", time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
		}

		$this->get_settings();
		$this->handle_versions();
		
		if (is_admin()) {
			if ($this->check_settings() !== true) add_action('admin_notices', array(&$this, 'admin_warning'));
			if (!file_exists(ABSPATH.'wp-content/uploads/paid-downloads/files')) add_action('admin_notices', array(&$this, 'admin_warning_reactivate'));
			add_action('admin_menu', array(&$this, 'admin_menu'));
			add_action('init', array(&$this, 'admin_request_handler'));
			add_action('admin_head', array(&$this, 'admin_header'), 15);
			if (isset($_GET['page']) && $_GET['page'] == 'paid-downloads-transactions') {
				wp_enqueue_script("thickbox");
				wp_enqueue_style("thickbox");
			}
		} else {
			add_action("init", array(&$this, "front_init"));
			add_action("wp_head", array(&$this, "front_header"));
			add_shortcode('paid-downloads', array(&$this, "shortcode_handler"));
			add_shortcode('paiddownloads', array(&$this, "shortcode_handler"));
		}
	}

	function handle_versions() {
		global $wpdb;
		if (floatval($this->options['version']) < 3.04) {
			$this->options['version'] = 3.04;
			$this->update_settings();
			if (file_exists(ABSPATH.'wp-content/uploads/paid-downloads') && is_dir(ABSPATH.'wp-content/uploads/paid-downloads')) {
				if (!file_exists(ABSPATH.'wp-content/uploads/paid-downloads/files')) {
					wp_mkdir_p(ABSPATH.'wp-content/uploads/paid-downloads/files');
				}
				$dircontent = scandir(ABSPATH.'wp-content/uploads/paid-downloads');
				for ($i=0; $i<sizeof($dircontent); $i++) {
					if ($dircontent[$i] != "." && $dircontent[$i] != ".." && $dircontent[$i] != "index.html" && $dircontent[$i] != "files" && $dircontent[$i] != $this->options['buynow_image']) {
						if (is_file(ABSPATH.'wp-content/uploads/paid-downloads/'.$dircontent[$i])) {
							rename(ABSPATH.'wp-content/uploads/paid-downloads/'.$dircontent[$i], ABSPATH.'wp-content/uploads/paid-downloads/files/'.$dircontent[$i]);
						}
					}
				}
				if (!file_exists(ABSPATH.'wp-content/uploads/paid-downloads/files/.htaccess')) {
					file_put_contents(ABSPATH.'wp-content/uploads/paid-downloads/files/.htaccess', 'deny from all');
				}
			}
		}
		if (floatval($this->options['version']) < PD_VERSION) {
			$this->options['version'] = PD_VERSION;
			$this->update_settings();
		}
	}
	
	function install () {
		global $wpdb;

		$table_name = $wpdb->prefix . "pd_files";
		//if($wpdb->get_var("show tables like '".$table_name."'") != $table_name)
		//{
			$sql = "CREATE TABLE " . $table_name . " (
				id int(11) NOT NULL auto_increment,
				title varchar(255) collate utf8_unicode_ci NOT NULL,
				filename varchar(255) collate utf8_unicode_ci NOT NULL,
				uploaded int(11) NOT NULL default '1',
				filename_original varchar(255) collate utf8_unicode_ci NOT NULL,
				price float NOT NULL,
				currency varchar(7) collate utf8_unicode_ci NOT NULL,
				available_copies int(11) NOT NULL default '0',
				license_url varchar(255) NOT NULL default '',
				registered int(11) NOT NULL,
				deleted int(11) NOT NULL default '0',
				UNIQUE KEY  id (id)
			);";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		//}
		$table_name = $wpdb->prefix . "pd_downloadlinks";
//		if($wpdb->get_var("show tables like '".$table_name."'") != $table_name)
//		{
			$sql = "CREATE TABLE " . $table_name . " (
				id int(11) NOT NULL auto_increment,
				file_id int(11) NOT NULL,
				download_key varchar(255) collate utf8_unicode_ci NOT NULL,
				owner varchar(63) collate utf8_unicode_ci NOT NULL,
				source varchar(15) collate utf8_unicode_ci NOT NULL,
				created int(11) NOT NULL,
				deleted int(11) NOT NULL default '0',
				UNIQUE KEY  id (id)
			);";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
//		}
		$table_name = $wpdb->prefix . "pd_transactions";
//		if($wpdb->get_var("show tables like '".$table_name."'") != $table_name)
//		{
			$sql = "CREATE TABLE " . $table_name . " (
				id int(11) NOT NULL auto_increment,
				file_id int(11) NOT NULL,
				payer_name varchar(255) collate utf8_unicode_ci NOT NULL,
				payer_email varchar(255) collate utf8_unicode_ci NOT NULL,
				gross float NOT NULL,
				currency varchar(15) collate utf8_unicode_ci NOT NULL,
				payment_status varchar(31) collate utf8_unicode_ci NOT NULL,
				transaction_type varchar(31) collate utf8_unicode_ci NOT NULL,
				details text collate utf8_unicode_ci NOT NULL,
				created int(11) NOT NULL,
				deleted int(11) NOT NULL default '0',
				UNIQUE KEY  id (id)
			);";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
//		}
		if (!file_exists(ABSPATH.'wp-content/uploads/paid-downloads')) {
			wp_mkdir_p(ABSPATH.'wp-content/uploads/paid-downloads');
			if (!file_exists(ABSPATH.'wp-content/uploads/paid-downloads/index.html')) {
				file_put_contents(ABSPATH.'wp-content/uploads/paid-downloads/index.html', 'Silence is the gold!');
			}
			if (!file_exists(ABSPATH.'wp-content/uploads/paid-downloads/files')) {
				wp_mkdir_p(ABSPATH.'wp-content/uploads/paid-downloads/files');
				if (!file_exists(ABSPATH.'wp-content/uploads/paid-downloads/files/.htaccess')) {
					file_put_contents(ABSPATH.'wp-content/uploads/paid-downloads/files/.htaccess', 'deny from all');
				}
			}
		}
	}

	function get_settings() {
		$exists = get_option('paiddownloads_version');
		if ($exists) {
			foreach ($this->options as $key => $value) {
				$this->options[$key] = get_option('paiddownloads_'.$key);
			}
		}
	}

	function update_settings() {
		//if (current_user_can('manage_options')) {
			foreach ($this->options as $key => $value) {
				update_option('paiddownloads_'.$key, $value);
			}
		//}
	}

	function populate_settings() {
		foreach ($this->options as $key => $value) {
			if (isset($_POST['paiddownloads_'.$key])) {
				$this->options[$key] = stripslashes($_POST['paiddownloads_'.$key]);
			}
		}
	}

	function check_settings() {
		$errors = array();
		if ($this->options['enable_alertpay'] != "on" && $this->options['enable_paypal'] != "on" && $this->options['enable_interkassa'] != "on") $errors[] = __('Select at least one payment method', 'paiddownloads');
		if ($this->options['enable_paypal'] == "on") {
			if ((!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $this->options['paypal_id']) && !preg_match("/^([A-Z0-9]+)$/i", $this->options['paypal_id'])) || strlen($this->options['paypal_id']) == 0) $errors[] = __('PayPal ID must be valid e-mail address or Merchant ID', 'paiddownloads');
		}
		if ($this->options['enable_alertpay'] == "on") {
			if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $this->options['alertpay_id']) || strlen($this->options['alertpay_id']) == 0) $errors[] = __('AlertPay ID must be valid e-mail address', 'paiddownloads');
		}
		if ($this->options['enable_interkassa'] == "on") {
			if (strlen($this->options['interkassa_shop_id']) < 3) $errors[] = __('InterKassa Shop ID is required', 'paiddownloads');
			if (strlen($this->options['interkassa_secret_key']) < 3) $errors[] = __('InterKassa Secret Key is required', 'paiddownloads');
		}
		if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $this->options['seller_email']) || strlen($this->options['seller_email']) == 0) $errors[] = __('E-mail for notifications must be valid e-mail address', 'paiddownloads');
		if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $this->options['from_email']) || strlen($this->options['from_email']) == 0) $errors[] = __('Sender e-mail must be valid e-mail address', 'paiddownloads');
		if (strlen($this->options['from_name']) < 3) $errors[] = __('Sender name is too short', 'paiddownloads');
		if (strlen($this->options['success_email_subject']) < 3) $errors[] = __('Successful purchasing e-mail subject must contain at least 3 characters', 'paiddownloads');
		else if (strlen($this->options['success_email_subject']) > 64) $errors[] = __('Successful purchasing e-mail subject must contain maximum 64 characters', 'paiddownloads');
		if (strlen($this->options['success_email_body']) < 3) $errors[] = __('Successful purchasing e-mail body must contain at least 3 characters', 'paiddownloads');
		if (strlen($this->options['failed_email_subject']) < 3) $errors[] = __('Failed purchasing e-mail subject must contain at least 3 characters', 'paiddownloads');
		else if (strlen($this->options['failed_email_subject']) > 64) $errors[] = __('Failed purchasing e-mail subject must contain maximum 64 characters', 'paiddownloads');
		if (strlen($this->options['failed_email_body']) < 3) $errors[] = __('Failed purchasing e-mail body must contain at least 3 characters', 'paiddownloads');
		if (intval($this->options['link_lifetime']) != $this->options['link_lifetime'] || intval($this->options['link_lifetime']) < 1 || intval($this->options['link_lifetime']) > 365) $errors[] = __('Download link lifetime must be valid integer value in range [1...365]', 'paiddownloads');
		if (empty($errors)) return true;
		return $errors;
	}

	function admin_menu() {
		if (get_bloginfo('version') >= 3.0) {
			define("PAID_DOWNLOADS_PERMISSION", "add_users");
		}
		else{
			define("PAID_DOWNLOADS_PERMISSION", "edit_themes");
		}	
		add_menu_page(
			"PDownloads"
			, "PDownloads"
			, PAID_DOWNLOADS_PERMISSION
			, "paid-downloads"
			, array(&$this, 'admin_settings')
		);
		add_submenu_page(
			"paid-downloads"
			, __('Settings', 'paiddownloads')
			, __('Settings', 'paiddownloads')
			, PAID_DOWNLOADS_PERMISSION
			, "paid-downloads"
			, array(&$this, 'admin_settings')
		);
		add_submenu_page(
			"paid-downloads"
			, __('Files', 'paiddownloads')
			, __('Files', 'paiddownloads')
			, PAID_DOWNLOADS_PERMISSION
			, "paid-downloads-files"
			, array(&$this, 'admin_files')
		);
		add_submenu_page(
			"paid-downloads"
			, __('Add File', 'paiddownloads')
			, __('Add File', 'paiddownloads')
			, PAID_DOWNLOADS_PERMISSION
			, "paid-downloads-add"
			, array(&$this, 'admin_add_file')
		);
		add_submenu_page(
			"paid-downloads"
			, __('Temporary Links', 'paiddownloads')
			, __('Temporary Links', 'paiddownloads')
			, PAID_DOWNLOADS_PERMISSION
			, "paid-downloads-links"
			, array(&$this, 'admin_links')
		);
		add_submenu_page(
			"paid-downloads"
			, __('Add Link', 'paiddownloads')
			, __('Add Link', 'paiddownloads')
			, PAID_DOWNLOADS_PERMISSION
			, "paid-downloads-add-link"
			, array(&$this, 'admin_add_link')
		);
		add_submenu_page(
			"paid-downloads"
			, __('Transactions', 'paiddownloads')
			, __('Transactions', 'paiddownloads')
			, PAID_DOWNLOADS_PERMISSION
			, "paid-downloads-transactions"
			, array(&$this, 'admin_transactions')
		);
	}

	function admin_settings() {
		global $wpdb;
		$message = "";
		$errors = array();
		if (!empty($this->error)) $message = "<div class='error'><p>".$this->error."</p></div>";
		else {
			$errors = $this->check_settings();
			if (is_array($errors)) echo "<div class='error'><p>".__('The following error(s) exists:', 'paiddownloads')."<br />- ".implode("<br />- ", $errors)."</p></div>";
		}
		if ($_GET["updated"] == "true") {
			$message = '<div class="updated"><p>'.__('Plugin settings successfully <strong>updated</strong>.', 'paiddownloads').'</p></div>';
		}
		if (!in_array($this->options['buynow_type'], $this->buynow_buttons_list)) $this->options['buynow_type'] = $this->buynow_buttons_list[0];
		if ($this->options['buynow_type'] == "custom")
		{
			if (empty($this->options['buynow_image'])) $this->options['buynow_type'] = $this->buynow_buttons_list[0];
		}
		print ('
		<div class="wrap admin_paiddownloads_wrap">
			<div id="icon-options-general" class="icon32"><br /></div><h2>'.__('Paid Downloads - Settings', 'paiddownloads').'</h2><br /> 
			'.$message);
		if ($this->options['show_donationbox'] != PD_VERSION) {
			print ('
			<div class="postbox-container" style="width: 100%;">
				<div class="metabox-holder">
					<div class="ui-sortable">
						<div class="postbox" style="border: 2px solid green;">
							<div style="float: right; font-size: 13px; font-weight: normal; padding: 7px 10px;" title="'.__('Click to hide this box', 'paiddownloads').'"><a href="'.get_bloginfo("wpurl").'/wp-admin/admin.php?ak_action=paiddownloads_hidedonationbox">'.__('Hide', 'paiddownloads').'</a></div>
							<h3 class="hndle" style="cursor: default; color: green;"><span>'.__('Support further development', 'paiddownloads').'</span></h3>
							<div class="inside">
								'.__('You are happy with this plugin and want to help make it even better? Donate small amount and support further development. All donations are used to improve this plugin!', 'paiddownloads').'
								<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" style="margin: 0px; padding: 0px;">
									<input type="hidden" name="cmd" value="_s-xclick">
									<input type="hidden" name="hosted_button_id" value="NKVRNX9JA5VSG">
									<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
									<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
								</form>
								'.__('Please also try <a href="http://codecanyon.net/item/paid-downloads-pro/2081656?ref=ichurakov">Paid Downloads Pro</a>. It allows to accept payments through PayPal, Payza/AlertPay, Skrill/Moneybookers, InterKassa, Autorize.Net, 2Checkout, EgoPay and Liberty Reserve. It also has option to remove payment transactions and send huge files through x_sendfile module.', 'paiddownloads').'
							</div>
						</div>
					</div>
				</div>
			</div>');
		}
		print ('
			<form enctype="multipart/form-data" method="post" style="margin: 0px" action="'.get_bloginfo('wpurl').'/wp-admin/admin.php">
			
			<div class="postbox-container" style="width: 100%;">
				<div class="metabox-holder">
					<div class="meta-box-sortables ui-sortable">
						<div class="postbox">
							<!--<div class="handlediv" title="Click to toggle"><br></div>-->
							<h3 class="hndle" style="cursor: default;"><span>'.__('General Settings', 'paiddownloads').'</span></h3>
							<div class="inside">
								<table class="paiddownloads_useroptions">
									<tr>
										<th>'.__('E-mail for notifications', 'paiddownloads').':</th>
										<td><input type="text" id="paiddownloads_seller_email" name="paiddownloads_seller_email" value="'.htmlspecialchars($this->options['seller_email'], ENT_QUOTES).'" class="widefat"><br /><em>'.__('Please enter e-mail address. All alerts about completed/failed payments are sent to this e-mail address.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('Sender name', 'paiddownloads').':</th>
										<td><input type="text" id="paiddownloads_from_name" name="paiddownloads_from_name" value="'.htmlspecialchars($this->options['from_name'], ENT_QUOTES).'" class="widefat"><br /><em>'.__('Please enter sender name. All messages to buyers are sent using this name as "FROM:" header value.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('Sender e-mail', 'paiddownloads').':</th>
										<td><input type="text" id="paiddownloads_from_email" name="paiddownloads_from_email" value="'.htmlspecialchars($this->options['from_email'], ENT_QUOTES).'" class="widefat"><br /><em>'.__('Please enter sender e-mail. All messages to buyers are sent using this e-mail as "FROM:" header value.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('Successful purchasing e-mail subject', 'paiddownloads').':</th>
										<td><input type="text" id="paiddownloads_success_email_subject" name="paiddownloads_success_email_subject" value="'.htmlspecialchars($this->options['success_email_subject'], ENT_QUOTES).'" class="widefat"><br /><em>'.__('In case of successful and cleared payment, your customers receive e-mail message about successful purchasing. This is subject field of the message.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('Successful purchasing e-mail body', 'paiddownloads').':</th>
										<td><textarea id="paiddownloads_success_email_body" name="paiddownloads_success_email_body" class="widefat" style="height: 120px;">'.htmlspecialchars($this->options['success_email_body'], ENT_QUOTES).'</textarea><br /><em>'.__('This e-mail message is sent to your customers in case of successful and cleared payment. You can use the following keywords: {first_name}, {last_name}, {payer_email}, {product_title}, {product_price}, {product_currency}, {download_link}, {download_link_lifetime}, {license_info}.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('Non-verified payers', 'paiddownloads').':</th>
										<td><input type="checkbox" id="paiddownloads_handle_unverified" name="paiddownloads_handle_unverified" '.($this->options['handle_unverified'] == "on" ? 'checked="checked"' : '').'> Handle non-verified payers<br /><em>'.__('In case this option enabled, you can set different <strong>successful purchasing e-mail body</strong> for non-verified payers.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('Successful purchasing e-mail body (for non-verified payers)', 'paiddownloads').':</th>
										<td><textarea id="paiddownloads_success_email_body_unverified" name="paiddownloads_success_email_body_unverified" class="widefat" style="height: 120px;">'.htmlspecialchars($this->options['success_email_body_unverified'], ENT_QUOTES).'</textarea><br /><em>'.__('This e-mail message is sent to your customers in case of successful and cleared payment in case if they paid using non-verified PayPal account. You can use the following keywords: {first_name}, {last_name}, {payer_email}, {product_title}, {product_price}, {product_currency}.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('Failed purchasing e-mail subject', 'paiddownloads').':</th>
										<td><input type="text" id="paiddownloads_failed_email_subject" name="paiddownloads_failed_email_subject" value="'.htmlspecialchars($this->options['failed_email_subject'], ENT_QUOTES).'" class="widefat"><br /><em>'.__('In case of pending, non-cleared or fake payment, your customers receive e-mail message about that. This is subject field of the message.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('Failed purchasing e-mail body', 'paiddownloads').':</th>
										<td><textarea id="paiddownloads_failed_email_body" name="paiddownloads_failed_email_body" class="widefat" style="height: 120px;">'.htmlspecialchars($this->options['failed_email_body'], ENT_QUOTES).'</textarea><br /><em>'.__('This e-mail message is sent to your customers in case of pending, non-cleared or fake payment. You can use the following keywords: {first_name}, {last_name}, {payer_email}, {product_title}, {product_price}, {product_currency}, {payment_status}.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('Download link lifetime', 'paiddownloads').':</th>
										<td><input type="text" id="paiddownloads_link_lifetime" name="paiddownloads_link_lifetime" value="'.htmlspecialchars($this->options['link_lifetime'], ENT_QUOTES).'" style="width: 60px; text-align: right;"> days<br /><em>'.__('Please enter period of download link validity.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('"Buy Now" button', 'paiddownloads').':</th>
										<td>
											<table style="border: 0px; padding: 0px;">
											<tr><td style="padding-top: 8px; width: 20px;"><input type="radio" name="paiddownloads_buynow_type" value="html"'.($this->options['buynow_type'] == "html" ? ' checked="checked"' : '').'></td><td>'.__('Standard HTML-button', 'paiddownloads').'<br /><button onclick="return false;">'.__('Buy Now', 'paiddownloads').'</button></td></tr>
											<tr><td style="padding-top: 8px;"><input type="radio" name="paiddownloads_buynow_type" value="paypal"'.($this->options['buynow_type'] == "paypal" ? ' checked="checked"' : '').'></td><td>'.__('Standard PayPal button', 'paiddownloads').'<br /><img src="'.plugins_url('/images/btn_buynow_LG.gif', __FILE__).'" border="0"></td></tr>
											<tr><td style="padding-top: 8px;"><input type="radio" name="paiddownloads_buynow_type" value="css3"'.($this->options['buynow_type'] == "css3" ? ' checked="checked"' : '').'></td><td>'.__('CSS3 button', 'paiddownloads').'<br />
											<a href="#" class="paiddownloads-btn" onclick="return false;">
												<span class="paiddownloads-btn-text">'.__('Buy Now', 'paiddownloads').'</span>
												<span class="paiddownloads-btn-slide-text">29.95 USD</span>
												<span class="paiddownloads-btn-icon-right"><span></span></span>
											</a>
											</td></tr>
											<tr><td style="padding-top: 8px;"><input type="radio" name="paiddownloads_buynow_type" value="custom"'.($this->options['buynow_type'] == "custom" ? ' checked="checked"' : '').'></td><td>'.__('Custom "Buy Now" button', 'paiddownloads').(!empty($this->options['buynow_image']) ? '<br /><img src="'.get_bloginfo("wpurl").'/wp-content/uploads/paid-downloads/'.rawurlencode($this->options['buynow_image']).'" border="0">' : '').'<br /><input type="file" id="paiddownloads_buynow_image" name="paiddownloads_buynow_image" class="widefat"><br /><em>'.__('Max dimensions: 600px x 600px, allowed images: JPG, GIF, PNG.', 'paiddownloads').'</em></td></tr>
											</table>
										</td>
									</tr>
									<tr>
										<th>'.__('Terms & Conditions', 'paiddownloads').':</th>
										<td><textarea id="paiddownloads_terms" name="paiddownloads_terms" class="widefat" style="height: 120px;">'.htmlspecialchars($this->options['terms'], ENT_QUOTES).'</textarea><br /><em>'.__('Your customers must be agree with Terms & Conditions before purchasing. Leave this field blank if you do not need Terms & Conditions box to be shown.', 'paiddownloads').'</em></td>
									</tr>
								</table>
								<div class="alignright">
								<input type="hidden" name="ak_action" value="paiddownloads_update_settings" />
								<input type="hidden" name="paiddownloads_exists" value="1" />
								<input type="submit" class="paiddownoads_button button-primary" name="submit" value="'.__('Update Settings', 'paiddownloads').' »">
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="postbox">
							<!--<div class="handlediv" title="Click to toggle"><br></div>-->
							<h3 class="hndle" style="cursor: default;"><span>'.__('PayPal Settings', 'paiddownloads').'</span></h3>
							<div class="inside">
								<table class="paiddownloads_useroptions">
									<tr>
										<th>'.__('Enable', 'paiddownloads').':</th>
										<td><input type="checkbox" id="paiddownloads_enable_paypal" name="paiddownloads_enable_paypal" '.($this->options['enable_paypal'] == "on" ? 'checked="checked"' : '').'"> '.__('Accept payments via PayPal', 'paiddownloads').'<br /><em>'.__('Please tick checkbox if you would like to accept payments via PayPal.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('PayPal ID', 'paiddownloads').':</th>
										<td><input type="text" id="paiddownloads_paypal_id" name="paiddownloads_paypal_id" value="'.htmlspecialchars($this->options['paypal_id'], ENT_QUOTES).'" class="widefat"><br /><em>'.__('Please enter valid PayPal e-mail or <a href="https://www.paypal.com/webapps/customerprofile/summary.view" traget="_blank">Merchant ID</a>, all payments are sent to this account.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('Enable shipping address', 'paiddownloads').':</th>
										<td><input type="checkbox" id="paiddownloads_paypal_address" name="paiddownloads_paypal_address" '.($this->options['paypal_address'] == "on" ? 'checked="checked"' : '').'> '.__('Include shipping address into transaction', 'paiddownloads').'<br /><em>'.__('Activate this option if you plan to send physical copy of your downloadable product (CD, DVD, etc.). Shipping address is taken from payer PayPal account. You can view shipping address at transaction details page.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('Sandbox mode', 'paiddownloads').':</th>
										<td><input type="checkbox" id="paiddownloads_paypal_sandbox" name="paiddownloads_paypal_sandbox" '.($this->options['paypal_sandbox'] == "on" ? 'checked="checked"' : '').'> '.__('Enable PayPal sandbox mode', 'paiddownloads').'<br /><em>'.__('Please tick checkbox if you would like to test PayPal service.', 'paiddownloads').'</em></td>
									</tr>
								</table>
								<div class="alignright">
									<input type="submit" class="paiddownoads_button button-primary" name="submit" value="'.__('Update Settings', 'paiddownloads').' »">
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="postbox">
							<!--<div class="handlediv" title="Click to toggle"><br></div>-->
							<h3 class="hndle" style="cursor: default;"><span>'.__('AlertPay Settings', 'paiddownloads').' (BETA)</span></h3>
							<div class="inside">
								<table class="paiddownloads_useroptions">
									<tr><th colspan="2">'.(!in_array('curl', get_loaded_extensions()) ? __('Please enable CURL on your server to use AlertPay payment method!', 'paiddownloads') : __('IMPORTANT! Set "IPN Status" as "Enabled" on <a target="_blank" href="https://www.alertpay.com/ManageIPN.aspx">AlertPay IPN Setup</a> page.', 'paiddownloads')).'</th></tr>
									<tr>
										<th>'.__('Enable', 'paiddownloads').':</th>
										<td><input type="checkbox" id="paiddownloads_enable_alertpay" name="paiddownloads_enable_alertpay" '.($this->options['enable_alertpay'] == "on" ? 'checked="checked"' : '').(!in_array('curl', get_loaded_extensions()) ? ' disabled="disabled"' : '').'> '.__('Accept payments via AlertPay', 'paiddownloads').'<br /><em>'.__('Please tick checkbox if you would like to accept payments via AlertPay.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('AlertPay ID', 'paiddownloads').':</th>
										<td><input type="text" id="paiddownloads_alertpay_id" name="paiddownloads_alertpay_id" value="'.htmlspecialchars($this->options['alertpay_id'], ENT_QUOTES).'" class="widefat"'.(!in_array('curl', get_loaded_extensions()) ? ' disabled="disabled"' : '').'><br /><em>'.__('Please enter valid AlertPay e-mail, all payments are sent to this account.', 'paiddownloads').'</em></td>
									</tr>
								</table>
								<div class="alignright">
									<input type="submit" class="paiddownoads_button button-primary" name="submit" value="'.__('Update Settings', 'paiddownloads').' »">
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="postbox">
							<!--<div class="handlediv" title="Click to toggle"><br></div>-->
							<h3 class="hndle" style="cursor: default;"><span>'.__('InterKassa Settings', 'paiddownloads').' (BETA)</span></h3>
							<div class="inside">
								<table class="paiddownloads_useroptions">
									<tr><th colspan="2">'.(!in_array('curl', get_loaded_extensions()) ? __('Please enable CURL on your server to use InterKassa payment method!', 'paiddownloads') : __('IMPORTANT! Register your shop on <a target="_blank" href="https://interkassa.com/managment.php">InterKassa Shop Management</a> page.', 'paiddownloads')).'</th></tr>
									<tr>
										<th>'.__('Enable', 'paiddownloads').':</th>
										<td><input type="checkbox" id="paiddownloads_enable_interkassa" name="paiddownloads_enable_interkassa" '.($this->options['enable_interkassa'] == "on" ? 'checked="checked"' : '').(!in_array('curl', get_loaded_extensions()) ? ' disabled="disabled"' : '').'> '.__('Accept payments via InterKassa', 'paiddownloads').'<br /><em>'.__('Please tick checkbox if you would like to accept payments via InterKassa.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('Shop ID', 'paiddownloads').':</th>
										<td><input type="text" id="paiddownloads_interkassa_shop_id" name="paiddownloads_interkassa_shop_id" value="'.htmlspecialchars($this->options['interkassa_shop_id'], ENT_QUOTES).'" class="widefat"'.(!in_array('curl', get_loaded_extensions()) ? ' disabled="disabled"' : '').'><br /><em>'.__('Please enter valid InterKassa shop ID. Ex.: 64C18529-4B94-0B5D-7405-F2752F2B716C', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('Currency', 'paiddownloads').':</th>
										<td>
											<select name="paiddownloads_interkassa_currency" id="paiddownloads_interkassa_currency"'.(!in_array('curl', get_loaded_extensions()) ? ' disabled="disabled"' : '').'>');
		for ($i=0; $i<sizeof($this->interkassa_currency_list); $i++)
		{
			echo '
												<option value="'.$this->interkassa_currency_list[$i].'"'.($this->interkassa_currency_list[$i] == $this->options['interkassa_currency'] ? ' selected="selected"' : '').'>'.$this->interkassa_currency_list[$i].'</option>';
		}
		print('								
											</select>
											<br /><em>'.__('Set the currency of InterKassa shop. You can get it on <a target="_blank" href="https://interkassa.com/managment.php">shop settings</a> page. If this currency differs from currency of product, product price is converted into this currency.', 'paiddownloads').'</em>
										</td>
									</tr>

									<tr>
										<th>'.__('Secret Key', 'paiddownloads').':</th>
										<td><input type="text" id="paiddownloads_interkassa_secret_key" name="paiddownloads_interkassa_secret_key" value="'.htmlspecialchars($this->options['interkassa_secret_key'], ENT_QUOTES).'" class="widefat"'.(!in_array('curl', get_loaded_extensions()) ? ' disabled="disabled"' : '').'><br /><em>'.__('Please enter Secret Key. You can get it on <a target="_blank" href="https://interkassa.com/managment.php">shop settings</a> page.', 'paiddownloads').'</em></td>
									</tr>
								</table>
								<div class="alignright">
									<input type="submit" class="paiddownoads_button button-primary" name="submit" value="'.__('Update Settings', 'paiddownloads').' »">
								</div>
								<br class="clear">
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>');
	}

	function admin_files() {
		global $wpdb;

		if (isset($_GET["s"])) $search_query = trim(stripslashes($_GET["s"]));
		else $search_query = "";
		
		$tmp = $wpdb->get_row("SELECT COUNT(*) AS total FROM ".$wpdb->prefix."pd_files WHERE deleted = '0'".((strlen($search_query) > 0) ? " filename_original LIKE '%".addslashes($search_query)."%' OR title LIKE '%".addslashes($search_query)."%'" : ""), ARRAY_A);
		$total = $tmp["total"];
		$totalpages = ceil($total/PD_RECORDS_PER_PAGE);
		if ($totalpages == 0) $totalpages = 1;
		if (isset($_GET["p"])) $page = intval($_GET["p"]);
		else $page = 1;
		if ($page < 1 || $page > $totalpages) $page = 1;
		$switcher = $this->page_switcher(get_bloginfo("wpurl")."/wp-admin/admin.php?page=paid-downloads-files".((strlen($search_query) > 0) ? "&s=".rawurlencode($search_query) : ""), $page, $totalpages);

		$sql = "SELECT * FROM ".$wpdb->prefix."pd_files WHERE deleted = '0'".((strlen($search_query) > 0) ? " filename_original LIKE '%".addslashes($search_query)."%' OR title LIKE '%".addslashes($search_query)."%'" : "")." ORDER BY registered DESC LIMIT ".(($page-1)*PD_RECORDS_PER_PAGE).", ".PD_RECORDS_PER_PAGE;
		$rows = $wpdb->get_results($sql, ARRAY_A);
		if (!empty($this->error)) $message = "<div class='error'><p>".$this->error."</p></div>";
		if (!empty($this->info)) $message = "<div class='updated'><p>".$this->info."</p></div>";

		print ('
			<div class="wrap admin_paiddownloads_wrap">
				<div id="icon-upload" class="icon32"><br /></div><h2>'.__('Paid Downloads - Files', 'paiddownloads').'</h2><br />
				'.$message.'
				<form action="'.get_bloginfo("wpurl").'/wp-admin/admin.php" method="get" style="margin-bottom: 10px;">
				<input type="hidden" name="page" value="paid-downloads-files" />
				'.__('Search:', 'paiddownloads').' <input type="text" name="s" value="'.htmlspecialchars($search_query, ENT_QUOTES).'">
				<input type="submit" class="button-secondary action" value="'.__('Search', 'paiddownloads').'" />
				'.((strlen($search_query) > 0) ? '<input type="button" class="button-secondary action" value="'.__('Reset search results', 'paiddownloads').'" onclick="window.location.href=\''.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-files\';" />' : '').'
				</form>
				<div class="paiddownloads_buttons"><a class="button" href="'.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-add">'.__('Upload New File', 'paiddownloads').'</a></div>
				<div class="paiddownloads_pageswitcher">'.$switcher.'</div>
				<table class="paiddownloads_files">
				<tr>
					<th>'.__('File', 'paiddownloads').'</th>
					<th style="width: 190px;">'.__('Short Code', 'paiddownloads').'</th>
					<th style="width: 90px;">'.__('Price', 'paiddownloads').'</th>
					<th style="width: 90px;">'.__('Sales', 'paiddownloads').'</th>
					<th style="width: 130px;">'.__('Operations', 'paiddownloads').'</th>
				</tr>
		');
		if (sizeof($rows) > 0)
		{
			foreach ($rows as $row)
			{
				$sql = "SELECT COUNT(id) AS sales FROM ".$wpdb->prefix."pd_transactions WHERE file_id = '".$row["id"]."' AND (payment_status = 'Completed' OR payment_status = 'Success')";
				$sales = $wpdb->get_row($sql, ARRAY_A);
				print ('
				<tr>
					<td><strong>'.$row['title'].'</strong><br /><em style="font-size: 12px; line-height: 14px;">'.htmlspecialchars($row['filename_original'], ENT_QUOTES).'</em></td>
					<td>[paiddownloads id="'.$row['id'].'"]</td>
					<td style="text-align: right;">'.number_format($row['price'],2).' '.$row['currency'].'</td>
					<td style="text-align: right;">'.intval($sales["sales"]).' / '.(($row['available_copies'] == 0) ? '&infin;' : $row['available_copies']).'</td>
					<td style="text-align: center;">
						<a href="'.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-add&id='.$row['id'].'" title="'.__('Edit file details', 'paiddownloads').'"><img src="'.plugins_url('/images/edit.png', __FILE__).'" alt="'.__('Edit file details', 'paiddownloads').'" border="0"></a>
						<a href="'.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-add-link&fid='.$row['id'].'" title="'.__('Generate temporary download link', 'paiddownloads').'"><img src="'.plugins_url('/images/downloadlink.png', __FILE__).'" alt="'.__('Generate temporary download link', 'paiddownloads').'" border="0"></a>
						<a href="'.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-links&fid='.$row['id'].'" title="'.__('Issued download links', 'paiddownloads').'"><img src="'.plugins_url('/images/linkhistory.png', __FILE__).'" alt="'.__('Issued download links', 'paiddownloads').'" border="0"></a>
						<a href="'.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-transactions&fid='.$row['id'].'" title="'.__('Payment transactions', 'paiddownloads').'"><img src="'.plugins_url('/images/transactions.png', __FILE__).'" alt="'.__('Payment transactions', 'paiddownloads').'" border="0"></a>
						<a href="'.get_bloginfo("wpurl").'/?paiddownloads_id='.$row['id'].'" title="'.__('Download file', 'paiddownloads').'"><img src="'.plugins_url('/images/download01.png', __FILE__).'" alt="'.__('Download file', 'paiddownloads').'" border="0"></a>
						<a href="'.get_bloginfo("wpurl").'/wp-admin/admin.php?ak_action=paiddownloads_delete&id='.$row['id'].'" title="'.__('Delete file', 'paiddownloads').'" onclick="return paiddownloads_submitOperation();"><img src="'.plugins_url('/images/delete.png', __FILE__).'" alt="'.__('Delete file', 'paiddownloads').'" border="0"></a>
					</td>
				</tr>
				');
			}
		}
		else
		{
			print ('
				<tr><td colspan="5" style="padding: 20px; text-align: center;">'.((strlen($search_query) > 0) ? __('No results found for', 'paiddownloads').' "<strong>'.htmlspecialchars($search_query, ENT_QUOTES).'</strong>"' : __('List is empty.', 'paiddownloads')).'</td></tr>
			');
		}
		print ('
				</table>
				<div class="paiddownloads_buttons"><a class="button" href="'.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-add">'.__('Upload New File', 'paiddownloads').'</a></div>
				<div class="paiddownloads_pageswitcher">'.$switcher.'</div>
				<div class="paiddownloads_legend">
				<strong>'.__('Legend:', 'paiddownloads').'</strong>
					<p><img src="'.plugins_url('/images/edit.png', __FILE__).'" alt="'.__('Edit file details', 'paiddownloads').'" border="0"> '.__('Edit file details', 'paiddownloads').'</p>
					<p><img src="'.plugins_url('/images/downloadlink.png', __FILE__).'" alt="'.__('Generate temporary download link', 'paiddownloads').'" border="0"> '.__('Generate temporary download link', 'paiddownloads').'</p>
					<p><img src="'.plugins_url('/images/linkhistory.png', __FILE__).'" alt="'.__('Issued download links', 'paiddownloads').'" border="0"> '.__('Show issued download links', 'paiddownloads').'</p>
					<p><img src="'.plugins_url('/images/transactions.png', __FILE__).'" alt="'.__('Payment transactions', 'paiddownloads').'" border="0"> '.__('Show payment transactions', 'paiddownloads').'</p>
					<p><img src="'.plugins_url('/images/download01.png', __FILE__).'" alt="'.__('Download file', 'paiddownloads').'" border="0"> '.__('Download file', 'paiddownloads').'</p>
					<p><img src="'.plugins_url('/images/delete.png', __FILE__).'" alt="'.__('Delete file', 'paiddownloads').'" border="0"> '.__('Delete file', 'paiddownloads').'</p>
				</div>
			</div>
		');
	}

	function admin_add_file() {
		global $wpdb;

		unset($id);
		$status = "";
		if (isset($_GET["id"]) && !empty($_GET["id"])) {
			$id = intval($_GET["id"]);
			$file_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."pd_files WHERE id = '".$id."' AND deleted = '0'", ARRAY_A);
			if (intval($file_details["id"]) == 0) unset($id);
		}
		$errors = true;
		if (!empty($this->error)) $message = "<div class='error'><p>".$this->error."</p></div>";
		else if (!empty($this->info)) $message = "<div class='updated'><p>".$this->info."</p></div>";

		$file = array();
		if (file_exists(ABSPATH.'wp-content/uploads/paid-downloads/files') && is_dir(ABSPATH.'wp-content/uploads/paid-downloads/files')) {
			$dircontent = scandir(ABSPATH.'wp-content/uploads/paid-downloads/files');
			for ($i=0; $i<sizeof($dircontent); $i++) {
				if ($dircontent[$i] != "." && $dircontent[$i] != ".." && $dircontent[$i] != "index.html" && $dircontent[$i] != ".htaccess") {
					if (is_file(ABSPATH.'wp-content/uploads/paid-downloads/files/'.$dircontent[$i])) {
						$files[] = $dircontent[$i];
					}
				}
			}
		}
		print ('
		<div class="wrap admin_paiddownloads_wrap">
			<div id="icon-options-general" class="icon32"><br /></div><h2>'.(!empty($id) ? __('Paid Downloads - Edit file', 'paiddownloads') : __('Paid Downloads - Upload new file', 'paiddownloads')).'</h2>
			'.$message.'
			<form enctype="multipart/form-data" method="post" style="margin: 0px" action="'.get_bloginfo('wpurl').'/wp-admin/admin.php">
			<div class="postbox-container" style="width: 100%;">
				<div class="metabox-holder">
					<div class="meta-box-sortables ui-sortable">
						<div class="postbox">
							<!--<div class="handlediv" title="Click to toggle"><br></div>-->
							<h3 class="hndle" style="cursor: default;"><span>'.(!empty($id) ? __('Edit file', 'paiddownloads') : __('Upload new file', 'paiddownloads')).'</span></h3>
							<div class="inside">
								<table class="paiddownloads_useroptions">
									<tr>
										<th>'.__('Title', 'paiddownloads').':</th>
										<td><input type="text" name="paiddownloads_title" id="paiddownloads_title" value="'.htmlspecialchars($file_details['title'], ENT_QUOTES).'" class="widefat"><br /><em>'.__('Enter the title of file. If you leave this field blank, then original file name will be the title.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('File', 'paiddownloads').':</th>
										<td>
											<select name="paiddownloads_fileselector" id="paiddownloads_fileselector">
												<option value="">-- '.__('Select available file', 'paiddownloads').' --</option>');
		for ($i=0; $i<sizeof($files); $i++)
		{
			echo '
												<option value="'.htmlspecialchars($files[$i], ENT_QUOTES).'"'.($files[$i] == $file_details['filename'] ? ' selected="selected"' : '').'>'.htmlspecialchars($files[$i], ENT_QUOTES).'</option>';
		}
		print('
											</select><br /><em>'.__('Select any available file from folder <strong>/wp-content/uploads/paid-downloads/files/</strong> or upload new file below.', 'paiddownloads').'</em><br /><br />
											<input type="file" name="paiddownloads_file" id="paiddownloads_file" class="widefat"><br /><em>'.__('Choose file to upload.', 'paiddownloads').'</em>
										</td>
									</tr>
									<tr>
										<th>'.__('Price', 'paiddownloads').':</th>
										<td>
											<input type="text" name="paiddownloads_price" id="paiddownloads_price" value="'.(!empty($id) ? number_format($file_details['price'], 2, '.', '') : '0.00').'" style="width: 80px; text-align: right;">
											<select name="paiddownloads_currency" id="paiddownloads_currency" onchange="paiddownloads_supportedmethods();">');
		foreach ($this->currency_list as $currency) {
			echo '
												<option value="'.$currency.'"'.($currency == $file_details['currency'] ? ' selected="selected"' : '').'>'.$currency.'</option>';
		}
		print('								
											</select>
											<label id="paiddownloads_supported" style="color: green;"></label>
											<br /><em>'.__('Set the price of file or leave this field blank (or set 0) for free downloading.', 'paiddownloads').'</em>
										</td>
									</tr>
									<tr>
										<th>'.__('Available copies', 'paiddownloads').':</th>
										<td><input type="text" name="paiddownloads_available_copies" id="paiddownloads_available_copies" value="'.(!empty($id) ? intval($file_details['available_copies']) : '0').'" style="width: 80px; text-align: right;"><br /><em>'.__('Set how many copies of the file you would like to sell. After selling this number of copies, "Buy now" button for the file will not be displayed. Leave this field blank (or set 0) if you wish to sell unlimited number of copies. This field is ignored if you distribute the file freely.', 'paiddownloads').'</em></td>
									</tr>
									<tr>
										<th>'.__('License URL', 'paiddownloads').':</th>
										<td><input type="text" name="paiddownloads_license_url" id="paiddownloads_license_url" value="'.htmlspecialchars($file_details['license_url'], ENT_QUOTES).'" class="widefat"'.(!in_array('curl', get_loaded_extensions()) ? ' readonly="readonly"' : '').'><br /><em>'.__('This URL is used to generate license information for sold files (if required). After successfull payment PayPal/AlertPay IPN data might be POST-ed to this URL. All returned content is included into <strong>successfull purchasing e-mail body</strong> under {license_info} keyword. Leave this field blank if you do not need to generate license info. This field is only available if CURL installed on your server.', 'paiddownloads').'</em></td>
									</tr>
								</table>
								<div class="alignright">
								<input type="hidden" name="ak_action" value="paiddownloads_update_file" />
								'.(!empty($id) ? '<input type="hidden" name="paiddownloads_id" value="'.$id.'" />' : '').'
								<input type="submit" class="paiddownoads_button button-primary" name="submit" value="'.__('Submit details', 'paiddownloads').' »">
								</div>
								<br class="clear">
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<script type="text/javascript">
				function paiddownloads_supportedmethods() {
					var paypal_currencies = new Array("'.implode('", "', $this->paypal_currency_list).'");
					var alertpay_currencies = new Array("'.implode('", "', $this->alertpay_currency_list).'");
					var currency = jQuery("#paiddownloads_currency").val();
					var supported = "";
					if (jQuery.inArray(currency, paypal_currencies) >= 0) supported = "PayPal, ";
					if (jQuery.inArray(currency, alertpay_currencies) >=0) supported = supported + "AlertPay, ";
					supported = supported + "InterKassa";
					jQuery("#paiddownloads_supported").html("'.__('Supported payment methods:', 'paiddownloads').' " + supported);
				}
				paiddownloads_supportedmethods();
			</script>			
		</div>');
	}

	function admin_links() {
		global $wpdb;

		if (isset($_GET["fid"])) $file_id = intval(trim(stripslashes($_GET["fid"])));
		else $file_id = 0;
		
		$tmp = $wpdb->get_row("SELECT COUNT(*) AS total FROM ".$wpdb->prefix."pd_downloadlinks WHERE deleted = '0'".($file_id > 0 ? " AND file_id = '".$file_id."'" : ""), ARRAY_A);
		$total = $tmp["total"];
		$totalpages = ceil($total/PD_RECORDS_PER_PAGE);
		if ($totalpages == 0) $totalpages = 1;
		if (isset($_GET["p"])) $page = intval($_GET["p"]);
		else $page = 1;
		if ($page < 1 || $page > $totalpages) $page = 1;
		$switcher = $this->page_switcher(get_bloginfo("wpurl")."/wp-admin/admin.php?page=paid-downloads-links".($file_id > 0 ? '&fid='.$file_id : ''), $page, $totalpages);

		$sql = "SELECT t1.*, t2.title AS file_title FROM ".$wpdb->prefix."pd_downloadlinks t1 LEFT JOIN ".$wpdb->prefix."pd_files t2 ON t2.id = t1.file_id WHERE t1.deleted = '0'".($file_id > 0 ? " AND file_id = '".$file_id."'" : "")." ORDER BY t1.created DESC LIMIT ".(($page-1)*PD_RECORDS_PER_PAGE).", ".PD_RECORDS_PER_PAGE;
		$rows = $wpdb->get_results($sql, ARRAY_A);
		if (!empty($this->error)) $message = "<div class='error'><p>".$this->error."</p></div>";
		if (!empty($this->info)) $message = "<div class='updated'><p>".$this->info."</p></div>";

		print ('
			<div class="wrap admin_paiddownloads_wrap">
				<div id="icon-upload" class="icon32"><br /></div><h2>'.__('Paid Downloads - Temporary Links', 'paiddownloads').'</h2><br />
				'.$message.'
				<div class="paiddownloads_buttons"><a class="button" href="'.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-add-link'.($file_id > 0 ? '&fid='.$file_id : '').'">'.__('Add New Link', 'paiddownloads').'</a></div>
				<div class="paiddownloads_pageswitcher">'.$switcher.'</div>
				<table class="paiddownloads_files">
				<tr>
					<th>'.__('Download Link', 'paiddownloads').'</th>
					<th style="width: 160px;">'.__('Owner', 'paiddownloads').'</th>
					<th style="width: 160px;">'.__('File', 'paiddownloads').'</th>
					<th style="width: 80px;">'.__('Source', 'paiddownloads').'</th>
					<th style="width: 50px;">'.__('Delete', 'paiddownloads').'</th>
				</tr>
		');
		if (sizeof($rows) > 0)
		{
			foreach ($rows as $row)
			{
				if (time() <= $row["created"] + 24*3600*$this->options['link_lifetime']) {
					$expired = "Expires in ".$this->period_to_string($row["created"] + 24*3600*$this->options['link_lifetime'] - time());
					$bg_color = "#FFFFFF";
				} else {
					$expired = "";
					$bg_color = "#F0F0F0";
				}
				print ('
				<tr style="background-color: '.$bg_color .';">
					<td><input type="text" class="widefat" onclick="this.focus();this.select();" readonly="readonly" value="'.get_bloginfo('wpurl').'/?paiddownloads_key='.$row["download_key"].'">'.(!empty($expired) ? '<br /><em>'.$expired.'</em>' : '').'</td>
					<td>'.htmlspecialchars($row['owner'], ENT_QUOTES).'</td>
					<td>'.(!empty($row['file_title']) ? htmlspecialchars($row['file_title'], ENT_QUOTES) : '-').'</td>
					<td>'.htmlspecialchars($row['source'], ENT_QUOTES).'</td>
					<td style="text-align: center;">
						<a href="'.get_bloginfo("wpurl").'/wp-admin/admin.php?ak_action=paiddownloads_delete_link&id='.$row['id'].'" title="'.__('Delete download link', 'paiddownloads').'" onclick="return paiddownloads_submitOperation();"><img src="'.plugins_url('/images/delete.png', __FILE__).'" alt="'.__('Delete download link', 'paiddownloads').'" border="0"></a>
					</td>
				</tr>
				');
			}
		}
		else
		{
			print ('
				<tr><td colspan="5" style="padding: 20px; text-align: center;">'.__('List is empty.', 'paiddownloads').'</td></tr>
			');
		}
		print ('
				</table>
				<div class="paiddownloads_buttons"><a class="button" href="'.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-add-link'.($file_id > 0 ? '&fid='.$file_id : '').'">'.__('Add New Link', 'paiddownloads').'</a></div>
				<div class="paiddownloads_pageswitcher">'.$switcher.'</div>
				<div class="paiddownloads_legend">
				<strong>'.__('Legend:', 'paiddownloads').'</strong>
					<p><img src="'.plugins_url('/images/delete.png', __FILE__).'" alt="'.__('Delete download link', 'paiddownloads').'" border="0"> '.__('Delete download link', 'paiddownloads').'</p>
					<br />
					<div style="width: 14px; height: 14px; float: left; border: 1px solid #CCC; margin: 0px 10px 0px 0px; background-color: #FFFFFF;""></div> '.__('Active link', 'paiddownloads').'<br />
					<div style="width: 14px; height: 14px; float: left; border: 1px solid #CCC; margin: 0px 10px 0px 0px; background-color: #F0F0F0;"></div> '.__('Expired link', 'paiddownloads').'<br />
				</div>
			</div>
		');
	}

	function admin_add_link() {
		global $wpdb;

		if (isset($_GET["fid"])) $file_id = intval(trim(stripslashes($_GET["fid"])));
		else $file_id = 0;
		
		if (!empty($this->error)) $message = "<div class='error'><p>".$this->error."</p></div>";
		else if (!empty($this->info)) $message = "<div class='updated'><p>".$this->info."</p></div>";

		$sql = "SELECT * FROM ".$wpdb->prefix."pd_files WHERE deleted = '0' ORDER BY registered DESC";
		$files = $wpdb->get_results($sql, ARRAY_A);
		if (empty($files)) {
			print ('
			<div class="wrap admin_paiddownloads_wrap">
				<div id="icon-options-general" class="icon32"><br /></div><h2>'.__('Paid Downloads - Add temporary link', 'paiddownloads').'</h2>
				<div class="error"><p>'.__('Please uplad at least one file first.', 'paiddownloads').'</p></div>
			</div>');
			return;
		}

		print ('
		<div class="wrap admin_paiddownloads_wrap">
			<div id="icon-options-general" class="icon32"><br /></div><h2>'.__('Paid Downloads - Add temporary link', 'paiddownloads').'</h2>
			'.$message.'
			<form enctype="multipart/form-data" method="post" style="margin: 0px" action="'.get_bloginfo('wpurl').'/wp-admin/admin.php">
			<div class="postbox-container" style="width: 100%;">
				<div class="metabox-holder">
					<div class="meta-box-sortables ui-sortable">
						<div class="postbox">
							<!--<div class="handlediv" title="Click to toggle"><br></div>-->
							<h3 class="hndle" style="cursor: default;"><span>'.__('Add temporary link', 'paiddownloads').'</span></h3>
							<div class="inside">
								<table class="paiddownloads_useroptions">
									<tr>
										<th>'.__('File', 'paiddownloads').':</th>
										<td>
											<select name="paiddownloads_fileselector" id="paiddownloads_fileselector">
												<option value="">-- '.__('Select file', 'paiddownloads').' --</option>');
		foreach ($files as $file)
		{
			echo '
												<option value="'.$file["id"].'"'.($file["id"] == $file_id ? 'selected="selected"' : '').'>'.htmlspecialchars($file["title"], ENT_QUOTES).'</option>';
		}
		print('
											</select><br /><em>'.__('Select any uploaded file.', 'paiddownloads').'</em>
										</td>
									</tr>
									<tr>
										<th>'.__('Link owner', 'paiddownloads').':</th>
										<td><input type="text" name="paiddownloads_link_owner" id="paiddownloads_link_owner" value="" style="width: 50%;"><br /><em>'.__('Please enter e-mail for which you are generating the link.', 'paiddownloads').'</em></td>
									</tr>
								</table>
								<div class="alignright">
								<input type="hidden" name="ak_action" value="paiddownloads_update_link" />
								<input type="submit" class="paiddownoads_button button-primary" name="submit" value="'.__('Submit details', 'paiddownloads').' »">
								</div>
								<br class="clear">
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>');
	}
	
	function admin_transactions() {
		global $wpdb;
		if (isset($_GET["s"])) $search_query = trim(stripslashes($_GET["s"]));
		else $search_query = "";
		if (isset($_GET["fid"])) $file_id = intval(trim(stripslashes($_GET["fid"])));
		else $file_id = 0;
		$tmp = $wpdb->get_row("SELECT COUNT(*) AS total FROM ".$wpdb->prefix."pd_transactions WHERE id > 0".($file_id > 0 ? " AND file_id = '".$file_id."'" : "").((strlen($search_query) > 0) ? " AND (payer_name LIKE '%".addslashes($search_query)."%' OR payer_email LIKE '%".addslashes($search_query)."%')" : ""), ARRAY_A);
		$total = $tmp["total"];
		$totalpages = ceil($total/PD_RECORDS_PER_PAGE);
		if ($totalpages == 0) $totalpages = 1;
		if (isset($_GET["p"])) $page = intval($_GET["p"]);
		else $page = 1;
		if ($page < 1 || $page > $totalpages) $page = 1;
		$switcher = $this->page_switcher(get_bloginfo("wpurl")."/wp-admin/admin.php?page=paid-downloads-transactions".((strlen($search_query) > 0) ? "&s=".rawurlencode($search_query) : "").($file_id > 0 ? "&fid=".$file_id : ""), $page, $totalpages);

		$sql = "SELECT t1.*, t2.title AS file_title FROM ".$wpdb->prefix."pd_transactions t1 LEFT JOIN ".$wpdb->prefix."pd_files t2 ON t1.file_id = t2.id WHERE t1.id > 0".($file_id > 0 ? " AND t1.file_id = '".$file_id."'" : "").((strlen($search_query) > 0) ? " AND (t1.payer_name LIKE '%".addslashes($search_query)."%' OR t1.payer_email LIKE '%".addslashes($search_query)."%')" : "")." ORDER BY t1.created DESC LIMIT ".(($page-1)*PD_RECORDS_PER_PAGE).", ".PD_RECORDS_PER_PAGE;
		$rows = $wpdb->get_results($sql, ARRAY_A);

		print ('
			<div class="wrap admin_paiddownloads_wrap">
				<div id="icon-edit-pages" class="icon32"><br /></div><h2>'.__('Paid Downloads - Transactions', 'paiddownloads').'</h2><br />
				<form action="'.get_bloginfo("wpurl").'/wp-admin/admin.php" method="get" style="margin-bottom: 10px;">
				<input type="hidden" name="page" value="paid-downloads-transactions" />
				'.($file_id > 0 ? '<input type="hidden" name="bid" value="'.$file_id.'" />' : '').'
				'.__('Search:', 'paiddownloads').' <input type="text" name="s" value="'.htmlspecialchars($search_query, ENT_QUOTES).'">
				<input type="submit" class="button-secondary action" value="'.__('Search', 'paiddownloads').'" />
				'.((strlen($search_query) > 0) ? '<input type="button" class="button-secondary action" value="'.__('Reset search results', 'paiddownloads').'" onclick="window.location.href=\''.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-transactions'.($file_id > 0 ? '&bid='.$file_id : '').'\';" />' : '').'
				</form>
				<div class="paiddownloads_pageswitcher">'.$switcher.'</div>
				<table class="paiddownloads_files">
				<tr>
					<th>'.__('File', 'paiddownloads').'</th>
					<th>'.__('Payer', 'paiddownloads').'</th>
					<th style="width: 100px;">'.__('Amount', 'paiddownloads').'</th>
					<th style="width: 120px;">'.__('Status', 'paiddownloads').'</th>
					<th style="width: 130px;">'.__('Created', 'paiddownloads').'*</th>
				</tr>
		');
		if (sizeof($rows) > 0)
		{
			foreach ($rows as $row)
			{
				print ('
				<tr>
					<td>'.htmlspecialchars($row['file_title'], ENT_QUOTES).'</td>
					<td>'.htmlspecialchars($row['payer_name'], ENT_QUOTES).'<br /><em>'.htmlspecialchars($row['payer_email'], ENT_QUOTES).'</em></td>
					<td style="text-align: right;">'.number_format($row['gross'], 2, ".", "").' '.$row['currency'].'</td>
					<td><a href="'.get_bloginfo("wpurl").'/wp-admin/admin.php?ak_action=paiddownloads_transactiondetails&id='.$row['id'].'" class="thickbox" title="Transaction Details">'.$row["payment_status"].'</a><br /><em>'.$row["transaction_type"].'</em></td>
					<td>'.date("Y-m-d H:i", $row["created"]).'</td>
				</tr>
				');
			}
		}
		else
		{
			print ('
				<tr><td colspan="5" style="padding: 20px; text-align: center;">'.((strlen($search_query) > 0) ? __('No results found for', 'paiddownloads').' "<strong>'.htmlspecialchars($search_query, ENT_QUOTES).'</strong>"' : __('List is empty.', 'paiddownloads')).'</td></tr>
			');
		}
		print ('
				</table>
				<div class="paiddownloads_pageswitcher">'.$switcher.'</div>
			</div>');
	}
	
	function admin_request_handler() {
		global $wpdb;
		if (!empty($_POST['ak_action'])) {
			switch($_POST['ak_action']) {
				case 'paiddownloads_update_settings':
					$this->populate_settings();
					if (isset($_POST["paiddownloads_enable_paypal"])) $this->options['enable_paypal'] = "on";
					else $this->options['enable_paypal'] = "off";
					if (isset($_POST["paiddownloads_enable_alertpay"])) $this->options['enable_alertpay'] = "on";
					else $this->options['enable_alertpay'] = "off";
					if (isset($_POST["paiddownloads_enable_interkassa"])) $this->options['enable_interkassa'] = "on";
					else $this->options['enable_interkassa'] = "off";
					if (isset($_POST["paiddownloads_paypal_sandbox"])) $this->options['paypal_sandbox'] = "on";
					else $this->options['paypal_sandbox'] = "off";
					if (isset($_POST["paiddownloads_paypal_address"])) $this->options['paypal_address'] = "on";
					else $this->options['paypal_address'] = "off";
					if (isset($_POST["paiddownloads_handle_unverified"])) $this->options['handle_unverified'] = "on";
					else $this->options['handle_unverified'] = "off";
					$buynow_image = "";
					$errors_info = "";
					if (is_uploaded_file($_FILES["paiddownloads_buynow_image"]["tmp_name"]))
					{
						$ext = strtolower(substr($_FILES["paiddownloads_buynow_image"]["name"], strlen($_FILES["paiddownloads_buynow_image"]["name"])-4));
						if ($ext != ".jpg" && $ext != ".gif" && $ext != ".png") $errors[] = __('Custom "Buy Now" button has invalid image type', 'paiddownloads');
						else
						{
							list($width, $height, $type, $attr) = getimagesize($_FILES["paiddownloads_buynow_image"]["tmp_name"]);
							if ($width > 600 || $height > 600) $errors[] = __('Custom "Buy Now" button has invalid image dimensions', 'paiddownloads');
							else
							{
								$buynow_image = "button_".md5(microtime().$_FILES["paiddownloads_buynow_image"]["tmp_name"]).$ext;
								if (!move_uploaded_file($_FILES["paiddownloads_buynow_image"]["tmp_name"], ABSPATH."wp-content/uploads/paid-downloads/".$buynow_image))
								{
									$errors[] = "Can't save uploaded image";
									$buynow_image = "";
								}
								else
								{
									if (!empty($this->options['buynow_image']))
									{
										if (file_exists(ABSPATH."wp-content/uploads/paid-downloads/".$this->options['buynow_image']) && is_file(ABSPATH."wp-content/uploads/paid-downloads/".$this->options['buynow_image']))
											unlink(ABSPATH."wp-content/uploads/paid-downloads/".$this->options['buynow_image']);
									}
								}
							}
						}
					}
					if (!empty($buynow_image)) $this->options['buynow_image'] = $buynow_image;
					if ($this->options['buynow_type'] == "custom" && empty($this->options['buynow_image']))
					{
						$this->options['buynow_type'] = "html";
						$errors_info = __('Due to "Buy Now" image problem "Buy Now" button was set to Standard HTML button.', 'paiddownloads');
					}
					$errors = $this->check_settings();
					if (empty($errors_info) && $errors === true)
					{
						$this->update_settings();
						header('Location: '.get_bloginfo('wpurl').'/wp-admin/admin.php?page=paid-downloads&updated=true');
						die();
					}
					else
					{
						$this->update_settings();
						$message = "";
						if (is_array($errors)) $message = __('The following error(s) occured:', 'paiddownloads').'<br />- '.implode('<br />- ', $errors);
						if (!empty($errors_info)) $message .= (empty($message) ? "" : "<br />").$errors_info;
						setcookie("paiddownloads_error", $message, time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
						header('Location: '.get_bloginfo('wpurl').'/wp-admin/admin.php?page=paid-downloads');
						die();
					}
					break;

				case 'paiddownloads_update_file':
					if (isset($_POST["paiddownloads_id"]) && !empty($_POST["paiddownloads_id"])) {
						$id = intval($_POST["paiddownloads_id"]);
						$file_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."pd_files WHERE id = '".$id."' AND deleted = '0'", ARRAY_A);
						if (intval($file_details["id"]) == 0) unset($id);
					}
					$title = trim(stripslashes($_POST["paiddownloads_title"]));
					$price = trim(stripslashes($_POST["paiddownloads_price"]));
					$price = number_format(floatval($price), 2, '.', '');
					$currency = trim(stripslashes($_POST["paiddownloads_currency"]));
					$available_copies = trim(stripslashes($_POST["paiddownloads_available_copies"]));
					$available_copies = intval($available_copies);
					$file_selector = trim(stripslashes($_POST["paiddownloads_fileselector"]));
					$license_url = trim(stripslashes($_POST["paiddownloads_license_url"]));
					if (!preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $license_url) || strlen($license_url) == 0) $license_url = "";
					
					if (is_uploaded_file($_FILES["paiddownloads_file"]["tmp_name"])) {
						$uploaded = 1;
						if (empty($title)) $title = $_FILES["paiddownloads_file"]["name"];
						if ($file_details["uploaded"] == 1) {
							if (file_exists(ABSPATH."wp-content/uploads/paid-downloads/files/".$file_details["filename"]) && is_file(ABSPATH."wp-content/uploads/paid-downloads/files/".$file_details["filename"]))
								unlink(ABSPATH."wp-content/uploads/paid-downloads/files/".$file_details["filename"]);
						}
						$filename = $this->get_filename(ABSPATH.'wp-content/uploads/paid-downloads/files/', $_FILES["paiddownloads_file"]["name"]);
						$filename_original = $_FILES["paiddownloads_file"]["name"];
						if (!move_uploaded_file($_FILES["paiddownloads_file"]["tmp_name"], ABSPATH."wp-content/uploads/paid-downloads/files/".$filename)) {
							setcookie("paiddownloads_error", __('Unable to save uploaded file on server', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
							header('Location: '.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-add'.(!empty($id) ? '&id='.$id : ''));
							exit;
						}
					} else {
						if (file_exists(ABSPATH."wp-content/uploads/paid-downloads/files/".$file_selector) && is_file(ABSPATH."wp-content/uploads/paid-downloads/files/".$file_selector)) {
							$filename = $file_selector;
							$filename_original = $filename;
							if (empty($title)) $title = $filename;
							if ($file_selector == $file_details["filename"]) {
								$uploaded = 1;
								$filename_original = $file_details["filename_original"];
							} else {
								$uploaded = 0;
								$filename_original = $filename;
							}
						} else {
							setcookie("paiddownloads_error", __('You must select or upload file', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
							header('Location: '.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-add'.(!empty($id) ? '&id='.$id : ''));
							exit;
						}
					}
					if (!empty($id)) {
						$sql = "UPDATE ".$wpdb->prefix."pd_files SET 
							title = '".mysql_real_escape_string($title)."', 
							filename = '".mysql_real_escape_string($filename)."', 
							filename_original = '".mysql_real_escape_string($filename_original)."', 
							price = '".$price."',
							currency = '".$currency."',
							available_copies = '".$available_copies."',
							uploaded = '".$uploaded."',
							license_url = '".mysql_real_escape_string($license_url)."'
							WHERE id = '".$id."'";
						if ($wpdb->query($sql) !== false) {
							setcookie("paiddownloads_info", __('File successfully updated', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
							header('Location: '.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-files');
							exit;
						} else {
							setcookie("paiddownloads_error", __('Service is not available', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
							header('Location: '.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-add'.(!empty($id) ? '&id='.$id : ''));
							exit;
						}
					} else {
						$sql = "INSERT INTO ".$wpdb->prefix."pd_files (
							title, filename, filename_original, price, currency, registered, available_copies, uploaded, license_url, deleted) VALUES (
							'".mysql_real_escape_string($title)."',
							'".mysql_real_escape_string($filename)."',
							'".mysql_real_escape_string($filename_original)."',
							'".$price."',
							'".$currency."',
							'".time()."',
							'".$available_copies."',
							'".$uploaded."',
							'".mysql_real_escape_string($license_url)."',
							'0'
							)";
						if ($wpdb->query($sql) !== false) {
							setcookie("paiddownloads_info", __('File successfully added', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
							header('Location: '.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-files');
							exit;
						} else {
							setcookie("paiddownloads_error", __('Service is not available', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
							header('Location: '.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-add'.(!empty($id) ? '&id='.$id : ''));
							exit;
						}
					}
					break;

				case 'paiddownloads_update_link':
					$link_owner = trim(stripslashes($_POST["paiddownloads_link_owner"]));
					if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $link_owner) || strlen($link_owner) == 0) {
						setcookie("paiddownloads_error", __('Link owner must be valid e-mail address.', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
						header('Location: '.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-add-link');
						exit;
					}
					$file_id = trim(stripslashes($_POST["paiddownloads_fileselector"]));
					$file_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."pd_files WHERE id = '".$file_id."' AND deleted = '0'", ARRAY_A);
					if (intval($file_details["id"]) == 0) {
						setcookie("paiddownloads_error", __('Invalid service call.', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
						header('Location: '.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-add-link');
						exit;
					}
					$link = $this->generate_downloadlink($file_details["id"], $link_owner, "manual");
					setcookie("paiddownloads_info", __('Temporary download link successfully created.', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
					header('Location: '.get_bloginfo("wpurl").'/wp-admin/admin.php?page=paid-downloads-links');
					exit;
					break;
			}
		}
		if (!empty($_GET['ak_action'])) {
			switch($_GET['ak_action']) {
				case 'paiddownloads_delete':
					$id = intval($_GET["id"]);
					$file_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."pd_files WHERE id = '".$id."' AND deleted = '0'", ARRAY_A);
					if (intval($file_details["id"]) == 0) {
						setcookie("paiddownloads_error", __('Invalid service call', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
						header('Location: '.get_bloginfo('wpurl').'/wp-admin/admin.php?page=paid-downloads-files');
						die();
					}

					$sql = "UPDATE ".$wpdb->prefix."pd_files SET deleted = '1' WHERE id = '".$id."'";
					if ($wpdb->query($sql) !== false) {
						if (file_exists(ABSPATH."wp-content/uploads/paid-downloads/files/".$file_details["filename"]) && is_file(ABSPATH."wp-content/uploads/paid-downloads/files/".$file_details["filename"])) {
							$tmp_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."pd_files WHERE filename = '".$file_details["filename"]."' AND deleted = '0'", ARRAY_A);
							if (intval($tmp_details["id"]) == 0 && $file_details["uploaded"] == 1) {
								unlink(ABSPATH."wp-content/uploads/paid-downloads/files/".$file_details["filename"]);
							}
						}
						setcookie("paiddownloads_info", __('File successfully removed', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
						header('Location: '.get_bloginfo('wpurl').'/wp-admin/admin.php?page=paid-downloads-files');
						die();
					} else {
						setcookie("paiddownloads_error", __('Invalid service call', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
						header('Location: '.get_bloginfo('wpurl').'/wp-admin/admin.php?page=paid-downloads-files');
						die();
					}
					break;
				case 'paiddownloads_delete_link':
					$id = intval($_GET["id"]);
					$file_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."pd_downloadlinks WHERE id = '".$id."' AND deleted = '0'", ARRAY_A);
					if (intval($file_details["id"]) == 0) {
						setcookie("paiddownloads_error", __('Invalid service call', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
						header('Location: '.get_bloginfo('wpurl').'/wp-admin/admin.php?page=paid-downloads-links');
						die();
					}
					$sql = "UPDATE ".$wpdb->prefix."pd_downloadlinks SET deleted = '1' WHERE id = '".$id."'";
					if ($wpdb->query($sql) !== false) {
						setcookie("paiddownloads_info", __('Temporary download link successfully removed.', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
						header('Location: '.get_bloginfo('wpurl').'/wp-admin/admin.php?page=paid-downloads-links');
						die();
					} else {
						setcookie("paiddownloads_error", __('Invalid service call.', 'paiddownloads'), time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
						header('Location: '.get_bloginfo('wpurl').'/wp-admin/admin.php?page=paid-downloads-links');
						die();
					}
					break;
				case 'paiddownloads_hidedonationbox':
					$this->options['show_donationbox'] = PD_VERSION;
					$this->update_settings();
					header('Location: '.get_bloginfo('wpurl').'/wp-admin/admin.php?page=paid-downloads');
					die();
					break;
				case 'paiddownloads_transactiondetails':
					if (isset($_GET["id"]) && !empty($_GET["id"])) {
						$id = intval($_GET["id"]);
						$transaction_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."pd_transactions WHERE id = '".$id."' AND deleted = '0'", ARRAY_A);
						if (intval($transaction_details["id"]) != 0) {
							echo '
<html>
<head>
	<title>Transaction Details</title>
</head>
<body>
	<table style="width: 100%;">';
							$details = explode("&", $transaction_details["details"]);
							foreach ($details as $param) {
								$data = explode("=", $param, 2);
								echo '
		<tr>
			<td style="width: 170px; font-weight: bold;">'.esc_attr($data[0]).'</td>
			<td>'.esc_attr(urldecode($data[1])).'</td>
		</tr>';
							}
							echo '
	</table>						
</body>
</html>';
						} else echo 'No data found!';
					} else echo 'No data found!';
					die();
					break;
				default:
					break;
					
			}
		}
	}

	function admin_warning() {
		echo '
		<div class="updated"><p>'.__('<strong>Paid Downloads plugin almost ready.</strong> You must do some <a href="admin.php?page=paid-downloads">settings</a> for it to work.', 'paiddownloads').'</p></div>
		';
	}

	function admin_warning_reactivate() {
		echo '
		<div class="error"><p>'.__('<strong>Please deactivate Paid Downloads plugin and activate it again.</strong> If you already done that and see this message, please create the folder "/wp-content/uploads/paid-downloads/files/" manually and set permission 0777 for this folder.', 'paiddownloads').'</p></div>
		';
	}

	function admin_header() {
		global $wpdb;
		echo '
		<link rel="stylesheet" type="text/css" href="'.plugins_url('/css/style.css?ver='.PD_VERSION, __FILE__).'" media="screen" />
		<link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
			function paiddownloads_submitOperation() {
				var answer = confirm("Do you really want to continue?")
				if (answer) return true;
				else return false;
			}
		</script>';
	}

	function front_init() {
		global $wpdb;
		if (isset($_GET['paiddownloads_id']) || isset($_GET['paiddownloads_key'])) {
			ob_start();
			if(!ini_get('safe_mode')) set_time_limit(0);
			ob_end_clean();
			if (isset($_GET["paiddownloads_id"])) {
				$id = intval($_GET["paiddownloads_id"]);
				$file_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . "pd_files WHERE id = '".$id."' AND deleted = '0'", ARRAY_A);
				if (intval($file_details["id"]) == 0) die(__('Invalid download link', 'paiddownloads'));
				if ($file_details["price"] != 0 && !current_user_can('manage_options')) die(__('Invalid download link', 'paiddownloads'));
			} else {
				if (!isset($_GET["paiddownloads_key"])) die(__('Invalid download link', 'paiddownloads'));
				$download_key = $_GET["paiddownloads_key"];
				$download_key = preg_replace('/[^a-zA-Z0-9]/', '', $download_key);
				$sql = "SELECT * FROM ".$wpdb->prefix."pd_downloadlinks WHERE download_key = '".$download_key."' AND deleted = '0'";
				$link_details = $wpdb->get_row($sql, ARRAY_A);
				if (intval($link_details["id"]) == 0) die(__('Invalid download link', 'paiddownloads'));
				$file_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . "pd_files WHERE id = '".$link_details["file_id"]."' AND deleted = '0'", ARRAY_A);
				if (intval($file_details["id"]) == 0) die(__('Invalid download link', 'paiddownloads'));
				if ($link_details["created"]+24*3600*intval($this->options['link_lifetime']) < time()) die(__('Download link was expired', 'paiddownloads'));
			}
			$filename = ABSPATH."wp-content/uploads/paid-downloads/files/".$file_details["filename"];
			$filename_original = $file_details["filename_original"];

			if (!file_exists($filename) || !is_file($filename)) die(__('File not found', 'paiddownloads'));

			$length = filesize($filename);

			if (strstr($_SERVER["HTTP_USER_AGENT"],"MSIE")) {
				header("Pragma: public");
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Content-type: application-download");
				header("Content-Length: ".$length);
				header("Content-Disposition: attachment; filename=\"".$filename_original."\"");
				header("Content-Transfer-Encoding: binary");
			} else {
				header("Content-type: application-download");
				header("Content-Length: ".$length);
				header("Content-Disposition: attachment; filename=\"".$filename_original."\"");
			}

			$handle_read = fopen($filename, "rb");
			while (!feof($handle_read) && $length > 0) {
				$content = fread($handle_read, 1024);
				echo substr($content, 0, min($length, 1024));
				$length = $length - strlen($content);
				if ($length < 0) $length = 0;
			}
			fclose($handle_read);
			exit;
		} else if (isset($_GET['paiddownloads_ipn']) && $_GET['paiddownloads_ipn'] == 'alertpay') {
			$token = "token=".urlencode($_POST['token']);
			$response = '';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://www.alertpay.com/ipn2.ashx");
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $token);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_TIMEOUT, 60);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$response = curl_exec($ch);

			if(strlen($response) > 0) {
				if(urldecode($response) == "INVALID TOKEN") {
					//the token is not valid
				} else {
					$response = urldecode($response);
					$aps = explode("&", $response);
					$info = array();
					foreach ($aps as $ap) {
						$ele = explode("=", $ap);
						$info[$ele[0]] = $ele[1];
					}

					$item_number = intval(str_replace("ID", "", $info['ap_itemcode']));
					$item_name = $info['ap_itemname'];
					$payment_status = $info['ap_status'];
					$transaction_type = $info['ap_transactiontype'];
					$txn_id = $info['ap_referencenumber'];
					$seller_id = $info['ap_merchant'];
					$payer_id = $info['ap_custemailaddress'];
					$gross_total = $info['ap_totalamount'];
					$mc_currency = $info['ap_currency'];
					$first_name = $info['ap_custfirstname'];
					$last_name = $info['ap_custlastname'];

					if ($payment_status == "Success") {
						$file_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."pd_files WHERE id = '".intval($item_number)."'", ARRAY_A);
						if (intval($file_details["id"]) == 0) $payment_status = "Unrecognized";
						else {
							if (strtolower($seller_id) != strtolower($this->options['alertpay_id'])) $payment_status = "Unrecognized";
							else {
								if (floatval($gross_total) < floatval($file_details["price"]) || $mc_currency != $file_details["currency"]) $payment_status = "Unrecognized";
							}
						}
					}
					$sql = "INSERT INTO ".$wpdb->prefix."pd_transactions (
						file_id, payer_name, payer_email, gross, currency, payment_status, transaction_type, details, created) VALUES (
						'".intval($item_number)."',
						'".mysql_real_escape_string($first_name).' '.mysql_real_escape_string($last_name)."',
						'".mysql_real_escape_string($payer_id)."',
						'".floatval($gross_total)."',
						'".$mc_currency."',
						'".$payment_status."',
						'AlertPay: ".$transaction_type."',
						'".mysql_real_escape_string($response)."',
						'".time()."'
					)";
					$wpdb->query($sql);
					if ($payment_status == "Success") {
						$license_info = "";
						if (preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $file_details["license_url"]) && strlen($file_details["license_url"]) != 0 && in_array('curl', get_loaded_extensions())) {
							$data = $this->get_license_info($file_details["license_url"], $response);
							$license_info = $data["content"];
						}
						$download_link = $this->generate_downloadlink($file_details["id"], $payer_id, "purchasing");
						$tags = array("{first_name}", "{last_name}", "{payer_email}", "{product_title}", "{product_price}", "{product_currency}", "{download_link}", "{download_link_lifetime}", "{license_info}", "{transaction_date}");
						$vals = array($first_name, $last_name, $payer_id, $file_details["title"], $gross_total, $mc_currency, $download_link ,$this->options['link_lifetime'], $license_info, date("Y-m-d H:i:s")." (server time)");

						$body = str_replace($tags, $vals, $this->options['success_email_body']);
						$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
						$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
						$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
						wp_mail($payer_id, $this->options['success_email_subject'], $body, $mail_headers);

						$body = str_replace($tags, $vals, __('Dear Administrator!', 'paiddownloads').PHP_EOL.PHP_EOL.__('We would like to inform you that {first_name} {last_name} ({payer_email}) purchased {product_title} via AlertPay on {transaction_date}. The buyer received the following download link:', 'paiddownloads').PHP_EOL.'{download_link}'.PHP_EOL.__('This link is valid {download_link_lifetime} day(s) only.', 'paiddownloads').PHP_EOL.PHP_EOL.__('Thanks,', 'paiddownloads').PHP_EOL.'Paid Downloads Plugin');
						$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
						$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
						$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
						wp_mail($this->options['seller_email'], __('Completed AlertPay payment received', 'paiddownloads'), $body, $mail_headers);
					} else {
						$tags = array("{first_name}", "{last_name}", "{payer_email}", "{product_title}", "{product_price}", "{product_currency}", "{payment_status}", "{transaction_date}");
						$vals = array($first_name, $last_name, $payer_id, $file_details["title"], $gross_total, $mc_currency, $payment_status, date("Y-m-d H:i:s")." (server time)");

						$body = str_replace($tags, $vals, $this->options['failed_email_body']);
						$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
						$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
						$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
						wp_mail($payer_id, $this->options['failed_email_subject'], $body, $mail_headers);

						$body = str_replace($tags, $vals, __('Dear Administrator!', 'paiddownloads').PHP_EOL.PHP_EOL.__('We would like to inform you that {first_name} {last_name} ({payer_email}) paid for {product_title} via AlerPay on {transaction_date}. This is non-completed payment.', 'paiddownloads').PHP_EOL.__('Payment ststus: {payment_status}', 'paiddownloads').PHP_EOL.PHP_EOL.__('Download link was not generated.', 'paiddownloads').PHP_EOL.PHP_EOL.__('Thanks,', 'paiddownloads').PHP_EOL.'Paid Downloads Plugin');
						$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
						$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
						$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
						wp_mail($this->options['seller_email'], __('Non-completed AlertPay payment received', 'paiddownloads'), $body, $mail_headers);
					}
				}
			}
			exit;
		} else if (isset($_GET['paiddownloads_ipn']) && $_GET['paiddownloads_ipn'] == 'interkassa') {
			if (isset($_POST['ik_shop_id']) && isset($_POST['ik_sign_hash'])) {
				$request = '';
				foreach ($_POST as $key => $value) {
					$request .= "&".$key."=".$value;
				}
				$item_number = $_POST['ik_payment_id'];
				if (($pos = strpos($item_number, "_")) !== false) $item_number = intval(substr($item_number, 0, $pos));
				$item_name = $_POST['ik_payment_desc'];
				$payment_status = $_POST['ik_payment_state'];
				$transaction_type = $_POST['ik_paysystem_alias'];
				$txn_id = $_POST['ik_trans_id'];
				$seller_id = $_POST['ik_shop_id'];
				$payer_id = $_POST['ik_baggage_fields'];
				$gross_total = $_POST['ik_payment_amount'];
				$mc_currency = $this->options['interkassa_currency'];
				$first_name = $payer_id;

				if ($payment_status == "success") {
					$file_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."pd_files WHERE id = '".intval($item_number)."'", ARRAY_A);
					if (intval($file_details["id"]) == 0) $payment_status = "Unrecognized";
					else {
						if (strtolower($seller_id) != strtolower($this->options['interkassa_shop_id'])) $payment_status = "Unrecognized";
						else {
							if ($file_details["currency"] != $this->options['interkassa_currency']) {
								$rates_string = get_option('paiddownloads_rates');
								$rates = explode(":", $rates_string);
								$date = date("Y-m-d");
								$index = false;
								foreach ($rates as $key => $rate) {
									if (substr($rate, 0, 7) == $file_details["currency"].",".$this->options['interkassa_currency']) {
										$index = $key;
										break;
									}
								}
								if ($index === false) $rate = false;
								else {
									$components = explode(",", $rates[$index]);
									$rate = $components[2];
								}
							} else $rate = 1;
							if (!$rate) $payment_status = "Unrecognized";
							else {
								$price = number_format($file_details["price"]*$rate, 2, ".", "");
								if (floatval($gross_total) < $price) $payment_status = "Unrecognized";
								else {
									$sing_hash_str = $_POST['ik_shop_id'].':'.
										$_POST['ik_payment_amount'].':'.
										$_POST['ik_payment_id'].':'.
										$_POST['ik_paysystem_alias'].':'.
										$_POST['ik_baggage_fields'].':'.
										$_POST['ik_payment_state'].':'.
										$_POST['ik_trans_id'].':'.
										$_POST['ik_currency_exch'].':'.
										$_POST['ik_fees_payer'].':'.
										$this->options['interkassa_secret_key'];
									$sign_hash = strtoupper(md5($sing_hash_str));
									if ($_POST['ik_sign_hash'] != $sign_hash) $payment_status = "Unrecognized";					
								}
							}
						}
					}
				}
				$sql = "INSERT INTO ".$wpdb->prefix."pd_transactions (
					file_id, payer_name, payer_email, gross, currency, payment_status, transaction_type, details, created) VALUES (
					'".intval($item_number)."',
					'".mysql_real_escape_string($first_name)."',
					'".mysql_real_escape_string($payer_id)."',
					'".floatval($gross_total)."',
					'".$mc_currency."',
					'".$payment_status."',
					'InterKassa: ".$transaction_type."',
					'".mysql_real_escape_string($request)."',
					'".time()."'
				)";
				$wpdb->query($sql);
				if ($payment_status == "success") {
					$license_info = "";
					if (preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $file_details["license_url"]) && strlen($file_details["license_url"]) != 0 && in_array('curl', get_loaded_extensions())) {
						$data = $this->get_license_info($file_details["license_url"], $response);
						$license_info = $data["content"];
					}
					$download_link = $this->generate_downloadlink($file_details["id"], $payer_id, "purchasing");
					$tags = array("{first_name}", "{last_name}", "{payer_email}", "{product_title}", "{product_price}", "{product_currency}", "{download_link}", "{download_link_lifetime}", "{license_info}", "{transaction_date}");
					$vals = array($first_name, $last_name, $payer_id, $file_details["title"], $gross_total, $mc_currency, $download_link ,$this->options['link_lifetime'], $license_info, date("Y-m-d H:i:s")." (server time)");

					$body = str_replace($tags, $vals, $this->options['success_email_body']);
					$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
					$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
					$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
					wp_mail($payer_id, $this->options['success_email_subject'], $body, $mail_headers);

					$body = str_replace($tags, $vals, __('Dear Administrator!', 'paiddownloads').PHP_EOL.PHP_EOL.__('We would like to inform you that {first_name} {last_name} ({payer_email}) purchased {product_title} via InterKassa on {transaction_date}. The buyer received the following download link:', 'paiddownloads').PHP_EOL.'{download_link}'.PHP_EOL.__('This link is valid {download_link_lifetime} day(s) only.', 'paiddownloads').PHP_EOL.PHP_EOL.__('Thanks,', 'paiddownloads').PHP_EOL.'Paid Downloads Plugin');
					$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
					$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
					$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
					wp_mail($this->options['seller_email'], __('Completed InterKassa payment received', 'paiddownloads'), $body, $mail_headers);
				} else {
					$tags = array("{first_name}", "{last_name}", "{payer_email}", "{product_title}", "{product_price}", "{product_currency}", "{payment_status}", "{transaction_date}");
					$vals = array($first_name, $last_name, $payer_id, $file_details["title"], $gross_total, $mc_currency, $payment_status, date("Y-m-d H:i:s")." (server time)");

					$body = str_replace($tags, $vals, $this->options['failed_email_body']);
					$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
					$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
					$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
					wp_mail($payer_id, $this->options['failed_email_subject'], $body, $mail_headers);

					$body = str_replace($tags, $vals, __('Dear Administrator!', 'paiddownloads').PHP_EOL.PHP_EOL.__('We would like to inform you that {first_name} {last_name} ({payer_email}) paid for {product_title} via InterKassa on {transaction_date}. This is non-completed payment.', 'paiddownloads').PHP_EOL.__('Payment ststus: {payment_status}', 'paiddownloads').PHP_EOL.PHP_EOL.__('Download link was not generated.', 'paiddownloads').PHP_EOL.PHP_EOL.__('Thanks,', 'paiddownloads').PHP_EOL.'Paid Downloads Plugin');
					$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
					$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
					$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
					wp_mail($this->options['seller_email'], __('Non-completed InterKassa payment received', 'paiddownloads'), $body, $mail_headers);
				}
			}
			exit;
		} else if (isset($_GET['paiddownloads_ipn'])) {
			$paypalurl = parse_url((($this->options['paypal_sandbox'] == "on") ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr'));
			$request = "cmd=_notify-validate";
			foreach ($_POST as $key => $value) {
				$value = urlencode(stripslashes($value));
				$request .= "&".$key."=".$value;
			}
			$header = "POST ".$paypalurl["path"]." HTTP/1.0\r\n";
			$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
			$header .= "Content-Length: ".strlen($request)."\r\n\r\n";
			$handle = fsockopen("ssl://".$paypalurl["host"], 443, $errno, $errstr, 30);
			if ($handle) {
				fputs ($handle, $header.$request);
				while (!feof($handle)) {
					$result = fgets ($handle, 1024);
				}
				if (substr(trim($result), 0, 8) == "VERIFIED") {
					$item_number = stripslashes($_POST['item_number']);
					$item_name = stripslashes($_POST['item_name']);
					$payment_status = stripslashes($_POST['payment_status']);
					$transaction_type = stripslashes($_POST['txn_type']);
					$txn_id = stripslashes($_POST['txn_id']);
					$seller_paypal = stripslashes($_POST['business']);
					$seller_id = stripslashes($_POST['receiver_id']);
					$payer_paypal = stripslashes($_POST['payer_email']);
					$gross_total = stripslashes($_POST['mc_gross']);
					$mc_currency = stripslashes($_POST['mc_currency']);
					$first_name = stripslashes($_POST['first_name']);
					$last_name = stripslashes($_POST['last_name']);

					$payer_status = stripslashes($_POST['payer_status']);
					
					if ($transaction_type == "web_accept" && $payment_status == "Completed") {
						$file_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."pd_files WHERE id = '".intval($item_number)."'", ARRAY_A);
						if (intval($file_details["id"]) == 0) $payment_status = "Unrecognized";
						else {
							if (empty($seller_paypal)) {
								$tx_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."pd_transactions WHERE details LIKE '%txn_id=".$txn_id."%' AND payment_status != 'Unrecognized'", ARRAY_A);
								if (intval($tx_details["id"]) != 0) $seller_paypal = $this->options['paypal_id'];
							}
							if ((strtolower($seller_paypal) != strtolower($this->options['paypal_id'])) && (strtolower($seller_id) != strtolower($this->options['paypal_id']))) $payment_status = "Unrecognized";
							else {
								if (floatval($gross_total) < floatval($file_details["price"]) || $mc_currency != $file_details["currency"]) $payment_status = "Unrecognized";
							}
						}
					}
					$sql = "INSERT INTO ".$wpdb->prefix."pd_transactions (
						file_id, payer_name, payer_email, gross, currency, payment_status, transaction_type, details, created) VALUES (
						'".intval($item_number)."',
						'".mysql_real_escape_string($first_name).' '.mysql_real_escape_string($last_name)."',
						'".mysql_real_escape_string($payer_paypal)."',
						'".floatval($gross_total)."',
						'".$mc_currency."',
						'".$payment_status."',
						'PayPal: ".$transaction_type."',
						'".mysql_real_escape_string($request)."',
						'".time()."'
					)";
					$wpdb->query($sql);
					if ($transaction_type == "web_accept") {
						if ($payment_status == "Completed") {
							if ($payer_status == "verified" || $this->options['handle_unverified'] != "on") {
								$license_info = "";
								if (preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $file_details["license_url"]) && strlen($file_details["license_url"]) != 0 && in_array('curl', get_loaded_extensions())) {
									$request = "";
									foreach ($_POST as $key => $value) {
										$value = urlencode(stripslashes($value));
										$request .= "&".$key."=".$value;
									}
									$data = $this->get_license_info($file_details["license_url"], $request);
									$license_info = $data["content"];
								}
								$download_link = $this->generate_downloadlink($file_details["id"], $payer_paypal, "purchasing");
								$tags = array("{first_name}", "{last_name}", "{payer_email}", "{product_title}", "{product_price}", "{product_currency}", "{download_link}", "{download_link_lifetime}", "{license_info}", "{transaction_date}");
								$vals = array($first_name, $last_name, $payer_paypal, $file_details["title"], $gross_total, $mc_currency, $download_link ,$this->options['link_lifetime'], $license_info, date("Y-m-d H:i:s")." (server time)");

								$body = str_replace($tags, $vals, $this->options['success_email_body']);
								$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
								$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
								$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
								wp_mail($payer_paypal, $this->options['success_email_subject'], $body, $mail_headers);

								$body = str_replace($tags, $vals, __('Dear Administrator!', 'paiddownloads').PHP_EOL.PHP_EOL.__('We would like to inform you that {first_name} {last_name} ({payer_email}) purchased {product_title} via PayPal on {transaction_date}. The buyer received the following download link:', 'paiddownloads').PHP_EOL.'{download_link}'.PHP_EOL.__('This link is valid {download_link_lifetime} day(s) only.', 'paiddownloads').PHP_EOL.PHP_EOL.__('Thanks,', 'paiddownloads').PHP_EOL.'Paid Downloads Plugin');
								$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
								$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
								$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
								wp_mail($this->options['seller_email'], __('Completed PayPal payment received', 'paiddownloads'), $body, $mail_headers);
							} else {
								$tags = array("{first_name}", "{last_name}", "{payer_email}", "{product_title}", "{product_price}", "{product_currency}", "{transaction_date}");
								$vals = array($first_name, $last_name, $payer_paypal, $file_details["title"], $gross_total, $mc_currency, date("Y-m-d H:i:s")." (server time)");

								$body = str_replace($tags, $vals, $this->options['success_email_body_unverified']);
								$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
								$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
								$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
								wp_mail($payer_paypal, $this->options['success_email_subject'], $body, $mail_headers);

								$body = str_replace($tags, $vals, __('Dear Administrator!', 'paiddownloads').PHP_EOL.PHP_EOL.__('We would like to inform you that {first_name} {last_name} ({payer_email}) purchased {product_title} via PayPal on {transaction_date}. The buyer did not receive download link because his/her account is not verified with PayPal. Please contact buyer and send download link manually.', 'paiddownloads').PHP_EOL.PHP_EOL.__('Thanks,', 'paiddownloads').PHP_EOL.'Paid Downloads Plugin');
								$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
								$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
								$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
								wp_mail($this->options['seller_email'], __('Completed PayPal payment received from unverified customer', 'paiddownloads'), $body, $mail_headers);
							}
						}
						else if ($payment_status == "Failed" || $payment_status == "Pending" || $payment_status == "Processed" || $payment_status == "Unrecognized")
						{
							$tags = array("{first_name}", "{last_name}", "{payer_email}", "{product_title}", "{product_price}", "{product_currency}", "{payment_status}", "{transaction_date}");
							$vals = array($first_name, $last_name, $payer_paypal, $file_details["title"], $gross_total, $mc_currency, $payment_status, date("Y-m-d H:i:s")." (server time)");

							$body = str_replace($tags, $vals, $this->options['failed_email_body']);
							$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
							$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
							$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
							wp_mail($payer_paypal, $this->options['failed_email_subject'], $body, $mail_headers);

							$body = str_replace($tags, $vals, __('Dear Administrator!', 'paiddownloads').PHP_EOL.PHP_EOL.__('We would like to inform you that {first_name} {last_name} ({payer_email}) paid for {product_title} via PayPal on {transaction_date}. This is non-completed payment.', 'paiddownloads').PHP_EOL.__('Payment ststus: {payment_status}', 'paiddownloads').PHP_EOL.PHP_EOL.__('Download link was not generated.', 'paiddownloads').PHP_EOL.PHP_EOL.__('Thanks,', 'paiddownloads').PHP_EOL.'Paid Downloads Plugin');
							$mail_headers = "Content-Type: text/plain; charset=utf-8\r\n";
							$mail_headers .= "From: ".$this->options['from_name']." <".$this->options['from_email'].">\r\n";
							$mail_headers .= "X-Mailer: PHP/".phpversion()."\r\n";
							wp_mail($this->options['seller_email'], __('Non-completed PayPal payment received', 'paiddownloads'), $body, $mail_headers);
						}
					}
				}
			}
			exit;
		}

	}

	function front_header() {
		echo '
		<link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="'.plugins_url('/css/style.css?ver='.PD_VERSION, __FILE__).'" media="screen" />';
	}
	
	function shortcode_handler($_atts) {
		global $post, $wpdb, $current_user;
		if ($this->check_settings() === true)
		{
			$id = intval($_atts["id"]);
			$return_url = "";
			if (!empty($_atts["return_url"])) {
				$return_url = $_atts["return_url"];
				if (!preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $return_url) || strlen($return_url) == 0) $return_url = "";
			}
			if (empty($return_url)) $return_url = 'http://'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
			$file_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . "pd_files WHERE id = '".$id."'", ARRAY_A);
			if (intval($file_details["id"]) == 0) return "";
			if ($file_details["price"] == 0) return '<a href="'.get_bloginfo("wpurl").'/?paiddownloads_id='.$file_details["id"].'">'.__('Download', 'paiddownloads').' '.htmlspecialchars($file_details["title"]).'</a>';
			$sql = "SELECT COUNT(id) AS sales FROM ".$wpdb->prefix."pd_transactions WHERE file_id = '".$file_details["id"]."' AND (payment_status = 'Completed' OR payment_status = 'Success')";
			$sales = $wpdb->get_row($sql, ARRAY_A);
			if (intval($sales["sales"]) < $file_details["available_copies"] || $file_details["available_copies"] == 0)
			{
				if ($this->options['enable_interkassa'] == "on") {
					if ($file_details["currency"] != $this->options['interkassa_currency']) {
						$rates_string = get_option('paiddownloads_rates');
						$rates = explode(":", $rates_string);
						$date = date("Y-m-d");
						$index = false;
						foreach ($rates as $key => $rate) {
							if (substr($rate, 0, 7) == $file_details["currency"].",".$this->options['interkassa_currency']) {
								$index = $key;
								break;
							}
						}
						if ($index === false) {
							$rate = $this->get_currency_rate($file_details["currency"], $this->options['interkassa_currency']);
							if ($rate) update_option('paiddownloads_rates', (!empty($rates_string) ? ':' : '').$file_details["currency"].",".$this->options['interkassa_currency'].",".$rate.",".$date);
						} else {
							$components = explode(",", $rates[$index]);
							if (sizeof($components) != 4) $rate = $this->get_currency_rate($file_details["currency"], $this->options['interkassa_currency']);
							else {
								if ($components[3] != $date) {
									$rate = $this->get_currency_rate($file_details["currency"], $this->options['interkassa_currency']);
									if (!$rate) $rate = $components[2];
								}
								else $rate = $components[2];
							}
							if ($rate != $components[2] && $rate > 0 && !$rate) {
								$rates[$index] = $file_details["currency"].",".$this->options['interkassa_currency'].",".$rate.",".$date;
								update_option('paiddownloads_rates', implode(":", $rates));
							}
						}
					} else $rate = 1;
					if ($rate === false || $rate == 0) $this->options['enable_interkassa'] = "off";
				}
				if (!in_array($file_details["currency"], $this->paypal_currency_list)) $this->options['enable_paypal'] = "off";
				if (!in_array($file_details["currency"], $this->alertpay_currency_list)) $this->options['enable_alertpay'] = "off";
				$methods = 0;
				if ($this->options['enable_paypal'] == "on") $methods++;
				if ($this->options['enable_alertpay'] == "on") $methods++;
				if ($this->options['enable_interkassa'] == "on") $methods++;
				if ($methods == 0) return '';

				$button = '';
				$terms = htmlspecialchars($this->options['terms'], ENT_QUOTES);
				$terms = str_replace("\n", "<br />", $terms);
				$terms = str_replace("\r", "", $terms);
				if (!empty($this->options['terms'])) {
					$terms_id = "t".rand(100,999).rand(100,999).rand(100,999);
					$button .= '
					<div id="'.$terms_id.'" style="display: none;">
						<div class="paiddownloads_terms">'.$terms.'</div>
					</div>'.__('By clicking the button below, I agree with the', 'paiddownloads').' <a href="#" onclick="jQuery(\'#'.$terms_id.'\').slideToggle(300); return false;">'.__('Terms & Conditions', 'paiddownloads').'</a>.<br />';
				}
				$button_id = "b".md5(rand(100,999).microtime());
				$button .= '
				<script type="text/javascript">
					var active_'.$button_id.' = "'.($this->options['enable_paypal'] == "on" ? 'paypal_'.$button_id : ($this->options['enable_alertpay'] == "on" ? 'alertpay_'.$button_id : 'interkassa_'.$button_id)).'";
					function paiddownloads_'.$button_id.'() {
						if (jQuery("#method_paypal_'.$button_id.'").attr("checked")) active_'.$button_id.' = "paypal_'.$button_id.'";
						else if (jQuery("#method_alertpay_'.$button_id.'").attr("checked")) active_'.$button_id.' = "alertpay_'.$button_id.'";
						else if (jQuery("#method_interkassa_'.$button_id.'").attr("checked")) active_'.$button_id.' = "interkassa_'.$button_id.'";
						if (active_'.$button_id.' == "interkassa_'.$button_id.'") {
							if (!jQuery("#paiddownloads_email_'.$button_id.'")) {
								alert("'.esc_attr(__('Please enter valid e-mail. Download link will be sent to this e-mail address.', 'paiddownloads')).'");
								return;
							}
							var paiddownloads_email = jQuery("#paiddownloads_email_'.$button_id.'").val();
							var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
							if (!paiddownloads_email.match(re)) {
								alert("'.esc_attr(__('Please enter valid e-mail. Download link will be sent to this e-mail address.', 'paiddownloads')).'");
								return;
							}
							jQuery("#ik_baggage_fields_'.$button_id.'").val(paiddownloads_email);
						}
						jQuery("#" + active_'.$button_id.').click();
						return;
					}
					function paiddownloads_toggle_paiddownloads_email_'.$button_id.'() {
						if (jQuery("#paiddownloads_email_container_'.$button_id.'")) {
							if (jQuery("#method_interkassa_'.$button_id.'").attr("checked")) jQuery("#paiddownloads_email_container_'.$button_id.'").slideDown(100);
							else  jQuery("#paiddownloads_email_container_'.$button_id.'").slideUp(100);
						}
					}
				</script>';
				$checked = ' checked="checked"';
				if ($methods > 1) {
					$button .='
				<div style="overflow: hidden; height: 100%; margin-top: 10px;">';
					if ($this->options['enable_paypal'] == "on") {
						$button .='
					<div style="background: transparent url('.plugins_url('/images/logo_paypal.png', __FILE__).') 25px 1px no-repeat; height: 26px; width: 110px; float: left; margin-right: 30px;">
						<input type="radio" id="method_paypal_'.$button_id.'" name="method_'.$button_id.'" style="margin: 4px 0px;" onclick="paiddownloads_toggle_paiddownloads_email_'.$button_id.'();"'.$checked.'>
					</div>';
						$checked = '';
					}
					if ($this->options['enable_alertpay'] == "on") {
						$button .='
					<div style="background: transparent url('.plugins_url('/images/logo_alertpay.png', __FILE__).') 25px -1px no-repeat; height: 26px; width: 155px; float: left; margin-right: 30px;">
						<input type="radio" id="method_alertpay_'.$button_id.'" name="method_'.$button_id.'" style="margin: 4px 0px;" onclick="paiddownloads_toggle_paiddownloads_email_'.$button_id.'();"'.$checked.'>
					</div>';
						$checked = '';
					}
					if ($this->options['enable_interkassa'] == "on") {
						$button .='
					<div style="background: transparent url('.plugins_url('/images/logo_interkassa.png', __FILE__).') 25px 0px no-repeat; height: 26px; width: 120px; float: left;">
						<input type="radio" id="method_interkassa_'.$button_id.'" name="method_'.$button_id.'" style="margin: 4px 0px;" onclick="paiddownloads_toggle_paiddownloads_email_'.$button_id.'();"'.$checked.'>
					</div>';
						$checked = '';
					}
					$button .= '
				</div>';
				}
				if ($this->options['enable_paypal'] == "on") {
					$button .= '
				<form action="'.(($this->options['paypal_sandbox'] == "on") ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr').'" method="post" style="display:none;">
					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="business" value="'.$this->options['paypal_id'].'">';
					if ($this->options['paypal_address'] == "on") {
						$button .= '
					<input type="hidden" name="no_shipping" value="2">';
					} else {
						$button .= '
					<input type="hidden" name="no_shipping" value="1">';
					}
					$button .= '
					<input type="hidden" name="rm" value="2">
					<input type="hidden" name="item_name" value="'.htmlspecialchars($file_details["title"], ENT_QUOTES).'">
					<input type="hidden" name="item_number" value="'.$file_details["id"].'">
					<input type="hidden" name="amount" value="'.$file_details["price"].'">
					<input type="hidden" name="currency_code" value="'.$file_details["currency"].'">
					<input type="hidden" name="custom" value="">
					<input type="hidden" name="charset" value="utf-8">					
					<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">
					<input type="hidden" name="return" value="'.$return_url.'">
					<input type="hidden" name="cancel_return" value="http://'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"].'">
					<input type="hidden" name="notify_url" value="'.get_bloginfo("wpurl").'/?paiddownloads_ipn=paypal">
					<input id="paypal_'.$button_id.'" type="submit" value="Buy Now" style="margin: 0px; padding: 0px;">
				</form>';
				}
				if ($this->options['enable_alertpay'] == "on") {
					$button .= '
				<form action="https://www.alertpay.com/PayProcess.aspx" method="post" style="display:none;">
					<input type="hidden" name="ap_merchant" value="'.$this->options['alertpay_id'].'">
					<input type="hidden" name="ap_purchasetype" value="item">
					<input type="hidden" name="ap_itemname" value="'.htmlspecialchars($file_details["title"], ENT_QUOTES).'">
					<input type="hidden" name="ap_amount" value="'.number_format($file_details["price"], 2, ".", "").'">
					<input type="hidden" name="ap_currency" value="'.$file_details["currency"].'">
					<input type="hidden" name="ap_itemcode" value="ID'.$file_details["id"].'">
					<input type="hidden" name="ap_returnurl" value="'.$return_url.'">
					<input type="hidden" name="ap_cancelurl" value="http://'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"].'">
					<input type="hidden" name="ap_alerturl" value="'.get_bloginfo("wpurl").'/?paiddownloads_ipn=alertpay">
					<input type="hidden" name="ap_ipnversion" value="2">
					<input id="alertpay_'.$button_id.'" type="submit" value="Buy Now" style="margin: 0px; padding: 0px;">
				</form>';
				}
				if ($this->options['enable_interkassa'] == "on") {
					$price = $rate*$file_details["price"];
					$button .= '
				<div id="paiddownloads_email_container_'.$button_id.'" style="display: '.($methods == 1 ? 'block' : 'none').';"><input type="text" id="paiddownloads_email_'.$button_id.'" style="font-family: arial, verdana; font-size: 14px; line-height: 14px; margin: 5px 0px; padding: 3px 5px; background: #FFF; border: 1px solid #888; width: 200px; -webkit-border-radius: 3px; border-radius: 3px; color: #666;" value="'.esc_attr(__('Enter your e-mail here', 'paiddownloads')).'" onfocus="if (this.value == \''.esc_attr(__('Enter your e-mail here', 'paiddownloads')).'\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \''.esc_attr(__('Enter your e-mail here', 'paiddownloads')).'\';}"></div>
				'.($methods > 1 ? '
				<script type="text/javascript">
					if (jQuery("#method_interkassa_'.$button_id.'")) {
						paiddownloads_toggle_paiddownloads_email_'.$button_id.'();
					}
				</script>' : '').'
				<form action="http://www.interkassa.com/lib/payment.php" method="post" style="display:none;">
					<input type="hidden" name="ik_shop_id" value="'.$this->options['interkassa_shop_id'].'">
					<input type="hidden" name="ik_payment_amount" value="'.number_format($price, 2, ".", "").'">
					<input type="hidden" name="ik_payment_id" value="'.$file_details["id"].'_'.time().'">
					<input type="hidden" name="ik_payment_desc" value="'.htmlspecialchars($file_details["title"], ENT_QUOTES).'">
					<input type="hidden" name="ik_paysystem_alias" value="">
					<input type="hidden" id="ik_baggage_fields_'.$button_id.'" name="ik_baggage_fields" value="">
					<input type="hidden" name="ik_success_url" value="'.$return_url.'">
					<input type="hidden" name="ik_success_method" value="LINK">
					<input type="hidden" name="ik_fail_url" value="http://'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"].'">
					<input type="hidden" name="ik_fail_method" value="LINK">
					<input type="hidden" name="ik_status_url" value="'.get_bloginfo("wpurl").'/?paiddownloads_ipn=interkassa">
					<input type="hidden" name="ik_status_method" value="POST">
					<input id="interkassa_'.$button_id.'" type="submit" value="Buy Now" style="margin: 0px; padding: 0px;">
				</form>';
				}
				if ($this->options['buynow_type'] == "custom") $button .= '<input type="image" src="'.get_bloginfo("wpurl").'/wp-content/uploads/paid-downloads/'.rawurlencode($this->options['buynow_image']).'" name="submit" alt="'.htmlspecialchars($file_details["title"], ENT_QUOTES).'" style="margin: 5px 0px; padding: 0px; border: 0px;" onclick="paiddownloads_'.$button_id.'(); return false;">';
				else if ($this->options['buynow_type'] == "paypal") $button .= '<input type="image" src="'.plugins_url('/images/btn_buynow_LG.gif', __FILE__).'" name="submit" alt="'.htmlspecialchars($file_details["title"], ENT_QUOTES).'" style="margin: 5px 0px; padding: 0px; border: 0px;" onclick="paiddownloads_'.$button_id.'(); return false;">';
				else if ($this->options['buynow_type'] == "css3") $button .= '
				<div style="border: 0px; margin: 5px 0px; padding: 0px; height: 100%; overflow: hidden;">
				<a href="#" class="paiddownloads-btn" onclick="paiddownloads_'.$button_id.'(); return false;">
					<span class="paiddownloads-btn-text">'.__('Buy Now', 'paiddownloads').'</span>
					<span class="paiddownloads-btn-slide-text">'.number_format($file_details["price"], 2, ".", "").' '.$file_details["currency"].'</span>
					<span class="paiddownloads-btn-icon-right"><span></span></span>
				</a>
				</div>';
				else $button .= '<input type="button" value="'.__('Buy Now', 'paiddownloads').'" style="margin: 5px 0px; padding: 0px;" onclick="paiddownloads_'.$button_id.'(); return false;">';
			}
			else $button = "";
			return $button;
		}
		return "";
	}	

	function generate_downloadlink($_fileid, $_owner, $_source) {
		global $wpdb;
		$file_details = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."pd_files WHERE id = '".intval($_fileid)."'", ARRAY_A);
		if (intval($file_details["id"]) == 0) return false;
		$download_key = md5(microtime().rand(1,10000)).md5(microtime().$file_details["title"]);
		$sql = "INSERT INTO ".$wpdb->prefix."pd_downloadlinks (
			file_id, download_key, owner, source, created) VALUES (
			'".$_fileid."',
			'".$download_key."',
			'".mysql_real_escape_string($_owner)."',
			'".$_source."',
			'".time()."'
		)";
		$wpdb->query($sql);
		return get_bloginfo("wpurl").'/?paiddownloads_key='.$download_key;
	}

	function page_switcher ($_urlbase, $_currentpage, $_totalpages) {
		$pageswitcher = "";
		if ($_totalpages > 1) {
			$pageswitcher = '<div class="tablenav bottom"><div class="tablenav-pages">'.__('Pages:', 'paiddownloads').' <span class="pagiation-links">';
			if (strpos($_urlbase,"?") !== false) $_urlbase .= "&amp;";
			else $_urlbase .= "?";
			if ($_currentpage == 1) $pageswitcher .= "<a class='page disabled'>1</a> ";
			else $pageswitcher .= " <a class='page' href='".$_urlbase."p=1'>1</a> ";

			$start = max($_currentpage-3, 2);
			$end = min(max($_currentpage+3,$start+6), $_totalpages-1);
			$start = max(min($start,$end-6), 2);
			if ($start > 2) $pageswitcher .= " <b>...</b> ";
			for ($i=$start; $i<=$end; $i++) {
				if ($_currentpage == $i) $pageswitcher .= " <a class='page disabled'>".$i."</a> ";
				else $pageswitcher .= " <a class='page' href='".$_urlbase."p=".$i."'>".$i."</a> ";
			}
			if ($end < $_totalpages-1) $pageswitcher .= " <b>...</b> ";

			if ($_currentpage == $_totalpages) $pageswitcher .= " <a class='page disabled'>".$_totalpages."</a> ";
			else $pageswitcher .= " <a class='page' href='".$_urlbase."p=".$_totalpages."'>".$_totalpages."</a> ";
			$pageswitcher .= "</span></div></div>";
		}
		return $pageswitcher;
	}
	
	function get_filename($_path, $_filename) {
		$filename = preg_replace('/[^a-zA-Z0-9\s\-\.\_]/', ' ', $_filename);
		$filename = preg_replace('/(\s\s)+/', ' ', $filename);
		$filename = trim($filename);
		$filename = preg_replace('/\s+/', '-', $filename);
		$filename = preg_replace('/\-+/', '-', $filename);
		if (strlen($filename) == 0) $filename = "file";
		else if ($filename[0] == ".") $filename = "file".$filename;
		while (file_exists($_path.$filename)) {
			$pos = strrpos($filename, ".");
			if ($pos !== false) {
				$ext = substr($filename, $pos);
				$filename = substr($filename, 0, $pos);
			} else {
				$ext = "";
			}
			$pos = strrpos($filename, "-");
			if ($pos !== false) {
				$suffix = substr($filename, $pos+1);
				if (is_numeric($suffix)) {
					$suffix++;
					$filename = substr($filename, 0, $pos)."-".$suffix.$ext;
				} else {
					$filename = $filename."-1".$ext;
				}
			} else {
				$filename = $filename."-1".$ext;
			}
		}
		return $filename;
	}

	function period_to_string($period) {
		$period_str = "";
		$days = floor($period/(24*3600));
		$period -= $days*24*3600;
		$hours = floor($period/3600);
		$period -= $hours*3600;
		$minutes = floor($period/60);
		if ($days > 1) $period_str = $days.' '.__('days', 'paiddownloads').', ';
		else if ($days == 1) $period_str = $days.' '.__('day', 'paiddownloads').', ';
		if ($hours > 1) $period_str .= $hours.' '.__('hours', 'paiddownloads').', ';
		else if ($hours == 1) $period_str .= $hours.' '.__('hour', 'paiddownloads').', ';
		else if (!empty($period_str)) $period_str .= '0 '.__('hours', 'paiddownloads').', ';
		if ($minutes > 1) $period_str .= $minutes.' '.__('minutes', 'paiddownloads');
		else if ($minutes == 1) $period_str .= $minutes.' '.__('minute', 'paiddownloads');
		else $period_str .= '0 '.__('minutes', 'paiddownloads');
		return $period_str;
	}

	function get_license_info($_url, $_postdata) {
		$uagent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)";
		$ch = curl_init($_url);
		curl_setopt($ch, CURLOPT_URL, $_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_ENCODING, "");
		curl_setopt($ch, CURLOPT_USERAGENT, $uagent);
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $_postdata);
		$content = curl_exec( $ch );
		$err     = curl_errno( $ch );
		$errmsg  = curl_error( $ch );
		$header  = curl_getinfo( $ch );
		curl_close( $ch );

		$header['errno']   = $err;
		$header['errmsg']  = $errmsg;
		$header['content'] = $content;
		return $header;
	}
	
	function get_currency_rate($_from, $_to) {
		$url = 'http://www.google.com/ig/calculator?hl=en&q=1'.$_from.'=?'.$_to;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_ENCODING, "");
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)');
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $_postdata);
		$data  = curl_exec( $ch );
		curl_close( $ch );
		preg_match("!rhs: \"(.*?)\s!si", $data, $rate);
		$rate = floatval($rate[1]);
		if ($rate <= 0) return false;
		return $rate;
	}
}
if (class_exists("paiddownloadspro_class")) {
	add_action('admin_notices', 'paiddownloads_warning');
} else {
	$paiddownloads = new paiddownloads_class();
}
function paiddownloads_warning() {
	echo '
	<div class="updated"><p>'.__('Please deactivate either <strong>Paid Downloads Pro</strong> plugin or <strong>Paid Downloads</strong> plugin.', 'paiddownloads').'</p></div>';
}
?>