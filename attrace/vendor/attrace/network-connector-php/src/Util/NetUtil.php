<?php


namespace Attrace\Connector\Util;

use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Entity\Address;
use Attrace\Connector\Exceptions\AttraceException;

class NetUtil
{
	private static $overrideHttpMethod = null;
	private static $overrideRequestBody = null;
	private static $overrideRequestUri = null;
	
	
	public static function urlAddVars($url, array $vars)
	{
		if(empty($vars))
			return $url;
		
		$queries = [];
		foreach($vars as $key => $value) {
			if(!is_array($value)) {
				$queries[] = "{$key}={$value}";
				continue;
			}
			
			foreach($value as $val) {
				$queries[] = "{$key}={$val}";
			}
		}
		
		$queryStr = parse_url($url, PHP_URL_QUERY);
		$query = empty($queryStr) ? '?' : '&';
		$query .= implode('&', $queries);
		
		return "{$url}{$query}";
	}

    public static function urlAddVar($url, $key, $value)
    {
		if(empty($key))
			return $url;
		
		return self::urlAddVars($url, [$key => $value]);
    }

    /**
     * Create JSON output and exit
     *
     * @param $data
     */
    public static function jsonResponse($data)
    {
        // convert to Array if possible
        if (is_object($data)) {
            if (method_exists($data, 'toArray')) {
                $data = $data->toArray();
            }
        }


        if (!Util::isAssoc($data)) {
            //check if it is an array of object. If yes, try to convert to Array if possible
            foreach ($data as $key => &$entry) {
                if (is_object($entry)) {
                    if (method_exists($entry, 'toArray')) {
                        $entry = $entry->toArray();
                    }
                }
            }
        }

        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
        exit;
    }

    /**
     * Fix CORS headers
     */
    public static function setCORSHeaders()
    {
        header('Access-Control-Allow-Headers: Authorization, X-WP-Nonce,Content-Type, X-Requested-With, X-Attr-Signature, X-Attr-Timestamp');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Credentials: true');

        // send ok if request method is options
        if ('OPTIONS' == $_SERVER['REQUEST_METHOD']) {
            http_response_code(200);
            exit();
        }
    }

    public static function getQueryParams($route = null)
    {
        if (!$route) {
            $route = self::getRequestUri();
        }
        $parts = parse_url($route);
        if (!isset($parts['query'])) {
            return null;
        }
        parse_str($parts['query'], $params);
        $return = [];

        foreach ($params as $key => $param) {
            //whitelist tracking params
            if (in_array($key, Tracking::$mandatoryParams)) {
                $return[$key] = $param;
                continue;
            }
            if ((strlen($key) > 20) || (strlen($param) > 120)) {
                continue;
            }

            preg_match('/[a-zA-Z.\d\-_]{1,120}/', $param, $matches);
            if (!isset($matches[0])) {
                continue;
            }
            preg_match('/[a-zA-Z.\d\-_]{1,120}/', $key, $matches);
            if (!isset($matches[0])) {
                continue;
            }
            $return[$key] = $param;
        }
        return $return;
    }

    /**
     * Echo error and exit
     *
     * @param $msg
     * @param int $code
     * @param $trace
     */
    public static function errorExit($msg, $code = 400, $trace = null)
    {
        http_response_code($code);
        header('Content-Type: application/json');
        $responseArr = [
            'Error' => $msg,
            'Code'  => $code
        ];
        if ($trace) {
            $responseArr['Trace'] = $trace;
        }
        echo json_encode(
            $responseArr
            , JSON_PRETTY_PRINT);
        exit;
    }

    /**
     * Redirect ot other page
     * @param $url
     */
    public static function redirect($url)
    {
        //need 302 to avoid caching
        header("Location: " . $url, true, 302);
        exit();
    }
	
