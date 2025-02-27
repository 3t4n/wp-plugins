<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * As long as you make sure each setting has a constant here that starts with STTING_ they will be removed once the plugin gets removed
 *
 * @package    Daisycon_Woocommerce
 * @subpackage Daisycon_Woocommerce/includes
 * @author     daisycon
 */
class Daisycon_Woocommerce_Plugin_Settings
{
	/**
	 * @const string
	 */
	const SETTING_HMAC_SECRET = 'hmac_secret';

	/**
	 * @const string
	 */
	const SETTING_DAISYCON_ACCESS_TOKEN = 'dc_access_token';

	/**
	 * @const string
	 */
	const SETTING_DAISYCON_REFRESH_TOKEN = 'dc_refresh_token';

	/**
	 * @const string
	 */
	const SETTING_DAISYCON_ADVERTISER_ID = 'advertiser_id';

	/**
	 * @var wpdb
	 */
	private $database;

	/**
	 * @var string
	 */
	private $table;

	protected $debugLog;

	protected static $settingsCache = [];

	public function __construct()
	{
		global $wpdb;
		$this->database = $wpdb;
		$this->table = $this->database->prefix . 'daisycon_settings';

		$this->debugLog = new Daisycon_Woocommerce_Debug_Log();
	}

	/**
	 * @return $this
	 */
	public function deleteAllSettings(): Daisycon_Woocommerce_Plugin_Settings
	{
		$reflection = new ReflectionClass(self::class);
		$key = 'SETTING_';
		foreach ($reflection->getConstants() as $constantName => $constantValue) {
			if (substr($constantName, 0, strlen($key)) === $key) {
				$this->deleteSetting($constantValue);
			}
		}
		return $this;
	}

	/**
	 * @param string $name
	 *
	 * @throws \Exception
	 * @return string|null
	 */
	public function getSetting(string $name)
	{
		if (strlen($name) > 32) {
			throw new Exception('Max length for a setting name is 32 chars ' . $name . ' is ' . strlen($name) . ' chars');
		}

		if (true === isset(self::$settingsCache[$name])) {
			return self::$settingsCache[$name];
		}

		// disable cache for get setting
		$this->database->flush();
		$setting = $this->database->get_row(
			$this->database->prepare('SELECT SQL_NO_CACHE * FROM ' . $this->table . ' WHERE name = %s', $name)
		);
		if (false === empty($setting) && false === empty($setting->value))
		{
			self::$settingsCache[$name] = $setting->value;
			return $setting->value;
		}
		return null;
	}

	/**
	 * @param string $name
	 * @param string $value
	 *
	 * @return void
	 */
	public function saveSetting(string $name, string $value)
	{
		$result = $this->database->replace(
			$this->table,
			[
				'name' => $name,
				'value' => $value
			]
		);

		if (false === $result) {
			$this->debugLog->log("Query failed {$this->database->last_error} {$this->database->last_query}");
		}
		self::$settingsCache[$name] = $value;
	}

	/**
	 * @param string $name
	 *
	 * @return void
	 */
	public function deleteSetting(string $name)
	{
		if (true === isset(self::$settingsCache[$name])) {
			unset(self::$settingsCache[$name]);
		}

		$this->debugLog->log("Deleting $name");
		$result = $this->database->delete(
			$this->table,
			['name' => $name]
		);
		if (false === $result) {
			$this->debugLog->log("Query failed {$this->database->last_error} {$this->database->last_query}");
		}
	}
}
