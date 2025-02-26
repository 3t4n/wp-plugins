<?php

namespace Foxlis\Geo\Services\Redirect;

use Foxlis\Geo\Factories\Redirect\FoxlisGeoRedirectFactory;
use Foxlis\Geo\Services\FoxlisGeoService;

class FoxlisGeoServiceRedirect
{
    private $redirectType = 'backend';

    private $foxlisGeoRedirectFactory;

    public function __construct()
    {
        $this->foxlisGeoRedirectFactory = new FoxlisGeoRedirectFactory();
    }

    public function redirect(FoxlisGeoService $foxlisGeoService)
    {
        // check redirect possibility
        if ($this->isRedirectImpossible($foxlisGeoService->getOptions())) {
            return [];
        }

        // get redirect handler
        $redirectHandler = $this->getRedirectHandler();

        // do redirect
        return $redirectHandler->setService($foxlisGeoService)->redirect();
    }

    private function getRedirectHandler()
    {
        switch ($this->redirectType) {
            case 'backend':
                return $this->foxlisGeoRedirectFactory->getFoxlisGeoRedirectHandlerBackend($_SERVER['REQUEST_URI']);
            // break;
            case 'frontend':
                $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

                $uri = parse_url($referer);

                $uriPath = isset($uri['path']) ? $uri['path'] : '';
                $uriQuery = isset($uri['query']) ? "?{$uri['query']}" : '';

                return $this->foxlisGeoRedirectFactory->getFoxlisGeoRedirectHandlerFrontend("{$uriPath}{$uriQuery}");
            // break;
        }

        throw new \Exception('Undefined redirect type');
    }

    private function isRedirectImpossible($options)
    {
        // redirect option value
        $redirectOptionValue = isset($options['foxlis_geo_field_redirect_action'])
            ? $options['foxlis_geo_field_redirect_action']
            : 'disable';

        return
            // no option enable
            $redirectOptionValue === 'disable'
            // get param to stop redirect
            || false !== strpos($_SERVER['QUERY_STRING'], 'foxlis-geo-stop-redirect');
    }

    public function setRedirectType($redirectType)
    {
        $this->redirectType = $redirectType;

        return $this;
    }
}
