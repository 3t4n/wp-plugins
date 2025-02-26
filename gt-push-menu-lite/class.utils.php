<?php

require_once(__DIR__.DIRECTORY_SEPARATOR."class.options.php");

define('GTPM_KEY', "\xa3\xb4\xef\xda\x24\xd5\xcc\x3b");

class gtpmUtils {

	var $base64Map = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
	var $l;
	var $debugLogPath = '';

	function __construct() {
		$this->debugLogPath = GTPM_PLUGIN_PATH.DIRECTORY_SEPARATOR.'gtpmlog.txt';
	}

	// singleton instance 
	private static $instance; 

	// getInstance method 
	public static function getInstance() { 
		if ( !self::$instance ) { 
			self::$instance = new self(); 
		} 
		return self::$instance; 
	} 

	public function log($msg) {		
		if ( defined('GTPM_DEBUG') && GTPM_DEBUG === true ) {
			$msg = '['.date('Y-m-d H:i:s').'] '.$msg."\n";
			file_put_contents($this->debugLogPath, $msg, FILE_APPEND);
		}
	}

	public function readLog() {
		$log = 'Log file does not exists';
		if (file_exists($this->debugLogPath) ) {
			$log = file_get_contents($this->debugLogPath);	
		}
		return $log;	
	}

	public function emptyLog() {
		file_put_contents($this->debugLogPath, '');
	}

	function getAuthors($selected = '') {
		global $wpdb;
		$options = gtpmOptions::getInstance();

		$sql = "SELECT ID, user_nicename from $wpdb->users ORDER BY display_name";	
		$authors = $wpdb->get_results($sql,ARRAY_A);

		$oSelAuthors = $options->get('broadcast.query.authors');

		$sel_auth_arr = preg_split('/[\s,]+/', $oSelAuthors, -1, PREG_SPLIT_NO_EMPTY);

		foreach ($authors as &$author) {
			$author['selected'] = in_array($author['ID'], $sel_auth_arr);
		}

		return $authors;
	}	

	function getCategories() {
		$cats = get_categories(array(
			'hide_empty' => 0
		));

		$options = gtpmOptions::getInstance();
		$oSelCats = $options->get('broadcast.query.cats');

		$sel_cat_arr = preg_split('/[\s,]+/', $oSelCats, -1, PREG_SPLIT_NO_EMPTY);		

		foreach ($cats as &$item) {
			$item->selected = in_array($item->cat_ID, $sel_cat_arr);
		}

		return $cats;
	}

	function remslashes ( $string ){       
		// all wordress $_POST ,$_GET and $_COOKIE variables
		// are compulsory backslashed!
		return stripslashes( $string );
	}	

	function base64DecodeU($data) {
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
	}

	function base64EncodeU($data) {
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	}

	function sanitizeFileName($str) {
		return preg_replace('#\s+#','_',$str);
	}

	function sanitizeDBFieldName($str) {
		return strtolower( preg_replace('#[^a-z0-9]+#i','_',$str) );
	}

	function tableExists($tableName) {
		global $wpdb;
		return $wpdb->get_var("show tables like '".$tableName."'") === $tableName;
	}

	function addTrSlash($url, $dir = false) {
		$sep = $dir ? DIRECTORY_SEPARATOR : '/';
		if (substr($url,strlen($url)-1,1) != $sep) {
			$url .= $sep;
		}		
		return $url;
	}

	function supplant($string, $vars) {
		$tmpstr = $string;		

		if ( is_array($vars) ) {
			foreach($vars as $key => $value) {
				// replace singe variables 
				$tmpstr = preg_replace('/\$'.preg_quote($key).'/si', $value,$tmpstr);
			}			
		}
		return $tmpstr;
	}

	/**
	 * SECURITY
	 */

	private function encrypt($str, $key) {
		# Add PKCS7 padding.
		$block = mcrypt_get_block_size('des', 'ecb');
		if (($pad = $block - (strlen($str) % $block)) < $block) {
			$str .= str_repeat(chr($pad), $pad);
		}

		return mcrypt_encrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
	}

	private function decrypt($str, $key) {
		$str = mcrypt_decrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);

