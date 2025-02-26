<?php
namespace wp;

require_once("AdmiralHttpHandler.php");

interface AdmiralCacheStore {
    public function enabled(): bool;
    public function fetch(string $url): ?array;
    public function store(string $cacheKey, $data): bool;
}

class AdmiralCacheAPC implements AdmiralCacheStore {
    public function enabled(): bool {
        return function_exists('apcu_enabled') && apcu_enabled();
    }

    public function fetch(string $cacheKey): ?array {
        if (!$this->enabled()) {
            return null;
        }
        $result = apcu_fetch($cacheKey);
        if (!$result) {
            return null;
        }
        return $result;
    }

    public function store(string $cacheKey, $data): bool {
        if (!$this->enabled()) {
            return false;
        }
        return apcu_store($cacheKey, $data, 0);
    }
}

class AdmiralAdBlockAnalytics
{
    /**
     * Default duration (1 day) (24 * 60 * 60) to store the embed for before requesting another script
     * @var int
     */
    const DEFAULT_EMBED_EXPIRATION = 86400;

    /**
     * Option keys for admiral plugin settings and other configuration data
     */
    const PROPERTY_OPTION_ID_KEY = "admiral_property_id";
    const PROPERTY_PROMISE_OPTION_ID_KEY = "admiral_property_promise_id";
    const PROPERTY_PROMISE_PROPERTY_OPTION_ID_KEY = "admiral_property_promise_property_id";
    const EMBED_OPTION_KEY = "admiral_embed";
    // ends in "2" to ignore old expiration option set before the fix for multiplciation vs addition of expiration
    const EMBED_EXPIRATION_OPTION_KEY = "admiral_embed_expiration2";
    const PROTECT_OPTION_KEY = "admiral_protect";
    const PROXY_ADMIRAL_OPTION_KEY = "admiral_proxy";
    const EMBED_ADDITIONAL_OPTIONS_KEY = "admiral_embed_additional_options";

    /**
     * Suffix to append to the user-agent when proxying requests
     * @var string
     */
    public static $UASuffix = "ADMIRALWP/uninit";

    /**
     * Admiral PropertyID you get when signing up for Admiral
     * @var string
     */
    private static $propertyID = "";

    /**
     * Whether the propertyID was configured via an environment variable
     * @var bool
     */
    private static $envConfiguredPropertyID = false;

    /**
     * Admiral PropertyPromiseID you get when signing up for Admiral
     * @var string
     */
    private static $propertyPromiseID = "";

    /**
     * Admiral Embed script you get when signing up for Admiral
     * @var string
     */
    private static $embed = "";

    /**
     * Endpoint to partner API
     */
    private static $partnerApiEndpoint = "//partner.api.getadmiral.com/";

    /**
     * Cache store to use for caching embeds and proxy data
     *
     * @var AdmiralCacheStore
     */
    private static $store = null;

    /**
     * Whether or not Protect is on
     * @var bool
     */
    private static $protect = false;

    /**
     * Whether to proxy the script
     * @var bool
     */
    private static $proxyAdmiral = false;

    private static $clientID = "";

    private static $clientSecret = "";

    private static $pluginCode = "";

    /**
     * The environment to use for the plugin
     * @var string
     */
    private static $environment = "production";

    /**
     * An instance of AdmiralHttpHandler for making and proxying requests to
     * Admiral's servers
     * @var AdmiralHttpHandler
     */
    private static $httpHandlerInstance = null;

    /**
     * Additional options to send when requesting an embed
     * @var string
     */
    private static $embedAdditionalOptions = null;

    /**
     * Whether or not the plugin has embedded for this pageview
     * @var bool
     */
    private static $hasEmbedded = false;

    /**
     * Reset the plugin options, mostly for testing
     */
    public static function reset()
    {
        self::$propertyID = "";
        self::$envConfiguredPropertyID = false;
        self::$propertyPromiseID = "";
        self::$embed = "";
        self::$store = null;
        self::$httpHandlerInstance = null;
        self::$protect = false;
        self::$proxyAdmiral = false;
    }

