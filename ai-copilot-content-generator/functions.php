<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Set first leter in a string as UPPERCASE
 *
 * @param string $str string to modify
 * @return string string with first Uppercase letter
 */
if (!function_exists('waicStrFirstUp')) {
	function waicStrFirstUp( $str ) {
		return strtoupper(substr($str, 0, 1)) . strtolower(substr($str, 1, strlen($str)));
	}
}
/**
 * Deprecated - class must be created
 */
if (!function_exists('waicDateToTimestamp')) {
	function waicDateToTimestamp( $date ) {
		if (empty($a)) {
			return false;
		}
		$a = explode(WAIC_DATE_DL, $date);
		return mktime(0, 0, 0, $a[1], $a[0], $a[2]);
	}
}
/**
 * Generate random string name
 *
 * @param int $lenFrom min len
 * @param int $lenTo max len
 * @return string random string with length from $lenFrom to $lenTo
 */
if (!function_exists('waicGetRandName')) {
	function waicGetRandName( $lenFrom = 6, $lenTo = 9 ) {
		$res = '';
		$len = mt_rand($lenFrom, $lenTo);
		if ($len) {
			for ($i = 0; $i < $len; $i++) {
				$res .= chr(mt_rand(97, 122));	/*rand symbol from a to z*/
			}
		}
		return $res;
	}
}
if (!function_exists('waicImport')) {
	function waicImport( $path ) {
		if (file_exists($path)) {
			require($path);
			return true;
		}
		return false;
	}
}
if (!function_exists('waicSetDefaultParams')) {
	function waicSetDefaultParams( $params, $default ) {
		foreach ($default as $k => $v) {
			$params[$k] = isset($params[$k]) ? $params[$k] : $default[$k];
		}
		return $params;
	}
}
if (!function_exists('waicImportClass')) {
	function waicImportClass( $class, $path = '' ) {
		if (!class_exists($class)) {
			if (!$path) {
				$classFile = lcfirst($class);
				if (strpos(strtolower($classFile), WAIC_CODE) !== false) {
					$classFile = preg_replace('/' . WAIC_CODE . '/i', '', $classFile);
				}
				$path = WAIC_CLASSES_DIR . lcfirst($classFile) . '.php';
			}
			return waicImport($path);
		}
		return false;
	}
}
/**
 * Check if class name exist with prefix or not
 *
 * @param strin $class preferred class name
 * @return string existing class name
 */
if (!function_exists('waicToeGetClassName')) {
	function waicToeGetClassName( $class ) {
		$className = '';
		if (class_exists(waicStrFirstUp(WAIC_CODE) . $class)) {
			$className = waicStrFirstUp(WAIC_CODE) . $class;
		} else if (class_exists(WAIC_CLASS_PREFIX . $class)) {
			$className = WAIC_CLASS_PREFIX . $class;
		} else {
			$className = $class;
		}
		return $className;
	}
}
/**
 * Create object of specified class
 *
 * @param string $class class that you want to create
 * @param array $params array of arguments for class __construct function
 * @return object new object of specified class
 */
if (!function_exists('waicToeCreateObj')) {
	function waicToeCreateObj( $class, $params ) {
		$className = waicToeGetClassName($class);
		$obj = null;
		if (class_exists('ReflectionClass')) {
			$reflection = new ReflectionClass($className);
			try {
				$obj = $reflection->newInstanceArgs($params);
			} catch (ReflectionException $e) {	// If class have no constructor
				$obj = $reflection->newInstanceArgs();
			}
		} else {
			$obj = new $className();
			call_user_func_array(array($obj, '__construct'), $params);
		}
		return $obj;
	}
}
/**
 * Redirect user to specified location. Be advised that it should redirect even if headers alredy sent.
 *
 * @param string $url where page must be redirected
 */
