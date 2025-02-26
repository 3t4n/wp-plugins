<?php
namespace wp;

class AdmiralHttpHandler {
    /**
     * List of headers to skip when sending from the proxy
     * @var array
     */
    private static $headersToSkipSending = array(
        "Host",
        "Connection",
        "Transfer-Encoding",
        "TE",
        "Keep-Alive",
        "Expect",
        "Upgrade",
    );

    private $store;
    private $propertyID;
    private $environment;
    private $endpoint;
    private $embedCacheTimeout;

    public function __construct(
        AdmiralCacheStore $store, 
        string $propertyID,
        string $environment = "production",
        int $embedCacheTimeout = 86400
    ) {
        $this->store = $store;
        $this->propertyID = $propertyID;
        $this->environment = $environment;
        $this->embedCacheTimeout = $embedCacheTimeout;
    }

    /**
     * Handle proxying a request to Admiral's servers
     * @param string $path The path to proxy
     * @param array $server The server array
     * @return array The result of the proxy request
     */
    public function proxyRequest($path, $server = array()) {
        if (!$this->store->enabled()) {
            return array(
                "source" => "",
                "error" => array("code" => 0, "str" => "APCu not enabled"),
                "headers" => array(),
            );
        }

        $domain = "//owlsr.us";
        $url = $domain . $path;
        // we need to make sure Admiral proxies embeds with the correct uri
        // eh is embedHost, epp is embedPathPrefix, ehs is embedHostScheme
        $hostAndPrefix = $this->getSiteHostAndPrefix();
        $qs = "ehs=" . $this->getSiteScheme() . "&eh=" . $hostAndPrefix[0] . "&epp=" . $hostAndPrefix[1];
        // if it contains ?, then add new query params
        if (strpos($url, '?') !== false) {
            $url .= '&' . $qs;
        } else {
            $url .= '?' . $qs;
        }

        $ip = $this->getRealIP($server);
        $headers = $this->getHeadersFromServer($server);
        
        if (strpos($ip, "127.0.0.1") !== false) {
            $option = get_option("admiral_proxy_xff");
            if (!empty($option)) {
                $ip = $option;
            }
        }
        $headers["X-Forwarded-For"] = $ip;
        $headers["Accept-Encoding"] = "deflate";
        foreach (self::$headersToSkipSending as $header) {
            if (array_key_exists($header, $headers)) {
                unset($headers[$header]);
            }
        }

        // create a cache key using the path and headers that we can use for lookup
        $cacheKey = "admiral_proxy_" . md5($path . json_encode($headers));
        $cached = $this->store->fetch($cacheKey);
        $revalidate = false;
        $withinMaxAge = false;

        if ($cached) {
            $result = $this->handleCachedResponse($cached, $headers);
            if ($result !== null) {
                return $result;
            }
            $revalidate = $result['revalidate'];
            $withinMaxAge = $result['withinMaxAge'];
        }

        // Handle all methods that can have a body
        $methodsWithBody = ['POST', 'PUT', 'PATCH'];
        $requestMethod = $server['REQUEST_METHOD'];
        $requestBody = null;
        
        if (in_array($requestMethod, $methodsWithBody)) {
            if (!empty($_POST)) {
                $requestBody = $_POST;
            } else {
                $requestBody = file_get_contents('php://input');
            }
        }

        $result = $this->httpCall($url, $headers, $requestBody);
        
        // check for gzip encoding and inflate
        if (array_key_exists('content-encoding', $result['headers']) && stripos($result['headers']['content-encoding'], 'deflate') !== false) {
            $result["source"] = gzinflate($result["source"], 10, -8);
            unset($result["headers"]["content-encoding"]);
        }
        $result['now'] = time();

        if ($revalidate && $withinMaxAge) {
            $result = $this->handleRevalidation($result, $cached);
        }

        $this->handleCaching($result, $requestMethod === 'GET', $this->store, $cacheKey);
        
        return $result;
    }

