<?php

/**
 * Plugin Name:       Fragment's Product Advertising for Amazon
 * Description:       Amazonの商品を検索してブロックに追加します。利用には、<strong>Amazon Product Advertisingのアクセスキー・シークレットキーが必要です</strong>。<a href="admin.php?page=custom-fragment-amzn-config">設定ページ</a>からキーを設定して、有効化してください。
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:			  1.0.3
 * Author:            <a href="https://tech.fragment.co.jp/" target="_blank">fragment</a>
 * License:           GPL-3.0
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       fragment-amzn
 */

require_once dirname(__FILE__) . '/libs/request.php';

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

add_action('init', 'FragmentAmzn::init');


class FragmentAmzn
{
	const PLUGIN_ID         = 'fragment-amzn';
	const CONFIG_MENU_SLUG  = self::PLUGIN_ID . '-config';
	const CREDENTIAL_ACTION = self::PLUGIN_ID . '-nonce-action';
	const CREDENTIAL_NAME   = self::PLUGIN_ID . '-nonce-key';
	const PLUGIN_DB_PREFIX  = self::PLUGIN_ID . '_';

	static function init()
	{
		return new self();
	}

	function __construct()
	{
		wp_enqueue_style('style_css', plugin_dir_url(__FILE__) . 'build/style-index.css');
		if (is_admin() && is_user_logged_in()) {
			register_block_type(__DIR__);

			wp_enqueue_script('fragment-amzn_edit', plugin_dir_url(__FILE__) . 'src/edit.js');
			wp_localize_script('fragment-amzn_edit', 'fragment_amzn_init_data', [
				'nonce' => wp_create_nonce('fragment-amzn'),
				'noimage_url' => plugin_dir_url(__FILE__) . 'libs/noimage.gif',
				'amazon_associate_id' => get_option(self::PLUGIN_DB_PREFIX . "amazon_associate_id"),
				'rakuten_affiliate_id' => get_option(self::PLUGIN_DB_PREFIX . "rakuten_affiliate_id") ? get_option(self::PLUGIN_DB_PREFIX . "rakuten_affiliate_id") : "05ef13e0.3d6d2ca5.05ef13e1.4c13d962",
			]);

			add_filter('plugin_action_links_'.plugin_basename( plugin_dir_path( __FILE__ ) . 'fragment-amzn.php'), array( $this, 'admin_plugin_settings_link' ) );
			add_action('admin_menu', [$this, 'set_plugin_sub_menu']);
			add_action('admin_init', [$this, 'save_config']);
			add_action('wp_ajax_fragment_amzn_search_amazon_items', [$this, 'search_amazon_items']);
		}
	}
	
	function admin_plugin_settings_link( $links ) { 
  		$settings_link = '<a href="admin.php?page=custom-fragment-amzn-config">設定</a>';
  		array_unshift( $links, $settings_link ); 
  		return $links; 
	}

	function set_plugin_sub_menu()
	{
		wp_enqueue_style('admin_css', plugin_dir_url(__FILE__) . 'build/index.css');

		add_submenu_page(
			'options-general.php',  /* 親メニュー */
			'FragmentAmzn',
			'FragmentAmzn',
			'manage_options',
			'custom-fragment-amzn-config',
			[$this, 'show_config_form']
		);
	}