    /**
     * Get the configured propertyID from either an environment variable
     * or from the WordPress option.
     *
     * @return string the configured propertyID (or empty string)
     */
    public static function getPropertyID()
    {
        if (empty(self::$propertyID) && defined("ADMIRAL_PROPERTY_ID")) {
            self::$propertyID = ADMIRAL_PROPERTY_ID;
            if (!empty(self::$propertyID)) {
                self::$envConfiguredPropertyID = true;
            }
        }
        if (empty(self::$propertyID)){
            self::$propertyID = get_option(self::PROPERTY_OPTION_ID_KEY, "");
        }
        return self::$propertyID;
    }

    /**
     * Getter for self::$envConfiguredPropertyID
     *
     * @return bool whether an environment var configured the PROPERTY_ID
     */
    public static function getEnvConfiguredPropertyID() {
        return self::$envConfiguredPropertyID;
    }

    /**
     * Completes a POST submission by reading from $_POST for the
     * PROPERTY_OPTION_ID_KEY and saving it in the WordPress options.
     *
     * @return bool whether the new value was saved
     */
    public static function updatePropertyIDByPOST()
    {
        $propertyID = trim($_POST[self::PROPERTY_OPTION_ID_KEY]);
        if ($propertyID !== self::getPropertyID()) {
            if (strpos($propertyID, 'A-') !== 0) {
                return false;
            }
            self::$propertyID = $propertyID;
            update_option(self::PROPERTY_OPTION_ID_KEY, $propertyID, true);
            // delete the promise since this is a user provided propertyID
            delete_option(self::PROPERTY_PROMISE_OPTION_ID_KEY);
            delete_option(self::PROPERTY_PROMISE_PROPERTY_OPTION_ID_KEY);

            // if the propertyID updated, the embed should too
            $script = self::requestEmbedScript();
            if (!empty($script)) {
                self::setEmbed($script);
            }

            return true;
        }
        return false;
    }

    /**
     * Sets the propertyID, not touching the DB
     *
     * @param string $propertyID the propertyID to set
     */
    private static function setPropertyID($propertyID)
    {
        if (empty($propertyID)) {
            throw new Exception("PropertyID cannot be empty");
        }
        self::$propertyID = $propertyID;
    }

    private static function setPropertyPromiseID($propertyPromiseID)
    {
        if (empty($propertyPromiseID)) {
            throw new Exception("propertyPromiseID cannot be empty");
        }
        self::$propertyPromiseID = $propertyPromiseID;
    }

    /**
     * Getter for self::$propertyPromiseID
     *
     * @return string the propertyPromiseID (or empty string)
     */
    public static function getPropertyPromiseID()
    {
        if (empty(self::$propertyPromiseID)){
            self::$propertyPromiseID = get_option(self::PROPERTY_PROMISE_OPTION_ID_KEY, "");
        }
        return self::$propertyPromiseID;
    }

    /**
     * Checks if the property is an orphan property
     *
     * @param string $propertyID the propertyID to check
     * @return bool whether the property is an orphan property
     */
    public static function isPropertyOrphanProperty($propertyID) {
        $promiseProperty = get_option(self::PROPERTY_PROMISE_PROPERTY_OPTION_ID_KEY, "");
        return $propertyID === $promiseProperty;
    }

    /**
     * Gets the protect option from the DB
     *
     * @return string whether protect is on, unconfigured, or off
     */
    public static function getProtect() {
        return get_option(self::PROTECT_OPTION_KEY, "unconfigured");
    }

    /**
     * Gets whether protect is enabled
     *
     * @return bool whether protect is enabled
     */
    public static function isProtectEnabled() {
        $protect = self::getProtect();
        return $protect !== "unconfigured" && !!$protect;
    }

