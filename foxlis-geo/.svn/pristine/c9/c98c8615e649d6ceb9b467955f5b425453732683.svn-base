<?php

namespace Foxlis\Geo\Entities;

class FoxlisGeoSubdivisions extends FoxlisGeoAbstractEntityLanguages
{
    protected $entity = 'subdivisions';

    public function __invoke()
    {
        $data = $this->foxlisGeo->getData();
        $lang = $this->foxlisGeo->getLanguage();

        $subdivisions = [];
        if (isset($data[$this->entity])) {
            foreach ($data[$this->entity] as $subdivision) {
                $subdivisions[] = isset($subdivision['names'][$lang]) ? trim($subdivision['names'][$lang]) : '';
            }
        }

        return $subdivisions;
    }

    public function __get($name)
    {
        $data = $this->foxlisGeo->getData();

        $subdivisions = [];
        if (isset($data[$this->entity])) {
            foreach ($data[$this->entity] as $subdivision) {
                $subdivisions[] = isset($subdivision['names'][$name]) ? trim($subdivision['names'][$name]) : '';
            }
        }

        return $subdivisions;
    }
}