	/** 設定画面の表示 */
	function show_config_form()
	{
?>
		<div class="fragment-amzn-settings-header">
			<div class="fragment-amzn-settings-title-section">
				<h1>
					FragmentAmzn
				</h1>
			</div>

			<nav class="fragment-amzn-settings-tabs-wrapper hide-if-no-js" aria-label="<?php esc_attr_e('Secondary menu'); ?>">
				<a href="?page=custom-fragment-amzn-config" class="fragment-amzn-settings-tab <?php if ($_GET["tab"] == "") { ?>active<?php } ?>">
					API設定
				</a>

				<a href="?page=custom-fragment-amzn-config&tab=affiliate" class="fragment-amzn-settings-tab <?php if ($_GET["tab"] != "") { ?>active<?php } ?>">
					アフィリエイト設定
				</a>
			</nav>
		</div>

		<div class="fragment-amzn-settings-body hide-if-no-js">
			<form action="" method='post'>
<?php
		if ($_GET["tab"] == "") {
?>
				<h2>API設定(検索する為に必須)</h2>
				<p>
					Amazonから商品を検索する際に必要となります。Amazonアソシエイトの<a href="https://affiliate.amazon.co.jp/assoc_credentials/home" target="_blank">Product Advertising APIページ</a>からアクセスキー・シークレットキーを取得し、設定してください。
				</p>
				<hr>
				<h2 class="title">Amazon APIキー</h2>
				<table class="form-table tools-fragment-amzn-page" role="presentation">
					<tbody>
						<tr>
							<th scope="row">
								<label for="amazon_access_key">
								アクセスキー： 
								</label>
							</th>
							<td>
								<input type="text" id="amazon_access_key" name="amazon_access_key" value="<?php echo get_option(self::PLUGIN_DB_PREFIX . "amazon_access_key"); ?>" />
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="amazon_secret_key">
								シークレットキー： 
								</label>
							</th>
							<td>
								<input type="text" id="amazon_secret_key" name="amazon_secret_key" value="<?php echo get_option(self::PLUGIN_DB_PREFIX . "amazon_secret_key"); ?>" />
							</td>
						</tr>
					</tbody>
				</table>

<?php
		} else {
?>

				<h2>アフィリエイト設定</h2>
				<p>
					商品リンクにアフィリエイトIDを付与する際に必要となります。
				</p>
				<hr>
				<h2 class="title">AmazonアソシエイトID</h2>
				<p>
					<a href="https://affiliate.amazon.co.jp/home/account/tag/manage" target="_blank">トラッキングIDの管理ページ</a>からトラッキングIDを取得し、設定してください。
				</p>
				<table class="form-table tools-fragment-amzn-page" role="presentation">
					<tbody>
						<tr>
							<th scope="row">
								<label for="amazon_associate_id">
								トラッキングID： 
								</label>
							</th>
							<td>
								<input type="text" id="amazon_associate_id" name="amazon_associate_id" value="<?php echo get_option(self::PLUGIN_DB_PREFIX . "amazon_associate_id"); ?>" />
							</td>
						</tr>
					</tbody>
				</table>

				<hr>

				<h2 class="title">楽天アフィリエイトID</h2>
				<p>
					<a href="https://webservice.rakuten.co.jp/account_affiliate_id/" target="_blank">アフィリエイトIDの確認ページ</a>からアフィリエイトIDを取得し、設定してください。
				</p>
				<table class="form-table tools-fragment-amzn-page" role="presentation">
					<tbody>
						<tr>
							<th scope="row">
								<label for="rakuten_affiliate_id">
								アフィリエイトID： 
								</label>
							</th>
							<td>
								<input type="text" id="rakuten_affiliate_id" name="rakuten_affiliate_id" value="<?php echo get_option(self::PLUGIN_DB_PREFIX . "rakuten_affiliate_id"); ?>" />
							</td>
						</tr>
					</tbody>
				</table>

<?php
		}
?>

				<p><input type='submit' value='保存' class='button button-primary button-large'></p>
				<input type="hidden" name="tab" value="<?php echo esc_attr($_GET["tab"])?>" />
				<?php wp_nonce_field(self::CREDENTIAL_ACTION, self::CREDENTIAL_NAME) ?>
			</form>
		</div>
<?php
	}

	function save_config()
	{
		if (isset($_POST[self::CREDENTIAL_NAME]) && $_POST[self::CREDENTIAL_NAME]) {
			if (check_admin_referer(self::CREDENTIAL_ACTION, self::CREDENTIAL_NAME)) {
				if ($_POST["tab"] == "") {
					update_option(self::PLUGIN_DB_PREFIX . 'amazon_access_key', sanitize_text_field($_POST['amazon_access_key']));
					update_option(self::PLUGIN_DB_PREFIX . 'amazon_secret_key', sanitize_text_field($_POST['amazon_secret_key']));
				} else {
					update_option(self::PLUGIN_DB_PREFIX . 'amazon_associate_id', sanitize_text_field($_POST['amazon_associate_id']));
					update_option(self::PLUGIN_DB_PREFIX . 'rakuten_affiliate_id', sanitize_text_field($_POST['rakuten_affiliate_id']));
				}
			}
		}
	}

	function search_amazon_items()
	{
		check_ajax_referer('fragment-amzn', 'security');

		$searchItemRequest = new FragmentAmznSearchItemsRequest();
		$searchItemRequest->PartnerType = "Associates";
		$searchItemRequest->PartnerTag = get_option(self::PLUGIN_DB_PREFIX . "amazon_associate_id");
		$searchItemRequest->Keywords = sanitize_text_field($_POST['keywords']);
		$searchItemRequest->SearchIndex = "All";
		$searchItemRequest->Resources = ["Images.Primary.Medium", "Images.Primary.Large", "ItemInfo.Title", "Offers.Listings.Price"];
		$searchItemRequest->ItemPage = intval(sanitize_text_field($_POST['page']));
		$host = "webservices.amazon.co.jp";
		$path = "/paapi5/searchitems";
		$payload = json_encode($searchItemRequest);
		$awsv4 = new FragmentAmznV4(get_option(self::PLUGIN_DB_PREFIX . "amazon_access_key"), get_option(self::PLUGIN_DB_PREFIX . "amazon_secret_key"));
		$awsv4->setPath($path);
		$awsv4->setPayload($payload);
		$headers = $awsv4->getHeaders();
		$headerString = "";
		foreach ($headers as $key => $value) {
			$headerString .= $key . ': ' . $value . "\r\n";
		}
		$params = array(
			'http' => array(
				'header' => $headerString,
				'method' => 'POST',
				'content' => $payload
			)
		);
		$stream = stream_context_create($params);

		$fp = @fopen('https://' . $host . $path, 'rb', false, $stream);

		if (!$fp) {
			throw new Exception("Exception Occured");
		}
		$response = @stream_get_contents($fp);
		if ($response === false) {
			throw new Exception("Exception Occured");
		}

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($response);
		exit;
	}
}
?>