<?php

// This file (advanced-cache.php) must be placed under the /wp-content/ WordPress directory (<your wordpress directory>/wp-content/advanced-cache.php)

/*
Plugin Name: 1 Blog Cacher
Plugin URI: http://1blogcacher.com/
Description: <strong>This file (advanced-cache.php) shouldn't be here</strong>. Move it to the <em>/wp-content/</em> directory so 1 Blog Cacher can work properly.
Version: 2.0.2
Author: Javier Garc&iacute;a
Date: 2007-09-18
Author URI: http://1blogr.com/
License: Attribution - Non Commercial - Share Alike 2.5 - http://creativecommons.org/licenses/by-nc-sa/2.5/
*/

// EDIT THESE VALUES:

define("OBC_EXPIRATION",3600);
define("OBC_CACHE_USERS",2);
define("OBC_CACHE_COMMENTERS",2);
define("OBC_CACHE_ERROR_PAGES",false);
define("OBC_CACHE_REDIRECTIONS",false);
define("OBC_AVOID_TRAILING_SLASH_DUPLICATION",false);
define("OBC_ENABLE_BROWSER_CACHE",false);
define("OBC_LOOK_FOR_DYNAMIC_CODE",true);
define("OBC_USE_CACHE_DIRECTORIES",true);
define("OBC_REJECTED_STRINGS","wp-");
define("OBC_ACCEPTED_STRINGS","wp-atom.php, wp-comments-popup.php, wp-commentsrss2.php, wp-links-opml.php, wp-locations.php, wp-rdf.php, wp-rss.php, wp-rss2.php");
define("OBC_REJECTED_USER_AGENTS","bot, ia_archive, slurp, crawl, spider");

/*
- OBC_EXPIRATION: Cache expiration: number of seconds (3600 by default = 1 hour)
- OBC_CACHE_USERS: Plugin behaviour with registered (and logged-in) users:
	* 0: Use no cache
	* 1: Use a single global cache
	* 2: Use an individual cache for each user (2 by default)
- OBC_CACHE_COMMENTERS: Plugin behaviour with commenters: same values as with OBC_CACHE_USERS (2 by default).
- OBC_CACHE_ERROR_PAGES: Option to cache error pages (status 404): true or false (false by default).
- OBC_CACHE_REDIRECTIONS: Option to cache redirections (status 301 and 302): true or false (false by default).
- OBC_AVOID_TRAILING_SLASH_DUPLICATION: Option to omit url trailing slash ("/") in order to avoid caching the same content twice: true or false (false by default).
	* IMPORTANT: Don't set this parameter to true in WordPress 2.3+ or if you are using a plugin that redirects urls with trailing slash.
- OBC_ENABLE_BROWSER_CACHE: Option to allow the visitor browser to cache contents: true or false (false by default).
- OBC_LOOK_FOR_DYNAMIC_CODE: Option to look for dynamic code (mfunc and mclude comments): true or false (true by default).
	* IMPORTANT: If you have the Gzip compression enabled and you are not using dynamic code, setting OBC_LOOK_FOR_DYNAMIC_CODE to false will allow the plugin to save from having to read the code cached in plain text and so return directly the compressed content.
- OBC_USE_CACHE_DIRECTORIES: Option to save the cached files in a directory strcuture that mimics the blog urls: true or false (true by default).
- OBC_REJECTED_STRINGS: If the url contains one of those comma-separated strings, that url won't be cached (by default: "wp-").
- OBC_ACCEPTED_STRINGS: Exceptions to the previous rule (by default: "wp-atom.php, wp-comments-popup.php, wp-commentsrss2.php, wp-links-opml.php, wp-locations.php, wp-rdf.php, wp-rss.php, wp-rss2.php").
- OBC_REJECTED_USER_AGENTS: If the user-agent (name of the cient's browser, bot, etc.) contains one of those comma-separated strings, its requests won't be cached, though cached pages will be displayed if they exist and haven't expired (by default: "bot, ia_archive, slurp, crawl, spider").

// STOP EDITING BELOW THIS LINE!
*/

