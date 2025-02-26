<?php

namespace alpha_cache;

class ServerVars {

	static function getClientIP(): string {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$IP = $_SERVER['HTTP_CLIENT_IP'];
		} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$IP = $_SERVER['REMOTE_ADDR'];
		}
		return $IP;
	}

	static function getSchema(): string {
		if (isset($_SERVER['REQUEST_SCHEME']))
			return $_SERVER['REQUEST_SCHEME'];
		if (empty($_SERVER["HTTPS"])) return 'http';
		return 'https';
	}

}