	public static function isHttpsConnection()
	{
		$isHttps = false;
		if((!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https') ||
			(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ||
			(!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443')) {
			$isHttps = true;
		}
		return $isHttps;
	}

    public static function getDomainUrl($withSlash = false)
	{
		$scheme = self::isHttpsConnection() ? 'https' : 'http';
    	
        $url = $scheme . "://" . $_SERVER['HTTP_HOST'];
        if ($withSlash) {
            return trim($url, '/') . '/';
        }
        return trim($url, '/');
    }


    public static function setOverrideHttpMethod($method)
    {
        self::$overrideHttpMethod = $method;
    }

    public static function setOverrideRequestBody($body)
    {
        self::$overrideRequestBody = $body;
    }

    public static function setOverrideRequestUri($uri)
    {
        self::$overrideRequestUri = $uri;
    }

    public static function getHttpMethod()
    {
        if (!self::$overrideHttpMethod) {
            return $_SERVER['REQUEST_METHOD'];
        }
        return self::$overrideHttpMethod;
    }

    public static function getRequestUri()
    {
        if (!self::$overrideRequestUri) {
            return $_SERVER["REQUEST_URI"];
        }
        return self::$overrideRequestUri;
    }

    public static function getRequestBody()
    {
        if (!self::$overrideRequestBody) {
            return file_get_contents('php://input');
        }
        return self::$overrideRequestBody;
    }

    public static function getJsonRequestBody()
    {
        return json_decode(self::getRequestBody(), true);
    }

    /**
     * Check current request. Auth structure:
     *
     * [
     * Constants::HTTP_GET    => self::AUTH_NONE,
     * Constants::HTTP_DELETE => self::AUTH_NONE,
     * Constants::HTTP_PUT    => self::AUTH_NONE,
     * Constants::HTTP_POST   => self::AUTH_NONE,
     * ];
     * auth can be none, monitor and admin
     *
     * @param $auth
     */
    public static function authCurrentRequest($auth)
    {
        $access = isset($auth[self::getHttpMethod()]) ? $auth[self::getHttpMethod()] : Constants::AUTH_BLOCKED;
        switch ($access) {
            case Constants::AUTH_BLOCKED:
				self::errorExit('Method not allowed: ' . self::getHttpMethod() . ' - ' . $_SERVER['REQUEST_METHOD'] . ' ' . json_encode($auth), 405);
                break;
            case Constants::AUTH_NONE:
                //all is allowed
                break;
            case Constants::AUTH_ADMIN:
                $response = self::authByVerifiedTimestamp(Constants::AUTH_ADMIN);
                if ($response['message'] != "ok") {
					self::errorExit($response['message'], $response['code']);
                }
                break;
            case Constants::AUTH_MONITOR:
                $response = self::authByVerifiedTimestamp(Constants::AUTH_MONITOR);
                if ($response['message'] != "ok") {
                    $response = self::authByVerifiedTimestamp(Constants::AUTH_ADMIN);
                }
                if ($response['message'] != "ok") {
					self::errorExit($response['message'], $response['code']);
                }
                break;
        }
    }

    /**
     * Check if this request is valid by timestamp
     *
     * @param string $access
     * @return array
     * @throws AttraceException
     */
    public static function authByVerifiedTimestamp($access = Constants::AUTH_ADMIN)
    {
        //return ["message" => "ok", "code" => 200];
        $headers = self::getRequestHeadersLowerCaseKeys();
        //ADMIN AUTH
        if ($access == Constants::AUTH_ADMIN) {
            $address = ConfigController::getInstance()->get(ConfigModel::ACCOUNT);
            if (!$address) {
                return ["message" => "No admin account configured", "code" => 405];
            }
        } // MONITOR AUTH
        else if ($access == Constants::AUTH_MONITOR) {
            //this is a monitor request
            if (!isset($headers[Constants::HEADER_ACCOUNT])) {
                return ["message" => "Missing account in header (" . Constants::HEADER_ACCOUNT . ")", "code" => 405];
            }
            $monitorAddress = $headers[Constants::HEADER_ACCOUNT];
            $monitors       = json_decode(ConfigController::getInstance()->get(ConfigModel::MONITORS), true);
            if (!is_array($monitors) || !in_array($monitorAddress, $monitors)) {
                return ["message" => "Monitor account not found", "code" => 400];
            }
            $address = $monitorAddress;
        } // UKNOWN AUTH
        else {
            return ["message" => "Unknown access type " . $access, "code" => 400];
        }

        //NO SIGNATURE
        if (!isset($headers[Constants::HEADER_SIGNATURE])) {
            return ["message" => "missing signature", "code" => 400];
        }
        $signatureBase64 = $headers[Constants::HEADER_SIGNATURE];

        // NO TIMESTAMP
        if (!isset($headers[Constants::HEADER_TIMESTAMP])) {
            return ["message" => "missing timestamp", "code" => 400];
        }
        $timestamp = $headers[Constants::HEADER_TIMESTAMP];

        $current = Util::getCurrentTimeMs();

        $expiration = Constants::FIVE_MIN_IN_MLS;

        //when working local, longer expiration
        if (strpos(self::getDomainUrl(), 'localhost') !== false) {
            $expiration = Constants::HOUR_IN_MLS;
        }
        if (($timestamp + $expiration) < $current) {
            return ["message" => "timestamp expired " . $timestamp . ", system time = " . Util::getCurrentTimeMs(), "code" => 400];
        }


        try {
            $addressObject = Address::fromBase32($address);
            if (!$addressObject->verifyTimestamp($timestamp, $signatureBase64)) {
                return ["message" => "invalid signature", "code" => 400];
            }
        } catch (AttraceException $e) {
            //do we want to show debug?
            return ["message" => 'exception ' . $e->getCode(), "code" => 400];
        }
        return ["message" => "ok", "code" => 200];
    }


    public static function getRequestHeadersLowerCaseKeys()
    {
        $headers = array();
        foreach ($_SERVER as $key => $value) {
            if (substr($key, 0, 5) <> 'HTTP_') {
                continue;
            }
            $header                       = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
            $headers[strtolower($header)] = $value;
        }
        return $headers;
    }


    /***
     * Get and safety check a param
     *
     * @param $varName
     * @param null $route
     * @return bool|mixed
     */
    public static function getCheckParam($varName, $route = null)
    {
        if (!$route) {
            $route = self::getRequestUri();
        }
        $parts = parse_url($route);
        if (!isset($parts['query'])) {
            return false;
        }
        parse_str($parts['query'], $query);
        if (!isset($query[$varName])) {
            return false;
        }

        $value = $query[$varName];
        if (strlen($value) > 120) {
            return false;
        }

        preg_match('/[a-zA-Z.\d]{1,120}/', $value, $matches);
        return isset($matches[0]) ? $matches[0] : false;
    }


    /**
     * get cookie domain, i.e
     * https://sub.test.com => .test.com
     * @param $url
     * @return string|null
     */
    public static function cookie_domain($url)
    {
		$domain = parse_url($url, PHP_URL_HOST);
		if(empty($domain)) {
			return null;
		}
		$parts = array_reverse(explode('.', $domain));
		if(count($parts) < 3) {
			return $domain;
		}
	
		// third-level domains which are not subdomains filtered from https://wiki.mozilla.org/TLD_List
		$thirdLevel = array_flip(explode(' ', 'com.ar gov.ar int.ar mil.ar net.ar org.ar e164.arpa in-addr.arpa iris.arpa ip6.arpa uri.arpa urn.arpa com.bd edu.bd net.bd gov.bd org.bd mil.bd com.bn edu.bn org.bn net.bn agr.br am.br art.br edu.br com.br coop.br esp.br far.br fm.br g12.br gov.br imb.br ind.br inf.br mil.br net.br org.br psi.br rec.br srv.br tmp.br tur.br tv.br etc.br adm.br adv.br arq.br ato.br bio.br bmd.br cim.br cng.br cnt.br ecn.br eng.br eti.br fnd.br fot.br fst.br ggf.br jor.br lel.br mat.br med.br mus.br not.br ntr.br odo.br ppg.br pro.br psc.br qsl.br slg.br trd.br vet.br zlg.br dpn.br nom.br com.co edu.co org.co gov.co mil.co net.co nom.co ac.cr co.cr ed.cr fi.cr go.cr or.cr sa.cr com.cy biz.cy info.cy ltd.cy pro.cy net.cy org.cy name.cy tm.cy ac.cy ekloges.cy press.cy parliament.cy edu.do gov.do gob.do com.do org.do sld.do web.do net.do mil.do art.do eun.eg edu.eg sci.eg gov.eg com.eg org.eg net.eg mil.eg com.et gov.et org.et edu.et net.et biz.et name.et info.et biz.fj com.fj info.fj name.fj net.fj org.fj pro.fj ac.fj gov.fj mil.fj school.fj co.fk org.fk gov.fk ac.fk nom.fk net.fk com.gh edu.gh gov.gh org.gh mil.gh com.gn ac.gn gov.gn org.gn net.gn ac.id co.id or.id go.id ac.il co.il org.il net.il k12.il gov.il muni.il idf.il edu.jm gov.jm com.jm net.jm org.jm per.kh com.kh edu.kh gov.kh mil.kh net.kh org.kh com.kw edu.kw gov.kw net.kw org.kw mil.kw org.kz edu.kz net.kz gov.kz mil.kz com.kz net.lb org.lb gov.lb edu.lb com.lb com.lc org.lc edu.lc gov.lc com.lr edu.lr gov.lr org.lr net.lr org.ls co.ls aero.mv biz.mv com.mv coop.mv edu.mv gov.mv info.mv int.mv mil.mv museum.mv name.mv net.mv org.mv pro.mv ac.mw co.mw com.mw coop.mw edu.mw gov.mw int.mw museum.mw net.mw org.mw com.mx net.mx org.mx edu.mx gob.mx com.my net.my org.my gov.my edu.my mil.my name.my edu.ng com.ng gov.ng org.ng net.ng com.np org.np edu.np net.np gov.np mil.np ac.nz co.nz cri.nz gen.nz geek.nz govt.nz iwi.nz maori.nz mil.nz net.nz org.nz school.nz com.om co.om edu.om ac.com sch.om gov.om net.om org.om mil.om museum.om biz.om pro.om med.om com.pa ac.pa sld.pa gob.pa edu.pa org.pa net.pa abo.pa ing.pa med.pa nom.pa com.pe org.pe net.pe edu.pe mil.pe gob.pe nom.pe com.pg net.pg net.py org.py gov.py edu.py com.py com.sa edu.sa sch.sa med.sa gov.sa net.sa org.sa pub.sa com.sb gov.sb net.sb edu.sb edu.sv com.sv gob.sv org.sv red.sv ac.th co.th in.th go.th mi.th or.th net.th com.tn intl.tn gov.tn org.tn ind.tn nat.tn tourism.tn info.tn ens.tn fin.tn net.tn co.tz ac.tz go.tz or.tz ne.tz ac.uk co.uk gov.uk ltd.uk me.uk mil.uk mod.uk net.uk nic.uk nhs.uk org.uk plc.uk police.uk sch.uk edu.uy gub.uy org.uy com.uy net.uy mil.uy vatican.va com.ve net.ve org.ve info.ve co.ve web.ve ac.yu co.yu org.yu edu.yu ac.za city.za co.za edu.za gov.za law.za mil.za nom.za org.za school.za alt.za net.za ngo.za tm.za web.za co.zm org.zm gov.zm sch.zm ac.zm co.zw org.zw gov.zw ac.zw'));
		$last2 = "{$parts[1]}.{$parts[0]}";
		if(isset($thirdLevel[strtolower($last2)])) {
			return "{$parts[2]}.{$last2}";
		}
		
		return $last2;
    }

    /**
     * @param $agreementAddress
     * @return string
     */
    public static function getAgreementCookieKey($agreementAddress)
    {
        return Constants::COOKIE_ACPKEY . '_' . $agreementAddress;
    }
	
	/**
	 * @param $url
	 * @param null|string $postData
	 * @param array|string $httpHeaders
	 * @return array ['header' => $header, 'body' => $body]
	 * @throws AttraceException
	 */
	public static function doRequest($url, $postData = null, $httpHeaders = [])
	{
		$cURLConnection = curl_init();
		curl_setopt($cURLConnection, CURLOPT_URL, $url);
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cURLConnection, CURLOPT_HEADER, true);
		curl_setopt($cURLConnection, CURLOPT_TIMEOUT, Constants::HTTP_TIMEOUT);
		curl_setopt($cURLConnection, CURLOPT_CONNECTTIMEOUT, Constants::HTTP_TIMEOUT);
		
		// https support: https://curl.haxx.se/ca/cacert.pem
		if(parse_url($url, PHP_URL_SCHEME) == 'https') {
			$certPath = dirname(__FILE__) . "/cacert.pem";
			if(file_exists($certPath)) {
				curl_setopt($cURLConnection, CURLOPT_CAINFO, $certPath);
			} else {
				curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, 0);
			}
		}
		
		if(!is_null($postData)) {
			curl_setopt($cURLConnection, CURLOPT_POST, 1);
			curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postData);
		}
		
		$extraHeaders = ['Accept-Encoding: gzip, deflate'];
		$httpHeaders = is_string($httpHeaders) ? [$httpHeaders] : $httpHeaders;
		$httpHeaders = empty($httpHeaders) ? $extraHeaders : array_merge($httpHeaders, $extraHeaders);
		if(!empty($httpHeaders)) {
			curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $httpHeaders);
			curl_setopt($cURLConnection, CURLOPT_ENCODING, '');
		}
		