    /**
     * Sets the protect option in the DB and updates self::$protect
     *
     * @param bool $protect whether protect is on or off
     */
    public static function setProtect($protect) {
        $updated = update_option(self::PROTECT_OPTION_KEY, $protect, true);
        if ($updated) {
            self::$protect = $protect;
        }
    }

    /**
     * Retrieves the proxyAdmiral option from the DB
     *
     * @return string whether proxy admiral is on, unconfigured, or off
     */
    public static function getProxyAdmiral() {
        return get_option(self::PROXY_ADMIRAL_OPTION_KEY, "unconfigured");
    }

    /**
     * Gets whether proxy admiral is enabled
     *
     * @return bool whether proxy admiral is enabled
     */
    public static function isProxyAdmiralEnabled() {
        $proxyAdmiral = self::getProxyAdmiral();
        return $proxyAdmiral !== "unconfigured" && !!$proxyAdmiral;
    }

    /**
     * Sets the proxyAdmiral option in the DB and updates self::$proxyAdmiral
     *
     * @param bool $proxyAdmiral whether proxy admiral is on or off
     */
    public static function setProxyAdmiral($proxyAdmiral) {
        $updated = update_option(self::PROXY_ADMIRAL_OPTION_KEY, $proxyAdmiral, true);
        if ($updated) {
            self::$proxyAdmiral = $proxyAdmiral;
        }
    }

    /**
     * Sets $embed and updates the DB with the new embed
     *
     * @param string $embed the embed to set
     */
    private static function setEmbed($embed)
    {
        if (empty($embed)) {
            throw new Exception("Embed cannot be empty");
        }
        update_option(self::EMBED_EXPIRATION_OPTION_KEY, time() + self::DEFAULT_EMBED_EXPIRATION, true);
        if (update_option(self::EMBED_OPTION_KEY, $embed, true)) {
            self::$embed = $embed;
        }
    }

    /**
     * Retrieves the embed from the DB. If it doesn't exist or
     * has expired, retrieves an embed from kikis and returns it
     *
     * @return string the embed or empty string
     */
    public static function getEmbed()
    {
        if (empty(self::$embed)) {
            self::$embed = get_option(self::EMBED_OPTION_KEY, "");
            $embedTimeout = get_option(self::EMBED_EXPIRATION_OPTION_KEY, 0);

            // If the no embed was stored in the DB, or the current embed is timed out
            // we should request a new embed script
            $isExpired = $embedTimeout < time();
            $isEmpty = empty(self::$embed) && !empty(self::getPropertyID());
            if ($isExpired || $isEmpty) {
                $script = self::requestEmbedScript();
                if (!empty($script)) {
                    self::setEmbed($script);
                }
            }
        }
        return self::$embed;
    }

    public static function setHasEmbedded() {
        self::$hasEmbedded = true;
    }

    public static function getHasEmbedded() {
        return self::$hasEmbedded;
    }

    private static function returnBody($res) {
        if (empty($res["source"])) {
            return false;
        }
        $body = json_decode($res["source"], true);
        if (empty($body["result"])) {
            return false;
        }
        return $body;
    }

    /**
     * Get the additional options to send when requesting an embed.
     *
     * @return string the additional options (or empty string)
     */
    public static function getEmbedAdditionalOptions()
    {
        if (empty(self::$embedAdditionalOptions)) {
            self::$embedAdditionalOptions = get_option(self::EMBED_ADDITIONAL_OPTIONS_KEY, "");
        }
        return self::$embedAdditionalOptions;
    }

