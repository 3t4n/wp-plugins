<?php

namespace Foxlis\Geo\Factories\Redirect;

use Foxlis\Geo\Services\Redirect\Backend\FoxlisGeoRedirectHandler as FoxlisGeoRedirectHandlerBackend;
use Foxlis\Geo\Services\Redirect\Frontend\FoxlisGeoRedirectHandler as FoxlisGeoRedirectHandlerFrontend;

class FoxlisGeoRedirectFactory
{
    public function getFoxlisGeoRedirectHandlerBackend($currentUri)
    {
        return new FoxlisGeoRedirectHandlerBackend($currentUri);
    }

    public function getFoxlisGeoRedirectHandlerFrontend($currentUri)
    {
        return new FoxlisGeoRedirectHandlerFrontend($currentUri);
    }
}
