<?php

namespace Foxlis\Geo\Factories\Redirect;

use Foxlis\Geo\Services\Redirect\FoxlisGeoRedirectOptionHandler;

class FoxlisGeoRedirectOptionFactory
{
    public function getRedirectOption($redirectOption, $currentUri)
    {
        return new FoxlisGeoRedirectOptionHandler($redirectOption, $currentUri);
    }
}