    /**
     * Retrieves protect candidates
     *
     * @return array of candidates
     */
    public static function getProtectCandidates() {
        if (self::isProtectEnabled()) {
            $candidateKey = "admiral_cs_candidates";
            $timeKey = $candidateKey . "_time";
            $lockKey = $candidateKey . "_lock";
            // the amount of time in seconds that needs to elapse before we try to replace the cache
            $regen = 3600;
            // we set the actual cache entries to 2x regen time so that we're always replacing them before they expire
            $ttl = $regen * 2;

            $savedTime = apcu_fetch($timeKey);
            $rightNow = time();

            if (!$savedTime || ($rightNow - $savedTime) >= $regen) {
                $gotLock = apcu_add($lockKey, true, 6);
                if (!$gotLock) {
                    // return the stale candidates
                    $cachedCandidates = apcu_fetch($candidateKey);
                    // if we dont have a cache currently, return an empty array
                    if (!$cachedCandidates) {
                        return [];
                    }
                    return $cachedCandidates;
                }

                $secretPostData = array(
                    "method" => "Partner.CreateSecretPromise",
                    "jsonrpc" => "2.0",
                    "params" => array(
                        "apiKey" => "wordpressplugin-" . self::$clientID,
                        "apiKeySecret" => self::$clientSecret,
                    )
                );
                $headers = [
                    "Content-Type" => "application/json",
                    "User-Agent" => self::$UASuffix,
                ];
                $res = self::getHttpHandlerInstance()->httpCall(self::$partnerApiEndpoint, $headers, json_encode($secretPostData));
                $body = self::returnBody($res);

                if (!$body) {
                    error_log("error occurred obtaining secret");
                    apcu_delete($lockKey);
                    return [];
                }

                $postData = [
                    "method" => "Partner.GetProtectCandidates",
                    "jsonrpc" => "2.0",
                    "params" => [
                        "propertyID" => self::getPropertyID(),
                        "apiKey" => "wordpressplugin-" . self::$clientID,
                        "apiKeySecretPromise" => $body["result"]["secretPromise"],
                    ]
                ];
                $headers = [
                    "Content-Type" => "application/json",
                    "User-Agent" => self::$UASuffix,
                ];
                $res = self::getHttpHandlerInstance()->httpCall(self::$partnerApiEndpoint, $headers, json_encode($postData));
                $body = self::returnBody($res);

                if (!$body) {
                    error_log("error obtaining candidates");
                    apcu_delete($lockKey);
                    return [];
                }

                if (!isset($body["result"]["candidates"])) {
                    // store an empty array, we'll check for protect candidates again later
                    apcu_store($candidateKey, [], $ttl);
                    // set the time to recheck in a minute
                    $recheckTime = $rightNow - $regen + 60;
                    apcu_store($timeKey, $recheckTime, $ttl);
                    apcu_delete($lockKey);
                    return [];
                }

                $parsedCandidates = $body["result"]["candidates"];

                $candidates = array();
                foreach ($parsedCandidates as $pcand) {
                    // check the things that matter: candidateID, payload, protect stuff
                    if (isset($pCand["candidateID"]) && isset($pCand["payload"]) && isset($pCand["payload"]["protect"])
                        && isset($pCand["payload"]["protect"]["requirement"])) {
                        array_push($candidates, $pcand);
                    }
                }

                $stored = apcu_store($candidateKey, $parsedCandidates, $ttl);
                if (!$stored) {
                    error_log("Error saving candidates to cache");
                }
                apcu_store($timeKey, time(), $ttl);
                apcu_delete($lockKey);

                return $parsedCandidates;
            }

            $cachedCandidates = apcu_fetch($candidateKey);

            if ($cachedCandidates) {
                return $cachedCandidates;
            }
        }
        return [];
    }

    /**
     * Sets the clientID and clientSecret
     *
     * @param string $clientID the clientID
     * @param string $clientSecret the clientSecret
     */
    public static function setClientIDSecret($clientID, $clientSecret)
    {
        self::$clientID = $clientID;
        self::$clientSecret = $clientSecret;
    }

