<?php

	require_once(__DIR__.DIRECTORY_SEPARATOR.'class.utils.php');
	require_once(__DIR__.DIRECTORY_SEPARATOR.'class.options.php');

	ignore_user_abort(true);
	set_time_limit(0);

	class gtpmAJAX {

		public function __construct() {

			mb_internal_encoding("UTF-8");
			$loc = "UTF-8";
			putenv("LANG=$loc");
			$loc = setlocale(LC_ALL, $loc);

			if ( current_user_can( 'gtpm_admin' ) ) {
				$methods = get_class_methods(__CLASS__);

				foreach ($methods as $meth) {
					if ( strpos($meth, 'aj') === 0 ) {
						add_action('wp_ajax_gtpm'.ucfirst($meth), array($this, $meth));
					}
				}
			}

			$this->u = gtpmUtils::getInstance();
			$this->o = gtpmOptions::getInstance();
		}

		public function respond($state, $msg, $params = array(), $stop = true) {
			global $db;

			

			$msg = array(
				'state' => $state,
				'msg' => $msg
			);

			$msg = array_merge($msg, $params);

			if ( defined('GTPM_TESTS') ) {
				echo json_encode($msg);
				return;
			}			
			
			if ( !$state ) {
				header("HTTP/1.0 400 Bad Request");
			}

			$content = json_encode( $this->u->utf8_encode_all($msg) );

			while(@ob_end_clean());
			
			header("Connection: close");
			ignore_user_abort(); // optional
			ob_start();
			echo $content;
			$size = ob_get_length();
			header("Content-type: application/json");
			header("Content-Length: $size");
			ob_end_flush(); // Strange behaviour, will not work
			flush();            // Unless both are called !

			if ( $stop ) {
				if ($db) $db->close();  
				exit();
			}			   
		}

		public function param($param) {			

			if ( defined('GTPM_TESTS') ) {
				global $AJ_PARAMS;
				return $AJ_PARAMS[$param];
			}

			if ( !isset($_REQUEST[$param]) ) {

				if ( func_num_args() == 2 ) {
					$def = func_get_arg(1);
					return $def;
				} else {
					$this->respond(false, sprintf( __('required parameter "%s" is missing in the request', GTPM), $param) );
				}

			} else {				
				return is_string( $_REQUEST[$param] ) ? $this->u->remslashes( $_REQUEST[$param] ) : $_REQUEST[$param];
			}
		}

		// ajax accessible methods

		// "ajGetDebugLog" method could be accessed by the "gtpmAjGetDebugLog" ajax action

		public function ajGetDebugLog() {
			$log = $this->u->readLog();
			$this->respond(true, __('Success', GTPM), array('log' => $log));
		}

		public function ajEmptyDebugLog() {
			$this->u->emptyLog();
			$this->respond(true, __('Success', GTPM));
		}

		public function ajListIcons() {
			$g = GTPM::getInstance();
			$cf = $g->options->get('customFont');

			$path = ( !$cf ) ? GTPM_PLUGIN_URL.'/css/style.css' : GTPM::getCustomFontStylePath($cf);
			
			$css = file_get_contents($path);	
			
			$icons = array();
			if ( preg_match_all('/\.(gtpm-icon-(.*?))\s*(?:\:before|\{)/i', $css, $matches) ) {
				for ($i=0, $len = count($matches[1]); $i < $len; $i++) { 
					$icons[] = array(
						'class' => $matches[1][$i],
						'name' => str_replace('-', ' ', $matches[2][$i])
					);
				}
			}
			$this->respond(true, __('Success', GTPM), array('icons'=>$icons));
		}

		public function ajGetOptions() {
			$opts = $this->o->get();
			if ( !$opts ) { $opts = array(); }
			$this->respond(true, __('Success', GTPM), array('opts' => $opts));
		}

		public function ajSetOptions() {
			$optStr = stripslashes($_REQUEST['json']);
			if ( $optStr ) {
				$opts = json_decode($optStr, true);
				$this->o->set('', $opts);
				// foreach ($opts as $key => $value) {
				// 	$this->o->set($key, $value);
				// }
			}
			$this->respond(true, __('Success', GTPM));
		}	

		public function ajDeleteCustomFont() {
			$font = $this->param('font');

			$gtpm = GTPM::getInstance();
			$upath = $gtpm->ensureUploadDir('font');

			$fontDirPath = $upath.DIRECTORY_SEPARATOR.$font;
			if ( is_dir($fontDirPath) ) {
				if ( @$this->delTree($fontDirPath) ) {
					$this->respond(true, __('success', GTPM));	
				} else {
					$this->respond(false, __('Error: cannot delete font directory.', GTPM), array('dir'=>$fontDirPath));
				}				
			} else {
				$this->respond(false, __('Error: font director does not exist.', GTPM));
			}
		}


		/*** no ajax methods ***/

		private function delTree($dir) { 
			$files = array_diff(scandir($dir), array('.','..')); 
			foreach ($files as $file) { 
				(is_dir($dir.DIRECTORY_SEPARATOR.$file)) ? $this->delTree($dir.DIRECTORY_SEPARATOR.$file) : unlink($dir.DIRECTORY_SEPARATOR.$file);
			} 
			return rmdir($dir); 
		} 		
	}