if (!function_exists('waicRedirect')) {
	function waicRedirect( $url ) {
		if (headers_sent()) {
			if ( class_exists('WaicFrame') ) {
				WaicFrame::_()->printInlineJs('document.location.href="' . esc_url($url) . '";');
			}
		} else {
			header('Location: ' . $url);
		}
		exit();
	}
}
if (!function_exists('waicJsonEncodeUTFnormal')) {
	function waicJsonEncodeUTFnormal( $value, $ent = false ) {
		if (is_int($value)) {
			return (string) $value;   
		} elseif (is_string($value)) {
			if ($ent) {
				$value = stripslashes($value);
			}
			
			$value = str_replace(array('\\', '/', '"', "\r", "\n", "\b", "\f", "\t"), 
				$ent ? array('\\\\', '\/', '\"', '\\\\r', '\\\\n', '\\\\b', '\\\\f', '\\\\t') : array('\\\\', '\/', '\"', '\r', '\n', '\b', '\f', '\t'), $value);
			$convmap = array(0x80, 0xFFFF, 0, 0xFFFF);
			$result = '';
			for ($i = strlen($value) - 1; $i >= 0; $i--) {
				$mb_char = substr($value, $i, 1);
				$result = $mb_char . $result;
			}
			return '"' . ( $ent ? htmlspecialchars($result, ENT_QUOTES) : $result ) . '"';                
		} elseif (is_float($value)) {
			return str_replace(',', '.', $value);         
		} elseif (is_null($value)) {
			return 'null';
		} elseif (is_bool($value)) {
			return $value ? 'true' : 'false';
		} elseif (is_array($value)) {
			$with_keys = false;
			$n = count($value);
			for ($i = 0, reset($value); $i < $n; $i++, next($value)) {
				if (key($value) !== $i) {
					$with_keys = true;
					break;
				}
			}
		} elseif (is_object($value)) {
			$with_keys = true;
		} else {
			return '';
		}
		$result = array();
		if ($with_keys) {
			foreach ($value as $key => $v) {
				$result[] = waicJsonEncodeUTFnormal((string) $key, $ent) . ':' . waicJsonEncodeUTFnormal($v, $ent);    
			}
			return '{' . implode(',', $result) . '}';                
		} else {
			foreach ($value as $key => $v) {
				$result[] = waicJsonEncodeUTFnormal($v, $ent);    
			}
			return '[' . implode(',', $result) . ']';
		}
	} 
}
/**
 * Prepares the params values to store into db
 * 
 * @param array $d $_POST array
 * @return array
 */
if (!function_exists('waicPrepareParams')) {
	function waicPrepareParams( &$d = array(), &$options = array() ) {
		if (!empty($d['params'])) {
			if (isset($d['params']['options'])) {
				$options = $d['params']['options'];
			}
			if (is_array($d['params'])) {
				$params = WaicUtils::jsonEncode($d['params']);
				$params = str_replace(array('\n\r', "\n\r", '\n', "\r", '\r', "\r"), '<br />', $params);
				$params = str_replace(array('<br /><br />', '<br /><br /><br />'), '<br />', $params);
				$d['params'] = $params;
			}
		} elseif (isset($d['params'])) {
			$d['params']['attr']['class'] = '';
			$d['params']['attr']['id'] = '';
			$params = WaicUtils::jsonEncode($d['params']);
			$d['params'] = $params;
		}
		if (empty($options)) {
			$options = array('value' => array('EMPTY'), 'data' => array());
		}
		if (isset($d['code'])) {
			if ('' == $d['code']) {
				$d['code'] = waicPrepareFieldCode($d['label']) . '_' . rand(0, 9999999);
			}
		}
		return $d;
	}
}
if (!function_exists('waicPrepareFieldCode')) {
	function waicPrepareFieldCode( $string ) {   
		$string = preg_replace('/[^a-zA-Z0-9\s]/', ' ', $string);
		$string = preg_replace('/\s+/', ' ', $string);
		$string = preg_replace('/ /', '', $string);

		$code = substr($string, 0, 8);
		$code = strtolower($code);
		if ('' == $code) {
			$code = 'field_' . gmdate('dhis');
		}
		return $code;
	}
}
/**
 * Recursive implode of array
 *
 * @param string $glue imploder
 * @param array $array array to implode
 * @return string imploded array in string
 */
if (!function_exists('waicRecImplode')) {
	function waicRecImplode( $glue, $array ) {
		$res = '';
		$i = 0;
		$count = count($array);
		foreach ($array as $el) {
			$str = '';
			if (is_array($el)) {
				$str = waicRecImplode('', $el);
			} else {
				$str = $el;
			}
			$res .= $str;
			if ($i < ( $count-1 )) {
				$res .= $glue;
			}
			$i++;
		}
		return $res;
	}
}
