<?php

namespace Foxlis\Geo\Services\Redirect;

use Foxlis\Geo\Entities\FoxlisGeo;
use Foxlis\Geo\Factories\Redirect\FoxlisGeoRedirectOptionFactory;
use Foxlis\Geo\Helpers\RedirectHelper;

class FoxlisGeoRedirectOptionsHandler
{
    private $redirectOptionFactory;
    private $currentUri;

    public function __construct($currentUri)
    {
        $this->redirectOptionFactory = new FoxlisGeoRedirectOptionFactory();
        $this->currentUri = $currentUri;
    }

    public function getRedirectResults(FoxlisGeo $foxlisGeo, array $redirectOptions)
    {
        $currentUriParsed = $this->getCurrentUriParsed();

        // iterate redirect options to get uri
        $redirectResults = [];
        foreach ($redirectOptions as $redirectOption) {
            if ($this->isUserConditionsViolated($foxlisGeo, $redirectOption)) {
                continue;
            }

            $redirectOption = $this->redirectOptionFactory->getRedirectOption($redirectOption, $currentUriParsed);
            if (
                ($redirectUri = $redirectOption->getUri())
                && ($redirectOptionArray = $redirectOption->getRedirectOption())
            ) {
                $redirectResults = [
                    'redirectUri' => $redirectUri,
                    'redirectOption' => $redirectOptionArray,
                ];

                break;
            }
        }

        return $redirectResults;
    }

    private function getCurrentUriParsed()
    {
        $serverRequestUri = urldecode($this->currentUri);

        $currentUriArray = explode('?', $serverRequestUri, 2);
        $currentUriArray['urn'] = isset($currentUriArray[0]) ? $currentUriArray[0] : '';
        $currentUriArray['query'] = isset($currentUriArray[1]) ? $currentUriArray[1] : '';

        return $currentUriArray;
    }

    private function isUserConditionsViolated(FoxlisGeo $foxlisGeo, $redirectOption)
    {
        if ($redirectOption['status'] === 'ask' && isset($_COOKIE[RedirectHelper::getStopAskingCookieValue()])) {
            return true;
        }

        switch ($redirectOption['type']) {
            case 'city':
                $isEqual = $this->isEqualCondition(
                    $redirectOption['value'],
                    [(string)$foxlisGeo->getCity(), $foxlisGeo->getCity()->en]
                );
                break;
            case 'country':
                $isEqual = $this->isEqualCondition(
                    $redirectOption['value'],
                    [(string)$foxlisGeo->getCountry(), $foxlisGeo->getCountry()->en]
                );
                break;
            case 'continent':
                $isEqual = $this->isEqualCondition(
                    $redirectOption['value'],
                    [(string)$foxlisGeo->getContinent(), $foxlisGeo->getContinent()->en]
                );
                break;
            case 'subdevision':
                $subdevisions = $foxlisGeo->getSubdivisions();
                $isEqual = $this->isEqualCondition(
                    $redirectOption['value'],
                    [(string)$subdevisions()[0], $subdevisions->en[0]]
                );
                break;
            default:
                throw new \Exception('Unknown redirect location type');
        }

        return $redirectOption['equal'] === 'equal' ? false === $isEqual : $isEqual;
    }

    private function isEqualCondition($value, $foxlisValues)
    {
        $userValue = preg_quote(trim($value));

        $isMatch = false;
        foreach ($foxlisValues as $foxlisValue) {
            if (preg_match("/^{$userValue}$/ui", $foxlisValue)) {
                $isMatch = true;
                break;
            }
        }

        return $isMatch;
    }
}
