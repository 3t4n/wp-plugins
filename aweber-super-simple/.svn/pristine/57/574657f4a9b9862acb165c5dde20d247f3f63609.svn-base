<?php

/**
 * All the code in this file is either dead, or related to 
 * code that handled AWeber signups for people adding 
 * comments to the blog.  Comment registration will come 
 * back in the future.  Hold on to this code until comment
 * registration is correctly implemented.
 */

/**
 * 
 * @return nothing.  $r is the ultimate end of an fgets 
 * call from the near of an http request.  Gross.
 * 
 * @param object $email address of person wanting to register
 * @param object $name of person wanting to register
 */
	function AweberRegister($email, $name) {
		
		global $wpdb;

		$qe = $wpdb->escape(strtolower($email));
		$prev = $wpdb->get_row("SELECT * FROM $this->table WHERE LOWER(email)='$qe'");
		if ( $prev )
			return;

		$r = $wpdb->query("INSERT INTO $this->table (`email`,`when`) VALUES('$qe', NOW())");

		$params = array(
			"meta_web_form_id" => $this->formid,
			"meta_split_id" => "",
			"unit" => $this->unit,
			"redirect" => "http://www.aweber.com/form/thankyou_vo.html",
			"meta_redirect_onlist" => "",
			"meta_adtracking" => $this->adtracking,
			"meta_message" => "1",
			"meta_required" => "from",
			"meta_forward_vars" => "0",
			"from" => $email,
			"name" => $name,
			"submit" => "Submit"
		);

		$r = $this->_post('http://www.aweber.com/scripts/addlead.pl', $params);
	}


/**
 * 
 * @return result of _request call, which is result of fgets call
 * waiting on an http return from a socket taking data from fputs.
 * @param object $url
 * @param object $fields
 */
	function _post($url, $fields) {
		return $this->_request(true, $url, $fields);
	}

/**
 * 
 * @return result of _http call, which is result of fgets call
 * waiting on an http return from a socket taking data from fputs.
 * @param object $post bool, use POST if true
 * @param object $url
 * @param object $fields
 */
	function _request($post, $url, $fields) {
		$postfields = array();
		if ( count($fields) )
			foreach ( $fields as $i => $f )
				$postfields[] = urlencode($i) . '=' . urlencode($f);
		$fields = implode('&', $postfields);

		return $this->_http($post ? 'POST' : 'GET', $url, $fields);

		$ch = curl_init($url);

		$ck = array();
		if ( count($this->cookies) )
			foreach ( $this->cookies as $n => $v )
				$ck[] = $n . '=' . $v;
		$headers = array(
			"Cookie: " . implode('; ', $ck),
			"User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.11) Gecko/20071127 Firefox/2.0.0.11", "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5", "Accept-Language: en-us,en;q=0.5", "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "Keep-Alive: 300", "Connection: keep-alive",
		);

		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		if ( $post ) {
			curl_setopt($ch, CURLOPT_POST, true);

			$postfields = array();
			if ( count($fields) )
				foreach ( $fields as $i => $f )
					$postfields[] = urlencode($i) . '=' . urlencode($f);
			$fields = implode('&', $postfields);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

			$headers[] = "Content-Type: application/x-www-form-urlencoded";
			$headers[] = "Content-Length: " . strlen($fields);
		}
		curl_setopt($ch, CURLOPT_HEADER, $this->headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		if ( isset($this->last) && $this->last )
			curl_setopt($ch, CURLOPT_REFERER, $this->last);

		$res = curl_exec($ch);
		if ( !is_string($res) )
			$this->_log($res, true);
		curl_close($ch);

		if ( $res )
			foreach ( explode("\n", $res) as $r )
				if ( preg_match('~Set-Cookie:\s+([^=]+)=([^;]*)~i', $r, $subs) )
					$this->cookies[$subs[1]] = $subs[2];

		return $res;
	}

	function _http($method, $url, $data = null) {
		preg_match('~http://([^/]+)(/.*)~', $url, $subs);
		$host = $subs[1];
		$uri = $subs[2];

		$header .= "$method $uri HTTP/1.1\r\n";
		$header .= "Host: $host\r\n";
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-Length: " . strlen($data) . "\r\n\r\n";
		$fp = fsockopen ($host, 80, $errno, $errstr, 30);

		if ( $fp ) {
			fputs($fp, $header . $data);
			$result = '';
			while ( !feof($fp) )
				$result .= fgets($fp, 4096);
		}

		fclose($fp);
		return $result;
	}


?>