    /**
     * Retrieves the property ID and returns true or false respectively if it is set or not
     * Also allows for setting up the plugin code/version
     */
    public static function initialize($pluginCode, $pluginVersion, $env)
    {
        if (empty(self::$pluginCode)) {
            self::$pluginCode = $pluginCode;
            self::$environment = $env;
            self::$UASuffix = "ADMIRALWP/" . $pluginVersion . " " . $pluginCode;
            add_action('admin_post_activate_admiral_adblocks_analytics_' . $pluginCode, function() {
                // Call redirect before all so that the user isn't sent to a blank page in case of handled error.
                $referer = wp_get_referer();
                if (array_key_exists("accept", $_POST)) {
                    AdmiralAdBlockAnalytics::createNewProperty("");
                }
                if (!empty($referer)) {
                    wp_redirect($referer);
                } else {
                    wp_redirect('index.php');
                }
            });
        }

        if (empty(self::$store)) {
            self::$store = new AdmiralCacheAPC();
        }

        $propertyID = self::getPropertyID();
        if (empty($propertyID)) {
            return false;
        }

        return true;
    }

    public static function getPluginCode() {
        return self::$pluginCode;
    }

    public static function getBaseSignupLink() {
        return 'https://app.getadmiral.com/signup';
    }

    public static function getClaimPropertyLink() {
        $link = self::getBaseSignupLink();
        $token = self::getPropertyClaimToken();
        $url = get_site_url();
        $pid = self::getPropertyID();
        if (empty($token)) {
            return '';
        }
        $qs = http_build_query([
            'i' => 'claim-property',
            't' => $token,
            'd' => $url,
            'p' => $pid,
            'aid' => self::$clientID,
        ]);
        return $link . '?' . $qs;
    }

    private static function getSecretPromiseCall()
    {
        $postData = [
            "method" => "Partner.CreateSecretPromise",
            "jsonrpc" => "2.0",
            "params" => [
                "clientID" => self::$clientID,
                "clientSecret" => self::$clientSecret
            ]
        ];
        $headers = [
            "User-Agent" => self::$UASuffix,
        ];
        $res = self::getHttpHandlerInstance()->httpCall(self::$partnerApiEndpoint, $headers, json_encode($postData));
        if (empty($res["source"])) {
            return "";
        }
        $body = json_decode($res["source"]);
        if (empty($body->result)) {
            return "";
        }
        return $body->result->secretPromise;
    }

    private static function createPropertyCall($secretPromise, $domain)
    {
        $postData = [
            "method" => "Partner.NewOrphanProperty",
            "jsonrpc" => "2.0",
            "params" => [
                "clientID" => self::$clientID,
                "clientSecretPromise" => $secretPromise,
                "domain" => $domain,
                "withEmbed" => true
            ]
        ];
        $headers = [
            "User-Agent" => self::$UASuffix,
        ];
        $res = self::getHttpHandlerInstance()->httpCall(self::$partnerApiEndpoint, $headers, json_encode($postData));
        if (empty($res["source"])) {
            return "";
        }
        $body = json_decode($res["source"]);
        if (empty($body->result)) {
            return "";
        }
        return $body->result;
    }

    /**
     * Function to create new anonymous property
     *
     * @return bool whether the property was created and setup
     */
    public static function createNewProperty($domain)
    {
        $secretPromise = self::getSecretPromiseCall();
        if (empty($domain)) {
            $domain = get_site_url();
        }
        if (!empty($secretPromise)) {
            $property = self::createPropertyCall($secretPromise, $domain);
            if (!empty($property)) {
                self::setPropertyID($property->propertyID);
                self::setPropertyPromiseID($property->propertyPromiseID);
                update_option(self::PROPERTY_OPTION_ID_KEY, self::getPropertyID(), true);
                update_option(self::PROPERTY_PROMISE_OPTION_ID_KEY, self::getPropertyPromiseID(), true);
                update_option(self::PROPERTY_PROMISE_PROPERTY_OPTION_ID_KEY, self::getPropertyID(), true);
                // Ensure this is set to avoid it trying to hit the db
                update_option(self::EMBED_ADDITIONAL_OPTIONS_KEY, self::getEmbedAdditionalOptions(), true);
                // Get embed will handle any potential fetching of embed code at this point
                self::setEmbed($property->embed);
                return true;
            }

            return false;
        }
    }

