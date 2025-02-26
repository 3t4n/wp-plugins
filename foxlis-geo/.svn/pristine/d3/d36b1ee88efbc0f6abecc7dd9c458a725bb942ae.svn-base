<?php

namespace Foxlis\Geo\Services\Redirect\Frontend;

use Foxlis\Geo\Contracts\FoxlisGeoRedirectServiceInterface;
use Foxlis\Geo\Services\FoxlisGeoService;
use Foxlis\Geo\Services\Redirect\FoxlisGeoRedirectOptionsHandler;

class FoxlisGeoRedirectHandler implements FoxlisGeoRedirectServiceInterface
{
    private $redirectOptionsHandler;

    /** @var FoxlisGeoService */
    private $foxlisGeoService;

    public function __construct($currentUri)
    {
        $this->redirectOptionsHandler = new FoxlisGeoRedirectOptionsHandler($currentUri);
    }

    public function redirect()
    {
        if (empty($this->foxlisGeoService)) {
            throw new \Exception('I need Foxlis Geo Service external function to make redirect');
        }

        // get redirect uri from user options
        $redirectResults = $this->redirectOptionsHandler->getRedirectResults(
            $this->foxlisGeoService->getFoxlisGeo(),
            $this->foxlisGeoService->getRedirectOptions()
        );

        if ($redirectResults) {
            if ($redirectResults['redirectOption']['status'] === 'once') {
                $redirectOptionHash = sha1(serialize($redirectResults['redirectOption']));
                $_SESSION['foxlis_geo_redirect_once'][$redirectOptionHash] = true;
            }

            // filter allowed redirect options
            $redirectResults['redirectOption'] = array_intersect_key(
                $redirectResults['redirectOption'],
                array_flip(['status', 'question', 'confirm', 'cancel'])
            );

            return $redirectResults;
        }

        return [];
    }

    public function setService(FoxlisGeoService $foxlisGeoService)
    {
        $this->foxlisGeoService = $foxlisGeoService;

        return $this;
    }
}