		$response = curl_exec($cURLConnection);
		if (curl_errno($cURLConnection)) {
			throw new AttraceException(AttraceException::CURL_EXCEPTION, curl_error($cURLConnection));
		}
		
		$header_size  = curl_getinfo($cURLConnection, CURLINFO_HEADER_SIZE);
		$headerstring = substr($response, 0, $header_size);
		$body         = substr($response, $header_size);
		curl_close($cURLConnection);
		
		$header    = [];
		$headerArr = explode(PHP_EOL, $headerstring);
		foreach ($headerArr as $headerRow) {
			preg_match('/([a-zA-Z\-]+):\s(.+)$/', $headerRow, $matches);
			if (!isset($matches[0])) {
				continue;
			}
			$header[strtolower($matches[1])] = $matches[2];
		}
		
		return ['header' => $header, 'body' => $body];
	}
	
    /**
     * @param $url
     * @return array with body and header
     * @throws AttraceException
     */
    public static function doGetRequest($url)
    {
        return self::doRequest($url);
    }

    /**
     * @param string $url
     * @param array $data
     * @return array
     * @throws AttraceException
     */
    public static function doPostJsonRequest($url, $data)
    {
        $response = self::doRequest($url, json_encode($data), ['Content-Type: application/json']);

        return json_decode($response['body'] . "", true);
    }

    /**
     * @param $url
     * @param $binary
     * @return string
     * @throws AttraceException
     */
    public static function doBinaryRequest($url, $binary)
    {
		$response = self::doRequest($url, $binary, ['Content-Type: application/octet-stream']);

        return $response['body'] . "";
    }

    /**
     * Process the listed responses as returned by index node
     *
     * @param array $data
     * @return array
     */
    public static function processResponse(array $data)
    {
		$results = isset($data['Results']) ? $data['Results'] : [];
		if(count($results) == 0)
			return [];
		
		$dimensions = isset($data['Dimensions']) ? $data['Dimensions'] : [];
		$metrics = isset($data['Metrics']) ? $data['Metrics'] : [];

        $return = [];
        foreach ($results as $row) {
            $newRow = [];
			if(count($dimensions) > 0) {
				foreach($dimensions as $dimension) {
					$newRow[$dimension['Field']] = array_shift($row['Values']);
				}
			}
			if(count($metrics) > 0) {
				foreach($metrics as $metric) {
					$newRow[$metric['Field']] = array_shift($row['Values']);
					if($metric['DataType'] == 'json') {
						$newRow[$metric['Field']] = json_decode($newRow[$metric['Field']], true);
					}
					if($metric['DataType'] == 'Decimal') {
						$newRow[$metric['Field']] = floatval($newRow[$metric['Field']]);
					}
					if($metric['DataType'] == 'int64') {
						$newRow[$metric['Field']] = intval($newRow[$metric['Field']]);
					}
				}
			}
            $return[] = $newRow;
        }
        return $return;
    }

}