    /**
     * Touch the options to ensure they are updated with autoload=true
     * This is used after an update to the plugin to ensure that the options are updated
     * with autoload=true so that they are loaded on every page load.
     *
     * @return void
     */
    public static function touchOptions() {
        $pidValue = self::getPropertyID();
        if (!empty($pidValue)) {
            update_option(self::PROPERTY_OPTION_ID_KEY, self::getPropertyID(), true);
            update_option(self::PROPERTY_PROMISE_OPTION_ID_KEY, self::getPropertyPromiseID(), true);
            if (self::isPropertyOrphanProperty($pidValue)) {
                update_option(self::PROPERTY_PROMISE_PROPERTY_OPTION_ID_KEY, self::getPropertyID(), true);
            }
            update_option(self::EMBED_ADDITIONAL_OPTIONS_KEY, self::getEmbedAdditionalOptions(), true);
        }
    }

    /**
     * Make a request to the delivery service to get a script for this property
     *
     * @return string the token or an empty string
     */
    private static function getPropertyClaimToken()
    {
        $secretPromise = self::getSecretPromiseCall();
        $postData = [
            "method" => "Partner.GetClaimPropertyToken",
            "jsonrpc" => "2.0",
            "params" => [
                "clientID" => self::$clientID,
                "clientSecretPromise" => $secretPromise,
                "propertyID" => self::getPropertyID(),
                "propertyPromiseID" => self::getPropertyPromiseID()
            ]
        ];
        $headers = [
            "User-Agent" => self::$UASuffix,
        ];
        $res = self::getHttpHandlerInstance()->httpCall(self::$partnerApiEndpoint, $headers, json_encode($postData));
        if (empty($res["source"])) {
            return "";
        }
        $body = json_decode($res["source"]);
        if (empty($body->result)) {
            return "";
        }
        if (empty($body->result->claimPropertyToken)) {
            return "";
        }
        return $body->result->claimPropertyToken;
    }

    /**
     * Make a request to the delivery service to get a script for this property
     *
     * @return string the embed or an empty string
     */
    private static function requestEmbedScript()
    {
        if (empty(self::$store)) {
            return "";
        }

        $queryParams = array(
            "cacheable" => "1",
            "strategy" => "wordpress",
        );

        if (self::isProxyAdmiralEnabled()) {
            $queryParams = array_merge($queryParams, self::getHttpHandlerInstance()->getEmbedQueryParams());
        }

        $endpoint = "//delivery.api.getadmiral.com/script/";

        $additionalOptions = self::getEmbedAdditionalOptions();
        if (!empty($additionalOptions)) {
            $options = json_decode($additionalOptions, true);
            if (!empty($options['queryString'])) {
                $queryParams = array_merge($queryParams, $options['queryString']);
            }
            if (!empty($options['endpoint'])) {
                $endpoint = $options['endpoint'];
            }
        }

        $userAgent = self::$UASuffix;
        $target = "bootstrap";
        $queryString = http_build_query($queryParams);
        $script = self::getHttpHandlerInstance()->fetchEmbed($endpoint, $userAgent, $target, $queryString);

        return empty($script) ? "" : '<script>' . $script . '</script>';
    }

    /**
     * Returns the http handler instance
     *
     * @return AdmiralHttpHandler
     */
    public static function getHttpHandlerInstance() {
        if (self::$httpHandlerInstance === null) {
            self::$httpHandlerInstance = new AdmiralHttpHandler(self::$store, self::getPropertyID());
        }
        return self::$httpHandlerInstance;
    }
}

/* EOF */
