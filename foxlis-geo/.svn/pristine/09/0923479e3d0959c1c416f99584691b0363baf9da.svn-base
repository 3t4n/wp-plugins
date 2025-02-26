<?php

namespace Foxlis\Geo\Entities;

abstract class FoxlisGeoAbstractEntityLanguagesLocation extends FoxlisGeoAbstractEntityLanguages
{
    public function __toString()
    {
        $data = $this->foxlisGeo->getData();
        $lang = $this->foxlisGeo->getLanguage();

        return isset($data[$this->entity]['names'][$lang]) ? trim($data[$this->entity]['names'][$lang]) : '';
    }

    public function __get($name)
    {
        $data = $this->foxlisGeo->getData();
        return isset($data[$this->entity]['names'][$name]) ? trim($data[$this->entity]['names'][$name]) : '';
    }
}
