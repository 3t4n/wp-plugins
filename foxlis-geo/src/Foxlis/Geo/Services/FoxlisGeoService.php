<?php

namespace Foxlis\Geo\Services;

use Foxlis\Geo\Factories\FoxlisGeoAccountFactory;
use Foxlis\Geo\Factories\FoxlisGeoFactory;
use Foxlis\Geo\Render\RedirectRender;
use Foxlis\Geo\Services\Redirect\FoxlisGeoServiceRedirect;

class FoxlisGeoService
{
    const DEFAULT_PARAMS = [
        'protocol' => 'http',
        'requests' => [
            // per sec
            'locationTimeout' => 1,
            'accountTimeout' => 5,
        ]
    ];

    private $foxlisGeoFactory;
    private $foxlisGeoAccountFactory;

    private $options;
    private $redirectOptions;
    private $developmentOptions;
    private $filterOptions;
    private $externalFunctions;

    private $apiDataGeo = [];
    private $apiDataAccount = [];
    private $foxlisGeoServiceRedirect;

    public function __construct(
        array $options,
        array $redirectOptions,
        array $developmentOptions,
        array $filterOptions,
        array $externalFunctions
    ) {
        $this->options = $options;
        $this->redirectOptions = $redirectOptions;
        $this->developmentOptions = $developmentOptions;
        $this->filterOptions = $filterOptions;
        $this->externalFunctions = $externalFunctions;

        $this->foxlisGeoFactory = new FoxlisGeoFactory();
        $this->foxlisGeoAccountFactory = new FoxlisGeoAccountFactory();
        $this->foxlisGeoServiceRedirect = new FoxlisGeoServiceRedirect();
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function getRedirectOptions()
    {
        return $this->redirectOptions;
    }

    public function getExternalFunctions()
    {
        return $this->externalFunctions;
    }

    public function getFoxlisGeo()
    {
        if ($this->isRequestFiltered()) {
            return $this->foxlisGeoFactory->getFoxlisGeoEntity()->setOptions($this->options);
        }

        if (empty($data = $this->getVisitorGeoFromSession())) {
            $data = $this->getVisitorGeo();
        }

        return $this->foxlisGeoFactory->getFoxlisGeoEntity()->setOptions($this->options)->setData($data);
    }

    public function getFoxlisAccount()
    {
        return $this->foxlisGeoAccountFactory->getFoxlisGeoAccountEntity()->setData($this->getAccountData());
    }

    private function isRequestFiltered()
    {
        if (empty($this->options['foxlis_geo_field_bot_filter'])) {
            return false;
        }

        $agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        if (empty($agent)) {
            return true;
        }

        $botsIps = isset($this->filterOptions['foxlis_geo_field_filter_ips'])
            ? array_map(
                'trim',
                explode(PHP_EOL, $this->filterOptions['foxlis_geo_field_filter_ips'])
            )
            : [];

        $botsAgents = isset($this->filterOptions['foxlis_geo_field_filter_agents'])
            ? array_map(
                'trim',
                explode(PHP_EOL, $this->filterOptions['foxlis_geo_field_filter_agents'])
            )
            : [];

        $visitorIp = $this->getVisitorIp();
        foreach ($botsIps as $botsIp) {
            if ($botsIp && $visitorIp === $botsIp) {
                return true;
            }
        }

        foreach ($botsAgents as $botsAgent) {
            if ($botsAgent && strpos(strtolower($agent), strtolower($botsAgent)) !== false) {
                return true;
            }
        }

        return false;
    }

    private function getVisitorGeoFromSession()
    {
        $sessionData = [];

        if (empty($this->options['foxlis_geo_field_session'])) {
            return $sessionData;
        }

        if (isset($_SESSION['foxlis_geo_data'])) {
            $sessionData = unserialize($_SESSION['foxlis_geo_data']);
        }

        return $sessionData;
    }

    private function getVisitorGeo()
    {
        if ($this->apiDataGeo) {
            return $this->apiDataGeo;
        }

        $protocol = isset($this->options['foxlis_geo_field_protocol'])
            ? $this->options['foxlis_geo_field_protocol']
            : self::DEFAULT_PARAMS['protocol'];

        $requestTimeout =
            isset($this->options['foxlis_geo_field_request_timeout'])
            && is_numeric($this->options['foxlis_geo_field_request_timeout'])
                ? $this->options['foxlis_geo_field_request_timeout']
                : self::DEFAULT_PARAMS['requests']['locationTimeout'];

        $accountKey = isset($this->options['foxlis_geo_field_account'])
            ? trim($this->options['foxlis_geo_field_account'])
            : '';

        $accountHost = '';
        if ($accountKey) {
            $accountHost = "{$accountKey}.";
        }

        if (empty(
        $content = @file_get_contents(
            "{$protocol}://{$accountHost}geo.foxlis.com/get-geo-by-ip/{$this->getVisitorIp()}",
            0, stream_context_create([
                "http" => ["timeout" => $requestTimeout],
            ])
        )
        )) {
            return [];
        }

        $outputArray = json_decode($content, true);

        if (is_array($outputArray)) {
            $_SESSION['foxlis_geo_data'] = serialize($outputArray);
            return $this->apiDataGeo = $outputArray;
        }

        return [];
    }

    private function getVisitorIp()
    {
        $isFakeIp = isset($this->developmentOptions['foxlis_geo_field_development_fake_ip_enable'])
            ? $this->developmentOptions['foxlis_geo_field_development_fake_ip_enable']
            : '';

        if ($isFakeIp) {
            return isset($this->developmentOptions['foxlis_geo_field_development_fake_ip'])
                ? $this->developmentOptions['foxlis_geo_field_development_fake_ip']
                : '';
        }

        return $_SERVER['REMOTE_ADDR'];
    }

    private function getAccountData()
    {
        if ($this->apiDataAccount) {
            return $this->apiDataAccount;
        }

        $account = isset($this->options['foxlis_geo_field_account'])
            ? trim($this->options['foxlis_geo_field_account'])
            : '';

        if (
            empty($account)
            || empty(
            $content = @file_get_contents(
                "https://geo.foxlis.com/account/{$account}",
                0,
                stream_context_create([
                    "http" => ["timeout" => self::DEFAULT_PARAMS['requests']['accountTimeout']],
                ])
            )
            )) {
            return [];
        }

        $outputArray = json_decode($content, true);

        if (is_array($outputArray)) {
            return $this->apiDataAccount = $outputArray;
        }

        return [];
    }

    public function doFoxlisGeoRedirect()
    {
        // check redirect handler frontend/backend
        $redirectType = isset($this->options['foxlis_geo_field_redirect_action'])
            ? $this->options['foxlis_geo_field_redirect_action']
            : '';

        if ($redirectType === 'backend') {
            $this->foxlisGeoServiceRedirect->redirect($this);
        }

        if ($redirectType === 'frontend') {
            $this->externalFunctions['redirectByJsScript'](RedirectRender::renderRedirectFrontendScript());
        }
    }

    public function getFoxlisGeoRedirectData()
    {
        return $this->foxlisGeoServiceRedirect->setRedirectType('frontend')->redirect($this);
    }
}