define("OBC_ADVANCED_CACHE",true);
IF (isset($_SERVER["HTTPS"]) && strtolower($_SERVER['HTTPS']) == "on"){
	define("OBC_SCHEME","https://");
	define("OBC_PORT",443);
	define("OBC_SECURE_SCHEME","ssl://");
}ELSE{
	define("OBC_SCHEME","http://");
	define("OBC_PORT",80);
	define("OBC_SECURE_SCHEME","");
};
IF (!file_exists(ABSPATH."wp-content/plugins/1blogcacher2.0.php")) RETURN;

IF (!function_exists("obc_cache_init")){
	FUNCTION obc_cache_init(){
		global $obc_configuration;
		$obc_create_cache = true;

		define("OBC_PATH",obc_clean_directory(ABSPATH)."/wp-cache");

		$obc_configuration = obc_load_file(OBC_PATH."/obc_configuration");
		$obc_configuration = unserialize($obc_configuration);
		IF (!is_array($obc_configuration)) RETURN false;
		IF (!$obc_configuration["plugin_active"] || !$obc_configuration["home"]) RETURN false;
		define("OBC_SITE_URL",obc_clean_url($obc_configuration["home"]));
		define("OBC_GZIP",$obc_configuration["gzip_enabled"]);
		define("OBC_COOKIEHASH",md5($obc_configuration["home"]));
		define("OBC_USER",$_COOKIE["wordpressuser_".OBC_COOKIEHASH]);
		define("OBC_COMMENTER",$_COOKIE["comment_author_email_".OBC_COOKIEHASH]);
		define("OBC_CACHE_DIRECTORIES",(OBC_USE_CACHE_DIRECTORIES && !ini_get("safe_mode")));
		IF (OBC_GZIP && function_exists("gzencode")){
			$accept_encoding = str_replace(" ","",strtolower($_SERVER["HTTP_ACCEPT_ENCODING"]));
			$accept_encoding = explode(",",$accept_encoding);
			define("OBC_ACCEPT_GZIP",in_array("gzip",$accept_encoding));
    		}ELSE define("OBC_ACCEPT_GZIP",false);

		IF (strpos($_SERVER["HTTP_USER_AGENT"],"1 Blog Cacher") !== false) RETURN false;
		IF (strtoupper($_SERVER["REQUEST_METHOD"]) != "GET") RETURN false;
		IF (strlen(OBC_USER) && OBC_CACHE_USERS == 0) RETURN false;
		IF (strlen(OBC_COMMENTER) && OBC_CACHE_COMMENTERS == 0) RETURN false;
		IF (strlen($_COOKIE["wp-postpass_".OBC_COOKIEHASH])) RETURN false;

		$user_agent = strtolower($_SERVER["HTTP_USER_AGENT"]);
		$obc_rejected_user_agents = explode(",",OBC_REJECTED_USER_AGENTS);
		$obc_rejected_user_agents = array_filter($obc_rejected_user_agents);
		IF (count($obc_rejected_user_agents)){
			FOREACH ($obc_rejected_user_agents as $x=>$rejected_user_agent){
				$rejected_user_agent = trim(strtolower($rejected_user_agent));
				IF (strpos($user_agent,$rejected_user_agent) !== false){
					$obc_create_cache = false;
					break;
				};
			};
		};
		define("OBC_CREATE_CACHE",$obc_create_cache);
		obc_cache(OBC_SCHEME.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
	};
};
IF (!function_exists("obc_cache")){
	FUNCTION obc_cache($url){
		global $obc_request_headers;

		$url = obc_clean_url($url);
		IF (strpos($url,"*") !== false || strpos($url,"/.") !== false || strpos($url,":") !== false) RETURN false;
		$file = obc_url_to_file($url);
		IF ($file === false) RETURN false;

		IF (strlen(OBC_USER) && OBC_CACHE_USERS == 2) define("OBC_USER_STRING",md5(OBC_USER));
		ELSEIF (!strlen(OBC_USER) && strlen(OBC_COMMENTER) && OBC_CACHE_COMMENTERS == 2) define("OBC_USER_STRING",md5(OBC_COMMENTER));
		IF (!defined("OBC_USER_STRING")) define("OBC_USER_STRING",false);
		
		IF (OBC_USER_STRING) $file .= ((OBC_CACHE_DIRECTORIES)? "/" : "-").OBC_USER_STRING;
		ELSE $file .= ((OBC_CACHE_DIRECTORIES)? "/" : "-")."d41d8cd98f00b204e9800998ecf8427e";
		$file_txt = OBC_PATH."/{$file}.txt";
		$file_html = OBC_PATH."/{$file}.html";
		$file_gzip = "{$file_html}.gz";

		$return_gzip = (OBC_GZIP && function_exists("gzencode") && OBC_ACCEPT_GZIP && !headers_sent());

		$cache_date = 0;
		$obc_request_headers = obc_request_headers();
		IF ($obc_request_headers["Cache-Control"] != "no-cache") $cache_date = @filemtime($file_txt);

		IF ($cache_date > 0 && $cache_date > time()-OBC_EXPIRATION){
			$response["headers"] = obc_load_file($file_txt);
			IF ($response["headers"] === false) RETURN false;
			$response["headers"] = explode("\r\n",$response["headers"]);

			$empty_content = (!file_exists($file_html) || $cache_date - @filemtime($file_html) > 10);
			IF (!$empty_content){
				FOREACH ($response["headers"] as $x=>$header){
					IF (strtolower(substr($header,0,6)) == "date: "){
						$date = substr(strtolower($header),6);
						break;
					};
				};
				IF (!OBC_LOOK_FOR_DYNAMIC_CODE){
					global $obc_request_headers;
					IF ($date && $obc_request_headers["If-Modified-Since"] == $date) obc_status_304();
				};
				IF ($return_gzip){
					$response["gzip"] = obc_load_file($file_gzip);
					IF ($response["gzip"] === false) RETURN false;
				};
				IF (!$return_gzip || OBC_LOOK_FOR_DYNAMIC_CODE){
					$response["content"] = obc_load_file($file_html);
					IF ($response["content"] === false) RETURN false;
					IF ($return_gzip) $response["content"] = preg_replace("'\n<!--(.*?)-->$'","",$response["content"]);
					$response["content"] .= "\n<!-- Loaded from cache in ".obc_timer_stop(4)." seconds by 1 Blog Cacher - http://1blogcacher.com/ - (".date("Y-m-d, H:i:s").") -->";
				};
	
				IF (OBC_LOOK_FOR_DYNAMIC_CODE) IF ($dynamic_code = obc_dynamic_code($response["content"])){
					$response["content"] = obc_replace_dynamic_code($response["content"]);
					IF ($return_gzip) $response["gzip"] = gzencode($response["content"]);
				};
	
				IF (!$dynamic_code && OBC_LOOK_FOR_DYNAMIC_CODE){
					global $obc_request_headers;
					IF ($date && $obc_request_headers["If-Modified-Since"] == $date) obc_status_304();
				};
				$etag = ($return_gzip)? md5($response["gzip"]) : md5(preg_replace("'(</html>|</rss>|</feed>)(.*?)$'s","\\1",$response["content"]));
				IF ($obc_request_headers["If-None-Match"] == $etag) obc_status_304();
			};
			FOREACH ($response["headers"] as $header) @header($header);
			IF ($empty_content) DIE;

			IF (OBC_ENABLE_BROWSER_CACHE){
				@header("Cache-control: max-age=".OBC_EXPIRATION.", must-revalidate");
				@header("Expires: ".gmdate("D, d M Y H:i:s",time()+OBC_EXPIRATION)." GMT");
			};
			IF ($date) @header("Last-Modified: {$date}");
			@header("ETag: {$etag}");
			IF ($return_gzip){
				@header("Content-Encoding: gzip");
				DIE($response["gzip"]);
			}ELSE DIE($response["content"]);
		}ELSE{
			IF (OBC_CREATE_CACHE) obc_create_cache($url,$file);
		};
	};
};
IF (!function_exists("obc_create_cache")){
	FUNCTION obc_create_cache($url,$file){
		$file_path = OBC_PATH."/".$file;

		$response = obc_get_url($url);
		IF ($response === false) RETURN false;

		$empty_content = (strlen($response["content"]) == 0);
		$headers = explode("\r\n",$response["headers"]);

		IF (!$empty_content) IF (!preg_match("'(</html>|</rss>|</feed>)'i",$response["content"])) $no_cache = true;
		FOREACH ($headers as $x=>$header){
			IF (!$empty_content) IF (in_array(strtolower($header),array("transfer-encoding: chunked","connection: close"))) unset($headers[$x]);
			IF (!$empty_content) IF (preg_match("'^date: 'i",$header)) $date = substr($header,6);
			IF (OBC_ENABLE_BROWSER_CACHE) IF (preg_match("'^(expires: |cache-control: |pragma: )'i",$header)) unset($headers[$x]);
			IF (!OBC_CACHE_ERROR_PAGES) IF (preg_match("'^HTTP/1.[0|1] 404'i",$header)) $no_cache = true;
			IF (!OBC_CACHE_REDIRECTIONS) IF (preg_match("'^HTTP/1.[0|1] 30[1|2]'i",$header)) $no_cache = true;
		};
		$response["headers"] = implode("\r\n",$headers);
		IF (!$empty_content){
			IF (!OBC_LOOK_FOR_DYNAMIC_CODE){
				global $obc_request_headers;
				IF ($date && $obc_request_headers["If-Modified-Since"] == $date) $not_modified = true;
			};

			$save_gzip = (OBC_GZIP && function_exists("gzencode"));
			$return_gzip = ($save_gzip && OBC_ACCEPT_GZIP && !headers_sent());

			IF (OBC_LOOK_FOR_DYNAMIC_CODE) IF ($dynamic_code = obc_dynamic_code($response["content"])){
				IF (!$no_cache) $save["content"] = obc_remove_dynamic_code($response["content"]);
				$response["content"] = obc_replace_dynamic_code($response["content"]);
			};

			$comment = "\n<!-- Loaded originally in ".obc_timer_stop(2)." seconds (".date("Y-m-d, H:i:s")."). -->";
			IF ($save_gzip){
				$comment .= "\n<!-- Loaded from cache by 1 Blog Cacher - http://1blogcacher.com/ -->";
				$response["gzip"] = gzencode($response["content"].$comment);
				IF ($dynamic_code && !$no_cache) $save["gzip"] = gzencode($save["content"].$comment);
			};

			IF (!$dynamic_code && OBC_LOOK_FOR_DYNAMIC_CODE){
				global $obc_request_headers;
				IF ($date && $obc_request_headers["If-Modified-Since"] == $date) $not_modified = true;
			};
			$etag = ($return_gzip)? md5($response["gzip"]) : md5(preg_replace("'(</html>|</rss>|</feed>)(.*?)$'s","\\1",$response["content"]));
			IF ($obc_request_headers["If-None-Match"] == $etag) $not_modified = true;
		};

		IF (!$no_cache){
			$this_path = OBC_PATH;
			$directories = explode("/",$file);
			FOREACH ($directories as $directory){
				IF (!is_writable($this_path)) RETURN false;
				$this_path .= "/".$directory;
				IF ($this_path == $file_path){
					$file_txt = "{$file_path}.txt";
					obc_save_file($file_txt,$response["headers"]);
					IF (!$empty_content){
						$file_html = "{$file_path}.html";
						$file_gzip = "{$file_html}.gz";
						$save_array = ($dynamic_code)? "save" : "response";
						obc_save_file($file_html,${$save_array}["content"].$comment);
						IF ($save_gzip) obc_save_file($file_gzip,${$save_array}["gzip"]);
					};
				}ELSE{
					IF (!is_dir($this_path)){
						@mkdir($this_path,0777);
						@chmod($this_path,0777);
					};
				};
			};
		};

		IF ($not_modified) obc_status_304();
		FOREACH ($headers as $header) @header($header);
		IF ($empty_content) DIE;

		IF (OBC_ENABLE_BROWSER_CACHE){
			@header("Cache-control: max-age=".OBC_EXPIRATION.", must-revalidate");
			@header("Expires: ".gmdate("D, d M Y H:i:s",time()+OBC_EXPIRATION)." GMT");
		};
		IF ($date) @header("Last-Modified: {$date}");
		@header("ETag: {$etag}");
		IF ($return_gzip){
			@header("Content-Encoding: gzip");
			DIE($response["gzip"]);
		}ELSE DIE($response["content"].$comment);
	};
};
IF (!function_exists("obc_url_to_file")){
	FUNCTION obc_url_to_file($url){
		global $obc_rejected_strings, $obc_accepted_strings;

		IF (obc_url_has_www($url) && !obc_url_has_www(OBC_SITE_URL)) $www = "www/";
		ELSEIF (!obc_url_has_www($url) && obc_url_has_www(OBC_SITE_URL)) $www = "no-www/";

		IF (obc_canonical_url($url) == obc_canonical_url(OBC_SITE_URL)."/") RETURN (OBC_CACHE_DIRECTORIES)? "{$www}index.php" : md5("{$www}index.php");
		IF (strpos(obc_canonical_url($url),obc_canonical_url(OBC_SITE_URL)) !== 0) RETURN false;

		$file = substr(obc_canonical_url($url),strlen(obc_canonical_url(OBC_SITE_URL)));
		IF (strpos($file,"/wp-cache") === 0) RETURN false;
		IF (strpos($file,"/wp-admin") === 0) RETURN false;
		IF (strpos($file,"/wp-login") === 0) RETURN false;
		
		$rejected = false;
		IF (!isset($obc_rejected_strings)){
			$obc_rejected_strings = explode(",",OBC_REJECTED_STRINGS);
			$obc_rejected_strings = array_filter($obc_rejected_strings);
			IF (count($obc_rejected_strings)){
				FOREACH ($obc_rejected_strings as $x=>$rejected_string){
					$rejected_string = trim($rejected_string);
					IF (strpos($file,$rejected_string) !== false) $rejected = true;
					$obc_rejected_strings[$x] = $rejected_string;
				};
			};
		}ELSEIF (count($obc_rejected_strings)) FOREACH ($obc_rejected_strings as $x=>$rejected_string) IF (strpos($file,$rejected_string) !== false){
			$rejected = false;
			break;
		};
		IF ($rejected){
			IF (!isset($obc_accepted_strings)){
				$obc_accepted_strings = explode(",",OBC_ACCEPTED_STRINGS);
				$obc_accepted_strings = array_filter($obc_accepted_strings);
				IF (count($obc_accepted_strings)){
					FOREACH ($obc_accepted_strings as $x=>$accepted_string){
						$accepted_string = trim($accepted_string);
						IF (strpos($file,$accepted_string) !== false) $rejected = false;
						$obc_accepted_strings[$x] = $accepted_string;
					};
				};
			}ELSEIF (count($obc_accepted_strings)) FOREACH ($obc_accepted_strings as $x=>$accepted_string) IF (strpos($file,$accepted_string) !== false){
				$rejected = false;
				break;
			};
		};
		IF ($rejected) RETURN false;

		$file = preg_replace("'[ <>\'\"\r\n\t\(\)]'","",$file);
		$file = $www.obc_remove_leading_slash($file);
		IF (strpos($file,"index.php?") === 0) $file = substr($file,10);
		IF (strpos($file,"?") === 0) $file = substr($file,1);
		IF (strpos($file,"&") === 0) $file = substr($file,1);
		IF (OBC_CACHE_DIRECTORIES){
			IF (substr($file,-1) == "/") $file .= "index.php";
			$file = str_replace(array("?","&"),"/",$file);
		}ELSE $file = md5($file);
		WHILE (strpos($file,"//") !== false) $file = str_replace("//","/",$file);
		RETURN $file;
	};
};
IF (!function_exists("obc_get_url")){
	FUNCTION obc_get_url($url){
		IF (function_exists("curl_init")){
			$curl = curl_init();
			@curl_setopt($curl,CURLOPT_URL,OBC_SCHEME.$url);
			@curl_setopt($curl,CURLOPT_FAILONERROR,0);
			@curl_setopt($curl,CURLOPT_FOLLOWLOCATION,0);
			@curl_setopt($curl,CURLOPT_HEADER,1);
			@curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
			@curl_setopt($curl,CURLOPT_PORT,OBC_PORT);
			@curl_setopt($curl,CURLOPT_TIMEOUT,15);
			@curl_setopt($curl,CURLOPT_USERAGENT,"1 Blog Cacher - [{$_SERVER["HTTP_USER_AGENT"]}]");
			IF (OBC_USER_STRING) @curl_setopt($curl,CURLOPT_COOKIE,obc_get_cookies());
			$content = curl_exec($curl);
			curl_close($curl);
			IF ($content === false) RETURN false;
			$response_headers = preg_split("'\r\n\r\n'",$content);
			IF (!is_array($response_headers)) RETURN false;
			$response_headers = $response_headers[0];
			$content = substr($content,strlen($response_headers)+4);
		}ELSE{
			$path = explode("/",$url);
			$host = array_shift($path);
			$path = implode("/",$path);
	
			$socket = fsockopen(OBC_SECURE_SCHEME.$host,OBC_PORT,$errno,$errstr);
			IF (!$socket) RETURN false;
	
			$request_headers = "GET /{$path} HTTP/1.1\r\n";
			$request_headers .= "Host: {$host}\r\n";
			$request_headers .= "User-Agent: 1 Blog Cacher - [{$_SERVER["HTTP_USER_AGENT"]}]\r\n";
			IF (OBC_USER_STRING) $request_headers .= "Cookie: ".obc_get_cookies()."\r\n";
			$request_headers .= "Content-Type: application/x-www-form-urlencoded\r\n";     
			$request_headers .= "Connection: close\r\n\r\n";
			fwrite($socket,$request_headers);
	
			$response_headers = "";
			$content = "";
			DO $response_headers .= fread($socket,1);
			WHILE (!preg_match("'\\r\\n\\r\\n$'",$response_headers));
			$response_headers = chop($response_headers);
	      
			IF (strpos($response_headers,"Transfer-Encoding: chunked") === false) WHILE (!feof($socket)) $content .= fgets($socket,128);
			ELSE{
				WHILE ($chunk_length = hexdec(fgets($socket))){
					$content_chunk = "";
					$read_length = 0;
					WHILE ($read_length < $chunk_length){
						$content_chunk .= fread($socket,$chunk_length-$read_length);
						$read_length = strlen($content_chunk);
					};
					$content .= $content_chunk;
					fgets($socket);
				};
			};
			fclose($socket);
		};
		RETURN array("content"=>chop($content),"headers"=>$response_headers);
	};
};
IF (!function_exists("obc_save_file")){
	FUNCTION obc_save_file($file,$content){
		$file_pointer = @fopen($file,"w+");
		IF ($file_pointer){
			@flock($file_pointer,LOCK_EX);
			@fwrite($file_pointer,$content);
			@flock($file_pointer,LOCK_UN);
			fclose($file_pointer);
		}ELSE RETURN false;
	};
};
IF (!function_exists("obc_load_file")){
	FUNCTION obc_load_file($file){
		IF (function_exists("file_get_contents"))RETURN file_get_contents($file);
		ELSEIF (@$file_pointer = fopen($file,"r")){
			WHILE (!feof($file_pointer)) $content .= fread($file_pointer,4096);
			fclose($file_pointer);
			RETURN $content;
		}ELSE RETURN false;
	};
};
IF (!function_exists("obc_clean_directory")){
	FUNCTION obc_clean_directory($path){
		$path = obc_remove_trailing_slash($path);
		$path = str_replace("\\","/",$path);
		RETURN $path;
	};
};
IF (!function_exists("obc_clean_url")){
	FUNCTION obc_clean_url($url){
		$url = parse_url($url);
		$url_file = $url["host"];
		IF (strlen($url["port"])) $url_file .= ":".$url["port"];
		$url_file .= $url["path"];
		IF (defined("OBC_SITE_URL")) IF (OBC_AVOID_TRAILING_SLASH_DUPLICATION && $url_file != OBC_SITE_URL."/" && substr($url_file,-1) == "/") $url_file = substr($url_file,0,-1);
		$url_querystring = $url["query"];
		$url = $url_file;
		IF (strlen($url_querystring)){
			$url_querystring = obc_clean_querystring($url_querystring);
			IF (strlen($url_querystring)) $url .= "?".$url_querystring;
		};
		RETURN $url;
	};
};
IF (!function_exists("obc_canonical_url")){
	FUNCTION obc_canonical_url($url){
		IF (substr($url,0,4) == "www.") $url = substr($url,4);
		RETURN $url;
	};
};
IF (!function_exists("obc_url_has_www")){
	FUNCTION obc_url_has_www($url){
		RETURN (substr($url,0,4) == "www.");
	};
};
IF (!function_exists("obc_clean_querystring")){
	FUNCTION obc_clean_querystring($string){
		$string = str_replace("&amp;","&",$string);
		$string = explode("&",$string);
		$array = array();
		FOREACH ($string as $element){
			$value = explode("=",$element);
			$key = array_shift($value);
			$value = implode("=",$value);
			IF (strlen($value)) $array[$key] = $value;
		};
		$string = array();
		FOREACH ($array as $key=>$value) $string[] = $key."=".$value;
		$string = implode("&",$string);
		RETURN $string;
	};
};
IF (!function_exists("obc_remove_trailing_slash")){
	FUNCTION obc_remove_trailing_slash($path){
		WHILE (in_array(substr($path,-1),array("/","\\"))) $path = substr($path,0,-1);
		RETURN $path;
	};
};
IF (!function_exists("obc_remove_leading_slash")){
	FUNCTION obc_remove_leading_slash($path){
		WHILE (in_array(substr($path,0,1),array("/","\\"))) $path = substr($path,1);
		RETURN $path;
	};
};
IF (!function_exists("obc_request_headers")){
	FUNCTION obc_request_headers(){
		FOREACH ($_SERVER as $name=>$value)
		IF (substr($name,0,5) == "HTTP_") $headers[str_replace(" ","-",ucwords(strtolower(str_replace("_"," ",substr($name,5)))))] = $value;
		RETURN $headers;
	};
};
IF (!function_exists("obc_get_cookies")){
	FUNCTION obc_get_cookies(){
		FOREACH ($_COOKIE as $name=>$value) $cookies .= "{$name}={$value};";
		RETURN substr($cookies,0,-1);
	};
};
IF (!function_exists("obc_status_304")){
	FUNCTION obc_status_304(){
		IF (!headers_sent()){
			$protocol = $_SERVER["SERVER_PROTOCOL"];
			IF (!in_array($protocol,array("HTTP/1.0","HTTP/1.1"))) $protocol = "HTTP/1.0";
			@header("{$protocol} 304 Not Modified");
			DIE;
		};
	};
};
IF (!function_exists("obc_dynamic_code")){
	FUNCTION obc_dynamic_code($content){
		RETURN preg_match("'<!--mclude|<!--mfunc'",$content);
	};
};
IF (!function_exists("obc_replace_dynamic_code")){
	FUNCTION obc_replace_dynamic_code($content){
		$content = preg_replace_callback("'<!--mclude(.*?)-->(.*?)<!--/mclude-->'is","obc_mclude",$content);
		$content = preg_replace_callback("'<!--mfunc(.*?)-->(.*?)<!--/mfunc-->'is","obc_mfunc",$content);
		RETURN $content;
	};
};
IF (!function_exists("obc_remove_dynamic_code")){
	FUNCTION obc_remove_dynamic_code($content){
		$content = preg_replace("'<!--mfunc(.*?)-->(.*?)<!--/mfunc-->'is","<!--mfunc \\1--><!--/mfunc-->",$content);
		$content = preg_replace("'<!--mclude(.*?)-->(.*?)<!--/mclude-->'is","<!--mclude \\1--><!--/mclude-->",$content);
		RETURN $content;
	};
};
IF (!function_exists("obc_mfunc")){
	FUNCTION obc_mfunc($matches){
		$code = trim($matches[1]);
		IF (!$code) RETURN "";
		IF (substr($code,-1) != ";") $code .= ";";
		ob_start();
		@eval($code);
		$content = ob_get_contents();
		ob_end_clean();
		RETURN $content;
	};
};
IF (!function_exists("obc_mclude")){
	FUNCTION obc_mclude($matches){
		$file = trim($matches[1]);
		IF (!$file) RETURN "";
		IF (substr($file,0,1) != "/") $file = "/{$file}";
		ob_start();
		@include(ABSPATH.$file);
		$content = ob_get_contents();
		ob_end_clean();
		RETURN $content;
	};
};
IF (!function_exists("obc_timer_stop")){
	FUNCTION obc_timer_stop($decimals){
		global $timestart;
		$timer = microtime();
		$timer = explode(" ",$timer);
		$timer = $timer[1]+$timer[0];
		$timer = $timer-$timestart;
		RETURN number_format($timer,$decimals);
	};
};
obc_cache_init();
?>