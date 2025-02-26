<?php

namespace Foxlis\Geo\Entities;

class FoxlisGeoLocation extends FoxlisGeoAbstractEntity
{
    protected $entity = 'location';

    public function __invoke()
    {
        $data = $this->foxlisGeo->getData();

        $locationData = [];
        if (isset($data[$this->entity])) {
            $locationData = $data[$this->entity];
        }

        return $locationData;
    }

    public function getAccuracyRadius()
    {
        $data = $this->foxlisGeo->getData();

        $locationData = '';
        if (isset($data[$this->entity]['accuracy_radius'])) {
            $locationData = $data[$this->entity]['accuracy_radius'];
        }

        return $locationData;
    }

    public function getLatitude()
    {
        $data = $this->foxlisGeo->getData();

        $locationData = '';
        if (isset($data[$this->entity]['latitude'])) {
            $locationData = $data[$this->entity]['latitude'];
        }

        return $locationData;
    }

    public function getLongitude()
    {
        $data = $this->foxlisGeo->getData();

        $locationData = '';
        if (isset($data[$this->entity]['longitude'])) {
            $locationData = $data[$this->entity]['longitude'];
        }

        return $locationData;
    }

    public function getTimeZone()
    {
        $data = $this->foxlisGeo->getData();

        $locationData = '';
        if (isset($data[$this->entity]['time_zone'])) {
            $locationData = $data[$this->entity]['time_zone'];
        }

        return $locationData;
    }
}
