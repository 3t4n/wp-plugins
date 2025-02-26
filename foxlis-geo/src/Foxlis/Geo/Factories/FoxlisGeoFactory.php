<?php

namespace Foxlis\Geo\Factories;

use Foxlis\Geo\Entities\FoxlisGeo;

class FoxlisGeoFactory
{
    public function getFoxlisGeoEntity()
    {
        return new FoxlisGeo();
    }
}