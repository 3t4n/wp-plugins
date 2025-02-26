<?php

require __DIR__ . '/class.view.php';
require __DIR__ . '/class.log.php';
require __DIR__ . '/class.logRecord.php';
require __DIR__ . '/class.htaccess.php';
require __DIR__ . '/class.serverVars.php';

if (!class_exists('AlphaCacheClass'))  {
class AlphaCacheClass
{
	const actual_version = 1.3;
	const status = 'production';

	private const CANDO_REASON_BOT = 'Bot agent.';
	private const CANDO_REASON_ADMINPAGE = 'Admin page.';

	var $active;
	var $ac_set; //settings
	var $timer;  //store timer value here
	var $mutex_handler = false, $mutex_options = false;

	var $optionFilename = '';

	var $messages = array();

  static function getAssetPath($assetFileName) {
		return plugin_dir_url(__FILE__) . 'assets/' . $assetFileName;
	}

	static function version()
	{
		return self::actual_version;
	}

  public function __construct()
  {
		$this->timer = microtime(true);
		$this->active = true;
		$this->optionFilename = dirname(__FILE__) . '/settings.php';

		$this->load_settings();

		if (function_exists('add_action')) {
			//Actions
			add_action('init', array($this, 'init_hook'), 0);
			//add_action('plugins_loaded', array($this, 'init_hook'), 0);

			if (is_admin()) {
				add_action( 'admin_menu', array($this, '_add_menu'));
				add_action( 'admin_init', array($this, 'upgrade'), 0);
				add_action( 'admin_notices', array($this, 'admin_notice'), 10);
				add_action( 'admin_footer', array($this, 'htaccess'));
				add_filter( 'plugin_action_links', array($this, 'add_action_links'), 10, 2 );
			}

			//Activity hooks
			if (!empty($this->ac_set['chTRACK'])) {

				//changing post
				add_action('delete_post', array($this, 'post_hook'));
				add_action('post_updated', array($this, 'post_hook'));

				//changing comment
				add_action('wp_set_comment_status', array($this, 'comment_status_hook'));
				add_action('wp_insert_comment', array($this, 'comment_status_hook'));
				add_action('trash_comment', array($this, 'comment_status_hook'));
				add_action('spam_comment', array($this, 'comment_status_hook'));
				add_action('edit_comment', array($this, 'comment_status_hook'));
			}
		}
		//start maintain routine
		$this->maintain();
	}

	public function add_action_links($links, $file) {
		if (strpos($file, 'alpha_cache.php' ) === false ) {
			return $links;
		}
		$mylinks = array(
			'<a href="' . admin_url( 'options-general.php?page=alpha-cache/ac.class.php' ) . '">' . __('Settings') . '</a>',
		);
		return array_merge( $links, $mylinks );
	}

	/* comment status hook */
	public function comment_status_hook($comment_id) {
		global $wpdb;

		$comment_id += 0;
		$post_id = $wpdb->get_var("SELECT comment_post_ID FROM {$wpdb->prefix}comments WHERE comment_ID = {$comment_id}");
		$uri = $this->posturi($post_id);
		$this->delete_cache($uri);
	}

	/* site relative uri - get by post_id */
	static function posturi($post_id) {
		$uri = get_permalink($post_id);
		$a = parse_url($uri);
		unset($a['scheme'], $a['host'], $a['fragment']);
		if (!empty($a['query'])) $a['query'] = '?' . $a['query'];
		return implode('', $a);
	}

	/* post hook */
	public function post_hook($post_id) {
		$uri = $this->posturi($post_id);
		$this->delete_cache('/'); //front page
		$this->delete_cache($uri);
	}

	/* admin_menu hook */
	public function _add_menu() {
		add_options_page('Alpha Cache', 'Alpha Cache', 8, __FILE__, array($this, '_options_page'));
	}


	/* output buffer hook */
	public function call_back_ob($data) {
		$this->set_cache($_SERVER['REQUEST_URI'], $data);
		return $data;
	}

	/* output buffer hook without caching */
	public function call_back_ob_nocache($data) {
		return $data;
	}

	/* init hook */
	public function init_hook() {
		global $wpdb;
		$uri = $_SERVER['REQUEST_URI'];
		$canDo = $this->canDo($uri);

		if ($canDo['result'] || $canDo['reason'] == self::CANDO_REASON_BOT) {
			//look into cache
			$data = $this->get_cache($uri);

			if ($data['result']) {
				$this->stat_hit();
				$this->log($data['filename']);
				$this->log('HIT!');
				echo $data['data'] . "\n<!-- Alpha cache content. Generated from cache in " . (microtime(true) - $this->timer) . ' s. '
					. ' DB queries count : ' . $wpdb->num_queries . ' -->';
				exit;
			}

			$this->stat_miss();
			$this->log($data['filename']);

			//start buffering
			if ($canDo['reason'] == self::CANDO_REASON_BOT) {
				$this->log('NOT CACHED! Creating cache is disabled on a bot request.');
				ob_start(array($this, 'call_back_ob_nocache'));
			} else {
				$this->log('MISS! ' . $data['data']);
				ob_start(array($this, 'call_back_ob'));
			}
		} else {
			if ($canDo['reason'] != self::CANDO_REASON_ADMINPAGE) {
				$this->log('Uncachable request: ' . $canDo['reason']);
				$this->log('NOT CACHED!');
			}
		}
	}

	/* can do cache? - return [ result: true/false, reason: string] */
	public function canDo($uri): array {
		global $user_ID, $user_login;

		if (is_admin()) {
			return ['result' => false, 'reason' => self::CANDO_REASON_ADMINPAGE];
		}

		if (str_starts_with($uri, '/wp-cron.php')) {
			return ['result' => false, 'reason' => 'Cron script.'];
		}

		if (empty($this->ac_set['on'])) {
			return ['result' => false, 'reason' => 'Alpha cache has been disabled.'];
		}

		if (!$this->active) {
			return ['result' => false, 'reason' => 'Caching is not needed.'];
		}

		if (is_404()) {
			//prevent cache spamming
			$this->active = false;
			return ['result' => false, 'reason' => '404 page'];
		}

    /* check for bots */
		if ($this->ac_set['disableOnBots'] && preg_match('#googlebot|yahoo|bingbot|baiduspider|yandex|yeti|yodaobot|gigabot|ia_archiver|bot|curl|wget|facebookexternalhit|twitterbot|developers\.google\.com#i', $_SERVER['HTTP_USER_AGENT'])) {
			$this->active = false;
			return ['result' => false, 'reason' => self::CANDO_REASON_BOT];
    }

		//check URL list
		$u = explode("\n", $this->ac_set['avoid_urls']);
		foreach($u as $v) {
			$v = trim($v);
			if ($v && preg_match("#{$v}#is", $uri, $m)) {
				$this->active = false;
				return ['result' => false, 'reason' => 'Avoid url pattern: ' . $v];
			}
		}

		//cache for anonymous users only
		if (!empty($this->ac_set['chAnon']) && $user_ID > 0) {
			$this->active = false;
			return ['result' => false, 'reason' => "User is not anonymous. UserID: $user_ID ($user_login)"];
		}

		if (!empty($user_login)) {
			//check users list
			$u = preg_split("/[\s]*,[\s]*/", $this->ac_set['users_nocache']);
			if (in_array($user_login, $u)) {
				$this->active = false;
				return ['result' => false, 'reason' => "User is in user`s list. Username: $user_login."];
			}
		}

		/* check post vars */
		if (!empty($_POST)) {
			//allow any kind of form to do what they do
			$this->active = false;
			return ['result' => false, 'reason' => 'POST data query.'];
		}

		return ['result' => $this->active, 'reason' => 'OK.'];
	}

	/* successful hit to cache */
	function stat_hit() {
		if (!empty($this->ac_set['doStat'])) {
			if ($this->lockOPT('c+', LOCK_EX)) {
				$data = unserialize(substr(@fread($this->mutex_options, filesize($this->optionFilename)), 8));
				$data['hits'] ++;
				$this->ac_set = $data;
				$data = '<?php /*' . serialize($data);
				ftruncate($this->mutex_options, 0);
				rewind($this->mutex_options);
				fwrite($this->mutex_options, $data);
				$this->unlockOPT();
			}
		}
	}

	/* miss to cache */
	private function stat_miss() {
		if (!empty($this->ac_set['doStat'])) {
			if ($this->lockOPT('c+', LOCK_EX)) {
				$data = unserialize(substr(@fread($this->mutex_options, filesize($this->optionFilename)), 8));
				$data['miss'] ++;
				$this->ac_set = $data;
				$data = '<?php /*' . serialize($data);
				ftruncate($this->mutex_options, 0);
				rewind($this->mutex_options);
				fwrite($this->mutex_options, $data);
				$this->unlockOPT();
			}
		}
	}

	/* Build cache key by provided URL */
	private function getkey(string $uri) {
		static $theme_key = '';

		$p = parse_url($uri);
		//query insensitive case
		if (!empty($this->ac_set['getIns'])) {
			if (empty($this->ac_set['ignore_gets']) || empty($p['query'])) {
				$p['query'] = '';
			} else {
				$params_to_ignore = preg_split('#\s+#', $this->ac_set['ignore_gets']);
				$queries = [];
				parse_str($p['query'], $queries);
				$newQuery = '';
				ksort($queries);
				foreach ($queries as $key => $value) {
					if (in_array($key, $params_to_ignore)) continue;
					$newQuery .= (strlen($newQuery) ? '&' : '') . $key . '=' . $value;
				}
				$p['query'] = $newQuery;
			}
		}

		//normalize
		if (substr($p['path'], 0, 1) == '/')
			$p['path'] = substr($p['path'], 1);
		if (substr($p['path'], -1) == '/')
			$p['path'] = substr($p['path'], 0, -1);

		$queryParams = empty($p['query']) ? '' : '?' . $p['query'];
		$uri = $p['path'];
		$uri = str_replace('..', '', preg_replace('/[ <>\'\"\r\n\t\(\)]/', '', $uri) );

		if (function_exists('wp_get_theme') && !empty($this->ac_set['multythemes'])	&& $theme_key == '') {
			$obj = wp_get_theme();
			$theme_key = '|' . $obj->__get('theme_root') . '/' . $obj->__get('stylesheet') . AUTH_KEY;
		}
		return md5($uri . $theme_key) . (strlen($queryParams) ? '.' . md5($queryParams) : '');
	}

	//get cache_file_path by key suffix.
	public function cache_file_path($key_end, $ext = 'html') {
		return "{$this->ac_set['cache-dir']}/"
		. alpha_cache\ServerVars::getSchema()
		. "-{$_SERVER['SERVER_NAME']}/{$key_end}.$ext";
	}

	private function delete_cache($uri) {
		$key = $this->getkey($uri);
		$cache_files = $this->cache_file_path($key, '*');
		array_map("unlink", glob($cache_files));
	}

	private function delete_all_cache() {
		$cache_files = $this->cache_file_path('*');
		array_map("unlink", glob($cache_files));
	}

  // returns [ 'result': bool, 'data'?: cached content / reason, 'filename'?: cache file name]
	public function get_cache($uri): array {
		global $user_ID;
		$key = self::getkey($uri);
		$user_ID += 0;

		$cache_file = $this->cache_file_path("$key.{$user_ID}");

		$result = [
			'result' => false,
			'data' => '',
			'filename' => $cache_file,
		];

		if (file_exists($cache_file)) {
			$time = filemtime($cache_file);
			if (!$time || $time < time() - $this->ac_set['cache_lifetime']) {
				//expired
				$this->lock('r', LOCK_EX);
				unlink($cache_file);
				$this->unlock();
				$result['data'] = 'File is expired.';
				return $result;
			};

			//read
			if ($this->lock('r', LOCK_SH)) {
				$data = file_get_contents($cache_file);
				$result['result'] = true;
			} else {
				$data = '';
			}
			$this->unlock();
			$result['data'] = $data;
			return $result;
		}

		return $result;
	}

	private function set_cache($uri, $data) {

		if (empty($data)) return false;
		global $user_ID;
		$user_ID += 0;

		if (is_404()) {
			//prevent cache spamming
			return false;
		}

		$key = $this->getkey($uri);
		//try restore cache storage
		if (!is_dir($this->ac_set['cache-dir'])) {
			$def = self::default_settings();
			$this->ac_set['cache-dir'] = $def['cache-dir'];
			$this->touch_cache_dir();
			$this->save_setttings();
		} else {

			$HOSTDIR = "{$this->ac_set['cache-dir']}/"
			. alpha_cache\ServerVars::getSchema()
			. "-{$_SERVER['SERVER_NAME']}";
			if (!file_exists($HOSTDIR)) mkdir($HOSTDIR, 0750);

			$cache_file = "{$HOSTDIR}/$key.{$user_ID}.html";

			$this->lock('r', LOCK_EX);
			file_put_contents($cache_file, $data);
			$this->unlock();
			return true;
		}

		return false;
	}

	//MUTEXES
	private function lock($openflag, $locker) {
		$this->mutex_handler = fopen($this->ac_set['cache-dir'] . '/cache_mutex.lock', $openflag);
		$got_lock = true;
		$timeout_secs = 500;

		while (!flock($this->mutex_handler, $locker | LOCK_NB, $wouldblock)) {
			if ($wouldblock && --$timeout_secs > 0) {
				sleep(1);
			} else {
				$got_lock = false;
				break;
			}
		}
		return $got_lock;
	}
	private function unlock() {
		flock($this->mutex_handler, LOCK_UN);
		fclose($this->mutex_handler);
	}

	private function lockOPT($openflag, $locker) {
		$this->mutex_options = fopen($this->optionFilename, $openflag);
		$timeout_secs = 500;
		$got_lock = true;
		while (!flock($this->mutex_options, $locker | LOCK_NB, $wouldblock)) {
			if ($wouldblock && --$timeout_secs > 0) {
				sleep(1);
			} else {
				$got_lock = false;
				break;
			}
		}

		return $got_lock;
	}

	private function unlockOPT() {
		flock($this->mutex_options, LOCK_UN);
		fclose($this->mutex_options);
	}

	public function load_settings() {
		if (!file_exists($this->optionFilename)) {
			$this->ac_set = self::default_settings();
			$this->save_setttings();
		} else {
			if ($this->lockOPT('r', LOCK_SH)) {
				$data = unserialize(substr(@fread($this->mutex_options, filesize($this->optionFilename)), 8));
			} else {
				$data = self::default_settings();
			}
			$this->unlockOPT();
			$this->ac_set = array_merge(self::default_settings(), $data);
		}
	}

	public function save_setttings() {
		$data = '<?php /*' . serialize($this->ac_set);
		$this->lockOPT('c', LOCK_EX);
		ftruncate($this->mutex_options, 0);
		fwrite($this->mutex_options, $data);
		$this->unlockOPT();
	}

	//clean up cache
	public function maintain() {
		//too early for maintain
		if ($this->ac_set['last-maintain'] + $this->ac_set['dbmaintain_period'] > time()) return;

		$expire_limit = time() - $this->ac_set['dbmaintain_period'];

		if (is_dir($this->ac_set['cache-dir']) && $hdir = opendir($this->ac_set['cache-dir'])) {
			$this->lock('r', LOCK_EX);

			while (false !== ($entry = readdir($hdir))) {
				$dname = $this->ac_set['cache-dir'] . '/' . $entry;
				if ($entry != "." && $entry != ".." && is_dir($dname) && $hcache = opendir($dname)) {
					while (false !== ($entry_file = readdir($hcache))) {
						$fname = $dname . '/' . $entry_file;
						if ($entry_file != "." && $entry_file != ".." && filectime($fname) < $expire_limit ) {
							//expired
							unlink($fname);
						}
					}
					closedir($hcache);
				}
			}

			$this->unlock();
			closedir($hdir);
		}

		$this->ac_set['last-maintain'] =  time();
		$this->save_setttings();
	}

	/* check htaccess */
	public function htaccess() {
		$this->lockOPT('r', LOCK_EX);

		alpha_cache\HtAccess::ht_update(
			!empty($this->ac_set['on']),
			!empty($this->ac_set['speed-expire']),
			!empty($this->ac_set['speed-deflate'])
		);

		$this->unlockOPT();
	}

	/* Upgade routines */
	public function upgrade() {
		global $wpdb;
		$upgraded = false;

		//upgrade up to 1.2
		if ($this->ac_set['ver'] < 1.2) {
			//remove cache table, now we use file-cache
			$wpdb->query("DROP TABLE IF EXISTS `cache_alpha`");
			$wpdb->query("DROP TABLE IF EXISTS `{$wpdb->prefix}cache_alpha`");
			delete_option('alpha_cache_settings');

			$this->touch_cache_dir();
			$upgraded = true;
			$this->ac_set['ver'] = 1.2;
		}

		//upgrade up to 1.2004
		if ($this->ac_set['ver'] < 1.2004) {
			$this->delete_all_cache();
		}

		if ($upgraded) {
			$this->ac_set['ver'] = self::actual_version;
			$this->save_setttings();
		}
	}

	public function touch_cache_dir() {
		if (!file_exists($this->ac_set['cache-dir'])) {
			if (!mkdir($this->ac_set['cache-dir'], 0750 )) {
				$this->messages[] = 'create_cache_dir_error';
			} else {
				$this->messages[] = 'create_cache_dir_success';

				$mutexFilename = $this->ac_set['cache-dir'] . '/cache_mutex.lock';
				if (!file_exists($mutexFilename))
					touch($mutexFilename);
			}
		}
	}

	/* different admin notices */
	public function admin_notice() {

		if (empty($this->messages)) return false;

		foreach ($this->messages as $code) {

			if (preg_match('/[_]([a-z]+)$/', $code, $m))
				$type = $m[1];
			else
				$type = 'info';

			switch($code) {
			case 'wp_cache_postload_error':
				$str = 'Alpha Cache conflicts with someone another caching module. Please use only one module for proper work.';
				break;
			case 'create_cache_dir_error':
				$str = 'Can`t create the directory for cache files.';
				break;
			case 'create_cache_dir_success':
				$str = 'Cache files directory created.';
				break;
			default:
				$str = 'WTF error';
			}
?>
    <div class="notice notice-<?php echo $type; ?> is-dismissible">
        <p><?php echo __( $str ); ?></p>
    </div>
<?php
		}
	}

	/* Options admin page */
	public function _options_page() {
		global $wpdb;

		if (isset($_POST['action'])) {
			switch ($_POST['action']) {
			case 'save_cache_settings':
				//check & store new values
				if ($_POST['cache_lifetime'] < 60) {
					echo '<div class="error>' . __('Lifetime period too short. I set minimum - 60 s.') . '</div>';
					$_POST['cache_lifetime'] = 60;
				}
				unset($_POST['action'], $_POST['sbm'], $_POST['users']);
				if ($_POST['dbmaintain_period'] < 3600) {
					echo '<div class="error>' . __('Maintain period too short. I set minimum - 1 hour.') . '</div>';
					$_POST['dbmaintain_period'] = 3600;
				}

				$flags = array('doStat', 'chTRACK', 'chAnon', 'disableOnBots', 'on', 'multythemes', 'speed-expire', 'speed-deflate', 'getIns');
				foreach ($flags as $flag) {
					if (!isset($_POST[$flag]))
						$_POST[$flag] = 0;
				}
				//
				$_POST['cache-dir'] = $this->ac_set['cache-dir'];
				$this->ac_set = array_merge($this->ac_set, $_POST);
				unset($this->ac_set['action'], $this->ac_set['active-section'], $this->ac_set['users']);
				$this->save_setttings();
				echo '<div class="updated"><p>' . __("Settings were updated.") . '</p></div>';

				break;
			case 'clear cache data':
				$this->delete_all_cache();
				break;
			case 'clear statistics':
				$this->ac_set['hits'] = 0;
				$this->ac_set['miss'] = 0;
				$this->save_setttings();
				break;
			case 'load defaults':
				$new_set = self::default_settings();
				$new_set['hits'] = $this->ac_set['hits'];
				$new_set['miss'] = $this->ac_set['miss'];
				$this->ac_set = $new_set;
				$this->save_setttings();
				break;
			case 'truncate log':
				alpha_cache\Log::truncate();
				break;
			case 'refresh log':
				// reload log page, no actions required
				break;
			}
		}

		$acs = $this->ac_set;
		require_once dirname(__FILE__) . '/page-options.php';
  }

	/* install actions (when activate first time) */
    static function install() {
		//nothing relly to do :)
	}

	public function log(string $mess): void {
		if ($this->ac_set['isLogging']) {
			alpha_cache\Log::record($mess);
		}
	}

	static function default_settings() {
		return array(
			'cache_lifetime' => 21600,
			'dbmaintain_period' => 86400,
			//no cache on admin's pages
			'avoid_urls' => '^/wp-login.php',
			'users_nocache' => '',
			'doStat' => 0,
			'chTRACK' => 1,
			'chAnon' => 1,
			'last-maintain' => time(),
			//since v1.2
			'cache-dir' => dirname(__FILE__) . '/cache',
			'ver' => 1.0,
			'multythemes' => 0,
			'on' => 1,
			'speed-expire' => 1,
			'speed-deflate' => 1,
			//since v1.2.001
			'getIns' => 0,
			//since v1.2.006
			'ignore_gets' => '',
			//since v1.3
			'isLogging' => 0,
			'disableOnBots' => 1,
		);
	}

	/* uninstall hook */
  static function uninstall() {
		global $wpdb;
		$wpdb->query("DROP TABLE IF EXISTS `{$wpdb->prefix}cache_alpha`");
	}

	static function inttoMB($int) {
		return number_format($int / 1048576, 2, '.', ',') . ' Mb';
	}

}}