    /**
     * Get the query params for the embed script
     * @return array
     */
    public function getEmbedQueryParams() {
        $queryParams = [];
        $hostAndPrefix = $this->getSiteHostAndPrefix();
        $host = $hostAndPrefix[0];
        $prefix = $hostAndPrefix[1];

        $queryParams["alternateScriptHost"] = $host;
        $scheme = self::getSiteScheme();
        if (!empty($scheme)) {
            $queryParams["alternateScriptScheme"] = $scheme;
        }
        $queryParams["alternateScriptPrefix"] = $prefix;
        return $queryParams;
    }

    /**
     * Get the proxy prefix for the given URI, or null if not found
     *
     * @param string $uri The URI to get the prefix for
     * @return string|null The proxy prefix or null if not found
     */
    public function getProxyPrefixForURI($uri) {
        // if the uri is less than 10 characters, then it can't be a prefix
        if (strlen($uri) < 10) {
            return null;
        }
        $prefixes = $this->getProxyPrefixes();
        foreach ($prefixes as $prefix) {
            if (strpos($uri, $prefix) === 0 && $uri[strlen($prefix)] === '/') {
                return $prefix;
            }
        }
        return null;
    }

    /**
     * Fetches the Admiral embed script with caching
     * 
     * @param string $endpoint The API endpoint to use
     * @param string $queryString Query string to append to the request
     * @param string $target The target to fetch
     * @param string $userAgent User agent to send with the request
     * @return string The embed script content
     */
    public function fetchEmbed(
        string $endpoint,
        string $userAgent,
        string $target = "bootstrap",
        string $queryString = ""
    ): string {
        if (!$this->store->enabled()) {
            return "";
        }
        
        $cacheKey = $this->getEmbedCacheKey($queryString, $endpoint);
        $cached = $this->store->fetch($cacheKey);
        
        if (!$cached || $this->shouldRevalidateEmbedCache($cached[0])) {
            $response = $this->fetchEmbedDirect($endpoint, $userAgent, $target, $queryString);
            if ($response) {
                $newData = [time(), $response];
                $this->store->store($cacheKey, $newData);
                return $response;
            }
        }
        
        return $cached ? $cached[1] : "";
    }

    /**
     * Gets the URL for the embed script
     */
    private function getEmbedURL(string $queryString = "", string $endpoint = "", string $target = "bootstrap"): string {
        $baseQuery = "environment={$this->environment}";
        if (!empty($queryString)) {
            $baseQuery .= "&{$queryString}";
        }
        return "{$endpoint}{$this->propertyID}/{$target}?{$baseQuery}";
    }

    /**
     * Gets the cache key for the embed script
     */
    private function getEmbedCacheKey(string $queryString = "", string $endpoint = "", string $target = "bootstrap"): string {
        return "admiral_{$this->getEmbedURL($queryString, $endpoint, $target)}";
    }

    /**
     * Checks if the cached embed script should be revalidated
     * 
     * @param int $time The time of the cached script
     * @return bool True if the cached script should be revalidated, false otherwise
     */
    private function shouldRevalidateEmbedCache(int $time): bool {
        return mt_rand(0, 99) === 0 && $time + $this->embedCacheTimeout < time();
    }

    /**
     * Directly fetches the embed script from Admiral's servers
     * 
     * @param string $endpoint The API endpoint to use
     * @param string $userAgent User agent to send with the request
     * @param string $target The target to fetch
     * @param string $queryString Query string to append to the request
     * @return string|null The embed script content or null if the request failed
     */
    private function fetchEmbedDirect(
        string $endpoint,
        string $userAgent,
        string $target,
        string $queryString
    ): ?string {
        $headers = ["User-Agent" => $userAgent];
        $options = ["timeout" => 0.75, "redirection" => 0];
        $result = $this->httpCall($this->getEmbedURL($queryString, $endpoint, $target), $headers, null, $options);
        return $result["source"] ?: null;
    }

    private function getProxyPrefixes() {
        $propertyNumber = $this->getPropertyNumber($this->propertyID);

        $prefixes = array();
        // Get prefixes for next 7 days starting from tomorrow
        for ($i = 0; $i < 8; $i++) {
            $timestamp = time() + 86400 - ($i * 86400); // Start with tomorrow
            $date = date('Ymd', $timestamp);
            $prefixes[] = $this->generateForSeed(10, floatval($date . $propertyNumber));
        }
        // swap tomorrow and today so that the current day is the first one
        // as an optimization for the proxy
        $today = $prefixes[0];
        $prefixes[0] = $prefixes[1];
        $prefixes[1] = $today;
        return $prefixes;
    }