		# Strip padding out.
		$block = mcrypt_get_block_size('des', 'ecb');
		$pad = ord($str[($len = strlen($str)) - 1]);
		if ($pad && $pad < $block && preg_match('/' . chr($pad) . '{' . $pad . '}$/', $str) ) {
			return substr($str, 0, strlen($str) - $pad);
		}
		return $str;
	}

	public function encrypt_pwd($pwd) {
		return base64_encode( $this->encrypt($pwd, GTPM_KEY) );
	}

	public function decrypt_pwd($enc_pwd) {
		return $this->decrypt( base64_decode($enc_pwd), GTPM_KEY );
	}

	/* --------------------------------------------------------------------------------------------------------- */
	/* Modified Base64 to create email addres beacon */	
	/* --------------------------------------------------------------------------------------------------------- */

	public function genTranslationMap() {
		return str_shuffle($this->base64Map);
	}

	function encEmail($email) {
		$o = gtpmOptions::getInstance();
		return strtr(base64_encode($email), $this->base64Map, $o->get('base64TrMap'));
	}

	function decEmail($enc_email) {
		$o = gtpmOptions::getInstance();
		return base64_decode(strtr($enc_email, $o->get('base64TrMap'), $this->base64Map));
	}

	/* --------------------------------------------------------------------------------------------------------- */
	/* Plugin version transformations */	
	/* --------------------------------------------------------------------------------------------------------- */

	function versionToNum($ver) {
		if ( preg_match('/^(\d+)\.(\d+)\.(\d+)(.*?)$/', $ver, $matches) ) {		
			$a = $matches[1];
			$b = $matches[2];
			$c = $matches[3];
			$prefix = $matches[4];
			$d = preg_replace('/\D+/', '', $prefix);
		} else {
			return null;
		}	

		// a bb cc prefixNumber ddd
		// prefixNumber = alpha = 1
		// prefixNumber = beta  = 2
		// prefixNumber = gamma = 3
		// prefixNumber = rc    = 3

		$prefixNumber = 0;

		if ( $prefix === '' ) {
			$prefixNumber = 9; // release
		} else {
			if ( preg_match('/\bpre-alpha\b/i', $prefix) ) {
				$prefixNumber = 0;
			} else if ( preg_match('/\balpha\b/i', $prefix) ) {
				$prefixNumber = 1;
			} else if ( preg_match('/\bbeta\b/i', $prefix) ) {
				$prefixNumber = 2;
			} else if ( preg_match('/\b(gamma|rc)\b/i', $prefix) ) {
				$prefixNumber = 3;
			}
		}

		$s = $a.
			 str_pad($b, 2, '0', STR_PAD_LEFT).
			 str_pad($c, 2, '0', STR_PAD_LEFT).
			 $prefixNumber.
			 str_pad($d, 3, '0', STR_PAD_LEFT);

		return is_numeric($s) ? intval($s) : 0;
	}

	public function canUpdate() {

		$codeVersion = $this->versionToNum(GTPM_VERSION);
		$storedVersion = $this->versionToNum(get_option('gtpm_version'));

		return $codeVersion > $storedVersion;
	}

	public function runUpdate() {
		$updated = false;
		$codeVersion = $this->versionToNum(GTPM_VERSION);
		$storedVersion = $this->versionToNum(get_option('gtpm_version'));
		if ( $codeVersion > $storedVersion ) {
			$updated = true;
			// require_once(__DIR__.DIRECTORY_SEPARATOR."migration.php");
			// if ( function_exists('gtpm_do_migration') ) {
			// 	gtpm_do_migration();
			// }		
			do_action('wpgtpm_update');
			update_option('gtpm_old_version', get_option('gtpm_version'));	
			update_option('gtpm_version', GTPM_VERSION);
		}
		return $updated;
	}

	/* --------------------------------------------------------------------------------------------------------- */

	// recursively encodes array strings to UTF8 
	public function utf8_encode_all($mix) {
		if ( is_string($mix) ) return mb_check_encoding($mix, 'UTF-8') ? $mix : utf8_encode($mix);
		if ( !is_array($mix) ) return $mix; 
		$ret = array(); 
		foreach($mix as $k=>$v) {
			$ret[$k] = $this->utf8_encode_all($v);
		} 
		return $ret; 
	} 	

	public function file_get_contents_utf8($fn) {
		$content = file_get_contents($fn);
		return mb_convert_encoding($content, 'UTF-8',
			mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
	}	
}