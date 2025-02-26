<?php

namespace Foxlis\Geo\Entities;

class FoxlisGeo
{
    private $defaultLanguage = 'en';

    private $options = [];
    private $data = [];

    private $city;
    private $country;
    private $continent;
    private $subdivisions;
    private $location;

    public function __construct()
    {
        $this->city = new FoxlisGeoCity($this);
        $this->country = new FoxlisGeoCountry($this);
        $this->continent = new FoxlisGeoContinent($this);
        $this->subdivisions = new FoxlisGeoSubdivisions($this);
        $this->location = new FoxlisGeoLocation($this);
    }

    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    public function getLanguage()
    {
        return isset($this->options['foxlis_geo_field_language'])
            ? $this->options['foxlis_geo_field_language']
            : $this->defaultLanguage;
    }

    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getContinent()
    {
        return $this->continent;
    }

    public function getSubdivisions()
    {
        return $this->subdivisions;
    }

    public function getLocation()
    {
        return $this->location;
    }
}