    /**
     * Get the headers from the server array
     * @param array $server The server array
     * @return array The headers
     */
    private function getHeadersFromServer($server) {
        $headers = [];
        foreach ($server as $key => $value) {
            if (strpos($key, "HTTP_") === 0) {
                $name = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($key, 5)))));
                $headers[$name] = $value;
            } else if ($key === "CONTENT_TYPE") {
                $headers["Content-Type"] = $value;
            } else if ($key === "CONTENT_LENGTH") {
                $headers["Content-Length"] = $value;
            }
        }
        return $headers;
    }

    /**
     * Get the real IP address from the server array
     * @param array $server The server array
     * @return string The real IP address
     */
    private function getRealIP($server) {
        $headers = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', "HTTP_CF_CONNECTING_IP");
        foreach ($headers as $key) {
            if (array_key_exists($key, $server) === true) {
                foreach (explode(',', $server[$key]) as $ip) {
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return $server["REMOTE_ADDR"];
    }

    /**
     * Get the host and prefix for the site
     * @return array
     */
    private function getSiteHostAndPrefix() {
        $siteURL = get_site_url();
        $host = parse_url($siteURL, PHP_URL_HOST);
        $path = parse_url($siteURL, PHP_URL_PATH);

        $prefix = $this->getProxyPrefixToday();
        // if there is a path, then we need to prepend it to receive the request
        if (!empty($path) && $path !== '/') {
            $prefix = ltrim($path, '/') . $prefix;
        }
        return [$host, $prefix];
    }

    private function getSiteScheme() {
        if (isset($_SERVER['HTTP_CF_VISITOR'])) {
            // Cloudflare visitor header; don't bother json decoding
            // instead just look for https or default to http
            $scheme = strpos($_SERVER['HTTP_CF_VISITOR'], 'https') !== false ? "https" : "http";
        } else if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && ($_SERVER['HTTP_X_FORWARDED_PROTO'] === 'http' || $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) {
            // if behind a load balancer, use the X-Forwarded-Proto header when set to http or https
            $scheme = $_SERVER['HTTP_X_FORWARDED_PROTO'];
        } else {
            // otherwise, use the HTTPS server variable
            $scheme = !empty($_SERVER['HTTPS']) ? "https" : "http";
        }
        return $scheme;
    }

    private function valueFromSeed($seed) {
        $x = abs(sin($seed)) * 10000;
        $x = fmod(($x * 9301 + 49297), 233280);
        return max(min($x / 233280, 0.9999999999999999), 0);
    }

    private function generateForSeed($length, $seed) {
        $result = array();
        $characters = "abcdefghijklmnopqrstuvwxyz";
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $result[] = $characters[intval($this->valueFromSeed((float)($i . $seed)) * $charactersLength)];
        }
        return implode("", $result);
    }

    private function getPropertyNumber($propertyID) {
        $chunks = str_split(substr($propertyID, 2), 12);
        $sums = array_map(function($chunk) {
            return array_reduce(str_split($chunk), function($acc, $char) {
                return $acc + ord($char);
            }, 0);
        }, $chunks);
        return implode('', $sums);
    }

    private function getProxyPrefixToday() {
        $propertyNumber = $this->getPropertyNumber($this->propertyID);
        $date = date('Ymd');
        return $this->generateForSeed(10, floatval($date . $propertyNumber));
    }

    private function handleCachedResponse($cached, &$headers) {
        if (!isset($cached['headers']['cache-control'])) {
            return ['revalidate' => false, 'withinMaxAge' => false];
        }
        $cacheControl = cached['headers']['cache-control'];
        $etag = isset($cached['headers']['etag']) ? $cached['headers']['etag'] : '';
        $withinMaxAge = true;
        $revalidate = false;
        
        // split into parts
        $cacheControlParts = explode(",", $cacheControl);
        foreach ($cacheControlParts as $part) {
            if (stripos($part, "must-revalidate") !== false) {
                $revalidate = true;
                break;
            }
            if (stripos($part, "max-age=") !== false) {
                $maxAge = (int)str_replace("max-age=", "", trim($part));
                if ($cached['now'] + $maxAge > time()) {
                    $withinMaxAge = false;
                    break;
                }
            }
        }
        
        if ($revalidate && $withinMaxAge && !empty($etag)) {
            $headers['If-None-Match'] = $etag;
            return null;
        } else if ($withinMaxAge && !$revalidate) {
            return $cached;
        }
        
        return ['revalidate' => $revalidate, 'withinMaxAge' => $withinMaxAge];
    }

    private function handleRevalidation($result, $cached) {
        // check if we have a 304, add the headers to the result
        if ($result['statusCode'] === 304) {
            // only add these to the cached result and then return it
            // as we don't want to overwrite other headers for the
            // original request
            $headersToAdd = array(
                "cache-control",
                "content-location",
                "date",
                "etag",
                "expires",
                "vary",
            );
            foreach ($headersToAdd as $header) {
                if (array_key_exists($header, $result['headers'])) {
                    $cached['headers'][$header] = $result['headers'][$header];
                }
            }
            return $cached;
        }
        return $result;
    }

    private function handleCaching($result, $isPostRequest, $store, $cacheKey) {
        $cacheableStatusCodes = [200, 203, 204, 206, 300, 301, 404, 405, 410, 414, 501];
        if (!$isPostRequest && in_array($result['statusCode'], $cacheableStatusCodes)) {
            // if this is allowed to be stored (based on the headers), then store it
            if (stripos($result['headers']['cache-control'], "no-cache") === false) {
                $this->store->store($cacheKey, $result);
            }
        }
    }

    /**
     * Makes an HTTP request to the given URL with the given headers and body.
     * A user agent must be set in the headers as `User-Agent`.
     *
     * @param string $url the URL to make the request to
     * @param array $headers the headers to send with the request
     * @param string|null $postBody the body to send with the request
     * @param array $options the options to pass to the request
     * @return array the result of the request
     */
    public function httpCall($url, $headers = array(), $postBody = null, $options = [])
    {
        $res = array(
            "statusCode" => 0,
            "source" => "",
            "error" => null,
            "headers" => array(),
        );
        $urlWithScheme = "https:" . $url;
        if (empty($headers["User-Agent"])) {
            return $res;
        }
        $ua = $headers["User-Agent"];

        if (!function_exists("wp_remote_retrieve_body") || !function_exists("wp_remote_get") || !function_exists("wp_remote_post")) {
            $res["error"] = array(
                "code" => 0,
                "str" => "Functions not found",
                "type" => "wp",
            );
            return $res;
        }

        $args = array(
            "headers" => $headers,
            "user-agent" => $ua,
        );
        $supportedOptions = [
            "timeout" => true,
            "method" => true,
            "sslverify" => true,
            "cookies" => true,
        ];
        foreach ($options as $key => $val) {
            if (isset($supportedOptions[$key])) {
                $args[$key] = $val;
            }
        }

        if (!empty($postBody)) {
            $args["body"] = $postBody;
            $resp = wp_remote_post($urlWithScheme, $args);
        } else {
            $resp = wp_remote_get($urlWithScheme, $args);
        }
        if (function_exists('is_wp_error') && is_wp_error($resp)) {
            $res["error"] = array(
                "code" => $resp->get_error_code(),
                "str" => $resp->get_error_message(),
                "type" => "wp",
            );
            return $res;
        }

        $res["statusCode"] = (int)wp_remote_retrieve_response_code($resp);
        $body = wp_remote_retrieve_body($resp);
        if (empty($body)) {
            $res["error"] = array(
                "code" => 0,
                "str" => "Unknown error but empty body",
                "type" => "wp",
            );
            return $res;
        }

        $res["source"] = $body;
        $res["headers"] = wp_remote_retrieve_headers($resp)->getAll();
        return $res;
    }
} 